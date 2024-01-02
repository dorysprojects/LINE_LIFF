<?php

/*
 *  Line Message 2020 by Ricky
 */

class kFacebookMessaging {
    private $version = "v2.6";
    private $messages_url = null;
    private $attachments_url = "https://graph.facebook.com/v9.0/me/message_attachments";
    private $RecordSystem = null;
    private $log_return_node = null;
    private $RecordSystemIndex = null;
    public $events = null;
    public $SQL_LineRecord = null;
    public $SQL_LineMember = null;
    public $Member = null;
    public $profileData = array();
    
    function __construct() {
        $this->action['data'] = [];
        $this->header = ["Content-Type: application/json"];
        $this->app_id = __FB_App_ID;
        $this->app_token = __FB_App_Secret;
        $this->page_id = __FB_Page_ID;
        $this->page_token = __FB_Page_Token;
        $this->Authorization_code = 'FacebookMessageToken';
        $this->messages_url = "https://graph.facebook.com/". $this->version ."/me/messages";
        
    }
    
    function init($receive, $save = TRUE) {
        $this->events = NULL;
        $this->events = $receive;
        if ($this->events['account_linking']) {
            $this->text('帳號已經連結')->reply();
        }
        if ($this->events && $save) {
            $this->SQL_LineRecord = new kSQL('LineRecord');
            $this->RecordSystem = $this->SQL_LineRecord->getSystem();
            $this->RecordSystemIndex = $this->SQL_LineRecord->getAuto_INCREMENT();
            $this->SQL_LineRecord->SetAction('insert')
                            ->SetValue('subject', json_encode($this->events))
                            ->SetValue('tablename', 'facebook')
                            ->SetValue('next', $this->events['message']['attachments'][0]['type'] ? $this->events['message']['attachments'][0]['type'] : 'text')
                            ->SetValue('propertyA', $this->events['sender']['id'])
                            ->SetValue('update_at', $this->SQL_LineRecord->getNowTime())
                            ->SetValue('create_at', $this->SQL_LineRecord->getNowTime())
                            ->BuildQuery();
        }
        if ($this->events['sender']['id']) {
            $this->profile($this->events['sender']['id']);
            $subject = array_filter([
                "displayName" => trim($this->profileData['last_name'] . $this->profileData['first_name']),
                "pictureUrl" => $this->profileData['profile_pic'],
                "profile" => $this->profileData,
            ]);
            $this->SQL_LineMember = new kSQL('LineMember');
            $this->Member = $this->SQL_LineMember->SetAction('select')->SetWhere("propertyA='" . $this->events['sender']['id'] . "'")->BuildQuery();
            if($this->Member){
                $this->SQL_LineMember->SetAction('update')
                                     ->SetWhere("propertyA='" . $this->events['sender']['id'] . "'");
            }else{
                $this->SQL_LineMember->SetAction('insert')
                     ->SetValue('create_at', $this->SQL_LineMember->getNowTime());
            }
            $this->SQL_LineMember->SetValue('update_at', $this->SQL_LineMember->getNowTime())
                                ->SetValue('subject', json_encode($subject), (empty($subject['profile']['error'])) ? 1 : 0)
                                ->SetValue('viewA', 'on')
                                ->SetValue('viewB', 'off')
                                ->SetValue('tablename', 'member')
                                ->SetValue('prev', 'facebook')
                                ->SetValue('propertyA', $this->events['sender']['id'])
                                ->SetValue('propertyB', $this->page_id)
                                ->BuildQuery();
            if ($this->Member[0]['viewB'] == 'on') {//黑名單
                exit;
            }
        }
        
        return $this;
    }
    
    function profile($UID=NULL){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://graph.facebook.com/$UID?fields=first_name,last_name,profile_pic&access_token=" . $this->page_token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));
        $responseTmp = curl_exec($curl);
        $response = json_decode($responseTmp, true);
        if($response){
            $this->profileData = $response;
        }
        curl_close($curl);
        
        return $this;
    }
    
