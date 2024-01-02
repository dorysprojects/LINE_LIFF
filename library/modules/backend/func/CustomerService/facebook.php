<?php

$FacebookMemberData = $_SESSION[__DOMAIN.'FacebookMemberData'];
$RecentFacebookMembers = $SQL_LineRecord->SetAction("SELECT DISTINCT propertyA,MAX(id) FROM LineRecord")
                                        ->SetWhere("tablename='facebook'")
                                        ->SetWhere("next!='account_linkin'")
                                        ->SetWhere("content IS NULL OR content not like '". '%"error":%' ."'")
                                        ->SetOrder("MAX(id) DESC")
                                        ->SetGroup("propertyA")
                                        ->echoSQL(0)
                                        ->BuildQuery();
//print_r($RecentFacebookMembers);
$RecentFacebookMemberList = array();
if(!empty($FacebookMemberData)){
    if(!empty($RecentFacebookMembers)){
        $MemberList = array_column($RecentFacebookMembers, 'propertyA');
        $MemberDiffList = array_diff($MemberList, array_column($FacebookMemberData, 'propertyA'));
        if(!empty($MemberDiffList)){
            $MemberNewData = $SQL_LineMember->SetAction('select')
                                            ->SetWhere("tablename='member'")
                                            ->SetWhere("prev='facebook'")
                                            ->SetWhere("next='myself'")
                                            ->SetWhere("propertyA in ('". implode("','", $MemberDiffList) ."')")
                                            ->BuildQuery();
        }
        if(!empty($MemberNewData)){
            $FacebookMemberData = array_merge($FacebookMemberData, $MemberNewData);
            $_SESSION[__DOMAIN.'FacebookMemberData'] = $FacebookMemberData;
        }
        $FacebookMemberData_UID = kCore_SetKey($FacebookMemberData, 'propertyA');
        foreach ($MemberList as $key => $UID) {
            if($key===0){
                $FacebookLastRecordId = $SQL_LineRecord->SetAction('select')->SetWhere("propertyA='". $UID ."'")->SetWhere("prev!='service'")->SetWhere("viewA!='on' OR viewA IS NULL")->SetOrder("id DESC")->SetLimit(1)->BuildQuery();
                if($FacebookLastRecordId[0]['id']){
                    $objResponse->call('PlaySound', $FacebookMemberData_UID[$UID]['subject']['displayName'], 'facebook', $FacebookLastRecordId[0]['id']);
                }
            }
            $RecentFacebookMemberList[] = $FacebookMemberData_UID[$UID];
        }
        foreach ($FacebookMemberData as $key => $Member) {
            if(!in_array($Member['propertyA'], $MemberList)){
                $RecentFacebookMemberList[] = $Member;
            }
        }
    }else{
        $RecentFacebookMemberList = $FacebookMemberData;
    }
}

