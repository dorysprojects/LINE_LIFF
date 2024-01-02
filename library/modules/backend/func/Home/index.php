<?php

$line = new kLineMessaging();
$SQL_LineRecord = new kSQL('LineRecord');

$Today = date("Ymd");
//$Today = "20200801";
$MonthStartDate = date('Ym01', strtotime($Today));
$MonthSecondDate = date('Ymd', strtotime($MonthStartDate." +1 day"));
$MonthEndDate = date('Ymd', strtotime($MonthStartDate." +1 month -1 day"));
$PrevMonthStartDate = date('Ym01', strtotime($Today." -1 month"));
$PrevMonthEndDate = date('Ymd', strtotime($PrevMonthStartDate." +1 month -1 day"));
$Yesterday = date('Ymd', strtotime($Today." -1 day"));
$errorList = array(
    "Friends" => array(),
    "Messages" => array()
);
$FriendData = array(
    "total" => 0,
    "effective" => 0,
    "add" => 0,
    "block" => 0,
    "addblock" => 0,
    "interactive" => 0
);
$MessageData = array(
    "push" => 0,
    "multicast" => 0,
    "reply" => 0,
);
$SearchMonth = date('m', strtotime($Today));
if($Today === $MonthStartDate){//今天是這個月第一天
    $SearchMonth = date('m', strtotime($Today." -1 month"));
    $MonthStart = array(
        "date" => $LastMonthStartDate,
    );
    $MonthEnd = array(
        "date" => $LastMonthEndDate,
    );
}else if($Today === $MonthSecondDate){//今天是這個月第二天
    $MonthStart = array(
        "date" => $LastMonthEndDate,
    );
    $MonthEnd = array(
        "date" => $MonthStartDate,
    );
}else{
    $MonthStart = array(
        "date" => $MonthStartDate,
    );
    $MonthEnd = array(
        "date" => $Yesterday,
    );
}
$_date_start = $MonthStart['date'];
$_date_end = $MonthEnd['date'];
$SQL_MonthStart = $SQL->SetAction("select")
                    ->SetWhere("tablename='line_analysis'")
                    ->SetWhere("next='friend'")
                    ->SetWhere("propertyA='$_date_start'")
                    ->BuildQuery();
$SQL_MonthEnd = $SQL->SetAction("select")
                    ->SetWhere("tablename='line_analysis'")
                    ->SetWhere("next='friend'")
                    ->SetWhere("propertyA='$_date_end'")
                    ->BuildQuery();
$MonthInteractive = $SQL_LineRecord->SetAction("SELECT DISTINCT propertyA FROM LineRecord")
                        ->SetWhere("tablename='line'")
                        ->SetWhere("next='message'")
                        ->SetWhere("propertyA!='Udeadbeefdeadbeefdeadbeefdeadbeef'")
                        ->SetWhere("0 <= DATEDIFF(create_at,'" . $_date_start . "')")
                        ->SetWhere("0 >= DATEDIFF(create_at,'" . $_date_end . "')")
                        ->echoSQL(0)
                        ->BuildQuery();
