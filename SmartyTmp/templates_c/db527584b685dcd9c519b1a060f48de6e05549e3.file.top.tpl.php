<?php /* Smarty version Smarty3-b7, created on 2022-08-17 23:38:58
         compiled from "/home1/bot.gadclubs.com/library/modules/_public/view/top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38242957262fd0b92f2d7e4-56774920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db527584b685dcd9c519b1a060f48de6e05549e3' => 
    array (
      0 => '/home1/bot.gadclubs.com/library/modules/_public/view/top.tpl',
      1 => 1601026133,
    ),
  ),
  'nocache_hash' => '38242957262fd0b92f2d7e4-56774920',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="tips" class="tips">
    <?php echo $_smarty_tpl->getVariable('Html_nail')->value;?>

    <span>小提示:</span>
    <div id="tips_area" class="tips_area">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tips')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <div id="tips_<?php echo $_smarty_tpl->getVariable('key')->value+1;?>
" class="change_tips"><?php echo $_smarty_tpl->getVariable('item')->value;?>
</div>
        <?php }} ?>
    </div>
    <?php echo $_smarty_tpl->getVariable('Html_arrow')->value;?>

</div>