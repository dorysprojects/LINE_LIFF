<?php /* Smarty version Smarty3-b7, created on 2021-01-20 15:36:25
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/fb_mediatemplate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1428660636007dd79919ec3-25154733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76e138e74db854fe79afaa3c44f805e7d7e3f4a8' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/fb_mediatemplate.tpl',
      1 => 1611122077,
    ),
  ),
  'nocache_hash' => '1428660636007dd79919ec3-25154733',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.cat.php';
?><div class="TemplateContainer" style="overflow:auto;background-color:#fff;border:none;">
    <div class="TemplateSlider">
        <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (0 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 0+1 - 0 : 0-(0)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
            <?php $_smarty_tpl->assign("subtitle",smarty_modifier_cat("subtitle",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <?php $_smarty_tpl->assign("subcontent",smarty_modifier_cat("subcontent",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <?php $_smarty_tpl->assign("type",smarty_modifier_cat("type",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <?php $_smarty_tpl->assign("img",smarty_modifier_cat("img",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <div class="Template" style="margin: 10px;">
                <div class="TemplateBtn" style="height:35px;">
                    <label class="btn btn-info">
                        <input id="SubjectType<?php echo $_smarty_tpl->getVariable('G')->value;?>
" type="hidden" name="fields[subject][type<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value];?>
">
                        <input type="hidden" name="fields[subject][img<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value];?>
">
                        <input style="display:none;" id="FILES_<?php echo $_smarty_tpl->getVariable('img')->value;?>
" accept="image/*,video/*" name="<?php echo $_smarty_tpl->getVariable('img')->value;?>
" onchange="if (this.files && this.files[0]) {
                                    var fileType = this.files[0].type.split('/');
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        $('#SubjectType<?php echo $_smarty_tpl->getVariable('G')->value;?>
').val(fileType[0]);
                                        switch(fileType[0]){
                                            case 'image':
                                                $('#previews_video_<?php echo $_smarty_tpl->getVariable('img')->value;?>
').hide();
                                                $('#previews_image_<?php echo $_smarty_tpl->getVariable('img')->value;?>
').attr('src', e.target.result).show();
                                                break;
                                            case 'video':
                                                $('#previews_image_<?php echo $_smarty_tpl->getVariable('img')->value;?>
').hide();
                                                $('#previews_video_<?php echo $_smarty_tpl->getVariable('img')->value;?>
 source').attr('src', e.target.result);
                                                $('#previews_video_<?php echo $_smarty_tpl->getVariable('img')->value;?>
')[0].load();
                                                $('#previews_video_<?php echo $_smarty_tpl->getVariable('img')->value;?>
').show();
                                                break;
                                        }
                                    };
                                    reader.readAsDataURL(this.files[0]);
                                }else{
                                    $('#SubjectType<?php echo $_smarty_tpl->getVariable('G')->value;?>
').val('');
                                    $('#previews_image_<?php echo $_smarty_tpl->getVariable('img')->value;?>
').attr('src', '').hide();
                                    $('#previews_video_<?php echo $_smarty_tpl->getVariable('img')->value;?>
').attr('src', '').hide();
                                }" type="file" class="form-control">
                        <i class="fa fa-photo"></i><?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value]){?>更換圖片、影片<?php }else{ ?>上傳圖片、影片<?php }?>
                    </label>
                </div>
                <img style="width:300px;height:200px;<?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]!='image'||!$_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value]){?>display: none;<?php }?>" class="img-thumbnail1" id="previews_image_<?php echo $_smarty_tpl->getVariable('img')->value;?>
" src="<?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='image'&&$_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value]){?>/CustomStickers/upload/image/<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value];?>
<?php }?>"/>
                <video style="width:300px;height:200px;<?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]!='video'||!$_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value]){?>display: none;<?php }?>" class="img-thumbnail1" id="previews_video_<?php echo $_smarty_tpl->getVariable('img')->value;?>
" controls><source src="<?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='video'&&$_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value]){?>/CustomStickers/upload/video/<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('img')->value];?>
<?php }?>"></video>
                <div class="card-body" style="margin-top:5px;width:300px;">
                    <div class="card-button">
                        <?php $_smarty_tpl->tpl_vars['N'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['N']->step = (2 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['N']->total = (int)ceil(($_smarty_tpl->tpl_vars['N']->step > 0 ? 2+1 - 0 : 0-(2)+1)/abs($_smarty_tpl->tpl_vars['N']->step));
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
            </div>
        <?php }} ?>
    </div>
</div>
