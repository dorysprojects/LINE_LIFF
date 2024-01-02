<?php /* Smarty version Smarty3-b7, created on 2021-04-07 16:19:24
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/time.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1369075096606d6b0c4c8211-96409953%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '920f0beb00676dfef1b3566ecda1fd393ad962cf' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/time.tpl',
      1 => 1616486350,
    ),
  ),
  'nocache_hash' => '1369075096606d6b0c4c8211-96409953',
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