$MonthStartFollowers = $SQL_MonthStart[0]['subject']['data'] ? $SQL_MonthStart[0]['subject']['data'] : $line->GetNumberOfFollowers($MonthStart);
$MonthEndFollowers = $SQL_MonthEnd[0]['subject']['data'] ? $SQL_MonthEnd[0]['subject']['data'] : $line->GetNumberOfFollowers($MonthEnd);
$FriendData['total'] = $MonthEndFollowers['followers'];
$FriendData['effective'] = $MonthEndFollowers['targetedReaches'];
$FriendData['add'] = $MonthEndFollowers['targetedReaches'] - $MonthStartFollowers['targetedReaches'];
$FriendData['block'] = $MonthEndFollowers['blocks'];
$FriendData['addblock'] = ($MonthEndFollowers['blocks']-$MonthStartFollowers['blocks']>0) ? $MonthEndFollowers['blocks']-$MonthStartFollowers['blocks'] : 0;
$FriendData['interactive']= count($MonthInteractive);
if(!$MonthStartFollowers["message"]){
    if(!$SQL_MonthStart[0]['subject']['data']){
        $SQL->SetAction("insert")
            ->SetValue("tablename", "line_analysis")
            ->SetValue("next", "friend")
            ->SetValue("propertyA", $_date_start)
            ->SetValue("subject", json_encode(array("data" => $MonthStartFollowers)))
            ->SetValue('create_at', $SQL->getNowTime())
            ->SetValue('update_at', $SQL->getNowTime())
            ->BuildQuery();
    }
}else{
    $errorList['Friends'][$_date_start]['error'] = $MonthStartFollowers["message"];
}
if(!$MonthEndFollowers["message"]){
    if(!$SQL_MonthEnd[0]['subject']['data']){
        $SQL->SetAction("insert")
            ->SetValue("tablename", "line_analysis")
            ->SetValue("next", "friend")
            ->SetValue("propertyA", $_date_end)
            ->SetValue("subject", json_encode(array("data" => $MonthEndFollowers)))
            ->SetValue('create_at', $SQL->getNowTime())
            ->SetValue('update_at', $SQL->getNowTime())
            ->BuildQuery();
    }
}else{
    $errorList['Friends'][$_date_end]['error'] = $MonthEndFollowers["message"];
}
$SQL_DailyMessages = $SQL->SetAction("select")
                        ->SetWhere("tablename='line_analysis'")
                        ->SetWhere("next='message'")
                        ->SetWhere("0 <= DATEDIFF(propertyA,'" . $_date_start . "')")
                        ->SetWhere("0 >= DATEDIFF(propertyA,'" . $_date_end . "')")
                        ->BuildQuery();
