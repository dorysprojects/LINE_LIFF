<?php

$columns = array();
$columns[] = array(
    "type" => "radio",
    "label" => "啟用",
    "required" => "on",
    "name" => "viewA",
    "value" => "on",
    "options" => array(
        "on" => "啟用",
        "off" => "凍結",
    ),
);
$columns[] = array(
    "type" => "uploadImageA",
    "label" => "使用者頭貼",
    "required" => "on",
    "name" => "img0",
    "value" => "",
);
$columns[] = array(
    "type" => "text",
    "label" => "使用者名稱",
    "required" => "on",
    "name" => "propertyA",
    "value" => "",
);
$columns[] = array(
    "type" => "text",
    "label" => "帳號",
    "required" => "on",
    "name" => "propertyB",
    "value" => "",
);
$columns[] = array(
    "type" => "text",
    "label" => "密碼",
    "required" => "on",
    "name" => "propertyC",
    "value" => "",
);

$AuthorityList = array();
$SystemMessageAction = array(
    "FollowMsg",
    "AutoMsg",
    "StickerMsg",
    "VideoPlayCompleteMsg",
    "NotifyMsg",
);
if(!empty($SystemMessageAction)){
    foreach ($SystemMessageAction as $key => $ActionName) {
        if($_SESSION[__DOMAIN.'_backend']['prev']=='Admin' || kCore_CheckAuthority('SystemMessage', $ActionName)){
            $AuthorityList['SystemMessage'][] = $ActionName;
        }
    }
}
if (is_dir(__BackendFunc)) {
    if ($dh1 = opendir(__BackendFunc)) {
        while (($ModuleFileName = readdir($dh1)) !== false) {
            $ModuleFilePath = __BackendFunc . $ModuleFileName; //檔案路徑
            if(file_exists($ModuleFilePath)){
                $ModuleFileType = filetype($ModuleFilePath); //File(檔案)、Dir(資料夾)
                if ( $ModuleFileType==="dir" && $ModuleFileName!=="." && $ModuleFileName!==".." && $ModuleFileName!=="System" ) {
                    if ($dh2 = opendir(__BackendFunc.$ModuleFileName)) {
                        while (($ActionFileName = readdir($dh2)) !== false) {
                            $ActionFilePath = __BackendFunc.$ModuleFileName . '/'.$ActionFileName; //檔案路徑
                            if(file_exists($ActionFilePath)){
                                $ActionFileType = filetype($ActionFilePath); //File(檔案)、Dir(資料夾)
                                if ( $ActionFileType!=="dir" && $ActionFileName!=="." && $ActionFileName!==".." ) {
                                    $ActionNameTmp = explode('.', $ActionFileName);
                                    $ActionName = $ActionNameTmp[0];
                                    switch($ActionName){
                                        case "process":
                                        case "xajax":
                                        case "js":
                                        case "init":
                                            break;
                                        default :
                                            if($_SESSION[__DOMAIN.'_backend']['prev']=='Admin' || kCore_CheckAuthority($ModuleFileName, $ActionName)){
                                                $AuthorityList[$ModuleFileName][] = $ActionName;
                                            }
                                            break;
                                    }
                                }
                            }
                        } closedir($dh2);
                    }
                }
            }
        } closedir($dh1);
    }
}
$TPL->assign('AuthorityList', $AuthorityList);

$TPL->assign('columns', $columns);
$TPL->assign('FormType', 'authority');