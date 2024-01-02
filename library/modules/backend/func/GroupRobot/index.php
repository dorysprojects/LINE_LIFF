<?php

$columns = array(
    "img0" => "活動圖片",
    "viewA" => "活動開啟/關閉",
    "propertyDE" => "活動日期",
    "subject" => "標題",
    "subcontent" => "描述",
    "status" => "狀態",
    "update_at" => "更新時間",
    "create_at" => "建立時間",
);
$columnsType = array(
    "img0" => "image",
    "viewA" => "view",//radio
    "propertyDE" => "view",
    "viewAoptions" => array(
        "on" => "開啟",
        "off" => "關閉",
    ),
    "subject" => "text",
    "subcontent" => "text",
    "status" => "view",
    "update_at" => "view",
    "create_at" => "view",
);
$system = array(
    "propertyC" => array(
        "type" => "text",
        "text" => "關鍵字",
        "value" => $SQL->SystemRow[0]['propertyC'],
    ),
);
$Data = $SQL->SetAction('select')
            ->SetWhere("tablename='GroupRobot'")
            ->SetWhere("next='myself'")
            ->BuildQuery();
$rows = array();
if($Data){
    $Ctn = 0;
    foreach ($Data as $key => $value) {
        $process = '';
        if($value['viewA']!=='on'){ //活動關閉
            $status = '<span class="label label-warning">已暫停</span><br>';
        }else if($value['propertyD'] > date('Y-m-d')){ //活動開始日期>今天 = 未開始
            $status = '<span class="label label-success">未開始</span><br>';
        }else if($value['propertyE'] < date('Y-m-d')){ //活動結束日期<今天 = 已結束
            $status = '<span class="label label-default">已結束</span><br>';
        }else if($Ctn==0){ // (活動開啟) && (活動開始日期 <= 今天 <= 活動結束日期) && (第一個)
            $status = '<span class="label label-danger">進行中</span><br>';
            $Ctn++;
            $process = 'processing';//進行中
        }
        
        $row = array(
            "id" => $value['id'],
            "viewA" => ($value['viewA']=='on') ? '開啟' : '關閉',//$value['viewA']
            "propertyDE" => $value['propertyD'] . '<br>~<br>' . $value['propertyE'],
            "img0" => $value['subject']['img0'],
            "subject" => $value['subject']['subject'],
            "subcontent" => $value['subject']['subcontent'],
            "status" => $status,
            "update_at" => $value['update_at'],
            "create_at" => $value['create_at'],
            'customEdit' => '<a href="'. __CustomStickers_Web .'/be/GroupRobot/edit/id/'. $value['id'] .'/action/list"><label class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></label></a>',
        );
        if($process=='processing'){
            array_unshift($rows, $row);
        }else{
            $rows[] = $row;
        }
    }
}


$TPL->assign('columns', $columns);
$TPL->assign('columnsType', $columnsType);
$TPL->assign('system', $system);
$TPL->assign('rows', $rows);
$TPL->assign('nosave', 0);

?>