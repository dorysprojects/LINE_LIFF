<?php
    /*
     * \init.php
     * \index.php
     * \LineCrontab.php
     * \config\LineFakeWebhook.php
     * \library\core\func\kPrewPic.php
     * 
     * \library\plugin\analytics\src\analyze.js
     * \library\plugin\flex\main.js
     */
    define('__DOMAIN', $_SERVER['SERVER_NAME'] ? $_SERVER['SERVER_NAME'] : explode('/', explode('/home1/', __DIR__)[1])[0]);
    if(!defined('__ROOT')){
        if($_SERVER['DOCUMENT_ROOT']){
            define('__ROOT', (substr($_SERVER['DOCUMENT_ROOT'], -1)==='/') ? $_SERVER['DOCUMENT_ROOT'] : $_SERVER['DOCUMENT_ROOT'].'/');
        }else{
            define('__ROOT', '/home1/'.__DOMAIN.'/');
        }
    }
    include_once(__ROOT . 'init.php');
    
    $line = new kLineMessaging();
    $SQL_CrontabMsg = new kSQL('CrontabMsg');
    $CrontabMsg = $SQL_CrontabMsg->SetAction('select')
                                ->SetWhere("tablename='CrontabMsg'")
                                ->SetWhere("next='myself'")
                                ->SetWhere("viewA='on'")
                                ->SetWhere("propertyA='now' OR (propertyA='date' AND propertyB!='' AND propertyC!='' AND propertyB='".date('Y-m-d')."' AND propertyC='".date('H:i')."')")
                                ->SetWhere("viewB!='on' OR viewB IS NULL")
                                ->echoSQL(0)
                                ->BuildQuery();
    if($CrontabMsg){
        foreach ($CrontabMsg as $key => $crontab) {
            $SQL_CrontabMsg = new kSQL('CrontabMsg');
            $state_Msg = $SQL_CrontabMsg->SetAction('update')
                                        ->SetWhere("id='".$crontab['id']."'")
                                        ->SetValue("viewB", "on")//已排程發送
                                        ->SetValue("propertyE", date('Y-m-d H:i:s'))//發送 開始時間
                                        ->BuildQuery();
            $state = array();
            if(!empty($state_Msg)){
                $crontab['content'] = !empty($crontab['content']) ? $crontab['content'] : array();
                $line->SetMessages($crontab, 'push');
                $SendFlag = true;
                $FilterMemberList = array();
                if(!empty($crontab['content']['filter'])){
                    $context = stream_context_create(array(
                        "http" => array("method" => "POST", "header" => implode(PHP_EOL, ["Content-Type: application/json"]), "content" => json_encode(array(
                            "fields" => array(
                                "content" => array(
                                    "filter" => $crontab['content']['filter'],
                                ),
                            )
                        )), "ignore_errors" => true)
                    ));
                    $EstimatedProcessState = json_decode(file_get_contents(__CustomStickers_Web . '/be/System/process/ps/EstimatedProcess', false, $context), true);
                    $FilterMemberList = $EstimatedProcessState['FilterMemberList'];
                    $SendFlag = !empty($FilterMemberList) ? true : false;
                }
                if($SendFlag){
                    $crontab['content']['FilterMembers'] = $EstimatedProcessState['FilterMembers'];
                    $crontab['content']['AllMembers'] = $EstimatedProcessState['AllMembers'];
                    $crontab['content']['FilterMemberList'] = $EstimatedProcessState['FilterMemberList'];
                    $crontab['content']['AllMemberList'] = $EstimatedProcessState['AllMemberList'];
                    $state = $line->multicast($FilterMemberList);
                }else{
                    $SQL_CrontabMsg->SetAction('update')
                                    ->SetWhere("id='".$crontab['id']."'")
                                    ->SetValue("propertyD", date('Y-m-d H:i:s'))//發送 結束時間
                                    ->BuildQuery();
                }

                if ($SendFlag && !empty($state['LogList']) && !empty($crontab['id'])) {
                    $CtnResult = $line->CountSuccessRate($state['total'], $state['SendCount'], $state['fail']);
                    $crontab['content']['total'] = $CtnResult['total'];
                    $crontab['content']['SendCount'] = $CtnResult['SendCount'];
                    $crontab['content']['failList'] = $state['failList'];//失敗清單
                    $crontab['content']['fail'] = $CtnResult['fail'];//失敗人數
                    $crontab['content']['success'] = $CtnResult['success'];//成功人數
                    $crontab['content']['SuccessRate'] = $CtnResult['SuccessRate'];//成功率
                    $crontab['content']['LogList'] = $state['LogList'];//各Log的Node
                    $SQL_CrontabMsg->SetAction('update')
                                    ->SetWhere("id='".$crontab['id']."'")
                                    ->SetValue("propertyD", date('Y-m-d H:i:s'))//發送 結束時間
                                    ->SetValue('content', json_encode($crontab['content']))
                                    ->BuildQuery();
                }
            }
        }
    }
    
    $update_at = date('Y-m-d H:i:s');
    /*
     * 定期刪「FLEX測試」的解析檔案
     * //定期刪「線上客服、進階客服」的解析檔案(影片、語音訊息)
     */
    $ContentIdFolder = __ROOT_UPLOAD . "/contentId/"; // /home1/{DOMAIN}/...
    if (substr($update_at, 11, 5) == '03:00' && is_dir($ContentIdFolder)) {//每天凌晨3點執行
        if ($dh1 = opendir($ContentIdFolder)) {
            while (($ContentIdFileName = readdir($dh1)) !== false) {
                $ContentIdFilePath = $ContentIdFolder . $ContentIdFileName; //檔案路徑
                $ContentIdFileType = filetype($ContentIdFilePath); //File(檔案)、Dir(資料夾)
                if ($ContentIdFileType !== "dir" && file_exists($ContentIdFilePath)) {//如果Type不是資料夾，且檔案存在，則刪除檔案
                    unlink($ContentIdFilePath);
                }
            } closedir($dh1);
        }
    }

    /**
     * 加入其他排程檔案
     */
    $CrontabFolder = __CustomStickers . '/crontab/';
    if (is_dir($CrontabFolder)) {
        if ($dh1 = opendir($CrontabFolder)) {
            while (($CrontabFileName = readdir($dh1)) !== false) {
                $CrontabFilePath = $CrontabFolder . $CrontabFileName; //檔案路徑
                if(filetype($CrontabFilePath) === "dir"){
                    $CustomCrontabFolder = $CrontabFilePath . '/';
                    if (is_dir($CustomCrontabFolder)) {
                        if ($dh2 = opendir($CustomCrontabFolder)) {
                            while (($CustomFileName = readdir($dh2)) !== false) {
                                $CustomFilePath = $CustomCrontabFolder . $CustomFileName; //檔案路徑
                                if (filetype($CustomFilePath) !== "dir" && file_exists($CustomFilePath)) {
                                    include_once $CustomFilePath;
                                }
                            } closedir($dh2);
                        }
                    }
                }else if (file_exists($CrontabFilePath)) {
                    include_once $CrontabFilePath;
                }
            } closedir($dh1);
        }
    }

?>