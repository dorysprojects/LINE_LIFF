<?php

//$DBlink = mysqli_connect(__DB_HOST, __DB_USER, __DB_PWD) or die('連線失敗!!');
//mysqli_select_db($DBlink, __DB_NAME);
//mysqli_query($DBlink, "ALTER TABLE note MODIFY prev varchar(255)");
//
//$SQL_note_list = new kSQL('note_list');
//$note_list = $SQL_note_list->SetAction("select")
//            ->SetWhere("NO!='0'")
//            ->SetOrder("NO ASC")
//            ->echoSQL(0)
//            ->BuildQuery();
//if($note_list){
//    foreach ($note_list as $key => $value) {
//        $subjects = json_encode(array(
//            "displayName" => $value['displayName'],
//            "pictureUrl" => $value['pictureUrl'],
//            "statusMessage" => $value['statusMessage'],
//        ));
//
//        $SQL->SetAction("insert")
//            ->SetValue("id", $value['NO'])
//            ->SetValue("subject", $subjects)
//            ->SetValue("prev", $value['prevlevel'])
//            ->SetValue("next", $value['level'])
//            ->SetValue("propertyA", $value['userId'])
//            ->SetValue("propertyB", $value['name'])
//            ->SetValue("propertyC", $value['data'])
//            ->SetValue("create_at", $value['datetime'])
//            ->SetValue("viewA", $value['favorite'])
//            ->echoSQL(0)
//            ->BuildQuery();
//    }
//}

if (!empty($userId)) {
    $SQL = new kSQL($_Module); //資料庫物件
    /*
     * 誰可以看我的
     */
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
    if($View_list){
        $SelectList = array_column($View_list, 'prev');
    }
    $SelectList[] = $userId;

    /*
     * 筆記
     */
    $allList = $SQL->SetAction("select")
                ->SetWhere("propertyA in ('". implode("','", $SelectList) ."')")//userId
                ->SetOrder("viewA DESC")//favorite
                ->SetOrder("create_at DESC")//datetime
                ->BuildQuery();
    $category_list = array();
    $subcategory_list = array();
    $note_list = array();
    if($allList){
        foreach ($allList as $key => $value) {
            switch ($value['next']) {
                case 'category':
                    $category_list[] = $value;
                    break;
                case 'subcategory':
                    $subcategory_list[] = $value;
                    break;
                case 'note':
                    $note_list[] = $value;
                    break;
            }
        }
    }
}

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

$TPL->assign('manager_list', $manager_list);
$TPL->assign('View_list', $View_list);
$TPL->assign('category_list', $category_list);
$TPL->assign('subcategory_list', $subcategory_list);
$TPL->assign('note_list', $note_list);

$TPL->assign('family', $family);
$TPL->assign('size', $size);
$TPL->assign('BubbleSize', $BubbleSize);
$TPL->assign('BubbleSizeZhTw', $BubbleSizeZhTw);