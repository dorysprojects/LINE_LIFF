<?php

$_From = kCore_get('FrontEndAndBackEnd', $_SERVER['PATH_TRANSLATED']);
$_Module = !empty($_From) ? kCore_get($_From, $_SERVER['PATH_TRANSLATED']) : '';
$_Action = ($_From=='backend') ? kCore_get($_Module) : '';

//引入xajax函式庫

include_once __PLUGIN . '/xajax/xajax_core/xajax.inc.php';
$xajax = new xajax();  //建立物件
$xajax->configure('javascript URI', __PLUGIN_Web . '/xajax/');  //設定路徑
$xajax->register(XAJAX_FUNCTION, 'SendLineMsg');
$xajax->register(XAJAX_FUNCTION, 'updateMsg');
$xajax->register(XAJAX_FUNCTION, 'LoadMsg');
$xajax->register(XAJAX_FUNCTION, 'BuildMsg');
$xajax->register(XAJAX_FUNCTION, 'updateFacebookMsg');
$xajax->register(XAJAX_FUNCTION, 'LoadFacebookMsg');
$xajax->register(XAJAX_FUNCTION, 'BuildFacebookMsg');

$xajax->register(XAJAX_FUNCTION, 'Session');
$XajaxPath = __LIB . '/modules/backend/func/'. $_Module .'/xajax.php';
if(file_exists($XajaxPath)){
    include $XajaxPath;
}
$xajax->processRequest();  //處理回應

function SendLineMsg($UID=NULL, $Msg=NULL){
    $objResponse = new xajaxResponse();
    
    $line = new kLineMessaging();
    $line->action['data'] = $Msg;
    
    //$objResponse->script("console.log('". $UID ."', ". json_encode($line->action['data']) .");");
    $PushState = $line->push($UID, $type='service', $sender=NULL);
    $StateMsg = empty($PushState) ? '訊息已發送' : '訊息發送失敗';
    
    $objResponse->script("swal({type: 'success',title: '發送成功',text:'". $StateMsg ."',showConfirmButton: true});");
    
    return $objResponse;
}

function updateMsg($ChatMember=NULL){
    $objResponse = new xajaxResponse();
    $SQL_LineRecord = new kSQL('LineRecord');
    $SQL_LineMember = new kSQL('LineMember');
    
    $_ChatRoom = !empty(kCore_get('ChatRoom')) ? kCore_get('ChatRoom') : 'line';
    if(kCore_CheckAuthority('CustomerService', $_ChatRoom)){
        include_once __BackendFunc.'CustomerService/'.$_ChatRoom.'.php';
    }
    
    return $objResponse;
}

