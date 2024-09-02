<?php

$page = kCore_get('order');
$phpFilePath = $_FromFuncPath.$_Module."/$page.php";
$tplFilePath = $_FromViewPath.$_Module."/$page.tpl";
if(!empty($page)
 && file_exists($phpFilePath)){
    include_once __CORE . '/class/order/Product.php';
    include_once __CORE . '/class/order/ShoppingCart.php';
    include_once __CORE . '/class/order/Order.php';
    include_once __CORE . '/class/payment/Pay.php';
    include_once __CORE . '/class/payment/Payment.interface.php';
    include_once($phpFilePath);
    if(file_exists($tplFilePath)){
        $TPL->display($tplFilePath);
    }
}else{
    header("Location:" . __CustomStickers_Web . '/be/System/PageNotFound');
}