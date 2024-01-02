<?php

function kCore_CheckAuthority($_Module=NULL, $_Action=NULL){
    $Permission = false;
    if(!empty($_Module) && !empty($_Action) && !empty($_SESSION)){
        if(!empty($_SESSION[__DOMAIN.'_backend'])){
            if(!empty($_SESSION[__DOMAIN.'_backend']['subject'])){
                if(!empty($_SESSION[__DOMAIN.'_backend']['subject']['authority'])){
                    if(!empty($_SESSION[__DOMAIN.'_backend']['subject']['authority'][$_Module])){
                        if($_SESSION[__DOMAIN.'_backend']['subject']['authority'][$_Module][$_Action] === 'on'){
                            $Permission= true;
                        }
                    }
                }
            }
        }
    }
    return $Permission;
}

function kCore_Tag($action='SelectOptions', $Data=NULL){
    $SQL_Tag = new kSQL('Tag');
    $Result = array();
    switch($action){
        case 'SelectOptions':
            $rows = $SQL_Tag->SetAction('select')
                            ->SetWhere("tablename='Tag'")
                            ->SetWhere("next='myself'")
                            ->BuildQuery();
            $Result = !empty($rows) ? array_column($rows, 'propertyA', 'id') : array();
            break;
        case 'SelectOptionVals':
            if(!empty($Data['userId'])){
                $rows = $SQL_Tag->SetAction('select')
                                ->SetWhere("tablename='Tag'")
                                ->SetWhere("next='member'")
                                ->SetWhere("propertyA='". $Data['userId'] ."'")
                                ->BuildQuery();
                if(!empty($Data['GetPrev']) && !empty($rows)){
                    $Tags = $SQL_Tag->SetAction('select')
                                    ->SetWhere("tablename='Tag'")
                                    ->SetWhere("next='myself'")
                                    ->SetWhere("id IN ('". implode("','", array_column($rows, 'prev')) ."')")
                                    ->SetWhere("viewA='on'")
                                    ->BuildQuery();
                    $Result = !empty($Tags) ? array_column($Tags, 'propertyA') : array();
                }else{
                    $Result = !empty($rows) ? array_column($rows, 'prev') : array();
                }
            }
            break;
        case 'SelectAndDelete':
        case 'SelectAndUpdate':
            if(!empty($Data['id']) && !empty($Data['userId'])){
                $row = $SQL_Tag->SetAction('select')
                                ->SetWhere("tablename='Tag'")
                                ->SetWhere("next='myself'")
                                ->SetWhere("id='". $Data['id'] ."'")
                                ->SetWhere("viewA='on'")
                                ->BuildQuery();
                if(!empty($row)){
                    //是否貼過此標籤
                    $SelectRecord = $SQL_Tag->SetAction('select')
                                            ->SetWhere("tablename='Tag'")
                                            ->SetWhere("next='member'")
                                            ->SetWhere("prev='". $Data['id'] ."'")
                                            ->SetWhere("propertyA='". $Data['userId'] ."'")
                                            ->BuildQuery();
                    switch($action){
                        case 'SelectAndDelete':
                            //移除標籤
                            if(!empty($SelectRecord)){
                                $SQL_Tag->SetAction("delete")
                                        ->SetWhere("id='". $SelectRecord[0]['id'] ."'")
                                        ->BuildQuery();
                            }
                            break;
                        case 'SelectAndUpdate':
                            //貼上標籤
                            if(!empty($SelectRecord)){
                                $SQL_Tag->SetAction("update")
                                        ->SetWhere("id='". $SelectRecord[0]['id'] ."'");
                            }else{
                                $SQL_Tag->SetAction("insert")
                                        ->SetValue("tablename", "Tag")
                                        ->SetValue("next", "member")
                                        ->SetValue("prev", $Data['id'])
                                        ->SetValue("propertyA", $Data['userId'])
                                        ->SetValue("create_at", $SQL_Tag->getNowTime());
                            }
                            $SQL_Tag->SetValue("update_at", $SQL_Tag->getNowTime())
                                    ->BuildQuery();
                            break;
                    }
                }
            }
            break;
    }
    return $Result;
}

