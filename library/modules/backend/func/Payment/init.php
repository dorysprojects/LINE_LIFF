<?php

include_once __CORE . '/class/payment/Pay.php';

$Order = new Order();
$goldFlow = $Order->Pay->getGoldFlow();