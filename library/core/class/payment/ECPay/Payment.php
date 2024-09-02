<?php

//文件：https://developers.ecpay.com.tw/?p=2864

namespace ECPay;

include_once __CORE . '/class/payment/ECPay/CheckMacValueService.php';

class Payment implements \PaymentInterface {

    private $systemMode = NULL;
    private $url = '';
    private $Order = NULL;
    private $payment = NULL;
    private $goldFlow = NULL;

    public $CheckMacValueService = NULL;
    public $MerchantID = '';
    public $HashKey = '';
    public $HashIV = '';
    public $CreditCheckCode = '';
    public $query = array();

    public function __construct($payment, $goldFlow) {
        $this->payment = $payment;
        $this->goldFlow = $goldFlow;
        if(!empty($this->goldFlow) && !empty($this->goldFlow['subject']['storeId'])){
            $this->MerchantID = $this->goldFlow['subject']['storeId'];
            $this->HashKey = $this->goldFlow['subject']['secret'];
            $this->HashIV = $this->goldFlow['subject']['HashIV'];
            $this->CreditCheckCode = !empty($this->goldFlow['subject']['CreditCheckCode']) ? $this->goldFlow['subject']['CreditCheckCode'] : '';
            $this->systemMode = ($this->goldFlow['viewB']=='off') ? 'online' : 'sandbox';
        }else{
            $this->MerchantID = '3002607';
            $this->HashKey = 'pwFHCqoQZGmho4w6';
            $this->HashIV = 'EkRm7iFT261dpevs';
            $this->CreditCheckCode = '66315911';
            $this->systemMode = 'sandbox';
        }
        $this->url = ($this->systemMode=='online')
                        ? 'https://payment.ecpay.com.tw/Cashier/AioCheckOut/V5'
                        : 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';
        $this->CheckMacValueService = new CheckMacValueService($this->HashKey, $this->HashIV);
        $this->Order = new \Order();
    }

    public function sendPaymentRequest($order) {
        $orderID = $order['id'];//訂單ID
        $orderNumber = $order['propertyB'];//訂單編號
        $this->query['ChoosePayment'] = $this->payment['propertyA']; //付款方式 String(20)        
            $this->query['MerchantTradeNo'] = $orderNumber; //交易編號，特店(j網站)提供 String(20)
        $this->query['MerchantTradeDate'] = date('Y/m/d H:i:s'); //交易時間 yyyy/MM/dd HH:mm:ss String(20)
            $this->query['TotalAmount'] = intval($order['sortA']); // Int交易金額 Int CVS&BARCODE 最低限制為 30 元，最高限制為 20000 元
            $this->query['ItemName'] = '#商品'; //商品名稱 String(200)
        $this->query['CustomField1'] = base64_encode('userID'); //自訂名稱1 String(50)
        $this->query['MerchantID'] = strval($this->MerchantID); //特店編號 String(10)
        $this->query['PaymentType'] = 'aio'; //交易類型 String(20)
        $this->query['EncryptType'] = 1;
        $this->query['TradeDesc'] = urlencode(__BotInfo['displayName']); //交易描述 String(200)
        $this->query['NeedExtraPaidInfo'] = 'Y'; //N/Y  是否需要額外付款資訊String(1)
        $this->query['OrderResultURL'] = 'https://' . __DOMAIN . '/ft/order/details/orderID/'.$orderID; //付款結果回傳網址 String(200)
        $this->query['ReturnURL'] = 'https://' . __DOMAIN . '/ft/order/return/orderID/'.$orderID; //付款結果回傳網址 String(200)
        switch ($this->query['ChoosePayment']) {
            case 'Credit':
                if(!empty($this->payment['subject']['CreditInstallment']) && $this->payment['subject']['CreditInstallment']>1){//分期
                    $this->query['CreditInstallment'] = $this->payment['subject']['CreditInstallment'];
                }
                break;
            case 'WebATM':
            case 'ATM':
            case 'CVS':
            case 'BARCODE':
                if(!empty($this->payment['sortB'])){
                    switch ($this->query['ChoosePayment']) {
                        case 'ATM'://[ATM]ExpireDate (天) default:3，max:60，min:1
                            $this->query['ExpireDate'] =  (int) $this->payment['sortB'];
                            break;
                        case 'CVS'://[CVS]StoreExpireDate(分鐘) default:10080，max:43200
                            $this->query['StoreExpireDate'] = (int) $this->payment['sortB'];
                            break;
                        case 'BARCODE'://[BARCODE]StoreExpireDate(天) default:7，max:30，min:1
                            $this->query['StoreExpireDate'] = (int) $this->payment['sortB'];
                            break;
                    }
                }
                $this->query['PaymentInfoURL'] = 'https://' . __DOMAIN . '/ft/order/paymentInfo/orderID/'.$orderID;//付款資訊回傳網址 String(200)
                $this->query['ClientRedirectURL'] = 'https://' . __DOMAIN . '/ft/order/details/orderID/'.$orderID;//Client 端回傳付款結果網址 String(200)
                break;
        }
        $this->query = $this->CheckMacValueService->append($this->query);
        $html = "<form id='ECPaySendForm' method='post' action='$this->url' style='display:none;'>";
        foreach ($this->query as $key => $value) {
            $html .= "$key:<input name='$key' value='" . $value . "'><br>";
        }
        $html .= "<input type='submit' value='送出'>";
        $html .= "</form>";
        $html .= "<script>ECPaySendForm.submit();</script>";
        echo $html;
    }

