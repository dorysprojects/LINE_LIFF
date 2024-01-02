<?php

$columns = array();
$columns[] = array(
    "type" => "radio",
    "label" => "回應開啟/關閉",
    "required" => "on",
    "name" => "viewA",
    "value" => 'on',
    "options" => array(
        "on" => "開啟",
        "off" => "關閉",
    )
);
$columns[] = array(
    "type" => "text",
    "label" => "關鍵字",
    "required" => "on",
    "name" => "propertyA",
    "value" => "",
);
$TPL->assign('columns', $columns);
$TPL->assign('FormType', 'message');
$UrlMsg = 1;
$TPL->assign('UrlMsg', $UrlMsg);
include_once(__CORE."/func/kLoadMsg.php");

?>