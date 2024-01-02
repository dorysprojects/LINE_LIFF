<?php

$columns = array();
$columns[] = array(
    "type" => "radio",
    "label" => "開啟/關閉",
    "required" => "on",
    "name" => "viewA",
    "value" => "on",
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
    "value" => "",
);

$TPL->assign('columns', $columns);

?>