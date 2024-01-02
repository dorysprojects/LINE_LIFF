<?php /* Smarty version Smarty3-b7, created on 2021-07-30 13:57:57
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/LotteryHistory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:869318637610394e5d53967-74626557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4d47b0c1545df9c1c1d8f9f2853689387476b41' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/LotteryHistory.tpl',
      1 => 1627623132,
    ),
  ),
  'nocache_hash' => '869318637610394e5d53967-74626557',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="想到什麼，就做什麼">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <title>樂透分析</title>
        <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/AdminLTE.min.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">
          <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/font-awesome.min.css" rel="stylesheet">
        
        
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/jquery-3.3.1.min.js"></script>
        <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.css">
        
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.js"></script>
        <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/vconsole.min.js"></script>
        <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/dist/adminlte.min.js"></script>
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
                            <?php $_smarty_tpl->assign("LastCtn",count($_smarty_tpl->getVariable('YearList')->value)-1,null,null);?>
                            <div class="col-md-3">
                                <div class="box box-solid collapsed-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">年份：(<?php if ($_smarty_tpl->getVariable('GameYear')->value=='total'){?><?php echo $_smarty_tpl->getVariable('YearList')->value[0];?>
~<?php echo $_smarty_tpl->getVariable('YearList')->value[$_smarty_tpl->getVariable('LastCtn')->value];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('GameYear')->value;?>
<?php }?>)</h3>
                                        <div class="box-tools">
                                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="GameYear <?php if ($_smarty_tpl->getVariable('GameYear')->value=='total'){?>active<?php }?>" data="total"><a href="#">全部<span class="pull-right"><i class="fa fa-angle-right"></i></span></a></li>
                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('YearList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                <li class="GameYear <?php if ($_smarty_tpl->getVariable('GameYear')->value==$_smarty_tpl->getVariable('item')->value){?>active<?php }?>" data="<?php echo $_smarty_tpl->getVariable('item')->value;?>
"><a href="#"><?php echo $_smarty_tpl->getVariable('item')->value;?>
<span class="pull-right"><i class="fa fa-angle-right"></i></span></a></li>
                                            <?php }} ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="box box-solid collapsed-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">遊戲：(<?php echo $_smarty_tpl->getVariable('GameName')->value;?>
)</h3>
                                        <div class="box-tools">
                                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">
                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('LotteryTotalList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                <li class="GameName <?php if ($_smarty_tpl->getVariable('GameName')->value==$_smarty_tpl->getVariable('key')->value){?>active<?php }?>" data="<?php echo $_smarty_tpl->getVariable('key')->value;?>
"><a href="#"><?php echo $_smarty_tpl->getVariable('key')->value;?>
<span class="pull-right"><i class="fa fa-angle-right"></i></span></a></li>
                                            <?php }} ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="box box-solid collapsed-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">獎號：(<?php if (!$_smarty_tpl->getVariable('GameNum')->value){?>全部<?php }else{ ?><?php if ($_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('GameNum')->value][$_smarty_tpl->getVariable('GameName')->value]){?><?php echo $_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('GameNum')->value][$_smarty_tpl->getVariable('GameName')->value];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('ColumnTranslateList')->value[$_smarty_tpl->getVariable('GameNum')->value];?>
<?php }?><?php }?>)</h3>
                                        <div class="box-tools">
                                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="GameNum <?php if (!$_smarty_tpl->getVariable('GameNum')->value){?>active<?php }?>" data=""><a href="#">全部<span class="pull-right"><i class="fa fa-angle-right"></i></span></a></li>
                                            <?php  $_smarty_tpl->tpl_vars['columnitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['columnkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('LotteryTotalList')->value[$_smarty_tpl->getVariable('GameName')->value]['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['columnitem']->key => $_smarty_tpl->tpl_vars['columnitem']->value){
 $_smarty_tpl->tpl_vars['columnkey']->value = $_smarty_tpl->tpl_vars['columnitem']->key;
?>
                                                <?php if (!in_array($_smarty_tpl->getVariable('columnitem')->value,$_smarty_tpl->getVariable('NotBallColumn')->value)){?>
                                                    <li class="GameNum <?php if ($_smarty_tpl->getVariable('GameNum')->value==$_smarty_tpl->getVariable('columnitem')->value){?>active<?php }?>" data="<?php echo $_smarty_tpl->getVariable('columnitem')->value;?>
">
                                                        <a href="#">
                                                            <?php if ($_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('columnitem')->value][$_smarty_tpl->getVariable('GameName')->value]){?><?php echo $_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('columnitem')->value][$_smarty_tpl->getVariable('GameName')->value];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('ColumnTranslateList')->value[$_smarty_tpl->getVariable('columnitem')->value];?>
<?php }?>
                                                            <span class="pull-right">
                                                                <i class="fa fa-angle-right"></i>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php }?>
                                            <?php }} ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <?php if ($_smarty_tpl->getVariable('ProbabilityList')->value['num'][0]){?>
                                <div class="col-md-9">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-blue-gradient"><i class="fa fa-gamepad"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">總場數</span>
                                            <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('ProbabilityList')->value['num'][0]['totalgameCtn'];?>
</span>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
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
                                                <?php  $_smarty_tpl->tpl_vars['columnitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['columnkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('LotteryTotalList')->value[$_smarty_tpl->getVariable('GameName')->value]['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['columnitem']->key => $_smarty_tpl->tpl_vars['columnitem']->value){
 $_smarty_tpl->tpl_vars['columnkey']->value = $_smarty_tpl->tpl_vars['columnitem']->key;
?>
                                                    <?php if (!in_array($_smarty_tpl->getVariable('columnitem')->value,$_smarty_tpl->getVariable('NotBallColumn')->value)){?>
                                                        <input type="number" class="form-control CheckNum" data-key="<?php echo $_smarty_tpl->getVariable('columnitem')->value;?>
" min="1" max="49" placeholder="<?php if ($_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('columnitem')->value][$_smarty_tpl->getVariable('GameName')->value]){?><?php echo $_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('columnitem')->value][$_smarty_tpl->getVariable('GameName')->value];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('ColumnTranslateList')->value[$_smarty_tpl->getVariable('columnitem')->value];?>
<?php }?>">
                                                    <?php }?>
                                                <?php }} ?>
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
                                                            <?php  $_smarty_tpl->tpl_vars['columnitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['columnkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('LotteryTotalList')->value[$_smarty_tpl->getVariable('GameName')->value]['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['columnitem']->key => $_smarty_tpl->tpl_vars['columnitem']->value){
 $_smarty_tpl->tpl_vars['columnkey']->value = $_smarty_tpl->tpl_vars['columnitem']->key;
?>
                                                                <?php if (!in_array($_smarty_tpl->getVariable('columnitem')->value,$_smarty_tpl->getVariable('NotBallColumn')->value)){?>
                                                                    <th>
                                                                        <?php if ($_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('columnitem')->value][$_smarty_tpl->getVariable('GameName')->value]){?>
                                                                            <?php echo $_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('columnitem')->value][$_smarty_tpl->getVariable('GameName')->value];?>

                                                                        <?php }else{ ?>
                                                                            <?php echo $_smarty_tpl->getVariable('ColumnTranslateList')->value[$_smarty_tpl->getVariable('columnitem')->value];?>

                                                                        <?php }?>
                                                                    </th>
                                                                <?php }?>
                                                            <?php }} ?>
                                                            <th>平均</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="BallsContainer">
                                                        
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <?php  $_smarty_tpl->tpl_vars['columnitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['columnkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('LotteryTotalList')->value[$_smarty_tpl->getVariable('GameName')->value]['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['columnitem']->key => $_smarty_tpl->tpl_vars['columnitem']->value){
 $_smarty_tpl->tpl_vars['columnkey']->value = $_smarty_tpl->tpl_vars['columnitem']->key;
?>
                                                                <?php if (!in_array($_smarty_tpl->getVariable('columnitem')->value,$_smarty_tpl->getVariable('NotBallColumn')->value)){?>
                                                                    <th>
                                                                        <?php if ($_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('columnitem')->value][$_smarty_tpl->getVariable('GameName')->value]){?>
                                                                            <?php echo $_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('columnitem')->value][$_smarty_tpl->getVariable('GameName')->value];?>

                                                                        <?php }else{ ?>
                                                                            <?php echo $_smarty_tpl->getVariable('ColumnTranslateList')->value[$_smarty_tpl->getVariable('columnitem')->value];?>

                                                                        <?php }?>
                                                                    </th>
                                                                <?php }?>
                                                            <?php }} ?>
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
                                    <?php if ($_smarty_tpl->getVariable('ProbabilityList')->value['num'][0]){?>
                                        <div class="col-md-<?php if ($_smarty_tpl->getVariable('ProbabilityList')->value['numS'][0]){?>6<?php }else{ ?>12<?php }?>">
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
                                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('ProbabilityList')->value['num'][0]['noteCtn'];?>
</span>
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
                                                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ProbabilityList')->value['num']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                                        <tr>
                                                                            <th><?php echo $_smarty_tpl->getVariable('key')->value+1;?>
</th>
                                                                            <th><div class="BallColor"><?php echo $_smarty_tpl->getVariable('item')->value['key'];?>
</div></th>
                                                                            <th><?php echo $_smarty_tpl->getVariable('item')->value['ctn'];?>
</th>
                                                                            <th><?php echo $_smarty_tpl->getVariable('item')->value['game'];?>
%</th>
                                                                        </tr>
                                                                    <?php }} ?>
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
                                    <?php }?>
                                    
                                    <?php if ($_smarty_tpl->getVariable('ProbabilityList')->value['numS'][0]){?>
                                        <div class="col-md-6">
                                            <div class="box box-success collapsed-box">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"><?php echo $_smarty_tpl->getVariable('LotteryColumnList')->value['numS'][$_smarty_tpl->getVariable('GameName')->value];?>
</h3>
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
                                                                <span class="info-box-number"><?php echo $_smarty_tpl->getVariable('ProbabilityList')->value['numS'][0]['noteCtn'];?>
</span>
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
                                                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ProbabilityList')->value['numS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                                        <tr>
                                                                            <th><?php echo $_smarty_tpl->getVariable('key')->value+1;?>
</th>
                                                                            <th><div class="BallColor SuperBall"><?php echo $_smarty_tpl->getVariable('item')->value['key'];?>
</div></th>
                                                                            <th><?php echo $_smarty_tpl->getVariable('item')->value['ctn'];?>
</th>
                                                                            <th><?php echo $_smarty_tpl->getVariable('item')->value['game'];?>
%</th>
                                                                        </tr>
                                                                    <?php }} ?>
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
                                    <?php }?>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?php if ($_smarty_tpl->getVariable('GameYear')->value=='total'){?><?php echo $_smarty_tpl->getVariable('YearList')->value[0];?>
~<?php echo $_smarty_tpl->getVariable('YearList')->value[$_smarty_tpl->getVariable('LastCtn')->value];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('GameYear')->value;?>
<?php }?>年圖表</h3>
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
                                        <h3 class="box-title"><?php if ($_smarty_tpl->getVariable('GameYear')->value=='total'){?><?php echo $_smarty_tpl->getVariable('YearList')->value[0];?>
~<?php echo $_smarty_tpl->getVariable('YearList')->value[$_smarty_tpl->getVariable('LastCtn')->value];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('GameYear')->value;?>
<?php }?>年記錄</h3>
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
                                                            <?php  $_smarty_tpl->tpl_vars['columnitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['columnkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('LotteryTotalList')->value[$_smarty_tpl->getVariable('GameName')->value]['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['columnitem']->key => $_smarty_tpl->tpl_vars['columnitem']->value){
 $_smarty_tpl->tpl_vars['columnkey']->value = $_smarty_tpl->tpl_vars['columnitem']->key;
?>
                                                                <th>
                                                                    <?php if ($_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('columnitem')->value][$_smarty_tpl->getVariable('GameName')->value]){?>
                                                                        <?php echo $_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('columnitem')->value][$_smarty_tpl->getVariable('GameName')->value];?>

                                                                    <?php }else{ ?>
                                                                        <?php echo $_smarty_tpl->getVariable('ColumnTranslateList')->value[$_smarty_tpl->getVariable('columnitem')->value];?>

                                                                    <?php }?>
                                                                </th>
                                                            <?php }} ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  $_smarty_tpl->tpl_vars['Years'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('RowsData')->value[$_smarty_tpl->getVariable('GameName')->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['Years']->key => $_smarty_tpl->tpl_vars['Years']->value){
 $_smarty_tpl->tpl_vars['year']->value = $_smarty_tpl->tpl_vars['Years']->key;
?>
                                                            <?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Years')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subject']->key => $_smarty_tpl->tpl_vars['subject']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['subject']->key;
?>
                                                                <?php if ($_smarty_tpl->getVariable('GameYear')->value=='total'||$_smarty_tpl->getVariable('year')->value==$_smarty_tpl->getVariable('GameYear')->value){?>
                                                                    <tr>
                                                                        <?php  $_smarty_tpl->tpl_vars['columnitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['columnkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('LotteryTotalList')->value[$_smarty_tpl->getVariable('GameName')->value]['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['columnitem']->key => $_smarty_tpl->tpl_vars['columnitem']->value){
 $_smarty_tpl->tpl_vars['columnkey']->value = $_smarty_tpl->tpl_vars['columnitem']->key;
?>
                                                                            <th>
                                                                                <?php if (in_array($_smarty_tpl->getVariable('columnitem')->value,$_smarty_tpl->getVariable('NotBallColumn')->value)){?>
                                                                                    <?php echo $_smarty_tpl->getVariable('subject')->value[$_smarty_tpl->getVariable('columnitem')->value];?>

                                                                                <?php }elseif($_smarty_tpl->getVariable('columnitem')->value=='numS'){?>
                                                                                    <div class="BallColor SuperBall"><?php echo $_smarty_tpl->getVariable('subject')->value[$_smarty_tpl->getVariable('columnitem')->value];?>
</div>
                                                                                <?php }else{ ?>
                                                                                    <div class="BallColor"><?php echo $_smarty_tpl->getVariable('subject')->value[$_smarty_tpl->getVariable('columnitem')->value];?>
</div>
                                                                                <?php }?>
                                                                            </th>
                                                                        <?php }} ?>
                                                                    </tr>
                                                                <?php }?>
                                                            <?php }} ?>
                                                        <?php }} ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <?php  $_smarty_tpl->tpl_vars['columnitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['columnkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('LotteryTotalList')->value[$_smarty_tpl->getVariable('GameName')->value]['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['columnitem']->key => $_smarty_tpl->tpl_vars['columnitem']->value){
 $_smarty_tpl->tpl_vars['columnkey']->value = $_smarty_tpl->tpl_vars['columnitem']->key;
?>
                                                                <th>
                                                                    <?php if ($_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('columnitem')->value][$_smarty_tpl->getVariable('GameName')->value]){?>
                                                                        <?php echo $_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('columnitem')->value][$_smarty_tpl->getVariable('GameName')->value];?>

                                                                    <?php }else{ ?>
                                                                        <?php echo $_smarty_tpl->getVariable('ColumnTranslateList')->value[$_smarty_tpl->getVariable('columnitem')->value];?>

                                                                    <?php }?>
                                                                </th>
                                                            <?php }} ?>
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
            var GameColumn = <?php echo json_encode($_smarty_tpl->getVariable('LotteryTotalList')->value[$_smarty_tpl->getVariable('GameName')->value]['column']);?>
;
            var NotBallColumn = <?php echo json_encode($_smarty_tpl->getVariable('NotBallColumn')->value);?>
;
            var RowsGameData = <?php echo json_encode($_smarty_tpl->getVariable('RowsData')->value[$_smarty_tpl->getVariable('GameName')->value]);?>
;
            $(function () {
                for (const [year, Years] of Object.entries(RowsGameData)) {
                    for (const [key, subject] of Object.entries(Years)) {
                        if('<?php echo $_smarty_tpl->getVariable('GameYear')->value;?>
'=='total' || year=='<?php echo $_smarty_tpl->getVariable('GameYear')->value;?>
'){
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
        
        <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/Chart.js"></script>
        <script>
            $(function () {
                if($('#FriendsChart')[0]){
                    var FriendsChartCanvas = $('#FriendsChart').get(0).getContext('2d');
                    var FriendsChart = new Chart(FriendsChartCanvas);
                    var FriendsChartData = {
                        labels  : [
                            <?php  $_smarty_tpl->tpl_vars['Years'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('RowsData')->value[$_smarty_tpl->getVariable('GameName')->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['Years']->key => $_smarty_tpl->tpl_vars['Years']->value){
 $_smarty_tpl->tpl_vars['year']->value = $_smarty_tpl->tpl_vars['Years']->key;
?>
                                <?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Years')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subject']->key => $_smarty_tpl->tpl_vars['subject']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['subject']->key;
?>
                                    <?php if ($_smarty_tpl->getVariable('GameYear')->value=='total'||$_smarty_tpl->getVariable('year')->value==$_smarty_tpl->getVariable('GameYear')->value){?>
                                        '<?php echo $_smarty_tpl->getVariable('subject')->value['date'];?>
',
                                    <?php }?>
                                <?php }} ?>
                            <?php }} ?>
                        ],
                        datasets: [
                            <?php $_smarty_tpl->assign('Ctn',0,null,null);?>
                            <?php  $_smarty_tpl->tpl_vars['columnitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['columnkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('LotteryTotalList')->value[$_smarty_tpl->getVariable('GameName')->value]['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['columnitem']->key => $_smarty_tpl->tpl_vars['columnitem']->value){
 $_smarty_tpl->tpl_vars['columnkey']->value = $_smarty_tpl->tpl_vars['columnitem']->key;
?>
                                <?php if (!in_array($_smarty_tpl->getVariable('columnitem')->value,$_smarty_tpl->getVariable('NotBallColumn')->value)&&(!$_smarty_tpl->getVariable('GameNum')->value||$_smarty_tpl->getVariable('columnitem')->value==$_smarty_tpl->getVariable('GameNum')->value)){?>
                                    {
                                        label               : '<?php if ($_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('columnitem')->value][$_smarty_tpl->getVariable('GameName')->value]){?><?php echo $_smarty_tpl->getVariable('LotteryColumnList')->value[$_smarty_tpl->getVariable('columnitem')->value][$_smarty_tpl->getVariable('GameName')->value];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('ColumnTranslateList')->value[$_smarty_tpl->getVariable('columnitem')->value];?>
<?php }?>',
                                        fillColor           : '<?php echo $_smarty_tpl->getVariable('ColorList')->value[$_smarty_tpl->getVariable('Ctn')->value];?>
',
                                        strokeColor         : '<?php echo $_smarty_tpl->getVariable('ColorList')->value[$_smarty_tpl->getVariable('Ctn')->value];?>
',
                                        pointColor          : '<?php echo $_smarty_tpl->getVariable('ColorList')->value[$_smarty_tpl->getVariable('Ctn')->value];?>
',
                                        pointStrokeColor    : 'rgba(60,141,188,1)',
                                        pointHighlightFill  : '#fff',
                                        pointHighlightStroke: 'rgba(60,141,188,1)',
                                        data                : [
                                                                <?php  $_smarty_tpl->tpl_vars['Years'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('RowsData')->value[$_smarty_tpl->getVariable('GameName')->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['Years']->key => $_smarty_tpl->tpl_vars['Years']->value){
 $_smarty_tpl->tpl_vars['year']->value = $_smarty_tpl->tpl_vars['Years']->key;
?>
                                                                    <?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Years')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subject']->key => $_smarty_tpl->tpl_vars['subject']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['subject']->key;
?>
                                                                        <?php if ($_smarty_tpl->getVariable('GameYear')->value=='total'||$_smarty_tpl->getVariable('year')->value==$_smarty_tpl->getVariable('GameYear')->value){?>
                                                                            <?php echo $_smarty_tpl->getVariable('subject')->value[$_smarty_tpl->getVariable('columnitem')->value];?>
,
                                                                        <?php }?>
                                                                    <?php }} ?>
                                                                <?php }} ?>
                                                              ]
                                    },
                                    <?php $_smarty_tpl->assign('Ctn',$_smarty_tpl->getVariable('Ctn')->value+1,null,null);?>
                                <?php }?>
                            <?php }} ?>
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
        
        <?php echo $_smarty_tpl->getVariable('xajax_js')->value;?>

    </body>
</html>