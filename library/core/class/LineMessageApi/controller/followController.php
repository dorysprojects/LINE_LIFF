<?php

if($line->events['type'] == 'follow'){
    if($line->LineMessageData_Member[0]['content']['BOT_Type']==='WaitFollow'){
        switch ($line->LineMessageData_Member[0]['content']['BOT_Model']) {
            case 'GroupRobot':
                $SQL_GroupRobot = new kSQL('GroupRobot');
                switch ($line->LineMessageData_Member[0]['content']['BOT_Action']) {
                    case 'Vote':
                        $GroupList = $SQL_GroupRobot->SetAction('select')
                                                    ->SetWhere("tablename='GroupRobot'")
                                                    ->SetWhere("next='myself'")
                                                    ->SetWhere("viewA='on'")
                                                    ->SetWhere("propertyD <= '". date('Y-m-d') ."'")
                                                    ->SetWhere("propertyE >= '". date('Y-m-d') ."'")
                                                    ->SetOrder("id DESC")
                                                    ->SetLimit(1)
                                                    ->BuildQuery();
                        if(!empty($GroupList[0])){
                            $SQL_LineMember = new kSQL('LineMember');
                            $GetVoteMember = $SQL_LineMember->SetAction('select')
                                                            ->SetWhere("tablename='member'")
                                                            ->SetWhere("prev='line'")
                                                            ->SetWhere("next='myself'")
                                                            ->SetWhere("propertyA='". $GetVote[0]['propertyB'] ."'")//得票者
                                                            ->BuildQuery();
                            $InsertVoteState = $SQL_GroupRobot->SetAction('insert')
                                                                ->SetValue("prev", $GroupList[0]['id'])
                                                                ->SetValue("next", 'vote')
                                                                ->SetValue("propertyA", $line->events['source']['userId'])//投票者
                                                                ->SetValue("propertyB", $GetVoteMember[0]['propertyB'])//得票者
                                                                ->SetValue("create_at", $SQL_GroupRobot->getNowTime())
                                                                ->SetValue("update_at", $SQL_GroupRobot->getNowTime())
                                                                ->BuildQuery();
                            //得票者貼標
                            if(!empty($GroupList[0]['sortB'])){
                                kCore_Tag('SelectAndUpdate', array(
                                    "id" => $GroupList[0]['sortB'],
                                    "userId" => $GetVoteMember[0]['propertyB'],//得票者
                                ));
                            }
                            //投票者貼標
                            if(!empty($GroupList[0]['sortC'])){
                                kCore_Tag('SelectAndUpdate', array(
                                    "id" => $GroupList[0]['sortC'],
                                    "userId" => $line->events['source']['userId'],//投票者
                                ));
                            }
                            $VoteSuccess = $GroupList[0]['content']['VoteSuccess'] ? preg_replace("/\(Nickname\)/", $GetVoteMember[0]['subject']['displayName'], $GroupList[0]['content']['VoteSuccess']) : '已成功投票給【'.$GetVoteMember[0]['subject']['displayName'].'】';//得票者
                            $GetVote = $GroupList[0]['content']['GetVote'] ? preg_replace("/\(Nickname\)/", $line->LineMessageData_Member[0]['subject']['displayName'], $GroupList[0]['content']['GetVote']) : '【'.$line->LineMessageData_Member[0]['subject']['displayName'].'】在揪團活動「'.$GroupList[0]['subject']['subject'].'」投票給你';
                            
                            $FELX = new FELX();
                            $title = '投票完成通知';
                            $Val = array(
                                "type" => "success",
                                "title" => "投票成功",
                                "text" => $VoteSuccess,
                            );
                            $line->SetMessageObject($FELX->FLEX_SendMessage($title, $FELX->FLEX_Alert($Val)))->reply();
                            if(0){
                                $title = '得票通知';
                                $Val = array(
                                    "type" => "success",
                                    "title" => "獲得一票",
                                    "text" => $GetVote,
                                );
                                $line->SetMessageObject($FELX->FLEX_SendMessage($title, $FELX->FLEX_Alert($Val)))->push($GetVoteMember[0]['propertyA']);
                            }
                        }
                        break;
                    case 'Invite':
                        $message = '{"events":[{"type":"message","replyToken":"' . $line->events['replyToken'] . '","source":{"userId":"' . $line->events['source']['userId'] . '","type":"user"},"timestamp":' . $line->events['timestamp'] . ',"message":{"type":"text","id":"WaitFollow","text":"' . $SQL_GroupRobot->SystemRow[0]['propertyC'] . '"}}]}';
                        exec("nohup /usr/bin/php " . __CustomStickers . "/config/LineFakeWebhook.php " . json_encode($message) . " >/dev/null 2>&1 &", $Webhooks_Output, $Webhooks_Var);
                        break;
                }
                $line->Clear_BOTFlash();
                break;
            default:
                break;
        }
    }else{
        $SQL_SystemMessage = new kSQL('SystemMessage');
        $FollowMsg = $SQL_SystemMessage->SetAction('select')
                    ->SetWhere("tablename='SystemMessage'")
                    ->SetWhere("next='FollowMsg'")
                    ->SetWhere("viewA='on'")
                    ->BuildQuery();
        if($FollowMsg[0]){
            $line->SetMessages($FollowMsg[0]);
            $line->reply();
        }
    }
}

?>