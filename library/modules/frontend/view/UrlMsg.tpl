<!DOCTYPE html>
<html>
    <head>
        <title>連結訊息</title>
        {#include file=$__PublicView|cat:'head.tpl'#}
    </head>

    <body onselectstart="return false" style="  background-color : #03c754;
                                                background-image : url('{#$__RES_Web#}/images/LineBG.jpg');
                                                background-repeat: no-repeat;
                                                background-size  : contain;">
        
        
        {#include file=$__PublicView|cat:'footer.tpl'#}
        <script>
            $(function () {
                var ShareMsgInterval = window.setInterval(function () {
                    if($("#data_area").find("#userId").html()){
                        {#if $Msg#}
                            if($("#friendFlag").html()==='false'){
                                xajax_CheckFollow($("#userId").html(), '{#$__LineAtID#}', 'Invite');
                            }else{
                                ShareMsg({#$Msg#}, 1, 1);
                            }
                        {#else if $Vote#}
                            xajax_Vote($("#userId").html(), '{#$Vote#}', $("#displayName").html(), $("#pictureUrl").html());
                        {#else if $CloseFlag#}
                            liff.closeWindow();
                        {#else#}
                            xajax_Process($("#userId").html(), '{#$UrlMsgId#}', '{#$UrlMsgAction#}', '{#$UrlMsgUserId#}', '{#$UrlMsgMode#}');
                        {#/if#}
                        window.clearInterval(ShareMsgInterval);
                    }
                }, 100);
            });
        </script>
    </body>
</html>