<?php

//echo "<script>alert('". json_encode($_SERVER) ."');</script>";

$liffIdTmp = explode('LIFF_STORE:expires:', $_SERVER['HTTP_COOKIE']);
$liffIdTmp2 = explode('=', $liffIdTmp[1]);
$liffId = $liffIdTmp2[0];

$liffId = (!empty($liffId)) ? $liffId : __LIFF_URLMSG__ID;//LineLogin Liff

if(!empty($_GET['code'])){
    $UrlMsgId = $_SESSION[__DOMAIN]['UrlMsg']['id'];
    $UrlMsgUserId = $_SESSION[__DOMAIN]['UrlMsg']['userId'];
    $UrlMsgMode = $_SESSION[__DOMAIN]['UrlMsg']['mode'];
    $UrlMsgAction = $_SESSION[__DOMAIN]['UrlMsg']['action'];
    unset($_SESSION[__DOMAIN]['UrlMsg']);
}else{
    $Param = array();
    if(!empty($_GET['liff_state'])){
        $getTmp = explode('?', $_GET['liff_state']);
        $get = explode('&', $getTmp[1]);
        if($get){
            foreach ($get as $key => $value) {
                $valueTmp = explode('=', $value);
                $Param[$valueTmp[0]] = $valueTmp[1];
            }
        }
    }else{
        $Param = $_GET;
    }
    $UrlMsgId = $Param['id'];
    $UrlMsgUserId = $Param['userId'];
    $UrlMsgMode = $Param['mode'];
    $UrlMsgAction = $Param['action'];
    if($Param){
        $_SESSION[__DOMAIN]['UrlMsg'] = $Param;
    }
}

