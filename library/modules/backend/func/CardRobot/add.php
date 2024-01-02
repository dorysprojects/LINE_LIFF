<?php

$columns = array();
$columns[] = array(
    "type" => "cardbotImg",
    "label" => "卡片底圖",
    "required" => "on",
    "name" => "img0",
    "value" => "",
);
$columns[] = array(
    "type" => "radio",
    "label" => "開啟/關閉",
    "required" => "on",
    "name" => "viewA",
    "value" => 'off',
    "options" => array(
        "on" => "開啟",
        "off" => "關閉",
    )
);
$columns[] = array(
    "type" => "text",//view
    "label" => "標題",
    "required" => "on",
    "name" => "subject",
    "value" => "",
);
$columns[] = array(
    "type" => "text",//view
    "label" => "描述",
    "required" => "on",
    "name" => "subcontent",
    "value" => "",
);
$columns[] = array(
    "type" => "text",//view
    "label" => "預覽-按鈕文字",
    "required" => "off",
    "name" => "prevBtn",
    "value" => "",
);
$columns[] = array(
    "type" => "text",//view
    "label" => "開始製作-按鈕文字",
    "required" => "off",
    "name" => "startBtn",
    "value" => "",
);
if(kCore_CheckAuthority('Tag', 'index')){
    $columns[] = array(
        "type" => "select",
        "label" => "貼標",
        "name" => "sortB",
        "value" => "",
        "options" => kCore_Tag('SelectOptions'),
    );
}
$TPL->assign('columns', $columns);
$TPL->assign('FormType', 'cardrobot');

?>