<?php

$LineMessageText = $line->events['message']['text'];
$SQL_CardRobot = new kSQL('CardRobot');
$SQL_QARobot = new kSQL('QARobot');
$SQL_GroupRobot = new kSQL('GroupRobot');
$SQL_PlayGame = new kSQL('PlayGame');
switch ($LineMessageText) {
    case $SQL_PlayGame->SystemRow[0]['propertyC']:
        $carousel_actions[] = $line->messageObject('postback', '1A2B', 'BOT(_)PlayGame(_)1A2B');
        $carousel_actions[] = $line->messageObject('postback', 'BINGO', 'BOT(_)PlayGame(_)BINGO(_)SelfChallenge');
        if($line->LineMessageData_Member[0]['propertyA'] == 'U43f8bef06efa4aac5484884c2befe1a8'){
            $carousel_actions[] = $line->messageObject('postback', '撲克牌(撿紅點)', 'BOT(_)PlayGame(_)POKER_PickRedDots(_)SelfChallenge');
        }
        $carousel_columns[] = $line->columns_v2(NULL, '請選擇遊戲', NULL, $carousel_actions);
        $line->carousel('請選擇遊戲', $carousel_columns);
        $line->reply();
        break;
    case '/綁定Facebook':
        $buttons_actions = array();
        if(0){
            $linkToken = $line->AccountLink();
            if($linkToken){
                $buttons_actions[] = $line->uri('登入', __CustomStickers_Web . '/ft/FB_Account_Link?linkToken=' . $linkToken);
                $line->buttons(__RES_Web . '/images/lineXfb.png', '帳號連結', '帳號連結', '請點擊登入按鈕，點擊後我們將會整合您的LINE帳號與Facebook Messenger', $buttons_actions);
            }
        }else{
            $buttons_actions[] = $line->uri('接續綁定流程', 'https://m.me/' . __FB_Page_ID);//__FB_Page_Picture
            $line->buttons(__RES_Web . '/images/lineXfb.png', '帳號連結', '帳號連結', '請點擊下方按鈕，點擊後將會前往【'. __FB_Page_Name .'】，請在粉絲團對話中輸入「/綁定Line」接續綁定流程', $buttons_actions);
        }
        $line->reply();
        break;
    case '/連動Notify':
        if ($line->LineMessageData_Member[0]['propertyC']) { //已綁定notify
            $actionA = $line->messageObject('postback', '確定', 'BOT(_)CancelNotify');
            $actionB = $line->messageObject('postback', '取消', 'NULL');
            $line->confirm($altText = '解除Notify連動嗎?', $text = '解除Notify連動嗎?', $actionA, $actionB)
                 ->reply();
        } else {
            $actions[] = $line->messageObject('uri', '前往綁定', __CustomStickers_Web . '/ft/line_notify_check');
            $line->buttons($thumbnailImageUrl = NULL, $altText = '前往綁定', $title = '您尚未綁定notify', $text = NULL, $actions)
                 ->reply();
        }
        break;
    case $SQL_CardRobot->SystemRow[0]['propertyC']:
        $CardList = $SQL_CardRobot->SetAction('select')
                                    ->SetWhere("tablename='CardRobot'")
                                    ->SetWhere("next='myself'")
                                    ->SetWhere("viewA='on'")
                                    ->BuildQuery();
        if($CardList){
            $carousel_columns = array();
            foreach ($CardList as $key => $card) {
                $carousel_actions = array();
                $path = (file_exists(__ROOT_UPLOAD.'/card/' . $card['subject']['img0'])) ? 'card' : 'image';
                $prevBtn = $card['subject']['prevBtn'] ? $card['subject']['prevBtn'] : '預覽';
                $startBtn = $card['subject']['startBtn'] ? $card['subject']['startBtn'] : '開始製作';
                $carousel_actions[] = $line->messageObject('uri', $prevBtn, __WEB_UPLOAD.'/'. $path .'/'.$card['subject']['img0']);
                $carousel_actions[] = $line->messageObject('postback', $startBtn, 'BOT(_)CreateCard(_)Start(_)' . $card['id']);
                $carousel_columns[] = $line->columns_v2(__WEB_UPLOAD.'/'. $path .'/'.$card['subject']['img0'], $card['subject']['subject'], $card['subject']['subcontent'], $carousel_actions);
            }
            $line->carousel('請選擇你要製作的版型', $carousel_columns);
            $line->reply();
        }
        break;
    case $SQL_QARobot->SystemRow[0]['propertyC']:
        $QAList = $SQL_QARobot->SetAction('select')
                                ->SetWhere("tablename='QARobot'")
                                ->SetWhere("next='myself'")
                                ->SetWhere("viewA='on'")
                                ->BuildQuery();
        if($QAList){
            $carousel_columns = array();
            foreach ($QAList as $key => $qa) {
                $carousel_actions = array();
                $path = (file_exists(__ROOT_UPLOAD.'/card/' . $qa['subject']['img0'])) ? 'card' : 'image';
                $btn0 = $qa['subject']['btn0'] ? $qa['subject']['btn0'] : '開始作答';
                $carousel_actions[] = $line->messageObject('postback', $btn0, 'BOT(_)FillForm(_)Start(_)' . $qa['id']);
                $carousel_columns[] = $line->columns_v2(__WEB_UPLOAD.'/'. $path .'/'.$qa['subject']['img0'], $qa['subject']['subject'], $qa['subject']['subcontent'], $carousel_actions);
            }
            $line->carousel('請選擇你要填寫的問卷', $carousel_columns);
            $line->reply();
        }
        break;
    case $SQL_GroupRobot->SystemRow[0]['propertyC']:
        $GroupList = $SQL_GroupRobot->SetAction('select')
                                    ->SetWhere("tablename='GroupRobot'")
                                    ->SetWhere("next='myself'")
                                    ->SetWhere("viewA='on'")
                                    ->SetWhere("propertyD <= '". date('Y-m-d') ."'")
                                    ->SetWhere("propertyE >= '". date('Y-m-d') ."'")
                                    ->SetOrder("id DESC")
                                    ->SetLimit(1)
                                    ->BuildQuery();
        $GroupList = $GroupList[0];
        if($GroupList){
            $buttons_actions = array();
            $btn0 = !empty($GroupList['subject']['btn0']) ? $GroupList['subject']['btn0'] : '邀請好友';
            $btn1 = !empty($GroupList['subject']['btn1']) ? $GroupList['subject']['btn1'] : '查詢票數';
            $buttons_actions[] = $line->uri($btn0, 'https://liff.line.me/'.__LIFF_URLMSG__ID.'?id=Group');
            $buttons_actions[] = $line->postback($btn1, 'BOT(_)Group(_)Select(_)'.$GroupList['id']);
            $line->buttons(__WEB_UPLOAD . '/image/'.$GroupList['subject']['img0'], $GroupList['subject']['subject'], $GroupList['subject']['subject'], $GroupList['subject']['subcontent'], $buttons_actions);
        }else{
            $FELX = new FELX();
            $title = '目前無活動';
            $Val = array(
                "type" => "warning",
                "title" => '目前無活動',
            );
            $line->SetMessageObject($FELX->FLEX_SendMessage($title, $FELX->FLEX_Alert($Val)));
        }
        $line->reply();
        break;
    default:
        $SQL_KeyWordMsg = new kSQL('KeyWordMsg');
        $KeyWordMsg = $SQL_KeyWordMsg->SetAction('select')
                    ->SetWhere("tablename='KeyWordMsg'")
                    ->SetWhere("next='myself'")
                    ->SetWhere("viewA='on'")
                    ->SetWhere("propertyA='". $LineMessageText ."'")
                    ->SetWhere("propertyB like 'line'")
                    ->BuildQuery();
        $SQL_UrlMsg = new kSQL('UrlMsg');
        $UrlMsg = $SQL_UrlMsg->SetAction('select')
                    ->SetWhere("tablename='UrlMsg'")
                    ->SetWhere("next='myself'")
                    ->SetWhere("viewA='on'")
                    ->SetWhere("propertyA='". $LineMessageText ."'")
                    ->BuildQuery();
        if($UrlMsg){
            $KeyWordMsg = ($KeyWordMsg) ? array_merge($KeyWordMsg, $UrlMsg) : $UrlMsg;
        }
        if($KeyWordMsg){
            foreach ($KeyWordMsg as $key => $item) {
                if (count($line->action['data']) >= 5) {//如果超過5則訊息，則Break
                    break;
                }
                $MsgItem['subject'] = array(
                    'type_0' => $item['tablename'],
                    'value_0' => $item['id'],
                );
                $line->SetMessages($MsgItem);
                $line->reply();
            }
            //貼標
            if(!empty($item['sortB'])){
                kCore_Tag('SelectAndUpdate', array(
                    "id" => $item['sortB'],
                    "userId" => $line->events['source']['userId'],
                ));
            }
        }else{
            $SQL_SystemMessage = new kSQL('SystemMessage');
            $AutoMsg = $SQL_SystemMessage->SetAction('select')
                        ->SetWhere("tablename='SystemMessage'")
                        ->SetWhere("next='AutoMsg'")
                        ->SetWhere("viewA='on'")
                        ->BuildQuery();
            if($AutoMsg[0]){
                $line->SetMessages($AutoMsg[0]);
                $line->reply();
            }

            if(0){
                //確認卡片
                $confirm_action1 = $line->messageObject('message', 'Yes', 'yes');
                $confirm_action2 = $line->messageObject('message', 'No', 'no');
                $line->confirm('this is a confirm template', 'Are you sure?', $confirm_action1, $confirm_action2);
                //按鈕卡片
                $buttons_actions = array();
                $buttons_actions[] = $line->postback('Buy', 'action=buy&itemid=123');
                $buttons_actions[] = $line->postback('Add to cart', 'action=add&itemid=123');
                $buttons_actions[] = $line->uri('View detail', 'https://example.com/page/123');
                $line->buttons('https://example.com/bot/images/image.jpg', 'This is a buttons template', 'Menu', 'Please select', $buttons_actions);
                //卡片式選單
                $carousel_columns = array();
                $carousel_actions1 = array();
                $carousel_actions1[] = $line->messageObject('postback', 'Buy', 'action=buy&itemid=111');
                $carousel_actions1[] = $line->messageObject('postback', 'Add to cart', 'action=add&itemid=111');
                $carousel_actions1[] = $line->messageObject('uri', 'View detail', 'https://example.com/page/111');
                $carousel_columns[] = $line->columns_v2('https://example.com/bot/images/item1.jpg', 'this is menu', 'description', $carousel_actions1);
                $carousel_actions2 = array();
                $carousel_actions2[] = $line->messageObject('postback', 'Buy', 'action=buy&itemid=222');
                $carousel_actions2[] = $line->messageObject('postback', 'Add to cart', 'action=add&itemid=222');
                $carousel_actions2[] = $line->messageObject('uri', 'View detail', 'https://example.com/page/222');
                $carousel_columns[] = $line->columns_v2('https://example.com/bot/images/item2.jpg', 'this is menu', 'description', $carousel_actions2);
                $line->carousel('this is a carousel template', $carousel_columns);
                //大圖選單
                $image_carousel_columns = array();
                $image_carousel_action1 = $line->messageObject('postback', 'Buy', 'action=buy&itemid=111');
                $image_carousel_columns[] = $line->image_columns('https://example.com/bot/images/item1.jpg', $image_carousel_action1);
                $image_carousel_action2 = $line->messageObject('message', 'Yes', 'yes');
                $image_carousel_columns[] = $line->image_columns('https://example.com/bot/images/item2.jpg', $image_carousel_action2);
                $image_carousel_action3 = $line->messageObject('uri', 'View detail', 'https://example.com/page/222');
                $image_carousel_columns[] = $line->image_columns('https://example.com/bot/images/item3.jpg', $image_carousel_action3);
                $line->image_carousel('this is a image carousel template', $image_carousel_columns);
                //Reply
                $line->reply();
            }
        }

        if(substr($LineMessageText, 0, 6) === '/FLEX-'){ //文字訊息「/FLEX-」開頭
            $RootMedia = __ROOT_UPLOAD . "/contentId/";
            $FileName = substr($LineMessageText, 6);///檔名
            if(!empty($FileName)){
                $FilePath = $RootMedia . 'FLEX-' .$FileName; //檔案路徑
                if (file_exists($FilePath)) {//如果檔案存在，則刪除檔案
                    $FlexJson = file_get_contents($FilePath, $FlexJson);
                    if(!empty($FlexJson)){
                        $FELX = new FELX();
                        $title = '[FLEX測試]';
                        $line->SetMessageObject($FELX->FLEX_SendMessage($title, json_decode($FlexJson, true)));
                        $line->reply();
                    }
                    unlink($FilePath);
                }
            }
        }
        break;
}

?>