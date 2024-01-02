<?php

$UID = $_GET['state'];
$code = $_GET['code'];

if(empty($code)){
    /*
     * 同意Notify連動，並取得code
     * 範例: https://notify-bot.line.me/oauth/authorize?response_type=code&client_id=560ocW2FdYCZWybSH6G7YF&redirect_uri=__CustomStickers_Web/ft/line_notify_callback&scope=notify&state=allproducts
     */
    $Request['response_type'] = 'code';
    $Request['client_id'] = __LineNotifyID;
    $Request['redirect_uri'] = __CustomStickers_Web . '/ft/line_notify_callback';
    $Request['state'] = $UID;//allproducts
    $Request['scope'] = 'notify';
    header("Location: " . 'https://notify-bot.line.me/oauth/authorize?' . http_build_query($Request));
}else{
    $SQL_LineMember = new kSQL('LineMember');
    if($UID!='allproducts'){//有帶UID進來，login後進來，或手動改網址
        $UID = base64_decode(urldecode($UID));
        $GetNotify = $SQL_LineMember->SetAction("select")
                                    ->SetWhere("tablename='member'")
                                    ->SetWhere("prev='line'")
                                    ->SetWhere("next='myself'")
                                    ->SetWhere("propertyA='" . $UID . "'")
                                    ->BuildQuery();
        $access_token = $GetNotify[0]['propertyC'];
    }

    if(empty($access_token)){//沒帶UID進來，或此UID未綁定notify，進行綁定notify
        $Token = $line->GetNotifyToken($code);
        $access_token = $Token['access_token'];
        if(!empty($access_token)){
            $Profile = $line->NotifyProfile($access_token);
            $subject = $GetNotify[0]['subject'] ? $GetNotify[0]['subject'] : array();
            $subject['token'] = $Token;
            $subject['profile'] = $Profile;
            if(!empty($GetNotify[0]['id'])){
                $SQL_LineMember->SetAction('update')
                                ->SetWhere("id='". $GetNotify[0]['id'] ."'");
            }else{
                $SQL_LineMember->SetAction('insert')
                                ->SetValue("tablename", "member")
                                ->SetValue("prev", "line")
                                ->SetValue("next", "myself")
                                ->SetValue("propertyA", $UID)
                                ->SetValue('create_at', $SQL_LineMember->getNowTime());
            }
            $SQL_LineMember->SetValue("subject", json_encode($subject));
            if($UID!='allproducts'){
                $SQL_LineMember->SetValue("propertyC", $access_token);
            }      
            $SQL_LineMember->SetValue('update_at', $SQL_LineMember->getNowTime())
                            ->BuildQuery();
        }
    }

    if(!empty($access_token)){
        $SQL_SystemMessage = new kSQL('SystemMessage');
        $NotifyMsg = $SQL_SystemMessage->SetAction('select')
                    ->SetWhere("tablename='SystemMessage'")
                    ->SetWhere("next='NotifyMsg'")
                    ->SetWhere("viewA='on'")
                    ->BuildQuery();
        if(!empty($NotifyMsg[0])){
            $text = $NotifyMsg[0]['subject']['value_0'];
            $sticker = $NotifyMsg[0]['subject']['value_1'];
            $image = $NotifyMsg[0]['subject']['value_2'];
            if(!empty($text)){
                $Msg['message'] = $text;
                if(!empty($sticker)){
                    $sticker = explode('_',$sticker);
                    $Msg['stickerPackageId'] = $sticker[0];
                    $Msg['stickerId'] = $sticker[1];
                }
                if(!empty($image)){
                    $Msg['imageThumbnail'] = __WEB_UPLOAD . '/image/' . $image;
                    $Msg['imageFullsize'] = __WEB_UPLOAD . '/image/' . $image;
                }
                $Push = $line->PushNotify($access_token, $Msg);
            }
        }
    }

    if($UID!='allproducts'){//有帶UID進來，login後進來，或手動改網址
        header('Location: https://line.me/R/ti/p/@' . __LineAtID);
    }
}

?>