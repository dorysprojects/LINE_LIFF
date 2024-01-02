<?php /* Smarty version Smarty3-b7, created on 2020-10-14 14:33:36
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19709257845f869bc02236f2-83692959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '501ca3e2f23c246fc3c648c5ccdc42f3b0e3172d' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/password.tpl',
      1 => 1601485162,
    ),
  ),
  'nocache_hash' => '19709257845f869bc02236f2-83692959',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>*<?php }?>
<label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
</label>
<input  id="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" name="fields<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
[<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]" type="<?php echo $_smarty_tpl->getVariable('item')->value['type'];?>
" value="<?php echo $_smarty_tpl->getVariable('item')->value['value'];?>
" class="form-control" placeholder="請輸入<?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
" <?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>required<?php }?>  onmouseout="$(this).attr('type', 'password');" onclick="if($(this).attr('type') === 'text'){ $(this).attr('type', 'password'); } else { $(this).attr('type', 'text'); }">