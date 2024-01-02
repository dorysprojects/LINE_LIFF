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
        $TemplateCtn = 0;
        for ($columnsList = 0; $columnsList < 10; $columnsList++) {
            if($_this->my['fields']['subject']['subcontent'.$columnsList]){
                $actionCtn = 0;
                for ($action_item = 0; $action_item < 3; $action_item++) {
                    if( $_this->my['fields']['subject']['subject'.$columnsList.'_'.$action_item] && $_this->my['fields']['subject']['action'.$columnsList.'_'.$action_item] && $_this->my['fields']['subject']['data'.$columnsList.'_'.$action_item] ){
                        $actionCtn++;
                    }
                }
                if($actionCtn>0){
                    $TemplateCtn++;
                }
            }
        }
        if($TemplateCtn===0){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '至少一組卡片「需填寫:描述、至少一個按鈕(按鈕-標題、按鈕-動作、按鈕-內容)」';
        }
        if($errorMsg){
            $return['state'] = false;
            $return['msg'] = $errorMsg;
        }else{
            $return = $PS->AddRow($_this, $_Module);
        }
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
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
        $TemplateCtn = 0;
        for ($columnsList = 0; $columnsList < 10; $columnsList++) {
            if($_this->my['fields']['subject']['subcontent'.$columnsList]){
                $actionCtn = 0;
                for ($action_item = 0; $action_item < 3; $action_item++) {
                    if( $_this->my['fields']['subject']['subject'.$columnsList.'_'.$action_item] && $_this->my['fields']['subject']['action'.$columnsList.'_'.$action_item] && $_this->my['fields']['subject']['data'.$columnsList.'_'.$action_item] ){
                        $actionCtn++;
                    }
                }
                if($actionCtn>0){
                    $TemplateCtn++;
                }
            }
        }
        if($TemplateCtn===0){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '至少一組卡片「需填寫:描述、至少一個按鈕(按鈕-標題、按鈕-動作、按鈕-內容)」';
        }
        if($errorMsg){
            $return['state'] = false;
            $return['msg'] = $errorMsg;
        }else{
            $return = $PS->UpdateRow($_this, $_Module);
        }
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