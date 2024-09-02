<?php

function setShoppingCart($_this){
    $Order = new Order();
    $product = $Order->Product->getProduct($_this->my['productId']);
    if(!$product['status']){
        $return = array(
            'status' => 'error',
            'message' => $product['error'],
        );
        echo json_encode($return);
        exit();
    }
    $Order->ShoppingCart->addItem($product['product']);
    $return = array(
        'status' => 'success',
        'message' => '商品已加入購物車',
    );
    echo json_encode($return);
}

function clearShoppingCart(){
    $Order = new Order();
    $Order->ShoppingCart->clear();
    $return = array(
        'status' => 'success',
        'message' => '購物車已清空',
    );
    echo json_encode($return);
}

function setChoosePayment($_this){
    $Order = new Order();
    $Order->ShoppingCart->setChoosePayment($_this->my['paymentId']);
    $return = array(
        'status' => 'success',
        'message' => '付款方式已設定',
    );
    echo json_encode($return);
}

function createOrder($_this){
    if(empty($_this->my['paymentId'])){
        $return = array(
            'status' => 'error',
            'message' => '請選擇付款方式',
        );
    }else{
        $Order = new Order();
        $return = $Order->createOrder();
    }
    echo json_encode($return);
}

//執行請求函數
$_this = new stdClass();
if($_POST){
    $_this->my = $_POST;
}
if($_GET){
    $_this->my = $_this->my ? array_merge($_this->my, $_GET) : $_GET;
}
$ps = kCore_get('ps');
if (function_exists($ps))
	call_user_func($ps, $_this);
else
	echo $ps . '請求不存在';
exit;