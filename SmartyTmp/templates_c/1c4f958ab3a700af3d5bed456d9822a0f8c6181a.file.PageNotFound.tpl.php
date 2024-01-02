<?php /* Smarty version Smarty3-b7, created on 2022-08-12 14:01:10
         compiled from "/home1/bot.gadclubs.com/library/modules/backend/view/System/PageNotFound.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124130704762f5eca6cdb7d1-15256061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c4f958ab3a700af3d5bed456d9822a0f8c6181a' => 
    array (
      0 => '/home1/bot.gadclubs.com/library/modules/backend/view/System/PageNotFound.tpl',
      1 => 1602669631,
    ),
  ),
  'nocache_hash' => '124130704762f5eca6cdb7d1-15256061',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.cat.php';
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