$Profile = $_SESSION[__DOMAIN.'_LineLiffProfile'];
if($Profile->userId){
    $line->LineMessageDB_Membe = new kSQL('LineMember');
    $LineMsgProfile = $line->profile2($Profile->userId);
    if(!$Profile->friendFlag && !empty($LineMsgProfile->userId)){
        $Profile->friendFlag = true;
        $line->LineMessageDB_Membe->SetAction('update')
                                    ->SetWhere("propertyA='". $Profile->userId ."'")
                                    ->SetValue("prev", "follow")
                                    ->BuildQuery();
        $_SESSION[__DOMAIN.'_LineLiffProfile'] = $Profile;//儲存[暫存profile]
    }else if($Profile->friendFlag && empty($LineMsgProfile->userId)){
        $Profile->friendFlag = false;
        $line->LineMessageDB_Membe->SetAction('update')
                                    ->SetWhere("propertyA='". $Profile->userId ."'")
                                    ->SetValue("prev", "unfollow")
                                    ->BuildQuery();
        $_SESSION[__DOMAIN.'_LineLiffProfile'] = $Profile;//儲存[暫存profile]
    }
    $line->LineMessageData_Member = $line->LineMessageDB_Membe->SetAction('select')
                                                                ->SetWhere("propertyA='". $Profile->userId ."'")
                                                                ->SetLimit(1)
                                                                ->BuildQuery();
                                                                $CloseFlag = true;
    if(!empty($UrlMsgId)){
        $FELX = new FELX();
        switch($UrlMsgId){
            case 'PlayGame':
                $CloseFlag = false;
                // echo "<script>alert('".$UrlMsgId.'-'.$UrlMsgAction.'-'.base64_decode($UrlMsgUserId).'-'.$UrlMsgMode."');</script>";
                break;
            case 'Call':
                if($UrlMsgUserId){
                    $Val = array(
                        "type" => "telephone",
                        "title" => "您有一通來電",
                        "title-size" => "md",
                        "box-uri" => base64_decode($UrlMsgUserId),
                        "image-width" => '55px',
                        "image-height" => '55px',
                        "bubble-size" => "micro",//micro
                    );
                    $line->SetMessageObject($FELX->FLEX_SendMessage('來電通知', $FELX->FLEX_Alert($Val)));
                }
                break;
            case 'Group':
                $SQL_GroupRobot = new kSQL('GroupRobot');
                $GroupListTmp = $SQL_GroupRobot->SetAction('select')
                                            ->SetWhere("tablename='GroupRobot'")
                                            ->SetWhere("next='myself'")
                                            ->SetWhere("viewA='on'")
                                            ->SetWhere("propertyD <= '". date('Y-m-d') ."'")
                                            ->SetWhere("propertyE >= '". date('Y-m-d') ."'")
                                            ->SetOrder("id DESC")
                                            ->SetLimit(1)
                                            ->BuildQuery();
                $GroupList = $GroupListTmp[0];
                if($GroupList){
                    $buttons_actions = array();
                    $btn0 = !empty($GroupList['subject']['Sharebtn0']) ? $GroupList['subject']['Sharebtn0'] : '前往投票';
                    $btn1 = !empty($GroupList['subject']['Sharebtn1']) ? $GroupList['subject']['Sharebtn1'] : '前往參加';
                    $btn2 = !empty($GroupList['subject']['Sharebtn2']) ? $GroupList['subject']['Sharebtn2'] : '活動說明';
                    $buttons_actions[] = $line->uri($btn0, 'https://liff.line.me/'.__LIFF_URLMSG__ID.'?id=Vote&userId={userId}');
                    $buttons_actions[] = $line->uri($btn1, 'https://line.me/R/oaMessage/@'. __LineAtID .'/?' . urlencode($SQL_GroupRobot->SystemRow[0]['propertyC']));
                    if(!empty($GroupList['subject']['EventDescription'])){
                        $line->uri($btn2, $GroupList['subject']['EventDescription']);
                    }
                    $line->buttons(__WEB_UPLOAD . '/image/'.$GroupList['subject']['img0'], $GroupList['subject']['ShareTitle'], $GroupList['subject']['ShareTitle'], $GroupList['subject']['ShareContent'], $buttons_actions);
                }else{
                    echo "<script>alert('無進行中的活動');</script>";
                }
                break;
            case 'Vote':
                $TPL->assign('Vote', $UrlMsgUserId);
                break;
            default :
                $SQL = new kSQL($_Module); //資料庫物件
                $Data = $SQL->SetAction('select')
                            ->SetWhere("tablename='UrlMsg'")
                            ->SetWhere("next='myself'")
                            ->SetWhere("id='". $UrlMsgId ."'")
                            ->BuildQuery();
                $ReplaceList = array(
                    'displayName' => $line->LineMessageData_Member[0]['subject']['displayName'],
                );
                if(!empty($UrlMsgAction)){
                    $ReplaceArray = explode('_', urldecode($UrlMsgAction));
                    if(!empty($ReplaceArray)){
                        foreach ($ReplaceArray as $key => $value) {
                            $TmpVal = explode('-', $value);
                            if(empty($ReplaceList[$TmpVal[0]])){
                                $ReplaceList[$TmpVal[0]] = $TmpVal[1];
                            }
                        }
                    }
                }
                //print_r($Data);
                if(!empty($Data[0])){
                    $line->SetMessages($Data[0], 'liff');
                    if(!empty($ReplaceList)){
                        $FlexMsgJson = json_encode($line->action['data'][count($line->action['data'])-1]);
                        foreach ($ReplaceList as $key => $value) {
                            $FlexMsgJson = str_replace('{'.$key.'}', $value, $FlexMsgJson);
                        }
                        $line->action['data'][count($line->action['data'])-1] = json_decode($FlexMsgJson, true);
                    }
                }
                break;
        }
        $Msg = !empty($line->action['data']) ? json_encode($line->action['data']) : '';
        $line->action['data'] = array();
    }else{
        print_r('連結有誤');exit();
    }
}

$TPL->assign('liffId', $liffId);
$TPL->assign('UrlMsgId', $UrlMsgId);
$TPL->assign('UrlMsgUserId', $UrlMsgUserId);
$TPL->assign('UrlMsgMode', $UrlMsgMode);
$TPL->assign('UrlMsgAction', $UrlMsgAction);
$TPL->assign('Data', $Data);
$TPL->assign('Msg', $Msg);
$TPL->assign('CloseFlag', $CloseFlag);

?>