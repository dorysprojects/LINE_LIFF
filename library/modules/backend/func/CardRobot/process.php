<?php

    function AddRow($_this, $_Module){
        $PS = new kProcess();
        $errorMsg = '';
        if(empty($_this->my['fields']['subject']['img0'])&&empty($_FILES['img0']['tmp_name'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '卡片底圖未上傳';
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
        $questionCtn = 0;
        for($i=0;$i<10;$i++){
            if(!empty($_this->my['fields']['subject']['question' . $i])){
                $questionCtn++;
            }
        }
        if($questionCtn===0){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '請至少新增一個問題';
        }
        if(empty($_this->my['fields']['subject']['actions'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '請至少新增一個文字位置';
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
        if(empty($_this->my['fields']['subject']['img0'])&&empty($_FILES['img0']['tmp_name'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '卡片底圖未上傳';
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
        $questionCtn = 0;
        for($i=0;$i<10;$i++){
            if(!empty($_this->my['fields']['subject']['question' . $i])){
                $questionCtn++;
            }
        }
        if($questionCtn===0){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '請至少新增一個問題';
        }
        if(empty($_this->my['fields']['subject']['actions'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '請至少新增一個文字位置';
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
            $return['msg'] = '【' . $errorMsg . '】有製卡清單，故無法刪除';
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
            $data = $SQL->SetAction('select')
                        ->SetWhere("tablename='CardRobot'")
                        ->SetWhere("id='$id'")
                        ->BuildQuery();
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
                $FromArrayVal = array();
                foreach ($rows as $key => $value) {
                    if($value['subject']['questions']){
                        $ColumnVal = array(
                            "時間",
                            "名稱",
                            "UID",
                            "圖片",
                        );
                        $RowVal = array(
                            $value['create_at'],
                            $Get_subject[$value['propertyA']]['displayName'],
                            $value['propertyA'],
                            $value['propertyB'],
                        );
                        foreach ($value['subject']['questions'] as $questionkey => $questionvalue) {
                            $ColumnVal[] = $questionvalue;
                            $RowVal[] = $value['subject']['answers'][$questionkey];
                        }
                        if($key==0){
                            $FromArrayVal[] = $ColumnVal;
                        }
                        $FromArrayVal[] = $RowVal;
                    }
                }
                $PS->Export($Title='製卡記錄', $FromArrayVal, $filename=$data[0]['subject']['subject'].'-製卡記錄');
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