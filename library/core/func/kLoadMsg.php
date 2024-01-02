<?php

include_once(__CORE."/func/kEmojiList.php");
include_once(__CORE."/func/kStickerList.php");
$ImageMapType = "flex";//imagemap、flex
if(kCore_CheckAuthority('ImageMap', 'index') && ($ImageMapType=='flex' || !$UrlMsg)){
    $SQL_ImageMap = new kSQL('ImageMap');
    $rows_ImageMap = $SQL_ImageMap->SetAction('select')
        ->SetWhere("tablename='ImageMap'")
        ->SetWhere("next='myself'")
        ->BuildQuery();
    $SQL_ImageMap->Close();
    $TPL->assign('authority_ImageMap', 1);
    $TPL->assign('rows_ImageMap', $rows_ImageMap);
}
if(kCore_CheckAuthority('ImageCarousel', 'index')){
    $SQL_ImageCarousel = new kSQL('ImageCarousel');
    $rows_ImageCarousel = $SQL_ImageCarousel->SetAction('select')
        ->SetWhere("tablename='ImageCarousel'")
        ->SetWhere("next='myself'")
//        ->SetWhere("(subject not like '%". '"action%":"text"' ."%') AND (subject not like '%". '"action%":"postback"' ."%')", $UrlMsg)
        ->BuildQuery();
    $SQL_ImageCarousel->Close();
    $TPL->assign('authority_ImageCarousel', 1);
    $TPL->assign('rows_ImageCarousel', $rows_ImageCarousel);
}
if(kCore_CheckAuthority('LineTemplate', 'index')){
    $SQL_LineTemplate = new kSQL('LineTemplate');
    $rows_LineTemplate = $SQL_LineTemplate->SetAction('select')
        ->SetWhere("tablename='LineTemplate'")
        ->SetWhere("next='myself'")
//        ->SetWhere("(subject not like '%". '"action%":"text"' ."%') AND (subject not like '%". '"action%":"postback"' ."%')", $UrlMsg)
        ->BuildQuery();
    $SQL_LineTemplate->Close();
    $TPL->assign('authority_LineTemplate', 1);
    $TPL->assign('rows_LineTemplate', $rows_LineTemplate);
}
if(kCore_CheckAuthority('CustomMessage', 'index')){
    $SQL_CustomMessage = new kSQL('CustomMessage');
    $rows_CustomMessage = $SQL_CustomMessage->SetAction('select')
        ->SetWhere("tablename='CustomMessage'")
        ->SetWhere("next='myself'")
        ->SetWhere("(subject not like '%". '%"type%":%"sticker%"' ."%') AND (subject not like '%". '%"type%":%"imagemap%"' ."%')"
                . " AND (subject not like '%". '%"actions%":[{%"type%":%"message%"' ."%') AND (subject not like '%". '%"actions%":[{%"type%":%"postback%"' ."%') AND (subject not like '%". '%"actions%":[{%"type%":%"datetimepicker%"' ."%')"
                . " AND (subject not like '%". '%"action%":{%"type%":%"message%"' ."%') AND (subject not like '%". '%"action%":{%"type%":%"postback%"' ."%') AND (subject not like '%". '%"action%":{%"type%":%"datetimepicker%"' ."%')", $UrlMsg)
        ->BuildQuery();
    $SQL_CustomMessage->Close();
    $TPL->assign('authority_CustomMessage', 1);
    $TPL->assign('rows_CustomMessage', $rows_CustomMessage);
}
if(kCore_CheckAuthority('QuicklyReply', 'index') && !$UrlMsg){
    $SQL_QuicklyReply = new kSQL('QuicklyReply');
    $rows_QuicklyReply = $SQL_QuicklyReply->SetAction('select')
        ->SetWhere("tablename='QuicklyReply'")
        ->BuildQuery();
    $SQL_QuicklyReply->Close();
    $TPL->assign('authority_QuicklyReply', 1);
    $TPL->assign('rows_QuicklyReply', $rows_QuicklyReply);
}

if(kCore_CheckAuthority('FB_Template', 'index')){
    $SQL_FB_Template = new kSQL('FB_Template');
    $rows_FB_Template = $SQL_FB_Template->SetAction('select')
        ->SetWhere("tablename='FB_Template'")
        ->SetWhere("next='myself'")
        ->BuildQuery();
    $SQL_FB_Template->Close();
    $TPL->assign('authority_FB_Template', 1);
    $TPL->assign('rows_FB_Template', $rows_FB_Template);
}
//if(kCore_CheckAuthority('FB_ListTemplate', 'index')){
//    $SQL_FB_ListTemplate = new kSQL('FB_ListTemplate');
//    $rows_FB_ListTemplate = $SQL_FB_ListTemplate->SetAction('select')
//        ->SetWhere("tablename='FB_ListTemplate'")
//        ->SetWhere("next='myself'")
//        ->BuildQuery();
//    $SQL_FB_ListTemplate->Close();
//    $TPL->assign('authority_FB_ListTemplate', 1);
//    $TPL->assign('rows_FB_ListTemplate', $rows_FB_ListTemplate);
//}
if(kCore_CheckAuthority('FB_BtnTemplate', 'index')){
    $SQL_FB_BtnTemplate = new kSQL('FB_BtnTemplate');
    $rows_FB_BtnTemplate = $SQL_FB_BtnTemplate->SetAction('select')
        ->SetWhere("tablename='FB_BtnTemplate'")
        ->SetWhere("next='myself'")
        ->BuildQuery();
    $SQL_FB_BtnTemplate->Close();
    $TPL->assign('authority_FB_BtnTemplate', 1);
    $TPL->assign('rows_FB_BtnTemplate', $rows_FB_BtnTemplate);
}
if(kCore_CheckAuthority('FB_MediaTemplate', 'index')){
    $SQL_FB_MediaTemplate = new kSQL('FB_MediaTemplate');
    $rows_FB_MediaTemplate = $SQL_FB_MediaTemplate->SetAction('select')
        ->SetWhere("tablename='FB_MediaTemplate'")
        ->SetWhere("next='myself'")
        ->BuildQuery();
    $SQL_FB_MediaTemplate->Close();
    $TPL->assign('authority_FB_MediaTemplate', 1);
    $TPL->assign('rows_FB_MediaTemplate', $rows_FB_MediaTemplate);
}
if(kCore_CheckAuthority('FB_ReceiptTemplate', 'index')){
    $SQL_FB_ReceiptTemplate = new kSQL('FB_ReceiptTemplate');
    $rows_FB_ReceiptTemplate = $SQL_FB_ReceiptTemplate->SetAction('select')
        ->SetWhere("tablename='FB_ReceiptTemplate'")
        ->SetWhere("next='myself'")
        ->BuildQuery();
    $SQL_FB_ReceiptTemplate->Close();
    $TPL->assign('authority_FB_ReceiptTemplate', 1);
    $TPL->assign('rows_FB_ReceiptTemplate', $rows_FB_ReceiptTemplate);
}

?>