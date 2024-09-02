<?php

class Pay {

    private $Order;
    
    public $Payment;
    public $payment;
    public $goldFlow;
    public $manufacturer;
    public $paymentMethod;

    public function __construct($Order){
        $this->Order = $Order;
    }

    public function setPayment($paymentId){
        if(empty($paymentId)){
            return false;
        }
        $this->payment = $this->getPayment($paymentId);
        if(empty($this->payment)){
            return false;
        }
        $this->goldFlow = $this->getGoldFlow($this->payment['prev']);
        if(empty($this->goldFlow)){
            return false;
        }
        $this->Payment = $this->create($this->payment, $this->goldFlow);
        return true;
    }

    private function create() {
        $this->manufacturer = $this->goldFlow['propertyA'];
        $this->paymentMethod = $this->payment['propertyA'];
        $filePath = __CORE . "/class/payment/{$this->manufacturer}/Payment.php";
        if (file_exists($filePath)) {
            include_once $filePath;
        }else{
            throw new Exception("Invalid payment method: " . $this->manufacturer);
        }
        switch($this->manufacturer){
            case 'ECPay':
                return new ECPay\Payment($this->payment, $this->goldFlow);
                break;
            case 'LINEPay':
                return new LINEPay\Payment($this->payment, $this->goldFlow);
                break;
        }
    }
    
    public function getGoldFlow($goldFlowId=null){
        $SQL_GoldFlow = new kSQL('GoldFlow');
        $goldFlows = $SQL_GoldFlow->SetAction('select')
            ->SetWhere("tablename='GoldFlow'")
            ->SetWhere("viewA='on'", empty($goldFlowId))
            ->SetWhere("id='$goldFlowId'", !empty($goldFlowId))
            ->BuildQuery();
        return !empty($goldFlowId) ? $goldFlows[0] : $goldFlows;
    }

    public function getPayment($paymentId=null){
        $SQL_Payment = new kSQL('Payment');
        $payments = $SQL_Payment->SetAction('select')
            ->SetWhere("tablename='Payment'")
            ->SetWhere("viewA='on'", empty($paymentId))
            ->SetWhere("id='$paymentId'", !empty($paymentId))
            ->BuildQuery();
        return !empty($paymentId) ? $payments[0] : $payments;
    }

    public function sendPaymentRequestHandler($orderID){
        $order = $this->Order->getOrderPayment($orderID);
        $this->Payment->sendPaymentRequest($order);
    }

    public function takeNumberHandler($orderID, $data){
        $order = $this->Order->getOrderPayment($orderID);
        $extra = $this->Payment->takeNumber($data);
        $this->Order->updateOrderPaymentStatus('takeNumber', $order, $extra);
    }

    public function paymentReturnHandler($orderID){
        $order = $this->Order->getOrderPayment($orderID);
        list($success, $extra, $orderInfo, $redirectFlag) = $this->Payment->paymentReturn($order);
        if ($success) {
            if($this->Order->checkOrderPaymentReturn($order)){//檢查未付款、已通知過已付款
                $this->Order->updateOrderPaymentStatus('paid', $order, $extra);
                // //開立發票
                // $Invoice = new Invoice();
                // $invoiceData = $Invoice->sendInvoiceRequest('Issue', $order);
                // //付款通知
                // $Notification = new Notification();
                // $Notification->payAlert($orderInfo);
            }
        } else {
            $this->Order->updateOrderPaymentStatus('paidFail', $order, $extra);
        }
        if($redirectFlag){
            header('Location: https://' . __DOMAIN . '/ft/order/details/orderID/' . $orderID);
        }
    }

}