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
    include_once(__ROOT . '/init.php');

    if(!empty($_GET['fileName'])){
        $fileName = $_GET['fileName'] . ".jpg";
        $tmp_name = $_FILES["PrevImage"]["tmp_name"];
        $UploadFile = move_uploaded_file($tmp_name, __ROOT_UPLOAD . '/image/' . $fileName);
    }else{
        date_default_timezone_set("Asia/Taipei");
        $fileName = "upload-" . date("YmdHis") . ".png";
        $filePath = '/sticker/' . $fileName;
        $tmp_name = $_FILES["fileData"]["tmp_name"];
        $UploadFile = move_uploaded_file($tmp_name, __ROOT_UPLOAD . $filePath);
        $imgur_result = __WEB_UPLOAD . $filePath;
        if($_POST['localfile'] === 'localfile'){
            $Link = $_SERVER['HTTP_REFERER'] . '&imgur_result=' . $imgur_result;
            echo "<script>location.href = '$Link';</script>";
        }else{
            echo $imgur_result;
        }
    }