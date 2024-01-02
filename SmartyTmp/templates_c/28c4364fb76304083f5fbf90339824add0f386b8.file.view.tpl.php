<?php /* Smarty version Smarty3-b7, created on 2022-08-16 09:57:12
         compiled from "/home1/bot.gadclubs.com/library/modules/_public/view/type/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168820242762faf978b50040-73927073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28c4364fb76304083f5fbf90339824add0f386b8' => 
    array (
      0 => '/home1/bot.gadclubs.com/library/modules/_public/view/type/view.tpl',
      1 => 1614744906,
    ),
  ),
  'nocache_hash' => '168820242762faf978b50040-73927073',
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