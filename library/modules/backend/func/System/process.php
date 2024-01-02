<?php

    function EstimatedProcess($_this, $_Module){
        $return = array();
        $SQL_LineMember = new kSQL('LineMember');
        $_this->my = !empty($_this->my) ? $_this->my : json_decode(file_get_contents('php://input'), true);
        $filter = !empty($_this->my['fields']['content']['filter']) ? $_this->my['fields']['content']['filter'] : array();
        $FilterMembers = array();
        if(!empty($filter)){ //有篩選條件
            if(!empty($filter['Tags'])){
                $SQL_Tag = new kSQL('Tag');
                $SelectTagMember = $SQL_Tag->SetAction("select")
                                            ->SetWhere("tablename='Tag'")
                                            ->SetWhere("next='member'")
                                            ->SetWhere("prev IN ('". implode("','", $filter['Tags']) ."')")
                                            ->BuildQuery();
                $FilterMembers = !empty($SelectTagMember) ? array_values(array_unique(array_column($SelectTagMember, 'propertyA'))) : array();
            }
        }
        $SelectMembers = $SQL_LineMember->SetAction("select")
                                        ->SetWhere("tablename='member'")
                                        ->SetWhere("next='myself'")
                                        ->SetWhere("prev1='follow'")
                                        ->SetWhere("propertyA IN ('". implode("','", $FilterMembers) ."')", (!empty($filter)) ? 1 : 0)
                                        ->BuildQuery();
        $SelectAllMembers = $SQL_LineMember->SetAction("select")
                                            ->SetWhere("tablename='member'")
                                            ->SetWhere("next='myself'")
                                            ->SetWhere("prev1='follow'")
                                            ->BuildQuery();
        echo json_encode(array(
            'state' => true,
            'msg' => '預估發送人數/總人數 : '.count($SelectMembers).'/'.count($SelectAllMembers),
            'FilterMembers' => count($SelectMembers),
            'AllMembers' => count($SelectAllMembers),
            'FilterMemberList' => array_column($SelectMembers, 'propertyA'),
            'AllMemberList' => array_column($SelectAllMembers, 'propertyA'),
        ));
    }

    function SendFacebookMsg($_this, $_Module){
        $facebook = new kFacebookMessaging();
        if(!empty($_this->my['fields']['message'])){
            $facebook->text($_this->my['fields']['message']);
        }
        if($_this->my['fields']){
            for($M_Ctn=0;$M_Ctn<5;$M_Ctn++){
                if($_this->my['fields']['subject']['type_'.$M_Ctn] && $_this->my['fields']['subject']['value_'.$M_Ctn]){
                    $facebook->SetMessages($_this->my['fields'], $M_Ctn);
                }
            }
        }
        if(count($facebook->action['data']) <= 0){
            $return['state'] = false;
            $return['msg'] = '至少一則訊息';
        }else if(empty($_this->my['fields']['UID'])){
            $return['state'] = false;
            $return['msg'] = '請選擇要傳送的聊天室';
        }else{
            $FILE = new kFile();
            
            $FileReturn = $FILE->upload(); //上傳檔案
            if($FileReturn){
                foreach ($FileReturn as $FileKey => $FileCtn) {
                    if($FileKey=='subject' || $FileKey=='content'){
                        foreach ($FileCtn as $FileCtnKey => $FileValue) {
                            foreach ($FileValue as $FileValueKey => $value) {
                                $_this->my['fields'][$FileKey][$FileValueKey] = $value;
                            }
                        }
                    }
                }
            }
            $errorCtn = 0;
            $facebook->action['data'] = array();
            if(!empty($_this->my['fields']['message'])){
                $PushState = $facebook->text($_this->my['fields']['message'])->push($_this->my['fields']['UID'], $type = 'service', $sender = NULL);
                if($PushState['error']){
                    $errorCtn++;
                }
            }
            if($_this->my['fields']){
                for($M_Ctn=0;$M_Ctn<5;$M_Ctn++){
                    if($_this->my['fields']['subject']['type_'.$M_Ctn] && $_this->my['fields']['subject']['value_'.$M_Ctn]){
                        $PushState = $facebook->SetMessages($_this->my['fields'], $M_Ctn)->push($_this->my['fields']['UID'], $type = 'service', $sender = NULL);
                        if($PushState['error']){
                            $errorCtn++;
                        }
                    }
                }
            }
            $return['state'] = ($errorCtn==0) ? true : false;
            $return['msg'] = ($errorCtn==0) ? '訊息已發送' : $errorCtn.'則訊息發送失敗';
            $return['preView'] = json_encode($_this->my['fields']['content']);
        }
        echo json_encode(array('state' => $return['state'], 'msg' => $return['msg'], 'preView' => $return['preView']));
    }
    
    function SendLineMsgProcess($_this, $_Module){
        $line = new kLineMessaging();
        $line->SetMessages($_this->my['fields'], 'push');
        if(count($line->action['data']) <= 0){
            $return['state'] = false;
            $return['msg'] = '至少一則訊息';
            $return['data'] = $_this->my['fields'];
        }else if(empty($_this->my['fields']['UID'])){
            $return['state'] = false;
            $return['msg'] = '請選擇要傳送的聊天室';
        }else{
            $FILE = new kFile();
            
            $FileReturn = $FILE->upload(); //上傳檔案
            if($FileReturn){
                foreach ($FileReturn as $FileKey => $FileCtn) {
                    if($FileKey=='subject' || $FileKey=='content'){
                        foreach ($FileCtn as $FileCtnKey => $FileValue) {
                            foreach ($FileValue as $FileValueKey => $value) {
                                $_this->my['fields'][$FileKey][$FileValueKey] = $value;
                            }
                        }
                    }
                }
            }
            $line->action['data'] = array();
            $line->SetMessages($_this->my['fields'], 'push');
            
            $return['state'] = true;
            $return['msg'] = '訊息已處理';
            $return['data'] = $line->action['data'];
            $return['preView'] = json_encode($_this->my['fields']['content']);
        }
        echo json_encode(array('state' => $return['state'], 'msg' => $return['msg'], 'preView' => $return['preView'], 'UID' => $_this->my['fields']['UID'], 'data' => $return['data']));
    }
    
    function logout(){
        $_SESSION[__DOMAIN.'_backend'] = '';
        header("Location:" . __CustomStickers_Web . '/be/System/login');
    }

    function AddRow($_this, $_Module){
        $PS = new kProcess();
        $return = $PS->AddRow($_this, $_Module);
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }

    function UpdateRow($_this, $_Module){
        $PS = new kProcess();
        $return = $PS->UpdateRow($_this, $_Module);
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }
    
    function DeleteMultiRows($_this, $_Module){
        $PS = new kProcess();
        $return = $PS->DeleteMultiRows($_this, $_Module);
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }
    
    function SaveMultiRows($_this, $_Module){
        $PS = new kProcess();
        $return = $PS->SaveMultiRows($_this, $_Module);
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }

$_From = kCore_get('FrontEndAndBackEnd', $_SERVER['PATH_TRANSLATED']);
$_Module = !empty($_From) ? kCore_get($_From, $_SERVER['PATH_TRANSLATED']) : '';
$_Action = ($_From=='backend') ? kCore_get($_Module) : '';
//執行請求函數
$_this = new stdClass();
if($_POST){
    $_this->my = $_POST;
}
if($_GET){
    $_this->my = $_this->my ? array_merge($_this->my, $_GET) : $_GET;
}
$ps = kCore_get('ps');
if (function_exists($ps))
	call_user_func($ps, $_this, $_Module);
else
	echo $ps . '請求不存在';
exit;

?>