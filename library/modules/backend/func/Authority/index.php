<?php

$columns = array(
    "viewA" => "啟用/凍結",
    "img0" => "使用者頭貼",
    "propertyA" => "使用者名稱",
    "propertyB" => "帳號",
    "propertyC" => "密碼",
);
$columnsType = array(
    "viewA" => "radio",
    "viewAoptions" => array(
        "on" => "啟用",
        "off" => "凍結",
    ),
    "img0" => "image",
    "propertyA" => "text",
    "propertyB" => "text",
    "propertyC" => "text",
);
$Data = $SQL->SetAction('select')
            ->SetWhere("tablename='Authority'")
            ->SetWhere("prev!='Admin'", $_SESSION[__DOMAIN.'_backend']['prev']!=='Admin')
            ->SetWhere("next='myself'")
            ->BuildQuery();
$rows = array();
if($Data){
    foreach ($Data as $key => $value) {
        $rows[] = array(
            "id" => $value['id'],
            "viewA" => $value['viewA'],
            "img0" => $value['subject']['img0'],
            "propertyA" => $value['propertyA'],
            "propertyB" => $value['propertyB'],
            "propertyC" => $value['propertyC'],
        );
    }
}


$TPL->assign('columns', $columns);
$TPL->assign('columnsType', $columnsType);
$TPL->assign('rows', $rows);
$TPL->assign('nosave', 0);