    function messageObject($type = NULL, $label = NULL, $data = NULL) {
        if (is_array($type)) {
            foreach ($type as $key => $item) {
                switch ($item['type']) {
                    case'message'://實際line才有
                    case'postback':
                        $object[] = $this->postback($item['label'], $item['data']);
                        break;
                    case'uri'://web_url
                        $object[] = $this->uri($item['label'], $item['data']);
                        break;
                }
            }
        } else {
            switch ($type) {
                case'message'://實際line才有
                case'postback':
                    $object = $this->postback($label, $data);
                    break;
                case'uri'://web_url
                    $object = $this->uri($label, $data);
                    break;
            }
        }
        
        return $object;
    }
    
    function postback($label = NULL, $data = NULL){
        $object = array(
            "type" => "postback",
            "title" => $label,
            "payload" => $data,
        );
        
        return $object;
    }
    
    function uri($label = NULL, $data = NULL){
        $object = array(
            "type" => "web_url",
            "title" => $label,
            "url" => $data,
        );
        
        return $object;
    }
    
    function columns_v2($thumbnailImageUrl = NULL, $title = NULL, $text = NULL, $actions = NULL) {
        if (!empty($title)) {
            
        }$title = mb_substr($title, 0, 40, 'utf-8');
        if (!empty($text)) {
            
        }$text = mb_substr($text, 0, 60, 'utf-8');
        $object = [
            "title" => $title,
            "image_url" => $thumbnailImageUrl,
            "subtitle" => $text,
            "buttons" => $actions,
        ];
        if (empty($thumbnailImageUrl)) {
            unset($object['image_url']);
        }
        if (empty($text)) {
            unset($object['subtitle']);
        }
        if (empty($actions)) {
            unset($object['buttons']);
        }
        
        return $object;
    }
    
    function text($text = NULL) {
        $object = array (
            'text' => $text,
        );
        
        $this->action['data'] = array_merge($this->action['data'], $object);
        return $this;
    }
    
    function UploadMedia($media=NULL){
        if($media){
            $context = stream_context_create(array(
                "http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->header), "content" => json_encode(array("message" => $media)), "ignore_errors" => true)
            ));
            $responseTmp = file_get_contents($this->attachments_url . '?access_token=' . $this->page_token, false, $context);
            $response = json_decode($responseTmp, true);
            
            $attachment_id = $response['attachment_id'];
        }
        
        return $attachment_id;
    }
    
    function media($Type=NULL, $originalContentUrl=NULL, $is_reusable=false) {
        $object = array (
            'attachment' => array (
                'type' => $Type,
                'payload' => array (
                    'url' => $originalContentUrl,
                    'is_reusable' => $is_reusable,
                ),
            ),
        );
        
        return $object;
    }
    
    function image($originalContentUrl=NULL, $is_reusable=false) {
        $this->action['data'] = array_merge($this->action['data'], $this->media('image', $originalContentUrl, $is_reusable));
        return $this;
    }
    
    function video($originalContentUrl=NULL, $is_reusable=false) {
        $this->action['data'] = array_merge($this->action['data'], $this->media('video', $originalContentUrl, $is_reusable));
        return $this;
    }
    
    function audio($originalContentUrl=NULL, $is_reusable=false) {
        $this->action['data'] = array_merge($this->action['data'], $this->media('audio', $originalContentUrl, $is_reusable));
        return $this;
    }
    
    function file($originalContentUrl=NULL, $is_reusable=false) {
        $this->action['data'] = array_merge($this->action['data'], $this->media('file', $originalContentUrl, $is_reusable));
        return $this;
    }
    
    function buttons($thumbnailImageUrl = NULL, $title = NULL, $text = NULL, $actions = NULL) {
        $object = array (
            'attachment' => array (
                'type' => 'template',
                'payload' => array (
                    'template_type' => 'generic',
                    'elements' => array([
                        "title" => $title,
                        "image_url" => $thumbnailImageUrl,
                        "subtitle" => $text,
                        "buttons" => $actions,
                    ]),
                ),
            ),
        );
        
        $this->action['data'] = array_merge($this->action['data'], $object);
        return $this;
    }
    
