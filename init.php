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
    if(!defined('__ROOT')){
        if($_SERVER['DOCUMENT_ROOT']){
            define('__ROOT', (substr($_SERVER['DOCUMENT_ROOT'], -1)==='/') ? $_SERVER['DOCUMENT_ROOT'] : $_SERVER['DOCUMENT_ROOT'].'/');
        }else{
            define('__ROOT', '/home1/'.__DOMAIN.'/');
        }
    }
    define('_SCHEME', $_SERVER['REQUEST_SCHEME'] ? $_SERVER['REQUEST_SCHEME'] : 'https');
    define('__CustomStickers', substr(__ROOT, 0, -1));
    define('__CustomStickers_Web', _SCHEME.'://' . __DOMAIN);
    session_start();
    date_default_timezone_set('Asia/Taipei');
    ini_set("display_errors", 1);
    ini_set("error_log", __CustomStickers."/error/error_log");

    $__Parameter = array(
        //Line Message API
            "__LineMessageAPIChannelID",//1559012149
            "__LineMessageAPISecret",//5c5d23e6e2751c6e034f0a177c6bfbbb
            "__LineMessageAPIAccessToken",//743tZ5/f5SiRstqPOcK1TNXi9rg/3hzYf/D8zjatrPdpH83SL0T/gLM7UpuOEQe+jNmfriGds1B92JQfXb5N+w5k8LV8tIHWUgI4jysrgNIZQeADEPVIrwXeD0huJwMnlyItUS/LT6WXqV2coF27BQdB04t89/1O/w1cDnyilFU=
        //Line Notify
            "__LineNotifyID",//560ocW2FdYCZWybSH6G7YF
            "__LineNotifySecret",//XTI2SL1emLYnI84W5Fg0Ztcl13DOj7ZMP9wfNGgQy51
            "__LogNotifyToken",//9ENnecwdm0QNqyFzV79jxFmVOIVPh8y9DGUzrKXF4Nv
        //Line Login
            "__LineLoginlID",//1594199820(舊)、1577298076(新)
            "__LineLoginSecret",//54c893788df580580863e908bf7d4bf8(舊)、11c361890297a9c1ca3a1e5b9c0d3c58(新)
        //LIFF清單
            "__LIFF_STICKER__ID",//手畫貼圖、1577298076-2Wx5MnW5
            "__LIFF_URLMSG__ID",//連結訊息、1577298076-pqZmOjbm
            "__LIFF_ANSWER__ID",//作答、1577298076-XJZGo8OG
        //Google API
            "__GoogleApiToken",//AIzaSyDy46gRmbARQkLnXcez_2q9lgZ0UpRftG8
        //Facebook API
            "__FB_App_ID",//768241837238690(舊)、2800659696869487(新)
            "__FB_App_Secret",//c98ee9dd677ade624f20355d03cad30e(舊)、d621e9569262c422c5c13682ff38ed3c(新)
            "__FB_Page_ID",//101189205177045
            "__FB_Page_Token",//EAAnzL2ZAeYG8BAP0vt19OrNb1g0EYNFl4l87rgGmGmyeCd5OPpqgzswEvIsZBAEZBg40DDQAcwb0uciPHeCTb4XeeGDsf3MOGWp7DZBVj8GZCfCZBsvelocpAd7TnBQdV99wv1MR4i1d3OoqABHYKm7zuBywqulDGtxH0UxXsjWHpZBHccd06UH
            "__FB_Page_Name",//第一個
            "__FB_Page_Picture",//https://scontent.ftpe8-2.fna.fbcdn.net/v/t1.30497-1/cp0/c15.0.50.50a/p50x50/84702798_579370612644419_4516628711310622720_n.png?_nc_cat=101&ccb=2&_nc_sid=dbb9e7&_nc_ohc=YEigpCIToTQAX8DRBu1&_nc_ht=scontent.ftpe8-2.fna&_nc_tp=30&oh=68e6ba989a003e99fd9429f487e6d32f&oe=60200097
    );
    if(!empty($__Parameter)){
        define("__Parameter", $__Parameter);
        foreach ($__Parameter as $__ParameterKey => $__ParameterValue) {
            define($__ParameterValue, file_get_contents(dirname(__FILE__).'/config/'.$__ParameterValue));
        }
    }

    //MySQL
    define("__DB_HOST", "localhost");//資料庫主機位置
    define("__DB_USER", "customer");//資料庫的使用帳號
    define("__DB_PWD", "allproducts");//資料庫的使用密碼
    define("__DB_NAME", 'Line_bot');//資料庫名稱

    //檔案路徑
    define("__ROOT_UPLOAD", __CustomStickers . '/upload');
    define("__SmartyTmp", __CustomStickers . '/SmartyTmp');
    define("__LIB", __CustomStickers . '/library');
    define("__PublicFunc", __LIB . "/modules/_public/func/");
    define("__PublicView", __LIB . "/modules/_public/view/");
    define("__BackendFunc", __LIB . "/modules/backend/func/");
    define("__BackendRes", __LIB . "/modules/backend/res/");
    define("__BackendView", __LIB . "/modules/backend/view/");
    define("__FrontendFunc", __LIB . "/modules/frontend/func/");
    define("__FrontendRes", __LIB . "/modules/frontend/res/");
    define("__FrontendView", __LIB . "/modules/frontend/view/");
    define("__CONFIG", __CustomStickers . '/config');
    define("__PLUGIN", __LIB . '/plugin');
    define("__RES", __LIB . '/res');
    define("__PUBLIC", __LIB . '/modules/_public');
    define("__CORE", __LIB . '/core');
    define("__LineMessageApi", __CORE . '/class/LineMessageApi');
    define("__FacebookMessageApi", __CORE . '/class/FacebookMessageApi');

    define("__WEB_UPLOAD", __CustomStickers_Web . '/upload');
    define("__LIBRARY", __CustomStickers_Web . '/library');
    define("__PLUGIN_Web", __LIBRARY . '/plugin');
    define("__RES_Web", __LIBRARY . '/res');

    include_once (__PLUGIN . '/smarty/class/Smarty.class.php');
    include_once (__PLUGIN . '/getid3/getid3.php');
    include_once __LIB . '/core/class.php';
    include_once __LIB . '/core/func.php';
    include_once __LIB . '/core/func/kGeohash.php';
    include_once __LineMessageApi . '/kLineMessaging.php';
    include_once __LineMessageApi . '/kLineLogin.php';
    include_once __LineMessageApi . '/FELX.php';
    include_once __LineMessageApi . '/class/TemplateClass.php';
    include_once __LineMessageApi . '/kLineLIFF.php';
    include_once __FacebookMessageApi . '/kFacebookMessageing.php';

    $facebook = new kFacebookMessaging();
    $line = new kLineMessaging();
    $BotInfo = $line->BotInfo();