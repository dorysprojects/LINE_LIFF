<?php

//引入xajax函式庫
include_once __PLUGIN . '/xajax/xajax_core/xajax.inc.php';
$xajax = new xajax();  //建立物件
$xajax->configure('javascript URI', __PLUGIN_Web . '/xajax/');  //設定路徑

$xajax->register(XAJAX_FUNCTION, 'CheckAndSaveProfile');
$xajax->register(XAJAX_FUNCTION, 'Process');
$xajax->register(XAJAX_FUNCTION, 'CheckFollow');
$xajax->register(XAJAX_FUNCTION, 'CheckNotify');
$xajax->register(XAJAX_FUNCTION, 'AddNotify');
$xajax->register(XAJAX_FUNCTION, 'StickerSend');
$xajax->register(XAJAX_FUNCTION, 'StickerSendMedia');
$xajax->register(XAJAX_FUNCTION, 'AddFavorite');
$xajax->register(XAJAX_FUNCTION, 'Delete');
$xajax->register(XAJAX_FUNCTION, 'AddMessage');
$xajax->register(XAJAX_FUNCTION, 'AddFlex');

$xajax->register(XAJAX_FUNCTION, 'SaveQuestion');

$xajax->register(XAJAX_FUNCTION, 'Vote');

$xajax->register(XAJAX_FUNCTION, 'search');
$xajax->register(XAJAX_FUNCTION, 'SavePlace');
$xajax->register(XAJAX_FUNCTION, 'updatePlace');
$xajax->register(XAJAX_FUNCTION, 'deletePlace');
$xajax->register(XAJAX_FUNCTION, 'DeleteTrip');
$xajax->register(XAJAX_FUNCTION, 'SaveTrip');
$xajax->register(XAJAX_FUNCTION, 'CopyTrip');
$xajax->register(XAJAX_FUNCTION, 'SaveRemark');
$xajax->register(XAJAX_FUNCTION, 'SaveInfo');

$xajax->register(XAJAX_FUNCTION, 'Session');

$xajax->processRequest();  //處理回應

function CheckAndSaveProfile($ProfileArray=NULL){
    $objResponse = new xajaxResponse();

    $ProfileObject = json_decode(json_encode($ProfileArray));//[目前profile]
    $_LineLiffProfile = $_SESSION[__DOMAIN.'_LineLiffProfile'];//[暫存profile]

    //檢查[目前profile]是否與[暫存profile]相同
    $ProfileChangedFlag = false;
    if($ProfileObject && $_LineLiffProfile){
        foreach ($ProfileObject as $_key => $_value) {
            if($ProfileObject->$_key != $_LineLiffProfile->$_key){
                $ProfileChangedFlag = true;
            }
        }
    }

    //[目前profile]是否與[暫存profile]不相同，或無[暫存profile]
    if($ProfileChangedFlag || !$_LineLiffProfile){
        $_SESSION[__DOMAIN.'_LineLiffProfile'] = $ProfileObject;//儲存[暫存profile]
        $objResponse->script("location.reload();");//並重整
    }

    return $objResponse;
}

function Process($userId=NULL, $UrlMsgId=NULL, $UrlMsgAction=NULL, $UrlMsgUserId=NULL, $UrlMsgMode=NULL){
    $objResponse = new xajaxResponse();
    $line = new kLineMessaging();
    $FELX = new FELX();

    switch($UrlMsgId){
        case 'PlayGame':
            if($UrlMsgUserId){
                $SQL_PlayGame = new kSQL($UrlMsgId);
                $SQL_LineMember = new kSQL('LineMember');
                $CloseFlag = true;
                switch ($UrlMsgMode) {
                    case 'Invite(_)Multiplayer':
                    case 'Invite(_)DoubleBattle':
                    case 'Invite(_)DoubleBattle(_)Self':
                    case 'Invite(_)DoubleBattle(_)System':
                        $RoomMembers = $SQL_LineMember->SetAction('select')
                                                        ->SetWhere("content LIKE '%\"BOT_ID\":\"" . base64_decode($UrlMsgUserId) . "\"%'")
                                                        ->BuildQuery();

                        $CheckRoom = $SQL_PlayGame->SetAction('select')
                                ->SetWhere("next='". $UrlMsgAction ."'")//房間遊戲
                                ->SetWhere("propertyA='" . base64_decode($UrlMsgUserId) . "'")//房間Id(rand)
                                ->BuildQuery();
                        if(!empty($RoomMembers)){
                            $Owner = array();
                            $Self = array();
                            foreach ($RoomMembers as $key => $value) {
                                if(!empty($CheckRoom[0]) && $value['id']==$CheckRoom[0]['prev']){
                                    $Owner = $value;
                                }
                                if($value['propertyA'] == $userId){
                                    $Self = $value;
                                }
                            }
                            if(empty($Owner)){
                                $objResponse->script('alert("遊戲室不存在");');
                            }else if(count($RoomMembers)>=2 && empty($Self) && $UrlMsgMode!='Invite(_)Multiplayer'){
                                $objResponse->script('alert("遊戲室人數已達限制");');
                            }else if($userId==$Owner['propertyA']){
                                $objResponse->script('alert("無法邀請自己");');
                            }else{
                                $CloseFlag = false;
                                $SQL_LineMember->SetAction('update')
                                                ->SetWhere("propertyA='". $userId ."'")
                                                ->SetValue('content', json_encode(array(
                                                    'BOT_Type' => $Owner['content']['BOT_Type'],
                                                    "BOT_Model" => ($UrlMsgMode=='Invite(_)DoubleBattle(_)Self') ? '' : $Owner['content']['BOT_Model'],
                                                    "BOT_Action" => $Owner['content']['BOT_Action'],
                                                    "BOT_Data" => $Owner['content']['BOT_Data'],
                                                    "BOT_Box" => '',
                                                    "BOT_Mode" => '',
                                                    "BOT_Date" => date('Y-m-d H:i:s'),
                                                    "BOT_ID" => $Owner['content']['BOT_ID'],
                                                )))
                                                ->BuildQuery();
                                $line->RichMenuLink('richmenu-dbc2057b3ca0b8f065d799ae02ce095a', $userId);//等待其他玩家加入中...
                                if(empty($Owner['content']['BOT_Mode']) && $userId!=$Owner['propertyA']){
                                    $line->RichMenuLink('richmenu-d16c5f972897f1a071638c24948bb0fb', $Owner['propertyA']);//已有玩家加入
                                }
                                $objResponse->script('location.href="https://line.me/R/ti/p/@'. __LineAtID .'";');
                            }
                        }else{
                            $objResponse->script('alert("遊戲室不存在");');
                        }
                        break;
                    case 'DoubleBattle':
                    case 'DoubleBattle(_)Self':
                    case 'DoubleBattle(_)System':
                    case 'Multiplayer':
                        $Val = array(
                            "type" => "info",
                            "title" => "邀您一起玩遊戲",
                            "title-size" => "md",
                            "box-uri" => 'https://liff.line.me/'.__LIFF_URLMSG__ID.'?id='.$UrlMsgId.'&action='.$UrlMsgAction.'&mode=Invite(_)'.$UrlMsgMode.'&userId='.$UrlMsgUserId,
                            "image-width" => '55px',
                            "image-height" => '55px',
                            "bubble-size" => "micro",//micro
                        );
                        $line->SetMessageObject($FELX->FLEX_SendMessage('邀您一起玩遊戲', $FELX->FLEX_Alert($Val)));
                        break;
                }
                if(count($line->action['data']) > 0){
                    $objResponse->script('ShareMsg(' . json_encode($line->action['data']) . ', 1, 1);');
                }else if($CloseFlag){
                    $objResponse->script('liff.closeWindow();');
                }
            }
            break;
        default:
            $objResponse->script('liff.closeWindow();');
            break;
    }

    return $objResponse;
}

