<?php

$id = kCore_get('id');
$rows = $SQL->SetAction('select')
            ->SetWhere("tablename='RichMenu'")
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
    "label" => "選單圖片「寬(800~2500)、高>=250、寬高比(寬/高)>=1.45，建議尺寸:1200x(405、810)」",
    "required" => "on",
    "name" => "img0",
    "img0" => $row['subject']['img0'],
    "width" => $row['subject']['width'],
    "height" => $row['subject']['height'],
);
$columns[] = array(
    "type" => "view",
    "label" => "richMenuId",
    "value" => $row['propertyA'] ? $row['propertyA'] : '未上傳到 LINE Server',
);
$columns[] = array(
    "type" => "view",
    "label" => "選單狀態",
    "value" => ($row['viewA']==='on') ? "已上傳" : "未上傳",
);
$columns[] = array(
    "type" => "text",
    "label" => "選單名稱(後台備註用)",
    "required" => "on",
    "name" => "subject",
    "value" => $row['subject']['subject'],
);
$columns[] = array(
    "type" => "text",
    "label" => "選單文字",
    "required" => "on",
    "name" => "BarText",
    "value" => $row['subject']['BarText'],
);
$columns[] = array(
    "type" => "radio",
    "label" => "展開/收合",
    "required" => "on",
    "name" => "ShowType",
    "options" => array(
        "on" => "展開",
        "off" => "收合",
    ),
    "value" => $row['subject']['ShowType'],
);
//print_r($row['subject']['actions']);
$TPL->assign('columns', $columns);
$TPL->assign('row', $row);
$TPL->assign('actions', $row['subject']['actions']);
$TPL->assign('FormType', 'imagemap');

?>