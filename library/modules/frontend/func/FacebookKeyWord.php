<?php

if($Webhooks_decode['object']=='page' && $Webhooks_decode['entry'][0]['messaging']){
    foreach ($Webhooks_decode['entry'][0]['messaging'] as $key => $message) {
        $facebook->init($message);
        if($message['message']['text']){
            include_once __FacebookMessageApi .'/controller/textController.php';
        }else{
            switch ($message['message']['attachments'][0]['type']) {
                case 'location':
                    include_once __FacebookMessageApi .'/controller/'. $message['message']['attachments'][0]['type'] . 'Controller.php';
                    break;
                case 'image':
                case 'video':
                case 'audio':
                case 'file':
                case 'template':
                case 'fallback':
                    break;
                default:
                    $facebook->text($message['message']['attachments'][0]['type'])->reply();
                    break;
            }
        }
    }
}else{
    $SQL_WebhookLog = new kSQL('WebhookLog');
    $SQL_WebhookLog->SetAction('insert')
            ->SetValue('tablename', 'facebook')
            ->SetValue('subject', json_encode($Webhooks_decode))
            ->SetValue('update_at', $SQL_WebhookLog->getNowTime())
            ->SetValue('create_at', $SQL_WebhookLog->getNowTime())
            ->SetValue('prev', 'root')
            ->SetValue('next', 'webhook')
            ->SetValue('propertyA', '')
            ->SetValue('propertyE', '')
            ->SetValue("content", '')
            ->BuildQuery();
    
//    http_response_code(400);
//    header("HTTP/1.1 404 Not Found");
//    header("Connection: Close");
//    exit();
}

?>