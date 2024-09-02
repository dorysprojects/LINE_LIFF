<?php

//文件：https://pay.line.me/th/developers/apis/onlineApis?locale=zh_TW

namespace LINEPay;

class Payment implements \PaymentInterface {
    private $systemPath = NULL;
    private $systemMode = NULL;
    private $Order = NULL;
    private $linePayID = NULL;
    private $linePaySecret = NULL;

    public $payment = NULL;
    public $goldFlow = NULL;

    public function __construct($payment, $goldFlow) {
        $this->payment = $payment;
        $this->goldFlow = $goldFlow;
        if(!empty($this->goldFlow) && !empty($this->goldFlow['subject']['storeId'])){
            $this->linePayID = $this->goldFlow['subject']['storeId'];
            $this->linePaySecret = $this->goldFlow['subject']['secret'];
            $this->systemMode = ($this->goldFlow['viewB']=='off') ? 'online' : 'sandbox';
        }else{
            $this->linePayID = '1627052046';
            $this->linePaySecret = '1c42f4de737bd80f912d5ec7c17e508d';
            $this->systemMode = 'sandbox';
        }
        $this->systemPath = ($this->systemMode=='online') ? 'https://api-pay.line.me' : 'https://sandbox-api-pay.line.me';
        $this->Order = new \Order();
    }

    public function sendPaymentRequest($order) {
        $orderID = $order['id'];//訂單ID
        $orderNumber = $order['propertyB'];//訂單編號
        $response = $this->sendRequest(
            '/v3/payments/request',
            'POST',
            array(
                'amount' => intval($order['sortA']),
                'currency' => 'TWD',
                'orderId' => $orderNumber,
                'packages' => array(
                    array(
                        'id' => $orderID,
                        'amount' => intval($order['sortA']),
                        'name' => __BotInfo['displayName'],//要改成[商家、商店名稱]
                        'products' => array(
                            array(
                                'name' => __BotInfo['displayName'],//要改成[商品名稱]
                                'imageUrl' => __BotInfo['pictureUrl'],//要改成[商品圖片網址]
                                'quantity' => 1,
                                'price' => intval($order['sortA']),
                            )
                        )
                    )
                ),
                'redirectUrls' => array(
                    // 'appPackageName' => '',//在Android環境切換應用時所需的資訊，用於防止網路釣魚攻擊（phishing）
                    'confirmUrl' => 'https://' . __DOMAIN . '/ft/order/return/orderID/' . $orderID,
                    'confirmUrlType' => 'CLIENT',//CLIENT:在LINE應用程式中開啟、SERVER:在瀏覽器中開啟
                    'cancelUrl' => 'https://' . __DOMAIN . '/ft/order/details/orderID/' . $orderID,
                ),
                'options' => array(
                    'payment' => array(
                        'capture' => true,//true:自動請款、false:手動請款
                        'payType' => 'NORMAL',//NORMAL:一般付款、PREAPPROVED:預授權付款(需申請)
                    ),
                    'display' => array(
                        'locale' => 'zh_TW',
                    ),
                    'familyService' => array(
                        "addFriends" => array(
                            array(
                                "type" => "lineAt",
                                "idList" => array(__BotInfo['basicId'])
                            )
                        )
                    ),
                ),
            )
        );
        if (!empty($response['info']['paymentUrl']['web'])) {
            header('Location:' . $response['info']['paymentUrl']['web']);
        }
    }

    public function paymentReturn($order){
        $extra = $_GET;
        $confirm = $this->confirm($_GET['transactionId'], $order);
        $extra['confirm'] = $confirm;
        $success = ($confirm['returnCode'] == 0000);
        $orderInfo = array(
            'payDateTime' => date('Y/m/d H:i'),
            'CreditCardNumber' => $confirm['info']['payInfo'][0]['maskedCreditCardNumber'],
            'tradeNo' => substr($confirm['info']['transactionId'], 2),
            'amount' => $confirm['info']['payInfo'][0]['amount'],
            'orderNo' => $order['propertyB'],
            'payMethod' => $order['content']['PayMethod_propertyB'],
            'node' => $confirm['node'],
			'payStatus' => 'on'
        );
        $redirectFlag = true;
        return array($success, $extra, $orderInfo, $redirectFlag);
    }

    public function sendRefundRequest($order, $amount=0){
        $data = array(
            'refundAmount' => $order['sortA'],
        );
        if($data['refundAmount'] != $amount){//部分退款
            $data['refundAmount'] = $amount;
        }
        $transactionId = $order['propertyE'];
        $response = $this->sendRequest(
            "/v3/payments/$transactionId/refund",
            'POST',
            $data
        );
        $this->insertDoActionLog($data, $order, $response);
    }
    
    public function confirm($transactionId, $order) {
        return $this->sendRequest(
            "/v3/payments/$transactionId/confirm",
            'POST',
            array(
                'currency' => 'TWD',
                'amount' => intval($order['sortA']),
            )
        );
    }

    private function getAuthorizationNonce(){
        return time() . uniqid('-');
    }

    private function getAuthorization($url, $authParams, $nonce){
        $authMacText = $this->linePaySecret . $url . $authParams . $nonce;
        return base64_encode(hash_hmac('sha256', $authMacText, $this->linePaySecret, true));
    }

    private function sendRequest($url, $method, $query) {
        $getQuery = '';
        $postQuery = '';
        $authParams = '';
        switch($method){
            case 'GET':
                $authParams = http_build_query($query);
                $getQuery = !empty($query) ? '?'.$authParams : $query;
                break;
            case 'POST':
                $authParams = json_encode($query);
                $postQuery = $authParams;
                break;
        }
        $nonce = $this->getAuthorizationNonce();
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->systemPath . $url . $getQuery,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $postQuery,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "X-LINE-ChannelId: " . $this->linePayID,
                "X-LINE-Authorization: " . $this->getAuthorization($url, $authParams, $nonce),
                "X-LINE-Authorization-Nonce: " . $nonce,
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if (!$err){
            return json_decode($response, true);
        }
    }

    private function insertDoActionLog($query, $order, $response){
        $this->Order->insertOrderLog(array(
            'tablename' => 'refund',
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
