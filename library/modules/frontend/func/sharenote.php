<?php

$module = $_GET['module'];
$admin = $_GET['admin'];
$userId = $_GET['userId'];
$displayName = $_GET['displayName'];
$pictureUrl = $_GET['pictureUrl'];
$level = 'user';

date_default_timezone_set('Asia/Taipei');
$datetime = date('Y-m-d h:i:sa');

if(!empty($admin)){
    if(!empty($userId)){
        $_SESSION['redirect'] = NULL;
        $_SESSION['data'] = NULL;
        $update = 0;

        switch($module){
            case 'note':
            case 'place':
                $SQL_module = new kSQL($module);
                if($userId != $admin){
                    $gethistory = $SQL_module->SetAction('select')
                                            ->SetWhere("next='". $level ."'")
                                            ->SetWhere("prev='". $admin ."'")
                                            ->SetWhere("propertyA='". $userId ."'")
                                            ->BuildQuery();
                    if(!$gethistory[0]){
                        $update = 1;
                    }
                }
                if($update == 1){
                    $subject = array(
                        "displayName" => $displayName,
                        "pictureUrl" => $pictureUrl,
                        "statusMessage" => $statusMessage,
                    );
                    $SQL_module->SetAction('replace')
                            ->SetValue("tablename", $module)
                            ->SetValue("prev", $admin)
                            ->SetValue("next", "user")
                            ->SetValue("subject", json_encode($subject))
                            ->SetValue("viewA", "false")
                            ->SetValue("propertyA", $userId)
                            ->SetValue("create_at", $SQL_module->getNowTime())
                            ->BuildQuery();
                    echo "<script>alert('你已成為管理者，請關閉視窗');</script>";
                }else{
                    echo "<script>alert('你已是管理者，請關閉視窗');</script>";
                }
                break;
            default:
                echo "<script>alert('連結有誤');</script>";
                break;
        }
    }else{
        $kLineLogin = new kLineLogin();
        header("Location: " . $kLineLogin->Authorization('sharenote?module='.$module, array("admin"=>$admin)));
    }
}