<?php /* Smarty version Smarty3-b7, created on 2020-11-12 15:47:06
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/Simulator.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14825700025face87a3dd4e2-51361680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6301dd75132c9643f1bda43298a9e4d5db292b68' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/Simulator.tpl',
      1 => 1605167226,
    ),
  ),
  'nocache_hash' => '14825700025face87a3dd4e2-51361680',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.cat.php';
if (!is_callable('smarty_modifier_date_format')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>Simulator</title>
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'backend_head.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="shortcut icon" href="https://developers.line.biz//flex-simulator/favicon.ico">
        <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/flex/vendors.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/flex/main.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">
    </head>

    <body onselectstart="return false">
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