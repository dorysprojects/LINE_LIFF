<?php

$columns = array(
    "code" => "代碼",
    "propertyB" => "平台",
    "viewA" => "回應開啟/關閉",
    "propertyA" => "關鍵字",
    "update_at" => "更新時間",
    "create_at" => "建立時間",
);
$columnsType = array(
    "code" => "view",
    "propertyB" => "view",
    "viewA" => "radio",
    "viewAoptions" => array(
        "on" => "開啟",
        "off" => "關閉",
    ),
    "propertyA" => "text",
    "update_at" => "view",
    "create_at" => "view",
);
$Data = $SQL->SetAction('select')
            ->SetWhere("tablename='KeyWordMsg'")
            ->SetWhere("next='myself'")
            ->BuildQuery();
$rows = array();
if($Data){
    foreach ($Data as $key => $value) {
        $rows[] = array(
            "id" => $value['id'],
            "code" => ($value['propertyB']=='line') ? 'BOT(_)KeyWordMsg(_)' . $value['id'] : '',
            "propertyB" => $value['propertyB'],
            "viewA" => $value['viewA'],
            "propertyA" => $value['propertyA'],
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