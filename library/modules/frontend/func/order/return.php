<?php

$orderID = kCore_get('orderID');
$Order = new Order();
$Order->Pay->paymentReturnHandler($orderID);//$_POST, $_GET