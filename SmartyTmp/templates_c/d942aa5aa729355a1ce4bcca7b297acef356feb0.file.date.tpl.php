<?php /* Smarty version Smarty3-b7, created on 2022-01-04 16:56:59
         compiled from "/home1/bot.gadclubs.com//library/modules/_public/view/type/date.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111127728861d40bdbe2ca06-36908138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd942aa5aa729355a1ce4bcca7b297acef356feb0' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/_public/view/type/date.tpl',
      1 => 1616486293,
    ),
  ),
  'nocache_hash' => '111127728861d40bdbe2ca06-36908138',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="datepicker" style="<?php echo $_smarty_tpl->getVariable('item')->value['style'];?>
">
    <?php if ($_smarty_tpl->getVariable('item')->value['nolabel']!='on'){?>
        <?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>*<?php }?>
        <label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
</label>
    <?php }?>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" <?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>required<?php }?> <?php if ($_smarty_tpl->getVariable('item')->value['disabled']){?>disabled<?php }?> name="fields<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
[<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]" type="<?php echo $_smarty_tpl->getVariable('item')->value['type'];?>
" min="<?php echo $_smarty_tpl->getVariable('item')->value['min'];?>
" max="<?php echo $_smarty_tpl->getVariable('item')->value['max'];?>
" value="<?php echo $_smarty_tpl->getVariable('item')->value['value'];?>
" style="width: 150px;" class="form-control <?php echo $_smarty_tpl->getVariable('item')->value['class'];?>
" placeholder="請輸入<?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
">
    </div>
</div>
