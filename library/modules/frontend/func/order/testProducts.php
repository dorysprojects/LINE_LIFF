<?php

$Order = new Order();
// $Order->ShoppingCart->clear();
$Order->ShoppingCart->addItem(array(
    'id' => 1,
    'name' => '測試商品',
    'price' => 100,
    'quantity' => 1
));
// header('Location: ' . __CustomStickers_Web . '/ft/order/shoppingCart');