function BuildMsg($Action=NULL, $objResponse=NULL, $next=NULL, $type=NULL, $message=NULL, $MsgVal=NULL, $MemberInfo=NULL, $MsgKey=NULL){
    if($Action === 'return'){
        $type = $MsgVal['type'];
        $objResponse = new xajaxResponse();
    }
    if(!empty($Action) && !empty($objResponse) && !empty($next) && !empty($type) && (!empty($message)||!empty($MsgVal)) && !empty($MemberInfo)){
        $OriginalType = false;
        if($MsgVal['type']==='flex'){
            if(is_array($MsgVal['contents']) && $MsgVal['contents']['type']==='carousel'&&$MsgVal['contents']['contents'][0]['type']==='bubble'){
                if((count($MsgVal['contents']['contents'][0]['body']['contents'])===6 && 
                   $MsgVal['contents']['contents'][0]['body']['contents'][0]['type']==='image') || 
                        count($MsgVal['contents']['contents'][0]['body']['contents'])===5){
                        $Start = (count($MsgVal['contents']['contents'][0]['body']['contents'])===6) ? 1 : 0;
                        if($MsgVal['contents']['contents'][0]['body']['contents'][$Start+0]['type']==='box' && 
                            $MsgVal['contents']['contents'][0]['body']['contents'][$Start+1]['type']==='filler' && 
                            $MsgVal['contents']['contents'][0]['body']['contents'][$Start+2]['type']==='separator' && 
                            $MsgVal['contents']['contents'][0]['body']['contents'][$Start+3]['type']==='box' && 
                            $MsgVal['contents']['contents'][0]['body']['contents'][$Start+4]['type']==='spacer'){
                                    $type = 'line_template';
                        }else{
                                    $type = 'lineflex';
                        }        
                }else if(count($MsgVal['contents']['contents'][0]['body']['contents'])===2 && 
                         $MsgVal['contents']['contents'][0]['body']['justifyContent']==='center' && 
                         $MsgVal['contents']['contents'][0]['body']['contents'][0]['type']==='image' && 
                         $MsgVal['contents']['contents'][0]['body']['contents'][1]['type']==='box'){
                                    $type = 'imagecarousel';
                }else{
                                    $type = 'lineflex';
                }
            }else if(is_array($MsgVal['contents']) && $MsgVal['contents']['type']==='bubble'){
                if((count($MsgVal['contents']['body']['contents'])===5 &&
                    $MsgVal['contents']['body']['contents'][0]['type']==='image') || 
                    count($MsgVal['contents']['body']['contents'])===4){
                    $Start = (count($MsgVal['contents']['body']['contents'])===5) ? 1 : 0;
                    if($MsgVal['contents']['body']['contents'][$Start+0]['type']==='box' && 
                       $MsgVal['contents']['body']['contents'][$Start+1]['type']==='filler' && 
                       $MsgVal['contents']['body']['contents'][$Start+2]['type']==='separator' && 
                       $MsgVal['contents']['body']['contents'][$Start+3]['type']==='box'){
                                    $type = 'buttons';
                    }else{
                                    $type = 'lineflex';
                    }
                }else if(count($MsgVal['contents']['body']['contents'])===3 && 
                         $MsgVal['contents']['body']['contents'][0]['type']==='box' && 
                         $MsgVal['contents']['body']['contents'][1]['type']==='separator' && 
                         $MsgVal['contents']['body']['contents'][2]['type']==='box' && 
                         count($MsgVal['contents']['body']['contents'][2]['contents'])===2 && 
                         $MsgVal['contents']['body']['contents'][2]['layout']==='horizontal'){
                                    $type = 'confirm';
                }else if($MsgVal['contents']['size']==='giga' && 
                        substr($MsgVal['contents']['body']['contents'][0]['url'], -6)==='?/1040' && 
                        $MsgVal['contents']['body']['contents'][0]['type']==='image' && 
                        $MsgVal['contents']['body']['contents'][0]['size']==='full' && 
                        $MsgVal['contents']['body']['contents'][0]['aspectMode']==='cover' && 
                        !empty($MsgVal['contents']['body']['contents'][0]['aspectRatio'])){
                                    $message['subject']['message']['baseUrl'] = $MsgVal['baseUrl'] = $MsgVal['contents']['body']['contents'][0]['url'];
                                    $type = 'imagemap';
                }else{
                                    $type = 'lineflex';
                }
            }else{
                                    $type = 'lineflex';
            }
        }else if($MsgVal['type']==='template'){
            $OriginalType = true;
            switch ($MsgVal['template']['type']) {
                case 'buttons':
                    $type = 'buttons';
                    break;
                case 'carousel':
                    $type = 'line_template';
                    break;
                case 'confirm':
                    $type = 'confirm';
                    break;
                case 'image_carousel':
                    $type = 'imagecarousel';
                    break;
                default :
                    $OriginalType = false;
                    break;
            }
        }
        $line = new kLineMessaging();
        $_MSG = ($next==='message') ? $message['subject']['message'] : $MsgVal;
        $ImgError = 'onerror="this.src='."'". __RES_Web.'/images/Expired.jpg' ."';".'"';
        $MediaError = 'onerror="var DirectChat=$(this).parent().parent();DirectChat.html('."'". '<img>' ."'".');DirectChat.find('."'". 'img'."'". ').attr('."'". 'src'."'". ', '."'". __RES_Web.'/images/Expired.jpg'."'". ')'.'"';
        switch ($type) {
            case 'text'://[文字]
                if(empty($_MSG['reltext'])){
                    $_MSG['reltext'] = $_MSG['text'];
                }
                $text = ($next==='message') ? $_MSG['text'] : $_MSG['reltext'];
                $emojis = $_MSG['emojis'];
                //字串-找連結
                $text = kCore_addLink($text);
                $NewText = '';
                if(!empty($emojis)){//處理表情貼
                    $emojiArr = [];
                    $emojiRep = '○●';
                    //將emoji先取代為 2位元的(不常用的)字串($emojiRep)，並將取代之emoji存進陣列($emojiArr)
                    for($trg=0;$trg<mb_strlen($text, 'utf-8');$trg++){
                        $NowText = mb_substr($text, $trg, 1, 'utf-8');
                        if(strlen($NowText) >= 4){
                            $emojiArr[] = $NowText;
                            $NewText .= $emojiRep;
                        }else{
                            $NewText .= $NowText;
                        }
                    }
                    $PrevEmojiLen = 0;
                    $PrevPicLen = 0;
                    $indexList = array_column($emojis, 'index');
                    asort($indexList);
                    foreach ($indexList as $emojiKey => $index) {
                        $emoji = $emojis[$emojiKey];
                        $index = $emoji['index'];
                        $length = $emoji['length'] ? $emoji['length'] : 1;
                        $TotalLength = mb_strlen($NewText, 'utf-8');
                        $productId = $emoji['productId'];
                        $emojiId = $emoji['emojiId'];
                        $maxWidth = (count($emojis)===1&&$length===$TotalLength) ? '70' : '40';
                        $type = (count($emojis)===1&&$length===$TotalLength) ? 'sticker' : $type;
                        $AddPic = '<img style="max-width: '. $maxWidth .'px;" src="https://stickershop.line-scdn.net/sticonshop/v1/sticon/'. $productId .'/iphone/'. $emojiId .'.png">';
                        $str_Front = mb_substr($NewText, 0, $index+$PrevPicLen-$PrevEmojiLen, 'utf-8');
                        $str_Back = mb_substr($NewText, $index+$PrevPicLen-$PrevEmojiLen+$length, $TotalLength, 'utf-8');
                        $NewText = $str_Front .$AddPic. $str_Back;
                        $PrevEmojiLen += $length;
                        $PrevPicLen += mb_strlen($AddPic, 'utf-8');
                    }
                    //將先前取代掉的emoji，加回來
                    $NewTextTmp = explode($emojiRep, $NewText);
                    if($NewTextTmp){
                        $NewText = '';
                        foreach ($NewTextTmp as $key => $value) {
                            $NewText .= $value.$emojiArr[$key];
                        }
                    }
                }else{
                    $NewText = $text;
                }
                //字串-斷行
                if($Action === 'return'){
                    $view = '<ul id="MessagesArea" class="chat-style-2 MessagesArea">
                                <li class="direct-chat-msg message right sent">
                                    <div class="message__text">
                                        <div class="direct-chat-text text ReplyMsg ToEmoji">
                                        '. str_replace("\r\n", '<br/>', $NewText) .'
                                        </div>
                                    </div>
                                </li>
                            </ul>';
                }else{
                    $view = str_replace("\r\n", '<br/>', $NewText);
                }
                break;
            case 'sticker'://[貼圖]
                $ImageUrl = $line->stickerImg($_MSG['stickerResourceType'], $_MSG['packageId'], $_MSG['stickerId']);
                $view = '<img packageId="'.$_MSG['packageId'].'" stickerId="'.$_MSG['stickerId'].'" onclick="$(this)[0].src=$(this)[0].src;" style="max-width: 150px;cursor: pointer;" src="'. $ImageUrl .'">';//70px
                break;
            case 'image'://[圖片]
                if($next==='message'){
                    switch ($_MSG['contentProvider']['type']) {
                        case 'external':
                            $image = $_MSG['contentProvider']['previewImageUrl'];
                            break;
                        case 'line':
                        default:
                            $image = __CustomStickers_Web.'/ft/img/contentId/'.$_MSG['id'];
                            break;
                    }
                }else{
                    $image = $_MSG['previewImageUrl'];
                }
                $MaxWidth = ($Action === 'return') ? 'max-width: 21.875rem;' : 'max-width: 100%;';
                $view = '<img style="'.$MaxWidth.'" src="'. $image .'" '.$ImgError.'>';
                break;
            case 'audio'://[語音]
                $audio = ($next==='message') ? __CustomStickers_Web.'/ft/img/contentId/'.$_MSG['id'] : $_MSG['originalContentUrl'];
                $view = '<audio style="max-width: 100%;" controls><source src="'. $audio .'" '.$MediaError.'></audio>';
                break;
            case 'video'://[影片]
                $video = ($next==='message') ? __CustomStickers_Web.'/ft/img/contentId/'.$_MSG['id'] : $_MSG['originalContentUrl'];
                $view = '<video style="max-width: 100%;" controls><source src="'. $video .'" '.$MediaError.'></video>';
                break;
            case 'imagemap'://[圖文選單]
                $view = '<img style="max-width: 100%;" src="'. $_MSG['baseUrl'] .'" '.$ImgError.'>';
                break;
            case 'imagecarousel'://[大圖選單]
                $imagecarousel['contents'] = ($OriginalType) ? $_MSG['template']['columns'] : $_MSG['contents']['contents'];
                if(!empty($imagecarousel['contents'])){
                    $MinWidth = 270 * count($imagecarousel['contents']);
                    $view = '<div class="swiper-container"><div class="swiper-wrapper TemplateBG" style="min-width: '. $MinWidth .'px; display: block;">';
                    foreach ($imagecarousel['contents'] as $key => $bubble) {
                        $img = ($OriginalType) ? $bubble['imageUrl'] : $bubble['body']['contents'][0]['url'];
                        $subtitle = ($OriginalType) ? $bubble['action']['label'] : $bubble['body']['contents'][1]['contents'][0]['text'];
                        $view .= '<div class="swiper-slide oneTemplate">';
                        $view .= '<div class="TemplateImg ImageCarousel" style="background-image:url('. $img .');"><h3>'. $subtitle .'</h3></div>';
                        $view .= '</div>';
                    }
                    $view .= '</div></div>';
                }
                break;
            case 'confirm'://[確認卡片]
                $subtitle = $subcontent = (!empty($OriginalType)) ? $_MSG['template']['text'] : $_MSG['contents']['body']['contents'][0]['contents'][0]['text'];
                $subvalueRight = (!empty($OriginalType)) ? $_MSG['template']['actions'][0]['text'] : $_MSG['contents']['body']['contents'][2]['contents'][0]['contents'][0]['text'];
                $subvalueLeft = (!empty($OriginalType)) ? $_MSG['template']['actions'][1]['text'] : $_MSG['contents']['body']['contents'][2]['contents'][1]['contents'][0]['text'];
                $view = '<div class="swiper-container"><div class="swiper-wrapper TemplateBG" style="min-width: 100%;overflow:hidden; display: block;">';
                    $view .= '<div class="swiper-slide oneTemplate">';
                        $view .= '<div class="TemplateInfo confirm"  style="border-radius: 10px;"><h3>'. $subtitle .'</h3>';
                            $view .= '<ul><li>'. $subvalueRight .'</li><li>'. $subvalueLeft .'</li></ul>';
                        $view .= '</div>';
                    $view .= '</div>';
                $view .= '</div></div>';
                break;
            case 'buttons'://[按鈕卡片]
            case 'line_template'://[卡片式選單]
                $MinWidth = ($type==='buttons') ? '100%' : '';
                if($type==='buttons'){
                    $line_template['contents'] = (!empty($OriginalType)) ? array($_MSG['template']) : array($_MSG['contents']);
                }else{
                    $line_template['contents'] = (!empty($OriginalType)) ? $_MSG['template']['columns'] : $_MSG['contents']['contents'];
                }
                if($line_template['contents']){
                    $MinWidth = !empty($MinWidth) ? $MinWidth.';overflow:hidden' : (270*count($line_template['contents'])).'px';
                    $view = '<div class="swiper-container"><div class="swiper-wrapper TemplateBG" style="min-width: '. $MinWidth .'; display: block;">';
                    foreach ($line_template['contents'] as $key => $bubble) {
                        if($OriginalType){
                            $img = $bubble['thumbnailImageUrl'];
                            $subtitle = $bubble['title'];
                            $subcontent = $bubble['text'];
                            $subject = array_column($bubble['actions'], 'label');
                        }else{
                            $ContentKey = 0;
                            $BodyContents = $bubble['body']['contents'];
                            if(($BodyContents[0]['type']==='image')){
                                $ContentKey++;
                                $img = $BodyContents[0]['url'];
                            }
                            $subtitle = $BodyContents[$ContentKey]['contents'][0]['text'];
                            $subcontent = $BodyContents[$ContentKey]['contents'][1]['text'];
                            $ContentKey++;//subtitle、subcontent
                            $ContentKey++;//filler
                            $ContentKey++;//separator
                            if($BodyContents[$ContentKey]['contents']){//各按鈕
                                $subject = array();
                                foreach ($BodyContents[$ContentKey]['contents'] as $BtnKey => $BtnVal) {
                                    $subject[] = $BtnVal['contents'][0]['text'];
                                }
                            }
                        }
                        $view .= '<div class="swiper-slide oneTemplate">';
                        if($img){
                            $view .= '<div class="TemplateImg LineTemplate" style="background-image:url('. $img .');"></div>';
                            $view .= '<div class="TemplateInfo"><h3>'. $subtitle .'</h3>';
                        }else{
                            $view .= '<div class="TemplateInfo"  style="border-radius: 10px;"><h3>'. $subtitle .'</h3>';
                        }
                        $view .= '<pre>'. $subcontent .'</pre>';
                        $view .= '<ul>';
                        if(!empty($subject)){
                            foreach ($subject as $subkey => $subvalue) {
                                $view .= '<li>'. $subvalue .'</li>';
                            }
                        }
                        $view .= '</ul></div></div>';
                    }
                    $view .= '</div></div>';
                }
                break;
            case 'lineflex'://[Flex訊息]
                $lineflex = $_MSG['contents'];
                $MessageId = microtime(true)*10000;
                $view = "<div id='IFrame".$MessageId."' data-MessageId='".$MessageId."' data-json='".json_encode($lineflex)."' onclick='GetFlexView($(this), $(this).attr(\"data-json\"), {\"CopyMessageId\":\"".$MessageId."\"}, {});'></div>";
                $objResponse->call('CheckFlexIFrame', 'IFrame'.$MessageId);
                break;
            case 'location'://[位置]
                $view = '<div class="locationMap">'
                            . '<a target="__NEW" href="https://www.google.com.tw/maps/place/'. $_MSG['address'] .'/@'. $_MSG['latitude'] .','. $_MSG['longitude'] .',13z"><span>位置資訊 '. $_MSG['address'] .'</span></a>'
                    . '</div>';
                break;
            case 'file'://[檔案]
                $view = '<div class="LineFile">'
                            . '<a target="__NEW" href="'.__CustomStickers_Web.'/ft/img/contentId/'. $_MSG['id'] .'">'
                                . '<i class="fa fa-fw fa-file file-icon"></i>'
                                . '<div class="file-box">'
                                    . '<div class="file-title">'. $_MSG['fileName'] .'</div>'
                                    . '<div class="file-content">檔案大小 : '. round($_MSG['fileSize']/1000, 2) .'kB</div>'
                                . '</div>'
                                . '<i class="fa fa-fw fa-chevron-right file-open-icon"></i>'
                            . '</a>'
                    . '</div>';
                break;
            default ://[其他]
                $view = $type;//NULL
                $type = 'text';
                break;
        }
        if($Action === 'return'){
            $objResponse->assign('CustomPreview', 'innerHTML', str_replace("\n", '', $view));
            if($MsgKey !== 'MsgKey'){
                $objResponse->assign($MsgKey, 'innerHTML', str_replace("\n", '', $view));
            }
            return $objResponse;
        }else{
            PrependMsg('line', $Action, $objResponse, $message, $type, $view, $MemberInfo, $MsgKey);
        }
    }
}

