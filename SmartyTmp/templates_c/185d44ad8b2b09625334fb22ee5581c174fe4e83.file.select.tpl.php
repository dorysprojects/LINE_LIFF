<?php /* Smarty version Smarty3-b7, created on 2022-12-27 11:43:13
         compiled from "/home1/bot.lineapie.tw/library/modules/_public/view/type/select.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204626019763aa69d1ad8bc8-41425437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '185d44ad8b2b09625334fb22ee5581c174fe4e83' => 
    array (
      0 => '/home1/bot.lineapie.tw/library/modules/_public/view/type/select.tpl',
      1 => 1616486338,
    ),
  ),
  'nocache_hash' => '204626019763aa69d1ad8bc8-41425437',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('item')->value['nolabel']!='on'){?>
    <?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>*<?php }?>
    <label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
</label>
<?php }?>
<select name="fields<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
[<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]" <?php if ($_smarty_tpl->getVariable('item')->value['disabled']){?>disabled<?php }?> class="form-control select2 <?php echo $_smarty_tpl->getVariable('item')->value['class'];?>
" style="width: 100%;">
    <option value="">請選擇</option>
    <?php  $_smarty_tpl->tpl_vars['optionitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['optionkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['optionitem']->key => $_smarty_tpl->tpl_vars['optionitem']->value){
 $_smarty_tpl->tpl_vars['optionkey']->value = $_smarty_tpl->tpl_vars['optionitem']->key;
?>
        <option value="<?php echo $_smarty_tpl->getVariable('optionkey')->value;?>
" <?php if ($_smarty_tpl->getVariable('item')->value['value']==$_smarty_tpl->getVariable('optionkey')->value){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('optionitem')->value;?>
</option>
    <?php }} ?>
</select>