    function buttonsV2($thumbnailImageUrl = NULL, $title = NULL, $text = NULL, $actions = NULL) {
        $object = array (
            'attachment' => array (
                'type' => 'template',
                'payload' => array (
                    'template_type' => 'button',
                    'text' => $title,
                    "buttons" => $actions,
                ),
            ),
        );
        
        $this->action['data'] = array_merge($this->action['data'], $object);
        return $this;
    }
    
    function carousel($columns = NULL) {
        $object = array (
            'attachment' => array (
                'type' => 'template',
                'payload' => array (
                    'template_type' => 'generic',
                    'elements' => $columns,
                ),
            ),
        );
        
        $this->action['data'] = array_merge($this->action['data'], $object);
        return $this;
    }
    
    function confirm($text = NULL, $actionA = NULL, $actionB = NULL) {
        $object = array (
            'attachment' => array (
                'type' => 'template',
                'payload' => array (
                    'template_type' => 'button',
                    'text' => $text,
                    'buttons' => array (
                        $actionA,
                        $actionB
                    ),
                ),
            ),
        );
        
        $this->action['data'] = array_merge($this->action['data'], $object);
        return $this;
    }
    
    function ListColumns($pic=null, $subtitle=null, $subcontent=null, $actions=null, $default_action=null){
        if($subtitle){
            $object['title'] = $subtitle;
            if($subcontent){
                $object['subtitle'] = $subcontent;
            }
            if($pic){
                $object['image_url'] = $pic;
            }
            if($actions){
                $object['buttons'] = $actions;
            }
            if($default_action){
                $object['default_action'] = $default_action;
            }
        }
        
        return $object;
    }
    function ListTemplate($top_element_style='compact', $elements=null, $buttons=null, $sharable=false){
        $object = array (
            'attachment' => array (
                'type' => 'template',
                'payload' => array (
                    'template_type' => 'list',
                    'top_element_style' => $top_element_style,
                    'elements' => $elements,
                    "buttons" => $buttons,
                    "sharable" => $sharable,
                ),
            ),
        );
        
        $this->action['data'] = array_merge($this->action['data'], $object);
        return $this;
    }
    
    function MediaTemplate($media_type=null, $attachment_id=null, $buttons=null){
        $object = array (
            'attachment' => array (
                'type' => 'template',
                'payload' => array (
                    'template_type' => 'media',
                    'elements' => array([
                        "media_type" => $media_type,
                        "attachment_id" => $attachment_id,
                        "buttons" => $buttons,
                    ]),
                ),
            ),
        );
        
        $this->action['data'] = array_merge($this->action['data'], $object);
        return $this;
    }
    
    function ReceiptAddress($city=NULL, $postal_code=NULL, $state=NULL, $country=NULL, $street_1=NULL, $street_2=NULL){
        if(!empty($city) && !empty($postal_code) && !empty($state) && !empty($country) && !empty($street_1)){
            $object = array (
                'city' => $city,
                'postal_code' => $postal_code,
                'state' => $state,
                'country' => $country,
                'street_1' => $street_1,
                //Optional
                'street_2' => $street_2,
            );
        }
        
        return $object;
    }
    function ReceiptSummary($total_cost=NULL, $subtotal=NULL, $shipping_cost=NULL, $total_tax=NULL){
        if(!empty($total_cost)){
            $object = array (
                'total_cost' => $total_cost,
                //Optional
                'subtotal' => $subtotal,
                'shipping_cost' => $shipping_cost,
                'total_tax' => $total_tax,
            );
        }
        
        return $object;
    }
    function ReceiptAdjustments($name=NULL, $amount=NULL){
        if(!empty($name) && !empty($amount)){
            $object = array (
                'name' => $name,
                'amount' => $amount,
            );
        }
        
        return $object;
    }
    function ReceiptElements($title=NULL, $price='0', $subtitle=NULL, $quantity=NULL, $currency=NULL, $image_url=NULL){
        if(!empty($title) && !empty($price)){
            $object = array (
                'title' => $title,
                'price' => $price,
                //Optional
                'subtitle' => $subtitle,
                'quantity' => $quantity,
                'currency' => $currency,
                'image_url' => $image_url,
            );
        }
        
        return $object;
    }
    function ReceiptTemplate($recipient_name=NULL, $order_number=NULL, $currency='TWD', $payment_method=NULL, $summary=NULL, $elements=NULL, $address=NULL, $adjustments=NULL, $timestamp=NULL, $merchant_name=NULL, $sharable=false){
        $object = array (
            'attachment' => array (
                'type' => 'template',
                'payload' => array (
                    'template_type' => 'receipt',
                    'recipient_name' => $recipient_name,
                    "order_number" => $order_number,
                    "currency" => $currency,
                    "payment_method" => $payment_method,
                    "summary" => $summary,
                    //Optional
                    'elements' => $elements,
                    "address" => $address,
                    "adjustments" => $adjustments,
                    "timestamp" => !empty($timestamp) ? $timestamp : time(),
                    "merchant_name" => $merchant_name,
                    "sharable" => $sharable,
                ),
            ),
        );
        
        $this->action['data'] = array_merge($this->action['data'], $object);
        return $this;
    }
    
