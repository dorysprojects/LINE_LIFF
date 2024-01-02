<!DOCTYPE html>
<html>
    <head>
        <title>{#$ProjectName#}</title>
        {#include file=$__PublicView|cat:'backend_head.tpl'#}
    </head>
    <body class="hold-transition login-page">
        {#include file=$__PublicView|cat:'alertArea.tpl'#}
        <div class="error-page">
            <h2 class="headline text-yellow">
                404
            </h2>

            <div class="error-content">
                <h3>
                    <i class="fa fa-warning text-yellow"></i>
                    頁面不存在
                </h3>
            </div>
        </div>
        {#$js#}
        {#$xajax_js#}
    </body>
</html>