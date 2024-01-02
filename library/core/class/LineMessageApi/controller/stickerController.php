<?php

$SQL_SystemMessage = new kSQL('SystemMessage');
$StickerMsg = $SQL_SystemMessage->SetAction('select')
            ->SetWhere("tablename='SystemMessage'")
            ->SetWhere("next='StickerMsg'")
            ->SetWhere("viewA='on'")
            ->BuildQuery();
if($StickerMsg[0]){
    $line->SetMessages($StickerMsg[0]);
    $line->reply();
}else{
    if(1){
        $image = $line->stickerImg($line->events['message']['stickerResourceType'], $line->events['message']['packageId'], $line->events['message']['stickerId']);
        $line->text($image);
        $line->reply();
    }
}

?>