<?php

$columns = array(
    "code" => "代碼",
    "img0" => "卡片底圖",
    "viewA" => "開啟/關閉",
    "subject" => "標題",
    "subcontent" => "描述",
    "prevBtn" => "預覽-按鈕文字",
    "startBtn" => "開始製作-按鈕文字",
    "update_at" => "更新時間",
    "create_at" => "建立時間",
);
$columnsType = array(
    "code" => "view",
    "img0" => "image",
    "viewA" => "radio",
    "viewAoptions" => array(
        "on" => "開啟",
        "off" => "關閉",
    ),
    "subject" => "text",
    "subcontent" => "text",
    "prevBtn" => "text",
    "startBtn" => "text",
    "update_at" => "view",
    "create_at" => "view",
);
$system = array(
    "propertyC" => array(
        "type" => "text",
        "text" => "關鍵字",
        "value" => $SQL->SystemRow[0]['propertyC'],
    ),
);
$Data = $SQL->SetAction('select')
            ->SetWhere("tablename='CardRobot'")
            ->SetWhere("next='myself'")
            ->BuildQuery();
$rows = array();
if($Data){
    foreach ($Data as $key => $value) {
        $rows[] = array(
            "id" => $value['id'],
            "code" => 'BOT(_)CreateCard(_)Start(_)' . $value['id'],
            "viewA" => $value['viewA'],
            "img0" => $value['subject']['img0'],
            "subject" => $value['subject']['subject'],
            "subcontent" => $value['subject']['subcontent'],
            "prevBtn" => $value['subject']['prevBtn'],
            "startBtn" => $value['subject']['startBtn'],
            "update_at" => $value['update_at'],
            "create_at" => $value['create_at'],
            'customEdit' => '<a href="'. __CustomStickers_Web .'/be/CardRobot/edit/id/'. $value['id'] .'/action/list"><label class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></label></a>',
        );
    }
}


$TPL->assign('columns', $columns);
$TPL->assign('columnsType', $columnsType);
$TPL->assign('system', $system);
$TPL->assign('rows', $rows);
$TPL->assign('nosave', 0);

?>