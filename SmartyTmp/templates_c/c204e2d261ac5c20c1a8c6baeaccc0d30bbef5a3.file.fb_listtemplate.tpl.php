<?php /* Smarty version Smarty3-b7, created on 2021-02-08 14:02:37
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/fb_listtemplate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9053033946020d3fd6d15c8-78177612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c204e2d261ac5c20c1a8c6baeaccc0d30bbef5a3' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/fb_listtemplate.tpl',
      1 => 1611122081,
    ),
  ),
  'nocache_hash' => '9053033946020d3fd6d15c8-78177612',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.cat.php';
?><label for="topStyle">第一個項目</label><br>
<input name="fields[subject][topStyle]" type="radio" class="minimal" value="large" onchange="topStyleChg();" <?php if ($_smarty_tpl->getVariable('row')->value['subject']['topStyle']!='compact'){?>checked<?php }?>>封面
<input name="fields[subject][topStyle]" type="radio" class="minimal" value="compact" onchange="topStyleChg();" <?php if ($_smarty_tpl->getVariable('row')->value['subject']['topStyle']=='compact'){?>checked<?php }?>>清單

<br><br><label for="TemplateContainer">內容</label>
<div class="TemplateContainer" style="overflow:auto;background-color:#fff;border:none;">
    <div class="TemplateSlider">
        <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (3 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 3+1 - 0 : 0-(3)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
            <?php $_smarty_tpl->assign("subtitle",smarty_modifier_cat("subtitle",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <?php $_smarty_tpl->assign("subcontent",smarty_modifier_cat("subcontent",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <?php $_smarty_tpl->assign("img",smarty_modifier_cat("img",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <div class="Template" style="margin: 10px;">
                <div class="TemplateBtn" style="height:35px;">
                    <span class="btn label-success">第<?php echo $_smarty_tpl->getVariable('G')->value+1;?>
組</span>
                    <?php if ($_smarty_tpl->getVariable('G')->value!==0){?>
                        <span class="btn label-primary" onclick="ChangeVal('left','<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-arrow-left"></i></span>
                    <?php }?>
                    <?php if ($_smarty_tpl->getVariable('G')->value!==3){?>
                        <span class="btn label-primary" onclick="ChangeVal('right','<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-arrow-right"></i></span>
                    <?php }?>
                    <span class="btn label-danger" onclick="ClearData('<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-trash"></i></span>
                    <label class="btn btn-info">
                        <input type="hidden" name="fields[subject][img<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value];?>
">
                        <input style="display:none;" id="FILES_<?php echo $_smarty_tpl->getVariable('img')->value;?>
" name="<?php echo $_smarty_tpl->getVariable('img')->value;?>
" onchange="var Ctn = '<?php echo $_smarty_tpl->getVariable('img')->value;?>
';if (this.files && this.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        <?php if ($_smarty_tpl->getVariable('G')->value===0){?>
                                            topStyleChg(e);
                                        <?php }else{ ?>
                                            $('#previewsList_'+Ctn).attr('src', e.target.result).show();
                                        <?php }?>
                                    };
                                    reader.readAsDataURL(this.files[0]);
                                }else{
                                    <?php if ($_smarty_tpl->getVariable('G')->value===0){?>
                                        topStyleChg('e');
                                    <?php }else{ ?>
                                        $('#previewsList_'+Ctn).attr('src', '').hide();
                                    <?php }?>
                                }" type="file" class="form-control">
                        <i class="fa fa-photo"></i><?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value]){?>更換圖片<?php }else{ ?>上傳圖片<?php }?>
                    </label>
                </div>
                <img style="width:300px;height:200px;<?php if ($_smarty_tpl->getVariable('row')->value['subject']['topStyle']=='compact'||($_smarty_tpl->getVariable('row')->value['subject']['topStyle']!='compact'&&!$_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value])||$_smarty_tpl->getVariable('G')->value!==0){?>display: none;<?php }else{ ?>display: block;<?php }?>" class="img-thumbnail1" id="previews_<?php echo $_smarty_tpl->getVariable('img')->value;?>
" src="<?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value]){?>/CustomStickers/upload/image/<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value];?>
<?php }?>"/>
                <div class="card-body" style="margin-top:5px;width:300px;display:inline-block;">
                    <input name="fields[subject][subtitle<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" type="text" maxlength="80" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('subtitle')->value];?>
" class="form-control" style="<?php if ($_smarty_tpl->getVariable('G')->value!==0){?>width:210px;<?php }?>" placeholder="標題">
                    <textarea name="fields[subject][subcontent<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" rows="1" maxlength="80" class="form-control" style="margin-top:5px;<?php if ($_smarty_tpl->getVariable('G')->value!==0){?>width:210px;<?php }?>" placeholder="描述"><?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('subcontent')->value];?>
</textarea>
                    <div class="card-button">
                        <?php $_smarty_tpl->tpl_vars['N'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['N']->step = (0 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['N']->total = (int)ceil(($_smarty_tpl->tpl_vars['N']->step > 0 ? 0+1 - 0 : 0-(0)+1)/abs($_smarty_tpl->tpl_vars['N']->step));
if ($_smarty_tpl->tpl_vars['N']->total > 0){
for ($_smarty_tpl->tpl_vars['N']->value = 0, $_smarty_tpl->tpl_vars['N']->iteration = 1;$_smarty_tpl->tpl_vars['N']->iteration <= $_smarty_tpl->tpl_vars['N']->total;$_smarty_tpl->tpl_vars['N']->value += $_smarty_tpl->tpl_vars['N']->step, $_smarty_tpl->tpl_vars['N']->iteration++){
$_smarty_tpl->tpl_vars['N']->first = $_smarty_tpl->tpl_vars['N']->iteration == 1;$_smarty_tpl->tpl_vars['N']->last = $_smarty_tpl->tpl_vars['N']->iteration == $_smarty_tpl->tpl_vars['N']->total;?>
                        <?php $_smarty_tpl->assign("subject",smarty_modifier_cat(smarty_modifier_cat(smarty_modifier_cat("subject",$_smarty_tpl->getVariable('G')->value),"_"),$_smarty_tpl->getVariable('N')->value),null,null);?>
                        <?php $_smarty_tpl->assign("action",smarty_modifier_cat(smarty_modifier_cat(smarty_modifier_cat("action",$_smarty_tpl->getVariable('G')->value),"_"),$_smarty_tpl->getVariable('N')->value),null,null);?>
                        <?php $_smarty_tpl->assign("data",smarty_modifier_cat(smarty_modifier_cat(smarty_modifier_cat("data",$_smarty_tpl->getVariable('G')->value),"_"),$_smarty_tpl->getVariable('N')->value),null,null);?>
                            <div class="button-group" style="">
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
                                    <option value="postback" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('action')->value]=='postback'){?>selected<?php }?>>背景處理</option>
                                </select>
                                <input name="fields[subject][data<?php echo $_smarty_tpl->getVariable('G')->value;?>
_<?php echo $_smarty_tpl->getVariable('N')->value;?>
]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('data')->value];?>
" class="form-control" style="width:35%;display:inline-block;margin-top:5px;" placeholder="內容">
                            </div>
                        <?php }} ?>
                    </div>
                </div>
                <img style="<?php if ($_smarty_tpl->getVariable('G')->value!==0){?>margin-left:-90px;<?php }?>width:90px;height:60px;vertical-align:35px;<?php if ((($_smarty_tpl->getVariable('row')->value['subject']['topStyle']!='compact'||($_smarty_tpl->getVariable('row')->value['subject']['topStyle']=='compact'&&!$_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value]))&&$_smarty_tpl->getVariable('G')->value===0)||(!$_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value]&&$_smarty_tpl->getVariable('G')->value!==0)){?>display: none;<?php }?>" class="img-thumbnail1" id="previewsList_<?php echo $_smarty_tpl->getVariable('img')->value;?>
" src="<?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value]){?>/CustomStickers/upload/image/<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value];?>
<?php }?>"/>
            </div>
        <?php }} ?>
    </div>
</div>

<br><br><label for="BottomBtn">底部按鈕</label>
<div class="button-group" style="width:300px;">
    <input name="fields[subject][bottomSubject]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['bottomSubject'];?>
" class="form-control" style="margin-top:5px;" placeholder="按鈕">
    <select name="fields[subject][bottomAction]" class="form-control select2" style="margin-top:5px;">
        <option value="" disabled>請選擇動作</option>
        <option value="noaction" <?php if ($_smarty_tpl->getVariable('row')->value['subject']['bottomAction']=='noaction'){?>selected<?php }?>>不設定動作</option>
        <option value="hyperlink" <?php if ($_smarty_tpl->getVariable('row')->value['subject']['bottomAction']=='hyperlink'){?>selected<?php }?>>超連結動作</option>
        <option value="text" <?php if ($_smarty_tpl->getVariable('row')->value['subject']['bottomAction']=='text'){?>selected<?php }?>>文字</option>
        <option value="postback" <?php if ($_smarty_tpl->getVariable('row')->value['subject']['bottomAction']=='postback'){?>selected<?php }?>>背景處理</option>
    </select>
    <input name="fields[subject][bottomData]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['bottomData'];?>
" class="form-control" style="margin-top:5px;" placeholder="內容">
</div>

<script>
    function topStyleChg(e){
        var Ctn = 'img0';
        if(e || $('#previewsList_'+Ctn).attr('src')){
            switch($('input[name="fields[subject][topStyle]"]:checked').val()){
                case 'large':
                    $('#previewsList_'+Ctn).parent().find('.card-body>input').css('width', '300px');
                    $('#previewsList_'+Ctn).parent().find('.card-body>textarea').css('width', '300px');
                    $('#previews_'+Ctn).css('display', 'block');
                    $('#previewsList_'+Ctn).css('margin-left', '0px').hide();
                    break;
                case 'compact':
                    $('#previewsList_'+Ctn).parent().find('.card-body>input').css('width', '210px');
                    $('#previewsList_'+Ctn).parent().find('.card-body>textarea').css('width', '210px');
                    $('#previews_'+Ctn).hide();
                    $('#previewsList_'+Ctn).css('margin-left', '-90px').show();
                    break;
            }
        }else{
            $('#previewsList_'+Ctn).parent().find('.card-body>input').css('width', '300px');
            $('#previewsList_'+Ctn).parent().find('.card-body>textarea').css('width', '300px');
            $('#previews_'+Ctn).hide();
            $('#previewsList_'+Ctn).css('margin-left', '0px').hide();
        }
        if(e){
            if(e.target && e.target.result){
                $('#previews_'+Ctn).attr('src', e.target.result);
                $('#previewsList_'+Ctn).attr('src', e.target.result);
            }else{
                $('#previews_'+Ctn).attr('src', '').hide();
                $('#previewsList_'+Ctn).attr('src', '').hide();
                $('#previewsList_'+Ctn).parent().find('.card-body>input').css('width', '300px');
                $('#previewsList_'+Ctn).parent().find('.card-body>textarea').css('width', '300px');
            }
        }
    }
</script>
<?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicFunc')->value,'/SortJs.php'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
