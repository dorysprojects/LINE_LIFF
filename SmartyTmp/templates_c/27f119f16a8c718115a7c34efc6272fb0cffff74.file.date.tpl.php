<?php /* Smarty version Smarty3-b7, created on 2022-08-15 17:05:36
         compiled from "/home1/bot.gadclubs.com/library/modules/_public/view/type/date.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133356775062fa0c60e11b22-27954606%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27f119f16a8c718115a7c34efc6272fb0cffff74' => 
    array (
      0 => '/home1/bot.gadclubs.com/library/modules/_public/view/type/date.tpl',
      1 => 1616486293,
    ),
  ),
  'nocache_hash' => '133356775062fa0c60e11b22-27954606',
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