function CheckFollow($userId=NULL, $__LineAtID=NULL, $AddAction=NULL){
    $objResponse = new xajaxResponse();

    if($userId && $__LineAtID){
        $SQL_LineMember = new kSQL('LineMember');
        $GetMember = $SQL_LineMember->SetAction('select')->SetWhere("propertyA='". $userId ."'")->BuildQuery();
        switch ($AddAction) {
            case 'Invite':
                if($GetMember[0]['prev1']==='follow'){ //還沒加上每秒偵測一次
                    $objResponse->script('location.reload();');
                }else{
                    $content = array(
                        "BOT_Type" => "WaitFollow",
                        "BOT_Model" => 'GroupRobot',
                        "BOT_Action" => 'Invite',
                        "BOT_Data" => '',
                        "BOT_Box" => '',
                        "BOT_Mode" => '',
                        "BOT_Date" => $SQL_LineMember->getNowTime(),
                        "BOT_ID" => '',
                    );
                    $SQL_LineMember->SetAction('update')
                                    ->SetWhere("propertyA='". $userId ."'")
                                    ->SetValue('content', json_encode($content))
                                    ->BuildQuery();
                    $objResponse->script('location.href="https://line.me/R/ti/p/@'. $__LineAtID .'"');
                }
            default:
                if($GetMember[0]['prev1']==='follow'){
                    $objResponse->script('$("#AddFriendBtn").html("已成為好友，回到官方帳號");location.href="https://line.me/R/ti/p/@'. $__LineAtID .'"');
                }
                break;
        }
    }

    return $objResponse;
}

function CheckNotify($Context=null, $Profile=null){
    $objResponse = new xajaxResponse();

    if($Profile['userId']){
        $line = new kLineMessaging();
        $line->LineMemberProcess('liff', 'CheckNotify', $Profile);//投票者
    }

    $SQL_Notify = new kSQL('Notify');
    $SetNotify = true;
    $ID = $Context['userId'];
    switch ($Context['type']) {
        case "utou"://一對一
            $ID = $Context['utouId'];
            break;
        case "group"://群組
            $ID = $Context['groupId'];
            break;
        case "room"://聊天室
            $ID = $Context['roomId'];
            break;
        case "external"://網頁
        case "none"://其他
        default:
            $SetNotify = false;
            break;
    }
    if($SetNotify){
        $GetNotify = $SQL_Notify->SetAction('select')
                                ->SetWhere("tablename='Notify'")
                                ->SetWhere("next='". $Context['type'] ."'")
                                ->SetWhere("propertyA='". $Context['userId'] ."'")
                                ->BuildQuery();
        if(!$GetNotify[0]){
            $objResponse->script("$('#SetNotify').attr('data-type', '". $Context['type'] ."').attr('data-userId', '". $Context['userId'] ."').attr('data-ID', '". $ID ."').show();");
        }else{
            $objResponse->script("$('#SetNotify').attr('data-flag', 'on');");
        }
    }

    return $objResponse;
}

function AddNotify($type=NULL, $userId=NULL, $ID=NULL){
    $objResponse = new xajaxResponse();

    if($type && $userId && $ID){
        $SQL_Notify = new kSQL('Notify');
        $InsertNotify = $SQL_Notify->SetAction("insert")
                                    ->SetValue("next", $type)
                                    ->SetValue("propertyA", $userId)
                                    ->SetValue("propertyB", $ID)
                                    ->SetValue("create_at", $SQL_Notify->getNowTime())
                                    ->SetValue("update_at", $SQL_Notify->getNowTime())
                                    ->BuildQuery();
        if($InsertNotify){
            $objResponse->script("alert('通知設定完成');$('#SetNotify').attr('data-flag', 'on').hide();");
        }
    }

    return $objResponse;
}

function SaveQuestion($QuestionList=null){
    $objResponse = new xajaxResponse();

    if($QuestionList){
        $QuestionList = explode(',', $QuestionList);
        if($QuestionList){
            $SQL_SuperRatio = new kSQL('SuperRatio');
            $repeatList = array();
            $saveList = array();
            foreach ($QuestionList as $key => $question) {
                $ThisQuestion = $SQL_SuperRatio->SetAction('select')
                                                ->SetWhere("tablename='SuperRatio'")
                                                ->SetWhere("next='myself'")
                                                ->SetWhere("propertyA='". $question ."'")
                                                ->SetLimit(1)
                                                ->BuildQuery();
                if(!$ThisQuestion[0]){
                    $SaveState = $SQL_SuperRatio->SetAction('insert')
                                                ->SetValue("propertyA", $question)
                                                ->SetValue("create_at", $SQL_SuperRatio->getNowTime())
                                                ->SetValue("update_at", $SQL_SuperRatio->getNowTime())
                                                ->BuildQuery();
                    $saveList[] = $question;
                }else{
                    $repeatList[] = $question;
                }
            }
            $swalType = ($saveList) ? 'success' : 'error';
            $swalTitle = ($saveList) ? '儲存成功' : '儲存失敗';
            $But = ($saveList && $repeatList) ? '不過' : '';
            $repeatText = ($repeatList) ? '，'. $But .'「' . implode(',', $repeatList) . '」已經存在' : '';
            $objResponse->script("$('#AddQuestionInput').html('').change();CreateQuestion(". json_encode($saveList).");swal({type: '". $swalType ."',title: '" . $swalTitle . $repeatText ."',showConfirmButton: false});");
        }
    }

    return $objResponse;
}