function BuildFacebookMsg($Action=NULL, $objResponse=NULL, $next=NULL, $type=NULL, $message=NULL, $MsgVal=NULL, $MemberInfo=NULL, $MsgKey=NULL){
    if($Action === 'return'){
        $type = !empty($MsgVal['type']) ? $MsgVal['type'] : $type;
        $objResponse = new xajaxResponse();
    }
    if(!empty($Action) && !empty($objResponse) && !empty($next) && !empty($type) && (!empty($message)||!empty($MsgVal)) && !empty($MemberInfo)){
        $OriginalType = false;
        $_MSG = ($next==='message') ? $message['subject']['message'] : $MsgVal;
        switch ($_MSG['attachment']['type']) {
            case 'template':
                switch ($_MSG['attachment']['payload']['template_type']) {
                    case 'generic':
                        if(count($_MSG['attachment']['payload']['elements']) === 1){
                            $type = 'buttons';
                        }else{
                            $type = 'fb_template';
                        }
                        break;
                    case 'button':
                        $type = 'buttons';
                        $_MSG['attachment']['payload']['elements'] = array([
                            "title" => $_MSG['attachment']['payload']['text'],
                            "buttons" => $_MSG['attachment']['payload']['buttons'],
                        ]);
                        break;
                    case 'list':
                        $type = 'fb_listtemplate';
                        break;
                    case 'media':
                        $type = 'fb_mediatemplate';
                        break;
                    case 'receipt':
                        $type = 'fb_receipttemplate';
                        break;
                    default :
                        $type = 'template-' . $_MSG['attachment']['payload']['template_type'];
                        break;
                }
                break;
        }
        $ImgError = 'onerror="this.src='."'". __RES_Web.'/images/Expired.jpg' ."';".'"';
        $MediaError = 'onerror="var DirectChat=$(this).parent().parent();DirectChat.html('."'". '<img>' ."'".');DirectChat.find('."'". 'img'."'". ').attr('."'". 'src'."'". ', '."'". __RES_Web.'/images/Expired.jpg'."'". ')'.'"';
        $view = '';
        switch ($type) {
            case 'text'://[文字]
                $text = $_MSG['text'];
                $emojis = $_MSG['emojis'];
                //字串-找連結
                $text = kCore_addLink($text);
                //字串-斷行
                $view = str_replace("\r\n", '<br/>', $text);
                break;
            case 'image'://[圖片]
                $image = ($next==='message') ? $_MSG['attachments'][0]['payload']['url'] : $_MSG['attachment']['payload']['url'];
                $view = '<img style="max-width: 100%;" src="'. $image .'" '.$ImgError.'>';
                break;
            case 'audio'://[語音]
                $audio = ($next==='message') ? $_MSG['attachments'][0]['payload']['url'] : $_MSG['attachment']['payload']['url'];
                $view = '<audio style="max-width: 100%;" controls><source src="'. $audio .'" '.$MediaError.'></audio>';
                break;
            case 'video'://[影片]
                $video = ($next==='message') ? $_MSG['attachments'][0]['payload']['url'] : $_MSG['attachment']['payload']['url'];
                $view = '<video style="max-width: 100%;" controls><source src="'. $video .'" '.$MediaError.'></video>';
                break;
            case 'confirm'://[確認卡片]
                $subtitle = $subcontent = !empty($OriginalType) ? $_MSG['template']['text'] : $_MSG['contents']['body']['contents'][0]['contents'][0]['text'];
                $subvalueRight = !empty($OriginalType) ? $_MSG['template']['actions'][0]['text'] : $_MSG['contents']['body']['contents'][2]['contents'][0]['contents'][0]['text'];
                $subvalueLeft = !empty($OriginalType) ? $_MSG['template']['actions'][1]['text'] : $_MSG['contents']['body']['contents'][2]['contents'][1]['contents'][0]['text'];
                $view = '<div class="swiper-container"><div class="swiper-wrapper TemplateBG" style="min-width: 100%;overflow:hidden; display: block;">';
                    $view .= '<div class="swiper-slide oneTemplate">';
                        $view .= '<div class="TemplateInfo confirm FB"  style="border-radius: 10px;"><h3>'. $subtitle .'</h3>';
                            $view .= '<ul><li>'. $subvalueRight .'</li><li>'. $subvalueLeft .'</li></ul>';
                        $view .= '</div>';
                    $view .= '</div>';
                $view .= '</div></div>';
                break;
            case 'buttons'://[按鈕卡片]
            case 'fb_template'://[卡片式選單]
                $MinWidth = ($type==='buttons') ? '100%' : '';
                $line_template['contents'] = $_MSG['attachment']['payload']['elements'];
                if($line_template['contents']){
                    $MinWidth = !empty($MinWidth) ? $MinWidth.';overflow:hidden' : (270*count($line_template['contents'])).'px';
                    $view = '<div class="swiper-container"><div class="swiper-wrapper TemplateBG" style="min-width: '. $MinWidth .'; display: block;">';
                    foreach ($line_template['contents'] as $key => $bubble) {
                        $img = $bubble['image_url'];
                        $subtitle = $bubble['title'];
                        $subcontent = $bubble['subtitle'];
                        if(!empty($bubble['buttons'])){
                            foreach ($bubble['buttons'] as $buttonKey => $buttonVal) {
                                switch($buttonVal['type']){
                                    case 'account_link':
                                        $subject[] = '登入';
                                        break;
                                    default:
                                        $subject[] = $buttonVal['label'] ? $buttonVal['label'] : $buttonVal['title'];
                                        break;
                                }
                            }
                        }
                        $view .= '<div class="swiper-slide oneTemplate">';
                        if(!empty($img)){
                            $view .= '<div class="TemplateImg LineTemplate" style="background-image:url('. $img .');"></div>';
                            $view .= '<div class="TemplateInfo FB"><h3>'. $subtitle .'</h3>';
                        }else{
                            $view .= '<div class="TemplateInfo FB"  style="border-radius: 10px;"><h3>'. $subtitle .'</h3>';
                        }
                        $view .= '<pre>'. $subcontent .'</pre>';
                        $view .= '<ul>';
                        if(!empty($subject)){
                            foreach ($subject as $subkey => $subvalue) {
                                $view .= '<li>'. $subvalue .'</li>';
                            }
                        }
                        $view .= '</ul></div></div>';
                    }
                    $view .= '</div></div>';
                }
                break;
            case 'fb_listtemplate'://(已停用)
                $line_template['contents'] = $_MSG['attachment']['payload']['elements'];
                if(!empty($line_template['contents'])){
                    $topStyle = $_MSG['attachment']['payload']['top_element_style'];
                    $view .= '<div class="swiper-slide oneTemplate">';
                        foreach ($line_template['contents'] as $elementKey => $elementVal) {
                            $Style = 'background-color:#fff;';
                            $borderRadius = ($elementKey===(count($line_template['contents'])-1)&&empty($_MSG['attachment']['payload']['buttons'])) ? '' : 'border-radius:0px;';
                            if($elementKey==0){
                                if($topStyle!=='compact'){
                                    if(!empty($elementVal['image_url'])){
                                        $Style = 'background-color:#ffffff00;position:absolute;width:260px;margin-top:-79px;';
                                        $view .= '<div class="TemplateImg LineTemplate" style="background-size:100% 100%;background-image:url('.__WEB_UPLOAD.'/image/'. $elementVal['image_url'] .');"></div>';
                                    }else{
                                        $borderRadius = 'border-radius:10px 10px 0px 0px;';
                                    }
                                }else{
                                    $borderRadius = 'border-radius:10px 10px 0px 0px;';
                                }
                            }
                            $view .= '<div class="TemplateInfo FB" style="'. $Style.$borderRadius .'border-bottom:1px solid #eaeaea;">';
                            $view .= '<h3 style="width:150px;">'. $elementVal['title'] .'</h3><pre style="width:150px;background-color:#fff;">'. $elementVal['subtitle'] .'</pre>';
                            if($elementKey!==0 || ($elementKey===0&&$topStyle==='compact')){
                                if(!empty($elementVal['image_url'])){
                                    $view .= '<div class="TemplateImg LineTemplate" style="float:right;margin-top:-60px;width:90px;height:60px;background-size:100% 100%;background-image:url('.__WEB_UPLOAD.'/image/'. $elementVal['image_url'] .');"></div>';
                                }
                            }
                            $view .= '</div>';
                        }
                        if(!empty($_MSG['attachment']['payload']['buttons'])){
                            $view .= '<div class="TemplateInfo FB" style="background-color:#fff;border-bottom:1px solid #eaeaea;">';
                                $view .= '<h3 style="color:#627fab;margin-bottom:0px;text-align:center;">'. $_MSG['attachment']['payload']['buttons'][0]['title'] .'</h3>';
                            $view .= '</div>';
                        }
                    $view .= '</div>';
                }
                break;
            case 'fb_mediatemplate':
                $line_template['contents'] = $_MSG['attachment']['payload']['elements'][0];
                if(!empty($line_template['contents'])){
                    $media_type = $line_template['contents']['media_type'];
                    $attachment_id = $line_template['contents']['attachment_id'];
                    $SQL_FB_MediaTemplate = new kSQL('FB_MediaTemplate');
                    $media = $SQL_FB_MediaTemplate->SetAction('select')->SetWhere("subject LIKE '%". '"attachment_id":"'.$attachment_id.'"' ."%'")->BuildQuery();
                    $view .= '<div class="swiper-slide oneTemplate">';
                    if($media_type==='video'){
                        $view .= '<video style="width:100%;height:100%;margin-bottom:-5px;background-color:#eaeaea;" class="TemplateImg LineTemplate" controls><source src="'.__WEB_UPLOAD.'/video/'. $attachment_id .'"></video>';
                    }else{
                        $view .= '<img style="width:100%;height:100%;background-color:#eaeaea;" class="TemplateImg LineTemplate" src="'.__WEB_UPLOAD.'/image/'. $attachment_id .'" />';
                    }
                    $view .= '<div style="padding-top:0px;" class="TemplateInfo FB">';
                    $view .= '<ul>';
                    $Style = 'color:#000;';
                    if(!empty($line_template['contents']['buttons'])){
                        $Btn = count($line_template['contents']['buttons']);
                        $Style .= ($Btn===2) ? 'display:inline-block;width:49%;' : '';
                        foreach ($line_template['contents']['buttons'] as $buttonKey => $buttonVal) {
                            $Style .= ($Btn===2&&$buttonKey===1) ? 'margin-left: 2%;' : '';
                            $view .= '<li style="'. $Style .'">'. $buttonVal['title'] .'</li>';
                        }
                    }
                    $view .= '</ul></div></div>';
                }
                break;
            case 'fb_receipttemplate':
                $line_template = $_MSG['attachment']['payload'];
                $view .= '<div class="OrderConfirmDetails" style="display:none;">';
                    $view .= '<div class="h4">';
                        $view .= '<span class="confirmTitle">訂單確認</span>';
                        $view .= '<span class="finish" onclick="$(this).parents(\'.OrderConfirmDetails\').hide();$(this).parents(\'.OrderConfirmDetails\').parent().find(\'.OrderConfirm\').show();">完成</span>';
                    $view .= '</div>';
                    $view .= '<div class="body">';
                        $view .= '<div class="products">';
                            $view .= '<div class="subtitle">商品</div>';
                            $view .= '<div class="subbody">';
                                if(!empty($line_template['elements'])){
                                    foreach ($line_template['elements'] as $elementKey => $elementVal) {
                                        if(!empty($elementVal['title'])){
                                            $view .= '<div class="productItem">';
                                                $view .= '<div class="pic">';
                                                    if(!empty($elementVal['image_url'])){ $view .= '<img src="'. $elementVal['image_url'] .'">'; }
                                                $view .= '</div>';
                                                $view .= '<div class="text">';
                                                    $view .= '<div class="productTitle">';
                                                        if(!empty($elementVal['title'])){ $view .= $elementVal['title']; }
                                                        if($elementVal['quantity']>=0){ $view .= '▪Qty.' . $elementVal['quantity'] ; }
                                                        if($elementVal['price']>=0){ $view .= '▪$' . number_format(round($elementVal['price'])); }
                                                    $view .= '</div>';
                                                    if($elementVal['subtitle']){ $view .= '<div class="productContent">'. $elementVal['subtitle'] .'</div>'; }
                                                $view .= '</div>';
                                            $view .= '</div>';
                                        }
                                    }
                                }
                            $view .= '</div>';
                        $view .= '</div>';
                        $view .= '<div class="ordertime">';
                            $view .= '<div class="subtitle">訂購時間</div>';
                            $view .= '<div class="subbody">'. date("Y年m月d日 H:i:s", $line_template['timestamp']) .'</div>';
                        $view .= '</div>';
                        $view .= '<div class="payway">';
                            $view .= '<div class="subtitle">付款方式</div>';
                            $view .= '<div class="subbody">'. $line_template['payment_method'] .'</div>';
                        $view .= '</div>';
                        $view .= '<div class="receiptplace">';
                            $view .= '<div class="subtitle">收貨地點</div>';
                            $view .= '<div class="subbody">';
                                if(!empty($line_template['recipient_name'])){ $view .= $line_template['recipient_name'] . '<br>'; }
                                if(!empty($line_template['address'])){
                                    if(!empty($line_template['address']['street_1'])){ $view .= $line_template['address']['street_1']; }
                                    if(!empty($line_template['address']['street_2'])){ $view .= ' ' . $line_template['address']['street_2']; }
                                    if(!empty($line_template['address']['street_1']) || !empty($line_template['address']['street_2'])){  $view .= '<br>'; }
                                    if(!empty($line_template['address']['city'])){ $view .= $line_template['address']['city']; }
                                    if(!empty($line_template['address']['state'])){ $view .= ', ' . $line_template['address']['state']; }
                                    if(!empty($line_template['address']['postal_code'])){ $view .= ' ' . $line_template['address']['postal_code']; }
                                }
                            $view .= '</div>';
                        $view .= '</div>';
                        $view .= '<div class="summary">';
                            $view .= '<div class="subtitle">摘要</div>';
                            $view .= '<div class="subbody">';
                                if(!empty($line_template['summary'])){
                                    if($line_template['summary']['subtotal']>=0){
                                        $view .= '<div>小計';
                                            $view .= '<div class="summaryItem">$'. number_format(round($line_template['summary']['subtotal'])) .'</div>';
                                        $view .= '</div>';
                                    }
                                    if($line_template['summary']['shipping_cost']>=0){
                                        $view .= '<div>運費';
                                            $view .= '<div class="summaryItem">$'. number_format(round($line_template['summary']['shipping_cost'])) .'</div>';
                                        $view .= '</div>';
                                    }
                                    if($line_template['summary']['total_tax']>=0){
                                        $view .= '<div>預估稅金';
                                            $view .= '<div class="summaryItem">$'. number_format(round($line_template['summary']['total_tax'])) .'</div>';
                                        $view .= '</div>';
                                    }
                                    if(!empty($line_template['adjustments'])){
                                        foreach ($line_template['adjustments'] as $adjustmentKey => $adjustmentsVal) {
                                            if(!empty($adjustmentsVal['name']) && $adjustmentsVal['amount']>=0){
                                                $view .= '<div>' . $adjustmentsVal['name'];
                                                    $view .= '<div class="summaryItem">$'. number_format(round($adjustmentsVal['amount'])) .'</div>';
                                                $view .= '</div>';
                                            }
                                        }
                                    }
                                    if($line_template['summary']['total_cost']>=0){
                                        $view .= '<br><div>總計';
                                            $view .= '<div class="summaryItem">$'. number_format(round($line_template['summary']['total_cost'])) .'</div>';
                                        $view .= '</div>';
                                    }
                                }
                            $view .= '</div>';
                        $view .= '</div>';
                    $view .= '</div>';
                $view .= '</div>';
                
                $view .= '<div class="OrderConfirm" onclick="$(this).hide();$(this).parent().find(\'.OrderConfirmDetails\').show();">';
                    $view .= '<div class="IconArea">';
                        $view .= '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 507.2 507.2" xml:space="preserve">'.
                                    '<circle style="fill:#32BA7C;" cx="253.6" cy="253.6" r="253.6"/>'.
                                    '<path style="fill:#0AA06E;" d="M188.8,368l130.4,130.4c108-28.8,188-127.2,188-244.8c0-2.4,0-4.8,0-7.2L404.8,152L188.8,368z"/>'.
                                    '<g>'.
                                        '<path style="fill:#FFFFFF;" d="M260,310.4c11.2,11.2,11.2,30.4,0,41.6l-23.2,23.2c-11.2,11.2-30.4,11.2-41.6,0L93.6,272.8   c-11.2-11.2-11.2-30.4,0-41.6l23.2-23.2c11.2-11.2,30.4-11.2,41.6,0L260,310.4z"/>'.
                                        '<path style="fill:#FFFFFF;" d="M348.8,133.6c11.2-11.2,30.4-11.2,41.6,0l23.2,23.2c11.2,11.2,11.2,30.4,0,41.6l-176,175.2   c-11.2,11.2-30.4,11.2-41.6,0l-23.2-23.2c-11.2-11.2-11.2-30.4,0-41.6L348.8,133.6z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g>'.
                                    '</g>'.
                                '</svg>';
                    $view .= '</div>';
                    $view .= '<div class="TextArea">';
                        $view .= '<h4>訂單確認</h4>';
                        $view .= '<span>'. count($line_template['elements']) .' 項目 $'. number_format(round($line_template['summary']['total_cost'])) .'</span><br>';
                        $view .= '<span>'. $line_template['payment_method'] .'</span><br>';
                        if($line_template['address']){
                            $view .= '<span>收貨地點 '. $line_template['address']['city'].','.$line_template['address']['state'].' '.$line_template['address']['postal_code'] .'</span>';
                        }
                    $view .= '</div>';
                $view .= '</div>';
                break;
            case 'location'://[位置]
                $view = '<div class="locationMap">'
                            . '<a target="__NEW" href="https://www.google.com.tw/maps/place/'. $_MSG['address'] .'/@'. $_MSG['latitude'] .','. $_MSG['longitude'] .',13z"><span>位置資訊 '. $_MSG['address'] .'</span></a>'
                    . '</div>';
                break;
            case 'file'://[檔案]
                $view = '<div class="LineFile">'
                            . '<a target="__NEW" href="'.__CustomStickers_Web.'/ft/img/contentId/'. $_MSG['id'] .'">'
                                . '<i class="fa fa-fw fa-file file-icon"></i>'
                                . '<div class="file-box">'
                                    . '<div class="file-title">'. $_MSG['fileName'] .'</div>'
                                    . '<div class="file-content">檔案大小 : '. round($_MSG['fileSize']/1000, 2) .'kB</div>'
                                . '</div>'
                                . '<i class="fa fa-fw fa-chevron-right file-open-icon"></i>'
                            . '</a>'
                    . '</div>';
                break;
            default ://[其他]
                $view = $type;//NULL
                $type = 'text';
                break;
        }
        if($Action === 'return'){
            $objResponse->assign('CustomPreview', 'innerHTML', str_replace("\n", '', $view));
            if($MsgKey !== 'MsgKey'){
                $objResponse->assign($MsgKey, 'innerHTML', str_replace("\n", '', $view));
            }
            return $objResponse;
        }else{
            PrependMsg('facebook', $Action, $objResponse, $message, $type, $view, $MemberInfo, $MsgKey);
        }
    }
}



