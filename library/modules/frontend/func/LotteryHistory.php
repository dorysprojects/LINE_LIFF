<?php

$_ROOT_Lottery = __ROOT_UPLOAD.'/lottery';
$_WEB_Lottery = __WEB_UPLOAD.'/lottery';
$YearList = array(
    "2014",
    "2015",
    "2016",
    "2017",
    "2018",
    "2019",
    "2020",
);
$LotteryTotalList = array(
    "威力彩" => array(
                        //遊戲名稱、期別、 開獎日期、銷售總額、銷售注數、總獎金、 獎號1、 獎號2、 獎號3、 獎號4、 獎號5、 獎號6、第二區
        "column" => array('name', 'period', 'date', 'price',   'note',   'bonus', 'num1', 'num2', 'num3', 'num4', 'num5', 'num6', 'numS'),
        "open" => array(1, 4),
    ),
    "38樂合彩" => array(
                        //遊戲名稱、期別、 開獎日期、銷售總額、銷售注數、總獎金、 獎號1、 獎號2、 獎號3、 獎號4、 獎號5、 獎號6
        "column" => array('name', 'period', 'date', 'price',   'note',   'bonus', 'num1', 'num2', 'num3', 'num4', 'num5', 'num6'),
        "open" => array(1, 4),
    ),
    "大福彩" => array(
                        //遊戲名稱、期別、 開獎日期、銷售總額、銷售注數、總獎金、 獎號1、 獎號2、 獎號3、 獎號4、 獎號5、 獎號6、 獎號7、特別號
        "column" => array('name', 'period', 'date', 'price',   'note',   'bonus', 'num1', 'num2', 'num3', 'num4', 'num5', 'num6', 'num7', 'numS'),
        "open" => array(),
    ),
    "大樂透" => array(
                        //遊戲名稱、期別、 開獎日期、銷售總額、銷售注數、總獎金、 獎號1、 獎號2、 獎號3、 獎號4、 獎號5、 獎號6、特別號
        "column" => array('name', 'period', 'date', 'price',   'note',   'bonus', 'num1', 'num2', 'num3', 'num4', 'num5', 'num6', 'numS'),
        "open" => array(2, 5),
    ),
    "大樂透加開獎項" => array(
                        //活動名稱、期別、 開獎日期、銷售總額、銷售注數、總獎金、 獎號1、 獎號2、 獎號3、 獎號4、 獎號5、 獎號6
        "column" => array('name', 'period', 'date', 'price',   'note',   'bonus', 'num1', 'num2', 'num3', 'num4', 'num5', 'num6'),
        "open" => array(2, 5),
    ),
    "49樂合彩" => array(
                        //遊戲名稱、期別、 開獎日期、銷售總額、銷售注數、總獎金、 獎號1、 獎號2、 獎號3、 獎號4、 獎號5、 獎號6
        "column" => array('name', 'period', 'date', 'price',   'note',   'bonus', 'num1', 'num2', 'num3', 'num4', 'num5', 'num6'),
        "open" => array(2, 5),
    ),
    "雙贏彩" => array(
                        //遊戲名稱、期別、 開獎日期、銷售總額、銷售注數、總獎金、 獎號1、 獎號2、 獎號3、 獎號4、 獎號5、 獎號6、 獎號7、 獎號8、 獎號9、 獎號10、 獎號11、 獎號12
        "column" => array('name', 'period', 'date', 'price',   'note',   'bonus', 'num1', 'num2', 'num3', 'num4', 'num5', 'num6', 'num7', 'num8', 'num9', 'num10', 'num11', 'num12'),
        "open" => array(1, 2, 3, 4, 5, 6),
    ),
    "今彩539" => array(
                        //遊戲名稱、期別、 開獎日期、銷售總額、銷售注數、總獎金、 獎號1、 獎號2、 獎號3、 獎號4、 獎號5
        "column" => array('name', 'period', 'date', 'price',   'note',   'bonus', 'num1', 'num2', 'num3', 'num4', 'num5'),
        "open" => array(1, 2, 3, 4, 5, 6),
    ),
    "39樂合彩" => array(
                        //遊戲名稱、期別、 開獎日期、銷售總額、銷售注數、總獎金、 獎號1、 獎號2、 獎號3、 獎號4、 獎號5
        "column" => array('name', 'period', 'date', 'price',   'note',   'bonus', 'num1', 'num2', 'num3', 'num4', 'num5'),
        "open" => array(1, 2, 3, 4, 5, 6),
    ),
    "3星彩" => array(
                        //遊戲名稱、期別、 開獎日期、銷售總額、銷售注數、總獎金、 獎號1、 獎號2、 獎號3
        "column" => array('name', 'period', 'date', 'price',   'note',   'bonus', 'num1', 'num2', 'num3'),
        "open" => array(1, 2, 3, 4, 5, 6),
    ),
    "4星彩" => array(
                        //遊戲名稱、期別、 開獎日期、銷售總額、銷售注數、總獎金、 獎號1、 獎號2、 獎號3、 獎號4
        "column" => array('name', 'period', 'date', 'price',   'note',   'bonus', 'num1', 'num2', 'num3', 'num4'),
        "open" => array(1, 2, 3, 4, 5, 6),
    ),
//    "賓果賓果" => array(
//                        //遊戲名稱、期別、 開獎日期、銷售總額、銷售注數、總獎金、 獎號1、 獎號2、 獎號3、 獎號4、 獎號5、 獎號6、 獎號7、 獎號8、 獎號9、 獎號10、 獎號11、 獎號12、 獎號13、 獎號14、 獎號15、 獎號16、 獎號17、 獎號18、 獎號19、 獎號20、 超級獎號、 猜大小、  猜單雙
//        "column" => array('name', 'period', 'date', 'price',   'note',   'bonus', 'num1', 'num2', 'num3', 'num4', 'num5', 'num6', 'num7', 'num8', 'num9', 'num10', 'num11', 'num12', 'num13', 'num14', 'num15', 'num16', 'num17', 'num18', 'num19', 'num20', 'numS',    'size', 'OddEven'),
//        "open" => array(0, 1, 2, 3, 4, 5, 6),
//    ),
);
$LotteryColumnList = array(
    'numS' => array(
        "威力彩" => "第二區",
        "大福彩" => "特別號",
        "大樂透" => "特別號",
        "賓果賓果" => "超級獎號",
    ),
    'size' => array(
        "賓果賓果" => "猜大小",
    ),
    'OddEven' => array(
        "賓果賓果" => "猜單雙",
    ),
);
$ColumnTranslateList = array(
    "name" => "遊戲名稱",
    "period" => "期別",
    "date" => "開獎日期",
    "price" => "銷售總額",
    "note" => "銷售注數",
    "bonus" => "總獎金",
    "num1" => "獎號1",
    "num2" => "獎號2",
    "num3" => "獎號3",
    "num4" => "獎號4",
    "num5" => "獎號5",
    "num6" => "獎號6",
    "num7" => "獎號7",
    "num8" => "獎號8",
    "num9" => "獎號9",
    "num10" => "獎號10",
    "num11" => "獎號11",
    "num12" => "獎號12",
    "num13" => "獎號13",
    "num14" => "獎號14",
    "num15" => "獎號15",
    "num16" => "獎號16",
    "num17" => "獎號17",
    "num18" => "獎號18",
    "num19" => "獎號19",
    "num20" => "獎號20",
);