function Vote($userId=NULL, $vote=NULL, $displayName=NULL, $pictureUrl=NULL){
    $objResponse = new xajaxResponse();

    if($userId && $vote){
        $line = new kLineMessaging();

        $SQL_GroupRobot = new kSQL('GroupRobot');
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
        $SendMsg = 'liff.closeWindow();';
        if(!$GroupList){
            $Msg = '無進行中的活動';
        }else{
            $Profile = array(
                "userId" => $userId,
                "displayName" => $displayName,
                "pictureUrl" => $pictureUrl,
            );
            $line->LineMemberProcess('liff', 'Vote', $Profile);//投票者
            $GetMember = $line->LineMessageData_Member[0];
            $NewFriend = false;
            if($GetMember['create_at']>$GroupList['propertyD']){
                $NewFriend = true;
            }
            if(1 && $userId==$vote){ //投票給自己
                $Msg = $GroupList['content']['VoteSelf'] ? $GroupList['content']['VoteSelf'] : '無法投票給自己喔！';
            }else if(1 && $GroupList['viewB']=='on' && !$NewFriend){ //限制新好友 && 非新好友
                $Msg = $GroupList['content']['IsFriend'] ? $GroupList['content']['IsFriend'] : '您在此活動前已是好友，因此無法參與投票';
            }else{
                if($GetMember['prev1'] !== 'follow'){
//                    $Msg = "請接續上次投票流程：\n";
                    $content = array(
                        "BOT_Type" => "WaitFollow",
                        "BOT_Model" => 'GroupRobot',
                        "BOT_Action" => 'Vote',
                        "BOT_Data" => '',
                        "BOT_Box" => '',
                        "BOT_Mode" => '',
                        "BOT_Date" => $line->LineMessageDB_Membe->getNowTime(),
                        "BOT_ID" => '',
                    );
                    $line->LineMessageDB_Membe
                        ->SetAction('update')
                        ->SetWhere("id='". $line->LineMessageData_Member[0]['id'] ."'")
                        ->SetValue('content', json_encode($content))
                        ->BuildQuery();
                    $Msg = $GroupList['content']['NewMember'] ? preg_replace("/\(Line@\)/", _LineAtName, $GroupList['content']['NewMember']) : '加【'. _LineAtName .'】為好友，即可完成投票';
                    $SendMsg = 'location.href="https://line.me/R/ti/p/@'.__LineAtID.'";';
                }else{
                    $GetVote = $SQL_GroupRobot->SetAction('select')
                                            ->SetWhere("prev='". $GroupList['id'] ."'")
                                            ->SetWhere("next='vote'")
                                            ->SetWhere("propertyA='". $userId ."'")//投票者
                                            ->BuildQuery();
                    $VoteList = array_column($GetVote, 'propertyB', 'propertyA');
                    if($GroupList['viewC']=='on' && $GetVote){ //限制一人一票 && 已經投票
                        $Msg = $GroupList['content']['RepeatVote'] ? $GroupList['content']['RepeatVote'] : '你已經投過囉！';
                    }else if($VoteList[$vote]){ //重複投票
                        $Msg = $GroupList['content']['RepeatVote'] ? $GroupList['content']['RepeatVote'] : '你已經投過囉！';
                    }
                }
            }
        }

        if(!$Msg){ //無錯誤訊息
            $SQL_LineMember = new kSQL('LineMember');
            $GetVoteMember = $SQL_LineMember->SetAction('select')
                                        ->SetWhere("tablename='member'")
                                        ->SetWhere("prev='line'")
                                        ->SetWhere("next='myself'")
                                        ->SetWhere("propertyA='". $vote ."'")//得票者
                                        ->BuildQuery();
            $InsertVoteState = $SQL_GroupRobot->SetAction('insert')
                                            ->SetValue("prev", $GroupList['id'])
                                            ->SetValue("next", 'vote')
                                            ->SetValue("propertyA", $userId)//投票者
                                            ->SetValue("propertyB", $vote)//得票者
                                            ->SetValue("create_at", $SQL_GroupRobot->getNowTime())
                                            ->SetValue("update_at", $SQL_GroupRobot->getNowTime())
                                            ->BuildQuery();
            $VoteSuccess = $GroupList['content']['VoteSuccess'] ? preg_replace("/\(Nickname\)/", $GetVoteMember[0]['subject']['displayName'], $GroupList['content']['VoteSuccess']) : '已成功投票給【'.$GetVoteMember[0]['subject']['displayName'].'】';//得票者
            $GetVote = $GroupList['content']['GetVote'] ? preg_replace("/\(Nickname\)/", $displayName, $GroupList['content']['GetVote']) : '【'.$displayName.'】在揪團活動「'.$GroupList['subject']['subject'].'」投票給你';
            $FELX = new FELX();
            $title = '得票通知';
            $Val = array(
                "type" => "success",
                "title" => "獲得一票",
                "text" => $GetVote,
            );
            $line->SetMessageObject($FELX->FLEX_SendMessage($title, $FELX->FLEX_Alert($Val)));
            $Msg = !empty($line->action['data']) ? json_encode($line->action['data']) : '';
            $line->action['data'] = array();
            $SendMsg = 'SendMsg('.$Msg.', 1, 1);';
            $objResponse->script('alert("'.$VoteSuccess.'");' . $SendMsg);
        }else{
            $objResponse->script('alert("'.$Msg.'");' . $SendMsg);
        }
    }

    return $objResponse;
}

