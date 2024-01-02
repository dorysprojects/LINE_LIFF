<?php

$SystemType = kCore_get('SystemMessage');
$rows = $SQL->SetAction('select')
    ->SetWhere("tablename='SystemMessage'")
    ->SetWhere("next='". $SystemType ."'")
    ->BuildQuery();
$row = $rows[0];

$columns = array();
$columns[] = array(
    "type" => "radio",
    "label" => "回應開啟/關閉",
    "required" => "on",
    "name" => "viewA",
    "value" => $row['viewA'] ? $row['viewA'] : 'on',
    "options" => array(
        "on" => "開啟",
        "off" => "關閉",
    )
);

//print_r($row);
if($SystemType == 'NotifyMsg'){
    $TPL->assign('notify', 1);
}
$TPL->assign('noreturn', 1);
$TPL->assign('columns', $columns);
$TPL->assign('row', $row);
$TPL->assign('FormType', 'message');
include_once(__CORE."/func/kLoadMsg.php");

?>

