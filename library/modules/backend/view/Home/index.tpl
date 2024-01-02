<!DOCTYPE html>
<html>
    <head>
        <title>{#$ModuleNameList.$_Module#} - {#$ActionNameList.$_ActionName#}</title>
        {#include file=$__PublicView|cat:'backend_head.tpl'#}
        {#include file=$__PublicView|cat:'type/facebooklogin.tpl'#}
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            {#include file=$__PublicView|cat:'backend_top.tpl'#}
            {#include file=$__PublicView|cat:'backend_menu.tpl'#}
            <div class="content-wrapper">
                {#include file=$__PublicView|cat:'alertArea.tpl'#}
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        {#if $WebhookStatus.active#}
                                            您的帳戶資訊 <div class="text text-success inline" style="border: 1px solid #03b903;padding: 5px;border-radius: 5px;"><i class="fa fa-circle" style="color: #03b903;font-size: x-small;vertical-align: 2px;"></i> 啟用中</div>
                                        {#else#}
                                            您的帳戶資訊 <div class="text text-danger  inline" style="border: 1px solid #e25d5b;padding: 5px;border-radius: 5px;"><i class="fa fa-circle" style="color:     red;font-size: x-small;vertical-align: 2px;"></i> 停用中</div>
                                        {#/if#}
                                    </h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button type="button" class="btn btn-box-tool hide" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="col-lg-3">
                                        <div class="small-box" style="color: #fff;background-color: #00b900;">
                                            <div class="inner">
                                                <h3>Line@</h3>
                                                <p>官方帳號</p>
                                            </div>
                                            <div class="icon">
                                                <img style="width: 70px;margin-top: -20px;" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&choe=UTF-8&chl=https://line.me/R/ti/p/@{#$__LineAtID#}">
                                                <i class="ion ion-bag hide"></i>
                                            </div>
                                            <a href="#" class="small-box-footer hide">More info <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="progress-group">
                                            <h4 class="progress-text" style="font-weight: normal;">
                                                <span>本月訊息用量</span>
                                                <b>(含加購訊息則數)</b>
                                            </h4>
                                            <div class="progress-text">
                                                <b>已傳送訊息則數</b>
                                                <span class="progress-number">
                                                    <b>{#$UseMsg.used#}</b>
                                                    <span style="font-weight: normal;">/{#$UseMsg.total#}</span>
                                                </span>
                                            </div>
                                            <div class="progress-text">
                                                <b>剩餘訊息則數</b>
                                                <span class="progress-number">
                                                    <b>{#$UseMsg.over#}</b>
                                                </span>
                                            </div>
                                            <div class="progress sm">
                                                <div class="progress-bar progress-bar-danger" style="width: {#$UseMsg.percent#}"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div id="BindFacebook" class="btn btn-facebook" onclick="FBLogin();">登入並前往綁定粉絲頁</div>
                                        <div id="UnBindFacebook" class="btn btn-danger" style="display: none;" onclick="FBLogout();">登出</div>
                                        <div id="UserName"></div>
                                        <img id="UserPic" src='' style='display: none;' />
                                        <div id="LinkedList"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">{#$SearchMonth#}月份好友數據統計</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool hide" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-navy"><i class="fa fa-users"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">總人數</span>
                                                <span class="info-box-number">{#$FriendData.total#}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-olive"><i class="fa fa-circle-o"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">有效好友數</span>
                                                <span class="info-box-number">{#$FriendData.effective#}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-red-gradient"><i class="fa fa-ban"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">總封鎖數</span>
                                                <span class="info-box-number">{#$FriendData.block#}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-black"><i class="fa fa-user"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">互動人數</span>
                                                <span class="info-box-number">{#$FriendData.interactive#}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-green"><i class="fa fa-user-plus"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">新增有效好友數</span>
                                                <span class="info-box-number">{#$FriendData.add#}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-red"><i class="fa fa-user-times"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">新增封鎖數</span>
                                                <span class="info-box-number">{#$FriendData.addblock#}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title">{#$SearchMonth#}月份訊息數據統計</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool hide" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-teal"><i class="fa fa-share"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Push</span>
                                                <span class="info-box-number">{#$MessageData.push#}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-blue-gradient"><i class="fa fa-share-alt"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Multicast</span>
                                                <span class="info-box-number">{#$MessageData.multicast#}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-purple"><i class="fa fa-reply"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Reply</span>
                                                <span class="info-box-number">{#$MessageData.reply#}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-blue-active"><i class="fa fa-commenting"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">訊息使用量</span>
                                                <span class="info-box-number">{#$MessageData.message#}則</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-gray"><i style="padding-top: 23px;" class="glyphicon glyphicon-screenshot"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">方案定位</span>
                                                <span class="info-box-number">【{#$MessageData.dosage#}用量】方案</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-gray-active"><i class="fa fa-money"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">固定月費</span>
                                                <span class="info-box-number">{#$MessageData.base#}元</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-yellow"><i class="fa fa-dollar"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">加購訊息費</span>
                                                <span class="info-box-number">{#$MessageData.add#}元</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-orange"><i class="fa fa-credit-card"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">總計費用</span>
                                                <span class="info-box-number">{#$MessageData.total#}元</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">每日好友變化</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool hide" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <canvas id="FriendsChart" style="height: 236px; width: 473px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title">每日訊息數量</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool hide" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <canvas id="MessagesChart" style="height: 236px; width: 473px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        {#foreach $demographic as $type=>$val#}
                            {#if $val#}
                                {#assign var="ThisType" value=$demographicList.$type.type#}
                                <div class="col-md-4">
                                    <div class="box box-danger">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">{#$demographicList.$type.title#}</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-box-tool hide" data-widget="remove"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <canvas id="{#$ThisType#}Chart" style="height: 236px; width: 473px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            {#/if#}
                        {#/foreach#}
                    </div>
                </section>
            </div>
            {#include file=$__PublicView|cat:'backend_footer.tpl'#}
            <script>
                $(function () {
                    {#foreach $demographic as $type=>$val#}
                        {#if $val#}
                            {#assign var="ThisType" value=$demographicList.$type.type#}
                            var {#$ThisType#}ChartCanvas = $('#{#$ThisType#}Chart').get(0).getContext('2d');
                            var {#$ThisType#}Chart = new Chart({#$ThisType#}ChartCanvas);
                            var {#$ThisType#}Data = [
                                {#$Ctn = 0#}
                                {#foreach $val as $key=>$item#}
                                    {#if $item.percentage>0#}
                                        {
                                            value: {#$item.percentage#},
                                            label: '{#$item.$ThisType#}',
                                            {#if $type=='genders' && ($val.female.percentage>$val.male.percentage)#}
                                                {#if $Ctn==0#}
                                                    color: '#dc3912',
                                                    highlight: '#dc3912',
                                                {#else if $Ctn==1#}
                                                    color: '#3366cc',
                                                    highlight: '#3366cc',
                                                {#else#}
                                                    color: '{#$ColorList.$Ctn#}',
                                                    highlight: '{#$ColorList.$Ctn#}',
                                                {#/if#}
                                            {#else#}
                                                {#if $ColorList.$Ctn#}
                                                    color: '{#$ColorList.$Ctn#}',
                                                    highlight: '{#$ColorList.$Ctn#}',
                                                {#/if#}
                                            {#/if#}
                                        },
                                        {#$Ctn = $Ctn+1#}
                                    {#/if#}
                                {#/foreach#}
                            ];
                            var {#$ThisType#}Options = {
                                //Boolean - Whether we should show a stroke on each segment
                                segmentShowStroke: true,
                                //String - The colour of each segment stroke
                                segmentStrokeColor: '#fff',
                                //Number - The width of each segment stroke
                                segmentStrokeWidth: 2,
                                //Number - The percentage of the chart that we cut out of the middle
                                percentageInnerCutout: 50, // This is 0 for Pie charts
                                //Number - Amount of animation steps
                                animationSteps: 100,
                                //String - Animation easing effect
                                animationEasing: 'easeOutBounce',
                                //Boolean - Whether we animate the rotation of the Doughnut
                                animateRotate: true,
                                //Boolean - Whether we animate scaling the Doughnut from the centre
                                animateScale: false,
                                //Boolean - whether to make the chart responsive to window resizing
                                responsive: true,
                                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                                maintainAspectRatio: true,
                                //String - A legend template
                                legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
                            };
                            //Create pie or douhnut chart
                            // You can switch between pie and douhnut using the method below.
                            {#$ThisType#}Chart.Doughnut({#$ThisType#}Data, {#$ThisType#}Options);
                        {#else#}
                            $('#{#$ThisType#}Chart').hide();
                        {#/if#}
                    {#/foreach#}
                    
                    {#if $IntervalFriendsData#}
                        var FriendsChartCanvas = $('#FriendsChart').get(0).getContext('2d');
                        var FriendsChart = new Chart(FriendsChartCanvas);
                        var FriendsChartData = {
                            labels  : [
                                {#foreach $IntervalFriendsData as $key=>$item#}
                                    {#if $key!=='總計'#}
                                        '{#$key#}',
                                    {#/if#}
                                {#/foreach#}
                            ],
                            datasets: [
                                {
                                    label               : '總好友數',
                                    fillColor           : '#001F3F',
                                    strokeColor         : '#001F3F',
                                    pointColor          : '#001F3F',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : [
                                                            {#foreach $IntervalFriendsData as $key=>$item#}
                                                                {#if $key!=='總計'#}
                                                                    {#$item.total#},
                                                                {#/if#}
                                                            {#/foreach#}
                                                          ]
                                },
                                {
                                    label               : '有效好友數',
                                    fillColor           : '#3D9970',
                                    strokeColor         : '#3D9970',
                                    pointColor          : '#3D9970',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : [
                                                            {#foreach $IntervalFriendsData as $key=>$item#}
                                                                {#if $key!=='總計'#}
                                                                    {#$item.effective#},
                                                                {#/if#}
                                                            {#/foreach#},
                                                          ]
                                },
                                {
                                    label               : '新增有效好友數',
                                    fillColor           : '#00a65a',
                                    strokeColor         : '#00a65a',
                                    pointColor          : '#00a65a',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : [
                                                            {#foreach $IntervalFriendsData as $key=>$item#}
                                                                {#if $key!=='總計'#}
                                                                    {#$item.add#},
                                                                {#/if#}
                                                            {#/foreach#},
                                                          ]
                                },
                                {
                                    label               : '總封鎖數',
                                    fillColor           : '#dd4b39',
                                    strokeColor         : '#dd4b39',
                                    pointColor          : '#dd4b39',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : [
                                                            {#foreach $IntervalFriendsData as $key=>$item#}
                                                                {#if $key!=='總計'#}
                                                                    {#$item.block#},
                                                                {#/if#}
                                                            {#/foreach#},
                                                          ]
                                },
                                {
                                    label               : '新增封鎖數',
                                    fillColor           : '#dd4b39',
                                    strokeColor         : '#dd4b39',
                                    pointColor          : '#dd4b39',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : [
                                                            {#foreach $IntervalFriendsData as $key=>$item#}
                                                                {#if $key!=='總計'#}
                                                                    {#$item.addblock#},
                                                                {#/if#}
                                                            {#/foreach#},
                                                          ]
                                },
                                {
                                    label               : '每日變化',
                                    fillColor           : '#3366cc',
                                    strokeColor         : '#3366cc',
                                    pointColor          : '#3366cc',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : [
                                                            {#foreach $IntervalFriendsData as $key=>$item#}
                                                                {#if $key!=='總計'#}
                                                                    {#$item.dailychanged#},
                                                                {#/if#}
                                                            {#/foreach#},
                                                          ]
                                },
                                {
                                    label               : '互動好友',
                                    fillColor           : '#111',
                                    strokeColor         : '#111',
                                    pointColor          : '#111',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : [
                                                            {#foreach $IntervalFriendsData as $key=>$item#}
                                                                {#if $key!=='總計'#}
                                                                    {#$item.interactive#},
                                                                {#/if#}
                                                            {#/foreach#},
                                                          ]
                                },
                            ]
                        };
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
                    {#else#}
                        $('#FriendsChart').hide();
                    {#/if#}
                    
                    {#if $IntervalMessagesData#}
                        var MessagesChartCanvas = $('#MessagesChart').get(0).getContext('2d');
                        var MessagesChart = new Chart(MessagesChartCanvas);
                        var MessagesChartData = {
                            labels  : [
                                {#foreach $IntervalMessagesData as $key=>$item#}
                                    {#if $key!=='總計'#}
                                        '{#$key#}',
                                    {#/if#}
                                {#/foreach#}
                            ],
                            datasets: [
                                {
                                    label               : 'PUSH',
                                    fillColor           : '#39CCCC',
                                    strokeColor         : '#39CCCC',
                                    pointColor          : '#39CCCC',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : [
                                                            {#foreach $IntervalMessagesData as $key=>$item#}
                                                                {#if $key!=='總計'#}
                                                                    {#$item.push#},
                                                                {#/if#}
                                                            {#/foreach#}
                                                          ]
                                },
                                {
                                    label               : 'MULTICAST',
                                    fillColor           : '#0073b7',
                                    strokeColor         : '#0073b7',
                                    pointColor          : '#0073b7',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : [
                                                            {#foreach $IntervalMessagesData as $key=>$item#}
                                                                {#if $key!=='總計'#}
                                                                    {#$item.multicast#},
                                                                {#/if#}
                                                            {#/foreach#},
                                                          ]
                                },
                                {
                                    label               : 'REPLY',
                                    fillColor           : '#605ca8',
                                    strokeColor         : '#605ca8',
                                    pointColor          : '#605ca8',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : [
                                                            {#foreach $IntervalMessagesData as $key=>$item#}
                                                                {#if $key!=='總計'#}
                                                                    {#$item.reply#},
                                                                {#/if#}
                                                            {#/foreach#},
                                                          ]
                                },
                            ]
                        };
                        var MessagesChartOptions = {
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
                        MessagesChartOptions.datasetFill = false;
                        MessagesChart.Line(MessagesChartData, MessagesChartOptions);
                    {#else#}
                        $('#MessagesChart').hide();
                    {#/if#}
                });
            </script>
            {#$js#}
            {#$xajax_js#}
        </div>
    </body>
</html>