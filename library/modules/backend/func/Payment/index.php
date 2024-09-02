<?php

$goldFlowOptions = array_column($goldFlow, 'propertyB', 'id');
$goldFlowLabelList = array_column($goldFlow, 'propertyA', 'id');
$columns = array(
    "viewA" => "啟用",
    "subject" => "付款方式名稱",
    "prev" => "金流廠商",
    "propertyA" => "交易方式",
    "update_at" => "更新時間",
    "create_at" => "建立時間",
);
$data = $SQL->SetAction('select')
            ->SetWhere("tablename='Payment'")
            ->BuildQuery();
$rows = array();
if(!empty($data)){
    foreach ($data as $row) {
        $rows[] = array(
            "id" => $row['id'],
            "viewA" => ($row['viewA']=='on') ? '開啟' : '關閉',
            "subject" => $row['subject']['subject'],
            "prev" => $goldFlowOptions[$row['prev']],
            "propertyA" => $row['propertyA'],
            "update_at" => $row['update_at'],
            "create_at" => $row['create_at'],
        );
    }
}


$TPL->assign('columns', $columns);
$TPL->assign('columnsType', $columnsType);
$TPL->assign('rows', $rows);
$TPL->assign('nosave', true);