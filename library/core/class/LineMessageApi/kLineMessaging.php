<?php

/*
 *  Line Message 2020 by Ricky
 */

class kLineMessaging {

    private $reply_url = "https://api.line.me/v2/bot/message/reply";
    private $push_url = "https://api.line.me/v2/bot/message/push";
    private $quota_url = "https://api.line.me/v2/bot/message/quota";
    private $multicast_url = "https://api.line.me/v2/bot/message/multicast";
    private $profile_url = "https://api.line.me/v2/bot/profile";
    private $get_url = 'https://api.line.me/v2/bot/';
    private $message_url = "https://api-data.line.me/v2/bot/message";
    private $richmenu_url = "https://api.line.me/v2/bot/richmenu";
    public $header;
    public $content_header;
    public $LineAtId = NULL;//__LineAtID
    private $channel_id = __LineMessageAPIChannelID;
    private $channel_secret = __LineMessageAPISecret;
    private $channel_access_token = __LineMessageAPIAccessToken;
    private $BlockedMsg = false;
    public $events;
    public $eventsArray;
    public $profileData = array('displayName' => NULL, 'userId' => NULL, 'pictureUrl' => NULL);
    public $LineMessageData_Member = NULL;
    public $LineMessageDB_Membe = NULL;
    public $LineMessageDB_Account = NULL;
    public $rsa = NULL;
    public $EventClass = NULL;
    public $state;
    public $action;
    public $log_return_node;
    public $RecordSystemIndex = '';
    public $RecordSystem = NULL;
    public $quickReply;
    public $WellcomeMsg;
    public $AutomaticMsg;
    public $CardMsg;
    public $SystemOnline;
    public $TDG_checkin;

    function __construct() {
        $this->action['data'] = [];
        $this->header = ["Content-Type: application/json", "Authorization: Bearer {" . $this->channel_access_token . "}"];
        $this->content_header = ["Authorization: Bearer {" . $this->channel_access_token . "}"];
        $this->rsa = new Rsa();
    }

    function Clear_BOTFlash() {
        $this->LineMessageDB_Membe->SetAction('update')->SetWhere("id='". $this->LineMessageData_Member[0]['id'] ."'")->SetValue('content', '')->BuildQuery();
        $this->LineMessageData_Member[0]['content']['BOT_Type'] = NULL;
        $this->LineMessageData_Member[0]['content']['BOT_Model'] = NULL;
        $this->LineMessageData_Member[0]['content']['BOT_Action'] = NULL;
        $this->LineMessageData_Member[0]['content']['BOT_Data'] = NULL;
        $this->LineMessageData_Member[0]['content']['BOT_Box'] = NULL;
        $this->LineMessageData_Member[0]['content']['BOT_Mode'] = NULL;
        $this->LineMessageData_Member[0]['content']['BOT_ID'] = NULL;
        $this->LineMessageData_Member[0]['content']['BOT_Date'] = NULL;
    }

    function channel_access_token() {
        return $this->channel_access_token;
    }

    function init($receive, $save = TRUE) {
        $this->events = NULL;
        $this->events['replyToken'] = $receive->replyToken;
        $this->events['timestamp'] = $receive->timestamp;
        switch ($this->events['source']['type'] = $receive->source->type) {
            case'user':
                $this->events['source']['type'] = $receive->source->type;
                $this->events['source']['userId'] = $receive->source->userId;
                break;
            case'group':
                $this->events['source']['type'] = $receive->source->type;
                $this->events['source']['groupId'] = $receive->source->groupId;
                $this->events['source']['userId'] = $receive->source->userId;
                break;
            case'room':
                $this->events['source']['type'] = $receive->source->type;
                $this->events['source']['roomId'] = $receive->source->roomId;
                $this->events['source']['userId'] = $receive->source->userId;
                break;
        }
        switch ($this->events['type'] = $receive->type) {
            case'message':
                switch ($this->events['message']['type'] = $receive->message->type) {
                    case'text':
                        $this->events['message']['id'] = $receive->message->id;
                        $this->events['message']['text'] = trim($receive->message->text);
                        $this->events['message']['emojis'] = $receive->message->emojis;
                        break;
                    case'image':
                    case'video':
                    case'audio':
                        $this->events['message']['id'] = $receive->message->id;
                        $this->events['message']['duration'] = $receive->message->duration;
                        $this->events['message']['contentProvider']['type'] = $receive->message->contentProvider->type;
                        $this->events['message']['contentProvider']['originalContentUrl'] = $receive->message->contentProvider->originalContentUrl;
                        $this->events['message']['contentProvider']['previewImageUrl'] = $receive->message->contentProvider->previewImageUrl;
                        break;
                    case'file':
                        $this->events['message']['id'] = $receive->message->id;
                        $this->events['message']['fileName'] = $receive->message->fileName;
                        $this->events['message']['fileSize'] = $receive->message->fileSize;
                        break;
                    case'location':
                        $this->events['message']['id'] = $receive->message->id;
                        $this->events['message']['title'] = $receive->message->title;
                        $this->events['message']['address'] = $receive->message->address;
                        $this->events['message']['latitude'] = $receive->message->latitude;
                        $this->events['message']['longitude'] = $receive->message->longitude;
                        break;
                    case'sticker':
                        $this->events['message']['id'] = $receive->message->id;
                        $this->events['message']['packageId'] = $receive->message->packageId;
                        $this->events['message']['stickerId'] = $receive->message->stickerId;
                        $this->events['message']['stickerResourceType'] = $receive->message->stickerResourceType;
                        $this->events['message']['keywords'] = $receive->message->keywords;
                        break;
                }
                break;
            case'postback':
                $this->events['postback']['data'] = $receive->postback->data;
                $this->events['postback']['params']['date'] = $receive->postback->params->date;
                $this->events['postback']['params']['time'] = $receive->postback->params->time;
                $this->events['postback']['params']['datetime'] = $receive->postback->params->datetime;
                break;
            case'beacon':
                $this->events['beacon']['hwid'] = $receive->beacon->hwid;
                $this->events['beacon']['type'] = $receive->beacon->type;
                break;
            case'videoPlayComplete':
                $this->events['videoPlayComplete']['trackingId'] = $receive->videoPlayComplete->trackingId;
                break;
            case'accountLink':
                $this->events['link']['result'] = $receive->link->result;
                $this->events['link']['nonce'] = $receive->link->nonce;
                break;
            case'follow':
            case'unfollow':
                break;
            case'join':
            case'leave':
                break;
            case'memberJoined':
            case'memberLeft':
                break;
            case'things':
                break;
            case'unsend':
                $this->events['unsend']['messageId'] = $receive->unsend->messageId;
                break;
        }
        if ($this->events && $save) {
            $SQL_LineRecord = new kSQL('LineRecord');
            $this->RecordSystem = $SQL_LineRecord->getSystem();
            $this->RecordSystemIndex = $SQL_LineRecord->getAuto_INCREMENT();
            $SQL_LineRecord->SetAction('insert')
                            ->SetValue('subject', json_encode($receive))
                            ->SetValue('tablename', 'line')
                            ->SetValue('next', $this->events['type'])
                            ->SetValue('propertyA', $this->events['source']['userId'])
                            ->SetValue('update_at', $SQL_LineRecord->getNowTime())
                            ->SetValue('create_at', $SQL_LineRecord->getNowTime())
                            ->BuildQuery();
        }
        if ($this->events['source']['userId']) {
            $this->profile($this->events['source']['userId']);
            if (empty($this->profileData['userId'])) {
                $this->profile($this->events['source']['userId']);
            }
            
            /*
             * 處理會員資料
             */
            $this->LineMemberProcess('webhook', $this->events['type'], $this->profileData);
            
            if ($this->LineMessageData_Member[0]['viewB'] == 'on' || $this->BlockedMsg) {//黑名單
                exit;
            }
            if (!empty($this->LineMessageData_Member[0]['content']['BOT_Date'])) {
                switch($this->LineMessageData_Member[0]['content']['BOT_Type']){
                    case 'PlayGame':
                        break;
                    default :
                        if (date('Y-m-d H:i:s') >= date('Y-m-d H:i:s', strtotime($this->LineMessageData_Member[0]['content']['BOT_Date'] . ' +5 minute'))) {
                            $this->Clear_BOTFlash();
                        }
                        break;
                }
            }
        }
        return $this;
    }
    
    function LineMemberProcess($from='', $events_type='', $Profile='') {
        $Profile['userId'] = !empty($Profile['userId']) ? $Profile['userId'] : $this->events['source']['userId'];
        $this->LineMessageDB_Membe = new kSQL('LineMember');
        $this->LineMessageData_Member = $this->LineMessageDB_Membe->SetAction('select')->SetWhere("propertyA='" . $Profile['userId'] . "'")->BuildQuery();
        
        switch($from){
            case 'webhook':
                $DefaultStatus = 'chat-only';
                break;
            case 'login':
                $DefaultStatus = ($Profile['friendFlag']==='true') ? 'follow' : 'login-only';
                break;
            case 'liff':
                $DefaultStatus = ($Profile['friendFlag']==='true') ? 'follow' : 'liff-only';
                break;
        }
        if($DefaultStatus && $Profile['userId']){
            for($t=0;$t<2;$t++){
                if(empty($this->LineMessageData_Member[0]['propertyB'])){
                    $_CreateMemberEventID = $this->CreateMemberEventID();
                }
                if(!$this->LineMessageData_Member && $events_type!='unfollow'){
                    $this->LineMessageDB_Membe->SetAction('insert')
                                                ->SetValue('viewA', 'on')
                                                ->SetValue('viewB', 'off')
                                                ->SetValue('tablename', 'member')
                                                ->SetValue('prev', 'line')
                                                ->SetValue('propertyA', $Profile['userId'])
                                                ->SetValue('create_at', $this->LineMessageDB_Membe->getNowTime());
                }else{
                    $this->LineMessageDB_Membe->SetAction('update')->SetWhere("id='". $this->LineMessageData_Member[0]['id'] ."'");
                }
                switch($events_type){
                    case 'follow':
                        $this->LineMessageDB_Membe->SetValue('prev1', 'follow');
                        break;
                    case 'unfollow':
                        if ($this->LineMessageData_Member[0]['subject']['displayName']) {
                            $Profile['displayName'] = $this->LineMessageData_Member[0]['subject']['displayName'];
                        }
                        if ($this->LineMessageData_Member[0]['subject']['pictureUrl']) {
                            $Profile['pictureUrl'] = $this->LineMessageData_Member[0]['subject']['pictureUrl'];
                        }
                        $this->LineMessageDB_Membe->SetValue('prev1', 'unfollow');
                        break;
                    default:
                        if(!$this->LineMessageData_Member){
                            $this->LineMessageDB_Membe->SetValue('prev1', $DefaultStatus);
                        }
                        break;
                }
                $subject = !empty($this->LineMessageData_Member[0]['subject']) ? $this->LineMessageData_Member[0]['subject'] : array();
                if($Profile){
                    $subject = array_merge($subject, array_filter(array(
                        "displayName" => !empty($Profile['displayName']) ? trim($Profile['displayName']) : '',
                        "pictureUrl" => !empty($Profile['pictureUrl']) ? trim($Profile['pictureUrl']) : '',
                        "email" => !empty($Profile['email']) ? trim($Profile['email']) : '',
                    )));
                }
                $state = $this->LineMessageDB_Membe->SetValue('subject', json_encode($subject))
                                                    ->SetValue('propertyB', $_CreateMemberEventID, !empty($_CreateMemberEventID) ? 1 : 0)
                                                    ->SetValue('update_at', $this->LineMessageDB_Membe->getNowTime())
                                                    ->BuildQuery();
                if($state){
                    $this->LineMessageData_Member = $this->LineMessageDB_Membe->SetAction('select')->SetWhere("propertyA='" . $Profile['userId'] . "'")->BuildQuery();
                    switch($this->LineMessageData_Member[0]['prev1']){
                        case 'follow':
                            $this->BlockedMsg = false;
                            break;
                        case 'unfollow':
                        default:
                            $this->BlockedMsg = true;
//                            $this->BlockedMsg = false;
                            break;
                    }
                    break;
                }
            }
        }
    }
    
