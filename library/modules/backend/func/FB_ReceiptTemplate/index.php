<?php

$columns = array(
    "element_image_url0" => "圖片",
    "subject" => "標題備註",
    "update_at" => "更新時間",
    "create_at" => "建立時間",
);
$columnsType = array(
    "element_image_url0" => "image",
    "subject" => "text",
    "update_at" => "view",
    "create_at" => "view",
);
$Data = $SQL->SetAction('select')
            ->SetWhere("tablename='FB_ReceiptTemplate'")
            ->SetWhere("next='myself'")
            ->BuildQuery();
$rows = array();
if($Data){
    foreach ($Data as $key => $value) {
        $rows[] = array(
            "id" => $value['id'],
            "element_image_url0" => $value['subject']['element_image_url0'],
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