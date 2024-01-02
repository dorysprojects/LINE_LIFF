<?php

$StickerAnimationList = array(
    "6362",
    "6632",
    "8525",
    "11537",
    "11538",
    "11539",
);

$StickerList = array(
    "1" => array(
        array(
            'start' => "1",
            'end' => "17",
        ),
        array(
            'start' => "21",
            'end' => "21",
        ),
        array(
            'start' => "100",
            'end' => "139",
        ),
        array(
            'start' => "401",
            'end' => "430",
        ),
    ),
    "2" => array(
        array(
            'start' => "18",
            'end' => "20",
        ),
        array(
            'start' => "22",
            'end' => "47",
        ),
        array(
            'start' => "140",
            'end' => "179",
        ),
        array(
            'start' => "501",
            'end' => "527",
        ),
    ),
    "3" => array(
        array(
            'start' => "180",
            'end' => "259",
        ),
    ),
    "4" => array(
        array(
            'start' => "260",
            'end' => "307",
        ),
        array(
            'start' => "601",
            'end' => "632",
        ),
    ),
    "446" => array(
        array(
            'start' => "1988",
            'end' => "2027",
        ),
    ),
    "789" => array(
        array(
            'start' => "10855",
            'end' => "10894",
        ),
    ),
    /*"1070" => array(
        array(
            'start' => "17839",
            'end' => "17878",
        ),
    ),
    "6136" => array(
        array(
            'start' => "10551376",
            'end' => "10551399",
        ),
    ),
    "6325" => array(
        array(
            'start' => "10979904",
            'end' => "10979927",
        ),
    ),
    "6359" => array(
        array(
            'start' => "11069848",
            'end' => "11069871",
        ),
    ),*/
    "6362" => array(
        array(
            'start' => "11087920",
            'end' => "11087943",
        ),
    ),
    /*"6370" => array(
        array(
            'start' => "11088016",
            'end' => "11088039",
        ),
    ),*/
    "6632" => array(
        array(
            'start' => "11825374",
            'end' => "11825397",
        ),
    ),
    /*"8515" => array(
        array(
            'start' => "16581242",
            'end' => "16581265",
        ),
    ),
    "8522" => array(
        array(
            'start' => "16581266",
            'end' => "16581289",
        ),
    ),*/
    "8525" => array(
        array(
            'start' => "16581290",
            'end' => "16581313",
        ),
    ),
    "11537" => array(
        array(
            'start' => "52002734",
            'end' => "52002773",
        ),
    ),
    "11538" => array(
        array(
            'start' => "51626494",
            'end' => "51626533",
        ),
    ),
    "11539" => array(
        array(
            'start' => "52114110",
            'end' => "52114149",
        ),
    ),
);

$TPL->assign('StickerAnimationList', $StickerAnimationList);
$TPL->assign('StickerList', $StickerList);
$TPL->assign('StickerLink_Path', 'https://stickershop.line-scdn.net/stickershop/v1/sticker/');
//$stickerId, 1
$StickerLink_OS = '/ANDROID/';
$StickerLink_FileName = 'sticker';
$StickerLink_Extension = '.png';
$TPL->assign('StickerLink_OS', $StickerLink_OS);
$TPL->assign('StickerLink_File', $StickerLink_OS . $StickerLink_FileName . $StickerLink_Extension);
$TPL->assign('StickerPageLink_Path', 'https://stickershop.line-scdn.net/stickershop/v1/product/');
//$packageId, 1
$TPL->assign('StickerPageLink_OS', '/ANDROID');
$TPL->assign('StickerTabOn', 'tab_on');$TPL->assign('StickerTabOff', 'tab_off');
$TPL->assign('StickerPageLink_Extension', '.png');