    function GetFollowersIds($continuationToken = null) {
        $start = $continuationToken ? '?start=' . $continuationToken : $continuationToken;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.line.me/v2/bot/followers/ids" . $start,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $this->channel_access_token . "",
            )
        ));
        $insight = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $this->profileData = NULL;
            $this->profileData['error'] = $err;
        } else {
            $return = json_decode($insight, true);
        }
        return $return;
    }

    function GetNumberOfFollowers($_query) {//reply push multicast
        if (empty($_query['date'])) {
            $_query['date'] = date('Ymd', strtotime(date('Ymd') . ' -1 days'));
        }
        /*
         * 
         */
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.line.me/v2/bot/insight/followers?date=" . $_query['date'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer {" . $this->channel_access_token . "}",
            )
        ));
        $insight = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $this->profileData = NULL;
            $this->profileData['error'] = $err;
        } else {
            $return = json_decode($insight, true);
        }
        return $return;
    }

    function GetNumberOfSentMessages($type = NULL, $action = NULL, $_query = NULL) {//reply push multicast
        if (empty($_query['date'])) {
            $_query['date'] = date('Ymd', strtotime(date('Ymd') . ' -1 days'));
        }
        if (1) {
            $this->channel_access_token = (!empty($_query['token'])) ? $_query['token'] : $this->channel_access_token;
            $this_api_url = "https://api.line.me/v2/bot/$type/$action/";
            if (!empty($_query['type'])) {
                $this_api_url .= $_query['type'];
            }
            if ($_query['date']) {
                $this_api_url .= "?date=" . $_query['date'];
            }
            /*
             * 
             */
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $this_api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "authorization: Bearer {" . $this->channel_access_token . "}",
                )
            ));
            $insight = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                $this->profileData = NULL;
                $this->profileData['error'] = $err;
            } else {
                $return = json_decode($insight, true);
            }
        }

        return $return;
    }

    function friendFlag($token = NULL) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.line.me/friendship/v1/status',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer {" . $token . "}",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $this->profileData = NULL;
            $this->profileData['error'] = $err;
        } else {
            $response = json_decode($response, true);
            return $response;
        }
    }

    function messageObject($type = NULL, $label = NULL, $text = NULL, $buttonBGColor = NULL, $buttonColor = NULL) {
        if (is_array($type)) {
            foreach ($type as $key => $item) {
                switch ($item['type']) {
                    case'message':
                        $return[] = $this->message($item['label'], $item['content'], $item['buttonBGColor'], $item['buttonColor']);
                        break;
                    case'postback':
                        $return[] = $this->postback($item['label'], $item['content'], $item['buttonBGColor'], $item['buttonColor']);
                        break;
                    case'uri':
                        $return[] = $this->uri($item['label'], $item['content'], $item['buttonBGColor'], $item['buttonColor']);
                        break;
                }
            }
        } else {
            switch ($type) {
                case'message':
                    return $this->message($label, $text, $buttonBGColor, $buttonColor);
                    break;
                case'postback':
                    return $this->postback($label, $text, $buttonBGColor, $buttonColor);
                    break;
                case'uri':
                    return $this->uri($label, $text, $buttonBGColor, $buttonColor);
                    break;
            }
        }
        return $return;
    }

    function message($label, $text, $buttonBGColor = NULL, $buttonColor = NULL) {
        $return['type'] = 'message';
        $return['label'] = $label;
        $return['text'] = $text;
        if($buttonBGColor){
            $return['buttonBGColor'] = $buttonBGColor;
        }
        if($buttonColor){
            $return['buttonColor'] = $buttonColor;
        }
        return $return;
    }

    public function FLEX_Message($altText = NULL, $Val = NULL, $QuickReply = NULL) {
        $result['type'] = 'flex';
        $result['altText'] = $altText;
        $result['contents'] = $Val;
        if ($QuickReply)
            $result['quickReply'] = $this->quickReply_action($QuickReply);
        return $result;
    }

    function postback($label = NULL, $data = NULL, $text = NULL, $buttonBGColor = NULL, $buttonColor = NULL) {
        $return['type'] = 'postback';
        $return['label'] = $label;
        $return['data'] = $data;
        if (!empty($text) and $text != '') {
            $return['displayText'] = $text;
        }
        if($buttonBGColor){
            $return['buttonBGColor'] = $buttonBGColor;
        }
        if($buttonColor){
            $return['buttonColor'] = $buttonColor;
        }
        return $return;
    }

    function uri($label, $uri, $buttonBGColor = NULL, $buttonColor = NULL) {
        $return['type'] = 'uri';
        $return['label'] = $label;
        $return['uri'] = $uri;
        if($buttonBGColor){
            $return['buttonBGColor'] = $buttonBGColor;
        }
        if($buttonColor){
            $return['buttonColor'] = $buttonColor;
        }
        return $return;
    }

    function datetime_picker($label = NULL, $data = NULL, $mode = NULL, $initial = NULL, $max = NULL, $min = NULL) {
        $return['type'] = 'datetimepicker';
        $return['label'] = $label;
        $return['data'] = $data;
        $return['mode'] = $mode;
        if ($initial)
            $return['initial'] = $initial;
        if ($max)
            $return['max'] = $max;
        if ($min)
            $return['min'] = $min;
        return $return;
    }

    function image_columns($imageUrl, $action = NULL) {
        $return = [
            "imageUrl" => $imageUrl,
            "action" => $action
        ];
        return $return;
    }

    function columns($thumbnailImageUrl = NULL, $title = NULL, $text = NULL, $actionA = NULL, $actionB = NULL, $actionC = NULL) {
        if ($actionA != NULL) {
            $actions[] = $actionA;
        }
        if ($actionB != NULL) {
            $actions[] = $actionB;
        }
        if ($actionC != NULL) {
            $actions[] = $actionC;
        }
        $return = [
            "thumbnailImageUrl" => $thumbnailImageUrl,
            "title" => $title,
            "text" => $text,
            "actions" => $actions
        ];
        return $return;
    }

    function columns_v2($thumbnailImageUrl = NULL, $title = NULL, $text = NULL, $actions = NULL, $Watermark = NULL) {
        if (!empty($title)) {
            
        }$title = mb_substr($title, 0, 40, 'utf-8');
        if (!empty($text)) {
            
        }$text = mb_substr($text, 0, 60, 'utf-8');
        $return = [
            "thumbnailImageUrl" => $thumbnailImageUrl,
            "title" => $title,
            "text" => $text,
            "actions" => $actions,
            "watermark" => $Watermark,
        ];
        if (empty($thumbnailImageUrl)) {
            unset($return['thumbnailImageUrl']);
        }
        if (empty($title)) {
            unset($return['title']);
        }
        return $return;
    }
    
    function imagemap($altText, $baseUrl, $height, $width, $action, $video = NULL) {
        if($this->ImageMapType=='flex'){ //flex
            $flex_contents = array();
            $flex_contents[] = array(
                'type' => 'image',
                'url' => $baseUrl,
                'size' => 'full',
                'aspectMode' => 'cover',
                'aspectRatio' => $width.':'.$height,
            );
            if($action){
                foreach ($action as $key => $value) {
                    $widthRatio = ($value['area']['width']/$width)*100;
                    $heightRatio = ($value['area']['height']/$height)*100;
                    $flex_contents[] = array(
                        'type' => 'box',
                        'layout' => 'vertical',
                        'position' => 'absolute',
                        'width' => $widthRatio . '%',
                        'height' => $heightRatio . '%',
                        'offsetStart' => ($value['area']['x']/$value['area']['width']*$widthRatio) . '%',
                        'offsetTop' => ($value['area']['y']/$value['area']['height']*$heightRatio) . '%',
                        'action' => array_filter(array(
                            'type' => $value['type'],
                            'text' => $value['text'],
                            'uri' => $value['linkUri'],
                            'data' => $value['data'],
                        )),
                        'contents' => array(),
                    );
                }
            }
            $flex_columns = array(
                'type' => 'bubble',
                'size' => 'giga',
                'body' => array(
                    'type' => 'box',
                    'layout' => 'vertical',
                    'paddingAll' => '0px',
                    'contents' => $flex_contents,
                ),
            );
            
            $this->SetMessageObject($this->FLEX_Message($altText, $flex_columns));
        }else{
            $object = array([
                "type" => "imagemap",
                "baseUrl" => $baseUrl,
                "altText" => $altText,
                "baseSize" => [
                    "height" => $height,
                    "width" => $width
                ],
                "actions" => $action,
                "video" => [
                    "externalLink" => [
                        "label" => $video['label'],
                        "linkUri" => $video['linkUri']
                    ],
                    "area" => [
                        "x" => $video['x'],
                        "y" => $video['y'],
                        "height" => $video['height'],
                        "width" => $video['width']
                    ],
                    "originalContentUrl" => $video['originalContentUrl'],
                    "previewImageUrl" => $video['previewImageUrl']
                ]
            ]);
            if (!$video) {
                unset($object[0]['video']);
            } else {
                if (!$video['label'] && !$video['linkUri']) {
                    unset($object[0]['video']['externalLink']);
                } else if (!$video['label']) {
                    unset($object[0]['video']['externalLink']['label']);
                } else if (!$video['linkUri']) {
                    unset($object[0]['video']['externalLink']['linkUri']);
                }
            }
            $this->action['data'] = array_merge($this->action['data'], $object);
        }
        
        return $this;
    }
    
    function image_carousel($altText = NULL, $image_columns = NULL) {
        if(1){ //flex
            $flex_columns = array();
            foreach ($image_columns as $key => $columns_item) {
                if($columns_item['action']){
                    $ActionLabel = array(
                        'type' => 'box',
                        'layout' => 'vertical',
                        'backgroundColor' => '#0606068f',
                        'paddingAll' => '10px',
                        'cornerRadius' => '30px',
                        'paddingStart' => '15px',
                        'paddingEnd' => '15px',
                        'position' => 'absolute',
                        'offsetBottom' => '30px',
                        'contents' => array(
                            array(
                                'type' => 'text',
                                'text' => $columns_item['action']['label'],
                                'color' => '#ffffff',
                                'align' => 'center',
                                'size' => 'sm',
                            ),
                        ),
                    );
                }
                $actions_area = ($columns_item['action']['type']=='noaction') ? array() : $columns_item['action'];
                $flex_columns[] = array(
                    'type' => 'bubble',
                    'size' => 'giga',
                    'body' => array_filter(array(
                        'type' => 'box',
                        'layout' => 'horizontal',
                        'paddingAll' => '0px',
                        'justifyContent' => 'center',
                        'contents' => array_filter(array(
                            array(
                                'type' => 'image',
                                'url' => kCore_ImgUrl($columns_item['imageUrl']),
                                'size' => 'full',
                                'aspectMode' => 'cover',
                                'gravity' => 'bottom',
                            ),
                            $ActionLabel
                        )),
                        'action' => $actions_area,
                    )),
                );
            }
            
            $flex_item['type'] = 'carousel';
            $flex_item['contents'] = $flex_columns;
            
            $this->SetMessageObject($this->FLEX_Message($altText, $flex_item));
        }else{
            $object = array([
                "type" => "template",
                "altText" => $altText,
                "template" => array(
                    "type" => 'image_carousel',
                    "altText" => $altText,
                    //"message"=>"請選擇您想展示的項目",
                    "columns" => $image_columns
                )
            ]);
            $this->action['data'] = array_merge($this->action['data'], $object);
        }
        
        return $this;
    }
    
    function carousel($altText = NULL, $columns = NULL, $imageAspectRatio = 'rectangle', $imageSize = 'cover', $imageBackgroundColor = '#FFFFFF') {
        if(1){ //flex
            $flex_columns = array();
            if ($columns) {
                foreach ($columns as $key => $columns_item) {
                    $flex_contents = array();
                    $flex_contents_items = array();
                    $flex_contents_actions = array();
                    $flex_actions = $columns_item['actions'];
                    if (0 && $flex_actions) {
                        if (count($flex_actions) == 1) {
                            $flex_actions[] = array(
                                'type' => 'postback',
                                'label' => ' ',
                                'data' => 'BOT_NULL'
                            );
                            $flex_actions[] = array(
                                'type' => 'postback',
                                'label' => ' ',
                                'data' => 'BOT_NULL'
                            );
                        } else if (count($flex_actions) == 2) {
                            $flex_actions[] = array(
                                'type' => 'postback',
                                'label' => ' ',
                                'data' => 'BOT_NULL'
                            );
                        }
                    }
                    $aspectRatio = ($imageAspectRatio == 'square') ? '1:1' : '1.51:1';
                    $aspectMode = ($imageSize == 'contain') ? 'fit' : 'cover';
                    
                    if ($columns_item['thumbnailImageUrl']) {
                        $flex_contents[] = array(
                            'type' => 'image',
                            'url' => kCore_ImgUrl($columns_item['thumbnailImageUrl']),
                            'size' => 'full',
                            'aspectRatio' => $aspectRatio,
                            'aspectMode' => $aspectMode,
                            'backgroundColor' => $imageBackgroundColor,
                        );
                    }
                    
                    if ($columns_item['watermark']) {
                        $flex_contents[] = array(
                            'type' => 'image',
                            'url' => kCore_ImgUrl($columns_item['watermark']),
                            'size' => 'full',
                            'aspectRatio' => $aspectRatio,
                            'aspectMode' => $aspectMode,
                            'position' => 'absolute',
                        );
                    }
                    
                    if ($columns_item['title']) {
                        $flex_contents_items[] = array(
                            'type' => 'text',
                            'text' => $columns_item['title'],
                            'wrap' => true,
                            'weight' => 'bold',
                            'color' => '#000000',
                        );
                    }
                    if ($columns_item['text']) {
                        $flex_contents_items[] = array(
                            'type' => 'text',
                            'text' => $columns_item['text'],
                            'wrap' => true,
                            'color' => ($columns_item['title']) ? '#666666' : '#29313e',
                            'size' => ($columns_item['title']) ? 'sm' : 'md',
                            'margin' => 'md',
                        );
                    }
                    if ($flex_contents_items) {
                        $flex_contents[] = array(
                            'type' => 'box',
                            'layout' => 'vertical',
                            'paddingAll' => '15px',
                            'backgroundColor' => (!$columns_item['title'] && !$columns_item['thumbnailImageUrl']) ? '#fafafa' : '#ffffff',
                            'contents' => $flex_contents_items
                        );
                    }
                    
                    $flex_contents[] = array(
                        'type' => 'filler',
                    );
                    $flex_contents[] = array(
                        'type' => 'separator',
                    );
                    if ($flex_actions) {
                        foreach ($flex_actions as $actions_key => $actions_value) {
                            if ($actions_value['type'] == 'postback' || str_replace(" ", "", $actions_value['label'])) {
                                $buttonBGColor = !empty($actions_value['buttonBGColor']) ? $actions_value['buttonBGColor'] : '#ffffff';
                                $buttonColor = !empty($actions_value['buttonColor']) ? $actions_value['buttonColor'] : '#627da3';
                                unset($actions_value['buttonBGColor']);
                                unset($actions_value['buttonColor']);
                                $actions_area = ($actions_value['type']=='noaction') ? array() : $actions_value;
                                $flex_contents_actions[] = array_filter(array(
                                    'type' => 'box',
                                    'layout' => 'vertical',
                                    'paddingAll' => '7.5px',
                                    'backgroundColor' => $buttonBGColor,
                                    'cornerRadius' => '7.5px',
                                    'action' => $actions_area,
                                    'contents' => array(
                                        array(
                                            'type' => 'text',
                                            'text' => $actions_value['label'],
                                            'align' => 'center',
                                            'color' => $buttonColor,
                                        ),
                                    ),
                                ));
                            }
                        }
                    }
                    $flex_contents[] = array(
                        'type' => 'box',
                        'layout' => 'vertical',
                        'spacing' => 'sm',
                        'flex' => 0,
                        'paddingAll' => '15px', //7.5px
                        'contents' => $flex_contents_actions
                    );
                    
                    $flex_contents[] = array(
                        'type' => 'spacer',
                        'size' => 'sm', //sm、md、lg
                    );
                    
                    $flex_columns[] = array(
                        'type' => 'bubble',
                        'size' => 'mega', //kilo、mega
                        'body' =>
                        array(
                            'type' => 'box',
                            'layout' => 'vertical',
                            'paddingAll' => '0px',
                            'contents' => $flex_contents
                        )
                    );
                }
                
                $flex_item['type'] = 'carousel';
                $flex_item['contents'] = $flex_columns;
                
                $this->SetMessageObject($this->FLEX_Message($altText, $flex_item));
            }
        }else{
            if (!empty($columns)) {
                foreach ($columns as $key => $columns_item) {
                    if (!empty($columns_item['actions'])) {
                        if (kCore_newcount($columns_item['actions']) == 1) {
                            $columns[$key]['actions'][] = array(
                                'type' => 'postback',
                                'label' => ' ',
                                'data' => 'BOT_NULL'
                            );
                            $columns[$key]['actions'][] = array(
                                'type' => 'postback',
                                'label' => ' ',
                                'data' => 'BOT_NULL'
                            );
                        } else if (kCore_newcount($columns_item['actions']) == 2) {
                            $columns[$key]['actions'][] = array(
                                'type' => 'postback',
                                'label' => ' ',
                                'data' => 'BOT_NULL'
                            );
                        }
                    }
                }
            }
            $object = array([
                "type" => "template",
                "altText" => $altText,
                "template" => array(
                    "type" => 'carousel',
                    "altText" => $altText,
                    "columns" => $columns,
                    "imageAspectRatio" => $imageAspectRatio, //rectangle：1.51：1 or square：1：1
                    "imageSize" => $imageSize, //cover or contain
                    "imageBackgroundColor" => $imageBackgroundColor
                )
            ]);
            $this->action['data'] = array_merge($this->action['data'], $object);
        }
        
        return $this;
    }
    
    function buttons($thumbnailImageUrl = NULL, $altText = NULL, $title = NULL, $text = NULL, $actions = NULL, $imageAspectRatio = 'rectangle', $imageSize = 'cover', $imageBackgroundColor = '#FFFFFF', $watermark = NULL) {
        if(1){ //flex
            $flex_contents = array();
            $flex_contents_items = array();
            $flex_contents_actions = array();
            $aspectRatio = ($imageAspectRatio == 'square') ? '1:1' : '1.51:1';
            $aspectMode = ($imageSize == 'contain') ? 'fit' : 'cover';

            if ($thumbnailImageUrl) {
                $flex_contents[] = array(
                    'type' => 'image',
                    'url' => kCore_ImgUrl($thumbnailImageUrl),
                    'size' => 'full',
                    'aspectRatio' => $aspectRatio,
                    'aspectMode' => $aspectMode,
                    'backgroundColor' => $imageBackgroundColor,
                );
            }

            if ($watermark) {
                $flex_contents[] = array(
                    'type' => 'image',
                    'url' => kCore_ImgUrl($watermark),
                    'size' => 'full',
                    'aspectRatio' => $aspectRatio,
                    'aspectMode' => $aspectMode,
                    'position' => 'absolute',
                );
            }

            if ($title) {
                $flex_contents_items[] = array(
                    'type' => 'text',
                    'text' => $title,
                    'wrap' => true,
                    'weight' => 'bold',
                    'color' => '#000000',
                );
            }
            if ($text) {
                $flex_contents_items[] = array(
                    'type' => 'text',
                    'text' => $text,
                    'wrap' => true,
                    'color' => ($title) ? '#666666' : '#29313e',
                    'size' => ($title) ? 'sm' : 'md',
                    'margin' => 'md',
                );
            }
            if ($flex_contents_items) {
                $flex_contents[] = array(
                    'type' => 'box',
                    'layout' => 'vertical',
                    'paddingAll' => '15px',
                    'backgroundColor' => (!$title && !$thumbnailImageUrl) ? '#fafafa' : '#ffffff',
                    'contents' => $flex_contents_items
                );
            }

            $flex_contents[] = array(
                'type' => 'filler',
            );
            $flex_contents[] = array(
                'type' => 'separator',
            );
    //        $buttonBGColor = '#46b8da';
    //        $buttonColor = '#ffffff';
            if ($actions) {
                foreach ($actions as $actions_key => $actions_value) {
                    if ($actions_value['type'] == 'postback' || str_replace(" ", "", $actions_value['label'])) {
                        $flex_contents_actions[] = array(
                            'type' => 'box',
                            'layout' => 'vertical',
                            'paddingAll' => '7.5px',
                            'backgroundColor' => $buttonBGColor ? $buttonBGColor : '#ffffff',
                            'cornerRadius' => '7.5px',
                            'action' => $actions_value,
                            'contents' =>
                            array(
                                array(
                                    'type' => 'text',
                                    'text' => $actions_value['label'],
                                    'align' => 'center',
                                    'color' => $buttonColor ? $buttonColor : '#627da3',
                                ),
                            ),
                        );
                    }
                }
            }
            $flex_contents[] = array(
                'type' => 'box',
                'layout' => 'vertical',
                'spacing' => 'sm',
                'flex' => 0,
                'paddingAll' => '7.5px',
                'contents' => $flex_contents_actions
            );

            $flex_columns = array(
                'type' => 'bubble',
                'size' => 'mega', //kilo、mega
                'body' =>
                array(
                    'type' => 'box',
                    'layout' => 'vertical',
                    'paddingAll' => '0px',
                    'contents' => $flex_contents
                )
            );

            $this->SetMessageObject($this->FLEX_Message($altText, $flex_columns));
        }else{
            $object = array([
                "type" => "template",
                "altText" => $altText,
                "template" => array(
                    "type" => 'buttons',
                    "thumbnailImageUrl" => $thumbnailImageUrl,
                    "title" => $title,
                    "text" => $text,
                    "actions" => $actions,
                    "imageAspectRatio" => $imageAspectRatio, //rectangle：1.51：1 or square：1：1
                    "imageSize" => $imageSize, //cover or contain
                    "imageBackgroundColor" => $imageBackgroundColor
                )
            ]);
            if (empty($thumbnailImageUrl)) {
                unset($object['thumbnailImageUrl']);
            }
            $this->action['data'] = array_merge($this->action['data'], $object);
        }
        
        return $this;
    }
    
    function confirm($altText = NULL, $text = NULL, $actionA = NULL, $actionB = NULL) {
        if(1){ //flex
            $flex_contents = array();
            $flex_contents_items = array();
            $flex_contents_actions = array();
            if ($actionA) {
                $actions[] = $actionA;
            }
            if ($actionB) {
                $actions[] = $actionB;
            }

            if ($text) {
                $flex_contents_items[] = array(
                    'type' => 'text',
                    'text' => $text,
                    'wrap' => true,
                    'color' => '#29313e',
                    'size' => 'md',
                    'margin' => 'md',
                );
            }
            if ($flex_contents_items) {
                $flex_contents[] = array(
                    'type' => 'box',
                    'layout' => 'vertical',
                    'paddingAll' => '15px',
                    'backgroundColor' => '#fafafa',
                    'contents' => $flex_contents_items
                );
            }

            $flex_contents[] = array(
                'type' => 'separator',
            );
//            $buttonBGColor = '#46b8da';
//            $buttonColor = '#ffffff';
            if ($actions) {
                foreach ($actions as $actions_key => $actions_value) {
                    $flex_contents_actions[] = array(
                        'type' => 'box',
                        'layout' => 'vertical',
                        'paddingAll' => '7.5px',
                        'backgroundColor' => $buttonBGColor ? $buttonBGColor : '#ffffff',
                        'cornerRadius' => '7.5px',
                        'action' => $actions_value,
                        'contents' =>
                        array(
                            array(
                                'type' => 'text',
                                'text' => $actions_value['label'],
                                'align' => 'center',
                                'color' => $buttonColor ? $buttonColor : '#627da3',
                            ),
                        ),
                    );
                }
            }
            $flex_contents[] = array(
                'type' => 'box',
                'layout' => 'horizontal',
                'spacing' => 'sm',
                'flex' => 0,
                'paddingAll' => '7.5px',
                'contents' => $flex_contents_actions
            );

            $flex_columns = array(
                'type' => 'bubble',
                'size' => 'mega', //kilo、mega
                'body' =>
                array(
                    'type' => 'box',
                    'layout' => 'vertical',
                    'paddingAll' => '0px',
                    'contents' => $flex_contents
                )
            );

            $this->SetMessageObject($this->FLEX_Message($altText, $flex_columns));
        }else{
            if ($actionA) {
                $actions[] = $actionA;
            }
            if ($actionB) {
                $actions[] = $actionB;
            }
            $object = array([
                "type" => "template",
                "altText" => $altText,
                "template" => array(
                    "type" => 'confirm',
                    "text" => $text,
                    "actions" => $actions
                )
            ]);
            $this->action['data'] = array_merge($this->action['data'], $object);
        }
        
        return $this;
    }
    
    function stickerImg($stickerResourceType=NULL, $packageId=NULL, $stickerId=NULL) {
        $StickerAnimationList = array(
            "6362",
            "6632",
            "8525",
            "11537",
            "11538",
            "11539",
        );
        if(!empty($packageId) && !empty($stickerId)){
            if(((!empty($StickerAnimationList)&&in_array($packageId, $StickerAnimationList))
                ||$stickerResourceType=='ANIMATION_SOUND'
                ||$stickerResourceType=='ANIMATION')
                && @fopen('https://stickershop.line-scdn.net/stickershop/v1/sticker/'. $stickerId .'/iPhone/sticker_animation@2x.png', 'r')){
                    $ImageUrl = 'https://stickershop.line-scdn.net/stickershop/v1/sticker/'. $stickerId .'/iPhone/sticker_animation@2x.png';
            }else{
                    $ImageUrl = 'https://stickershop.line-scdn.net/stickershop/v1/sticker/'. $stickerId .'/android/sticker.png';
            }
        }
        return $ImageUrl;
    }

    function sticker($packageId, $stickerId) {
        $object = array([
                "type" => "sticker",
                "packageId" => $packageId,
                "stickerId" => $stickerId
        ]);
        $this->action['data'] = array_merge($this->action['data'], $object);
        return $this;
    }

    function location($title, $address, $latitude, $longitude) {
        $object = array([
                "type" => "location",
                "title" => $title,
                "address" => $address,
                "latitude" => $latitude,
                "longitude" => $longitude
        ]);
        $this->action['data'] = array_merge($this->action['data'], $object);
        return $this;
    }

    function audio($originalContentUrl, $duration) {
        $object = array([
                "type" => "audio",
                "originalContentUrl" => $originalContentUrl,
                "duration" => $duration
        ]);
        $this->action['data'] = array_merge($this->action['data'], $object);
        return $this;
    }

    function video($originalContentUrl, $previewImageUrl, $trackingId = null) {
        $object = array_filter(array([
                "type" => "video",
                "originalContentUrl" => $originalContentUrl,
                "previewImageUrl" => $previewImageUrl,
                "trackingId" => $trackingId,
        ]));
        $this->action['data'] = array_merge($this->action['data'], $object);
        return $this;
    }

    function image($originalContentUrl, $previewImageUrl) {
        $object = array([
                "type" => "image",
                "originalContentUrl" => $originalContentUrl,
                "previewImageUrl" => $previewImageUrl
        ]);
        $this->action['data'] = array_merge($this->action['data'], $object);
        return $this;
    }

    function text($message = NULL) {
        $object = array([
                "type" => "text",
                "text" => $message
        ]);
        $this->action['data'] = array_merge($this->action['data'], $object);
        return $this;
    }

    function quickReply_action($query = NULL) {
        switch ($query['type']) {
            case'uri':
                $object = array(
                    "type" => 'action',
                    "action" => array(
                        "type" => $query['type'],
                        "label" => $query['label'],
                        "uri" => $query['uri']
                    )
                );
                break;
            case'message':
                $object = array(
                    "type" => 'action',
                    "action" => array(
                        "type" => $query['type'],
                        "label" => $query['label'],
                        "text" => $query['text']
                    )
                );
                break;
            case'postback':
                $object = array(
                    "type" => 'action',
                    "action" => array_filter(array(
                        "type" => $query['type'],
                        "label" => $query['label'],
                        "data" => $query['data'],
                        "displayText" => $query['text']
                    ))
                );
                break;
        }
        if ($query['imageUrl']) {
            $object['imageUrl'] = $query['imageUrl'];
        }
        return $object;
    }
    
    function AccountLink() {
        $context = stream_context_create(array(
            "http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->content_header), "content" => json_encode($this->action['data']), "ignore_errors" => true)
        ));
        $this->state = file_get_contents('https://api.line.me/v2/bot/user/'. $this->events['source']['userId'] .'/linkToken', false, $context);
        $this->state = json_decode($this->state, true);
        
        $SQL_LineLog= new kSQL('LineLog');
        $SQL_LineLog->SetAction('insert')
                        ->SetValue('subject', json_encode(array("subject"=>$this->state)))
                        ->SetValue('content', '{"contentA":"{}"}')
                        ->SetValue('tablename', 'line')
                        ->SetValue('prev', '')
                        ->SetValue('next', __FUNCTION__)
                        ->SetValue('propertyA', $this->events['source']['userId'])
                        ->SetValue('propertyB', $this->GetHeader($http_response_header, 'x-line-request-id'))
                        ->SetValue('prev1', !empty($this->RecordSystemIndex) ? $this->RecordSystemIndex : NULL)
                        ->SetValue('update_at', $SQL_LineLog->getNowTime())
                        ->SetValue('create_at', $SQL_LineLog->getNowTime())
                        ->BuildQuery();
        if($this->state['linkToken']){
            return $this->state['linkToken'];
        }else{
            return false;
        }
    }

    function reply($type = NULL, $sender = NULL) {
        if (!empty($this->action['data']) && !empty($this->events['replyToken']) && $this->events['replyToken'] != '') {
            $return['data'] = [
                "replyToken" => $this->events['replyToken'],
                "to" => $this->events['source']['userId'],
                "messages" => $this->action['data']
            ];
            if (!empty($return['data']['messages']) && is_array($return['data']['messages'])) {
                unset($return_to_line);
                $return_to_line['replyToken'] = $this->events['replyToken'];
                $return_to_line['to'] = $this->events['source']['userId'];
                foreach ($return['data']['messages'] as $key => $item) {
                    $return_to_line['messages'][$key] = $item;
                    if ($sender) {
                        if ($sender['name']) {
                            $return['data']['messages'][$key]['sender']['name'] = $return_to_line['messages'][$key]['sender']['name'] = $sender['name'];
                        }
                        if ($sender['iconUrl']) {
                            $return['data']['messages'][$key]['sender']['iconUrl'] = $return_to_line['messages'][$key]['sender']['iconUrl'] = $sender['iconUrl'];
                        }
                    }
                    if ($item['type'] == 'text') {
                        $_return = $this->Translate_Emoticon($item['text']);
                        $return['data']['messages'][$key]['reltext'] = $return_to_line['messages'][$key]['text'] = $_return['text'];
                        if ($_return['emojis']) {
                            $return['data']['messages'][$key]['emojis'] = $return_to_line['messages'][$key]['emojis'] = $_return['emojis'];
                        }
                        if ($item['quickReply']) {
                            $quickReplyTmp = $item['quickReply'];
                            unset($return['data']['messages'][$key]['quickReply']);
                            unset($return_to_line['messages'][$key]['quickReply']);
                            $return['data']['messages'][$key]['quickReply'] = $return_to_line['messages'][$key]['quickReply'] = $quickReplyTmp;
                        }
                    }
                }
            }
            $context = stream_context_create(array(
                "http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->header), "content" => json_encode($return_to_line, JSON_UNESCAPED_UNICODE), "ignore_errors" => true)
            ));
            $_this_reply_action_start = microtime(true);
            $this->state = file_get_contents($this->reply_url, false, $context);
            $_this_reply_action_end = microtime(true) - $_this_reply_action_start;
            $this->log_v2(array(
                'for' => $this->events['source']['userId'],
                'type' => __FUNCTION__,
                'state' => $this->state,
                'message' => $return['data'],
                'group' => NULL,
                'action' => $type,
                'items' => $this->items,
                'TextItems' => $this->TextItems,
                'RequestId' => $this->GetHeader($http_response_header, 'x-line-request-id'),
            ));
            $this->action['data'] = [];
            unset($this->events['replyToken']);
            $this->state = json_decode($this->state, true);
            return $this->state;
        }
    }

    function CheckReplyToken($UID = NULL, $type = NULL, $sender = NULL) {
        $SQL_LineRecord = new kSQL('LineRecord');
        $replyrecord = $SQL_LineRecord->SetAction('select')
                ->SetWhere("create_at >= '" . date('Y-m-d H:i:s', strtotime('-30 sec')) . "'")
                ->SetWhere("subject LIKE '%" . '"replyToken":"' . "%'")
                ->SetWhere("propertyA='" . $UID . "'")
                ->SetOrder("create_at DESC")
                ->SetLimit(1)
                ->BuildQuery();
        
        if ($replyrecord[0]) { //撈取 此UID 30秒內 最後一筆含有 replyToken 的 line_record，若有撈到值，則嘗試reply，否則繼續執行底下push
            $replyState = json_decode($replyrecord[0]['subject']['state'], true);
            $replyToken = $replyState['replyToken'];
            $SQL_LineLog = new kSQL('LineLog');
            $logExist = $SQL_LineLog->SetAction('select')
                    ->SetWhere("create_at >= '" . date('Y-m-d H:i:s', strtotime('-30 sec')) . "'")
                    ->SetWhere("subject LIKE '%" . '"replyToken":"' . $replyToken . "%'")
                    ->SetWhere("propertyA='" . $UID . "'")
                    ->SetWhere("next='reply'")
                    ->SetOrder("create_at DESC")
                    ->SetLimit(1)
                    ->BuildQuery('subject:subject');
            if ($replyToken && ($replyrecord[0]['next'] != 'reply' && !$logExist)) { //如果replyToken有值，且此replyToken尚未被reply
                $replyTime = strtotime(date('Y-m-d H:i:s')) - substr($replyState['timestamp'], 0, -3);
//                $this->text(strtotime(date('Y-m-d H:i:s')) . '-' . substr($replyState['timestamp'], 0, -3) . '=' . $replyTime);
                if ($replyTime <= 30) { //30秒內，則嘗試reply
                    $this->events['replyToken'] = $replyToken;
                    $this->events['source']['userId'] = $UID;
                    $dataTmp = $this->action['data'];
                    $this->state = $this->reply($type, $sender);
                    if (!$this->state) { //如果 reply無回傳錯誤(reply成功)，則exit
                        return '';
                    }
                }
            }
        }
        //否則繼續執行底下push
        return $dataTmp ? $dataTmp : $this->action['data'];
    }

    function push($UID = NULL, $type = NULL, $sender = NULL) {
        if ($UID) {
            $Check = $this->CheckReplyToken($UID, $type, $sender);
            if (!$Check) {
                return '';
            } else {
                $this->action['data'] = $Check;
            }
        }

        $return['data'] = [
            "to" => $UID,
            "messages" => $this->action['data']
        ];
        if (!empty($return['data']['messages']) && is_array($return['data']['messages'])) {
            unset($return_to_line);
            $return_to_line['to'] = $UID;
            foreach ($return['data']['messages'] as $key => $item) {
                $return_to_line['messages'][$key] = $item;
                if ($sender) {
                    if ($sender['name']) {
                        $return['data']['messages'][$key]['sender']['name'] = $return_to_line['messages'][$key]['sender']['name'] = $sender['name'];
                    }
                    if ($sender['iconUrl']) {
                        $return['data']['messages'][$key]['sender']['iconUrl'] = $return_to_line['messages'][$key]['sender']['iconUrl'] = $sender['iconUrl'];
                    }
                }
                if ($item['type'] == 'text') {
                    $_return = $this->Translate_Emoticon($item['text']);
                    $return['data']['messages'][$key]['reltext'] = $return_to_line['messages'][$key]['text'] = $_return['text'];
                    if ($_return['emojis']) {
                        $return['data']['messages'][$key]['emojis'] = $return_to_line['messages'][$key]['emojis'] = $_return['emojis'];
                    }
                    if ($item['quickReply']) {
                        $quickReplyTmp = $item['quickReply'];
                        unset($return['data']['messages'][$key]['quickReply']);
                        unset($return_to_line['messages'][$key]['quickReply']);
                        $return['data']['messages'][$key]['quickReply'] = $return_to_line['messages'][$key]['quickReply'] = $quickReplyTmp;
                    }
                }
            }
        }
        if ($this->action) {
            $context = stream_context_create(array(
                "http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->header), "content" => json_encode($return_to_line, JSON_UNESCAPED_UNICODE), "ignore_errors" => true)
            ));
            $this->state = file_get_contents($this->push_url, false, $context);
            $this->log_v2(array(
                'for' => $UID,
                'type' => __FUNCTION__,
                'state' => $this->state,
                'message' => $return['data'],
                'group' => NULL,
                'action' => $type,
                'RequestId' => $this->GetHeader($http_response_header, 'x-line-request-id'),
            ));
            $this->action['data'] = [];
            $this->state = json_decode($this->state, true);
            return $this->state;
        }
    }

    function multicast($MemberList = NULL) {
        if (!$MemberList) {
            $SQL_LineMember = new kSQL('LineMember');
            $FollowList = $SQL_LineMember->SetAction('select')
                                        ->SetWhere("tablename='member'")
                                        ->SetWhere("viewB!='on' OR viewB IS NULL ")
                                        ->SetWhere("prev1='follow'")
                                        ->SetWhere("next='myself'")
                                        ->SetWhere("propertyA!=''")
                                        ->SetOrder('id ASC')
                                        ->BuildQuery();
            if ($FollowList) {
                $MemberList = array_column($FollowList, 'propertyA');
            }
        }
        $members_box = array_chunk($MemberList, 150);
        if (!empty($members_box)) {
            $SendCount = count($members_box);
            $SendSubCount = 0;
            foreach ($members_box as $key => $post) {
                if ($this->action['data']) {//$members&&
                    $return['data'] = [
                        "to" => $post,
                        "messages" => $this->action['data']
                    ];
                    if (!empty($return['data']['messages']) && is_array($return['data']['messages'])) {
                        $return_to_line = array(
                            "to" => $post
                        );
                        foreach ($return['data']['messages'] as $key => $item) {
                            $return_to_line['messages'][$key] = $item;
                            if ($item['type'] == 'text') {
                                $_return = $this->Translate_Emoticon($item['text']);
                                $return['data']['messages'][$key]['reltext'] = $return_to_line['messages'][$key]['text'] = $_return['text'];
                                if ($_return['emojis']) {
                                    $return['data']['messages'][$key]['emojis'] = $return_to_line['messages'][$key]['emojis'] = $_return['emojis'];
                                }
                                if ($item['quickReply']) {
                                    $quickReplyTmp = $item['quickReply'];
                                    unset($return['data']['messages'][$key]['quickReply']);
                                    unset($return_to_line['messages'][$key]['quickReply']);
                                    $return['data']['messages'][$key]['quickReply'] = $return_to_line['messages'][$key]['quickReply'] = $quickReplyTmp;
                                }
                            }
                        }
                    }
                    $context = stream_context_create(array(
                        "http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->header), "content" => json_encode($return_to_line), "ignore_errors" => true)
                    ));
                    $this->state = file_get_contents($this->multicast_url, false, $context);
                    sleep(20);
                    $this->log_v2(array(
                        'for' => NULL,
                        'type' => __FUNCTION__,
                        'state' => $this->state,
                        'message' => $return['data'],
                        'group' => $post,
                        'action' => NULL,
                        'RequestId' => $this->GetHeader($http_response_header, 'x-line-request-id'),
                    ));
                    $LogList[] = $this->log_return_node;
                    $SendSubCount++;
                    if ($SendSubCount == $SendCount) {
                        $this->action['data'] = [];
                    }
                    $this->state = json_decode($this->state, true);
                    if ($this->state['message']) {
                        if ($failList) {
                            $failList = array_merge($failList, $post);
                        } else {
                            $failList = $post;
                        }
                        $fail += count($post);
                    }
                }
            }
        }

        /*
         * 回傳 : 總人數、總推播數、失敗人數、各Log的Node
         */

        $total = count($MemberList);
        if ($total) {
            $this->state['total'] = $total; //總人數
        }
        if ($SendCount) {
            $this->state['SendCount'] = $SendCount; //總推播數(總人數/150)
        }
        if ($failList) {
            $this->state['failList'] = $failList; //失敗清單
        }
        if ($fail) {
            $this->state['fail'] = $fail; //失敗人數
        }
        if (!empty($LogList) && is_array($LogList)) {
            $LogList_unique = array_unique($LogList);
            $LogList_values = array_values($LogList_unique);
            $this->state['LogList'] = $LogList_values; //各Log的Node
        }
        return $this->state;
    }
    
    function content($contentId = NULL) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->message_url . '/' . $contentId . '/content',
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
                "authorization: Bearer {" . $this->channel_access_token . "}",
                "X-Line-Content-Api-Version: v2"
            ),
        ));
        $response = curl_exec($curl);
        $return['response'] = $response;
        $return['httpcode'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $return['ERROR'] = curl_error($curl);
        $return['HEADER_SIZE'] = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $return['CONTENT_SIZE'] = curl_getinfo($curl, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
        $return['HEADER'] = substr($response, 0, $return['HEADER_SIZE']);
        $return['BODY'] = substr($response, $return['HEADER_SIZE']);
        $return['TYPE'] = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
        $return['base64'] = base64_encode($return['BODY']);
        $return['URL'] = $this->message_url . '/' . $contentId . '/content';
        curl_close($curl);
        return $return;
    }
    
    function contentB($type = NULL, $contentId = NULL) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->message_url . '/' . $contentId . '/content',
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
        return $return;
    }
    
    function profile($id) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->profile_url . '/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer {" . $this->channel_access_token . "}",
                "cache-control: no-cache",
                "postman-token: 619cf5c0-ff36-aace-8b38-e61d5eee7025"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $this->profileData = NULL;
            $this->profileData['error'] = $err;
        } else {
            $response = json_decode($response);
            $this->profileData['displayName'] = $response->displayName;
            $this->profileData['userId'] = $response->userId;
            $this->profileData['pictureUrl'] = $response->pictureUrl;
        }
    }
    
    function profile2($id) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->profile_url . '/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer {" . $this->channel_access_token . "}",
                "cache-control: no-cache",
                "postman-token: 619cf5c0-ff36-aace-8b38-e61d5eee7025"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $this->profileData = NULL;
            $this->profileData['error'] = $err;
        } else {
            $response = json_decode($response);
            if ($response->displayName) {
                $response->displayName = $response->displayName;
            }
            return $response;
        }
    }
    
    function BotInfo() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->get_url . 'info',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer {" . $this->channel_access_token . "}"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $err = json_decode($err, true);
            return $err;
        } else {
            $BotInfo = json_decode($response, true);
            if($BotInfo['basicId']){
                define('__BotInfo', $BotInfo);
                define('__LineAtID', str_replace('@', '', $BotInfo['basicId']));
                $this->LineAtId = __LineAtID;
                if(0){
                    $_LineAtPic = '';
                    $_LineAtName = '';
                }else{
                    $_LineAtPic = $BotInfo['pictureUrl'];
                    $_LineAtName = $BotInfo['displayName'];
                    //userId、chatMode、markAsReadMode
                }
                define("_LineAtPic", $_LineAtPic);
                define("_LineAtName", $_LineAtName);
            }
            return $BotInfo;
        }
    }
    
    function GroupProfile($groupId, $userId) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.line.me/v2/bot/group/' . $groupId . '/member/' . $userId,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer {" . $this->channel_access_token . "}",
                "cache-control: no-cache",
                "postman-token: 619cf5c0-ff36-aace-8b38-e61d5eee7025"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $this->profileData = NULL;
            $this->profileData['error'] = $err;
        } else {
            $response = json_decode($response);
            return $response;
        }
    }
    
    function GetGroupMember($groupId = NULL, $continuationToken = NULL) {
        if ($continuationToken) {
            $GetGroupMemberCURL = 'https://api.line.me/v2/bot/group/' . $groupId . '/members/ids?start=' . $continuationToken;
        } else {
            $GetGroupMemberCURL = 'https://api.line.me/v2/bot/group/' . $groupId . '/members/ids';
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $GetGroupMemberCURL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer {" . $this->channel_access_token . "}",
                "cache-control: no-cache",
                "postman-token: 619cf5c0-ff36-aace-8b38-e61d5eee7025"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $this->profileData = NULL;
            $this->profileData['error'] = $err;
        } else {
            return $response;
        }
    }
    
    function RoomProfile($roomId, $userId) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.line.me/v2/bot/room/' . $roomId . '/member/' . $userId,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer {" . $this->channel_access_token . "}",
                "cache-control: no-cache",
                "postman-token: 619cf5c0-ff36-aace-8b38-e61d5eee7025"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $this->profileData = NULL;
            $this->profileData['error'] = $err;
        } else {
            $response = json_decode($response);
            return $response;
        }
    }
    
    function GetRoomMember($roomId = NULL, $continuationToken = NULL) {
        if ($continuationToken) {
            $GetRoomMemberCURL = 'https://api.line.me/v2/bot/room/' . $roomId . '/members/ids?start=' . $continuationToken;
        } else {
            $GetRoomMemberCURL = 'https://api.line.me/v2/bot/room/' . $roomId . '/members/ids';
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $GetRoomMemberCURL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer {" . $this->channel_access_token . "}",
                "cache-control: no-cache",
                "postman-token: 619cf5c0-ff36-aace-8b38-e61d5eee7025"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $this->profileData = NULL;
            $this->profileData['error'] = $err;
        } else {
            return $response;
        }
    }
    
    function SetMessageObject($message = NULL) {
        $this->action['data'][] = $message;
        return $this;
    }
    
    function SetMessages($messages=NULL, $ReplyOrPush='reply', $sender=NULL) {
        if (!empty($messages)) {
            $MsgCtn = count($this->action['data']);
            for ($loop = 0; $loop <= 4 - $MsgCtn; $loop++) {
                switch ($messages['subject']['type_' . $loop]) {
                    case'UrlMsg':
                    case'KeyWordMsg':
                    case'LineBeacon':
                        $SQL_qa = new kSQL($messages['subject']['type_' . $loop]);
                        $QAList = $SQL_qa->SetAction('select')
                                ->SetWhere("id='" . $messages['subject']['value_' . $loop] . "'")
                                ->BuildQuery();
                        $state = $this->SetMessages($QAList[0]);
                        break;
                    case'text':
                        $state = $this->text($messages['subject']['value_' . $loop]);
                        break;
                    case'sticker':
                        $sticker = explode('_', $messages['subject']['value_' . $loop]);
                        $packageId = $sticker[0];
                        $stickerId = $sticker[1];
                        $state = $this->sticker($packageId, $stickerId);
                        break;
                    case'image':
                        $originalContentUrl = __WEB_UPLOAD . '/image/' . $messages['subject']['value_' . $loop];
                        $previewImageUrl = __WEB_UPLOAD . '/image/' . $messages['subject']['value_' . $loop];
                        $state = $this->image($originalContentUrl, $previewImageUrl);
                        break;
                    case'video':
                        $filename = explode('.', $messages['subject']['value_' . $loop]);
                        $originalContentUrl = __WEB_UPLOAD . '/video/' . $filename[0] . '.mp4';
                        $previewImageUrl = __WEB_UPLOAD . '/image/' . $filename[0] . '.jpg';
                        $trackingId = $messages['subject']['value_' . $loop];
                        $state = $this->video($originalContentUrl, $previewImageUrl, $trackingId);
                        break;
                    case'audio':
                        $getID3 = new getID3();
                        $ThisFileInfo = $getID3->analyze(__ROOT_UPLOAD . '/audio/' . $messages['subject']['value_' . $loop]);
                        $originalContentUrl = __WEB_UPLOAD . '/audio/' . $messages['subject']['value_' . $loop];
                        $duration = $ThisFileInfo['playtime_seconds'] ? $ThisFileInfo['playtime_seconds']*1000 : 10000;
                        $state = $this->audio($originalContentUrl, $duration);
                        break;
                    case'ImageMap':
                    case'imagemap':
                        $this->ImageMapType = "flex";//imagemap、flex
                        if($this->ImageMapType=='flex' || $ReplyOrPush!='liff'){
                            $SQL_ImageMap = new kSQL('ImageMap');
                            if (!empty($messages['subject']['value_' . $loop])) {
                                $imagemap = $SQL_ImageMap
                                        ->SetAction('select')
                                        ->SetWhere("id='" . $messages['subject']['value_' . $loop] . "'")
                                        ->BuildQuery();
                                $imagemap = $imagemap[0];
                                if ($imagemap) {
                                    $title = $imagemap['subject']['subject'];
                                    $imagemap['ReplyOrPush'] = $ReplyOrPush;
                                    $action = json_decode($imagemap['subject']['actions'], true);
                                    if($action){
                                        foreach ($action as $actionkey => $actionval) {
                                            $action[$actionkey]['area']['x'] = $actionval['area']['x']>0 ? $actionval['area']['x'] : 0;
                                            $action[$actionkey]['area']['y'] = $actionval['area']['y']>0 ? $actionval['area']['y'] : 0;
                                            if($actionval['type']==='noaction' || 
                                                ($actionval['type']==='uri'&&empty($actionval['linkUri'])) || 
                                                ($actionval['type']==='message'&&(empty($actionval['text'])||$ReplyOrPush=='liff'))){
                                                    unset($action[$actionkey]);
                                            }
                                        }
                                        $action = array_values($action);
                                    }
                                    $imagemapImage =  __WEB_UPLOAD . '/image/' . $imagemap['subject']['img0'];
                                    $imginfo = getimagesize($imagemapImage);  
                                    $width = $imginfo[0];
                                    $height = $imginfo[1];
                                    $state = $this->imagemap($title, $imagemapImage.'?/1040', $height, $width, $action);
                                }
                            }
                        }
                        break;
                    case'ImageCarousel':
                    case'imagecarousel':
                        $SQL_ImageCarousel = new kSQL('ImageCarousel');
                        if (!empty($messages['subject']['value_' . $loop])) {
                            $imagecarousel = $SQL_ImageCarousel
                                    ->SetAction('select')
                                    ->SetWhere("id='" . $messages['subject']['value_' . $loop] . "'")
                                    ->BuildQuery();
                            $imagecarousel = $imagecarousel[0];
                            if ($imagecarousel) {
                                $imagecarousel['ReplyOrPush'] = $ReplyOrPush;
                                $TemplateClass = new TemplateClass();
                                $state = $TemplateClass->ProcessImageColumns($this, $imagecarousel);
                            }
                        }
                        break;
                    case'LineTemplate':
                    case'linetemplate':
                        $SQL_LineTemplate = new kSQL('LineTemplate');
                        if (!empty($messages['subject']['value_' . $loop])) {
                            $linetemplate = $SQL_LineTemplate
                                    ->SetAction('select')
                                    ->SetWhere("id='" . $messages['subject']['value_' . $loop] . "'")
                                    ->BuildQuery();
                            $linetemplate = $linetemplate[0];
                            if ($linetemplate) {
                                $linetemplate['ReplyOrPush'] = $ReplyOrPush;
                                $TemplateClass = new TemplateClass();
                                $state = $TemplateClass->ProcessColumns($this, $linetemplate);
                            }
                        }
                        break;
                    case'CustomMessage':
                    case'custom':
                        $SQL_CustomMessage = new kSQL('CustomMessage');
                        if (!empty($messages['subject']['value_' . $loop])) {
                            $custommessage = $SQL_CustomMessage
                                    ->SetAction('select')
                                    ->SetWhere("id='" . $messages['subject']['value_' . $loop] . "'")
                                    ->BuildQuery();
                            $custommessage = $custommessage[0];
                            if ($custommessage) {
                                $custommessage['ReplyOrPush'] = $ReplyOrPush;
                                $FlexMsg = json_decode($custommessage['subject']['data'], true);
                                $FlexMsg['altText'] = $custommessage['subject']['subject'];
                                $this->action['data'][] = $FlexMsg;
                            }
                        }
                        break;
                }
            }
            if($ReplyOrPush!='liff'){
                if( !empty($this->action['data']) && !empty($sender) && (!empty($sender['name'])||!empty($sender['iconUrl'])) ){
                    if(!empty($sender['iconUrl'])){
                        $sender['iconUrl'] = __WEB_UPLOAD . '/image/' . $sender['iconUrl'];
                    }
                    foreach ($this->action['data'] as $DataKey => $DataValue) {
                        $this->action['data'][$DataKey]['sender'] = $sender;
                    }
                }
                if ($messages['subject']['QuicklyReply']) {
                    $SQL_QuicklyReply = new kSQL("QuicklyReply");
                    $quickReply = $SQL_QuicklyReply
                            ->SetAction('select')
                            ->SetWhere("id='" . $messages['subject']['QuicklyReply'] . "'")
                            ->BuildQuery();
                    $quickReply = $quickReply[0];
                    if ($quickReply) {
                        $qR_items = array();
                        for ($Q_Ctn = 0; $Q_Ctn < 10; $Q_Ctn++) {
                            $qR_subject = $quickReply['subject']['subject' . $Q_Ctn . '_0'];
                            $qR_action = $quickReply['subject']['action' . $Q_Ctn . '_0'];
                            $qR_data = $quickReply['subject']['data' . $Q_Ctn . '_0'];
                            $qR_pic = $quickReply['subject']['img' . $Q_Ctn];
                            if ($qR_subject && $qR_action && $qR_data) {
                                $qR_query = array();
                                $qR_query['label'] = $qR_subject;
                                switch($qR_action){
                                    case 'text':
                                        $qR_query['type'] = 'message';
                                        $qR_query['text'] = $qR_data;
                                        break;
                                    case 'hyperlink':
                                        $qR_query['type'] = 'uri';
                                        $qR_query['uri'] = $qR_data;
                                        break;
                                    case 'postback':
                                        $qR_query['type'] = 'postback';
                                        //$qR_query['text'] = $qR_subject;
                                        $qR_query['data'] = $qR_data;
                                        break;
                                }
                                if ($qR_pic) {
                                    $qR_query['imageUrl'] = __WEB_UPLOAD . '/image/' . $qR_pic;
                                }
                                $qR_items[] = $this->quickReply_action($qR_query);
                            }
                        }
                        $LastMsg = count($this->action['data']) - 1;
                        if ($LastMsg >= 0) {
                            $this->action['data'][$LastMsg]['quickReply'] = array(
                                "items" => $qR_items
                            );
                        }
                    }
                }
            }
        }
        return $this;
    }
    
    function SetActions($item = NULL, $columnsList = NULL, $action_item = NULL) {
        $item['ReplyOrPush'] = ($item['ReplyOrPush']) ? $item['ReplyOrPush'] : 'reply';
        $Ctn = ($action_item >= 0) ? $columnsList . '_' . $action_item : $columnsList;
        switch ($item['subject']['action' . $Ctn]) {
            case'text':
                $content = $item['subject']['data' . $Ctn];
                $label = $item['subject']['subject' . $Ctn];
                $type = 'message';
                break;
            case'hyperlink':
                $content = kCore_Url(urlencode($item['subject']['data' . $Ctn]));
                $label = $item['subject']['subject' . $Ctn];
                $type = 'uri';
                break;
            case'postback':
                $content = $item['subject']['data' . $Ctn];
                $label = $item['subject']['subject' . $Ctn];
                $type = 'postback';
                break;
            case'noaction':
                $content = 'NULL';
                $label = NULL; //無按鈕，無動作
                //$label = '　';//有按鈕，無動作
                $type = 'postback';
                break;
        }
        if ($type && $label && $content) {
            $action = $this->messageObject($type, $label, $content, $buttonBGColor, $buttonColor);
        }
        return $action;
    }
    
    function getQuota($param=NULL) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->quota_url . '/' . $param,//consumption
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer {" . $this->channel_access_token . "}",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $this->profileData = NULL;
            $this->profileData['error'] = $err;
        } else {
            $response = json_decode($response, true);
            return $response;
        }
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
                $this->log_return_node = $SQL_LineLog->getAuto_INCREMENT();
                $content = array_filter([
                    "contentA" => $state,
                    "contentB" => $gorup,
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
    
    private function log_v2($_this) {
        switch ($_this['action']) {
            case'service'://客服對話歸屬對話紀錄
            case'pershing':
                $SQL_LineRecord = new kSQL('LineRecord');
                $this->log_return_node = $SQL_LineRecord->getAuto_INCREMENT();
                $SQL_LineRecord->SetAction('insert')
                        ->SetValue('tablename', 'line')
                        ->SetValue('subject', json_encode($_this['message']))
                        ->SetValue('update_at', $SQL_LineRecord->getNowTime())
                        ->SetValue('create_at', $SQL_LineRecord->getNowTime())
                        ->SetValue('prev', $_this['action'])
                        ->SetValue('next', $_this['type'])
                        ->SetValue('propertyA', $_this['for'])
                        ->SetValue('propertyB', $_this['RequestId'])
                        ->SetValue("content", $_this['state'])
                        ->SetValue('prev1', !empty($this->RecordSystemIndex) ? $this->RecordSystemIndex : NULL)
                        ->BuildQuery();
                break;
            default ://推播、排程、關鍵字...等log
                $SQL_LineLog = new kSQL('LineLog');
                $this->log_return_node = $SQL_LineLog->getAuto_INCREMENT();
                $content = array_filter([
                    "contentA" => $_this['state'],
                    "contentB" => $_this['group'],
                ]);
                $subject = array_filter([
                    "subject" => $_this['message'],
                    "items" => $_this['items'],
                ]);
                $SQL_LineLog
                        ->SetAction('insert')
                        ->SetValue("tablename", "line")
                        ->SetValue('update_at', $SQL_LineLog->getNowTime())
                        ->SetValue('create_at', $SQL_LineLog->getNowTime())
                        ->SetValue('propertyA', $_this['for'])
                        ->SetValue('propertyB', $_this['RequestId'])
                        ->SetValue('prev', $_this['action'])
                        ->SetValue('next', $_this['type'])
                        ->SetValue("subject", json_encode($subject))
                        ->SetValue("content", json_encode($content))
                        ->SetValue('prev1', !empty($this->RecordSystemIndex) ? $this->RecordSystemIndex : NULL)
                        ->BuildQuery();
                break;
        }
        return $this->log_return_node;
    }
    
    /*
     * 正規搜尋並轉譯表情(新版)
     */
    private function Translate_Emoticon($String) {
        $NewString = $String;
        $emojis = array();
        include 'emList.php';
        if ($emList) {
            $em = array_keys($emList);
            foreach ($emList as $emojiKey => $emojiVal) {
                if(strpos($NewString, $emojiKey) !== false){ 
                    if(count($emojis) >= 20){
                        break;
                    }
                    $emTmp = array_replace([], $em); //複製 $em
                    unset($emTmp[array_search($emojiKey, $emTmp)]); //移除 暫存$em中的$emojiKey(排除自己)
                    $StringTmp = str_replace($emTmp, "○", $String); //排除除了自己以外的emoji，並將排除的emoji替換成○(隨便一個位元的不常見符號)
                    $Search = explode($emojiKey, $StringTmp); //已$emojiKey來分割 排除除了自己以外emoji的字串
                    if (count($Search) > 1) {
                        foreach ($Search as $no => $item) {
                            if(count($emojis) >= 20){
                                break;
                            }
                            if ($no > 0) {
                                $Front = '';
                                for ($i = 0; $i < $no; $i++) {
                                    $Front .= $Search[$i];
                                }
                                $StrLen = strlen(iconv('utf-8', 'utf-16le', $Front)) / 2;
                                $emoji["index"] = $StrLen + $no - 1; //前面除了emoji的字數 + emoji的數量 - 1(因0開始)
                                $emoji["productId"] = $emojiVal["productId"]; //表情貼頁編號
                                $emoji["emojiId"] = $emojiVal["emojiId"]; //表情貼編號
                                $emojis[] = $emoji;
                            }
                        }
                    }
                }
            }
            $NewString = str_replace($em, "$", $String);
        }

        $_return['text'] = $NewString;
        $_return['emojis'] = $emojis;
        return $_return;
    }
    
    function RichMenuGet($userId = NULL) {
        if ($userId) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.line.me/v2/bot/user/' . $userId . '/richmenu',
                CURLOPT_RETURNTRANSFER => TRUE, //不會直接print【$response】出來
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "authorization: Bearer {" . $this->channel_access_token . "}",
                    "cache-control: no-cache",
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                $this->profileData = NULL;
                $this->profileData['error'] = $err;
            } else {
                $response = json_decode($response, true);
                return $response;
            }
        }
    }
    
    function CheckWebhookStatus() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.line.me/v2/bot/channel/webhook/endpoint',
            CURLOPT_RETURNTRANSFER => TRUE, //不會直接print【$response】出來
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer {" . $this->channel_access_token . "}",
                "Content-Type:application/json",
            ),
        ));
        $responseTmp = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $response = json_decode($err, true);
        } else {
            $response = json_decode($responseTmp, true);
        }
        
        return $response;
    }
    
    function SetDefaultRichMenu($richMenuId = NULL) {
        return $this->UpdateDefaultRichMenu("POST", '/' . $richMenuId);
    }
    
    function GetDefaultRichMenu() {
        return $this->UpdateDefaultRichMenu("GET", '');
    }
    
    function CancelDefaultRichMenu() {
        return $this->UpdateDefaultRichMenu("DELETE", '');
    }
    
    function UpdateDefaultRichMenu($action, $richMenuId = NULL) {
        $this->content_header = ["Authorization: Bearer {" . $this->channel_access_token . "}"];
        $context = stream_context_create(array(
            "http" => array("method" => $action, "header" => implode(PHP_EOL, $this->content_header), "content" => json_encode($this->action['data']), "ignore_errors" => true)
        ));
        $this->state = file_get_contents('https://api.line.me/v2/bot/user/all/richmenu' . $richMenuId, false, $context);
        if ($this->state) {
            $this->state = json_decode($this->state, true);
        }
        $this->action['data'] = [];
        return $this->state;
    }
    
    function RichMenuList() {
        //image/jpeg image/png
        $this->content_header = ["Authorization: Bearer {" . $this->channel_access_token . "}"];
        $context = stream_context_create(array(
            "http" => array("method" => "GET", "header" => implode(PHP_EOL, $this->content_header))
        ));
        $this->state = file_get_contents('https://api.line.me/v2/bot/richmenu/list', false, $context);
        $this->state = json_decode($this->state, true);
        $this->action['data'] = [];
        return $this->state;
    }
    
    function RichMenuCreate($size, $selected, $name, $chatBarText, $areas) {
        $this->action['data'] = [
            "size" => $size,
            "selected" => ($selected==='on') ? true : false,
            "name" => $name,
            "chatBarText" => $chatBarText,
            "areas" => $areas
        ];

        $context = stream_context_create(array(
            "http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->header), "content" => json_encode($this->action['data']), "ignore_errors" => true)
        ));
        $this->state = file_get_contents($this->richmenu_url, false, $context);
        $this->state = json_decode($this->state, true);
        $this->action['data'] = [];
        return $this->state;
    }
    
    function RichMenuDelete($richMenuId) {
        //image/jpeg image/png
        $this->content_header = ["Authorization: Bearer {" . $this->channel_access_token . "}"];
        $context = stream_context_create(array(
            "http" => array("method" => "DELETE", "header" => implode(PHP_EOL, $this->content_header), "ignore_errors" => true)
        ));
        $this->state = file_get_contents('https://api.line.me/v2/bot/richmenu/' . $richMenuId, false, $context);
        $this->action['data'] = [];
        return json_decode($this->state, true);
    }
    
    function RichMenuUpload($richMenuId, $Image, $type) {
        //image/jpeg image/png
        $SSL_Options = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $this->content_header = ["Content-Type:" . $type, "Authorization: Bearer {" . $this->channel_access_token . "}"];
        $context = stream_context_create(array(
            "http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->content_header), "content" => file_get_contents($Image, false, stream_context_create($SSL_Options)), "ignore_errors" => true)
        ));
        $this->state = file_get_contents('https://api-data.line.me/v2/bot/richmenu/' . $richMenuId . '/content', false, $context);
        $this->state=  json_decode($this->state, true);
        return $this->state;
    }
    
    function RichMenuDownload($richMenuId = NULL) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-data.line.me/v2/bot/richmenu/' . $richMenuId . '/content',
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
                "authorization: Bearer {" . $this->channel_access_token . "}",
                "X-Line-Content-Api-Version: v2"
            ),
        ));
        $response = curl_exec($curl);
        $return['response'] = $response;
        $return['httpcode'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $return['ERROR'] = curl_error($curl);
        $return['HEADER_SIZE'] = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $return['CONTENT_SIZE'] = curl_getinfo($curl, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
        $return['HEADER'] = substr($response, 0, $return['HEADER_SIZE']);
        $return['BODY'] = substr($response, $return['HEADER_SIZE']);
        $return['TYPE'] = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
        $return['base64'] = base64_encode($return['BODY']);
        $return['URL'] = 'https://api-data.line.me/v2/bot/richmenu/' . $richMenuId . '/content';
        switch ($return['TYPE']) {
            case 'audio/aac':
                $return['Extension'] = ".aac";
                break;
            case 'audio/x-m4a':
                $return['Extension'] = ".m4a";
                break;
            case 'video/mp4':
                $return['Extension'] = ".mp4";
                break;
        }
        curl_close($curl);
        return $return;
    }
    
    function RichMenuDownload_V1($richMenuId) {
        $this->content_header = ["Authorization: Bearer {" . $this->channel_access_token . "}", "X-Line-Content-Api-Version: v2"];
        $context = stream_context_create(array(
            "http" => array("method" => "GET", "header" => implode(PHP_EOL, $this->content_header), "ignore_errors" => true)
        ));
        $this->state = file_get_contents('https://api-data.line.me/v2/bot/richmenu/' . $richMenuId . '/content', false, $context);
        return $this->state;
    }
    
    function RichMenuLink($richMenuId, $userId) {
        $this->action['data'] = [
            "richMenuId" => $richMenuId,
            "userId" => $userId,
        ];
        $context = stream_context_create(array(
            "http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->content_header), "content" => json_encode($this->action['data']), "ignore_errors" => true)
        ));
        $this->state = file_get_contents('https://api.line.me/v2/bot/user/' . $userId . '/richmenu/' . $richMenuId, false, $context);
        $this->state = json_decode($this->state, true);
        $this->action['data'] = [];
        return $this->state;
    }
    
    function RichMenuUnlink($userId) {
        $this->action['data'] = [
            "userId" => $userId
        ];
        $context = stream_context_create(array(
            "http" => array("method" => "DELETE", "header" => implode(PHP_EOL, $this->content_header), "content" => json_encode($this->action['data']), "ignore_errors" => true)
        ));
        $this->state = file_get_contents('https://api.line.me/v2/bot/user/' . $userId . '/richmenu', false, $context);
        $this->state = json_decode($this->state, true);
        $this->action['data'] = [];
        return $this->state;
    }
    
    function RichMenu_Multiple_Link($richMenuId, $userIds) {
        $this->content_header = ["Content-Type:" . "application/json", "Authorization: Bearer {" . $this->channel_access_token . "}"];
        $this->action['data'] = [
            "richMenuId" => $richMenuId,
            "userIds" => $userIds
        ];
        $context = stream_context_create(array(
            "http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->content_header), "content" => json_encode($this->action['data']), "ignore_errors" => true)
        ));
        $this->state = file_get_contents('https://api.line.me/v2/bot/richmenu/bulk/link', false, $context);
        $this->state = json_decode($this->state, true);
        $this->action['data'] = [];
        return $this->state;
    }
    
    function RichMenu_Multiple_UnLink($userIds) {
        $this->content_header = ["Content-Type:" . "application/json", "Authorization: Bearer {" . $this->channel_access_token . "}"];
        $this->action['data'] = [
            "userIds" => $userIds
        ];
        $context = stream_context_create(array(
            "http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->content_header), "content" => json_encode($this->action['data']), "ignore_errors" => true)
        ));
        $this->state = file_get_contents('https://api.line.me/v2/bot/richmenu/bulk/unlink', false, $context);
        $this->state = json_decode($this->state, true);
        $this->action['data'] = [];
        return $this->state;
    }
    
    /*
     * 取得Notify access_token
     */
    function GetNotifyToken($code = NULL) {
        if($code){
            $this->action['data'] = [
                "grant_type" => "authorization_code",
                "code" => $code,
                "redirect_uri" => __CustomStickers_Web . '/ft/line_notify_callback',
                "client_id" => __LineNotifyID,
                "client_secret" => __LineNotifySecret,
            ];
            $context = stream_context_create(array(
                "http" => array("method" => "POST", "content" => http_build_query($this->action['data']), "ignore_errors" => true)
            ));
            $this->state = file_get_contents('https://notify-bot.line.me/oauth/token', false, $context);
            $this->state = json_decode($this->state, true);
            return $this->state;
        }
    }
    
    /*
     * 使用Notify推播訊息
     */
    function PushNotify($token = NULL, $message = NULL, $type = NULL) {
        if($token){
            //順序固定，不能調整 : 【文字、貼圖；圖片】
            $message['message'] = $message['message'] ? $message['message'] : ' ';
            $this->action['data'] = array_filter($message);
            $this->content_header = ["Authorization: Bearer $token"];
            $context = stream_context_create(array(
                "http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->content_header), "content" => http_build_query($this->action['data']), "ignore_errors" => true)
            ));
            $this->state = file_get_contents('https://notify-api.line.me/api/notify', false, $context);
            /*
             * X-RateLimit-Limit            每小時API調用的限制
             * X-RateLimit-Remaining        可能剩餘的API調用次數
             * X-RateLimit-ImageLimit       每小時上傳圖片的數量限制
             * X-RateLimit-ImageRemaining   可能剩餘的上傳圖片數量
             * X-RateLimit-Reset            重置限制的時間（UTC紀元秒）
             */
            $return['body'] = json_decode($this->state, true);
            if($http_response_header){
                $return['header'] = array();
                foreach ($http_response_header as $key => $value) {
                    if(strpos($value, 'X-RateLimit-') !== false){
                        $header = explode(': ', $value);
                        $return['header'][$header[0]] = $header[1];
                    }
                }
            }
            $this->log_v2(array(
                'for' => $token,
                'type' => 'notify',
                'state' => json_encode($return),
                'message' => $this->action['data'],
                'group' => NULL,
                'action' => $type,
                'RequestId' => $this->GetHeader($http_response_header, 'x-line-request-id'),
            ));
            $this->state = json_decode($this->state, true);
            return $this->state;
        }
    }
    
    /*
     * 取得聊天室資訊
     *      型態【USER、GROUP】
     *      名稱【displayName】
     */
    function NotifyProfile($token = NULL){
        if($token){
            $this->content_header = ["Authorization: Bearer $token"];
            $context = stream_context_create(array(
                "http" => array("method" => "GET", "header" => implode(PHP_EOL, $this->content_header), "ignore_errors" => true)
            ));
            $this->state = file_get_contents('https://notify-api.line.me/api/status', false, $context);
            /*
             * targetType : USER、GROUP
             * target : displayName
             */
            $this->state = json_decode($this->state, true);
            return $this->state;
        }
    }
    
    /*
     * 解除Notify連動
     */
    function RevokeNotify($token = NULL) {
        if($token){
            $this->content_header = ["Authorization: Bearer $token"];
            $context = stream_context_create(array(
                "http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->content_header), "ignore_errors" => true)
            ));
            $this->state = file_get_contents('https://notify-api.line.me/api/revoke', false, $context);
            $this->state = json_decode($this->state, true);
            return $this->state;
        }
    }
    
    /*
     * 回傳 : 總人數、總推播數、失敗人數、成功人數、成功率
     */
    function CountSuccessRate($total, $SendCount, $fail) {
        if (!$total) {
            $total = 0;
        }
        if (!$SendCount) {
            $SendCount = 0;
        }
        if (!$fail) {
            $fail = 0;
        }
        $success = $total - $fail;
        if (!$success) {
            $success = 0;
        }
        $SuccessRate = round($success / $total * 100, 2);
        if (!$SuccessRate) {
            $SuccessRate = 0;
        }

        return array(
            'total' => $total, //總人數
            'SendCount' => $SendCount, //總推播數
            'fail' => $fail, //失敗人數
            'success' => $success, //成功人數
            'SuccessRate' => $SuccessRate, //成功率
        );
    }
    
    function CreateMemberEventID($MemberEventID=NULL, $userId=NULL) {
        do {
            if (empty($MemberEventID) || $MemberEventID == '') {
                $MemberEventID = kCore_LineRand(6);
            }
            $SelectSameMemberEventID = $this->LineMessageDB_Membe->SetAction('select')
                                                                ->SetWhere("propertyB='$MemberEventID'")
                                                                ->SetWhere("propertyA!='" . !empty($userId)?$userId:$this->events['source']['userId'] . "'")
                                                                ->BuildQuery();
            if (!empty($SelectSameMemberEventID)) {
                unset($MemberEventID);
            }
        } while (!empty($SelectSameMemberEventID));
        return $MemberEventID;
    }
    
    function GetHeader($Header=NULL, $Item=NULL) {
        $HeaderList = array();
        if($Header){
            foreach ($Header as $key => $value) {
                $valueTmp = explode(': ', $value);
                $HeaderList[$valueTmp[0]] = $valueTmp[1];
            }
        }
        
        return $HeaderList[$Item];
    }
    
}
