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
    "type" => "text",
    "label" => "付款方式",
    "required" => "on",
    "name" => "subject",
);
$columns[] = array(
    "type" => "text",
    "label" => "手續費",
    "name" => "fee",
    "value" => '0',
);
$columns[] = array(
    "type" => "text",
    "label" => "免手續費門檻",
    "name" => "feeThreshold",
    "value" => '0',
);
$columns[] = array(
    "type" => "text",
    "label" => "手續費說明",
    "name" => "feeDescription",
);
if(!empty($goldFlow)){
    $goldFlowOptions = array_column($goldFlow, 'propertyB', 'id');
    $columns[] = array(
        "type" => "select",
        "label" => "金流廠商",
        "required" => "on",
        "name" => "propertyA",
        "options" => $goldFlowOptions,
    );
}
    
$TPL->assign('columns', $columns);