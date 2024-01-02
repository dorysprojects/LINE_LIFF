<?php /* Smarty version Smarty3-b7, created on 2020-09-29 18:20:25
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view//type/text.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6756059945f730a6973d390-83247802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccdee2be22c3a8ea3725909e9983dc5828f185f9' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view//type/text.tpl',
      1 => 1601374798,
    ),
  ),
  'nocache_hash' => '6756059945f730a6973d390-83247802',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>*<?php }?>
<label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
</label>
<input <?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>required<?php }?> id="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" name="fields[subject][<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]" type="<?php echo $_smarty_tpl->getVariable('item')->value['type'];?>
" value="<?php echo $_smarty_tpl->getVariable('item')->value['value'];?>
" class="form-control" placeholder="請輸入<?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
">