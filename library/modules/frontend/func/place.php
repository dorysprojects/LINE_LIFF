<?php

/*
 * 使用API:
 *
 * google place search API (17 USD/1000 call)
 * google place details API (17 USD/1000 call)
 * google place photo API (7 USD/1000 call)
 * google Maps JavaScript API (7 USD/1000 call)
 * 100 USD Free  /  1 Month
 */

$SQL_LineMember = new kSQL('LineMember'); //資料庫物件
$SelectStroke = !empty($_SESSION[__DOMAIN][_Module]['SelectStroke']) ? $_SESSION[__DOMAIN][_Module]['SelectStroke'] : kCore_get('stroke');//選擇的旅程

/*
 * 誰可以看我的
 */
$SQL = new kSQL($_Module); //資料庫物件
$manager_list = $SQL->SetAction("select")
                    ->SetWhere("next='user'")//level
                    ->SetWhere("prev='". $userId ."'")//prevlevel
                    ->BuildQuery();

/*
 * 我可以看誰的
 */
$View_list = $SQL->SetAction("select")
                ->SetWhere("next='user'")//level
                ->SetWhere("propertyA='". $userId ."'")//userId
                ->BuildQuery();

$SelectList = array(
    $userId
);
$ManagerList = array(
    $userId => array(
        'subject' => $memberData[0]['subject']
    )
);
if(!empty($View_list)){
    $SelectList = array_merge($SelectList, array_column($View_list, 'prev'));
}
if(!empty($manager_list)){
    foreach ($manager_list as $key => $value) {
        $ManagerList[$value['propertyA']] = $value;
    }
}

$userRows = $SQL_LineMember->SetAction("select")
                            ->SetWhere("tablename='member'")
                            ->SetWhere("prev='line'")
                            ->SetWhere("next='myself'")
                            ->SetWhere("propertyA in ('". implode("','", $SelectList) ."')")//userId
                            ->BuildQuery();
$userList = array();
if(!empty($userRows)){
    foreach ($userRows as $key => $value) {
        $userList[$value['propertyA']] = $value;
    }
}

$GetStroke = $SQL->SetAction('select')
                ->SetWhere("tablename='place'")
                ->SetWhere("next='stroke'")
                ->SetWhere("propertyA in ('". implode("','", $SelectList) ."')")//userId
                ->BuildQuery();
if(!empty($SelectStroke) && !empty($GetStroke)){
    foreach ($GetStroke as $key => $value) {
        if($value['id']==$SelectStroke){
            $SelectStrokeItem = $value;
        }
    }
}
$SelectStrokeList = array();
if(!empty($SelectStrokeItem['subject']['stroke'])){
    foreach ($SelectStrokeItem['subject']['stroke'] as $key => $value) {
        if($value){
            foreach ($value as $key2 => $value2) {
                if(!in_array($value2, $SelectStrokeList)){
                    $SelectStrokeList[] = $value2;
                }
            }
        }
    }
}
$GetPlace = $SQL->SetAction('select')
                ->SetWhere("tablename='place'")
                ->SetWhere("next='myself'")
                ->SetWhere("propertyA in ('". implode("','", $SelectList) ."')")//userId
                //->SetWhere("propertyB in ('". implode("','", $SelectStrokeList) ."')", $SelectStrokeList ? 1 : 0)
                ->BuildQuery();
//print_r($GetPlace);
if(!empty($GetPlace)){
    foreach ($GetPlace as $key => $value) {
        $GetPlace[$key]['owner'] = ($value['propertyA']===$userId) ? 1 : 0;
        $place = $value['subject'];
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
                if(!empty($place['opening_hours']['periods'])){
                    $periods = array();
                    foreach ($place['opening_hours']['periods'] as $periodKey => $periodVal) {
                        $periods[$periodVal['open']['day']][] = array(
                            "open" => $periodVal['open']['time'].'00',
                            "close" => $periodVal['close']['time'].'00',
                        );
                    }
                    if(!empty($place['opening_hours']['weekday_text'])){
                        foreach ($place['opening_hours']['weekday_text'] as $weekdayKey => $weekdayVal) {
                            if(strpos($weekdayVal, '24 小時') !== false){
                                $periods[$weekdayKey] = array([
                                    "open" => '000000',
                                    "close" => '240000',
                                ]);
                            }
                        }
                    }
                    //print_r($periods);
                    $GetPlace[$key]['subject']['periods'] = $periods;
                    $successCtn = 0;
                    $NowWeekDay = date('w');
                    if(!empty($periods[$NowWeekDay])){
                        $Today = date('Ymd');
                        $Tomorrow = date('Ymd', strtotime($Today .' +1 day'));
                        $NowTime = $Today . date('His');
                        foreach ($periods[$NowWeekDay] as $TodayKey => $TodayVal) {
                            if($TodayVal['open']==='000000' && $TodayVal['close']==='240000'){
                                $successCtn ++;
                            }else{
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
                    }

                    $Text = ($successCtn>0) ? '營業中' : '休息中';
                    $Class = ($successCtn>0) ? 'success' : 'danger';
                    $Style = '';
                    $Ch_WeekDay = ($NowWeekDay>0) ? ($NowWeekDay-1) : 6;
                    $GetPlace[$key]['subject']['open_next'] = $place['opening_hours']['weekday_text'][$Ch_WeekDay];
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
        $GetPlace[$key]['subject']['open_now'] = '<span class="label label-'. $Class .'" style="'. $Style .'">'. $Text .'</span>';
    }
}
$TPL->assign('GetPlace', $GetPlace);
$TPL->assign('GetStroke', $GetStroke);
$TPL->assign('SelectStroke', $SelectStroke);
$TPL->assign('SelectStrokeItem', $SelectStrokeItem);
$TPL->assign('manager_list', $manager_list);
$TPL->assign('ManagerList', $ManagerList);
$TPL->assign('userList', $userList);
$TPL->assign('SelectStrokeList', $SelectStrokeList);
$TPL->assign('EditArea', kCore_get('EditArea'));