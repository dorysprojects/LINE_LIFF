<?php /* Smarty version Smarty3-b7, created on 2022-12-27 11:43:13
         compiled from "/home1/bot.lineapie.tw/library/modules/_public/view/type/radio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89689358063aa69d1877282-44411246%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c07b388488aa2f33b47bb7b787c95ce7a3e5b6ce' => 
    array (
      0 => '/home1/bot.lineapie.tw/library/modules/_public/view/type/radio.tpl',
      1 => 1627622917,
    ),
  ),
  'nocache_hash' => '89689358063aa69d1877282-44411246',
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
<?php  $_smarty_tpl->tpl_vars['optionitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['optionkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['optionitem']->key => $_smarty_tpl->tpl_vars['optionitem']->value){
 $_smarty_tpl->tpl_vars['optionkey']->value = $_smarty_tpl->tpl_vars['optionitem']->key;
?>
    <input name="fields<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
[<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]" type="radio" class="minimal <?php echo $_smarty_tpl->getVariable('item')->value['class'];?>
" value="<?php echo $_smarty_tpl->getVariable('optionkey')->value;?>
" <?php if ($_smarty_tpl->getVariable('item')->value['value']==$_smarty_tpl->getVariable('optionkey')->value){?>checked<?php }?> <?php if ($_smarty_tpl->getVariable('item')->value['disabled']){?>disabled<?php }?>><?php echo $_smarty_tpl->getVariable('optionitem')->value;?>

<?php }} ?>
<?php if ($_smarty_tpl->getVariable('item')->value['onchange']=='on'){?>
    <script>
        $(document).on('change', 'input[name="fields<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
[<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]"]', function(event) {
            if($('input[name="fields<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
[<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]"]:checked').val() === 'date'){
                $('#datepicker').show();
                $('#timepicker').show();
            }else{
                $('#datepicker').hide();
                $('#timepicker').hide();
            }
        });
    </script>
<?php }?>