<?php

function checkSignature($http_header=null, $signature=null) {
    $signatureList = array(
        "1.0" => "X-Line-Signature",
        "2.0" => "x-line-signature",
    );
    foreach ($signatureList as $version => $value) {
        if($http_header[$value] == $signature){
            return true;
        }
    }
    return false;
}

$Webhooks_decode = ($argv[1]) ? json_decode($argv[1]) : array();
if(!$Webhooks_decode){
    if (!function_exists('getallheaders')) {
        function getallheaders() {
            $headers = [];
            foreach ($_SERVER as $name => $value) {
                if (substr($name, 0, 5) == 'HTTP_') {
                    $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
                }
            }
            return $headers;
        }
    }
    $http_header = array_merge(array(), getallheaders());
    $Webhooks = file_get_contents("php://input");
    $Webhooks_decode = json_decode($Webhooks);
    $hash = hash_hmac('sha256', $Webhooks, __LineMessageAPISecret, true);
    $signature = base64_encode($hash);
}else{
    $http_header['x-line-signature'] = $signature = TRUE;
}

if (1 && checkSignature($http_header, $signature)) {
        http_response_code(200);
        header("HTTP/1.1 200");
        header("Connection: Close");
//        http_response_code(400);
//        header("HTTP/1.1 404 Not Found");
        include(dirname(__FILE__).'/LineKeyWord.php');
}else{
    http_response_code(400);
    header("HTTP/1.1 404 Not Found");
    header("Connection: Close");
    exit;
}

?>