    function SetMessages($Message=NULL, $loop=NULL, $QuicklyReply=NULL){
        if (!empty($Message) && (!empty($loop)||$loop==0) && !empty($Message['subject']['type_' . $loop]) && !empty($Message['subject']['value_' . $loop])) {
            switch ($Message['subject']['type_' . $loop]) {
                case'KeyWordMsg':
                    $SQL_qa = new kSQL($Message['subject']['type_' . $loop]);
                    $QAList = $SQL_qa->SetAction('select')
                                    ->SetWhere("id='" . $Message['subject']['value_' . $loop] . "'")
                                    ->BuildQuery();
                    if($QAList[0]){
                        for ($QALoop = 0; $QALoop <= 4; $QALoop++) {
                            $QuicklyReplyItem = (!empty($QAList[0]['subject']['QuicklyReply'])&&1) ? $QAList[0]['subject']['QuicklyReply'] : '';
                            if($QAList[0]['subject']['type_' . $QALoop]){
                                $this->SetMessages($QAList[0], $QALoop, $QuicklyReplyItem);
                                if($this->events['sender']['id']){
                                    $this->reply();
                                }
                            }
                        }
                    }
                    break;
                case'text':
                    $this->text($Message['subject']['value_' . $loop]);
                    break;
                case'image':
                    $originalContentUrl = __WEB_UPLOAD . '/image/' . $Message['subject']['value_' . $loop];
                    $this->image($originalContentUrl);
                    break;
                case'video':
                    $originalContentUrl = __WEB_UPLOAD . '/video/' . $Message['subject']['value_' . $loop];
                    $this->video($originalContentUrl);
                    break;
                case'audio':
                    $originalContentUrl = __WEB_UPLOAD . '/audio/' . $Message['subject']['value_' . $loop];
                    $this->audio($originalContentUrl);
                    break;
                case'file':
                    $originalContentUrl = __WEB_UPLOAD . '/file/' . $Message['subject']['value_' . $loop];
                    $this->file($Message['subject']['value_' . $loop]);
                    break;
                case'fb_template':
                    $SQL_FB_Template = new kSQL('FB_Template');
                    if (!empty($Message['subject']['value_' . $loop])) {
                        $fb_templateRows = $SQL_FB_Template
                                ->SetAction('select')
                                ->SetWhere("id='" . $Message['subject']['value_' . $loop] . "'")
                                ->BuildQuery();
                        $fb_template = $fb_templateRows[0];
                        if ($fb_template) {
                            $columns = array();
                            for ($columnsList = 0; $columnsList < 10; $columnsList++) {
                                $subtitle = $fb_template['subject']['subtitle' . $columnsList];
                                $subcontent = $fb_template['subject']['subcontent' . $columnsList];
                                $pic = !empty($fb_template['subject']['img' . $columnsList]) ? __WEB_UPLOAD . '/image/' . $fb_template['subject']['img' . $columnsList] : NULL;
                                if ($subtitle) {
                                    $actions = array();
                                    for ($action_item = 0; $action_item < 3; $action_item++) {
                                        $action = $this->SetActions($fb_template, $columnsList, $action_item);
                                        if ($action) {
                                            $actions[] = $action;
                                        }
                                    }//Loop Actions
                                    $columns[] = $this->columns_v2($pic, $subtitle, $subcontent, $actions);
                                }
                            }//Loop Columns
                            if ($columns) {
                                $this->carousel($columns);
                            }
                        }
                    }
                    break;
                case'fb_listtemplate':
                    $SQL_FB_ListTemplate = new kSQL('FB_ListTemplate');
                    if (!empty($Message['subject']['value_' . $loop])) {
                        $fb_listtemplateRows = $SQL_FB_ListTemplate
                                ->SetAction('select')
                                ->SetWhere("id='" . $Message['subject']['value_' . $loop] . "'")
                                ->BuildQuery();
                        $fb_listtemplate = $fb_listtemplateRows[0];
                        if($fb_listtemplate){
                            $bottomActionTmp = array(
                                'subject' => array(
                                    'subject0_0' => $fb_listtemplate['subject']['bottomSubject'],
                                    'action0_0' => $fb_listtemplate['subject']['bottomAction'],
                                    'data0_0' => $fb_listtemplate['subject']['bottomData'],
                                )
                            );
                            $bottomAction = array($this->SetActions($bottomActionTmp, 0, 0));
                            
                            $columns = array();
                            for ($columnsList = 0; $columnsList < 4; $columnsList++) {
                                $pic = $fb_listtemplate['subject']['img' . $columnsList];
                                $subtitle = $fb_listtemplate['subject']['subtitle' . $columnsList];
                                $subcontent = $fb_listtemplate['subject']['subcontent' . $columnsList];
                                $action = $this->SetActions($fb_listtemplate, $columnsList, $action_item);
                                if($action){
                                    $actions = array($action);
                                }
                                $column = $this->ListColumns($pic, $subtitle, $subcontent, $actions);
                                if($column){
                                    $columns[] = $column;
                                }
                            }
                            $this->ListTemplate($fb_listtemplate['subject']['topStyle'], $columns, $bottomAction);
                        }
                    }
                    break;
                case'fb_btntemplate':
                    $SQL_FB_BtnTemplate = new kSQL('FB_BtnTemplate');
                    if (!empty($Message['subject']['value_' . $loop])) {
                        $fb_btntemplateRows = $SQL_FB_BtnTemplate
                                ->SetAction('select')
                                ->SetWhere("id='" . $Message['subject']['value_' . $loop] . "'")
                                ->BuildQuery();
                        $fb_btntemplate = $fb_btntemplateRows[0];
                        if($fb_btntemplate){
                            $columnsList = 0;
                            $subtitle = $fb_btntemplate['subject']['subtitle' . $columnsList];
                            if ($subtitle) {
                                $actions = array();
                                for ($action_item = 0; $action_item < 3; $action_item++) {
                                    $action = $this->SetActions($fb_btntemplate, $columnsList, $action_item);
                                    if ($action) {
                                        $actions[] = $action;
                                    }
                                }//Loop Actions
    //                            $this->buttons($pic, $subtitle, $subcontent, $actions);
                                $this->buttonsV2($pic, $subtitle, $subcontent, $actions);
                            }
                        }
                    }
                    break;
                case'fb_mediatemplate':
                    $SQL_FB_MediaTemplate = new kSQL('FB_MediaTemplate');
                    if (!empty($Message['subject']['value_' . $loop])) {
                        $fb_mediatemplateRows = $SQL_FB_MediaTemplate
                                ->SetAction('select')
                                ->SetWhere("id='" . $Message['subject']['value_' . $loop] . "'")
                                ->BuildQuery();
                        $fb_mediatemplate = $fb_mediatemplateRows[0];
                        if($fb_mediatemplate){
                            $UpdateAttachmentId = true;
                            if(empty($fb_mediatemplate['subject']['attachment_id'])){
                                $MediaUrl = __WEB_UPLOAD.'/'.$fb_mediatemplate['subject']['type0'].'/'.$fb_mediatemplate['subject']['img0'];
                                $media = $this->media($fb_mediatemplate['subject']['type0'], $MediaUrl, true);
                                $fb_mediatemplate['subject']['attachment_id'] = $this->UploadMedia($media);
                                if(!empty($fb_mediatemplate['subject']['attachment_id'])){
                                    $UpdateAttachmentId = $SQL_FB_MediaTemplate->SetAction('update')
                                                                                ->SetWhere("id='". $fb_mediatemplate['id'] ."'")
                                                                                ->SetValue("subject", json_encode($fb_mediatemplate['subject']))
                                                                                ->BuildQuery();
                                    file_put_contents(__ROOT_UPLOAD.'/'.$fb_mediatemplate['subject']['type0'].'/'.$fb_mediatemplate['subject']['attachment_id'], file_get_contents($MediaUrl));
                                }
                            }
                            if($UpdateAttachmentId){
                                $actions = array();
                                for ($action_item = 0; $action_item < 3; $action_item++) {
                                    $action = $this->SetActions($fb_mediatemplate, 0, $action_item);
                                    if ($action) {
                                        $actions[] = $action;
                                    }
                                }
                                $this->MediaTemplate($fb_mediatemplate['subject']['type0'], $fb_mediatemplate['subject']['attachment_id'], $actions);
                            }
                        }
                    }
                    break;
                case'fb_receipttemplate':
                    $SQL_FB_ReceiptTemplate = new kSQL('FB_ReceiptTemplate');
                    if (!empty($Message['subject']['value_' . $loop])) {
                        $fb_receipttemplateRows = $SQL_FB_ReceiptTemplate
                                ->SetAction('select')
                                ->SetWhere("id='" . $Message['subject']['value_' . $loop] . "'")
                                ->BuildQuery();
                        $fb_receipttemplate = $fb_receipttemplateRows[0];
                        if($fb_receipttemplate){
                            $address = $this->ReceiptAddress($fb_receipttemplate['subject']['city'], $fb_receipttemplate['subject']['postal_code'], $fb_receipttemplate['subject']['state'], $fb_receipttemplate['subject']['country'], $fb_receipttemplate['subject']['street_1'], $fb_receipttemplate['subject']['street_2']);
                            $summary = $this->ReceiptSummary($fb_receipttemplate['subject']['total_cost'], $fb_receipttemplate['subject']['subtotal'], $fb_receipttemplate['subject']['shipping_cost'], $fb_receipttemplate['subject']['total_tax']);
                            $adjustments = array();
                            for ($adjustmentsList = 0; $adjustmentsList < 10; $adjustmentsList++) {
                                if(!empty($fb_receipttemplate['subject']['adjustment_name'.$adjustmentsList]) && !empty($fb_receipttemplate['subject']['adjustment_amount'.$adjustmentsList])){
                                    $adjustments[] = $this->ReceiptAdjustments($fb_receipttemplate['subject']['adjustment_name'.$adjustmentsList], $fb_receipttemplate['subject']['adjustment_amount'.$adjustmentsList]);
                                }
                            }
                            $elements = array();
                            for ($elementsList = 0; $elementsList < 20; $elementsList++) {
                                if(!empty($fb_receipttemplate['subject']['element_title'.$elementsList])){
                                    $elements[] = $this->ReceiptElements($fb_receipttemplate['subject']['element_title'.$elementsList], $fb_receipttemplate['subject']['element_price'.$elementsList], $fb_receipttemplate['subject']['element_subtitle'.$elementsList], $fb_receipttemplate['subject']['element_quantity'.$elementsList], $fb_receipttemplate['subject']['element_currency'.$elementsList], __WEB_UPLOAD.'/image/'.$fb_receipttemplate['subject']['element_image_url'.$elementsList]);
                                }
                            }
                            $order_number = !empty($fb_receipttemplate['subject']['order_number']) ? $fb_receipttemplate['subject']['order_number'] : $fb_receipttemplate['node'];
                            $timestamp = !empty($fb_receipttemplate['subject']['timestamp']) ? strtotime($fb_receipttemplate['subject']['timestamp']) : time();
                            $this->ReceiptTemplate($fb_receipttemplate['subject']['subject'], $order_number, $fb_receipttemplate['subject']['currency'], $fb_receipttemplate['subject']['payment_method'], $summary, $elements, $address, $adjustments, $timestamp, $fb_receipttemplate['subject']['merchant_name'], false);
                        }
                    }
                    break;
            }
            if ($QuicklyReply) {
                $SQL_QuicklyReply = new kSQL("QuicklyReply");
                $quickReplyRows = $SQL_QuicklyReply
                        ->SetAction('select')
                        ->SetWhere("id='" . $QuicklyReply . "'")
                        ->BuildQuery();
                $quickReply = $quickReplyRows[0];
                if ($quickReply) {
                    $qR_items = array();
                    for ($Q_Ctn = 0; $Q_Ctn < 10; $Q_Ctn++) {
                        $qR_subject = $quickReply['subject']['subject' . $Q_Ctn . '_0'];
                        $qR_action = $quickReply['subject']['action' . $Q_Ctn . '_0'];
                        $qR_text = $quickReply['subject']['data' . $Q_Ctn . '_0'];
                        $qR_pic = $quickReply['subject']['img' . $Q_Ctn];
                        if ($qR_subject && $qR_action && $qR_text) {
                            $qR_query = array();
                            $qR_query['type'] = 'text';//text、location、user_phone_number、user_email
                            $qR_query['label'] = $qR_subject;
                            $qR_query['payload'] = $qR_text;
                            if ($qR_pic) {
                                $qR_query['imageUrl'] = __WEB_UPLOAD . '/image/' . $qR_pic;
                            }
                            $qR_items[] = $this->quickReply_action($qR_query);
                        }
                    }
                    $this->action['data']['quick_replies'] = $qR_items;
                }
            }
        }
        
        return $this;
    }
    
