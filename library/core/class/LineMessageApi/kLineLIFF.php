<?php

class kLineLIFF {

	public $LineAtId = __LineAtID;
	private $channel_id = __LineMessageAPIChannelID;
	private $channel_secret = __LineMessageAPISecret;
	private $channel_access_token = __LineMessageAPIAccessToken;

	function __construct() {
		$this->action['data'] = [];
		$this->header = ["Content-Type: application/json", "Authorization: Bearer {" . $this->channel_access_token . "}"];
		$this->content_header = ["Authorization: Bearer {" . $this->channel_access_token . "}"];
	}
        
        public function CheckLiffUrl($url=NULL, $type='tall') {
            if($url){
                $GetLiffList = $this->GetLiffList();
                $RedirectUrl = '';
                if($GetLiffList['apps']){
                    foreach ($GetLiffList['apps'] as $key => $item) {
                        if($item['view']['url'] === $url){
                            $RedirectUrl = "https://liff.line.me/" . $item['liffId'];
                        }
                    }
                }
                if(!$RedirectUrl){
                    $Data->my['fields']['subject']['type'] = $type;//compact(50%)、tall(80%)、full(100%)
                    $Data->my['fields']['subject']['url'] = $url;
                    $return = $this->AddLiff($Data);
                    if($return['liffId']){
                        $RedirectUrl = "https://liff.line.me/" . $return['liffId'];
                    }
                }
            }
            return $RedirectUrl;
        }

	public function GetLiffList() {
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.line.me/liff/v1/apps',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "UTF-8",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_VERBOSE => 1,
			CURLOPT_HEADER => 1,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"authorization: Bearer {" . $this->channel_access_token . "}"
			),
		));
		$response = curl_exec($curl);

		$return['httpcode'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$return['HEADER_SIZE'] = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
		$return['HEADER'] = substr($response, 0, $return['HEADER_SIZE']);
		$return['ERROR'] = curl_error($curl);
		$return['BODY'] = substr($response, $return['HEADER_SIZE']);
		$return['TYPE'] = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
		$return['base64'] = base64_encode($return['BODY']);
		curl_close($curl);
		return json_decode($return['BODY'], true);
	}

	public function AddLiff($_this) {
		$this->content_header = ["Content-Type:application/json", "Authorization: Bearer {" . $this->channel_access_token . "}"];
		$this->action['data'] = $Image;
		$context = stream_context_create(array(
			"http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->content_header), "content" => '{"view":{"type":"'.$_this->my['fields']['subject']['type'].'","url":"'.$_this->my['fields']['subject']['url'].'"}}', "ignore_errors" => true)
		));
		$this->state = file_get_contents('https://api.line.me/liff/v1/apps', false, $context);
		$this->log('', __FUNCTION__, $this->state, $this->action['data'], NULL, NULL);
		return json_decode($this->state, true);
	}

	public function DeleteLiff($liffId = NULL) {
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.line.me/liff/v1/apps/' . $liffId,
			CURLOPT_RETURNTRANSFER => true,
			//CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			//CURLOPT_SSL_VERIFYHOST => FALSE,
			//CURLOPT_SSL_VERIFYPEER => FALSE,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "DELETE",
			CURLOPT_HTTPHEADER => $this->header
		));
		$this->return['ResponseOriginalData'] = curl_exec($curl);
		$this->return['HTTPStatus'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		if ($this->return['HTTPStatus'] == '200') {
			$return['state'] = true;
			$return['msg'] = $liffId;
		} else {
			$return['state'] = false;
			$return['msg'] = $liffId;
		}
		return $return;
	}
        
	public function UpdateLiff($_this = NULL) {
		$this->content_header = ["Content-Type:application/json", "Authorization: Bearer {" . $this->channel_access_token . "}"];
		$context = stream_context_create(array(
			"http" => array("method" => "PUT", "header" => implode(PHP_EOL, $this->content_header), "content" => '{"type":"'.$_this->my['fields']['subject']['type'].'","url":"'.$_this->my['fields']['subject']['url'].'"}', "ignore_errors" => true)
		));
		$this->state = file_get_contents("https://api.line.me/liff/v1/apps/". urlencode($_this->my['fields']['subject']['liffId'])."/view", false, $context);
		$this->log('', __FUNCTION__, $this->state, '', NULL, NULL);
		return json_decode($this->state, true);
	}

	private function log($for = NULL, $type = NULL, $state = NULL, $message = NULL, $gorup = NULL, $action = NULL, $node = NULL) {
            switch ($action) {
                case'service'://客服對話歸屬對話紀錄
                case'pershing':
                    $SQL_LineRecord = new kSQL('LineRecord');
                    $this->log_return_node = $SQL_LineRecord->getAuto_INCREMENT();
                    $SQL_LineRecord->SetAction('insert')
                            ->SetValue('subject', json_encode($message))
                            ->SetValue('update_at', $SQL_LineRecord->getNowTime())
                            ->SetValue('create_at', $SQL_LineRecord->getNowTime())
                            ->SetValue('tablename', 'line')
                            ->SetValue('prev', $action)
                            ->SetValue('next', $type)
                            ->SetValue('propertyA', $for)
                            ->SetValue("content", $state)
                            ->SetValue('prev1', !empty($this->RecordSystemIndex) ? $this->RecordSystemIndex : NULL)
                            ->BuildQuery();
                    break;
                default ://推播、排程、關鍵字...等log
                    $SQL_LineLog = new kSQL('LineLog');
                    $content = array_filter([
                        "contentA" => $state,
                        "contentB" => json_encode($gorup),
                    ]);
                    $SQL_LineLog
                            ->SetAction('insert')
                            ->SetValue("tablename", "line")
                            ->SetValue('update_at', $SQL_LineLog->getNowTime())
                            ->SetValue('create_at', $SQL_LineLog->getNowTime())
                            ->SetValue('propertyA', $for)
                            ->SetValue('prev', $action)
                            ->SetValue('next', $type)
                            ->SetValue("subject", json_encode($message))
                            ->SetValue("content", json_encode($content))
                            ->SetValue('prev1', !empty($this->RecordSystemIndex) ? $this->RecordSystemIndex : NULL)
                            ->BuildQuery();
                    break;
            }
            return $this->log_return_node;
        }

}
