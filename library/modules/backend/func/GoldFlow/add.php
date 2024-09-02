<?php

$columns = array();
$columns[] = array(
    "type" => "radio",
    "label" => "啟用",
    "required" => "on",
    "name" => "viewA",
    "value" => 'on',
    "options" => array(
        "on" => "開啟",
        "off" => "關閉",
    ),
);
$columns[] = array(
    "type" => "radio",
    "label" => "金流廠商代碼",
    "name" => "propertyA",
    "options" => array(
        "ECPay" => "綠界科技",
        "LINEPay" => "LINE Pay",
    ),
);
$columns[] = array(
    "type" => "text",
    "label" => "金流廠商名稱",
    "name" => "propertyB",
);
$columns[] = array(
    "type" => "radio",
    "label" => "沙盒模式",
    "required" => "on",
    "name" => "viewB",
    "options" => array(
        "on" => "開啟(測試模式)",
        "off" => "關閉(正式模式)",
    ),
    "value" => 'on',
);
$TPL->assign('columns', $columns);