    function SetActions($item = NULL, $columnsList = NULL, $action_item = NULL) {
        $Ctn = ($action_item >= 0) ? $columnsList . '_' . $action_item : $columnsList;
        switch ($item['subject']['action' . $Ctn]) {
            case'text':
                $content = $item['subject']['data' . $Ctn];
                $label = $item['subject']['subject' . $Ctn];
                $type = 'message';
                break;
            case'hyperlink':
                $content = kCore_Url(urlencode($item['subject']['data' . $Ctn]));
                $label = $item['subject']['subject' . $Ctn];
                $type = 'uri';
                break;
            case'postback':
                $content = $item['subject']['data' . $Ctn];
                $label = $item['subject']['subject' . $Ctn];
                $type = 'postback';
                break;
            case'noaction':
                $content = 'NULL';
                $label = NULL; //無按鈕，無動作
                //$label = '　';//有按鈕，無動作
                $type = 'postback';
                break;
        }
        if ($type && $label && $content) {
            $action = $this->messageObject($type, $label, $content);
        }
        return $action;
    }
    
    function quickReply_action($query = NULL) {
        $object = array(
            "content_type" => $query['type'],//text
            "title" => $query['label'],
            "payload" => $query['payload']
        );
        if ($query['imageUrl']) {
            $object['image_url'] = $query['imageUrl'];
        }
        
        return $object;
    }
    
