<?php /* Smarty version Smarty3-b7, created on 2020-10-14 17:58:02
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/view/System/PermissionDenied.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12570526305f86cbaa4ad6b8-90706335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6bd961005dc3e4ebaea77e3c2dee0740677b6be' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/view/System/PermissionDenied.tpl',
      1 => 1602669481,
    ),
  ),
  'nocache_hash' => '12570526305f86cbaa4ad6b8-90706335',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.cat.php';
?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->getVariable('ProjectName')->value;?>
</title>
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'backend_head.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </head>
    <body class="hold-transition login-page">
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'alertArea.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        <div class="error-page">
            <h2 class="headline text-red">
                500
            </h2>

            <div class="error-content">
                <h3>
                    <i class="fa fa-warning text-red"></i>
                    後台權限不足
                </h3>
            </div>
        </div>
        <?php echo $_smarty_tpl->getVariable('js')->value;?>

        <?php echo $_smarty_tpl->getVariable('xajax_js')->value;?>

    </body>
</html>