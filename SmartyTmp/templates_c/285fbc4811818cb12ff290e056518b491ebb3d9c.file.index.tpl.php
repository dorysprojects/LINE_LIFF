<?php /* Smarty version Smarty3-b7, created on 2021-03-11 14:17:59
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/view/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:447837646049b6176be148-10047808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '285fbc4811818cb12ff290e056518b491ebb3d9c' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/backend/view/index.tpl',
      1 => 1615443476,
    ),
  ),
  'nocache_hash' => '447837646049b6176be148-10047808',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.cat.php';
?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->getVariable('ModuleNameList')->value[$_smarty_tpl->getVariable('_Module')->value];?>
 - <?php echo $_smarty_tpl->getVariable('ActionNameList')->value[$_smarty_tpl->getVariable('_ActionName')->value];?>
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
                                    <div class="box-tools pull-right">
                                        <?php echo $_smarty_tpl->getVariable('TopCustomEdit')->value;?>

                                        <a class="btn btn-info btn-sm <?php if ($_smarty_tpl->getVariable('noadd')->value){?>hide<?php }?>" href="?BackEnd/<?php echo $_smarty_tpl->getVariable('_Module')->value;?>
/add<?php if ($_smarty_tpl->getVariable('__TYPE')->value){?>/type/<?php echo $_smarty_tpl->getVariable('__TYPE')->value;?>
<?php }?>">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a class="btn btn-success btn-sm <?php if ($_smarty_tpl->getVariable('nosave')->value){?>hide<?php }?>" onclick="ListPageSaveButton();">
                                            <i class="fa fa-save"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm <?php if ($_smarty_tpl->getVariable('nodelete')->value){?>hide<?php }?>" onclick="template_btn_deleteall();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <?php if ($_smarty_tpl->getVariable('collapse')->value){?>
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->getVariable('remove')->value){?> 
                                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        <?php }?>
                                        <div id="Export" type="button" class="btn btn-info <?php if (!$_smarty_tpl->getVariable('export')->value){?>hide<?php }?>"><i class="fa fa-cloud-download"></i> 匯出</div>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <form id="template_form">
                                        <div class="col-xs-12">
                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('system')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                <div class="col-xs-3">
                                                    <label for="subject"><?php echo $_smarty_tpl->getVariable('item')->value['text'];?>
</label>
                                                    <?php if ($_smarty_tpl->getVariable('item')->value['type']=='text'){?>
                                                        <input name="fields[1][<?php echo $_smarty_tpl->getVariable('key')->value;?>
]" type="text" value="<?php echo $_smarty_tpl->getVariable('item')->value['value'];?>
" class="form-control" style="display:inline-block;width:auto;" placeholder="請輸入<?php echo $_smarty_tpl->getVariable('item')->value['text'];?>
">
                                                    <?php }elseif($_smarty_tpl->getVariable('item')->value['type']=='view'){?>
                                                        <?php echo $_smarty_tpl->getVariable('item')->value['value'];?>

                                                    <?php }?>
                                                </div>
                                            <?php }} ?>
                                        </div>
                                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th <?php if ($_smarty_tpl->getVariable('noselect')->value){?>class="hide"<?php }?>><input class="checkbox template_clickbox_clickall" type="checkbox"></th>
                                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columns')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                        <th><?php echo $_smarty_tpl->getVariable('item')->value;?>
</th>
                                                    <?php }} ?>
                                                    <th <?php if ($_smarty_tpl->getVariable('noedit')->value){?>class="hide"<?php }?>>管理</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  $_smarty_tpl->tpl_vars['rowitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['rowkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rowitem']->key => $_smarty_tpl->tpl_vars['rowitem']->value){
 $_smarty_tpl->tpl_vars['rowkey']->value = $_smarty_tpl->tpl_vars['rowitem']->key;
?>
                                                    <tr>
                                                        <td <?php if ($_smarty_tpl->getVariable('noselect')->value){?>class="hide"<?php }?>><input name="select[<?php echo $_smarty_tpl->getVariable('rowitem')->value['id'];?>
]" class="template_clickbox_item" type="checkbox"/></td>
                                                        <?php  $_smarty_tpl->tpl_vars['columnsitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['columnkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columns')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['columnsitem']->key => $_smarty_tpl->tpl_vars['columnsitem']->value){
 $_smarty_tpl->tpl_vars['columnkey']->value = $_smarty_tpl->tpl_vars['columnsitem']->key;
?>
                                                            <th>
                                                                <?php if ($_smarty_tpl->getVariable('columnsType')->value&&$_smarty_tpl->getVariable('columnsType')->value[$_smarty_tpl->getVariable('columnkey')->value]!='view'){?>
                                                                    <?php if (in_array($_smarty_tpl->getVariable('columnkey')->value,$_smarty_tpl->getVariable('SqlColumnList')->value)){?>
                                                                        <?php $_smarty_tpl->assign("_subject",'',null,null);?>
                                                                    <?php }else{ ?>
                                                                        <?php $_smarty_tpl->assign("_subject","[subject]",null,null);?>
                                                                    <?php }?>
                                                                    <?php if ($_smarty_tpl->getVariable('columnsType')->value[$_smarty_tpl->getVariable('columnkey')->value]=='text'){?>
                                                                        <span onclick="$(this).find('.view').hide();$(this).find('.edit').attr('type', 'text').focus();">
                                                                            <span class="view"><?php echo $_smarty_tpl->getVariable('rowitem')->value[$_smarty_tpl->getVariable('columnkey')->value];?>
</span>
                                                                            <input type="hidden" class="edit" name="fields[<?php echo $_smarty_tpl->getVariable('rowitem')->value['id'];?>
]<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
[<?php echo $_smarty_tpl->getVariable('columnkey')->value;?>
]" value="<?php echo $_smarty_tpl->getVariable('rowitem')->value[$_smarty_tpl->getVariable('columnkey')->value];?>
"onchange="$(this).parent().find('.view').css('color', 'red');" onblur="$(this).parent().find('.view').html($(this).val()).show();$(this).attr('type', 'hidden');">
                                                                        </span>
                                                                    <?php }elseif($_smarty_tpl->getVariable('columnsType')->value[$_smarty_tpl->getVariable('columnkey')->value]=='image'){?>
                                                                        <img style="height:60px;" src="<?php if ($_smarty_tpl->getVariable('rowitem')->value[$_smarty_tpl->getVariable('columnkey')->value]){?><?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('rowitem')->value[$_smarty_tpl->getVariable('columnkey')->value];?>
<?php }?>">
                                                                    <?php }elseif($_smarty_tpl->getVariable('columnsType')->value[$_smarty_tpl->getVariable('columnkey')->value]=='media'){?>
                                                                        <?php $_smarty_tpl->assign("type",smarty_modifier_cat($_smarty_tpl->getVariable('columnkey')->value,"type"),null,null);?>
                                                                        <?php if ($_smarty_tpl->getVariable('rowitem')->value[$_smarty_tpl->getVariable('type')->value]=='image'){?>
                                                                            <img style="height:60px;" src="<?php if ($_smarty_tpl->getVariable('rowitem')->value[$_smarty_tpl->getVariable('columnkey')->value]){?><?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('rowitem')->value[$_smarty_tpl->getVariable('columnkey')->value];?>
<?php }?>">
                                                                        <?php }elseif($_smarty_tpl->getVariable('rowitem')->value[$_smarty_tpl->getVariable('type')->value]=='video'){?>
                                                                            <video style="height:60px;" controls>
                                                                                <source src="<?php if ($_smarty_tpl->getVariable('rowitem')->value[$_smarty_tpl->getVariable('columnkey')->value]){?><?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/video/<?php echo $_smarty_tpl->getVariable('rowitem')->value[$_smarty_tpl->getVariable('columnkey')->value];?>
<?php }?>">
                                                                            </video>
                                                                        <?php }?>
                                                                    <?php }elseif($_smarty_tpl->getVariable('columnsType')->value[$_smarty_tpl->getVariable('columnkey')->value]=='radio'){?>
                                                                        <?php $_smarty_tpl->assign("options",smarty_modifier_cat($_smarty_tpl->getVariable('columnkey')->value,"options"),null,null);?>
                                                                        <span onclick="$(this).find('.view').css('color', 'red').hide();$(this).find('.edit').show();">
                                                                            <?php $_smarty_tpl->assign("chooseVal",$_smarty_tpl->getVariable('rowitem')->value[$_smarty_tpl->getVariable('columnkey')->value],null,null);?>
                                                                            <span class="view"><?php echo $_smarty_tpl->getVariable('columnsType')->value[$_smarty_tpl->getVariable('options')->value][$_smarty_tpl->getVariable('chooseVal')->value];?>
</span>
                                                                            <span class="edit" style="display: none;">
                                                                                <?php  $_smarty_tpl->tpl_vars['optionitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['optionkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columnsType')->value[$_smarty_tpl->getVariable('options')->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['optionitem']->key => $_smarty_tpl->tpl_vars['optionitem']->value){
 $_smarty_tpl->tpl_vars['optionkey']->value = $_smarty_tpl->tpl_vars['optionitem']->key;
?>
                                                                                    <input type="radio" name="fields[<?php echo $_smarty_tpl->getVariable('rowitem')->value['id'];?>
]<?php echo $_smarty_tpl->getVariable('_subject')->value;?>
[<?php echo $_smarty_tpl->getVariable('columnkey')->value;?>
]" value="<?php echo $_smarty_tpl->getVariable('optionkey')->value;?>
" label="<?php echo $_smarty_tpl->getVariable('optionitem')->value;?>
" <?php if ($_smarty_tpl->getVariable('rowitem')->value[$_smarty_tpl->getVariable('columnkey')->value]==$_smarty_tpl->getVariable('optionkey')->value){?>checked<?php }?> onchange="$(this).parent().hide();$(this).parent().parent().find('.view').html($(this).attr('label')).show();"><?php echo $_smarty_tpl->getVariable('optionitem')->value;?>

                                                                                <?php }} ?>
                                                                            </span>
                                                                        </span>
                                                                    <?php }?>
                                                                <?php }else{ ?>
                                                                    <?php echo $_smarty_tpl->getVariable('rowitem')->value[$_smarty_tpl->getVariable('columnkey')->value];?>

                                                                <?php }?>
                                                            </th>
                                                        <?php }} ?>
                                                        <td <?php if ($_smarty_tpl->getVariable('noedit')->value||$_smarty_tpl->getVariable('rowitem')->value['noedit']){?>class="hide"<?php }?>>
                                                            <a href="?BackEnd/<?php echo $_smarty_tpl->getVariable('_Module')->value;?>
/edit/id/<?php echo $_smarty_tpl->getVariable('rowitem')->value['id'];?>
<?php if ($_smarty_tpl->getVariable('__TYPE')->value){?>/type/<?php echo $_smarty_tpl->getVariable('__TYPE')->value;?>
<?php }?>" class="btn btn-info btn-sm">
                                                                <span class="fa fa-edit"></span>
                                                            </a>
                                                            <?php if ($_smarty_tpl->getVariable('rowitem')->value['copy']){?>
                                                                <?php echo $_smarty_tpl->getVariable('rowitem')->value['copy'];?>

                                                            <?php }?>
                                                            <?php if ($_smarty_tpl->getVariable('rowitem')->value['preview']){?>
                                                                <?php echo $_smarty_tpl->getVariable('rowitem')->value['preview'];?>

                                                            <?php }?>
                                                            <?php if ($_smarty_tpl->getVariable('rowitem')->value['customEdit']){?>
                                                                <?php echo $_smarty_tpl->getVariable('rowitem')->value['customEdit'];?>

                                                            <?php }?>
                                                        </td>
                                                    </tr>
                                                <?php }} ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th <?php if ($_smarty_tpl->getVariable('noselect')->value){?>class="hide"<?php }?>></th>
                                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columns')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                        <th><?php echo $_smarty_tpl->getVariable('item')->value;?>
</th>
                                                    <?php }} ?>
                                                    <th <?php if ($_smarty_tpl->getVariable('noedit')->value){?>class="hide"<?php }?>>管理</th>
                                                </tr>
                                            </tfoot>
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

            <?php echo $_smarty_tpl->getVariable('jsV2')->value;?>

            <?php echo $_smarty_tpl->getVariable('xajax_js')->value;?>

        </div>
    </body>
</html>