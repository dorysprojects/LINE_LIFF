<?php

$type = kCore_get('type');
$columns = array();
switch ($type) {
    //高鐵
    case 'thsrc':
        $OrderUrl = 'https://irs.thsrc.com.tw/IMINT/?locale=tw';
        $TimetableUrl = 'https://www.thsrc.com.tw/Attachment/Download?pageID=201e511c-e9d9-44a5-8f45-c5d349726fe7&id=be59c8eb-662a-4bde-ba1c-64129cf0a807';
        
        /*
         * 高鐵搶票
         */
        $columns[] = array(
            "type" => "select",
            "label" => "起程站",
            "required" => "on",
            "name" => "selectStartStation",
            "class" => "field",
            "value" => '',
            "options" => array(
                "1" => "南港",
                "2" => "台北",
                "3" => "板橋",
                "4" => "桃園",
                "5" => "新竹",
                "6" => "苗栗",
                "7" => "台中",
                "8" => "彰化",
                "9" => "雲林",
                "10" => "嘉義",
                "11" => "台南",
                "12" => "左營",
            )
        );
        $columns[] = array(
            "type" => "select",
            "label" => "到達站",
            "required" => "on",
            "name" => "selectDestinationStation",
            "class" => "field",
            "value" => '',
            "options" => array(
                "1" => "南港",
                "2" => "台北",
                "3" => "板橋",
                "4" => "桃園",
                "5" => "新竹",
                "6" => "苗栗",
                "7" => "台中",
                "8" => "彰化",
                "9" => "雲林",
                "10" => "嘉義",
                "11" => "台南",
                "12" => "左營",
            )
        );
        $columns[] = array(
            "type" => "radio",
            "label" => "車廂種類",
            "required" => "on",
            "name" => "trainCon:trainRadioGroup",
            "class" => "field",
            "value" => '',
            "options" => array(
                "標準車廂",
                "商務車廂",
            )
        );
        $columns[] = array(
            "type" => "radio",
            "label" => "座位喜好",
            "required" => "on",
            "name" => "seatCon:seatRadioGroup",
            "class" => "field",
            "value" => '',
            "options" => array(
                "無",
                "靠窗優先",
                "走道優先",
            )
        );
        $columns[] = array(
            "type" => "radio",
            "label" => "訂位方式",
            "required" => "on",
            "name" => "bookingMethod",
            "class" => "field",
            "value" => '1',
            "disabled" => 1,
            "options" => array(
                "依時間搜尋合適車次",
                "直接輸入車次號碼",
            )
        );
        $columns[] = array(
            "type" => "date",
            "label" => "去程日期",
            "required" => "on",
            "name" => "toTimeInputField",
            "class" => "field",
            "value" => '',
        );
        $columns[] = array(
            "type" => "text",
            "label" => "去程車次",
            "required" => "on",
            "name" => "toTrainIDInputField",
            "class" => "field",
            "value" => '',
        );
        $columns[] = array(
            "type" => "select",
            "label" => "票數-全票",
            "required" => "on",
            "name" => "ticketPanel:rows:0:ticketAmount",
            "class" => "field",
            "value" => '1',
            "options" => array(
                "0F"=>0, "1F"=>1, "2F"=>2, "3F"=>3, "4F"=>4, "5F"=>5,
                "6F"=>6, "7F"=>7, "8F"=>8, "9F"=>9, "10F"=>10
            )
        );
        $columns[] = array(
            "type" => "text",
            "label" => "身分證",
            "required" => "on",
            "name" => "idInputRadio:idNumber",
            "class" => "field",
            "value" => '',
        );
        $columns[] = array(
            "type" => "text",
            "label" => "電話",
            "required" => "on",
            "name" => "eaiPhoneCon:phoneInputRadio:mobilePhone",
            "class" => "field",
            "value" => '',
        );
        break;
    //台鐵
    case 'railway':
        $OrderUrl = 'https://www.railway.gov.tw/tra-tip-web/tip/tip001/tip121/query';
        //https://www.railway.gov.tw/tra-tip-web/tip/tip00C/tipC21/view?proCode=8ae4cac3756b7b41017572e9077f1790&subCode=8ae4cac3756b7b41017573e352ae18f8
        $TimetableUrl = 'https://www.railway.gov.tw/tra-tip-web/tip/tip001/tip112/querybytrainno';
        
        /*
         * 台鐵搶票
         */
        /*
            //產生站列表，https://www.railway.gov.tw/tra-tip-web/tip/tip001/tip111/view
            var List = {};
            $('.traincode_main').each(function(e) {
                var traincode_main = $(this);
                var index = 0;
                traincode_main.find('.traincode_name1').each(function(e) {
                    var traincode_name = $(this).html();
                    var traincode_code = traincode_main.find('.traincode_code1').eq(index).html();
                    List[traincode_code+'-'+traincode_name] = traincode_name;

                    index++;
                });
            });
            console.log(JSON.stringify(List));
        */
        $StationJson= '{"0900-基隆":"基隆","0910-三坑":"三坑","0920-八堵":"八堵","0930-七堵":"七堵","0940-百福":"百福","0950-五堵":"五堵","0960-汐止":"汐止","0970-汐科":"汐科","0980-南港":"南港","0990-松山":"松山","1000-臺北":"臺北","1010-萬華":"萬華","1020-板橋":"板橋","1030-浮洲":"浮洲","1040-樹林":"樹林","1050-南樹林":"南樹林","1060-山佳":"山佳","1070-鶯歌":"鶯歌","1080-桃園":"桃園","1090-內壢":"內壢","1100-中壢":"中壢","1110-埔心":"埔心","1120-楊梅":"楊梅","1130-富岡":"富岡","1140-新富":"新富","1150-北湖":"北湖","1160-湖口":"湖口","1170-新豐":"新豐","1180-竹北":"竹北","1190-北新竹":"北新竹","1210-新竹":"新竹","1220-三姓橋":"三姓橋","1230-香山":"香山","1240-崎頂":"崎頂","1250-竹南":"竹南","3140-造橋":"造橋","3150-豐富":"豐富","3160-苗栗":"苗栗","3170-南勢":"南勢","3180-銅鑼":"銅鑼","3190-三義":"三義","3210-泰安":"泰安","3220-后里":"后里","3230-豐原":"豐原","3240-栗林":"栗林","3250-潭子":"潭子","3260-頭家厝":"頭家厝","3270-松竹":"松竹","3280-太原":"太原","3290-精武":"精武","3300-臺中":"臺中","3310-五權":"五權","3320-大慶":"大慶","3330-烏日":"烏日","3340-新烏日":"新烏日","3350-成功":"成功","3360-彰化":"彰化","3370-花壇":"花壇","3380-大村":"大村","3390-員林":"員林","3400-永靖":"永靖","3410-社頭":"社頭","3420-田中":"田中","3430-二水":"二水","3450-林內":"林內","3460-石榴":"石榴","3470-斗六":"斗六","3480-斗南":"斗南","3490-石龜":"石龜","4050-大林":"大林","4060-民雄":"民雄","4070-嘉北":"嘉北","4080-嘉義":"嘉義","4090-水上":"水上","4100-南靖":"南靖","4110-後壁":"後壁","4120-新營":"新營","4130-柳營":"柳營","4140-林鳳營":"林鳳營","4150-隆田":"隆田","4160-拔林":"拔林","4170-善化":"善化","4180-南科":"南科","4190-新市":"新市","4200-永康":"永康","4210-大橋":"大橋","4220-臺南":"臺南","4230-林森":"林森","4240-南臺南":"南臺南","4250-保安":"保安","4260-仁德":"仁德","4270-中洲":"中洲","4290-大湖":"大湖","4300-路竹":"路竹","4310-岡山":"岡山","4320-橋頭":"橋頭","4330-楠梓":"楠梓","4340-新左營":"新左營","4350-左營":"左營","4360-內惟":"內惟","4370-美術館":"美術館","4380-鼓山":"鼓山","4390-三塊厝":"三塊厝","4400-高雄":"高雄","4410-民族":"民族","4420-科工館":"科工館","4430-正義":"正義","4440-鳳山":"鳳山","4450-後庄":"後庄","4460-九曲堂":"九曲堂","4470-六塊厝":"六塊厝","5000-屏東":"屏東","2110-談文":"談文","2120-大山":"大山","2130-後龍":"後龍","2140-龍港":"龍港","2150-白沙屯":"白沙屯","2160-新埔":"新埔","2170-通霄":"通霄","2180-苑裡":"苑裡","2190-日南":"日南","2200-大甲":"大甲","2210-臺中港":"臺中港","2220-清水":"清水","2230-沙鹿":"沙鹿","2240-龍井":"龍井","2250-大肚":"大肚","2260-追分":"追分","7390-暖暖":"暖暖","7380-四腳亭":"四腳亭","7360-瑞芳":"瑞芳","7350-猴硐":"猴硐","7330-三貂嶺":"三貂嶺","7320-牡丹":"牡丹","7310-雙溪":"雙溪","7300-貢寮":"貢寮","7290-福隆":"福隆","7280-石城":"石城","7270-大里":"大里","7260-大溪":"大溪","7250-龜山":"龜山","7240-外澳":"外澳","7230-頭城":"頭城","7220-頂埔":"頂埔","7210-礁溪":"礁溪","7200-四城":"四城","7190-宜蘭":"宜蘭","7180-二結":"二結","7170-中里":"中里","7160-羅東":"羅東","7150-冬山":"冬山","7140-新馬":"新馬","7130-蘇澳新站":"蘇澳新站","7120-蘇澳":"蘇澳","7110-永樂":"永樂","7100-東澳":"東澳","7090-南澳":"南澳","7080-武塔":"武塔","7070-漢本":"漢本","7060-和平":"和平","7050-和仁":"和仁","7040-崇德":"崇德","7030-新城":"新城","7020-景美":"景美","7010-北埔":"北埔","7000-花蓮":"花蓮","6250-吉安":"吉安","6240-志學":"志學","6230-平和":"平和","6220-壽豐":"壽豐","6210-豐田":"豐田","6200-林榮新光":"林榮新光","6190-南平":"南平","6180-鳳林":"鳳林","6170-萬榮":"萬榮","6160-光復":"光復","6150-大富":"大富","6140-富源":"富源","6130-瑞穗":"瑞穗","6120-三民":"三民","6110-玉里":"玉里","6100-東里":"東里","6090-東竹":"東竹","6080-富里":"富里","6070-池上":"池上","6060-海端":"海端","6050-關山":"關山","6040-瑞和":"瑞和","6030-瑞源":"瑞源","6020-鹿野":"鹿野","6010-山里":"山里","6000-臺東":"臺東","5010-歸來":"歸來","5020-麟洛":"麟洛","5030-西勢":"西勢","5040-竹田":"竹田","5050-潮州":"潮州","5060-崁頂":"崁頂","5070-南州":"南州","5080-鎮安":"鎮安","5090-林邊":"林邊","5100-佳冬":"佳冬","5110-東海":"東海","5120-枋寮":"枋寮","5130-加祿":"加祿","5140-內獅":"內獅","5160-枋山":"枋山","5190-大武":"大武","5200-瀧溪":"瀧溪","5210-金崙":"金崙","5220-太麻里":"太麻里","5230-知本":"知本","5240-康樂":"康樂"}';
        $columns[] = array(
            "type" => "text",
            "label" => "身份證",
            "required" => "on",
            "name" => "pid",
            "class" => "field",
            "value" => '',
        );
        $columns[] = array(
            "type" => "select",
            "label" => "出發站",
            "required" => "on",
            "name" => "startStation",
            "class" => "field",
            "value" => '',
            "options" => json_decode($StationJson, true)
        );
        $columns[] = array(
            "type" => "select",
            "label" => "抵達站",
            "required" => "on",
            "name" => "endStation",
            "class" => "field",
            "value" => '',
            "options" => json_decode($StationJson, true)
        );
        $columns[] = array(
            "type" => "radio",
            "label" => "訂票方式",
            "required" => "on",
            "name" => "orderType",
            "class" => "field",
            "value" => '0',
            "disabled" => 1,
            "options" => array(
                "依車次",
                "依時段",
            )
        );
        $columns[] = array(
            "type" => "select",
            "label" => "一般座票數",
            "required" => "on",
            "name" => "normalQty",
            "class" => "field",
            "value" => '1',
            "options" => array(
                0, 1, 2, 3, 4, 5,
                6, 7, 8, 9, 10
            )
        );
        $columns[] = array(
            "type" => "date",
            "label" => "去程日期",
            "required" => "on",
            "name" => "ticketOrderParamList[0].rideDate",
            "class" => "field",
            "value" => '',
        );
        $columns[] = array(
            "type" => "text",
            "label" => "去程車次",
            "required" => "on",
            "name" => "ticketOrderParamList[0].trainNoList[0]",
            "class" => "field",
            "value" => '',
        );
        break;
    //kktix.com
    case 'kktix':
        $OrderUrl = 'https://kktix.com/';
        $TimetableUrl = '';
        $columns[] = array(
            "type" => "text",
            "label" => "區域",
            "required" => "on",
            "name" => "ChooseArea",
            "class" => "field",
            "value" => '',
        );
        $columns[] = array(
            "type" => "text",
            "label" => "價位",
            "required" => "on",
            "name" => "ChoosePrice",
            "class" => "field",
            "value" => '',
        );
        $columns[] = array(
            "type" => "text",
            "label" => "數量",
            "required" => "on",
            "name" => "ChooseQty",
            "class" => "field",
            "value" => '1',
        );
        $columns[] = array(
            "type" => "text",
            "label" => "自動填入答案(已知答案才要填",
            "required" => "off",
            "name" => "ChooseQuestion",
            "class" => "field",
            "value" => '',
        );
        break;
    //tixcraft.com
    case 'tixCraft':
        $OrderUrl = 'https://tixcraft.com/activity';
        $TimetableUrl = '';
        $columns[] = array(
            "type" => "date",
            "label" => "活動日期",
            "required" => "on",
            "name" => "ChooseDate",
            "class" => "field",
            "value" => '',
        );
        $columns[] = array(
            "type" => "text",
            "label" => "活動名稱",
            "required" => "on",
            "name" => "ChooseTitle",
            "class" => "field",
            "value" => '',
        );
        $columns[] = array(
            "type" => "text",
            "label" => "活動地點",
            "required" => "on",
            "name" => "ChoosePlace",
            "class" => "field",
            "value" => '',
        );
        $columns[] = array(
            "type" => "text",
            "label" => "區域",
            "required" => "on",
            "name" => "ChooseArea",
            "class" => "field",
            "value" => '',
        );
        $columns[] = array(
            "type" => "text",
            "label" => "價位",
            "required" => "on",
            "name" => "ChoosePrice",
            "class" => "field",
            "value" => '',
        );
        $columns[] = array(
            "type" => "text",
            "label" => "數量",
            "required" => "on",
            "name" => "ChooseQty",
            "class" => "field",
            "value" => '1',
        );
        $columns[] = array(
            "type" => "text",
            "label" => "自動填入答案(已知答案才要填",
            "required" => "off",
            "name" => "ChooseQuestion",
            "class" => "field",
            "value" => '',
        );
        break;
}
$typeList = array(
    "thsrc" => "高鐵",
    "railway" => "台鐵",
    "kktix" => "KKTIX",
    "tixCraft" => "拓元",
);
$TPL->assign('columns', $columns);
$TPL->assign('type', $type);
$TPL->assign('OrderUrl', $OrderUrl);
$TPL->assign('TimetableUrl', $TimetableUrl);
$TPL->assign('typeList', $typeList);

?>