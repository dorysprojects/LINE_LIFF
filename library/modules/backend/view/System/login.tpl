<!DOCTYPE html>
<html>
    <head>
        <title>{#$ProjectName#}</title>
        {#include file=$__PublicView|cat:'backend_head.tpl'#}
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            {#include file=$__PublicView|cat:'alertArea.tpl'#}
            <div class="login-logo">
                <b>後台</b>登入
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">輸入您的帳號密碼</p>
                <div class="form-group has-feedback">
                    <input id="FormAccount" type="text" class="form-control" placeholder="帳號">
                    <i class="fa fa-user form-control-feedback"></i>
                    <span class="hide glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="FormPassword" type="password" class="form-control" placeholder="密碼">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <div class="btn btn-primary btn-block btn-flat" onclick="xajax_login($('#FormAccount').val(), $('#FormPassword').val());">登入</div>
                    </div>
                </div>
            </div>
        </div>
        {#$js#}
        {#$xajax_js#}
    </body>
</html>