    function push($UID = NULL, $type = NULL) {
        $return_to_facebook = array(
//            "sender_action" => "typing_on",//typing_on、typing_off、mark_seen
            "messaging_type" => "MESSAGE_TAG",//RESPONSE、UPDATE、MESSAGE_TAG
            "tag" => "ACCOUNT_UPDATE",//CONFIRMED_EVENT_UPDATE、POST_PURCHASE_UPDATE、ACCOUNT_UPDATE、HUMAN_AGENT
//            "notification_type" => "REGULAR",//REGULAR(Defaults)、SILENT_PUSH、NO_PUSH
            "recipient" => array(
                "id" => $UID
            ),
            "message" => $this->action['data']
        );
        if ($this->action) {
            $context = stream_context_create(array(
                "http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->header), "content" => json_encode($return_to_facebook, JSON_UNESCAPED_UNICODE), "ignore_errors" => true)
            ));
            $_Url = $this->messages_url . '/?access_token=' . $this->page_token;
            $this->state = file_get_contents($_Url, false, $context);
            $this->log_v2(array(
                'for' => $UID,
                'type' => __FUNCTION__,
                'state' => $this->state,
                'message' => $return_to_facebook,
                'group' => NULL,
                'action' => $type,
                'Url' => $_Url,
            ));
            $this->action['data'] = [];
            $this->state = json_decode($this->state, true);
            return $this->state;
        }
    }
    
