<?php

class ShoppingCart{
    
    private $Order;

    public function __construct($Order){
        $this->Order = $Order;
        //TODO: 區分不同的購物車
    }

    public function setChoosePayment($paymentId){
        $_SESSION['paymentId'] = $paymentId;
    }
    
    public function getChoosePayment(){
        return $_SESSION['paymentId'];
    }

    public function addItem($item){
        $shoppingCartItems = $this->getItems();
        if(!empty($shoppingCartItems)){
            $shoppingCartItemsByItemId = array_column($shoppingCartItems, null, 'id');
            if(isset($shoppingCartItemsByItemId[$item['id']])){
                $shoppingCartItemsByItemId[$item['id']]['price'] = $item['price'];
                $shoppingCartItemsByItemId[$item['id']]['quantity'] += $item['quantity'];
                $shoppingCartItemsByItemId[$item['id']]['subTotalPrice'] += $item['price'];
                $_SESSION['shoppingCartItems'] = array_values($shoppingCartItemsByItemId);
                return;
            }
        }
        $item['subTotalPrice'] = $item['price'] * $item['quantity'];
        $_SESSION['shoppingCartItems'][] = $item;
    }

    public function getItems(){
        return $_SESSION['shoppingCartItems'];
    }

    public function clear(){
        unset($_SESSION['paymentId'], $_SESSION['shoppingCartItems']);
    }
}