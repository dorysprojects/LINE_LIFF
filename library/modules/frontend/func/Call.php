<?php

$ShareLink = 'https://liff.line.me/'.__LIFF_URLMSG__ID.'?id=Call&userId=';
$TPL->assign('ShareLink', $ShareLink);

//加入xajax
include_once $_FromFuncPath.'xajax.php';
if($xajax){
    $TPL->assign('xajax_js', $xajax->getJavascript());
}

?>