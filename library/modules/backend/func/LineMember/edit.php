<?php

$id = kCore_get('id');
$rows = $SQL->SetAction('select')
            ->SetWhere("tablename='member'")
            ->SetWhere("next='myself'")
            ->SetWhere("id='". $id ."'")
            ->BuildQuery();
$row = $rows[0];
$columns = array();
switch($row['prev']){
    case 'facebook':
        $UserAreaClass = 'UserArea';
        $ChatStyle = 'fbStyle';
        break;
    case 'line':
        $UserAreaClass = '';
        $ChatStyle = 'lineStyle';
        break;
}
$columns[] = array(
    "type" => "view",
    "label" => "頭貼",
    "name" => "subject/pictureUrl",
    "value" => $row['subject']['pictureUrl'] ? '<div id="UserArea" class="'. $UserAreaClass .'" style="height: 50px;position: sticky;"><div class="contacts-list-img '. $ChatStyle .'" style="background-image: url('. $row['subject']['pictureUrl'] .')"></div></div>' : '',
);
$columns[] = array(
    "type" => "view",
    "label" => "平台",
    "name" => "prev",
    "value" => $row['prev'],
);
$columns[] = array(
    "type" => "view",
    "label" => "名稱",
    "name" => "subject/displayName",
    "value" => $row['subject']['displayName'],
);
$columns[] = array(
    "type" => "view",
    "label" => "追蹤狀態",
    "name" => "prev1",
    "value" => $row['prev1'],
);
$columns[] = array(
    "type" => "view",
    "label" => "UID",
    "name" => "propertyA",
    "value" => $row['propertyA'],
);
$columns[] = array(
    "type" => "hidden",
    "name" => "UID",
    "value" => $row['propertyA'],
);
$columns[] = array(
    "type" => "view",
    "label" => "Notify連動",
    "name" => "propertyC",
    "value" => (!empty($row['propertyC'])&&!empty($row['subject']['profile'])) ? '【'.$row['subject']['profile']['targetType'].'】'.$row['subject']['profile']['target'] : '',
);
$columns[] = array(
    "type" => "view",
    "label" => "最後互動時間",
    "name" => "update_at",
    "value" => $row['update_at'],
);
$columns[] = array(
    "type" => "view",
    "label" => "加入時間",
    "name" => "create_at",
    "value" => $row['create_at'],
);
if(kCore_CheckAuthority('Tag', 'index')){
    $SelectOptions = kCore_Tag('SelectOptions');
    $columns[] = array(
        "type" => "checkbox",
        "label" => "標籤",
        "name" => "Tags",
        "optionVal" => kCore_Tag('SelectOptionVals', array('userId'=>$row['propertyA'])),
        "options" => $SelectOptions,
    );
    $columns[] = array(
        "type" => "hidden",
        "name" => "SelectOptions",
        "value" => !empty($SelectOptions) ? implode('+', array_keys($SelectOptions)) : array(),
    );
}

$TPL->assign('row', $row);
$TPL->assign('columns', $columns);

?>