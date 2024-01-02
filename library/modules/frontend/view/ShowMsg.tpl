<!DOCTYPE html>
<html>
    <head>
        <title>{#if $ErrorTitle#}{#$ErrorTitle#}{#else#}錯誤訊息{#/if#}</title>
        {#include file=$__PublicView|cat:'head.tpl'#}
        <style type="text/css">
            body{
                    display: block;
                    background-color: #efefef;
            }

            .ErrorBox{
                    width: 75%;
                    max-width: 300px;
                    background-color: #fff;
                    margin: 0px auto;
                    text-align: center;
                    padding: 100px 25px 50px;
                    box-shadow: 0px 0px 15px #ddd;
                    border-top: 6px solid {#$ErrorColor#};
            }

            .ErrorBoxIcon{
                    margin-top: 15vh;
                    margin: 10vh auto -80px;
                    color: #fff;
                    width: 125px;
                    height: 125px;
                    font-size: 50px;
                    line-height: 125px;
                    display: block;
                    background-color: {#$ErrorColor#};
                    border-radius: 50%;
                    position: relative;
            }

            .ErrorBoxIcon:before{
                    display: block;
                    width: 100%;
                    height: 100%;
                    text-align: center;
            }

            .ErrorBoxIcon.fa-calendar-times{
                    font-size: 70px;
            }
            .ErrorBoxIcon.fa-times{
                    font-size: 80px;
            }
            .ErrorBoxIcon.fa-users,
            .ErrorBoxIcon.fa-exclamation{
                    font-size: 65px;
            }
            .ErrorBox>h4{
                    font-size: 18px;
                    line-height: 26px;
            }

    </style>
    </head>

    <body onselectstart="return false" style="">
        
        {#if $ErrorType#}
            <div class="ErrorBox" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);border-color: {#$BGcolor#};background-color: {#$BGcolor#};color: #fff;padding: 20px;border-radius: 15px;">
                <img style="width: 100%;margin: 20px 0px;" src="{#$__RES_Web#}/images/flex_alert/{#$ErrorType#}.png">
                {#if $ErrorSubContent#}
                    <h4 style="font-size: 22px;font-weight: bold;margin-top: 20px;margin-bottom: 20px;">{#$ErrorContent#}</h4>
                    <hr style="border-color: #fff;position: absolute;width: 100%;margin-left: -20px;margin-top: -10px;">
                    <h4 style="font-size: 16px;">{#$ErrorSubContent#}</h4>
                {#else#}
                    <hr style="border-color: #fff;position: absolute;width: 100%;margin-left: -20px;">
                    <h3 style="font-weight: bold;margin-top: 20px;">{#$ErrorContent#}</h3>
                {#/if#}
            </div>
        {#else#}
            <i class="ErrorBoxIcon fa fa-{#$ErrorIcon#}"></i>
            <div class="ErrorBox">
                <h4>{#$ErrorText#}</h4>
                {#if $AddFriendBtn#}
                    <a id="AddFriendBtn" class="btn btn-success" href="https://line.me/R/ti/p/@{#$__LineAtID#}">加入好友</a>
                {#/if#}
            </div>
        {#/if#}
        
        {#include file=$__PublicView|cat:'footer.tpl'#}
        
        {#if $CheckFollow#}
            <script>
                $(function(){
                    setInterval(function(){
                        xajax_CheckFollow('{#$userId#}', '{#$__LineAtID#}', '{#$AddAction#}');
                    },1000);
                });
            </script>
        {#/if#}
        
        {#$xajax_js#}
    </body>
</html>