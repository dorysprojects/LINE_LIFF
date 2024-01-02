<?php /* Smarty version Smarty3-b7, created on 2021-07-30 13:38:19
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/radio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:642895006103904bca7ee8-10401771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05269bf297e1f569a386ac6b57ffca04ce9a2664' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/radio.tpl',
      1 => 1627622917,
    ),
  ),
  'nocache_hash' => '642895006103904bca7ee8-10401771',
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