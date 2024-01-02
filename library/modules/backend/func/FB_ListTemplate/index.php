<?php

$columns = array(
    "img0" => "圖片",
    "subject" => "標題備註",
    "topStyle" => "第一個項目",
    "update_at" => "更新時間",
    "create_at" => "建立時間",
);
$columnsType = array(
    "img0" => "image",
    "subject" => "text",
    "topStyle" => "radio",
    "topStyleoptions" => array(
        "large" => "封面",
        "compact" => "清單",
    ),
    "update_at" => "view",
    "create_at" => "view",
);
$Data = $SQL->SetAction('select')
            ->SetWhere("tablename='FB_ListTemplate'")
            ->SetWhere("next='myself'")
            ->BuildQuery();
$rows = array();
if($Data){
    foreach ($Data as $key => $value) {
        $rows[] = array(
            "id" => $value['id'],
            "img0" => $value['subject']['img0'],
            "subject" => $value['subject']['subject'],
            "topStyle" => $value['subject']['topStyle'],
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