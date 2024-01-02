<?php

$columns = array(
    "liffid" => "LiffId",
    "liffurl" => "Liff網址",
    "type" => "網頁比例",
    "url" => "連結",
);
$GetLiffList = $LIFF->GetLiffList();
$rows = array();
if($GetLiffList['apps']){
    foreach ($GetLiffList['apps'] as $key => $value) {
        $rows[$key]['id'] = $value['liffId'];
        $rows[$key]['liffid'] = $value['liffId'];
        $rows[$key]['liffurl'] = "https://liff.line.me/" . $value['liffId'];
        $percent = '';
        switch ($value['view']['type']) {
            case 'full':
                $percent = '(100%)';
                break;
            case 'tall':
                $percent = '(80%)';
                break;
            case 'compact':
                $percent = '(50%)';
                break;
        }
        $rows[$key]['type'] = $value['view']['type'] . $percent;
        $rows[$key]['url'] = $value['view']['url'];
    }
}

$TPL->assign('columns', $columns);
$TPL->assign('rows', $rows);
$TPL->assign('nosave', 1);

?>

