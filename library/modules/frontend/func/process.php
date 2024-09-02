<?php

function exeEinvoice($_this) {
    $return['msg'] = "";
    include __LIB . "/core/class/kEinvoice.php";
    $kEinvoice = new kEinvoice();
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
    $line = new kLineMessaging();
    $FELX = new FELX();
    switch($_this->my['FormType']){
        case 'invoice'://發票資訊
            if(empty($_this->my['fields']['invTxt']) || empty($_this->my['fields']['invNum'])){
                if(!empty($return['msg'])){
                    $return['msg'] .= "、";
                }
                $return['msg'] .= "發票號碼";
            }
            if(empty($_this->my['fields']['invDate'])){
                if(!empty($return['msg'])){
                    $return['msg'] .= "、";
                }
                $return['msg'] .= "開立時間";
            }
            if(empty($_this->my['fields']['randomNumber'])){
                if(!empty($return['msg'])){
                    $return['msg'] .= "、";
                }
                $return['msg'] .= "隨機碼";
            }
            
            if(empty($return['msg'])){
                $invDateTmp = explode('-', $_this->my['fields']['invDate']);
                $invYear = ($invDateTmp[0]*1-1911);
                $invMonth =  $invDateTmp[1];
                $invDay =  $invDateTmp[2];
                $qryInvDetail = $kEinvoice->qryInvDetail(array(
                    'invNum' => $_this->my['fields']['invTxt'] . $_this->my['fields']['invNum'],//*必填，發票號碼
                    'invTerm' => $invYear . $invTermList[$invMonth],//*必填，年份(民國)月份
//                    'invDate' => $invYear . $invMonth . $invDay,//日期
                    'randomNumber'=> $_this->my['fields']['randomNumber'],//*必填，隨機碼
                ));
                $return['Data2'] = $qryInvDetail;
                if($qryInvDetail['code']==200){
                    //
                    $qryInvDetail['invDate'] = $_this->my['fields']['invDate'];
                    $qryInvDetail['invNum'] = $_this->my['fields']['invTxt'] . $_this->my['fields']['invNum'];
                    $qryInvDetail['invTerm'] = $invYear . $invTermList[$invMonth];
                    $qryInvDetail['randomNumber'] = $_this->my['fields']['randomNumber'];
                    $qryInvDetail['buyerBan'] = $qryInvDetail['buyerBan'];
                    $qryInvDetail['encrypt'] = $qryInvDetail['encrypt'];
                    $qryInvDetail['QrCode'] = $kEinvoice->TurnQrCode($qryInvDetail, $BGcolor = array(255,255,255));
                    $title = '電子發票證明聯';
                    $line->SetMessageObject($FELX->FLEX_SendMessage($title, $FELX->FLEX_Receipt($qryInvDetail)));
                    $return['Data'] = $line->action['data'];
                }else{
                    $return['msg'] = $qryInvDetail['msg'];
                }
            }else{
                $return['msg'] = "請輸入：" . $return['msg'];
            }
            break;
        case 'card'://電子載具資訊
            switch (kCore_get('targetId')) {
                case 'sendCardBtn':
                    if(empty($_this->my['fields']['cardType'])){
                        if(!empty($return['msg'])){
                            $return['msg'] .= "、";
                        }
                        $return['msg'] .= "載具類型";
                    }
                    if(empty($_this->my['fields']['cardNo'])){
                        if(!empty($return['msg'])){
                            $return['msg'] .= "、";
                        }
                        $return['msg'] .= "手機/載具條碼";
                    }
                    if(empty($_this->my['fields']['cardEncrypt'])){
                        if(!empty($return['msg'])){
                            $return['msg'] .= "、";
                        }
                        $return['msg'] .= "手機/載具認證碼";
                    }
                    if(empty($_this->my['fields']['startDate'])){
                        if(!empty($return['msg'])){
                            $return['msg'] .= "、";
                        }
                        $return['msg'] .= "開始日期";
                    }
                    if(empty($_this->my['fields']['endDate'])){
                        if(!empty($return['msg'])){
                            $return['msg'] .= "、";
                        }
                        $return['msg'] .= "結束日期";
                    }
                    if(empty($return['msg'])){
                        $carrierInvChk = $kEinvoice->carrierInvChk(array(
                            'cardType' => $_this->my['fields']['cardType'],//*必填，卡別
                            'cardNo' => $_this->my['fields']['cardNo'],//*必填，手機條碼/卡片(載具)隱碼 0966653569、/BU7RRVM
                            'cardEncrypt' => $_this->my['fields']['cardEncrypt'],//*必填，手機條碼驗證碼/卡片(載具)驗證碼
                            'startDate' => date("Y/m/d", strtotime($_this->my['fields']['startDate'])),//*必填，詢起始時間 (y/M/d)
                            'endDate' => date("Y/m/d", strtotime($_this->my['fields']['endDate'])),//*必填，查詢結束時間 (y/M/d)
                        ));
                        if($carrierInvChk['code']==200){
                            //
                            $return['Data'] = $carrierInvChk;
                        }else{
                            $return['msg'] = $carrierInvChk['msg'];
                        }
                    }else{
                        $return['msg'] = "請輸入：" . $return['msg'];
                    }
                    break;
                case 'sendBtn':
                    if(empty($_this->my['fields']['choose'])){
                        $return['msg'] = "請選擇發票";
                    }else{
                        $choose = json_decode($_this->my['fields']['choose'], true);
                        $_this->my['fields'] = $choose ? array_merge($_this->my['fields'], $choose) : $_this->my['fields'];
                    }
                    if(empty($return['msg'])){
                        $carrierInvDetail = $kEinvoice->carrierInvDetail(array(
                            'cardType' => $_this->my['fields']['cardType'],//*必填，卡別
                            'cardNo' => $_this->my['fields']['cardNo'],//*必填，手機條碼/卡片(載具)隱碼 0966653569、/BU7RRVM
                            'cardEncrypt' => $_this->my['fields']['cardEncrypt'],//*必填，手機條碼驗證碼/卡片(載具)驗證碼
                            'invNum' => $_this->my['fields']['invNum'],//*必填，發票號碼
                            'invDate' => ($_this->my['fields']['invDate']['year']+1911) .'/'. substr('0'.$_this->my['fields']['invDate']['month'], -2) .'/'. substr('0'.$_this->my['fields']['invDate']['date'], -2),//*必填，發票日期 (y/M/d)
                            'amount' => $_this->my['fields']['amount'],//金額
                        ));
                        $return['Data2'] = $carrierInvDetail;
                        if($carrierInvDetail['code']==200){
                            $carrierInvDetail['invTerm'] = $_this->my['fields']['invDate']['year'] . $invTermList[substr('0'.$_this->my['fields']['invDate']['month'], -2)];
                            $carrierInvDetail['randomNumber'] = substr('0000'.$carrierInvDetail['amount'], -4);
                            $carrierInvDetail['encrypt'] = $_this->my['fields']['cardEncrypt'];
                            $carrierInvDetail['QrCode'] = $kEinvoice->TurnQrCode($carrierInvDetail, $BGcolor = array(255,255,255));
                            $title = '電子發票證明聯';
                            $line->SetMessageObject($FELX->FLEX_SendMessage($title, $FELX->FLEX_Receipt($carrierInvDetail)));
                            $return['Data'] = $line->action['data'];
                        }else{
                            $return['msg'] = $carrierInvDetail['msg'];
                        }
                    }
                    break;
            }
            break;
    }
    $return['state'] = empty($return['msg']) ? TRUE : FALSE;
    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg'], 'Data' => $return['Data'], 'Data2' => $return['Data2']));
}

//執行請求函數
$_this = new stdClass();
if($_POST){
    $_this->my = $_POST;
}
if($_GET){
    $_this->my = $_this->my ? array_merge($_this->my, $_GET) : $_GET;
}
$ps = kCore_get('ps');
if (function_exists($ps))
	call_user_func($ps, $_this);
else
	echo $ps . '請求不存在';
exit;

