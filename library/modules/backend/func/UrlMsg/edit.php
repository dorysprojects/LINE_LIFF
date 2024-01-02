<?php

$id = kCore_get('id');
$rows = $SQL->SetAction('select')
            ->SetWhere("tablename='UrlMsg'")
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
    "type" => "text",
    "label" => "關鍵字",
    "required" => "on",
    "name" => "propertyA",
    "value" => $row['propertyA'],
);
//print_r($row);
$TPL->assign('columns', $columns);
$TPL->assign('row', $row);
$TPL->assign('FormType', 'message');
$UrlMsg = 1;
$TPL->assign('UrlMsg', $UrlMsg);
include_once(__CORE."/func/kLoadMsg.php");

?>