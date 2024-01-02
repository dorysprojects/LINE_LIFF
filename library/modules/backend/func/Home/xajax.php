<?php

$xajax->register(XAJAX_FUNCTION, 'FilePutContents');

function FilePutContents($path=NULL, $val=NULL, $userID=NULL) {
    $objResponse = new xajaxResponse();
    if($val && $path && file_exists($path)){
        if(strpos($path, '__FB_Page_Token') !== false){
            $Version = 'v2.6';
            $LongLived_User_url = 'https://graph.facebook.com/'. $Version .'/oauth/access_token?grant_type=fb_exchange_token';
            $LongLived_User_url .= '&client_id=' . __FB_App_ID;
            $LongLived_User_url .= '&client_secret=' . __FB_App_Secret;
            $LongLived_User_url .= '&fb_exchange_token=' . $val;
            $LongLived_User_context = stream_context_create(array(
                "http" => array("method" => "GET", "ignore_errors" => true)
            ));
            $LongLived_User_AccessToken_State_Json = file_get_contents($LongLived_User_url, false, $LongLived_User_context);
            if($LongLived_User_AccessToken_State_Json){
                $LongLived_User_AccessToken_State = json_decode($LongLived_User_AccessToken_State_Json, true);
                if($LongLived_User_AccessToken_State['access_token']){
                    $LongLived_Page_url = 'https://graph.facebook.com/'. $Version .'/'. $userID .'/accounts?access_token=' . $LongLived_User_AccessToken_State['access_token'];
                    $LongLived_Page_context = stream_context_create(array(
                        "http" => array("method" => "GET", "ignore_errors" => true)
                    ));
                    $LongLived_Page_AccessToken_State_Json = file_get_contents($LongLived_Page_url, false, $LongLived_Page_context);
                    if($LongLived_Page_AccessToken_State_Json){
                        $LongLived_Page_AccessToken_State = json_decode($LongLived_Page_AccessToken_State_Json, true);
                        if($LongLived_Page_AccessToken_State['data'][0]['access_token']){
                            $Result = file_put_contents($path, $LongLived_Page_AccessToken_State['data'][0]['access_token']);
                        }
                    }
                }
            }
        }else{
            $Result = file_put_contents($path, $val);
        }
        
//        $objResponse->script("console.log('". json_encode($Result) ."');");
    }
    return $objResponse;
}

?>