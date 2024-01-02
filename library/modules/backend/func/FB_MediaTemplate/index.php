<?php

$columns = array(
    "img0" => "圖片",
    "subject" => "標題備註",
    "update_at" => "更新時間",
    "create_at" => "建立時間",
);
$columnsType = array(
    "img0" => "media",
    "subject" => "text",
    "update_at" => "view",
    "create_at" => "view",
);
$Data = $SQL->SetAction('select')
            ->SetWhere("tablename='FB_MediaTemplate'")
            ->SetWhere("next='myself'")
            ->BuildQuery();
$rows = array();
if($Data){
    foreach ($Data as $key => $value) {
        $rows[] = array(
            "id" => $value['id'],
            "img0" => $value['subject']['img0'],
            "img0type" => $value['subject']['type0'],
            "subject" => $value['subject']['subject'],
            "update_at" => $value['update_at'],
            "create_at" => $value['create_at'],
        );
    }
}


$TPL->assign('columns', $columns);
$TPL->assign('columnsType', $columnsType);
$TPL->assign('rows', $rows);
$TPL->assign('nosave', 0);

?>