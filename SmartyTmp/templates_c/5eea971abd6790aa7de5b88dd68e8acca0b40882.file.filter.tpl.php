<?php /* Smarty version Smarty3-b7, created on 2022-08-17 16:15:23
         compiled from "/home1/bot.gadclubs.com/library/modules/_public/view/type/filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159659211262fca39b8010e7-60739526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5eea971abd6790aa7de5b88dd68e8acca0b40882' => 
    array (
      0 => '/home1/bot.gadclubs.com/library/modules/_public/view/type/filter.tpl',
      1 => 1660724123,
    ),
  ),
  'nocache_hash' => '159659211262fca39b8010e7-60739526',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
">
    <?php echo $_smarty_tpl->getVariable('item')->value['label'];?>

    <div class="btn btn-warning" onclick="EstimatedProcess();">預估人數</div>
</label>
<?php if ($_smarty_tpl->getVariable('item')->value['Tags']){?>
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">標籤</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" onclick="if($('#FilterTagsBody').css('display')==='none'){ $(this).find('i').addClass('fa-minus').removeClass('fa-plus');$('#FilterTagsBody').show(); }else{ $(this).find('i').addClass('fa-plus').removeClass('fa-minus');$('#FilterTagsBody').hide(); }">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div id="FilterTagsBody" class="box-body">
                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['Tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                    <input id="FilterTags<?php echo $_smarty_tpl->getVariable('key')->value;?>
" type="checkbox" name="fields[content][filter][Tags][]" value="<?php echo $_smarty_tpl->getVariable('key')->value;?>
" <?php if ($_smarty_tpl->getVariable('item')->value['TagsVal']&&in_array($_smarty_tpl->getVariable('key')->value,$_smarty_tpl->getVariable('item')->value['TagsVal'])){?>checked<?php }?>>
                    <label for="FilterTags<?php echo $_smarty_tpl->getVariable('key')->value;?>
"><?php echo $_smarty_tpl->getVariable('value')->value;?>
</label>
                <?php }} ?>
            </div>
        </div>
    </div>
<?php }?>

<script>
    function EstimatedProcess() {
        var tmp;
        var options = {
        target:        '#state'   
        ,beforeSubmit:  function(){
            swal({
                onOpen: function () {
                    swal.showLoading()
                },
                title: '預估人數中',
                showConfirmButton: false
            });
        },success: function (data, status){
            console.log(data);
            if(data.state){
                swal({type: 'success',title: '預估成功',text:data.msg,showConfirmButton: true});
            }else{
                swal({type: 'error',title: '預估失敗',text:data.msg,showConfirmButton: true});
            }
        }, error: function (data, status, e){
            console.log(data);		        	  
        } ,url:     '/be/System/process/ps/EstimatedProcess'
        ,type:      'POST'   
        ,dataType:  'json'   
        }; 	
        $('#DataForm').ajaxSubmit(options);
    }
</script>