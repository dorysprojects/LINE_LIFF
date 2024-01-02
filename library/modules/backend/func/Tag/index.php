<?php

$id = kCore_get('id');
if(!empty($id)){
    $columns = array(
        "pictureUrl" => "頭貼",
        "prev" => "平台",
        "displayName" => "名稱",
        "prev1" => "追蹤狀態",
        "propertyA" => "UID",
        "create_at" => "首次貼標時間",
        "update_at" => "最後貼標時間",
    );
    $Tag = $SQL->SetAction('select')
                ->SetWhere("tablename='Tag'")
                ->SetWhere("next='myself'")
                ->SetWhere("id='". $id ."'")
                ->BuildQuery();
    $Members = $SQL->SetAction('select')
                ->SetWhere("tablename='Tag'")
                ->SetWhere("next='member'")
                ->SetWhere("prev='". $id ."'")
                ->BuildQuery();
    if(!empty($Members)){
        $Members_create_at = array_column($Members, 'create_at', 'propertyA');
        $Members_update_at = array_column($Members, 'update_at', 'propertyA');
        $SQL_LineMember = new kSQL('LineMember');
        $MembersRows = $SQL_LineMember->SetAction('select')
                                    ->SetWhere("tablename='member'")
                                    ->SetWhere("next='myself'")
                                    ->SetWhere("propertyA IN ('". implode("','", array_column($Members, 'propertyA')) ."')")
                                    ->BuildQuery();
        if(!empty($MembersRows)){
            foreach ($MembersRows as $key => $value) {
                if($value['prev']=='facebook'){
                    $ChatStyle = 'fbStyle';
                }else{
                    $ChatStyle = empty($value['propertyE']) ? 'lineStyle' : 'lineStyle fbStyle';
                }
                switch($value['prev']){
                    case 'facebook':
                        $UserAreaClass = 'UserArea';
                        $ChatStyle = 'fbStyle';
                        break;
                    case 'line':
                        $UserAreaClass = '';
                        $ChatStyle = 'lineStyle';
                        break;
                }
                $rows[] = array(
                    "CustomEditUrl" => '/be/LineMember/edit/id/'. $value['id'] .'',
                    "prev" => $value['prev'],
                    "pictureUrl" => $value['subject']['pictureUrl'] ? '<div id="UserArea" class="'. $UserAreaClass .'" style="height: 50px;position: sticky;"><div class="contacts-list-img '. $ChatStyle .'" style="background-image: url('. $value['subject']['pictureUrl'] .')"></div></div>' : '',
                    "displayName" => $value['subject']['displayName'],
                    "prev1" => $value['prev1'],
                    "propertyA" => $value['propertyA'],
                    "create_at" => $Members_create_at[$value['propertyA']],
                    "update_at" => $Members_update_at[$value['propertyA']],
                );
            }
        }
    }
    $TPL->assign('BoxTitle', '標籤名稱：' . $Tag[0]['propertyA']);
    $TPL->assign('LeftCustomBtn', '<a href="/be/Tag"><label class="btn btn-default btn-sm">返回</label></a>');
    $TPL->assign('noadd', 1);
}else{
    $columns = array(
        "viewA" => "開啟/關閉",
        "propertyA" => "標籤名稱",
    );
    $columnsType = array(
        "viewA" => "radio",
        "viewAoptions" => array(
            "on" => "開啟",
            "off" => "關閉",
        ),
        "propertyA" => "text",
    );
    $Data = $SQL->SetAction('select')
                ->SetWhere("tablename='Tag'")
                ->SetWhere("next='myself'")
                ->BuildQuery();
    $rows = array();
    if($Data){
        foreach ($Data as $key => $value) {
            $rows[] = array(
                "id" => $value['id'],
                "viewA" => $value['viewA'],
                "propertyA" => $value['propertyA'],
                "list" => '<a href="/be/Tag/index/id/'. $value['id'] .'"><label class="btn btn-success btn-sm"><i class="fa fa-eye"></i></label></a>',
            );
        }
    }
}
    


$TPL->assign('columns', $columns);
$TPL->assign('columnsType', $columnsType);
$TPL->assign('rows', $rows);
$TPL->assign('nosave', 1);
$TPL->assign('nodelete', 1);
$TPL->assign('noselect', 1);

?>