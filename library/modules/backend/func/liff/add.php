<?php

$columns = array();
$columns[] = array(
    "type" => "select",
    "label" => "網頁比例",
    "required" => "on",
    "name" => "type",
    "value" => "",
    "options" => array(
        "compact" => "compact(50%)",
        "tall" => "tall(80%)",
        "full" => "full(100%)",
    )
);
$columns[] = array(
    "type" => "text",//view
    "label" => "連結",
    "required" => "on",
    "name" => "url",
    "value" => "",
);
$TPL->assign('columns', $columns);

?>