$rows = $SQL->SetAction('select')
            ->SetWhere("tablename='LotteryHistory'")
            ->SetWhere("next='myself'")
            ->SetOrder("id ASC")
            ->BuildQuery();
$YearColumn = array_column($rows, 'prev1');
$LotteryList = array();
if($YearList){
    foreach ($YearList as $key => $Year) {
        if(!$YearColumn || !in_array($Year, $YearColumn)){
            if (is_dir($_ROOT_Lottery)) {
                $YearFilePath = $_ROOT_Lottery.'/'.$Year;
                if(file_exists($YearFilePath)){
                    $YearFileType = filetype($YearFilePath);
                    if ( $YearFileType==="dir" && $Year!=="." && $Year!=="..") {
                        if ($dh2 = opendir($YearFilePath)) {
                            $LotteryList[$Year] = array();
                            while (($Lottery = readdir($dh2)) !== false) {
                                $LotteryTmp = explode('_', $Lottery);
                                $LotteryFilePath = $YearFilePath.'/'.$Lottery;
                                if(in_array($LotteryTmp[0], array_keys($LotteryTotalList)) && file_exists($LotteryFilePath)){
                                    $LotteryFileType = filetype($LotteryFilePath);
                                    if($LotteryFileType=='file'){
                                        $LotteryList[$Year][] = $Lottery;
                                    }
                                }
                            } closedir($dh2);
                        }
                    }
                }
            }
        }
    }
}
$LotteryTypeList = array();
if($LotteryList){
    ini_set("memory_limit", "5000M");
    $DBlink = mysqli_connect(__DB_HOST, __DB_USER, __DB_PWD) or die('連線失敗!!');
    mysqli_select_db($DBlink, __DB_NAME);
    mysqli_query($DBlink, "ALTER TABLE LotteryHistory MODIFY subject MEDIUMTEXT");//TEXT、MEDIUMTEXT、LONGTEXT
    foreach ($LotteryList as $Year => $LotteryVal) {
        if($LotteryVal){
            foreach ($LotteryVal as $key => $Lottery) {
                $LotteryTypeTmp = explode('_', $Lottery);
                $LotteryType = $LotteryTypeTmp[0];
                $LotteryFilePath = $_WEB_Lottery . '/'. $Year .'/' . $Lottery;
                $LotteryContent = explode("\n", file_get_contents($LotteryFilePath));
                if($LotteryContent){
                    foreach ($LotteryContent as $key => $value) {
                        if($key!=0){
                            $Column = explode(',', $value);
                            if($Column[0] && $LotteryTotalList[$LotteryType]['column']){
                                $Row = array();
                                foreach ($LotteryTotalList[$LotteryType]['column'] as $columnKey => $columnVal) {
                                    $Row[$columnVal] = $Column[$columnKey];
                                }
                                $LotteryTypeList[$Year][$LotteryType][] = $Row;
                            }
                        }
                    }
                }
            }
        }
    }
}
if($LotteryTypeList){
    foreach ($LotteryTypeList as $Year => $value) {
        foreach ($value as $LotteryType => $Lottery) {
//            if($Lottery){
//                foreach ($Lottery as $LotteryKey => $LotteryValue) {
                    $row = array(
                        'subject' => json_encode($Lottery),//獎號1~20、特別號、超級獎號、猜大小、猜單雙
//                        'subject' => json_encode($LotteryValue),//獎號1~20、特別號、超級獎號、猜大小、猜單雙
//                        'node' => $LotteryValue['period'],//期別
                        'propertyA' => $LotteryType,//【活動名稱、遊戲名稱】-by 檔名
//                        'propertyB' => $LotteryValue['date'],//開獎日期
//                        'propertyC' => $LotteryValue['name'],//活動名稱、遊戲名稱 -by CSV欄位內容
                        'prev1' => $Year,//【2014 ~ 2020】
//                        'prev2' => $LotteryValue['price'],//銷售總額
//                        'prev3' => $LotteryValue['note'],//銷售注數
//                        'prev4' => $LotteryValue['bonus'],//總獎金
                        'create_at' => $SQL->getNowTime(),
                        'update_at' => $SQL->getNowTime(),
                    );
                    $SQL->SetAction('insert');
                    foreach ($row as $rowKey => $rowValue) {
                        $SQL->SetValue($rowKey, $rowValue);
                    }
                    $InsertState = $SQL->BuildQuery();

                    $row['subject'] = json_decode($row['subject'], true);
                    $rows[] = $row;
//                }
//            }
        }
    }
}

