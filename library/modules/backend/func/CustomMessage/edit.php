<?php

$id = kCore_get('id');
$rows = $SQL->SetAction('select')
            ->SetWhere("id='". $id ."'")
            ->BuildQuery();
$row = $rows[0];
if($row['tablename'] === 'Samples'){
    if($_SESSION[__DOMAIN.'_backend']['prev'] !== 'Admin'){
        echo '權限不足';
        exit();
    }
}
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
$TPL->assign('RowType', 'custommessage');

?>