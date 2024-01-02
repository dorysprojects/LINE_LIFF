<?php /* Smarty version Smarty3-b7, created on 2020-10-13 14:55:02
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/view/ChangeRichMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8795834925f854f4622f883-59704772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3851bb1a0dc843f0a9ccc06f86375e43f0e6cc49' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/view/ChangeRichMenu.tpl',
      1 => 1602572020,
    ),
  ),
  'nocache_hash' => '8795834925f854f4622f883-59704772',
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
                    <form id="DataForm" action="#" onsubmit="return false;">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                </h3>
                                <input type="button" class="btn btn-default <?php if ($_smarty_tpl->getVariable('noreturn')->value){?>hide<?php }?>" name="cancel" value="返回列表">
                                <div class="box-tools pull-right">
                                    <button id="SubmitDataForm" type="submit" class="btn btn-success btn- <?php if ($_smarty_tpl->getVariable('nosave')->value){?>hide<?php }?>"><span class="fa fa-save"></span></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columns')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                        <div class="form-group">
                                            <?php if (in_array($_smarty_tpl->getVariable('item')->value['name'],$_smarty_tpl->getVariable('SqlColumnList')->value)){?>
                                                <?php $_smarty_tpl->assign("_subject",'',null,null);?>
                                            <?php }else{ ?>
                                                <?php $_smarty_tpl->assign("_subject","[subject]",null,null);?>
                                            <?php }?>
                                            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat(smarty_modifier_cat(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'type/'),$_smarty_tpl->getVariable('item')->value['type']),'.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                                        </div>
                                    <?php }} ?>
                                    <?php if ($_smarty_tpl->getVariable('FormType')->value){?>
                                        <div class="form-group">
                                            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat(smarty_modifier_cat(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'type/'),$_smarty_tpl->getVariable('FormType')->value),'.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="box-footer">

                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'backend_footer.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <?php echo $_smarty_tpl->getVariable('js')->value;?>

        </div>
    </body>
</html>