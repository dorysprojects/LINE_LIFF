<?php /* Smarty version Smarty3-b7, created on 2022-10-21 11:25:09
         compiled from "/home1/bot.lineapie.tw/library/modules/backend/view/System/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118230761863521115ca3379-43102050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a80d0718ab3374d518129dbf7917e9ee69a9085' => 
    array (
      0 => '/home1/bot.lineapie.tw/library/modules/backend/view/System/login.tpl',
      1 => 1602720043,
    ),
  ),
  'nocache_hash' => '118230761863521115ca3379-43102050',
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
        <div class="login-box">
            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'alertArea.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <div class="login-logo">
                <b>後台</b>登入
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">輸入您的帳號密碼</p>
                <div class="form-group has-feedback">
                    <input id="FormAccount" type="text" class="form-control" placeholder="帳號">
                    <i class="fa fa-user form-control-feedback"></i>
                    <span class="hide glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="FormPassword" type="password" class="form-control" placeholder="密碼">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <div class="btn btn-primary btn-block btn-flat" onclick="xajax_login($('#FormAccount').val(), $('#FormPassword').val());">登入</div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $_smarty_tpl->getVariable('js')->value;?>

        <?php echo $_smarty_tpl->getVariable('xajax_js')->value;?>

    </body>
</html>