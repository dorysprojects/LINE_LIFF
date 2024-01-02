<?php

$columns = array(
    "code" => "代碼",
    "viewA" => "回應開啟/關閉",
    "propertyA" => "關鍵字",
    "link" => "連結",
    "update_at" => "更新時間",
    "create_at" => "建立時間",
);
$columnsType = array(
    "code" => "view",
    "viewA" => "radio",
    "viewAoptions" => array(
        "on" => "開啟",
        "off" => "關閉",
    ),
    "propertyA" => "text",
    "link" => "view",
    "update_at" => "view",
    "create_at" => "view",
);
$Data = $SQL->SetAction('select')
            ->SetWhere("tablename='UrlMsg'")
            ->SetWhere("next='myself'")
            ->BuildQuery();
$rows = array();
if($Data){
    foreach ($Data as $key => $value) {
        $liffUrl = 'https://liff.line.me/' . __LIFF_URLMSG__ID . '?id=' . $value['id'];
        $rows[] = array(
            "id" => $value['id'],
            "code" => 'BOT(_)UrlMsg(_)' . $value['id'],
            "viewA" => $value['viewA'],
            "propertyA" => $value['propertyA'],
            "link" => '<input class="form-control" style="display:none;" type="text" id="LiffUrl'.$value['id'].'" value="'.$liffUrl.'" readonly><div class="btn btn-success" onclick="$(\'#LiffUrl'.$value['id'].'\').show();document.getElementById(\'LiffUrl'.$value['id'].'\').select();document.execCommand(\'Copy\');alert(\'已複製活動網址\');$(\'#LiffUrl'.$value['id'].'\').hide();">複製</div>',
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