<?php

$columns = array(
    "code" => "代碼",
    "img0" => "圖片",
    "subject" => "標題備註",
    "update_at" => "更新時間",
    "create_at" => "建立時間",
);
$columnsType = array(
    "code" => "view",
    "img0" => "image",
    "subject" => "text",
    "update_at" => "view",
    "create_at" => "view",
);
$Data = $SQL->SetAction('select')
            ->SetWhere("tablename='ImageMap'")
            ->SetWhere("next='myself'")
            ->BuildQuery();
$rows = array();
if($Data){
    foreach ($Data as $key => $value) {
        $rows[] = array(
            "id" => $value['id'],
            "code" => 'BOT(_)ImageMap(_)' . $value['id'],
            "img0" => $value['subject']['img0'],
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