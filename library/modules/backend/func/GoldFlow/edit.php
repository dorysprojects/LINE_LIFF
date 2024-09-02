<?php

$id = kCore_get('id');
$rows = $SQL->SetAction('select')
            ->SetWhere("tablename='GoldFlow'")
            ->SetWhere("id='$id'")
            ->BuildQuery();
$row = $rows[0];
$columns = array();
$columns[] = array(
    "type" => "radio",
    "label" => "啟用",
    "required" => "on",
    "name" => "viewA",
    "options" => array(
        "on" => "開啟",
        "off" => "關閉",
    ),
    "value" => $row['viewA'],
);
$columns[] = array(
    "type" => "radio",
    "label" => "金流廠商代碼",
    "name" => "propertyA",
    "options" => array(
        "ECPay" => "綠界科技",
        "LINEPay" => "LINE Pay",
    ),
    "value" => $row['propertyA'],
);
$columns[] = array(
    "type" => "text",
    "label" => "金流廠商名稱",
    "name" => "propertyB",
    "value" => $row['propertyB'],
);
$columns[] = array(
    "type" => "radio",
    "label" => "沙盒模式",
    "required" => "on",
    "name" => "viewB",
    "options" => array(
        "on" => "開啟(測試模式)",
        "off" => "關閉(正式模式)",
    ),
    "value" => $row['viewB'],
);
$columns[] = array(
    "type" => "text",
    "label" => "商家ID",//MerchantID、
    "name" => "storeId",
    "value" => $row['subject']['storeId'],
);
$columns[] = array(
    "type" => "text",
    "label" => "商家密鑰",//HashKey、
    "name" => "secret",
    "value" => $row['subject']['secret'],
);
$columns[] = array(
    "type" => "text",
    "label" => "商家HashIV",//HashIV
    "name" => "HashIV",
    "value" => $row['subject']['HashIV'],
);
$columns[] = array(
    "type" => "text",
    "label" => "信用卡驗證碼",
    "name" => "CreditCheckCode",
    "value" => $row['subject']['CreditCheckCode'],
    "remark" => "廠商後台->信用卡收單->信用卡授權資訊中可查到",
);
$TPL->assign('columns', $columns);
$TPL->assign('row', $row);