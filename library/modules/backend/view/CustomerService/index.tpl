<!DOCTYPE html>
<html >
    <head>
        <!-- http://v.bootstrapmb.com/2019/11/mpm5s6746/index.html -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>線上客服</title>
        <meta name="description" content="">
        <meta name="keywords" content="Chatriq, chat, messaging, theme, platform">
        <meta name="subject" content="">
        <meta name="copyright" content="">
        {#assign var="_backend_" value=$__DOMAIN|cat:'_backend'#}
        {#assign var="_backend_value" value=$smarty.session.$_backend_#}
        {#if $_backend_value#}
            {#assign var="_authority" value=$_backend_value.subject.authority#}
            {#if $_backend_value.subject.img0#}
                <link rel="icon" type="image/png" href="{#$__WEB_UPLOAD#}/image/{#$_backend_value.subject.img0#}">
            {#/if#}
        {#/if#}

        <!--<link href="{#$__PLUGIN_Web#}/bootstrap/bootstrap.min.css" rel="stylesheet">-->
        <link href="{#$__PLUGIN_Web#}/bootstrap/font-awesome.min.css" rel="stylesheet">
        <link href="{#$__PLUGIN_Web#}/bootstrap/AdminLTE.min.css?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}" rel="stylesheet">
        <link href="{#$__RES_Web#}/css/app.css?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{#$__PLUGIN_Web#}/Chatriq/css/materialdesignicons.min.css">
        <link rel="stylesheet" type="text/css" href="{#$__PLUGIN_Web#}/Chatriq/css/perfect-scrollbar.css">
        <link rel="stylesheet" type="text/css" href="{#$__PLUGIN_Web#}/Chatriq/css/app.min.css">
        <link rel="stylesheet" type="text/css" href="{#$__PLUGIN_Web#}/Chatriq/css/default-theme.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">

        <script src="{#$__PLUGIN_Web#}/bootstrap/jquery-3.3.1.min.js"></script>
        <script type='text/javascript' src='{#$__PLUGIN_Web#}/blackUI/blackUI.js'></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.js"></script>
        <script src="{#$__PLUGIN_Web#}/bootstrap/bootstrap.min.js"></script>
        <script src='{#$__PLUGIN_Web#}/bootstrap/form.js'></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
        <script type='text/javascript' src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>

        <script>
            $(function () {
                $('#TranslateEmoji').emojioneArea({
                    pickerPosition: "top",
                    tonesStyle: "bullet"
                });
                $(document).on('click', 'ul.sidebar-menu>li', function(event) {
                    if(!$(this).hasClass('header')){
                        $("ul.sidebar-menu>li.active").removeClass('active');
                        $(this).addClass('active');
                    }else{
                        var headerId = $(this).attr('id');
                        if($('.'+headerId).eq(0).css('display')==='none'){
                            if($('.'+headerId+'.active').hasClass('treeview')){
                                $('ul.sidebar-menu.tree>li').show();
                            }else{
                                $('.'+headerId).show();
                            }
                            $('.'+headerId + '.treeview.active>a').click();
                        }else{
                            $('.'+headerId).hide();
                            $('.'+headerId + '.treeview.active.menu-open>a').click();
                        }
                    }
                });
            });
            function TranslateEmoji(ObjHtml){
                var EmojiEditor = $('#TranslateEmoji').parent().find('.emojionearea .emojionearea-editor');
                if(ObjHtml){
                    EmojiEditor.html(ObjHtml.split('<').join('《').split('>').join('》')).focus().blur();
                    return EmojiEditor.html().split('《').join('<').split('》').join('>');
                }else{
                    return ObjHtml;
                }
            }
            function GetEmojiIcon(Chat=null, DefaultColor=null, OriginalIcon=null){
                if(!DefaultColor){
                    DefaultColor = [
                        119, 120, 122, 123, 124, 127, 130, 133, 134, 135,
                        137, 139, 141, 145, 146, 150, 155, 156, 159, 160,
                        171, 174, 176, 179, 180, 181, 193, 204, 207, 208,
                        210, 211, 213, 216, 223, 230, 231, 232, 238, 243,
                        245, 246, 249, 250, 251
                    ];
                }
                if(!OriginalIcon){
                    OriginalIcon = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAABuCAYAAADMB4ipAAAHfElEQVRo3u1XS1NT2Rb+9uOcQF4YlAJzLymFUHaLrdxKULvEUNpdTnRqD532f+AHMLMc94gqR1Zbt8rBnUh3YXipPGKwRDoWgXvrYiFUlEdIkPPYZ/dAkwox5yQCVt/bzRrBPnt9e+211/etFeDQDu3ArL+/X37OeqmRWoH7+vpItfWawStF1tfXR+zW9xW5ne0p8loOcAKuCdwpRft60C8a+X5zTvebCqcAvmidf1GGHtqhHdpf1qqKzsrKipyensbi4iKWl5cBAMFgEG1tbYhGo2hpadlbmxseHpaDg4MAgI6ODng8HgBAPp/H/Pw8AODatWvo7e2tvUHrui7v3r2L+fl5XL58GVeuXIHH49m1N5/Py0ePHmF0dBQdHR24desWVFXdtYdXAn/48CHm5+dx8+ZNRKPRigEUDpuenpb3799H4YaOnWh5eVmOj48jFoshGo0STdPkwMCAXF5elqV7BgYGpKZpMhqNklgshrGxMbx580Y6gicSCTDGEIvFAADpdBqpVArJZLK4J5lMIpVKIZ1OAwBisRgYY0gkEs6Rp1IphMNh+Hw+AgCGYQAANE0r7in8Xfjm8/lIOBzGq1evnMHX19fR1NRU/D8UCoFzjnA4XFwLh8PgnCMUChXXmpqakM1mUfVBS62xsZHk83lZWi1nz579ZA0AhBDO4A0NDchkMsWSJIRAURRiVy26rktVVUkmk0EgEHAGP3XqFKamppDP56Vpmrhz5w5u374t/X4/OP+w3TRNZLNZ6LoO0zSRz+dlf38/Ll686Jzz8+fPQwiBeDwOt9tNrl+/jkwmU6yaQpVkMhncuHEDbrebxONxCCEQiUScIw8Gg+TBgwdyZGQEyWRSdnV1kVQqJYeGhrC6ugrGGEKhEHp7e3Hy5EmSTCblvXv30NPTg2AwSA6M/vF4HCMjI7b0/yzh8vv9AIBsNrt34aokuQsLC7skt729varkHtqftUFf++FHsrq0QN3eBvp68Tfvf9Mv12oFCYU7G//e9nVuO7dpNbe2W4M//yQr0p8yRvyBo1Zr++lwLcCt7afD/sBRizJGavrB1dDYYh47Htrq+Kb7jBNwxzfdZ44dD201NLaYVUkU7ozQpuAJBkARwnRZpunN5zaa5hJjiXLH05GeiMd7JEM5zzHGNQBGZvk/Iv0yYVWMvK0zKk1Dl6ahW5RQobjqdjy+wEZn9PKF0n2d0csXPL7AhuKq26GECtPQLdPQZVtn1LlB69p7yRVVSEiDEGJwRd12e4+8PR3piRQidnuPvOWKuk0IMSSkwRVV6Np7WVVbSqvGsgSnlKkAFNPQXdrOtuKqcxtcUTUAhmUJnVJmlleJo3CVHmAaOlPUOmYJkxFKibQsSRkXhr4juKIKO2BHVSwcoLrqCVdUYho6K3YYRRWmoUtdey/tgKtK7rUffiQAsLq08MnbNLe2WwBgB/zHzueFyD8nwlIfbvdx8eU0WV1aKD1cVAMs9+F2j9gUPEEKemEJIe3AnXy4XfkBoNKSZHNthWfX31EA69VKttyHVyIOY1wRwmS6tqNsrr31vXo5k/bUu4gT2cp9lhbm0rzCJpeUUrE0vS63+c7/6uXMbDUWl/ssLczNFrVFddUT09AZpUy1LKvO0DVfPrfR9HxqfNbuEe185l9MFX3o6tIC5YpKFLWOfdQQ93Zu49j0+FDCDtjOp1yaOQCYhs4Y40wI05XfWj8yPT40Ua2ey33mEmMTtp2IUEq0nW3FKeJPGPjRp1Iz2QUuLUu66txG9NLVSK3gBZ+C1lcE54oqKOOCK6rm8QU2unu+u1ANuNynvFsBAG1ubbdMQ5eGviMAFDuP0w3sfMpvQEtb24fOQncU1bXl8R7JnOu+ZNv97XxKJwY6+PNPsrm13drObVqUMlMIU5OWpVHOc96Go5lTnV2fzC/VfAozD7HTCa6olBBa1Imlhbmq2lLuQ5xaW6nCPfnln0Yt7bDUhzhps8cfKH5//uTXmvS81OeLdqI/ZoROzSZrHqG/OvOPzxuhK5VgJTvV2bW3EdqJRABwrvvS/kfoSkoZvXT1YEbociHr7vnuYEfogpBFL109HKH/h0fomnXg3Lff79r7/MmvVbWG7gX4QObzc99+Tz7mHKah05KcW6ahQ9feS6cbMCdgt7eBWJagjCuUAC5tZzuouuo0Spm0hElc9R4cbf4bVl8v1p6WUmCuqEwIs34ruxaeeTy4uJVd67As08UVlVmWoG5vA7FLG3WMmHEupVTyW+vh2cn4DADMTsaTuc21LiGEhzHOnQ6gNtMrJSBMCKHkNt999WLi0S7hejEZH81n174WpukiIMw0dKq66p3Bw50RwhUVXFGJKUy28Xal48VkfKrSlWenhsc23q2cEB9SR7iiItwZIbbgHn8AlDFCCMW7laXjqZnHjkNpaubJzNuVpWZCKChjxOMPVH/QlaW0f/G3ZLqWWl6ce/bvlddp7yFD/w8Z+njoX1+GoZMjgzMAMDkyeLAMnRh+uKveJ0YGD4ahEyODFRk6OfrL/hj67GnckaHPng7vjaGzyYmaGDr77KktQ38H8tqx8Wja+WIAAAAASUVORK5CYII=';
                }

                var SendBox = '';
                var IconColorRGB = {};
                var MinColor = DefaultColor[0];

                switch(Chat){
                    case 'line':
                        SendBox = '#SendBox';
                        IconColorRGB = {
                            "R" : 70,
                            "G" : 76,
                            "B" : 107
                        };
                        break;
                    case 'facebook':
                        SendBox = '#SendBox';
                        IconColorRGB = {
                            "R" : 0,
                            "G" : 153,
                            "B" : 255
                        };
                        break;
                    default :
                        break;
                }
                if(Chat && SendBox){
                    var myImg = new Image();
                    var EmojiIconSrc = null;
                    myImg.src = OriginalIcon;
                    myImg.onload = function() {
                        var canvas = document.createElement("canvas");
                        var ctx = canvas.getContext("2d");
                        canvas.width = myImg.width;
                        canvas.height = myImg.height;
                        ctx.drawImage(myImg,0,0);
                        var imgd = ctx.getImageData(0, 0, myImg.width, myImg.height);
                        for (var i = 0; i <imgd.data.length; i += 4) {
                            if( (imgd.data[i+0]===imgd.data[i+1]&&imgd.data[i+0]===imgd.data[i+2]) && (DefaultColor.indexOf(imgd.data[i+0])>-1) ){
                                var NowColor = imgd.data[i+0];
                                imgd.data[i+0] = IconColorRGB['R'];
                                imgd.data[i+1] = IconColorRGB['G'];
                                imgd.data[i+2] = IconColorRGB['B'];
                                imgd.data[i+3] = 255 + MinColor - NowColor;
                            }
                        }
                        ctx.putImageData(imgd, 0, 0);
                        var newImage = new Image();
                        EmojiIconSrc = canvas.toDataURL("image/png");
                        $(SendBox + ' .emojionearea .emojionearea-button>div').attr('style', 'background-image: url("'+ EmojiIconSrc +'")!important');
                    };
                }
            }
        </script>
        <script type="text/javascript">
            var _firstTitle = document.title;
            var CustomerLineServiceInterval;
            var CustomerLineServiceTimeout;
            var CustomerFacebookServiceInterval;
            var CustomerFacebookServiceTimeout;

            var TimeoutId = window.setTimeout(function() {}, 0);
            while (TimeoutId--) {
                window.clearTimeout(TimeoutId);
            }
            var IntervalId = window.setInterval(function() {}, 0);
            while (IntervalId--) {
                window.clearInterval(IntervalId);
            }

            function PlaySound(name, chatroom, id) {
                var _Key = chatroom+'LastRecordId';
                var LastRecordId = window.localStorage.getItem(_Key);
                if(!LastRecordId || id>LastRecordId){
                    window.localStorage.setItem(_Key, id);
                    $("#CustomerServiceSound")[0].play();
                    var CustomerServiceInterval = null;
                    var CustomerServiceTimeout = null;
                    var ChatBoxClassName = '';
                    var BGcolor = '';
                    var _firstChatTitle = '';
                    switch(chatroom){
                        case 'line':
                            ChatBoxClassName = '#LineChatBox';
                            BGcolor = '#00b900';
                            CustomerServiceInterval = CustomerLineServiceInterval;
                            CustomerServiceTimeout = CustomerLineServiceTimeout;
                            _firstChatTitle = 'Line客服';
                            break;
                        case 'facebook':
                            ChatBoxClassName = '#FacebookChatBox';
                            BGcolor = '#3b5998';
                            CustomerServiceInterval = CustomerFacebookServiceInterval;
                            CustomerServiceTimeout = CustomerFacebookServiceTimeout;
                            _firstChatTitle = 'Facebook客服';
                            break;
                    }
                    if(CustomerServiceInterval){
                        clearInterval(CustomerServiceInterval);
                    }
                    if(CustomerServiceTimeout){
                        clearTimeout(CustomerServiceTimeout);
                    }
                    CustomerServiceInterval = setInterval(function(){
                        $(ChatBoxClassName).css('border-color', BGcolor);
                        $(ChatBoxClassName + ' .box-header.with-border').css('background-color', BGcolor).css('border-color', BGcolor);
                        $(ChatBoxClassName + ' .box-header.with-border .box-title').html(name + '正在說..');
                        document.title = name + '正在說..';
                        CustomerServiceTimeout = setTimeout(function(){
                            $(ChatBoxClassName).css('border-color', '#202a43');
                            $(ChatBoxClassName + ' .box-header.with-border').css('background-color', '#202a43').css('border-color', '#202a43');
                            $(ChatBoxClassName + ' .box-header.with-border .box-title').html(_firstChatTitle);
                            document.title = _firstTitle;
                        }, 2000);
                    }, 3000);
                }
            }
        </script>
        <style>
            body {
                {#if $ChatRoom=='line'#}
                    --origin: #00b900;
                {#else if $ChatRoom=='facebook'#}
                    --origin: #628cc1;
                {#else#}
                    --origin: #ae6eea;
                {#/if#}
            }
            #SendBox .emojionearea {
                display: contents;
            }
        </style>
    </head>
    <body class="default-theme small-devices">
        <!-- Preloader Start -->
        <div class="preloader" style="display: none;"></div>
        <!-- Preloader end -->

        <!-- main wrapper start -->
        <div class="main-wrapper">
            {#include file=$__PublicView|cat:'alertArea.tpl'#}
            <div class="hide">
                <textarea id='TranslateEmoji' class="hide"></textarea>
                <audio id="CustomerServiceSound" class="hide">
                    <source src="{#$__RES_Web#}/line.mp3" type="audio/mpeg">
                </audio>
            </div>
            <div class="chatapp">
                <!-- navbar start -->
                <nav id="navbar" class="navbar navbar-expand-md navbar-light fixed-top bg-white border-bottom shadow-sm">
                    <a class="navbar-brand" href="#">
                        <img {#if $_backend_value.subject.img0#}src="{#$__WEB_UPLOAD#}/image/{#$_backend_value.subject.img0#}"{#/if#} width="50" height="50" class="d-inline-block align-top" alt="">
                        <h1>{#$_backend_value.propertyA#}</h1><!-- 聊天室 -->
                    </a>
                    <div class="ml-auto d-flex align-items-center">
                        <div class="iconbox iconbox-search btn-hovered-light">
                            <i class="iconbox__icon mdi mdi-magnify"></i>
                        </div>
                        <div class="navbar-nav">
                            <!--
                                <div class="iconbox-group">
                                    <div class="iconbox btn-hovered-light">
                                        <i class="iconbox__icon mdi mdi-wallet-outline"></i>
                                    </div>
                                    <div class="iconbox btn-hovered-light">
                                        <i class="iconbox__icon mdi mdi-diamond-stone"></i>
                                    </div>
                                    <div class="iconbox btn-hovered-light">
                                        <i class="iconbox__icon mdi mdi-bell-ring-outline"></i>
                                    </div>-
                                    <div class="iconbox btn-hovered-light">
                                        <i class="iconbox__icon mdi mdi-dots-vertical"></i>
                                    </div>
                                </div>
                            -->
                            <div class="dropdown user-nav">
                                <div class="user-avatar user-avatar-sm user-avatar-rounded" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="chatriq-user" style="background-image: url({#if $ChatRoom=='line'#}{#$_LineAtPic#}{#else if $ChatRoom=='facebook'#}{#$__FB_Page_Picture#}{#/if#}), url({#$__RES_Web#}/images/person.jpg);"></div>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!--
                                        <a class="dropdown-item" href="javascript:;">
                                            <span><i class="mdi mdi-account-outline"></i></span>
                                            <span>個人資料</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <span><i class="mdi mdi-account-multiple-plus-outline"></i></span>
                                            <span>邀請</span>
                                        </a>
                                    -->
                                    <a class="dropdown-item" href="javascript:;">
                                        <span><i class="mdi mdi-settings-outline"></i></span>
                                        <span>設定</span>
                                    </a>
                                    <!--
                                        <a class="dropdown-item" href="javascript:;">
                                            <span><i class="mdi mdi-help-circle-outline"></i></span>
                                            <span>幫助</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <span><i class="mdi mdi-comment-quote-outline"></i></span>
                                            <span>回饋</span>
                                        </a>
                                    -->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span><i class="mdi mdi-logout-variant"></i></span>
                                        <span>登出</span>
                                    </a>
                                </div>
                            </div>
                            <div class="iconbox-searchbar">
                                <span>
                                    <input id="SearchKey" type="text" class="form-control SearchKey" placeholder="搜尋" autofocus="">
                                    <button id="SearchBtn" class="search-submit" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    <a href="javascript:void(0)" class="search-close"><i class="mdi mdi-arrow-left"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- navbar end -->

                <!-- sidebar start -->
                <div class="chatapp__sidebar">
                    <ul class="nav" id="myTab" role="tablist">
                        {#if $LineChat#}
                            <li class="nav-item">
                                <a class="nav-link {#if $ChatRoom=='line'#}active{#/if#}" style="color: {#if $ChatRoom=='line'#}#00b900{#else#}#949aa2{#/if#};" href="/be/CustomerService/index/ChatRoom/line">
                                    <!--<i class="mdi mdi-message-text-outline"></i>-->
                                    <svg style="width: 20px;vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="line" class="svg-inline--fa fa-line fa-w-14" role="img" viewBox="0 0 448 512">
                                        <path fill="currentColor" d="M272.1 204.2v71.1c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.1 0-2.1-.6-2.6-1.3l-32.6-44v42.2c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.8 0-3.2-1.4-3.2-3.2v-71.1c0-1.8 1.4-3.2 3.2-3.2H219c1 0 2.1.5 2.6 1.4l32.6 44v-42.2c0-1.8 1.4-3.2 3.2-3.2h11.4c1.8-.1 3.3 1.4 3.3 3.1zm-82-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 1.8 1.4 3.2 3.2 3.2h11.4c1.8 0 3.2-1.4 3.2-3.2v-71.1c0-1.7-1.4-3.2-3.2-3.2zm-27.5 59.6h-31.1v-56.4c0-1.8-1.4-3.2-3.2-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 .9.3 1.6.9 2.2.6.5 1.3.9 2.2.9h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.7-1.4-3.2-3.1-3.2zM332.1 201h-45.7c-1.7 0-3.2 1.4-3.2 3.2v71.1c0 1.7 1.4 3.2 3.2 3.2h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2V234c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2v-11.4c-.1-1.7-1.5-3.2-3.2-3.2zM448 113.7V399c-.1 44.8-36.8 81.1-81.7 81H81c-44.8-.1-81.1-36.9-81-81.7V113c.1-44.8 36.9-81.1 81.7-81H367c44.8.1 81.1 36.8 81 81.7zm-61.6 122.6c0-73-73.2-132.4-163.1-132.4-89.9 0-163.1 59.4-163.1 132.4 0 65.4 58 120.2 136.4 130.6 19.1 4.1 16.9 11.1 12.6 36.8-.7 4.1-3.3 16.1 14.1 8.8 17.4-7.3 93.9-55.3 128.2-94.7 23.6-26 34.9-52.3 34.9-81.5z"></path>
                                    </svg>
                                    <span>Line</span>
                                </a>
                            </li>
                        {#/if#}
                        {#if $FacebookChat#}
                            <li class="nav-item {#if $ChatRoom=='facebook'#}facebook{#/if#}">
                                <a class="nav-link" style="color: {#if $ChatRoom=='facebook'#}#628cc1{#else#}#949aa2{#/if#};" href="/be/CustomerService/index/ChatRoom/facebook">
                                    <!--<i class="mdi mdi-message-text-outline"></i>-->
                                    <i class="fa fa-facebook-square" style="font-size: 23px;"></i>
                                    <span>Facebook</span>
                                </a>
                            </li>
                        {#/if#}
                        <!--
                            <li class="nav-item">
                                <a class="nav-link" href="calls.html">
                                    <i class="mdi mdi-phone-outline"></i>
                                    <span>Calls</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contacts.html">
                                    <i class="mdi mdi-account-box-outline"></i>
                                    <span>Contacts</span>
                                </a>
                            </li>
                            <li class="nav-item nav-item-todo">
                                <a class="nav-link" href="todo.html">
                                    <i class="mdi mdi-checkbox-marked-outline"></i>
                                    <span>To-Do</span>
                                </a>
                            </li>
                            <li class="nav-item sidebar-bottom-nav nav-item-help">
                                <a class="nav-link" href="help.html" title="Help">
                                    <i class="mdi mdi-help-circle-outline"></i>
                                    <span>Help</span>
                                </a>
                            </li>
                        -->
                    </ul>
                </div>
                <!-- sidebar end -->

                <!-- main content start -->
                <div class="chatapp__content">
                    <div class="chatapp__messagetab">
                        <!-- user list start -->
                        <div class="chatapp-user-list">
                            <div class="chatapp-user-list-body custom-scrollbar ps ps--active-y">
                                <div class="chatapp__headingbar">
                                    <h6>所有訊息</h6>
                                    <div class="chatapp__actions">
                                        {#if $TagsOptions#}
                                            <div class="chatapp__actions--icon" onclick="if($('#FilterArea').css('display')==='none'){ $('#FilterArea').show();$(this).css('color', 'var(--origin)'); }else{ $('#FilterArea').hide();$(this).css('color', ''); }"><i class="fa fa-filter"></i></div>
                                        {#/if#}
                                        <!--<div class="chatapp__actions--icon"><i class="mdi mdi-heart"></i></div>
                                        <div class="chatapp__actions--icon"><i class="mdi mdi-square-edit-outline"></i></div>
                                        <div class="chatapp__actions--icon"><i class="mdi mdi-dots-horizontal-circle-outline"></i></div>-->
                                    </div>
                                </div>
                                <div id="FilterArea" class="col-md-12" style="display: none;">
                                    {#if $TagsOptions#}
                                        <div class="box box-warning">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">標籤篩選</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" onclick="if($('#FilterTagsBody').css('display')==='none'){ $(this).find('i').addClass('fa-minus').removeClass('fa-plus');$('#FilterTagsBody').show(); }else{ $(this).find('i').addClass('fa-plus').removeClass('fa-minus');$('#FilterTagsBody').hide(); }">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="FilterTagsBody" class="box-body">
                                                {#foreach $TagsOptions as $tkey => $tvalue#}
                                                    <input id="FilterTags{#$tkey#}" type="checkbox" name="fields[content][filter][Tags][]" value="{#$tkey#}">
                                                    <label for="FilterTags{#$tkey#}">{#$tvalue#}</label>
                                                {#/foreach#}
                                            </div>
                                        </div>
                                    {#/if#}
                                </div>
                                <ul id="RoomList" class="list-unstyled">

                                </ul>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; height: 598px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 297px;"></div>
                                </div>
                            </div>
                            <!--
                                <ul id="mfbMenu" class="mfb-component--br mfb-slidein-spring" data-mfb-toggle="click">
                                    <li class="mfb-component__wrap">
                                        <a href="#" class="mfb-component__button--main">
                                            <i class="mfb-component__main-icon--resting mdi mdi-plus ion-plus-round"></i>
                                            <i class="mfb-component__main-icon--active mdi mdi-close ion-close-round"></i>
                                        </a>
                                        <ul class="mfb-component__list">
                                            <li>
                                                <a href="javascript:;" data-mfb-label="Theme" class="mfb-component__button--child">
                                                    <i class="mfb-component__child-icon mdi mdi-palette"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-mfb-label="Create Group" class="mfb-component__button--child">
                                                    <i class="mfb-component__child-icon mdi mdi-account-group"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-mfb-label="New Call" class="mfb-component__button--child">
                                                    <i class="mfb-component__child-icon mdi mdi-phone"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" data-mfb-label="New Chat" class="mfb-component__button--child">
                                                    <i class="mfb-component__child-icon mdi mdi-android-messages"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            -->
                        </div>
                        <!-- user list end -->

                        <!-- conversations start -->
                        <div id="ChatBox" class="chatapp__conversations ChatBox">
                            <!-- conversation wrapper start -->
                            <div class="conversation-wrapper">
                                <div class="conversation-panel">
                                    <div class="conversation-panel__head">
                                        <div class="back-button-md"><i class="mdi mdi-arrow-left"></i></div>
                                        <div class="conversation-panel__avatar info-panel-opener">
                                            <div class="user-avatar user-avatar-rounded">
                                                <div id="UserPic" class="chatriq-user" style="background-image: url(), url({#$__RES_Web#}/images/person.jpg);"></div>
                                            </div>
                                            <div class="conversation__name">
                                                <div id="UserName" class="conversation__name--title">Name</div>
                                                <div id="UserTime" class="conversation__time">Time</div>
                                            </div>
                                        </div>
                                        <div class="conversation__actions">
                                            <!--
                                                <div class="action-icon" data-toggle="modal" data-target="#outGoingCall" data-backdrop="static" data-keyboard="false">
                                                    <i class="mdi mdi-phone"></i>
                                                </div>
                                                <div class="action-icon" data-toggle="modal" data-target="#incomingVideoStart" data-backdrop="static" data-keyboard="false">
                                                    <i class="mdi mdi-video-outline"></i>
                                                </div>
                                                <div class="dropdown">
                                                    <div class="action-icon" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item info-panel-opener" href="javascript:;">
                                                            <span><i class="mdi mdi-information-outline"></i></span>
                                                            <span>View Contact</span>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:;">
                                                            <span><i class="mdi mdi-magnify"></i></span>
                                                            <span>Search</span>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:;">
                                                            <span><i class="mdi mdi-volume-mute"></i></span>
                                                            <span>Mute notifications</span>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:;">
                                                            <span><i class="mdi mdi-wallpaper"></i></span>
                                                            <span>Wallpaper</span>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:;">
                                                            <span><i class="mdi mdi-trash-can-outline"></i></span>
                                                            <span>Delete Chat</span>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:;">
                                                            <span><i class="mdi mdi-export-variant"></i></span>
                                                            <span>Export Chat</span>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:;">
                                                            <span><i class="mdi mdi-cancel"></i></span>
                                                            <span>Block</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            -->
                                        </div>
                                    </div>
                                    <div class="conversation-panel__body">
                                        <div class="custom-scrollbar2 ps">
                                            <div class="container">
                                                <ul id="MessagesArea" class="chat-style-2 MessagesArea">

                                                </ul>
                                            </div>
                                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                            </div>
                                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="conversation-panel__footer"><form id="{#if $ChatRoom=='line'#}SendLineMsgForm{#else if $ChatRoom=='facebook'#}SendFacebookMsgForm{#/if#}">
                                        <style>
                                            .composer__left--emoticon>.fa-plus {
                                                transform: rotate(0deg);
                                                transition: all .28s ease-in .1s;
                                            }
                                            .composer__left--emoticon.composer__left--sticker>.fa-plus {
                                                transform: rotate(45deg);
                                            }
                                            .StickerEmojiBox .switchBG {
                                                position: absolute;
                                                background-color: #fff;
                                            }
                                            .StickerEmojiBox .switch {
                                                position: relative;
                                                display: inline-block;
                                                width: 60px;
                                                height: 34px;
                                                margin: 5px;
                                            }
                                            .StickerEmojiBox .nav-tabs .switch {
                                                visibility: hidden;
                                            }
                                            .StickerEmojiBox .switch>input {
                                                opacity: 0;
                                                width: 0;
                                                height: 0;
                                            }
                                            .StickerEmojiBox .switch>.slider {
                                                position: absolute;
                                                cursor: pointer;
                                                top: 0;
                                                left: 0;
                                                right: 0;
                                                bottom: 0;
                                                background-color: #ccc;
                                                -webkit-transition: .4s;
                                                transition: .4s;
                                            }
                                            .StickerEmojiBox .switch>.slider:before, .StickerEmojiBox .switch>.slider:after {
                                                position: absolute;
                                                font: normal normal normal 24px/1 "Material Design Icons";
                                                font-size: 20px;
                                                text-align: center;
                                                line-height: 26px;
                                                height: 26px;
                                                width: 26px;
                                                bottom: 4px;
                                                -webkit-transition: .4s;
                                                transition: .4s;
                                            }
                                            .StickerEmojiBox .switch>.slider:before {
                                                content: "\F784";
                                                left: 4px;
                                                background-color: #fff;
                                                color: var(--origin);
                                            }
                                            .StickerEmojiBox .switch>.slider:after {
                                                content: "\F1F2";
                                                left: 30px;
                                                color: #949aa2;
                                            }
                                            .StickerEmojiBox .switch>.slider.round {
                                                border-radius: 34px;
                                            }
                                            .StickerEmojiBox .switch>.slider.round:before, .StickerEmojiBox .switch>.slider.round:after {
                                                border-radius: 50%;
                                            }
                                            .StickerEmojiBox .switch>input:checked + .slider:before {
                                                background-color: unset;
                                                color: #949aa2;
                                            }
                                            .StickerEmojiBox .switch>input:checked + .slider:after {
                                                background-color: #fff;
                                                color: var(--origin);
                                            }

                                            .StickerEmojiBox {
                                                display: none;
                                                max-height: 30vh;
                                            }
                                            #MessageBox {
                                                display: none;
                                                overflow: auto;
                                                max-height: 30vh;
                                            }
                                            #MessageBox .ShowValueList .target {
                                                width: 10vw;
                                            }
                                            #MessageBox .ShowValueList .img {
                                                width: 20vw;
                                            }
                                            #MessageBox .ShowValueList .name {
                                                width: 70vw;
                                            }
                                            .btn-bordered {
                                                background: none;
                                                color: #d43f3a;
                                                border-radius: 50px;
                                                float: right;
                                                margin-top: 0.75em;
                                                margin-right: 1.5em;
                                            }
                                            .StickerEmojiBox>.nav-tabs {
                                                flex-wrap: nowrap;
                                                overflow: auto;
                                                line-height: 40px;
                                            }
                                            .StickerEmojiBox>.nav-tabs>.active, .StickerEmojiBox>.nav-tabs>.active>a {
                                                background-color: #e4e4e4;
                                            }
                                            .StickerEmojiBox>.nav-tabs img {
                                                width: 34px;
                                                height: 29px;
                                            }
                                            .StickerEmojiBox .ImgType, .StickerEmojiBox .EmojiType, .StickerEmojiBox .AddType {
                                                display: none;
                                                overflow: auto;
                                                max-height: 30vh;
                                            }
                                            .StickerEmojiBox .AddType {
                                                display: block;
                                            }
                                            .StickerEmojiBox .ImgType>ul, .StickerEmojiBox .ImgType>ul, .StickerEmojiBox .AddType>ul {
                                                display: flex;
                                                justify-content: center;
                                                flex-wrap: wrap;
                                            }
                                            .StickerEmojiBox .AddType>ul {
                                                padding: 15px;
                                                margin-bottom: 0px;
                                            }
                                            .StickerEmojiBox .ImgType>ul>li, .StickerEmojiBox .EmojiType>ul>li, .StickerEmojiBox .AddType>ul>li {
                                                display: inline-block;
                                                flex: 0 0 calc(25%);
                                                margin: unset;
                                                border: unset;
                                            }
                                            .ImgType>ul, .EmojiType>ul, #emoticon>ul, #kaomoji>ul {
                                                padding: 15px;
                                                min-height: 300px;
                                                overflow: auto;
                                                width: 100%;
                                            }
                                            .StickerEmojiBox .EmojiType>ul>li {
                                                flex: 0 0 calc(20%);
                                            }
                                            .StickerEmojiBox .ImgType>ul>li>.Img {
                                                background-repeat: no-repeat;
                                                background-size: contain;
                                                background-position: center;
                                                height: 70px;
                                            }
                                            .StickerEmojiBox .EmojiType>ul>li>.Img {
                                                background-repeat: no-repeat;
                                                background-size: contain;
                                                background-position: center;
                                                height:39px
                                            }
                                            .AddType .ColumnItem {
                                                display: flex;
                                                cursor: pointer;
                                                flex-direction: column;
                                                justify-content: space-between;
                                                align-items: center;
                                                padding: .6rem .8rem;
                                                font-size: x-small;
                                                margin-top: unset;
                                            }
                                            .AddType .ColumnItem>i {
                                                font-size: large;
                                            }

                                            .PreviewBox {
                                                display: none;
                                                cursor: pointer;
                                                position: absolute;
                                                height: 30vh;
                                                line-height: 30vh;
                                                text-align: center;
                                                background-color: #d6d6d682;
                                                left: 0px;
                                                width: 100%;
                                                margin-top: calc(-30vh - 1rem);
                                            }
                                             @media (max-width: 576px){
                                                .StickerEmojiBox .ImgType>ul>li, .StickerEmojiBox .EmojiType>ul>li, .StickerEmojiBox .AddType>ul>li {
                                                    min-width: auto;
                                                }
                                                .PreviewBox {
                                                    margin-top: calc(-30vh - .625rem);
                                                }
                                                #SendBox .emojionearea>.emojionearea-editor {
                                                    padding: 6px 12px;
                                                }
                                                #SendBox .emojionearea>.emojionearea-button {
                                                    display: none;
                                                }
                                             }
                                            .PreviewBox>.fa-close {
                                                position: absolute;
                                                top: 10px;
                                                right: 10px;
                                                font-size: 25px;
                                            }
                                            .PreviewBox>img, .PreviewBox>video, .PreviewBox>audio {
                                                max-height: 100%;
                                            }
                                            .Item>.Data>img, .Item>.Data>video, .Item>.Data>audio {
                                                max-height: calc(100% - 2px);
                                                max-width: calc(100% - 2px);
                                            }
                                            .PushMsgBox {
                                                display: flex;
                                                max-height: 10vh;
                                            }
                                            .PushMsgBox>.Item {
                                                cursor: pointer;
                                                flex: 0 0 calc(20%);
                                                text-align: right;
                                            }
                                            .PushMsgBox>.Item.active {
                                                border: 1px solid var(--origin);
                                            }
                                            .PushMsgBox>.Item>.fa-close {
                                                font-size: 20px;
                                                position: absolute;
                                                margin-left: -20px;
                                                z-index: 1;
                                            }
                                            .PushMsgBox>.Item>.Data {
                                                text-align: center;
                                                height: 10vh;
                                            }
                                            .PushMsgBox>.Item[type="text"]>.Data {
                                                display: grid;
                                            }
                                            .PushMsgBox>.Item>.Data>div {
                                                line-height: 10vh;
                                            }
                                            .PushMsgBox>.Item>.Data>.Img {
                                                background-repeat: no-repeat;
                                                background-size: contain;
                                                background-position: center;
                                                height: 100%;
                                            }
                                            #ShowQuicklyReplyBox>.Item {
                                                flex: 0 0 calc(100%);
                                            }

                                            .ShowImgmapIMG {
                                                width: auto;
                                                max-width: 100%;
                                                max-height: 100%;
                                            }
                                        </style>

                                        <div id="ShowPreviewBox" class="PreviewBox">
                                            <i class="fa fa-close" onclick="$(this).parent().hide();$(this).parent().html($(this));"></i>
                                        </div>

                                        <div class="composer">
                                            <div class="composer__left">
                                                <div id="ShowAddBox_Btn" class="composer__left--emoticon" onclick="if($('#ShowStickerBox').css('display')!=='none' || $('#ShowEmojiBox').css('display')!=='none'){
                                                                                                                        $('#ShowStickerEmojiBox_Btn').click();
                                                                                                                    }
                                                                                                                    if($('#ShowAddBox').css('display')==='none'){
                                                                                                                        $(this).addClass('composer__left--sticker');
                                                                                                                        $('#ShowAddBox').css('display', 'grid');
                                                                                                                        $('.conversation-wrapper .conversation-panel__footer').attr('style', 'position: fixed; bottom: 0;');
                                                                                                                    }else{
                                                                                                                        $(this).removeClass('composer__left--sticker');
                                                                                                                        $('#ShowAddBox').hide();
                                                                                                                        $('.conversation-wrapper .conversation-panel__footer').attr('style', '');
                                                                                                                    }
                                                                                                                    if($('#ShowPreviewBox').css('display')!=='none'){
                                                                                                                        $('#ShowPreviewBox>.fa-close').click();
                                                                                                                    }">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                {#if $ChatRoom=='line'#}
                                                    <div id="ShowStickerEmojiBox_Btn"  class="composer__left--emoticon" onclick="var ShowBox = ($('#EmojiSwitch').prop('checked')) ? '#ShowEmojiBox' : '#ShowStickerBox';
                                                                                                    var HideBox = ($('#EmojiSwitch').prop('checked')) ? '#ShowStickerBox' : '#ShowEmojiBox';
                                                                                                    $(HideBox).hide();
                                                                                                    if($('#ShowAddBox').css('display')!=='none'){
                                                                                                        $('#ShowAddBox_Btn').click();
                                                                                                    }
                                                                                                    if($(ShowBox).css('display')==='none'){
                                                                                                        $(this).addClass('composer__left--sticker');
                                                                                                        $(ShowBox).css('display', 'grid');
                                                                                                        $('.conversation-wrapper .conversation-panel__footer').attr('style', 'position: fixed; bottom: 0;');
                                                                                                    }else{
                                                                                                        $(this).removeClass('composer__left--sticker');
                                                                                                        $(ShowBox).hide();
                                                                                                        $('.conversation-wrapper .conversation-panel__footer').attr('style', '');
                                                                                                    }
                                                                                                    if($('#ShowPreviewBox').css('display')!=='none'){
                                                                                                        $('#ShowPreviewBox>.fa-close').click();
                                                                                                    }">
                                                        <i class="mdi mdi-sticker-emoji"></i>
                                                    </div>
                                                {#/if#}
                                            </div>
                                            <div id="SendBox" class="composer__middle">
                                                <input id="ChatMember" type="hidden" name="fields[UID]" value="">
                                                <textarea id="TypeMsg" class="form-control" name="fields[message]" rows="1" placeholder="輸入訊息..." onchange="Resize($(this));" onkeyup="Resize($(this));"></textarea>
                                            </div>
                                            <div class="composer__right">
                                                <div class="composer__right--send" onclick="{#if $ChatRoom=='line'#}SendLineMsg();{#else if $ChatRoom=='facebook'#}SendFacebookMsg();{#/if#}"><i class="mdi mdi-send"></i></div>
                                                <div class="composer__right--microphone" onclick="{#if $ChatRoom=='line'#}SendLineMsg();{#else if $ChatRoom=='facebook'#}SendFacebookMsg();{#/if#}"><i class="mdi mdi-send"></i></div>
                                                <!--<div class="composer__right--microphone"><i class="mdi mdi-microphone"></i></div>-->
                                            </div>
                                        </div>

                                        <div id="ShowPushMsgBox" class="PushMsgBox" style="display: none;">
                                            {#for $MsgCtn=0 to 4#}
                                                <div class="Item hide">
                                                    <i class="fa fa-close" onclick="ItemClose($(this));"></i>
                                                    <div class="Data">

                                                    </div>
                                                </div>
                                            {#/for#}
                                            <script>
                                                var TranslateList = {
                                                    "ImageMap" : "圖文訊息",
                                                    "LineTemplate" : "卡片式選單",
                                                    "ImageCarousel" : "大圖選單",
                                                    "QuicklyReply" : "快捷語",
                                                    "CustomMessage" : "自訂訊息",
                                                };
                                                function ItemClose(obj=null){
                                                    if(obj){
                                                        obj.parent().removeClass('show');
                                                        obj.parent().addClass('hide');
                                                        if($('#ShowPushMsgBox>.show').length===0){
                                                            $('#ShowPushMsgBox').hide();
                                                        }
                                                        if($('#ShowQuicklyReplyBox>.show').length===0){
                                                            $('#ShowQuicklyReplyBox').hide();
                                                        }
                                                        obj.parent().find('.Data').html('');
                                                        var Type_Tmp = obj.parent().attr('Type');
                                                        obj.parent().attr('Type', '');
                                                        if(Type_Tmp !== 'QuicklyReply'){
                                                            $('#ShowPushMsgBox').append(obj.parent());
                                                            ProcessText(true);
                                                            switch(Type_Tmp){
                                                                case 'text':
                                                                    if(obj.parent().hasClass('active')){
                                                                        $('#TypeMsg').val('').change();
                                                                    }
                                                                    break;
                                                            }
                                                        }
                                                    }
                                                }
                                                function UpDateMsgData(type=null, obj=null){
                                                    console.log(type);
                                                    if(type && obj){
                                                        switch(type){
                                                            case 'text':
                                                                if($('#TypeMsg').val()){
                                                                    if($('#ShowPushMsgBox>[type='+type+'].Item.active').length>0){
                                                                        EditMsgData(type, obj);
                                                                    }else{
                                                                        AddMsgData(type, $('#TypeMsg'));
                                                                    }
                                                                }else{
                                                                    if($('#ShowPushMsgBox>[type='+type+'].Item.active').length>0){
                                                                        $('#ShowPushMsgBox>[type='+type+'].Item.active').find('.fa-close').click();
                                                                    }
                                                                }
                                                                break;
                                                            case 'sticker':
                                                                if($('#ShowPushMsgBox>[type='+type+'].Item.active').length>0){
                                                                    EditMsgData(type, obj);
                                                                }else{
                                                                    AddMsgData(type, obj);
                                                                }
                                                                break;
                                                            case 'ImageMap':
                                                            case 'LineTemplate':
                                                            case 'ImageCarousel':
                                                            case 'QuicklyReply':
                                                            case 'CustomMessage':
                                                                if($('#ShowPushMsgBox>[type='+type+'].Item.active').length>0){
                                                                    EditMsgData(type, obj);
                                                                }else{
                                                                    AddMsgData(type, obj);
                                                                }
                                                                break;
                                                        }
                                                    }
                                                }
                                                function EditMsgData(type=null, obj=null){
                                                    if(obj){
                                                        var PushMsgBox = (obj.hasClass('Item')) ? obj : obj.parents('.Item');
                                                        PushMsgBox = (PushMsgBox[0]) ? PushMsgBox : $('#ShowPushMsgBox>[type='+ type +'].Item.active');
                                                        switch(type){
                                                            case 'text':
                                                                $('#ShowPushMsgBox>.Item').removeClass('active');PushMsgBox.addClass('active');
                                                                PushMsgBox.find('.Data>.MsgDataValue').val($('#TypeMsg').val());
                                                                PushMsgBox.find('.Data>div').attr('data', $('#TypeMsg').val());
                                                                break;
                                                            case 'sticker':
                                                                $('#TypeMsg').val('').change();
                                                                $('#ShowPushMsgBox>.Item').removeClass('active');
                                                                PushMsgBox.find('.Data>.MsgDataValue').val(obj.attr('data-stkid'));
                                                                PushMsgBox.find('.Data>.Img').css('background-image', 'url('+ obj.attr('src') + ')').attr('data-stkid', obj.attr('data-stkid')).attr('data-src', obj.attr('src'));
                                                                $('#ShowPreviewBox>.fa-close').click();
                                                                break;
                                                            case 'ImageMap':
                                                            case 'LineTemplate':
                                                            case 'ImageCarousel':
                                                            case 'CustomMessage':
                                                                $('#ShowPushMsgBox>.Item').removeClass('active');
                                                                PushMsgBox.find('.Data>.MsgDataValue').val(obj.attr('data-id'));
                                                                PushMsgBox.find('.Data>div').attr('data', obj.attr('data-id'));
                                                                $('#ShowPreviewBox>.fa-close').click();
                                                                break;
                                                        }
                                                        if(type==='text'){
                                                            ProcessText(true);
                                                        }else{
                                                            ProcessText();
                                                        }
                                                    }
                                                }
                                                function AddMsgData(type=null, obj=null){
                                                    if(obj){
                                                        if(type === 'QuicklyReply'){
                                                            $('#ShowQuicklyReplyBox').show();
                                                            var PushMsgBox = $('#ShowQuicklyReplyBox>.Item').eq(0);
                                                            PushMsgBox.find('.Data').html('');
                                                            PushMsgBox.find('.Data').append('<input type="hidden" class="MsgDataType" name="" value="'+ type +'">');

                                                            PushMsgBox.find('.Data').append('<input type="hidden" class="MsgDataValue" name="" value="'+ obj.attr('data-id') +'">');
                                                            PushMsgBox.find('.Data').append('<div onclick="ShowMessageBody(\''+type+'\', $(this).attr(\'data\'));" data="'+ obj.attr('data-id') +'">'+ TranslateList[type] +'<div>');
                                                            PushMsgBox.attr('Type', type);
                                                            PushMsgBox.removeClass('hide');
                                                            PushMsgBox.addClass('show');

                                                            $('#ShowPreviewBox>.fa-close').click();
                                                        }else{
                                                            if($('#ShowPushMsgBox>.hide').length > 0){
                                                                $('#ShowPushMsgBox').show();
                                                                var PushMsgBox = $('#ShowPushMsgBox>.hide').eq(0);
                                                                $('#ShowPushMsgBox>.Item').removeClass('active');
                                                                if(type !== 'sticker'){
                                                                    PushMsgBox.addClass('active');
                                                                }
                                                                PushMsgBox.find('.Data').html('');
                                                                PushMsgBox.find('.Data').append('<input type="hidden" class="MsgDataType" name="" value="'+ type +'">');
                                                                switch(type){
                                                                    case 'text':
                                                                        PushMsgBox.find('.Data').append('<input type="hidden" class="MsgDataValue" name="" value="'+ obj.val() +'">');
                                                                        PushMsgBox.find('.Data').append('<div onclick="$(\'#ShowPushMsgBox>.Item\').removeClass(\'active\');$(this).parents(\'.Item\').addClass(\'active\');$(\'#TypeMsg\').val($(this).attr(\'data\')).change();" data="'+ obj.val() +'">文字</div>');
                                                                        break;
                                                                    case 'sticker':
                                                                        $('#TypeMsg').val('').change();
                                                                        PushMsgBox.find('.Data').append('<input type="hidden" class="MsgDataValue" name="" value="'+ obj.attr('data-stkid') +'">');
                                                                        PushMsgBox.find('.Data').append('<div class="Img" style="background-image: url('+ obj.attr('src') +');" onclick="ShowPreviewBox(\''+ type +'\', $(this), $(this).attr(\'data-stkid\'), $(this).attr(\'data-src\'));" data-stkid="'+ obj.attr('data-stkid') +'" data-src="'+ obj.attr('src') +'"></div>');
                                                                        break;
                                                                    case 'image':
                                                                    case 'video':
                                                                    case 'audio':
                                                                        $('#TypeMsg').val('').change();
                                                                        PushMsgBox.find('.Data').append('<input type="hidden" class="MsgDataValue" name="" value="">');
                                                                        $(obj).parent().append('<input class="hide" type="file" name="" accept="audio/*" onchange="if (this.files && this.files[0]) { AddMsgData(\''+ type +'\', this); }">');
                                                                        $(obj).addClass('MsgDataFile');
                                                                        PushMsgBox.find('.Data').append(obj);
                                                                        var _HTML = '';
                                                                        switch(type){
                                                                            case 'image':
                                                                                _HTML = '<img data-file="'+ obj.value +'" src="'+ URL.createObjectURL(obj.files[0]) +'">';
                                                                                break;
                                                                            case 'video':
                                                                                _HTML = '<video data-file="'+ obj.value +'" crossorigin="anonymous" controls><source src="'+ URL.createObjectURL(obj.files[0]) +'"></video>';
                                                                                break;
                                                                            case 'audio':
                                                                                _HTML = '<audio data-file="'+ obj.value +'" crossorigin="anonymous" controls><source src="'+ URL.createObjectURL(obj.files[0]) +'"></audio>';
                                                                                break;
                                                                        }
                                                                        PushMsgBox.find('.Data').append(_HTML);
                                                                        break;
                                                                    case 'ImageMap':
                                                                    case 'LineTemplate':
                                                                    case 'ImageCarousel':
                                                                    case 'CustomMessage':
                                                                        PushMsgBox.find('.Data').append('<input type="hidden" class="MsgDataValue" name="" value="'+ obj.attr('data-id') +'">');
                                                                        PushMsgBox.find('.Data').append('<div onclick="$(\'#ShowPushMsgBox>.Item\').removeClass(\'active\');$(this).parents(\'.Item\').addClass(\'active\');ShowMessageBody(\''+type+'\', $(this).attr(\'data\'));" data="'+ obj.attr('data-id') +'">'+ TranslateList[type] +'<div>');
                                                                        break;
                                                                }
                                                                PushMsgBox.attr('Type', type);
                                                                PushMsgBox.removeClass('hide');
                                                                PushMsgBox.addClass('show');
                                                                switch(type){
                                                                    case 'ImageMap':
                                                                    case 'LineTemplate':
                                                                    case 'ImageCarousel':
                                                                    case 'CustomMessage':
                                                                        PushMsgBox.removeClass('active');
                                                                        break;
                                                                }
                                                                $('#ShowPreviewBox>.fa-close').click();

                                                                ProcessText();
                                                            }
                                                        }
                                                    }
                                                }
                                                function ShowPreviewBox(type=null, obj=null, data_1=null, data_2=null){
                                                    var _HTML = '<i class="fa fa-close" onclick="$(this).parent().hide();$(this).parent().html($(this));"></i>';
                                                    switch(type){
                                                        case 'sticker':
                                                            var PushMsgBox = obj ? obj.parents('.Item') : $('#ShowPushMsgBox>[type='+ type +'].Item.active');
                                                            $('#ShowPushMsgBox>.Item').removeClass('active');PushMsgBox.addClass('active');
                                                            if(!$('#ShowStickerEmojiBox_Btn').hasClass('composer__left--sticker')){
                                                                $('#ShowStickerEmojiBox_Btn').click();
                                                            }
                                                            if($('#ShowStickerBox').css('display') === 'none'){
                                                                $('#StickerSwitch').prop('checked', false);
                                                                $('#ShowEmojiBox').hide();
                                                                $('#ShowStickerBox').css('display', 'grid');
                                                            }
                                                            _HTML += '<img data-stkid="'+ data_1 +'" src="'+ data_2 +'" onclick="UpDateMsgData(\''+ type +'\', $(this));">';
                                                            break;
                                                        case 'ImageMap':
                                                        case 'LineTemplate':
                                                        case 'ImageCarousel':
                                                        case 'QuicklyReply':
                                                            _HTML += '<div style="height:100%;text-align:-webkit-center;">';
                                                                _HTML += '<div class="swiper-container" style="height:100%;width:270px;">';
                                                                    _HTML += '<div class="swiper-wrapper TemplateBG" style="display:block;height:100%;overflow:initial;min-width: '+ data_2 +';" data-id="'+ obj.attr('data-id') +'" onclick="UpDateMsgData(\''+ type +'\', $(this));">' +
                                                                                data_1 +
                                                                            '</div>';
                                                                _HTML += '</div>';
                                                            _HTML += '</div>';
                                                            break;
                                                        case 'CustomMessage':
                                                            _HTML += '<div style="height:100%;text-align:-webkit-center;" data-id="'+ obj.attr('data-id') +'" onclick="UpDateMsgData(\''+ type +'\', $(this));">';
                                                                _HTML += data_1;
                                                            _HTML += '</div>';
                                                            break;
                                                    }
                                                    $('#ShowPreviewBox').show().html(_HTML);
                                                    ProcessText();
                                                }
                                                function ProcessText(flag=false){
                                                    if(flag){
                                                        $('#TypeMsg').attr('placeholder', '輸入訊息...').attr('readonly', false);
                                                        $('#SendBox .emojionearea-editor').attr('placeholder', '輸入訊息...').attr('readonly', false).attr('contenteditable', true);
                                                        $('#SendBox .emojionearea-button').show();
                                                    }else if($('#ShowPushMsgBox>.hide').length===0){
                                                        if($('#ShowPushMsgBox>.Item.show').last().attr('Type')!=='text' || !$('#ShowPushMsgBox>.Item.show').last().hasClass('active')){
                                                            $('#TypeMsg').attr('placeholder', '最多5則訊息').attr('readonly', true).val('').change();
                                                            $('#SendBox .emojionearea-editor').attr('placeholder', '最多5則訊息').attr('readonly', true).attr('contenteditable', false);
                                                            $('#SendBox .emojionearea-button').hide();
                                                        }
                                                    }
                                                }
                                            </script>
                                        </div>
                                        <div id="ShowQuicklyReplyBox" class="PushMsgBox">
                                            <div class="Item hide">
                                                <i class="fa fa-close" onclick="ItemClose($(this));"></i>
                                                <div class="Data">

                                                </div>
                                            </div>
                                        </div>

                                        <div id="ShowStickerBox" class="StickerEmojiBox">
                                            <div class="switchBG">
                                                <label class="switch">
                                                    <input id="StickerSwitch" type="checkbox" onchange="$('#EmojiSwitch').prop('checked', $(this).prop('checked'));
                                                           if($(this).prop('checked')){
                                                                $('#ShowStickerBox').hide();
                                                                $('#ShowEmojiBox').css('display', 'grid');
                                                            }else{
                                                                $('#ShowStickerBox').css('display', 'grid');
                                                                $('#ShowEmojiBox').hide();
                                                            }">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <ul class="nav nav-tabs">
                                                <li>
                                                     <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </li>
                                                <li class="active" onclick="$('.ImgType').hide();$('#ImgTypeCommonlyUsed').show();">
                                                    <a href="#ImgTypeCommonlyUsed" data-toggle="tab" aria-expanded="true">
                                                        <i style="font-size: 24px;vertical-align: middle;" class="fa fa-history"></i>
                                                    </a>
                                                </li>
                                                {#foreach $StickerList as $packageId=>$item#}
                                                    <li onclick="$('.ImgType').hide();$('#ImgType{#$packageId#}').show();
                                                                    $('#ShowStickerBox .nav-tabs li>a>img').each(function(e){ $(this).attr('src', $(this).attr('{#$StickerTabOff#}')); });
                                                                    $(this).find('a>img').attr('src', $(this).find('a>img').attr('{#$StickerTabOn#}'));
                                                                    $('#ImgType{#$packageId#} .Img').each(function(e){
                                                                        if($(this).css('background-image') === 'none'){
                                                                            $(this).css('background-image', 'url('+ $(this).attr('DataSrc') +')');
                                                                        }
                                                                    });">
                                                        <a href="#ImgType{#$packageId#}" data-toggle="tab" aria-expanded="true">
                                                            <img tab_on="{#$StickerPageLink_Path#}{#$packageId#}{#$StickerLink_OS#}{#$StickerTabOn#}{#$StickerPageLink_Extension#}"
                                                                tab_off="{#$StickerPageLink_Path#}{#$packageId#}{#$StickerLink_OS#}{#$StickerTabOff#}{#$StickerPageLink_Extension#}"
                                                                src="{#$StickerPageLink_Path#}{#$packageId#}{#$StickerLink_OS#}{#$StickerTabOff#}{#$StickerPageLink_Extension#}">
                                                        </a>
                                                    </li>
                                                {#/foreach#}
                                            </ul>
                                            <div class="tab-pane ImgType active in" id="ImgTypeCommonlyUsed" style="display:block;">
                                                <div class="btn btn-danger btn-bordered" onclick="if(confirm('確定要清空常用貼圖?')){ UpdateCommonlyUsed('Sticker'); }">
                                                    <i class="fa fa-trash-o"></i> 清除
                                                </div>
                                                <ul></ul>
                                            </div>
                                            <div class="">
                                                {#foreach $StickerList as $packageId=>$item#}
                                                    <div class="ImgType" id="ImgType{#$packageId#}">
                                                        <ul>
                                                            {#foreach $item as $itemKey=>$itemVal#}
                                                                {#for $stickerId=$itemVal.start to $itemVal.end#}
                                                                    <li data-stkid="{#$packageId#}_{#$stickerId#}">
                                                                        <div class="Img" DataSrc="{#$StickerLink_Path#}{#$stickerId#}{#$StickerLink_File#}"></div><!-- width:75px;height:70px; -->
                                                                    </li>
                                                                {#/for#}
                                                            {#/foreach#}
                                                        </ul>
                                                    </div>
                                                {#/foreach#}
                                            </div>
                                            <script>
                                                $(function () {
                                                    $(document).on('click', '.ImgType>ul>li', function (event) {
                                                        var StickerAnimationList = {#if $StickerAnimationList#}{#json_encode($StickerAnimationList)#}{#else#}{}{#/if#};
                                                        var DataStkid = $(this).attr('data-stkid');
                                                        UpdateCommonlyUsed('Sticker', DataStkid);
                                                        var PageId = DataStkid.split('_')[0];
                                                        var Sticker = (StickerAnimationList.indexOf(PageId)===-1) ? 'sticker.png' : 'sticker_animation.png';
                                                        var DataSrc = $(this).find('.Img').attr('datasrc').replace('sticker.png', Sticker);
                                                        ShowPreviewBox('sticker', null, DataStkid, DataSrc);
                                                    });
                                                });
                                            </script>
                                        </div>
                                        <div id="ShowEmojiBox" class="StickerEmojiBox">
                                            <div class="switchBG">
                                                <label class="switch">
                                                    <input id="EmojiSwitch" type="checkbox" onchange="$('#StickerSwitch').prop('checked', $(this).prop('checked'));
                                                           if($(this).prop('checked')){
                                                                $('#ShowStickerBox').hide();
                                                                $('#ShowEmojiBox').css('display', 'grid');
                                                            }else{
                                                                $('#ShowStickerBox').css('display', 'grid');
                                                                $('#ShowEmojiBox').hide();
                                                            }">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <ul class="{#if $EmojiList#}nav nav-tabs{#/if#}">
                                                <li>
                                                     <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </li>
                                                <li class="active" onclick="$('.EmojiType').hide();$('#EmojiTypeCommonlyUsed').show();">
                                                    <a href="#EmojiTypeCommonlyUsed" data-toggle="tab" aria-expanded="true">
                                                        <i style="font-size: 24px;vertical-align: middle;" class="fa fa-history"></i>
                                                    </a>
                                                </li>
                                                {#foreach $EmojiList as $packageId=>$item#}
                                                    <li onclick="$('.EmojiType').hide();$('#EmojiType{#$packageId#}').show();
                                                                    $('#ShowEmojiBox .nav-tabs li>a>img').each(function(e){ $(this).attr('src', $(this).attr('{#$EmojiTabOff#}')); });
                                                                    $(this).find('a>img').attr('src', $(this).find('a>img').attr('{#$EmojiTabOn#}'));
                                                                    $('#EmojiType{#$packageId#} .Img').each(function(e){
                                                                        if($(this).css('background-image') === 'none'){
                                                                            $(this).css('background-image', 'url('+ $(this).attr('DataSrc') +')');
                                                                        }
                                                                    });">
                                                        <a href="#EmojiType{#$packageId#}" data-toggle="tab" aria-expanded="true">
                                                            <img style="width:34px;height:29px;"
                                                                tab_on="{#$EmojiLink_Path#}{#$packageId#}{#$EmojiLink_OS#}{#$EmojiTabOn#}{#$EmojiLink_Extension#}"
                                                                tab_off="{#$EmojiLink_Path#}{#$packageId#}{#$EmojiLink_OS#}{#$EmojiTabOff#}{#$EmojiLink_Extension#}"
                                                                src="{#$EmojiPageLink_Path#}{#$packageId#}{#$EmojiLink_OS#}{#$EmojiTabOff#}{#$StickerPageLink_Extension#}">
                                                        </a>
                                                    </li>
                                                {#/foreach#}
                                            </ul>
                                            <div class="tab-pane EmojiType active in" id="EmojiTypeCommonlyUsed" style="display:block;">
                                                <div class="btn btn-danger btn-bordered" onclick="if(confirm('確定要清空常用表情?')){ UpdateCommonlyUsed('Emoticon'); }">
                                                    <i class="fa fa-trash-o"></i> 清除
                                                </div>
                                                <ul></ul>
                                            </div>
                                            <div class="">
                                                {#foreach $EmojiList as $packageId=>$item#}
                                                    <div class="EmojiType" id="EmojiType{#$packageId#}">
                                                        <ul>
                                                            {#for $emojiIdTmp=1 to $item#}
                                                                {#if $emojiIdTmp<10#}
                                                                    {#assign var="emojiId" value="00"|cat:$emojiIdTmp#}
                                                                {#else if $emojiIdTmp<100#}
                                                                    {#assign var="emojiId" value="0"|cat:$emojiIdTmp#}
                                                                {#else#}
                                                                    {#assign var="emojiId" value=$emojiIdTmp#}
                                                                {#/if#}
                                                                <li data-stkid="{#$packageId#}_{#$emojiId#}">
                                                                    <div class="Img" DataSrc="{#$EmojiLink_Path#}{#$packageId#}{#$EmojiLink_OS#}{#$emojiId#}{#$EmojiLink_Extension#}" style="{#if $packageId=='5ac1bfd5040ab15980c9b435'#}background-image: url({#$EmojiLink_Path#}{#$packageId#}{#$EmojiLink_OS#}{#$emojiId#}{#$EmojiLink_Extension#}){#/if#}"></div><!-- width:39px;height:39px; -->
                                                                </li>
                                                            {#/for#}
                                                        </ul>
                                                    </div>
                                                {#/foreach#}
                                            </div>
                                            <script>
                                                var WindowDirection='', mouseDownOffset=null;
                                                var Selection;
                                                var CompareList = {};
                                                $(function () {
                                                    $(document).on('mousedown mouseup', function(event) {
                                                        if( event.type === 'mousedown' ){
                                                            mouseDownOffset = event.clientX;
                                                        }else if( event.type === 'mouseup' ){
                                                            WindowDirection = event.clientX < mouseDownOffset ? 'rtl' : 'ltr';
                                                        }
                                                    });
                                                    $(document).on('click', '.EmojiType>ul>li', function (event) {
                                                        var DataStkid = $(this).attr('data-stkid');
                                                        var DataSrc = $(this).find('.Img').attr('datasrc');
                                                        UpdateCommonlyUsed('Emoticon', DataStkid);
                                                        var ContentData = '(' + DataStkid + ')';
                                                        var ContentHtml = '<img class="emojioneemoji" alt="'+ ContentData +'" src="'+ DataSrc +'" style="width:39px;height:39px;">';
                                                        CompareList[ContentData] = ContentHtml;
                                                        InsertEmoji(ContentHtml);//ContentData
                                                    });
                                                    $(document).on('change', '#TypeMsg', function (event) {
                                                        //console.log(CompareList);
                                                        for (const [key, item] of Object.entries(CompareList)) {
                                                            $('#SendBox .emojionearea>.emojionearea-editor').html($('#SendBox .emojionearea>.emojionearea-editor').html().replaceAll(key, item));
                                                        };
                                                    });
                                                });
                                                var Debug = 0;
                                                window.setTimeout(function () {
                                                    var textValueArea = $('#TypeMsg').parent().find('.emojionearea .emojionearea-editor');
                                                    textValueArea.bind('click keyup', function(event) { // blur focus change mouseover mouseout
                                                        window.setTimeout(function () {
                                                            if (document.selection) { //for IE
                                                                $(this).focus();
                                                                Selection = document.selection.createRange();
                                                            } else { //for FireFox
                                                                if(Debug){
                                                                    console.log('Start');
                                                                }
                                                                var anchorIndex=-1, focusIndex=-1, _anchorFrontOffset=0, _focusFrontOffset=0, anchorEditor=null, focusEditor=null, anchorEle=null, focusEle=null;
                                                                var WindowSelection = (window.getSelection) ? window.getSelection() : document.getSelection();
                                                                var anchorNodeName = (WindowSelection.anchorNode) ? WindowSelection.anchorNode.nodeName : null;
                                                                var focusNodeName = (WindowSelection.focusNode) ? WindowSelection.focusNode.nodeName : null;
                                                                WindowDirection = (WindowSelection.type==='Caret') ? '' : WindowDirection;
                                                                var _anchorOffset = WindowSelection.anchorOffset, _focusOffset=WindowSelection.focusOffset;
                                                                if(Debug){
                                                                    console.log('_anchorOffset(origin): ' + _anchorOffset);
                                                                    console.log('_focusOffset(origin): ' + _focusOffset);
                                                                }

                                                                if(anchorNodeName){
                                                                    switch(anchorNodeName){
                                                                        case '#text':
                                                                            anchorEle = WindowSelection.anchorNode;
                                                                            anchorEditor = anchorEle.parentNode;
                                                                            break;
                                                                        case 'DIV':
                                                                        default :
                                                                            anchorEditor = WindowSelection.anchorNode;
                                                                            anchorEle = anchorEditor.childNodes[_anchorOffset-1];
                                                                            if(WindowSelection.type==='Range'){
                                                                                _anchorOffset = 1;
                                                                            }
                                                                            break;
                                                                    }
                                                                    for (var i=0; i<anchorEditor.childNodes.length; i++) {
                                                                        if(anchorEle&& anchorEle===anchorEditor.childNodes[i]){
                                                                            anchorIndex = i;
                                                                        }
                                                                    }
                                                                    if(anchorEle){
                                                                        switch(anchorEle.nodeName){
                                                                            case 'IMG':
                                                                            case 'BR':
                                                                                anchorIndex += 1;
                                                                                _anchorOffset = 0;
                                                                                break;
                                                                        }
                                                                    }
                                                                    if(Debug){
                                                                        console.log('anchorIndex: ' + anchorIndex);
                                                                    }
                                                                    for (var d=0; d<anchorIndex; d++) {
                                                                        if(Debug){
                                                                            console.log(anchorEditor.childNodes[d]);
                                                                        }
                                                                        switch(anchorEditor.childNodes[d].nodeName){
                                                                            case '#text':
                                                                                _anchorFrontOffset += anchorEditor.childNodes[d].length;
                                                                                break;
                                                                            case 'IMG':
                                                                            case 'DIV':
                                                                            default :
                                                                                _anchorFrontOffset += anchorEditor.childNodes[d].outerHTML.length;
                                                                                break;
                                                                        }
                                                                    }
                                                                    if(Debug){
                                                                        console.log('_anchorOffset: ' + _anchorOffset);
                                                                        console.log('_anchorFrontOffset: ' + _anchorFrontOffset);
                                                                    }
                                                                }
                                                                if(focusNodeName){
                                                                    switch(focusNodeName){
                                                                        case '#text':
                                                                            focusEle = WindowSelection.focusNode;
                                                                            focusEditor = focusEle.parentNode;
                                                                            break;
                                                                        case 'DIV':
                                                                        default :
                                                                            focusEditor = WindowSelection.focusNode;
                                                                            focusEle = focusEditor.childNodes[_focusOffset-1];
                                                                            if(WindowSelection.type==='Range'){
                                                                                _focusOffset = 1;
                                                                            }
                                                                            break;
                                                                    }
                                                                    for (var i=0; i<focusEditor.childNodes.length; i++) {
                                                                        if(focusEle&& focusEle===focusEditor.childNodes[i]){
                                                                            focusIndex = i;
                                                                        }
                                                                    }
                                                                    if(focusEle){
                                                                        switch(focusEle.nodeName){
                                                                            case 'IMG':
                                                                            case 'BR':
                                                                                focusIndex += 1;
                                                                                _focusOffset = 0;
                                                                                break;
                                                                        }
                                                                    }
                                                                    if(Debug){
                                                                        console.log('focusIndex: ' + focusIndex);
                                                                    }
                                                                    for (var d=0; d<focusIndex; d++) {
                                                                        if(Debug){
                                                                            console.log(focusEditor.childNodes[d]);
                                                                        }
                                                                        switch(focusEditor.childNodes[d].nodeName){
                                                                            case '#text':
                                                                                _focusFrontOffset += focusEditor.childNodes[d].length;
                                                                                break;
                                                                            case 'IMG':
                                                                            case 'DIV':
                                                                            default :
                                                                                _focusFrontOffset += focusEditor.childNodes[d].outerHTML.length;
                                                                                break;
                                                                        }
                                                                    }
                                                                    if(Debug){
                                                                        console.log('_focusOffset: ' + _focusOffset);
                                                                        console.log('_focusFrontOffset: ' + _focusFrontOffset);
                                                                    }
                                                                }

                                                                Selection = {
                                                                    'Range' : (WindowSelection.type==='Range') ? WindowSelection.getRangeAt(0) : null,
                                                                    'anchorOffset' : _anchorOffset+_anchorFrontOffset,
                                                                    'focusOffset' : _focusOffset+_focusFrontOffset,
                                                                    'WindowSelection' : WindowSelection
                                                                };
                                                                if(Debug){
                                                                    console.log('End');
                                                                }
                                                            }
                                                        }, 1);
                                                    });
                                                }, 1000);
                                                //https://stackoverflow.com/questions/17497661/insert-text-before-and-after-selection-in-a-contenteditable
                                                function InsertEmoji(Content) {
                                                    if(Debug){
                                                        console.log('InsertEmoji', Selection);
                                                    }
                                                    var textValueArea = $('#TypeMsg').parent().find('.emojionearea .emojionearea-editor');
                                                    if (document.selection) { //for IE
                                                        Selection.text = Content;
                                                    } else { //for FireFox
                                                        if(0 && Selection.Range){
                                                            Selection.Range.deleteContents();
                                                            Selection.Range.insertNode(document.createTextNode(Content));
                                                            textValueArea.blur();
                                                        }else{
                                                            if(0 && Selection.WindowSelection){
                                                                Selection.WindowSelection.deleteFromDocument();
                                                                Selection.WindowSelection.getRangeAt(0).insertNode(document.createTextNode(Content));
                                                            }else{
                                                                var _anchorOffset = (Selection.anchorOffset>=0) ? Selection.anchorOffset : textValueArea.html().length;
                                                                var _focusOffset = (Selection.focusOffset>=0) ? Selection.focusOffset : textValueArea.html().length;
                                                                var _Start = (_anchorOffset>_focusOffset) ? _focusOffset : _anchorOffset;
                                                                var _End = (_anchorOffset>_focusOffset) ? _anchorOffset : _focusOffset;
                                                                var myPrefix = textValueArea.html().substr(0, _Start); // 取出游標之前
                                                                var mySuffix = textValueArea.html().substr(_End); //取出游標之後
                                                                if(Debug){
                                                                    console.log(myPrefix);
                                                                    console.log(Content);
                                                                    console.log(mySuffix);
                                                                }
                                                                textValueArea.html(myPrefix + Content + mySuffix).focus().blur();

                                                                //Selection = {};
                                                                var adjust = (Selection['Range']) ? 1 : 0;
                                                                Selection['Range'] = null;
                                                                Selection['anchorOffset'] = (_End + Content.length - adjust);
                                                                Selection['focusOffset'] = (_End + Content.length - adjust);
                                                            }
                                                        }
                                                    }
                                                }
                                            </script>
                                        </div>


                                        <div id="ShowAddBox" class="StickerEmojiBox">
                                            <div id="MessageBox">
                                                <div class="">
                                                    <table class="table ShowValueList">
                                                        <thead>
                                                            <tr>
                                                                <th class="target">
                                                                    <i class="fa fa-arrow-circle-left"
                                                                       style="color: var(--origin);float: left;font-size: 20px;"
                                                                       onclick="$('#AddBox').show();$('#MessageBox').hide();"></i>
                                                                    選擇
                                                                </th>
                                                                <th class="img">圖片</th>
                                                                <th class="name">標題備註</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="ShowMessageBody">
                                                            {#foreach $rows_ImageMap as $key=>$item#}
                                                                <tr class="ChooseItem" data-id="{#$item.id#}" data-type="ImageMap" data-json='{#json_encode($item)#}'>
                                                                    <td class="target">
                                                                        <i class="fa fa-check-square"></i>
                                                                    </td>
                                                                    <td class="img">
                                                                        {#if $item.subject.img0#}
                                                                            <img class="img-responsive" alt="Image" src="{#$__WEB_UPLOAD#}/image/{#$item.subject.img0#}">
                                                                        {#else#}
                                                                            <i class="fa fa-window-close"></i>
                                                                        {#/if#}
                                                                    </td>
                                                                    <td class="name">
                                                                        {#$item.subject.subject#}
                                                                    </td>
                                                                </tr>
                                                            {#/foreach#}
                                                            {#foreach $rows_LineTemplate as $key=>$item#}
                                                                <tr class="ChooseItem" data-id="{#$item.id#}" data-type="LineTemplate" data-json='{#json_encode($item)#}'>
                                                                    <td class="target">
                                                                        <i class="fa fa-check-square"></i>
                                                                    </td>
                                                                    <td class="img">
                                                                        {#if $item.subject.img0#}
                                                                            <img class="img-responsive" alt="Image" src="{#$__WEB_UPLOAD#}/image/{#$item.subject.img0#}">
                                                                        {#else#}
                                                                            <i class="fa fa-window-close"></i>
                                                                        {#/if#}
                                                                    </td>
                                                                    <td class="name">
                                                                        {#$item.subject.subject#}
                                                                    </td>
                                                                </tr>
                                                            {#/foreach#}
                                                            {#foreach $rows_ImageCarousel as $key=>$item#}
                                                                <tr class="ChooseItem" data-id="{#$item.id#}" data-type="ImageCarousel" data-json='{#json_encode($item)#}'>
                                                                    <td class="target">
                                                                        <i class="fa fa-check-square"></i>
                                                                    </td>
                                                                    <td class="img">
                                                                        {#if $item.subject.img0#}
                                                                            <img class="img-responsive" alt="Image" src="{#$__WEB_UPLOAD#}/image/{#$item.subject.img0#}">
                                                                        {#else#}
                                                                            <i class="fa fa-window-close"></i>
                                                                        {#/if#}
                                                                    </td>
                                                                    <td class="name">
                                                                        {#$item.subject.subject#}
                                                                    </td>
                                                                </tr>
                                                            {#/foreach#}
                                                            {#foreach $rows_CustomMessage as $key=>$item#}
                                                                <tr class="ChooseItem" data-id="{#$item.id#}" data-type="CustomMessage" data-json='{#json_encode($item)#}' msg-json='{#json_encode($item.subject.data)#}'>
                                                                    <td class="target">
                                                                        <i class="fa fa-check-square"></i>
                                                                    </td>
                                                                    <td class="img">
                                                                        <i class="fa fa-window-close"></i>
                                                                    </td>
                                                                    <td class="name">
                                                                        {#$item.subject.subject#}
                                                                    </td>
                                                                </tr>
                                                            {#/foreach#}
                                                            <div id="CustomMessageTmpArea" class="hide"></div>
                                                            {#foreach $rows_QuicklyReply as $key=>$item#}
                                                                <tr class="ChooseItem" data-id="{#$item.id#}" data-type="QuicklyReply" data-next="{#$item.next#}" data-json='{#json_encode($item)#}'>
                                                                    <td class="target">
                                                                        <i class="fa fa-check-square"></i>
                                                                    </td>
                                                                    <td class="img">
                                                                        {#if $item.subject.img0#}
                                                                            <img class="img-responsive" alt="Image" src="{#$__WEB_UPLOAD#}/image/{#$item.subject.img0#}">
                                                                        {#else#}
                                                                            <i class="fa fa-window-close"></i>
                                                                        {#/if#}
                                                                    </td>
                                                                    <td class="name">
                                                                        {#$item.subject.subject#}
                                                                    </td>
                                                                </tr>
                                                            {#/foreach#}
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <script>
                                                    function ShowMessageBody(type=null, id=null){
                                                        var next = (type==='QuicklyReply') ? '[data-next="line"]' : '';
                                                        $('#AddBox').hide();
                                                        $('#MessageBox').show();
                                                        $('#ShowMessageBody>tr').hide();
                                                        $('#ShowMessageBody>tr[data-type="'+ type +'"]' + next).show();
                                                        if(id){
                                                            $('#ShowMessageBody>tr[data-type="'+ type +'"]' + next).removeClass('active');
                                                            $('#ShowMessageBody>tr[data-id="'+ id +'"][data-type="'+ type +'"]' + next).addClass('active');
                                                        }
                                                    }
                                                    $(function () {
                                                        $(document).on('click', '.ChooseItem', function (event) {
                                                            $('#AddBox').show();
                                                            $('#MessageBox').hide();
                                                            var oneTemplateNo = 0;
                                                            var minWidth = '';
                                                            var addHtml = " ";
                                                            $('.ChooseItem').removeClass('active');
                                                            $(this).addClass('active');
                                                            //$(this) attr('data-id');
                                                            switch($(this).attr('data-type')){
                                                                case 'ImageMap':
                                                                    var ImageMap = JSON.parse($(this).attr('data-json'));
                                                                    var _subimg = ImageMap['subject']['img0'];
                                                                    var _subtitle = ImageMap['subject']['subject'];
                                                                    addHtml += '<img class="ShowImgmapIMG" src="{#$__WEB_UPLOAD#}/image/'+_subimg+'">';
                                                                    break;
                                                                case 'LineTemplate':
                                                                    var Template = JSON.parse($(this).attr('data-json'));
                                                                    for (i = 0; i < 10; i++) {
                                                                        // 取值
                                                                        var _subtitle = Template['subject']['subtitle' + i];
                                                                        var _subcontent = Template['subject']['subcontent' + i];
                                                                        var _subimg = Template['subject']['img' + i];
                                                                        var subject_0 = Template['subject']['subject' + i + '_0'];
                                                                        var subject_1 = Template['subject']['subject' + i + '_1'];
                                                                        var subject_2 = Template['subject']['subject' + i + '_2'];

                                                                        // 判斷是否為'不設定動作'
                                                                        var action_0 = Template['subject']['action' + i + '_0'];
                                                                        var action_1 = Template['subject']['action' + i + '_1'];
                                                                        var action_2 = Template['subject']['action' + i + '_2'];

                                                                        // 只要有任何一欄有值、就創建整塊
                                                                        if (_subtitle != "" || _subcontent != "" || subject_0 != "" || subject_1 != "" || subject_2 != "") {

                                                                            oneTemplateNo += 1;
                                                                            addHtml += '<div class="swiper-slide oneTemplate">';
                                                                                if (_subimg != undefined && _subimg !='') {
                                                                                    addHtml += '<div class="TemplateImg LineTemplate" style="background-image:url({#$__WEB_UPLOAD#}/image/' + _subimg + ');"></div>';
                                                                                    addHtml += '<div class="TemplateInfo">';
                                                                                }else{
                                                                                    addHtml += '<div class="TemplateInfo"  style="border-radius: 10px;">';
                                                                                }
                                                                                    addHtml += '<h3>' + _subtitle + '</h3>';
                                                                                    addHtml += '<pre>' + _subcontent + '</pre>';
                                                                                    addHtml += '<ul>';
                                                                                        if (action_0!='noaction'){
                                                                                            addHtml += '<li>'+ subject_0 +'</li>';
                                                                                        }
                                                                                        if (action_1!='noaction'){
                                                                                            addHtml += '<li>'+ subject_1 +'</li>';
                                                                                        }
                                                                                        if (action_2!='noaction'){
                                                                                            addHtml += '<li>'+ subject_2 +'</li>';
                                                                                        }
                                                                                    addHtml += '</ul>';
                                                                                addHtml += '</div>';
                                                                            addHtml += '</div>';
                                                                        }
                                                                    }
                                                                    break;
                                                                case 'ImageCarousel':
                                                                    var ImageCarousel = JSON.parse($(this).attr('data-json'));
                                                                    for (i = 0; i < 10; i++) {
                                                                        // 取值
                                                                        var _subtitle = ImageCarousel['subject']['subject'+i+'_0'];
                                                                        var _subimg = ImageCarousel['subject']['img'+i];
                                                                        //只要有任何一欄有值、就創建整塊
                                                                        if ( _subtitle!="" && _subimg!=undefined){
                                                                            oneTemplateNo += 1;
                                                                            addHtml += '<div class="swiper-slide oneTemplate">';
                                                                                addHtml += '<div class="TemplateImg ImageCarousel" style="background-image:url({#$__WEB_UPLOAD#}/image/'+_subimg+');">';
                                                                                    addHtml += '<h3>'+ _subtitle +'</h3>';
                                                                                addHtml += '</div>';
                                                                            addHtml += '</div>';
                                                                        }
                                                                    }
                                                                    break;
                                                                case 'QuicklyReply':
                                                                    var QuicklyReply = JSON.parse($(this).attr('data-json'));
                                                                    for (i = 0; i < 10; i++) {

                                                                        // 取值
                                                                        var _subtitle = QuicklyReply['subject']['subject'+i+'_0'];
                                                                        var _subimg = QuicklyReply['subject']['pic'+i];
                                                                        _subimg = _subimg ? _subimg : '';


                                                                        //只要有任何一欄有值、就創建整塊
                                                                        if ( _subtitle!="" && _subimg!=undefined ){
                                                                            oneTemplateNo += 1;
                                                                            addHtml += '<div class="quickReplyItem">';
                                                                                if (_subimg!=""){
                                                                                    addHtml += '<span style="background-image:url({#$__WEB_UPLOAD#}/image/'+_subimg+');"></span>';
                                                                                }
                                                                                addHtml += _subtitle;
                                                                            addHtml += '</div>';
                                                                        }
                                                                    }
                                                                    break;
                                                                case 'CustomMessage':
                                                                    var msgjson = $(this).attr('msg-json').replace(/"{/g, "{").replace(/}"/g, "}").replace(/\\"/g, '"');
                                                                    var MsgVal = JSON.parse(msgjson);
                                                                    ShowPreviewBox($(this).attr('data-type'), $(this), '');
                                                                    GetFlexView($('#ShowPreviewBox>div'), JSON.stringify(MsgVal['contents']), {}, {"ParentObjClickAttr":"#ShowPreviewBox>div"});
                                                                    break;
                                                            }

                                                            if($(this).attr('data-type') !== 'CustomMessage'){
                                                                minWidth = 'max-content';//minWidth ? minWidth : 270*oneTemplateNo+'px';
                                                                ShowPreviewBox($(this).attr('data-type'), $(this), addHtml, minWidth);
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>
                                            <div id="AddBox">
                                                {#if $ChatRoom=='line'#}
                                                    <div class="AddType">
                                                        <ul>
                                                            <li>
                                                                <label class="ColumnItem" onclick="if($('#TypeMsg').val()){
                                                                                                        $('#ShowPushMsgBox>.Item').removeClass('active');
                                                                                                        $('#TypeMsg').val('');
                                                                                                        $('#SendBox .emojionearea-editor').html('').focus();
                                                                                                    }">
                                                                    <i class="fa fa-font"></i>
                                                                    <span>文字</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="ColumnItem">
                                                                    <i class="fa fa-file-image-o"></i>
                                                                    <span>照片</span>
                                                                    <input class="hide" type="file" name="" accept="image/*" onchange="if (this.files && this.files[0]) { AddMsgData('image', this); }">
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="ColumnItem">
                                                                    <i class="fa fa-file-movie-o"></i>
                                                                    <span>影片</span>
                                                                    <input class="hide" type="file" name="" accept="video/*" onchange="if (this.files && this.files[0]) { AddMsgData('video', this); }">
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="ColumnItem">
                                                                    <i class="fa fa-file-audio-o"></i>
                                                                    <span>語音訊息</span>
                                                                    <input class="hide" type="file" name="" accept="audio/*" onchange="if (this.files && this.files[0]) { AddMsgData('audio', this); }">
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="ColumnItem" onclick="ShowMessageBody('ImageMap');">
                                                                    <i class="fa fa-film"></i>
                                                                    <span>圖文訊息</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="ColumnItem" onclick="ShowMessageBody('LineTemplate');">
                                                                    <i class="fa fa-columns"></i>
                                                                    <span>卡片式選單</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="ColumnItem" onclick="ShowMessageBody('ImageCarousel');">
                                                                    <i class="fa fa-picture-o"></i>
                                                                    <span>大圖選單</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="ColumnItem" onclick="ShowMessageBody('CustomMessage');">
                                                                    <i class="fa fa-code"></i>
                                                                    <span>自訂訊息</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="ColumnItem" onclick="ShowMessageBody('QuicklyReply');">
                                                                    <i class="fa fa-commenting"></i>
                                                                    <span>快捷語</span>
                                                                </label>
                                                            </li>
                                                            {#for $Tmp=1 to 30#}
                                                                <li>
                                                                    <div style="width:39px;"></div>
                                                                </li>
                                                            {#/for#}
                                                        </ul>
                                                    </div>
                                                {#else if $ChatRoom=='facebook'#}

                                                {#/if#}
                                            </div>
                                        </div>
                                    </form></div>
                                </div>
                            </div>
                            <!-- conversation panel end -->

                            <!-- information panel start -->
                            <div id="MemberInfo" class="information-panel">
                                <div class="information-panel__head">
                                    <h5>會員資料</h5>
                                    <div class="information-panel__closer"><i class="mdi mdi-close"></i></div>
                                </div>
                                <div class="information-panel__body custom-scrollbar ps">
                                    <div class="userprofile-avatar">
                                        <div id="MemberImg" style='border-radius: 6.25rem;
                                                                    height: 100%;
                                                                    width: 100%;
                                                                    background-size: cover;
                                                                    background-repeat: no-repeat;
                                                                    background-image: url("{#$__PLUGIN_Web#}/Chatriq/img/01.jpg"), url("/library/res/images/person.jpg");'></div>
                                    </div>
                                    <div class="userprofile-name">
                                        <h4 id="MemberName">Jack P. Angulo</h4>
                                        <div id="MemberPlatform" class="social-icon-box">
                                            <div class="social-icon" data-redirect="false" data-UID="" data-platform="line" style="display: none;" onclick="if($(this).attr('data-redirect')==='true'){location.href='/be/CustomerService/index/ChatRoom/'+$(this).attr('data-platform')+'/UID/'+$(this).attr('data-UID')+'/ClickId/UserPic';}">
                                                <svg style="width: 20px;vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="line" class="svg-inline--fa fa-line fa-w-14" role="img" viewBox="0 0 448 512">
                                                    <path fill="currentColor" d="M272.1 204.2v71.1c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.1 0-2.1-.6-2.6-1.3l-32.6-44v42.2c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.8 0-3.2-1.4-3.2-3.2v-71.1c0-1.8 1.4-3.2 3.2-3.2H219c1 0 2.1.5 2.6 1.4l32.6 44v-42.2c0-1.8 1.4-3.2 3.2-3.2h11.4c1.8-.1 3.3 1.4 3.3 3.1zm-82-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 1.8 1.4 3.2 3.2 3.2h11.4c1.8 0 3.2-1.4 3.2-3.2v-71.1c0-1.7-1.4-3.2-3.2-3.2zm-27.5 59.6h-31.1v-56.4c0-1.8-1.4-3.2-3.2-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 .9.3 1.6.9 2.2.6.5 1.3.9 2.2.9h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.7-1.4-3.2-3.1-3.2zM332.1 201h-45.7c-1.7 0-3.2 1.4-3.2 3.2v71.1c0 1.7 1.4 3.2 3.2 3.2h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2V234c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2v-11.4c-.1-1.7-1.5-3.2-3.2-3.2zM448 113.7V399c-.1 44.8-36.8 81.1-81.7 81H81c-44.8-.1-81.1-36.9-81-81.7V113c.1-44.8 36.9-81.1 81.7-81H367c44.8.1 81.1 36.8 81 81.7zm-61.6 122.6c0-73-73.2-132.4-163.1-132.4-89.9 0-163.1 59.4-163.1 132.4 0 65.4 58 120.2 136.4 130.6 19.1 4.1 16.9 11.1 12.6 36.8-.7 4.1-3.3 16.1 14.1 8.8 17.4-7.3 93.9-55.3 128.2-94.7 23.6-26 34.9-52.3 34.9-81.5z"></path>
                                                </svg>
                                            </div>
                                            <div class="social-icon" data-redirect="false" data-UID="" data-platform="facebook" style="display: none;" onclick="if($(this).attr('data-redirect')==='true'){location.href='/be/CustomerService/index/ChatRoom/'+$(this).attr('data-platform')+'/UID/'+$(this).attr('data-UID')+'/ClickId/UserPic';}">
                                                <i class="fa fa-facebook-square" style="font-size: 23px;"></i>
                                            </div>
                                            <!--<div class="social-icon"><i class="mdi mdi-facebook"></i></div>
                                            <div class="social-icon"><i class="mdi mdi-linkedin"></i></div>
                                            <div class="social-icon"><i class="mdi mdi-twitter"></i></div>
                                            <div class="social-icon"><i class="mdi mdi-youtube"></i></div>-->
                                        </div>
                                    </div>
                                    <hr>
                                    <!--<table class="table table-sm table-borderless user-table-info">
                                        <tbody>
                                            <tr>
                                                <td><i class="mdi mdi-cellphone-android"></i></td>
                                                <td>+91 99041-99041</td>
                                            </tr>
                                            <tr>
                                                <td><i class="mdi mdi-web"></i></td>
                                                <td>www.jackangulo.com</td>
                                            </tr>
                                            <tr>
                                                <td><i class="mdi mdi-map-marker"></i></td>
                                                <td>2519  Burnside Court, HORICON, WI, 53032</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>-->
                                    <div class="accordion accordion-ungrouped mb-3" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <div class="card-title" data-toggle="collapse" role="button" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <div class="acpanel__heading">
                                                        <div class="acpanel__left">
                                                            <span>
                                                                <!--<i class="mdi mdi-camera-outline"></i>-->
                                                                <i class="fa fa-fw fa-tags"></i>
                                                            </span>
                                                            <span>標籤</span>
                                                        </div>
                                                        <div class="acpanel__right"><span class="badge badge-info" id="MemberTagsCount">26</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapseOne" class="show collapse in" aria-labelledby="headingOne" data-parent="#accordionExample" aria-expanded="true">
                                                <div class="card-body">
                                                    <div id="MemberTags" class="slick-slider">
                                                        <!--<div><img class="img-fluid" src="{#$__PLUGIN_Web#}/Chatriq/img/01.jpg" alt=""></div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--<div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <div class="card-title d-flex justify-content-between align-items-center collapsed" role="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <div class="acpanel__heading">
                                                        <div class="acpanel__left"><span><i class="mdi mdi-file-document-outline"></i></span><span>Documents</span></div>
                                                        <div class="acpanel__right"><span class="badge badge-info">16</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapseTwo" class="show collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" aria-expanded="false" style="height: 0px;">
                                                <div class="card-body">
                                                    <ul class="list-unstyled documentlist-wrapper">
                                                        <li>
                                                            <div class="doclist">
                                                                <div class="docicon iconbox btn-solid-danger"><i class="iconbox__icon mdi mdi-file-pdf-box"></i></div>
                                                                <div class="doctitle">
                                                                    <div class="docname">example-file.pdf</div>
                                                                    <div class="docsize">217kb</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="doclist">
                                                                <div class="docicon iconbox btn-solid-info"><i class="iconbox__icon mdi mdi-file-word-box"></i></div>
                                                                <div class="doctitle">
                                                                    <div class="docname">example-file.docs</div>
                                                                    <div class="docsize">217kb</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="doclist">
                                                                <div class="docicon iconbox btn-solid-success"><i class="iconbox__icon mdi mdi-file-excel-box"></i></div>
                                                                <div class="doctitle">
                                                                    <div class="docname">example-file.xlxs</div>
                                                                    <div class="docsize">217kb</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="doclist">
                                                                <div class="docicon iconbox btn-solid-warning"><i class="iconbox__icon mdi mdi-file-powerpoint-box"></i></div>
                                                                <div class="doctitle">
                                                                    <div class="docname">example-file.pptx</div>
                                                                    <div class="docsize">217kb</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="doclistall">View All</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingFour">
                                                <div class="card-title  d-flex justify-content-between align-items-center" role="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                    <div class="acpanel__heading">
                                                        <div class="acpanel__left"><span><i class="mdi mdi-settings-outline"></i></span><span>設定</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapseFour" class="show collapse in" aria-labelledby="headingFour" data-parent="#accordionExample" aria-expanded="true">
                                                <div class="card-body">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <div class="setting-list">
                                                                <div class="setting-list-name">Media Auto Download</div>
                                                                <div class="setting-list-switch">
                                                                    <div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" id="customSwitch1"><label class="custom-control-label" for="customSwitch1"></label></div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="setting-list">
                                                                <div class="setting-list-name">Mute Conversation</div>
                                                                <div class="setting-list-switch">
                                                                    <div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" id="customSwitch2"><label class="custom-control-label" for="customSwitch2"></label></div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="setting-list">
                                                                <div class="setting-list-name">Notifications</div>
                                                                <div class="setting-list-switch">
                                                                    <div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" id="customSwitch3"><label class="custom-control-label" for="customSwitch3"></label></div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="setting-list">
                                                                <div class="setting-list-name">Block</div>
                                                                <div class="setting-list-switch">
                                                                    <div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" id="customSwitch4"><label class="custom-control-label" for="customSwitch4"></label></div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- information panel end -->
                        </div>
                        <!-- conversations end -->
                    </div>
                </div>
                <!-- main content end -->
            </div>

            <!-- VIDEO CALL START-->
            <div class="modal fade videocall-modal CallDialogFullscreen-sm" id="incomingVideoStart" tabindex="-1" role="dialog" aria-labelledby="incomingVideoStart" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="icvideocallwrapper">
                                <div class="icvideo-contact"><img class="img-fluid icvideo-contact__inner" src="{#$__PLUGIN_Web#}/Chatriq/img/call-01.jpg" alt=""></div>
                                <div class="icvideo-user"><img src="{#$__PLUGIN_Web#}/Chatriq/img/01.jpg" alt=""></div>
                                <div class="icvideo-actions">
                                    <div class="icvideo-actions__left">
                                        <div class="icvideo-actions__left--duration">00:36</div>
                                    </div>
                                    <div class="icvideo-actions__middle">
                                        <div class="">
                                            <div class="iconbox btn-hovered-light" data-toggle="tooltip" data-placement="top" title="Speaker"><i class="iconbox__icon mdi mdi-volume-high"></i></div>
                                            <div class="iconbox btn-hovered-light" data-toggle="tooltip" data-placement="top" title="Hold"><i class="iconbox__icon mdi mdi-pause"></i></div>
                                            <div class="iconbox btn-hovered-light" data-toggle="tooltip" data-placement="top" title="Add Call"><i class="iconbox__icon mdi mdi-phone-plus"></i></div>
                                            <div class="iconbox btn-hovered-light" data-toggle="tooltip" data-placement="top" title="Disbale Video"><i class="iconbox__icon mdi mdi-video-off-outline"></i></div>
                                            <div class="iconbox btn-hovered-light" data-toggle="tooltip" data-placement="top" title="Mute"><i class="iconbox__icon mdi mdi-microphone-off"></i></div>
                                        </div>
                                    </div>
                                    <div class="icvideo-actions__right">
                                        <div class="iconbox btn-hovered-light bg-danger" data-dismiss="modal" data-toggle="tooltip" data-placement="top" title="Hangup"><i class="iconbox__icon text-white mdi mdi-phone-hangup"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- OUTGOING VOICE CALL -->
            <div class="modal fade CallDialogFullscreen-sm" id="outGoingCall" tabindex="-1" role="dialog" aria-labelledby="outGoingCall" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="user-avatar user-avatar-rounded user-avatar-xl"><img src="{#$__PLUGIN_Web#}/Chatriq/img/01.jpg" alt=""></div>
                                <div class="userprofile-name">
                                    <span>Calling...</span>
                                    <h4>Jack P. Angulo</h4>
                                    <span>Product Manager</span>
                                    <div class="call-duration">00:36</div>
                                </div>
                                <div class="call-options">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="call-options__iconbox"><i class="mdi mdi-microphone-off"></i></div>
                                            <h6>Mute</h6>
                                        </div>
                                        <div class="col-4">
                                            <div class="call-options__iconbox"><i class="mdi mdi-volume-high"></i></div>
                                            <h6>Speaker</h6>
                                        </div>
                                        <div class="col-4">
                                            <div class="call-options__iconbox"><i class="mdi mdi-pause"></i></div>
                                            <h6>Hold</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="call-actions">
                                    <div class="call-hangup" data-dismiss="modal"><i class="mdi mdi-phone-hangup"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main wrapper end -->

        <!-- Javascripts Files -->
        <!--<script src="{#$__PLUGIN_Web#}/Chatriq/js/jquery-3.3.1.slim.min.js"></script>-->
        <script src="{#$__PLUGIN_Web#}/Chatriq/js/popper.min.js"></script>
        <script src="{#$__PLUGIN_Web#}/Chatriq/js/bootstrap.bundle.min.js"></script>
        <script src="{#$__PLUGIN_Web#}/Chatriq/js/perfect-scrollbar.min.js"></script>
        <script src="{#$__PLUGIN_Web#}/Chatriq/js/mfb.min.js"></script>
        <script src="{#$__PLUGIN_Web#}/Chatriq/js/main.min.js"></script>
        <script type="text/javascript" src="{#$__PLUGIN_Web#}/flex/main.js?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}"></script>


        <script type="text/javascript">
            var __CustomStickers_Web = '{#$__CustomStickers_Web#}';
            function OpenMsg(){
                if($('#MsgBox').css('display') === 'none'){
                    $('#MsgBox').show();
                    $('#SendBox .AddMsgBtn').removeClass('fa-plus-square').addClass('fa-minus-square');
                }else{
                    $('#MsgBox').hide();
                    $('#SendBox .AddMsgBtn').removeClass('fa-minus-square').addClass('fa-plus-square');
                }
            }
            function UserSelect(obj){
                $('#UserPic').css('background-image', 'url('+obj.attr('pictureUrl')+'), url({#$__RES_Web#}/images/person.jpg)');
                $('#UserName').html(obj.attr("displayName"));
                $('#UserTime').html(obj.attr("Time"));
                $("#MessagesArea").removeClass("begin");
                $("#ChatMember").val(obj.attr("UID"));
                $('.conversation-panel__body').attr("ChatRoom", obj.attr("ChatRoom"));
                $("#MessagesArea").attr("UID", obj.attr("UID")).attr("ChatRoom", obj.attr("ChatRoom")).html("");
                var ServiceMsgLen = $('#MessagesArea .message.sent').length;
                var MsgLength = $('#MessagesArea .message').length - ServiceMsgLen;
                xajax_LoadMsg(obj.attr("ChatRoom"), obj.attr("UID"), MsgLength, "prepend", null, 'start');
            }
            function ReSortMsg(){
                var $msgListItem = $("#MessagesArea .direct-chat-msg");
                $msgListItem.sort(function (a, b) {
                    var sort1 = a.getAttribute('data-sort') * 1;
                    var sort2 = b.getAttribute('data-sort') * 1;
                    var sortNum = 1;
                    if (sort1 > sort2)
                        return 1 * sortNum;
                    if (sort1 < sort2)
                        return -1 * sortNum;
                            return 0;
                });
                $msgListItem.detach().appendTo("#MessagesArea");
                $("#MessagesArea .direct-chat-text.text").each(function(e) {
                    if(!$(this).hasClass("ToEmoji")){
                        $(this).addClass('ToEmoji').html(TranslateEmoji($(this).html()));
                    }
                });
            }
            function AppendMsg(_Action, _Html, _Key){
                if($("#MessagesArea .direct-chat-msg[data-key='"+ _Key +"']").length === 0){
                    switch(_Action){
                        case 'append':
                            $("#MessagesArea").append(_Html);
                            break;
                        default :
                            $("#MessagesArea").prepend(_Html);
                            break;
                    }
                }
            }
            var step = 0; // 步驟變數
            var textList = new Array(); // array容器
            function Resize(obj){
                UpDateMsgData('text', $('#ShowPushMsgBox>[type=text].Item.active'));//obj
                obj.css({'height':'auto','overflow-y':'hidden'}).height(obj[0].scrollHeight);
                var Line = parseInt((obj.height()-12)/20) - 1;
                if(Line > 20){
                    obj.val(textList[step-1]);
                    obj.css({'height':'auto','overflow-y':'hidden'}).height(obj[0].scrollHeight);
                }else{
                    step++;
                    textList.push(obj.val());
                }
            }
            $(function () {
                $('#TypeMsg').emojioneArea({
                    pickerPosition: "top",
                    tonesStyle: "bullet"
                });
                window.setTimeout(function () {
                    GetEmojiIcon('{#$ChatRoom#}');
                }, 1000);
                $('#MessagesArea').parents(".custom-scrollbar2").scroll(function (e) {
                    if ($('#MessagesArea').parents(".custom-scrollbar2").scrollTop() === 0) {
                        var ChatRoom = $('#MessagesArea').attr('ChatRoom');
                        var UID = $('#MessagesArea').attr('UID');
                        var ServiceMsgLen = $('#MessagesArea .direct-chat-msg.right').length;
                        var MsgLength = $('#MessagesArea .direct-chat-msg').length - ServiceMsgLen;
                        if (MsgLength > 0) {
                            xajax_LoadMsg(ChatRoom, UID, MsgLength, "prepend", null, 'more');
                        }
                    }
                });
                $(document).on('click', '#SearchBtn', function (event) {
                    if ($('#SearchKey').val() || $('[name="fields[content][filter][Tags][]"]:checked').length>0) { //當有任一搜尋條件
                        $("#RoomList li").hide();
                        if($('#SearchKey').val() && $('[name="fields[content][filter][Tags][]"]:checked').length==0){
                            $("#RoomList li[UID='" + $('#SearchKey').val() + "']").show();
                            $("#RoomList li[displayName='" + $('#SearchKey').val() + "']").show();
                        }
                        $("#RoomList li").each(function (e) {
                            var ThisMemberLi = $(this);
                            if($('[name="fields[content][filter][Tags][]"]:checked').length>0){
                                if(ThisMemberLi.attr('FilterSearch')){
                                    if (!$('#SearchKey').val() || ($('#SearchKey').val() &&  ((ThisMemberLi.attr('UID').indexOf($('#SearchKey').val()) !== -1) || (ThisMemberLi.attr('displayName').indexOf($('#SearchKey').val()) !== -1)))) {
                                        $('[name="fields[content][filter][Tags][]"]:checked').each(function (e) {
                                            if(ThisMemberLi.attr('FilterSearch').indexOf('tag-'+$(this).val()) !== -1){
                                                ThisMemberLi.show();
                                            }
                                        });
                                    }
                                }
                            }else if ($('#SearchKey').val() &&  ((ThisMemberLi.attr('UID').indexOf($('#SearchKey').val()) !== -1) || (ThisMemberLi.attr('displayName').indexOf($('#SearchKey').val()) !== -1))) {
                                ThisMemberLi.show();
                            }
                        });
                    }
                });
            });
        </script>

        {#include file=$__PublicView|cat:'LocalStorage.tpl'#}

        {#if $MsgJs#}
            {#$MsgJs#}
        {#/if#}

        {#$js#}
        {#$xajax_js#}
    </body>
</html>