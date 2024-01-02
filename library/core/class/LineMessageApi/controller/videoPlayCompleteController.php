<?php

$SQL_SystemMessage = new kSQL('SystemMessage');
$VideoPlayCompleteMsg = $SQL_SystemMessage->SetAction('select')
            ->SetWhere("tablename='SystemMessage'")
            ->SetWhere("next='VideoPlayCompleteMsg'")
            ->SetWhere("viewA='on'")
            ->BuildQuery();
if($VideoPlayCompleteMsg[0]){
    $line->SetMessages($VideoPlayCompleteMsg[0]);
    $line->reply();
}

?>