<?php

//echo "<script>alert('". json_encode($_SERVER) ."');</script>";

$liffIdTmp = explode('LIFF_STORE:expires:', $_SERVER["HTTP_COOKIE"]);
$liffIdTmp2 = explode('=', $liffIdTmp[1]);
$liffId = $liffIdTmp2[0];

$liffId = (!empty($liffId)) ? $liffId : __LIFF_ANSWER__ID;//LineLogin Liff

if(!empty($_GET['code'])){
    $UrlMsgType = $_SESSION[__DOMAIN]["UrlMsg"]["type"];
    $UrlMsgOption = $_SESSION[__DOMAIN]["UrlMsg"]["option"];
    $UrlMsgOpenExternalBrowser = $_SESSION[__DOMAIN]["UrlMsg"]["openExternalBrowser"];
    unset($_SESSION[__DOMAIN]["UrlMsg"]);
}else{
    $Param = array();
    if(!empty($_GET["liff_state"])){
        $getTmp = explode('?', $_GET["liff_state"]);
        $get = explode('&', $getTmp[1]);
        if($get){
            foreach ($get as $key => $value) {
                if($value){
                    $valueTmp = explode('=', $value);
                    $Param[$valueTmp[0]] = $valueTmp[1];
                }
            }
        }
    }else{
        $Param = $_GET;
    }
    $UrlMsgType = $Param["type"];
    $UrlMsgOption = $Param["option"];
    $UrlMsgOpenExternalBrowser = $Param["openExternalBrowser"];
    if($Param){
        $_SESSION[__DOMAIN]["UrlMsg"] = $Param;
    }
}


$item = array();
$_Title = '作答';
switch($UrlMsgType){
    case 'invoice':
        $_Title = '發票資訊';
        $openExternalBrowser = ($UrlMsgOpenExternalBrowser==1) ? "" : __CustomStickers_Web."/ft/Answer?type=invoice&option=qrcode&openExternalBrowser=1";
        $CheckAnswerHide = 1;
        break;
    case 'invoiceCard':
        $_Title = '電子載具資訊';
        $CheckAnswerHide = 1;
        break;
    default :
        if(!empty($UrlMsgType) && !empty($UrlMsgOption)){
            $UrlMsgOption = explode(',', urldecode($UrlMsgOption));
            if($UrlMsgOption){
                $item = array(
                    "nolabel" => "on",
                    "required" => "on",
                    "name" => "answer",
                    "label" => "請作答",
                    "value" => "",
                    "optionVal" => array(),
                );
                foreach ($UrlMsgOption as $key => $value) {
                    $item['options'][$value] = $value;
                }
            }else{
                print_r('連結有誤');
                exit();
            }
        }else{
            print_r('連結有誤');
            exit();
        }
        break;
}

$TPL->assign('liffId', $liffId);
$TPL->assign('_Title', $_Title);
$TPL->assign('openExternalBrowser', $openExternalBrowser);
$TPL->assign('UrlMsgType', $UrlMsgType);
$TPL->assign('UrlMsgOption', $UrlMsgOption);
$TPL->assign('CheckAnswerHide', $CheckAnswerHide);
$TPL->assign('item', $item);

?>