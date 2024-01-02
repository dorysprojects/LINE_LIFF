<?php /* Smarty version Smarty3-b7, created on 2022-02-15 16:43:58
         compiled from "/home1/bot.gadclubs.com//library/modules/_public/view/type/authority.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56358141620b67ce161aa4-13080875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9396e942ac00ae134d113665229a015baf93439d' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/_public/view/type/authority.tpl',
      1 => 1602662587,
    ),
  ),
  'nocache_hash' => '56358141620b67ce161aa4-13080875',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['Actions'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['Module'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('AuthorityList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['Actions']->key => $_smarty_tpl->tpl_vars['Actions']->value){
 $_smarty_tpl->tpl_vars['Module']->value = $_smarty_tpl->tpl_vars['Actions']->key;
?>
    <div class="col-md-3">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $_smarty_tpl->getVariable('ModuleNameList')->value[$_smarty_tpl->getVariable('Module')->value];?>
</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" onclick="if($('#<?php echo $_smarty_tpl->getVariable('Module')->value;?>
Body').css('display')==='none'){ $(this).find('i').addClass('fa-minus').removeClass('fa-plus');$('#<?php echo $_smarty_tpl->getVariable('Module')->value;?>
Body').show(); }else{ $(this).find('i').addClass('fa-plus').removeClass('fa-minus');$('#<?php echo $_smarty_tpl->getVariable('Module')->value;?>
Body').hide(); }">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div id="<?php echo $_smarty_tpl->getVariable('Module')->value;?>
Body" class="box-body">
                <?php  $_smarty_tpl->tpl_vars['ActionName'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['ActionKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Actions')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ActionName']->key => $_smarty_tpl->tpl_vars['ActionName']->value){
 $_smarty_tpl->tpl_vars['ActionKey']->value = $_smarty_tpl->tpl_vars['ActionName']->key;
?>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="fields[subject][authority][<?php echo $_smarty_tpl->getVariable('Module')->value;?>
][<?php echo $_smarty_tpl->getVariable('ActionName')->value;?>
]" value="on" <?php if ($_smarty_tpl->getVariable('row')->value['subject']['authority'][$_smarty_tpl->getVariable('Module')->value][$_smarty_tpl->getVariable('ActionName')->value]==='on'){?>checked<?php }?>>
                                <?php echo $_smarty_tpl->getVariable('ActionNameList')->value[$_smarty_tpl->getVariable('ActionName')->value];?>

                            </label>
                        </div>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </div>
<?php }} ?>