$NotBallColumn = array('name', 'period', 'date', 'price', 'note', 'bonus', 'size', 'OddEven');

$GameName = !empty($_SESSION[__DOMAIN][_Module]['GameName']) ? $_SESSION[__DOMAIN][_Module]['GameName'] : '大樂透';//大樂透
$GameYear = !empty($_SESSION[__DOMAIN][_Module]['GameYear']) ? $_SESSION[__DOMAIN][_Module]['GameYear'] : 'total';//total
$GameNum = $_SESSION[__DOMAIN][_Module]['GameNum'];//獎號
$Data = array();
$ProbabilityList = array();
$RowsData = array();
if($rows){
    foreach ($rows as $key1 => $value) {
        if($value['subject']){
            $Data['totalgameCtn'][$value['propertyA']]['total'] += count($value['subject']);
            $Data['totalgameCtn'][$value['propertyA']][$value['prev1']] += count($value['subject']);
            foreach ($value['subject'] as $skey => $subject) {
                $RowsData[$value['propertyA']][$value['prev1']][] = $subject;
                if($LotteryTotalList[$value['propertyA']] && $LotteryTotalList[$value['propertyA']]['column']){
                    foreach ($LotteryTotalList[$value['propertyA']]['column'] as $ckey => $column) {
                        if($subject[$column] && !in_array($column, $NotBallColumn)){
                            $numKey = 'num'; //num1 ~ num20
                            $BallNum = (substr($subject[$column], 1)!='0'&&($subject[$column]*1)<10) ? $subject[$column] : substr('0'.$subject[$column]*1, -2);
                            switch($column){
                                case 'numS':
                                case 'size':
                                case 'OddEven':
                                    $numKey = $column;
                                    break;
                            }
                            
                            $Data['totalnoteCtn'][$value['propertyA']][$numKey]['total'] += $BallNum;
                            $Data['totalnoteCtn'][$value['propertyA']][$numKey][$value['prev1']] += $BallNum;
                            
                            $Data['totalnumCtn'][$value['propertyA']][$numKey]['total']++;
                            $Data['totalnumCtn'][$value['propertyA']][$numKey][$value['prev1']]++;
                            
                            $Data[$value['propertyA']][$numKey]['total'][$BallNum]++;
                            $Data[$value['propertyA']][$numKey][$value['prev1']][$BallNum]++;
                        }
                    }
                }
            }
        }
    }
}

