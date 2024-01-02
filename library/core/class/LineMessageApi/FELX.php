<?php

class FELX {
    
    public function FLEX_Receipt($Val = NULL) {
        $TotalAmount = 0;
        $invPeriodList = array(
            "01" => "01-02",
            "02" => "01-02",
            "03" => "03-04",
            "04" => "03-04",
            "05" => "05-06",
            "06" => "05-06",
            "07" => "07-08",
            "08" => "07-08",
            "09" => "09-10",
            "10" => "09-10",
            "11" => "11-12",
            "12" => "11-12",
        );
        $detailsContentts = array();
        if($Val['details']){
            foreach ($Val['details'] as $key => $item) {
                $quantity = explode('.', $item['quantity'])[0];
                $TotalAmount += $item['amount']*1;
                $detailsContentts[] = array(
                    'type' => 'box',
                    'layout' => 'horizontal',
                    'contents' => array(
                        array(
                            'type' => 'text',
                            'text' => $item['description'] . ' x ' . $quantity,//熱狗 x 1
                            'size' => 'sm',
                            "wrap" => true,
                            "flex" => 4,
                            'color' => '#555555',
                        ),
                        array(
                            'type' => 'text',
                            'text' => $item['amount'],//45
                            'size' => 'sm',
                            "wrap" => true,
                            "flex" => 1,
                            'color' => '#111111',
                            'align' => 'end',
                        ),
                    ),
                    'margin' => 'lg',
                );
            }
            $detailsContentts[] = array(
                'type' => 'box',
                'layout' => 'horizontal',
                'contents' => array(
                    array(
                        'type' => 'text',
                        'text' => count($Val['details']) . '項',//1項
                        'weight' => 'bold',
                        'size' => 'xxl',
                        "wrap" => true,
                        'color' => '#111111',
                    ),
                    array(
                        'type' => 'text',
                        'text' => '$' . $TotalAmount,//$45
                        'weight' => 'bold',
                        'size' => 'xxl',
                        "wrap" => true,
                        'color' => '#111111',
                        'align' => 'end',
                    ),
                ),
                'margin' => 'lg',
            );
        }
        if(1 && $Val['QrCode']){
            if(1 && $Val['QrCode']['barcode']){
                $BarCodeArea = array(
                    'type' => 'image',
                    'url' => $Val['QrCode']['barcode'],
                    'size' => 'full',
                    'margin' => 'sm',
                    'aspectRatio' => '6:1',
                    'aspectMode' => 'fit',//fit、cover
                );
            }
            $QrCodeArea = array (
                'type' => 'box',
                'layout' => 'vertical',
                'contents' => array_values(array_filter(array(
                    $BarCodeArea,
                    array(
                        'type' => 'box',
                        'layout' => 'horizontal',
                        'margin' => 'md',
                        'contents' => array(
                            array(
                                'type' => 'image',
                                'url' => $Val['QrCode']['left'],
                                'size' => 'md',
                            ),
                            array(
                                'type' => 'image',
                                'url' => $Val['QrCode']['right'],
                                'size' => 'md',
                            ),
                        ),
                    ),
                ))),
            );
        }
        if($Val['sellerAddress']){
            $AddressArea = array(
                'type' => 'text',
                'text' => '地址: ' . $Val['sellerAddress'],//店家地址
                'margin' => 'md',
                "wrap" => true,
            );
        }
        return array(
            'type' => 'bubble',
            'body' => array(
                'type' => 'box',
                'layout' => 'vertical',
                'contents' => array_values(array_filter(array(
                    array(
                        'type' => 'text',
                        'text' => $Val['sellerName'],//天品商行
                        'weight' => 'bold',
                        'size' => '3xl',
                        "wrap" => true,
                        'margin' => 'md',
                        'align' => 'center',
                    ),
                    array(
                        'type' => 'text',
                        'text' => '電子發票證明聯',
                        'size' => 'xxl',
                        'align' => 'center',
                    ),
                    array(
                        'type' => 'text',
                        'text' => substr($Val['invPeriod'], 0, 3) . '年' . $invPeriodList[substr($Val['invPeriod'], 3)] . '月',//110年01-02月
                        'align' => 'center',
                        'size' => 'xl',
                    ),
                    array(
                        'type' => 'text',
                        'text' => substr($Val['invNum'], 0, 2) . '-' . substr($Val['invNum'], 2),//KU-75533861
                        'align' => 'center',
                        'size' => 'xl',
                    ),
                    array(
                        'type' => 'text',
                        'text' => date('Y-m-d', strtotime($Val['invDate'])) . ' '. $Val['invoiceTime'],//2021-02-12 14:35:01
                    ),
                    array(
                        'type' => 'box',
                        'layout' => 'horizontal',
                        'contents' => array(
                            array(
                                'type' => 'text',
                                'text' => '隨機碼: ' . $Val['randomNumber'],//0906
                                'flex' => 5,
                            ),
                            array(
                                'type' => 'text',
                                'text' => '總計: ' . $TotalAmount,//45
                                'align' => 'end',
                                'flex' => 5,
                            ),
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'text' => '賣方: ' . $Val['sellerBan'],//40995550
                    ),
                    $QrCodeArea,
                    $AddressArea,
                    array(
                        'type' => 'text',
                        'text' => '退貨請憑發票證明聯及明細辦理',
                        'weight' => 'bold',
                        'margin' => 'md',
                        'align' => 'center',
                    ),
                    array(
                        'type' => 'separator',
                        'margin' => 'md',
                    ),
                    array(
                        'type' => 'box',
                        'layout' => 'vertical',
                        'spacing' => 'sm',
                        'contents' => $detailsContentts,
                    ),
                ))),
            ),
        );
    }
    
    //flex 警告 (參考js-swal套件)
    public function FLEX_Alert($Val = NULL) {
        /*
         * icon原圖(SVG)
         * 
         * success https://image.flaticon.com/icons/svg/1828/1828640.svg
         * error https://image.flaticon.com/icons/svg/1828/1828843.svg
         * question https://image.flaticon.com/icons/svg/189/189665.svg
         * warning https://image.flaticon.com/icons/svg/179/179386.svg
         * info https://image.flaticon.com/icons/svg/1828/1828749.svg
         * 
         */
        
        if( $Val && ($Val['title']||$Val['text']) ){
            $Val['type'] = $Val['type'] ? $Val['type'] : 'success';
            $Val['image'] = ($Val[$Val['type']]) ? $Val[$Val['type']] : __RES_Web . '/images/flex_alert/' . $Val['type'] . '.png?' . date('YmdHis');

            $contents = array();
            if($Val['box-uri']){
                $BoxAction = array (
                    'type' => 'uri',
                    'uri' => $Val['box-uri'],
                );
            }
            if($Val['title']){
                $contents[] = array(
                    "type" => "text",
                    "text" => $Val['title'],
                    "color" => ($Val['title-color']) ? $Val['title-color'] : '#444444',
                    "size" => ($Val['title-size']) ? $Val['title-size'] : "xxl",//、xxs、xs、sm、md、lg、xl、(xxl)、3xl、4xl、5xl
                    "margin" => ($Val['title-margin']) ? $Val['title-margin'] : "md",//none、、xs、sm、(md)、lg、xl、xxl
                    "weight" => ($Val['title-weight']) ? $Val['title-weight'] : "bold",//regular、(bold)
                    "align" => ($Val['title-align']) ? $Val['title-align'] : "center",//start、(center)、end
                    "wrap" => ($Val['title-wrap']) ? $Val['title-wrap'] : true,//(true)、false
                );
            }
            if($Val['text']){
                $contents[] = array(
                    "type" => "text",
                    "text" => $Val['text'],
                    "color" => ($Val['text-color']) ? $Val['text-color'] : '#444444',
                    "size" => ($Val['text-size']) ? $Val['text-size'] : "md",//、xxs、xs、sm、(md)、lg、xl、xxl、3xl、4xl、5xl
                    "margin" => ($Val['text-margin']) ? $Val['text-margin'] : "lg",//none、、xs、sm、md、(lg)、xl、xxl
                    "weight" => ($Val['text-weight']) ? $Val['text-weight'] : "regular",//(regular)、bold
                    "align" => ($Val['text-align']) ? $Val['text-align'] : "center",//start、(center)、end
                    "wrap" => ($Val['text-wrap']) ? $Val['text-wrap'] : true,//(true)、false
                );
            }
            
            if($Val['button']['text'] && $Val['button']['uri']){
                $hyperlink = urlencode($Val['button']['uri']);
                $hyperlink = str_replace(array("%21", "%23", "%24", "%25", "%26", "%27", "%28", "%29", "%2A", "%2B", "%2C", "%2F", "%3A", "%3B", "%3D", "%3F", "%40", "%5B", "%5D"),
                                         array("!"  , "#"  , "$"  , "%"  , "&"  , "'"  , "("  , ")"  , "*"  , "+"  , ","  , "/"  , ":"  , ";"  , "="  , "?"  , "@"  , "["  , "]"  ), $hyperlink);
                $contents[] = array (
                    'type' => 'box',
                    'layout' => 'vertical',
                    'paddingAll' => '10px',
                    'margin' => 'md',
                    'backgroundColor' => '#2196f3',
                    'cornerRadius' => '10px',
                    'contents' => array (
                        array (
                            'type' => 'text',
                            'text' => $Val['button']['text'],
                            'align' => 'center',
                            'color' => '#ffffff',
                        ),
                    ),
                    'action' => array (
                        'type' => 'uri',
                        'uri' => $hyperlink,
                    ),
                );
            }

            $bubble = array(
                'type' => 'bubble',
                'size' => $Val['bubble-size'] ? $Val['bubble-size'] : 'mega',
                'body' => array_filter(array(
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' =>
                    array(
                        0 =>
                        array(
                            'type' => 'box',
                            'layout' => 'horizontal',
                            'contents' =>
                            array(
                                0 =>
                                array(
                                    'type' => 'filler',
                                ),
                                1 =>
                                array(
                                    'type' => 'box',
                                    'layout' => 'vertical',
                                    'contents' =>
                                    array(
                                        0 =>
                                        array(
                                            'type' => 'image',
                                            'url' => $Val['image'],
                                            'aspectMode' => 'cover',
                                            'size' => 'full',
                                        ),
                                    ),
                                    'cornerRadius' => '150px',
                                    'width' => $Val['image-width'] ? $Val['image-width'] : '100px',
                                    'height' => $Val['image-height'] ? $Val['image-height'] : '100px',
                                    'flex' => 0,
                                ),
                                2 =>
                                array(
                                    'type' => 'filler',
                                ),
                            ),
                            'paddingAll' => '20px',
                        ),
                        1 =>
                        array(
                            'type' => 'box',
                            'layout' => 'vertical',
                            'contents' => $contents,
                            'paddingAll' => '20px',
                            'paddingTop' => '0px',
                        ),
                    ),
                    'paddingAll' => '0px',
                    'action' => $BoxAction,
                )),
            );
        }
        
        return $bubble;
    }
    
    public function FLEX_AlertV2($Val = NULL) {
        /*
         * 預設圖檔:
         * 
         * like.png
         * yeah.png
         * thx.png
         * 
         * sorry.png
         * opps.png
         * nono.png
         * 
         */
        if( $Val && $Val['title'] ){
            $Val['type'] = $Val['type'] ? $Val['type'] : 'like';
            if($Val['no-image'] !== TRUE){
                $Val['image'] = ($Val[$Val['type']]) ? $Val[$Val['type']] : __RES_Web . '/images/flex_alertV2/' . $Val['type'] . '.png';
                if(!$Val['image-BGcolor']){
                    switch($Val['type']){
                        case 'like':
                        case 'yeah':
                        case 'thx':
                            $Val['image-BGcolor'] = '#00b903';
                            break;
                        case 'sorry':
                        case 'opps':
                        case 'nono':
                            $Val['image-BGcolor'] = '#dc3545';
                            break;
                    }
                }
            }
            
            $contents = array();
            if($Val['title']){
                $contents[] = array(
                    'type' => 'text',
                    'text' => $Val['title'],
                    'align' => ($Val['title-align']) ? $Val['title-align'] : 'start',
                    'flex' => ($Val['title-flex']) ? $Val['title-flex'] : 5,
                    'wrap' => ($Val['title-wrap']) ? $Val['title-wrap'] : true,
                    'size' => ($Val['title-size']) ? $Val['title-size'] : 'lg',
                    'color' => ($Val['title-color']) ? $Val['title-color'] : '#00B900',
                    'weight' => ($Val['title-weight']) ? $Val['title-weight'] : 'bold',
                );
            }
            if($Val['text']){
                $subcontents = array();
                foreach ($Val['text'] as $key => $value) {
                    $subcontents[] = array (
                        'type' => 'box',
                        'layout' => 'baseline',
                        'contents' => 
                        array (
                            0 => array (
                                'type' => 'text',
                                'text' => $value['subtitle'],
                                'margin' => ($Val['text-subtitle-margin']) ? $Val['text-subtitle-margin'] : 'none',
                                'flex' =>  ($Val['text-subtitle-flex']) ? $Val['text-subtitle-flex'] : 2,
                                'weight' =>  ($Val['text-subtitle-weight']) ? $Val['text-subtitle-weight'] : 'regular',
                            ),
                            1 => array (
                                'type' => 'text',
                                'text' => $value['subtext'],
                                'flex' => ($Val['text-subtext-flex']) ? $Val['text-subtext-flex'] : 4,
                                'color' => ($Val['text-subtext-color']) ? $Val['text-subtext-color'] : '#000000',
                            ),
                        ),
                        'margin' => ($Val['text-margin']) ? $Val['text-margin'] : 'md',
                    );
                }
                if($subcontents){
                    $contents[] = array(
                        'type' => 'separator',
                        'margin' => ($Val['text-separator-margin']) ? $Val['text-separator-margin'] : 'md',
                        'color' => ($Val['text-separator-color']) ? $Val['text-separator-color'] : '#00B900',
                    );
                    $contents[] = array (
                        'type' => 'box',
                        'layout' => 'vertical',
                        'contents' => $subcontents,
                        'margin' => 'md',
                    );
                }
            }
            if($Val['subtitle']){
                $contents[] = array(
                    'type' => 'separator',
                    'margin' => ($Val['subtitle-separator-margin']) ? $Val['subtitle-separator-margin'] : 'md',
                    'color' => ($Val['subtitle-separator-color']) ? $Val['subtitle-separator-color'] : '#ffffff',
                );
                $contents[] = array (
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => array (
                        0 => array (
                            'type' => 'text',
                            'text' => $Val['subtitle'],
                            'margin' => ($Val['subtitle-text-margin']) ? $Val['subtitle-text-margin'] : 'xs',
                            'color' => ($Val['subtitle-text-color']) ? $Val['subtitle-text-color'] : '#000000',
                            'align' => ($Val['subtitle-text-align']) ? $Val['subtitle-text-align'] : 'center',
                            'wrap' => ($Val['subtitle-text-wrap']) ? $Val['subtitle-text-wrap'] : false,
                        ),
                    ),
                    'margin' => ($Val['subtitle-margin']) ? $Val['subtitle-margin'] : 'md',
                    'backgroundColor' => ($Val['subtitle-BGcolor']) ? $Val['subtitle-BGcolor'] : '#efefef',
                );
            }
            if($Val['subtext']){
                $contents[] = array(
                    'type' => 'separator',
                    'margin' => ($Val['subtext-separator-margin']) ? $Val['subtext-separator-margin'] : 'md',
                    'color' => ($Val['subtext-separator-color']) ? $Val['subtext-separator-color'] : '#ffffff',
                );
                $contents[] = array (
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => array (
                        0 => array (
                            'type' => 'box',
                            'layout' => 'baseline',
                            'contents' => array (
                                0 => array (
                                    'type' => 'icon',
                                    'url' => ($Val['subtext-icon']) ? $Val['subtext-icon'] : 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png',
                                ),
                                1 => array (
                                    'type' => 'text',
                                    'text' => $Val['subtext'],
                                    'flex' => ($Val['subtext-flex']) ? $Val['subtext-flex'] : 1,
                                    'wrap' => ($Val['subtext-wrap']) ? $Val['subtext-wrap'] : true,
                                    'align' => ($Val['subtext-align']) ? $Val['subtext-align'] : 'center',
                                    'size' => ($Val['subtext-size']) ? $Val['subtext-size'] : 'md',
                                    'color' => ($Val['subtext-color']) ? $Val['subtext-color'] : '#dc3546',
                                ),
                                2 => array (
                                    'type' => 'icon',
                                    'url' => ($Val['subtext-icon']) ? $Val['subtext-icon'] : 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png',
                                ),
                            ),
                            'spacing' => ($Val['subtext-spacing']) ? $Val['subtext-spacing'] : 'none',
                        ),
                    ),
                    'margin' => ($Val['subtext-margin']) ? $Val['subtext-margin'] : 'md',
                );
            }
            
            $bubble['type'] = 'bubble';
            if($Val['image']){
                $bubble['header'] = array (
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => array (
                        0 => array (
                            'type' => 'image',
                            'url' => $Val['image'] . '?'.date('YmdHis'),
                            'size' => ($Val['image-size']) ? $Val['image-size'] : 'full',
                            'aspectMode' => ($Val['image-aspectMode']) ? $Val['image-aspectMode'] : 'fit',
                            'aspectRatio' => ($Val['image-aspectRatio']) ? $Val['image-aspectRatio'] : '22:10',
                        ),
                    ),
                    'backgroundColor' => $Val['image-BGcolor'],
                    'paddingAll' => ($Val['image-paddingAll']) ? $Val['image-paddingAll'] : '20px',
                    'paddingTop' => ($Val['image-paddingTop']) ? $Val['image-paddingTop'] : '50px',
                    'paddingBottom' => ($Val['image-paddingBottom']) ? $Val['image-paddingBottom'] : '30px',
                );
            }
            $bubble['body'] = array (
                'type' => 'box',
                'layout' => 'vertical',
                'contents' => $contents,
                'backgroundColor' => ($Val['body-BGcolor']) ? $Val['body-BGcolor'] : $Val['image-BGcolor'],
            );
            if($Val['button']['text'] && $Val['button']['uri']){
                $hyperlink = urlencode($Val['button']['uri']);
                $hyperlink = str_replace(array("%21", "%23", "%24", "%25", "%26", "%27", "%28", "%29", "%2A", "%2B", "%2C", "%2F", "%3A", "%3B", "%3D", "%3F", "%40", "%5B", "%5D"),
                                         array("!"  , "#"  , "$"  , "%"  , "&"  , "'"  , "("  , ")"  , "*"  , "+"  , ","  , "/"  , ":"  , ";"  , "="  , "?"  , "@"  , "["  , "]"  ), $hyperlink);
                $bubble['footer'] = array (
                    'type' => 'box',
                    'layout' => 'vertical',
                    'spacing' => 'sm',
                    'contents' => array (
                        0 => array (
                            'type' => 'button',
                            'style' => ($Val['button']['style']) ? $Val['button']['style'] : 'primary',
                            'height' => ($Val['button']['height']) ? $Val['button']['height'] : 'sm',
                            'action' => array (
                                'type' => 'uri',
                                'label' => $Val['button']['text'],
                                'uri' => $Val['button']['uri'],
                            ),
                            'margin' => ($Val['button']['margin']) ? $Val['button']['margin'] : 'none',
                            'color' => ($Val['button']['color']) ? $Val['button']['color'] : '#169BD5',
                        ),
                        1 => array (
                            'type' => 'spacer',
                            'size' => ($Val['button']['spacer-size']) ? $Val['button']['spacer-size'] : 'xxl',
                        ),
                    ),
                    'flex' => ($Val['button']['flex']) ? $Val['button']['flex'] : 0,
                    'backgroundColor' => ($Val['footer-BGcolor']) ? $Val['footer-BGcolor'] : $Val['image-BGcolor'],
                );
            }
        }
        
        return $bubble;
    }

    /*
     *  FLEX 模組
     */

//SendMessage
    public function FLEX_SendMessage($altText = NULL, $Val = NULL, $QuickReply = NULL) {
        $result['type'] = 'flex';
        $result['altText'] = $altText;
        $result['contents'] = $Val;
        if ($QuickReply)
            $result['quickReply'] = $this->QuickReply($QuickReply);
        return $result;
    }

//BubbleContainer
    public function FLEX_BubbleContainer($Val = NULL) {
        $Container['type'] = 'bubble';
        $Container['header'] = $Val['header'];
        $Container['hero'] = $Val['hero'];
        $Container['body'] = $Val['body'];
        $Container['footer'] = $Val['footer'];
        $Container['styles'] = $Val['styles'];
        $Container['size'] = $Val['size'] ? $Val['size'] : 'mega'; //nano、micro、kilo、mega、giga
        $Container['direction'] = $Val['direction'] ? $Val['direction'] : 'ltr'; //ltr(left to right)、rtl(right to left)

        return $Container;
    }

//CarouselContainer
    public function FLEX_CarouselContainer($Val = NULL) {
        $Container['type'] = 'carousel';
        foreach ($Val as $key => $value) {
            $Container['contents'][] = $value;
        }

        return $Container;
    }

//Header
    public function FLEX_Header($Val = NULL) {
        if ($Val) {
            $result = array(
                'layout' => 'vertical',
                'contents' => array(
                    array(
                        'type' => 'text',
                        'text' => $Val,
                        'size' => 'xxl',
                        'weight' => 'bold',
                    )
                ),
            );
            return $this->FLEX_Box($result);
        } else {
            return NULL;
        }
    }

//Hero
    public function FLEX_Hero($Val = NULL) {
        if ($Val) {
            $ImageVal = array(
                'url' => $Val,
                'size' => 'full',
                'aspectRatio' => '20:13',
                'aspectMode' => 'cover',
            );
            return $this->FLEX_Image($ImageVal);
        } else {
            return NULL;
        }
    }

//Body
    public function FLEX_Body($Val = NULL) {
        if ($Val) {
            $result = array(
                'layout' => 'vertical',
                'spacing' => 'md',
                'contents' => $Val,
            );
            return $this->FLEX_Box($result);
        } else {
            return NULL;
        }
    }

//Footer
    public function FLEX_Footer($Val = NULL) {
        if ($Val) {
            $result = array(
                'layout' => 'horizontal',
                'contents' => $Val,
            );
            return $this->FLEX_Box($result);
        } else {
            return NULL;
        }
    }

//Box
    public function FLEX_Box($Val = NULL) {
        $result['type'] = 'box';
        $result['layout'] = $Val['layout'] ? $Val['layout'] : 'vertical'; //horizontal、vertical、baseline
        $result['contents'] = $Val['contents']; //【horizontal、vertical】Box、button、filler、image、separator、spacer、text【baselineBox】filler、icon、spacer、text
        if ($Val['flex'])
            $result['flex'] = $Val['flex']; //Number
        if ($Val['spacing'])
            $result['spacing'] = $Val['spacing']; //none、xs、sm、md、lg、xl、xxl
        if ($Val['margin'])
            $result['margin'] = $Val['margin']; //none、xs、sm、md、lg、xl、xxl
        if ($Val['action'])
            $result['action'] = $this->FLEX_Action($Val['action']);

        return $result;
    }

//Style
    public function FLEX_Style($Val = NULL) {
        if ($Val['header'])
            $result['header'] = $Val['header'];
        if ($Val['hero'])
            $result['hero'] = $Val['hero'];
        if ($Val['body'])
            $result['body'] = $Val['body'];
        if ($Val['footer'])
            $result['footer'] = $Val['footer'];

        return $result;
    }

//Button
    public function FLEX_Button($Val = NULL) {
        $result['type'] = 'button';
        $result['style'] = $Val['style'] ? $Val['style'] : 'primary'; //primary、secondary、link
        if ($Val['color'])
            $result['color'] = $Val['color']; //#aaaaaa
        if ($Val['margin'])
            $result['margin'] = $Val['margin']; //none、xs、sm、md、lg、xl、xxl
        if ($Val['flex'])
            $result['flex'] = $Val['flex']; //Number
        if ($Val['height'])
            $result['height'] = $Val['height']; //sm、md
        if ($Val['gravity'])
            $result['gravity'] = $Val['gravity']; //top、bottom、center【layout :baseline，gravity會被忽略】
        if ($Val['action'])
            $result['action'] = $this->FLEX_Action($Val['action']);

        return $result;
    }

//Filler(空格)
    public function FLEX_Filler($Val = NULL) {
        $result['type'] = 'filler';

        return $result;
    }

//Icon
    public function FLEX_Icon($Val = NULL) {
        $result['type'] = 'icon';
        $result['url'] = $Val['url']; //圖片網址
        $result['size'] = $Val['size'] ? $Val['size'] : 'md'; //xxs、xs、sm、md、lg、xl、xxl、3xl、4xl、5xl
        if ($Val['margin'])
            $result['margin'] = $Val['margin']; //none、xs、sm、md、lg、xl、xxl
        if ($Val['aspectRatio'])
            $result['aspectRatio'] = $Val['aspectRatio']; //1:1【width:height】

        return $result;
    }

//Image
    public function FLEX_Image($Val = NULL) {
        $result['type'] = 'image';
        $result['url'] = $Val['url']; //圖片網址
        $result['size'] = $Val['size'] ? $Val['size'] : 'md'; //md、lg、xl、xxl、3xl、full
        $result['aspectRatio'] = $Val['aspectRatio'] ? $Val['aspectRatio'] : '20:13'; //20:13
        $result['aspectMode'] = $Val['aspectMode'] ? $Val['aspectMode'] : 'cover'; //cover
        $result['flex'] = $Val['flex'] ? $Val['flex'] : 0; //Number
        if ($Val['margin'])
            $result['margin'] = $Val['margin']; //none、xs、sm、md、lg、xl、xxl
        if ($Val['align'])
            $result['align'] = $Val['align']; //center、start、end
        if ($Val['gravity'])
            $result['gravity'] = $Val['gravity']; //top、bottom、center【layout :baseline，gravity會被忽略】
        if ($Val['backgroundColor'])
            $result['backgroundColor'] = $Val['backgroundColor'];
        if ($Val['action'])
            $result['action'] = $this->FLEX_Action($Val['action']);

        return $result;
    }

//Separator(分隔線)
    public function FLEX_Separator($Val = NULL) {
        $result['type'] = 'separator';
        $result['margin'] = $Val ? $Val : 'xs'; //none、xs、sm、md、lg、xl、xxl
        if ($Val['color'])
            $result['color'] = $Val['color'];

        return $result;
    }

//Spacer
    public function FLEX_Spacer($Val = NULL) {
        $result['type'] = 'spacer';
        $result['size'] = $Val ? $Val : 'xl'; //xs、sm、md、lg、xl、xxl

        return $result;
    }

//Text
    public function FLEX_Text($Val = NULL) {
        $result['type'] = 'text';
        $result['text'] = $Val['text'];
        if ($Val['size'])
            $result['size'] = $Val['size']; //xxs、xs、sm、md、lg、xl、xxl、3xl、4xl、5xl
        if ($Val['color'])
            $result['color'] = $Val['color']; //#cccccc
        if ($Val['weight'])
            $result['weight'] = $Val['weight']; //regular、bold
        if ($Val['margin'])
            $result['margin'] = $Val['margin']; //none、xs、sm、md、lg、xl、xxl
        if ($Val['wrap'])
            $result['wrap'] = $Val['wrap']; //true、false
        if ($Val['maxLines'])
            $result['maxLines'] = $Val['maxLines']; //Number
        if ($Val['flex'])
            $result['flex'] = $Val['flex']; //Number
        if ($Val['align'])
            $result['align'] = $Val['align']; //center、start、end
        if ($Val['gravity'])
            $result['gravity'] = $Val['gravity']; //top、center、bottom
        if ($Val['action'])
            $result['action'] = $this->FLEX_Action($Val['action']);

        return $result;
    }

//Action
    public function FLEX_Action($Val = NULL) {
        if ($Val['type'])
            $result['type'] = $Val['type']; //postback 【type、label、data、displayText、text】
//message 【type、label、text】
//uri 【type、label、uri、altUri.desktop】
//datetimepicker 【type、label、data、mode、initial、max、min】
//camera 【type、label】
//cameraRoll 【type、label】
//location 【type、label】
        if ($Val['label'])
            $result['label'] = $Val['label'];
        if ($Val['uri'])
            $result['uri'] = $Val['uri']; //http、https、line、tel開頭
        if ($Val['altUri.desktop'])
            $result['altUri.desktop'] = $Val['altUri.desktop'];
        if ($Val['data'])
            $result['data'] = $Val['data'];
        if ($Val['displayText'])
            $result['displayText'] = $Val['displayText'];
        if ($Val['text'])
            $result['text'] = $Val['text'];
        if ($Val['mode'])
            $result['mode'] = $Val['mode']; //date、time、datetime
        if ($Val['initial'])
            $result['initial'] = $Val['initial']; //ex:2017-12-25t00:00
        if ($Val['max'])
            $result['max'] = $Val['max']; //ex:2018-01-24t23:59
        if ($Val['min'])
            $result['min'] = $Val['min']; //ex:2017-12-25t00:00

        return $result;
    }

//quickReply
    public function QuickReply($Val = NULL) {
        foreach ($Val as $key => $value) {
            $result['items'][$key]['type'] = 'action';
            if ($value['imageUrl'])
                $result['items'][$key]['imageUrl'] = $value['imageUrl']; //Icon網址
            $result['items'][$key]['action'] = $this->FLEX_Action($value['action']); //除了uri
        }

        return $result;
    }

    /*
     * 自加模組
     */

//FLEX 互動填表-題目
    public function FELX_Question($altText = NULL, $Val = NULL, $QuickReply = NULL) {
        return $this->FLEX_SendMessage($altText, $this->FLEX_QuestionBubble($Val), $QuickReply);
    }

//FLEX 互動填表-最後確認
    public function FELX_FinalConfirm($Val = NULL, $QueryArray = NULL, $Button = TRUE) {
        $contents[] = $this->FLEX_Title($Val['TitleText']);
        $contents[] = $this->FLEX_Separator();
        foreach ($QueryArray as $key => $value) {
            $QuestionVal = array(
                'QuestionNo' => $key,
                'Question' => $value['Question'],
            );
            $contents[] = $this->FLEX_Question($QuestionVal);
            if ($value['Option']) {
                $contents[] = $this->FLEX_Option($value['Option']);
            }
            $contents[] = $this->FLEX_Answer($value['Answer']);
            $contents[] = $this->FLEX_Separator();
        }
        if($Button){
            $ButtonStyle = [];
            $ButtonStyle['color'] = '#aaaaaa';
            $ButtonStyle['action'] = array(
                'type' => 'postback',
                'label' => '取消',
                'data' => 'BOT(_)FillForm(_)Exit'
            );
            $actions[] = $this->FLEX_Button($ButtonStyle);
            $ButtonStyle = [];
            $ButtonStyle['margin'] = 'lg';
            $ButtonStyle['action'] = array(
                'type' => 'postback',
                'label' => '確認',
                'data' => 'BOT(_)FillForm(_)Send'
            );
            $actions[] = $this->FLEX_Button($ButtonStyle);
        }

        $BubbleContainerVal = array(
            'header' => $this->FLEX_Header($Val['HeaderText']),
            'hero' => $this->FLEX_Hero($Val['PicUrl']),
            'body' => $this->FLEX_Body($contents)
        );
        if($Button){
            $BubbleContainerVal['footer'] = $this->FLEX_Footer($actions);
        }
        return $this->FLEX_SendMessage($Val['altText'], $this->FLEX_BubbleContainer($BubbleContainerVal));
    }

//表單標題
    public function FLEX_Title($Val = NULL) {
        $TextVal = array(
            'text' => $Val,
            'size' => 'lg',
            'weight' => 'bold',
            'wrap' => true,
        );
        return $this->FLEX_Text($TextVal);
    }

//問題
    public function FLEX_Question($Val = NULL) {
//題號清單(圖)1~10
        $QuestionNOList = [];
        for ($i = 1; $i <= 10; $i++) {
            $QuestionNOList[] = __RES_Web . '/images/QuestionIcon/Question' . $i . '.png';
        }
        $IconVal = array(
            'url' => $QuestionNOList[$Val['QuestionNo']],
            'size' => 'sm',
        );
        $contents[] = $this->FLEX_Icon($IconVal);
        $TextVal = array(
            'text' => $Val['Question'],
            'weight' => 'bold',
            'margin' => 'sm',
            'wrap' => true,
        );
        $contents[] = $this->FLEX_Text($TextVal);
        $result = array(
            'layout' => 'baseline',
            'contents' => $contents,
        );
        return $this->FLEX_Box($result);
    }

//選項
    public function FLEX_Option($Val = NULL) {
//數字清單1~10
        $QuestionNo = ['➊', '➋', '➌', '➍', '➎', '➏', '➐', '➑', '➒', '➓'];
        foreach ($Val as $key => $value) {
            $OptionVal = $OptionVal . $QuestionNo[$key] . $value;
        }
        $TextVal = array(
            'text' => $OptionVal,
            'size' => 'xs',
            'color' => '#3b88c3',
            'wrap' => true,
        );
        $contents[] = $this->FLEX_Text($TextVal);
        $result = array(
            'layout' => 'vertical',
            'contents' => $contents,
        );
        return $this->FLEX_Box($result);
    }

//QuickReply選項
    public function FLEX_QuickReplyOption($Val = NULL) {
//題號清單(圖)1~10
        $QuestionNOList = [];
        for ($i = 1; $i <= 10; $i++) {
            $QuestionNOList[] = __RES_Web . '/images/QuestionIcon/Question' . $i . '.png';
        }
        foreach ($Val as $key => $value) {
            $value['imageUrl'] = $QuestionNOList[$key];
            $result[] = $value;
        }

        return $result;
    }

//答案
    public function FLEX_Answer($Val = NULL) {
//筆icon
//$Val = "✎ " . $Val;
        $TextVal = array(
            'text' => $Val,
            'size' => 'xs',
            'color' => '#cccccc',
            'wrap' => true,
        );
        /* $TextVal['action'] = array(
          'type' => 'datetimepicker',
          'label' => '選時間',
          'data' => 'BOT(_)Query(_)Datetimepicker',
          'initial' => '2017-12-25t00:00',
          'mode' => 'datetime',
          'max' => '2018-01-24t23:59',
          'min' => '2017-12-25t00:00',
          ); */
        $contents[] = $this->FLEX_Text($TextVal);
        $result = array(
            'layout' => 'baseline',
            'contents' => $contents,
        );
        return $this->FLEX_Box($result);
    }

//互動填表 - 問題
    public function FLEX_QuestionBubble($Val = NULL) {
        $contents = [];
        $QuestionVal = array(
            'QuestionNo' => $Val['QuestionNo'],
            'Question' => $Val['Question'],
        );
        if($Val['Title']){
            $contents[] = $this->FLEX_Title($Val['Title']);
        }
        $contents[] = $this->FLEX_Question($QuestionVal);
        $contents[] = $this->FLEX_Answer($Val['Answer']);
        $BubbleContainerVal = array(
            'body' => $this->FLEX_Body($contents),
        );
        $Container = $this->FLEX_BubbleContainer($BubbleContainerVal);
        return $Container;
    }
}

?>