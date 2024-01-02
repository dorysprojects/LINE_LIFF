<?php

$xajax->register(XAJAX_FUNCTION, 'UpdateDefaultRichMenu');
$xajax->register(XAJAX_FUNCTION, 'UpdateCrontabDefaultRichMenu');
$xajax->register(XAJAX_FUNCTION, 'ChangeRichMenu');
$xajax->register(XAJAX_FUNCTION, 'SearchName');

function UpdateDefaultRichMenu($action, $RichMenuID) {
    $objResponse = new xajaxResponse();
    $line = new kLineMessaging();
    if($action == 'Cancel'){
        $Status = $line->CancelDefaultRichMenu();
    }else{//Set
        $Status = $line->SetDefaultRichMenu($RichMenuID);
    }
    if (empty($Status)) {
        $objResponse->alert('操作成功');
    } else {
        $objResponse->alert(json_encode($Status));
    }
    $objResponse->script("location.reload();");
    return $objResponse;
}

function UpdateCrontabDefaultRichMenu($RichMenuID, $Data){
    $objResponse = new xajaxResponse();
    $Data = json_decode($Data, true);
    $ErrorMsg = '';
    if(!$Data['date1'] || !$Data['time1'] || !$Data['date2'] || !$Data['time2']){
        $ErrorMsg = "使用期間 各欄位皆需填寫";
    }else if(strtotime($Data['date1'].$Data['time1']) >= strtotime($Data['date2'].$Data['time2'])){
        $ErrorMsg = "結束時間 需大於 開始時間";
    }else if( ($Data['date1'].$Data['time1']<date("Y-m-dH:i:s", strtotime("+4 min", time()))) || ($Data['date2'].$Data['time2']<date("Y-m-dH:i:s", strtotime("+4 min", time()))) ){
        $ErrorMsg = "時間 需設定大於 現在時間5分鐘";
    }else{
        $SQL_RichMenu = new kSQL('RichMenu');
        $ThisRichMenu = $SQL_RichMenu->SetAction('select')->SetWhere("propertyA='". $RichMenuID ."'")->BuildQuery();
        $RichMenu = $SQL_RichMenu->SetAction('select')->SetWhere("tablename='RichMenu'")->SetWhere("next='myself'")->SetWhere("prev3!=''")->SetWhere("prev4!=''")->SetWhere("propertyA!='". $RichMenuID ."'")->BuildQuery();
        if ($RichMenu) {
            $data_start = strtotime($Data['date1'].' '.$Data['time1']);
            $data_end = strtotime($Data['date2'].' '.$Data['time2']);
            foreach ($RichMenu as $key => $item) {
                $item_start = strtotime($item['prev3']);
                $item_end = strtotime($item['prev4']);
                if (($data_start >= $item_start && $data_start <= $item_end) || ($data_end >= $item_start && $data_end <= $item_end)) {
                    $error_array[] = $item;
                }
            }
	}
        if(count($error_array) > 0){
            $ErrorMsg = '與其他排程撞期，請重新選擇時間';
        }else{
            $state = $SQL_RichMenu->SetAction('update')
                    ->SetWhere("id='". $ThisRichMenu[0]['id'] ."'")
                    ->SetValue('prev3', $Data['date1'].' '.$Data['time1'])
                    ->SetValue('prev4', $Data['date2'].' '.$Data['time2'])
                    ->BuildQuery();
            if(!$state){
                $ErrorMsg = '儲存時，發生錯誤，請重新操作';
            }
        }
    }
    if($ErrorMsg){
        $objResponse->alert($ErrorMsg);
    }else{
        $objResponse->alert('已加入排程');
        $objResponse->script("location.reload();");
    }
    
    return $objResponse;
}

function ChangeRichMenu($Member = NULL, $RichMenu = NULL, $Action = NULL) {
    $objResponse = new xajaxResponse();
    $line = new kLineMessaging();

    if ($RichMenu || $Action == "unlink") {
        if ($Member) {
            if(!is_array($Member)){
                $ChangeList = array($Member);
            }else{
                $ChangeList = $Member;
            }
            
            if ($ChangeList) {
                $ChangeList = array_unique($ChangeList);
                $ChangeList = array_values($ChangeList);
                if (count($ChangeList) == 1) {
                    if ($Action == "unlink") {
                        $state = $line->RichMenuUnlink($ChangeList[0]);
                    } else {
                        $state = $line->RichMenuLink($RichMenu, $ChangeList[0]);
                    }
                } else {
                    $ChangeList = array_chunk($ChangeList, 500);
                    foreach ($ChangeList as $key => $value) {
                        if ($Action == "unlink") {
                            $state = $line->RichMenu_Multiple_UnLink($value);
                        } else {
                            $state = $line->RichMenu_Multiple_Link($RichMenu, $value);
                        }
                    }
                }
                $Act = ($Action == "unlink") ? "刪除主選單" : "新增主選單";
                if ($state) {
                    $objResponse->script("swal({type: 'error',title: '" . $state['message'] . "',showConfirmButton: false});");
                } else {
                    $objResponse->script("swal({type: 'success',title: '" . $Act . "成功',showConfirmButton: false});");
                }
            } else {
                $objResponse->script("swal({type: 'error',title: '無會員',showConfirmButton: false});");
            }
        } else {
            $objResponse->script("swal({type: 'error',title: '選擇要更換主選單的「會員」',showConfirmButton: false});");
        }
    } else {
        $objResponse->script("swal({type: 'error',title: '選擇要更換的「主選單」',showConfirmButton: false});");
    }
    return $objResponse;
}

function SearchName($val = NULL) {
    $objResponse = new xajaxResponse();
    $_SESSION[__DOMAIN.'_'._Module.'_'._Action.'_search'] = $val;
    $objResponse->script("location.reload();");
    return $objResponse;
}

?>
