<?php

$_From = kCore_get('FrontEndAndBackEnd', $_SERVER['PATH_TRANSLATED']);
$_Module = !empty($_From) ? kCore_get($_From, $_SERVER['PATH_TRANSLATED']) : '';
$_Action = ($_From=='backend') ? kCore_get($_Module) : '';
$VideoFile = kCore_get($_Module);
if(!$VideoFile){
    die('error');
}
$TPL->assign('VideoFile', $VideoFile);

?>