function kCore_log($text, $access_token=NULL, $sticker=NULL, $image=NULl){
    $line = new kLineMessaging();
    $access_token = !empty($access_token) ? $access_token : __LogNotifyToken;
    if(!empty($access_token) && !empty($text)){
        $Msg = array(
            "message" => $text,
        );
        if(!empty($sticker)){
            $sticker = explode('_',$sticker);
            $Msg['stickerPackageId'] = $sticker[0];
            $Msg['stickerId'] = $sticker[1];
        }
        if(!empty($image)){
            $Msg['imageThumbnail'] = __WEB_UPLOAD . '/image/' . $image;
            $Msg['imageFullsize'] = __WEB_UPLOAD . '/image/' . $image;
        }
        $line->PushNotify($access_token, $Msg);
    }
}

function kCore_SetKey($row, $Key) {
    $NewRow = array();
    if(!empty($row)){
        foreach ($row as $key => $value) {
            $NewRow[$value[$Key]] = $value;
        }
    }
    return $NewRow;
}

function kCore_addLink($str) {
    return preg_replace('#(http|https|ftp|telnet|line)://([0-9a-z\.\-]+)(:?[0-9]*)([0-9a-z\_\/\?\&\=\%\.\;\#\@\-\~\+]*)#i',
                        '<a target="_new" href="\1://\2\3\4" rel="nofollow">\1://\2\3\4</a>',
                        $str);
}

function kCore_ImgUrl($ImgUrl){
    $file = end(explode('/', $ImgUrl));
    $path = str_replace($file, '', $ImgUrl);
    $pic = explode('.', $file);
    $FileType = !empty($pic[1]) ? '.' . $pic[1] : '';
    $ImgUrl = $path . urlencode($pic[0]) . $FileType;
    return kCore_Url($ImgUrl);
}

function kCore_Url($Url){
    return str_replace(array("%21", "%23", "%24", "%25", "%26", "%27", "%28", "%29", "%2A", "%2B", "%2C", "%2F", "%3A", "%3B", "%3D", "%3F", "%40", "%5B", "%5D"),
                         array("!"  , "#"  , "$"  , "%"  , "&"  , "'"  , "("  , ")"  , "*"  , "+"  , ","  , "/"  , ":"  , ";"  , "="  , "?"  , "@"  , "["  , "]"  ), $Url);
}

function kCore_get3($param, $url=NULL){
    if(!empty($param)){
        $url = !empty($url) ? $url : $_SERVER['REQUEST_URI'];
        $getTmp = explode("/$param/", $url);
        $get = explode('/', $getTmp[1]);
        $value = $get[0];
    }
    return $value;
}

function kCore_get($param, $url=NULL){
    $value = NULL;
    if(!empty($param)){
        if(!empty($_GET['liff_state'])){
            list(,$getLiffTmp) = explode("/$param/", $_GET['liff_state']);
            list($get_liff) = explode('?', $getLiffTmp);
            list($get) = explode('/', $get_liff);
            $value = $get;
        }
        if(empty($get_liff)){
            $url = !empty($url) ? $url : $_SERVER['REQUEST_URI'];
            list(,$getTmp) = explode("/$param/", $url);
            list($get) = explode('/', $getTmp);
            $value = $get;
        }

    }
    return $value;
}

function kCore_ExcelColumn($Label_index = 65) {
    $StartIndex = $Label_index - 65;
    $Level = intval(floor($StartIndex / 26));
    $Ctn = $StartIndex % 26;

    /*
     * A(65-65) ~ ZZ(766-65)
     */
    $chr_Label_index = ($Level>0) ? chr(($Level-1) + 65) : '';
    $chr_Label_index .= chr($Ctn + 65);

    return $chr_Label_index;
}

function kCore_rand($password_len = '10') {
    $password = '';
    $word = 'abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ0123456789';
    $len = strlen($word);
    for ($i = 0; $i < $password_len; $i++) {
        $password .= $word[rand() % $len];
    }
    return date("YmdH") . $password;
}

function kCore_LineRand($password_len = 6) {
    $password = '';
    // remove o,0,1,l!@#$%^&*()<>;{}[]
    $word = 'abcdefghijkmnpqrstuvwxyz0123456789';
    $len = strlen($word);
    for ($i = 0; $i < $password_len; $i++) {
        $password .= $word[rand() % $len];
    }
    return $password;
}

function kCore_GetIP() {
    $myip = NULL;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $myip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $myip = $_SERVER['REMOTE_ADDR'];
    }
    return $myip;
}

function kCore_Weekday($date) {
    if(!empty($date)){
        $weeklist = array('日', '一', '二', '三', '四', '五', '六');
        $toweekday = date('w', strtotime($date));
        $weekday = '(' . $weeklist[$toweekday] . ')';
    }
    return $weekday;
}

