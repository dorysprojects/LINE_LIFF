<?php /* Smarty version Smarty3-b7, created on 2022-11-07 16:06:40
         compiled from "/home1/bot.lineapie.tw/library/modules/backend/view/System/PageNotFound.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16297807016368bc90499d62-41828139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27d9f95d03fe67a69ec57645f966e12b5b1a9ee4' => 
    array (
      0 => '/home1/bot.lineapie.tw/library/modules/backend/view/System/PageNotFound.tpl',
      1 => 1602669631,
    ),
  ),
  'nocache_hash' => '16297807016368bc90499d62-41828139',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/bot.lineapie.tw/library/plugin/smarty/class/plugins/modifier.cat.php';
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
            <h2 class="headline text-yellow">
                404
            </h2>

            <div class="error-content">
                <h3>
                    <i class="fa fa-warning text-yellow"></i>
                    頁面不存在
                </h3>
            </div>
        </div>
        <?php echo $_smarty_tpl->getVariable('js')->value;?>

        <?php echo $_smarty_tpl->getVariable('xajax_js')->value;?>

    </body>
</html>