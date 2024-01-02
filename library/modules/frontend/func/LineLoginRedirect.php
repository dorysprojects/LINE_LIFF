<?php

$kLineLogin = new kLineLogin();
if(!empty($_SESSION[__DOMAIN.'line_access_token'])){
    $Verify = $kLineLogin->Verify();
    if($Verify){
        $kLineLogin->GetAccessToken($_GET['code']);
    }
}else{
    $kLineLogin->GetAccessToken($_GET['code']);
}

if(!empty($_SESSION[__DOMAIN.'line_access_token'])){
    //加入xajax
    include_once $_FromFuncPath.'xajax.php';
    if(!empty($xajax)){
        $TPL->assign('xajax_js', $xajax->getJavascript());
    }
    
    $FriendStatus = $kLineLogin->friendFlag();
    $Profile = $kLineLogin->Profile();
    $Profile['friendFlag'] = $FriendStatus['friendFlag'] ? 'true' : 'false';
    $line->LineMemberProcess('login', 'LineLoginRedirect', $Profile);
    
    if($FriendStatus['friendFlag']){
        $data = !empty($_SESSION['data']) ? json_decode($_SESSION['data'], true) : array();
        $redirect = (strpos($_SESSION['redirect'], '?') !== false) ? $_SESSION['redirect'].'&' : $_SESSION['redirect'].'?';
        $redirect .= (!empty($_GET)) ? http_build_query($_GET).'&' : '';
        $redirect .= (!empty($Profile)) ? http_build_query($Profile).'&' : '';
        $redirect .= (!empty($data)) ? http_build_query($data).'&' : '';
        $href = (substr($redirect, 0, -1)=='?' || substr($redirect, 0, -1)=='&') ? substr($redirect, 0, -1) : $redirect;
        header("Location: " . $href);
    }else{ //請先加入好友
        $BOT_Model_TMP = explode(__CustomStickers_Web.'/ft/', $_SESSION['redirect']);
        $BOT_Model_TMP2 = (strpos($BOT_Model_TMP[1], '/') !== false) ? explode("/", $BOT_Model_TMP[1]) : explode("?", $BOT_Model_TMP[1]);
        $BOT_Model = $BOT_Model_TMP2[0];
        $content = array(
            "BOT_Type" => "WaitFollow",
            "BOT_Model" => $BOT_Model,
            "BOT_Action" => '',
            "BOT_Data" => '',
            "BOT_Box" => '',
            "BOT_Mode" => '',
            "BOT_Date" => $line->LineMessageDB_Membe->getNowTime(),
            "BOT_ID" => '',
        );
        $line->LineMessageDB_Membe->SetAction('update')
                                ->SetWhere("id='". $line->LineMessageData_Member[0]['id'] ."'")
                                ->SetValue('content', json_encode($content))
                                ->BuildQuery();
        $TPL->assign('userId', $Profile['userId']);
        $TPL->assign('AddAction', '');
        $TPL->assign('CheckFollow', 1);
        $TPL->assign('AddFriendBtn', 1);
        $TPL->assign('ErrorTitle', '好友確認');
        $TPL->assign('ErrorColor', '#d9534f');
        $TPL->assign('ErrorText', '請加入好友');
        $TPL->assign('ErrorIcon', 'exclamation');
        
        $TPL->display(__FrontendView . 'ShowMsg.tpl');
    }
}

?>