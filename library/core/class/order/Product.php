<?php

class Product {
    
    private $Order;
    private $product;
    private $SQL_Product;

    public function __construct($Order){
        $this->Order = $Order;
        $this->SQL_Product = new kSQL('Product');
    }

    public function getProduct($productId){
        $products = $this->SQL_Product->SetAction('select')
            ->SetWhere("tablename='Product'")
            ->SetWhere("id='$productId'", !empty($productId))
            ->BuildQuery();
        $this->product = !empty($products[0]) ? $products[0] : array();
        return $this->checkProduct();
    }

    private function checkProduct(){
        if(empty($this->product)){
            return $this->setError('商品不存在');
        }
        return $this->checkProductStatus();
    }

    private function checkProductStatus(){
        if($this->product['viewA']=='off'){
            return $this->setError('商品已下架');
        }
        return $this->checkProductStock();
    }

    private function checkProductStock(){
        if($this->product['sortB'] <= 0){
            return $this->setError('商品已售完');
        }
        return $this->setSuccess();
    }

    private function setError($error){
        return array(
            'status' => false,
            'error' => $error,
        );
    }

    private function setSuccess(){
        return array(
            'status' => true,
            'product' => $this->product,
        );
    }

    
}