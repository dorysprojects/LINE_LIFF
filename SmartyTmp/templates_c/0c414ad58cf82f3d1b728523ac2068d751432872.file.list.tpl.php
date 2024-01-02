<?php /* Smarty version Smarty3-b7, created on 2021-02-08 17:07:52
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11167478616020ff686600f1-79548493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c414ad58cf82f3d1b728523ac2068d751432872' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/list.tpl',
      1 => 1612775262,
    ),
  ),
  'nocache_hash' => '11167478616020ff686600f1-79548493',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['rowitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['rowkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rowitem']->key => $_smarty_tpl->tpl_vars['rowitem']->value){
 $_smarty_tpl->tpl_vars['rowkey']->value = $_smarty_tpl->tpl_vars['rowitem']->key;
?>
    <div class="col-md-12">
        <div class="box box-success secondbox">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $_smarty_tpl->getVariable('rowitem')->value['propertyA'];?>
 (<?php echo $_smarty_tpl->getVariable('rowitem')->value['create_at'];?>
)</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subcolumns')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <th><?php echo $_smarty_tpl->getVariable('item')->value;?>
</th>
                            <?php }} ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars['columnitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['columnkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rowitem')->value['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['columnitem']->key => $_smarty_tpl->tpl_vars['columnitem']->value){
 $_smarty_tpl->tpl_vars['columnkey']->value = $_smarty_tpl->tpl_vars['columnitem']->key;
?>
                            <tr>
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columnitem')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                    <td><?php echo $_smarty_tpl->getVariable('item')->value;?>
</td>
                                <?php }} ?>
                            </tr>
                        <?php }} ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subcolumns')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <th><?php echo $_smarty_tpl->getVariable('item')->value;?>
</th>
                            <?php }} ?>
                        </tr>
                    </tfoot>
                </table>
                <?php if ($_smarty_tpl->getVariable('rowitem')->value['bottom']){?>
                    <?php echo $_smarty_tpl->getVariable('rowitem')->value['bottom'];?>

                <?php }?>
            </div>
        </div>
    </div>
<?php }} ?>