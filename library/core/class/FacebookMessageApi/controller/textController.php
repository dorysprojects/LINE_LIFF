<?php

$LineMessageText = $message['message']['text'];
switch ($LineMessageText) {
    case '/登機證':
        $facebook->action['data'] = array(
            'attachment' =>
            array(
                'type' => 'template',
                'payload' =>
                array(
                    'template_type' => 'airline_boardingpass',
                    'intro_message' => 'You are checked in.',
                    'locale' => 'en_US',
                    'boarding_pass' =>
                    array(
                        0 =>
                        array(
                            'passenger_name' => 'SMITH/NICOLAS',
                            'pnr_number' => 'CG4X7U',
                            'seat' => '74J',
                            'logo_image_url' => 'https://www.example.com/en/logo.png',
                            'header_image_url' => 'https://www.example.com/en/fb/header.png',
                            'qr_code' => 'M1SMITH/NICOLAS  CG4X7U nawouehgawgnapwi3jfa0wfh',
                            'above_bar_code_image_url' => 'https://www.example.com/en/PLAT.png',
                            'auxiliary_fields' =>
                            array(
                                0 =>
                                array(
                                    'label' => 'Terminal',
                                    'value' => 'T1',
                                ),
                                1 =>
                                array(
                                    'label' => 'Departure',
                                    'value' => '30OCT 19:05',
                                ),
                            ),
                            'secondary_fields' =>
                            array(
                                0 =>
                                array(
                                    'label' => 'Boarding',
                                    'value' => '18:30',
                                ),
                                1 =>
                                array(
                                    'label' => 'Gate',
                                    'value' => 'D57',
                                ),
                                2 =>
                                array(
                                    'label' => 'Seat',
                                    'value' => '74J',
                                ),
                                3 =>
                                array(
                                    'label' => 'Sec.Nr.',
                                    'value' => '003',
                                ),
                            ),
                            'flight_info' =>
                            array(
                                'flight_number' => 'KL0642',
                                'departure_airport' =>
                                array(
                                    'airport_code' => 'JFK',
                                    'city' => 'New York',
                                    'terminal' => 'T1',
                                    'gate' => 'D57',
                                ),
                                'arrival_airport' =>
                                array(
                                    'airport_code' => 'AMS',
                                    'city' => 'Amsterdam',
                                ),
                                'flight_schedule' =>
                                array(
                                    'departure_time' => '2016-01-02T19:05',
                                    'arrival_time' => '2016-01-05T17:30',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        );
        $facebook->reply();
        break;
    case '/航空公司報到':
        $facebook->action['data'] = array(
            'attachment' =>
            array(
                'type' => 'template',
                'payload' =>
                array(
                    'template_type' => 'airline_checkin',
                    'intro_message' => 'Check-in is available now.',
                    'locale' => 'en_US',
                    'pnr_number' => 'ABCDEF',
                    'checkin_url' => 'https://www.airline.com/check-in',
                    'flight_info' =>
                    array(
                        0 =>
                        array(
                            'flight_number' => 'f001',
                            'departure_airport' =>
                            array(
                                'airport_code' => 'SFO',
                                'city' => 'San Francisco',
                                'terminal' => 'T4',
                                'gate' => 'G8',
                            ),
                            'arrival_airport' =>
                            array(
                                'airport_code' => 'SEA',
                                'city' => 'Seattle',
                                'terminal' => 'T4',
                                'gate' => 'G8',
                            ),
                            'flight_schedule' =>
                            array(
                                'boarding_time' => '2016-01-05T15:05',
                                'departure_time' => '2016-01-05T15:45',
                                'arrival_time' => '2016-01-05T17:30',
                            ),
                        ),
                    ),
                ),
            ),
        );
        $facebook->reply();
        break;
    case '/行程':
        $facebook->action['data'] = array(
            'attachment' =>
            array(
                'type' => 'template',
                'payload' =>
                array(
                    'template_type' => 'airline_itinerary',
                    'intro_message' => 'Here is your flight itinerary.',
                    'locale' => 'en_US',
                    'pnr_number' => 'ABCDEF',
                    'passenger_info' =>
                    array(
                        0 =>
                        array(
                            'name' => 'Farbound Smith Jr',
                            'ticket_number' => '0741234567890',
                            'passenger_id' => 'p001',
                        ),
                        1 =>
                        array(
                            'name' => 'Nick Jones',
                            'ticket_number' => '0741234567891',
                            'passenger_id' => 'p002',
                        ),
                    ),
                    'flight_info' =>
                    array(
                        0 =>
                        array(
                            'connection_id' => 'c001',
                            'segment_id' => 's001',
                            'flight_number' => 'KL9123',
                            'aircraft_type' => 'Boeing 737',
                            'departure_airport' =>
                            array(
                                'airport_code' => 'SFO',
                                'city' => 'San Francisco',
                            ),
                            'arrival_airport' =>
                            array(
                                'airport_code' => 'SLC',
                                'city' => 'Salt Lake City',
                            ),
                            'flight_schedule' =>
                            array(
                                'departure_time' => '2016-01-02T19:45',
                                'arrival_time' => '2016-01-02T21:20',
                            ),
                            'travel_class' => 'business',
                        ),
                        1 =>
                        array(
                            'connection_id' => 'c002',
                            'segment_id' => 's002',
                            'flight_number' => 'KL321',
                            'aircraft_type' => 'Boeing 747-200',
                            'travel_class' => 'business',
                            'departure_airport' =>
                            array(
                                'airport_code' => 'SLC',
                                'city' => 'Salt Lake City',
                                'terminal' => 'T1',
                                'gate' => 'G33',
                            ),
                            'arrival_airport' =>
                            array(
                                'airport_code' => 'AMS',
                                'city' => 'Amsterdam',
                                'terminal' => 'T1',
                                'gate' => 'G33',
                            ),
                            'flight_schedule' =>
                            array(
                                'departure_time' => '2016-01-02T22:45',
                                'arrival_time' => '2016-01-03T17:20',
                            ),
                        ),
                    ),
                    'passenger_segment_info' =>
                    array(
                        0 =>
                        array(
                            'segment_id' => 's001',
                            'passenger_id' => 'p001',
                            'seat' => '12A',
                            'seat_type' => 'Business',
                        ),
                        1 =>
                        array(
                            'segment_id' => 's001',
                            'passenger_id' => 'p002',
                            'seat' => '12B',
                            'seat_type' => 'Business',
                        ),
                        2 =>
                        array(
                            'segment_id' => 's002',
                            'passenger_id' => 'p001',
                            'seat' => '73A',
                            'seat_type' => 'World Business',
                            'product_info' =>
                            array(
                                0 =>
                                array(
                                    'title' => 'Lounge',
                                    'value' => 'Complimentary lounge access',
                                ),
                                1 =>
                                array(
                                    'title' => 'Baggage',
                                    'value' => '1 extra bag 50lbs',
                                ),
                            ),
                        ),
                        3 =>
                        array(
                            'segment_id' => 's002',
                            'passenger_id' => 'p002',
                            'seat' => '73B',
                            'seat_type' => 'World Business',
                            'product_info' =>
                            array(
                                0 =>
                                array(
                                    'title' => 'Lounge',
                                    'value' => 'Complimentary lounge access',
                                ),
                                1 =>
                                array(
                                    'title' => 'Baggage',
                                    'value' => '1 extra bag 50lbs',
                                ),
                            ),
                        ),
                    ),
                    'price_info' =>
                    array(
                        0 =>
                        array(
                            'title' => 'Fuel surcharge',
                            'amount' => '1597',
                            'currency' => 'USD',
                        ),
                    ),
                    'base_price' => '12206',
                    'tax' => '200',
                    'total_price' => '14003',
                    'currency' => 'USD',
                ),
            ),
        );
        $facebook->reply();
        break;
    case '/最新航班資訊':
        $facebook->action['data'] = array(
            'attachment' =>
            array(
                'type' => 'template',
                'payload' =>
                array(
                    'template_type' => 'airline_update',
                    'intro_message' => 'Your flight is delayed',
                    'update_type' => 'delay',
                    'locale' => 'en_US',
                    'pnr_number' => 'CF23G2',
                    'update_flight_info' =>
                    array(
                        'flight_number' => 'KL123',
                        'departure_airport' =>
                        array(
                            'airport_code' => 'SFO',
                            'city' => 'San Francisco',
                            'terminal' => 'T4',
                            'gate' => 'G8',
                        ),
                        'arrival_airport' =>
                        array(
                            'airport_code' => 'AMS',
                            'city' => 'Amsterdam',
                            'terminal' => 'T4',
                            'gate' => 'G8',
                        ),
                        'flight_schedule' =>
                        array(
                            'boarding_time' => '2015-12-26T10:30',
                            'departure_time' => '2015-12-26T11:30',
                            'arrival_time' => '2015-12-27T07:30',
                        ),
                    ),
                ),
            ),
        );
        $facebook->reply();
        break;
    case '/綁定Line':
        $buttons_actions = array();
        $buttons_actions[] = array(
            'type' => 'account_link',//account_link、account_unlink
            'url' => __CustomStickers_Web . '/ft/FB_Account_Link'
        );
        $facebook->buttons(__RES_Web . '/images/lineXfb.png', '帳號連結', '請點擊登入按鈕，點擊後我們將會整合您的LINE帳號與Facebook Messenger', $buttons_actions)
                 ->reply();
        break;
    default:
        $SQL_KeyWordMsg = new kSQL('KeyWordMsg');
        $KeyWordMsg = $SQL_KeyWordMsg->SetAction('select')
                    ->SetWhere("tablename='KeyWordMsg'")
                    ->SetWhere("next='myself'")
                    ->SetWhere("viewA='on'")
                    ->SetWhere("propertyA='". $LineMessageText ."'")
                    ->SetWhere("propertyB like 'facebook'")
                    ->BuildQuery();
        if($KeyWordMsg){
            foreach ($KeyWordMsg as $key => $item) {
                $MsgItem['subject'] = array(
                    'type_0' => 'KeyWordMsg',
                    'value_0' => $item['id'],
                );
                $facebook->SetMessages($MsgItem, 0);
            }
        }else{
            $SQL_SystemMessage = new kSQL('SystemMessage');
            $AutoMsg = $SQL_SystemMessage->SetAction('select')
                        ->SetWhere("tablename='SystemMessage'")
                        ->SetWhere("next='AutoMsg'")
                        ->SetWhere("viewA='on'")
                        ->BuildQuery();
            if($AutoMsg[0]){
                $facebook->SetMessages($AutoMsg[0]);
                $facebook->reply();
            }
            
            if(0){
                //文字
                $facebook->text('文字Test')->reply();
                //照片
                $facebook->image(__WEB_UPLOAD . '/image/2020101410GJwKSPsAxu.jpg')->reply();
                //語音
                $facebook->video(__WEB_UPLOAD . '/video/2020101410Fdjj146nkq.mp4')->reply();
                //影片
                $facebook->audio(__WEB_UPLOAD . '/audio/2020101409G3Q1dVbIvr.m4a')->reply();
                //檔案
                $facebook->file(__RES_Web . '/js/data.json')->reply();
                //確認卡片
                $confirm_action1 = $facebook->messageObject('uri', 'URL', 'https://www.google.com');
                $confirm_action2 = $facebook->messageObject('postback', 'Postback', 'data');
                $facebook->confirm('Are you sure?', $confirm_action1, $confirm_action2)->reply();
                //按鈕卡片
                $buttons_actions = array();
                $buttons_actions[] = $facebook->postback('Buy', 'action=buy&itemid=123');
                $buttons_actions[] = $facebook->postback('Add to cart', 'action=add&itemid=123');
                $buttons_actions[] = $facebook->uri('View detail', 'http://example.com/page/123');
                $facebook->buttons('https://example.com/bot/images/image.jpg', 'Menu', 'Please select', $buttons_actions)->reply();
                //卡片式選單
                $carousel_columns = array();
                $carousel_actions1 = array();
                $carousel_actions1[] = $facebook->messageObject('postback', 'Buy', 'action=buy&itemid=111');
                $carousel_actions1[] = $facebook->messageObject('postback', 'Add to cart', 'action=add&itemid=111');
                $carousel_actions1[] = $facebook->messageObject('uri', 'View detail', 'http://example.com/page/111');
                $carousel_columns[] = $facebook->columns_v2('https://example.com/bot/images/item1.jpg', 'this is menu', 'description', $carousel_actions1);
                $carousel_actions2 = array();
                $carousel_actions2[] = $facebook->messageObject('postback', 'Buy', 'action=buy&itemid=222');
                $carousel_actions2[] = $facebook->messageObject('postback', 'Add to cart', 'action=add&itemid=222');
                $carousel_actions2[] = $facebook->messageObject('uri', 'View detail', 'http://example.com/page/222');
                $carousel_columns[] = $facebook->columns_v2('https://example.com/bot/images/item2.jpg', 'this is menu', 'description', $carousel_actions2);
                $facebook->carousel($carousel_columns)->reply();
            }
        }
        break;
}

?>