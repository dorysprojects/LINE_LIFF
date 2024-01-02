<?php

$columns = array();
$columns[] = array(
    "type" => "text",
    "label" => "標題備註",
    "required" => "on",
    "name" => "subject",
    "value" => "",
);
$columns[] = array(
    "type" => "checkbox",
    "label" => "平台",
    "required" => "on",
    "name" => "propertyD",
    "optionVal" => array('line'),
    "value" => "line",
    "options" => array(
        "line" => "Line",
        "facebook" => "臉書",
    )
);
$columns[] = array(
    "type" => "radio",
    "label" => "推播開啟/關閉",
    "required" => "on",
    "name" => "viewA",
    "value" => 'on',
    "options" => array(
        "on" => "開啟",
        "off" => "關閉",
    )
);
$columns[] = array(
    "type" => "radio",
    "label" => "排程方式",
    "required" => "on",
    "name" => "propertyA",
    "onchange" => "on",
    "value" => "tmp",
    "options" => array(
        "date" => "日期",
        "now" => "立即發送",
        "tmp" => "暫存",
    )
);
$columns[] = array(
    "type" => "date",
    "label" => "排程日期",
    "name" => "propertyB",
    "style" => "display: none;",
    "min" => date('Y-m-d'),
    "value" => '',
);
$columns[] = array(
    "type" => "time",
    "label" => "排程時間",
    "name" => "propertyC",
    "style" => "display: none;",
    "value" => '',
);
if(kCore_CheckAuthority('Tag', 'index')){
    $columns[] = array(
        "type" => "filter",
        "label" => "篩選",
        "name" => "filter",
        "Tags" => kCore_Tag('SelectOptions'),
        "TagsVal" => array(),
    );
}
$TPL->assign('columns', $columns);
$TPL->assign('FormType', 'message');
include_once(__CORE."/func/kLoadMsg.php");

?>