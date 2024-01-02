<?php

$id = kCore_get('id');
$action = kCore_get('action');
$columns = array();
if($action=='list'){
    $rows = $SQL->SetAction('select')
                ->SetWhere("tablename='QARobot'")
                ->SetWhere("next='formlist'")
                ->SetWhere("prev='$id'")
                ->BuildQuery();
    $subcolumns = array(
        "question" => "問題",
        "type" => "問題類型",
        "answer" => "回答",
    );
    $typeList = array(
        "text" => "文字",
        "number" => "數字",
        "datetime" => "日期/時間",
        "date" => "日期",
        "time" => "時間",
        "phone" => "手機",
        "email" => "信箱",
        "radio" => "單選",
        "checkbox" => "多選",
        "select" => "下拉選單",
        "location" => "位置",
        "image" => "照片",
        "video" => "影片",
        "audio" => "語音",
        "file" => "檔案",
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
            if($value['subject']['question']){
                foreach ($value['subject']['question'] as $questionkey => $questionvalue) {
                    switch($questionvalue['type']){
                        case 'location':
                            $answer = $value['subject']['answer'][$questionkey]['address'] . ' ('. $value['subject']['answer'][$questionkey]['latitude'] .','. $value['subject']['answer'][$questionkey]['longitude'] .')';
                            break;
                        case 'checkbox':
                            $answer = str_replace(',', '、', $value['subject']['answer'][$questionkey]);
                            break;
                        case 'image':
                            $answer = '<img style="height:100px;" src="'. $value['subject']['answer'][$questionkey] .'">';
                            break;
                        case 'video':
                            $answer = '<video style="height:100px;" controls><source src="'. $value['subject']['answer'][$questionkey] .'"></video>';
                            break;
                        case 'audio':
                            $answer = '<audio style="height:100px;" controls><source src="'. $value['subject']['answer'][$questionkey] .'"></audio>';
                            break;
                        case 'file':
                            $answer = '<a target="_blank" href="'. $value['subject']['answer'][$questionkey] .'"><div style="height:60px;">查看</div></a>';
                            break;
                        default:
                            $answer = $value['subject']['answer'][$questionkey];
                            break;
                    }
                    $rows[$key]['column'][] = array(
                        "question" => $questionvalue['question'],
                        "type" => $typeList[$questionvalue['type']],
                        "answer" => $answer,
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
                ->SetWhere("tablename='QARobot'")
                ->SetWhere("next='myself'")
                ->SetWhere("id='". $id ."'")
                ->BuildQuery();
    $row = $rows[0];
    $columns[] = array(
        "type" => "uploadImageA",
        "label" => "問卷圖片",
        "required" => "on",
        "name" => "img0",
        "value" => $row['subject']['img0'],
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
        "label" => "開始作答-按鈕文字",
        "required" => "off",
        "name" => "btn0",
        "value" => $row['subject']['btn0'],
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
    $TPL->assign('FormType', 'qarobot');
}

?>