function search($userId=null, $SearchPlace=null, $place_id=null, $photosJson=null, $InfoJson=null){
    $objResponse = new xajaxResponse();

    $TranslateList = array(
        "business_status" => array( //營運狀態
            "OPERATIONAL" => "營運中",
            "CLOSED_TEMPORARILY" => "暫時關閉",
            "CLOSED_PERMANENTLY" => "永久關閉",
        ),
    );
    $API_KEY = __GoogleApiToken;
    if($place_id){
        $photos = json_decode($photosJson, true);
        $photo_reference = $photos[0]['photo_reference'];
        $Contact = 'opening_hours,formatted_phone_number,international_phone_number,website';
        $Basic = ',address_component,business_status,formatted_address,geometry,icon,name,permanently_closed,place_id,plus_code,type,url,utc_offset,vicinity';
        $Atmosphere = ',price_level,rating,user_ratings_total';
        $Has_Html = ',adr_address,photo,review';
        $Url = 'https://maps.googleapis.com/maps/api/place/details/json?language=zh-TW&fields='. $Contact.$Basic.$Atmosphere.$Has_Html .'&place_id='. $place_id .'&key='. $API_KEY;
        $PlaceDetailsResult = json_decode($PlaceDetailsResult = file_get_contents($Url), true);

        if($PlaceDetailsResult && $PlaceDetailsResult['status']==='OK' && $PlaceDetailsResult['result']){
            //移除 有包含「HTML」的資料
//            $objResponse->script("console.log(". json_encode($PlaceDetailsResult) .");");
            unset($PlaceDetailsResult['result']['adr_address']);
            unset($PlaceDetailsResult['result']['photos']);
            unset($PlaceDetailsResult['result']['reviews']);
            $maxwidth = '400';
            $PhotoUrl = 'https://maps.googleapis.com/maps/api/place/photo?maxwidth='. $maxwidth .'&photo_reference='. $photo_reference .'&key=' . $API_KEY;
            $PhotoHTML = "<img style='width: 100%;' src='". $PhotoUrl ."'>";
            $phoneHTML = $PlaceDetailsResult['result']['formatted_phone_number'];//店家電話
            $timeHTML = '';
            if($PlaceDetailsResult['result']['opening_hours']['weekday_text']){//每天營業時間
                foreach ($PlaceDetailsResult['result']['opening_hours']['weekday_text'] as $key => $value) {
                    $timeHTML .= '<div>'. $value .'</div>';
                }
            }else{
                $timeHTML = '<span>無提供營業時間</span>';
            }

            $resultJSON = json_encode($PlaceDetailsResult['result']);
            $objResponse->script('$("#'.$place_id.'").find(".photo").html("'. $PhotoHTML .'");'
                                .'$("#'.$place_id.'").find(".phone").html("'. $phoneHTML .'");'
                                .'$("#'.$place_id.'").find(".time").html("'. $timeHTML .'");'
                                .'$("#'.$place_id.'").attr("data-Json", '. "'". $resultJSON ."'" .');'
                                .'$("#'.$place_id.'").find(".phone").parent().show();'
                                .'$("#'.$place_id.'").find(".time").parent().show();'
                                .'$("#'.$place_id.'").find(".SavePlace").show();');
        }
    }else{
        if(empty($InfoJson)){
            $SearchPlace = urlencode($SearchPlace);
            $Url = 'https://maps.googleapis.com/maps/api/place/textsearch/json?language=zh-TW&query='. $SearchPlace .'&key='. $API_KEY;
            $PlaceResult = json_decode($PlaceResult = file_get_contents($Url), true);
        }else{
            $PlaceInfo = json_decode($InfoJson, true);
            $PlaceResult['status'] = 'OK';
            $PlaceResult['results'][] = $PlaceInfo;
        }

        if($PlaceResult && $PlaceResult['status']==='OK' && $PlaceResult['results']){
            $SQL_Location = new kSQL('Location');
            $HTML = '<div class="placeslide">';
            foreach ($PlaceResult['results'] as $placeKey => $placeVal) {
                $GetLocation = $SQL_Location->SetAction('select')
                                            ->SetWhere("propertyA='". $placeVal['formatted_address'] ."'")//address
                                            ->SetLimit(1)
                                            ->BuildQuery();
                if(!$GetLocation){
                    $kGeohash = new kGeohash();
                    $Now_geohash = $kGeohash->encode($placeVal['geometry']['location']['lat'], $placeVal['geometry']['location']['lng']);
                    $SQL_Location->SetAction('insert')
                                ->SetValue('prev', 'place')//from
                                ->SetValue('propertyA', $placeVal['formatted_address'])//address
                                ->SetValue('propertyB', $placeVal['geometry']['location']['lat'])//latitude
                                ->SetValue('propertyC', $placeVal['geometry']['location']['lng'])//longitude
                                ->SetValue('propertyD', $Now_geohash)//geohash值
                                ->BuildQuery();
                }
                if(!empty($PlaceInfo)){
                    switch($placeVal['business_status']){
                        case 'CLOSED_TEMPORARILY':
                            $Text = '暫時關閉';
                            $Class = 'danger';
                            $Style = '';
                            break;
                        case 'CLOSED_PERMANENTLY':
                            $Text = '永久關閉';
                            $Class = 'danger';
                            $Style = '';
                            break;
                        case 'OPERATIONAL':
                            if($placeVal['opening_hours']['periods']){
                                $periods = array();
                                foreach ($placeVal['opening_hours']['periods'] as $periodKey => $periodVal) {
                                    $periods[$periodVal['open']['day']][] = array(
                                        "open" => $periodVal['open']['time'].'00',
                                        "close" => $periodVal['close']['time'].'00',
                                    );
                                }

                                $successCtn = 0;
                                $NowWeekDay = date('w');
                                if($periods[$NowWeekDay]){
                                    $Today = date('Ymd');
                                    $Tomorrow = date('Ymd', strtotime($Today .' +1 day'));
                                    $NowTime = $Today . date('His');
                                    foreach ($periods[$NowWeekDay] as $TodayKey => $TodayVal) {
                                        $OpenTime = $Today.$TodayVal['open'];
                                        $CloseTime = $TodayVal['close'];
                                        if(substr($OpenTime, 8, 2)*1>12 && substr($CloseTime, 0, 2)*1<12){
                                            $CloseTime = $Tomorrow . $CloseTime;
                                        }else{
                                            $CloseTime = $Today . $CloseTime;
                                        }
                                        if( $NowTime>=$OpenTime && $NowTime<=$CloseTime ){
                                            $successCtn ++;
                                        }
                                    }
                                }

                                $Text = ($successCtn>0) ? '營業中' : '休息中';
                                $Class = ($successCtn>0) ? 'success' : 'danger';
                                $Style = '';
                            }else{
                                $Text = '無提供營業時間';
                                $Class = 'danger';
                                $Style = "background-color: #ffd02c";
                            }
                            break;
                        default :
                            $Text = '無提供營業時間';
                            $Class = 'danger';
                            $Style = "background-color: #ffd02c";
                            break;
                    }
                }else{
                    $Class = 'danger';
                    $Style = "";
                    if(!$placeVal['opening_hours']){
                        $Text = '無提供營業時間';
                        $Style = "background-color: #ffd02c";
                    }else if(!$placeVal['opening_hours']['open_now']){
                        $Text = '休息中';
                    }else{
                        $Text = '營業中';
                        $Class = 'success';
                    }
                }
                $open_now = '<span class="label label-'. $Class .'" style="'. $Style .'">'. $Text .'</span>';
                $price_level = '';
                if($placeVal['price_level']){
                    for($i=0;$i<$placeVal['price_level'];$i++){
                        $price_level .= '$';
                    }
                }
                $rating = $placeVal['rating'];
                if($rating){
                    $ratingTmp = explode('.', $rating);
                    $ratingInteger = $ratingTmp[0];
                    $ratingDecimal = $ratingTmp[1];
                    if(empty($ratingDecimal)){
                        $rating .= '.0';
                    }
                    $rating .= ' ';
                    for($i=0;$i<$ratingInteger;$i++){
                        $iconUrl = 'https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png';
                        $rating .= '<span style="background-size: 14px 14px;width: 14px;height: 13px;vertical-align: top;display: inline-block;background-image: url('. "'".$iconUrl."'" .')"></span>';
                    }
                    for($i=$ratingInteger;$i<5;$i++){
                        if($ratingDecimal<=2 || $i>$ratingInteger){
                            $iconUrl = 'https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_empty_14.png';
                        }else if($ratingDecimal>=8){
                            $iconUrl = 'https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_14.png';
                        }else{
                            $iconUrl = 'https://maps.gstatic.com/consumer/images/icons/2x/ic_star_rate_half_14.png';
                        }
                        $rating .= '<span style="background-size: 14px 14px;width: 14px;height: 13px;vertical-align: top;display: inline-block;background-image: url('. "'".$iconUrl."'" .')"></span>';
                    }
                }

                if(!empty($PlaceInfo)){
                    $maxwidth = '400';
                    $PhotoUrl = 'https://maps.googleapis.com/maps/api/place/photo?maxwidth='. $maxwidth .'&photo_reference='. $placeVal['photos'][0]['photo_reference'] .'&key=' . $API_KEY;
                    $PhotoHTML = "<img style='width: 100%;' src='". $PhotoUrl ."'>";
                    $phoneHTML = $placeVal['formatted_phone_number'];//店家電話
                    $timeHTML = '';
                    if($placeVal['opening_hours']['weekday_text']){//每天營業時間
                        foreach ($placeVal['opening_hours']['weekday_text'] as $key => $value) {
                            $timeHTML .= '<div>'. $value .'</div>';
                        }
                    }else{
                        $timeHTML = '<span>無提供營業時間</span>';
                    }
                    $phoneStyle = '';
                    $timeStyle = '';
                    $ChoosePlace = '';
                    $SavePlace = '';
                }else{
                    $phoneStyle = 'display: none;';
                    $timeStyle = 'display: none;';
                    $ChoosePlace = '<li class="list-group-item"><div class="btn btn-primary" onclick="if(confirm('. "'確定要選擇「".$placeVal['name']."」嗎? (將會扣除API的呼叫額度)'" .')){ $('. "'.place'" .').hide();$('. "'#".$placeVal['place_id']."'" .').show();$(this).parent().hide();xajax_search('. "'".$userId."'" .', null, '. "'".$placeVal['place_id']."'" .', $(this).parents('. "'#".$placeVal['place_id']."'" .').attr('. "'data-Photos'" .')); }">選擇</div></li>';
                    $SavePlace = '<div class="btn btn-primary form-control SavePlace" style="display: none;" onclick="xajax_SavePlace('. "'".$userId."'" .', $(this).parent().attr('. "'data-Json'" .'), $(this).parent().attr('. "'data-Photos'" .'));">儲存店家</div>';
                }

                $HTML   .= '<div id="'. $placeVal['place_id'] .'" class="place" data-Json='. "'"."'" .' data-Photos='. "'".json_encode($placeVal['photos'])."'" .'>'//google place_id
                                . '<div class="photo">'. $PhotoHTML .'</div>'//店家第一張圖($placeVal['photos'][0]['photo_reference'])
                                . '<h4>'. $placeVal['name'] .'</h4>'//google 店名
                                . '<div>'. $price_level . ' ' . $rating . ' ('. $placeVal['user_ratings_total'] .') ' . $open_now .'</div>'//價格高低、評論星級、多少人評論、現在是否營業中
                                . '<ul class="list-group list-group-unbordered">'
                                        . '<a target="_blank" href="https://www.google.com.tw/maps/dir//'. $placeVal['name'].' '.$placeVal['formatted_address'] .'/@'. $placeVal['geometry']['location']['lat'] .','. $placeVal['geometry']['location']['lng'] .',12z"><li class="list-group-item"><i class="fa fa-fw fa-map-marker" style="color: #4285f4;"></i> '. $placeVal['formatted_address'] .'</li></a>'//店家地址
                                        . '<li class="list-group-item"><img style="height: 14px;width: 14px;" src="https://maps.gstatic.com/mapfiles/maps_lite/images/2x/ic_plus_code.png"> '. $placeVal['plus_code']['compound_code'] .'</li>'//數位地址
                                        . $ChoosePlace
                                        . '<a target="_blank" href="tel:'. $phoneHTML .'"><li class="list-group-item" style="'. $phoneStyle .'"><i class="fa fa-fw fa-phone" style="color: #4285f4;"></i> <span class="phone">'. $phoneHTML .'</span></li></a>'
                                        . '<li class="list-group-item" style="'. $timeStyle .'"><i class="fa fa-fw fa-clock-o" style="color: #4285f4;"></i> <span class="time">'. $timeHTML .'</span></li>'
                                . '</ul>'
                                . $SavePlace
                                . '<hr>'
                        .  '</div>';
            }
            $HTML .= '</div>';
            $objResponse->assign('PlaceResult', 'innerHTML', $HTML);
        }
    }

    return $objResponse;
}

