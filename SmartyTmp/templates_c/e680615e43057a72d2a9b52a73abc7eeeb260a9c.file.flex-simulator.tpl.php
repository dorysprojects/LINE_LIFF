<?php /* Smarty version Smarty3-b7, created on 2022-12-02 14:37:08
         compiled from "/home1/bot.lineapie.tw/library/modules/frontend/view/flex-simulator.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206055444763899d14d048b2-35821131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e680615e43057a72d2a9b52a73abc7eeeb260a9c' => 
    array (
      0 => '/home1/bot.lineapie.tw/library/modules/frontend/view/flex-simulator.tpl',
      1 => 1660289490,
    ),
  ),
  'nocache_hash' => '206055444763899d14d048b2-35821131',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home1/bot.lineapie.tw/library/plugin/smarty/class/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>FLEX訊息模擬器</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="shortcut icon" href="https://developers.line.biz//flex-simulator/favicon.ico">
        
        <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/font-awesome.min.css" rel="stylesheet">

        <?php if (1){?>
            <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/flex/main.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">
            <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/flex/vendors.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">
        <?php }else{ ?>
            <link rel="stylesheet" type="text/css" href="https://developers.line.biz/flex-simulator/css/vendors-3d8ec47227cb7690303f.css">
            <link rel="stylesheet" type="text/css" href="https://developers.line.biz/flex-simulator/css/main-3d8ec47227cb7690303f.css">
        <?php }?>
        <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/flex/custom.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">

        <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/jquery-3.3.1.min.js"></script>
        <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/bootstrap.min.js"></script>
    </head>

    <body>
        <div id="app"></div>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/flex/vendors.js?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/flex/main.js?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
"></script>
    </body>
</html>