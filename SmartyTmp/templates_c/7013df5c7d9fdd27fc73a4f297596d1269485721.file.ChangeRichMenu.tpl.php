<?php /* Smarty version Smarty3-b7, created on 2020-10-14 11:38:13
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/view/RichMenu/ChangeRichMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2171117215f8672a5ed4ab3-26052716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7013df5c7d9fdd27fc73a4f297596d1269485721' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/view/RichMenu/ChangeRichMenu.tpl',
      1 => 1602646693,
    ),
  ),
  'nocache_hash' => '2171117215f8672a5ed4ab3-26052716',
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

        <style>
            .form-group {
                display: flow-root;
            }
        </style>
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
                    <form id="DataForm" action="#" onsubmit="return false;">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title"></h3>
                                <input type="button" class="btn btn-default" name="cancel" value="返回列表">
                                <input type="button" class="btn btn-success" onclick="ChangeRichMenu();" value="更新選單">
                                <input type="button" class="btn btn-danger" onclick="ChangeRichMenu('unlink');" value="回復預設主選單">
                                <div class="box-tools pull-right">
                                    <button id="SubmitDataForm" type="submit" class="btn btn-success btn- hide"><span class="fa fa-save"></span></button>
                                    <button type="button" class="btn btn-box-tool hide" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool hide" data-widget="remove"><i class="fa fa-remove"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">篩選：</label>
                                        <div class="col-md-9">
                                            <div class="btn-group">
                                                <div class="input-group">
                                                    <input class="form-control" type="" id="search" placeholder="<?php if ($_smarty_tpl->getVariable('search')->value){?><?php echo $_smarty_tpl->getVariable('search')->value;?>
<?php }else{ ?>搜尋<?php }?>">
                                                    <div class="input-group-btn">
                                                        <input type="button" class="btn btn-primary button" onclick="xajax_SearchName($('#search').val());" value="搜尋">
                                                    </div>
                                                </div>
                                                <input class="btn btn-default button" type="button" onclick="xajax_SearchName();" value="顯示全部">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">選擇要更換主選單的會員：</label>
                                        <div class="col-md-9">
                                            <?php if ($_smarty_tpl->getVariable('MemberList')->value){?>
                                                <div class="checkbox">
                                                    <div class="checkbox-inline">
                                                        <input id="MemberALL" type="checkbox" onclick="SelectALL('Member');"/>
                                                        <label for="MemberALL" class="icon-checkmark" style="padding-left: 0px;">
                                                            <span>全選</span>
                                                        </label>
                                                    </div>
                                                    <?php  $_smarty_tpl->tpl_vars['Member'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('MemberList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['Member']->key => $_smarty_tpl->tpl_vars['Member']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['Member']->key;
?>
                                                        <?php if ($_smarty_tpl->getVariable('Member')->value['subject']['displayName']){?>
                                                            <div class="checkbox-inline">
                                                                <input id="Member<?php echo $_smarty_tpl->getVariable('key')->value;?>
" type="checkbox" value="<?php echo $_smarty_tpl->getVariable('Member')->value['propertyA'];?>
" class="Member" name="fields[Member]"/>
                                                                <label for="Member<?php echo $_smarty_tpl->getVariable('key')->value;?>
" class="icon-checkmark" style="padding-left: 0px;">
                                                                    <span><?php echo $_smarty_tpl->getVariable('Member')->value['subject']['displayName'];?>
</span>
                                                                </label>
                                                            </div>
                                                        <?php }?>
                                                    <?php }} ?>
                                                </div>
                                            <?php }else{ ?>
                                                <div class="form-group">查無會員</div>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">選擇要更換的主選單：</label>
                                        <div class="col-md-3">
                                            <select id="RichMenu" class="form-control RichMenu" name="fields[RichMenu]">
                                                <option value="">請選擇(回復預設主選單無需選擇)</option>
                                                <?php  $_smarty_tpl->tpl_vars['RichMenu'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('RichMenuList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['RichMenu']->key => $_smarty_tpl->tpl_vars['RichMenu']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['RichMenu']->key;
?>
                                                    <option value="<?php echo $_smarty_tpl->getVariable('RichMenu')->value['richMenuId'];?>
"><?php echo $_smarty_tpl->getVariable('RichMenu')->value['name'];?>
 【<?php echo $_smarty_tpl->getVariable('RichMenu')->value['chatBarText'];?>
】<!----></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">

                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'backend_footer.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <script>
                function SelectALL(obj){
                    $("." + obj).click();
                }
                function ChangeRichMenu(action){
                    var Member = [];
                    var Group = [];
                    var RichMenu = "";
                    var value = "";

                    for(var a=0;a<$(".Member").length;a++){
                        value = $(".Member").eq(a).val();
                        if($(".Member").get(a).checked == true){
                            Member.push(value);
                        }
                    }
                    RichMenu = $("#RichMenu").val();

                    xajax_ChangeRichMenu(Member, RichMenu, action);
                }
            </script>
            <?php echo $_smarty_tpl->getVariable('js')->value;?>

            <?php echo $_smarty_tpl->getVariable('xajax_js')->value;?>

        </div>
    </body>
</html>