function SavePlace($userId=null, $Json=NULL, $photosJson=NULL){
    $objResponse = new xajaxResponse();

    if($userId && $Json){
        $placeVal = json_decode($Json, true);
        $placeVal['photos'] = json_decode($photosJson, true);

        if($placeVal['place_id']){
            $SQL_place = new kSQL('place');
            $GetPlace = $SQL_place->SetAction('select')
                                  ->SetWhere("propertyA='". $userId ."'")
                                  ->SetWhere("propertyB='". $placeVal['place_id'] ."'")
                                  ->BuildQuery();
            if($GetPlace[0]){
                $SQL_place->SetAction('update')
                          ->SetWhere("id='". $GetPlace[0]['id'] ."'");
                if($GetPlace[0]['subject'] && $GetPlace[0]['subject']['Remarks']){
                    $placeVal['Remarks'] = $GetPlace[0]['subject']['Remarks'];
                }
            }else{
                $SQL_place->SetAction('insert')
                          ->SetValue("propertyA", $userId)
                          ->SetValue("propertyB", $placeVal['place_id'])
                          ->SetValue("create_at", $SQL_place->getNowTime());
            }
            $SaveState = $SQL_place->SetValue("subject", json_encode($placeVal))
                                   ->SetValue("update_at", $SQL_place->getNowTime())
                                   ->BuildQuery();
            if(!$GetPlace[0]){
                $GetPlace = $SQL_place->SetAction('select')
                                  ->SetWhere("propertyA='". $userId ."'")
                                  ->SetWhere("propertyB='". $placeVal['place_id'] ."'")
                                  ->BuildQuery();
            }
        }
    }

    if($SaveState){
        $objResponse->alert("儲存成功");
        $place = $placeVal;
        switch($place['business_status']){
            case 'CLOSED_TEMPORARILY':
                $Text = '暫時關閉';
                $Class = 'danger';
                $Style = '';
                break;
            case 'CLOSED_PERMANENTLY':
                $Text = '永久關閉';
                $Class = 'danger';
                $Style = '';
                break;
            case 'OPERATIONAL':
                if($place['opening_hours']['periods']){
                    $periods = array();
                    foreach ($place['opening_hours']['periods'] as $periodKey => $periodVal) {
                        $periods[$periodVal['open']['day']][] = array(
                            "open" => $periodVal['open']['time'].'00',
                            "close" => $periodVal['close']['time'].'00',
                        );
                    }
                    $placeVal['periods'] = $periods;
                    $successCtn = 0;
                    $NowWeekDay = date('w');
                    if($periods[$NowWeekDay]){
                        $Today = date('Ymd');
                        $Tomorrow = date('Ymd', strtotime($Today .' +1 day'));
                        $NowTime = $Today . date('His');
                        foreach ($periods[$NowWeekDay] as $TodayKey => $TodayVal) {
                            $OpenTime = $Today.$TodayVal['open'];
                            $CloseTime = $TodayVal['close'];
                            if(substr($OpenTime, 8, 2)*1>12 && substr($CloseTime, 0, 2)*1<12){
                                $CloseTime = $Tomorrow . $CloseTime;
                            }else{
                                $CloseTime = $Today . $CloseTime;
                            }
                            if( $NowTime>=$OpenTime && $NowTime<=$CloseTime ){
                                $successCtn ++;
                            }
                        }
                    }

                    $Text = ($successCtn>0) ? '營業中' : '休息中';
                    $Class = ($successCtn>0) ? 'success' : 'danger';
                    $Style = '';
                    $Ch_WeekDay = ($NowWeekDay>0) ? ($NowWeekDay-1) : 6;
                    $placeVal['open_next'] = $place['opening_hours']['weekday_text'][$Ch_WeekDay];
                }else{
                    $Text = '無提供營業時間';
                    $Class = 'danger';
                    $Style = "background-color: #ffd02c";
                }
                break;
            default :
                $Text = '無提供營業時間';
                $Class = 'danger';
                $Style = "background-color: #ffd02c";
                break;
        }
        $placeVal['open_now'] = '<span class="label label-'. $Class .'" style="'. $Style .'">'. $Text .'</span>';
        $placeItem = array(
            "propertyA" => $userId,
            "propertyB" => $placeVal['place_id'],
            "subject" => $placeVal,
            "owner" => 1,
            "id" => $GetPlace[0]['id'],
        );
        $objResponse->call('addMarker', json_encode($placeItem));
        $objResponse->script('if($("#ChooseActionArea").css("display")==="none"){ $("#add_place").hide(); }else{ $("#add_place").hide();AddTrip($("#DayList .DayItem[DayCtn="+NowDayCtn+"] .AddTripBtn")); }');
    }else{
        $objResponse->alert("儲存失敗");
    }

//    $objResponse->script("console.log('Json');");
//    $objResponse->script("console.log('". $Json ."');");
    return $objResponse;
}

