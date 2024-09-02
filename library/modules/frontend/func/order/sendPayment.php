<?php

$orderID = kCore_get('orderID');
$Order = new Order();
$Order->Pay->sendPaymentRequestHandler($orderID);