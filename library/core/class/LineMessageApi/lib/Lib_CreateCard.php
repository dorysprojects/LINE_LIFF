<?php

function Lib_CreateCard($line, $Bot) {
    if(!empty($line) && !empty($Bot)){
        if(0){
            $SQL_CardRobot = new kSQL('CardRobot');
            $Card = $SQL_CardRobot->SetAction('select')
                        ->SetWhere("tablename='CardRobot'")
                        ->SetWhere("next='myself'")
                        ->SetWhere("id='". $Bot->ID ."'")
                        ->SetLimit(1)
                        ->BuildQuery();
        }else{
            $Card = $Bot->Action;
        }
        $questionList = $Bot->Box;
        $AnserList = $Bot->Data;
        if(!$Card){
            $line->text('卡片不存在')->reply();
        }else if($Card['viewA']!=='on'){
            $line->text('卡片已關閉')->reply();
        }else{
            $CardActions = !empty($Card['subject']['actions']) ? json_decode($Card['subject']['actions'], true) : array();
            if($questionList && $CardActions){
                if (!is_dir(__ROOT_UPLOAD . '/card')) {
                    mkdir(__ROOT_UPLOAD . '/card');
                }
                if (!is_dir(__ROOT_UPLOAD . '/card/' . date('Ymd'))) {
                    mkdir(__ROOT_UPLOAD . '/card/' . date('Ymd'));
                }

                $len = 1;
                if(!file_exists(__ROOT_UPLOAD.'/card/' . $Card['subject']['img0'])){
                    $len = 2;
                }

                for($i=0;$i<$len;$i++){
                    if($i==0){
                        $line->text('卡片製作中，請稍候');
                    }

                    /*
                     * 設定
                     */
                    $Font_Family = __RES_Web . '/fonts/NotoSansCJKtc-Regular.otf'; //字型檔

                    /*
                     * 將卡片背景放至畫布
                     */
                    $imginfo = getimagesize(__WEB_UPLOAD . '/image/' . $Card['subject']['img0']);  
                    $Width_ItemImage = $imginfo[0];
                    $Height_ItemImage = $imginfo[1];
                    $card = new Imagick;
                    $card->newimage($Height_ItemImage, $Width_ItemImage, 'white');
                    $card->setImageFormat('png');
                    $picA = new Imagick; //將卡片背景圖放至畫布
                    $picA->readImage(__ROOT_UPLOAD.'/image/' . $Card['subject']['img0']);
                    $picA->scaleimage($Height_ItemImage, $Width_ItemImage, TRUE);
                    $card->compositeImage($picA, Imagick::COMPOSITE_OVER, 0, 0);

                    /*
                     * 祝福語處理
                     */
                    //$Content = kCore_remove_emoji(preg_replace("/\r\n|\r|\n/", ' ', nf_to_wf($line->events['message']['text'], 'nf_to_wf')));//祝福語轉全型、去除段行、去除emoji
                    
                    $DrawList = array();
                    $TextList = array();
                    foreach ($questionList as $questionKey => $questionVal) {
                        foreach ($CardActions as $actionKey => $actionVal) {
                            if($actionVal['question']==$questionKey){
                                if($i==0){
                                    $Start = $TextList[$questionKey] ? $TextList[$questionKey] : 0;
                                    $String = mb_substr($AnserList[$questionKey], $Start, $actionVal['limit'], 'utf-8');
                                }else if($i==1){
                                    $String = $actionVal['text'];
                                }
                                if(!empty($String)){
                                    $FontSize = $actionVal['size'];
                                    $draw = new ImagickDraw; // 初始化绘制对象
                                    $draw->setTextEncoding('UTF-8');
                                    $draw->setFont($Font_Family); // 設置字體
                                    $draw->setFontSize($FontSize); // 文字大小
                                    $draw->setFillColor(new ImagickPixel($actionVal['color'])); // 文字颜色
                                    $draw->setTextAlignment(Imagick::ALIGN_LEFT); // 文字對齊方式
                                    $draw->annotation(0, $FontSize, $String); // 添加文字
                                    // 將文字繪圖
                                    $text = new Imagick;
                                    $text->newImage($Width_ItemImage, $Height_ItemImage, new ImagickPixel('#FFFFFF'));
                                    $text->paintTransparentImage($text->getImageBackgroundColor(), 0, 10000);
                                    $text->setImageFormat('png');
                                    $text->drawImage($draw);
                                    $card->compositeImage($text, Imagick::COMPOSITE_OVER, $actionVal['area']['x'], $actionVal['area']['y']);
                                    $draw->destroy();
                                    $text->destroy();
                                    $TextList[$questionKey] += $actionVal['limit'];
                                }
                            }
                        }
                    }
                    
                    //$line->text(json_encode($DrawList))->reply();exit();
                    
                    if($card){
                        if($i==0){
                            $card->setImageCompressionQuality(70);
                            $fileName = $line->LineMessageData_Member[0]['propertyA'] . date('Ymdhis') . '.jpg';
                            $card->writeimage(__ROOT_UPLOAD . '/card/' . date('Ymd') . '/' . $fileName);
                            $originalContentUrl = __WEB_UPLOAD . '/card/' . date('Ymd') . '/' . $fileName;
                            $previewImageUrl = __WEB_UPLOAD . '/card/' . date('Ymd') . '/' . $fileName;
                            $line->image($originalContentUrl, $previewImageUrl);
                            //其他訊息
                            $line->reply();
                            
                            $SQL_CardRobot = new kSQL('CardRobot');
                            $subject = array(
                                "questions" => $Bot->Box,
                                "answers" => $Bot->Data,
                                "actions" => $CardActions,
                            );
                            $InsertCard = $SQL_CardRobot->SetAction('insert')
                                                        ->SetValue("prev", $Bot->ID)
                                                        ->SetValue("next", "cardlist")
                                                        ->SetValue('subject', json_encode($subject))
                                                        ->SetValue("propertyA", $line->LineMessageData_Member[0]['propertyA'])
                                                        ->SetValue("propertyB", $originalContentUrl)
                                                        ->SetValue('update_at', $SQL_CardRobot->getNowTime())
                                                        ->SetValue('create_at', $SQL_CardRobot->getNowTime())
                                                        ->BuildQuery();
                            //貼標
                            if(!empty($Card['sortB'])){
                                kCore_Tag('SelectAndUpdate', array(
                                    "id" => $Card['sortB'],
                                    "userId" => $line->events['source']['userId'],
                                ));
                            }
                        }else if($i==1){
                            $card->setImageCompressionQuality(70);
                            $card->writeimage(__ROOT_UPLOAD.'/card/' . $Card['subject']['img0']);
                        }
                    }

                    $picA->destroy();
                    $card->destroy();
                }
            }
        }
        $line->Clear_BOTFlash();
    }
}

?>