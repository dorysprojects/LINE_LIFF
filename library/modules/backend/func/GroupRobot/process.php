<?php

    function AddRow($_this, $_Module){
        $PS = new kProcess();
        $errorMsg = '';
        if(empty($_this->my['fields']['propertyD'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '開始日期未填';
        }
        if(empty($_this->my['fields']['propertyE'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '結束日期未填';
        }
        if(empty($_this->my['fields']['subject']['img0'])&&empty($_FILES['img0']['tmp_name'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '活動圖片未上傳';
        }
        if(empty($_this->my['fields']['subject']['subject'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '標題未填';
        }
        if(empty($_this->my['fields']['subject']['subcontent'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '描述未填';
        }
        if(empty($_this->my['fields']['subject']['ShareTitle'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '分享標題未填';
        }
        if(empty($_this->my['fields']['subject']['ShareContent'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '分享描述未填';
        }
        if(!$errorMsg && $_this->my['fields']['viewA']==='on'){
            $SQL_GroupRobot = new kSQL('GroupRobot');
            $GroupList = $SQL_GroupRobot->SetAction('select')
                                        ->SetWhere("tablename='GroupRobot'")
                                        ->SetWhere("next='myself'")
                                        ->SetWhere("viewA='on'")
                                        ->SetWhere("(propertyD<='". $_this->my['fields']['propertyD'] ."' AND propertyE>='". $_this->my['fields']['propertyD'] ."') OR (propertyD<='". $_this->my['fields']['propertyE'] ."' AND propertyE>='". $_this->my['fields']['propertyE'] ."')")
                                        ->SetOrder("id DESC")
                                        ->SetLimit(1)
                                        ->BuildQuery();
            if($GroupList[0]){
                if($errorMsg){
                    $errorMsg .= '、';
                }
                $errorMsg .= '日期區間與【'. $GroupList[0]['subject']['subject'] .'】重疊';
            }
        }
        
        if($errorMsg){
            $return['state'] = false;
            $return['msg'] = $errorMsg;
        }else{
            $return = $PS->AddRow($_this, $_Module);
        }
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }

    function UpdateRow($_this, $_Module){
        $PS = new kProcess();
        $errorMsg = '';
        if(empty($_this->my['fields']['propertyD'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '開始日期未填';
        }
        if(empty($_this->my['fields']['propertyE'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '結束日期未填';
        }
        if(empty($_this->my['fields']['subject']['img0'])&&empty($_FILES['img0']['tmp_name'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '活動圖片未上傳';
        }
        if(empty($_this->my['fields']['subject']['subject'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '標題未填';
        }
        if(empty($_this->my['fields']['subject']['subcontent'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '描述未填';
        }
        if(empty($_this->my['fields']['subject']['ShareTitle'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '分享標題未填';
        }
        if(empty($_this->my['fields']['subject']['ShareContent'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '分享描述未填';
        }
        if(!$errorMsg && $_this->my['fields']['viewA']==='on'){
            $id = kCore_get('id');
            $SQL_GroupRobot = new kSQL('GroupRobot');
            $GroupList = $SQL_GroupRobot->SetAction('select')
                                        ->SetWhere("tablename='GroupRobot'")
                                        ->SetWhere("next='myself'")
                                        ->SetWhere("viewA='on'")
                                        ->SetWhere("id!='". $id ."'")
                                        ->SetWhere("(propertyD<='". $_this->my['fields']['propertyD'] ."' AND propertyE>='". $_this->my['fields']['propertyD'] ."') OR (propertyD<='". $_this->my['fields']['propertyE'] ."' AND propertyE>='". $_this->my['fields']['propertyE'] ."')")
                                        ->SetOrder("id DESC")
                                        ->SetLimit(1)
                                        ->BuildQuery();
            if($GroupList[0]){
                if($errorMsg){
                    $errorMsg .= '、';
                }
                $errorMsg .= '日期區間與【'. $GroupList[0]['subject']['subject'] .'】重疊';
            }
        }
        
        if($errorMsg){
            $return['state'] = false;
            $return['msg'] = $errorMsg;
        }else{
            $return = $PS->UpdateRow($_this, $_Module);
        }
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }
    
    function DeleteMultiRows($_this, $_Module){
        $PS = new kProcess();
        $SQL = new kSQL($_Module);
        $errorMsg = '';
        foreach ($_this->my['select'] as $id => $flag) {
            if($id!='' && $flag=='on'){
                $GetPrev = $SQL->SetAction('select')->SetWhere("prev='". $id ."'")->BuildQuery();
                if($GetPrev[0]){
                    $GetGroup = $SQL->SetAction('select')->SetWhere("id='". $id ."'")->BuildQuery();
                    if($errorMsg){
                        $errorMsg .= '、';
                    }
                    $errorMsg .= $GetGroup[0]['subject']['subject'];
                }
            }
        }
        if($errorMsg){
            $return['state'] = false;
            $return['msg'] = '【' . $errorMsg . '】有參加名單，故無法刪除';
        }else{
            $return = $PS->DeleteMultiRows($_this, $_Module);
        }
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }
    
    function SaveMultiRows($_this, $_Module){
        $PS = new kProcess();
        $return = $PS->SaveMultiRows($_this, $_Module);
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }
    
    function Export($_this, $_Module){
        $PS = new kProcess();
        $id = kCore_get('id');
        $action = kCore_get('action');
        $SQL = new kSQL($_Module);
        
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
                "time" => "投票者時間",
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
                $Get_subject = array_column($GetMember, 'subject', 'propertyA');
                $FromArrayVal = array();
                foreach ($GroupRobotRows as $key => $value) {
                    $ColumnVal = array(
                        "投票時間",
                        "投票者名稱",
                        "投票者UID",
                        "投票者追蹤狀態",
                        "得票者名稱",
                        "得票者UID",
                    );
                    $RowVal = array(
                        $value['create_at'],
                        $Vote_subject[$value['propertyB']]['displayName'],
                        $value['propertyB'],
                        $Vote_state[$value['propertyB']],
                        $Get_subject[$value['propertyA']]['displayName'],
                        $value['propertyA'],
                    );
                    if($key==0){
                        $FromArrayVal[] = $ColumnVal;
                    }
                    $FromArrayVal[] = $RowVal;
                }
                $PS->Export($Title='揪團記錄', $FromArrayVal, $filename=$GroupList['subject']['subject'].'-揪團記錄');
            }
        }
    }

$_From = kCore_get('FrontEndAndBackEnd', $_SERVER['PATH_TRANSLATED']);
$_Module = !empty($_From) ? kCore_get($_From, $_SERVER['PATH_TRANSLATED']) : '';
$_Action = ($_From=='backend') ? kCore_get($_Module) : '';
//執行請求函數
$_this = new stdClass();
if($_POST){
    $_this->my = $_POST;
}
if($_GET){
    $_this->my = $_this->my ? array_merge($_this->my, $_GET) : $_GET;
}
$ps = kCore_get('ps');
if (function_exists($ps))
	call_user_func($ps, $_this, $_Module);
else
	echo $ps . '請求不存在';
exit;

?>