function updatePlace($userId=null, $place_id=NULL, $id=NULL){
    $objResponse = new xajaxResponse();

    if($userId && $place_id && ($id&&$id!='undefined')){
        $API_KEY = __GoogleApiToken;
        $Contact = 'opening_hours,formatted_phone_number,international_phone_number,website';
        $Basic = ',address_component,business_status,formatted_address,geometry,icon,name,permanently_closed,place_id,plus_code,type,url,utc_offset,vicinity';
        $Atmosphere = ',price_level,rating,user_ratings_total';
        $Has_Html = ',adr_address,photo,review';
        $Url = 'https://maps.googleapis.com/maps/api/place/details/json?language=zh-TW&fields='. $Contact.$Basic.$Atmosphere.$Has_Html .'&place_id='. $place_id .'&key='. $API_KEY;
        $PlaceDetailsResult = json_decode(file_get_contents($Url), true);

        if($PlaceDetailsResult && $PlaceDetailsResult['status']==='OK' && $PlaceDetailsResult['result']){
            $placeVal = $PlaceDetailsResult['result'];
            $SQL_place = new kSQL('place');

            $GetOldRow = $SQL_place->SetAction('select')
                                ->SetWhere("id='". $id ."'")
                                ->BuildQuery();
            if($GetOldRow[0] && $GetOldRow[0]['subject'] && $GetOldRow[0]['subject']['Remarks']){
                $placeVal['Remarks'] = $GetOldRow[0]['subject']['Remarks'];
            }
            $SaveState = $SQL_place->SetAction('update')
                                    ->SetWhere("id='". $id ."'")
                                    ->SetValue("subject", json_encode($placeVal))
                                    ->SetValue("update_at", $SQL_place->getNowTime())
                                    ->BuildQuery();
            $GetRow = $SQL_place->SetAction('select')
                                ->SetWhere("id='". $id ."'")
                                ->BuildQuery();
        }
    }

    if($SaveState && $GetRow[0]){
        $objResponse->alert("儲存成功");
        $place = $placeVal;
        switch($place['business_status']){
            case 'CLOSED_TEMPORARILY':
                $Text = '暫時關閉';
                $Class = 'danger';
                $Style = '';
                break;
            case 'CLOSED_PERMANENTLY':
                $Text = '永久關閉';
                $Class = 'danger';
                $Style = '';
                break;
            case 'OPERATIONAL':
                if($place['opening_hours']['periods']){
                    $periods = array();
                    foreach ($place['opening_hours']['periods'] as $periodKey => $periodVal) {
                        $periods[$periodVal['open']['day']][] = array(
                            "open" => $periodVal['open']['time'].'00',
                            "close" => $periodVal['close']['time'].'00',
                        );
                    }
                    $placeVal['periods'] = $periods;
                    $successCtn = 0;
                    $NowWeekDay = date('w');
                    if($periods[$NowWeekDay]){
                        $Today = date('Ymd');
                        $Tomorrow = date('Ymd', strtotime($Today .' +1 day'));
                        $NowTime = $Today . date('His');
                        foreach ($periods[$NowWeekDay] as $TodayKey => $TodayVal) {
                            $OpenTime = $Today.$TodayVal['open'];
                            $CloseTime = $TodayVal['close'];
                            if(substr($OpenTime, 8, 2)*1>12 && substr($CloseTime, 0, 2)*1<12){
                                $CloseTime = $Tomorrow . $CloseTime;
                            }else{
                                $CloseTime = $Today . $CloseTime;
                            }
                            if( $NowTime>=$OpenTime && $NowTime<=$CloseTime ){
                                $successCtn ++;
                            }
                        }
                    }

                    $Text = ($successCtn>0) ? '營業中' : '休息中';
                    $Class = ($successCtn>0) ? 'success' : 'danger';
                    $Style = '';
                    $Ch_WeekDay = ($NowWeekDay>0) ? ($NowWeekDay-1) : 6;
                    $placeVal['open_next'] = $place['opening_hours']['weekday_text'][$Ch_WeekDay];
                }else{
                    $Text = '無提供營業時間';
                    $Class = 'danger';
                    $Style = "background-color: #ffd02c";
                }
                break;
            default :
                $Text = '無提供營業時間';
                $Class = 'danger';
                $Style = "background-color: #ffd02c";
                break;
        }
        $placeVal['open_now'] = '<span class="label label-'. $Class .'" style="'. $Style .'">'. $Text .'</span>';
        $placeItem = array(
            "propertyA" => $userId,
            "propertyB" => $place_id,
            "subject" => $placeVal,
            "owner" => ($GetRow[0]['propertyA']===$userId) ? 1 : 0,
            "id" => $id,
        );
        $objResponse->call('addMarker', json_encode($placeItem));
    }else{
        $objResponse->alert("儲存失敗");
    }

    return $objResponse;
}

