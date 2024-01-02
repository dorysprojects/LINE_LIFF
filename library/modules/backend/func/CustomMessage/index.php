<?php

$columns = array(
    "code" => "代碼",
    "subject" => "標題備註",
    "update_at" => "更新時間",
    "create_at" => "建立時間",
);
$columnsType = array(
    "code" => "view",
    "subject" => "text",
    "update_at" => "view",
    "create_at" => "view",
);
$tablename = ($_SESSION[__DOMAIN.'_backend']['prev']==='Admin' && kCore_get('action')==='sample') ? "tablename='Samples'" : "tablename='CustomMessage'";
$Data = $SQL->SetAction('select')
            ->SetWhere($tablename)
            ->SetWhere("next='myself'")
            ->BuildQuery();
$rows = array();
if($Data){
    foreach ($Data as $key => $value) {
        $rows[] = array(
            "id" => $value['id'],
            "code" => 'BOT(_)CustomMessage(_)' . $value['id'],
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