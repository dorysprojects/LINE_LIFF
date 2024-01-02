<?php

    function AddRow($_this, $_Module){
        $SystemType = kCore_get('SystemType');
        $SQL = new kSQL($_Module);
        $FILE = new kFile();
        
        $OldData = $SQL->SetAction('select')->SetWhere("next='". $SystemType ."'")->BuildQuery();
        $FileReturn = $FILE->upload('', $OldData[0], $_this->my['fields']); //上傳檔案
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
        if($OldData[0]){
            $SQL->SetAction('update')->SetWhere("id='". $OldData[0]['id'] ."'");
        }else{
            $SQL->SetAction('insert')->SetValue('next', $SystemType);
        }
        foreach ($_this->my['fields'] as $key => $value) {
            if($key=='subject' || $key=='content'){
                $SQL->SetValue($key, json_encode($value));
            }else{
                $SQL->SetValue($key, $value);
            }
        }
        if(!$OldData[0]){
            $SQL->SetValue('create_at', $SQL->getNowTime());
        }
        $SQL->SetValue('update_at', $SQL->getNowTime());
        $return[state] = $SQL->BuildQuery();
        $return[msg] = $return[state] ? '儲存資料成功' : '儲存資料失敗';
        $return[preView] = json_encode($_this->my['fields']['content']);
        
	echo json_encode(array('state' => $return[state], 'msg' => $return[msg], 'preView' => $return[preView]));
    }
    
    function SaveMultiRows($_this, $_Module){
        $PS = new kProcess();
        $return = $PS->SaveMultiRows($_this, $_Module);
	echo json_encode(array('state' => $return[state], 'msg' => $return[msg]));
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