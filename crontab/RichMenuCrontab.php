<?php

$SQL_RichMenu = new kSQL('RichMenu');

$SetDefault_RichMenu = $SQL_RichMenu->SetAction('select')
                                    ->SetWhere("tablename='RichMenu'")
                                    ->SetWhere("next='myself'")
                                    ->SetWhere("propertyA!=''")
                                    ->SetWhere("viewA='on'")
                                    ->SetWhere("prev3='". date('Y-m-d H:i') ."' OR prev3='". date('Y-m-d H:i') .":00'")
                                    ->BuildQuery();
if($SetDefault_RichMenu[0]){
    $Status = $line->SetDefaultRichMenu($SetDefault_RichMenu[0]['propertyA']);
}

$UnSetDefault_RichMenu = $SQL_RichMenu->SetAction('select')
                                    ->SetWhere("tablename='RichMenu'")
                                    ->SetWhere("next='myself'")
                                    ->SetWhere("propertyA!=''")
                                    ->SetWhere("viewA='on'")
                                    ->SetWhere("prev4='". date('Y-m-d H:i') ."' OR prev4='". date('Y-m-d H:i') .":00'")
                                    ->BuildQuery();
if($UnSetDefault_RichMenu[0]){
    $GetDefaultRichMenu = $line->GetDefaultRichMenu();
    if($GetDefaultRichMenu['richMenuId'] && ($UnSetDefault_RichMenu[0]['propertyA']===$GetDefaultRichMenu['richMenuId'])){
        $Status = $line->CancelDefaultRichMenu();
    }
}

?>