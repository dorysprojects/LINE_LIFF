<?php /* Smarty version Smarty3-b7, created on 2020-09-29 18:16:41
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view//type/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9522120405f730989497647-02899603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52280bbe2857207dd032532c63b924797362be1f' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view//type/view.tpl',
      1 => 1601369083,
    ),
  ),
  'nocache_hash' => '9522120405f730989497647-02899603',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>*<?php }?>
<label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
</label><br>
<span><?php echo $_smarty_tpl->getVariable('item')->value['value'];?>
</span>