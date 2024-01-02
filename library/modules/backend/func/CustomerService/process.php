<?php

    function LastRecord($_this, $_Module){
        $SQL_LineRecord = new kSQL('LineRecord');
        if(kCore_CheckAuthority('CustomerService', 'line')){
            $line_LastRecord = $SQL_LineRecord->SetAction("select")
                                                ->SetWhere("tablename='line'")
                                                ->SetWhere("next='message'")
                                                ->SetLimit(1)
                                                ->echoSQL(0)
                                                ->BuildQuery();
            if(!empty($line_LastRecord)){
                $line_LastRecordTime = $line_LastRecord[0]['create_at'];
            }
        }
        if(kCore_CheckAuthority('CustomerService', 'facebook')){
            $facebook_LastRecord = $SQL_LineRecord->SetAction("select")
                                                ->SetWhere("tablename='facebook'")
                                                ->SetWhere("next!='account_linkin'")
                                                ->SetLimit(1)
                                                ->echoSQL(0)
                                                ->BuildQuery();
            if(!empty($facebook_LastRecord)){
                $facebook_LastRecordTime = $facebook_LastRecord[0]['create_at'];
            }
        }
        $return = array(
            'line_LastRecordTime' => $line_LastRecordTime,
            'facebook_LastRecordTime' => $facebook_LastRecordTime,
        );
	    echo json_encode($return);
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