<?php


class Order{

    const ORDER_STATUS = array(
        'create' => '成立訂單',
        'cancel' => '取消訂單',
    );
    const PAYMENT_STATUS = array(
        'unPaid' => '未付款',
        'paid' => '已付款',
        'paidFail' => '付款失敗',
        'waitRefund' => '退款申請中',
        'refunding' => '退款中',
        'refunded' => '已退款',
        'noRefund' => '不退款',
    );
    const INVOICE_STATUS = array(
        'notInvoiced' => '未開立',
        'invoiced' => '已開立',
        'void' => '作廢',
        'discount' => '折讓',
    );
    const SHIPPING_STATUS = array(
        'notShipped' => '未出貨',
        'shipped' => '已出貨',
        'arrived' => '已到貨',
        'picked' => '已取貨',
        'waitReturn' => '退貨申請中',
        'returning' => '退貨中',
        'returned' => '已退貨',
        'noReturn' => '不退貨',
    );

    private $SQL_orderForm;
    private $SQL_orderTimeline;
    
    public $Product;
    public $ShoppingCart;
    public $Pay;

    public function __construct() {
        $this->Product = new Product($this);
        $this->ShoppingCart = new ShoppingCart($this);
        $this->Pay = new Pay($this);
        $this->SQL_orderForm = new kSQL('orderForm');
        $this->SQL_orderTimeline = new kSQL('orderTimeline');
    }

    private function createOrderNumber(){
        return date('Ymd') . substr(uniqid(), 8);
    }

    private function getDefaultItem($price=0){
        $item = array(
            'id' => 0,
            'name' => '商品',
            'price' => $price,
            'quantity' => 1,
            'subTotalPrice' => $price,
        );
        return array($item);
    }

    private function getShoppingCart(){
        $shoppingCartItems = $this->ShoppingCart->getItems();
        if(empty($shoppingCartItems)){
            $shoppingCartItems = $this->getDefaultItem();
        }
        return $shoppingCartItems;
    }

    private function getTotalPrice($shoppingCartItems){
        $totalPrice = 0;
        foreach($shoppingCartItems as $item){
            $totalPrice += $item['subTotalPrice'];
        }
        return $totalPrice;
    }

    public function getOrderPayment($orderID){
        $order = $this->getOrder($orderID);
        if(empty($order)){
            echo '訂單不存在';
            exit();
        }
        $setPaymentFlag = $this->Pay->setPayment($order['prev2']);
        if(!$setPaymentFlag){
            header('X-PHP-Response-Code: 404', true, 404);
            echo '付款方式不存在';
            exit();
        }
        return $order;
    }

    public function checkOrderPaymentReturn($order){
        if($order['viewB'] != 'unPaid'){
            return false;
        }
        if($this->getOrderLog($order, 'payment', 'paid')){
            return false;
        }
        return true;
    }
    
