<?php

$id = kCore_get('id');
$action = kCore_get('action');
$columns = array();
if($action=='list'){
    $rows = $SQL->SetAction('select')
                ->SetWhere("tablename='CardRobot'")
                ->SetWhere("next='cardlist'")
                ->SetWhere("prev='$id'")
                ->BuildQuery();
    $subcolumns = array(
        "questions" => "問題",
        "answers" => "回答",
    );
    if($rows){
        $MemberGetList = array_column($rows, 'propertyA');//UID 清單
        $SQL_LineMember = new kSQL('LineMember');
        $GetMember = $SQL_LineMember->SetAction('select')
                                    ->SetWhere("tablename='member'")
                                    ->SetWhere("prev='line'")
                                    ->SetWhere("next='myself'")
                                    ->SetWhere("propertyA in ('". implode("','", $MemberGetList) ."')")
                                    ->BuildQuery();
        $Get_subject = array_column($GetMember, 'subject', 'propertyA');
        foreach ($rows as $key => $value) {
            $rows[$key]['propertyA'] = $Get_subject[$value['propertyA']]['displayName'] . ' ' . $value['propertyA'];
            $rows[$key]['bottom'] = !empty($value['propertyB']) ? '<img style="height:500px;" src="'.$value['propertyB'].'">' : '';
            if($value['subject']['questions']){
                foreach ($value['subject']['questions'] as $questionkey => $questionvalue) {
                    $rows[$key]['column'][] = array(
                        "questions" => $questionvalue,
                        "answers" => str_replace("\n", '<br>', $value['subject']['answers'][$questionkey]),
                    );
                }
            }
        }
    }
    $TPL->assign('subcolumns', $subcolumns);
    $TPL->assign('rows', $rows);
    $TPL->assign('RowType', 'list');
    $TPL->assign('nosave', 1);
    $TPL->assign('nocollapse', 1);
    $TPL->assign('remove', 1);
    $TPL->assign('nobody', 1);
    $TPL->assign('export', 1);
}else{
    $rows = $SQL->SetAction('select')
        ->SetWhere("tablename='CardRobot'")
        ->SetWhere("next='myself'")
        ->SetWhere("id='". $id ."'")
        ->BuildQuery();
    $row = $rows[0];
    if($row['subject']['img0']){
        $imginfo = getimagesize(__WEB_UPLOAD . '/image/' . $row['subject']['img0']);  
        $row['subject']['width'] = $imginfo[0];
        $row['subject']['height'] = $imginfo[1];
    }
    $columns[] = array(
        "type" => "cardbotImg",
        "label" => "卡片底圖",
        "required" => "on",
        "name" => "img0",
        "img0" => $row['subject']['img0'],
        "width" => $row['subject']['width'],
        "height" => $row['subject']['height'],
    );
    $columns[] = array(
        "type" => "radio",
        "label" => "開啟/關閉",
        "required" => "on",
        "name" => "viewA",
        "value" => $row['viewA'],
        "options" => array(
            "on" => "開啟",
            "off" => "關閉",
        )
    );
    $columns[] = array(
        "type" => "text",//view
        "label" => "標題",
        "required" => "on",
        "name" => "subject",
        "value" => $row['subject']['subject'],
    );
    $columns[] = array(
        "type" => "text",//view
        "label" => "描述",
        "required" => "on",
        "name" => "subcontent",
        "value" => $row['subject']['subcontent'],
    );
    $columns[] = array(
        "type" => "text",//view
        "label" => "預覽-按鈕文字",
        "required" => "off",
        "name" => "prevBtn",
        "value" => $row['subject']['prevBtn'],
    );
    $columns[] = array(
        "type" => "text",//view
        "label" => "開始製作-按鈕文字",
        "required" => "off",
        "name" => "startBtn",
        "value" => $row['subject']['startBtn'],
    );
    if(kCore_CheckAuthority('Tag', 'index')){
        $columns[] = array(
            "type" => "select",
            "label" => "貼標",
            "name" => "sortB",
            "value" => $row['sortB'],
            "options" => kCore_Tag('SelectOptions'),
        );
    }
    
    $TPL->assign('columns', $columns);
    $TPL->assign('row', $row);
    $TPL->assign('actions', $row['subject']['actions']);
    $TPL->assign('FormType', 'cardrobot');
}

?>