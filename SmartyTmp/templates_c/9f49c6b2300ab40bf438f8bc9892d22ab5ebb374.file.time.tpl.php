<?php /* Smarty version Smarty3-b7, created on 2022-01-04 16:56:59
         compiled from "/home1/bot.gadclubs.com//library/modules/_public/view/type/time.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96463794861d40bdbea61f8-72871125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f49c6b2300ab40bf438f8bc9892d22ab5ebb374' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/_public/view/type/time.tpl',
      1 => 1616486350,
    ),
  ),
  'nocache_hash' => '96463794861d40bdbea61f8-72871125',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="timepicker" style="<?php echo $_smarty_tpl->getVariable('item')->value['style'];?>
">
    <?php if ($_smarty_tpl->getVariable('item')->value['nolabel']!='on'){?>
        <?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>*<?php }?>
        <label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
</label>
    <?php }?>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-clock-o"></i>
        </div>
        <input <?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>required<?php }?> <?php if ($_smarty_tpl->getVariable('item')->value['disabled']){?>disabled<?php }?> name="fields<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
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