<?php

include_once __LineMessageApi . '/emList.php';

$TPL->assign('EmojiList', $EmojiList);
$TPL->assign('emoticonList', $emoticonList);
$TPL->assign('EmojiLink_Path', 'https://stickershop.line-scdn.net/sticonshop/v1/sticon/');
//$packageId, 605837f98fe60a5dd8d545c2
$EmojiLink_OS = '/iPhone/';
//$emojiId, 001
$EmojiLink_Extension = '.png';
$TPL->assign('EmojiLink_OS', $EmojiLink_OS);
$TPL->assign('EmojiLink_Extension', $EmojiLink_Extension);


$TPL->assign('EmojiPageLink_Path', 'https://stickershop.line-scdn.net/sticonshop/v1/product/');
//$packageId, 605837f98fe60a5dd8d545c2
$TPL->assign('EmojiPageLink_OS', '/iPhone');
$TPL->assign('EmojiTabOn', 'tab_on');$TPL->assign('EmojiTabOff', 'tab_off');
$TPL->assign('EmojiPageLink_FileName', '/main');
$TPL->assign('EmojiPageLink_Extension', '.png');