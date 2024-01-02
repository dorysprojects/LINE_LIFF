<!DOCTYPE html>
<html style="background-color: unset;color: unset;"><!-- #333 -->
    <head>
        <title>{#$_Title#}</title>
        {#include file=$__PublicView|cat:'head.tpl'#}
        <link href="{#$__PLUGIN_Web#}/bootstrap/AdminLTE.min.css?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}" rel="stylesheet">
    </head>
    <body class="hold-transition login-page" onselectstart="return false" style="">
        <div class="login-box">
            {#include file=$__PublicView|cat:'alertArea.tpl'#}
            <!--<div class="login-logo">
                <b>請作答</b>
            </div>-->
            <div class="login-box-body">
                <form id="dataForm" action="#" onsubmit="return false;">
                    {#if $UrlMsgType#}
                        <div class="form-group">
                            {#include file=$__PublicView|cat:'type/'|cat:$UrlMsgType|cat:'.tpl'#}
                        </div>
                    {#/if#}
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="btn btn-primary btn-block btn-flat {#if $CheckAnswerHide#}hide{#/if#}" onclick="CheckAnswer();">送出</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        {#include file=$__PublicView|cat:'footer.tpl'#}
        <script>
            function CheckAnswer(){
                if($('[name="fields[answer]"]').val()){
                    SendMsg([{
                        "type" : "image",
                        "originalContentUrl" : '{#$__RES_Web#}/images/postback.png?data=' + encodeURI('BOT(_)kBOTClass(_)'+$('[name="fields[answer]"]').val()),
                        "previewImageUrl" : '{#$__RES_Web#}/images/postback.png?data=' + encodeURI('BOT(_)kBOTClass(_)'+$('[name="fields[answer]"]').val())
                    }], 1, 1);
                }else{
                    alert('請作答');
                }
            }
        </script>
    </body>
</html>