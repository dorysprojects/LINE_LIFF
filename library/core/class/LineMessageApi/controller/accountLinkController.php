<?php

$Line_UID = $line->events['source']['userId'];
$FB_UID = $line->events['link']['nonce'];
if($Line_UID && $FB_UID){
//    $line->LineMessageDB_Membe->SetAction('update')
//                            ->SetWhere("propertyA='". $Line_UID ."'")
//                            ->SetValue('propertyE', $FB_UID)
//                            ->BuildQuery();
//    $line->LineMessageDB_Membe->SetAction('update')
//                            ->SetWhere("propertyA='". $FB_UID ."'")
//                            ->SetValue('propertyE', $Line_UID)
//                            ->BuildQuery();
    $line->text('帳號已經連結')->reply();
}

?>