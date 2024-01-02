<?php /* Smarty version Smarty3-b7, created on 2022-08-17 11:42:56
         compiled from "/home1/bot.gadclubs.com/library/modules/_public/view/type/hidden.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210797063362fc63c0ab1c60-82606393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1021b99d85a04b9d99e4855a3b21e36828eeb251' => 
    array (
      0 => '/home1/bot.gadclubs.com/library/modules/_public/view/type/hidden.tpl',
      1 => 1616486315,
    ),
  ),
  'nocache_hash' => '210797063362fc63c0ab1c60-82606393',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<input id="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" name="fields<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
[<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]" type="<?php echo $_smarty_tpl->getVariable('item')->value['type'];?>
" class="<?php echo $_smarty_tpl->getVariable('item')->value['class'];?>
" value="<?php echo $_smarty_tpl->getVariable('item')->value['value'];?>
" />