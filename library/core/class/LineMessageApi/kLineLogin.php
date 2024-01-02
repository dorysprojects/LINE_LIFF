<?php

/*
 *  Line Message 2021 by Ricky
 */

class kLineLogin {
    public $RequestData;
    private $RedirectUrl;
    private $client_id = __LineLoginlID;
    private $client_secret = __LineLoginSecret;
    
    function __construct() {
	    $this->RedirectUrl = __CustomStickers_Web . '/ft/LineLoginRedirect';
    }
    
    function Authorization($query=NULL, $data=array(), $bot_prompt='aggressive') {
        if(!empty($query)){
            $this->RequestData['response_type'] = 'code';
            $this->RequestData['client_id'] = $this->client_id;
            $this->RequestData['redirect_uri'] = $this->RedirectUrl;
            $this->RequestData['state'] = __DOMAIN;
            $this->RequestData['scope'] = 'openid profile phone email';// phone email、%20
            $this->RequestData['bot_prompt'] = $bot_prompt; //normal, aggressive 
            $_SESSION['redirect'] = __CustomStickers_Web . '/ft/' . $query;
            $_SESSION['data'] = json_encode($data);
            
            return 'https://access.line.me/oauth2/v2.1/authorize?' . http_build_query($this->RequestData);
        }
    }
    
    function GetAccessToken($code = NULL) {
        /*
         * $GetAccessToken['error']
         * $GetAccessToken['error_description']
         * $GetAccessToken['access_token'] 訪問令牌。有效期為30天。
         * $GetAccessToken['expires_in'] 訪問令牌到期的時間（以秒為單位）。
         * $GetAccessToken['id_token'] 包含有關用戶信息的JSON Web令牌（JWT）。
         * $GetAccessToken['refresh_token'] 用於獲取新的訪問令牌。有效期至訪問令牌到期後10天。
         * $GetAccessToken['scope'] 用戶授予的權限
         * $GetAccessToken['token_type'] Bearer
         */
        if($code){
            $this->RequestData['grant_type'] = 'authorization_code';
            $this->RequestData['code'] = $code;
            $this->RequestData['redirect_uri'] = $this->RedirectUrl;
            $this->RequestData['client_id'] = $this->client_id;
            $this->RequestData['client_secret'] = $this->client_secret;
            
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.line.me/oauth2/v2.1/token',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded",
                ),
                CURLOPT_POSTFIELDS => http_build_query($this->RequestData),
            ));
            $response_jsonTmp = curl_exec($curl);
            $GetAccessToken = json_decode($response_jsonTmp, true);
            $err = curl_error($curl);
            curl_close($curl);
            
            if($GetAccessToken['id_token']){
                $id_token = explode('.', $GetAccessToken['id_token']);
                $JWT_HEADER = $id_token[0];
                $JWT_PAYLOAD = $id_token[1];
                $JWT_signature = $id_token[2];
                $JWT_signature_decode = base64url_decode($JWT_signature);
                $JWT_hmac_signature_decode = hash_hmac('sha256', $JWT_HEADER . "." . $JWT_PAYLOAD, $this->client_secret, true);

                if (empty($GetAccessToken['error']) && empty($GetAccessToken['error_description']) && !empty($JWT_hmac_signature_decode)) {
                    if($JWT_signature_decode==$JWT_hmac_signature_decode){
                        if(!empty($GetAccessToken['access_token'])){
                            $_SESSION[__DOMAIN.'line_access_token'] = $GetAccessToken['access_token'];
                            $_SESSION[__DOMAIN.'line_refresh_token'] = $GetAccessToken['refresh_token'];
                            $_SESSION[__DOMAIN.'line_id_token'] = $GetAccessToken['id_token'];
                        }
                    }
                }
            }
        }
    }
    
    function RefreshAccessToken() {
        $this->RequestData['grant_type'] = 'refresh_token';
        $this->RequestData['refresh_token'] = $_SESSION[__DOMAIN.'line_refresh_token'];
        $this->RequestData['client_id'] = $this->client_id;
        $this->RequestData['client_secret'] = $this->client_secret;
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.line.me/oauth2/v2.1/token/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
            ),
            CURLOPT_POSTFIELDS => http_build_query($this->RequestData),
        ));
        $response_jsonTmp = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if($err){
            return json_decode($err, true);
        }else{
            $response_json = json_decode($response_jsonTmp, true);//access_token、token_type、refresh_token、expires_in、scope
            $_SESSION[__DOMAIN.'line_access_token'] = $response_json['access_token'];
            $_SESSION[__DOMAIN.'line_refresh_token'] = $response_json['refresh_token'];
            $_SESSION[__DOMAIN.'line_id_token'] = $response_json['id_token'];
            return $response_json;
        }
    }
    
    function RemoveAccessToken() {
        $this->RequestData['access_token'] = $_SESSION[__DOMAIN.'line_access_token'];
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.line.me/v2.1/oauth/revoke',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Content-Type:application/x-www-form-urlencoded",
            ),
            CURLOPT_POSTFIELDS => http_build_query($this->RequestData),
        ));
        $response_jsonTmp = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        if ($httpcode == '200' && !$response_jsonTmp) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function Verify() {
        if($_SESSION[__DOMAIN.'line_access_token']){
            $this->RequestData['access_token'] = $_SESSION[__DOMAIN.'line_access_token'];
            
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.line.me/v2/oauth/verify?access_token=' . $_SESSION[__DOMAIN.'line_access_token'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type:application/x-www-form-urlencoded",
                ),
                CURLOPT_POSTFIELDS => http_build_query($this->RequestData)
            ));
            $response_jsonTmp = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            
            if($err){
                return json_decode($err, true);
            }else{
                $response_json = json_decode($response_jsonTmp, true);
                if (!empty($response_json['client_id']) && $response_json['client_id']!=$this->client_id) {
                    $this->RemoveAccessToken($_SESSION[__DOMAIN.'line_access_token']);
                    $_SESSION[__DOMAIN.'line_access_token'] = NULL;
                    $_SESSION[__DOMAIN.'line_refresh_token'] = NULL;
                    $_SESSION[__DOMAIN.'line_id_token'] = NULL;
                    return $response_json;
                } else {
                    return true;
                }
            }
        }else{
            return false;
        }
    }
    
    function friendFlag(){
        if($_SESSION[__DOMAIN.'line_access_token']){
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.line.me/friendship/v1/status' ,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer " . $_SESSION[__DOMAIN.'line_access_token'],
                )
            ));
            $response_jsonTmp = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            
            if($err){
                return json_decode($err, true);
            }else{
                return json_decode($response_jsonTmp, true);
            }
        }else{
            return false;
        }
    }
    
    function Profile() {
        if($_SESSION[__DOMAIN.'line_access_token']){
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.line.me/v2/profile',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer " . $_SESSION[__DOMAIN.'line_access_token'],
                )
            ));
            $response_jsonTmp = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            
            if($err){
                return json_decode($err, true);
            }else{
                return json_decode($response_jsonTmp, true);
            }
        }else{
            return false;
        }
    }
    
}

function encode($data) {
    return str_replace(['+', '/'], ['-', '_'], base64_encode($data));
}

function base64url_encode($plainText) {
    $base64 = base64_encode($plainText);
    return strtr($base64, '+/=', '-_,');
}

function base64url_decode($plainText) {
    $base64url = strtr($plainText, '-_,', '+/=');
    return base64_decode($base64url);
}
