<?php

switch($line->events['message']['contentProvider']['type']){
    case 'line':
        break;
    case 'external': //liff
        $originalContentUrl = $line->events['message']['contentProvider']['originalContentUrl'];
        $previewImageUrl = $line->events['message']['contentProvider']['previewImageUrl'];
        $PostBackImgUrl = __RES_Web.'/images/postback.png?';
        if(strpos($originalContentUrl, $PostBackImgUrl) !== false){
            $PostbackData = array();
            $PostbackDataTmp = explode('?', $originalContentUrl);
            if($PostbackDataTmp[1]){
                $PostbackDataTmp2 = explode('&', $PostbackDataTmp[1]);
                if($PostbackDataTmp2){
                    foreach ($PostbackDataTmp2 as $key => $value) {
                        $PostbackDataTmp3 = explode('=', str_replace('+', '＋', $value));
                        $PostbackData[$PostbackDataTmp3[0]] = str_replace('＋', '+', urldecode($PostbackDataTmp3[1]));
                    }
                }
            }
        }
        if(!empty($PostbackData['data'])){
            $line->events['type'] = 'postback';
            $line->events['postback']['data'] = $PostbackData['data'];
            include_once __LineMessageApi .'/controller/postbackController.php';
        }
        break;
}

?>