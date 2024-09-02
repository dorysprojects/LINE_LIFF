<?php

$Order = new Order();
$choosePayment = $Order->ShoppingCart->getChoosePayment();
$shoppingCartItems = $Order->ShoppingCart->getItems();
if(empty($shoppingCartItems)){
    echo '購物車內沒有商品';
    exit();
}
$TPL->assign('shoppingCartItems', $shoppingCartItems);

$getPayments = $Order->Pay->getPayment();
$TPL->assign('choosePayment', $choosePayment);
$TPL->assign('getPayments', $getPayments);