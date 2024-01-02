<?php

    function AddRow($_this, $_Module){
        $PS = new kProcess();
        $errorMsg = '';
        if(empty($_this->my['fields']['subject']['subject'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '標題未填';
        }
        if(empty($_this->my['fields']['propertyD'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '至少選擇一種平台';
        }
        if($_this->my['fields']['propertyA'] === 'date'){
            if(empty($_this->my['fields']['propertyB'])){
                if($errorMsg){
                    $errorMsg .= '、';
                }
                $errorMsg .= '排程日期未填';
            }
            if(empty($_this->my['fields']['propertyC'])){
                if($errorMsg){
                    $errorMsg .= '、';
                }
                $errorMsg .= '排程時間未填';
            }
        }
        $typeCtn = 0;
        for($i=0;$i<5;$i++){
            if(!empty($_this->my['fields']['subject']['type_'.$i]) && !empty($_this->my['fields']['subject']['value_'.$i])){
                $typeCtn++;
            }
        }
        if($typeCtn===0){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '至少一則訊息';
        }else{
            if(!empty($_this->my['fields']['content']['filter'])){
                $context = stream_context_create(array(
                    "http" => array("method" => "POST", "header" => implode(PHP_EOL, ["Content-Type: application/json"]), "content" => json_encode(array(
                        "fields" => array(
                            "content" => array(
                                "filter" => $_this->my['fields']['content']['filter'],
                            ),
                        )
                    )), "ignore_errors" => true)
                ));
                $EstimatedProcessState = json_decode(file_get_contents(__CustomStickers_Web . '/be/System/process/ps/EstimatedProcess', false, $context), true);
                $_this->my['fields']['content']['FilterMembers'] = $EstimatedProcessState['FilterMembers'];
                $_this->my['fields']['content']['AllMembers'] = $EstimatedProcessState['AllMembers'];
                $_this->my['fields']['content']['FilterMemberList'] = $EstimatedProcessState['FilterMemberList'];
                $_this->my['fields']['content']['AllMemberList'] = $EstimatedProcessState['AllMemberList'];
            }
        }
        
        if($errorMsg){
            $return['state'] = false;
            $return['msg'] = $errorMsg;
        }else{
            $return = $PS->AddRow($_this, $_Module);
        }
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg'], 'preView' => $return['preView']));
    }

    function UpdateRow($_this, $_Module){
        $PS = new kProcess();
        $errorMsg = '';
        if(empty($_this->my['fields']['subject']['subject'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '標題未填';
        }
        if(empty($_this->my['fields']['propertyD'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '至少選擇一種平台';
        }
        if($_this->my['fields']['propertyA'] === 'date'){
            if(empty($_this->my['fields']['propertyB'])){
                if($errorMsg){
                    $errorMsg .= '、';
                }
                $errorMsg .= '排程日期未填';
            }
            if(empty($_this->my['fields']['propertyC'])){
                if($errorMsg){
                    $errorMsg .= '、';
                }
                $errorMsg .= '排程時間未填';
            }
        }
        $typeCtn = 0;
        for($i=0;$i<5;$i++){
            if(!empty($_this->my['fields']['subject']['type_'.$i]) && !empty($_this->my['fields']['subject']['value_'.$i])){
                $typeCtn++;
            }
        }
        if($typeCtn===0){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '至少一則訊息';
        }else{
            if(!empty($_this->my['fields']['content']['filter'])){
                $context = stream_context_create(array(
                    "http" => array("method" => "POST", "header" => implode(PHP_EOL, ["Content-Type: application/json"]), "content" => json_encode(array(
                        "fields" => array(
                            "content" => array(
                                "filter" => $_this->my['fields']['content']['filter'],
                            ),
                        )
                    )), "ignore_errors" => true)
                ));
                $EstimatedProcessState = json_decode(file_get_contents(__CustomStickers_Web . '/be/System/process/ps/EstimatedProcess', false, $context), true);
                $_this->my['fields']['content']['FilterMembers'] = $EstimatedProcessState['FilterMembers'];
                $_this->my['fields']['content']['AllMembers'] = $EstimatedProcessState['AllMembers'];
                $_this->my['fields']['content']['FilterMemberList'] = $EstimatedProcessState['FilterMemberList'];
                $_this->my['fields']['content']['AllMemberList'] = $EstimatedProcessState['AllMemberList'];
            }
        }
        
        if($errorMsg){
            $return['state'] = false;
            $return['msg'] = $errorMsg;
        }else{
            $return = $PS->UpdateRow($_this, $_Module);
        }
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg'], 'preView' => $return['preView']));
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