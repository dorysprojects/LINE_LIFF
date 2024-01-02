<?php

$columns = array();
$columns[] = array(
    "type" => "imagemapImg",
    "label" => "圖片「1040x(520~2080)、1200x(405、810)」",
    "required" => "on",
    "name" => "img0",
    "value" => "",
);
$columns[] = array(
    "type" => "text",//view
    "label" => "標題",
    "required" => "on",
    "name" => "subject",
    "value" => "",
);
$TPL->assign('columns', $columns);
$TPL->assign('FormType', 'imagemap');

?>