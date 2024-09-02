<?php

/**
 * 文件：https://developers.ecpay.com.tw/?p=7896
 */

class Invoice {
    private $systemMode = NULL;
    private $HashKey = '';
    private $HashIV = '';
    private $MerchantID = '';
    private $RelateNumber = '';
    private $url = '';
    private $DBO_shopcar = NULL;
    private $DBO_shopcar_details = NULL;
    private $DBO_orderDetails = NULL;
    private $DBO_invoiceLog = NULL;

    public $openFlag = false;
    public $query = array();

    public function __construct() {
        $this->setDefault();
    }

    private function setDefault(){
        $this->DBO_shopcar = new kSQL('shopcar');
        $this->DBO_orderDetails = new kSQL('orderDetails', array('checkTableExist'=>true));
        $this->DBO_invoiceLog = new kSQL('invoiceLog', array('checkTableExist'=>true));
        $invoiceSetting = $this->DBO_shopcar->SetAction('subject')
            ->SetWhere("tablename='invoiceSetting'")
            ->SetWhere("next='myself'")
            ->SetWhere("propertyA='ecpay'")
            ->SetOrder('id DESC')
            ->BuildQuery();
        if(!empty($invoiceSetting) && !empty($invoiceSetting[0]['subject']['storeId'])){
            $this->openFlag = $invoiceSetting[0]['viewA']=='on';
            $this->MerchantID = $invoiceSetting[0]['subject']['storeId'];
            $this->HashKey = $invoiceSetting[0]['subject']['hashKey'];
            $this->HashIV = $invoiceSetting[0]['subject']['hashIV'];
            $this->systemMode = ($invoiceSetting[0]['subject']['is_sandbox']=='off') ? 'online' : 'sandbox';
        }else{
            $this->openFlag = false;
            $this->MerchantID = '2000132';
            $this->HashKey = 'ejCk326UnaZWKisg';
            $this->HashIV = 'q9jcZX8Ib9LM8wYk';
            $this->systemMode = 'sandbox';
        }
    }

    public function checkInvalidOrAllowance($invoiceDate, $type='month'){
        $status = '';
        $invoiceYear = date('Y', strtotime($invoiceDate));
        $invoiceMonth = date('m', strtotime($invoiceDate));
        $currentYear = date("Y");
        $currentMonth = date("m");
        $invTermList = array(
            "01" => "02",
            "02" => "02",
            "03" => "04",
            "04" => "04",
            "05" => "06",
            "06" => "06",
            "07" => "08",
            "08" => "08",
            "09" => "10",
            "10" => "10",
            "11" => "12",
            "12" => "12",
        );
        switch ($type) {
            case 'period':
                $status = ($invoiceYear==$currentYear && $invTermList[$invoiceMonth]==$invTermList[$currentMonth]) ? 'Invalid' : 'Allowance';
                break;
            case 'month':
                $status = ($invoiceYear.$invoiceMonth == $currentYear.$currentMonth) ? 'Invalid' : 'Allowance';
                break;
        }
        return $status;
    }

