<?php

$columns = array();
$columns[] = array(
    "type" => "imagemapImg",
    "label" => "選單圖片「寬(800~2500)、高>=250、寬高比(寬/高)>=1.45，建議尺寸:1200x(405、810)」",
    "required" => "on",
    "name" => "img0",
    "value" => "",
);
$columns[] = array(
    "type" => "view",
    "label" => "richMenuId",
    "value" => "未上傳到 LINE Server",
);
$columns[] = array(
    "type" => "view",
    "label" => "選單狀態",
    "value" => "未上傳",
);
$columns[] = array(
    "type" => "text",
    "label" => "選單名稱(後台備註用)",
    "required" => "on",
    "name" => "subject",
    "value" => "",
);
$columns[] = array(
    "type" => "text",
    "label" => "選單文字",
    "required" => "on",
    "name" => "BarText",
    "value" => "",
);
$columns[] = array(
    "type" => "radio",
    "label" => "展開/收合",
    "required" => "on",
    "name" => "ShowType",
    "options" => array(
        "on" => "展開",
        "off" => "收合",
    ),
    "value" => "on",
);
$TPL->assign('columns', $columns);
$TPL->assign('FormType', 'imagemap');

?>