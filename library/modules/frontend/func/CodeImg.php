<?php

if($_GET){
    switch ($_GET['type']) {
        case 'barcode':
            if($_GET['text']){
                require_once __PLUGIN . '/TCPDF/tcpdf_barcodes_1d.php';
                $barcodeobj = new TCPDFBarcode($_GET['text'], 'C39');
                echo $barcodeobj->getBarcodePNG(1, 40, array(0,0,0));
            }
            break;
        case 'qrcode':
        default:
            switch ($_GET['action']) {
                case 'read':
                    if($_GET['url']){
                        /*
                         * https://zxing.org/w/decode.jspx
                         * https://github.com/rvaliev/php-qrcode-detector-decoder
                         * https://github.com/khanamiryan/php-qrcode-detector-decoder
                         */
                        ini_set('memory_limit', '-1');
                        if(1){
                            include_once __PLUGIN . '/qrcode-reader/lib/QrReader.php';
                            $qrcode = new QrReader($_GET['url']);
                            $text = $qrcode->text();
//                            var_dump($qrcode);
                            print_r($text);
                        }else if(0){
                            include_once __PLUGIN . '/qrcode-reader/lib/QrReader.php';
                            $Url = 'https://wabr.inliteresearch.com/barcodes/url?url=' . $_GET['url'];
                            
                            /*
                             * https://wabr.inliteresearch.com/
                             * https://online-barcode-reader.inliteresearch.com/
                             * https://www.inliteresearch.com/actions/order/order.php
                             */
                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://wabr.inliteresearch.com/barcodes/url?url=' . $_GET['url'],
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "GET",
//                                CURLOPT_HTTPHEADER => array(
//                                    "Authorization: " . $Auth,
//                                ),
                            ));
                            $err = curl_error($curl);
                            $response = !empty($err) ? $err : curl_exec($curl);
                            $_state = json_decode($response, true);
                            curl_close($curl);
                            
                            if($_state['Barcodes']){
                                foreach ($_state['Barcodes'] as $key => $value) {
                                    if( $value['Type']=='QR' && substr($value['Text'], 0, 2)!='**' && !empty(substr($value['Text'], 2)) ){
                                        $scale = 1;
                                        $diff1 = 8;
                                        $diff2 = 4;
                                        $x = ($value['Left']*1-$diff1) * $scale;
                                        $y = ($value['Top']*1-$diff1) * $scale;
                                        $width = ($value['Right']*1-$x+$diff1+$diff2) * $scale;
                                        $height = ($value['Bottom']*1-$y+$diff1+$diff2) * $scale;
                                        
                                        //第一步，根據傳來的寬，高引數建立一幅圖片，然後正好將擷取的部分真好填充到這個區域
                                        $target = @imagecreatetruecolor($width, $height) or die("Cannot Initialize new GD image stream");
                                        //第二步，根據路徑獲取到源影象,用源影象建立一個image物件
                                        $source = imagecreatefromjpeg($_GET['url']);
                                        //第三步，根據傳來的引數，選取源影象的一部分填充到第一步建立的影象中
                                        imagecopy($target, $source, 0, 0, $x, $y, $width, $height);
                                        //第四步,儲存影象
                                        $file = '/contentId/QrCodeTmp.jpg';
                                        imagejpeg($target, __ROOT_UPLOAD.$file, 100);
                                        
                                        $qrcode = new QrReader(__WEB_UPLOAD.$file . "?v=$version");
                                        $text = $qrcode->text();
                                        print_r($text);
                                        
                                        @unlink(__ROOT_UPLOAD.$file);
                                    }
                                }
                            }
                        }else{
                            "尚未安裝【ZBarCode】";exit();
                            //新建一個圖像對象
                            $image = new ZBarcodeImage($_GET['url']);
                            //創建一個二維碼識別器
                            $scanner = new ZBarcodeScanner();
                            //識別
                            $barcode = $scanner->scan($image);
                            //循環輸出二維碼訊息
                            if (!empty($barcode)) {
                                foreach ($barcode as $code) {
                                    printf("Found type %s barcode with data %s\n", $code['type'], $code['data']);
                                }
                            }
                        }
                    }
                    break;
                default:
                    if($_GET['text']){
                        require_once __PLUGIN . '/TCPDF/tcpdf_barcodes_2d.php';
                        $qrcodeobj = new TCPDF2DBarcode($_GET['text'], 'QRCODE');
                        $BGcolor = !empty($_GET['BGcolor']) ? json_decode(urldecode($_GET['BGcolor']), true) : array(255,255,255);
                        echo $qrcodeobj->getBarcodePNG(5,5, array(0,0,0), $BGcolor);
                    }
                    break;
            }
            break;
    }
}


?>