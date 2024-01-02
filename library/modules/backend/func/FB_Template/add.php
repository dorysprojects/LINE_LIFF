<?php

$columns = array();
$columns[] = array(
    "type" => "text",//view
    "label" => "標題",
    "required" => "on",
    "name" => "subject",
    "value" => "",
);
$TPL->assign('columns', $columns);
$TPL->assign('FormType', 'fb_template');

?>