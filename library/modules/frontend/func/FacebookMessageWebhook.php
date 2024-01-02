<?php

if(!$Webhooks_decode){
    $http_header = array_merge(array(), getallheaders());
    $Webhooks = file_get_contents("php://input");
    $Webhooks_decode = json_decode($Webhooks, true);
}

if (!empty($_REQUEST['hub_mode']) && $_REQUEST['hub_mode'] == 'subscribe') {
    if($_REQUEST['hub_verify_token'] == $facebook->Authorization_code) {
        echo $_REQUEST['hub_challenge'];
        exit;
    }
}else{
    header('HTTP/1.0 200 OK', true, 200);
    header("Connection: Close");
    include(dirname(__FILE__).'/FacebookKeyWord.php');
}

?>