if($Data[$GameName]){
    foreach ($Data[$GameName] as $numKey => $numVal) {
        if($numVal[$GameYear]){
            foreach ($numVal[$GameYear] as $num => $ctn) {
                $ProbabilityList[$numKey][$num] = array(
                    "key" => $num,//號碼
                    "ctn" => $ctn,//$GameName遊戲 $GameYear年的 開獎次數
                    "totalnoteCtn" => $Data['totalnoteCtn'][$GameName][$numKey][$GameYear],//數值總和
                    "totalnumCtn" => $Data['totalnumCtn'][$GameName][$numKey][$GameYear],//總次數
                    "totalgameCtn" => $Data['totalgameCtn'][$GameName][$GameYear],//$GameName遊戲 $GameYear年的 總場數
                    "noteCtn" => round(($Data['totalnoteCtn'][$GameName][$numKey][$GameYear]/$Data['totalnumCtn'][$GameName][$numKey][$GameYear])),// 平均
                    "num" => round(($ctn/$Data['totalnumCtn'][$GameName][$numKey][$GameYear])*100, 3),// 開獎率(開獎次數/總次數)
                    "game" => round(($ctn/$Data['totalgameCtn'][$GameName][$GameYear])*100, 3),// 出場率(開獎次數/總場數)
                );
            }
        }
    }
}

if($ProbabilityList){
    foreach ($ProbabilityList as $numKey => $num) {
        usort($ProbabilityList[$numKey], 'CustomSort');
    }
}

function CustomSort($a=NULL, $b=NULL, $SelectSort=NULL, $SortWay=NULL) {
    $SelectSort = !empty($_SESSION[__DOMAIN][_Module]['SelectSort']) ? $_SESSION[__DOMAIN][_Module]['SelectSort'] : 'ctn';//$ProbabilityList 的 Key清單
    $SortWay = !empty($_SESSION[__DOMAIN][_Module]['SortWay']) ? $_SESSION[__DOMAIN][_Module]['SortWay'] : 'desc';//desc、asc
    $MV_Front = ($SortWay=='asc') ? -1 : 1;
    $MV_Back = ($SortWay=='asc') ? 1 : -1;
    if($a[$SelectSort] === $b[$SelectSort]){
        return ($a['key'] > $b['key']) ? $MV_Front : $MV_Back;
    }else{
        return ($a[$SelectSort] > $b[$SelectSort]) ? $MV_Back : $MV_Front;
    }
}

$ColorList = array(
    "#001F3F",//獎號1
    "#3D9970",//獎號2
    "#dd4b39",//獎號3
    "#3366cc",//獎號4
    "#00c0ef",//獎號5
    "#f39c12",//獎號6
    "#111",//獎號7
    "#dc3912",//獎號8
    "#3c8dbc",//獎號9
    "#00a65a",//獎號10
    "#f56954",//獎號11
);
$TPL->assign('ColorList', $ColorList);

//print_r($NumList);

$TPL->assign('GameName', $GameName);
$TPL->assign('GameYear', $GameYear);
$TPL->assign('GameNum', $GameNum);
$TPL->assign('YearList', $YearList);
$TPL->assign('NotBallColumn', $NotBallColumn);
$TPL->assign('ColumnTranslateList', $ColumnTranslateList);
$TPL->assign('RowsData', $RowsData);
$TPL->assign('LotteryTotalList', $LotteryTotalList);
$TPL->assign('LotteryColumnList', $LotteryColumnList);

$TPL->assign('rows', $rows);
$TPL->assign('Data', $Data);
$TPL->assign('ProbabilityList', $ProbabilityList);

?>