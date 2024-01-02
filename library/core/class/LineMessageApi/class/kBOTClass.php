<?php

class kBOTClass
{

    public $Type;
    public $Model;
    public $Action;
    public $Data;
    public $Box;
    public $Date;
    public $DB;
    public $ID;

    function __construct($line)
    {
        switch (__DOMAIN) {
            default:
                if ($line->events['message']['text'] == '/結束') {
                    $line->Clear_BOTFlash();
                    $line->text('已結束')->reply();
                }
                break;
        }
        $this->Type = !empty($line->LineMessageData_Member[0]['content']['BOT_Type']) ? $line->LineMessageData_Member[0]['content']['BOT_Type'] : '';
        $this->Model = !empty($line->LineMessageData_Member[0]['content']['BOT_Model']) ? $line->LineMessageData_Member[0]['content']['BOT_Model'] : '';
        $this->Action = !empty($line->LineMessageData_Member[0]['content']['BOT_Action']) ? $line->LineMessageData_Member[0]['content']['BOT_Action'] : '';
        $this->Data = !empty($line->LineMessageData_Member[0]['content']['BOT_Data']) ? $line->LineMessageData_Member[0]['content']['BOT_Data'] : '';
        $this->Box = !empty($line->LineMessageData_Member[0]['content']['BOT_Box']) ? $line->LineMessageData_Member[0]['content']['BOT_Box'] : '';
        $this->Mode = !empty($line->LineMessageData_Member[0]['content']['BOT_Mode']) ? $line->LineMessageData_Member[0]['content']['BOT_Mode'] : '';
        $this->Date = !empty($line->LineMessageData_Member[0]['content']['BOT_Date']) ? $line->LineMessageData_Member[0]['content']['BOT_Date'] : '';
        $this->ID = !empty($line->LineMessageData_Member[0]['content']['BOT_ID']) ? $line->LineMessageData_Member[0]['content']['BOT_ID'] : '';

        switch ($this->Type) {
            case 'PlayGame':
                include_once dirname(__FILE__) . '/PlayGameClass.php';
                $PlayGameClass = new PlayGameClass();
                $SQL_PlayGame = new kSQL('PlayGame');
                switch ($this->Action) {
                    case 'POKER_PickRedDots':
                        $postback_query = explode('(_)', $line->events['postback']['data']);
                        $postback_bot = $postback_query[0];
                        $postback_func = $postback_query[1];
                        $postback_action = $postback_query[2];
                        $postback_data = $postback_query[3];
                        $postback_data2 = $postback_query[4];

                        if ($postback_func == $this->Action) {
                            switch ($postback_action) {
                                case 'PickCard':
                                    $Box = $this->Box;
                                    $side = $this->Model['side'];
                                    $middle = $this->Model['middle'];
                                    $AssignCard = $PlayGameClass->MakePokerCard(array("suit" => $postback_data, "num" => $postback_data2));
                                    if (!empty($Box) && (in_array($AssignCard['suit'] . '-' . $AssignCard['num'], $Box['player1']) || in_array($AssignCard['suit'] . '-' . $AssignCard['num'], $Box['player2']))) {
                                        $line->text($AssignCard['icon'] . $AssignCard['num'] . "已經出過囉");
                                    } else {
                                        $NowPlayer = $this->Model['player'];
                                        $OwnSuitNum = array("suit" => $AssignCard['suit'], "num" => $AssignCard['num']);
                                        //檢查剛剛出的牌有沒有符合 兩兩搭配
                                        $OwnCheckRule = $PlayGameClass->CheckRule($OwnSuitNum, $side);
                                        if (!empty($OwnCheckRule)) {
                                            $Box[$NowPlayer][] = $AssignCard['suit'] . '-' . $AssignCard['num'];
                                            $Box[$NowPlayer][] = $OwnCheckRule['suit'] . '-' . $OwnCheckRule['num'];
                                            $side = $PlayGameClass->RemovePlayerCard($OwnCheckRule, $side);
                                        } else {
                                            $side[] = $OwnSuitNum;
                                        }
                                        //中間翻一張牌
                                        $OwnGetFirstMiddle = $middle[0];unset($middle[0]);$middle = array_values($middle);
                                        //檢查中間翻出的牌有沒有符合 兩兩搭配
                                        $OwnCheckMiddleRule = $PlayGameClass->CheckRule($OwnGetFirstMiddle, $side);
                                        if (!empty($OwnCheckMiddleRule)) {
                                            $Box[$NowPlayer][] = $OwnGetFirstMiddle['suit'] . '-' . $OwnGetFirstMiddle['num'];
                                            $Box[$NowPlayer][] = $OwnCheckMiddleRule['suit'] . '-' . $OwnCheckMiddleRule['num'];
                                            $side = $PlayGameClass->RemovePlayerCard($OwnCheckMiddleRule, $side);
                                        } else {
                                            $side[] = $OwnGetFirstMiddle;
                                        }
                                       //從玩家手上的牌，移除剛剛出的牌，並整牌
                                        $this->Model[$NowPlayer] = $PlayGameClass->SuitNumSort($PlayGameClass->RemovePlayerCard($OwnSuitNum, $this->Model[$NowPlayer]));
                                        
                                        switch ($this->Data) {
                                            case 'SelfChallenge':
                                                $SystemSuitNum = $PlayGameClass->GetHighestPair($side, $this->Model['player2']);
                                                //檢查剛剛出的牌有沒有符合 兩兩搭配
                                                $SystemCheckRule = $PlayGameClass->CheckRule($SystemSuitNum, $side);
                                                if (!empty($SystemCheckRule)) {
                                                    $Box['player2'][] = $SystemSuitNum['suit'] . '-' . $SystemSuitNum['num'];
                                                    $Box['player2'][] = $SystemCheckRule['suit'] . '-' . $SystemCheckRule['num'];
                                                    $side = $PlayGameClass->RemovePlayerCard($SystemCheckRule, $side);
                                                } else {
                                                    $side[] = $SystemSuitNum;
                                                }
                                                //中間翻一張牌
                                                $SystemGetFirstMiddle = $middle[0];unset($middle[0]);$middle = array_values($middle);
                                                //檢查中間翻出的牌有沒有符合 兩兩搭配
                                                $SystemCheckMiddleRule = $PlayGameClass->CheckRule($SystemGetFirstMiddle, $side);
                                                if (!empty($SystemCheckMiddleRule)) {
                                                    $Box['player2'][] = $SystemGetFirstMiddle['suit'] . '-' . $SystemGetFirstMiddle['num'];
                                                    $Box['player2'][] = $SystemCheckMiddleRule['suit'] . '-' . $SystemGetFirstMiddle['num'];
                                                    $side = $PlayGameClass->RemovePlayerCard($SystemCheckMiddleRule, $side);
                                                } else {
                                                    $side[] = $SystemGetFirstMiddle;
                                                }
                                                //從玩家手上的牌，移除剛剛出的牌，並整牌
                                                $this->Model['player2'] = $PlayGameClass->SuitNumSort($PlayGameClass->RemovePlayerCard($SystemSuitNum, $this->Model['player2']));
                                                break;
                                            case 'DoubleBattle':

                                                break;
                                        }
                                        //自己本次的出牌，1則訊息
                                        $SideCard = array(
                                            $OwnSuitNum,//出牌
                                            $OwnGetFirstMiddle,//翻牌
                                            $OwnCheckRule,//吃牌1
                                            $OwnCheckMiddleRule,//吃牌2
                                        );
                                        //對手本次的出牌
                                        if($this->Data=='SelfChallenge'){
                                            $SideCard = array_merge($SideCard, array(
                                                $SystemSuitNum,//出牌
                                                $SystemGetFirstMiddle,//翻牌
                                                $SystemCheckRule,//吃牌1
                                                $SystemCheckMiddleRule,//吃牌2
                                            ));
                                        }
                                        $line->SetMessageObject($line->FLEX_Message($this->Action, $PlayGameClass->GetSideCard($SideCard, 'Box')));
                                        //桌面的牌，1則訊息
                                        if(!empty($side)){
                                            $line->SetMessageObject($line->FLEX_Message($this->Action, $PlayGameClass->GetSideCard($side)));
                                        }
                                        //自己手上的牌，0~1則訊息
                                        if(!empty($this->Model[$NowPlayer])){
                                            $CarouselContents = array();
                                            foreach ($this->Model[$NowPlayer] as $ckey => $card) {
                                                if (count($CarouselContents) < 12) {
                                                    $_Bubble = $PlayGameClass->MakePokerCard($card)['flex'];
                                                    $_Bubble['action'] = array(
                                                        'type' => 'postback',
                                                        'data' => "BOT(_)".$this->Action."(_)PickCard(_)".$card['suit']."(_)".$card['num'],
                                                    );
                                                    $CarouselContents[] = $_Bubble;
                                                }
                                            }
                                            $Flex = array(
                                                'type' => 'carousel',
                                                'contents' => $CarouselContents,
                                            );
                                            $line->SetMessageObject($line->FLEX_Message($this->Action, $Flex));
                                        }
                                        if(empty($this->Model['player1']) && empty($this->Model['player2'])){
                                            $line->SetMessageObject($line->FLEX_Message($this->Action, $PlayGameClass->GetSideCard(array($PlayGameClass->CountPoints($Box['player1']), $PlayGameClass->CountPoints($Box['player2'])), 'End')));
                                        }
                                        $Answer = array(
                                            "player" => $NowPlayer,
                                            "player1" => $this->Model['player1'],
                                            "player2" => $this->Model['player2'],
                                            "side" => $side,
                                            "middle" => $middle,
                                        );
                                        $content = array(
                                            "BOT_Type" => $this->Type,
                                            "BOT_Model" => $Answer,
                                            "BOT_Action" => $this->Action,
                                            "BOT_Data" => $this->Data,
                                            "BOT_Box" => $Box,
                                            "BOT_Mode" => $this->Mode,
                                            "BOT_Date" => $line->LineMessageDB_Membe->getNowTime(),
                                            "BOT_ID" => $this->ID,
                                        );
                                        $line->LineMessageDB_Membe
                                            ->SetAction('update')
                                            ->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                                            ->SetValue('content', json_encode($content))
                                            ->BuildQuery();
                                    }
                                    break;
                            }
                        }
                        if (count($line->action['data']) > 0) {
                            $line->reply();
                        }
                        break;
                    case 'BINGO':
                        $UserReply = $line->events['message']['text'];
                        $PlayFlag = true;
                        $Data = explode('(_)', $this->Data);
                        $Level = $Data[1];
                        if ($PlayFlag && !empty($UserReply)) {
                            if (mb_strlen($UserReply, "utf-8") <= 2 && preg_match("/^[0-9]/", $UserReply) && (intval($UserReply) > 0 && intval($UserReply) <= 25)) {
                                $Model = $this->Model ? $this->Model : array();
                                $Model['self'] = !empty($Model['self']) ? $Model['self'] : array();
                                $Model['system'] = !empty($Model['system']) ? $Model['system'] : array();
                                $Box = $this->Box ? $this->Box : array();
                                $Box['self'] = !empty($Box['self']) ? $Box['self'] : array();
                                $Box['system'] = !empty($Box['system']) ? $Box['system'] : array();
                                if ($Box && (($Box['self'] && in_array($UserReply, $Box['self'])) || $Box['system'] && in_array($UserReply, $Box['system']))) {
                                    $line->text("你輸入重複數字");
                                } else {
                                    list($CheckBingoCtnTmp, $SystemNum) = $PlayGameClass->CheckBingoCtn(
                                        $PlayGameClass->GetBingoList($Model['system']),
                                        array_merge($Box['self'], array($UserReply), $Box['system']),
                                        $OptimizeFlag = 1,
                                        $Level
                                    );
                                    $PlayerList = array(
                                        "self" => "你",
                                        "system" => "電腦",
                                    );
                                    $ProcessList = array(
                                        array("from" => "self", "to" => "self"),
                                        array("from" => "self", "to" => "system"),
                                        array("from" => "system", "to" => "system"),
                                        array("from" => "system", "to" => "self"),
                                    );
                                    if ($ProcessList) {
                                        $BingoFlag = false;
                                        foreach ($ProcessList as $pkey => $pvalue) {
                                            $RemarkBox = array();
                                            if ($pvalue['from'] == 'self' && $pvalue['to'] == 'self') {
                                                $Box['self'][] = $UserReply;
                                            } else if ($pvalue['from'] == 'system' && $pvalue['to'] == 'system') {
                                                $Box['system'][] = $SystemNum;
                                                $line->text($SystemNum);
                                            }
                                            list($CheckBingoCtn, $OptimizedValue) = $PlayGameClass->CheckBingoCtn(
                                                $PlayGameClass->GetBingoList($Model[$pvalue['to']]),
                                                array_merge($Box['self'], $Box['system']),
                                                $OptimizeFlag = 0,
                                                $Level
                                            );
                                            if (1 || $pvalue['to'] == 'self') {
                                                if ($CheckBingoCtn >= 5) {
                                                    $BingoFlag = true;
                                                    $RemarkBox = array(
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'contents' => array(
                                                            array(
                                                                'type' => 'separator',
                                                                'color' => '#787c7e',
                                                                'margin' => 'md',
                                                            ),
                                                            array(
                                                                'type' => 'text',
                                                                'text' => '[BINGO]，總共花了' . count($Box[$pvalue['from']]) . '次',
                                                                'margin' => 'md',
                                                                'wrap' => true,
                                                            ),
                                                        ),
                                                    );
                                                } else if ($CheckBingoCtn > 0) {
                                                    $RemarkBox = array(
                                                        'type' => 'box',
                                                        'layout' => 'vertical',
                                                        'contents' => array(
                                                            array(
                                                                'type' => 'separator',
                                                                'color' => '#787c7e',
                                                                'margin' => 'md',
                                                            ),
                                                            array(
                                                                'type' => 'text',
                                                                'text' => '已連線' . $CheckBingoCtn . '條，繼續努力',
                                                                'margin' => 'md',
                                                                'wrap' => true,
                                                            ),
                                                        ),
                                                    );
                                                }
                                            }
                                            $NumContents = array();
                                            if (array_chunk($Model[$pvalue['to']], 5)) {
                                                foreach (array_chunk($Model[$pvalue['to']], 5) as $key => $value) {
                                                    if ($value) {
                                                        $NumContentsChild = array();
                                                        foreach ($value as $key2 => $value2) {
                                                            $backgroundColor = '#787c7e'; //#787c7e(灰)、#6aaa64(綠)、#c9b458(黃)
                                                            $textColor = '#787c7e';
                                                            $CorrectFlag = (($Box['self'] && in_array($value2, $Box['self'])) || $Box['system'] && in_array($value2, $Box['system'])) ? 1 : 0;
                                                            switch ($pvalue['to']) {
                                                                case 'self':
                                                                    if ($CorrectFlag) {
                                                                        $backgroundColor = '#6aaa64';
                                                                    }
                                                                    $textColor = '#ffffff';
                                                                    break;
                                                                case 'system':
                                                                    if ($CorrectFlag) {
                                                                        $backgroundColor = '#c9b458';
                                                                        $textColor = '#ffffff';
                                                                    } else if ($BingoFlag) {
                                                                        $textColor = '#ffffff';
                                                                    }
                                                                    break;
                                                            }
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
                                                                    'color' => ($CheckBingoCtn >= 5) ? $backgroundColor : '#787c7e',
                                                                ),
                                                            ),
                                                        ),
                                                        array(
                                                            'type' => 'text',
                                                            'weight' => 'bold',
                                                            'align' => 'center',
                                                            'text' => '(' . $PlayerList[$pvalue['to']] . ')',
                                                            'color' => '#787c7e',
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
                                                        $RemarkBox,
                                                    ))),
                                                ),
                                            );
                                            $line->SetMessageObject($line->FLEX_Message($this->Action, $Flex));
                                        }
                                    }

                                    if($CheckBingoCtn >= 5){
                                        $UpdateContent = '';
                                    }else{
                                        $content = array(
                                            "BOT_Type" => $this->Type,
                                            "BOT_Model" => $this->Model,
                                            "BOT_Action" => $this->Action,
                                            "BOT_Data" => $this->Data,
                                            "BOT_Box" => $Box,
                                            "BOT_Mode" => $this->Mode,
                                            "BOT_Date" => date('Y-m-d H:i:s'),
                                            "BOT_ID" => $this->ID,
                                        );
                                        $UpdateContent = json_encode($content);
                                    }
                                    $line->LineMessageDB_Membe
                                        ->SetAction('update')
                                        ->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                                        ->SetValue('content', $UpdateContent)
                                        ->BuildQuery();
                                }
                            } else {
                                $line->text("請輸入1~25的數字");
                            }
                        }
                        if (count($line->action['data']) > 0) {
                            $line->reply();
                        }
                        break;
                    case '1A2B':
                        $RoomId = $this->ID;
                        $UserReply = $line->events['message']['text'];
                        $PlayFlag = false;
                        $CheckUnlinkRMFlag = false;
                        $ResetContentFlag = false;
                        $PushGameStartFlag = false;
                        switch ($this->Data) {
                            case 'SelfChallenge':
                                $PlayFlag = true;
                                break;
                            case 'DoubleBattle(_)Self':
                                if (empty($this->Model)) {
                                    if (!empty($UserReply)) {
                                        $VerifyFlag = false;
                                        if (mb_strlen($UserReply, "utf-8") == 4 && preg_match("/^[0-9]{4}/", $UserReply)) {
                                            $StrArr = str_split($UserReply, 1);
                                            if (count($StrArr) == count(array_unique($StrArr))) {
                                                $VerifyFlag = true;
                                            }
                                        }
                                        if ($VerifyFlag) {
                                            $content = array(
                                                "BOT_Type" => $this->Type,
                                                "BOT_Model" => $UserReply,
                                                "BOT_Action" => $this->Action,
                                                "BOT_Data" => $this->Data,
                                                "BOT_Box" => '',
                                                "BOT_Mode" => $this->Mode,
                                                "BOT_Date" => $line->LineMessageDB_Membe->getNowTime(),
                                                "BOT_ID" => $RoomId,
                                            );
                                            $line->LineMessageDB_Membe
                                                ->SetAction('update')
                                                ->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                                                ->SetValue('content', json_encode($content))
                                                ->BuildQuery();
                                            if ($this->Mode == 'Start') {
                                                $CheckUnlinkRMFlag = true;
                                                $PushGameStartFlag = true;
                                            } else {
                                                $carousel_actions[] = $line->messageObject('postback', '查看遊戲室狀態', 'BOT(_)PlayGame(_)1A2B(_)RoomStatus(_)' . $RoomId);
                                                $carousel_actions[] = $line->messageObject('uri', '邀請好友', 'https://liff.line.me/' . __LIFF_URLMSG__ID . '?id=PlayGame&action=' . $this->Action . '&mode=' . $this->Data . '&userId=' . base64_encode($RoomId));
                                                $carousel_columns[] = $line->columns_v2(NULL, '邀請好友進行對戰', NULL, $carousel_actions);
                                                $line->carousel('邀請好友進行對戰', $carousel_columns);
                                                $line->reply();
                                                $line->RichMenuLink('richmenu-dbc2057b3ca0b8f065d799ae02ce095a', $line->LineMessageData_Member[0]['propertyA']); //等待其他玩家加入中...
                                            }
                                        } else {
                                            $line->text('格式錯誤，請輸入一組4個數字作為謎底，每個數字皆從0~9隨機選擇，且不重複。');
                                        }
                                    } else if ($this->Mode == 'Start') {
                                        $line->text('請輸入謎底')->reply();
                                    }
                                } else if ($this->Mode == 'Start') {
                                    $PlayFlag = true;
                                    $CheckUnlinkRMFlag = true;
                                    if (empty($UserReply)) {
                                        $ResetContentFlag = true;
                                        $PushGameStartFlag = true;
                                    }
                                }
                                break;
                            case 'DoubleBattle(_)System':
                                if ($this->Mode == 'Start') {
                                    $PlayFlag = true;
                                    $CheckUnlinkRMFlag = true;
                                    if (empty($UserReply)) {
                                        $ResetContentFlag = true;
                                        $PushGameStartFlag = true;
                                    }
                                }
                                break;
                            case 'Multiplayer':
                                if ($this->Mode == 'Start') {
                                    $PlayFlag = true;
                                    $CheckUnlinkRMFlag = true;
                                    if (empty($UserReply)) {
                                        $ResetContentFlag = true;
                                        $PushGameStartFlag = true;
                                    }
                                }
                                break;
                        }
                        if ($CheckUnlinkRMFlag && $line->events['postback']['data'] == 'BOT(_)PlayGame(_)Start') {
                            $line->RichMenuUnlink($line->LineMessageData_Member[0]['propertyA']);
                        }
                        if ($ResetContentFlag) {
                            $content = array(
                                "BOT_Type" => $this->Type,
                                "BOT_Model" => $this->Model,
                                "BOT_Action" => $this->Action,
                                "BOT_Data" => $this->Data,
                                "BOT_Box" => '',
                                "BOT_Mode" => $this->Mode,
                                "BOT_Date" => $line->LineMessageDB_Membe->getNowTime(),
                                "BOT_ID" => $RoomId,
                            );
                            $line->LineMessageDB_Membe
                                ->SetAction('update')
                                ->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                                ->SetValue('content', json_encode($content))
                                ->BuildQuery();
                        }
                        if ($PushGameStartFlag) {
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
                            $line->SetMessageObject($line->FLEX_Message('[' . $this->Action . '] 遊戲開始', $Flex));
                        }
                        if ($PlayFlag && !empty($UserReply)) {
                            if (mb_strlen($UserReply, "utf-8") == 4 && preg_match("/^[0-9]{4}/", $UserReply)) {
                                if ($this->Data == 'DoubleBattle(_)Self' || $this->Data == 'DoubleBattle(_)System') {
                                    $MateMember = $line->LineMessageDB_Membe->SetAction('select')
                                        ->SetWhere("content LIKE '%\"BOT_ID\":\"" . $RoomId . "\"%'")
                                        ->SetWhere("id!='" . $line->LineMessageData_Member[0]['id'] . "'")
                                        ->BuildQuery();
                                }
                                if ($this->Data == 'DoubleBattle(_)Self') {
                                    $Answer = $MateMember[0]['content']['BOT_Model'];
                                } else {
                                    $Answer = $this->Model;
                                }
                                $Box = $this->Box ? $this->Box : array();
                                // 判斷 幾A幾B
                                $readArr = str_split($UserReply, 1); // cast to array
                                $numArr = str_split($Answer, 1);
                                $aval = 0; // 幾A
                                $bval = 0; // 幾B
                                $NumContents = array();
                                for ($i = 0; $i < 4; $i++) {
                                    if ($readArr[$i] == $numArr[$i]) {
                                        $aval++;
                                        unset($readArr[$i], $numArr[$i]);
                                    }
                                }
                                $bval = count(array_intersect($readArr, $numArr));
                                $Result = "";
                                $Result .= ($aval > 0 || $bval == 0) ? $aval . "A" : "";
                                $Result .= ($bval > 0 || $aval == 0) ? $bval . "B" : "";

                                $Box[] = array(
                                    $UserReply => $Result,
                                );
                                $content = array(
                                    "BOT_Type" => "PlayGame",
                                    "BOT_Model" => $this->Model,
                                    "BOT_Action" => '1A2B',
                                    "BOT_Data" => $this->Data,
                                    "BOT_Box" => $Box,
                                    "BOT_Mode" => $this->Mode,
                                    "BOT_Date" => $line->LineMessageDB_Membe->getNowTime(),
                                    "BOT_ID" => $RoomId,
                                );

                                $NumContents = array();
                                foreach ($Box as $dkey => $dvalue) {
                                    // 判斷 幾A幾B
                                    $readArr = str_split(array_keys($dvalue)[0], 1); // cast to array
                                    $numArr = str_split($Answer, 1);
                                    $aval = 0; // 幾A
                                    $bval = 0; // 幾B
                                    $NumContentsChild = array();
                                    for ($i = 0; $i < 4; $i++) {
                                        $backgroundColor = '#787c7e';
                                        $nowNum = $readArr[$i];
                                        if ($readArr[$i] == $numArr[$i]) {
                                            $backgroundColor = '#6aaa64';
                                            $aval++;
                                            unset($readArr[$i], $numArr[$i]);
                                        }
                                        $NumContentsChild[] = array(
                                            'type' => 'box',
                                            'layout' => 'vertical',
                                            'backgroundColor' => $backgroundColor,
                                            'contents' => array(
                                                array(
                                                    'type' => 'text',
                                                    'weight' => 'bold',
                                                    'size' => '4xl',
                                                    'align' => 'center',
                                                    'text' => $nowNum,
                                                    'color' => '#ffffff',
                                                ),
                                            ),
                                        );
                                    }
                                    foreach (array_intersect($readArr, $numArr) as $key => $value) {
                                        $NumContentsChild[$key]['backgroundColor'] = '#c9b458';
                                        $bval++;
                                    }
                                    if ($UserReply == $Answer) {
                                        $NumContents[] = array(
                                            'type' => 'box',
                                            'layout' => 'horizontal',
                                            'spacing' => 'sm',
                                            'margin' => 'md',
                                            'contents' => $NumContentsChild,
                                        );
                                    } else {
                                        $AB_Contnents = array();
                                        if ($aval > 0 || $bval == 0) {
                                            $AB_Contnents[] = array(
                                                'type' => 'span',
                                                'text' => strval($aval),
                                                'color' => ($aval > 0) ? '#007bff' : '#dc3545',
                                            );
                                            $AB_Contnents[] = array(
                                                'type' => 'span',
                                                'text' => 'A',
                                            );
                                        }
                                        if ($bval > 0 || $aval == 0) {
                                            $AB_Contnents[] = array(
                                                'type' => 'span',
                                                'text' => strval($bval),
                                                'color' => ($bval > 0) ? '#007bff' : '#dc3545',
                                            );
                                            $AB_Contnents[] = array(
                                                'type' => 'span',
                                                'text' => 'B',
                                            );
                                        }
                                        $NumContents[] = array(
                                            'type' => 'box',
                                            'layout' => 'horizontal',
                                            'spacing' => 'sm',
                                            'margin' => 'md',
                                            'contents' => array(
                                                array(
                                                    'type' => 'box',
                                                    'layout' => 'vertical',
                                                    'contents' => array(
                                                        array(
                                                            'type' => 'text',
                                                            'weight' => 'bold',
                                                            'size' => 'lg',
                                                            'align' => 'center',
                                                            'text' => strval(array_keys($dvalue)[0]),
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
                                                            'size' => 'lg',
                                                            'contents' => $AB_Contnents,
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        );
                                    }
                                }
                                if ($UserReply == $Answer) {
                                    $RemarkBox = array(
                                        'type' => 'box',
                                        'layout' => 'vertical',
                                        'contents' => array(
                                            array(
                                                'type' => 'separator',
                                                'color' => '#787c7e',
                                                'margin' => 'md',
                                            ),
                                            array(
                                                'type' => 'text',
                                                'text' => '恭喜答對，答案是[ ' . $Answer . ' ]，總共花了' . count($Box) . '次',
                                                'margin' => 'md',
                                                'wrap' => true,
                                            ),
                                        ),
                                    );
                                } else {
                                    $RemarkBox = array();
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
                                                        'text' => '1',
                                                        'color' => '#787c7e',
                                                    ),
                                                    array(
                                                        'type' => 'text',
                                                        'weight' => 'bold',
                                                        'size' => '5xl',
                                                        'align' => 'center',
                                                        'text' => 'A',
                                                        'color' => '#6aaa64',
                                                    ),
                                                    array(
                                                        'type' => 'text',
                                                        'weight' => 'bold',
                                                        'size' => '5xl',
                                                        'align' => 'center',
                                                        'text' => '2',
                                                        'color' => '#787c7e',
                                                    ),
                                                    array(
                                                        'type' => 'text',
                                                        'weight' => 'bold',
                                                        'size' => '5xl',
                                                        'align' => 'center',
                                                        'text' => 'B',
                                                        'color' => '#c9b458',
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
                                            $RemarkBox,
                                        ))),
                                    ),
                                );
                                $line->SetMessageObject($line->FLEX_Message($Result, $Flex));
                                $SaveFlag = false;
                                if ($UserReply == $Answer) {
                                    $CheckRoom = $SQL_PlayGame->SetAction('select')
                                        ->SetWhere("next='" . $this->Action . "'") //房間遊戲
                                        ->SetWhere("propertyA='" . $RoomId . "'") //房間Id(rand)
                                        ->BuildQuery();
                                    switch ($this->Data) {
                                        case 'SelfChallenge':
                                            $SaveFlag = true;
                                            $content_sql = "";
                                            break;
                                        case 'DoubleBattle(_)Self':
                                        case 'DoubleBattle(_)System':
                                            if ($MateMember[0]['content']['BOT_Mode'] == 'End') {
                                                $SaveFlag = true;
                                                $content_sql = "";
                                                $TryCtnBox = array();
                                                $TryCtnBox[$line->LineMessageData_Member[0]['id']] = count($Box);
                                                $TryCtnBox[$MateMember[0]['id']] = count($MateMember[0]['content']['BOT_Box']);
                                                $line->LineMessageDB_Membe
                                                    ->SetAction('update')
                                                    ->SetWhere("id='" . $MateMember[0]['id'] . "'")
                                                    ->SetValue('content', $content_sql)
                                                    ->BuildQuery();
                                            } else {
                                                $SaveFlag = true;
                                                $content['BOT_Mode'] = 'End';
                                                $content_sql = json_encode($content);
                                            }
                                            break;
                                        case 'Multiplayer':
                                            $RoomMembers = $line->LineMessageDB_Membe->SetAction('select')
                                                ->SetWhere("content LIKE '%\"BOT_ID\":\"" . $RoomId . "\"%'")
                                                ->SetWhere("id!='" . $line->LineMessageData_Member[0]['id'] . "'")
                                                ->BuildQuery();
                                            if (!empty($RoomMembers)) {
                                                $EndCtn = 0;
                                                $TryCtnBox = array();
                                                foreach ($RoomMembers as $key => $value) {
                                                    if ($value['content']['BOT_Mode'] == 'End') {
                                                        $TryCtnBox[$value['id']] = count($value['content']['BOT_Box']);
                                                        $EndCtn++;
                                                    }
                                                }
                                                if ($EndCtn != count($RoomMembers)) {
                                                    unset($FinalBox);
                                                    $SaveFlag = true;
                                                    $content['BOT_Mode'] = 'End';
                                                    $content_sql = json_encode($content);
                                                } else {
                                                    $TryCtnBox[$line->LineMessageData_Member[0]['id']] = count($Box);
                                                    $SaveFlag = true;
                                                    $content_sql = "";
                                                    $line->LineMessageDB_Membe
                                                        ->SetAction('update')
                                                        ->SetWhere("content LIKE '%\"BOT_ID\":\"" . $RoomId . "\"%'")
                                                        ->SetWhere("id!='" . $line->LineMessageData_Member[0]['id'] . "'")
                                                        ->SetValue('content', $content_sql)
                                                        ->BuildQuery();
                                                }
                                            }
                                            break;
                                    }

                                    $SQL_PlayGame->SetAction('update')
                                        ->SetWhere("id='" . $CheckRoom[0]['id'] . "'")
                                        ->SetValue("viewA", 'End', !empty($TryCtnBox) ? 1 : 0) //房間狀態，[遊戲室內所有玩家 皆已完成遊戲]
                                        ->SetValue("content", json_encode(array(
                                            "TryCtn" => $TryCtnBox,
                                        ))) //房間各玩家狀態
                                        ->BuildQuery();
                                    $actions = array();
                                    $actions[] = $line->messageObject('postback', '排行榜', 'BOT(_)PlayGame(_)1A2B(_)Leaderboard(_)' . $RoomId);
                                    $line->buttons(NULL, '排行榜', $title = '排行榜', NULL, $actions);
                                } else if ($UserReply != $Answer) {
                                    $SaveFlag = true;
                                    $content_sql = json_encode($content);
                                }
                                if ($SaveFlag) {
                                    $line->LineMessageDB_Membe
                                        ->SetAction('update')
                                        ->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                                        ->SetValue('content', $content_sql)
                                        ->BuildQuery();
                                }
                            } else {
                                $line->text('格式錯誤，請輸入一組4個數字作為謎底，每個數字皆從0~9隨機選擇，且不重複。');
                            }
                        }
                        if (count($line->action['data']) > 0) {
                            $line->reply();
                        }
                        break;
                }
                break;
            case 'CreateCard':
                $questionList = $this->Box;
                $NowQuestion = $this->Model;
                $AnswerList = $this->Data ? $this->Data : array();
                $NowAnser = $line->events['message']['text'];
                $CardActions = !empty($this->Action['subject']['actions']) ? json_decode($this->Action['subject']['actions'], true) : array();
                $Limit = 0;
                if ($CardActions) {
                    foreach ($CardActions as $actionKey => $actionVal) {
                        if ($actionVal['question'] == ($NowQuestion - 1)) {
                            $Limit += $actionVal['limit'];
                        }
                    }
                }
                if (mb_strlen($line->events['message']['text'], "utf-8") <= $Limit) {
                    $AnswerList[] = $NowAnser;
                    if ($questionList[$NowQuestion]) {
                        $content = array(
                            "BOT_Type" => "CreateCard",
                            "BOT_Model" => $NowQuestion + 1,
                            "BOT_Action" => $this->Action,
                            "BOT_Data" => $AnswerList,
                            "BOT_Box" => $questionList,
                            "BOT_Mode" => '',
                            "BOT_Date" => date('Y-m-d H:i:s'),
                            "BOT_ID" => $this->ID,
                        );
                        $line->LineMessageDB_Membe
                            ->SetAction('update')
                            ->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                            ->SetValue('content', json_encode($content))
                            ->BuildQuery();
                        $line->text($questionList[$NowQuestion])->reply();
                    } else {
                        $this->Data = $AnswerList;
                        include_once __LineMessageApi . '/lib/Lib_CreateCard.php';
                        Lib_CreateCard($line, $this);
                    }
                } else {
                    $line->text('請重新輸入(' . $Limit . '個字)')->reply();
                }
                break;
            case 'FillForm':
                $questionList = $this->Box;
                $NowQuestion = $this->Model;
                $AnswerList = $this->Data ? $this->Data : array();

                $Verify = false;
                $errorMsg = '';
                switch ($line->events['type']) {
                    case 'message':
                        switch ($line->events['message']['type']) {
                            case 'text':
                                $NowAnser = $line->events['message']['text'];
                                switch ($questionList[$NowQuestion - 1]['type']) {
                                    case 'text':
                                        $Verify = true;
                                        break;
                                    case 'number':
                                        if (is_numeric($NowAnser)) {
                                            $Verify = true;
                                        } else {
                                            $errorMsg = '格式有誤，請輸入數字';
                                        }
                                        break;
                                    case 'phone':
                                        if (preg_match("/^09[0-9]{8}$/", $NowAnser)) { //台灣手機格式
                                            $Verify = true;
                                        } else {
                                            $errorMsg = '格式有誤，請輸入手機';
                                        }
                                        break;
                                    case 'email':
                                        if (preg_match("/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/", $NowAnser)) {
                                            $Verify = true;
                                        } else {
                                            $errorMsg = '格式有誤，請輸入信箱';
                                        }
                                        break;
                                    case 'image':
                                        $errorMsg = '請上傳照片';
                                        break;
                                    case 'video':
                                        $errorMsg = '請上傳影片';
                                        break;
                                    case 'audio':
                                        $errorMsg = '請上傳語音';
                                        break;
                                    case 'file':
                                        $errorMsg = '請上傳檔案';
                                        break;
                                    case 'date':
                                    case 'time':
                                    case 'datetime':
                                    case 'location':
                                    case 'radio':
                                    case 'checkbox':
                                    case 'select':
                                        $errorMsg = '請選擇答案選項';
                                        break;
                                }
                                break;
                            case 'location':
                                $Verify = true;
                                $NowAnser = array(
                                    'address' => $line->events['message']['address'],
                                    'latitude' => $line->events['message']['latitude'],
                                    'longitude' => $line->events['message']['longitude']
                                );
                                break;
                            default:
                                switch ($questionList[$NowQuestion - 1]['type']) {
                                    case 'text':
                                    case 'number':
                                    case 'phone':
                                    case 'email':
                                        $errorMsg = '格式有誤，請輸入文字';
                                        break;
                                    case 'image':
                                        if ($line->events['message']['type'] == 'image') {
                                            $Verify = true;
                                            $NowAnser = $line->events['message']['id'];
                                        } else {
                                            $errorMsg = '請上傳照片';
                                        }
                                        break;
                                    case 'video':
                                        if ($line->events['message']['type'] == 'video') {
                                            $Verify = true;
                                            $NowAnser = $line->events['message']['id'];
                                        } else {
                                            $errorMsg = '請上傳影片';
                                        }
                                        break;
                                    case 'audio':
                                        if ($line->events['message']['type'] == 'audio') {
                                            $Verify = true;
                                            $NowAnser = $line->events['message']['id'];
                                        } else {
                                            $errorMsg = '請上傳語音';
                                        }
                                        break;
                                    case 'file':
                                        if ($line->events['message']['type'] == 'file') {
                                            $Verify = true;
                                            $NowAnser = $line->events['message']['id'];
                                        } else {
                                            $errorMsg = '請上傳檔案';
                                        }
                                        break;
                                    case 'date':
                                    case 'time':
                                    case 'datetime':
                                    case 'location':
                                    case 'radio':
                                    case 'checkbox':
                                    case 'select':
                                        $errorMsg = '請選擇答案選項';
                                        break;
                                }
                                break;
                        }
                        break;
                    case 'postback':
                        $postback_query = explode('(_)', $line->events['postback']['data']);
                        $postback_bot = $postback_query[0];
                        $postback_func = $postback_query[1];
                        $postback_action = $postback_query[2];
                        $postback_data = $postback_query[3];
                        switch ($questionList[$NowQuestion - 1]['type']) {
                            case 'date':
                            case 'time':
                            case 'datetime':
                                $Verify = true;
                                $NowAnser = $line->events['postback']['params'][$questionList[$NowQuestion - 1]['type']];
                                break;
                            case 'radio':
                            case 'checkbox':
                            case 'select':
                                $Verify = true;
                                $NowAnser = $postback_action;
                                break;
                            case 'image':
                                $errorMsg = '請上傳照片';
                                break;
                            case 'video':
                                $errorMsg = '請上傳影片';
                                break;
                            case 'audio':
                                $errorMsg = '請上傳語音';
                                break;
                            case 'file':
                                $errorMsg = '請上傳檔案';
                                break;
                            case 'text':
                            case 'number':
                            case 'phone':
                            case 'email':
                                $errorMsg = '格式有誤，請輸入文字';
                                break;
                        }
                        break;
                    default:
                        switch ($questionList[$NowQuestion - 1]['type']) {
                            case 'text':
                            case 'number':
                            case 'phone':
                            case 'email':
                                $errorMsg = '格式有誤，請輸入文字';
                                break;
                            case 'image':
                                $errorMsg = '請上傳照片';
                                break;
                            case 'video':
                                $errorMsg = '請上傳影片';
                                break;
                            case 'audio':
                                $errorMsg = '請上傳語音';
                                break;
                            case 'file':
                                $errorMsg = '請上傳檔案';
                                break;
                            case 'date':
                            case 'time':
                            case 'datetime':
                            case 'location':
                            case 'radio':
                            case 'checkbox':
                            case 'select':
                                $errorMsg = '請選擇答案選項';
                                break;
                        }
                        break;
                }

                $FELX = new FELX();
                $AnswerList[] = $NowAnser;
                $NowQuestionCtn = ($Verify) ? $NowQuestion : ($NowQuestion - 1);
                if ($questionList[$NowQuestionCtn]) {
                    switch ($questionList[$NowQuestionCtn]['type']) {
                        case 'date':
                        case 'time':
                        case 'datetime':
                            switch ($questionList[$NowQuestionCtn]['type']) {
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
                                        "mode" => $questionList[$NowQuestionCtn]['type'],
                                        "initial" => "",
                                        "max" => "",
                                        "min" => "",
                                    ),
                                ),
                            );
                            $AnswerAlt = '請' . $label;
                            break;
                        case 'location':
                            $AnswerAlt = '請選擇位置';
                            $QuestionBubbleQuickReply = array(
                                array(
                                    "action" => array(
                                        "type" => "location",
                                        "label" => $AnswerAlt,
                                    ),
                                ),
                            );
                            break;
                        case 'radio':
                            $QuestionBubbleQuickReply = array();
                            if ($questionList[$NowQuestionCtn]['option']) {
                                $optionList = explode(',', $questionList[$NowQuestionCtn]['option']);
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
                        case 'select':
                        case 'checkbox':
                            if ($questionList[$NowQuestionCtn]['option']) {
                                $liffUrl = 'https://liff.line.me/' . __LIFF_ANSWER__ID;
                                $QuestionBubbleQuickReply = array([
                                    "action" => array(
                                        "type" => "uri",
                                        "label" => "請選擇",
                                        "uri" => $liffUrl . "?type=" . $questionList[$NowQuestionCtn]['type'] . "&option=" . urlencode($questionList[$NowQuestionCtn]['option']),
                                    ),
                                ]);
                            }
                            $AnswerAlt = '請選擇你的答案';
                            break;
                        default:
                            switch ($questionList[$NowQuestionCtn]['type']) {
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
                        'Title' => $this->Action['subject']['subject'],
                        'QuestionNo' => $NowQuestionCtn,
                        'Question' => $questionList[$NowQuestionCtn]['question'],
                        'Answer' => $AnswerAlt,
                    );
                    if ($Verify) {
                        $line->SetMessageObject($FELX->FELX_Question($QuestionBubbleVal['Question'], $QuestionBubbleVal, $QuestionBubbleQuickReply))->reply();
                    }
                } else {
                    if ($AnswerList) {
                        $QueryArray = array();
                        foreach ($AnswerList as $key => $answer) {
                            switch ($questionList[$key]['type']) {
                                case 'location':
                                    $answer = $answer['address']; // . '('. $answer['latitude'].','.$answer['longitude'] .')'
                                    break;
                            }
                            $QueryArray[] = array(
                                'Question' => $questionList[$key]['question'],
                                'Answer' => $answer,
                            );
                        }
                        $FLEX_ITEM = array(
                            'altText' => '確認問卷',
                            'TitleText' => $this->Action['subject']['subject'],
                        );
                        if ($Verify) {
                            $line->SetMessageObject($FELX->FELX_FinalConfirm($FLEX_ITEM, $QueryArray))->reply();
                        }
                    }
                }

                if ($Verify) {
                    $content = array(
                        "BOT_Type" => "FillForm",
                        "BOT_Model" => $NowQuestionCtn + 1, //$NowQuestionCtn
                        "BOT_Action" => $this->Action,
                        "BOT_Data" => $AnswerList,
                        "BOT_Box" => $questionList,
                        "BOT_Mode" => '',
                        "BOT_Date" => date('Y-m-d H:i:s'),
                        "BOT_ID" => $this->ID,
                    );
                    $line->LineMessageDB_Membe
                        ->SetAction('update')
                        ->SetWhere("id='" . $line->LineMessageData_Member[0]['id'] . "'")
                        ->SetValue('content', json_encode($content))
                        ->BuildQuery();
                } else {
                    $line->text($errorMsg);
                    $LastMsg = count($line->action['data']) - 1;
                    if (!empty($QuestionBubbleQuickReply)) {
                        $line->action['data'][$LastMsg]['quickReply'] = array(
                            "items" => $QuestionBubbleQuickReply
                        );
                    }
                    $line->reply();
                }
                break;
            case 'LoginInvoice':
                switch ($line->events['type']) {
                    case 'message':
                        switch ($line->events['message']['type']) {
                            case 'text':
                                $ErrorMsg = '發票資訊有誤，請重新輸入';
                                $qrcode_text = $line->events['message']['text'];
                                break;
                            case 'image':
                                $ErrorMsg = '發票資訊有誤，請重新上傳照片';
                                $messageUrl = __CustomStickers_Web . '/ft/img/contentId/' . $line->events['message']['id'];
                                if (!is_dir(__ROOT_UPLOAD . "/contentId/")) {
                                    mkdir(__ROOT_UPLOAD . "/contentId/", 0777);
                                }
                                $_FilePath = "/contentId/" . $line->events['message']['id'] . '.jpg';
                                file_put_contents(__ROOT_UPLOAD . $_FilePath, file_get_contents($messageUrl));
                                $imgUrl =  __WEB_UPLOAD . $_FilePath;

                                /*
                                 * http://goqr.me/api/doc/read-qr-code/
                                 * https://manage.qrserver.com/plans
                                 */
                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => 'http://api.qrserver.com/v1/read-qr-code/?fileurl=' . $imgUrl,
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 30,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "GET",
                                ));
                                $err = curl_error($curl);
                                $response = !empty($err) ? $err : curl_exec($curl);
                                $_state = json_decode($response, true);
                                curl_close($curl);

                                if (1 && $_state[0]['type']==='qrcode' && !empty($_state[0]['symbol'][0]['data'])) {
                                    $qrcode_text = htmlspecialchars($_state[0]['symbol'][0]['data']);
                                    if (!(substr($qrcode_text, 0, 2) != '**' && strlen($qrcode_text) >= 77)) {
                                        $qrcode_textTmp = explode('QR-Code:', $qrcode_text);
                                        $qrcode_text = $qrcode_textTmp[1];
                                    }
                                }

                                if (1 && file_exists(__ROOT_UPLOAD . $_FilePath)) {
                                    @unlink(__ROOT_UPLOAD . $_FilePath);
                                }
                                break;
                        }
                        break;
                    case 'postback':
                        $postback_query = explode('(_)', $line->events['postback']['data']);
                        $postback_bot = $postback_query[0];
                        $postback_func = $postback_query[1];
                        $postback_action = $postback_query[2];
                        $postback_data = $postback_query[3];
                        break;
                }
                if (!empty($qrcode_text) && substr($qrcode_text, 0, 2) != '**' && strlen($qrcode_text) >= 77 && substr($qrcode_text, 75, 2) == '==') {
                    $qrcode_text = substr($qrcode_text, 0, 77);
                    $invTermList = array(
                        "01" => "02",
                        "02" => "02",
                        "03" => "04",
                        "04" => "04",
                        "05" => "06",
                        "06" => "06",
                        "07" => "08",
                        "08" => "08",
                        "09" => "10",
                        "10" => "10",
                        "11" => "12",
                        "12" => "12",
                    );
                    $item = array(
                        "invNum" => substr($qrcode_text, 0, 10), //兩位英文字母+八位數字
                        "invDate" => substr($qrcode_text, 10, 7), //發票開立日期(年月日) (7碼)
                        "invTerm" => substr($qrcode_text, 10, 3) . $invTermList[substr($qrcode_text, 13, 2)], //發票期別
                        "randomNumber" => substr($qrcode_text, 17, 4), //四位隨機碼(4碼)--四位英數字
                        "price" => substr($qrcode_text, 21, 8), //銷售額(8碼)--大於等於0
                        "totalPrice" => substr($qrcode_text, 29, 8), //總計金額(8碼)–大於0
                        "buyerBan" => substr($qrcode_text, 37, 8), //發票買方統一編號(8碼)–買受人為一般消費者時，填00000000
                        "sellerID" => substr($qrcode_text, 45, 8), //發票開立賣方統一編號(8碼)–即銷售店統一編號
                        "encrypt" => substr($qrcode_text, 53, 24), //加密驗證資訊(24 碼)
                    );
                    include_once(__CORE . "/class/kEinvoice.php");
                    $kEinvoice = new kEinvoice();
                    $qryInvDetail = $kEinvoice->qryInvDetail(array(
                        'invNum' => $item['invNum'], //*必填，發票號碼
                        'invTerm' => $item['invTerm'], //*必填，年份(民國)月份
                        'randomNumber' => $item['randomNumber'], //*必填，隨機碼
                    ));
                    if ($qryInvDetail['code'] == 200) {
                        if (empty($qryInvDetail['invDate'])) {
                            $line->text($qryInvDetail['invStatus']);
                        } else {
                            $qryInvDetail['invTerm'] = $item['invTerm'];
                            $qryInvDetail['randomNumber'] = $item['randomNumber'];
                            $qryInvDetail['buyerBan'] = $item['buyerBan'];
                            $qryInvDetail['encrypt'] = $item['encrypt'];
                            $qryInvDetail['QrCode'] = $kEinvoice->TurnQrCode($qryInvDetail);
                            $FELX = new FELX();
                            $title = '電子發票證明聯';
                            $line->SetMessageObject($FELX->FLEX_SendMessage($title, $FELX->FLEX_Receipt($qryInvDetail)));
                        }
                        $line->reply();
                    } else {
                        $line->text($qryInvDetail['msg']);
                        $line->reply();
                    }
                } else {
                    $line->text($ErrorMsg);
                    $line->reply();
                }
                if (0) {
                    $line->Clear_BOTFlash();
                }
                break;
            default:
                //$line->text('default '.$this->Type)->reply();
                break;
        }
    }
}
