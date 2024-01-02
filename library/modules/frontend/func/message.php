<?php

//$SQL_flex_list = new kSQL('flex_list');
//$flex_list = $SQL_flex_list->SetAction("select")
//            ->SetWhere("NO!='0'")
//            ->SetOrder("NO ASC")
//            ->echoSQL(0)
//            ->BuildQuery();
//if($flex_list){
//    foreach ($flex_list as $key => $value) {
//        $subjects = json_encode(array(
//            "displayName" => $value['displayName'],
//            "pictureUrl" => $value['pictureUrl'],
//            "statusMessage" => $value['statusMessage'],
//        ));
//
//        $SQL->SetAction("insert")
//            ->SetValue("subject", $subjects)
//            ->SetValue("content", $value['flex_json'])
//            ->SetValue("propertyA", $value['userId'])
//            ->SetValue("create_at", $value['datetime'])
//            ->SetValue("viewA", $value['favorite'])
//            ->echoSQL(0)
//            ->BuildQuery();
//    }
//}

$family = array(
    "標楷體",
    "新細明體",
    "文鼎超明",
    "黑體",
    "宋體",
    "微軟雅黑",
);
$size = array(
    "xxs",
    "xs",
    "sm",
    "md",
    "lg",
    "xl",
    "xxl",
    "3xl",
    "4xl",
    "5xl"
);
$BubbleSize = array(
    "giga",
    "mega",
    "kilo",
    "micro",
    "nano"
);
$BubbleSizeZhTw = array(
    "giga" => "大",
    "mega" => "一般",
    "kilo" => "中",
    "micro" => "小",
    "nano" => "超小"
);

if (!empty($userId)) {
    $SQL = new kSQL($_Module); //資料庫物件
    $flex_list = $SQL->SetAction("select")
                    ->SetWhere("propertyA like '". $userId ."'")//userId
                    ->SetOrder("viewA DESC")//favorite
                    ->SetOrder("create_at DESC")////datetime
                    ->BuildQuery();
}

$TPL->assign('flex_list', $flex_list);
$TPL->assign('family', $family);
$TPL->assign('size', $size);
$TPL->assign('BubbleSize', $BubbleSize);
$TPL->assign('BubbleSizeZhTw', $BubbleSizeZhTw);

?>