    public function createOrder(){
        $orderNumber = $this->createOrderNumber();
        $choosePayment = $this->ShoppingCart->getChoosePayment();
        $setPaymentFlag = $this->Pay->setPayment($choosePayment);
        if(!$setPaymentFlag){
            return array(
                'status' => 'error',
                'message' => '付款方式不存在',
            );
        }
        $goldFlow = $this->Pay->goldFlow;
        $payment = $this->Pay->payment;
        if($this->Pay->manufacturer=='ECPay' && in_array($this->Pay->paymentMethod, array('ATM', 'CVS', 'BARCODE'))){
            $expireDayFlag = false;
        }else{
            $expireDayFlag = !empty($payment['sortB']);
        }
        $shoppingCartItems = $this->getShoppingCart();
        $subject = array(
            'shoppingCart' => $shoppingCartItems,
        );
        $insertStatus = $this->SQL_orderForm
            ->SetAction('insert')
            ->SetValue('subject', json_encode($subject))
            ->SetValue('tablename', 'order')
            ->SetValue('viewA', 'create')//訂單狀態[成立訂單(create)、取消訂單(cancel)]
            ->SetValue('viewB', 'unPaid')//付款狀態[未付款(unPaid)、已付款(paid)、退款申請中(waitRefund)、退款中(refunding)、已退款(refunded)、不退款(noRefund)]
            ->SetValue('viewC', 'notInvoiced') //發票狀態[未開立(notInvoiced)、已開立(invoiced)、作廢(void)、折讓(discount)]
            ->SetValue('viewD', 'notShipped')//出貨狀態[未出貨(notShipped)、已出貨(shipped)、已到貨(arrived)、已取貨(picked)、退貨申請中(waitReturn)、退貨中(returning)、已退貨(returned)、不退貨(noReturn)]
            ->SetValue('propertyA', 'userId')//userId
            ->SetValue('propertyB', $orderNumber)//訂單編號
            ->SetValue('propertyC', date('Y/m/d 23:59:59', strtotime(date("Y/m/d H:i:s")." + {$payment['sortB']} day")), $expireDayFlag)//訂單有效期限
            ->SetValue('prev1', $goldFlow['id'])//金流ID
            ->SetValue('prev2', $payment['id'])//付款ID
            // ->SetValue('prev3', $invoice['id'])//發票ID
            // ->SetValue('prev4', $shup['id'])//出貨ID
            ->SetValue('sortA', $this->getTotalPrice($shoppingCartItems))//訂單總金額
            ->SetValue('create_at', $this->SQL_orderForm->getNowTime())
            ->SetValue('update_at', $this->SQL_orderForm->getNowTime())
            ->BuildQuery();
        if($insertStatus){
            $orderID = $this->SQL_orderForm->getInsertId();
        }
        if(!empty($orderID)){
            $this->updateOrderStatus('create', array(
                'subject' => $subject,
                'orderID' => $orderID,
                'orderNumber' => $orderNumber,
            ));
            $return = array(
                'orderID' => $orderID,
                'orderNumber' => $orderNumber,
                'status' => 'success',
                'message' => '訂單已成立',
            );
            $this->ShoppingCart->clear();
        }else{
            $return = array(
                'orderID' => $orderID,
                'orderNumber' => $orderNumber,
                'DBlink' => $this->SQL_orderForm->DBlink,
                'status' => 'error',
                'message' => '訂單成立失敗',
            );
        }
        return $return;
    }

    public function getOrder($orderID){
        $order = $this->SQL_orderForm->SetAction('select')
                                ->SetWhere("tablename='order'")
                                ->SetWhere("id='$orderID'")
                                ->SetLimit(1)
                                ->BuildQuery();
        return !empty($order) ? $order[0] : array();
    }

    public function updateOrderStatus($action, $order, $mode=''){
        $insertOrderLog = $this->insertOrderLog(array(
            'tablename' => 'order',
            'next' => $action,
            'orderID' => $order['orderID'],
            'orderNumber' => $order['orderNumber'],
            'prev2' => $mode,
        ));
        if($insertOrderLog && $action!='create'){
            $subject = $order['subject'];
            $subject[$action . "Time"] = $this->SQL_orderForm->getNowTime();
            $this->SQL_orderForm->SetAction('update')
                            ->SetWhere("id='{$order['orderID']}'")
                            ->SetValue('viewA', $action) //訂單狀態[成立訂單(create)、取消訂單(cancel)]
                            ->SetValue('subject', json_encode($subject))
                            ->SetValue('update_at', $this->SQL_orderForm->getNowTime())
                            ->BuildQuery();
        }
    }

    private function convertTransaction($extra){
        $transactionOrderNumber = '';
        $transactionNumber = '';
        switch ($this->Pay->manufacturer) {
            case 'LINEPay':
                $transactionOrderNumber = $extra['orderId'];
                $transactionNumber = $extra['transactionId'];
                break;
            case 'ECPay':
                $transactionOrderNumber = $extra['MerchantTradeNo'];
                $transactionNumber = $extra['TradeNo'];
                break;
        }
        return array($transactionOrderNumber, $transactionNumber);
    }

