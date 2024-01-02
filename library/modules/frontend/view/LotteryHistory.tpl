<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="想到什麼，就做什麼">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <title>樂透分析</title>
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
        .BallColor {
            display: table-cell;
            width: 38px;
            height: 38px;
            text-align: center;
            vertical-align: middle;
            font-size: 18px;
            font-weight: bold;
            border-radius: 50%;
            background: #FFBF11;
            font-family: Arial;
        }
        .SuperBall {
            background: #E20010;
            color: #fff;
        }
        .CheckNumArea {
            text-align: center;
        }
        .CheckNum {
            width: auto;
            display: inline-block;
        }
        .border-green {
            border: 1px solid green;
        }
    </style>
    
    <body onselectstart="return false">
        <div class="wrapper1">
            <div class="content-wrapper1">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            {#assign var="LastCtn" value=count($YearList)-1#}
                            <div class="col-md-3">
                                <div class="box box-solid collapsed-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">年份：({#if $GameYear=='total'#}{#$YearList.0#}~{#$YearList.$LastCtn#}{#else#}{#$GameYear#}{#/if#})</h3>
                                        <div class="box-tools">
                                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="GameYear {#if $GameYear=='total'#}active{#/if#}" data="total"><a href="#">全部<span class="pull-right"><i class="fa fa-angle-right"></i></span></a></li>
                                            {#foreach $YearList as $key=>$item#}
                                                <li class="GameYear {#if $GameYear==$item#}active{#/if#}" data="{#$item#}"><a href="#">{#$item#}<span class="pull-right"><i class="fa fa-angle-right"></i></span></a></li>
                                            {#/foreach#}
                                        </ul>
                                    </div>
                                </div>
                                <div class="box box-solid collapsed-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">遊戲：({#$GameName#})</h3>
                                        <div class="box-tools">
                                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">
                                            {#foreach $LotteryTotalList as $key=>$item#}
                                                <li class="GameName {#if $GameName==$key#}active{#/if#}" data="{#$key#}"><a href="#">{#$key#}<span class="pull-right"><i class="fa fa-angle-right"></i></span></a></li>
                                            {#/foreach#}
                                        </ul>
                                    </div>
                                </div>
                                <div class="box box-solid collapsed-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">獎號：({#if !$GameNum#}全部{#else#}{#if $LotteryColumnList.$GameNum.$GameName#}{#$LotteryColumnList.$GameNum.$GameName#}{#else#}{#$ColumnTranslateList.$GameNum#}{#/if#}{#/if#})</h3>
                                        <div class="box-tools">
                                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="GameNum {#if !$GameNum#}active{#/if#}" data=""><a href="#">全部<span class="pull-right"><i class="fa fa-angle-right"></i></span></a></li>
                                            {#foreach $LotteryTotalList.$GameName.column as $columnkey=>$columnitem#}
                                                {#if !in_array($columnitem, $NotBallColumn)#}
                                                    <li class="GameNum {#if $GameNum==$columnitem#}active{#/if#}" data="{#$columnitem#}">
                                                        <a href="#">
                                                            {#if $LotteryColumnList.$columnitem.$GameName#}{#$LotteryColumnList.$columnitem.$GameName#}{#else#}{#$ColumnTranslateList.$columnitem#}{#/if#}
                                                            <span class="pull-right">
                                                                <i class="fa fa-angle-right"></i>
                                                            </span>
                                                        </a>
                                                    </li>
                                                {#/if#}
                                            {#/foreach#}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            {#if $ProbabilityList.num.0#}
                                <div class="col-md-9">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-blue-gradient"><i class="fa fa-gamepad"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">總場數</span>
                                            <span class="info-box-number">{#$ProbabilityList.num.0.totalgameCtn#}</span>
                                        </div>
                                    </div>
                                </div>
                            {#/if#}
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <div class="col-md-12">
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">隨機產生</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                <button type="button" class="btn btn-box-tool hide" data-widget="remove"><i class="fa fa-times"></i></button>
                                            </div>
                                            <div class="CheckNumArea">
                                                {#foreach $LotteryTotalList.$GameName.column as $columnkey=>$columnitem#}
                                                    {#if !in_array($columnitem, $NotBallColumn)#}
                                                        <input type="number" class="form-control CheckNum" data-key="{#$columnitem#}" min="1" max="49" placeholder="{#if $LotteryColumnList.$columnitem.$GameName#}{#$LotteryColumnList.$columnitem.$GameName#}{#else#}{#$ColumnTranslateList.$columnitem#}{#/if#}">
                                                    {#/if#}
                                                {#/foreach#}
                                                <div class="btn btn-success" onclick="CheckNum();">比對</div>
                                                <div class="btn btn-info" onclick="GetRandomBalls(10);">換一批</div>
                                                <div class="btn btn-danger" onclick="$('.CheckNum').val('');$('#BallsContainer>tr>th>.BallColor').removeClass('border-green');">清除</div>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table class="table no-margin">
                                                    <thead>
                                                        <tr>
                                                            {#foreach $LotteryTotalList.$GameName.column as $columnkey=>$columnitem#}
                                                                {#if !in_array($columnitem, $NotBallColumn)#}
                                                                    <th>
                                                                        {#if $LotteryColumnList.$columnitem.$GameName#}
                                                                            {#$LotteryColumnList.$columnitem.$GameName#}
                                                                        {#else#}
                                                                            {#$ColumnTranslateList.$columnitem#}
                                                                        {#/if#}
                                                                    </th>
                                                                {#/if#}
                                                            {#/foreach#}
                                                            <th>平均</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="BallsContainer">
                                                        
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            {#foreach $LotteryTotalList.$GameName.column as $columnkey=>$columnitem#}
                                                                {#if !in_array($columnitem, $NotBallColumn)#}
                                                                    <th>
                                                                        {#if $LotteryColumnList.$columnitem.$GameName#}
                                                                            {#$LotteryColumnList.$columnitem.$GameName#}
                                                                        {#else#}
                                                                            {#$ColumnTranslateList.$columnitem#}
                                                                        {#/if#}
                                                                    </th>
                                                                {#/if#}
                                                            {#/foreach#}
                                                            <th>平均</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <div class="col-md-12">
                                    {#if $ProbabilityList.num.0#}
                                        <div class="col-md-{#if $ProbabilityList.numS.0#}6{#else#}12{#/if#}">
                                            <div class="box box-success collapsed-box">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">一般獎號</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                                        <button type="button" class="btn btn-box-tool hide" data-widget="remove"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="info-box">
                                                            <span class="info-box-icon bg-olive"><i class="fa fa-balance-scale"></i></span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-text">平均</span>
                                                                <span class="info-box-number">{#$ProbabilityList.num.0.noteCtn#}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table no-margin">
                                                                <thead>
                                                                    <tr>
                                                                        <th>排名</th>
                                                                        <th>號碼</th>
                                                                        <th>開獎次數</th>
                                                                        <th>開獎率</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    {#foreach $ProbabilityList.num as $key=>$item#}
                                                                        <tr>
                                                                            <th>{#$key+1#}</th>
                                                                            <th><div class="BallColor">{#$item.key#}</div></th>
                                                                            <th>{#$item.ctn#}</th>
                                                                            <th>{#$item.game#}%</th>
                                                                        </tr>
                                                                    {#/foreach#}
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>排名
                                                                        <th>號碼</th>
                                                                        <th>開獎次數</th>
                                                                        <th>開獎率</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {#/if#}
                                    
                                    {#if $ProbabilityList.numS.0#}
                                        <div class="col-md-6">
                                            <div class="box box-success collapsed-box">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">{#$LotteryColumnList.numS.$GameName#}</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                                        <button type="button" class="btn btn-box-tool hide" data-widget="remove"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="info-box">
                                                            <span class="info-box-icon bg-olive"><i class="fa fa-balance-scale"></i></span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-text">平均</span>
                                                                <span class="info-box-number">{#$ProbabilityList.numS.0.noteCtn#}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table no-margin">
                                                                <thead>
                                                                    <tr>
                                                                        <th>排名</th>
                                                                        <th>號碼</th>
                                                                        <th>開獎次數</th>
                                                                        <th>開獎率</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    {#foreach $ProbabilityList.numS as $key=>$item#}
                                                                        <tr>
                                                                            <th>{#$key+1#}</th>
                                                                            <th><div class="BallColor SuperBall">{#$item.key#}</div></th>
                                                                            <th>{#$item.ctn#}</th>
                                                                            <th>{#$item.game#}%</th>
                                                                        </tr>
                                                                    {#/foreach#}
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>排名
                                                                        <th>號碼</th>
                                                                        <th>開獎次數</th>
                                                                        <th>開獎率</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {#/if#}
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">{#if $GameYear=='total'#}{#$YearList.0#}~{#$YearList.$LastCtn#}{#else#}{#$GameYear#}{#/if#}年圖表</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                            <button type="button" class="btn btn-box-tool hide" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <canvas id="FriendsChart" style="height: 236px; width: 473px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="box box-success collapsed-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">{#if $GameYear=='total'#}{#$YearList.0#}~{#$YearList.$LastCtn#}{#else#}{#$GameYear#}{#/if#}年記錄</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                            <button type="button" class="btn btn-box-tool hide" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table no-margin">
                                                    <thead>
                                                        <tr>
                                                            {#foreach $LotteryTotalList.$GameName.column as $columnkey=>$columnitem#}
                                                                <th>
                                                                    {#if $LotteryColumnList.$columnitem.$GameName#}
                                                                        {#$LotteryColumnList.$columnitem.$GameName#}
                                                                    {#else#}
                                                                        {#$ColumnTranslateList.$columnitem#}
                                                                    {#/if#}
                                                                </th>
                                                            {#/foreach#}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {#foreach $RowsData.$GameName as $year=>$Years#}
                                                            {#foreach $Years as $key=>$subject#}
                                                                {#if $GameYear=='total' || $year==$GameYear#}
                                                                    <tr>
                                                                        {#foreach $LotteryTotalList.$GameName.column as $columnkey=>$columnitem#}
                                                                            <th>
                                                                                {#if in_array($columnitem, $NotBallColumn)#}
                                                                                    {#$subject.$columnitem#}
                                                                                {#else if $columnitem=='numS'#}
                                                                                    <div class="BallColor SuperBall">{#$subject.$columnitem#}</div>
                                                                                {#else#}
                                                                                    <div class="BallColor">{#$subject.$columnitem#}</div>
                                                                                {#/if#}
                                                                            </th>
                                                                        {#/foreach#}
                                                                    </tr>
                                                                {#/if#}
                                                            {#/foreach#}
                                                        {#/foreach#}
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            {#foreach $LotteryTotalList.$GameName.column as $columnkey=>$columnitem#}
                                                                <th>
                                                                    {#if $LotteryColumnList.$columnitem.$GameName#}
                                                                        {#$LotteryColumnList.$columnitem.$GameName#}
                                                                    {#else#}
                                                                        {#$ColumnTranslateList.$columnitem#}
                                                                    {#/if#}
                                                                </th>
                                                            {#/foreach#}
                                                        </tr>
                                                    </tfoot>
                                                </table>
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
        
        <script>
            var BallList = [];
            var Balls = [];
            var GameColumn = {#json_encode($LotteryTotalList.$GameName.column)#};
            var NotBallColumn = {#json_encode($NotBallColumn)#};
            var RowsGameData = {#json_encode($RowsData.$GameName)#};
            $(function () {
                for (const [year, Years] of Object.entries(RowsGameData)) {
                    for (const [key, subject] of Object.entries(Years)) {
                        if('{#$GameYear#}'=='total' || year=='{#$GameYear#}'){
                            for (const [columnkey, columnitem] of Object.entries(GameColumn)) {
                                if (!BallList.hasOwnProperty(columnitem)) {
                                    BallList[columnitem] = [];
                                }
                                BallList[columnitem].push(subject[columnitem]);
                            }
                        }
                    }
                }
            });
        </script>
        <script>
            //var vConsole = new VConsole();
            
            $(function () {
                $(document).on('click', '.GameYear, .GameName, .GameNum', function(event) {
                    var GameKey = '';
                    if($(this).hasClass('GameYear')){
                        GameKey = 'GameYear';
                    }else if($(this).hasClass('GameName')){
                        xajax_Session('GameNum', '', 0);
                        GameKey = 'GameName';
                    }else if($(this).hasClass('GameNum')){
                        GameKey = 'GameNum';
                    }
                    
                    if(GameKey){
                        $('.'+GameKey).removeClass('active');
                        $(this).addClass('active');
                        
                        xajax_Session(GameKey, $(this).attr('data'), 1);
                    }
                });
                GetRandomBalls(10);
            });
            
            function getRandom(min,max){
                return Math.floor(Math.random()*(max-min+1))+min;
            };
            function GetRandomBalls(ctn=1){
                Balls = [];
                $('#BallsContainer').html('');
                for(var i=0;i<ctn;i++){
                    var NowBall = {};
                    var NowIncludes = [];
                    for (const [columnkey, columnitem] of Object.entries(GameColumn)) {
                        if(NotBallColumn.indexOf(columnitem) == -1){ //!in_array
                            var NowGet = ('0'+BallList[columnitem][getRandom(0, (BallList[columnitem].length-1))]*1).substr(-2);
                            while ((NowIncludes.indexOf(NowGet) != -1)) { //in_array
                                NowGet = ('0'+BallList[columnitem][getRandom(0, (BallList[columnitem].length-1))]*1).substr(-2);
                            }
                            NowIncludes.push(NowGet);
                        }
                    }
                    NowIncludes.sort(function (a, b) {
                        if (a > b)
                            return 1;
                        if (a < b)
                            return -1;
                                return 0;
                    });
                    var key = 0;
                    for (const [columnkey, columnitem] of Object.entries(GameColumn)) {
                        if(NotBallColumn.indexOf(columnitem) == -1){
                            NowBall[columnitem] = NowIncludes[key];
                            key++;
                        }
                    }
                    Balls.push(NowBall);
                }
                
                for (const [ballkey, ball] of Object.entries(Balls)) {
                    var HTML = '<tr>';
                    var NowTotal = 0;
                    var NowLength = 0;
                    for (const [numkey, num] of Object.entries(ball)) {
                        var Class = (numkey=='numS') ? 'SuperBall' : '';
                        HTML += '<th class="'+ numkey +'"><div class="BallColor '+Class+'">'+ num +'</div></th>';
                        NowTotal += num*1;
                        NowLength ++;
                    }
                    HTML += '<th class="average">'+ Math.round(NowTotal/NowLength) +'</th>';
                    HTML += '</tr>';
                    $('#BallsContainer').append(HTML);
                }
                //console.log(Balls);
            }
            
            function CheckNum(){
                var errorMsg = '';
                var BingoBall = [];
                $('.CheckNum').each(function(e) {
                    if(!$(this).val()){
                        if(errorMsg){
                            errorMsg += '、';
                        }
                        errorMsg += '【' + $(this).attr('placeholder') + '】未填';
                    }
                });
                
                if(errorMsg){
                    alert(errorMsg);
                }else{
                    $('.CheckNum').each(function(e) {
                        for (const [ballkey, ball] of Object.entries(Balls)) {
                            for (const [numkey, num] of Object.entries(ball)) {
                                if($(this).val()==num){
                                    if( ('0'+numkey*1).substr(-2) == ('0'+$(this).attr('data-key')*1).substr(-2) ){
                                        if(numkey=='numKey'){
                                            $('#BallsContainer>tr').eq(ballkey).find('th.'+numkey+'>.BallColor.SuperBall').addClass('border-green');
                                        }else{
                                            $('#BallsContainer>tr').eq(ballkey).find('th.'+numkey+'>.BallColor').addClass('border-green');
                                        }
                                    }
                                }
                            }
                            var average = $('#BallsContainer>tr').eq(ballkey).find('th.average').html().split('(');
                            $('#BallsContainer>tr').eq(ballkey).find('th.average').html(average[0] + '('+$('#BallsContainer>tr').eq(ballkey).find('th>.BallColor.border-green').length+')');
                        }
                    });
                }
            }
        </script>
        
        <script src="{#$__PLUGIN_Web#}/bootstrap/Chart.js"></script>
        <script>
            $(function () {
                if($('#FriendsChart')[0]){
                    var FriendsChartCanvas = $('#FriendsChart').get(0).getContext('2d');
                    var FriendsChart = new Chart(FriendsChartCanvas);
                    var FriendsChartData = {
                        labels  : [
                            {#foreach $RowsData.$GameName as $year=>$Years#}
                                {#foreach $Years as $key=>$subject#}
                                    {#if $GameYear=='total' || $year==$GameYear#}
                                        '{#$subject.date#}',
                                    {#/if#}
                                {#/foreach#}
                            {#/foreach#}
                        ],
                        datasets: [
                            {#$Ctn = 0#}
                            {#foreach $LotteryTotalList.$GameName.column as $columnkey=>$columnitem#}
                                {#if !in_array($columnitem, $NotBallColumn) && (!$GameNum||$columnitem==$GameNum)#}
                                    {
                                        label               : '{#if $LotteryColumnList.$columnitem.$GameName#}{#$LotteryColumnList.$columnitem.$GameName#}{#else#}{#$ColumnTranslateList.$columnitem#}{#/if#}',
                                        fillColor           : '{#$ColorList.$Ctn#}',
                                        strokeColor         : '{#$ColorList.$Ctn#}',
                                        pointColor          : '{#$ColorList.$Ctn#}',
                                        pointStrokeColor    : 'rgba(60,141,188,1)',
                                        pointHighlightFill  : '#fff',
                                        pointHighlightStroke: 'rgba(60,141,188,1)',
                                        data                : [
                                                                {#foreach $RowsData.$GameName as $year=>$Years#}
                                                                    {#foreach $Years as $key=>$subject#}
                                                                        {#if $GameYear=='total' || $year==$GameYear#}
                                                                            {#$subject.$columnitem#},
                                                                        {#/if#}
                                                                    {#/foreach#}
                                                                {#/foreach#}
                                                              ]
                                    },
                                    {#$Ctn = $Ctn+1#}
                                {#/if#}
                            {#/foreach#}
                        ]
                    }
                    var FriendsChartOptions = {
                        //Boolean - If we should show the scale at all
                        showScale               : true,
                        //Boolean - Whether grid lines are shown across the chart
                        scaleShowGridLines      : false,
                        //String - Colour of the grid lines
                        scaleGridLineColor: 'rgba(0,0,0,.05)',
                        //Number - Width of the grid lines
                        scaleGridLineWidth: 1,
                        //Boolean - Whether to show horizontal lines (except X axis)
                        scaleShowHorizontalLines: true,
                        //Boolean - Whether to show vertical lines (except Y axis)
                        scaleShowVerticalLines: true,
                        //Boolean - Whether the line is curved between points
                        bezierCurve: true,
                        //Number - Tension of the bezier curve between points
                        bezierCurveTension: 0.3,
                        //Boolean - Whether to show a dot for each point
                        pointDot: false,
                        //Number - Radius of each point dot in pixels
                        pointDotRadius: 4,
                        //Number - Pixel width of point dot stroke
                        pointDotStrokeWidth: 1,
                        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                        pointHitDetectionRadius: 20,
                        //Boolean - Whether to show a stroke for datasets
                        datasetStroke: true,
                        //Number - Pixel width of dataset stroke
                        datasetStrokeWidth: 2,
                        //Boolean - Whether to fill the dataset with a color
                        datasetFill: true,
                        //String - A legend template
                        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
                        //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                        maintainAspectRatio: true,
                        //Boolean - whether to make the chart responsive to window resizing
                        responsive: true
                    };
                    FriendsChartOptions.datasetFill = false;
                    FriendsChart.Line(FriendsChartData, FriendsChartOptions);
                }
            });
        </script>
        
        {#$xajax_js#}
    </body>
</html>