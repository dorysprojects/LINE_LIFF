<?php /* Smarty version Smarty3-b7, created on 2022-11-28 09:46:43
         compiled from "/home1/bot.lineapie.tw/library/modules/_public/view/type/facebooklogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20515761016384130369ef50-85912589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb6d734998bb62e36e3e3aeffdf0948de3cb09bb' => 
    array (
      0 => '/home1/bot.lineapie.tw/library/modules/_public/view/type/facebooklogin.tpl',
      1 => 1620897032,
    ),
  ),
  'nocache_hash' => '20515761016384130369ef50-85912589',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
    window.fbAsyncInit = function() {
        FB.init({
          appId      : '<?php echo $_smarty_tpl->getVariable('__FB_App_ID')->value;?>
',
          xfbml      : true,
          version    : 'v2.6'//9.0
        });
        FB.AppEvents.logPageView();
        checkLoginState();
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.crossorigin = "anonymous";
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    
    function checkLoginState(){
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });
    }
    function GetProfile() {
        FB.api('/me',{fields: 'name,id,picture'}, function (response) {
            $("#UserName").html(response.name);
            $("#UserPic").height(response.picture.data.height).attr('src', response.picture.data.url).show();
        });
    }
    function LoginProcess(response){
        $("#BindFacebook").hide();
        $("#UnBindFacebook").show();
        //console.log('FB is Login');
        //console.log(response);
        GetUserLinkedList(response.authResponse.accessToken, response.authResponse.userID);
    }
    function LogoutProcess(response){
        //console.log('FB is Logout');
        //console.log(response);
        $("#BindFacebook").show();
        $("#UnBindFacebook").hide();
    }
    function statusChangeCallback(response) {
        if (response.status === 'connected') {
            LoginProcess(response);
        } else {
            LogoutProcess(response);
        }
    }
    function FBLogin() {
        FB.login(function (response) {
            if (response.status === 'connected') {
                LoginProcess(response);
            }
        }, {scope: 'public_profile,email,pages_messaging,pages_show_list,pages_manage_metadata'});//,pages_manage_ads,pages_read_engagement,pages_read_user_content,pages_manage_posts,pages_manage_engagement
    }
    function FBLogout() {
        FB.logout(function (response) {
            if (response.status === 'unknown') {
                LogoutProcess(response);
                location.reload();
            }
        });
    }
    function GetUserLinkedList(accessToken=null, userID=null){
        GetProfile();
        FB.api(
            '/' + userID + '/accounts',
            'GET',{"subscribed_fields":"messages,messaging_account_linking"},//
            function (response) {
                console.log('GetUserLinkedList');
                if (response.data && response.data[0]) {
                    $("#LinkedList").html('');
                    jQuery.each(response.data, function (index, item) {
                        console.log(item);
                        //ShowSubscribes(accessToken, userID, index, item);
                        $("#LinkedList").append("<div style='margin-top: 5px;'>" + item.name + "<img id='page-"+item.id+"' height='30'>" + " <div class='btn btn-info' data-userID='"+ userID +"' data-access_token='"+ accessToken +"' data-name='"+ item.name +"' data-pageID='"+ item.id +"' data-pageToken='"+ item.access_token +"' onclick='Authorization($(this));'>授權</div></div>");
                        FB.api(
                            '/' + item.id + '/picture',
                            'GET',{"redirect": "0","access_token": item.access_token},
                            function (response) {
                                if(response.data.url){
                                    var PagePicture = response.data.url;
                                    $("#LinkedList img#page-"+item.id).attr('src', PagePicture);
                                }
                            }
                        );
                    });
                } else {
                    $("#LinkedList").html('無粉絲專頁');
                }
            }
        );
    }
    function Authorization(obj=null){
        FB.api(
            '/' + obj.attr('data-pageID') + '/subscribed_apps',
            'POST',{"subscribed_fields":"messages,messaging_account_linking","access_token":obj.attr('data-pageToken')},
            function (response) {
                console.log(obj.attr('data-pageID'), obj.attr('data-userID'), obj.attr('data-name'), obj.attr('data-pageToken'));
                console.log('Authorization');
                console.log(response);
                xajax_FilePutContents('<?php echo $_smarty_tpl->getVariable('__CONFIG')->value;?>
/__FB_Page_ID', obj.attr('data-pageID'), obj.attr('data-userID'));
                xajax_FilePutContents('<?php echo $_smarty_tpl->getVariable('__CONFIG')->value;?>
/__FB_Page_Name', obj.attr('data-name'), obj.attr('data-userID'));
                xajax_FilePutContents('<?php echo $_smarty_tpl->getVariable('__CONFIG')->value;?>
/__FB_Page_Token', obj.attr('data-pageToken'), obj.attr('data-userID'));
                xajax_FilePutContents('<?php echo $_smarty_tpl->getVariable('__CONFIG')->value;?>
/__FB_Page_Picture', $("#LinkedList img#page-"+obj.attr('data-pageID')).attr('src'), obj.attr('data-userID'));
                if (response.success) {
                    alert('已成功連動');
                }else{
                    alert(response.error.message);
                }
            }
        );
    }
    function ShowSubscribes(accessToken=null, userID=null, index, item) {
        FB.api(
            '/' + item.id + '/subscribed_apps',
            'GET',{"access_token":item.access_token},
            function (subscribedList) {
                if (subscribedList && subscribedList.data && subscribedList.data[0]) {
                    var subscribedStr = subscribedList.data[0].subscribed_fields.join(',');
                    $("#LinkedList").append("<div style='margin-top: 5px;'>" + item.name + " [" + subscribedStr + "] <div class='btn btn-info' data-userID='"+ userID +"' data-access_token='"+ accessToken +"' data-name='"+ item.name +"' data-pageID='"+ item.id +"' data-pageToken='"+ item.access_token +"' onclick='Authorization($(this));'>授權</div></div>");
                }
            }
        );
    }
</script>