<?php

$columns = array(
    "viewA" => "啟用",
    "propertyA" => "金流廠商代碼",
    "propertyB" => "金流廠商名稱",
    "viewB" => "沙盒模式",
    "update_at" => "更新時間",
    "create_at" => "建立時間",
);
$data = $SQL->SetAction('select')
            ->SetWhere("tablename='GoldFlow'")
            ->BuildQuery();
$rows = array();
if(!empty($data)){
    foreach ($data as $row) {
        $rows[] = array(
            "id" => $row['id'],
            "viewA" => ($row['viewA']=='on') ? '開啟' : '關閉',
            "propertyA" => $row['propertyA'],
            "propertyB" => $row['propertyB'],
            "viewB" => ($row['viewB']=='on') ? '開啟' : '關閉',
            "update_at" => $row['update_at'],
            "create_at" => $row['create_at'],
        );
    }
}


$TPL->assign('columns', $columns);
$TPL->assign('columnsType', $columnsType);
$TPL->assign('rows', $rows);
$TPL->assign('nosave', true);