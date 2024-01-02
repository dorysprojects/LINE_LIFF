<?php

$id = kCore_get('id');
$action = kCore_get('action');
$columns = array();
if($action=='list'){
    $GroupList = $SQL->SetAction('select')
                    ->SetWhere("id='". $id ."'")
                    ->BuildQuery();
    $GroupList = $GroupList[0];
    $GroupRobotRows = $SQL->SetAction('select')
                        ->SetWhere("tablename='GroupRobot'")
                        ->SetWhere("next='vote'")
                        ->SetWhere("prev='$id'")
                        ->BuildQuery();
    $subcolumns = array(
        "pic" => "投票者圖片",
        "name" => "投票者名稱",
        "state" => "追蹤狀態",
        "time" => "投票時間",
    );
    if($GroupRobotRows){
        $MemberVoteList = array_column($GroupRobotRows, 'propertyA');//投票者 清單
        $MemberGetList = array_column($GroupRobotRows, 'propertyB');//得票者 清單
        $SQL_LineMember = new kSQL('LineMember');
        $VoteMember = $SQL_LineMember->SetAction('select')
                                    ->SetWhere("tablename='member'")
                                    ->SetWhere("prev='line'")
                                    ->SetWhere("next='myself'")
                                    ->SetWhere("propertyA in ('". implode("','", $MemberVoteList) ."')")
                                    ->BuildQuery();
        $Vote_subject = array_column($VoteMember, 'subject', 'propertyA');
        $Vote_state = array_column($VoteMember, 'prev1', 'propertyA');
        $GetMember = $SQL_LineMember->SetAction('select')
                                    ->SetWhere("tablename='member'")
                                    ->SetWhere("prev='line'")
                                    ->SetWhere("next='myself'")
                                    ->SetWhere("propertyA in ('". implode("','", $MemberGetList) ."')")
                                    ->BuildQuery();
        $rows = array();
        $VoteList = array();
        foreach ($GroupRobotRows as $key => $value) {
            $VoteList[$value['propertyB']][] = $value;
        }
        foreach ($GetMember as $key => $value) {
            $pic = !empty($value['subject']['pictureUrl']) ? '<img style="height:60px;" src="'.$value['subject']['pictureUrl'].'">' : '';
            $rows[$key]['propertyA'] = '得票人：' . $pic . $value['subject']['displayName'];
            $rows[$key]['create_at'] = '邀請數：' . count($VoteList[$value['propertyA']]);
            if($VoteList[$value['propertyA']]){
                foreach ($VoteList[$value['propertyA']] as $voteKey => $voteVal) {
                    $rows[$key]['column'][] = array(
                        "pic" => !empty($Vote_subject[$voteVal['propertyA']]['pictureUrl']) ? '<img style="height:60px;" src="'.$Vote_subject[$voteVal['propertyA']]['pictureUrl'].'">' : '',
                        "name" => $Vote_subject[$voteVal['propertyA']]['displayName'],
                        "state" => $Vote_state[$voteVal['propertyA']],
                        "time" => $voteVal['create_at'],
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
                ->SetWhere("tablename='GroupRobot'")
                ->SetWhere("next='myself'")
                ->SetWhere("id='$id'")
                ->BuildQuery();
    $row = $rows[0];
    $processing = ($row['propertyD']<=date("Y-m-d") && date("Y-m-d")<=$row['propertyE']) ? 1 : 0;
    $columns[] = array(
        "id" => "StartDate",
        "type" => "date",
        "label" => "開始日期",
        "required" => "on",
        "disabled" => $processing,
        "name" => "propertyD",
        "min" => date("Y-m-d"),
        "value" => $row['propertyD'],
    );
    $columns[] = array(
        "id" => "EndDate",
        "type" => "date",
        "label" => "結束日期",
        "required" => "on",
        "disabled" => $processing,
        "name" => "propertyE",
        "min" => date("Y-m-d"),
        "value" => $row['propertyE'],
    );
    $columns[] = array(
        "type" => "uploadImageA",
        "label" => "活動圖片",
        "required" => "on",
        "name" => "img0",
        "value" => $row['subject']['img0'],
    );
    $columns[] = array(
        "type" => "radio",
        "label" => "活動開啟/關閉",
        "required" => "on",
        "name" => "viewA",
        "value" => $row['viewA'],
        "options" => array(
            "on" => "開啟",
            "off" => "關閉",
        )
    );
    $columns[] = array(
        "type" => "radio",
        "label" => "限制新好友",
        "required" => "on",
        "disabled" => $processing,
        "name" => "viewB",
        "value" => $row['viewB'],
        "options" => array(
            "on" => "開啟",
            "off" => "關閉",
        )
    );
    $columns[] = array(
        "type" => "radio",
        "label" => "一人一票",
        "required" => "on",
        "disabled" => $processing,
        "name" => "viewC",
        "value" => $row['viewC'],
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
        "label" => "邀請好友-按鈕文字",
        "placeholder" => "邀請好友",
        "required" => "off",
        "name" => "btn0",
        "value" => $row['subject']['btn0'],
    );
    $columns[] = array(
        "type" => "text",//view
        "label" => "查詢票數-按鈕文字",
        "placeholder" => "查詢票數",
        "required" => "off",
        "name" => "btn1",
        "value" => $row['subject']['btn1'],
    );
    if(kCore_CheckAuthority('Tag', 'index')){
        $columns[] = array(
            "type" => "select",
            "label" => "得票者貼標",
            "name" => "sortB",
            "value" => $row['sortB'],
            "options" => kCore_Tag('SelectOptions'),
        );
        $columns[] = array(
            "type" => "select",
            "label" => "投票者貼標",
            "name" => "sortC",
            "value" => $row['sortC'],
            "options" => kCore_Tag('SelectOptions'),
        );
    }
    $TPL->assign('processing', $processing);
    $TPL->assign('columns', $columns);
    $TPL->assign('row', $row);
    $TPL->assign('actions', $row['subject']['actions']);
    $TPL->assign('FormType', 'grouprobot');
}

?>