    public function sendInvoiceRequest($type, $order, $parameter=array()){
        if($this->openFlag){
            $this->url = ($this->systemMode=='online')
                                ? 'https://einvoice.ecpay.com.tw/B2CInvoice/'.$type
                                : 'https://einvoice-stage.ecpay.com.tw/B2CInvoice/'.$type;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($this->setInvoiceData($type, $order, $parameter)),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));
            $responseJson = curl_exec($curl);
            $response = !empty($responseJson) ? json_decode($responseJson, true) : array();
            if (curl_errno($curl)==28 || ((!empty($response))&&$response['TransCode']!='1')) {
                $responseJson = curl_exec($curl);
                $response = !empty($responseJson) ? json_decode($responseJson, true) : array();
            }
            $this->processInvoiceLog($type, $order, $response);
            curl_close($curl);
            return $response;
        }
    }

    private function setInvoiceData($type, $order, $parameter=array()){
        $data = array();
        if(in_array($type, array('Issue', 'Allowance'))){
            include_once __LIB.'/core/class/modules/line_member/fieldsForm.php';
            $fieldsForm = new fieldsForm();
            $typeFields = $fieldsForm->getFieldByType($order['propertyA'], array(
                'mobile',
                'email',
            ));
        }
        switch ($type) {
            case 'Issue'://開立發票
                $data = array(
                    'MerchantID ' => (string) $this->MerchantID,//特店編號 [String(10)]
                    'RelateNumber' => $this->produceRelateNumber($order['propertyB']),//*(唯一值)特店自訂編號 [String(30)]
                    'CustomerPhone' => $typeFields['mobile'],//*客戶手機號碼 [String(20)]
                    'CustomerEmail' => $typeFields['email'],//*客戶電子信箱 [String(80)]
                    'Print' => '0',//*列印註記 [String(1)]
                    'Donation' => '0',//*捐贈註記 [String(1)]
                    'CarrierType' => '',//*載具類別 [String(1)]
                    'CarrierNum' => '',//*載具編號 [String(64)]
                    'TaxType' => '1',//*課稅類別 [String(1)]
                    'SalesAmount' => $order['content']['ProductsTotalsPrice'] + $order['content']['PayMethodPrice'] + $order['content']['ShipPrice'],//*發票金額 [Int]
                    'InvType' => '07',//*字軌類別 [String(2)]
                    'Items' => $this->getShopcarDetails($order),//*商品資訊 [Array]
                );
                break;
            case 'Invalid'://作廢發票
                $data = array(
                    'MerchantID' => (string) $this->MerchantID,//*特店編號 [String(10)]
                    'InvoiceNo' => $order['prev4'],//*發票號碼 [String(10)]
                    'InvoiceDate' => $order['subject']['invoiceDate'],//*發票日期 [String(10)]
                    'Reason' => '作廢',//*作廢原因 [String(20)]
                );
                break;
            case 'Allowance'://折讓發票
                if(!empty($typeFields['email']) && !empty($typeFields['mobile'])){
                    $AllowanceNotify = 'A';//皆通知
                }else if(!empty($typeFields['email'])){
                    $AllowanceNotify = 'E';//電子郵件
                }else if(!empty($typeFields['mobile'])){
                    $AllowanceNotify = 'S';//簡訊
                }else{
                    $AllowanceNotify = 'N';//皆不通知
                }
                $data = array(
                    'MerchantID' => (string) $this->MerchantID,//*特店編號 [String(10)]
                    'InvoiceNo' => $order['prev4'],//*發票號碼 [String(10)]
                    'InvoiceDate' => $order['subject']['invoiceDate'],//*發票日期 [String(10)]
                    'AllowanceNotify' => $AllowanceNotify,//*通知類別 [String(1)]
                    'NotifyMail' => $typeFields['email'],//通知電子信箱 [String(100)]
                    'NotifyPhone' => $typeFields['mobile'],//通知手機號碼 [String(20)]
                    'AllowanceAmount' => $order['totalPrice'],//*折讓金額 [Int]
                    'Items' => $this->getShopcarDetails($order),//*商品資訊 [Array]
                );
                break;
            case 'GetIssue'://查詢開立發票明細
                $data = array(
                    'MerchantID' => (string) $this->MerchantID,//*特店編號 [String(10)]
                    'RelateNumber' => $parameter['RelateNumber'],//*(唯一值)特店自訂編號 [String(30)]
                );
                break;
            case 'GetInvalid'://查詢作廢發票明細
                $data = array(
                    'MerchantID' => (string) $this->MerchantID,//*特店編號 [String(10)]
                    'RelateNumber' => $parameter['RelateNumber'],//*(唯一值)特店自訂編號 [String(30)]
                    'InvoiceNo' => $order['prev4'],//*發票號碼 [String(10)]
                    'InvoiceDate' => $order['subject']['invoiceDate'],//*發票日期 [String(10)]
                );
                break;
            case 'GetAllowanceList'://查詢折讓發票明細(多筆)
                $data = array(
                    'MerchantID' => (string) $this->MerchantID,//*特店編號 [String(10)]
                    'SearchType' => '0',//*查詢方式 [String(1)]
                    'AllowanceNo' => $parameter['AllowanceNo'],//*折讓編號 [String(10)]
                );
                break;
        }
        return $this->query = array(
            'MerchantID' => (string) $this->MerchantID,//特店編號 [String(10)]
            'RqHeader' => array(
                'Timestamp' => time(),//時間戳記 [Int(10)]
            ),
            'Data' => $this->encrypt($data),
        );
    }

    private function insertInvoiceLog($type, $order, $invoice, $DBO){
        $invoiceData = $this->decrypt($invoice['Data']);
        $success = ($invoice['TransCode']=='1' && $invoiceData['RtnCode']=='1');
        $DBO->put('prev', $order['node'])
            ->put('viewA', $invoice['TransCode'])
            ->put('viewB', $invoiceData['RtnCode'])
            ->put('prev1', $order['propertyB'])
            ->put('update_at', $DBO->getNowTime());
        if($DBO->DBtable == 'invoiceLog'){
            $DBO->put('subject/query', json_encode($this->query))//POST data
                ->put('subject/queryData', json_encode($this->decrypt($this->query['Data'])))
                ->put('content/invoiceJson', json_encode($invoice))
                ->put('content/invoiceData', json_encode($invoiceData));
        }
        $invoiceStatus = '';
        $next = $type;
        switch($type){
            case 'Issue'://開立發票
                $invoiceStatus = 'invoiced';
                $success = ($success && $invoiceData['InvoiceNo']);
                $DBO->put('prev2', !empty($invoiceData['InvoiceNo']) ? $invoiceData['InvoiceNo'] : $order['prev4'])//發票號碼
                    ->put('prev3', $invoiceData['RandomNumber'])//發票隨機碼
                    ->put('propertyA', $invoiceData['InvoiceDate']);//發票日期
                break;
            case 'Invalid'://作廢發票
                $invoiceStatus = 'void';
                $success = ($success && $invoiceData['InvoiceNo']);
                $DBO->put('prev2', !empty($invoiceData['InvoiceNo']) ? $invoiceData['InvoiceNo'] : $order['prev4']);//發票號碼
                break;
            case 'Allowance'://折讓發票
                $invoiceStatus = 'discount';
                $success = ($success && $invoiceData['IA_Invoice_No']);
                $DBO->put('prev2', !empty($invoiceData['IA_Invoice_No']) ? $invoiceData['IA_Invoice_No'] : $order['prev4'])//發票號碼
                    ->put('propertyA', $invoiceData['IA_Date'])//折讓日期
                    ->put('propertyB', $invoiceData['IA_Allow_No'])//折讓號碼
                    ->put('propertyC', $invoiceData['IA_Invoice_No'])//折讓發票號碼
                    ->put('sortB', $invoiceData['IA_Remain_Allowance_Amt']);//剩餘折讓金額
                break;
            case 'GetIssue'://查詢開立發票明細
                $DBO->put('prev2', !empty($invoiceData['IIS_Number']) ? $invoiceData['IIS_Number'] : $order['prev4'])//發票號碼
                    ->put('subject/IIS_Issue_Status', $invoiceData['IIS_Issue_Status'])//發票開立狀態
                    ->put('subject/IIS_Upload_Status', $invoiceData['IIS_Upload_Status'])//發票上傳狀態
                    ->put('subject/IIS_Turnkey_Status', $invoiceData['IIS_Turnkey_Status'])//發票上傳後接收狀態
                    ->put('subject/IIS_Invalid_Status', $invoiceData['IIS_Invalid_Status'])//發票作廢狀態
                    ->put('propertyB', $invoiceData['IIS_Upload_Date'])//發票上傳時間
                    ->put('sortB', $invoiceData['IIS_Remain_Allowance_Amt']);//剩餘折讓金額
                break;
            case 'GetInvalid'://查詢作廢發票明細
                $DBO->put('prev2', !empty($invoiceData['II_Invoice_No']) ? $invoiceData['II_Invoice_No'] : $order['prev4'])//發票號碼
                    ->put('propertyA', $invoiceData['II_Date'])//作廢時間
                    ->put('subject/II_Upload_Status', $invoiceData['II_Upload_Status'])//作廢上傳狀態
                    ->put('propertyB', $invoiceData['II_Upload_Date'])//作廢上傳時間
                    ->put('propertyC', $invoiceData['Reason']);//作廢原因
                break;
            case 'GetAllowanceList'://查詢折讓發票明細
                $next = 'GetAllowance';
                $allowanceInfo = $invoiceData['AllowanceInfo'][0];
                $DBO->put('prev2',  !empty($allowanceInfo['IA_Invoice_No']) ? $allowanceInfo['IA_Invoice_No'] : $order['prev4'])//發票號碼
                    ->put('propertyA', $allowanceInfo['IA_Date'])//折讓時間
                    ->put('propertyB', $allowanceInfo['IA_Allow_No'])//折讓單號
                    ->put('propertyC', $allowanceInfo['IA_Upload_Date'])//折讓上傳時間
                    ->put('subject/IA_Upload_Status', $allowanceInfo['IA_Upload_Status'])//折讓上傳狀態
                    ->put('subject/IA_Invalid_Status', $allowanceInfo['IA_Invalid_Status']);//折讓作廢狀態
                break;
        }
        if($success && $DBO->DBtable=='orderDetails'){
            $log = $DBO->select('subject')
                    ->where("next='$next'")
                    ->where("viewC='success'")
                    ->where("prev1='{$order['propertyB']}'")
                    ->where("prev2='{$order['prev4']}'")
                    ->getData('id');
        }
        if(!empty($log[0]['id'])){
            $DBO->action('update')
                ->put('id', $log[0]['id']);
        }else{
            $DBO->action('insert')
                ->put('tablename', 'invoice')
                ->put('next', $next)
                ->put('node', $DBO->getNodeKey())
                ->put('create_at', $DBO->getNowTime())
                ->put('sortA', $DBO->getSystem('count'))
                ->put('viewC', $success ? 'success' : 'fail')
                ->put('viewD', 'wait');//尚未查詢
        }
        $insertState = $DBO->save();
        return array($insertState, $success, $invoiceStatus, $invoiceData, $allowanceInfo);
    }

    private function processInvoiceLog($type, $order, $invoice){
        list($insertState, $success, $invoiceStatus, $invoiceData, $allowanceInfo) = $this->insertInvoiceLog($type, $order, $invoice, $this->DBO_invoiceLog);
        if($insertState && $success){
            $this->insertInvoiceLog($type, $order, $invoice, $this->DBO_orderDetails);
            if(in_array($type, array('Issue', 'Invalid', 'Allowance'))){
                $this->DBO_shopcar->action('update')
                    ->put('id', $order['id'])
                    ->put('prev1', $invoiceStatus, !empty($invoiceStatus)) //發票狀態[未開立(notInvoiced)、已開立(invoiced)、作廢(void)、折讓(discount)]
                    ->put('update_at', $this->DBO_shopcar->getNowTime());
                switch ($type) {
                    case 'Issue':
                        $this->DBO_shopcar->put('prev4', $invoiceData['InvoiceNo']) //發票號碼
                                        ->put('subject/invoiceRandomNumber', $invoiceData['RandomNumber']) //發票隨機碼
                                        ->put('subject/invoiceDate', $invoiceData['InvoiceDate']) //發票開立日期
                                        ->put('subject/invoiceRelateNumber', $this->RelateNumber); //特店自訂編號
                        break;
                    case 'Invalid':
                        $this->DBO_shopcar->put('subject/invoiceInvalidDate', date("Y-m-d H:i:s")); //作廢日期
                        break;
                    case 'Allowance':
                        $this->DBO_shopcar->put('subject/invoiceAllowanceDate', $invoiceData['IA_Date']) //[最後]折讓日期
                                        ->put('subject/invoiceAllowanceNumber', $invoiceData['IA_Allow_No']) //[最後]折讓號碼
                                        ->put('sortB', $invoiceData['IA_Remain_Allowance_Amt']); //折讓剩餘金額
                        break;
                }
                $this->DBO_shopcar->save();
            }
        }
    }

    public function updateInvoiceInfo($row, $invoice, $DBO_orderDetails){
        $invoiceData = $this->decrypt($invoice['Data']);
        $success = ($invoice['TransCode']=='1' && $invoiceData['RtnCode']=='1');
        if($success){
            $DBO_orderDetails->action('update')
                                    ->put('id', $row['id'])
                                    ->put('viewD', 'success')//查詢成功
                                    ->put('update_at', $DBO_orderDetails->getNowTime());
            switch($row['next']){
                case 'Issue'://查詢開立發票明細
                    $DBO_orderDetails
                                ->put('subject/customerName', $invoiceData['IIS_Customer_Name']) //客戶名稱
                                ->put('subject/invoiceDate', $invoiceData['IIS_Create_Date'])//發票開立時間
                                ->put('subject/invoiceIssueStatus', $invoiceData['IIS_Issue_Status'])//發票開立狀態
                                ->put('subject/invoiceInvalidStatus', $invoiceData['IIS_Invalid_Status']) //發票作廢狀態
                                ->put('subject/invoicedUploadStatus', $invoiceData['IIS_Upload_Status']) //發票上傳狀態
                                ->put('subject/invoicedUploadDate', $invoiceData['IIS_Upload_Date']) //發票上傳時間
                                ->put('subject/invoiceTurnkeyStatus', $invoiceData['IIS_Turnkey_Status']) //發票上傳後接收狀態
                                ->put('sortB', $invoiceData['IIS_Remain_Allowance_Amt']); //V折讓剩餘金額
                    break;
                case 'Invalid'://查詢作廢發票明細
                    $DBO_orderDetails
                                ->put('subject/invoiceInvalidDate', $invoiceData['II_Date']) //作廢時間
                                ->put('subject/invoiceInvalidUploadDate', $invoiceData['II_Upload_Date']) //作廢上傳時間
                                ->put('subject/invoiceInvalidUploadStatus', $invoiceData['II_Upload_Status']); //作廢上傳狀態
                    break;
                case 'Allowance'://查詢折讓發票明細
                    $allowanceInfo = $invoiceData['AllowanceInfo'][0];
                    $DBO_orderDetails
                                ->put('subject/customerName', $allowanceInfo['IIS_Customer_Name']) //客戶名稱
                                ->put('subject/invoiceAllowanceNumber', $allowanceInfo['IA_Allow_No']) //V折讓單號
                                ->put('subject/invoiceAllowanceDate', $allowanceInfo['IA_Date']) //V折讓時間
                                ->put('subject/invoiceAllowanceUploadDate', $allowanceInfo['IA_Upload_Date']) //折讓上傳時間
                                ->put('subject/invoiceAllowanceUploadStatus', $allowanceInfo['IA_Upload_Status']); //折讓上傳狀態
                    break;
            }
            $DBO_orderDetails->save();
        }else if($row['create_at'] < date('Y-m-d H:i:s', strtotime('-5 day'))){//最多查詢3天(2~5天)
            $DBO_orderDetails
                            ->action('update')
                            ->put('id', $row['id'])
                            ->put('viewD', 'fail')//查詢失敗
                            ->save();
        }
    }

    private function getShopcarDetails($order){
        $this->DBO_shopcar_details = new kSQL('shopcar_details');
        $rows = $this->DBO_shopcar_details->SetAction('subject')
                                            ->SetWhere("prev='{$order['node']}'")
                                            ->SetLimit('all')
                                            ->BuildQuery();
        $products = array();
        $itemNo = 1;
        if(!empty($rows)){
            foreach ($rows as $row) {
                $products[] = array(
                    'ItemSeq' => $itemNo,//*商品序號 [Int]
                    'ItemName' => $row['subject']['subject'],//*商品名稱 [String(100)]
                    'ItemCount' => (int) $row['sortB'],//*商品數量 [Int]
                    'ItemWord' => '項',//單位 [String(6)]
                    'ItemPrice' => (int) $row['propertyE'],//*商品價格 [Int]
                    'ItemAmount' => $row['propertyE'] * $row['sortB'],//*商品合計 [Int]
                );
                $itemNo++;
            }
        }
        if(!empty($order['content']['PayMethodPrice'])){
            $products[] = array(
                'ItemSeq' => $itemNo,//*商品序號 [Int]
                'ItemName' => '手續費',//*商品名稱 [String(100)]
                'ItemCount' => 1,//*商品數量 [Int]
                'ItemWord' => '筆',//單位 [String(6)]
                'ItemPrice' => (int) $order['content']['PayMethodPrice'],//*商品價格 [Int]
                'ItemAmount' => (int) $order['content']['PayMethodPrice'],//*商品合計 [Int]
            );
            $itemNo++;
        }
        if(!empty($order['content']['ShipPrice'])){
            $products[] = array(
                'ItemSeq' => $itemNo,//*商品序號 [Int]
                'ItemName' => '運費',//*商品名稱 [String(100)]
                'ItemCount' => 1,//*商品數量 [Int]
                'ItemWord' => '筆',//單位 [String(6)]
                'ItemPrice' => (int) $order['content']['ShipPrice'],//*商品價格 [Int]
                'ItemAmount' => (int) $order['content']['ShipPrice'],//*商品合計 [Int]
            );
            $itemNo++;
        }
        return $products;
    }

    private function produceRelateNumber($orderID){
        $this->RelateNumber = $this->MerchantID . $orderID;//time()
        return $this->RelateNumber;
    }

    // AES 加密
    public function encrypt($source) {
        $dataBase64Encode = '';
        $jsonEncoded = json_encode($source);
        $urlEncoded = urlencode($jsonEncoded);
        $encrypted = openssl_encrypt(
            $urlEncoded,
            'AES-128-CBC',
            $this->HashKey,
            OPENSSL_RAW_DATA,
            $this->HashIV
        );
        $dataBase64Encode = base64_encode($encrypted);
        return $dataBase64Encode;
    }

    // AES 解密
    public function decrypt($source) {
        $jsonDecoded = [];
        $base64Decoded = base64_decode($source);
        $decrypted = openssl_decrypt(
            $base64Decoded,
            'AES-128-CBC',
            $this->HashKey,
            OPENSSL_RAW_DATA,
            $this->HashIV
        );
        $urlDecoded = urldecode($decrypted);
        $jsonDecoded = json_decode($urlDecoded, true);
        return $jsonDecoded;
    }

}