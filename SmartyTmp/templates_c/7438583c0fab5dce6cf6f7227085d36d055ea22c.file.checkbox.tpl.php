<?php /* Smarty version Smarty3-b7, created on 2022-12-27 11:43:13
         compiled from "/home1/bot.lineapie.tw/library/modules/_public/view/type/checkbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110918071663aa69d1902ff6-34457931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7438583c0fab5dce6cf6f7227085d36d055ea22c' => 
    array (
      0 => '/home1/bot.lineapie.tw/library/modules/_public/view/type/checkbox.tpl',
      1 => 1660707096,
    ),
  ),
  'nocache_hash' => '110918071663aa69d1902ff6-34457931',
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
<input name="fields<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
[<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]" type="hidden" value="<?php echo $_smarty_tpl->getVariable('item')->value['value'];?>
">
<?php  $_smarty_tpl->tpl_vars['optionitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['optionkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['optionitem']->key => $_smarty_tpl->tpl_vars['optionitem']->value){
 $_smarty_tpl->tpl_vars['optionkey']->value = $_smarty_tpl->tpl_vars['optionitem']->key;
?>
    <input name="<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" type="checkbox" class="minimal <?php echo $_smarty_tpl->getVariable('item')->value['class'];?>
" value="<?php echo $_smarty_tpl->getVariable('optionkey')->value;?>
" <?php if (in_array($_smarty_tpl->getVariable('optionkey')->value,$_smarty_tpl->getVariable('item')->value['optionVal'])){?>checked<?php }?> <?php if ($_smarty_tpl->getVariable('item')->value['disabled']){?>disabled<?php }?>><?php echo $_smarty_tpl->getVariable('optionitem')->value;?>

<?php }} ?>
<script>
    var changeCtn = 0;
    $(function(){
        $(document).on('change', 'input[name="<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"]', function(event) {
            var <?php if ($_smarty_tpl->getVariable('_subject')->value){?>_subject<?php }?><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
_Array = [];
            $('input[name="<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"]:checked').each(function(e) {
                <?php if ($_smarty_tpl->getVariable('_subject')->value){?>_subject<?php }?><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
_Array.push($(this).val());
            });
            var <?php if ($_smarty_tpl->getVariable('_subject')->value){?>_subject<?php }?><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
_Text = <?php if ($_smarty_tpl->getVariable('_subject')->value){?>_subject<?php }?><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
_Array.join('+');
            $('input[name="fields<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
[<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]"]').val(<?php if ($_smarty_tpl->getVariable('_subject')->value){?>_subject<?php }?><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
_Text);
            
            if($('.card-button')[0]){
                $('#BtnEmoticonReal').hide();
                $('.card-button .line').hide();
                $('.card-button .facebook').hide();
                var <?php if ($_smarty_tpl->getVariable('_subject')->value){?>_subject<?php }?><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
_Class = '';
                switch(<?php if ($_smarty_tpl->getVariable('_subject')->value){?>_subject<?php }?><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
_Text){
                    default:
                    case 'line+facebook':
                        $('.TemplateContainer').removeClass('FB');
                        <?php if ($_smarty_tpl->getVariable('_subject')->value){?>_subject<?php }?><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
_Class = '.line.facebook';
                        break;
                    case 'facebook':
                        $('.TemplateContainer').addClass('FB');
                        <?php if ($_smarty_tpl->getVariable('_subject')->value){?>_subject<?php }?><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
_Class = '.facebook';
                        break;
                    case 'line':
                        $('.TemplateContainer').removeClass('FB');
                        <?php if ($_smarty_tpl->getVariable('_subject')->value){?>_subject<?php }?><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
_Class = '.line';
                        $('#BtnEmoticonReal').show();
                        break;
                }
                $('.card-button ' + <?php if ($_smarty_tpl->getVariable('_subject')->value){?>_subject<?php }?><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
_Class).show();

                $('.card-button').each(function(e) {
                    var option = $(this).find('select.form-control option:selected');
                    option.each(function(e) {
                        if($(this).css('display')==='none'){
                            option.parents('select').val('').change();
                        }else{
                            switch(option.parents('select').val()){
                                case 'text':
                                    if(changeCtn>0){
                                        option.parents('select').val('').change();
                                    }
                                    break;
                            }
                        }
                    });
                });
                //QuickReply
                if($('#BtnGrp5')[0]){
                    $('#BtnGrp5').parents('.Template').find('.TemplateBtn>span.label-danger').click();
                }
            }
            changeCtn++;
        });
        $('input[name="<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"]').eq(0).change();
    });
</script>