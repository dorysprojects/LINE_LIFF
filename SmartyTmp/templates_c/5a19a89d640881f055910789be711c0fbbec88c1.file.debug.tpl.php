<?php /* Smarty version Smarty3-b7, created on 2022-08-13 08:33:26
         compiled from "/home1/bot.gadclubs.com/library/modules/backend/view//debug.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83009525662f6f156a79449-24351147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a19a89d640881f055910789be711c0fbbec88c1' => 
    array (
      0 => '/home1/bot.gadclubs.com/library/modules/backend/view//debug.tpl',
      1 => 1611196790,
    ),
  ),
  'nocache_hash' => '83009525662f6f156a79449-24351147',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.cat.php';
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
                            <div class="col-md-6">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">開始日期</h3>
                                    </div>
                                    <div class="box-body">
                                        <input type="date" class="form-control" max="<?php echo $_smarty_tpl->getVariable('Today')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('date1')->value;?>
" onchange="xajax_Session('date1', $(this).val(), 1);">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">結束日期</h3>
                                    </div>
                                    <div class="box-body">
                                        <input type="date" class="form-control" max="<?php echo $_smarty_tpl->getVariable('Today')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('date2')->value;?>
" onchange="xajax_Session('date2', $(this).val(), 1);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <textarea style="padding: 20px;padding-bottom: 0px;width: -webkit-fill-available;height: -webkit-fill-available;" readonly><?php echo $_smarty_tpl->getVariable('error_log')->value;?>
</textarea>
                        </div>
                    </div>
                </section>
            </div>
            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'backend_footer.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>
        <?php echo $_smarty_tpl->getVariable('js')->value;?>

        <?php echo $_smarty_tpl->getVariable('xajax_js')->value;?>

    </body>
</html>