<?php /* Smarty version Smarty3-b7, created on 2022-10-21 11:27:26
         compiled from "/home1/bot.lineapie.tw/library/modules/_public/view/type/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3220315016352119ecd4489-05938169%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d057f9c3221057cab4548fd57ac955f08a62902' => 
    array (
      0 => '/home1/bot.lineapie.tw/library/modules/_public/view/type/view.tpl',
      1 => 1614744906,
    ),
  ),
  'nocache_hash' => '3220315016352119ecd4489-05938169',
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