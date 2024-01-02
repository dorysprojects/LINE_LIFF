<?php /* Smarty version Smarty3-b7, created on 2023-09-20 14:35:20
         compiled from "/home1/bot.lineapie.tw/library/modules/_public/view/top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:444894664650a92a8343ea9-57207253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94727c3cd3ccdc8ff111d12561448a3c4f2c87fa' => 
    array (
      0 => '/home1/bot.lineapie.tw/library/modules/_public/view/top.tpl',
      1 => 1695191719,
    ),
  ),
  'nocache_hash' => '444894664650a92a8343ea9-57207253',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('tips')->value){?>
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
<?php }?>