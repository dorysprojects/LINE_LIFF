<?php

$columns = array();
$columns[] = array(
    "id" => "StartDate",
    "type" => "date",
    "label" => "開始日期",
    "required" => "on",
    "name" => "propertyD",
    "min" => date("Y-m-d"),
    "value" => "",
);
$columns[] = array(
    "id" => "EndDate",
    "type" => "date",
    "label" => "結束日期",
    "required" => "on",
    "name" => "propertyE",
    "min" => date("Y-m-d"),
    "value" => "",
);
$columns[] = array(
    "type" => "uploadImageA",
    "label" => "活動圖片",
    "required" => "on",
    "name" => "img0",
    "value" => "",
);
$columns[] = array(
    "type" => "radio",
    "label" => "活動開啟/關閉",
    "required" => "on",
    "name" => "viewA",
    "value" => 'off',
    "options" => array(
        "on" => "開啟",
        "off" => "關閉",
    )
);
$columns[] = array(
    "type" => "radio",
    "label" => "限制新好友",
    "required" => "on",
    "name" => "viewB",
    "value" => 'off',
    "options" => array(
        "on" => "開啟",
        "off" => "關閉",
    )
);
$columns[] = array(
    "type" => "radio",
    "label" => "一人一票",
    "required" => "on",
    "name" => "viewC",
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
    "label" => "邀請好友-按鈕文字",
    "placeholder" => "邀請好友",
    "required" => "off",
    "name" => "btn0",
    "value" => "",
);
$columns[] = array(
    "type" => "text",//view
    "label" => "查詢票數-按鈕文字",
    "placeholder" => "查詢票數",
    "required" => "off",
    "name" => "btn1",
    "value" => "",
);
if(kCore_CheckAuthority('Tag', 'index')){
    $columns[] = array(
        "type" => "select",
        "label" => "得票者貼標",
        "name" => "sortB",
        "value" => "",
        "options" => kCore_Tag('SelectOptions'),
    );
    $columns[] = array(
        "type" => "select",
        "label" => "投票者貼標",
        "name" => "sortC",
        "value" => "",
        "options" => kCore_Tag('SelectOptions'),
    );
}
$TPL->assign('columns', $columns);
$TPL->assign('FormType', 'grouprobot');

?>