<?php /* Smarty version Smarty3-b7, created on 2020-09-29 10:12:07
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/view/liff.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13113443775f7297f70ecb69-72624067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a970075118e6d9270e3255ca7c7bc0ce6c0354c' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/view/liff.tpl',
      1 => 1601345489,
    ),
  ),
  'nocache_hash' => '13113443775f7297f70ecb69-72624067',
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
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">
                                        
                                    </h3>
                                    <div class="box-tools pull-right">
                                        <a class="btn btn-info btn-sm" href="?BackEnd/liffadd">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a class="btn btn-success btn-sm" id="ListPageSaveButton">
                                            <i class="fa fa-save"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" id="template_btn_deleteall">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                                title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                            <i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <form id="template_form">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th><input class="checkbox template_clickbox_clickall" type="checkbox"></th>
                                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columns')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                        <th><?php echo $_smarty_tpl->getVariable('item')->value;?>
</th>
                                                    <?php }} ?>
                                                    <th>管理</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  $_smarty_tpl->tpl_vars['rowitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['rowkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rowitem']->key => $_smarty_tpl->tpl_vars['rowitem']->value){
 $_smarty_tpl->tpl_vars['rowkey']->value = $_smarty_tpl->tpl_vars['rowitem']->key;
?>
                                                    <tr>
                                                        <td><input name="select[<?php echo $_smarty_tpl->getVariable('rowitem')->value['id'];?>
]" class="template_clickbox_item" type="checkbox"/></td>
                                                        <?php  $_smarty_tpl->tpl_vars['columnsitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['columnkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columns')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['columnsitem']->key => $_smarty_tpl->tpl_vars['columnsitem']->value){
 $_smarty_tpl->tpl_vars['columnkey']->value = $_smarty_tpl->tpl_vars['columnsitem']->key;
?>
                                                            <th><?php echo $_smarty_tpl->getVariable('rowitem')->value[$_smarty_tpl->getVariable('columnkey')->value];?>
</th>
                                                        <?php }} ?>
                                                        <td>
                                                            <a href="?BackEnd/liffedit/id/<?php echo $_smarty_tpl->getVariable('rowitem')->value['id'];?>
" class="btn btn-info btn-sm">
                                                                <span class="fa fa-edit"></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php }} ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columns')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                        <th><?php echo $_smarty_tpl->getVariable('item')->value;?>
</th>
                                                    <?php }} ?>
                                                    <th>管理</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </form>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
            </div>
            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'backend_footer.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <script>
                $(function(){
                    AlertMsg('success', 'title', 'text');
                });
            </script>
        </div>
    </body>
</html>