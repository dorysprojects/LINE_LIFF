<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="想到什麼，就做什麼">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <title>超級比一比</title>
        <link href="{#$__PLUGIN_Web#}/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="{#$__PLUGIN_Web#}/bootstrap/AdminLTE.min.css?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}" rel="stylesheet">
          <link href="{#$__PLUGIN_Web#}/bootstrap/font-awesome.min.css" rel="stylesheet">
        
        
        <script type="text/javascript" src="{#$__PLUGIN_Web#}/bootstrap/jquery-3.3.1.min.js"></script>
        <script src="{#$__PLUGIN_Web#}/bootstrap/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.css">
        <link rel="stylesheet" type="text/css" href="{#$__PLUGIN_Web#}/TagsInput/jquery.tagsinput.css">
        
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.js"></script>
        <script src="{#$__PLUGIN_Web#}/signaturepad/vconsole.min.js"></script>
        <script src="{#$__PLUGIN_Web#}/dist/adminlte.min.js"></script>
        <script src="{#$__PLUGIN_Web#}/TagsInput/jquery.tagsinput.js"></script>
    </head>
    <style>
        @media screen and (orientation: portrait) { /* 直式 */
            html, body {
                width: calc(100vmin - 0px);
                height: calc(100vmax - 0px);/* 100 */
            }
            #gyroContain, .swal2-container {
                width: calc(100vmax - 0px);/* 80 */
                height: calc(100vmin - 0px);
                transform-origin: top left;
                transform: rotate(90deg) translate(0, -100vmin);
            }
        }
        @media screen and (orientation: landscape) { /* 橫式 */
            html, body {
                width: calc(100vmax - 0px);
                height: calc(100vmin - 0px);/* 100 */
            }
            #gyroContain, .swal2-container {
                width: calc(100vmax - 0px);
                height: calc(100vmin - 0px);/* 80 */
            }
        }
        
        body {
            /*overflow: hidden;*/
        }
        #GameSetting>.form-control {
            margin-bottom: 5px;
        }
        #OrientationArea, #TimerProgress, #GameArea, #GameSetting, #GameStartArea, #GameEndArea, #QuestionArea {
            display: none;
        }
        #NextGameArea {
            display: none;
            text-align: center;
            margin-bottom: 10px;
        }
        #NextGameArea>.btn {
            width: 48%;
        }
        #BtnArea>.btn {
            margin-bottom: 5px;
        }
        #SetReciprocalTime, #SetGameTime {
            width: auto;
            display: inline-block;
            margin-bottom:10px;
        }
        #Timer {
            text-align: center;
            left: 0px;
            font-size: 100px;
        }
        #Question {
            font-size: 100px;
            word-break: break-all;
            text-align: center;
        }
        .FullBtn {
            padding: 12px 24px;
            height: auto;
            font-size: 24px;
        }
        #History, #AnswerThisTime {
            overflow-x: auto;
            overflow-y: hidden;
        }
        #StickerArea {
            display: none;
            position:absolute;
            animation-play-state: running;
            /*animation-iteration-count: infinite;*/
            animation-direction: alternate;
            animation-name: sticker;
            animation-duration: 2.5s;
        }
        #StickerItem {
            width: 50px;
        }
        @keyframes sticker{
            from{
                left:0px;
            }
            to{
                left:calc(100% - 50px);
            }
        }
        #PlusOne {
            display: none;
            position: fixed;
            top: 20%;
            font-size: 50px;
            color: #00a65a;
            
            animation-timing-function: ease-in;
            animation-name: plus;
            animation-duration: 2s;
            animation-direction: alternate-reverse;
        }
        @keyframes plus{
            0% {
                opacity: 0;
                transform: translateY(0);
            }
            100% {
                opacity: 1;
                transform: translateY(100px);
            }
        }
    </style>
    
    <body onselectstart="return false">
        <div id="gyroContain">
            <div class="wrapper">
                <div class="content-wrapper">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="OrientationArea">
                                    alpha:<div id="alpha"></div>
                                    beta:<div id="beta"></div>
                                    gamma:<div id="gamma"></div>
                                </div>
                                <div id="GetOrientation" class="btn btn-success form-control FullBtn" onclick="GetOrientation();">允許「動作和方向」存取權限</div>
                            </div>
                            <div id="GameArea">
                                <audio id="StartTimerSound" class="hide" controls>
                                    <source src="{#$__RES_Web#}/StartTimer.mp3" type="audio/mpeg">
                                </audio>
                                <audio id="QuickTimerSound" class="hide" controls>
                                    <source src="{#$__RES_Web#}/QuickTimer.mp3" type="audio/mpeg">
                                </audio>
                                <audio id="EndTimerSound" class="hide" controls>
                                    <source src="{#$__RES_Web#}/EndTimer.mp3" type="audio/mpeg">
                                </audio>
                                <div id="BtnArea" class="col-md-12">
                                    <h1 style="text-align:center;">超級比一比</h1>
                                    <div class="btn btn-default form-control FullBtn" onclick="$('#gyroContain').css('overflow', 'auto');$('#QuestionArea').show();$('#BtnArea').hide();">題目列表</div>
                                    <div class="btn btn-default form-control FullBtn" onclick="$('#GameEndArea').show();$('#BtnArea').hide();">歷史紀錄</div>
                                    <div class="btn btn-default form-control FullBtn" onclick="$('#GameSetting').show();$('#BtnArea').hide();">遊戲設定</div>
                                    <div id="GameStartBtn" class="btn btn-primary form-control FullBtn" onclick="GameStart();">開始遊戲</div>
                                </div>
                                <div id="GameSetting" class="col-md-12">
                                    <div class="col-md-12" style="margin-bottom:20px;">
                                        <div class="btn btn-primary SettingItem" onclick="$('#GameSetting').hide();$('#BtnArea').show();">回目錄</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="SettingItem">
                                            開始倒數：<input id="SetReciprocalTime" class="form-control" type="tel" value="5">秒
                                        </div>
                                        <div class="SettingItem">
                                            遊戲時間：<input id="SetGameTime" class="form-control" type="tel" value="180">秒
                                        </div>
                                        <div class="">
                                            測試陀螺儀：
                                                <input name="TestOrientation" class="" type="radio" value="on">開啟
                                                <input name="TestOrientation" class="" type="radio" value="off" checked>關閉
                                        </div>
                                            
                                    </div>
                                    <div class="SettingItem col-md-6">
                                        <div class="box box-info">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">貼圖清單</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div id="StickerList" class="carousel slide" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        
                                                    </ol>
                                                    <div class="carousel-inner" style="background-color: lightgrey;text-align: -webkit-center;">
                                                        
                                                    </div>
                                                    <a class="left carousel-control" href="#StickerList" data-slide="prev">
                                                        <span class="fa fa-angle-left"></span>
                                                    </a>
                                                    <a class="right carousel-control" href="#StickerList" data-slide="next">
                                                        <span class="fa fa-angle-right"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="btn btn-success form-control SettingItem" onclick="$('#GameSetting').hide();$('#BtnArea').show();">確定</div>
                                    </div>
                                </div>
                                <div id="GameStartArea" class="col-md-12">
                                    <div id="NextGameArea">
                                        <div id="SkipBtn" class="btn btn-danger FullBtn" onclick="PlusOne(false);">跳過</div>
                                        <div id="CorrectBtn" class="btn btn-success FullBtn" onclick="PlusOne(true);">正確</div>
                                    </div>
                                    <div id="TimerProgress" class="progress">
                                        <div id="TimerProgressBar" class="progress-bar" style="width:100%;"></div>
                                    </div>
                                    <div id="Timer"></div>
                                    <div id="Question"></div>
                                    <div id="StickerArea">
                                        <img id="StickerItem" src="">
                                    </div>
                                    <div id="PlusOne">+1</div>
                                </div>
                                <div id="GameEndArea" class="col-md-12">
                                    <div class="col-md-12" style="margin-bottom:20px;">
                                        <div class="btn btn-primary" onclick="$('#GameEndArea').hide();$('#BtnArea').show();">回目錄</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box box-warning">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">歷史紀錄</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div id="History"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box box-success">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">本次答題</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div id="AnswerThisTime"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="QuestionArea" class="col-md-12">
                                    <div class="col-md-12" style="margin-bottom:20px;">
                                        <div class="btn btn-primary" onclick="$('#gyroContain').css('overflow', 'hidden');$('#QuestionArea').hide();$('#BtnArea').show();">回目錄</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box box-default">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">
                                                    題目列表
                                                    (<span id="QuestionListCtn">{#count($rows)#}</span>/<span id="QuestionListTotal">{#count($rows)#}</span>)
                                                </h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div id="QuestionList">
                                                    {#foreach $rows as $key=>$item#}
                                                        <div class="label label-default label-success">{#$item.propertyA#}</div>
                                                    {#/foreach#}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box box-info">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">新增題目</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div id="AddQuestion">
                                                    <textarea id="AddQuestionInput" class="form-control"></textarea>
                                                    <div class="btn btn-primary" style="margin-top: 5px;" onclick="SaveQuestion();">儲存</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        
        <script>
            //var vConsole = new VConsole();
            
            window.onbeforeunload = function(e) { return '確定離開此頁嗎?'; };
            
            $('#AddQuestionInput').tagsInput({
                'onAddTag': function(tag){
                    var tagList = tag.split(",");
                    if(tagList.length>1){
                        $(this).removeTag(tag);
                    }
                },
                'height': 'auto',
                'width': 'auto',
                'interactive': true,
                'defaultText': '請貼上以「,」分隔的字串',
                'delimiter': [","], // Or a string with a single delimiter. Ex: ';'
                'removeWithBackspace': true,
                'minChars': 0,
                'maxChars': 0, // if not provided there is no limit
                'placeholderColor': '#666666'
            });
            
            function CreateQuestion(CreateQuestionList=null){
                if(CreateQuestionList){
                    CreateQuestionList.forEach(function(question){
                        $('#QuestionList').append('<div class="label label-default label-success" style="margin-right: 5px;">'+ question +'</div>');
                    });
                }
            }
            
            function SaveQuestion(){
                if($('#AddQuestionInput').val()){
                    swal({type: 'warning', title: '確定要新增這些題目嗎?', cancelButtonText: '取消', showCancelButton: true, text: '', confirmButtonText: '確定'}).then(function () {
                        xajax_SaveQuestion($('#AddQuestionInput').val());
                    }, function (dismiss) {
                        if (dismiss === 'cancel') {
                            
                        }
                    });
                }else{
                    swal({type: 'error',title: '無輸入任何題目',showConfirmButton: false});
                }
            }
            
            function WindowResize(){
                switch(window.orientation){
                    case 'portrait': //直式
                        var Gap = window.screen.availHeight-document.body.clientHeight;
                        $('html, body').css('height', 'calc(100vmax - '+Gap+'px)');
                        $('#gyroContain, .swal2-container').css('width', 'calc(100vmax - '+(Gap-20)+'px)');
                        break;
                    case 'landscape': //橫式 
                        var Gap = window.screen.availWidth-document.body.clientHeight;
                        $('html, body').css('height', 'calc(100vmin - '+Gap+'px)');
                        $('#gyroContain, .swal2-container').css('height', 'calc(100vmin - '+(Gap-20)+'px)');
                        break;
                }
                //console.log('body-width:'+$('html, body').css('width'), 'body-height:'+$('html, body').css('height'), 'container-width:'+$('#gyroContain, .swal2-container').css('width'), 'container-height:'+$('#gyroContain, .swal2-container').css('height'));
            }
            window.addEventListener("resize", function() {
                WindowResize();
            }, false);
            
            var LastTime='', NowQuestion='', TotalCtn=0, CorrectCtn=0, TotalCorrectList=[], QuestionList=[], TotalQuestionList=[], CorrectList=[], OrientationPermission, GameLock=true, SkipLock=true, CorrectLock=true, BeginTimer, GameTimer, AnimationTimer;
            function startVibrate(duration) {
                if (navigator.vibrate) {
                    navigator.vibrate(duration);
                }else if(navigator.webkitVibrate){
                    navigator.webkitVibrate(duration);
                }else if(navigator.mozVibrate){
                    navigator.mozVibrate(duration);
                }else if(navigator.msVibrate){
                    navigator.msVibrate(duration);
                }else{
                    console.log('不支援震動功能');
                }
            }
            function stopVibrate() {
                startVibrate(0);
            }
            function SetTimer(total, num, color, type='game'){
                var txt = (total-num);
                var percent = (txt/total) * 100;
                switch(type){
                    case 'begin':
                        txt = "即將開始<br>" + txt;
                        $('#Timer').css('font-size', '100px');
                        break
                    case 'game':
                        $('#Timer').css('font-size', '50px');
                        $('#TimerProgress').show();
                        $('#TimerProgressBar').css('background-color', color).css('width', percent+'%');
                        break
                }
                $('#Timer').html(txt).css('color', color).show();
            }
            
            function PlusOne(_Correct=false){
                if(_Correct){
                    CorrectCtn++;
                }
                startVibrate((_Correct) ? 1000 : 500);
                GameNext(_Correct);
                
                if(AnimationTimer){
                    clearTimeout(AnimationTimer);
                    $('#PlusOne').hide();
                }
                var AnimationDuration = $('#PlusOne').css('animation-duration').replace('s', '')*1000;
                AnimationTimer = setTimeout(function(){ $('#PlusOne').hide(); }, AnimationDuration);
                $('#PlusOne').css('color', (_Correct) ? '#00a65a' : '#dd4b39')
                            .css('left', (_Correct) ? 'unset' : '10%')
                            .css('right', (_Correct) ? '10%' : 'unset')
                            .html((_Correct) ? 'O' : 'X')
                            .show();
            }
            
            function GameNext(_Correct=false){
                var questionLen = $('#QuestionList .label.label-success').length;
                if(_Correct){
                    CorrectList.push(TotalCtn-1);
                }
                if(questionLen===0){
                    swal({type: 'warning',title: '沒有更多題目囉',showConfirmButton: false});
                    setTimeout(function(){ GameEnd(); }, 1500);
                }else{
                    var RandomNum = Math.floor(Math.random()*questionLen);
                    var Question = $('#QuestionList .label.label-success').eq(RandomNum).html();
                    $('#QuestionList .label.label-success').eq(RandomNum).removeClass('label-success');
                    QuestionList.push(Question);
                    $('#Question').html(Question);
                    NowQuestion = $('#Question').html();
                    TotalCtn++;
                }
            }
            
            var StickerList = {
                "8181" : {
                    "type" : "animation",
                    "name" : "哆啦A夢＆哆啦美 動態貼圖",
                    "start" : 15534914,
                    "end" : 15534937
                },"11792" : {
                    "type" : "animation",
                    "name" : "皮克斯全新角色包子出爐",
                    "start" : 60127046,
                    "end" : 60127069
                },"13326" : {
                    "type" : "animation",
                    "name" : "哆啦A夢 動態蠟筆風貼圖",
                    "start" : 140128294,
                    "end" : 140128317
                },"17865" : {
                    "type" : "animation",
                    "name" : "Pixar Tower",
                    "start" : 323666574,
                    "end" : 323666597
                },"18303" : {
                    "type" : "animation",
                    "name" : "蠟筆小新(相親相愛篇)",
                    "start" : 342481334,
                    "end" : 342481357
                },"19285" : {
                    "type" : "popup",
                    "name" : "背景動起來 蠟筆小新",
                    "start" : 363913110,
                    "end" : 363913133
                },"3585827" : {
                    "type" : "animation",
                    "name" : "PP mini 小小企鵝 24",
                    "start" : 46691710,
                    "end" : 46691733
                },"4464057" : {
                    "type" : "animation",
                    "name" : "1 corgi animation sticker -English-",
                    "start" : 76342542,
                    "end" : 76342565
                },"9022727" : {
                    "type" : "animation",
                    "name" : "1corgi animation sticker 2",
                    "start" : 231010582,
                    "end" : 231010605
                },"11538395" : {
                    "type" : "animation",
                    "name" : "Bravo! Ryan Animated Stickers",
                    "start" : 307367166,
                    "end" : 307367189
                },"12907993" : {
                    "type" : "animation",
                    "name" : "Mean corgi animation sticker",
                    "start" : 341965726,
                    "end" : 341965749
                }
            };
            var StickerPageList = Object.keys(StickerList);
            function GetSitckerUrl(RandPageCode=null, SitckerCode=null){
                if(RandPageCode && SitckerCode){
                    var RandPage = StickerList[RandPageCode];
                }else{
                    var RandPageCode = StickerPageList[Math.floor(Math.random()*(StickerPageList.length*1))];
                    var RandPage = StickerList[RandPageCode];
                    var SitckerCode = Math.floor(Math.random()*(RandPage['end']-RandPage['start']+1))+RandPage['start'];
                }
                var ImgType = 'sticker';
                var StickerType='',ImgUrl='',SoundUrl='',StickerIcon='',IconPosition='';
                var Device = 'iPhone';
                switch(ImgType){
                    case 'sticker':
                        StickerIcon = 'https://static.line-scdn.net/line_store/1768490b0cf/pc/img/sprite/main_201215.png';
                        switch(RandPage['type']){
                            case 'static'://一般貼圖、不會動、無聲音
                                StickerIcon = '';
                                StickerType = 'sticker';
                                break;
                            case 'sound'://一般貼圖、不會動、有聲音
                                IconPosition = '-328px -104px';
                                StickerType = 'sticker@2x';
                                SoundUrl = 'https://stickershop.line-scdn.net/stickershop/v1/sticker/'+ SitckerCode +'/'+ Device +'/sticker_sound.m4a';
                                break;
                            case 'animation'://動態貼圖、會動、無聲音
                                IconPosition = '-302px -177px';
                                StickerType = 'sticker_animation@2x';
                                break;
                            case 'animation_sound'://動態貼圖、會動、有聲音、
                                IconPosition = '-308px -269px';
                                StickerType = 'sticker_animation@2x';
                                SoundUrl = 'https://stickershop.line-scdn.net/stickershop/v1/sticker/'+ SitckerCode +'/'+ Device +'/sticker_sound.m4a';
                                break;
                            case 'popup'://全螢幕貼圖、會動、無聲音
                                IconPosition = '-332px -177px';
                                StickerType = 'sticker_popup';
                                break;
                            case 'popup_sound'://全螢幕貼圖、會動、有聲音
                                IconPosition = '-328px -134px';
                                StickerType = 'sticker_popup';
                                SoundUrl = 'https://stickershop.line-scdn.net/stickershop/v1/sticker/'+ SitckerCode +'/'+ Device +'/sticker_sound.m4a';
                                break;
                            case 'name'://自訂文字貼圖、不會動、無聲音
                                StickerIcon = 'https://static.line-scdn.net/line_store/1768490b0cf/pc/img/MdCMN/ico_messageSticker_m.png';
                                StickerType = '/base/plus/sticker@2x';
                                break;
                        }
                        ImgUrl = 'https://stickershop.line-scdn.net/stickershop/v1/sticker/'+ SitckerCode +'/'+ Device +'/'+ StickerType +'.png';
                        break;
                    case 'emoji':
                        var PageCode = '5c1cb394040ab12ebe4ba2cd';
                        var EmojCode = '001';
                        ImgUrl = 'https://stickershop.line-scdn.net/sticonshop/v1/sticon/'+ PageCode +'/'+ Device +'/'+ EmojCode +'.png';
                        break;
                    case 'theme':
                        var ThemeCode = 'bc82aa3a-8870-43b6-ba41-2da0b18effa7';
                        ImgUrl = 'https://shop.line-scdn.net/themeshop/v1/products/b2/46/ae/'+ ThemeCode +'/5/IOS/zh-Hant/preview_001_320x568@2x.png';
                        break;
                }
                
                return ImgUrl;
            }
            
            function SetupSound(action=null){
                if(!action){
                    $('#StartTimerSound')[0].play();
                    $('#StartTimerSound')[0].pause();
                    $('#StartTimerSound')[0].currentTime = 0;
                    $('#QuickTimerSound')[0].play();
                    $('#QuickTimerSound')[0].pause();
                    $('#QuickTimerSound')[0].currentTime = 0;
                    $('#EndTimerSound')[0].play();
                    $('#EndTimerSound')[0].pause();
                    $('#EndTimerSound')[0].currentTime = 0;
                }else if(action==='Start'){
                    $('#StartTimerSound')[0].currentTime = 0;
                    $('#StartTimerSound')[0].play();
                    $('#EndTimerSound')[0].pause();
                    $('#EndTimerSound')[0].currentTime = 0;
                }else if(action==='Quick'){
                    $('#QuickTimerSound')[0].play();
                    $('#StartTimerSound')[0].pause();
                    $('#StartTimerSound')[0].currentTime = 0;
                }else if(action==='End'){
                    $('#EndTimerSound')[0].play();
                    $('#QuickTimerSound')[0].pause();
                    $('#QuickTimerSound')[0].currentTime = 0;
                }
            }
            
            function GameStart(){
                if($('#QuestionList .label.label-success').length===0){
                    swal({type: 'warning',title: '沒有更多題目囉',showConfirmButton: false});
                }else{
                    if( OrientationPermission===false || (SkipLock===false && CorrectLock===false) ){
                        SetupSound();
                        $('#GameStartArea').show();
                        $('#TimerProgress').hide();
                        $('#BtnArea').hide();
                        $('#Timer').html('').css('color', 'green');
                        $('#Question').html('').css('color', '#333');
                        var Total = $('#SetReciprocalTime').val();
                        var TotalReciprocalCtn = 0;
                        TotalCtn = 0;
                        CorrectCtn = 0;
                        QuestionList = [];
                        CorrectList = [];
                        $('#AnswerThisTime').html('');
                        $('#NextGameArea').hide();
                        $('#StickerArea').css('animation-duration', (Total)+'s');// /2
                        var SitckerUrl = GetSitckerUrl();
                        $('#StickerItem').attr('src', SitckerUrl);
                        BeginTimer = setInterval(function(){
                            SetupSound('Start');
                            $('#StickerArea').show();
                            SetTimer(Total, TotalReciprocalCtn, '#337ab7', 'begin');
                            if(1 && (Total-TotalReciprocalCtn)===0){
                                $('#StickerArea').css('animation-name', 'none')
                                                .css('top', '0px')
                                                .css('left', '50%')
                                                .css('transform', 'translateX(-50%)');
                                $('#StickerItem').attr('src', SitckerUrl)
                                                .css('width', 'auto')
                                                .css('height', '90vmin');
                                $('#Timer').hide();
                                clearInterval(BeginTimer);
                                var GameTotal = $('#SetGameTime').val();
                                var GameTotalReciprocalCtn = 0;
                                GameTimer = setInterval(function(){
                                    if(GameTotalReciprocalCtn===0){
                                        $('#StickerArea').css('animation-name', 'sticker')
                                                        .css('top', 'unset')
                                                        .css('left', 'unset')
                                                        .css('transform', 'unset')
                                                        .hide();
                                        $('#StickerItem').css('width', '50px')
                                                        .css('height', 'auto');
                                        GameNext(false);
                                    }
                                    if(OrientationPermission===false){
                                        $('#NextGameArea').show();
                                    }
                                    var TxtColor;
                                    if((GameTotal-GameTotalReciprocalCtn)<=10){
                                        TxtColor = '#dd4b39';
                                        SetupSound('Quick');
                                    }else{
                                        TxtColor = '#00a65a';
                                        SetupSound();
                                    }
                                    SetTimer(GameTotal, GameTotalReciprocalCtn, TxtColor, 'game');
                                    if(1 && (GameTotal-GameTotalReciprocalCtn)===0){
                                        GameEnd();
                                    }else{
                                        GameTotalReciprocalCtn++;
                                    }
                                }, 1000);
                            }else{
                                TotalReciprocalCtn++;
                            }
                        }, 1000);
                    }else{
                        GameLock = false;
                        $('#GameStartArea').show();
                        $('#TimerProgress').hide();
                        $('#BtnArea').hide();
                        $('#NextGameArea').hide();
                        $('#Timer').css('font-size', '70px')
                                    .html('將手機垂直地面後開始遊戲')
                                    .css('color', 'red')
                                    .show();
                    }
                }
            }
            function GameEnd(){
                SkipLock = true;
                CorrectLock = true;
                $('#Question').html('');
                SetupSound('End');
                clearInterval(GameTimer);
                TotalCorrectList.push(CorrectList);
                TotalQuestionList.push(QuestionList);
                var GameEndTitle = ($('#Timer').html()!==''&&$('#Timer').html()>0) ? '還有'+$('#Timer').html()+'秒' : '到';
                swal({type: 'info',title: '時間'+ GameEndTitle +'，本次答題對了'+ CorrectCtn +'題',showConfirmButton: false});
                $('#History').html('');
                var _Key = 0;
                QuestionList.forEach(function(question){
                    var _class = (CorrectList.indexOf(_Key)!==-1) ? 'success' : 'default';
                    $('#AnswerThisTime').append('<div style="margin:5px;" class="label label-'+_class+'">'+ question +'</div>');
                    $('#QuestionListCtn').html($('#QuestionList>.label-success').length);
                    $('#QuestionListTotal').html($('#QuestionList>.label').length);
                    _Key++;
                });
                var _Key = 0;
                TotalCorrectList.forEach(function(_correctList){
                    $('#History').append('<div style="margin:5px;" class="label label-warning">玩家'+ (_Key*1+1) + '答對了' +  _correctList.length +'題</div>');
                    _Key++;
                });
                $('#GameStartArea').hide();
                $('#GameEndArea').show();
            }
            function PassOrientation() {
                $('#GameArea').show();
                $('#GetOrientation').hide();
            }
            $(document).on('change', 'input[name="TestOrientation"]', function(event) {
                if($('input[name="TestOrientation"]:checked').val()==='on'){
                    $('#OrientationArea').show();
                    $('.SettingItem').hide();
                }else{
                    $('#OrientationArea').hide();
                    $('.SettingItem').show();
                }
            });
            function CheckLock(action=null){
                var TimeCheck = false;
                if(!LastTime || ((new Date().getTime()-LastTime)>500)){
                    LastTime = new Date().getTime();
                    TimeCheck = true;
                }
                if(TimeCheck){
                    var size = '70px';
                    var color = 'red';
                    var text = '將手機垂直地面後繼續遊戲';
                    switch(action){
                        case 'Skip':
                            $('#SkipBtn').click();
                            SkipLock = true;
                            break;
                        case 'Correct':
                            $('#CorrectBtn').click();
                            CorrectLock = true;
                            break;
                        case 'Ansering':
                            SkipLock = false;
                            CorrectLock = false;
                            size = '100px';
                            color = '#333';
                            text = NowQuestion;
                            break;
                    }
                    if(NowQuestion){
                        $('#Question').css('font-size', size)
                                    .html(text)
                                    .css('color', color)
                                    .show();
                    }
                }
            }
            function handleDeviceOrientation(event) {
                if (!DeviceOrientationEvent.requestPermission) {
                    OrientationPermission = false;
                }
                PassOrientation();
                var alpha = Math.round(event.alpha),
                    beta = Math.round(event.beta),
                    gamma = Math.round(event.gamma);
                if($('#Question').html()!==''){
                    if( (gamma>=-15&&gamma<=0) || (gamma>=0&&gamma<=15) ){
                        if( SkipLock===false && ((beta>=0&&beta<=5)||(beta>=-5&&beta<=0)) ){
                            //跳過
                            CheckLock('Skip');
                        }else if( CorrectLock===false && ((beta>=175&&beta<=180)||(beta>=-180&&beta<=-175)) ){
                            //正確
                            CheckLock('Correct');
                        }
                    }else if(gamma>=-90 && gamma<=-60){
                        //回答中
                        CheckLock('Ansering');
                    }
                }else if(GameLock === false){
                    if(gamma>=-90 && gamma<=-60){
                        SkipLock = false;
                        CorrectLock = false;
                        GameLock = true;
                        GameStart();
                    }
                }
                $("#alpha").html(alpha);
                $("#beta").html(beta);
                $("#gamma").html(gamma);
            }
            function GetOrientation(){
                if (DeviceOrientationEvent) {
                    if (DeviceOrientationEvent.requestPermission) {
                        DeviceOrientationEvent.requestPermission().then((state) => {
                            if (state === 'granted') {
                                OrientationPermission = true;
                                window.addEventListener(
                                    'deviceorientation',
                                    handleDeviceOrientation,
                                    true,
                                );
                            }else{ //denied
                                OrientationPermission = false;
                                PassOrientation();
                                swal({type: 'warning',title: '你已拒絕「動作和方向」存取權限。如要重新允許該權限，請重啟瀏覽器',showConfirmButton: false});
                            }
                        });
                    } else {
                        OrientationPermission = true;
                        window.addEventListener(
                            'deviceorientation',
                            handleDeviceOrientation,
                            true,
                        );
                    }
                }else{
                    $('#NextGameArea').show();
                }
            }
            
            $(function () {
                GetOrientation();
                WindowResize();
                $('#StickerList .carousel-indicators').html('');
                $('#StickerList .carousel-inner').html('');
                var _ctn = 0;
                for (const [_page, _sticker] of Object.entries(StickerList)) {
                    var _active = (_ctn===0) ? 'active' : '';
                    $('#StickerList .carousel-indicators').append('<li data-target="#StickerList" data-slide-to="'+_ctn+'" class="'+_active+'"></li>');
                    $('#StickerList .carousel-inner').append('<div class="item '+_active+'">'+
                                                        '<img src="'+GetSitckerUrl(_page, _sticker['start'])+'" alt="'+_sticker['name']+'" style="height: 100px;">'+
                                                    '<a target="_blank" href="https://store.line.me/stickershop/product/'+ _page +'/zh-Hant">'+
                                                        '<div class="carousel-caption">'+
                                                            _sticker['name']+
                                                        '</div>'+
                                                    '</a>'+
                                                '</div>');
                    _ctn ++;
                }
            });
        </script>
        
        {#$xajax_js#}
    </body>
</html>