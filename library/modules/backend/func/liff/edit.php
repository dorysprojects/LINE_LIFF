<?php

$id = kCore_get('id');
$GetLiffList = $LIFF->GetLiffList();
$row = array();
if($GetLiffList['apps']){
    foreach ($GetLiffList['apps'] as $key => $value) {
        if($value['liffId']==$id){
            $row['liffid'] = $value['liffId'];
            $row['type'] = $value['view']['type'];
            $row['url'] = $value['view']['url'];
        }
    }
}
$columns = array();
$columns[] = array(
    "type" => "view",
    "label" => "LiffId",
    "required" => "on",
    "name" => "",
    "value" => $row['liffid'],
);
$columns[] = array(
    "type" => "hidden",
    "label" => "LiffId",
    "required" => "on",
    "name" => "liffId",
    "value" => $row['liffid'],
);
$columns[] = array(
    "type" => "select",
    "label" => "網頁比例",
    "required" => "on",
    "name" => "type",
    "value" => $row['type'],
    "options" => array(
        "compact" => "compact(50%)",
        "tall" => "tall(80%)",
        "full" => "full(100%)",
    )
);
$columns[] = array(
    "type" => "text",
    "label" => "連結",
    "required" => "on",
    "name" => "url",
    "value" => $row['url'],
);
$TPL->assign('columns', $columns);

?>