<?php

$SQL_LineMember = new kSQL('LineMember');
$LineMemberData = $SQL_LineMember->SetAction('select')
    ->SetWhere("tablename='member'")
    ->SetWhere("prev='line'")
    ->SetWhere("next='myself'")
    ->BuildQuery();
$_SESSION[__DOMAIN.'LineMemberData'] = $LineMemberData;
$FacebookMemberData = $SQL_LineMember->SetAction('select')
    ->SetWhere("tablename='member'")
    ->SetWhere("prev='facebook'")
    ->SetWhere("next='myself'")
    ->BuildQuery();
$_SESSION[__DOMAIN.'FacebookMemberData'] = $FacebookMemberData;
$FollowStatusList = array(
    "follow" => 0,
    "block" => 0,
    "total" => 0,
);
if(!empty($LineMemberData)){
    foreach ($LineMemberData as $key => $value) {
        $FollowStatusList['total']++;
        if($value['prev1'] === 'follow'){
            $FollowStatusList['follow']++;
        }else{
            $FollowStatusList['block']++;
        }
    }
}
$TPL->assign('FollowStatusList', $FollowStatusList);

$SqlColumnList = array(
    "viewA",
    "viewB",
    "viewC",
    "viewD",
    "viewE",
    "sortA",
    'sortB',
    "sortC",
    "sortD",
    "sortE",
    "propertyA",
    "propertyB",
    "propertyC",
    "propertyD",
    "propertyE",
    "prev1",
    "prev2",
    "prev3",
    "prev4",
    "prev5",
);
$TPL->assign('SqlColumnList', $SqlColumnList);

switch ($_Module) {
    case 'Parameter':
    case 'debug':
    case 'System':
    case 'liff':
        break;
    default:
        $SQL = new kSQL($_Module); //資料庫物件
        break;
}
$ModuleNameList = array(
    "Home" => "首頁",
    "LineMember" => "好友列表",
    "Tag" => "標籤管理",
    "CrontabMsg" => "投稿內容一覽",
    "KeyWordMsg" => "關鍵字回覆",
    //Messenger管理
        //訊息設定(Facebook)
            "FB_Template" => "一般型卡片",
            "FB_ListTemplate" => "清單卡片(已停用)",
            "FB_BtnTemplate" => "按鈕卡片",
            "FB_SocialTemplate" => "社交卡片(已停用)",
            "FB_MediaTemplate" => "媒體卡片",
            "FB_ReceiptTemplate" => "收據卡片",
            "FB_AirlineTemplate" => "航班卡片(暫不開發)",
            "FB_ProductTemplate" => "產品卡片(暫不開發)",
            "FB_QuicklyReply" => "快速回覆",
    //Line@管理
        //訊息設定(Line)
            "ImageMap" => "圖文訊息",
            "LineTemplate" => "卡片式選單",
            "ImageCarousel" => "大圖選單",
            "QuicklyReply" => "快捷語",
            "CustomMessage" => "自訂訊息",
        //機器人
            "QARobot" => "問卷機器人",
            "CardRobot" => "製卡機器人",
            "GroupRobot" => "揪團機器人",
            
        //各情境回應設定
            "SystemMessage" => "各情境回應設定",
        "UrlMsg" => "連結訊息",
        "RichMenu" => "主選單",
        "CustomerService" => "線上客服",
        "liff" => "liff 列表",
    //系統管理
        "Parameter" => "參數管理",
        "Authority" => "權限管理",
        "debug" => "Debug",
);
$TPL->assign('ModuleNameList', $ModuleNameList);

$ActionNameList = array(
    //通用頁
    "add" => "新增頁",
    "edit" => "編輯頁",
    "index" => "列表頁",
    //線上客服頁 CustomerService
    "line" => "Line",
    "facebook" => "Facebook",
    //客製頁 RichMenu
    "ChangeRichMenu" => "更換主選單頁",
    "UserRichMenu" => "查看個好友主選單頁",
    //模組頁 SystemMessage
    "FollowMsg" => "歡迎訊息",
    "AutoMsg" => "自動回覆訊息",
    "StickerMsg" => "貼圖回覆訊息",
    "VideoPlayCompleteMsg" => "影片播放完畢訊息",
    "NotifyMsg" => "Notify連動訊息",
);
$TPL->assign('ActionNameList', $ActionNameList);

?>