function deletePlace($userId=null, $place_id=NULL, $len=NULL, $id=NULL){
    $objResponse = new xajaxResponse();

    $ErrorMsg = "刪除失敗";
    if($userId && $place_id && ($id&&$id!='undefined')){
        $SQL_place = new kSQL('place');
        /*
         * 誰可以看我的
         */
        $manager_list = $SQL_place->SetAction("select")
                    ->SetWhere("next='user'")
                    ->SetWhere("prev='". $userId ."'")
                    ->BuildQuery();
        if($manager_list){
            $SelectList = array_column($manager_list, 'propertyA');
        }
        $SelectList[] = $userId;
        $GetTrip = $SQL_place->SetAction('select')
                            ->SetWhere("next='stroke'")
                            ->SetWhere("subject like '%". '"'.$place_id.'"' ."%'")
                            ->SetWhere("propertyA in ('". implode("','", $SelectList) ."')")
                            ->BuildQuery();
        if($GetTrip[0]){
            $ErrorMsg .= "，有行程使用此地點";
        }else{
            $DeletePlace = $SQL_place->SetAction('delete')
                                    ->SetWhere("propertyA='". $userId ."'")
                                    ->SetWhere("id='". $id ."'")
                                    ->BuildQuery();
        }
    }

    if($DeletePlace){
        $objResponse->alert("刪除成功");
        $objResponse->script("$('.placeItem[data-UID=".'"'. $userId .'"'."][data-id=".'"'. $place_id .'"'."]').remove();"
                            ."$('.recordItem[data-UID=".'"'. $userId .'"'."][data-id=".'"'. $place_id .'"'."]').remove();");
        $objResponse->call('deleteMarker', $len);
    }else{
        $objResponse->alert($ErrorMsg);
    }

    return $objResponse;
}

function DeleteTrip($userId=null, $id=null){
    $objResponse = new xajaxResponse();

    if($userId && $id){
        $SQL_place = new kSQL('place');
        $DeleteTrip = $SQL_place->SetAction('delete')
                                ->SetWhere("propertyA='". $userId ."'")
                                ->SetWhere("id='". $id ."'")
                                ->BuildQuery();
    }

    if($DeleteTrip){
        $objResponse->script('location.reload();');
    }else{
        $objResponse->alert("刪除失敗");
    }

    return $objResponse;
}

function SaveTrip($userId=null, $id=null, $TripName=NULL, $ChooseDate=NULL, $SaveItem=NULL){
    $objResponse = new xajaxResponse();

    if($userId && $ChooseDate && $SaveItem){
        $SQL_place = new kSQL('place');
        $subject = array();
        if($id){
            $place = $SQL_place->SetAction('select')
                                ->SetWhere("id='". $id ."'")
                                ->BuildQuery();
            $subject = $place[0]['subject'];
            $SQL_place->SetAction('update')
                      ->SetWhere("id='". $id ."'");
        }else{
            $SQL_place->SetAction('insert')
                      ->SetValue("next", 'stroke')
                      ->SetValue("propertyA", $userId)
                      ->SetValue("create_at", $SQL_place->getNowTime());
        }
        $subject['stroke'] = json_decode($SaveItem, true);
        $SaveState = $SQL_place->SetValue("propertyB", $TripName)
                                ->SetValue("propertyC", $ChooseDate)
                                ->SetValue("subject", json_encode($subject))
                                ->SetValue("update_at", $SQL_place->getNowTime())
                                ->BuildQuery();
    }

    if($SaveState){
        $objResponse->alert("儲存成功");
        $objResponse->script('location.reload();');
    }else{
        $objResponse->alert("儲存失敗");
    }

    return $objResponse;
}

function CopyTrip($userId=null, $id=null){
    $objResponse = new xajaxResponse();

    if($userId && $id){
        $SQL_place = new kSQL('place');
        $place = $SQL_place->SetAction('select')
                            ->SetWhere("id='". $id ."'")
                            ->BuildQuery();
        if($place[0]){
            $CopyState = $SQL_place->SetAction('insert')
                                    ->SetValue("next", 'stroke')
                                    ->SetValue("propertyA", $userId)
                                    ->SetValue("propertyB", $place[0]['propertyB'] . '的副本')//TripName
                                    ->SetValue("propertyC", $place[0]['propertyC'])//ChooseDate
                                    ->SetValue("subject", json_encode($place[0]['subject']))
                                    ->SetValue("update_at", $SQL_place->getNowTime())
                                    ->SetValue("create_at", $SQL_place->getNowTime())
                                    ->BuildQuery();
        }
    }

    if($CopyState){
        $objResponse->alert("複製成功");
        $objResponse->script('location.reload();');
    }else{
        $objResponse->alert("複製失敗");
    }

    return $objResponse;
}

function SaveRemark($id=NULL, $Remarks=NULL){
    $objResponse = new xajaxResponse();

    if($id){
        $SQL_place = new kSQL('place');
        $place = $SQL_place->SetAction('select')
                            ->SetWhere("id='". $id ."'")
                            ->BuildQuery();
        if($place[0] && $place[0]['subject']){
            $subject = $place[0]['subject'];
            $subject['Remarks'] = $Remarks;
            $UpdateRemark = $SQL_place->SetAction('update')
                                    ->SetWhere("id='". $id ."'")
                                    ->SetValue('subject', json_encode($subject))
                                    ->BuildQuery();
        }
    }
    if($UpdateRemark){
        $objResponse->script('location.reload();');
    }else{
        $objResponse->alert("儲存失敗");
    }

    return $objResponse;
}

function SaveInfo($id=NULL, $action=NULL, $SaveJson){
    $objResponse = new xajaxResponse();

    if($id){
        $SQL_place = new kSQL('place');
        $place = $SQL_place->SetAction('select')
                            ->SetWhere("id='". $id ."'")
                            ->BuildQuery();
        if($place[0] && $place[0]['subject']){
            $subject = $place[0]['subject'];
            $subject[$action] = $SaveJson;
            $UpdateInfo = $SQL_place->SetAction('update')
                                    ->SetWhere("id='". $id ."'")
                                    ->SetValue('subject', json_encode($subject))
                                    ->BuildQuery();
        }
    }
    if($UpdateInfo){
        $objResponse->alert('儲存成功');
    }else{
        $objResponse->alert("儲存失敗");
    }

    return $objResponse;
}

function Session($Key=NULL, $Val=NULL, $Reload=0){
    $objResponse = new xajaxResponse();

    $_SESSION[__DOMAIN][_Module][$Key] = $Val;
    if($Reload){ $objResponse->script('location.reload();'); }
    return $objResponse;
}

function StickerSend($_Target='self', $image, $userId=NULL, $displayName=NULL, $pictureUrl=NULL, $statusMessage=NULL, $SendMsg='pic'){
    $objResponse = new xajaxResponse();

    if($image){
        $subject = array_filter(array(
            "displayName" => $displayName,
            "pictureUrl" => $pictureUrl,
            "statusMessage" => $statusMessage,
        ));
        $SQL = new kSQL('sticker');
        $SQL->SetAction("replace")
            ->SetValue("tablename", 'sticker')
            ->SetValue("subject", json_encode($subject))
            ->SetValue("viewA", 'false')
            ->SetValue("propertyA", $userId)
            ->SetValue("propertyB", $image)
            ->SetValue("create_at", $SQL->getNowTime())
            ->BuildQuery();
        if($SendMsg==='pic'){
            $line = new kLineMessaging();
            $line->action['data'] = [];
            $line->image($image, $image);
            $MsgFunc = '';
            switch ($_Target){
                case 'self':
                    $MsgFunc = 'SendMsg';
                    break;
                case 'share':
                    $MsgFunc = 'ShareMsg';
                    break;
            }
            $objResponse->script('dataURL_Backup="";'.$MsgFunc.'(' . json_encode($line->action['data']) . ', 1);window.setTimeout(function () { location.reload(); }, 1000);');
            $line->action['data'] = [];
        }else{
            $objResponse->script('location.href=location.href.replace("&imgur_result='.$image.'", "");');
        }
    }

    return $objResponse;
}