    public function updateOrderPaymentStatus($action, $order, $extra=array()){
        $failed = in_array($action, array('paidFail'));
        list($transactionOrderNumber, $transactionNumber) = $this->convertTransaction($extra);
        $insertOrderLog = $this->insertOrderLog(array(
            'tablename' => 'payment',
            'next' => $action,
            'orderID' => $order['id'],
            'orderNumber' => $order['propertyB'],
            'propertyB' => $transactionOrderNumber,//交易訂單編號
            'propertyC' => $transactionNumber,//交易編號
            'prev1' => $this->Pay->manufacturer,//金流廠商
            'subject' => json_encode($extra),
        ));
        if($insertOrderLog || $failed){
            $paymentStatus = $action;
            $subject = $order['subject'];
            if(!$failed){
                $subject[$action . "Time"] = $this->SQL_orderForm->getNowTime();
            }
            switch ($action) {
                case 'refunding':
                    $mailList = $this->SQL_orderForm->getSystem('subject/email');
                    if (!empty($mailList)) {
                        //TODO:發mail給管理者[退款通知]
                    }
                    break;
                case 'refunded':
                    $subject['refundPrice'] = !empty($extra['refundPrice']) ? $extra['refundPrice'] : $order['sortA'];//退款金額
                    $FLEX = new FELX();
                    $line = new kLineMessaging();
                    $title = '退款通知';
                    $text = '您的訂單已退款';
                    $Val = array(
                        "type" => "success",
                        "title" => $title,
                        "text" => $text,
                        "button" => array(
                            'text' => '退款資訊',
                            'uri' => 'https://' . __DOMAIN . '/ft/order/details/id/' .$order['id'],
                        )
                    );
                    $line->SetMessageObject($FLEX->FLEX_SendMessage($title, $FLEX->FLEX_Alert($Val)));
                    $line->push($order['propertyA']);
                    break;
                case 'paid'://付款成功
                    $subject['paidInfo'] = $extra;//付款資訊
                    break;
                case 'paidFail'://付款失敗
                    $paymentStatus = '';
                    if($order['viewB'] == 'unPaid'){//未付款
                        $subject['returnInfo'] = $extra;//付款資訊
                    }
                    break;
                case 'takeNumber'://取號
                    $paymentStatus = '';
                    if($order['viewB'] == 'unPaid'){//未付款
                        $subject['paymentInfo'] = $extra;//取號資訊
                        $this->SQL_orderForm->SetValue('propertyD', $extra['ExpireDate'], !empty($extra['ExpireDate'])); //繳費期限
                    }
                    break;
            }
            $this->SQL_orderForm->SetAction('update')
                            ->SetWhere("id='{$order['id']}'")
                            ->SetValue('viewB', $paymentStatus, !empty($paymentStatus))
                            ->SetValue('propertyD', $transactionOrderNumber, $action=='paid')
                            ->SetValue('propertyE', $transactionNumber, $action=='paid')
                            ->SetValue('subject', json_encode($subject))
                            ->SetValue('update_at', $this->SQL_orderForm->getNowTime())
                            ->BuildQuery();
        }
    }

    public function getOrderLog($order, $type, $status){
        $orderID = $order['id'];
        $orderLogs = $this->SQL_orderTimeline
            ->SetAction('select')
            ->SetWhere("prev='$orderID'")
            ->SetWhere("tablename='$type'")
            ->SetWhere("next='$status'")
            ->BuildQuery();
        return $orderLogs;
    }

    public function insertOrderLog($query){
        $this->SQL_orderTimeline->SetAction('insert');
        foreach($query as $key => $value){
            if(empty($value) || in_array($key, array('orderID', 'orderNumber'))){
                continue;
            }
            $this->SQL_orderTimeline->SetValue($key, $value);
        }
        $this->SQL_orderTimeline->SetValue('prev', $query['orderID'])//訂單ID
                                ->SetValue('propertyA', $query['orderNumber'])//(內部)商家訂單編號
                                ->SetValue('create_at', $this->SQL_orderTimeline->getNowTime())
                                ->SetValue('update_at', $this->SQL_orderTimeline->getNowTime());
        return $this->SQL_orderTimeline->BuildQuery();
    }

}