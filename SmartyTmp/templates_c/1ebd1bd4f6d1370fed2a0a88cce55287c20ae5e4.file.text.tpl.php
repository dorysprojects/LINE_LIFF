<?php /* Smarty version Smarty3-b7, created on 2022-12-27 11:43:13
         compiled from "/home1/bot.lineapie.tw/library/modules/_public/view/type/text.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206574757363aa69d1a5d685-49156312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ebd1bd4f6d1370fed2a0a88cce55287c20ae5e4' => 
    array (
      0 => '/home1/bot.lineapie.tw/library/modules/_public/view/type/text.tpl',
      1 => 1616486344,
    ),
  ),
  'nocache_hash' => '206574757363aa69d1a5d685-49156312',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('item')->value['nolabel']!='on'){?>
    <?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>*<?php }?>
    <label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
</label>
<?php }?>
<input <?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>required<?php }?> <?php if ($_smarty_tpl->getVariable('item')->value['disabled']){?>disabled<?php }?> id="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" name="fields<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
[<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]" type="<?php echo $_smarty_tpl->getVariable('item')->value['type'];?>
" value="<?php echo $_smarty_tpl->getVariable('item')->value['value'];?>
" class="form-control <?php echo $_smarty_tpl->getVariable('item')->value['class'];?>
" placeholder="<?php if ($_smarty_tpl->getVariable('item')->value['placeholder']){?><?php echo $_smarty_tpl->getVariable('item')->value['placeholder'];?>
<?php }else{ ?>請輸入<?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
<?php }?>">