    function reply($type = NULL) {
        $return_to_facebook = array(
//            "sender_action" => "typing_on",//typing_on、typing_off、mark_seen
//            "messaging_type" => "RESPONSE",//RESPONSE、UPDATE、MESSAGE_TAG
//            "tag" => "CONFIRMED_EVENT_UPDATE",//CONFIRMED_EVENT_UPDATE、POST_PURCHASE_UPDATE、ACCOUNT_UPDATE、HUMAN_AGENT
//            "notification_type" => "REGULAR",//REGULAR(Defaults)、SILENT_PUSH、NO_PUSH
            "recipient" => array(
                "id" => $this->events['sender']['id']
            ),
            "message" => $this->action['data']
        );
        if ($this->action) {
            $context = stream_context_create(array(
                "http" => array("method" => "POST", "header" => implode(PHP_EOL, $this->header), "content" => json_encode($return_to_facebook, JSON_UNESCAPED_UNICODE), "ignore_errors" => true)
            ));
            $_Url = $this->messages_url . '/?access_token=' . $this->page_token;
            $this->state = file_get_contents($_Url, false, $context);
            $this->log_v2(array(
                'for' => $this->events['sender']['id'],
                'type' => __FUNCTION__,
                'state' => $this->state,
                'message' => $return_to_facebook,
                'group' => NULL,
                'action' => $type,
                'Url' => $_Url,
            ));
            $this->action['data'] = [];
            $this->state = json_decode($this->state, true);
            return $this->state;
        }
    }
    
