<?php

if($_GET['linkToken']){ //Line AccountLink()
    if(!$_GET['userId']){
        $Request['response_type'] = 'code';
        $Request['scope'] = 'public_profile email';
        $Request['client_id'] = __FB_App_ID;
        $Request['redirect_uri'] = __CustomStickers_Web . '/ft/FacebookLoginRedirect';
        $Request['state'] = __DOMAIN;
        $_SESSION['redirect'] = __CustomStickers_Web . '/ft/FB_Account_Link';
        $data = array(
            "linkToken" => $_GET['linkToken']
        );
        $_SESSION['data'] = json_encode($data);
        header("Location: " . 'https://www.facebook.com/v10.0/dialog/oauth?' . http_build_query($Request));
    }
}else{  //Messenger AccountLink()
    if(!$_GET['userId']){
        $kLineLogin = new kLineLogin();
        header("Location: " . $kLineLogin->Authorization('FB_Account_Link', $_GET));
    }else{
        $_SESSION['redirect'] = NULL;
        if ($_GET['account_linking_token']) {
            $URL = "https://graph.facebook.com/v3.3/me?access_token=" . $facebook->page_token . "&fields=recipient&account_linking_token=" . $_GET['account_linking_token'];
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $URL,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                //CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                )
            ));
            $AccountLinkTmp = curl_exec($curl);
            $AccountLink = json_decode($AccountLinkTmp, TRUE);
            $err = curl_error($curl);
            curl_close($curl);
        }
        $_LINE_UID = $_GET['userId'];
        $_FB_SENDERID = $AccountLink['recipient'];

        if ($_LINE_UID && $_FB_SENDERID) {
            $SQL_LineMember = new kSQL('LineMember');
            $Select_LINE_Member = $SQL_LineMember->SetAction('select')
                                                ->SetWhere("prev='line'")
                                                ->SetWhere("next='myself'")
                                                ->SetWhere("propertyA='$_LINE_UID'")
                                                ->BuildQuery();
            $Insert_LINE_Member = FALSE;
            if (!empty($Select_LINE_Member)) {
                if ($Select_LINE_Member[0]['id'] && !$Select_LINE_Member[0]['propertyE']) {
                    $Insert_LINE_Member = $SQL_LineMember->SetAction('update')
                                                        ->SetWhere("id='". $Select_LINE_Member[0]['id'] ."'")
                                                        ->SetValue('propertyE', $_FB_SENDERID)
                                                        ->SetValue('update_at', $SQL_LineMember->getNowTime())
                                                        ->BuildQuery();
                }
                $Select_FB_Member = $SQL_LineMember->SetAction('select')
                                                    ->SetWhere("prev='facebook'")
                                                    ->SetWhere("next='myself'")
                                                    ->SetWhere("propertyA='". $_FB_SENDERID ."'")
    //                                                ->SetWhere("propertyE='". $_LINE_UID ."'")
                                                    ->BuildQuery();
                if ($Select_FB_Member[0]['id'] && !$Select_FB_Member[0]['propertyE']) {
                    $Insert_Member = $SQL_LineMember->SetAction('update')
                                                    ->SetWhere("id='". $Select_FB_Member[0]['id'] ."'")
                                                    ->SetValue('propertyE', $_LINE_UID)
                                                    ->SetValue('update_at', $SQL_LineMember->getNowTime())
                                                    ->BuildQuery();
                }
            }
            if (!$Insert_Member) {
                echo '<div style="font-weight: bold;color: #fff;background-color: #3b5998;font-size: 100px;width: -webkit-fill-available;height: -webkit-fill-available;text-align: center;padding: 50vh 0vw;margin-top: -100px;">臉書帳號重複綁定</div>';
            } else if ($_GET['redirect_uri']) {
                header('Location:' . $_GET['redirect_uri'] . '&authorization_code=' . $facebook->Authorization_code);
            }
        }
    }
}

?>