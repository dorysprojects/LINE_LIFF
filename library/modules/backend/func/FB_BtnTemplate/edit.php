<?php

$id = kCore_get('id');
$rows = $SQL->SetAction('select')
            ->SetWhere("tablename='FB_BtnTemplate'")
            ->SetWhere("next='myself'")
            ->SetWhere("id='$id'")
            ->BuildQuery();
$row = $rows[0];
$columns = array();
$columns[] = array(
    "type" => "text",//view
    "label" => "標題",
    "required" => "on",
    "name" => "subject",
    "value" => $row['subject']['subject'],
);
$TPL->assign('columns', $columns);
$TPL->assign('row', $row);
$TPL->assign('FormType', 'fb_btntemplate');

?>