    public function takeNumber($data){
        $this->verifyPaymentRequest($data);
        if (!empty($data['ExpireDate'])) {//ATM、CVS、BARCODE
            list($itemDate, $itemTime) = explode(' ', $data['ExpireDate']);
            if(empty($itemTime)){//(yyyy/MM/dd)[ATM]
                $data['ExpireDate'] = date('Y/m/d 23:59:59', strtotime($data['ExpireDate']));
            }else{//(yyyy/MM/dd HH:mm:ss)[CVS、BARCODE]
                $data['ExpireDate'] = date('Y/m/d H:i:s', strtotime($data['ExpireDate']));
            }
        }
        return $data;
    }

    public function paymentReturn($order){
        $this->verifyPaymentRequest($_POST);
        $extra = $_POST;
        $success = ($_POST['RtnCode'] == 1);
        $orderInfo = array(
            'payDateTime' => $_POST['PaymentDate'],
            'creditNum' => $_POST['CreditInstallment'],//需再確認
            'tradeNo' => $_POST['TradeNo'],
            'amount' => $_POST['TradeAmt'],
            'orderNo' => $order['propertyB'],
            'payMethod' => $order['content']['PayMethod_propertyB'],
            'node' => $order['node'],
            'payStatus' => 'on',
        );
        $redirectFlag = false;
        return array($success, $extra, $orderInfo, $redirectFlag);
    }

    public function sendRefundRequest($order, $amount=0){
        $creditRefundStatus = $this->getCreditRefundStatus($order);//查詢信用卡單筆明細
        if($order['sortA']==$amount){//全額退款
            switch($creditRefundStatus){
                case '已授權'://Call放棄(N)
                    $this->giveUp($order);
                    break;
                case '要關帳'://Call取消(E)，再Call放棄(N)
                    $this->cancel($order);
                    break;
                case '已關帳'://Call退刷(R)
                    $this->backOff($order, $amount);
                    break;
            }
        }else{//部分退款
            switch($creditRefundStatus){
                case '已授權'://Call關帳(C)，再Call退刷(R)
                    $this->closeAccount($order, $amount);
                    break;
                case '要關帳':
                case '已關帳'://Call退刷(R)
                    $this->backOff($order, $amount);
                    break;
            }
        }
    }

    private function verifyPaymentRequest($data){
        if (!$this->CheckMacValueService->verify($data)) {
            header('X-PHP-Response-Code: 404', true, 404);
            exit;
        } else {
            echo '1|OK';
        }
    }

    // public function setItemName(array $shopcarDetails): string {
    //     if(!empty($shopcarDetails)){
    //         $this->query['ItemName'] = '';
    //         foreach ($shopcarDetails as $item) {
    //             $this->query['ItemName'] .= (!empty($this->query['ItemName'])) ? '#' : '';
    //             $this->query['ItemName'] .= $item['subject']['subject'].' '.$item['propertyD'].' '.number_format($item['propertyE']).'x'.$item['sortB'];
    //         }
    //     }
    //     return $this->query['ItemName'] = mb_substr($this->query['ItemName'], 0, 200, 'utf-8');
    // }

    //查詢信用卡單筆明細
    private function getCreditRefundStatus($order){
        $queryTradeStatus = $this->QueryTrade(array(
            'CreditRefundID' => $order['subject']['paidInfo']['gwsr'],
            'CreditAmount' => $order['sortA'],
        ));
        if(empty($queryTradeStatus) || empty($queryTradeStatus['RtnValue'])){
            return '';
        }
        $rtnValue = $queryTradeStatus['RtnValue'];
        return !empty($rtnValue['status']) ? $rtnValue['status'] : '';
    }

    //關帳(C)
    private function closeAccount($order, $amount){
        $data = $this->getDoActionData(__FUNCTION__, $order, $amount);
        $closeAccountStatus = $this->DoAction($data);
        if($closeAccountStatus['RtnCode'] == '1'){
            $this->backOff($order, $amount);
        }
    }

    //退刷(R)
    private function backOff($order, $amount){
        $data = $this->getDoActionData(__FUNCTION__, $order, $amount);
        $backOffStatus = $this->DoAction($data);
        if($backOffStatus['RtnCode'] == '1'){
            $this->Order->updateOrderPaymentStatus('refunded', $order, $backOffStatus);//更新[已退款]
        }
    }

    //取消(E)
    private function cancel($order){
        $data = $this->getDoActionData(__FUNCTION__, $order);
        $cancelStatus = $this->DoAction($data);
        if($cancelStatus['RtnCode'] == '1'){
            $this->giveUp($order);
        }
    }

