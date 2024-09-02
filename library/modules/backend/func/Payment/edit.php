<?php

$id = kCore_get('id');
$rows = $SQL->SetAction('select')
            ->SetWhere("tablename='Payment'")
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
    "type" => "text",
    "label" => "付款方式名稱",
    "required" => "on",
    "name" => "subject",
    "value" => $row['subject']['subject'],
);
$columns[] = array(
    "type" => "text",
    "label" => "手續費",
    "name" => "fee",
    "value" => $row['subject']['fee'],
);
$columns[] = array(
    "type" => "text",
    "label" => "免手續費門檻",
    "name" => "feeThreshold",
    "value" => $row['subject']['feeThreshold'],
);
$columns[] = array(
    "type" => "text",
    "label" => "手續費說明",
    "name" => "feeDescription",
    "value" => $row['subject']['feeDescription'],
);
if(!empty($goldFlow)){
    $goldFlowOptions = array_column($goldFlow, 'propertyB', 'id');
    $goldFlowLabelList = array_column($goldFlow, 'propertyA', 'id');
    $columns[] = array(
        "type" => "select",
        "label" => "金流廠商",
        "required" => "on",
        "name" => "prev",
        "options" => $goldFlowOptions,
        "value" => $row['prev'],
    );
    switch($goldFlowLabelList[$row['prev']]){
        case 'ECPay':
            $columns[] = array(
                "type" => "select",
                "label" => "交易方式",
                "required" => "on",
                "name" => "propertyA",
                "options" => array(
                    "Credit" => "信用卡",
                    "WebATM" => "網路ATM",
                    "ATM" => "ATM",
                    "CVS" => "超商代碼",
                    "BARCODE" => "超商條碼",
                    "GooglePay" => "Google Pay",
                    "ApplePay" => "Apple Pay",
                ),
                "value" => $row['propertyA'],
            );
            switch($row['propertyA']){
                case 'Credit':
                    $columns[] = array(
                        "type" => "checkbox",
                        "label" => "付款期數",
                        "name" => "CreditInstallment",
                        "options" => array(
                            "3" => "3期",
                            "6" => "6期",
                            "12" => "12期",
                            "18" => "18期",
                            "24" => "24期",
                        ),
                        "value" => $row['subject']['CreditInstallment'],
                    );
                    break;
            }
            break;
        case 'LINEPay':
            $columns[] = array(
                "type" => "select",
                "label" => "交易方式",
                "required" => "on",
                "name" => "propertyA",
                "options" => array(
                    "Credit" => "信用卡",
                ),
                "value" => $row['propertyA'],
            );
            break;
    }
}

$TPL->assign('columns', $columns);
$TPL->assign('row', $row);