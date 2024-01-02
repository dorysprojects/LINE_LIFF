<?php /* Smarty version Smarty3-b7, created on 2021-12-16 10:40:40
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11392489761baa728100bf3-33844500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfe28ace6f52b777c2d70494d298f7cb8a5b947d' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/template.tpl',
      1 => 1639622437,
    ),
  ),
  'nocache_hash' => '11392489761baa728100bf3-33844500',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.cat.php';
?><?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'/UrlInfo.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<div class="TemplateContainer" style="overflow:auto;">
    <div class="TemplateSlider" style="width:3200px;">
        <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (9 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 9+1 - 0 : 0-(9)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
            <?php $_smarty_tpl->assign("subtitle",smarty_modifier_cat("subtitle",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <?php $_smarty_tpl->assign("subcontent",smarty_modifier_cat("subcontent",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <?php $_smarty_tpl->assign("img",smarty_modifier_cat("img",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <div class="col-lg-4 Template" style="display:inline-block;width:300px;margin: 10px;text-align:center;">
                <div class="TemplateBtn" style="width:300px;height:35px;">
                    <span class="label label-success" style="padding:10px;float:left;">第<?php echo $_smarty_tpl->getVariable('G')->value+1;?>
組</span>
                    <?php if ($_smarty_tpl->getVariable('G')->value!==0){?>
                        <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeVal('left','<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-arrow-left"></i></span>
                    <?php }?>
                    <?php if ($_smarty_tpl->getVariable('G')->value!==9){?>
                        <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeVal('right','<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-arrow-right"></i></span>
                    <?php }?>
                    <span class="btn btn-sm label label-danger" style="padding:10px;float:left;margin-left:5px;" onclick="ClearData('<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-trash"></i></span>
                    <label class="btn btn-info" style="float:right;">
                        <input type="hidden" name="fields[subject][img<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value];?>
">
                        <input style="display:none;" id="FILES_<?php echo $_smarty_tpl->getVariable('img')->value;?>
" name="<?php echo $_smarty_tpl->getVariable('img')->value;?>
" onchange="if (this.files && this.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) { $('#previews_<?php echo $_smarty_tpl->getVariable('img')->value;?>
').attr('src', e.target.result).show(); };
                                    reader.readAsDataURL(this.files[0]);
                                }else{
                                    $('#previews_<?php echo $_smarty_tpl->getVariable('img')->value;?>
').attr('src', '').hide();
                                }" type="file" class="form-control">
                        <i class="fa fa-photo"></i><?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value]){?>更換圖片<?php }else{ ?>上傳圖片<?php }?>
                    </label>
                </div>
                <img style="width:300px;height:200px;<?php if (!$_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value]){?>display: none;<?php }?>" class="img-thumbnail1" id="previews_<?php echo $_smarty_tpl->getVariable('img')->value;?>
" src="<?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value]){?><?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value];?>
<?php }?>"/>
                <div class="card-body" style="margin-top:5px;">
                    <input name="fields[subject][subtitle<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('subtitle')->value];?>
" class="form-control" style="width:300px;" placeholder="標題">
                    <textarea name="fields[subject][subcontent<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" rows="1" class="form-control" style="width:300px;margin-top:5px;" placeholder="描述"><?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('subcontent')->value];?>
</textarea>
                    <div class="card-button">
                        <?php $_smarty_tpl->tpl_vars['N'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['N']->step = (2 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['N']->total = (int)ceil(($_smarty_tpl->tpl_vars['N']->step > 0 ? 2+1 - 0 : 0-(2)+1)/abs($_smarty_tpl->tpl_vars['N']->step));
if ($_smarty_tpl->tpl_vars['N']->total > 0){
for ($_smarty_tpl->tpl_vars['N']->value = 0, $_smarty_tpl->tpl_vars['N']->iteration = 1;$_smarty_tpl->tpl_vars['N']->iteration <= $_smarty_tpl->tpl_vars['N']->total;$_smarty_tpl->tpl_vars['N']->value += $_smarty_tpl->tpl_vars['N']->step, $_smarty_tpl->tpl_vars['N']->iteration++){
$_smarty_tpl->tpl_vars['N']->first = $_smarty_tpl->tpl_vars['N']->iteration == 1;$_smarty_tpl->tpl_vars['N']->last = $_smarty_tpl->tpl_vars['N']->iteration == $_smarty_tpl->tpl_vars['N']->total;?>
                        <?php $_smarty_tpl->assign("subject",smarty_modifier_cat(smarty_modifier_cat(smarty_modifier_cat("subject",$_smarty_tpl->getVariable('G')->value),"_"),$_smarty_tpl->getVariable('N')->value),null,null);?>
                        <?php $_smarty_tpl->assign("action",smarty_modifier_cat(smarty_modifier_cat(smarty_modifier_cat("action",$_smarty_tpl->getVariable('G')->value),"_"),$_smarty_tpl->getVariable('N')->value),null,null);?>
                        <?php $_smarty_tpl->assign("data",smarty_modifier_cat(smarty_modifier_cat(smarty_modifier_cat("data",$_smarty_tpl->getVariable('G')->value),"_"),$_smarty_tpl->getVariable('N')->value),null,null);?>
                            <div class="button-group" style="width:300px;">
                                <input name="fields[subject][subject<?php echo $_smarty_tpl->getVariable('G')->value;?>
_<?php echo $_smarty_tpl->getVariable('N')->value;?>
]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('subject')->value];?>
" class="form-control" style="width:30%;display:inline-block;margin-top:5px;" placeholder="按鈕<?php echo $_smarty_tpl->getVariable('N')->value+1;?>
">
                                <select name="fields[subject][action<?php echo $_smarty_tpl->getVariable('G')->value;?>
_<?php echo $_smarty_tpl->getVariable('N')->value;?>
]" class="form-control select2" style="width:30%;display:inline-block;margin-top:5px;">
                                    <option value="" disabled>請選擇動作</option>
                                    <option value="noaction" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('action')->value]=='noaction'){?>selected<?php }?>>不設定動作</option>
                                    <option value="hyperlink" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('action')->value]=='hyperlink'){?>selected<?php }?>>超連結動作</option>
                                    <option value="text" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('action')->value]=='text'){?>selected<?php }?>>文字</option>
                                    <option value="postback" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('action')->value]=='postback'){?>selected<?php }?>>輸入代碼</option>
                                </select>
                                <input name="fields[subject][data<?php echo $_smarty_tpl->getVariable('G')->value;?>
_<?php echo $_smarty_tpl->getVariable('N')->value;?>
]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('data')->value];?>
" class="form-control" style="width:35%;display:inline-block;margin-top:5px;" placeholder="內容">
                            </div>
                        <?php }} ?>
                    </div>
                </div>
            </div>
        <?php }} ?>
    </div>
</div>
<?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicFunc')->value,'/SortJs.php'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
