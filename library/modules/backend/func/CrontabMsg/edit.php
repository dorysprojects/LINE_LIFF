<?php

$id = kCore_get('id');
$rows = $SQL->SetAction('select')
            ->SetWhere("tablename='CrontabMsg'")
            ->SetWhere("next='myself'")
            ->SetWhere("id='$id'")
            ->BuildQuery();
$row = $rows[0];
$columns = array();
$columns[] = array(
    "type" => "text",
    "label" => "標題備註",
    "required" => "on",
    "name" => "subject",
    "value" => $row['subject']['subject'],
);
$columns[] = array(
    "type" => "checkbox",
    "label" => "平台",
    "required" => "on",
    "name" => "propertyD",
    "value" => $row['propertyD'],
    "optionVal" => explode('+', $row['propertyD']),
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
    "value" => $row['viewA'],
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
    "value" => $row['propertyA'],
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
    "style" => $row['propertyA']=='date' ? "" : "display: none;",
    "value" => $row['propertyB'],
);
$columns[] = array(
    "type" => "time",
    "label" => "排程時間",
    "name" => "propertyC",
    "style" => $row['propertyA']=='date' ? "" : "display: none;",
    "value" => $row['propertyC'],
);
if(kCore_CheckAuthority('Tag', 'index')){
    $columns[] = array(
        "type" => "filter",
        "label" => "篩選",
        "name" => "filter",
        "Tags" => kCore_Tag('SelectOptions'),
        "TagsVal" => !empty($row['content']['filter']['Tags']) ? $row['content']['filter']['Tags'] : array(),
    );
}
if(!empty($row['propertyE'])){
    $TPL->assign('nosave', 1);
}
// print_r($columns);

$TPL->assign('columns', $columns);
$TPL->assign('row', $row);
$TPL->assign('FormType', 'message');
include_once(__CORE."/func/kLoadMsg.php");

?>