if($SQL_DailyMessages){
    $SQL_MessagesData = array_column($SQL_DailyMessages, "subject", "propertyA");
}
$_date_index = $_date_start;
while ($_date_index <= $_date_end && $_date_index < date('Ymd')) {
    $Daily = array(
        "type" => "delivery",
        "date" => $_date_index
    );
    $DailyMessages = $SQL_MessagesData[$_date_index]['data'] ? $SQL_MessagesData[$_date_index]['data'] : $line->GetNumberOfSentMessages('insight', 'message', $Daily);
    if(!$DailyMessages["message"]){
        if(!$SQL_MessagesData[$_date_index]['data']){
            $SQL->SetAction("insert")
                ->SetValue("tablename", "line_analysis")
                ->SetValue("next", "message")
                ->SetValue("propertyA", $_date_index)
                ->SetValue("subject", json_encode(array("data" => $DailyMessages)))
                ->SetValue('create_at', $SQL->getNowTime())
                ->SetValue('update_at', $SQL->getNowTime())
                ->BuildQuery();
        }
    }else{
        $errorList['Messages'][$_date_index]['error'] = $DailyMessages["message"];
    }
    if($DailyMessages['apiPush']){ $MessageData['push'] = $MessageData['push'] + $DailyMessages['apiPush']; }
    if($DailyMessages['apiMulticast']){ $MessageData['multicast'] = $MessageData['multicast'] + $DailyMessages['apiMulticast']; }
    if($DailyMessages['apiReply']){ $MessageData['reply'] = $MessageData['reply'] + $DailyMessages['apiReply']; }
    
    $_date_index = date('Ymd', strtotime($_date_index . "+1 days"));
}
$MessageData['message'] = ($MessageData['push']>0 || $MessageData['multicast']>0) ? number_format($MessageData['push']+$MessageData['multicast']) : 0;
$LineCalculation = kCore_LineCalculation($MessageData['message'], 1);
$MessageData['dosage'] = $LineCalculation['dosage'];
$MessageData['base'] = $LineCalculation['base'];
$MessageData['add'] = $LineCalculation['add'];
$MessageData['total'] = $LineCalculation['total'];
$day1 = $_date_start;
$day2 = $_date_end;
$IntervalFriendsData = array();
$IntervalMessagesData = array();
$Adhesion = array();
if($day1 && $day2){
    $day1_Before = date('Ymd', strtotime($day1 . "-1 days"));
    $day2 = date('Ymd', strtotime($day2));
    $SQL_IntervalFriends = $SQL->SetAction("select")
                                ->SetWhere("tablename='line_analysis'")
                                ->SetWhere("next='friend'")
                                ->SetWhere("0 <= DATEDIFF(propertyA,'" . $day1_Before . "')")
                                ->SetWhere("0 >= DATEDIFF(propertyA,'" . $day2 . "')")
                                ->BuildQuery();
    $SQL_IntervalMessages = $SQL->SetAction("select")
                                ->SetWhere("tablename='line_analysis'")
                                ->SetWhere("next='message'")
                                ->SetWhere("0 <= DATEDIFF(propertyA,'" . $day1_Before . "')")
                                ->SetWhere("0 >= DATEDIFF(propertyA,'" . $day2 . "')")
                                ->BuildQuery();
    if($SQL_IntervalFriends){ $SQL_IntervalFriendsData = array_column($SQL_IntervalFriends, "subject", "propertyA"); }
    if($SQL_IntervalMessages){ $SQL_IntervalMessagesData = array_column($SQL_IntervalMessages, "subject", "propertyA"); }
    $date_ctn = $day1_Before;
    while ($date_ctn <= $day2 && $date_ctn < date('Ymd')) {
        $Daily = array(
            "type" => "delivery",
            "date" => $date_ctn
        );
        if($date_ctn != $day1_Before){
            $DailyInteractive = $SQL_LineRecord->SetAction("SELECT DISTINCT propertyA FROM LineRecord")
                                                ->SetWhere("tablename='line'")
                                                ->SetWhere("next='message'")
                                                ->SetWhere("propertyA!='Udeadbeefdeadbeefdeadbeefdeadbeef'")
                                                ->SetWhere("0 <= DATEDIFF(create_at,'" . $date_ctn . "')")
                                                ->SetWhere("0 >= DATEDIFF(create_at,'" . $date_ctn . "')")
                                                ->BuildQuery();
            if($DailyInteractive){
                $DailyInteractive = array_column($DailyInteractive, 'propertyA');
                foreach ($DailyInteractive as $key => $UID) {
                    $Adhesion[$UID] ++;
                }
            }
        }
        $_DailyFriends = $SQL_IntervalFriendsData[$date_ctn]['data'] ? $SQL_IntervalFriendsData[$date_ctn]['data'] : $line->GetNumberOfFollowers($Daily);
        if(!$_DailyFriends["message"]){
            if(!$SQL_IntervalFriendsData[$date_ctn]['data']){
                $SQL->SetAction("insert")
                    ->SetValue("tablename", "line_analysis")
                    ->SetValue("next", "friend")
                    ->SetValue("propertyA", $date_ctn)
                    ->SetValue("subject", json_encode(array("data" => $_DailyFriends)))
                    ->SetValue('create_at', $SQL->getNowTime())
                    ->SetValue('update_at', $SQL->getNowTime())
                    ->BuildQuery();
            }
            $YesterdayDate = date('Ymd', strtotime($date_ctn . "-1 days"));
            $YesterdayAddData = $IntervalFriendsData[$YesterdayDate]['effective'] ? $IntervalFriendsData[$YesterdayDate]['effective'] : 0;
            $YesterdayBlockData = $IntervalFriendsData[$YesterdayDate]['block'] ? $IntervalFriendsData[$YesterdayDate]['block'] : 0;
            $Add = ($_DailyFriends['targetedReaches']-$YesterdayAddData > 0) ? $_DailyFriends['targetedReaches']-$YesterdayAddData : 0;
            $Block = ($_DailyFriends['blocks']-$YesterdayBlockData > 0) ? $_DailyFriends['blocks']-$YesterdayBlockData : 0;
            $IntervalFriendsData[$date_ctn] = array(
                "total" => $_DailyFriends['followers'],
                "effective" => $_DailyFriends['targetedReaches'],
                "add" => $Add,
                "block" => $_DailyFriends['blocks'],
                "addblock" => $Block,
                "dailychanged" => $Add - $Block,
                "interactive" => count($DailyInteractive)
            );
        }else{
            $errorList['Friends'][$date_ctn] = array(
                "error" => $_DailyFriends["message"],
                "interactive" => count($DailyInteractive)
            );
        }
        
        $_DailyMessages = $SQL_IntervalMessagesData[$date_ctn]['data'] ? $SQL_IntervalMessagesData[$date_ctn]['data'] : $line->GetNumberOfSentMessages('insight', 'message', $Daily);
        if(!$_DailyMessages["message"]){
            if(!$SQL_IntervalMessagesData[$date_ctn]['data']){
                $SQL->SetAction("insert")
                    ->SetValue("tablename", "line_analysis")
                    ->SetValue("next", "message")
                    ->SetValue("propertyA", $date_ctn)
                    ->SetValue("subject", json_encode(array("data" => $_DailyMessages)))
                    ->SetValue('create_at', $SQL->getNowTime())
                    ->SetValue('update_at', $SQL->getNowTime())
                    ->BuildQuery();
            }
            if(!$IntervalMessagesData[$date_ctn]){
                $IntervalMessagesData[$date_ctn] = array(
                    "push" => 0,
                    "multicast" => 0,
                    "reply" => 0,
                );
            }
            if($_DailyMessages['apiPush']){ $IntervalMessagesData[$date_ctn]['push'] = $IntervalMessagesData[$date_ctn]['push'] + $_DailyMessages['apiPush']; }
            if($_DailyMessages['apiMulticast']){ $IntervalMessagesData[$date_ctn]['multicast'] = $IntervalMessagesData[$date_ctn]['multicast'] + $_DailyMessages['apiMulticast']; }
            if($_DailyMessages['apiReply']){ $IntervalMessagesData[$date_ctn]['reply'] = $IntervalMessagesData[$date_ctn]['reply'] + $_DailyMessages['apiReply']; }
        }else{
            $errorList['Messages'][$date_ctn]['error'] = $_DailyMessages["message"];
        }
        
        $date_ctn = date('Ymd', strtotime($date_ctn . "+1 days"));
    }
    if($IntervalFriendsData){
        unset($IntervalFriendsData[$day1_Before]);
        if($IntervalFriendsData){
            $IntervalFriendsData['總計'] = array(
                "total" => $IntervalFriendsData[array_keys($IntervalFriendsData)[count(array_keys($IntervalFriendsData))-1]]["total"],
                "effective" => $IntervalFriendsData[array_keys($IntervalFriendsData)[count(array_keys($IntervalFriendsData))-1]]["effective"],
                "add" => $IntervalFriendsData[array_keys($IntervalFriendsData)[count(array_keys($IntervalFriendsData))-1]]["effective"] - $IntervalFriendsData[array_keys($IntervalFriendsData)[0]]["effective"],
                "block" => $IntervalFriendsData[array_keys($IntervalFriendsData)[count(array_keys($IntervalFriendsData))-1]]["block"],
                "addblock" => $IntervalFriendsData[array_keys($IntervalFriendsData)[count(array_keys($IntervalFriendsData))-1]]["blocks"] - $IntervalFriendsData[array_keys($IntervalFriendsData)[0]]["blocks"],
                "dailychanged" => array_sum(array_column($IntervalFriendsData, "dailychanged")),
                "interactive" => count($Adhesion)
            );
            $_date_MonthStart = array_keys($IntervalFriendsData)[0];
            $_date_MonthEnd = array_keys($IntervalFriendsData)[count(array_keys($IntervalFriendsData))-2];
        }
    }
    if($IntervalMessagesData){
        unset($IntervalMessagesData[$day1_Before]);
        if($IntervalMessagesData){
            $IntervalMessagesData['總計'] = array(
                "push" => array_sum(array_column($IntervalMessagesData, "push")),
                "multicast" => array_sum(array_column($IntervalMessagesData, "multicast")),
                "reply" => array_sum(array_column($IntervalMessagesData, "reply")),
            );
        }
    }
    if($Adhesion && $IntervalFriendsData && $IntervalMessagesData){
        arsort($Adhesion);
        $SQL_LineMember = new kSQL('LineMember');
        $AdhesionData = $SQL_LineMember->SetAction("select")
                                        ->SetWhere("propertyA in ('". implode("','", array_keys($Adhesion)) ."')")
                                        ->SetOrderField("propertyA", array_keys($Adhesion))
                                        ->BuildQuery();
        if($AdhesionData){
            foreach ($AdhesionData as $key => $value) {
                $Ctn = $Adhesion[$value['propertyA']];
                $AdhesionData[$key]['count'] = $Ctn;
                $AdhesionData[$key]['percent'] = (count($IntervalMessagesData)>1) ? round($Ctn/(count($IntervalMessagesData)-1)*100, 1) : 0;
            }
        }
    }
}
if($errorList['Friends']){
    foreach ($errorList['Friends'] as $date => $value) {
        $IntervalFriendsData[$date] = array(
            "total" => "已達限制",
            "effective" => "已達限制",
            "add" => "已達限制",
            "block" => "已達限制",
            "addblock" => "已達限制",
            "dailychanged" => "已達限制",
            "interactive" => count($value['interactive'])
        );
    }
    ksort($IntervalFriendsData);
    $TmpFriendsTotal = $IntervalFriendsData['總計'];
    unset($IntervalFriendsData['總計']);
    $IntervalFriendsData['總計'] = $TmpFriendsTotal;
}
if($errorList['Messages']){
    foreach ($errorList['Messages'] as $date => $value) {
        $IntervalMessagesData[$date] = array(
            "push" => "已達限制",
            "multicast" => "已達限制",
            "reply" => "已達限制",
        );
    }
    ksort($IntervalMessagesData);
    $TmpMessagesTotal = $IntervalMessagesData['總計'];
    unset($IntervalMessagesData['總計']);
    $IntervalMessagesData['總計'] = $TmpMessagesTotal;
}
$TPL->assign('SearchMonth', $SearchMonth);
$TPL->assign('FriendData', $FriendData);
$TPL->assign('MessageData', $MessageData);
//print_r($IntervalFriendsData);
//print_r($IntervalMessagesData);
//print_r($AdhesionData);
$TPL->assign('MonthStart', $_date_MonthStart);
$TPL->assign('MonthEnd', $_date_MonthEnd);
$TPL->assign('IntervalFriendsData', $IntervalFriendsData);
$TPL->assign('IntervalMessagesData', $IntervalMessagesData);
$TPL->assign('AdhesionData', $AdhesionData);

