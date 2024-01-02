<?php

$SQL = new kSQL($_Module); //資料庫物件
$store_all_list = $SQL->SetAction("select")
            ->SetWhere("id!='1'")
            ->SetOrder("id DESC")//NO
            ->SetOrder("viewA DESC")//favorite
            ->SetOrder("create_at DESC")//datetime
            ->BuildQuery();
if(!empty($store_all_list)){
    $subjects = array_column($store_all_list, 'subject');
    $displayName = array_column($subjects, 'displayName');
    $store_names = array_unique($displayName);
    $search_store_all_names = array_count_values($displayName);

    $store_all_id = join("\", \"", array_column($store_all_list, 'id'));
    $store_all_name = join("\", \"", array_column($subjects, 'displayName'));
    $store_all_profile_pic = join("\", \"", array_column($subjects, 'pictureUrl'));
    $store_all_profile_statusMessage = join("\", \"", array_column($subjects, 'statusMessage'));
    $store_all_pic = join("\", \"", array_column($store_all_list, 'propertyB'));
    $store_all_datetime = join("\", \"", array_column($store_all_list, 'create_at'));
    $store_all_favorite = join("\", \"", array_column($store_all_list, 'viewA'));
}

if (!empty($userId)) {
    $store_list = $SQL->SetAction("select")
                    ->SetWhere("propertyA like '". $userId ."'")//userId
                    ->SetOrder("viewA DESC")//favorite
                    ->SetOrder("create_at DESC")////datetime
                    ->BuildQuery();
    if(!empty($store_list)){
        $store_datetime = join("\", \"", array_column($store_list, 'create_at'));
    }
}

$TPL->assign('Html_close2', $kHTML->get('close', 'font-size: 25px;color: #f58e31;'));
$TPL->assign('Html_upload_form', $kHTML->get('upload_form'));
$TPL->assign('store_list', $store_list);
$TPL->assign('store_names', $store_names);
$TPL->assign('search_store_all_names', $search_store_all_names);
$TPL->assign('store_all_id', $store_all_id);
$TPL->assign('store_all_name', $store_all_name);
$TPL->assign('store_all_profile_pic', $store_all_profile_pic);
$TPL->assign('store_all_profile_statusMessage', $store_all_profile_statusMessage);
$TPL->assign('store_all_pic', $store_all_pic);
$TPL->assign('store_all_datetime', $store_all_datetime);
$TPL->assign('store_all_favorite', $store_all_favorite);
$TPL->assign('store_datetime', $store_datetime);