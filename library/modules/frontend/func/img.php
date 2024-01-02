<?php

$line = new kLineMessaging();

$contentId = kCore_filterString(kCore_get('contentId'));
$richMenuId = kCore_filterString(kCore_get('richMenuId'));
$get = kCore_filterString(kCore_get('get'));
$type = kCore_filterString(kCore_get('type'));
$path = kCore_filterString(kCore_get('path'));

if ($contentId) {
    $return = $line->content($contentId);
//    print_r($return);exit();
}

if($richMenuId){
    $return = $line->RichMenuDownload($richMenuId);
    $status = json_decode($return['response'], true);
    if($status['message'] == "Not found"){
        print_r("Not found");exit();
    }
}

if($return){
    $status = json_decode($return['BODY'], true);
    if($status['message'] == "Not found"){
        print_r("Not found");exit();
    }else{
        if (!empty($return['HEADER'])) {
            $EachHeader = explode("\n", $return['HEADER']);
            foreach ($EachHeader as $key => $item) {
                if($item){
                    header($item);
                }
            }
        }
        echo ($return['BODY']);
    }
}

if($get){
    $root_url = __ROOT_UPLOAD;
    $url = __WEB_UPLOAD;
    if (!empty($path)) {
        $root_url .= $path . '/';
        $url .= $path . '/';
    }
    switch ($type) {
        case 'video':
            $FileTypes = array(
                "mp4",
                "m4v",
                "mov",
                "wmv",
                "qt",
                "avi",
                "mpeg",
                "flv",
            );
            break;
        case 'audio':
            $FileTypes = array(
                "m4a",
                "mp3",
                "wav",
                "wma",
                "ogg",
            );
            break;
        default://image
            $FileTypes = array(
                "jpg",
                "jpeg",
                "png",
                "gif",
                "tif",
                "tiff",
                "bmp"
            );
            break;
    }
    $num = date("YmdHis");
    foreach ($FileTypes as $key => $filetype) {
        if (file_exists($root_url . $get . '.' . $filetype)) {
            header('X-PHP-Response-Code: 200', true, 200);
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Content-type:image/". $filetype .";");
            header("Content-Disposition: attachment;");
            header("Content-Length:" . filesize($root_url . $get . '.' . $filetype) . ";");
            header("filename=" . $num . $get . '.' . $filetype);
            ob_clean();
            flush();
            readfile($root_url . str_replace("@", "", $get . '.' . $filetype));
            exit(0);
	}
    }
    header('X-PHP-Response-Code: 404', true, 404);
    echo $get . '圖片不存在';
}

?>