function LoadMsg($ChatRoom=NULL, $UID=NULL, $MsgLength=0, $Action='prepend', $objResponse=NULL, $ActType='update') {
    if(empty($objResponse)){
        $NotFromUpdate = 1;
        $objResponse = new xajaxResponse();
    }
    
    $scrollbar = ".parents('.custom-scrollbar2')";
    $MessagesArea = 'MessagesArea';
    $ReSortMsg = 'ReSortMsg';
    $ChatBox = 'ChatBox';
    $SendBox = 'SendBox';
    $LastMessageTime = 'LastMessageTime';
    switch($ChatRoom){
        case 'line':
            $_tablename = "tablename='line'";
            $next = "next='message' OR prev='service'";
            $nextRead = "next='message'";
            break;
        case 'facebook':
            $_tablename = "tablename='facebook'";
            $next = "next!='account_linkin'";
            $nextRead = "next!='account_linkin'";
            break;
    } 
    
    if($ActType==='start' && $Action==='prepend'){
        $_SESSION[__DOMAIN.$LastMessageTime] = '';
        $objResponse->script('$("#'.$MessagesArea.'").html("");');
    }
    $SQL_LineMember = new kSQL('LineMember');
    if(!empty($UID)){
        $Member = $SQL_LineMember->SetAction('select')
                                ->SetWhere("propertyA='". $UID ."'")
                                ->BuildQuery();
        $MemberInfo = $Member[0];
    }
    if(!empty($MemberInfo)){
        $Messages = array();
        $SQL_LineRecord = new kSQL('LineRecord');
        $LineRecordMessages = $SQL_LineRecord->SetAction("select")
                                            ->SetWhere($_tablename)
                                            ->SetWhere($next)
                                            ->SetWhere("propertyA='". $UID ."'")
                                            ->SetWhere("create_at BETWEEN '" . date('Y-m-d H:i:s', strtotime('-3 seconds')) . "' AND '" . date('Y-m-d H:i:s') . "'", ($Action==='append') ? 1 : 0)
                                            ->SetWhere("content IS NULL OR content not like '". '%"error":%' ."'", ($ChatRoom==='facebook') ? 1 : 0)
                                            ->SetOrder("id ASC", ($Action==='append') ? 1 : 0)
                                            ->SetOrder("id DESC", ($Action==='prepend') ? 1 : 0)
                                            ->SetLimit("$MsgLength, 10", ($Action==='prepend') ? 1 : 0)
                                            ->echoSQL(0)
                                            ->BuildQuery();
        //已讀當前[ 聊天室成員 ]
        $SQL_LineRecord->SetAction("update")
                        ->SetWhere($_tablename)
                        ->SetWhere($nextRead)
                        ->SetWhere("propertyA='". $UID ."'")
                        ->SetWhere("viewA!='on' OR viewA IS NULL")
                        ->SetValue('viewA', 'on')
                        ->BuildQuery();
        if(!empty($LineRecordMessages)){
            foreach ($LineRecordMessages as $LineRecordMessageKey => $LineRecordMessageVal) {
                $Messages[$LineRecordMessageVal['id'].'1'] = $LineRecordMessageVal;
            }
        }
        $SQL_LineLog = new kSQL('LineLog');
        $CreateOr = ($ActType==='start') ? "create_at > '".$LineRecordMessages[0]['create_at']."' OR " : '';
        $CreateBetweenLog = ($_SESSION[__DOMAIN.$LastMessageTime]) ? " OR create_at BETWEEN '" . $LineRecordMessages[0]['create_at'] . "' AND '" . $_SESSION[__DOMAIN.$LastMessageTime] . "'" : '';
        if( !empty($LineRecordMessages) || (empty($LineRecordMessages)&&$ActType==='start') ){
            $LogMessages = $SQL_LineLog->SetAction("select")
                                        ->SetWhere("tablename='line'")
                                        ->SetWhere("next='reply' OR next='push'")
                                        ->SetWhere("propertyA='". $UID ."'")
                                        ->SetWhere("content like '". '%"contentA":"{}"%' ."'")
                                        ->SetWhere($CreateOr . "create_at BETWEEN '" . $LineRecordMessages[count($LineRecordMessages)-1]['create_at'] . "' AND '" . $LineRecordMessages[0]['create_at'] . "'" . $CreateBetweenLog, ($LineRecordMessages) ? 1 : 0)
                                        ->SetWhere("", ($ActType==='start'&&!$LineRecordMessages) ? 1 : 0)
                                        ->SetOrder("id ASC", ($Action==='append') ? 1 : 0)
                                        ->SetOrder("id DESC", ($Action==='prepend') ? 1 : 0)
                                        ->echoSQL(0)
                                        ->BuildQuery();
        }
        if(!empty($LogMessages)){
            foreach ($LogMessages as $LogMessagesKey => $LogMessagesVal) {
                $Messages[$LogMessagesVal['id'].'2'] = $LogMessagesVal;
            }
        }
        if(!empty($Messages)){
            if($Action==='append'){
                ksort($Messages);
            }else{
                krsort($Messages);
            }
//            $objResponse->alert(json_encode($Messages));
            if($ActType === 'start'){
                $objResponse->script("$('#".$MessagesArea."').html('');");
            }
            foreach ($Messages as $key => $message) {
                if( empty($_SESSION[__DOMAIN.$LastMessageTime]) || (!empty($_SESSION[__DOMAIN.$LastMessageTime])&&$_SESSION[__DOMAIN.$LastMessageTime]<$message['create_at']) ){
                    $_SESSION[__DOMAIN.$LastMessageTime] = $message['create_at'];
                }
                switch($ChatRoom){
                    case 'line':
                        if($message['next'] === 'message'){
                            $MsgKey = 0;
                            $MsgVal = $message['subject']['message'];
                            BuildMsg($Action, $objResponse, $message['next'], $MsgVal['type'], $message, $MsgVal, $MemberInfo, $MsgKey);
                        }else{
                            if($message['prev'] === 'service'){
                                $Action = 'prepend';
                                $message['subject'] = $message;
                            }
                            if($message['subject']['subject']['messages']){
                                $message['subject']['subject']['messages'] = array_reverse($message['subject']['subject']['messages'], true);
                                foreach ($message['subject']['subject']['messages'] as $MsgKey => $MsgVal) {
                                    BuildMsg($Action, $objResponse, $message['next'], $MsgVal['type'], $message, $MsgVal, $MemberInfo, $MsgKey);
                                }
                            }
                        }
                        break;
                    case 'facebook':
                        if($message['next']==='reply' || $message['next']==='push'){
                            $MsgKey = 0;
                            if($message['prev']==='service'){
                                $message['subject'] = $message;
                            }
                            $MsgVal = $message['subject']['subject']['message'];
                            $type = $MsgVal['text'] ? 'text' : $MsgVal['attachment']['type'];
                            BuildFacebookMsg($Action, $objResponse, 'service', $type, $message, $MsgVal, $MemberInfo, $MsgKey);
                        }else{
                            $MsgKey = 0;
                            $MsgVal = $message['subject']['message'];
                            $type = $message['next'];
                            BuildFacebookMsg($Action, $objResponse, 'message', $type, $message, $MsgVal, $MemberInfo, $MsgKey);
                        }
                        break;
                }
            }
            $objResponse->call($ReSortMsg);
            if($ActType === 'start'){
                $objResponse->script("window.setTimeout(function () {
                                        $('#".$MessagesArea.">li').eq(-1)[0].scrollIntoView();
                                    }, 500);");
            }else if($ActType === 'more'){
                $objResponse->script("$('#".$MessagesArea."')".$scrollbar.".stop().animate({
                                            scrollTop: 10
                                        }, 500);");
            }
        }
        if($Action === 'prepend'){
            $objResponse->script('$(".chatapp__conversations").addClass("open");$("#'.$ChatBox.'").removeClass("direct-chat-contacts-open").show();$("#'.$SendBox.'").show();$("#'.$SendBox.'").parents(".box-footer").css("padding", "10px");');
        }

        //會員資料
        $MemberImg = '$("#MemberInfo #MemberImg").css("background-image", "url(\"'.$MemberInfo['subject']['pictureUrl'].'\"), url(\"/library/res/images/person.jpg\")");';
        $MemberName = '$("#MemberInfo #MemberName").html("'. $MemberInfo['subject']['displayName'] .'");';
        $MemberPlatform = '';
        switch($ChatRoom){
            case 'line':
                $MemberPlatform .= '$("#MemberInfo #MemberPlatform>[data-platform=\'line\']").css("color", "var(--origin)").attr("data-redirect", "false").attr("data-UID", "'.$MemberInfo['propertyA'].'").show();';
                if(!empty($MemberInfo['propertyE'])){
                    $MemberPlatform .= '$("#MemberInfo #MemberPlatform>[data-platform=\'facebook\']").css("color", "#949aa2").attr("data-redirect", "true").attr("data-UID", "'.$MemberInfo['propertyE'].'").show();';
                }else{
                    $MemberPlatform .= '$("#MemberInfo #MemberPlatform>[data-platform=\'facebook\']").hide();';
                }
                break;
            case 'facebook':
                if(!empty($MemberInfo['propertyE'])){
                    $MemberPlatform .= '$("#MemberInfo #MemberPlatform>[data-platform=\'line\']").css("color", "#949aa2").attr("data-redirect", "true").attr("data-UID", "'.$MemberInfo['propertyE'].'").show();';
                }else{
                    $MemberPlatform .= '$("#MemberInfo #MemberPlatform>[data-platform=\'line\']").hide();';
                }
                $MemberPlatform .= '$("#MemberInfo #MemberPlatform>[data-platform=\'facebook\']").css("color", "var(--origin)").attr("data-redirect", "false").attr("data-UID", "'.$MemberInfo['propertyA'].'").show();';
                break;
        }
        
        $MemberTagsCount = '';
        $MemberTags = '';
        if(kCore_CheckAuthority('Tag', 'index')){
            $MemberTagVal = kCore_Tag('SelectOptionVals', array("userId"=>$UID, 'GetPrev'=>true));
            $MemberTagsCount = '$("#MemberInfo #MemberTagsCount").html("'. count($MemberTagVal) .'");';
            $TagHtml = '';
            if(!empty($MemberTagVal)){
                foreach ($MemberTagVal as $tkey => $tvalue) {
                    $TagHtml .= '<span style=\'margin-right:5px;\' class=\'badge label-success\'>'. $tvalue .'</span>';
                }
            }
            $MemberTags = '$("#MemberInfo #MemberTags").html("'. $TagHtml .'");';
        }
        $objResponse->script($MemberImg.$MemberName.$MemberPlatform.$MemberTagsCount.$MemberTags);
    }
    if($NotFromUpdate){
        return $objResponse;
    }
}

