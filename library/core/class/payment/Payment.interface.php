<?php

interface PaymentInterface {

    /**
     * @param $payment
     * @param $goldFlow
     * @return mixed
     */
    public function __construct($payment, $goldFlow);

    /**
     * @param $order
     * @return mixed
     */
    public function sendPaymentRequest($order);
    
    /**
     * @param $orderID
     * @return mixed
     */
    public function paymentReturn($orderID);
    
    /**
     * @param $order
     * @param int $amount
     * @return mixed
     */
    public function sendRefundRequest($order, $amount=0);

}