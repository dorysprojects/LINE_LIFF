<?php

if (kCore_get('Flag')) {
    include __LIB . "/core/class/kEinvoice.php";
    $kEinvoice = new kEinvoice();
    for ($i = 0; $i < 5; $i++) {
        $Val = array(
            "sellerAddress" => " ", //空的假商家地址
            "sellerName" => " ", //空的假商家名稱
            "invPeriod" => (date("Y") - 1911) . date("m"), //民國年、月
            "invNum" => chr(rand(65, 90)) . chr(rand(65, 90)) . rand(10000000, 99999999), //假發票號碼:(A~Z隨機)、(A~Z隨機)、(第一位數>=1的八位數);
            "invDate" => date("Y-m-d"), //今天日期
            "invoiceTime" => date("H:i:s", rand(strtotime(date("Y-m-d"), time()), strtotime(date("Y-m-d H:i:s"), time()))), //今天凌晨到現在，隨機的時間點
            "sellerBan" => rand(10000000, 99999999), //假賣家統編，(第一位數>=1的八位數)
        );
        $TotalAmount = 0;
        for ($r = 1; $r < rand(1, 3); $r++) {
            $amount = rand(1, 1000);
            $quantity = rand(1, 5);
            $TotalAmount += $amount; //加總總金痾
            $Val['details'][] = array(
                "description" => " ", //空的假商品名稱
                "amount" => strval($amount), //字串，(1~1000)假金額
                "quantity" => $quantity, //(1~5)假數量
            );
        }
        $Val['randomNumber'] = substr('0000' . $TotalAmount, -4); //隨機碼，總金額後4碼
        $QrCode = $kEinvoice->TurnQrCode($Val, $BGcolor = array(40, 90, 255)); //產生QrCode

        echo "<script>window.open('" .  $QrCode['left'] . "');</script>"; //另開假QrCode
    }
}
