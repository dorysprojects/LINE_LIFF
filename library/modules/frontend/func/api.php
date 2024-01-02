<?php

switch (kCore_get('fx')) {
    case 'delfile':
        $status = false;
        $DataJson = file_get_contents('php://input');
        if(!empty($DataJson)){
            $Data = json_decode($DataJson, true);
            if(!empty($Data['filename'])){
                $status = true;
                $FilePath = __ROOT_UPLOAD."/contentId/".$Data['filename'];
                if(file_exists($FilePath)){
                    unlink($FilePath);
                }
            }
        }
        echo json_encode(array(
            "status" => $status,
        ));
        break;
    case 'qrcode':
        $status = false;
        $filename = uniqid('FLEX-').uniqid('-').uniqid('-');
        $FlexJson = file_get_contents('php://input');
        if(!empty($FlexJson)){
            if(file_put_contents(__ROOT_UPLOAD."/contentId/".$filename, $FlexJson)){
                $status = true;
            }
        }
        echo json_encode(array(
            "status" => $status,
            "filename" => $filename,
            "qrcode" => __CustomStickers_Web.'/ft/CodeImg?type=qrcode&v='.time().'&text=https://line.me/R/oaMessage/@'.__LineAtID.'/?'.urlencode('/'.$filename),
        ));
        break;
    case 'samples':
        $SQL_CustomMessage = new kSQL('CustomMessage');
        $Data = $SQL_CustomMessage->SetAction('select')
                    ->SetWhere("tablename='Samples'")
                    ->SetWhere("next='myself'")
                    ->SetWhere("subject like '%". kCore_get('samples') ."%'", !empty(kCore_get('samples')) ? 1 : 0)
                    ->SetLimit(1, !empty(kCore_get('samples')) ? 1 : 0)
                    ->SetOrder('id ASC')
                    ->BuildQuery();
        if(empty(kCore_get('samples'))){
            $sampleArray['samples'] = array();
            if($Data){
                foreach ($Data as $key => $value) {
                    $DataArray = json_decode($value['subject']['data'], true);
                    $sampleArray['samples'][] = array(
                        "id" => $value['subject']['subject'],
                        "title" => $value['subject']['subject'],
                        "pictureUrl" => __RES_Web.'/images/FlexSamples/' . $value['subject']['subject'] . '.png',
                        "json" => json_encode($DataArray['contents']),
                    );
                }
            }
            echo json_encode($sampleArray);
        }else{
            $DataArray = json_decode($Data[0]['subject']['data'], true);
            echo json_encode($DataArray['contents']);
        }
        break;
    case 'render':
        //Key種類
        function CheckURL($URL=NULL){
            $Result = false;
            if(preg_match("/http[s]?:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is", $URL)){
                $Result = true;
            }
            return $Result;
        }
        function Check_text($item=NULL, $location=NULL){
            if(!empty($location)){//span
                if(empty($item['text']) && $item['text']!='0'){
                    $GLOBALS['errorList'][] = array(
                        "message" => "must be specified",
                        "property" => $GLOBALS['location'] .$location. '/text'
                    );
                }
            }else{
                if((empty($item['text']) && $item['text']!='0') && empty($item['contents'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "`text` or `contents` must be specified",
                        "property" => $GLOBALS['location'] . '/text'
                    );
                }
            }
        }
        function Check_url($item=NULL, $key='url'){
            if(empty($item[$key])){
                $GLOBALS['errorList'][] = array(
                    "message" => "must be specified",
                    "property" => $GLOBALS['location'] . '/' . $key
                );
            }else if(!CheckURL($item[$key])){
                $GLOBALS['errorList'][] = array(
                    "message" => "invalid uri scheme",
                    "property" => $GLOBALS['location'] . '/' . $key
                );
            }
        }
        function Check_Color($item=NULL, $type=NULL, $location=NULL){
            if(!empty($item[$type]) && !preg_match('/^#(([a-f]|[A-F]|[0-9]){6}|([a-f]|[A-F]|[0-9]){8})$/', $item[$type])){
                $GLOBALS['errorList'][] = array(
                    "message" => "invalid property",
                    "property" => $GLOBALS['location'] . $location.'/'.$type
                );
            }
        }
        function Check_flex($item=NULL){
            if(!empty($item['flex']) && !is_numeric($item['flex'])){
                $GLOBALS['errorList'][] = array(
                    "message" => "invalid property",
                    "property" => $GLOBALS['location'] . '/flex'
                );
            }else if((is_numeric($item['flex']) && $item['flex']<0)){
                $GLOBALS['errorList'][] = array(
                    "message" => "must be greater than or equal to 0",
                    "property" => $GLOBALS['location'] . '/flex'
                );
            }
        }
        function Check_maxLines($item=NULL){
            if( !empty($item['maxLines']) && (!is_numeric($item['maxLines'])||$item['maxLines']>2147483647) ){
                $GLOBALS['errorList'][] = array(
                    "message" => "invalid property",
                    "property" => $GLOBALS['location'] . '/maxLines'
                );
            }else if((is_numeric($item['maxLines']) && $item['maxLines']<0)){
                $GLOBALS['errorList'][] = array(
                    "message" => "must be greater than or equal to 0",
                    "property" => $GLOBALS['location'] . '/maxLines'
                );
            }
        }
        function Check_aspectRatio($item=NULL){
            $aspectRatioStr = explode(':', $item['aspectRatio']);
            if(!empty($item['aspectRatio']) && !preg_match('/^((\d+)|(\d+).(\d+)):((\d+)|(\d+))$/', $item['aspectRatio'])){
                $GLOBALS['errorList'][] = array(
                    "message" => "invalid property",
                    "property" => $GLOBALS['location'] . '/aspectRatio'
                );
            }else if( !empty($item['aspectRatio']) && ($aspectRatioStr[1]/$aspectRatioStr[0])>3 ){
                $message = (($aspectRatioStr[1]/$aspectRatioStr[0])>100000) ? 'too big height' : 'aspect ratio must be in the range (0 < (h/w) <= 3)';
                $GLOBALS['errorList'][] = array(
                    "message" => $message,
                    "property" => $GLOBALS['location'] . '/aspectRatio'
                );
            }
        }
        function Check_margin($item=NULL){
            switch($item['margin']){
                case '':
                case 'none':
                case 'xs':
                case 'sm':
                case 'md':
                case 'lg':
                case 'xl':
                case 'xxl':
                    break;
                default :
                    if(preg_match('/^((\d+)|(\d+).(\d+))%$/', $item['margin'])){
                        $GLOBALS['errorList'][] = array(
                            "message" => "invalid unit",
                            "property" => $GLOBALS['location'] . '/margin'
                        );
                    }else if(preg_match('/^-[1-9]px$/', $item['margin'])){
                        $GLOBALS['errorList'][] = array(
                            "message" => "lower limit exceeded",
                            "property" => $GLOBALS['location'] . '/margin'
                        );
                    }else if(!preg_match('/^((\d+)|(\d+).(\d+)|-0)px$/', $item['margin'])){
                        $GLOBALS['errorList'][] = array(
                            "message" => "invalid property",
                            "property" => $GLOBALS['location'] . '/margin'
                        );
                    }
                    break;
            }
        }
        function Check_size($item=NULL, $location=NULL, $type=NULL){
            $DefaultSize = array(
                '',
                'xxs',
                'xs',
                'sm',
                'md',
                'lg',
                'xl',
                'xxl',
                '3xl',
                '4xl',
                '5xl',
            );
            switch($type){
                case 'image':
                    $DefaultSize[] = 'full';
                    break;
            }
            if(!in_array($item['size'], $DefaultSize)){
                if($type!=='image' && preg_match('/^((\d+)|(\d+).(\d+)|-0)%$/', $item['size'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "invalid unit",
                        "property" => $GLOBALS['location'] .$location. '/size'
                    );
                }else if( ($type!=='image'&&preg_match('/^-[1-9]px$/', $item['size'])) || ($type==='image'&&preg_match('/^(-[1-9]px|-[1-9]%)$/', $item['size'])) ){
                    $GLOBALS['errorList'][] = array(
                        "message" => "lower limit exceeded",
                        "property" => $GLOBALS['location'] .$location. '/size'
                    );
                }else if( ($type!=='image'&&!preg_match('/^((\d+)|(\d+).(\d+)|-0)px$/', $item['size'])) || ($type==='image'&&!preg_match('/^(((\d+)|(\d+).(\d+)|-0)px|((\d+)|(\d+).(\d+)|-0)%)$/', $item['size'])) ){
                    $GLOBALS['errorList'][] = array(
                        "message" => "invalid property",
                        "property" => $GLOBALS['location'] .$location. '/size'
                    );
                }
            }
        }
        function Check_spacing($item=NULL){
            switch($item['spacing']){
                case '':
                case 'none':
                case 'xs':
                case 'sm':
                case 'md':
                case 'lg':
                case 'xl':
                case 'xxl':
                    break;
                default :
                    if(preg_match('/^((\d+)|(\d+).(\d+))%$/', $item['spacing'])){
                        $GLOBALS['errorList'][] = array(
                            "message" => "invalid unit",
                            "property" => $GLOBALS['location'] . '/spacing'
                        );
                    }else if(preg_match('/^-[1-9]px$/', $item['spacing'])){
                        $GLOBALS['errorList'][] = array(
                            "message" => "lower limit exceeded",
                            "property" => $GLOBALS['location'] .$location. '/spacing'
                        );
                    }else if(!preg_match('/^((\d+)|(\d+).(\d+)|-0)px$/', $item['spacing'])){
                        $GLOBALS['errorList'][] = array(
                            "message" => "invalid property",
                            "property" => $GLOBALS['location'] . '/spacing'
                        );
                    }
                    break;
            }
        }
        function Check_width($item=NULL){
            if(!empty($item['width'])){
                if(preg_match('/^(-[1-9]px|-[1-9]%)$/', $item['width'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "lower limit exceeded",
                        "property" => $GLOBALS['location'] .$location. '/width'
                    );
                }else if(!preg_match('/^(((\d+)|(\d+).(\d+)|-0)px|((\d+)|(\d+).(\d+)|-0)%)$/', $item['width'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "invalid property",
                        "property" => $GLOBALS['location'] . '/width'
                    );
                }
            }
        }
        function Check_height($item=NULL){
            if(!empty($item['height'])){
                if(preg_match('/^(-[1-9]px|-[1-9]%)$/', $item['height'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "lower limit exceeded",
                        "property" => $GLOBALS['location'] .$location. '/height'
                    );
                }else if(!preg_match('/^(((\d+)|(\d+).(\d+)|-0)px|((\d+)|(\d+).(\d+)|-0)%)$/', $item['height'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "invalid property",
                        "property" => $GLOBALS['location'] . '/height'
                    );
                }
            }
        }
        function Check_angle($item=NULL){
            if(!empty($item['angle'])){
                if(preg_match('/^-[1-9]deg$/', $item['angle'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "lower limit exceeded",
                        "property" => $GLOBALS['location'] . '/background/angle'
                    );
                }else if(!preg_match('/^((\d+)|(\d+).(\d+)|-0)deg$/', $item['angle'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "invalid property",
                        "property" => $GLOBALS['location'] . '/background/angle'
                    );
                }
            }
        }
        function Check_centerPosition($item=NULL){
            if(!empty($item['centerPosition'])){
                if(preg_match('/^(-0|0|[0-9]|[1-9][0-9]|[0-9].(\d+)|[1-9][0-9].(\d+)|100)px$/', $item['centerPosition'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => 'invalid unit',
                        "property" => $GLOBALS['location'] . '/background/centerPosition'
                    );
                }else if(preg_match('/^-[1-9]%$/', $item['centerPosition'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "lower limit exceeded",
                        "property" => $GLOBALS['location'] . '/background/centerPosition'
                    );
                }else if(preg_match('/^((\d+)|(\d+).(\d+)|-0)%$/', $item['centerPosition'])){
                    if(!preg_match('/^(-0|0|[0-9]|[1-9][0-9]|[0-9].(\d+)|[1-9][0-9].(\d+)|100)%$/', $item['centerPosition'])){
                        $GLOBALS['errorList'][] = array(
                            "message" => "upper limit exceeded",
                            "property" => $GLOBALS['location'] . '/background/centerPosition'
                        );
                    }
                }else{
                    $GLOBALS['errorList'][] = array(
                        "message" => 'invalid property',
                        "property" => $GLOBALS['location'] . '/background/centerPosition'
                    );
                }
            }
        }
        function Check_cornerRadius($item=NULL){
            switch($item['cornerRadius']){
                case '':
                case 'none':
                case 'xs':
                case 'sm':
                case 'md':
                case 'lg':
                case 'xl':
                case 'xxl':
                    break;
                default :
                    if(preg_match('/^((\d+)|(\d+).(\d+)|-0)%$/', $item['cornerRadius'])){
                        $GLOBALS['errorList'][] = array(
                            "message" => "invalid unit",
                            "property" => $GLOBALS['location'] . '/cornerRadius'
                        );
                    }else if(preg_match('/^-[1-9]px$/', $item['cornerRadius'])){
                        $GLOBALS['errorList'][] = array(
                            "message" => "lower limit exceeded",
                            "property" => $GLOBALS['location'] . '/cornerRadius'
                        );
                    }else if(!preg_match('/^((\d+)|(\d+).(\d+)|-0)px$/', $item['cornerRadius'])){
                        $GLOBALS['errorList'][] = array(
                            "message" => "invalid property",
                            "property" => $GLOBALS['location'] . '/cornerRadius'
                        );
                    }
                    break;
            }
        }
        function Check_borderWidth($item=NULL){
            switch($item['borderWidth']){
                case '':
                case 'none':
                case 'light':
                case 'normal':
                case 'medium':
                case 'semi-bold':
                case 'bold':
                    break;
                default :
                    if(preg_match('/^((\d+)|(\d+).(\d+)|-0)%$/', $item['borderWidth'])){
                        $GLOBALS['errorList'][] = array(
                            "message" => "invalid unit",
                            "property" => $GLOBALS['location'] . '/borderWidth'
                        );
                    }else if(preg_match('/^-[1-9]px$/', $item['borderWidth'])){
                        $GLOBALS['errorList'][] = array(
                            "message" => "lower limit exceeded",
                            "property" => $GLOBALS['location'] . '/borderWidth'
                        );
                    }else if(!preg_match('/^((\d+)|(\d+).(\d+)|-0)px$/', $item['borderWidth'])){
                        $GLOBALS['errorList'][] = array(
                            "message" => "invalid property",
                            "property" => $GLOBALS['location'] . '/borderWidth'
                        );
                    }
                    break;
            }
        }
        function Check_Offset($item=NULL){
            $Offset = array(
                "Top",
                "Bottom",
                "Start",
                "End",
            );
            foreach ($Offset as $key => $value) {
                switch($item['offset'.$value]){
                    case '':
                    case 'none':
                    case 'xs':
                    case 'sm':
                    case 'md':
                    case 'lg':
                    case 'xl':
                    case 'xxl':
                        break;
                    default :
                        if(!preg_match('/^((\d+)px|(\d+)%|-(\d+)px|-(\d+)%|(\d+).(\d+)px|(\d+).(\d+)%|-(\d+).(\d+)px|-(\d+).(\d+)%)$/', $item['offset'.$value])){
                            $GLOBALS['errorList'][] = array(
                                "message" => "invalid property",
                                "property" => $GLOBALS['location'] . '/offset'.$value
                            );
                        }
                        break;
                }
            }
        }
        function Check_Padding($item=NULL){
            $Padding = array(
                "All",
                "Top",
                "Bottom",
                "Start",
                "End",
            );
            foreach ($Padding as $key => $value) {
                switch($item['padding'.$value]){
                    case '':
                    case 'none':
                    case 'xs':
                    case 'sm':
                    case 'md':
                    case 'lg':
                    case 'xl':
                    case 'xxl':
                        break;
                    default :
                        if(preg_match('/^(-([1-9]|[1-9].(\d+))px|-([1-9]|[1-9].(\d+))%)$/', $item['padding'.$value])){
                            $GLOBALS['errorList'][] = array(
                                "message" => "lower limit exceeded",
                                "property" => $GLOBALS['location'] . '/padding'.$value
                            );
                        }else if(!preg_match('/^((\d+)px|(\d+)%|(\d+).(\d+)px|(\d+).(\d+)%|-0px|-0%)$/', $item['padding'.$value])){
                            $GLOBALS['errorList'][] = array(
                                "message" => "invalid property",
                                "property" => $GLOBALS['location'] . '/padding'.$value
                            );
                        }
                        break;
                }
            }
        }
        function Check_Background($item=NULL){
            if($item['background'] && $item['background']['type']){
                switch ($item['background']['type']) {
                    case 'linearGradient':
                        $RequireKey = array(
                            "angle",
                            "startColor",
                            "endColor",
                        );
                        $AllKey = array(
                            "angle",
                            "startColor",
                            "endColor",
                            "centerColor",
                            "centerPosition",
                        );
                        foreach ($AllKey as $key => $value) {
                            if(in_array($value, $RequireKey) && empty($item['background'][$value])){
                                $GLOBALS['errorList'][] = array(
                                    "message" => "must be specified",
                                    "property" => $GLOBALS['location'] . '/background/' . $value
                                );
                            }else{
                                switch($value){
                                    case 'angle':
                                        Check_angle($item['background']);
                                        break;
                                    case 'startColor':
                                    case 'endColor':
                                    case 'centerColor':
                                        Check_Color($item['background'], $value, '/background');
                                        break;
                                    case 'centerPosition':
                                        Check_centerPosition($item['background']);
                                        break;
                                }
                            }
                        }
                        break;
                }
            }
        }
        function Check_Action($item=NULL, $required=false){
            if($required && empty($item['action'])){
                $GLOBALS['errorList'][] = array(
                    "message" => "must be specified",
                    "property" => $GLOBALS['location'] . '/action'
                );
            }else if( $required && !empty($item['action']) && (empty($item['action']['label'])) ){
                $GLOBALS['errorList'][] = array(
                    "message" => "`label` must be specified",
                    "property" => $GLOBALS['location'] . '/action/label'
                );
            }else if(!empty($item['action']) && $item['action']['type']==='uri'){
                if(empty($item['action']['uri'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "must be specified",
                        "property" => $GLOBALS['location'] . '/action/uri'
                    );
                }else if(!empty($item['action']['uri']) && !CheckURL($item['action']['uri'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "invalid uri scheme",
                        "property" => $GLOBALS['location'] . '/action/uri'
                    );
                }else if(!empty($item['action']['altUri']['desktop']) && !CheckURL($item['action']['altUri']['desktop'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "invalid uri scheme",
                        "property" => $GLOBALS['location'] . '/action/altUri/desktop'
                    );
                }
            }else if(!empty($item['action']) && $item['action']['type']==='postback'){
                if(empty($item['action']['data'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "must be specified",
                        "property" => $GLOBALS['location'] . '/action/data'
                    );
                }
            }else if(!empty($item['action']) && $item['action']['type']==='message'){
                if(empty($item['action']['text'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "must be specified",
                        "property" => $GLOBALS['location'] . '/action/text'
                    );
                }
            }else if(!empty($item['action']) && $item['action']['type']==='datetimepicker'){
                if(empty($item['action']['data'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "must be specified",
                        "property" => $GLOBALS['location'] . '/action/data'
                    );
                }else if(empty($item['action']['mode'])){
                    $GLOBALS['errorList'][] = array(
                        "message" => "must be specified",
                        "property" => $GLOBALS['location'] . '/action/mode'
                    );
                }else{
                    $_List = array(
                        "initial",
                        "max",
                        "min"
                    );
                    $modeVerify = true;
                    $matchVerify = true;
                    switch ($item['action']['mode']) {
                        case 'date'://2017-12-25
                            $_match = "/^[0-9]{4}-(02-(0[1-9]|1[0-9]|2[0-8])|0[4、6、9]-(0[1-9]|[1-2][0-9]|30)|11-(0[1-9]|[1-2][0-9]|30)|0[1、3、5、7、8]-(0[1-9]|[1-2][0-9]|3[0-1])|1[0、2]-(0[1-9]|[1-2][0-9]|3[0-1]))$/";
                            break;
                        case 'time'://00:00
                            $_match = "/^(0[0-9]:[0-5][0-9]|1[0-9]:[0-5][0-9]|2[0-3]:[0-5][0-9]|24:00)$/";
                            break;
                        case 'datetime'://2017-12-25t00:00
                            $_match = "/^[0-9]{4}-(02-(0[1-9]|1[0-9]|2[0-8])|0[4、6、9]-(0[1-9]|[1-2][0-9]|30)|11-(0[1-9]|[1-2][0-9]|30)|0[1、3、5、7、8]-(0[1-9]|[1-2][0-9]|3[0-1])|1[0、2]-(0[1-9]|[1-2][0-9]|3[0-1]))t(0[0-9]:[0-5][0-9]|1[0-9]:[0-5][0-9]|2[0-3]:[0-5][0-9]|24:00)$/";
                            break;
                        default :
                            $modeVerify = false;
                            $GLOBALS['errorList'][] = array(
                                "message" => "invalid property",
                                "property" => $GLOBALS['location'] . '/action/mode'
                            );
                            break;
                    }
                    if($modeVerify){
                        foreach ($_List as $key => $value) {
                            if($item['action'][$value] && !preg_match($_match, $item['action'][$value])){
                                $matchVerify = false;
                                $GLOBALS['errorList'][] = array(
                                    "message" => "invalid datetime format for the specified mode",
                                    "property" => $GLOBALS['location'] . '/action/' . $value
                                );
                            }
                        }
                    }
                    $timeorderVerify = true;
                    if($matchVerify){
                        if($item['action']['initial']){
                            if($item['action']['max'] && $item['action']['max']<$item['action']['initial']){
                                $timeorderVerify = false;
                            }else if($item['action']['min'] && $item['action']['min']>$item['action']['initial']){
                                $timeorderVerify = false;
                            }
                        }
                        if($item['action']['max']){
                            if($item['action']['initial'] && $item['action']['initial']>$item['action']['max']){
                                $timeorderVerify = false;
                            }else if($item['action']['min'] && $item['action']['min']>$item['action']['max']){
                                $timeorderVerify = false;
                            }
                        }
                        if($item['action']['min']){
                            if($item['action']['initial'] && $item['action']['initial']<$item['action']['min']){
                                $timeorderVerify = false;
                            }else if($item['action']['max'] && $item['action']['max']<$item['action']['min']){
                                $timeorderVerify = false;
                            }
                        }
                        if(!$timeorderVerify){
                            $GLOBALS['errorList'][] = array(
                                "message" => "invalid date time order",
                                "property" => $GLOBALS['location'] . '/action'
                            );
                        }
                    }
                }
            }
        }
        //訊息種類
        function CheckVideo($item=NULL){
            if($GLOBALS['Data']['type']==='carousel'){
                $GLOBALS['errorList'][] = array(
                    "message" => "embedding videos in messages is not allowed",
                    "property" => '/contents'
                );
            }
            Check_url($item);
            Check_url($item, 'previewUrl');
            Check_aspectRatio($item);
            Check_Action($item);
            $GLOBALS['location'] .= '/altContent';
            if(!empty($item['altContent'])){
                Check_flex($item['altContent']);
                Check_url($item['altContent']);
                Check_margin($item['altContent']);
                Check_size($item['altContent'], NULL, 'image');
                Check_aspectRatio($item['altContent']);
                Check_Color($item['altContent'], 'backgroundColor');
                Check_Offset($item['altContent']);
                Check_Action($item['altContent']);
            }else{
                $GLOBALS['errorList'][] = array(
                    "message" => "must be specified",
                    "property" => $GLOBALS['location']
                );
            }
        }
        function CheckImage($item=NULL){
            Check_flex($item);
            Check_url($item);
            Check_margin($item);
            Check_size($item, NULL, 'image');
            Check_aspectRatio($item);
            Check_Color($item, 'backgroundColor');
            Check_Offset($item);
            Check_Action($item);
        }
        function CheckIcon($item=NULL){
            Check_url($item);
            Check_margin($item);
            Check_size($item);
            Check_aspectRatio($item);
            Check_Offset($item);
        }
        function CheckText($item=NULL){
            Check_text($item);
            Check_flex($item);
            Check_margin($item);
            Check_size($item);
            Check_Color($item, 'color');
            Check_maxLines($item);
            Check_Offset($item);
            Check_Action($item);
            
            if($item['contents']){
                foreach ($item['contents'] as $key => $value) {
                    CheckSpan($value, $key);
                }
            }
        }
        function CheckSpan($item=NULL, $key=NULL){
            $location = '/contents/' . $key;
            Check_text($item, $location);
            Check_size($item, $location);
            Check_Color($item, 'color', $location);
        }
        function CheckButton($item=NULL){
            Check_flex($item);
            Check_margin($item);
            Check_Color($item, 'color');
            Check_Offset($item);
            Check_Action($item, true);
        }
        function CheckBox($item=NULL){
            Check_flex($item);
            Check_spacing($item);
            Check_margin($item);
            Check_width($item);
            Check_height($item);
            Check_Color($item, 'backgroundColor');
            Check_borderWidth($item);
            Check_Color($item, 'borderColor');
            Check_cornerRadius($item);
            Check_Offset($item);
            Check_Padding($item);
            Check_Padding($item);
            Check_Background($item);
            
            $locationTmp = $GLOBALS['location'];
            if($item['contents']){
                foreach ($item['contents'] as $contents_key => $contents_value) {
                    $GLOBALS['location'] .= '/contents/' . $contents_key;
                    CheckProcess($contents_value, $item['contents'], $contents_key);
                    $GLOBALS['location'] = $locationTmp;
                }
            }
        }
        function CheckFiller($item=NULL){
            Check_flex($item);
        }
        function CheckSeparator($item=NULL){
            Check_margin($item);
            Check_Color($item, 'color');
        }
        function CheckSpacer($item=NULL, $parent=NULL, $key){
            $KeyList = array_keys($parent);
            if($key!==$KeyList[0] && $key!==$KeyList[count($KeyList)-1]){
                $GLOBALS['errorList'][] = array(
                    "message" => "spacer must be the fist or last element of the box",
                    "property" => $GLOBALS['location'] . '/spacer'
                );
            }
        }
        
        function CheckProcess($item=NULL, $parent=NULL, $key=NULL){
            switch($item['type']){
                case 'video':
                    CheckVideo($item);
                    break;
                case 'image':
                    CheckImage($item);
                    break;
                case 'icon':
                   CheckIcon($item);
                    break;
                case 'text':
                    CheckText($item);
                    break;
                case 'button':
                    CheckButton($item);
                    break;
                case 'box':
                    CheckBox($item);
                    break;
                case 'filler':
                    CheckFiller($item);
                    break;
                case 'separator':
                    CheckSeparator($item);
                    break;
                case 'spacer':
                    CheckSpacer($item, $parent, $key);
                    break;
            }
        }
        function CheckStyles($item=NULL, $parent=NULL, $key=NULL){
            if($item){
                $locationTmp = $GLOBALS['location'];
                foreach ($item as $key => $value) {
                    $GLOBALS['location'] = $locationTmp . '/' . $key;
                    Check_Color($value, 'backgroundColor');
                    Check_Color($value, 'separatorColor');
                }
                $GLOBALS['location'] = $locationTmp;
            }
        }
        function CheckBubble($bubble=NULL, $location=NULL){
            $Ctn = 0;
            if($bubble){
                foreach ($bubble as $key => $item) {
                    switch($key){
                        case 'styles':
                            $GLOBALS['location'] = $location . '/' . $key;
                            CheckStyles($item, $bubble, $key);
                            break;
                        case 'header':
                        case 'hero':
                        case 'body':
                        case 'footer':
                            $GLOBALS['location'] = $location . '/' . $key;
                            CheckProcess($item, $bubble, $key);
                            $Ctn++;
                            break;
                    }
                }
            }
            if($Ctn==0){
                $GLOBALS['location'] = '/';
                $GLOBALS['errorList'][] = array(
                    "message" => "At least one block must be specified",
                    "property" => $GLOBALS['location']
                );
            }
        }
        
        $GLOBALS['errorList'] = array();
        $GLOBALS['location'] = '';
        $GLOBALS['Html'] = '';
        $GLOBALS['Preview'] = '';
        if(kCore_get('render')==='test1'){
            if(0){
                $testData = '';
            }
            $GLOBALS['Data'] = json_decode($testData, true);
        }else{
            $GLOBALS['Data'] = json_decode(file_get_contents('php://input'), true);
        }
        if($GLOBALS['Data']){
            if($GLOBALS['Data']['type']==='carousel'){
                foreach ($GLOBALS['Data']['contents'] as $key => $value) {
                    CheckBubble($value, '/contents/'.$key);
                }
            }else if($GLOBALS['Data']['type']==='bubble'){
                CheckBubble($GLOBALS['Data']);
            }
        }
        $GLOBALS['Html'] =  '<!doctype html>'.
                            '<html>'.
                                '<head>'.
                                    '<meta charset="UTF-8">'.
                                    '<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">'.
                                    '<meta name="format-detection" content="telephone=no">'.
                                    '<link rel="stylesheet" type="text/css" href="'.__LIBRARY.'/plugin/flex/preview.css?v='. date('YmdHis') .'">'.
                                '</head>'.
                                '<body style="margin: 0;">'.
                                    $GLOBALS['Preview'].
                                '</body>'.
                            '</html>';
        $response_code = NULL;
        if($GLOBALS['errorList']){
            $response_code = 400;
            $Response = array(
                "message" => "json parsing error",
                "details" => $GLOBALS['errorList'],
            );
            $EchoItems = json_encode($Response);
        }else{
            $response_code = 200;//200
            $EchoItems = $GLOBALS['Html'];
        }
        http_response_code($response_code);
        header("HTTP/1.1 " . $response_code);
        header("Connection: Close");
        echo $EchoItems;
        break;
    default:
        echo '{}';
        break;
}

?>