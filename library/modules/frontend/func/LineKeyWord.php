<?php

include_once __LineMessageApi . '/class/kBOTClass.php';

$line = new kLineMessaging();
if (!empty($Webhooks_decode) && $Webhooks_decode != '') {
    foreach ($Webhooks_decode->events as $key => $event) {
        $line->init($event);
        switch ($line->events['source']['type']) {
            case 'user':
                switch ($line->events['type']) {
                    case 'message':
                        switch ($line->events['message']['type']) {
                            case 'text':
                            case 'sticker':
                            case 'image':
                            case 'location':
                                include_once __LineMessageApi .'/controller/'. $line->events['message']['type'] . 'Controller.php';
                                break;
                            case 'video':
                            case 'audio':
                            case 'file':
                                break;  
                            default:
                                $line->text($line->events['message']['type'] . '訊息')->reply();
                                break;
                        }
                        break;
                    case 'postback':
                    case 'beacon':
                    case 'videoPlayComplete':
                    case 'accountLink':
                        include_once __LineMessageApi .'/controller/'. $line->events['type'] . 'Controller.php';
                        break;
                    case 'follow':
                    case 'unfollow':
                        include_once __LineMessageApi .'/controller/followController.php';
                        break;
                    case'join':
                    case'leave':
                        include_once __LineMessageApi .'/controller/joinController.php';
                        break;
                    default :
                        $line->text($line->events['type'] . '事件')->reply();
                        break;
                }
                if (!empty($line->LineMessageData_Member[0]['content']['BOT_Type'])) {
                    $kBOTClass = new kBOTClass($line);
                }
                break;
        }
    }
}

?>