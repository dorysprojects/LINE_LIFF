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
    "type" => "checkbox",
    "label" => "平台",
    "required" => "on",
    "name" => "propertyB",
    "optionVal" => array('line'),
    "value" => "line",
    "options" => array(
        "line" => "Line",
        "facebook" => "臉書",
    )
);
$columns[] = array(
    "type" => "text",
    "label" => "關鍵字",
    "required" => "on",
    "name" => "propertyA",
    "value" => "",
);
if(kCore_CheckAuthority('Tag', 'index')){
    $columns[] = array(
        "type" => "select",
        "label" => "貼標",
        "name" => "sortB",
        "value" => "",
        "options" => kCore_Tag('SelectOptions'),
    );
}
$TPL->assign('columns', $columns);
$TPL->assign('FormType', 'message');
include_once(__CORE."/func/kLoadMsg.php");

?>