<?php /* Smarty version Smarty3-b7, created on 2021-04-19 11:22:49
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/Call.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1746769428607cf789200a52-22323556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '404e66b62b2ed1c8b441b394ba02e9edb7102b0b' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/Call.tpl',
      1 => 1618802560,
    ),
  ),
  'nocache_hash' => '1746769428607cf789200a52-22323556',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_cat')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.cat.php';
?><!DOCTYPE html>
<head>
    <title>即時聊天室</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Call/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Call/css/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/font-awesome.min.css" rel="stylesheet">
    <!--<link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/AdminLTE.min.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">-->
    
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/dist/adminlte.min.js"></script>
    
    <style>
        #__vconsole .vc-switch {
            bottom: unset;
            left: 10px!important;
            right: unset!important;
            bottom: 10px!important;
            height: 31px;
            line-height: 13px;
        }
        #my-number {
            font-size: unset;
            line-height: unset;
            font-weight: unset;
        }
        #my-number::before {
            content: "";
        }
        .numTitle {
            font-weight: 100;
            color: #878787;
        }
        .display-inlineblock {
            display: inline-block;
            width: 130px;
        }
        #my-number-permalink {
            display: none;
            margin: 0px;
            background-color: #f0ad4e;
            text-shadow: none;
        }
        #pubnub-chat-section {
            position: absolute;
            right: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            background-color: #fff;
            z-index: 2;
            display: none;
        }
        .ChatSendArea {
            position: fixed;
            bottom: 10px;
            width: 100%;
        }
        #commentCloseBtn {
            z-index: 1;
            position: fixed;
            right: 10px;
            top: 10px;
            color: #ffffff61;
            background-color: #f0ad4e61;
            border-color: #eea23661;
        }
        #pubnub-chat-input {
            margin: 0px;
            border: 1px solid #ccc;
            width: 70%;
            display: inline-block;
        }
        #SendMsgBtn {
            display: inline-block;
            vertical-align: top;
            padding: 10px 15px;
        }
        #SendMsgBtn[connected="false"] {
            cursor: not-allowed;
            opacity: .65;
        }
        #pubnub-chat-output {
            overflow-y: auto;
            margin: 0px;
            margin-top: 10px;
            height: calc(85vh - 60px);
            min-height: calc(85vh - 60px);
            max-height: calc(85vh - 60px);
        }
        #pubnub-chat-output>div {
            padding: 10px;
            margin: 10px;
            border: 1px solid #bbb;
            border-radius: 10px;
        }
        .ChatUser {
            border-color: #1e9861!important;
        }
        .ChatSelf {
            text-align: right;
        }
        
        #loginArea {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: auto;
        }
        #loginArea>.loginItem {
            margin-top: 10px;
        }
        
        #btngroup {
            text-align: center;
            position: fixed;
            bottom: 15px;
        }
        #btngroup>.btn {
            display: none;
            border-radius: 50%;
        }
        #localVideo, #remoteVideo {
            background-color: #bbb;
            width: 100%;
            height: 85vh;
        }
        #remoteVideo {
            border: 1px solid #cc3838;
        }
        #mirroredBtn {
            position: absolute;
            z-index: 1;
            right: 10px;
            top: 10px;
            display: none;
            border-radius: 50%;
        }
        .RightBottom {
            position: absolute;
            z-index: 1;
            right: 0px;
            bottom: 0px;
            width: 50px!important;
            min-height: 70px!important;
            height: auto!important;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'alertArea.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>
        <div class="col-xs-12">
            <video id="remoteVideo" playsinline hidden></video>
            <video id="localVideo" class="RightBottom" playsinline hidden muted></video>
            <div id="mirroredBtn" class="btn btn-primary" data-flag="on"><i class="fa fa-refresh"></i></div>
        </div>
        <div id="pubnub-chat-section" class="text-center col-xs-12">
            <div id="commentCloseBtn" class="btn btn-warning" onclick="$('#commentBtn').click();">
                <i class="fa fa-minus"></i>
            </div>
            <div id="pubnub-chat-output">
                
            </div>
            <div class="ChatSendArea">
                <textarea id="pubnub-chat-input" class="form-control" rows="1" type="text" placeholder="輸入訊息"></textarea>
                <div id="SendMsgBtn" class="btn btn-info" connected="false">
                    <i class="fa fa-send"></i>
                </div>
            </div>
        </div>
        <div id="loginArea" class="col-xs-12">
            <div class="loginItem">
                <span class="numTitle">你的暱稱: </span>
                <input id="my-number" class="form-control display-inlineblock" value="載入中..." type="text" min="0" max="9999999999" placeholder="輸入你的暱稱">
            </div>
            <div class="loginItem">
                <span class="numTitle">對方暱稱: </span>
                <input id="number" class="form-control display-inlineblock" type="text" min="0" max="9999999999" placeholder="輸入對方暱稱">
            </div>
            <div id="my-number-permalink" class="btn btn-warning loginItem" onclick="var ShareLink='<?php echo $_smarty_tpl->getVariable('ShareLink')->value;?>
'+btoa($('#my-number-link').attr('href'));window.open(ShareLink);">
                邀請好友通話
                <a id="my-number-link" class="hide" href="..." target="_blank"></a>
            </div>
        </div>
        <div id="btngroup" class="col-xs-12">
            <div id="volumeBtn" class="btn btn-primary" data-flag="on"><i class="fa fa-volume-up"></i></div>
            <div id="videoBtn" class="btn btn-danger" data-flag="on"><i class="fa fa-video-camera"></i></div>
            <div id="phoneBtn" class="btn btn-lg btn-success" data-flag="off"><i class="fa fa-phone"></i></div>
            <div id="microphoneBtn" class="btn btn-primary" data-flag="on"><i class="fa fa-microphone"></i></div>
            <div id="commentBtn" class="btn btn-primary" data-flag="on"><i class="fa fa-comment"></i></div>
        </div>
    </div>
</div>

<script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/vconsole.min.js"></script>
<!-- PubNub: https://github.com/pubnub/javascript#cdn-links -->
<!--<script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Call/js/pubnub.js?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
"></script> -->
<script src="https://cdn.pubnub.com/pubnub.js"></script>
<!-- WebRTC SDK: https://github.com/stephenlb/webrtc-sdk -->
<script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Call/js/webrtc-v2.js?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
"></script>
<script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Call/js/sound.js"></script>

<script>
    //var vConsole = new VConsole();
    const localVideo = document.getElementById("localVideo");
    const remoteVideo = document.getElementById("remoteVideo");
    var getUserMedia = true;
    var TmpStream, localStream;
    if (navigator.mediaDevices === undefined) {
        navigator.mediaDevices = {};
    }
    if (navigator.mediaDevices.getUserMedia === undefined) {
        navigator.mediaDevices.getUserMedia = function(constraints) {
            // First get ahold of the legacy getUserMedia, if present
            getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

            // Otherwise, wrap the call to the old navigator.getUserMedia with a Promise
            return new Promise(function(resolve, reject) {
                getUserMedia.call(navigator, constraints, resolve, reject);
            });
        };
    }
</script>

<script>(function(){
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Generate Random Number if Needed
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
var urlargs         = urlparams();
var my_link        = PUBNUB.$('my-number-link');
var number         = urlargs.number || '09'+Math.floor(Math.random()*99999999+1);

PUBNUB.$('my-number').number    = number;
PUBNUB.$('my-number').value = ''+PUBNUB.$('my-number').number;
var NumParams = (urlargs['call']) ? '&number='+encodeURI(urlargs['call']) : '';
my_link.href  = location.href.split('?Call')[0] + '?Call&call=' + encodeURI(number) + NumParams + '&openExternalBrowser=1';

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Update Location if Not Set
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!('number' in urlargs)) {
    urlargs.number = PUBNUB.$('my-number').number;
    location.href  = urlstring(urlargs);
    return;
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Get URL Params
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function urlparams() {
    var params = {};
    if (location.href.indexOf('&') < 0) return params;

    PUBNUB.each(
        location.href.split('?Call')[1].split('&'),
        function(data) { var d = data.split('='); params[d[0]] = decodeURI(d[1]); }
    );

    return params;
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Construct URL Param String
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function urlstring(params) {
    return location.href.split('?Call')[0] + '?Call&' + PUBNUB.map(
        params, function( key, val) { return key + '=' + val }
    ).join('&') + '&openExternalBrowser=1';
}

var phone     = window.phone = PHONE({
    number        : PUBNUB.$('my-number').number // listen on this line
,   media         : { video: { mirrored:true, facingMode:'user' }, audio: true } // <--- Set Camera Resolution
,   autocam       : true
,   publish_key   : 'pub-c-561a7378-fa06-4c50-a331-5c0056d0163c'
,   subscribe_key : 'sub-c-17b7db8a-3915-11e4-9868-02ee2ddab7fe'
,   secure        : true
,   ssl           : true
});

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Start Phone Call
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function dial(number) {
    // Hangup an old call
    phone.hangup();

    // Dial Number
    var session = phone.dial(number);

    // No Dupelicate Dialing Allowed
    if (!session) return;
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Ready to Send or Receive Calls
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
phone.ready(function(){
    // Auto Call
    if ('call' in urlargs) {
        var number = urlargs['call'];
        PUBNUB.$('number').value = number;
        dial(number);
        //$('#phoneBtn').click();
    }
});

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// CallStatus And Receiver for Calls
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
phone.callstatus(function(session){
    if( session && (session.status==="connected"||session.status==="routing") ){
        if($('#SendMsgBtn').attr('connected')==='false'){
            //console.log('connected');
            $('#SendMsgBtn').attr('connected', 'true');
        }else{
           PUBNUB.$('number').value = ''+session.number;
            if(session.video && session.video.srcObject){
                addStreamToVideoTag(session.video.srcObject, remoteVideo);
                addStreamToVideoTag(localStream, localVideo);
            } 
        }
    }
});
var ReDailed = false;
phone.receive(function(session){
    console.log('receive: ', session);
    if($('#SendMsgBtn').attr('connected')==='false'){ // && !ReDailed
        ReDailed = true;
        dial(PUBNUB.$('number').value);
    }
    session.message(message);
});

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Chat
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
var chat_in  = PUBNUB.$('pubnub-chat-input');
var chat_out = PUBNUB.$('pubnub-chat-output');

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Update Local GUI
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function add_chat( number, text, from='' ) {
    if (!text.replace( /\s+/g, '' )) return true;

    var newchat       = document.createElement('div');
    var Class = (from==='self') ? 'ChatSelf' : 'ChatUser';
    newchat.classList.add(Class);
    newchat.innerHTML = PUBNUB.supplant(
        (number) ? '<strong>{number}: </strong> {message}' : '{message}', {
        message : safetxt(text),
        number  : safetxt(number)
    } );
    $(chat_out).append(newchat);
    $('#pubnub-chat-output').stop().animate({ scrollTop: $('#pubnub-chat-output').prop("scrollHeight") }, 1);
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// WebRTC Message Callback
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function message( session, message ) {
    switch(message.type){
        case 'image':
            
            break;
        case 'video':
            
            break;
        case 'audio':
            
            break;
        default:
            add_chat( session.number, message.text );
            break;
    }
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// XSS Prevent
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function safetxt(text) {
    return (''+text).replace( /[<>]/g, '' );
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Problem Occured During Init
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function phone_unable(details){
    console.log("Alert! - Reload Page.", details);
}
phone.unable(phone_unable);

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Debug Output
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

function phone_debug(details){
    //console.log(details);
    if(PUBNUB.$('number').value){
        $('#my-number-permalink, #phoneBtn, #commentBtn').css('display', 'inline-block');
    }
}
phone.debug(phone_debug);

    $(function () {
        PUBNUB.bind('keydown', chat_in, function(e) { 
            var keyCode = (e.keyCode || e.charCode);
            if (keyCode===13 && e.shiftKey){
                $('#SendMsgBtn').click();
            }else{
                return true;
            }
        });
        $('#SendMsgBtn').bind('click', function (event) {
            if($('#SendMsgBtn').attr('connected')==='false'){
                dial(PUBNUB.$('number').value);
            }else{
                if (!chat_in.value.replace( /\s+/g, '' )) return true;
                phone.send({ text : chat_in.value });
                add_chat( '', chat_in.value, 'self' );
                chat_in.value = '';
            }
        });
        $('#__vconsole .vc-switch').html('v');
        $('#my-number, #number').bind('change', function (event) {
            location.href = location.href.split('?Call')[0] + '?Call&call=' + encodeURI(PUBNUB.$('number').value) + '&number=' + encodeURI(PUBNUB.$('my-number').value) + '&openExternalBrowser=1';
        });
        $('#remoteVideo, #localVideo').bind('click', function (event) {
            if($(this).hasClass('RightBottom')){
                $(this).removeClass('RightBottom');
                switch(event.target.id){
                    case 'localVideo':
                        $('#remoteVideo').addClass('RightBottom');
                        break
                    case 'remoteVideo':
                        $('#localVideo').addClass('RightBottom');
                        break
                }
            }
        });
        $('#volumeBtn').bind('click', function (event) {
            if($(this).attr("data-flag")==="on"){
                $(this).attr("data-flag", "off");
                $(this).removeClass('btn-success').addClass('btn-danger');
                $(this).find('i').removeClass('fa-volume-up').addClass('fa-volume-off');
                remoteVideo.setAttribute("muted", true);
            }else{
                $(this).attr("data-flag", "on");
                $(this).removeClass('btn-danger').addClass('btn-primary');
                $(this).find('i').removeClass('fa-volume-off').addClass('fa-volume-up');
                remoteVideo.setAttribute("muted", false);
            }
            Setting();
        });
        $('#videoBtn').bind('click', function (event) {
            if($(this).attr("data-flag")==="on"){
                $(this).attr("data-flag", "off");
                $(this).removeClass('btn-danger').addClass('btn-primary');
                //localVideo.hidden = true;
                localStream = null;
            }else{
                $(this).attr("data-flag", "on");
                $(this).removeClass('btn-success').addClass('btn-danger');
                //localVideo.hidden = false;
                localStream = TmpStream;
            }
            Setting();
        });
        $('#phoneBtn').bind('click', function (event) {
            if($('#phoneBtn').attr("data-flag")==="on"){
                $('#phoneBtn').attr("data-flag", "off");
                $('#phoneBtn').removeClass('btn-danger').addClass('btn-success');
                $('#btngroup>.btn, #mirroredBtn').hide();
                $('#loginArea').show();
                $('#phoneBtn, #commentBtn').css("display", "inline-block");
                remoteVideo.hidden = true;/**/
            }else{
                if($('#number').val()){
                    if (!PUBNUB.$('number').value) return;
                    
                    $('#phoneBtn').attr("data-flag", "on");
                    $('#phoneBtn').removeClass('btn-success').addClass('btn-danger');
                    $('#btngroup>.btn, #mirroredBtn').css("display", "inline-block");
                    $('#loginArea').hide();
                    remoteVideo.hidden = false;/**/
                }else{
                    alert('請輸入【對方暱稱】');
                    return;
                }
            }
            Setting();
        });
        $('#microphoneBtn').bind('click', function (event) {
            if($(this).attr("data-flag")==="on"){
                $(this).attr("data-flag", "off");
                $(this).removeClass('btn-success').addClass('btn-danger');
                $(this).find('i').removeClass('fa-microphone').addClass('fa-microphone-slash');
                localVideo.setAttribute("muted", true);
            }else{
                $(this).attr("data-flag", "on");
                $(this).removeClass('btn-danger').addClass('btn-primary');
                $(this).find('i').removeClass('fa-microphone-slash').addClass('fa-microphone');
                localVideo.setAttribute("muted", false);
            }
            Setting();
        });
        $('#mirroredBtn').bind('click', function (event) {
            if($(this).attr("data-flag")==="on"){
                $(this).attr("data-flag", "off");
                $(this).removeClass('btn-success').addClass('btn-danger');
            }else{
                $(this).attr("data-flag", "on");
                $(this).removeClass('btn-danger').addClass('btn-primary');
            }
            Setting();
        });
        $('#commentBtn').bind('click', function (event) {
            if($(this).attr("data-flag")==="on"){
                $(this).attr("data-flag", "off");
                $('#pubnub-chat-section').show();
            }else{
                $(this).attr("data-flag", "on");
                $('#pubnub-chat-section').hide();
            }
        });
    });
    function addStreamToVideoTag(stream, mediaControl) {
        if(stream){
            mediaControl.pause();
            if ('srcObject' in mediaControl) {
                mediaControl.srcObject = stream;
            } else if (navigator.mozGetUserMedia) {
                mediaControl.mozSrcObject = stream;
            } else {
                mediaControl.src = (window.URL || window.webkitURL).createObjectURL(stream);
            }
            mediaControl.play();
        }
    }
    function Setting(){
        if($('#phoneBtn').attr("data-flag")==="on"){
            var audioFlag = ($('#volumeBtn').attr("data-flag")==="on") ? true : false;
            var microphoneFlag = ($('#microphoneBtn').attr("data-flag")==="on") ? true : false;
            var mirroredFlag = ($('#mirroredBtn').attr("data-flag")==="on") ? true : false;
            var facingMode = ($('#mirroredBtn').attr("data-flag")==="on") ? 'user' : 'environment';
            var videoFlag = ($('#videoBtn').attr("data-flag")==="on") ? { mirrored:mirroredFlag, facingMode:facingMode } : false;
        }else{
            localVideo.hidden = true;
            var microphoneFlag = false;
            var videoFlag = false;
        }
        
        var MediaData = { audio: microphoneFlag, video: videoFlag };
        //var MediaData =  { audio: true, video: { mirrored:true, facingMode:'user' } };
        //console.log(MediaData);
        if(microphoneFlag || videoFlag){
            navigator.mediaDevices
                        .getUserMedia(MediaData)
                        .then(function(stream) {
                            localVideo.hidden = false;
                            if (!stream) return phone_unable(stream);
                            TmpStream = localStream = stream;
                            addStreamToVideoTag(stream, localVideo);
                            phone.snapshots_setup(stream);
                            phone.camera(localVideo);
                            dial(PUBNUB.$('number').value);
                            //phone.send({ type:'video', video:mediaControl });
                        }).catch(function (error) {
                            if (!getUserMedia) {
                                alert('此瀏覽器不支援鏡頭功能');
                            }else{
                                //console.error(error.message);
                                phone_debug(["navigator.mediaDevices.getUserMedia(FAIL)", error]);
                                return phone_unable(error);
                                //alert('無可用的鏡頭');
                            }
                        });
        }
    }
})();</script>

</body>
</html>