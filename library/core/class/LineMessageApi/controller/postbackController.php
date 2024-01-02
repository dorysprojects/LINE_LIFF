<?php

$postback_query = explode('(_)', $line->events['postback']['data']);
$postback_bot = $postback_query[0];
$postback_func = $postback_query[1];
$postback_action = $postback_query[2];
$postback_data = $postback_query[3];
$postback_data2 = $postback_query[4];

switch ($postback_bot) {
    case 'BOT':
        switch ($postback_func) {
            case 'PlayGame':
                include_once dirname(dirname(__FILE__)).'/class/PlayGameClass.php';
                $PlayGameClass = new PlayGameClass();
                $SQL_PlayGame = new kSQL('PlayGame');
                switch ($postback_action) {
                    case 'POKER_PickRedDots':
                        switch ($postback_data) {
                            case 'SelfChallenge':
                                $line->Clear_BOTFlash();
                                $PlayersCard = $PlayGameClass->DealPokerCard('PickRedDots', 2);
                                $Answer = array(
                                    "player" => "player1",
                                    "player1" => $PlayersCard['players'][0],
                                    "player2" => $PlayersCard['players'][1],
                                    "side" => $PlayersCard['side'],
                                    "middle" => $PlayersCard['middle'],
                                );
                                $content = array(
                                    "BOT_Type" => $postback_func,
                                    "BOT_Model" => $Answer,
                                    "BOT_Action" => $postback_action,
                                    "BOT_Data" => $postback_data,
                                    "BOT_Box" => array(
                                        "player1" => array(),
                                        "player2" => array(),
                                    ),
                                    "BOT_Mode" => '',
                                    "BOT_Date" => $line->LineMessageDB_Membe->getNowTime(),
                                    "BOT_ID" => '',
                                );
                                $line->LineMessageDB_Membe
                                    ->SetAction('update')
                                    ->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                                    ->SetValue('content', json_encode($content))
                                    ->BuildQuery();
                                if (!empty($PlayersCard['players'][0])) {
                                    $PlayersCard['players'][0] = $PlayGameClass->SuitNumSort($PlayersCard['players'][0]);
                                    $CarouselContents = array();
                                    foreach ($PlayersCard['players'][0] as $ckey => $card) {
                                        if (count($CarouselContents) < 12) {
                                            $_Bubble = $PlayGameClass->MakePokerCard($card)['flex'];
                                            $_Bubble['action'] = array(
                                                'type' => 'postback',
                                                'data' => "BOT(_)".$postback_action."(_)PickCard(_)".$card['suit']."(_)".$card['num'],
                                            );
                                            $CarouselContents[] = $_Bubble;
                                        }
                                    }
                                    $Flex = array(
                                        'type' => 'carousel',
                                        'contents' => $CarouselContents,
                                    );
                                    $line->SetMessageObject($line->FLEX_Message($postback_action, $PlayGameClass->GetSideCard($PlayersCard['side'])));
                                    $line->SetMessageObject($line->FLEX_Message($postback_action, $Flex));
                                }
                                break;
                        }
                        if (count($line->action['data']) > 0) {
                            $line->reply();
                        }
                        break;
                    case 'BINGO':
                        switch ($postback_data) {
                            case 'SelfChallenge':
                                switch ($postback_data2) {
                                    case 'easy':
                                    case 'normal':
                                    case 'hard':
                                        $line->Clear_BOTFlash();
                                        $SelfAnswer = range(1, 25);
                                        shuffle($SelfAnswer);
                                        $SystemAnswer = range(1, 25);
                                        shuffle($SystemAnswer);
                                        $Answer = array(
                                            "self" => $SelfAnswer,
                                            "system" => $SystemAnswer,
                                        );
                                        $content = array(
                                            "BOT_Type" => $postback_func,
                                            "BOT_Model" => $Answer,
                                            "BOT_Action" => $postback_action,
                                            "BOT_Data" => $postback_data . '(_)' . $postback_data2,
                                            "BOT_Box" => '',
                                            "BOT_Mode" => '',
                                            "BOT_Date" => $line->LineMessageDB_Membe->getNowTime(),
                                            "BOT_ID" => '',
                                        );
                                        $line->LineMessageDB_Membe
                                            ->SetAction('update')
                                            ->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                                            ->SetValue('content', json_encode($content))
                                            ->BuildQuery();
                                        $Flex = array(
                                            'type' => 'bubble',
                                            'body' => array(
                                                'type' => 'box',
                                                'layout' => 'vertical',
                                                'justifyContent' => 'space-between',
                                                'contents' => array(
                                                    array(
                                                        'type' => 'text',
                                                        'weight' => 'bold',
                                                        'size' => '4xl',
                                                        'align' => 'center',
                                                        'text' => '遊戲開始',
                                                        'color' => '#6aaa64',
                                                    ),
                                                    array(
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'contents' => array(
                                                            array(
                                                                'type' => 'text',
                                                                'weight' => 'bold',
                                                                'align' => 'center',
                                                                'text' => '遊戲說明',
                                                                'color' => '#b74198',
                                                                'margin' => 'md',
                                                            ),
                                                            array(
                                                                'type' => 'separator',
                                                                'color' => '#787c7e',
                                                            ),
                                                            array(
                                                                'type' => 'text',
                                                                'text' => "每次遊戲開始時，會隨機產生多組1~25不重複的數字，當作各玩家的答案卡，玩家輪流指定數字。\n\n並將自己或其他玩家指定到的數字標示在所有玩家的答案卡上，若在「同一直列」、「同一橫行」或「對角線」上有五個標示的數字，即為集滿一條線;\n\n先集滿五條線(BINGO)的人獲勝。",
                                                                'wrap' => true,
                                                                'size' => 'xs',
                                                                'margin' => 'md',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        );
                                        $line->SetMessageObject($line->FLEX_Message('[' . $postback_action . '] 遊戲開始', $Flex));
                                        $NumContents = array();
                                        if (!empty($Answer['self'])) {
                                            foreach (array_chunk($Answer['self'], 5) as $key => $value) {
                                                if ($value) {
                                                    $NumContentsChild = array();
                                                    foreach ($value as $key2 => $value2) {
                                                        $backgroundColor = '#787c7e'; //#787c7e(灰)、#6aaa64(綠)、#c9b458(黃)
                                                        $textColor = '#ffffff';
                                                        $NumContentsChild[] = array(
                                                            'type' => 'box',
                                                            'layout' => 'vertical',
                                                            'backgroundColor' => $backgroundColor,
                                                            'contents' => array(
                                                                array(
                                                                    'type' => 'text',
                                                                    'weight' => 'bold',
                                                                    'size' => '3xl',
                                                                    'align' => 'center',
                                                                    'text' => strval($value2),
                                                                    'color' => $textColor,
                                                                ),
                                                            ),
                                                        );
                                                    }
                                                    $NumContents[] = array(
                                                        'type' => 'box',
                                                        'layout' => 'horizontal',
                                                        'spacing' => 'sm',
                                                        'margin' => 'md',
                                                        'contents' => $NumContentsChild,
                                                    );
                                                }
                                            }
                                        }
                                        $Flex = array(
                                            'type' => 'bubble',
                                            'body' => array(
                                                'type' => 'box',
                                                'layout' => 'vertical',
                                                'justifyContent' => 'space-between',
                                                'contents' => array_values(array_filter(array(
                                                    array(
                                                        'type' => 'box',
                                                        'layout' => 'horizontal',
                                                        'contents' => array(
                                                            array(
                                                                'type' => 'text',
                                                                'weight' => 'bold',
                                                                'size' => '5xl',
                                                                'align' => 'center',
                                                                'text' => 'BINGO',
                                                                'color' => '#787c7e',
                                                            ),
                                                        ),
                                                    ),
                                                    array(
                                                        'type' => 'separator',
                                                        'color' => '#787c7e',
                                                    ),
                                                    array(
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'contents' => $NumContents,
                                                    ),
                                                ))),
                                            ),
                                        );
                                        $line->SetMessageObject($line->FLEX_Message($postback_action, $Flex));
                                        break;
                                    default:
                                        $carousel_actions[] = $line->messageObject('postback', '簡單', 'BOT(_)PlayGame(_)BINGO(_)SelfChallenge(_)easy');
                                        $carousel_actions[] = $line->messageObject('postback', '一般', 'BOT(_)PlayGame(_)BINGO(_)SelfChallenge(_)normal');
                                        $carousel_actions[] = $line->messageObject('postback', '困難', 'BOT(_)PlayGame(_)BINGO(_)SelfChallenge(_)hard');
                                        $carousel_columns[] = $line->columns_v2(NULL, '請選擇難易度', NULL, $carousel_actions);
                                        $line->carousel('請選擇難易度', $carousel_columns);
                                        break;
                                }
                                if (count($line->action['data']) > 0) {
                                    $line->reply();
                                }
                                break;
                        }
                        break;
                    case '1A2B':
                        switch ($postback_data) {
                            case 'SelfChallenge':
                                $line->Clear_BOTFlash();
                                $Answer = $PlayGameClass->GetRandNum_1A2B();
                                $content = array(
                                    "BOT_Type" => $postback_func,
                                    "BOT_Model" => $Answer,
                                    "BOT_Action" => $postback_action,
                                    "BOT_Data" => $postback_data,
                                    "BOT_Box" => '',
                                    "BOT_Mode" => '',
                                    "BOT_Date" => $line->LineMessageDB_Membe->getNowTime(),
                                    "BOT_ID" => '',
                                );
                                $line->LineMessageDB_Membe
                                    ->SetAction('update')
                                    ->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                                    ->SetValue('content', json_encode($content))
                                    ->BuildQuery();
                                $Flex = array(
                                    'type' => 'bubble',
                                    'body' => array(
                                        'type' => 'box',
                                        'layout' => 'vertical',
                                        'justifyContent' => 'space-between',
                                        'contents' => array(
                                            array(
                                                'type' => 'text',
                                                'weight' => 'bold',
                                                'size' => '4xl',
                                                'align' => 'center',
                                                'text' => '遊戲開始',
                                                'color' => '#6aaa64',
                                            ),
                                            array(
                                                'type' => 'box',
                                                'layout' => 'vertical',
                                                'contents' => array(
                                                    array(
                                                        'type' => 'text',
                                                        'weight' => 'bold',
                                                        'align' => 'center',
                                                        'text' => '遊戲說明',
                                                        'color' => '#b74198',
                                                        'margin' => 'md',
                                                    ),
                                                    array(
                                                        'type' => 'separator',
                                                        'color' => '#787c7e',
                                                    ),
                                                    array(
                                                        'type' => 'text',
                                                        'text' => "每次遊戲開始時，會隨機產生一組數字作為謎底，每個數字皆從0~9隨機選擇，且不重複。\n\n若數字與位置和謎底相同，即得A;\n\n若數字與謎底相同位置不同，即得B，其餘不計入。",
                                                        'wrap' => true,
                                                        'size' => 'xs',
                                                        'margin' => 'md',
                                                    ),
                                                ),
                                            ),
                                            array(
                                                'type' => 'box',
                                                'layout' => 'vertical',
                                                'contents' => array(
                                                    array(
                                                        'type' => 'text',
                                                        'weight' => 'bold',
                                                        'align' => 'center',
                                                        'text' => '範例',
                                                        'color' => '#b74198',
                                                        'margin' => 'md',
                                                    ),
                                                    array(
                                                        'type' => 'separator',
                                                        'color' => '#787c7e',
                                                    ),
                                                    array(
                                                        'type' => 'text',
                                                        'text' => "當謎底為1658，而猜測的答案為1234時，則提示1A0B;\n\n第二次猜測的答案為5678時，則提示2A1B",
                                                        'wrap' => true,
                                                        'size' => 'xs',
                                                        'margin' => 'md',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                );
                                $line->SetMessageObject($line->FLEX_Message('[' . $postback_action . '] 遊戲開始', $Flex));
                                $line->reply();
                                break;
                            case 'Leaderboard':
                                $RoomId = !empty($postback_data2) ? $postback_data2 : $line->LineMessageData_Member[0]['content']['BOT_ID'];
                                $CheckRoom = $SQL_PlayGame->SetAction('select')
                                    ->SetWhere("next='" . $postback_action . "'") //房間遊戲
                                    ->SetWhere("propertyA='" . $RoomId . "'") //房間Id(rand)
                                    ->BuildQuery();
                                if (empty($CheckRoom)) {
                                    $line->text("遊戲室不存在");
                                } else {
                                    $TryCtnBoxTmp = $CheckRoom[0]['content']['TryCtn'];
                                    if (empty($TryCtnBoxTmp)) {
                                        $line->text("遊戲室未有完成遊戲的玩家");
                                    } else {
                                        $GetMembers = $line->LineMessageDB_Membe->SetAction('select')
                                            ->SetWhere("id IN ('" . implode("','", array_keys($TryCtnBoxTmp)) . "')")
                                            ->BuildQuery();
                                        $MembersSubject = !empty($GetMembers) ? array_column($GetMembers, "subject", "id") : array();
                                        $TryCtnBox = array();
                                        foreach ($TryCtnBoxTmp as $id => $tryCtn) {
                                            $TryCtnBox[] = array(
                                                "TryCtn" => $tryCtn,
                                                "pictureUrl" => $MembersSubject[$id]['pictureUrl'],
                                                "displayName" => $MembersSubject[$id]['displayName'],
                                            );
                                        }
                                        $TryCtnBox = $PlayGameClass->TryCtnSort_Leaderboard($TryCtnBox);
                                        $NumContents = array();
                                        foreach ($TryCtnBox as $key => $value) {
                                            $NumContents[] = array(
                                                'type' => 'box',
                                                'layout' => 'horizontal',
                                                'spacing' => 'sm',
                                                'margin' => 'md',
                                                'contents' => array(
                                                    array(
                                                        'type' => 'box',
                                                        'layout' => 'horizontal',
                                                        'justifyContent' => 'center',
                                                        'contents' => array(
                                                            array(
                                                                'type' => 'box',
                                                                'layout' => 'vertical',
                                                                'cornerRadius' => '1000px',
                                                                'contents' => array(
                                                                    array(
                                                                        'type' => 'image',
                                                                        'url' => $value['pictureUrl'],
                                                                        'size' => 'xxs',
                                                                    ),
                                                                ),
                                                            ),
                                                            array(
                                                                'type' => 'text',
                                                                'weight' => 'bold',
                                                                'size' => 'xs',
                                                                'text' => $value['displayName'],
                                                                'flex' => 2,
                                                            ),
                                                        ),
                                                    ),
                                                    array(
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'justifyContent' => 'center',
                                                        'contents' => array(
                                                            array(
                                                                'type' => 'text',
                                                                'weight' => 'bold',
                                                                'size' => 'lg',
                                                                'text' => strval($value['TryCtn']),
                                                                'align' => 'end',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            );
                                        }
                                        $Flex = array(
                                            'type' => 'bubble',
                                            'body' => array(
                                                'type' => 'box',
                                                'layout' => 'vertical',
                                                'justifyContent' => 'space-between',
                                                'contents' => array(
                                                    array(
                                                        'type' => 'box',
                                                        'layout' => 'horizontal',
                                                        'contents' => array(
                                                            array(
                                                                'type' => 'text',
                                                                'weight' => 'bold',
                                                                'size' => '3xl',
                                                                'align' => 'center',
                                                                'text' => '排行榜',
                                                                'color' => '#6aaa64',
                                                            ),
                                                        ),
                                                    ),
                                                    array(
                                                        'type' => 'separator',
                                                        'color' => '#787c7e',
                                                    ),
                                                    array(
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'contents' => $NumContents,
                                                    ),
                                                ),
                                            ),
                                        );
                                        $line->SetMessageObject($line->FLEX_Message('排行榜', $Flex));
                                    }
                                }
                                $line->reply();
                                break;
                            case 'GameStart':
                                $RoomId = !empty($postback_data2) ? $postback_data2 : $line->LineMessageData_Member[0]['content']['BOT_ID'];
                                $CheckRoom = $SQL_PlayGame->SetAction('select')
                                    ->SetWhere("next='" . $postback_action . "'") //房間遊戲
                                    ->SetWhere("propertyA='" . $RoomId . "'") //房間Id(rand)
                                    ->BuildQuery();
                                if (empty($line->LineMessageData_Member[0]['content']['BOT_Mode']) && $line->LineMessageData_Member[0]['id'] == $CheckRoom[0]['prev']) {
                                    $RoomMembers = $line->LineMessageDB_Membe->SetAction('select')
                                        ->SetWhere("content LIKE '%\"BOT_ID\":\"" . $RoomId . "\"%'")
                                        ->BuildQuery();
                                    if (!empty($RoomMembers)) {
                                        $SQL_PlayGame->SetAction('update')
                                            ->SetWhere("id='" . $CheckRoom[0]['id'] . "'")
                                            ->SetValue("viewA", 'Start') //房間狀態
                                            ->BuildQuery();
                                        foreach ($RoomMembers as $key => $value) {
                                            $value['content']['BOT_Mode'] = 'Start';
                                            $line->LineMessageDB_Membe->SetAction('update')
                                                ->SetWhere("id='" . $value['id'] . "'")
                                                ->SetValue("content", json_encode($value['content']))
                                                ->BuildQuery();
                                        }
                                        $line->LineMessageData_Member[0]['content']['BOT_Model'] = 'Start';
                                        $line->RichMenu_Multiple_Link('richmenu-2fc6ce7f33a82da60d5fcd95b362da44', array_column($RoomMembers, 'propertyA')); //開始遊戲
                                    }
                                }
                                break;
                            case 'RoomStatus':
                                $RoomId = !empty($postback_data2) ? $postback_data2 : $line->LineMessageData_Member[0]['content']['BOT_ID'];
                                $CheckRoom = $SQL_PlayGame->SetAction('select')
                                    ->SetWhere("next='" . $postback_action . "'") //房間遊戲
                                    ->SetWhere("propertyA='" . $RoomId . "'") //房間Id(rand)
                                    ->BuildQuery();
                                if (!empty($RoomId)) {
                                    $RoomMembers = $line->LineMessageDB_Membe->SetAction('select')
                                        ->SetWhere("content LIKE '%\"BOT_ID\":\"" . $RoomId . "\"%'")
                                        ->BuildQuery();
                                }
                                if (!empty($RoomMembers)) {
                                    $OwnerContent = array();
                                    $UserContent = array();
                                    $UserContentChilds = array();
                                    $WaitContent = array();
                                    $StartContent = array();
                                    foreach ($RoomMembers as $key => $value) {
                                        $StatusContent = array();
                                        $BoxCtn = !empty($value['content']['BOT_Box']) ? count($value['content']['BOT_Box']) : 0;
                                        if ($CheckRoom[0]['prev'] == $value['id']) {
                                            $OwnerContent = array(
                                                'type' => 'box',
                                                'layout' => 'horizontal',
                                                'spacing' => 'sm',
                                                'contents' => array_values(array_filter(array(
                                                    array(
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'cornerRadius' => '1000px',
                                                        'contents' => array(
                                                            array(
                                                                'type' => 'image',
                                                                'url' => $value['subject']['pictureUrl'],
                                                                'size' => 'sm',
                                                            ),
                                                        ),
                                                    ),
                                                    array(
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'justifyContent' => 'center',
                                                        'contents' => array(
                                                            array(
                                                                'type' => 'text',
                                                                'weight' => 'bold',
                                                                'size' => 'xl',
                                                                'text' => $value['subject']['displayName'],
                                                            ),
                                                        ),
                                                    ),
                                                ))),
                                            );
                                        } else {
                                            $UserContentChilds[] = array(
                                                'type' => 'box',
                                                'layout' => 'horizontal',
                                                'spacing' => 'sm',
                                                'margin' => 'md',
                                                'contents' => array_values(array_filter(array(
                                                    array(
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'cornerRadius' => '1000px',
                                                        'contents' => array(
                                                            array(
                                                                'type' => 'image',
                                                                'url' => $value['subject']['pictureUrl'],
                                                                'size' => 'xxs',
                                                            ),
                                                        ),
                                                    ),
                                                    array(
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'justifyContent' => 'center',
                                                        'contents' => array(
                                                            array(
                                                                'type' => 'text',
                                                                'text' => $value['subject']['displayName'],
                                                            ),
                                                        ),
                                                    ),
                                                ))),
                                            );
                                        }
                                    }
                                    if (!empty($UserContentChilds)) {
                                        $UserContent = array(
                                            'type' => 'box',
                                            'layout' => 'vertical',
                                            'contents' => $UserContentChilds,
                                        );
                                    }
                                    if (empty($line->LineMessageData_Member[0]['content']['BOT_Mode']) && $line->LineMessageData_Member[0]['id'] == $CheckRoom[0]['prev'] && count($RoomMembers) > 1) {
                                        $StartContent = array(
                                            'type' => 'box',
                                            'layout' => 'vertical',
                                            'paddingAll' => '7.5px',
                                            'backgroundColor' => '#17c950',
                                            'cornerRadius' => '7.5px',
                                            'margin' => 'md',
                                            'action' => array(
                                                'type' => 'postback',
                                                'label' => '開始遊戲',
                                                'data' => 'BOT(_)PlayGame(_)1A2B(_)GameStart(_)' . $RoomId,
                                            ),
                                            'contents' => array(
                                                array(
                                                    'type' => 'text',
                                                    'text' => '開始遊戲',
                                                    'align' => 'center',
                                                    'color' => '#ffffff',
                                                ),
                                            ),
                                        );
                                    }
                                    switch ($line->LineMessageData_Member[0]['content']['BOT_Mode']) {
                                        case 'Start':
                                            $StatusText = '遊戲進行中';
                                            break;
                                        case 'End':
                                            $StatusText = '已完成作答';
                                            break;
                                        default:
                                            $StatusText = '等待其他玩家加入中...';
                                            break;
                                    }
                                    $WaitContent = array(
                                        'type' => 'box',
                                        'layout' => 'vertical',
                                        'margin' => 'xxl',
                                        'contents' => array(
                                            array(
                                                'type' => 'text',
                                                'text' => $StatusText,
                                                'align' => 'center',
                                                'color' => '#849ebf',
                                            ),
                                        ),
                                    );
                                    $Flex = array(
                                        'type' => 'bubble',
                                        'body' => array(
                                            'type' => 'box',
                                            'layout' => 'vertical',
                                            'justifyContent' => 'space-between',
                                            'contents' => array_values(array_filter(array(
                                                $OwnerContent,
                                                array(
                                                    'type' => 'separator',
                                                    'color' => '#787c7e',
                                                    'margin' => 'md',
                                                ),
                                                $UserContent,
                                                $WaitContent,
                                                $StartContent,
                                            ))),
                                        ),
                                    );
                                    $line->SetMessageObject($line->FLEX_Message('遊戲室狀態', $Flex));
                                } else {
                                    $line->text("遊戲室不存在");
                                }
                                $line->reply();
                                break;
                            case 'DoubleBattle':
                            case 'Multiplayer':
                                $BOT_Data = $postback_data;
                                if ($postback_data == 'DoubleBattle' && empty($line->LineMessageData_Member[0]['content']['BOT_Model'])) {
                                    $UpdateContentFlag = false;
                                    $SendInviteFlag = false;
                                    $BOT_Model = "";
                                    switch ($postback_data2) {
                                        case 'Self':
                                            $UpdateContentFlag = true;
                                            $BOT_Data = $postback_data . '(_)' . $postback_data2;
                                            $line->text('請輸入謎底')->reply();
                                            break;
                                        case 'System':
                                            $UpdateContentFlag = true;
                                            $SendInviteFlag = true;
                                            $BOT_Model = $PlayGameClass->GetRandNum_1A2B();
                                            $BOT_Data = $postback_data . '(_)' . $postback_data2;
                                            break;
                                        default:
                                            $carousel_actions[] = $line->messageObject('postback', '自行輸入', 'BOT(_)PlayGame(_)1A2B(_)DoubleBattle(_)Self');
                                            $carousel_actions[] = $line->messageObject('postback', '系統產生', 'BOT(_)PlayGame(_)1A2B(_)DoubleBattle(_)System');
                                            $carousel_columns[] = $line->columns_v2(NULL, '請選擇「謎底產生方式」', NULL, $carousel_actions);
                                            $line->carousel('請選擇「謎底產生方式」', $carousel_columns);
                                            $line->reply();
                                            break;
                                    }
                                } else {
                                    $UpdateContentFlag = true;
                                    $SendInviteFlag = true;
                                    $BOT_Model = $PlayGameClass->GetRandNum_1A2B();
                                }
                                if ($UpdateContentFlag) {
                                    $RoomId = !empty($line->LineMessageData_Member[0]['content']['BOT_ID']) ? $line->LineMessageData_Member[0]['content']['BOT_ID'] : kCore_rand();
                                    $CheckRoom = $SQL_PlayGame->SetAction('select')
                                        ->SetWhere("next='" . $postback_action . "'") //房間遊戲
                                        ->SetWhere("propertyA='" . $RoomId . "'") //房間Id(rand)
                                        ->BuildQuery();
                                    if (empty($CheckRoom)) {
                                        $SQL_PlayGame->SetAction('insert')
                                            ->SetValue("prev", $line->LineMessageData_Member[0]['id']) //開房者 id
                                            ->SetValue("next", $postback_action) //房間遊戲
                                            ->SetValue("viewA", 'Wait') //房間狀態
                                            ->SetValue("propertyA", $RoomId) //房間Id(rand)
                                            ->SetValue("propertyB", $postback_data) //房間類型
                                            ->SetValue('update_at', $SQL_PlayGame->getNowTime())
                                            ->SetValue('create_at', $SQL_PlayGame->getNowTime())
                                            ->BuildQuery();
                                    }
                                    $content = array(
                                        "BOT_Type" => $postback_func,
                                        "BOT_Model" => $BOT_Model,
                                        "BOT_Action" => $postback_action,
                                        "BOT_Data" => $BOT_Data,
                                        "BOT_Box" => '',
                                        "BOT_Mode" => '',
                                        "BOT_Date" => $line->LineMessageDB_Membe->getNowTime(),
                                        "BOT_ID" => $RoomId,
                                    );
                                    $line->LineMessageDB_Membe
                                        ->SetAction('update')
                                        ->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                                        ->SetValue('content', json_encode($content))
                                        ->BuildQuery();
                                }
                                if ($SendInviteFlag) {
                                    $carousel_actions[] = $line->messageObject('postback', '查看遊戲室狀態', 'BOT(_)PlayGame(_)1A2B(_)RoomStatus(_)' . $RoomId);
                                    $carousel_actions[] = $line->messageObject('uri', '邀請好友', 'https://liff.line.me/' . __LIFF_URLMSG__ID . '?id=PlayGame&action=' . $postback_action . '&mode=' . $BOT_Data . '&userId=' . base64_encode($RoomId));
                                    $carousel_columns[] = $line->columns_v2(NULL, '邀請好友進行對戰', NULL, $carousel_actions);
                                    $line->carousel('邀請好友進行對戰', $carousel_columns);
                                    $line->reply();
                                    $line->RichMenuLink('richmenu-dbc2057b3ca0b8f065d799ae02ce095a', $line->LineMessageData_Member[0]['propertyA']); //等待其他玩家加入中...
                                }
                                break;
                            default:
                                $carousel_actions[] = $line->messageObject('postback', '自我挑戰', 'BOT(_)PlayGame(_)1A2B(_)SelfChallenge');
                                $carousel_actions[] = $line->messageObject('postback', '雙人對戰', 'BOT(_)PlayGame(_)1A2B(_)DoubleBattle');
                                $carousel_actions[] = $line->messageObject('postback', '多人競賽', 'BOT(_)PlayGame(_)1A2B(_)Multiplayer');
                                $carousel_columns[] = $line->columns_v2(NULL, '請選擇「對戰模式」', NULL, $carousel_actions);
                                $line->carousel('請選擇「對戰模式」', $carousel_columns);
                                $line->reply();
                                break;
                        }
                        break;
                }
                break;
                //解除綁定
            case 'CancelNotify':;
                $Revoke = $line->RevokeNotify($line->LineMessageData_Member[0]['propertyC']);
                if ($Revoke['status'] == 200) {
                    $subject = $line->LineMessageData_Member[0]['subject'];
                    unset($subject['token']);
                    unset($subject['profile']);
                    $CancelNotify = $line->LineMessageDB_Membe->SetAction('update')->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                        ->SetValue('subject', json_encode($subject))
                        ->SetValue('propertyC', '')
                        ->SetValue('update_at', $line->LineMessageDB_Membe->getNowTime())
                        ->BuildQuery();
                    $line->text('已解除notify連動');
                } else {
                    $line->text('請重新操作');
                }
                $line->reply();
                break;
            case 'CreateCard':
                switch ($postback_action) {
                    case 'Start':
                        $SQL_CardRobot = new kSQL('CardRobot');
                        $Card = $SQL_CardRobot->SetAction('select')
                            ->SetWhere("tablename='CardRobot'")
                            ->SetWhere("next='myself'")
                            ->SetWhere("id='" . $postback_data . "'")
                            ->SetLimit(1)
                            ->BuildQuery();
                        $Card = $Card[0];
                        if (!$Card) {
                            $line->text('卡片不存在')->reply();
                        } else if ($Card['viewA'] !== 'on') {
                            $line->text('卡片已關閉')->reply();
                        } else {
                            $questionList = array();
                            $AnswerList = array();
                            for ($i = 0; $i < 10; $i++) {
                                if ($Card['subject']['question' . $i]) {
                                    $questionList[] = $Card['subject']['question' . $i];
                                }
                            }
                            $content = array(
                                "BOT_Type" => "CreateCard",
                                "BOT_Model" => 1,
                                "BOT_Action" => $Card,
                                "BOT_Data" => $AnswerList,
                                "BOT_Box" => $questionList,
                                "BOT_Mode" => '',
                                "BOT_Date" => $line->LineMessageDB_Membe->getNowTime(),
                                "BOT_ID" => $postback_data,
                            );
                            $line->LineMessageDB_Membe
                                ->SetAction('update')
                                ->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                                ->SetValue('content', json_encode($content))
                                ->BuildQuery();
                            $line->text($questionList[0])->reply();
                        }
                        break;
                }
                break;
            case 'FillForm':
                switch ($postback_action) {
                    case 'Start':
                        $SQL_QARobot = new kSQL('QARobot');
                        $QA = $SQL_QARobot->SetAction('select')
                                        ->SetWhere("tablename='QARobot'")
                                        ->SetWhere("next='myself'")
                                        ->SetWhere("id='" . $postback_data . "'")
                                        ->SetLimit(1)
                                        ->BuildQuery();
                        $QA = $QA[0];
                        if (!$QA) {
                            $line->text('問卷不存在')->reply();
                        } else if ($QA['viewA'] !== 'on') {
                            $line->text('問卷已關閉')->reply();
                        } else {
                            $questionList = array();
                            $NowQuestion = 1;
                            $AnswerList = array();
                            for ($i = 0; $i < 10; $i++) {
                                if ($QA['subject']['question' . $i] && $QA['subject']['type' . $i]) {
                                    $questionList[] = array(
                                        "type" => $QA['subject']['type' . $i],
                                        "question" => $QA['subject']['question' . $i],
                                        "option" => $QA['subject']['option' . $i],
                                    );
                                }
                            }
                            $content = array(
                                "BOT_Type" => "FillForm",
                                "BOT_Model" => $NowQuestion,
                                "BOT_Action" => $QA,
                                "BOT_Data" => $AnswerList,
                                "BOT_Box" => $questionList,
                                "BOT_Mode" => '',
                                "BOT_Date" => $line->LineMessageDB_Membe->getNowTime(),
                                "BOT_ID" => $postback_data,
                            );
                            $line->LineMessageDB_Membe
                                ->SetAction('update')
                                ->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                                ->SetValue('content', json_encode($content))
                                ->BuildQuery();
                            $line->text("id: " . $line->LineMessageData_Member[0]['id']);

                            $FELX = new FELX();
                            switch ($questionList[$NowQuestion - 1]['type']) {
                                case 'date':
                                case 'time':
                                case 'datetime':
                                    switch ($questionList[$NowQuestion - 1]['type']) {
                                        case 'date':
                                            $label = '選擇日期';
                                            break;
                                        case 'time':
                                            $label = '選擇時間';
                                            break;
                                        case 'datetime':
                                            $label = '選擇日期/時間';
                                            break;
                                    }
                                    $QuestionBubbleQuickReply = array(
                                        array(
                                            "action" => array(
                                                "type" => "datetimepicker",
                                                "label" => $label,
                                                "data" => "BOT(_)kBOTClass",
                                                "mode" => $questionList[$NowQuestion - 1]['type'],
                                                "initial" => "",
                                                "max" => "",
                                                "min" => "",
                                            ),
                                        ),
                                    );
                                    $AnswerAlt = '請' . $label;
                                    break;
                                case 'location':
                                    $QuestionBubbleQuickReply = array(
                                        array(
                                            "action" => array(
                                                "type" => "location",
                                                "label" => $label,
                                            ),
                                        ),
                                    );
                                    $AnswerAlt = '請選擇位置';
                                    break;
                                case 'radio':
                                    $QuestionBubbleQuickReply = array();
                                    if ($questionList[$NowQuestion - 1]['option']) {
                                        $optionList = explode(',', $questionList[$NowQuestion - 1]['option']);
                                        foreach ($optionList as $key => $option) {
                                            $QuestionBubbleQuickReply[] = array(
                                                "action" => array(
                                                    "type" => "postback",
                                                    "label" => $option,
                                                    "data" => "BOT(_)kBOTClass(_)" . $option,
                                                ),
                                            );
                                        }
                                    }
                                    $AnswerAlt = '請選擇你的答案';
                                    break;
                                case 'checkbox':
                                case 'select':
                                    if ($questionList[$NowQuestion - 1]['option']) {
                                        $liffUrl = 'https://liff.line.me/' . __LIFF_ANSWER__ID;
                                        $QuestionBubbleQuickReply = array([
                                            "action" => array(
                                                "type" => "uri",
                                                "label" => "請選擇",
                                                "uri" => $liffUrl . "?type=" . $questionList[$NowQuestion - 1]['type'] . "&option=" . urlencode($questionList[$NowQuestion - 1]['option']),
                                            ),
                                        ]);
                                    }
                                    $AnswerAlt = '請選擇你的答案';
                                    break;
                                default:
                                    switch ($questionList[$NowQuestion - 1]['type']) {
                                        case 'text':
                                            $AnswerAlt = '請輸入文字';
                                            break;
                                        case 'number':
                                            $AnswerAlt = '請輸入數字';
                                            break;
                                        case 'phone':
                                            $AnswerAlt = '請輸入電話';
                                            break;
                                        case 'email':
                                            $AnswerAlt = '請輸入信箱';
                                            break;
                                        case 'image':
                                            $AnswerAlt = '請上傳照片';
                                            break;
                                        case 'video':
                                            $AnswerAlt = '請上傳影片';
                                            break;
                                        case 'audio':
                                            $AnswerAlt = '請上傳語音';
                                            break;
                                        case 'file':
                                            $AnswerAlt = '請上傳檔案';
                                            break;
                                        default:
                                            $AnswerAlt = '請輸入你的答案';
                                            break;
                                    }
                                    break;
                            }
                            $QuestionBubbleVal = array(
                                'Title' => $QA['subject']['subject'],
                                'QuestionNo' => 0,
                                'Question' => $questionList[$NowQuestion - 1]['question'],
                                'Answer' => $AnswerAlt,
                            );
                            $line->SetMessageObject($FELX->FELX_Question($QuestionBubbleVal['Question'], $QuestionBubbleVal, $QuestionBubbleQuickReply));
                            $line->reply();
                        }
                        break;
                    case 'Exit':
                        if (!empty($line->LineMessageData_Member[0]['content']['BOT_Type'])) {
                            $line->Clear_BOTFlash();
                        }
                        break;
                    case 'Send':
                        if (!empty($line->LineMessageData_Member[0]['content']['BOT_Type'])) {
                            $FELX = new FELX();
                            $title = '問卷完成通知';
                            $Val = array(
                                "type" => "success",
                                "title" => "問卷已完成",
                                "text" => "感謝你的參與",
                            );
                            $line->SetMessageObject($FELX->FLEX_SendMessage($title, $FELX->FLEX_Alert($Val)))->reply();

                            $BOT_Content = $line->LineMessageData_Member[0]['content'];
                            $SQL_QARobot = new kSQL('QARobot');
                            if ($BOT_Content['BOT_Data']) {
                                foreach ($BOT_Content['BOT_Data'] as $key => $value) {
                                    switch ($BOT_Content['BOT_Box'][$key]['type']) {
                                        case 'image':
                                        case 'video':
                                        case 'audio':
                                        case 'file':
                                            //如果[ /upload ]底下[ contentId ]資料夾不存在，則建立
                                            if (!is_dir(__ROOT_UPLOAD . "/contentId/")) {
                                                mkdir(__ROOT_UPLOAD . "/contentId/", 0777);
                                            }
                                            file_put_contents(__ROOT_UPLOAD . '/contentId/' . $value, file_get_contents(__CustomStickers_Web . '/ft/img/contentId/' . $value));
                                            $BOT_Content['BOT_Data'][$key] = __WEB_UPLOAD . '/contentId/' . $value;
                                            break;
                                    }
                                }
                            }
                            $subject = array(
                                "question" => $BOT_Content['BOT_Box'],
                                "answer" => $BOT_Content['BOT_Data'],
                            );
                            $InsertQA = $SQL_QARobot->SetAction('insert')
                                                    ->SetValue("prev", $BOT_Content['BOT_ID'])
                                                    ->SetValue("next", "formlist")
                                                    ->SetValue("subject", json_encode($subject))
                                                    ->SetValue("propertyA", $line->LineMessageData_Member[0]['propertyA'])
                                                    ->SetValue('update_at', $SQL_QARobot->getNowTime())
                                                    ->SetValue('create_at', $SQL_QARobot->getNowTime())
                                                    ->BuildQuery();
                            //貼標
                            if(!empty($QA['sortB'])){
                                kCore_Tag('SelectAndUpdate', array(
                                    "id" => $QA['sortB'],
                                    "userId" => $line->events['source']['userId'],
                                ));
                            }
                            $line->Clear_BOTFlash();
                        }
                        break;
                }
                break;
            case 'Group':
                switch ($postback_action) {
                    case 'Select':
                        $SQL_GroupRobot = new kSQL('GroupRobot');
                        $GroupList = $SQL_GroupRobot->SetAction('select')
                            ->SetWhere("id='" . $postback_data . "'")
                            ->BuildQuery();
                        $GetVote = $SQL_GroupRobot->SetAction('select')
                            ->SetWhere("prev='" . $postback_data . "'")
                            ->SetWhere("next='vote'")
                            ->SetWhere("propertyB='" . $line->LineMessageData_Member[0]['propertyA'] . "'") //得票者
                            ->BuildQuery();
                        $FELX = new FELX();
                        $altText = '查詢票數結果';
                        if ($GetVote) {
                            $type = 'success';
                            $title = $GroupList[0]['VoteCtn'] ? preg_replace("/\(VoteCtn\)/", count($GetVote), $GroupList[0]['VoteCtn']) : "你已獲得" . count($GetVote) . "票";
                        } else {
                            $type = 'warning';
                            $title = $GroupList[0]['NoVote'] ? $GroupList[0]['NoVote'] : "你尚未獲得任何票數";
                        }
                        $Val = array(
                            "type" => $type,
                            "title" => $title,
                        );
                        $line->SetMessageObject($FELX->FLEX_SendMessage($altText, $FELX->FLEX_Alert($Val)))->reply();
                        break;
                }
                break;
            case 'LoginInvoice':
                switch ($postback_action) {
                    case 'Start':
                        $liffUrl = 'https://liff.line.me/' . __LIFF_ANSWER__ID;
                        $CameraUrl = __CustomStickers_Web . '/ft/Answer';
                        $actions[] = $line->messageObject('uri', '發票上傳', "https://line.me/R/nv/camera/"); //https://line.me/R/nv/QRCodeReader
                        $actions[] = $line->messageObject('uri', '手動輸入', $liffUrl . "?type=invoice");
                        $actions[] = $line->messageObject('uri', '電子載具', $liffUrl . "?type=invoiceCard");
                        $actions[] = $line->messageObject('uri', '相機掃描', $CameraUrl . "?type=invoice&option=qrcode&openExternalBrowser=1"); //&openExternalBrowser=1，ios14.3以下只能用預設留覽器
                        $line->buttons($thumbnailImageUrl = NULL, $altText = '登錄發票', $title = '登錄發票', $text = NULL, $actions)
                            ->reply();
                        $content = array(
                            "BOT_Type" => "LoginInvoice",
                            "BOT_Model" => '',
                            "BOT_Action" => '',
                            "BOT_Data" => '',
                            "BOT_Box" => '',
                            "BOT_Mode" => '',
                            "BOT_Date" => $line->LineMessageDB_Membe->getNowTime(),
                            "BOT_ID" => $postback_data,
                        );
                        $line->LineMessageDB_Membe
                            ->SetAction('update')
                            ->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                            ->SetValue('content', json_encode($content))
                            ->BuildQuery();
                        break;
                }
                break;
            case 'kBOTClass':
                if (!empty($line->LineMessageData_Member[0]['content']['BOT_Type'])) {
                    $kBOTClass = new kBOTClass($line);
                }
                break;
            case 'KeyWordMsg':
            case 'UrlMsg':
            case 'ImageMap':
            case 'ImageCarousel':
            case 'LineTemplate':
            case 'CustomMessage':
                $MsgTypeList = array(
                    'KeyWordMsg' => $postback_func,
                    'UrlMsg' => $postback_func,
                    'ImageMap' => 'imagemap',
                    'ImageCarousel' => 'imagecarousel',
                    'LineTemplate' => 'linetemplate',
                    'CustomMessage' => 'custom',
                );
                $MsgNameList = array(
                    'KeyWordMsg' => '關鍵字回覆',
                    'UrlMsg' => '連結訊息',
                    'ImageMap' => '圖文訊息',
                    'ImageCarousel' => '大圖選單',
                    'LineTemplate' => '卡片式選單',
                    'CustomMessage' => '自訂訊息',
                );
                $SQL_Module = new kSQL($postback_func);
                $ModuleMsg = $SQL_Module->SetAction('select')
                    ->SetWhere("tablename='" . $postback_func . "'")
                    ->SetWhere("next='myself'")
                    ->SetWhere("id='" . $postback_action . "'")
                    ->SetWhere("propertyB like 'line'", ($postback_func == 'KeyWordMsg') ? 1 : 0)
                    ->BuildQuery();
                if (!$ModuleMsg[0]) {
                    $line->text($MsgNameList[$postback_func] . '不存在')->reply();
                } else {
                    $Verify = false;
                    switch ($postback_func) {
                        case 'KeyWordMsg':
                        case 'UrlMsg':
                            if ($ModuleMsg[0]['viewA'] === 'on') {
                                $Verify = true;
                            }
                            break;
                        default:
                            $Verify = true;
                            break;
                    }
                    if ($Verify === false) {
                        $line->text($MsgNameList[$postback_func] . '已關閉')->reply();
                    } else {
                        $MsgItem['subject'] = array(
                            'type_0' => $MsgTypeList[$postback_func],
                            'value_0' => $postback_action,
                        );
                        $line->SetMessages($MsgItem)->reply();
                    }
                }
                break;
            case 'RichMenu':
                switch ($postback_action) {
                    case 'default': //恢復預設選單
                        $line->RichMenuUnlink($line->LineMessageData_Member[0]['propertyA']);
                        break;
                    default: //id
                        $SQL_RichMenu = new kSQL('RichMenu');
                        $SelectRichMenu = $SQL_RichMenu->SetAction('select')
                            ->SetWhere("tablename='RichMenu'")
                            ->SetWhere("next='myself'")
                            ->SetWhere("id='" . $postback_action . "'")
                            ->BuildQuery();
                        if (!empty($SelectRichMenu[0]['propertyA'])) {
                            $line->RichMenuLink($SelectRichMenu[0]['propertyA'], $line->LineMessageData_Member[0]['propertyA']);
                        }
                        break;
                }
                break;
        }
        break;
    default:

        break;
}
