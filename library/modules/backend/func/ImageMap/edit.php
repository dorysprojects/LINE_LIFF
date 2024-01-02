<?php

$id = kCore_get('id');
$rows = $SQL->SetAction('select')
            ->SetWhere("tablename='ImageMap'")
            ->SetWhere("next='myself'")
            ->SetWhere("id='$id'")
            ->BuildQuery();
$row = $rows[0];
$columns = array();
if($row['subject']['img0']){
    $imginfo = getimagesize(__WEB_UPLOAD . '/image/' . $row['subject']['img0']);  
    $row['subject']['width'] = $imginfo[0];
    $row['subject']['height'] = $imginfo[1];
}
$columns[] = array(
    "type" => "imagemapImg",
    "label" => "圖片「1040x(520~2080)、1200x(405、810)」",
    "required" => "on",
    "name" => "img0",
    "img0" => $row['subject']['img0'],
    "width" => $row['subject']['width'],
    "height" => $row['subject']['height'],
);
$columns[] = array(
    "type" => "text",//view
    "label" => "標題",
    "required" => "on",
    "name" => "subject",
    "value" => $row['subject']['subject'],
);
//print_r($row['subject']['actions']);
$TPL->assign('columns', $columns);
$TPL->assign('row', $row);
$TPL->assign('actions', $row['subject']['actions']);
$TPL->assign('FormType', 'imagemap');

?>