<?php

$xajax->register(XAJAX_FUNCTION, 'login');

function login($account=NULL, $password=NULL) {
    $objResponse = new xajaxResponse();
    $SQL_Authority = new kSQL('Authority');
    $Authority = $SQL_Authority->SetAction('select')
                                ->SetWhere("tablename='Authority'")
                                ->SetWhere("next='myself'")
                                ->SetWhere("propertyB='$account'")
                                ->SetWhere("propertyC='$password'")
                                ->BuildQuery();
    if($Authority[0]){
        if($Authority[0]['viewA']==='off'){
            $objResponse->script("AlertMsg('danger', '此帳號已凍結', '');");
        }else{
            $_SESSION[__DOMAIN.'_backend'] = $Authority[0];
            $redirectUrl = $_SESSION[__DOMAIN.'_redirect'];
            if($redirectUrl){
                unset($_SESSION[__DOMAIN.'_redirect']);
                $objResponse->redirect($redirectUrl);
            }else{
                $objResponse->redirect(__CustomStickers_Web . "/be/Home");
            }
        }
    }else{
        $objResponse->script("AlertMsg('danger', '請確認帳號密碼是否正確', '');");
    }
    return $objResponse;
}

?>