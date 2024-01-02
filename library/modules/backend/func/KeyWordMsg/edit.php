<?php

$id = kCore_get('id');
$rows = $SQL->SetAction('select')
            ->SetWhere("tablename='KeyWordMsg'")
            ->SetWhere("next='myself'")
            ->SetWhere("id='$id'")
            ->BuildQuery();
$row = $rows[0];
$columns = array();
$columns[] = array(
    "type" => "radio",
    "label" => "回應開啟/關閉",
    "required" => "on",
    "name" => "viewA",
    "value" => $row['viewA'],
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
    "value" => $row['propertyB'],
    "optionVal" => explode('+', $row['propertyB']),
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
    "value" => $row['propertyA'],
);
if(kCore_CheckAuthority('Tag', 'index')){
    $columns[] = array(
        "type" => "select",
        "label" => "貼標",
        "name" => "sortB",
        "value" => $row['sortB'],
        "options" => kCore_Tag('SelectOptions'),
    );
}
//print_r($row);
$TPL->assign('columns', $columns);
$TPL->assign('row', $row);
$TPL->assign('FormType', 'message');
include_once(__CORE."/func/kLoadMsg.php");

?>