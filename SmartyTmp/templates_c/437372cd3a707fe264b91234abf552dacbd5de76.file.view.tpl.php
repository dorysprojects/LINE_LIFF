<?php /* Smarty version Smarty3-b7, created on 2022-01-05 11:45:03
         compiled from "/home1/bot.gadclubs.com//library/modules/_public/view/type/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182860341561d5143fc2b773-43909790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '437372cd3a707fe264b91234abf552dacbd5de76' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/_public/view/type/view.tpl',
      1 => 1614744906,
    ),
  ),
  'nocache_hash' => '182860341561d5143fc2b773-43909790',
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