<?php /* Smarty version Smarty3-b7, created on 2020-11-23 10:40:44
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/view/Home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3014436005fbb212c72e335-16812016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48786fd29e1cf05897590d1a580e86a7be5920e5' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/view/Home.tpl',
      1 => 1606099218,
    ),
  ),
  'nocache_hash' => '3014436005fbb212c72e335-16812016',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.cat.php';
?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->getVariable('ModuleNameList')->value[$_smarty_tpl->getVariable('_Module')->value];?>
 - <?php echo $_smarty_tpl->getVariable('ActionNameList')->value[$_smarty_tpl->getVariable('_ActionName')->value];?>
</title>
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'backend_head.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'backend_top.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'backend_menu.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <div class="content-wrapper">
                <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'alertArea.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">您的帳戶資訊</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
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
                                                <img style="width: 70px;margin-top: -20px;" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&choe=UTF-8&chl=https://line.me/R/ti/p/@<?php echo $_smarty_tpl->getVariable('__LineAtID')->value;?>
">
                                                <i class="ion ion-bag hide"></i>
                                            </div>
                                            <a href="#" class="small-box-footer hide">More info <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="progress-group">
                                            <span class="progress-text">使用訊息</span>
                                            <span class="progress-number">
                                                <b><?php echo $_smarty_tpl->getVariable('UseMsg')->value['used'];?>
</b>/<?php echo $_smarty_tpl->getVariable('UseMsg')->value['total'];?>

                                            </span>
                                            <div class="progress sm">
                                                <div class="progress-bar progress-bar-danger" style="width: <?php echo $_smarty_tpl->getVariable('UseMsg')->value['percent'];?>
"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo $_smarty_tpl->getVariable('SearchMonth')->value;?>
月份好友數據統計</h3>
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
                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('FriendData')->value['total'];?>
</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-olive"><i class="fa fa-user-plus"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">有效好友數</span>
                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('FriendData')->value['effective'];?>
</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-red-gradient"><i class="fa fa-user-times"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">總封鎖數</span>
                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('FriendData')->value['block'];?>
</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-black"><i class="fa fa-user"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">互動人數</span>
                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('FriendData')->value['interactive'];?>
</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-green"><i class="fa fa-circle-o"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">新增有效好友數</span>
                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('FriendData')->value['add'];?>
</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-red"><i class="fa fa-ban"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">新增封鎖數</span>
                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('FriendData')->value['addblock'];?>
</span>
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
                                    <h3 class="box-title"><?php echo $_smarty_tpl->getVariable('SearchMonth')->value;?>
月份訊息數據統計</h3>
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
                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('MessageData')->value['push'];?>
</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-blue-gradient"><i class="fa fa-share-alt"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Multicast</span>
                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('MessageData')->value['multicast'];?>
</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-purple"><i class="fa fa-reply"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Reply</span>
                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('MessageData')->value['reply'];?>
</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-blue-active"><i class="fa fa-commenting"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">訊息使用量</span>
                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('MessageData')->value['message'];?>
則</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-gray"><i style="padding-top: 23px;" class="glyphicon glyphicon-screenshot"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">方案定位</span>
                                                <span class="info-box-number">【<?php echo $_smarty_tpl->getVariable('MessageData')->value['dosage'];?>
用量】方案</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-gray-active"><i class="fa fa-money"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">固定月費</span>
                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('MessageData')->value['base'];?>
元</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-yellow"><i class="fa fa-dollar"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">加購訊息費</span>
                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('MessageData')->value['add'];?>
元</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-orange"><i class="fa fa-credit-card"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">總計費用</span>
                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('MessageData')->value['total'];?>
元</span>
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
                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('demographic')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                            <?php if ($_smarty_tpl->getVariable('val')->value){?>
                                <?php $_smarty_tpl->assign("ThisType",$_smarty_tpl->getVariable('demographicList')->value[$_smarty_tpl->getVariable('type')->value]['type'],null,null);?>
                                <div class="col-md-4">
                                    <div class="box box-danger">
                                        <div class="box-header with-border">
                                            <h3 class="box-title"><?php echo $_smarty_tpl->getVariable('demographicList')->value[$_smarty_tpl->getVariable('type')->value]['title'];?>
</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-box-tool hide" data-widget="remove"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <canvas id="<?php echo $_smarty_tpl->getVariable('ThisType')->value;?>
Chart" style="height: 236px; width: 473px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        <?php }} ?>
                    </div>
                </section>
            </div>
            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'backend_footer.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <script>
                $(function () {
                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('demographic')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                        <?php if ($_smarty_tpl->getVariable('val')->value){?>
                            <?php $_smarty_tpl->assign("ThisType",$_smarty_tpl->getVariable('demographicList')->value[$_smarty_tpl->getVariable('type')->value]['type'],null,null);?>
                            var <?php echo $_smarty_tpl->getVariable('ThisType')->value;?>
ChartCanvas = $('#<?php echo $_smarty_tpl->getVariable('ThisType')->value;?>
Chart').get(0).getContext('2d');
                            var <?php echo $_smarty_tpl->getVariable('ThisType')->value;?>
Chart = new Chart(<?php echo $_smarty_tpl->getVariable('ThisType')->value;?>
ChartCanvas);
                            var <?php echo $_smarty_tpl->getVariable('ThisType')->value;?>
Data = [
                                <?php $_smarty_tpl->assign('Ctn',0,null,null);?>
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('val')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                    <?php if ($_smarty_tpl->getVariable('item')->value['percentage']>0){?>
                                        {
                                            value: <?php echo $_smarty_tpl->getVariable('item')->value['percentage'];?>
,
                                            label: '<?php echo $_smarty_tpl->getVariable('item')->value[$_smarty_tpl->getVariable('ThisType')->value];?>
',
                                            <?php if ($_smarty_tpl->getVariable('type')->value=='genders'&&($_smarty_tpl->getVariable('val')->value['female']['percentage']>$_smarty_tpl->getVariable('val')->value['male']['percentage'])){?>
                                                <?php if ($_smarty_tpl->getVariable('Ctn')->value==0){?>
                                                    color: '#dc3912',
                                                    highlight: '#dc3912',
                                                <?php }elseif($_smarty_tpl->getVariable('Ctn')->value==1){?>
                                                    color: '#3366cc',
                                                    highlight: '#3366cc',
                                                <?php }else{ ?>
                                                    color: '<?php echo $_smarty_tpl->getVariable('ColorList')->value[$_smarty_tpl->getVariable('Ctn')->value];?>
',
                                                    highlight: '<?php echo $_smarty_tpl->getVariable('ColorList')->value[$_smarty_tpl->getVariable('Ctn')->value];?>
',
                                                <?php }?>
                                            <?php }else{ ?>
                                                <?php if ($_smarty_tpl->getVariable('ColorList')->value[$_smarty_tpl->getVariable('Ctn')->value]){?>
                                                    color: '<?php echo $_smarty_tpl->getVariable('ColorList')->value[$_smarty_tpl->getVariable('Ctn')->value];?>
',
                                                    highlight: '<?php echo $_smarty_tpl->getVariable('ColorList')->value[$_smarty_tpl->getVariable('Ctn')->value];?>
',
                                                <?php }?>
                                            <?php }?>
                                        },
                                        <?php $_smarty_tpl->assign('Ctn',$_smarty_tpl->getVariable('Ctn')->value+1,null,null);?>
                                    <?php }?>
                                <?php }} ?>
                            ];
                            var <?php echo $_smarty_tpl->getVariable('ThisType')->value;?>
Options = {
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
                            <?php echo $_smarty_tpl->getVariable('ThisType')->value;?>
Chart.Doughnut(<?php echo $_smarty_tpl->getVariable('ThisType')->value;?>
Data, <?php echo $_smarty_tpl->getVariable('ThisType')->value;?>
Options);
                        <?php }else{ ?>
                            $('#<?php echo $_smarty_tpl->getVariable('ThisType')->value;?>
Chart').hide();
                        <?php }?>
                    <?php }} ?>
                    
                    <?php if ($_smarty_tpl->getVariable('IntervalFriendsData')->value){?>
                        var FriendsChartCanvas = $('#FriendsChart').get(0).getContext('2d');
                        var FriendsChart = new Chart(FriendsChartCanvas);
                        var FriendsChartData = {
                            labels  : [
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('IntervalFriendsData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                    <?php if ($_smarty_tpl->getVariable('key')->value!=='總計'){?>
                                        '<?php echo $_smarty_tpl->getVariable('key')->value;?>
',
                                    <?php }?>
                                <?php }} ?>
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
                                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('IntervalFriendsData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                                <?php if ($_smarty_tpl->getVariable('key')->value!=='總計'){?>
                                                                    <?php echo $_smarty_tpl->getVariable('item')->value['total'];?>
,
                                                                <?php }?>
                                                            <?php }} ?>
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
                                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('IntervalFriendsData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                                <?php if ($_smarty_tpl->getVariable('key')->value!=='總計'){?>
                                                                    <?php echo $_smarty_tpl->getVariable('item')->value['effective'];?>
,
                                                                <?php }?>
                                                            <?php }} ?>,
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
                                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('IntervalFriendsData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                                <?php if ($_smarty_tpl->getVariable('key')->value!=='總計'){?>
                                                                    <?php echo $_smarty_tpl->getVariable('item')->value['add'];?>
,
                                                                <?php }?>
                                                            <?php }} ?>,
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
                                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('IntervalFriendsData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                                <?php if ($_smarty_tpl->getVariable('key')->value!=='總計'){?>
                                                                    <?php echo $_smarty_tpl->getVariable('item')->value['block'];?>
,
                                                                <?php }?>
                                                            <?php }} ?>,
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
                                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('IntervalFriendsData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                                <?php if ($_smarty_tpl->getVariable('key')->value!=='總計'){?>
                                                                    <?php echo $_smarty_tpl->getVariable('item')->value['addblock'];?>
,
                                                                <?php }?>
                                                            <?php }} ?>,
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
                                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('IntervalFriendsData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                                <?php if ($_smarty_tpl->getVariable('key')->value!=='總計'){?>
                                                                    <?php echo $_smarty_tpl->getVariable('item')->value['dailychanged'];?>
,
                                                                <?php }?>
                                                            <?php }} ?>,
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
                                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('IntervalFriendsData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                                <?php if ($_smarty_tpl->getVariable('key')->value!=='總計'){?>
                                                                    <?php echo $_smarty_tpl->getVariable('item')->value['interactive'];?>
,
                                                                <?php }?>
                                                            <?php }} ?>,
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
                    <?php }else{ ?>
                        $('#FriendsChart').hide();
                    <?php }?>
                    
                    <?php if ($_smarty_tpl->getVariable('IntervalMessagesData')->value){?>
                        var MessagesChartCanvas = $('#MessagesChart').get(0).getContext('2d');
                        var MessagesChart = new Chart(MessagesChartCanvas);
                        var MessagesChartData = {
                            labels  : [
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('IntervalMessagesData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                    <?php if ($_smarty_tpl->getVariable('key')->value!=='總計'){?>
                                        '<?php echo $_smarty_tpl->getVariable('key')->value;?>
',
                                    <?php }?>
                                <?php }} ?>
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
                                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('IntervalMessagesData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                                <?php if ($_smarty_tpl->getVariable('key')->value!=='總計'){?>
                                                                    <?php echo $_smarty_tpl->getVariable('item')->value['push'];?>
,
                                                                <?php }?>
                                                            <?php }} ?>
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
                                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('IntervalMessagesData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                                <?php if ($_smarty_tpl->getVariable('key')->value!=='總計'){?>
                                                                    <?php echo $_smarty_tpl->getVariable('item')->value['multicast'];?>
,
                                                                <?php }?>
                                                            <?php }} ?>,
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
                                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('IntervalMessagesData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                                <?php if ($_smarty_tpl->getVariable('key')->value!=='總計'){?>
                                                                    <?php echo $_smarty_tpl->getVariable('item')->value['reply'];?>
,
                                                                <?php }?>
                                                            <?php }} ?>,
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
                    <?php }else{ ?>
                        $('#MessagesChart').hide();
                    <?php }?>
                });
            </script>
            <?php echo $_smarty_tpl->getVariable('js')->value;?>

            <?php echo $_smarty_tpl->getVariable('xajax_js')->value;?>

        </div>
    </body>
</html>