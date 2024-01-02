<?php /* Smarty version Smarty3-b7, created on 2020-09-29 18:23:32
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view//type/select.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20527980175f730b244a4f77-82290193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61e03998ab8803b07641be7453543030f76375d9' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view//type/select.tpl',
      1 => 1601374793,
    ),
  ),
  'nocache_hash' => '20527980175f730b244a4f77-82290193',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>*<?php }?>
<label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
</label>
<select name="fields[subject][<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]" class="form-control select2" style="width: 100%;">
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