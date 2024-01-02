<?php

$columns = array(
    "viewA" => "推播開啟/關閉",
    "subject" => "標題備註",
    "status" => "狀態",
    "SendSuccessRate" => "發送成功人數/發送失敗人數/發送成功率",
    "EstimatedMembers" => "預估發送人數/總人數",
    "propertyBC" => "排程時間",
    "create_at" => "建立時間",
);
$columnsType = array(
    "viewA" => "radio",
    "viewAoptions" => array(
        "on" => "開啟",
        "off" => "關閉",
    ),
    "subject" => "text",
    "status" => "view",
    "SendSuccessRate" => "view",
    "EstimatedMembers" => "view",
    "propertyBC" => "view",
    "create_at" => "view",
);
$Data = $SQL->SetAction('select')
            ->SetWhere("tablename='CrontabMsg'")
            ->SetWhere("next='myself'")
            ->BuildQuery();
$rows = array();
if(!empty($Data)){
    $TagList = array();
    foreach ($Data as $key => $value) {
        if(!empty($value['content']['filter'])){
            if(!empty($value['content']['filter']['Tags'])){
                $TagList = array_merge($TagList, $value['content']['filter']['Tags']);
            }
        }
    }
    if(!empty($TagList)){
        $SQL_Tag = new kSQL('Tag');
        $TagList = array_values(array_unique($TagList));
        $Tags = $SQL_Tag->SetAction('select')
                        ->SetWhere("tablename='Tag'")
                        ->SetWhere("next='myself'")
                        ->SetWhere("id IN ('". implode("','", $TagList) ."')")
                        ->BuildQuery();
        $TagSubject = !empty($Tags) ? array_column($Tags, 'propertyA', 'id') : array();
    }
    foreach ($Data as $key => $value) {
        switch($value['propertyA']){
            case 'date':
                $_propertyBC = $value['propertyB'].' '.$value['propertyC'];
                break;
            case 'now':
                $_propertyBC = '立即發送';
                break;
            case 'tmp':
                $_propertyBC = '暫存';
                break;
        }
        if($value['propertyA']=='tmp'){
            $_status = '<span class="label label-warning">暫存</span>';
        }else if($value['propertyE']){
            $_status = '<span class="label label-success">' . $value['propertyE'] . '-開始執行</span>';
            if($value['propertyD']){
                $_status .= '</br><span class="label label-primary">' . $value['propertyD'] . '-已執行完畢</span>';
            }
        }else{
            $_status = '<div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: 100%">排程中</div>
                        </div>';
        }
        $_FilterHtml = '';
        if(!empty($value['content']['filter'])){
            if(!empty($value['content']['filter']['Tags'])){
                if(!empty($TagSubject)){
                    $_TagItem = '';
                    foreach ($value['content']['filter']['Tags'] as $tkey => $tvalue) {
                        $_TagItem .= !empty($_TagItem) ? '、'.$TagSubject[$tvalue] : $TagSubject[$tvalue];
                    }
                    $_FilterHtml .= '<div>
                                        <span class=\'badge label-danger\'>標籤篩選：</span>
                                        <span>'. $_TagItem .'</span>
                                    </div>';
                }
            }
        }else{
            $_FilterHtml .= '<span>全員推送</span>';
        }
        $_status .= '<br><span class="badge label-info" data-toggle="tooltip" data-html="true" data-original-title="'.$_FilterHtml.'"><i class="fa fa-users"></i>分眾</span>';
        $rows[] = array(
            "id" => $value['id'],
            "viewA" => $value['viewA'],
            "subject" => $value['subject']['subject'],
            "status" => $_status,
            "SendSuccessRate" => !empty($value['content']['SuccessRate']) ? $value['content']['success']." / ".$value['content']['fail']." / ".$value['content']['SuccessRate'].'%' : '',
            "EstimatedMembers" => !empty($value['content']['AllMembers']) ? $value['content']['FilterMembers']."/".$value['content']['AllMembers'] : '',
            "propertyBC" => $_propertyBC,
            "create_at" => $value['create_at'],
        );
    }
}


$TPL->assign('columns', $columns);
$TPL->assign('columnsType', $columnsType);
$TPL->assign('rows', $rows);
$TPL->assign('nosave', 0);

?>