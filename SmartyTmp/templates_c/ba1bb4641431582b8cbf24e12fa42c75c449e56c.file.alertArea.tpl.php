<?php /* Smarty version Smarty3-b7, created on 2022-08-10 10:27:52
         compiled from "/home1/bot.gadclubs.com/library/modules/_public/view/alertArea.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47628361162f317a866e1a0-04278701%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba1bb4641431582b8cbf24e12fa42c75c449e56c' => 
    array (
      0 => '/home1/bot.gadclubs.com/library/modules/_public/view/alertArea.tpl',
      1 => 1627707727,
    ),
  ),
  'nocache_hash' => '47628361162f317a866e1a0-04278701',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('_From')->value=='backend'&&$_smarty_tpl->getVariable('_Module')->value!=='System'&&$_smarty_tpl->getVariable('_Module')->value!=='CustomerService'){?>
    <ol class="breadcrumb">
        <li style="color: #777;"><i class="fa fa-home"></i></li>
        <li style="color: #777;"><?php echo $_smarty_tpl->getVariable('ModuleNameList')->value[$_smarty_tpl->getVariable('_Module')->value];?>
</li>
        <li style="color: #3c8dbc;"><?php echo $_smarty_tpl->getVariable('ActionNameList')->value[$_smarty_tpl->getVariable('_ActionName')->value];?>
</li>
    </ol>
<?php }?>
<div id="AlertMessage" class="alert alert-success" style="display: none;">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>success</strong>
    <span>success</span>
</div>
<script>
    var AlertTimeout;
    function AlertMsg(type='success', title, text, time=5000){
        window.clearTimeout(AlertTimeout);
        $('#AlertMessage').attr('class', "alert alert-"+type);//success,error(danger),warning,info
        $('#AlertMessage').show();
        $('#AlertMessage').find('strong').html(title);
        $('#AlertMessage').find('span').html(text);
        AlertTimeout = window.setTimeout(( () => $('#AlertMessage').hide() ), time);
    }
</script>