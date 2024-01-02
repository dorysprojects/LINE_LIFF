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
        if( (empty($_this->my['fields']['subject']['date'])&&!empty($_this->my['fields']['subject']['time'])) || (!empty($_this->my['fields']['subject']['date'])&&empty($_this->my['fields']['subject']['time'])) ){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '訂購時間:日期與時間皆需填寫';
        }
        if(empty($_this->my['fields']['subject']['payment_method'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '付款方式未填';
        }
        if(empty($_this->my['fields']['subject']['currency'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '貨幣單位未填';
        }
        if(empty($_this->my['fields']['subject']['total_cost'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '總計未填';
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
        if( (empty($_this->my['fields']['subject']['date'])&&!empty($_this->my['fields']['subject']['time'])) || (!empty($_this->my['fields']['subject']['date'])&&empty($_this->my['fields']['subject']['time'])) ){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '訂購時間:日期與時間皆需填寫';
        }
        if(empty($_this->my['fields']['subject']['payment_method'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '付款方式未填';
        }
        if(empty($_this->my['fields']['subject']['currency'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '貨幣單位未填';
        }
        if(empty($_this->my['fields']['subject']['total_cost'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '總計未填';
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