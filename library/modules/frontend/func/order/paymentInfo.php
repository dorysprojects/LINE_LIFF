<?php

$orderID = kCore_get('orderID');
$Order = new Order();
$Order->Pay->takeNumberHandler($orderID, $_POST);