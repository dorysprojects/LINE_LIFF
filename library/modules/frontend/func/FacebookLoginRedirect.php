<?php

if($_GET['code']){
    $RequestData['grant_type'] = 'authorization_code';
    $RequestData['code'] = $_GET['code'];
    $RequestData['redirect_uri'] = __CustomStickers_Web . '/ft/FacebookLoginRedirect';
    $RequestData['client_id'] = __FB_App_ID;
    $RequestData['client_secret'] = __FB_App_Secret;
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://graph.facebook.com/v10.0/oauth/access_token?' . http_build_query($RequestData),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ));
    $response_jsonTmp = curl_exec($curl);
    $GetAccessToken = json_decode($response_jsonTmp, true);
    $err = curl_error($curl);
    curl_close($curl);
}

//if($GetAccessToken['access_token']){
//    $RequestData['grant_type'] = 'fb_exchange_token';
//    $RequestData['fb_exchange_token'] = $GetAccessToken['access_token'];
//    $RequestData['redirect_uri'] = __CustomStickers_Web . '/ft/FacebookLoginRedirect';
//    $RequestData['client_id'] = __FB_App_ID;
//    $RequestData['client_secret'] = __FB_App_Secret;
//
//    $curl = curl_init();
//    curl_setopt_array($curl, array(
//        CURLOPT_URL => 'https://graph.facebook.com/v10.0/oauth/access_token?' . http_build_query($RequestData),
//        CURLOPT_RETURNTRANSFER => true,
//        CURLOPT_ENCODING => "",
//        CURLOPT_MAXREDIRS => 10,
//        CURLOPT_TIMEOUT => 30,
//        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//        CURLOPT_CUSTOMREQUEST => "GET",
//    ));
//    $response_jsonTmp = curl_exec($curl);
//    $GetLongToken = json_decode($response_jsonTmp, true);
//    $err = curl_error($curl);
//    curl_close($curl);
//}

if($GetAccessToken['access_token']){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://graph.facebook.com/me?fields=name,id,picture&access_token=' . $GetAccessToken['access_token'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ));
    $response_jsonTmp = curl_exec($curl);
    $Profile = json_decode($response_jsonTmp, true);
    $err = curl_error($curl);
    curl_close($curl);
}

if($Profile['id']){
    $SQL_LineMember = new kSQL('LineMember');
    $Select_FB_Member = $SQL_LineMember->SetAction('select')
                                        ->SetWhere("prev='facebook'")
                                        ->SetWhere("next='myself'")
                                        ->SetWhere("propertyA='". $Profile['id'] ."'")
                                        ->BuildQuery();
    $subject = ($Select_FB_Member[0]['subject']) ? $Select_FB_Member[0]['subject'] : array();
    $subject['displayName'] = $Profile['name'];
    $subject['pictureUrl'] = $Profile['picture']['data']['url'];
    $subject['profile']['profile_pic'] = $Profile['picture']['data']['url'];
    $subject['profile']['id'] = $Profile['id'];
    if($Select_FB_Member[0]['id']){
        $Insert_Member = $SQL_LineMember->SetAction('update')
                                        ->SetWhere("id='". $Select_FB_Member[0]['id'] ."'");
    }else{
        $SQL_LineMember->SetAction('insert')
                    ->SetValue('viewA', 'on')
                    ->SetValue('viewB', 'off')
                    ->SetValue('tablename', 'member')
                    ->SetValue('prev', 'facebook')
                    ->SetValue('propertyA', $Profile['id'])
//                    ->SetValue('propertyB', $Profile['id'])
                     ->SetValue('create_at', $SQL_LineMember->getNowTime());
    }
    $SQL_LineMember->SetValue('subject', json_encode($subject))
                    ->SetValue('update_at', $SQL_LineMember->getNowTime())
                    ->BuildQuery();
    
    $data = json_decode($_SESSION['data'], true);
//    $redirect = $_SESSION['redirect'] . '&';
//    $redirect .= ($_GET) ? http_build_query($_GET).'&' : '';
//    $redirect .= ($Profile) ? http_build_query($Profile).'&' : '';
//    $redirect .= ($data) ? http_build_query($data).'&' : '';
//    header("Location: " . substr($redirect, 0, -1));
    
    $_SESSION['redirect'] = NULL;
    header("Location: https://access.line.me/dialog/bot/accountLink?linkToken=". $data['linkToken'] ."&nonce=". $Profile['id']);
}

//if($GetAccessToken['access_token']){
//    $RequestData['input_token'] = $GetAccessToken['access_token'];
//    $RequestData['access_token'] = __FB_Page_Token;
//    $curl = curl_init();
//    curl_setopt_array($curl, array(
//        CURLOPT_URL => 'https://graph.facebook.com/debug_token?' . http_build_query($RequestData),
//        CURLOPT_RETURNTRANSFER => true,
//        CURLOPT_ENCODING => "",
//        CURLOPT_MAXREDIRS => 10,
//        CURLOPT_TIMEOUT => 30,
//        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//        CURLOPT_CUSTOMREQUEST => "GET",
//    ));
//    $response_jsonTmp = curl_exec($curl);
//    $debug_token = json_decode($response_jsonTmp, true);
//    $err = curl_error($curl);
//    curl_close($curl);
//}

//if($GetAccessToken['access_token']){
//    $curl = curl_init();
//    curl_setopt_array($curl, array(
//        CURLOPT_URL => 'https://graph.facebook.com/v10.0/'. $debug_token['data']['user_id'] .'/accounts?access_token=' . __FB_Page_Token,
//        CURLOPT_RETURNTRANSFER => true,
//        CURLOPT_ENCODING => "",
//        CURLOPT_MAXREDIRS => 10,
//        CURLOPT_TIMEOUT => 30,
//        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//        CURLOPT_CUSTOMREQUEST => "GET",
//    ));
//    $response_jsonTmp = curl_exec($curl);
//    $accounts = json_decode($response_jsonTmp, true);
//    $err = curl_error($curl);
//    curl_close($curl);
//    print_r($accounts);
//}

?>