//取得目前年月日
function kCore_getNowDate($type = 'datetime') {
    $type = strtolower($type);
    switch ($type) {
        case 'year':$date = date('Y');
            break;
        case 'month':$date = date('m');
            break;
        case 'day':$date = date('d');
            break;
        case 'date':$date = date('Y-m-d');
            break;
        case 'hour':$date = date('H');
            break;
        case 'minute':$date = date('i');
            break;
        case 'second':$date = date('s');
            break;
        case 'time':$date = date('H:i:s');
            break;
        case 'datetime':$date = date('Y-m-d H:i:s');
            break;
    }
    return $date;
}

//過濾危險標籤符號
function kCore_filterString($str) {
    $farr = array(
        "/\s /", //過濾多余的空白
        "/<(\/?)(script|i?frame|style|html|body|title|link|meta|\?|\%)([^>]*?)>/isU", //過濾 <script 等可能引入惡意內容或惡意改變顯示布局的代碼,如果不需要插入flash等,還可以加入<object的過濾
        "/(<[^>]*)on[a-zA-Z] \s*=([^>]*>)/isU", //過濾javascript的on事件
    );
    $tarr = array(
        " ",
        "＜\\1\\2\\3＞", //如果要直接清除不安全的標簽，這里可以留空
        "\\1\\2",
    );
    if (is_array($str)):
        foreach ($str as $key => $s) {
            if (is_array($s)):
                foreach ($s as $key2 => $s2) {
                    if (is_array($s2)):
                        foreach ($s2 as $key3 => $s3):

                            $return[$key][$key2][$key3] = preg_replace($farr, $tarr, $s3);
                        endforeach;
                    else:
                        $return[$key][$key2] = preg_replace($farr, $tarr, $s2);
                    endif;
                }
            else:
                $return[$key] = preg_replace($farr, $tarr, $s);
            endif;
        }
    else:
        $return = preg_replace($farr, $tarr, $str);
    endif;
    return $return;
}

function kCore_LineCalculation($Friend=null, $Message=null) {
    $input = $Friend * $Message;
    if ($input < 501) {
        $level = '低';
        $total = $base = 0;
    } elseif ($input >= 501 && $input < 19996) {
        $level = '中';
        $total = $base = 800;
        if ($input > 4000) {
            $total = ($input - 4000) * 0.2 + $base;
        }
    } elseif ($input >= 19996) {
        $level = '高';
        $total = $base = 4000;
        if ($input > 25000) {
            $cost = array(
                array("begin" => "25001"   , "end" => "35000"   , "rate" => "0.15" ),
                array("begin" => "35001"   , "end" => "45000"   , "rate" => "0.14" ),
                array("begin" => "45001"   , "end" => "65000"   , "rate" => "0.13" ),
                array("begin" => "65001"   , "end" => "105000"  , "rate" => "0.12" ),
                array("begin" => "105001"  , "end" => "185000"  , "rate" => "0.11" ),
                array("begin" => "185001"  , "end" => "345000"  , "rate" => "0.095"),
                array("begin" => "345001"  , "end" => "665000"  , "rate" => "0.094"),
                array("begin" => "665001"  , "end" => "825000"  , "rate" => "0.09" ),
                array("begin" => "825001"  , "end" => "1305000" , "rate" => "0.086"),
                array("begin" => "1305001" , "end" => "2585000" , "rate" => "0.078"),
                array("begin" => "2585001" , "end" => "3525000" , "rate" => "0.07" ),
                array("begin" => "3525001" , "end" => "5145000" , "rate" => "0.06" ),
                array("begin" => "5145001" , "end" => "8025000" , "rate" => "0.05" ),
                array("begin" => "8025001" , "end" => "10265000", "rate" => "0.035"),
                array("begin" => "10265001", "end" => "20505000", "rate" => "0.017"),
                array("begin" => "20505001", "end" => ""        , "rate" => "0.01" )
            );
            foreach ($cost as $key => $r) {
                $_END = ( $input>=$r['begin'] && ($input<=$r['end']||$key==15) ) ? $input : $r['end'];
                $total += ($_END - $r['begin'] + 1) * $r['rate'];
            }
        }
    }
    $total = ceil($total);//無條件進位
    return array(
        "dosage" => $level,
        "base" => number_format($base),
        "add" => number_format($total-$base),
        "total" => number_format($total)
    );
}