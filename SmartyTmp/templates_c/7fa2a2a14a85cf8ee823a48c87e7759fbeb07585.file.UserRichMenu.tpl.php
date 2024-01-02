<?php /* Smarty version Smarty3-b7, created on 2020-10-13 17:03:48
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/view/RichMenu/UserRichMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6261156055f856d74e50751-39776000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fa2a2a14a85cf8ee823a48c87e7759fbeb07585' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/view/RichMenu/UserRichMenu.tpl',
      1 => 1602579828,
    ),
  ),
  'nocache_hash' => '6261156055f856d74e50751-39776000',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.cat.php';
?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->getVariable('ProjectName')->value;?>
</title>
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'backend_head.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'backend_top.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'backend_menu.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <div class="content-wrapper">
                <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'alertArea.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">
                                        
                                    </h3>
                                    <div class="form-inline">
                                        <input type="button" class="btn btn-default" name="cancel" value="返回列表">
                                        <div class="input-group">
                                            <input class="form-control" type="" id="search" placeholder="<?php if ($_smarty_tpl->getVariable('search')->value){?><?php echo $_smarty_tpl->getVariable('search')->value;?>
<?php }else{ ?>搜尋<?php }?>">
                                            <div class="input-group-btn">
                                                <input type="button" class="btn btn-primary button" onclick="xajax_SearchName($('#search').val());" value="搜尋">
                                            </div>
                                        </div>
                                        <input class="btn btn-info button" type="button" onclick="xajax_SearchName();" value="顯示全部">
                                    </div>
                                </div>
                                <div class="box-body">
                                    <form id="template_form">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>會員</th>
                                                    <th>RichMenu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  $_smarty_tpl->tpl_vars['Member'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('MemberList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['Member']->key => $_smarty_tpl->tpl_vars['Member']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['Member']->key;
?>
                                                    <tr>
                                                        <th>
                                                            <img style="max-width: 60px;max-height: 60px;" class="LineMemberImg img-circle img-thumbnail img-responsive" src="<?php echo $_smarty_tpl->getVariable('Member')->value['subject']['pictureUrl'];?>
">
                                                            <?php echo $_smarty_tpl->getVariable('Member')->value['subject']['displayName'];?>

                                                        </th>
                                                        <th>
                                                            <select id="RichMenu<?php echo $_smarty_tpl->getVariable('Member')->value['propertyA'];?>
" class="form-control RichMenu" style="display: <?php if ($_smarty_tpl->getVariable('Member')->value['RichMenu']){?>block<?php }else{ ?>none<?php }?>;" onchange="xajax_ChangeRichMenu('<?php echo $_smarty_tpl->getVariable('Member')->value['propertyA'];?>
', $(this).val(), '');if($(this).val()){ location.reload(); }">
                                                                <option value="">請選擇</option>
                                                                <?php  $_smarty_tpl->tpl_vars['RichMenu'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('RichMenuList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['RichMenu']->key => $_smarty_tpl->tpl_vars['RichMenu']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['RichMenu']->key;
?>
                                                                    <option value="<?php echo $_smarty_tpl->getVariable('RichMenu')->value['richMenuId'];?>
" <?php if ($_smarty_tpl->getVariable('Member')->value['RichMenu']===$_smarty_tpl->getVariable('RichMenu')->value['richMenuId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('RichMenu')->value['name'];?>
 【<?php echo $_smarty_tpl->getVariable('RichMenu')->value['chatBarText'];?>
】</option>
                                                                <?php }} ?>
                                                            </select>
                                                            <div style="display: <?php if ($_smarty_tpl->getVariable('Member')->value['RichMenu']){?>none<?php }else{ ?>block<?php }?>;" class="btn btn-success btn-sm" onclick="$('#RichMenu<?php echo $_smarty_tpl->getVariable('Member')->value['propertyA'];?>
').show();">設定</div>
                                                            <div style="display: <?php if ($_smarty_tpl->getVariable('Member')->value['RichMenu']){?>block<?php }else{ ?>none<?php }?>;" class="btn btn-danger btn-sm" onclick="xajax_ChangeRichMenu('<?php echo $_smarty_tpl->getVariable('Member')->value['propertyA'];?>
', '', 'unlink');location.reload();">取消</div>
                                                        </th>
                                                    </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'backend_footer.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <?php echo $_smarty_tpl->getVariable('js')->value;?>

            <?php echo $_smarty_tpl->getVariable('xajax_js')->value;?>

        </div>
    </body>
</html>