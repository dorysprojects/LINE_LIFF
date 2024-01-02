<?php

//ShowMsg
$ErrorText = kCore_get('text');
switch(kCore_get('type')){
    case 'success':
        $ErrorColor = '#5fce61';
        $ErrorIcon = 'check';
        break;
    case 'info':
        $ErrorColor = '#7f9ba5';
        $ErrorIcon = 'info';
        break;
    case 'warning':
        $ErrorColor = '#f7a86a';
        $ErrorIcon = 'warning';
        break;
    case 'qusetion':
        $ErrorColor = '#82c1b4';
        $ErrorIcon = 'question';
        break;
    case 'error':
        $ErrorColor = '#d9534f';
        $ErrorIcon = 'times';
        break;
    default:
        $ErrorColor = '#d9534f';
        $ErrorIcon = kCore_get('type');
        break;
}
$ErrorColor = !empty(kCore_get('color')) ? '#'.kCore_get('color') : $ErrorColor;

$TPL->assign('ErrorText', $ErrorText);
$TPL->assign('ErrorColor', $ErrorColor);
$TPL->assign('ErrorIcon', $ErrorIcon);

?>