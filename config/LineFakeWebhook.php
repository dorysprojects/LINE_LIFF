#!/usr/bin/php -q
<?php
    
    $Webhooks_decode = ($argv[1]) ? json_decode($argv[1]) : array();
    $Path = explode('/', __FILE__);
    $_SERVER['DOCUMENT_ROOT'] = '/' . $Path[1] . '/' . $Path[2] . '/';
    $_SERVER['SERVER_NAME'] = $Path[2];
    $_SERVER['HTTPS'] = 'https://';
    
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
    
    include_once __FrontendFunc . 'LineMessageWebhook.php';
    
?>