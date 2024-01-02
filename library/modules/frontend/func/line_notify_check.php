<?php

if(empty($_GET['userId'])){
    $kLineLogin = new kLineLogin();
    header("Location: " . $kLineLogin->Authorization('line_notify_check', $_GET));
}else{
    $Request['response_type'] = 'code';
    $Request['client_id'] = __LineNotifyID;
    $Request['redirect_uri'] = __CustomStickers_Web . '/ft/line_notify_callback';
    $Request['state'] = urlencode(base64_encode($_GET['userId']));//allproducts
    $Request['scope'] = 'notify';
    header("Location: " . 'https://notify-bot.line.me/oauth/authorize?' . http_build_query($Request));
}

?>