<?php

    function AddRow($_this){
	    $kLineLIFF = new kLineLIFF();
        $errorMsg = '';
        if(empty($_this->my['fields']['subject']['type'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '網頁比例未填';
        }
        if(empty($_this->my['fields']['subject']['url'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '連結未填';
        }
        if($errorMsg){
            $return['state'] = false;
            $return['msg'] = $errorMsg;
        }else{
            $return['state'] = true;
            $return['msg'] = json_encode($kLineLIFF->AddLiff($_this));
        }
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }

    function UpdateRow($_this){
	    $kLineLIFF = new kLineLIFF();
        $errorMsg = '';
        if(empty($_this->my['fields']['subject']['type'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '網頁比例未填';
        }
        if(empty($_this->my['fields']['subject']['url'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '連結未填';
        }
        if($errorMsg){
            $return['state'] = false;
            $return['msg'] = $errorMsg;
        }else{
            $return['state'] = true;
            $return['msg'] = json_encode($kLineLIFF->UpdateLiff($_this));
        }
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }
    
    function DeleteMultiRows($_this){
        if($_this->my['select']){
            $kLineLIFF = new kLineLIFF();
            foreach ($_this->my['select'] as $id => $flag) {
                if($id!='' && $flag=='on'){
                    $kLineLIFF->DeleteLiff($id);
                }
            }
            $state = true;
            $msg = '刪除資料成功';
        }else{
            $state = false;
            $msg = '無選取要刪除的資料';
        }
        echo json_encode(array('state' => $state, 'msg' => $msg));
    }
    
    function SaveMultiRows($_this, $_Module){
        $PS = new kProcess();
        $return = $PS->SaveMultiRows($_this, $_Module);
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }

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
	call_user_func($ps, $_this);
else
	echo $ps . '請求不存在';
exit;

?>