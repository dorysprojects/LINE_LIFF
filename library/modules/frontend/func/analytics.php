<?php

$type = kCore_get('type');
$TPL->assign('type', ($type)?$type:'index');
////加入xajax
//include_once $_FromFuncPath.'xajax.php';
//if($xajax){
//    $TPL->assign('xajax_js', $xajax->getJavascript());
//}
?>