    private function log_v2($_this) {
        switch ($_this['action']) {
            case'service'://客服對話歸屬對話紀錄
            case'pershing':
                $SQL_LineRecord = new kSQL('LineRecord');
                $this->log_return_node = $SQL_LineRecord->getAuto_INCREMENT();
                $SQL_LineRecord->SetAction('insert')
                        ->SetValue('tablename', 'facebook')
                        ->SetValue('subject', json_encode($_this['message']))
                        ->SetValue('update_at', $SQL_LineRecord->getNowTime())
                        ->SetValue('create_at', $SQL_LineRecord->getNowTime())
                        ->SetValue('prev', $_this['action'])
                        ->SetValue('next', $_this['type'])
                        ->SetValue('propertyA', $_this['for'])
                        ->SetValue('propertyE', $_this['Url'])
                        ->SetValue("content", $_this['state'])
                        ->SetValue('prev1', !empty($this->RecordSystemIndex) ? $this->RecordSystemIndex : NULL)
                        ->BuildQuery();
                break;
            default ://推播、排程、關鍵字...等log
                $SQL_LineLog = new kSQL('LineLog');
                $this->log_return_node = $SQL_LineLog->getAuto_INCREMENT();
                $content = array_filter([
                    "contentA" => $_this['state'],
                    "contentB" => $_this['group'],
                ]);
                $subject = array_filter([
                    "subject" => $_this['message'],
                    "items" => $_this['items'],
                ]);
                $SQL_LineLog
                        ->SetAction('insert')
                        ->SetValue("tablename", "facebook")
                        ->SetValue('update_at', $SQL_LineLog->getNowTime())
                        ->SetValue('create_at', $SQL_LineLog->getNowTime())
                        ->SetValue('propertyA', $_this['for'])
                        ->SetValue('prev', $_this['action'])
                        ->SetValue('next', $_this['type'])
                        ->SetValue("subject", json_encode($subject))
                        ->SetValue("content", json_encode($content))
                        ->SetValue('propertyE', $_this['Url'])
                        ->SetValue('prev1', !empty($this->RecordSystemIndex) ? $this->RecordSystemIndex : NULL)
                        ->BuildQuery();
                break;
        }
        return $this->log_return_node;
    }
    
}

?>