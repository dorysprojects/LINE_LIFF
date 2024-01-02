<?php

if(kCore_CheckAuthority('Home', 'index')){
    header("Location:" . __CustomStickers_Web . '/be/Home');
}

//加入xajax
include_once 'xajax.php';
$TPL->assign('xajax_js', $xajax->getJavascript());

?>