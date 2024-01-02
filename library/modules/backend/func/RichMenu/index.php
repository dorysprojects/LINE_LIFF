<?php

$DBlink = mysqli_connect(__DB_HOST, __DB_USER, __DB_PWD) or die('連線失敗!!');
mysqli_select_db($DBlink, __DB_NAME);
mysqli_query($DBlink, "ALTER TABLE RichMenu MODIFY prev3 varchar(20)");
mysqli_query($DBlink, "ALTER TABLE RichMenu MODIFY prev4 varchar(20)");

$columns = array(
    "code" => "代碼",
    "img0" => "選單圖片",
    "subject" => "選單名稱(後台備註用)",
    "BarText" => "選單文字",
    "viewA" => "選單狀態",
    "propertyA" => "RichMenuId",
    "DefaultTime" => "「預設選單」使用期間",
);
$columnsType = array(
    "code" => "view",
    "img0" => "view",
    "subject" => "text",
    "BarText" => "view",
    "viewA" => "view",
    "propertyA" => "view",
    "DefaultTime" => "view",
);
$system = array(
    "propertyC" => array(
        "type" => "view",
        "text" => "恢復預設選單",
        "value" => 'BOT(_)RichMenu(_)default',
    ),
);
$line = new kLineMessaging();
$GetDefaultRichMenu = $line->GetDefaultRichMenu();
$RichMenuList = $line->RichMenuList();
if($RichMenuList['richmenus']){
    $RichMenuIdList = array_column($RichMenuList['richmenus'], 'richMenuId');
//    print_r($RichMenuList);
}
$Data = $SQL->SetAction('select')
    ->SetWhere("tablename='RichMenu'")
    ->SetWhere("next='myself'")
    ->BuildQuery();

if($RichMenuList['richmenus']){
    if($Data && $RichMenuIdList){
        foreach ($Data as $key => $value) {
            if(!in_array($value['propertyA'], $RichMenuIdList)){
                $Delete_rich_menus = $SQL->SetAction('delete')
                                        ->SetWhere("id='".$value['id']."'")
                                        ->BuildQuery();
                unset($Data[$key]);
            }
        }
    }
    $Select_RichMenuIdList = array_column($Data, 'propertyA');
    foreach ($RichMenuList['richmenus'] as $key => $value) {
        if(!$Data || ($Select_RichMenuIdList && !in_array($value['richMenuId'], $Select_RichMenuIdList)) ){
            $SaveItem['propertyA'] = $value['richMenuId'];
            $SaveItem['viewA'] = 'on';
            $SaveItem['subject']['subject'] = $value['name'];
            $SaveItem['subject']['BarText'] = $value['chatBarText'];
            $SaveItem['subject']['ShowType'] = ($value['selected'] === true) ? 'on' : 'off';
            $SaveItem['subject']['actions'] = json_encode($value['areas']);
            $SaveItem['id'] = $SQL->getAuto_INCREMENT();
            
            $Insert_rich_menus = $SQL->SetAction('insert')
                                    ->SetValue("propertyA", $SaveItem['propertyA'])
                                    ->SetValue("viewA", $SaveItem['viewA'])
                                    ->SetValue("subject", json_encode($SaveItem['subject']))
                                    ->BuildQuery();
            if($Insert_rich_menus){
                $Data[] = $SaveItem;
            }
        }
    }
}

$rows = array();
if($Data){
    foreach ($Data as $key => $value) {
        $FromLine = '';
        if($value['subject']['img0']){
            $src = __WEB_UPLOAD.'/image/'. $value['subject']['img0'];
        }else if($value['propertyA']){
            $src = __CustomStickers_Web.'/ft/img/richMenuId/' . $value['propertyA'];
            if($src){
                $FromLine = '<span>(Line)</span>';
            }else{
                $FromLine = '<img style="height:60px;display: none;" class="img-thumbnail" id="previews_'.$value['id'].'_img0" src="#" alt="上傳圖片" />
                            <label class="btn btn-warning">
                                <input style="display:none;" name="'.$value['id'].'_img0" onchange="init_inputImagemapImg(this, '."'RichMenu'".');" type="file" class="form-control">
                                <i class="fa fa-photo"></i>上傳圖片
                            </label>';
            }
        }
        $iconclass = ($value['propertyA']===$GetDefaultRichMenu['richMenuId']) ? 'ban' : 'home';
        $onclickaction = ($value['propertyA']===$GetDefaultRichMenu['richMenuId']) ? 'Cancel' : 'Set';
        $onclick = 'onclick="UpdateDefaultRichMenu('."'".$onclickaction."', '".$value['propertyA']."', '".$value['subject']['subject']."', ".'$(this));"';
        $customEdit = '<label class="btn btn-warning btn-sm" crontab_start="'.$value['prev3'].'" crontab_end="'.$value['prev4'].'"  '.$onclick.'><i class="fa fa-'.$iconclass.'"></i></label>';
        $rows[] = array(
            "id" => $value['id'],
            "code" => 'BOT(_)RichMenu(_)' . $value['id'],
            "img0" => '<img style="height:60px;" src="'. $src .'">'.$FromLine,
            "subject" => $value['subject']['subject'],
            "BarText" => $value['subject']['BarText'],
            "viewA" => ($value['viewA']==='on') ? "已上傳" : "未上傳",
            "propertyA" => $value['propertyA'],
            'customEdit' => $customEdit,
            "DefaultTime" => $value['prev3'].'<br/>~<br/>'.$value['prev4'],
        );
    }
}

$TopCustomEdit = '<a class="btn bg-olive btn-sm" href="/be/RichMenu/ChangeRichMenu"><i class="fa fa-refresh"></i></a>'
               . '<a class="btn bg-navy btn-sm" style="margin-left: 5px;" href="/be/RichMenu/UserRichMenu"><i class="fa fa-eye"></i></a>';
$TPL->assign('TopCustomEdit', $TopCustomEdit);
$TPL->assign('columns', $columns);
$TPL->assign('columnsType', $columnsType);
$TPL->assign('system', $system);
$TPL->assign('rows', $rows);
$TPL->assign('nosave', 0);

?>