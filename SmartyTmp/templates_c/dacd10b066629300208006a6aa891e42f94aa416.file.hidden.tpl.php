<?php /* Smarty version Smarty3-b7, created on 2020-10-13 15:03:50
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/hidden.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4269794855f8551563b0334-41999181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dacd10b066629300208006a6aa891e42f94aa416' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/hidden.tpl',
      1 => 1601485160,
    ),
  ),
  'nocache_hash' => '4269794855f8551563b0334-41999181',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<input id="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" name="fields<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
[<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]" type="<?php echo $_smarty_tpl->getVariable('item')->value['type'];?>
" value="<?php echo $_smarty_tpl->getVariable('item')->value['value'];?>
" />