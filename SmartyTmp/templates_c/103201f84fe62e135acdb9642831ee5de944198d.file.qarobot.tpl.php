<?php /* Smarty version Smarty3-b7, created on 2022-08-16 10:03:50
         compiled from "/home1/bot.gadclubs.com/library/modules/_public/view/type/qarobot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180845647262fafb06509c12-04948366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '103201f84fe62e135acdb9642831ee5de944198d' => 
    array (
      0 => '/home1/bot.gadclubs.com/library/modules/_public/view/type/qarobot.tpl',
      1 => 1614158006,
    ),
  ),
  'nocache_hash' => '180845647262fafb06509c12-04948366',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.cat.php';
?><link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/TagsInput/jquery.tagsinput.css">
<script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/TagsInput/jquery.tagsinput.js"></script>

<div class="form-group">
    <div class="" style="text-align: left;">
        <div>*<label>問題</label></div>
        <div class="TemplateContainer" style="overflow:auto;background-color:#fff;border: none;">
            <div class="TemplateSlider" style="width:3200px;">
                <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (9 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 9+1 - 0 : 0-(9)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                    <?php $_smarty_tpl->assign("question",smarty_modifier_cat("question",$_smarty_tpl->getVariable('G')->value),null,null);?>
                    <?php $_smarty_tpl->assign("type",smarty_modifier_cat("type",$_smarty_tpl->getVariable('G')->value),null,null);?>
                    <?php $_smarty_tpl->assign("option",smarty_modifier_cat("option",$_smarty_tpl->getVariable('G')->value),null,null);?>
                    <div class="col-lg-4 Template" style="display:inline-block;width:300px;margin: 10px;text-align:center;">
                        <div class="TemplateBtn" style="width:300px;height:35px;">
                            <span class="label label-success" style="padding:10px;float:left;">問題<?php echo $_smarty_tpl->getVariable('G')->value+1;?>
</span>
                            <?php if ($_smarty_tpl->getVariable('G')->value!==0){?>
                                <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeQuestionVal('left','<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-arrow-left"></i></span>
                            <?php }?>
                            <?php if ($_smarty_tpl->getVariable('G')->value!==9){?>
                                <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeQuestionVal('right','<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-arrow-right"></i></span>
                            <?php }?>
                            <span class="btn btn-sm label label-danger" style="padding:10px;float:left;margin-left:5px;" onclick="ClearQuestionData('<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-trash"></i></span>
                        </div>
                        <div class="card-body" style="margin-top:5px;">
                            <input name="fields[subject][question<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" type="text" maxlength="80" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('question')->value];?>
" class="form-control" style="width:300px;margin-top:5px;" placeholder="輸入問題">
                            <select name="fields[subject][type<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" class="form-control Q_Type" style="width:300px;margin:5px 0px;" onchange="var ThisId=$(this).parent().find('.InputTag')[0].id;if($(this).val()==='radio' || $(this).val()==='checkbox' || $(this).val()==='select'){ $('#'+ThisId+'_tagsinput').removeClass('hide'); }else{ $('#'+ThisId+'_tagsinput').addClass('hide'); }">
                                <option value="">請選擇問題類型</option>
                                <option value="text" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='text'){?>selected<?php }?>>文字</option>
                                <option value="number" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='number'){?>selected<?php }?>>數字</option>
                                <option value="date" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='date'){?>selected<?php }?>>日期</option>
                                <option value="time" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='time'){?>selected<?php }?>>時間</option>
                                <option value="datetime" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='datetime'){?>selected<?php }?>>日期時間</option>
                                <option value="phone" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='phone'){?>selected<?php }?>>手機</option>
                                <option value="email" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='email'){?>selected<?php }?>>信箱</option>
                                <option value="location" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='location'){?>selected<?php }?>>地址</option>
                                <option value="radio" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='radio'){?>selected<?php }?>>單選</option>
                                <option value="checkbox" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='checkbox'){?>selected<?php }?>>多選</option>
                                <option value="select" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='select'){?>selected<?php }?>>下拉選單</option>
                                <option value="image" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='image'){?>selected<?php }?>>照片</option>
                                <option value="video" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='video'){?>selected<?php }?>>影片</option>
                                <option value="audio" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='audio'){?>selected<?php }?>>語音</option>
                                <option value="file" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='file'){?>selected<?php }?>>檔案</option>
                            </select>
                            <textarea name="fields[subject][option<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" class="form-control InputTag" style="width:300px;margin-top:5px;"><?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('option')->value];?>
</textarea>
                        </div>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('.InputTag').tagsInput({
            'onAddTag': function(tag){
                var tagList = tag.split(",");
                if(tagList.length>1){
                    $(this).removeTag(tag);
                }
                if($('#'+$(this)[0].id+'_tagsinput span.tag').length > 10){
                    $(this).removeTag(tag);
                }
            },
            'height': 'auto',
            'width': '300px',
            'interactive': true,
            'defaultText': '請貼上以「,」分隔的字串',
            'delimiter': [","], // Or a string with a single delimiter. Ex: ';'
            'removeWithBackspace': true,
            'minChars': 0,
            'maxChars': 0, // if not provided there is no limit
            'maxNumTags': 10,
            'placeholderColor': '#666666'
        });
        $('.Q_Type').change();
    });
    function ChangeQuestionVal(direction, Ctn){
        var NowCtn = Ctn*1;
        var Now_question = $("input[name='fields[subject][question"+ NowCtn +"]']").val();
        var Now_type = $("select[name='fields[subject][type"+ NowCtn +"]']").val();
        var Now_option = $("textarea[name='fields[subject][option"+ NowCtn +"]']").val();
        var Now_tagsId = $("textarea[name='fields[subject][option"+ NowCtn +"]']")[0].id;
        var Now_tagsinput = $('#'+Now_tagsId+'_tagsinput');
        
        if(direction==='right'){
            var NextCtn = NowCtn+1;
            var Next_question = $("input[name='fields[subject][question"+ NextCtn +"]']").val();
            var Next_type = $("select[name='fields[subject][type"+ NextCtn +"]']").val();
            var Next_option = $("textarea[name='fields[subject][option"+ NextCtn +"]']").val();
            var Next_tagsId = $("textarea[name='fields[subject][option"+ NextCtn +"]']")[0].id;
            var Next_tagsinput = $('#'+Next_tagsId+'_tagsinput');
            
            $("input[name='fields[subject][question"+ NowCtn +"]']").val(Next_question);
            $("select[name='fields[subject][type"+ NowCtn +"]']").val(Next_type);
            $("textarea[name='fields[subject][option"+ NowCtn +"]']").val(Next_option).attr('id', Next_tagsId).parent().append(Next_tagsinput);
            
            $("input[name='fields[subject][question"+ NextCtn +"]']").val(Now_question);
            $("select[name='fields[subject][type"+ NextCtn +"]']").val(Now_type);
            $("textarea[name='fields[subject][option"+ NextCtn +"]']").val(Now_option).attr('id', Now_tagsId).parent().append(Now_tagsinput);
        }else{
            var PrevCtn = NowCtn-1;
            var Prev_question = $("input[name='fields[subject][question"+ PrevCtn +"]']").val();
            var Prev_type = $("select[name='fields[subject][type"+ PrevCtn +"]']").val();
            var Prev_option = $("textarea[name='fields[subject][option"+ PrevCtn +"]']").val();
            var Prev_tagsId = $("textarea[name='fields[subject][option"+ PrevCtn +"]']")[0].id;
            var Prev_tagsinput = $('#'+Prev_tagsId+'_tagsinput');
            
            $("input[name='fields[subject][question"+ PrevCtn +"]']").val(Now_question);
            $("select[name='fields[subject][type"+ PrevCtn +"]']").val(Now_type);
            $("textarea[name='fields[subject][option"+ PrevCtn +"]']").val(Now_option).attr('id', Now_tagsId).parent().append(Now_tagsinput);
            
            $("input[name='fields[subject][question"+ NowCtn +"]']").val(Prev_question);
            $("select[name='fields[subject][type"+ NowCtn +"]']").val(Prev_type);
            $("textarea[name='fields[subject][option"+ NowCtn +"]']").val(Prev_option).attr('id', Prev_tagsId).parent().append(Prev_tagsinput);
        }
    }
    function ClearQuestionData(Ctn){
        $("input[name='fields[subject][question"+ Ctn +"]']").val('');
        $("select[name='fields[subject][type"+ Ctn +"]']").val('');
        $("textarea[name='fields[subject][option"+ Ctn +"]']").val('');
        $('#'+$("textarea[name='fields[subject][option"+ Ctn +"]']")[0].id+'_tagsinput>span.tag').remove();
    }
</script>