function StickerSendMedia($_Target='self', $media=NULL){
    $objResponse = new xajaxResponse();

    if($media){
        $line = new kLineMessaging();
        $line->action['data'] = [];
        $TypeTmp = explode('.', $media);
        $FileName = $TypeTmp[0];
        $Type = $TypeTmp[0];
        switch($Type){
            case 'gif':
                $line->video($FileName.'.mp4', $FileName.'.png');
                break;
            default :
                $line->image($media, $media);
                break;
        }
        $MsgFunc = '';
        switch ($_Target){
            case 'self':
                $MsgFunc = 'SendMsg';
                break;
            case 'share':
                $MsgFunc = 'ShareMsg';
                break;
        }
        $objResponse->script($MsgFunc.'(' . json_encode($line->action['data']) . ', 1);');
        $line->action['data'] = [];
    }

    return $objResponse;
}

function AddFavorite($module=NULL, $id=NULL, $viewA=NULL){
    $objResponse = new xajaxResponse();

    $SQL = new kSQL($module);
    $SQL->SetAction('update')
        ->SetWhere("id='". $id ."'")
        ->SetValue("viewA", $viewA)
        ->BuildQuery();

    return $objResponse;
}

function Delete($module=NULL, $id=NULL, $userId=NULL, $image=NULL){
    $objResponse = new xajaxResponse();

    $SQL = new kSQL($module);
    $state = $SQL->SetAction('delete')
                ->SetWhere("id='". $id ."'")
                ->SetWhere("propertyA='". $userId ."'")
                ->BuildQuery();
    if($state && $image && strpos($image, $_SERVER['HTTP_HOST'])!==false){
        $_SCHEME = $_SERVER['REQUEST_SCHEME'] ? $_SERVER['REQUEST_SCHEME'] : 'https';
        $image = str_replace($_SCHEME.'://', '/home1/', $image);
        if(file_exists($image)){
            @unlink($image);
        }
    }
    $objResponse->script('location.reload();');

    return $objResponse;
}

function AddMessage($module=NULL, $userId=NULL, $displayName=NULL, $pictureUrl=NULL, $statusMessage=NULL, $data=NULL, $id=NULL){
    $objResponse = new xajaxResponse();

    $subject = array_filter(array(
        "displayName" => $displayName,
        "pictureUrl" => $pictureUrl,
        "statusMessage" => $statusMessage,
    ));
    $SQL = new kSQL($module);
    $SQL->SetAction("replace", empty($id) ? 1 : 0)
        ->SetAction("update", !empty($id) ? 1 : 0)
        ->SetWhere("id='".$id."'", !empty($id) ? 1 : 0)
        ->SetValue("tablename", 'message')
        ->SetValue("subject", json_encode($subject))
        ->SetValue("content", $data)
        ->SetValue("viewA", 'false')
        ->SetValue("propertyA", $userId)
        ->SetValue("create_at", $SQL->getNowTime(), empty($id) ? 1 : 0)
        ->BuildQuery();
    $objResponse->script('location.reload();');

    return $objResponse;
}

function AddFlex($module=NULL, $userId=NULL, $displayName=NULL, $pictureUrl=NULL, $statusMessage=NULL, $data=NULL, $id=NULL, $action=NULL, $name=NULL, $prevlevel=NULL, $level=NULL){
    $objResponse = new xajaxResponse();

    $subject = array_filter(array(
        "displayName" => $displayName,
        "pictureUrl" => $pictureUrl,
        "statusMessage" => $statusMessage,
    ));
    $SQL = new kSQL($module);
    switch ($level) {
        case 'user':
            $SQL->SetAction("delete")
                ->SetWhere("id='". $id ."'")
                ->SetWhere("prev='". $userId ."'")
                ->BuildQuery();
            break;
        case 'note':
            switch ($action) {
                case 'add':
                    $SQL->SetAction("replace")
                        ->SetValue("tablename", 'note')
                        ->SetValue("prev", $prevlevel)
                        ->SetValue("next", $level)
                        ->SetValue("subject", json_encode($subject))
                        ->SetValue("viewA", 'false')
                        ->SetValue("propertyA", $userId)
                        ->SetValue("propertyB", $name)
                        ->SetValue("propertyC", $data)
                        ->SetValue("create_at", $SQL->getNowTime())
                        ->BuildQuery();
                    break;
                case 'edit':
                    $SQL->SetAction("update")
                        ->SetWhere("id='".$id."'")
                        ->SetValue("propertyB", $name)
                        ->SetValue("propertyC", $data)
                        ->BuildQuery();
                    break;
                case 'delete':
                    $SQL->SetAction("delete")
                        ->SetWhere("id='". $id ."'")
                        ->SetWhere("propertyA='". $userId ."'")
                        ->BuildQuery();
                    break;
            }
            break;
        case 'category':
            switch ($action) {
                case 'add':
                    $SQL->SetAction("replace")
                        ->SetValue("tablename", 'note')
                        ->SetValue("prev", $prevlevel)
                        ->SetValue("next", $level)
                        ->SetValue("subject", json_encode($subject))
                        ->SetValue("viewA", 'false')
                        ->SetValue("propertyA", $userId)
                        ->SetValue("propertyB", $name)
                        ->SetValue("create_at", $SQL->getNowTime())
                        ->BuildQuery();
                    break;
                case 'edit':
                    $SQL->SetAction("update")
                        ->SetWhere("id='".$id."'")
                        ->SetValue("propertyB", $name)
                        ->BuildQuery();
                    break;
                case 'delete':
                    $SQL->SetAction("delete")
                        ->SetWhere("id='". $id ."'")
                        ->SetWhere("propertyA='". $userId ."'")
                        ->BuildQuery();
                    break;
            }
            break;
        case 'subcategory':
            switch ($action) {
                case 'add':
                    $SQL->SetAction("replace")
                        ->SetValue("tablename", 'note')
                        ->SetValue("prev", $prevlevel)
                        ->SetValue("next", $level)
                        ->SetValue("subject", json_encode($subject))
                        ->SetValue("viewA", 'false')
                        ->SetValue("propertyA", $userId)
                        ->SetValue("propertyB", $name)
                        ->SetValue("create_at", $SQL->getNowTime())
                        ->BuildQuery();
                    break;
                case 'edit':
                    $SQL->SetAction("update")
                        ->SetWhere("id='".$id."'")
                        ->SetValue("prev", $prevlevel)
                        ->SetValue("propertyB", $name)
                        ->BuildQuery();
                    break;
                case 'delete':
                    $SQL->SetAction("delete")
                        ->SetWhere("id='". $id ."'")
                        ->SetWhere("propertyA='". $userId ."'")
                        ->BuildQuery();
                    break;
            }
            break;
    }
    $objResponse->script('location.reload();');

    return $objResponse;
}

?>