    //放棄(N)
    private function giveUp($order){
        $data = $this->getDoActionData(__FUNCTION__, $order);
        $giveUpStatus = $this->DoAction($data);
        if($giveUpStatus['RtnCode'] == '1'){
            $this->Order->updateOrderPaymentStatus('refunded', $order, $giveUpStatus);//更新[已退款]
        }
    }

    private function QueryTrade($data){//參考:https://developers.ecpay.com.tw/?p=2894#
        if($this->systemMode!='online')
            return array(
                'RtnValue' => array(
                    'status' => '已授權'
                )
            );
        if(empty($data['CreditRefundID']))
            return;
        $this->url = 'https://payment.ecpay.com.tw/CreditDetail/QueryTrade/V2';
        $this->query['MerchantID'] = strval($this->MerchantID); //特店編號 String(10)
        $this->query['CreditRefundId'] = intval($data['CreditRefundID']);//信用卡授權單號
        $this->query['CreditAmount'] = intval($data['CreditAmount']);//金額
        $this->query['CreditCheckCode'] = intval($this->CreditCheckCode);//商家檢查碼
        $this->query = $this->CheckMacValueService->append($this->query);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($this->query),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));
        $responseJSON = curl_exec($curl);
        $response = !empty($responseJSON) ? json_decode($responseJSON, true) : array();
        if (curl_errno($curl)==28 || empty($response) || empty($response['RtnValue'])) {
            $responseJSON = curl_exec($curl);
            $response = !empty($responseJSON) ? json_decode($responseJSON, true) : array();
        }
        curl_close($curl);
        return $response;
    }
    
    private function getDoActionData($action, $order, $amount=0){
        $TradeAmt = $order['sortA'];
        if($TradeAmt != $amount){//部分退款
            $TradeAmt = $amount;
        }
        $actionList = array(
            'closeAccount' => 'C',//關帳
            'backOff' => 'R',//退刷
            'cancel' => 'E',//取消
            'giveUp' => 'N'//放棄
        );
        return array(
            'order' => $order,
            'MerchantTradeNo' => $order['propertyD'],
            'TradeNo' => $order['propertyE'],
            'TotalAmount' => $TradeAmt,
            'Action' => $actionList[$action]
        );
    }

    private function DoAction($data){//參考:https://developers.ecpay.com.tw/?p=2885#
        if($this->systemMode!='online')
            return array('RtnCode' => '1');
        if(empty($data['MerchantTradeNo']))
            return;
        $this->url = 'https://payment.ecpay.com.tw/CreditDetail/DoAction';
        $this->query['MerchantID'] = strval($this->MerchantID); //特店編號 String(10)
        $this->query['MerchantTradeNo'] = $data['MerchantTradeNo']; //交易編號，特店(j網站)提供 String(20)
        $this->query['TradeNo'] = !empty($data['TradeNo']) ? $data['TradeNo'] : NULL; //特店交易時間 yyyy/MM/dd HH:mm:ss String(20)
        $this->query['TotalAmount'] = !empty($data['TotalAmount']) ? intval($data['TotalAmount']) : NULL; // Int交易金額 Int CVS&BARCODE 最低限制為 30 元，最高限制為 20000 元
        $this->query['Action'] = !empty($data['Action']) ? ($data['Action']) : NULL; //關帳C[closeAccount]、退刷R[backOff]、取消E[cancel]、放棄N[giveUp]
        $this->query = $this->CheckMacValueService->append($this->query);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($this->query),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));
        $responseString = curl_exec($curl);
        $response = array();
        if(!empty($responseString)){
            parse_str($responseString, $response);
        }
        if (curl_errno($curl)==28 || ((!empty($response))&&$response['RtnCode']!='1')) {
            $responseString = curl_exec($curl);
            $response = array();
            if(!empty($responseString)){
                parse_str($responseString, $response);
            }
        }
        curl_close($curl);
        $this->insertDoActionLog($this->query, $data['order'], $response);
        return $response;
    }

    private function insertDoActionLog($query, $order, $response){
        $nextList = array(
            'C' => 'closeAccount',//關帳C[closeAccount]
            'R' => 'backOff',//退刷R[backOff]
            'E' => 'cancel',//取消E[cancel]
            'N' => 'giveUp'//放棄N[giveUp]
        );
        $this->Order->insertOrderLog(array(
            'tablename' => 'DoAction',
            'next' => $nextList[$query['Action']],
            'orderID' => $order['id'],
            'orderNumber' => $order['propertyB'],
            'propertyB' => $response['MerchantTradeNo'],//交易訂單編號
            'propertyC' => $response['TradeNo'],//交易編號
            'prev1' => $this->goldFlow['propertyA'],//金流廠商
            'viewA' => $response['RtnCode'], //RtnCode:1成功
            'subject' => json_encode(array(
                'query' => $query,
                'order' => $order,
                'response' => $response,
            )),
        ));
    }

}