$demographicSession = $_SESSION[__DOMAIN . 'demographic'];
$_query['token'] = (0) ? '6x+QNPjBrMjhLAzcdWpBQI8k79O6tI6OXrL166XcvZCaBZLCBFApDGPtDwrq3H4/zJh/imJK89T7REf1Z6OWvh6jObmAtFh3i1VmYTZ8HOarrbl93XO+Ih4nP+uMR1jtciY62V4O5hxDHPey8qbn4gdB04t89/1O/w1cDnyilFU=' : '';
$demographic = $demographicSession ? $demographicSession : $line->GetNumberOfSentMessages('insight', 'demographic', $_query);
if(!$demographicSession && $demographic){
    $_SESSION[__DOMAIN . 'demographic'] = $demographic;
}
$demographicList = array(
    "genders" => array(
        "type" => "gender",
        "name" => "性別",
        "percent" => "百分比",
        "title" => "好友性別比例(按比例)",
        "ChartTitle" => "性別",
    ),
    "ages" => array(
        "type" => "age",
        "name" => "年齡層",
        "percent" => "百分比",
        "title" => "好友年齡分布比例(按年齡層)",
        "ChartTitle" => "年齡層",
    ),
    "areas" => array(
        "type" => "area",
        "name" => "地區名稱",
        "percent" => "百分比",
        "title" => "好友區域分布比例(按比例)",
        "ChartTitle" => "地區名稱",
    ),
    "subscriptionPeriods" => array(
        "type" => "subscriptionPeriod",
        "name" => "持續追蹤時間",
        "percent" => "百分比",
        "title" => "持續追蹤時間區間比例(按持續追蹤時間)",
        "ChartTitle" => "持續追蹤時間",
    ),
    "appTypes" => array(
        "type" => "appType",
        "name" => "作業系統",
        "percent" => "百分比",
        "title" => "好友手機作業系統比例(按比例)",
        "ChartTitle" => "作業系統",
    ),
);
if($demographic['available']){
    unset($demographic['available']);
    $demographicNew = array();
    if($demographic['genders']){
        foreach ($demographic['genders'] as $key => $item) {
            $demographicNew['genders'][$item['gender']] = $item;
            switch ($item['gender']) {
                case 'male':
                    $demographicNew['genders'][$item['gender']]['gender'] = "男性";
                    break;
                case 'female':
                    $demographicNew['genders'][$item['gender']]['gender'] = "女性";
                    break;
                case 'unknown':
                    $demographicNew['genders'][$item['gender']]['gender'] = "未知";
                    break;
            }
        }
    }
    if($demographic['ages']){
        foreach ($demographic['ages'] as $key => $item) {
            $demographicNew['ages'][$item['age']] = $item;
            switch ($item['age']) {
                case 'from0to14':
                    $demographicNew['ages'][$item['age']]['age'] = "0~14";
                    break;
                case 'from15to19':
                    $demographicNew['ages'][$item['age']]['age'] = "15~19";
                    break;
                case 'from20to24':
                    $demographicNew['ages'][$item['age']]['age'] = "20~24";
                    break;
                case 'from25to29':
                    $demographicNew['ages'][$item['age']]['age'] = "25~29";
                    break;
                case 'from30to34':
                    $demographicNew['ages'][$item['age']]['age'] = "30~34";
                    break;
                case 'from35to39':
                    $demographicNew['ages'][$item['age']]['age'] = "35~39";
                    break;
                case 'from40to44':
                    $demographicNew['ages'][$item['age']]['age'] = "40~44";
                    break;
                case 'from45to49':
                    $demographicNew['ages'][$item['age']]['age'] = "45~49";
                    break;
                case 'from50':
                    $demographicNew['ages'][$item['age']]['age'] = "50~";
                    break;
                case 'unknown':
                    $demographicNew['ages'][$item['age']]['age'] = "不明";
                    break;
            }
        }
    }
    if($demographic['areas']){
        foreach ($demographic['areas'] as $key => $item) {
            $demographicNew['areas'][$item['area']] = $item;
            switch ($item['area']) {
                case 'unknown':
                    $demographicNew['areas'][$item['area']]['area'] = "不明";
                    break;
                default :
                    $demographicNew['areas'][$item['area']]['area'] = $item['area'];
                    break;
            }
        }
    }
    if($demographic['subscriptionPeriods']){
        foreach ($demographic['subscriptionPeriods'] as $key => $item) {
            switch ($item['subscriptionPeriod']) {
                case 'within7days':
                    $demographicNew['subscriptionPeriods'][7] = array(
                        "subscriptionPeriod" => "6天以下",
                        "percentage" => $item['percentage'],
                    );
                    break;
                case 'within30days':
                     $demographicNew['subscriptionPeriods'][30] = array(
                        "subscriptionPeriod" => "7~29天",
                        "percentage" => $item['percentage'],
                    );
                    break;
                case 'within90days':
                     $demographicNew['subscriptionPeriods'][90] = array(
                        "subscriptionPeriod" => "30~89天",
                        "percentage" => $item['percentage'],
                    );
                    break;
                case 'within180days':
                     $demographicNew['subscriptionPeriods'][180] = array(
                        "subscriptionPeriod" => "90~179天",
                        "percentage" => $item['percentage'],
                    );
                    break;
                case 'within365days':
                     $demographicNew['subscriptionPeriods'][365] = array(
                        "subscriptionPeriod" => "180~364天",
                        "percentage" => $item['percentage'],
                    );
                    break;
                case 'over365days':
                     $demographicNew['subscriptionPeriods'][366] = array(
                        "subscriptionPeriod" => "365天以上",
                        "percentage" => $item['percentage'],
                    );
                    break;
                case 'unknown':
                     $demographicNew['subscriptionPeriods']['unknown'] = array(
                        "subscriptionPeriod" => "不明",
                        "percentage" => $item['percentage'],
                    );
                    break;
            }
        }
    }
    if($demographic['appTypes']){
        foreach ($demographic['appTypes'] as $key => $item) {
            $demographicNew['appTypes'][$item['appType']] = $item;
            switch ($item['appType']) {
                case 'ios':
                    $demographicNew['appTypes'][$item['appType']]['appType'] = "Ios";
                    break;
                case 'android':
                    $demographicNew['appTypes'][$item['appType']]['appType'] = "Android";
                    break;
                case 'others':
                    $demographicNew['appTypes'][$item['appType']]['appType'] = "其他";
                    break;
            }
        }
    }
    
    if($demographicNew['genders']['unknown']){
        $unknown = $demographicNew['genders']['unknown'];
        unset($demographicNew['genders']['unknown']);
        $demographicNew['genders']['unknown'] = $unknown;
    }
    if($demographicNew['ages']['unknown']){
        $unknown = $demographicNew['ages']['unknown'];
        unset($demographicNew['ages']['unknown']);
        ksort($demographicNew['ages']);
        $demographicNew['ages']['unknown'] = $unknown;
    }
    if($demographicNew['areas']['unknown']){
        $unknown = $demographicNew['areas']['unknown'];
        unset($demographicNew['areas']['unknown']);
        $demographicNew['areas']['unknown'] = $unknown;
    }
    if($demographicNew['subscriptionPeriods']['unknown']){
        $unknown = $demographicNew['subscriptionPeriods']['unknown'];
        unset($demographicNew['subscriptionPeriods']['unknown']);
        ksort($demographicNew['subscriptionPeriods']);
        $demographicNew['subscriptionPeriods']['unknown'] = $unknown;
    }
    if($demographicNew['appTypes']['others']){
        $others = $demographicNew['appTypes']['others'];
        unset($demographicNew['appTypes']['others']);
        $demographicNew['appTypes']['others'] = $others;
    }
}else if($demographic['message']){
//    print_r($demographic);
    unset($demographic);
    $ErrorMsg = "由於原廠API限制，查詢數據次數已達限制，請於一個小時後進行重試。";
}else{
    unset($demographic);
    $ErrorMsg = "好友人數過少，無法使用此功能，若有疑問請洽Ricky";
}
//print_r($demographic);
//print_r($demographicNew);
//print_r($demographicList);

$ColorList = array(
    "#3366cc",
    "#dc3912",
    "#f56954",
    "#00a65a",
    "#f39c12",
    "#00c0ef",
    "#3c8dbc",
    "#d2d6de",
);
$TPL->assign('ColorList', $ColorList);

$quota = $line->getQuota();
$consumption = $line->getQuota('consumption');
$UseMsg = array(
    "used" => $consumption['totalUsage'],
    "total" => $quota['value'],
    "over" => $quota['value'] - $consumption['totalUsage'],
    "percent" => ($quota['value']==0) ? '0%' : round(($consumption['totalUsage']/$quota['value'])*100).'%',
);
$TPL->assign('UseMsg', $UseMsg);

$TPL->assign('demographic', $demographicNew);
$TPL->assign('demographicList', $demographicList);
$TPL->assign('ErrorMsg', $ErrorMsg);

$TPL->assign('rows', $rows);
$TPL->assign('WebhookStatus', $line->CheckWebhookStatus());

?>