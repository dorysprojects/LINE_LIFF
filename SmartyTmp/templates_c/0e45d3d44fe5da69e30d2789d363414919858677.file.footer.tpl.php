<?php /* Smarty version Smarty3-b7, created on 2022-06-10 13:47:08
         compiled from "/home1/bot.gadclubs.com//library/modules/_public/view/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187288057262a2dadcd42748-73101818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e45d3d44fe5da69e30d2789d363414919858677' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/_public/view/footer.tpl',
      1 => 1654840005,
    ),
  ),
  'nocache_hash' => '187288057262a2dadcd42748-73101818',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.date_format.php';
?><div id='data_area' style="display:none;">
    <div id="pic_url"></div>
    <!-- liff.getProfile() -->
    <div id="userId"></div>
    <div id="displayName"></div>
    <div id="pictureUrl"></div>
    <div id="statusMessage"></div>
    <!-- liff.getContext() -->
    <div id="context_type"></div>
    <div id="context_utouId"></div>
    <div id="context_groupId"></div>
    <div id="context_roomId"></div>
    <div id="context_userId"></div>
    <div id="context_viewType"></div>
    <div id="context_accessTokenHash"></div>
    <div id="context_endpointUrl"></div>
    <div id="context_permanentLinkPattern"></div>
    <div id="context_multipleLiffTransition_minVer"></div>
    <div id="context_multipleLiffTransition_permission"></div>
    <div id="context_shareTargetPicker_minVer"></div>
    <div id="context_shareTargetPicker_permission"></div>
    <div id="context_subwindowOpen_minVer"></div>
    <div id="context_subwindowOpen_permission"></div>
    <!-- liff.getAccessToken() -->
    <div id="accessToken"></div>
    <!-- liff.getOS() -->
    <div id="OS"></div>
    <!-- liff.getLanguage() -->
    <div id="Language"></div>
    <!-- liff.getVersion() -->
    <div id="Version"></div>
    <!-- liff.getLineVersion() -->
    <div id="LineVersion"></div>
    <!-- liff.getIDToken() -->
    <div id="IDToken"></div>
    <!-- liff.getDecodedIDToken() -->
    <div id="DecodedIDToken"></div>
    <!-- liff.getFriendship() -->
    <div id="friendFlag"></div>
</div>

<div id="loading">
    <div id="loading_div">
        <span>資料處理中</span>
        <div class="ball-pulse-sync" style="margin-top:10px;text-align:center;">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>

<script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/vconsole.min.js"></script><!-- vConsole(手機版console[ LIFF適用 ])https://cdn.jsdelivr.net/npm/vconsole -->
<script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js?v=<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
"></script>
<!-- <script charset="utf-8" src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/sdk-2.1.js"></script><!-- https://static.line-scdn.net/liff/edge/2.1/sdk.js -->
<!--<script src='<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/jquery-1.8.2.js'></script><!-- https://code.jquery.com/ -->
<!--<script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/jquery.js"></script><!-- https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/ -->
<!--<script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/jquery.min.js"></script><!-- https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/ -->
<script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/axios.min.js"></script><!-- https://unpkg.com/axios/dist/ -->
<script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/hammer.min.js"></script><!-- https://hammerjs.github.io/dist/ -->

<?php if ($_smarty_tpl->getVariable('_Module')->value=='sticker'){?>
    <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/signature_pad.min.js"></script><!-- https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/ -->
    <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/jscolor.js"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/ga.js"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/signature_pad.umd.js"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/app.js?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/farbtastic3.js" type="text/javascript"></script>
<?php }?>

<?php echo $_smarty_tpl->getVariable('xajax_js')->value;?>

<script>
    //vConsole(手機版console[ LIFF適用 ])
    //var vConsole = new VConsole();
    
    function SelectProject(obj) {
        var project = obj.attr('project');
        var projectName = obj.html();
        var userId = $("#userId").html();
        if (userId == '') {
            userId = '<?php echo $_smarty_tpl->getVariable('userId')->value;?>
';
        }
        var displayName = $("#userId").html();
        var pictureUrl = $("#pictureUrl").html();
        var statusMessage = $("#statusMessage").html();
        location.href = '<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/ft/' + project + '?project=' + projectName + '&pic_url=' + pic_url + '&userId=' + userId;
    }
    
    window.onload = function (e) {
        $('#loading').hide();
        // v1: line://app/{liffId}
        // v2: https://liff.line.me/{liffId}
        liff.init({
                liffId: '<?php echo $_smarty_tpl->getVariable('liffId')->value;?>
'
            })
            .then(() => {
                try {
                    const myLink = liff.permanentLink.createUrl();
                }
                catch (err) {
                    console.log('createUrlError: ' + err.code + '-' + err.message);
                }
                if (!liff.isLoggedIn()) {
                    liff.login();
                }else{
                    //liff.isInClient();
                    //liff.logout();
                    //liff.permanentLink.setExtraQueryParam(extraString);
                    /*liff.openWindow({
                        url: "https://line.me",
                        external: true
                    });*/
                    
                    var Context = liff.getContext();
                    liff.getFriendship().then(data => {
                        var Flag = (data.friendFlag) ? 'true' : 'false';
                        $("#friendFlag").html(Flag);
                        liff.getProfile().then(function (profile) {
                            $("#userId").html(profile.userId);
                            $("#displayName").html(profile.displayName);
                            $("#pictureUrl").html(profile.pictureUrl);
                            $("#statusMessage").html(profile.statusMessage);
                            profile.friendFlag = Flag;
                            xajax_CheckAndSaveProfile(profile);
                            
                            if(Context){
                                xajax_CheckNotify(Context, profile);
                                $("#context_type").html(Context.type);
                                $("#context_utouId").html(Context.utouId);//一對一
                                $("#context_groupId").html(Context.groupId);//群組
                                $("#context_roomId").html(Context.roomId);//聊天室
                                $("#context_userId").html(Context.userId);
                                $("#context_viewType").html(Context.viewType);
                                $("#context_accessTokenHash").html(Context.accessTokenHash);
                                $("#context_endpointUrl").html(Context.endpointUrl);
                                $("#context_permanentLinkPattern").html(Context.permanentLinkPattern);
                                if(Context.availability){
                                    if(Context.availability.multipleLiffTransition){
                                        $("#context_multipleLiffTransition_minVer").html(Context.availability.multipleLiffTransition.minVer);
                                        $("#context_multipleLiffTransition_permission").html(Context.availability.multipleLiffTransition.permission);
                                    }
                                    if(Context.availability.shareTargetPicker){
                                        $("#context_shareTargetPicker_minVer").html(Context.availability.shareTargetPicker.minVer);
                                        $("#context_shareTargetPicker_permission").html(Context.availability.shareTargetPicker.permission);
                                    }
                                    if(Context.availability.subwindowOpen){
                                        $("#context_subwindowOpen_minVer").html(Context.availability.subwindowOpen.minVer);
                                        $("#context_subwindowOpen_permission").html(Context.availability.subwindowOpen.permission);
                                    }
                                }
                            }
                        }).catch(function (error) {
                            //window.alert("Error getting Profile: " + error);
                        });
                    }).catch(function (error) {
                        //window.alert("Error getting Friendship: " + error);
                    });
                    $("#OS").html(liff.getOS());
                    $("#Language").html(liff.getLanguage());
                    $("#Version").html(liff.getVersion());
                    $("#LineVersion").html(liff.getLineVersion());
                    $("#accessToken").html(liff.getAccessToken());
                    $("#IDToken").html(liff.getIDToken());
                    $("#DecodedIDToken").html(liff.getDecodedIDToken());
                    if (0 && liff.scanCode) { //OS 在 9.19.0 之後已經暫停此功能， Android 目前維持不變
                        liff.scanCode()
                            .then(function(res) {
                                console.log('scanCode');
                                console.log(res['value']);//{ value: '123' }
                            })
                            .catch(function(error) {
                                console.log(error);
                            });
                    }
                    if (0 && liff.scanCodeV2) { //IOS 14.3(Android不限)，Line App 11.7以上
                        liff.scanCodeV2()
                            .then(function(res) {
                                console.log('scanCodeV2');
                                console.log(res['value']);//{ value: '123' }
                            })
                            .catch(function(error) {
                                console.log(error);
                            });
                    }
                    if(liff.subWindow){
                        //console.log(liff.subWindow);
                    }
                    //console.log(liff);
                }
            })
            .catch((error) => {
                //window.alert(error);
            });
    };
    
        var store_all_pic = [], store_all_name = [], store_all_profile_pic = [], 
            store_all_profile_statusMessage = [], store_all_datetime = [], store_all_favorite = [], 
            more = 'false', the_dataURL = "", userId = "", displayName = "", pic_url = "", pictureUrl = "", 
            statusMessage = "", the_div = '', the_pic = '', the_id = '', the_name = '', word_list = [], 
            word = [], line_width = [], touchCount = 0, wordCount = 0, dataURL_Backup = '', SelectModule = '', 
            lastClickTime = 0, clickTimer, get_X = 0, get_Y = 0, touches = 0, 
            
        ManagerList = [
            'U34fc54fe77b0195fab8c42b1487f70f6', //(舊)宏
            'U43f8bef06efa4aac5484884c2befe1a8', //(新)宏
        ];
        
        function tips_switch(obj) {
            obj.style.transition = "transform 0.5s ease-in";
            if (obj.style.transform == "rotate(-90deg)") {
                obj.style.transform = "rotate(90deg)";
                document.getElementById('tips').style.width = "32px";
                document.getElementById('tips').style.height = "32px";
                $('#tips').children().eq(0).hide();
                $('#tips').children().eq(1).hide();
                $('#tips_area').hide();
            } else {
                obj.style.transform = "rotate(-90deg)";
                document.getElementById('tips').style.width = "90%";
                document.getElementById('tips').style.height = "auto";
                $('#tips').children().eq(0).css('display', 'inline-block');
                $('#tips').children().eq(1).css('display', 'inline-block');
                $('#tips_area').css('display', 'inline-grid');
            }
        }
        function slideLine2(box, stf, delay, speed, h) {
            //取得id
            var slideBox = document.getElementById(box);
            if (slideBox && slideBox.childNodes.length > 1) {
                //預設值 delay:幾毫秒滾動一次(1000毫秒=1秒)
                //       speed:數字越小越快，h:高度
                var delay = delay || 5000, speed = speed || 20, h = h || 19;
                var tid = null, pause = false;
                //setInterval跟setTimeout的用法可以咕狗研究一下~
                var s = function () {
                    tid = setInterval(slide, speed);
                }
                //主要動作的地方
                var slide = function () {
                    //當滑鼠移到上面的時候就會暫停
                    if (pause)
                        return;
                    //滾動條往下滾動 數字越大會越快但是看起來越不連貫，所以這邊用1
                    slideBox.scrollTop += 1;
                    //滾動到一個寬度(h)的時候就停止
                    if (slideBox.scrollTop % h == 0) {
                        //跟setInterval搭配使用的
                        clearInterval(tid);
                        //將剛剛滾動上去的前一項加回到整列的最後一項
                        slideBox.appendChild(slideBox.getElementsByTagName(stf)[0]);
                        //再重設滾動條到最上面
                        slideBox.scrollTop = 0;
                        //延遲多久再執行一次
                        setTimeout(s, delay);
                    }
                }
                //滑鼠移上去會暫停 移走會繼續動
                slideBox.onmouseover = function () {
                    pause = true;
                }
                slideBox.onmouseout = function () {
                    pause = false;
                }
                //起始的地方，沒有這個就不會動囉
                setTimeout(s, delay);
            }
        }
        slideLine2('tips_area', 'div', 5000, 20, 19);
    
    function CheckVersion(CompareVersion){
        var LineVersion = $("#LineVersion").html();
        if(LineVersion && CompareVersion){
            var LineV = LineVersion.split('.');
            var CompareV = CompareVersion.split('.');

            if(LineV[0]*1>CompareV[0]*1){
                return true;
            }else if(LineV[0]*1==CompareV[0]*1){
                if(LineV[1]*1>CompareV[1]*1){
                    return true;
                }else if(LineV[1]*1==CompareV[1]*1){
                    if(LineV[2]*1>CompareV[2]*1){
                        return true;
                    }else if(LineV[2]*1==CompareV[2]*1){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return true;
        }
    }
    
    /*
     * 官方文件:
     * https://developers.line.biz/en/reference/liff/#send-messages
     * https://developers.line.biz/en/reference/liff/#share-target-picker
     * 
     * 可傳送訊息:
     * text、sticker、image、video、audio、lacation、template(動作只能URI)、flex(動作只能URI)
     * 
     * 不可傳送訊息:
     * imagemap、quicklyReply
     */
    function SendMsg(Msg='', Echo=0, Close=0){
        if(Msg){
            Msg = parseUrl(Msg);
            console.log(Msg);
            var LogMsg = '';
            liff.sendMessages(Msg).then(function () {
                LogMsg = '訊息已送出';
                if(Echo){
                    alert(LogMsg);
                }else{
                    console.log(LogMsg);
                }
                if(Close){
                    liff.closeWindow();
                }
            }).catch(function (error) {
                console.log(Msg);
                LogMsg = error;
                if(Echo){
                    alert(LogMsg);
                }else{
                    console.log(LogMsg);
                }
            });
        }
    }
    
    function ShareMsg(Msg='', Echo=0, Close=0){
        if(Msg){
            Msg = parseUrl(Msg);
            var LogMsg = '';
            if ( liff.isApiAvailable('shareTargetPicker') && CheckVersion($("#context_shareTargetPicker_minVer").html()) ) {
                liff.shareTargetPicker(Msg, { "isMultiple":true })////default: true，false
                .then(function (res) {
                    if (res) {
                        LogMsg = '訊息已送出';
                        if(Echo){
                            alert(LogMsg);
                        }else{
                            console.log(LogMsg);
                        }
                        if(Close){
                            liff.closeWindow();
                        }
                    } else {
                        const [majorVer, minorVer] = (liff.getLineVersion() || "").split('.');
                        if (parseInt(majorVer) == 10 && parseInt(minorVer) < 11) {
                            // LINE 10.3.0 - 10.10.0
                            LogMsg = '有打開分享頁面，但無法確定是否有成功發送訊息';
                            if(Echo){
                                alert(LogMsg);
                            }else{
                                console.log(LogMsg);
                            }
                            if(Close){
                                //liff.closeWindow();
                            }
                        } else {
                            LogMsg = '已取消分享';
                            // LINE 10.11.0 -
                            if(Echo){
                                //alert(LogMsg);
                                console.log(LogMsg);
                            }else{
                                console.log(LogMsg);
                            }
                            if(Close){
                                liff.closeWindow();
                            }
                        }
                    }
                }).catch(function (error) {
                    console.log(Msg);
                    LogMsg = error;
                    if(Echo){
                        //alert(LogMsg);
                        console.log(LogMsg);
                    }else{
                        console.log(LogMsg);
                    }
                });
            }else{
                LogMsg = '不支援分享功能，請更新至'+$("#context_shareTargetPicker_minVer").html()+'或以上';
                if(Echo){
                    alert(LogMsg);
                    //console.log(LogMsg);
                    SendMsg(Msg, 1, 1);
                }else{
                    console.log(LogMsg);
                }
                if(Close){
                    liff.closeWindow();
                }
            }
        }
    }
    
    function SendOrShareMsg(Msg='', Echo=0, Close=0){
        swal({
            type: 'warning',
            title: '請選擇', 
            cancelButtonText: '分享',
            showCancelButton: true,
            text: '',
            confirmButtonText: '直接傳送'})
        .then(function () {
            SendMsg(Msg, Echo, Close);
        }, function (dismiss) {
            if (dismiss === 'cancel') {
                ShareMsg(Msg, Echo, Close);
            }
        });
    }
    
    function parseUrl(Url=''){
        return JSON.parse(JSON.stringify(Url).replace('{userId}', $("#userId").html()));
    }
    
    function SaveLog(action=""){
        xajax_SaveLog({
            "action": action,
            "liffId": '<?php echo $_smarty_tpl->getVariable('liffId')->value;?>
',
            "Flag_shareTargetPicker" : liff.isApiAvailable('shareTargetPicker'),
            "Flag_CheckVersion" : CheckVersion($("#context_multipleLiffTransition_minVer").html()),
            "multipleLiffTransition_minVer" : $("#context_multipleLiffTransition_minVer").html(),
            "multipleLiffTransition_permission" : $("#context_multipleLiffTransition_permission").html(),
            "shareTargetPicker_minVer" : $("#context_shareTargetPicker_minVer").html(),
            "shareTargetPicker_permission" : $("#context_shareTargetPicker_permission").html(),
            "context_type" : $("#context_type").html(),
            "context_userId" : $("#context_userId").html(),
            "context_viewType" : $("#context_viewType").html(),
            "OS" : $("#OS").html(),
            "Language" : $("#Language").html(),
            "Version" : $("#Version").html(),
            "LineVersion" : $("#LineVersion").html(),
            "friendFlag" : $("#friendFlag").html(),
        });
    }
</script>