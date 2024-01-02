<?php

//'['.date('d-M-Y H:i:s').' Asia/Taipei]'
$Today = date("Y-m-d");
$date1 = !empty($_SESSION[__DOMAIN][_Module]['date1']) ? $_SESSION[__DOMAIN][_Module]['date1'] : $Today;
$date2 = !empty($_SESSION[__DOMAIN][_Module]['date2']) ? $_SESSION[__DOMAIN][_Module]['date2'] : $Today;
$TPL->assign('Today', $Today);
$TPL->assign('date1', $date1);
$TPL->assign('date2', $date2);

$_date1 = date('d-M-Y', strtotime($date1));
$_date2 = date('d-M-Y', strtotime($date2));

$error_logText = @file_get_contents(__CustomStickers_Web.'/error/error_log');
$error_logList = array();
$error_logTmp = explode('[', $error_logText);
if($error_logTmp){
    foreach ($error_logTmp as $key => $value) {
        if($value){
            $valueTmp = explode('] ', $value);
            $logDateDetails = $valueTmp[0];
            $logDateTmp = explode(' ', $logDateDetails);
            $logDate = $logDateTmp[0];
            $logTime = $logDateTmp[1];
            $logZone = $logDateTmp[2];
            $logVal = $valueTmp[1];
            $error_logList[$logDate][] = "【". $logTime ."】" . $logVal;
        }
    }
}
$error_log = '';
if($error_logList){
    foreach ($error_logList as $_date => $_errorList) {
        if($_date1<=$_date && $_date<=$_date2){
            $error_log .= "[$_date]\n";
            if($_errorList){
                foreach ($_errorList as $_errorKey => $_errorVal) {
                    $error_log .= "$_errorVal";
                    if($_errorKey === (count($_errorList)-1)){
                        $error_log .= "======================================================================================================================================\n";
                    }
                }
            }
        }
    }
}

$TPL->assign('error_log', $error_log);
$TPL->display($_FromViewPath."/debug.tpl");

?>