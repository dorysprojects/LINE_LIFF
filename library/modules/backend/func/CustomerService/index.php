<?php

if(kCore_CheckAuthority('CustomerService', 'line')){
    $LineChat = 1;
}
if(kCore_CheckAuthority('CustomerService', 'facebook')){
    $FacebookChat = 1;
}
if(kCore_CheckAuthority('Tag', 'index')){
    $TPL->assign('TagsOptions', kCore_Tag('SelectOptions'));
}
$TPL->assign('ChatRoom', kCore_get('ChatRoom'));
$TPL->assign('LineChat', $LineChat);
$TPL->assign('FacebookChat', $FacebookChat);

if(($LineChat+$FacebookChat) > 0){
    $TPL->assign('MsgJs', $kHTML->getJsFile($_FromResPath.'/MsgJs.php'));
    include_once(__CORE."/func/kLoadMsg.php");
}