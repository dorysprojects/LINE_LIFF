<?php

$orderID = kCore_get('orderID');
$Order = new Order();
$order = $Order->getOrderPayment($orderID);
$TPL->assign('order', $order);
// print_r($order);
// switch($Order->Pay->manufacturer){
//     case 'ECPay':
//         $showPayError = (!empty($_POST) && $_POST['PaymentType']=='Credit' && $_POST['RtnCode']!=1);//信用卡付款失敗
//         break;
//     case 'LINEPay':
//         // $showPayError = (!empty($_GET) && $_GET['returnCode']!=0000);//LINE Pay付款失敗
//         break;
// }