<?php

switch ($_Module) {
    case 'UrlMsg':
    case 'sharenote':
        $IncludeXajaxFlag = true;
        break;
    case 'sticker':
    case 'note':
    case 'message':
    case 'place':
        if(!empty($_SESSION[__DOMAIN.'_LineLiffProfile'])){
            $userId = $_SESSION[__DOMAIN.'_LineLiffProfile']->userId;
            $displayName = $_SESSION[__DOMAIN.'_LineLiffProfile']->displayName;
            $pictureUrl = $_SESSION[__DOMAIN.'_LineLiffProfile']->pictureUrl;
            $statusMessage = $_SESSION[__DOMAIN.'_LineLiffProfile']->statusMessage;
        }
        $TPL->assign('liffId', __LIFF_STICKER__ID);//LineLogin Liff
        $TPL->assign('ProjectName', (!empty($_GET['project'])) ? $_GET['project'] : '手畫貼圖');
        $TPL->assign('userId', $userId);
        $TPL->assign('displayName', $displayName);
        $TPL->assign('pictureUrl', $pictureUrl);
        $TPL->assign('statusMessage', $statusMessage);
        $TPL->assign('pic_url', $_GET['pic_url']);
        $TPL->assign('imgur_result', $_GET['imgur_result']);
        $TPL->assign('Html_nail', $kHTML->get('nail'));
        $TPL->assign('Html_arrow', $kHTML->get('arrow'));
        $TPL->assign('Html_close', $kHTML->get('close'));
        if($_Module == 'sticker'){
            $tips = array(
                "長按清單中的圖片有其他功能",
                "上傳檔案格式目前僅支援 [ .png、.jpg、.jpeg、.gif ]",
                "清單 -> 雙擊兩下圖片即可( 加入/移除 )我的最愛",
            );
        }
        $TPL->assign('tips', $tips);
        $IncludeXajaxFlag = true;
        break;
}