if(!empty($RecentFacebookMemberList)){
    $FacebookTotalMember = 0;
    $RoomList = 'RoomList';
    $SearchBtn = 'SearchBtn';
    $ChatBox = 'ChatBox';
    $UserSelect = 'UserSelect';
    
    $objResponse->script('$("#'.$RoomList.'").html("");');
    foreach ($RecentFacebookMemberList as $key => $Member) {
        $message = NULL;
        $view = NULL;
        $FilterAttr = '';
        if((!empty($MemberList) && in_array($Member['propertyA'], $MemberList))){
            $message = $SQL_LineRecord->SetAction("select")
                            ->SetWhere("tablename='facebook'")
                            ->SetWhere("prev!='service'")
                            ->SetWhere("next!='account_linkin'")
                            ->SetWhere("propertyA='". $Member['propertyA'] ."'")
                            ->SetOrder("id DESC")
                            ->SetLimit('1')
                            ->echoSQL(0)
                            ->BuildQuery();
            if(kCore_CheckAuthority('Tag', 'index')){
                $MemberTags = kCore_Tag('SelectOptionVals', array('userId'=>$Member['propertyA']));
                if(!empty($MemberTags)){
                    foreach ($MemberTags as $tkey => $tvalue) {
                        $FilterAttr .= !empty($FilterAttr) ? '、tag-'.$tvalue : 'tag-'.$tvalue;
                    }
                }
            }
        }
        $RecentFacebookMemberList[$key]['message'] = $message[0];
        if(!empty($message[0])){
            if( $message[0]['viewA']!='on' && $Member['propertyA']!==$ChatMember ){
                $RedBubble = '<span class="badge badge-primary badge-rounded">1</span>';
                $FacebookTotalMember++;
            }else{
                $RedBubble = '';
            }
            $DefaultText = $Member['subject']['displayName'] . '向您傳送了';
            switch ($message[0]['next']) {
                case 'text':
                    $view = str_replace("\n", '<br>', $message[0]['subject']['message']['text']);
                    break;
                case 'image':
                    $view = $DefaultText . '圖片';
                    break;
                case 'audio':
                    $view = $DefaultText . '語音';
                    break;
                case 'video':
                    $view = $DefaultText . '影片';
                    break;
                case 'location':
                    $view = $DefaultText . '位置';
                    break;
                case 'file':
                    $view = $DefaultText . '檔案';
                    break;
                default :
                    $view = $DefaultText . $message[0]['next'];
                    break;
            }
            $pictureUrl = $RecentFacebookMemberList[$key]['subject']['pictureUrl'] = $Member['subject']['pictureUrl'] ? $Member['subject']['pictureUrl'] : __RES_Web.'/images/person.jpg';// onerror="this.src='."'". __RES_Web.'/images/person.jpg' ."';".'"
            $ChatRoomClass = '';
            if(!empty($Member['propertyE'])){
                $ChatRoomClass = 'lineStyle fbStyle';
            }else{
                $ChatRoomClass = 'fbStyle';
            }
            if($Member['propertyA']==$ChatMember){
                $objResponse->script("$('#UserPic').css('background-image', 'url(".$pictureUrl."), url(".__RES_Web."/images/person.jpg)');$('#UserName').html('".$Member['subject']['displayName']."');$('#UserTime').html('".$message[0]['create_at']."');");
            }
            $_Html = '<li FilterSearch="'. $FilterAttr .'" UID="'. $Member['propertyA'] .'" displayName="'. $Member['subject']['displayName'] .'" ChatRoom="facebook" pictureUrl="'. $pictureUrl .'" Time="'. $message[0]['create_at'] .'" onclick="'.$UserSelect.'($(this));">\
                            <div class="conversation">\
                                <div class="user-avatar user-avatar-rounded"><!-- online、offline、recently-active -->\
                                    <div class="chatriq-user '. $ChatRoomClass .'" style="background-image: url('. $pictureUrl .'), url('. __RES_Web .'/images/person.jpg);"></div><!-- chatriq-user-01~14  style="background-image: url(), url({#$__RES_Web#}/images/person.jpg);" -->\
                                </div>\
                                <div class="conversation__details">\
                                    <div class="conversation__name">\
                                        <span class="conversation__name--title">'. $Member['subject']['displayName'] .'</span>\
                                        <span class="conversation__time">'. $message[0]['create_at'] .'</span>\
                                    </div>\
                                    <div class="conversation__message">\
                                        <div class="conversation__message-preview">'. $view .'</div>\
                                        '. $RedBubble .'\
                                        <!--\
                                            <span><i class="mdi mdi-pin"></i></span>\
                                            <span><i class="mdi mdi-volume-mute"></i></span>\
                                            <span class="badge badge-primary badge-rounded">9</span>\
                                        -->\
                                    </div>\
                                </div>\
                            </div>\
                        </li>';
            if(!empty($_Html)){
                $objResponse->script('$("#'.$RoomList.'").append('."'". $_Html ."'".');');
            }
        }
        $RecentFacebookMemberList[$key]['message']['view'] = $view;
        $objResponse->script('$("#'.$SearchBtn.'").click();if('.$FacebookTotalMember.'==0){ $("#FacebookRedBubble").addClass("hide"); }else{ $("#FacebookRedBubble").removeClass("hide"); }$("#FacebookRedBubble").html("'. $FacebookTotalMember .'");');
    }
}
if(!empty($ChatMember)){
    LoadMsg('facebook', $ChatMember, 0, 'append', $objResponse, 'update');
}

