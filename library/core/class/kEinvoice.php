<?php

class kEinvoice {

    private $domain = 'https://api.einvoice.nat.gov.tw';
    private $folder = 'PB2CAPIVAN';
    private $url = '';
    private $appID = 'EINV6202008120085';
    private $key = 'UUhRS1NreDRHU2QyTHZ5bQ==';
    private $uuid = 'TAIPEIADS';
    private $timeStamp = 0;
    private $expTime = 30000; //ms

    function __construct() {
        $this->url = $this->domain . '/' . $this->folder;
        $this->timeStamp = time() + 10;
        $this->expTimeStamp = ($this->timeStamp + $this->expTime);
    }

    function QryWinningList($_INPUT = NULL) {
        $_QUERY = array(
            'version' => '0.2', //*必填
            'action' => __FUNCTION__, //*必填
            'invTerm' => $_INPUT['invTerm'], //*必填
            //'UUID' => $this->uuid, //
            'appID' => $this->appID//*必填
        );
        ksort($_QUERY);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . "/invapp/InvApp",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($_QUERY),
            //CURLOPT_POSTFIELDS => "version=0.2&action=QryWinningList&invTerm=10906&appID=EINV6202008120085",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            $response = $err;
        }
        return json_decode($response, true);
    }

    function qryInvDetail($_INPUT = NULL) {
        $_QUERY = array(
            'version' => '0.5', //*必填
            'type' => !empty($_INPUT['type']) ? $_INPUT['type'] : 'Barcode', //*必填，Barcode、QRCode
            'invNum' => $_INPUT['invNum'], //*必填
            'action' => __FUNCTION__, //*必填
            'generation' => 'V2', //*必填
            'invTerm' => $_INPUT['invTerm'], //Barcode時，*必填
            'invDate' => $_INPUT['invDate'], //*必填
            'encrypt' => $_INPUT['encrypt'], //QRCode時，*必填
            'sellerID' => $_INPUT['sellerID'], //QRCode時，*必填
            'UUID' => $this->uuid, //*必填
            'randomNumber' => $_INPUT['randomNumber'], //*必填
            'appID' => $this->appID//*必填
        );
        ksort($_QUERY);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . "/invapp/InvApp",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($_QUERY),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            $response = $err;
        }
        return json_decode($response, true);
    }

    function carrierInvChk($_INPUT = NULL) {
        $_QUERY = array(
            'version' => '0.5', //*必填
            'cardType' => $_INPUT['cardType'], //*必填，卡別
            'cardNo' => $_INPUT['cardNo'], //*必填，手機條碼/卡片(載具)隱碼【載具號碼】
            'expTimeStamp' => $this->expTimeStamp, //*必填，有效存續時間戳記
            'action' => __FUNCTION__, //*必填
            'timeStamp' => $this->timeStamp, //*必填，時間戳記
            'startDate' => $_INPUT['startDate'], //*必填，詢起始時間 (y/M/d)
            'endDate' => $_INPUT['endDate'], //*必填，查詢結束時間 (y/M/d)
            'onlyWinningInv' => !empty($_INPUT['onlyWinningInv']) ? $_INPUT['onlyWinningInv'] : 'N', //*必填，Y/N
            'uuid' => $this->uuid, //*必填
            'appID' => $this->appID, //*必填
            'cardEncrypt' => $_INPUT['cardEncrypt'], //*必填，手機條碼驗證碼/卡片(載具)驗證碼【載具密碼】
        );
        ksort($_QUERY);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . "/invServ/InvServ",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($_QUERY),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            $response = $err;
        }
        return json_decode($response, true);
    }

    function carrierInvDetail($_INPUT = NULL) {
        $_QUERY = array(
            'version' => '0.5', //*必填
            'cardType' => $_INPUT['cardType'], //*必填，卡別
            'cardNo' => $_INPUT['cardNo'], //*必填，手機條碼/卡片(載具)隱碼【載具號碼】
            'expTimeStamp' => $this->expTimeStamp, //*必填，有效存續時間戳記
            'action' => __FUNCTION__, //*必填
            'timeStamp' => $this->timeStamp, //*必填，時間戳記
            'invNum' => $_INPUT['invNum'], //*必填，發票號碼
            'invDate' => $_INPUT['invDate'], //*必填，發票日期 (y/M/d)
            'uuid' => $this->uuid, //*必填
            'sellerName' => $_INPUT['sellerName'], //開立賣方名稱
            'amount' => $_INPUT['amount'], //金額 
            'appID' => $this->appID, //*必填
            'cardEncrypt' => $_INPUT['cardEncrypt'], //*必填，手機條碼驗證碼/卡片(載具)驗證碼【載具號碼】
        );
        ksort($_QUERY);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . "/invServ/InvServ",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($_QUERY),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            $response = $err;
        }
        return json_decode($response, true);
    }

    function qryCarrierAgg($_INPUT = NULL) {
        $_QUERY = array(
            'version' => '1.0', //*必填
            'serial' => $_INPUT['serial'], //*必填，傳送時的序號
            'action' => __FUNCTION__, //*必填
            'cardType' => $_INPUT['cardType'], //*必填，卡別
            'cardNo' => $_INPUT['cardNo'], //*必填，手機條碼/卡片(載具)隱碼【載具號碼】
            'cardEncrypt' => $_INPUT['cardEncrypt'], //*必填，手機條碼驗證碼/卡片(載具)驗證碼【載具號碼】
            'appID' => $this->appID, //*必填
            'timeStamp' => $this->timeStamp, //*必填，時間戳記
            'uuid' => $this->uuid, //*必填
        );
        ksort($_QUERY);
        /*
         * 此區未完成
         */
        $signature = base64_encode(hash_hmac('sha256', http_build_query($_QUERY), $this->key)); //*必填，簽名
        $_QUERY['signature'] = $signature;
//        return $_QUERY;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . "/Carrier/Aggregate",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($_QUERY),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            $response = $err;
        }
        return json_decode($response, true);
    }
    
    /*
     * https://github.com/wade0926/qr_code/blob/master/wade_test_qr_code.php
     */
    function TurnQrCode($_INPUT=NULL, $BGcolor=array(255,255,255)) {
        $invDateTmp = explode('-', date('Y-m-d', strtotime($_INPUT['invDate'])));
        $invDate = ($invDateTmp[0]*1-1911) . $invDateTmp[1] . $invDateTmp[2];
        $buyerBan = !empty($_INPUT['buyerBan']) ? $_INPUT['buyerBan'] : '00000000';
        $encrypt = (1&& !empty($_INPUT['encrypt'])) ? $_INPUT['encrypt'] : $this->aes_encryption($_INPUT['invNum'] . $_INPUT['randomNumber'], aes_key);
        $valid_record_amount = count($_INPUT['details']);//0
        $barcode_data = $_INPUT['invTerm'] . $_INPUT['invNum'] . $_INPUT['randomNumber'];
        $right_code_data = '**';
        $left_code_item = '';
        $TotalAmount = 0;
        if ($_INPUT['details']) {
            foreach ($_INPUT['details'] as $key => $item) {
                $TotalAmount += $item['amount']*1;
                if ($item) {
                    foreach ($item as $itemKey => $itemValue) {
                        $item[$itemKey] = str_replace(':', '：', $itemValue);
                    }
                    if ($key === 0) {
                        $left_code_item .= ':'.$item['description'] . ':'.$item['quantity'] . ':'.$item['unitPrice'];
                    } else {
                        $right_code_data .= ':'.$item['description'] . ':'.$item['quantity'] . ':'.$item['unitPrice'];
                    }
                }
            }
        }
        $price = (0) ? substr('00000000' . dechex($TotalAmount), -8) : '00000000'; //十六進位，補0至8碼，銷售額
        $totalPrice = substr('00000000' . dechex($TotalAmount), -8); //十六進位，補0至8碼，總計金額
        $left_code_data = $_INPUT['invNum'] . $invDate . $_INPUT['randomNumber'] . $price . $totalPrice . $buyerBan . $_INPUT['sellerBan'] . $encrypt;
        $left_code_data .= !empty($_INPUT['free_area']) ? $_INPUT['free_area'] : '**********'; //營業人自行放置所需資訊，若不使用則以10個"*"符號
        $left_code_data .= ':' . $valid_record_amount . ':' . count($_INPUT['details']) . ':' . 1 . $left_code_item;//) Big5 編碼，則此值為 0、UTF-8 編碼，則此值為 1、Base64 編碼，則此值為 2
        
        return array(
            "barcode" => $this->generate_bar_code($barcode_data),
            "left" => $this->generate_qr_code($left_code_data, $BGcolor),
            "right" => $this->generate_qr_code($right_code_data, $BGcolor),
        );
    }

    /*
     * AES 加密
     */
    function aes_encryption($sStr, $sKey=NULL) {
        if($sKey!='' && $sKey!=NULL && $sKey!='aes_key'){
            $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
            $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
            return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $sKey, $sStr, MCRYPT_MODE_ECB, $iv));
        }else{
           return ''; 
        }
    }
    
    /*
     * 產生QrCode
     */
    function generate_qr_code($data='**', $BGcolor=NULL) {
        return __CustomStickers_Web . '/ft/CodeImg?type=qrcode&v=' . date('YmdHis') . '&text=' . urlencode($data) . '&BGcolor=' . urlencode(json_encode($BGcolor));
//        return 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&choe=UTF-8&chl=' . urlencode($data);
    }
    
    /*
     * 產生BarCode
     */
    function generate_bar_code($data){
        return __CustomStickers_Web . '/ft/CodeImg?type=barcode&v=' . date('YmdHis') . '&text=' . urlencode($data);
//        return 'https://www.scandit.com/wp-content/themes/scandit/barcode-generator.php?symbology=code39&ec=L&size=50&value=' . urlencode($data);
    }

}

?>