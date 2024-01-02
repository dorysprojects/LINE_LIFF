<?php

$line = new kLineMessaging();
$SQL_Member = new kSQL('LineMember');

$search = $_SESSION[__DOMAIN.'_'._Module.'_'._Action.'_search'];
$JSON_search = str_replace(array('"', "'"), '', preg_replace('/\\\\/', "%", json_encode($search)));
$MemberList = $SQL_Member->SetAction('select')
                        ->SetWhere("tablename='member'")
                        ->SetWhere("prev='line'")
                        ->SetWhere("next='myself'")
                        ->SetWhere("propertyA != ''", !empty($search) ? 0 : 1)
                        ->SetWhere("subject not like '%".'"displayName":""'."%'", !empty($search) ? 0 : 1)
                        ->SetWhere("propertyA = '$search' OR subject like '%".'"displayName":"%'.$JSON_search.'%"'."%'", !empty($search) ? 1 : 0)
                        ->BuildQuery();
$RichMenuList = $line->RichMenuList();

$TPL->assign('MemberList', $MemberList);
$TPL->assign('RichMenuList', $RichMenuList['richmenus']);
$TPL->assign('search', $search);

?>