<?php /* Smarty version Smarty3-b7, created on 2020-10-05 14:34:56
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/datetime.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11092087455f7abe90993039-11118964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11b4e1047d96ae96fa2eca0999a9c3776601c0a8' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/datetime.tpl',
      1 => 1601879695,
    ),
  ),
  'nocache_hash' => '11092087455f7abe90993039-11118964',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>*<?php }?>
<label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
</label>
<div class="input-group">
    <div class="input-group-addon">
        <i class="fa fa-clock-o"></i>
    </div>
    <input <?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>required<?php }?> name="fields<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
[<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]" type="text" value="<?php echo $_smarty_tpl->getVariable('item')->value['value'];?>
" class="form-control timepicker" placeholder="請輸入<?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
">
</div>