function PrependMsg($ChatRoom=NULL, $Action=NULL, $objResponse=NULL, $message=NULL, $type=NULL, $view=NULL, $MemberInfo=NULL, $MsgKey=NULL) {
    if(!empty($ChatRoom) && !empty($Action) && !empty($objResponse) && !empty($message) && !empty($type) && !empty($view) && !empty($MemberInfo)){
        $AppendMsg = 'AppendMsg';
        switch($ChatRoom){
            case 'line':
                $_Name = _LineAtName;
                $_Picture = _LineAtPic;
                $_From = $message['next']!='message'||$message['prev']=='service' ? 'service' : 'member';
                $Class = $message['next']==='reply' ? 'ReplyMsg' : 'PushMsg';
                break;
            case 'facebook':
                $_Name = __FB_Page_Name;
                $_Picture = __FB_Page_Picture;
                $_From = ($message['next']==='reply' || $message['next']==='push') ? 'service' : 'member';
                $Class = 'FacebookMsg';
                break;
        }
        
        $_Html = NULL;
        $DataKey = $_From.'-'.$message['id'].'-'.$MsgKey;
        $ImgError = 'onerror="this.src='."'". __RES_Web.'/images/person.jpg' ."';".'"';
        if($_From==='service'){
            $_blockClass = 'right sent';
            $_sort = strtotime($message['create_at']) . '0002';
            $_nameClass = 'pull-right';
            $_timestampClass = 'pull-left';
            $type = $type . ' ' . $Class;
        }else{
            $_blockClass = 'received';
            $_sort = $message['subject']['timestamp'] . '1';
            $_nameClass = 'pull-left';
            $_timestampClass = 'pull-right';
            $_Name = $MemberInfo['subject']['displayName'];
            $_Picture = $MemberInfo['subject']['pictureUrl'];
        }
        
        $_Html = '<li data-key="'. $DataKey .'" data-sort="'. $_sort .'" class="direct-chat-msg message '.$_blockClass.'"><!-- sent、received -->
                        <div class="message__text">
                            <div class="direct-chat-text '.$type.'">'. $view .'</div>
                            
                            <div class="metadata">
                                <span class="time">'. $message['create_at'] .'</span>
                            </div>
                        </div>
                        
                        <!--<div class="direct-chat-info clearfix">
                            <span class="direct-chat-name '.$_nameClass.'">'. $_Name .'</span>
                            <span class="direct-chat-timestamp '.$_timestampClass.'">'. $message['create_at'] .'</span>
                        </div>
                        <img class="direct-chat-img '.$type.'" src="'. $_Picture .'" '.$ImgError.'>
                        <div class="direct-chat-text '.$type.'">'. $view .'</div>-->
                        
                        <!--
                            <div class="message__options">
                                <i class=" mdi mdi-dots-horizontal"></i>
                            </div>
                        -->
                    </li>';
        if(!empty($_Html)){
            $objResponse->call($AppendMsg, $Action, $_Html, $DataKey);
        }
    }
}

function Session($Key=NULL, $Val=NULL, $Reload=0){
    $objResponse = new xajaxResponse();
    
    $_SESSION[__DOMAIN][_Module][$Key] = $Val;
    if($Reload){ $objResponse->script('location.reload();'); }
    return $objResponse;
}

?>