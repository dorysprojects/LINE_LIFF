<?php /* Smarty version Smarty3-b7, created on 2021-03-31 15:06:21
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:541525760641f6dec7290-68733485%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70a291001bcba610a2ef3e42dccb4952bb518a2a' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/view.tpl',
      1 => 1614744906,
    ),
  ),
  'nocache_hash' => '541525760641f6dec7290-68733485',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('item')->value['nolabel']!='on'){?>
    <?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>*<?php }?>
    <label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
</label><br>
<?php }?>
<span><?php echo $_smarty_tpl->getVariable('item')->value['value'];?>
</span>