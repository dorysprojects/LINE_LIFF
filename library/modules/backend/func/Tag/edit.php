<?php

$id = kCore_get('id');
$rows = $SQL->SetAction('select')
            ->SetWhere("tablename='Tag'")
            ->SetWhere("next='myself'")
            ->SetWhere("id='". $id ."'")
            ->BuildQuery();
$row = $rows[0];
$columns = array();
$columns[] = array(
    "type" => "radio",
    "label" => "開啟/關閉",
    "required" => "on",
    "name" => "viewA",
    "value" => $row['viewA']==='off' ? $row['viewA'] : 'on',
    "options" => array(
        "on" => "開啟",
        "off" => "關閉",
    ),
);
$columns[] = array(
    "type" => "text",
    "label" => "標籤名稱",
    "required" => "on",
    "name" => "propertyA",
    "value" => $row['propertyA'],
);

$TPL->assign('row', $row);
$TPL->assign('columns', $columns);

?>