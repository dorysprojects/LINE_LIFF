<?php

$columns = array(
    "subject" => "標題備註",
    "img0" => "圖片",
    "update_at" => "更新時間",
    "create_at" => "建立時間",
);
$columnsType = array(
    "subject" => "text",
    "img0" => "image",
    "update_at" => "view",
    "create_at" => "view",
);
$__TYPE = !empty(kCore_get('type')) ? kCore_get('type') : 'line';
$Data = $SQL->SetAction('select')
            ->SetWhere("tablename='QuicklyReply'")
            ->SetWhere("next='". $__TYPE ."'")
            ->BuildQuery();
$rows = array();
if($Data){
    foreach ($Data as $key => $value) {
        $rows[] = array(
            "id" => $value['id'],
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