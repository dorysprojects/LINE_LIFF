<?php /* Smarty version Smarty3-b7, created on 2020-11-23 15:26:28
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/flex-simulator.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4768450875fbb6424e18891-79838319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65bf832483e1b69340fe49eb43dcff5cd501dda9' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/flex-simulator.tpl',
      1 => 1606113337,
    ),
  ),
  'nocache_hash' => '4768450875fbb6424e18891-79838319',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>FLEX訊息模擬器</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="shortcut icon" href="https://developers.line.biz//flex-simulator/favicon.ico">
        
        <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/flex/vendors.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/flex/main.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">
        
        <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/jquery-3.3.1.min.js"></script>
        <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/bootstrap.min.js"></script>
    </head>

    <body>
        <div id="app">
            
        </div>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/flex/vendors.js?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/flex/main.js?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
"></script>
    </body>
</html>