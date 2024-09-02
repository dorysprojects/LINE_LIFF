<?php

    function AddRow($_this){
        $errorMsg = '';
        if(!empty($_this->my['fields']['subject'])){
            foreach ($_this->my['fields']['subject'] as $key => $value) {
                if(!empty($key) && empty($value)){
                    if($errorMsg){
                        $errorMsg .= '、';
                    }
                    $errorMsg .= $key.'未填';
                }
            }
        }else{
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '參數皆未填';
        }
        if(!empty($errorMsg)){
            $return['state'] = false;
            $return['msg'] = $errorMsg;
        }else{
            foreach ($_this->my['fields']['subject'] as $key => $value) {
                if(!empty($key) && !empty($value) && file_exists(__CONFIG.'/'.$key)){
                    file_put_contents(__CONFIG.'/'.$key, $value);
                }
            }
            $return['state'] = true;
            $return['msg'] = '成功';
        }
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