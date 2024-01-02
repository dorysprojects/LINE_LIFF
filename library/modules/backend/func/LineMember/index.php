<?php

$columns = array(
    "pictureUrl" => "頭貼",
    "prev" => "平台",
    "displayName" => "名稱",
    "prev1" => "追蹤狀態",
    "propertyA" => "UID",
    "propertyC" => "Notify連動",
    "update_at" => "最後互動時間",
    "create_at" => "加入時間",
);

$Data = array();
$Data = array_merge($Data, $LineMemberData);
$Data = array_merge($Data, $FacebookMemberData);
$FacebookData_id = array_column($FacebookMemberData, 'id', 'propertyA');
$FacebookData_subject = array_column($FacebookMemberData, 'subject', 'propertyA');
$FacebookData_prev = array_column($FacebookMemberData, 'prev', 'propertyA');
$FacebookData_update_at = array_column($FacebookMemberData, 'update_at', 'propertyA');
$FacebookData_create_at = array_column($FacebookMemberData, 'create_at', 'propertyA');
$rows = array();

if($Data){
    $jsV2 = '';
    foreach ($Data as $key => $value) {
        if( $value['prev']=='line' || ($value['prev']=='facebook'&&empty($value['propertyE'])) ){
            if($value['prev']=='facebook'){
                $ChatStyle = 'fbStyle';
            }else{
                $ChatStyle = empty($value['propertyE']) ? 'lineStyle' : 'lineStyle fbStyle';
            }
            if($value['propertyE']){
                $FB_BR = '<br><br><br>';
                $FB_UID = $value['propertyE'];
                $FB_Edit = $FB_BR . '<a href="/be/LineMember/edit/id/'.$FacebookData_id[$FB_UID].'" class="btn btn-info btn-sm">
                    <span class="fa fa-edit"></span>
                </a>';
                $FB_prev = $FB_BR . $FacebookData_prev[$FB_UID];
                $FB_subject = $FacebookData_subject[$FB_UID];
                $FB_displayName = $FB_BR . $FB_subject['displayName'];
                $FB_pictureUrl = $FB_subject['pictureUrl'] ? $FB_BR . '<div class="contacts-list-img '. $ChatStyle .'" style="background-image: url('. $FB_subject['pictureUrl'] .')"></div>' : '';
                $FB_update_at = $FB_BR . $FacebookData_update_at[$FB_UID];
                $FB_create_at = $FB_BR . $FacebookData_create_at[$FB_UID];
                $UserAreaHeight = '110';
                $UserAreaClass = 'UserArea';
                $jsV2 = '<script>'.
                                'window.onload = function(){' .
                                    '$("#template_form th>.UserArea").parents("tr").css("border", "1px solid #ddd")' .
                                                                '.css("border-top", "4px double #ddd")' .
                                                                '.css("border-bottom", "4px double #ddd");' .
                                '};' .
                            '</script>';
            }else{
                $FB_BR = '';
                $FB_Edit = '';
                $FB_UID = '';
                $FB_prev = '';
                $FB_displayName = '';
                $FB_pictureUrl = '';
                $FB_update_at = '';
                $FB_create_at = '';
                $UserAreaHeight = '50';
                $UserAreaClass = '';
            }
            $UserAreaStyle = 'height: '. $UserAreaHeight .'px;position: sticky;';
            $rows[] = array(
                "id" => $value['id'],
                "customEdit" => $FB_Edit,
                "prev" => $value['prev'] . $FB_prev,
                "pictureUrl" => $value['subject']['pictureUrl'] ? '<div id="UserArea" class="'. $UserAreaClass .'" style="'. $UserAreaStyle .'"><div class="contacts-list-img '. $ChatStyle .'" style="background-image: url('. $value['subject']['pictureUrl'] .')"></div>'. $FB_pictureUrl .'</div>' : '',
                "displayName" => $value['subject']['displayName'] . $FB_displayName,
                "prev1" => $value['prev1'],
                "propertyA" => $value['propertyA'] . $FB_BR .  $FB_UID,
                "propertyC" => (!empty($value['propertyC'])&&!empty($value['subject']['profile'])) ? '【'.$value['subject']['profile']['targetType'].'】'.$value['subject']['profile']['target'] : '',
                "update_at" => $value['update_at'] . $FB_update_at,
                "create_at" => $value['create_at'] . $FB_create_at,
            );
        }
    }
}

$TPL->assign('jsV2', $jsV2);
$TPL->assign('columns', $columns);
$TPL->assign('rows', $rows);

$TPL->assign('noadd', 1);
$TPL->assign('nosave', 1);
$TPL->assign('nodelete', 1);
$TPL->assign('noselect', 1);

?>