<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="想到什麼，就做什麼">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <title>抽獎</title>
        <link href="{#$__PLUGIN_Web#}/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="{#$__PLUGIN_Web#}/bootstrap/AdminLTE.min.css?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}" rel="stylesheet">
        <link href="{#$__PLUGIN_Web#}/bootstrap/font-awesome.min.css" rel="stylesheet">
        
        
        <script type="text/javascript" src="{#$__PLUGIN_Web#}/bootstrap/jquery-3.3.1.min.js"></script>
        <script src="{#$__PLUGIN_Web#}/bootstrap/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.css">
        
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.js"></script>
        <script src="{#$__PLUGIN_Web#}/signaturepad/vconsole.min.js"></script>
        <script src="{#$__PLUGIN_Web#}/dist/adminlte.min.js"></script>
    </head>
    <style>
        .content {
            padding: 0px;
        }
        body {
            background-color: #5b5b5b;
        }
        #top, #bottom , #canvas, .MachineBody, #BottomChild, #BottomChild>div {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        #BtnList {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
        }
        #BtnList>.btn {
            margin: 0px 20px;
            margin-top: 20px;
            width: -webkit-fill-available;
        }
    </style>
    {#if $LotteryType#}<link rel="stylesheet" href="{#$__PLUGIN_Web#}/Lottery/{#$LotteryType#}/style.css?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}">{#/if#}
    
    <body onselectstart="return false">
        <div class="wrapper1">
            <div class="content-wrapper1">
                <section class="content">
                    <div class="row">
                        {#if $LotteryType=='Slots'#}
                            <div class="col-md-12">
                                <div class="MachineBody">
                                    <div class="MachineHeader">點擊按鈕抽獎</div>
                                    <div class="MachineWindow">
                                        <div class="MachineContainer">
                                            {#for $G=1 to 3#}
                                                <div id="casino{#$G#}" class="slotMachine">
                                                    {#for $J=1 to 9#}
                                                        <div class="slotItem">{#$J#}</div>
                                                    {#/for#}
                                                </div>
                                            {#/for#}
                                            <div class="fence1"></div>
                                            <div class="fence2"></div>
                                        </div>
                                    </div>
                                    <div class="MachineHandler">
                                        <div class="stick2"></div>
                                        <div class="stick"></div>
                                        <div class="ball" onclick="ShuffleAll();"></div>
                                    </div>
                                    <div class="MachineBottom"></div>
                                </div>
                            </div>
                        {#else if $LotteryType=='Wheel'#}
                            <div class="col-md-12">
                                <div class="CircleInfo">
                                    {#foreach $TotalPrizes as $key=> $item#}
                                        <div class="InfoItem">
                                            <div class="InfoCircle" style="background-color: {#$ColorList.$key#};"></div>
                                            <div class="InfoText">{#$item.subject.subject#}</div>
                                        </div>
                                    {#/foreach#}
                                </div>
                                <div class="CircleBG">
                                    {#for $P=1 to 12#}
                                        <div class="SmallCircle"></div>
                                    {#/for#}
                                </div>
                                <div class="CircleWheel" onclick="startSpin();">
                                    {#foreach $TotalPrizes as $key=> $item#}
                                        <div class="fan" style="transform: rotate({#$item.subject.fan_deg#}deg);">
                                            <div class="inner" style="transform: rotate({#$item.subject.inner_deg#}deg);background-color: {#$ColorList.$key#};"></div>
                                        </div>
                                    {#/foreach#}
                                </div>
                                <span id="WheelPin">➤</span>
                            </div>
                        {#else if $LotteryType=='ScratchOff'#}
                            <div class="col-md-12">
                                <div id="bottom">
                                    {#if $WinFlag && $BingoItem.value.subject.pic#}
                                        <img id="BottomChild" src="{#$BingoItem.value.subject.pic#}">
                                    {#else#}
                                        <div id="BottomChild">
                                            <div>
                                                <img src="{#$__PLUGIN_Web#}/Lottery/{#if $WinFlag#}gift.gif{#else#}sad.png{#/if#}" alt="Image">
                                                {#if $WinFlag#}{#$BingoItem.value.subject.subject#}{#else#}{#$WinItem.value.subject.subject#}{#/if#}
                                            </div>
                                        </div>
                                    {#/if#}
                                </div>
                                <canvas id="top"></canvas>
                            </div>
                        {#else if $LotteryType=='Shake'#}
                            <div class="col-md-12">
                                <div id="deviceConfirm">
                                    <div class="btn btn-primary btn-lg" id="deviceConfirmBtn">開始遊戲</div>
                                    <h6>請按下請求確認</h6>
                                </div>
                                <div class="shakeGame">
                                    <div class="shakeGameBG">
                                        <div class="InsideCircle"></div>
                                        <div class="hand" id="handBox"></div>
                                        <div class="DialogBox">
                                            <img src="{#$__PLUGIN_Web#}/Lottery/shakebanner.png">
                                            <div class="DialogBoxInfo">
                                                <div class="remind">
                                                    <div class="remindImg" id="remindImg">
                                                        <img src="{#$__PLUGIN_Web#}/Lottery/remindImg.png" class="img-responsive remindIcon" alt="Image">
                                                        <img src="{#$__PLUGIN_Web#}/Lottery/remindImg2.png" class="img-responsive remindIcon2" alt="Image">
                                                        <img src="{#$__PLUGIN_Web#}/Lottery/gift.gif" class="img-responsive giftIcon" alt="Image">
                                                        <img src="{#$__PLUGIN_Web#}/Lottery/sad.png" class="img-responsive loseIcon" alt="Image">
                                                    </div>
                                                    <button id="playGame" type="button" class="btn btn-primary btn-lg ">抽 獎</button>
                                                    <h2 id="winning">點擊按鈕抽大獎</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {#else if $LotteryType=='Gacha'#}
                            <div class="col-md-12">
                                <div class="niu_danji">
                                    <!-- 轉蛋機-->
                                    <div class="InsideMachine">
                                        <div class="InsideMachineHeader"><div class="Shadow"></div></div>
                                        <div class="InsideMachineBody"><div class="Shadow"></div></div>
                                        <div class="InsideMachineFooter"><div class="Shadow"></div></div>
                                        <div class="InsideMachineBottom"><div class="Shadow"></div></div>
                                    </div>
                                    <div class="game_qu" style="/*background: url('{#$__PLUGIN_Web#}/Lottery/game_ndj.png') no-repeat;*/">
                                        <!--觸發鈕 -->
                                        <div class="game_go" style="/*background: url('{#$__PLUGIN_Web#}/Lottery/coin-slot-bg.png') no-repeat;*/">
                                            <div class="CoinSlotBg"><div class="Shadow"></div></div>
                                            <div class="game_goAll">
                                                <div class="coin" id="coin"></div>
                                                <div class="turn-crank" id="turnCrank"></div>
                                                <div class="remind" id="remind"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 轉蛋 -->
                                    <div class="dan_gund">
                                        {#for $J=1 to 11#}
                                            <span class="qiu_{#$J#} diaol_{#$J#}"></span>
                                        {#/for#}
                                    </div>

                                    <!--轉蛋出口-->
                                    <div class="medon">
                                        <div class="MachineExitBody"><div class="Shadow"></div></div>
                                        <div class="MachineExitBottom"><div class="Shadow"></div></div>
                                        <!--<img src="{#$__PLUGIN_Web#}/Lottery/mendong.png" class="img-responsive">-->
                                    </div>
                                    <div class="zjdl">
                                        <span class=""></span>
                                    </div>
                                </div>
                            </div>
                        {#else if $LotteryType=='NineSquare'#}
                            <div class="col-md-12">
                                <div class="box-wrap">
                                    {#foreach $TotalPrizes as $key=> $item#}
                                        {#if $key==4#}
                                            <div class="square" id="StartBtn" onclick="StartSpin();">開始</div>
                                            <div class="square">{#$item.subject.subject#}</div>
                                        {#else#}
                                            <div class="square">{#$item.subject.subject#}</div>
                                        {#/if#}
                                    {#/foreach#}
                                    {#for $J=count($TotalPrizes) to 7#}
                                        <div class="square none"></div>
                                    {#/for#}
                                </div>
                            </div>
                        {#else if $LotteryType=='Treasure'#}
                            <div class="col-md-12">
                                <input type="checkbox" id="toggle-treasure">
                                <div id="treasure-chest-positioner" onclick="OpenPrize();">
                                    <label id="treasure-chest" for="/*toggle-treasure*/">
                                        <div id="lid">
                                            <div id="lid-left">
                                                {#for $SidePanel=1 to 5#}<div class="side-panel"></div>{#/for#}
                                            </div>
                                            <div id="lid-panels">
                                                {#for $J=0 to 4#}
                                                    <div class="panel" id="panel-{#$J#}">
                                                        <div class="board top"></div>
                                                        <div class="board bottom"></div>
                                                        <div class="iron-band left">
                                                            {#*for $Circle=1 to 8#}<div class="circle"></div>{#/for*#}
                                                        </div>
                                                        <div class="iron-band middle">
                                                            {#*for $Circle=1 to 8#}<div class="circle"></div>{#/for*#}
                                                        </div>
                                                        <div class="iron-band right">
                                                            {#*for $Circle=1 to 8#}<div class="circle"></div>{#/for*#}
                                                        </div>
                                                    </div>
                                                {#/for#}
                                            </div>
                                            <div id="lid-right">
                                                {#for $SidePanel=1 to 5#}<div class="side-panel"></div>{#/for#}
                                            </div>
                                        </div>
                                        <div id="chest">
                                            {#for $P=0 to 4#}
                                                {#if $P==0#}
                                                    {#assign var="Position" value='front'#}
                                                {#else if $P==1#}
                                                    {#assign var="Position" value='left'#}
                                                {#else if $P==2#}
                                                    {#assign var="Position" value='bottom'#}
                                                {#else if $P==3#}
                                                    {#assign var="Position" value='right'#}
                                                {#else if $P==4#}
                                                    {#assign var="Position" value='back'#}
                                                {#/if#}
                                                <div id="{#$Position#}-panel">
                                                    {#for $SideChestPanel=1 to 4#}<div class="side-chest-panel"></div>{#/for#}
                                                    {#if $Position!='bottom'#}
                                                        <div class="iron-bars">
                                                            <div class="top-bar iron-bar long">
                                                                {#*for $CircleCont=1 to 6#}<div class="circle-cont">{#for $Circle=1 to 8#}<div class="circle"></div>{#/for#}</div>{#/for*#}
                                                            </div>
                                                            <div class="bottom-bar iron-bar long">
                                                                {#*for $CircleCont=1 to 6#}<div class="circle-cont">{#for $Circle=1 to 8#}<div class="circle"></div>{#/for#}</div>{#/for*#}
                                                            </div>
                                                            {#if $Position=='front' || $Position=='back'#}
                                                                <div class="middle-bar iron-bar short">
                                                                    {#if $Position=='front'#}
                                                                        <div id="lock"><div id="keyhole"></div></div>
                                                                    {#/if#}
                                                                </div>
                                                            {#/if#}
                                                            <div class="left-bar iron-bar short">
                                                                {#*for $CircleCont=1 to 4#}<div class="circle-cont">{#for $Circle=1 to 8#}<div class="circle"></div>{#/for#}</div>{#/for*#}
                                                            </div>
                                                            <div class="right-bar iron-bar short">
                                                                {#*for $CircleCont=1 to 4#}<div class="circle-cont">{#for $Circle=1 to 8#}<div class="circle"></div>{#/for#}</div>{#/for*#}
                                                            </div>
                                                        </div>
                                                    {#/if#}
                                                </div>
                                            {#/for#}
                                        </div>
                                    </label>
                                </div>
                            </div>
                        {#else#}
                            <div class="col-md-12">
                                <div id="BtnList">
                                    {#foreach $LotteryTypeList as $key => $item#}
                                        <a class="btn btn-warning form-control" href="{#$__CustomStickers_Web#}/ft/LotteryGame/LotteryType/{#$key#}">{#$item#}</a>
                                    {#/foreach#}
                                </div>
                            </div>
                        {#/if#}
                    </div>
                </section>
            </div>
        </div>
        
        
        <script>
            {#if $WinFlag#}
                {#assign var="PriceKey" value=$BingoItem.key#}
                var PriceName = '{#$BingoItem.value.subject.subject#}';
                var PricePic = '{#$BingoItem.value.subject.pic#}' ? '{#$BingoItem.value.subject.pic#}' : '{#$__PLUGIN_Web#}/Lottery/gift.gif';
            {#else#}
                {#assign var="PriceKey" value=count($TotalPrizes)-1#}
                var PriceName = '{#$WinItem.value.subject.subject#}';
                var PricePic = '{#$WinItem.value.subject.pic#}' ? '{#$WinItem.value.subject.pic#}' : '{#$__PLUGIN_Web#}/Lottery/sad.png';
            {#/if#}
            function alertPrize(Segment=null){
                swal({
                    title: PriceName,
                    confirmButtonText: '確定',
                    imageUrl: PricePic,
                    //imageWidth: 400,
                    //imageHeight: 200,
                }).then(function () {
                    
                });
            }
            function getRandom(num1, num2){
                var min = (num1>num2) ? num2 : num1;
                var max = (num1>num2) ? num1 : num2;
                return Math.floor(Math.random()*(max-min)) + min;
            };
        </script>
        {#if $LotteryType=='Slots'#}
            <!-- http://josex2r.github.io/jQuery-SlotMachine/ -->
            <script src="https://josex2r.github.io/jQuery-SlotMachine/dist/slotmachine.js"></script>
            <script src="https://josex2r.github.io/jQuery-SlotMachine/dist/jquery.slotmachine.js"></script>
            <script>
                var casino1, casino2, casino3;
                $(function () {
                    var winNo = {#if $WinFlag#}getRandom(0, 8){#else#}-1{#/if#};
                    casino1 = $('#casino1').slotMachine({
                        active: 0,
                        delay: 450,
                        auto: false,
                        randomize() {
                            return (winNo>-1) ? winNo : getRandom(0, 8);
                        }
                    });
                    casino2 = $('#casino2').slotMachine({
                        active: 0,
                        delay: 450,
                        auto: false,
                        randomize() {
                            return (winNo>-1) ? winNo : getRandom(0, 3);
                        }
                    });
                    casino3 = $('#casino3').slotMachine({
                        active: 0,
                        delay: 450,
                        auto: false,
                        randomize() {
                            return (winNo>-1) ? winNo : getRandom(4, 8);
                        }
                    });
                    //ShuffleAll();
                });
                function ShuffleAll(){
                    if($('.MachineHandler>.ball').css('cursor')==='pointer'){
                        casino1.shuffle(5);
                        casino2.shuffle(10);
                        casino3.shuffle(15);
                        $('.MachineHeader').html('抽獎中...');
                        $('.MachineHandler>.ball').css('cursor', 'not-allowed').css('animation', 'none');
                        $('.MachineHandler').addClass('turning');
                        
                        window.setTimeout(function(){
                            $('.MachineHandler').removeClass('turning');
                        }, 500);
                        window.setTimeout(function(){
                            //$('.MachineHandler>.ball').css('cursor', 'pointer').css('animation', 'ballLight 1s infinite alternate-reverse linear');
                            $('.MachineHeader').html(PriceName);
                            alertPrize();
                        }, 6000);
                    }
                }
            </script>
        {#else if $LotteryType=='Wheel'#}
            <script>
                function startSpin(){
                    if ($('.CircleWheel').css('cursor') === 'pointer') {
                        var SpinSec = 3;
                        var SpinRound = 5;
                        let stopAt = 360*(SpinRound+1) - getRandom({#$TotalPrizes.$PriceKey.subject.fan_deg#}, {#$TotalPrizes.$PriceKey.subject.fan_deg+$TotalPrizes.$PriceKey.subject.inner_deg#});
                        $('.CircleWheel').css('cursor', 'not-allowed')
                                        .css('transform', 'translate(-50%, -50%) rotate('+stopAt+'deg)')
                                        .css('transition', 'all '+SpinSec+'s ease 0s');
                        setTimeout(function () {
                            alertPrize();
                            //$('.CircleWheel').css('transform', 'translate(-50%, -50%) rotate(0deg)').css('cursor', 'pointer');
                        }, SpinSec * 1000);
                    }
                }
            </script>
        {#else if $LotteryType=='ScratchOff'#}
            <script>
                var mousedown, alertFlag=true, w=300, h=300;
                var topCanvas = document.querySelector('#top');
                topCanvas.width = w;
                topCanvas.height = h;
                var ctxTop = topCanvas.getContext('2d');
                
                function drawTop(){
                    $('#bottom').css('width', w).css('height', h);
                    $('#BottomChild').css('max-width', w+'px');
                    ctxTop.canvas.style.opacity = 1;
                    ctxTop.fillStyle = '#c8c8c8';
                    ctxTop.fillRect(0, 0, w, h);
                    ctxTop.globalCompositeOperation = 'destination-out';//destination-out、source-atop
                    ctxTop.lineWidth = 30;
                }
                
                topCanvas.addEventListener('mousedown', eventDown);
                topCanvas.addEventListener('mouseup', eventUp);
                topCanvas.addEventListener('mousemove', eventMove);
                topCanvas.addEventListener('touchstart', eventDown);
                topCanvas.addEventListener('touchend', eventUp);
                topCanvas.addEventListener('touchmove', eventMove);
                
                function eventDown(ev){
                    ev = ev || event;
                    ev.preventDefault();
                    mousedown = true;
                    Draw(ev, true);
                }
                function eventUp(ev){
                    ev = ev || event;
                    ev.preventDefault();
                    mousedown = false;
                }
                function eventMove(ev){
                    ev = ev || event;
                    ev.preventDefault();
                    Draw(ev, false);
                }
                function Draw(ev, fresh=false){
                    if(mousedown) {
                        if(ev.changedTouches){
                            ev = ev.changedTouches[ev.changedTouches.length-1];
                        }
                        var MoveX = (ev.offsetX) ? ev.offsetX : ev.pageX-((document.documentElement.clientWidth-topCanvas.width)/2);
                        var MoveY = (ev.offsetY) ? ev.offsetY : ev.pageY-((document.documentElement.clientHeight-topCanvas.height)/2);
                        if(fresh){
                            ctxTop.beginPath();
                            ctxTop.moveTo(MoveX, MoveY);//+0.01
                        }
                        ctxTop.lineTo(MoveX, MoveY);
                        ctxTop.stroke();
                        CheckArea();
                    }
                }
                
                // 判斷刮開區域大於60%時，頂層canvas消失，顯示底層數據
                function CheckArea(){
                    var data = ctxTop.getImageData(0, 0, w, h).data;
                    var n = 0 ;
                    for (var i = 0; i < data.length; i++) {
                        if (data[i] == 0) {
                            n++;
                        };
                    };
                    
                    if (alertFlag && n >= data.length * 0.6) {
                        alertFlag = false;
                        ctxTop.globalCompositeOperation = 'destination-over';
                        ctxTop.canvas.style.opacity = 0;
                        alertPrize();
                    }
                }
                
                drawTop(); 
            </script>
        {#else if $LotteryType=='Shake'#}
            <script type="text/javascript">
                $(function(){
                    // DOM
                    var $deviceConfirm = $('#deviceConfirm'); //遮罩
                    var $deviceConfirmBtn = $('#deviceConfirmBtn'); //開始遊戲按鈕
                    var $handBox = $('#handBox'); // 手
                    var $playGame = $('#playGame'); //  抽獎按鈕
                    
                    var $winning = $('#winning');// 吐抽獎結果
                    var $remindImg = $('#remindImg'); // 提示ICON
                    var $remindIcon = $('.remindIcon'); // 左右搖晃手機ICON
                    var $remindIcon2 = $('.remindIcon2'); // 左右滑動手機ICON
                    var $giftIcon = $('.giftIcon'); // 中獎ICON
                    var $loseIcon = $('.loseIcon'); // 沒中ICON
                    
                    // var $againBox=$('#againBox');// 再玩一次
                    var $playCount = $('#playCount'); //吐剩下可玩次數
                    // var $againBtn=$('#againBtn'); // 再玩一次按鈕
                    var $gift = $('#gift');// 獎品資訊
                    
                    // 數據
                    var halfWidth = (window.screen.width)/2; //取一半螢幕寬為分左右基準
                    var pageX = 0; //觸控位置X點 
                    var _playCountVal = 1; // 可玩次數
                    var _maxRotate = 30;//最大Rotate幅度 
                    var _positive = false; // 正、紀錄前次幅度 
                    var _negative = false; // 負、紀錄前次幅度 
                    var _actionShake = _shakeCount = 6; //搖晃符合開獎次數、搖晃次數 
                    var _threshold = 5; // 搖晃震幅 (度)
                    var _slideThreshold = 20; // 觸控距離
                    
                    // 開始遊戲(取得同意偵測)
                    function btnPlayAction(userAgent){
                        $remindImg.hide();
                        $playGame.show();
                        $winning.html('點擊按鈕抽大獎');
                        if (userAgent=='mobile'){
                            $deviceConfirm.addClass('active');
                        }
                        BtnPlay();
                    }
                    
                    function shakePlayAction(){
                        $remindIcon.show();
                        $remindImg.addClass('animation');
                        $deviceConfirm.addClass('active');
                        $winning.html('左右搖晃手機<br>即可抽獎');
                        window.addEventListener('deviceorientation', handleOrientation, false); 
                    }

                    function slidePlayAction(){
                        $remindIcon2.show();
                        $remindImg.addClass('animation');
                        $deviceConfirm.addClass('active');
                        $winning.html('手指左右滑動螢幕<br>即可抽獎');
                        window.addEventListener('touchmove',slidePlay);
                    }
                    
                    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Opera Mobi|Opera Tablet/i.test(navigator.userAgent)){
                        $deviceConfirm.show();
                        $deviceConfirmBtn.on('click',function(){
                            if (typeof DeviceOrientationEvent.requestPermission === 'function') {
                                DeviceOrientationEvent.requestPermission()
                                    .then(permissionState => {
                                        if (permissionState === 'granted') {
                                            // ios取得同意
                                            shakePlayAction();
                                        } else {
                                            // ios取得不同意
                                            // alert('ios 不允許偵測將無法進行遊戲')
                                            slidePlayAction();
                                        }
                                    })
                                    .catch((err) => {
                                        console.log(err);
                                    });
                            } else {
                                // android不需取得同意
                                shakePlayAction(); //搖晃
                                // slidePlayAction(); //觸控
                            }   
                        });
                    } else {
                        // 桌機不偵測直接帶入btn
                        btnPlayAction('desktop');
                    }
                    
                    // 偵測觸控
                    function slidePlay(){
                        if (event.targetTouches.length == 1) { // 判定如果只有一根指頭 
                            var touch = event.targetTouches[0];  // 取陣列的第一個
                            pageX = Math.floor(touch.pageX);

                            pageX = pageX-halfWidth;  
                            pageX = Math.floor((90/halfWidth)*pageX);

                            getShakeCount(pageX, _slideThreshold); 

                            var _rotate = Math.floor(pageX*(_maxRotate/90));
                            $handBox.css('transform', "rotate("+_rotate+"deg)");

                            if (_shakeCount==0){ //符合搖晃次數後開獎
                                checkWin('slide'); 
                            }
                        }
                    }
                    
                    // 偵測搖晃
                    function handleOrientation(event) {
                        var y = event.gamma; 
                        // var x = event.beta; 
                        // var z = event.alpha; 

                        if (y >  90) { y =  90};
                        if (y < -90) { y = -90};


                        y=Math.floor(y);
                        getShakeCount(y, _threshold); 

                        // 搖晃動態 
                        var _rotate=Math.floor(y*(_maxRotate/90));
                        $handBox.css('transform', "rotate("+_rotate+"deg)");

                        if (_shakeCount==0){ //符合搖晃次數後開獎
                            checkWin('shake'); 
                        }
                    }
                    
                    // 取搖晃次數
                    function getShakeCount(val, threshold){
                        if ( val>threshold ){
                            _positive = true;
                        }else if (val<-(threshold) ) {
                            _negative = true;
                        }
                        
                        if ( _positive && _negative){
                            _shakeCount--;
                            _positive = false; 
                            _negative = false;
                        }
                    }
                    
                    // 不同意偵測改使用按鈕開始遊戲 
                    // BtnPlay();
                    function BtnPlay(){
                        $playGame.on('click',function(){
                            $handBox.addClass('animation');
                            if ($(this).hasClass('btn-primary')){
                                $(this).removeClass('btn-primary').addClass('btn-secondary').attr('disabled', 'disabled');
                                setTimeout(function () {
                                    checkWin('btn');
                                }, 3000);
                            }
                        });
                    }
                    
                    // 開奬結果
                    function checkWin(type){
                        if ( type=='shake' ){
                            window.removeEventListener('deviceorientation', handleOrientation, false);
                        }else if ( type=='btn'){
                            $handBox.removeClass('animation');
                        }else if ( type=='slide' ){
                            window.removeEventListener('touchmove', slidePlay);
                        }
                        
                        showInfo(type, {#if $WinFlag#}$giftIcon{#else#}$loseIcon{#/if#}, PriceName);
                        alertPrize();
                    }
                    
                    function showInfo(type, iconDom, text) {
                        if ( type=='shake' ){
                            $remindImg.removeClass('animation').find('img').hide();
                        }else if ( type=='btn'){
                            $playGame.hide();
                            $remindImg.show().find('img').hide();
                        }else if( type=='slide'){
                            $remindImg.removeClass('animation').find('img').hide();
                        }
                        iconDom.show();
                        $winning.html(text);
                    }
                });
            </script>
        {#else if $LotteryType=='Gacha'#}
            <script type="text/javascript">
                var $coin = $("#coin"); // 投幣
                var $turnCrank = $('#turnCrank'); // 扭幣
                var $zjdl = $('.zjdl'); // 中獎轉蛋 
                var $remind = $('#remind'); // 提醒文字 
                $(function(){
                    $coin.click(function(){
                        $(this).addClass('in');
                        $remind.addClass('hide');
                        var number = Math.floor(Math.random() * (1 - 0 + 1)) + 0;
                        setTimeout(function () {
                            setTimeout(function () {
                                $turnCrank.addClass('in');
                                draw(number);
                            }, 300)
                        }, 300);
                    });
                });
                
                function draw(number){
                    for(i=1;i<=11;i++){
                        $(".qiu_"+i).removeClass("diaol_"+i);
                        $(".qiu_"+i).addClass("wieyi_"+i);
                    };
                    setTimeout(function(){
                        for(i=1;i<=11;i++){
                            $(".qiu_"+i).removeClass("wieyi_"+i);
                        }
                        switch(number){
                            case 0:$zjdl.children("span").addClass("diaL_1");break;
                            case 1:$zjdl.children("span").addClass("diaL_2");break;
                        }
                        $zjdl.removeClass("none").addClass("dila_Y");
                        setTimeout(function (){
                            alertPrize();
                        }, 1500);
                    }, 2200);
                }
            </script>
        {#else if $LotteryType=='NineSquare'#}
            <script>
                var Order = [0, 1, 2, 5, 8, 7, 6, 3];
                function StartSpin(){
                    if ($('#StartBtn').css('cursor') === 'pointer') {
                        var SpinSec = 3;
                        var SpinRound = 5;
                        $('#StartBtn').css('cursor', 'not-allowed').html('抽獎中...');
                        var Ctn = 0;
                        var SpinInterval = setInterval(function () {
                            $('.box-wrap>.square').removeClass('active');
                            $('.box-wrap>.square').eq(Order[Ctn%8]).addClass('active');
                            if(Ctn>((SpinRound-1)*8)){ // && Order[Ctn%8]===0
                                clearInterval(SpinInterval);
                                var FinalRoundInterval = setInterval(function () {
                                    $('.box-wrap>.square').removeClass('active');
                                    $('.box-wrap>.square').eq(Order[Ctn%8]).addClass('active');
                                    if(Ctn>((SpinRound-1)*8) && Order[Ctn%8]==={#if $PriceKey>3#}{#$PriceKey+1#}{#else#}{#$PriceKey#}{#/if#}){ //最後一圈
                                        clearInterval(FinalRoundInterval);
                                        setTimeout(function () {
                                            alertPrize();
                                            $('#StartBtn')
                                                    //.css('cursor', 'pointer')
                                                    .html('已開獎');
                                        }, 500);
                                    }
                                    Ctn++;
                                }, Math.round((SpinSec*1000)/(SpinRound*8))*5);
                            }
                            Ctn++;
                        }, Math.round((SpinSec*1000)/(SpinRound*8)));
                    }
                }
            </script>
        {#else if $LotteryType=='Treasure'#}
            <script>
                function OpenPrize(){
                    if ($('#treasure-chest-positioner').css('cursor') === 'pointer') {
                        $('#treasure-chest-positioner').css('cursor', 'not-allowed').addClass('shake');
                        setTimeout(function () {
                            $('#toggle-treasure').prop('checked', true);
                            setTimeout(function () {
                                alertPrize();
                            }, 500);
                        }, 1200);
                    }else{
                        $('#treasure-chest-positioner').css('cursor', 'pointer').removeClass('shake');
                        $('#toggle-treasure').prop('checked', false);
                    }
                }
                /*var Deg = -15;
                setInterval(function () {
                    $('html').css('--rotate-y', Deg + 'deg');
                    Deg++;
                }, 100);*/
            </script>
        {#/if#}
        {#$xajax_js#}
    </body>
</html>