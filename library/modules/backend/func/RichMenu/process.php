<?php
    
    //上傳到Line
    function RichMenuMap($id = NULL) {
        if($id){
            $line = new kLineMessaging();
            $SQL = new kSQL('RichMenu');
            $Select_rich_menus = $SQL->SetAction('select')
                                    ->SetWhere("id='".$id."'")
                                    ->BuildQuery();
            if($Select_rich_menus){
                $Select_rich_menus = $Select_rich_menus[0];
                
                $pic = $Select_rich_menus['subject']['img0'];
                if(!empty($pic)){
                    $imginfo = getimagesize(__WEB_UPLOAD . '/image/' . $pic);  
                    $size['width'] = $imginfo[0];
                    $size['height'] = $imginfo[1];
                }
                $ShowType = $Select_rich_menus['subject']['ShowType'];
                $subject = $Select_rich_menus['subject']['subject'];
                $BarText = $Select_rich_menus['subject']['BarText'];
                $actions = $Select_rich_menus['subject']['actions'];
                
                if($size && $ShowType && $subject && $BarText && $actions){
                    $state1 = $line->RichMenuCreate($size, $ShowType, $subject, $BarText, json_decode($actions, true));
                    if($state1['richMenuId']){
                        $state2 = $line->RichMenuUpload($state1['richMenuId'], __WEB_UPLOAD.'/image/'.$pic, $imginfo['mime']);
                    }
                    if($state1 && !$state2){
                        if($Select_rich_menus['propertyA']){
                            $state3 = $line->RichMenuDelete($Select_rich_menus['propertyA']);
                        }
                        $Store = $SQL
                                        ->SetAction('update')
                                        ->SetWhere("id='".$id."'")
                                        ->SetValue('propertyA', $state1['richMenuId'])
                                        ->SetValue('viewA', 'on')
                                        ->BuildQuery();
                    }
                    $return['state'] = ($Store) ? true : false;
                }else{
                    $return['state'] = false;
                }
            }else{
                $return['state'] = false;
            }
        }
        $return['msg'] = $return['state'] ? '上傳成功' : '上傳失敗';
        return $return;
    }
    
    function AddRow($_this, $_Module){
        $PS = new kProcess();
        $SQL = new kSQL($_Module);
        $id = $SQL->getAuto_INCREMENT();
        $errorMsg = '';
        if(empty($_this->my['fields']['subject']['img0']) && empty($_FILES['img0']['tmp_name'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '選單圖片未上傳';
        }
        if(empty($_this->my['fields']['subject']['subject'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '選單名稱未填';
        }
        if(empty($_this->my['fields']['subject']['BarText'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '選單文字未填';
        }
        $actions = json_decode($_this->my['fields']['subject']['actions'], true);
        $actionCtn = 0;
        if($actions){
            foreach ($actions as $actKey => $actVal) {
                if($actVal['action']['type']){
                    switch($actVal['action']['type']){
                        case 'message':
                            $dataName = "text";
                            break;
                        case 'uri':
                            $dataName = "linkUri";
                            break;
                        case 'noaction':
                            $dataName = "unset";
                            break;
                        case 'postback':
                            $dataName = "data";
                            break;
                    }
                    if($dataName==='unset' || $actVal['action'][$dataName]){
                        $actionCtn++;
                    }
                }
            }
        }
        if($actionCtn===0){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '至少新增一個區域「需填寫:按鈕-動作、按鈕-內容(不設定動作可忽略)」';
        }
        if($errorMsg){
            $return['state'] = false;
            $return['msg'] = $errorMsg;
        }else{
            $PS->AddRow($_this, $_Module);
            $return = RichMenuMap($id);
        }
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }

    function UpdateRow($_this, $_Module){
        $PS = new kProcess();
        $id = kCore_get('id');
        $errorMsg = '';
        if(empty($_this->my['fields']['subject']['img0']) && empty($_FILES['img0']['tmp_name'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '選單圖片未上傳';
        }
        if(empty($_this->my['fields']['subject']['subject'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '選單名稱未填';
        }
        if(empty($_this->my['fields']['subject']['BarText'])){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '選單文字未填';
        }
        $actions = json_decode($_this->my['fields']['subject']['actions'], true);
        $actionCtn = 0;
        if($actions){
            foreach ($actions as $actKey => $actVal) {
                if($actVal['action']['type']){
                    switch($actVal['action']['type']){
                        case 'message':
                            $dataName = "text";
                            break;
                        case 'uri':
                            $dataName = "linkUri";
                            break;
                        case 'noaction':
                            $dataName = "unset";
                            break;
                        case 'postback':
                            $dataName = "data";
                            break;
                    }
                    if($dataName==='unset' || $actVal['action'][$dataName]){
                        $actionCtn++;
                    }
                }
            }
        }
        if($actionCtn===0){
            if($errorMsg){
                $errorMsg .= '、';
            }
            $errorMsg .= '至少新增一個區域「需填寫:按鈕-動作、按鈕-內容(不設定動作可忽略)」';
        }
        if($errorMsg){
            $return['state'] = false;
            $return['msg'] = $errorMsg;
        }else{
            $PS->UpdateRow($_this, $_Module);
            $return = RichMenuMap($id);
        }
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }
    
    function DeleteMultiRows($_this, $_Module){
        $PS = new kProcess();
        $line = new kLineMessaging();
        $SQL = new kSQL($_Module);
        if($_this->my && $_this->my['select']){
            foreach ($_this->my['select'] as $id => $flag) {
                if($id!='' && $flag=='on'){
                    $Select_rich_menu = $SQL->SetAction('select')->SetWhere("id='". $id ."'")->BuildQuery();
                    $line->RichMenuDelete($Select_rich_menu[0]['propertyA']);
                }
            }
        }
        $return = $PS->DeleteMultiRows($_this, $_Module);
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }
    
    function SaveMultiRows($_this, $_Module){
        $line = new kLineMessaging();
        $SQL = new kSQL($_Module);
        $FILE = new kFile();
        
        if($_FILES){
            $FileReturn = $FILE->upload(); //上傳檔案
            $EachFileReturn = $FileReturn['subject'];
            foreach ($EachFileReturn as $key => $val) {
                $fileValKeys = array_keys($val);
                $fileKey = $fileValKeys[0];
                $fileName = $fileValKeys[1];
                $fileSize = $fileValKeys[2];
                $fileKey_Val = $val[$fileKey];
                $fileName_Val = $val[$fileName];
                $fileSize_Val = $val[$fileSize];
                $Key = explode('_', $fileKey);
                $id = $Key[0];
                $RealKey = $Key[1];
                if($id!='' && $RealKey==='img0'){
                    $OldData = $SQL->SetAction('select')->SetWhere("id='". $id ."'")->BuildQuery();
                    $subject = $OldData[0]['subject'];
                    $picinfo = explode('.', $fileKey_Val);
                    $subject['img0'] = $fileKey_Val;
                    $subject['img0name'] = $fileName_Val;
                    $subject['img0size'] = $fileSize_Val;
                    
                    $state1 = $line->RichMenuUpload($OldData[0]['propertyA'], __WEB_UPLOAD.'/image/'.$fileKey_Val, 'image/'.$picinfo[1]);
                    if(!$state1){
                        $Store = $SQL->SetAction('update')
                                    ->SetWhere("id='".$id."'")
                                    ->SetValue('subject', json_encode($subject))
                                    ->BuildQuery();
                    }
                }
            }
        }
        $return['state'] = true;
        $return['msg'] = '更新資料成功';
	    echo json_encode(array('state' => $return['state'], 'msg' => $return['msg']));
    }

$_From = kCore_get('FrontEndAndBackEnd', $_SERVER['PATH_TRANSLATED']);
$_Module = !empty($_From) ? kCore_get($_From, $_SERVER['PATH_TRANSLATED']) : '';
$_Action = ($_From=='backend') ? kCore_get($_Module) : '';
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
	call_user_func($ps, $_this, $_Module);
else
	echo $ps . '請求不存在';
exit;

?>