<?php /* Smarty version Smarty3-b7, created on 2022-08-10 09:34:37
         compiled from "/home1/bot.gadclubs.com//library/modules/_public/view/type/message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152849073262f30b2dbf5305-53522255%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c98e9c47c52742a354a157ef24124605548b24f8' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/_public/view/type/message.tpl',
      1 => 1660095257,
    ),
  ),
  'nocache_hash' => '152849073262f30b2dbf5305-53522255',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.cat.php';
if (!is_callable('smarty_modifier_date_format')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.date_format.php';
?><style>
    .btn-bordered {
        background: none;
        color: #d43f3a;
        border-radius: 50px;
        float: right;
        margin-top: 0.75em;
        margin-right: 1.5em;
    }
    .card-button .select2 .facebook {
        display: none;
    }
    .card-button .select2 .line.facebook {
        display: block;
    }
    .nav-tabs {
        overflow-x: auto;
        overflow-y: hidden;
        display: flex;
    }
    .nav-tabs>li {
        float: none;
        display: table-cell;
    }
    .nav-tabs>li.active>a {
        background-color: #efefff!important;
    }

    .ImgType>ul, .EmojiType>ul, #emoticon>ul, #kaomoji>ul {
        padding: 15px;
        min-height: 300px;
        overflow: auto;
        width: 100%;
    }
</style>
<label>設定訊息</label>
<div class="TemplateContainer" style="overflow:auto;">
    <div class="TemplateSlider" style="width:1625px;">
        <?php if (!$_smarty_tpl->getVariable('notify')->value){?>
            <?php $_smarty_tpl->assign("MsgMax",4,null,null);?>
        <?php }else{ ?>
            <?php $_smarty_tpl->assign("MsgMax",2,null,null);?>
        <?php }?>
        <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = ($_smarty_tpl->getVariable('MsgMax')->value - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? $_smarty_tpl->getVariable('MsgMax')->value+1 - 0 : 0-($_smarty_tpl->getVariable('MsgMax')->value)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
            <?php $_smarty_tpl->assign("type",smarty_modifier_cat("type_",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <?php $_smarty_tpl->assign("value",smarty_modifier_cat("value_",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <div class="col-lg-4 Template" style="display:inline-block;width:300px;margin: 10px;text-align:center;">
                <div class="TemplateBtn" style="width:300px;height:35px;">
                    <span class="label label-success" style="padding:10px;float:left;">訊息 <?php echo $_smarty_tpl->getVariable('G')->value+1;?>
</span>
                    <div id="EditMsg<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="btn btn-success" style="float:right;" msgctn="<?php echo $_smarty_tpl->getVariable('G')->value;?>
" onclick="EditMsg(<?php echo $_smarty_tpl->getVariable('G')->value;?>
);">編輯訊息</div>
                    <?php if (!$_smarty_tpl->getVariable('notify')->value){?>
                        <?php if ($_smarty_tpl->getVariable('G')->value!==0){?>
                            <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeVal('left','<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-arrow-left"></i></span>
                        <?php }?>
                        <?php if ($_smarty_tpl->getVariable('G')->value!==4){?>
                            <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeVal('right','<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-arrow-right"></i></span>
                        <?php }?>
                    <?php }?>
                    <span id="DeleteMsg_<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="btn btn-sm label label-danger" style="padding:10px;float:left;margin-left:5px;" onclick="$('#ResetMsg_<?php echo $_smarty_tpl->getVariable('G')->value;?>
').click();$('#MsgType<?php echo $_smarty_tpl->getVariable('G')->value;?>
').val('');"><i class="fa fa-fw fa-trash"></i></span>
                    <span id="ResetMsg_<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="hide" onclick="$('#FILES_img<?php echo $_smarty_tpl->getVariable('G')->value;?>
').val('');$('#FILES_video<?php echo $_smarty_tpl->getVariable('G')->value;?>
').val('');$('#FILES_audio<?php echo $_smarty_tpl->getVariable('G')->value;?>
').val('');$('#SaveMsg<?php echo $_smarty_tpl->getVariable('G')->value;?>
').val('');$('#msgview<?php echo $_smarty_tpl->getVariable('G')->value;?>
').html('').removeClass('Message').removeClass('FB');"></span>
                </div>
                <div class="card-body" style="margin-top:5px;">
                    <div class="card-button">
                        <div id="BtnGrp<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="button-group" msgctn="<?php echo $_smarty_tpl->getVariable('G')->value;?>
" style="width:300px;">
                            <select id="MsgType<?php echo $_smarty_tpl->getVariable('G')->value;?>
" name="fields[subject][type_<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" msgctn="<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="form-control select2" style="margin-top:5px;" onchange="$('#ResetMsg_<?php echo $_smarty_tpl->getVariable('G')->value;?>
').click();$('#EditMsg<?php echo $_smarty_tpl->getVariable('G')->value;?>
').click();">
                                <option value="">請選擇訊息格式</option>
                                <?php if (!$_smarty_tpl->getVariable('notify')->value||($_smarty_tpl->getVariable('notify')->value&&$_smarty_tpl->getVariable('G')->value==0)){?>
                                    <option class="line facebook" value="text" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='text'){?>selected<?php }?>>文字</option>
                                <?php }?>
                                <?php if ((!$_smarty_tpl->getVariable('notify')->value||($_smarty_tpl->getVariable('notify')->value&&$_smarty_tpl->getVariable('G')->value==1))&&!$_smarty_tpl->getVariable('UrlMsg')->value){?>
                                    <option class="line" value="sticker" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='sticker'){?>selected<?php }?>>貼圖</option>
                                <?php }?>
                                <?php if (!$_smarty_tpl->getVariable('notify')->value){?>
                                    <?php if ($_smarty_tpl->getVariable('authority_ImageMap')->value){?><option class="line" value="imagemap" <?php if (!$_smarty_tpl->getVariable('rows_ImageMap')->value){?>disabled<?php }?> <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='imagemap'){?>selected<?php }?>>圖文訊息</option><?php }?>
                                    <?php if ($_smarty_tpl->getVariable('authority_LineTemplate')->value){?><option class="line" value="linetemplate" <?php if (!$_smarty_tpl->getVariable('rows_LineTemplate')->value){?>disabled<?php }?> <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='linetemplate'){?>selected<?php }?>>卡片式選單</option><?php }?>
                                    <?php if ($_smarty_tpl->getVariable('authority_ImageCarousel')->value){?><option class="line" value="imagecarousel" <?php if (!$_smarty_tpl->getVariable('rows_ImageCarousel')->value){?>disabled<?php }?> <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='imagecarousel'){?>selected<?php }?>>大圖選單</option><?php }?>
                                    
                                    <?php if ($_smarty_tpl->getVariable('authority_FB_Template')->value){?><option class="facebook" value="fb_template" <?php if (!$_smarty_tpl->getVariable('rows_FB_Template')->value){?>disabled<?php }?> <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='fb_template'){?>selected<?php }?>>一般型卡片</option><?php }?>
                                    <?php if ($_smarty_tpl->getVariable('authority_FB_ListTemplate')->value){?><!--<option class="facebook" value="fb_listtemplate" <?php if (!$_smarty_tpl->getVariable('rows_FB_ListTemplate')->value){?>disabled<?php }?> <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='fb_listtemplate'){?>selected<?php }?>>清單卡片(已停用)</option>--><?php }?>
                                    <?php if ($_smarty_tpl->getVariable('authority_FB_BtnTemplate')->value){?><option class="facebook" value="fb_btntemplate" <?php if (!$_smarty_tpl->getVariable('rows_FB_BtnTemplate')->value){?>disabled<?php }?> <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='fb_btntemplate'){?>selected<?php }?>>按鈕卡片</option><?php }?>
                                    <?php if ($_smarty_tpl->getVariable('authority_FB_SocialTemplate')->value){?><!--<option class="facebook" value="fb_socialtemplate" <?php if (!$_smarty_tpl->getVariable('rows_FB_SocialTemplate')->value){?>disabled<?php }?> <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='fb_socialtemplate'){?>selected<?php }?>>社交卡片(已停用)</option>--><?php }?>
                                    <?php if ($_smarty_tpl->getVariable('authority_FB_MediaTemplate')->value){?><option class="facebook" value="fb_mediatemplate" <?php if (!$_smarty_tpl->getVariable('rows_FB_MediaTemplate')->value){?>disabled<?php }?> <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='fb_mediatemplate'){?>selected<?php }?>>媒體卡片</option><?php }?>
                                    <?php if ($_smarty_tpl->getVariable('authority_FB_ReceiptTemplate')->value){?><option class="facebook" value="fb_receipttemplate" <?php if (!$_smarty_tpl->getVariable('rows_FB_ReceiptTemplate')->value){?>disabled<?php }?> <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='fb_receipttemplate'){?>selected<?php }?>>收據卡片</option><?php }?>
                                    <?php if ($_smarty_tpl->getVariable('authority_FB_AirlineTemplate')->value){?><!--<option class="facebook" value="fb_airlinetemplate" <?php if (!$_smarty_tpl->getVariable('rows_FB_AirlineTemplate')->value){?>disabled<?php }?> <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='fb_airlinetemplate'){?>selected<?php }?>>航班卡片(暫不開發)</option>--><?php }?>
                                    <?php if ($_smarty_tpl->getVariable('authority_FB_ProductTemplate')->value){?><!--<option class="facebook" value="fb_producttemplate" <?php if (!$_smarty_tpl->getVariable('rows_FB_ProductTemplate')->value){?>disabled<?php }?> <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='fb_producttemplate'){?>selected<?php }?>>產品卡片(暫不開發)</option>--><?php }?>
                                <?php }?>
                                <?php if (!$_smarty_tpl->getVariable('notify')->value||($_smarty_tpl->getVariable('notify')->value&&$_smarty_tpl->getVariable('G')->value==2)){?>
                                    <option class="line facebook" value="image" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='image'){?>selected<?php }?>>照片</option>
                                <?php }?>
                                <?php if (!$_smarty_tpl->getVariable('notify')->value){?>
                                    <option class="line facebook" value="video" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='video'){?>selected<?php }?>>影片</option>
                                    <option class="line facebook" value="audio" <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='audio'){?>selected<?php }?>>語音訊息</option>
                                    <?php if ($_smarty_tpl->getVariable('authority_CustomMessage')->value){?><option class="line" value="custom" <?php if (!$_smarty_tpl->getVariable('rows_CustomMessage')->value){?>disabled<?php }?> <?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('type')->value]=='custom'){?>selected<?php }?>>自訂訊息</option><?php }?>
                                <?php }?>
                            </select>
                            <textarea id="SaveMsg<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="form-control hide" style="margin-top:5px;" rows="1" name="fields[subject][value_<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" msgctn="<?php echo $_smarty_tpl->getVariable('G')->value;?>
" placeholder="內容<?php echo $_smarty_tpl->getVariable('G')->value+1;?>
"><?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('value')->value];?>
</textarea>
                            <div id="msgview<?php echo $_smarty_tpl->getVariable('G')->value;?>
" style="margin-top: 10px;" class="msgview" onclick="$('#EditMsg<?php echo $_smarty_tpl->getVariable('G')->value;?>
').click();"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }} ?>
    </div>
</div>
<?php if ($_smarty_tpl->getVariable('authority_QuicklyReply')->value&&!$_smarty_tpl->getVariable('notify')->value){?>
    <label>設定快捷語</label>
    <div class="TemplateContainer">
        <div class="col-lg-4 Template" style="display:inline-block;width:300px;margin: 10px;text-align:center;float:none;">
            <div class="TemplateBtn" style="width:300px;height:35px;">
                <span class="label label-success" style="padding:10px;float:left;">快捷語</span>
                <?php if ($_smarty_tpl->getVariable('rows_QuicklyReply')->value){?>
                    <div id="EditMsg5" class="btn btn-success" style="float:right;" msgctn="5" onclick="EditMsg(5);">編輯快捷語</div>
                <?php }else{ ?>
                    <div id="EditMsg5" class="btn btn-default" style="float:right;cursor:default;" msgctn="5">編輯快捷語</div>
                <?php }?>
                <span class="label label-danger" style="padding:10px;float:left;margin-left:5px;" onclick="$('#SaveMsg5').val('');$('#msgview5').html('');"><i class="fa fa-fw fa-trash"></i></span>
            </div>
            <div class="card-body" style="margin-top:5px;">
                <div class="card-button">
                    <div id="BtnGrp5" class="button-group" msgctn="5" style="width:300px;">
                        <textarea id="SaveMsg5" class="form-control hide" style="margin-top:5px;" rows="1" name="fields[subject][QuicklyReply]" msgctn="5" placeholder="快捷語"><?php echo $_smarty_tpl->getVariable('row')->value['subject']['QuicklyReply'];?>
</textarea>
                        <div id="msgview5" style="margin-top: 10px;" class="msgview" onclick="$('#EditMsg5').click();"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/flex/main.js?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
"></script>
<script>
    var SelectMsg = '', emoticonList=<?php echo json_encode($_smarty_tpl->getVariable('emoticonList')->value);?>
;
    var CompareList = {};
    function ChangeVal(direction, Ctn){ //left、right，0~5
        var NowCtn = Ctn*1;
        var Now_Type = $('#MsgType'+NowCtn).val();
        var Now_Msg= $('#SaveMsg'+NowCtn).val();
        var Now_view = $('#msgview'+NowCtn).html();
        var Now_UploadImage = $('#UploadImage'+NowCtn);
        var Now_UploadVideo = $('#UploadVideo'+NowCtn);
        var Now_UploadAudio = $('#UploadAudio'+NowCtn);
        
        if(direction==='right'){
            var NextCtn = NowCtn+1;
            var Next_Type = $('#MsgType'+NextCtn).val();
            var Next_Msg= $('#SaveMsg'+NextCtn).val();
            var Next_view = $('#msgview'+NextCtn).html();
            var Next_UploadImage = $('#UploadImage'+NextCtn);
            var Next_UploadVideo = $('#UploadVideo'+NextCtn);
            var Next_UploadAudio = $('#UploadAudio'+NextCtn);
            
            $('#MsgType'+NowCtn).val(Next_Type);
            $('#SaveMsg'+NowCtn).val(Next_Msg);
            $('#msgview'+NowCtn).html(Next_view);
            if(Next_Type==='text' || Next_Type==='sticker'){
                $('#msgview'+NowCtn).addClass('Message');
                if($('.TemplateContainer.FB')[0]){
                    $('#msgview'+NowCtn).addClass('FB');
                }else{
                    $('#msgview'+NowCtn).removeClass('FB');
                }
            }else{
                $('#msgview'+NowCtn).removeClass('Message');
                if($('.TemplateContainer.FB')[0]){
                    $('#msgview'+NowCtn).removeClass('FB');
                }else{
                    $('#msgview'+NowCtn).removeClass('FB');
                }
            }
            Now_UploadImage.attr('id', 'UploadImage'+NextCtn);
            Now_UploadImage.find('label input').attr('id', 'FILES_img'+NextCtn).attr('name', 'value_'+NextCtn).attr('onchange', "init_inputImage(this, '"+NextCtn+"');");
            Now_UploadImage.find('img').attr('id', 'previews_img'+NextCtn);
            Now_UploadVideo.attr('id', 'UploadVideo'+NextCtn);
            Now_UploadVideo.find('label input').attr('id', 'FILES_video'+NextCtn).attr('name', 'value_'+NextCtn).attr('onchange', "init_inputVideo(this, '"+NextCtn+"');");
            Now_UploadVideo.find('video').attr('id', 'previews_video'+NextCtn);
            Now_UploadAudio.attr('id', 'UploadAudio'+NextCtn);
            Now_UploadAudio.find('label input').attr('id', 'FILES_audio'+NextCtn).attr('name', 'value_'+NextCtn).attr('onchange', "init_inputAudio(this, '"+NextCtn+"');");
            Now_UploadAudio.find('audio').attr('id', 'previews_audio'+NextCtn);
            
            $('#MsgType'+NextCtn).val(Now_Type);
            $('#SaveMsg'+NextCtn).val(Now_Msg);
            $('#msgview'+NextCtn).html(Now_view);
            if(Now_Type==='text' || Now_Type==='sticker'){
                $('#msgview'+NextCtn).addClass('Message');
                if($('.TemplateContainer.FB')[0]){
                    $('#msgview'+NextCtn).addClass('FB');
                }else{
                    $('#msgview'+NextCtn).removeClass('FB');
                }
            }else{
                $('#msgview'+NextCtn).removeClass('Message');
                if($('.TemplateContainer.FB')[0]){
                    $('#msgview'+NextCtn).removeClass('FB');
                }else{
                    $('#msgview'+NextCtn).removeClass('FB');
                }
            }
            Next_UploadImage.attr('id', 'UploadImage'+NowCtn);
            Next_UploadImage.find('label input').attr('id', 'FILES_img'+NowCtn).attr('name', 'value_'+NowCtn).attr('onchange', "init_inputImage(this, '"+NowCtn+"');");
            Next_UploadImage.find('img').attr('id', 'previews_img'+NowCtn);
            Next_UploadVideo.attr('id', 'UploadVideo'+NowCtn);
            Next_UploadVideo.find('label input').attr('id', 'FILES_video'+NowCtn).attr('name', 'value_'+NowCtn).attr('onchange', "init_inputVideo(this, '"+NowCtn+"');");
            Next_UploadVideo.find('video').attr('id', 'previews_video'+NowCtn);
            Next_UploadAudio.attr('id', 'UploadAudio'+NowCtn);
            Next_UploadAudio.find('label input').attr('id', 'FILES_audio'+NowCtn).attr('name', 'value_'+NowCtn).attr('onchange', "init_inputAudio(this, '"+NowCtn+"');");
            Next_UploadAudio.find('audio').attr('id', 'previews_audio'+NowCtn);
        }else{
            var PrevCtn = NowCtn-1;
            var Prev_Type = $('#MsgType'+PrevCtn).val();
            var Prev_Msg= $('#SaveMsg'+PrevCtn).val();
            var Prev_view = $('#msgview'+PrevCtn).html();
            var Prev_UploadImage = $('#UploadImage'+PrevCtn);
            var Prev_UploadVideo = $('#UploadVideo'+PrevCtn);
            var Prev_UploadAudio = $('#UploadAudio'+PrevCtn);
            
            $('#MsgType'+PrevCtn).val(Now_Type);
            $('#SaveMsg'+PrevCtn).val(Now_Msg);
            $('#msgview'+PrevCtn).html(Now_view);
            if(Now_Type==='text' || Now_Type==='sticker'){
                $('#msgview'+PrevCtn).addClass('Message');
                if($('.TemplateContainer.FB')[0]){
                    $('#msgview'+PrevCtn).addClass('FB');
                }else{
                    $('#msgview'+PrevCtn).removeClass('FB');
                }
            }else{
                $('#msgview'+PrevCtn).removeClass('Message');
                if($('.TemplateContainer.FB')[0]){
                    $('#msgview'+PrevCtn).removeClass('FB');
                }else{
                    $('#msgview'+PrevCtn).removeClass('FB');
                }
            }
            Now_UploadImage.attr('id', 'UploadImage'+PrevCtn);
            Now_UploadImage.find('label input').attr('id', 'FILES_img'+PrevCtn).attr('name', 'value_'+PrevCtn).attr('onchange', "init_inputImage(this, '"+PrevCtn+"');");
            Now_UploadImage.find('img').attr('id', 'previews_img'+PrevCtn);
            Now_UploadVideo.attr('id', 'UploadVideo'+PrevCtn);
            Now_UploadVideo.find('label input').attr('id', 'FILES_video'+PrevCtn).attr('name', 'value_'+PrevCtn).attr('onchange', "init_inputVideo(this, '"+PrevCtn+"');");
            Now_UploadVideo.find('video').attr('id', 'previews_video'+PrevCtn);
            Now_UploadAudio.attr('id', 'UploadAudio'+PrevCtn);
            Now_UploadAudio.find('label input').attr('id', 'FILES_audio'+PrevCtn).attr('name', 'value_'+PrevCtn).attr('onchange', "init_inputAudio(this, '"+PrevCtn+"');");
            Now_UploadAudio.find('audio').attr('id', 'previews_audio'+PrevCtn);
            
            $('#MsgType'+NowCtn).val(Prev_Type);
            $('#SaveMsg'+NowCtn).val(Prev_Msg);
            $('#msgview'+NowCtn).html(Prev_view);
            if(Prev_Type==='text' || Prev_Type==='sticker'){
                $('#msgview'+NowCtn).addClass('Message');
                if($('.TemplateContainer.FB')[0]){
                    $('#msgview'+NowCtn).addClass('FB');
                }else{
                    $('#msgview'+NowCtn).removeClass('FB');
                }
            }else{
                $('#msgview'+NowCtn).removeClass('Message');
                if($('.TemplateContainer.FB')[0]){
                    $('#msgview'+NowCtn).removeClass('FB');
                }else{
                    $('#msgview'+NowCtn).removeClass('FB');
                }
            }
            Prev_UploadImage.attr('id', 'UploadImage'+NowCtn);
            Prev_UploadImage.find('label input').attr('id', 'FILES_img'+NowCtn).attr('name', 'value_'+NowCtn).attr('onchange', "init_inputImage(this, '"+NowCtn+"');");
            Prev_UploadImage.find('img').attr('id', 'previews_img'+NowCtn);
            Prev_UploadVideo.attr('id', 'UploadVideo'+NowCtn);
            Prev_UploadVideo.find('label input').attr('id', 'FILES_video'+NowCtn).attr('name', 'value_'+NowCtn).attr('onchange', "init_inputVideo(this, '"+NowCtn+"');");
            Prev_UploadVideo.find('video').attr('id', 'previews_video'+NowCtn);
            Prev_UploadAudio.attr('id', 'UploadAudio'+NowCtn);
            Prev_UploadAudio.find('label input').attr('id', 'FILES_audio'+NowCtn).attr('name', 'value_'+NowCtn).attr('onchange', "init_inputAudio(this, '"+NowCtn+"');");
            Prev_UploadAudio.find('audio').attr('id', 'previews_audio'+NowCtn);
        }
    }
    function EditMsg(ctn, action){
        SelectMsg = $('#BtnGrp'+ctn).attr('msgctn');
        var MsgType = $('#MsgType'+SelectMsg).val();
        var MsgValue = $('#SaveMsg'+SelectMsg).val();
        var MsgView = $('#msgview'+SelectMsg).html();
        
        $('#SelectMsgTitle').show();
        $('#SelectMsg').html(SelectMsg*1+1);
        $('#msgview'+SelectMsg).removeClass('Message');
        if(ctn === 5){
            var Next = '';
            $('#ShowQuicklyReplyBox .ShowValueList tbody>tr').hide();
            var QuicklyReplyKey = '';
            switch('<?php echo $_smarty_tpl->getVariable('_Module')->value;?>
'){
                case 'CrontabMsg':
                    QuicklyReplyKey = 'propertyD';
                    break;
                case 'KeyWordMsg':
                    QuicklyReplyKey = 'propertyB';
                    break;
            }
            if(QuicklyReplyKey && $('input[name="fields['+ QuicklyReplyKey +']"]')[0]){
                switch($('input[name="fields['+ QuicklyReplyKey +']"]').val()){
                    case 'line':
                        Next = 'line';
                        break;
                    case 'facebook':
                    case 'line+facebook':
                    default :
                        Next = 'facebook';
                        break;
                }
            }else{
                Next = 'line';
            }
            $('#ShowQuicklyReplyBox .ShowValueList tbody>tr[data-next="'+ Next +'"]').show();
            if($('#ShowQuicklyReplyBox .ShowValueList tbody>tr[data-type="QuicklyReply"][data-next="'+ Next +'"][data-id="'+MsgValue+'"]')[0]){
                $('#ShowQuicklyReplyBox .ShowValueList tbody>tr[data-type="QuicklyReply"][data-next="'+ Next +'"][data-id="'+MsgValue+'"]').click();
            }else{
                $('#ShowQuicklyReplyBox .ShowValueList tbody>tr[data-type="QuicklyReply"][data-next="'+ Next +'"]').eq(0).click();
            }
            if(action !== 'load'){
                $('#addQuicklyReplyBox').click();
            }
        }else{
            switch(MsgType){
                case 'text':
                    MsgValue = MsgValue.replace(/\n/g,"<br />");
                    $('#msgview'+SelectMsg).addClass('Message');
                    if($('.TemplateContainer.FB')[0]){
                        $('#msgview'+SelectMsg).addClass('FB');
                    }else{
                        $('#msgview'+SelectMsg).removeClass('FB');
                    }
                    if(action === 'load'){
                        window.setTimeout(function(){
                            EditMsg(ctn, 'loadinit');
                            $('#addTextBox').click();
                        }, 1000);
                    }else{
                        $('#'+MsgType+'Value').parent().find('.emojionearea .emojionearea-editor').html(MsgValue).focus().blur();
                        $('#addTextBox').click();
                        UpdateMsg(SelectMsg, (action==='loadinit')?action:'hand');
                    }
                    break;
                case 'sticker':
                    $('#msgview'+SelectMsg).addClass('Message');
                    if(!$('.TemplateContainer.FB')[0]){
                        $('#msgview'+SelectMsg).removeClass('FB');
                    }
                    if(action === 'load'){
                        $('.ImgType>ul>li[data-stkid="'+ MsgValue +'"]').click();
                    }else{
                        $('#addStickerBox').click();
                    }
                    break;
                case 'imagemap':
                    if(MsgValue){
                        $('#ShowImageMapBox .ShowValueList tr[data-type="ImageMap"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#ShowImageMapBox .ShowValueList tbody tr[data-type="ImageMap"]').eq(0).click();
                    }
                    if(action !== 'load'){
                        $('#addImageMapBox').click();
                    }
                    break;
                case 'linetemplate':
                    if(MsgValue){
                        $('#ShowTemplateBox .ShowValueList tr[data-type="LineTemplate"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#ShowTemplateBox .ShowValueList tbody tr[data-type="LineTemplate"]').eq(0).click();
                    }
                    if(action !== 'load'){
                        $('#addTemplateBox').click();
                    }
                    break;
                case 'imagecarousel':
                    if(MsgValue){
                        $('#ShowImageCarouselBox .ShowValueList tr[data-type="ImageCarousel"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#ShowImageCarouselBox .ShowValueList tbody tr[data-type="ImageCarousel"]').eq(0).click();
                    }
                    if(action !== 'load'){
                        $('#addImageCarouselBox').click();
                    }
                    break;
                case 'image':
                    if(MsgValue){
                        $('#ShowImageBox #previews_img'+SelectMsg).attr('src', '<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/'+MsgValue).show();
                    }
                    $('.UploadImage').hide();
                    $('#UploadImage'+SelectMsg).show();
                    UpdateMedia();
                    if(action !== 'load'){
                        $('#addImageBox').click();
                    }
                    break;
                case 'video':
                    if(MsgValue){
                        $('#ShowVideoBox #previews_video'+SelectMsg+ ' source').attr('src', '<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/video/'+MsgValue);
                        $('#ShowVideoBox #previews_video'+SelectMsg)[0].load();
                        $('#ShowVideoBox #previews_video'+SelectMsg).show();
                    }
                    $('.UploadVideo').hide();
                    $('#UploadVideo'+SelectMsg).show();
                    UpdateMedia();
                    if(action !== 'load'){
                        $('#addVideoBox').click();
                    }
                    break;
                case 'audio':
                    if(MsgValue){
                        $('#ShowAudioBox #previews_audio'+SelectMsg+ ' source').attr('src', '<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/audio/'+MsgValue);
                        $('#ShowAudioBox #previews_audio'+SelectMsg)[0].load();
                        $('#ShowAudioBox #previews_audio'+SelectMsg).show();
                    }
                    $('.UploadAudio').hide();
                    $('#UploadAudio'+SelectMsg).show();
                    UpdateMedia();
                    if(action !== 'load'){
                        $('#addAudioBox').click();
                    }
                    break;
                case 'custom':
                    if(MsgValue){
                        $('#ShowCustomBox .ShowValueList tr[data-type="CustomMessage"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#ShowCustomBox .ShowValueList tbody tr[data-type="CustomMessage"]').eq(0).click();
                    }
                    if(action !== 'load'){
                        $('#addCustomBox').click();
                    }
                    break;
                case 'fb_template':
                    if(MsgValue){
                        $('#ShowFB_TemplateBox .ShowValueList tr[data-type="FB_Template"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#ShowFB_TemplateBox .ShowValueList tbody tr[data-type="FB_Template"]').eq(0).click();
                    }
                    if(action !== 'load'){
                        $('#addFB_TemplateBox').click();
                    }
                    break;
                case 'fb_listtemplate':
                    if(MsgValue){
                        $('#ShowFB_ListTemplateBox .ShowValueList tr[data-type="FB_ListTemplate"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#ShowFB_ListTemplateBox .ShowValueList tbody tr[data-type="FB_ListTemplate"]').eq(0).click();
                    }
                    if(action !== 'load'){
                        $('#addFB_ListTemplateBox').click();
                    }
                    break;
                case 'fb_btntemplate':
                    if(MsgValue){
                        $('#ShowFB_BtnTemplateBox .ShowValueList tr[data-type="FB_BtnTemplate"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#ShowFB_BtnTemplateBox .ShowValueList tbody tr[data-type="FB_BtnTemplate"]').eq(0).click();
                    }
                    if(action !== 'load'){
                        $('#addFB_BtnTemplateBox').click();
                    }
                    break;
                case 'fb_mediatemplate':
                    if(MsgValue){
                        $('#ShowFB_MediaTemplateBox .ShowValueList tr[data-type="FB_MediaTemplate"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#ShowFB_MediaTemplateBox .ShowValueList tbody tr[data-type="FB_MediaTemplate"]').eq(0).click();
                    }
                    if(action !== 'load'){
                        $('#addFB_MediaTemplateBox').click();
                    }
                    break;
                case 'fb_receipttemplate':
                    if(MsgValue){
                        $('#ShowFB_ReceiptTemplateBox .ShowValueList tr[data-type="FB_ReceiptTemplate"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#ShowFB_ReceiptTemplateBox .ShowValueList tbody tr[data-type="FB_ReceiptTemplate"]').eq(0).click();
                    }
                    if(action !== 'load'){
                        $('#addFB_ReceiptTemplateBox').click();
                    }
                    break;
            }
        }
    }
    function UpdateMsg(NowSelectMsg=SelectMsg, action){
        for (const [key, item] of Object.entries(CompareList)) {
            $('#ShowTextBox .emojionearea>.emojionearea-editor').html($('#ShowTextBox .emojionearea>.emojionearea-editor').html().replaceAll(item, key).replaceAll(key, item));
        };
        var MsgType = $('#MsgType'+NowSelectMsg).val();
        var UpdateValue = $('#'+MsgType+'Value').val() ? $('#'+MsgType+'Value').val().replace(/\u2028/g, " ") : '';
        $('#SaveMsg'+NowSelectMsg).val(UpdateValue);
        if(UpdateValue && UpdateValue.replace(/\s+/g,"")!==""){
            var result = UpdateValue.replace(/\n/g,"<br />");
            if(CompareList!=='{}' && action!=='hand'){
                emoticonList.forEach(function(emoticonId){
                    var Tmp = emoticonId.split('_');
                    var _packageId = Tmp[0];
                    var _emojiId = Tmp[1];
                    
                    var DataStkid = emoticonId;
                    var DataSrc = '<?php echo $_smarty_tpl->getVariable('EmojiLink_Path')->value;?>
'+_packageId+'<?php echo $_smarty_tpl->getVariable('EmojiLink_OS')->value;?>
'+_emojiId+'<?php echo $_smarty_tpl->getVariable('EmojiLink_Extension')->value;?>
';
                    var ContentData = '(' + DataStkid + ')';
                    var ContentHtml = '<img class="emojioneemoji" alt="'+ ContentData +'" src="'+ DataSrc +'" style="width:39px;height:39px;">';
                    if(UpdateValue.indexOf(ContentData) !== -1){
                        CompareList[ContentData] = ContentHtml;
                    }
                });
            }
            for (const [key, item] of Object.entries(CompareList)) {
                result = result.replaceAll(item, key).replaceAll(key, item);
            }
            UpdateValue = result;
        }
        $('#msgview'+NowSelectMsg).html(UpdateValue);
    }
</script>
<div class="EditArea hide">
    <div id="addTextBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowTextBox">文字</div>
    <div id="addStickerBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowStickerBox">貼圖</div>
    <div id="addImageMapBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowImageMapBox">圖文訊息</div>
    <div id="addTemplateBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowTemplateBox">卡片式選單</div>
    <div id="addImageCarouselBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowImageCarouselBox">大圖選單</div>
    <div id="addImageBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowImageBox">照片</div>
    <div id="addVideoBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowVideoBox">影片</div>
    <div id="addAudioBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowAudioBox">語音訊息</div>
    <div id="addCustomBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowCustomBox">自訂訊息</div>
    <div id="addQuicklyReplyBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowQuicklyReplyBox">快捷語</div>
    
    <div id="addFB_TemplateBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowFB_TemplateBox">一般型卡片</div>
    <div id="addFB_ListTemplateBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowFB_ListTemplateBox">清單卡片</div>
    <div id="addFB_BtnTemplateBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowFB_BtnTemplateBox">按鈕卡片</div>
    <div id="addFB_MediaTemplateBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowFB_MediaTemplateBox">媒體卡片</div>
    <div id="addFB_ReceiptTemplateBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowFB_ReceiptTemplateBox">收據卡片</div>
</div>

<!--<link href="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/css/app.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">-->
<script>
    var Selection;
    $(function(){
        $('tr[data-type="ImageMap"], tr[data-type="LineTemplate"], tr[data-type="ImageCarousel"], tr[data-type="QuicklyReply"], tr[data-type="CustomMessage"], tr[data-type="FB_Template"], tr[data-type="FB_ListTemplate"], tr[data-type="FB_BtnTemplate"], tr[data-type="FB_MediaTemplate"], tr[data-type="FB_ReceiptTemplate"]').click(function () {
            $('tr[data-type="'+ $(this).attr("data-type") +'"]').removeClass('active');
            $(this).addClass('active');
        });
        //JSON寫入表情選項
        $.getJSON("<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/js/data.json", function (data) {
            var html = "";
            for (var i = 0; i < data.length; i++) {
                html += '<li data-img="(' + data[i][0] + ')" data-code="' + data[i][2] + '"><span class="emoticon-'+ data[i][2] +'_k"></span></li>';
            }
            $("#emoticon>ul").html(html);
        });
        for (var i = 0; i <  $(".ImgType").length; i++) {
            var $ImgType=$("#ImgType0"+(i+1));
            //新增圖片寫入，class (因為sprite是用class定位)
            for (var j = 0; j < $ImgType.find('li').length; j++) {
                var SerialNO=$ImgType.find('li').eq(j).attr('data-stkid');
                SerialNO=SerialNO.replace(/(.*?)[_]/g,''); //濾掉_之前的文字
                $ImgType.find('li').eq(j).html('<span class="stkid-'+ SerialNO +'_key"></span>');
            }
        }
        //貼圖
        $(document).on('click', '.ImgType>ul>li', function (e) {
            $("#ShowStickerBox").click(); //點一下關掉
            var _src = $(this).attr("data-stkid").replace(/(.*?)[_]/g,'');
            var DataStkid = $(this).attr("data-stkid");
            UpdateCommonlyUsed('Sticker', DataStkid);
            $('#SaveMsg'+SelectMsg).val(DataStkid);
            var PageId = DataStkid.split('_')[0];
            var StickerAnimationList = <?php if ($_smarty_tpl->getVariable('StickerAnimationList')->value){?><?php echo json_encode($_smarty_tpl->getVariable('StickerAnimationList')->value);?>
<?php }else{ ?>{}<?php }?>;
            var Sticker = (StickerAnimationList.indexOf(PageId)===-1) ? 'sticker.png' : 'sticker_animation.png';
            var DataSrc = '<?php echo $_smarty_tpl->getVariable('StickerLink_Path')->value;?>
'+_src+'<?php echo $_smarty_tpl->getVariable('StickerLink_File')->value;?>
'.replace('sticker.png', Sticker);
            $('#msgview'+SelectMsg).html('<img style="width:75px;height:70px;" src="'+DataSrc+'">');
        });
        //表情
        $(document).on('click', '#emoticon>ul>li', function (e) {
            var ContentData = unescape(encodeURIComponent($(this).attr('data-img')));
            InsertContent(ContentData);
            $("#ShowkaomojiBox").click(); //點一下關掉
            $('#textValue').parent().find('.emojionearea .emojionearea-editor').focus();
        });
        //表情2
        $(document).on('click', '#emoticon2>.tab-pane>ul>li', function (e) {
            var DataStkid = $(this).attr('data-stkid');
            var DataSrc = $(this).find('img').attr('datasrc');
            UpdateCommonlyUsed('Emoticon', DataStkid);
            var ContentData = '(' + DataStkid + ')';
            var ContentHtml = '<img class="emojioneemoji" alt="'+ ContentData +'" src="'+ DataSrc +'" style="width:39px;height:39px;">';
            CompareList[ContentData] = ContentHtml;
            InsertContent(ContentHtml);
            //InsertContent(ContentData);
            $("#ShowkaomojiBox").click(); //點一下關掉
            $('#textValue').parent().find('.emojionearea .emojionearea-editor').focus();
        });
        //表情符號
        $("#kaomoji>ul>li").on('click', function (e) {
            var _kaomoji = $(this).text();
            InsertContent(_kaomoji);
            $("#ShowkaomojiBox").click(); //點一下關掉
            $('#textValue').parent().find('.emojionearea .emojionearea-editor').focus();
        });
        $('.ShowValueList tbody tr').on('click', function (e) {
            var oneTemplateNo = 0;
            var minWidth = '';
            var addHtml = " ";
            switch($(this).attr('data-type')){
                case 'ImageMap':
                    var ImageMap = JSON.parse($(this).attr('data-json'));
                    var _subimg = ImageMap['subject']['img0'];
                    var _subtitle = ImageMap['subject']['subject'];
                    oneTemplateNo = ($('.LineTemplateStyle').width()/270)-10;
                    addHtml += '<img class="ShowImgmapIMG" src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/'+_subimg+'">';
                    break;
                case 'LineTemplate':
                    var Template = JSON.parse($(this).attr('data-json'));
                    for (i = 0; i < 10; i++) {
                        // 取值
                        var _subtitle = Template['subject']['subtitle' + i];
                        var _subcontent = Template['subject']['subcontent' + i];
                        var _subimg = Template['subject']['img' + i];
                        var subject_0 = Template['subject']['subject' + i + '_0'];
                        var subject_1 = Template['subject']['subject' + i + '_1'];
                        var subject_2 = Template['subject']['subject' + i + '_2'];

                        // 判斷是否為'不設定動作'
                        var action_0 = Template['subject']['action' + i + '_0'];
                        var action_1 = Template['subject']['action' + i + '_1'];
                        var action_2 = Template['subject']['action' + i + '_2'];

                        // 只要有任何一欄有值、就創建整塊
                        if (_subtitle != "" || _subcontent != "" || subject_0 != "" || subject_1 != "" || subject_2 != "") {

                            oneTemplateNo += 1;
                            addHtml += '<div class="swiper-slide oneTemplate">';
                                if (_subimg != undefined && _subimg !='') {
                                    addHtml += '<div class="TemplateImg LineTemplate" style="background-image:url(<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/' + _subimg + ');"></div>';
                                    addHtml += '<div class="TemplateInfo">';
                                }else{
                                    addHtml += '<div class="TemplateInfo"  style="border-radius: 10px;">'; 
                                }
                                    addHtml += '<h3>' + _subtitle + '</h3>';
                                    addHtml += '<pre>' + _subcontent + '</pre>';
                                    addHtml += '<ul>';
                                        if (action_0!='noaction'){
                                            addHtml += '<li>'+ subject_0 +'</li>';
                                        }
                                        if (action_1!='noaction'){
                                            addHtml += '<li>'+ subject_1 +'</li>';
                                        }
                                        if (action_2!='noaction'){
                                            addHtml += '<li>'+ subject_2 +'</li>';
                                        }
                                    addHtml += '</ul>';
                                addHtml += '</div>';
                            addHtml += '</div>';
                        }
                    }
                    break;
                case 'ImageCarousel':
                    var ImageCarousel = JSON.parse($(this).attr('data-json'));
                    for (i = 0; i < 10; i++) {
                        // 取值
                        var _subtitle = ImageCarousel['subject']['subject'+i+'_0'];
                        var _subimg = ImageCarousel['subject']['img'+i];
                        //只要有任何一欄有值、就創建整塊
                        if ( _subtitle!="" && _subimg!=undefined){
                            oneTemplateNo += 1;
                            addHtml += '<div class="swiper-slide oneTemplate">';
                                addHtml += '<div class="TemplateImg ImageCarousel" style="background-image:url(<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/'+_subimg+');">';
                                    addHtml += '<h3>'+ _subtitle +'</h3>';
                                addHtml += '</div>';
                            addHtml += '</div>';
                        }
                    }
                    break;
                case 'QuicklyReply':
                    var QuicklyReply = JSON.parse($(this).attr('data-json'));
                    for (i = 0; i < 10; i++) {

                        // 取值
                        var _subtitle = QuicklyReply['subject']['subject'+i+'_0'];
                        var _subimg = QuicklyReply['subject']['pic'+i];
                        _subimg = _subimg ? _subimg : '';


                        //只要有任何一欄有值、就創建整塊
                        if ( _subtitle!="" && _subimg!=undefined ){
                            oneTemplateNo += 1;
                            addHtml += '<div class="quickReplyItem">';
                                if (_subimg!=""){
                                    addHtml += '<span style="background-image:url(<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/'+_subimg+');"></span>';
                                }
                                addHtml += _subtitle;
                            addHtml += '</div>';
                        }
                    }
                    break;
                case 'CustomMessage':
                    var msgjson = $(this).attr('msg-json').replace(/"{/g, "{").replace(/}"/g, "}").replace(/\\"/g, '"');
                    var MsgVal = JSON.parse(msgjson);
                    GetFlexView($('#msgview'+SelectMsg), JSON.stringify(MsgVal['contents']));
                    $('#CustomPreview').html($('#msgview'+SelectMsg).html());
                    break;
                case 'FB_Template':
                    var Template = JSON.parse($(this).attr('data-json'));
                    for (i = 0; i < 10; i++) {
                        // 取值
                        var _subtitle = Template['subject']['subtitle' + i];
                        var _subcontent = Template['subject']['subcontent' + i];
                        var _subimg = Template['subject']['img' + i];
                        var subject_0 = Template['subject']['subject' + i + '_0'];
                        var subject_1 = Template['subject']['subject' + i + '_1'];
                        var subject_2 = Template['subject']['subject' + i + '_2'];

                        // 判斷是否為'不設定動作'
                        var action_0 = Template['subject']['action' + i + '_0'];
                        var action_1 = Template['subject']['action' + i + '_1'];
                        var action_2 = Template['subject']['action' + i + '_2'];

                        // 只要有任何一欄有值、就創建整塊
                        if (_subtitle != "" || _subcontent != "" || subject_0 != "" || subject_1 != "" || subject_2 != "") {
                            oneTemplateNo += 1;
                            addHtml += '<div class="swiper-slide oneTemplate">';
                                if (_subimg != undefined && _subimg !='') {
                                    addHtml += '<div class="TemplateImg LineTemplate" style="background-image:url(<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/' + _subimg + ');"></div>';
                                    addHtml += '<div class="TemplateInfo FB"><h3>' + _subtitle + '</h3>';
                                }else{
                                    addHtml += '<div class="TemplateInfo FB"  style="border-radius: 10px;"><h3>' + _subtitle + '</h3>'; 
                                }
                                    addHtml += '<pre>' + _subcontent + '</pre>';
                                    addHtml += '<ul>';
                                        if (action_0!='noaction'){
                                            addHtml += '<li>'+ subject_0 +'</li>';
                                        }
                                        if (action_1!='noaction'){
                                            addHtml += '<li>'+ subject_1 +'</li>';
                                        }
                                        if (action_2!='noaction'){
                                            addHtml += '<li>'+ subject_2 +'</li>';
                                        }
                                    addHtml += '</ul>';
                                addHtml += '</div>';
                            addHtml += '</div>';
                        }
                    }
                    break;
                case 'FB_ListTemplate':
                    var Template = JSON.parse($(this).attr('data-json'));
                    oneTemplateNo += 1;
                    addHtml += '<div class="swiper-slide oneTemplate">';
                    var Last = 0;
                    for (i = 0; i < 4; i++) {
                        if (Template['subject']['subtitle' + i] != "") {
                            Last = i;
                        }
                    }
                    for (i = 0; i < 4; i++) {
                        // 取值
                        var _subtitle = Template['subject']['subtitle' + i];
                        var _subcontent = Template['subject']['subcontent' + i];
                        var _subimg = Template['subject']['img' + i];
                        var subject_0 = Template['subject']['subject' + i + '_0'];

                        // 判斷是否為'不設定動作'
                        var action_0 = Template['subject']['action' + i + '_0'];

                        // 只要有值、就創建整塊
                        if (_subtitle != "") {
                            var Style = 'background-color:#fff;';
                            var borderRadius = (i===Last&&!(Template['subject']['bottomSubject']&&Template['subject']['bottomAction']&&Template['subject']['bottomData'])) ? '' : 'border-radius:0px;';
                            if(i===0){
                                if(Template['subject']['topStyle']!=='compact'){
                                    if(_subimg != undefined && _subimg !=''){
                                        Style = 'background-color:#ffffff00;position:absolute;width:260px;margin-top:-79px;';
                                        addHtml += '<div class="TemplateImg LineTemplate" style="background-size:100% 100%;background-image:url(<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/' + _subimg + ');"></div>';
                                    }else{
                                        borderRadius = 'border-radius:10px 10px 0px 0px;';
                                    }
                                }else{
                                    borderRadius = 'border-radius:10px 10px 0px 0px;';
                                }
                            }
                            addHtml += '<div class="TemplateInfo FB" style="'+ Style+borderRadius +'border-bottom:1px solid #eaeaea;">';
                            addHtml += '<h3 style="width:150px;">' + _subtitle + '</h3><pre style="width:150px;background-color:#fff;">' + _subcontent + '</pre>';
                            if(i!==0 || (i===0&&Template['subject']['topStyle']==='compact')){
                                if(_subimg != undefined && _subimg !=''){
                                    addHtml += '<div class="TemplateImg LineTemplate" style="float:right;margin-top:-60px;width:90px;height:60px;background-size:100% 100%;background-image:url(<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/' + _subimg + ');"></div>';
                                }
                            }
                            addHtml+='</div>';
                        }
                    }
                    if(Template['subject']['bottomSubject']&&Template['subject']['bottomAction']&&Template['subject']['bottomData']){
                        addHtml += '<div class="TemplateInfo FB" style="background-color:#fff;border-bottom:1px solid #eaeaea;">';
                            addHtml += '<h3 style="color:#627fab;margin-bottom:0px;text-align:center;">' + Template['subject']['bottomSubject'] + '</h3>';
                        addHtml += '</div>';
                    }
                    break;
                case 'FB_BtnTemplate':
                    var Template = JSON.parse($(this).attr('data-json'));
                    for (i = 0; i < 1; i++) {
                        // 取值
                        var _subtitle = Template['subject']['subtitle' + i];
                        var subject_0 = Template['subject']['subject' + i + '_0'];
                        var subject_1 = Template['subject']['subject' + i + '_1'];
                        var subject_2 = Template['subject']['subject' + i + '_2'];

                        // 判斷是否為'不設定動作'
                        var action_0 = Template['subject']['action' + i + '_0'];
                        var action_1 = Template['subject']['action' + i + '_1'];
                        var action_2 = Template['subject']['action' + i + '_2'];

                        // 只要有任何一欄有值、就創建整塊
                        if (_subtitle != "" || subject_0 != "" || subject_1 != "" || subject_2 != "") {

                            oneTemplateNo += 1;
                            addHtml += '<div class="swiper-slide oneTemplate">';
                                addHtml += '<div class="TemplateInfo FB"  style="border-radius: 10px;"><h3>' + _subtitle + '</h3>'; 
                                    addHtml+='<ul>';
                                        if (action_0!='noaction'){
                                            addHtml+='<li>'+ subject_0 +'</li>';
                                        }
                                        if (action_1!='noaction'){
                                            addHtml+='<li>'+ subject_1 +'</li>';
                                        }
                                        if (action_2!='noaction'){
                                            addHtml+='<li>'+ subject_2 +'</li>';
                                        }
                                    addHtml+='</ul>';
                                addHtml += '</div>';
                            addHtml += '</div>';
                        }
                    }
                    break;
                case 'FB_MediaTemplate':
                    var Template = JSON.parse($(this).attr('data-json'));
                    for (i = 0; i < 1; i++) {
                        // 取值
                        var _subtype = Template['subject']['type' + i];
                        var _subimg = Template['subject']['img' + i];
                        var subject_0 = Template['subject']['subject' + i + '_0'];
                        var subject_1 = Template['subject']['subject' + i + '_1'];
                        var subject_2 = Template['subject']['subject' + i + '_2'];

                        // 判斷是否為'不設定動作'
                        var action_0 = Template['subject']['action' + i + '_0'];
                        var action_1 = Template['subject']['action' + i + '_1'];
                        var action_2 = Template['subject']['action' + i + '_2'];

                        // 只要有任何一欄有值、就創建整塊
                        if (subject_0 != "" || subject_1 != "" || subject_2 != "") {
                            oneTemplateNo += 1;
                            addHtml += '<div class="swiper-slide oneTemplate">';
                                if(_subtype==='video'){
                                    addHtml += '<video style="width:100%;height:100%;margin-bottom:-5px;background-color:#eaeaea;" class="TemplateImg LineTemplate" controls><source src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/video/'+ _subimg +'"></video>';
                                }else{
                                    addHtml += '<img style="width:100%;height:100%;background-color:#eaeaea;" class="TemplateImg LineTemplate" src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/'+ _subimg +'" />';
                                }
                                addHtml += '<div style="padding-top:0px;" class="TemplateInfo FB">';
                                    addHtml += '<ul>';
                                        var Btn = 0;
                                        for(var x=0;x<3;x++){
                                            if(Template['subject']['action' + i + '_' + x]!='noaction'){
                                                Btn++;
                                            }
                                        }
                                        var Style = 'color:#000;';
                                        Style += (Btn===2) ? 'display:inline-block;width:49%;' : '';
                                        if (action_0!='noaction'){
                                            addHtml += '<li style="'+ Style +'">'+ subject_0 +'</li>';
                                        }
                                        if (action_1!='noaction'){
                                            Style += (Btn===2) ? 'margin-left: 2%;' : '';
                                            addHtml += '<li style="'+ Style +'">'+ subject_1 +'</li>';
                                        }
                                        if (action_2!='noaction'){
                                            addHtml += '<li style="'+ Style +'">'+ subject_2 +'</li>';
                                        }
                                    addHtml += '</ul>';
                                addHtml += '</div>';
                            addHtml += '</div>';
                        }
                    }
                    break;
                case 'FB_ReceiptTemplate':
                    var Template = JSON.parse($(this).attr('data-json'));
                    var elementCtn = 0;
                    addHtml += '<div class="OrderConfirmDetails" style="display:none;">';
                        addHtml += '<div class="h4">';
                            addHtml += '<span class="confirmTitle">訂單確認</span>';
                            addHtml += '<span class="finish" onclick="$(this).parents(\'.OrderConfirmDetails\').hide();$(this).parents(\'.OrderConfirmDetails\').parent().find(\'.OrderConfirm\').show();">完成</span>';
                        addHtml += '</div>';
                        addHtml += '<div class="body">';
                            addHtml += '<div class="products">';
                                addHtml += '<div class="subtitle">商品</div>';
                                addHtml += '<div class="subbody">';
                                    for (i = 0; i < 20; i++){
                                        if(Template['subject']['element_title' + i]){
                                            elementCtn++;
                                            addHtml += '<div class="productItem">';
                                                addHtml += '<div class="pic">';
                                                    if(Template['subject']['element_image_url' + i]){ addHtml += '<img src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/'+ Template['subject']['element_image_url' + i] +'">'; }
                                                addHtml += '</div>';
                                                addHtml += '<div class="text">';
                                                    addHtml += '<div class="productTitle">';
                                                        if(Template['subject']['element_title' + i]){ addHtml += Template['subject']['element_title' + i]; }
                                                        if(Template['subject']['element_quantity' + i]>=0){ addHtml += '▪Qty.' + Template['subject']['element_quantity' + i] ; }
                                                        if(Template['subject']['element_price' + i]>=0){ addHtml += '▪' + NumFormat(Template['subject']['element_price' + i]); }
                                                    addHtml += '</div>';
                                                    if(Template['subject']['element_subtitle' + i]){ addHtml += '<div class="productContent">'+ Template['subject']['element_subtitle' + i] +'</div>'; }
                                                addHtml += '</div>';
                                            addHtml += '</div>';
                                        }
                                    }
                                addHtml += '</div>';
                            addHtml += '</div>';
                            addHtml += '<div class="ordertime">';
                                addHtml += '<div class="subtitle">訂購時間</div>';
                                var timestampTmp = new Date(Template['subject']['timestamp']);
                                var timestamp = timestampTmp.getFullYear()+ '年' +
                                    (timestampTmp.getMonth()*1+1)+ '月' +
                                    timestampTmp.getDate()+ '日 ' +
                                    (  timestampTmp.getHours()<10?'0':'')+  timestampTmp.getHours()+ ':' +
                                    (timestampTmp.getMinutes()<10?'0':'')+timestampTmp.getMinutes()+ ':' +
                                    (timestampTmp.getSeconds()<10?'0':'')+timestampTmp.getSeconds();
                                addHtml += '<div class="subbody">'+ timestamp +'</div>';
                            addHtml += '</div>';
                            addHtml += '<div class="payway">';
                                addHtml += '<div class="subtitle">付款方式</div>';
                                addHtml += '<div class="subbody">'+ Template['subject']['payment_method'] +'</div>';
                            addHtml += '</div>';
                            addHtml += '<div class="receiptplace">';
                                addHtml += '<div class="subtitle">收貨地點</div>';
                                addHtml += '<div class="subbody">';
                                    if(Template['subject']['subject']){ addHtml += Template['subject']['subject'] + '<br>'; }
                                    if(Template['subject']['street_1']){ addHtml += Template['subject']['street_1']; }
                                    if(Template['subject']['street_2']){ addHtml += ' ' + Template['subject']['street_2']; }
                                    if(Template['subject']['street_1'] || Template['subject']['street_2']){  addHtml += '<br>'; }
                                    if(Template['subject']['city']){ addHtml += Template['subject']['city']; }
                                    if(Template['subject']['state']){ addHtml += ', ' + Template['subject']['state']; }
                                    if(Template['subject']['postal_code']){ addHtml += ' ' + Template['subject']['postal_code']; }
                                addHtml += '</div>';
                            addHtml += '</div>';
                            addHtml += '<div class="summary">';
                                addHtml += '<div class="subtitle">摘要</div>';
                                addHtml += '<div class="subbody">';
                                    if(Template['subject']['subtotal']>=0){
                                        addHtml += '<div>小計';
                                            addHtml += '<div class="summaryItem">'+ NumFormat(Template['subject']['subtotal']) +'</div>';
                                        addHtml += '</div>';
                                    }
                                    if(Template['subject']['shipping_cost']>=0){
                                        addHtml += '<div>運費';
                                            addHtml += '<div class="summaryItem">'+ NumFormat(Template['subject']['shipping_cost']) +'</div>';
                                        addHtml += '</div>';
                                    }
                                    if(Template['subject']['total_tax']>=0){
                                        addHtml += '<div>預估稅金';
                                            addHtml += '<div class="summaryItem">'+ NumFormat(Template['subject']['total_tax']) +'</div>';
                                        addHtml += '</div>';
                                    }
                                    for(var t=0;t<10;t++){
                                        if(Template['subject']['adjustment_name' + t] && Template['subject']['adjustment_amount' + t]>=0){
                                            addHtml += '<div>' + Template['subject']['adjustment_name' + t];
                                                addHtml += '<div class="summaryItem">'+ NumFormat(Template['subject']['adjustment_amount' + t]) +'</div>';
                                            addHtml += '</div>';
                                        }
                                    }
                                    if(Template['subject']['total_cost']>=0){
                                        addHtml += '<br><div>總計';
                                            addHtml += '<div class="summaryItem">'+ NumFormat(Template['subject']['total_cost']) +'</div>';
                                        addHtml += '</div>';
                                    }
                                addHtml += '</div>';
                            addHtml += '</div>';
                        addHtml += '</div>';
                    addHtml += '</div>';
                    
                    addHtml += '<div class="OrderConfirm" onclick="$(this).hide();$(this).parent().find(\'.OrderConfirmDetails\').show();">';
                        addHtml += '<div class="IconArea">';
                            addHtml += '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 507.2 507.2" xml:space="preserve">'+
                                            '<circle style="fill:#32BA7C;" cx="253.6" cy="253.6" r="253.6"/>'+
                                            '<path style="fill:#0AA06E;" d="M188.8,368l130.4,130.4c108-28.8,188-127.2,188-244.8c0-2.4,0-4.8,0-7.2L404.8,152L188.8,368z"/>'+
                                            '<g>'+
                                                '<path style="fill:#FFFFFF;" d="M260,310.4c11.2,11.2,11.2,30.4,0,41.6l-23.2,23.2c-11.2,11.2-30.4,11.2-41.6,0L93.6,272.8   c-11.2-11.2-11.2-30.4,0-41.6l23.2-23.2c11.2-11.2,30.4-11.2,41.6,0L260,310.4z"/>'+
                                                '<path style="fill:#FFFFFF;" d="M348.8,133.6c11.2-11.2,30.4-11.2,41.6,0l23.2,23.2c11.2,11.2,11.2,30.4,0,41.6l-176,175.2   c-11.2,11.2-30.4,11.2-41.6,0l-23.2-23.2c-11.2-11.2-11.2-30.4,0-41.6L348.8,133.6z"/>'+
                                            '</g>'+
                                            '<g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>'+
                                        '</svg>';
                        addHtml += '</div>';
                        addHtml += '<div class="TextArea">';
                            addHtml += '<h4>訂單確認</h4>';
                            addHtml += '<span>'+ elementCtn +' 項目 '+ NumFormat(Template['subject']['total_cost']) +'</span><br>';
                            addHtml += '<span>'+ Template['subject']['payment_method'] +'</span><br>';
                            addHtml += '<span>收貨地點 '+ Template['subject']['city']+','+Template['subject']['state']+' '+Template['subject']['postal_code'] +'</span>';
                        addHtml += '</div>';
                    addHtml += '</div>';
                    break;
            }
            $('#SaveMsg'+SelectMsg).val($(this).attr('data-id'));
            if($(this).attr('data-type') !== 'CustomMessage'){
                minWidth = minWidth ? minWidth : 270*oneTemplateNo+'px';
                $('.PhoneContent.'+$(this).attr('data-type')+' .TemplateBG').html(addHtml).css('min-width', minWidth).show();
                $('#msgview'+SelectMsg).html($('.PhoneContent.'+$(this).attr('data-type')).html());
            }
        });
        LoadMsg();
        //window.setTimeout(( () => LoadMsg() ), 1000);
    });
    function NumFormat(num=0, lan='zh-TW', style='currency', currency='TWD', minimumFractionDigits=0){
        return new Intl.NumberFormat(lan, {
            style: style,
            currency: currency,
            minimumFractionDigits: minimumFractionDigits
        }).format(Math.round(num));
    }
    function LoadMsg(){
        for(var i=0;i<5;i++){
            EditMsg(i, 'load');
        }
        if('<?php echo $_smarty_tpl->getVariable('row')->value['subject']['QuicklyReply'];?>
'){
            EditMsg(5, 'load');
        }
    }
    //表情代碼寫入
    var Debug = 0;
    function InsertContent(Content) {
        if(Debug){
            console.log('InsertContent', Selection);
        }
        var textValueArea = $('#textValue').parent().find('.emojionearea .emojionearea-editor');
        if (document.selection) { //for IE
            Selection.text = Content;
        } else { //for FireFox
            if(0 && Selection.Range){
                Selection.Range.deleteContents();
                Selection.Range.insertNode(document.createTextNode(Content));
                textValueArea.blur();
            }else{
                if(0 && Selection.WindowSelection){
                    Selection.WindowSelection.deleteFromDocument();
                    Selection.WindowSelection.getRangeAt(0).insertNode(document.createTextNode(Content));
                }else{
                    var _anchorOffset = (Selection.anchorOffset>=0) ? Selection.anchorOffset : textValueArea.html().length;
                    var _focusOffset = (Selection.focusOffset>=0) ? Selection.focusOffset : textValueArea.html().length;
                    var _Start = (_anchorOffset>_focusOffset) ? _focusOffset : _anchorOffset;
                    var _End = (_anchorOffset>_focusOffset) ? _anchorOffset : _focusOffset;
                    var myPrefix = textValueArea.html().substr(0, _Start); // 取出游標之前
                    var mySuffix = textValueArea.html().substr(_End); //取出游標之後
                    if(Debug){
                        console.log(myPrefix);
                        console.log(Content);
                        console.log(mySuffix);
                    }
                    textValueArea.html(myPrefix + Content + mySuffix).focus().blur();
                    
                    //Selection = {};
                    var adjust = (Selection['Range']) ? 1 : 0;
                    Selection['Range'] = null;
                    Selection['anchorOffset'] = (_End + Content.length - adjust);
                    Selection['focusOffset'] = (_End + Content.length - adjust);
                }
            }
        }
        UpdateMsg('', 'hand');
    }
    function UpdateMedia(action){
        if(action === 'new'){
            $('#SaveMsg'+SelectMsg).val('');
        }
        var MsgType = $('#MsgType'+SelectMsg).val();
        var ShowBox = '';
        var PreView = '';
        var PreType = '';
        switch(MsgType){
            case 'image':
                ShowBox = '#ShowImageBox';
                PreView = '#previews_img';
                break;
            case 'video':
                ShowBox = '#ShowVideoBox';
                PreView = '#previews_video';
                break;
            case 'audio':
                ShowBox = '#ShowAudioBox';
                PreView = '#previews_audio';
                break;
        }
        PreType = ShowBox + ' '+PreView+SelectMsg;
        $('#msgview'+SelectMsg).html($(PreType).clone());
        if(action === 'new'){
            $(ShowBox).click();
        }
    }
</script>

<!--  彈出 文字  Modal  -->
<div id="ShowTextBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" style="padding: 20vh 0px;">
                <textarea id="textValue" type="text" class="form-control" rows="10" onchange="UpdateMsg();"></textarea>
                <style>
                    #ShowTextBox .emojionearea .emojionearea-editor {
                        min-height: 300px;
                    }
                </style>
                <script>
                    $(function () {
                        var WindowDirection='', mouseDownOffset=null;
                        $(document).on('mousedown mouseup', function(event) {
                            if( event.type === 'mousedown' ){
                                mouseDownOffset = event.clientX;
                            }else if( event.type === 'mouseup' ){
                                WindowDirection = event.clientX < mouseDownOffset ? 'rtl' : 'ltr';
                            }
                        });
                        $('#textValue').emojioneArea({
                            pickerPosition: "left",
                            tonesStyle: "bullet"
                        });
                        window.setTimeout(function () {
                            var textValueArea = $('#textValue').parent().find('.emojionearea .emojionearea-editor');
                            textValueArea.bind('click keyup', function(event) { // blur focus change mouseover mouseout
                                window.setTimeout(function () {
                                    if (document.selection) { //for IE
                                        $(this).focus();
                                        Selection = document.selection.createRange();
                                    } else { //for FireFox
                                        if(Debug){
                                            console.log('Start');
                                        }
                                        var anchorIndex=-1, focusIndex=-1, _anchorFrontOffset=0, _focusFrontOffset=0, anchorEditor=null, focusEditor=null, anchorEle=null, focusEle=null;
                                        var WindowSelection = (window.getSelection) ? window.getSelection() : document.getSelection();
                                        var anchorNodeName = (WindowSelection.anchorNode) ? WindowSelection.anchorNode.nodeName : null;
                                        var focusNodeName = (WindowSelection.focusNode) ? WindowSelection.focusNode.nodeName : null;
                                        WindowDirection = (WindowSelection.type==='Caret') ? '' : WindowDirection;
                                        var _anchorOffset = WindowSelection.anchorOffset, _focusOffset=WindowSelection.focusOffset;
                                        if(Debug){
                                            console.log('_anchorOffset(origin): ' + _anchorOffset);
                                            console.log('_focusOffset(origin): ' + _focusOffset);
                                        }
                                        
                                        if(anchorNodeName){
                                            switch(anchorNodeName){
                                                case '#text':
                                                    anchorEle = WindowSelection.anchorNode;
                                                    anchorEditor = anchorEle.parentNode;
                                                    break;
                                                case 'DIV':
                                                default :
                                                    anchorEditor = WindowSelection.anchorNode;
                                                    anchorEle = anchorEditor.childNodes[_anchorOffset-1];
                                                    if(WindowSelection.type==='Range'){
                                                        _anchorOffset = 1;
                                                    }
                                                    break;
                                            }
                                            for (var i=0; i<anchorEditor.childNodes.length; i++) {
                                                if(anchorEle&& anchorEle===anchorEditor.childNodes[i]){
                                                    anchorIndex = i;
                                                }
                                            }
                                            if(anchorEle){
                                                switch(anchorEle.nodeName){
                                                    case 'IMG':
                                                    case 'BR':
                                                        anchorIndex += 1;
                                                        _anchorOffset = 0;
                                                        break;
                                                }
                                            }
                                            if(Debug){
                                                console.log('anchorIndex: ' + anchorIndex);
                                            }
                                            for (var d=0; d<anchorIndex; d++) {
                                                if(Debug){
                                                    console.log(anchorEditor.childNodes[d]);
                                                }
                                                switch(anchorEditor.childNodes[d].nodeName){
                                                    case '#text':
                                                        _anchorFrontOffset += anchorEditor.childNodes[d].length;
                                                        break;
                                                    case 'IMG':
                                                    case 'DIV':
                                                    default :
                                                        _anchorFrontOffset += anchorEditor.childNodes[d].outerHTML.length;
                                                        break;
                                                }
                                            }
                                            if(Debug){
                                                console.log('_anchorOffset: ' + _anchorOffset);
                                                console.log('_anchorFrontOffset: ' + _anchorFrontOffset);
                                            }
                                        }
                                        if(focusNodeName){
                                            switch(focusNodeName){
                                                case '#text':
                                                    focusEle = WindowSelection.focusNode;
                                                    focusEditor = focusEle.parentNode;
                                                    break;
                                                case 'DIV':
                                                default :
                                                    focusEditor = WindowSelection.focusNode;
                                                    focusEle = focusEditor.childNodes[_focusOffset-1];
                                                    if(WindowSelection.type==='Range'){
                                                        _focusOffset = 1;
                                                    }
                                                    break;
                                            }
                                            for (var i=0; i<focusEditor.childNodes.length; i++) {
                                                if(focusEle&& focusEle===focusEditor.childNodes[i]){
                                                    focusIndex = i;
                                                }
                                            }
                                            if(focusEle){
                                                switch(focusEle.nodeName){
                                                    case 'IMG':
                                                    case 'BR':
                                                        focusIndex += 1;
                                                        _focusOffset = 0;
                                                        break;
                                                }
                                            }
                                            if(Debug){
                                                console.log('focusIndex: ' + focusIndex);
                                            }
                                            for (var d=0; d<focusIndex; d++) {
                                                if(Debug){
                                                    console.log(focusEditor.childNodes[d]);
                                                }
                                                switch(focusEditor.childNodes[d].nodeName){
                                                    case '#text':
                                                        _focusFrontOffset += focusEditor.childNodes[d].length;
                                                        break;
                                                    case 'IMG':
                                                    case 'DIV':
                                                    default :
                                                        _focusFrontOffset += focusEditor.childNodes[d].outerHTML.length;
                                                        break;
                                                }
                                            }
                                            if(Debug){
                                                console.log('_focusOffset: ' + _focusOffset);
                                                console.log('_focusFrontOffset: ' + _focusFrontOffset);
                                            }
                                        }

                                        Selection = {
                                            'Range' : (WindowSelection.type==='Range') ? WindowSelection.getRangeAt(0) : null,
                                            'anchorOffset' : _anchorOffset+_anchorFrontOffset,
                                            'focusOffset' : _focusOffset+_focusFrontOffset,
                                            'WindowSelection' : WindowSelection
                                        };
                                        if(Debug){
                                            console.log('End');
                                        }
                                    }
                                }, 1);
                            });
                        }, 1000);
                    });
                </script>
                <?php if (!$_smarty_tpl->getVariable('notify')->value){?>
                    <div id="BtnEmoticonFake" class="btn btn-primary btn-sm BtnEmoticon hide">  </div>
                    <div id="BtnEmoticonReal" class="btn btn-primary btn-sm BtnEmoticon hidee" data-toggle="modal" data-target="#ShowkaomojiBox">  </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<!--  彈出 表情  Modal  -->
<div id="ShowkaomojiBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <!-- Modal content-->
        <div class="modal-content">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#emoticon<?php if ($_smarty_tpl->getVariable('EmojiList')->value){?>2<?php }?>" data-toggle="tab" aria-expanded="false">表情</a></li>
                <li class=""><a href="#kaomoji" data-toggle="tab" aria-expanded="true">表情符號</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade tab-content active in" id="emoticon<?php if ($_smarty_tpl->getVariable('EmojiList')->value){?>2<?php }?>">
                    <ul class="<?php if ($_smarty_tpl->getVariable('EmojiList')->value){?>nav nav-tabs<?php }?>">
                        <?php if (!$_smarty_tpl->getVariable('notify')->value){?>
                            <li class="active">
                                <a href="#EmojiTypeCommonlyUsed" data-toggle="tab" aria-expanded="true">
                                    <i style="font-size: 27px;" class="fa fa-history"></i>
                                </a>
                            </li>
                        <?php }?>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['packageId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('EmojiList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['packageId']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            <?php if (!$_smarty_tpl->getVariable('notify')->value||($_smarty_tpl->getVariable('notify')->value&&($_smarty_tpl->getVariable('packageId')->value==1||$_smarty_tpl->getVariable('packageId')->value==2||$_smarty_tpl->getVariable('packageId')->value==3||$_smarty_tpl->getVariable('packageId')->value==4))){?>
                                <li class="<?php if ($_smarty_tpl->getVariable('notify')->value&&$_smarty_tpl->getVariable('packageId')->value==1){?>active<?php }?>" onclick="$('#emoticon2>ul>li>a>img').each(function(e){ $(this).attr('src', $(this).attr('<?php echo $_smarty_tpl->getVariable('EmojiTabOff')->value;?>
')); });
                                                                                                $(this).find('a>img').attr('src', $(this).find('a>img').attr('<?php echo $_smarty_tpl->getVariable('EmojiTabOn')->value;?>
'));
                                                                                                $('#EmojiType<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
 img').each(function(e){ if(!$(this).attr('src')){ $(this).attr('src', $(this).attr('DataSrc')); } });">
                                    <a href="#EmojiType<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
" data-toggle="tab" aria-expanded="true">
                                        <img style="width:34px;height:29px;"
                                            tab_on="<?php echo $_smarty_tpl->getVariable('EmojiLink_Path')->value;?>
<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
<?php echo $_smarty_tpl->getVariable('EmojiLink_OS')->value;?>
<?php echo $_smarty_tpl->getVariable('EmojiTabOn')->value;?>
<?php echo $_smarty_tpl->getVariable('EmojiLink_Extension')->value;?>
" 
                                            tab_off="<?php echo $_smarty_tpl->getVariable('EmojiLink_Path')->value;?>
<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
<?php echo $_smarty_tpl->getVariable('EmojiLink_OS')->value;?>
<?php echo $_smarty_tpl->getVariable('EmojiTabOff')->value;?>
<?php echo $_smarty_tpl->getVariable('EmojiLink_Extension')->value;?>
" 
                                            src="<?php echo $_smarty_tpl->getVariable('EmojiLink_Path')->value;?>
<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
<?php echo $_smarty_tpl->getVariable('EmojiLink_OS')->value;?>
<?php if ($_smarty_tpl->getVariable('notify')->value&&$_smarty_tpl->getVariable('packageId')->value==1){?><?php echo $_smarty_tpl->getVariable('EmojiTabOn')->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('EmojiTabOff')->value;?>
<?php }?><?php echo $_smarty_tpl->getVariable('EmojiLink_Extension')->value;?>
">
                                    </a>
                                </li>
                            <?php }?>
                        <?php }} ?>
                    </ul>
                    <?php if (!$_smarty_tpl->getVariable('notify')->value){?>
                        <div class="tab-pane fade EmojiType active in" id="EmojiTypeCommonlyUsed">
                            <div class="btn btn-danger btn-bordered" onclick="if(confirm('確定要清空常用表情?')){ UpdateCommonlyUsed('Emoticon'); }">
                                <i class="fa fa-trash-o"></i> 清除
                            </div>
                            <ul></ul>
                        </div>
                    <?php }?>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['packageId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('EmojiList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['packageId']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <?php if (!$_smarty_tpl->getVariable('notify')->value||($_smarty_tpl->getVariable('notify')->value&&($_smarty_tpl->getVariable('packageId')->value==1||$_smarty_tpl->getVariable('packageId')->value==2||$_smarty_tpl->getVariable('packageId')->value==3||$_smarty_tpl->getVariable('packageId')->value==4))){?>
                            <div class="tab-pane fade EmojiType <?php if ($_smarty_tpl->getVariable('notify')->value&&$_smarty_tpl->getVariable('packageId')->value==1){?>active in<?php }?>" id="EmojiType<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
">
                                <ul>
                                    <?php $_smarty_tpl->tpl_vars['emojiIdTmp'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['emojiIdTmp']->step = ($_smarty_tpl->getVariable('item')->value - (1) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['emojiIdTmp']->total = (int)ceil(($_smarty_tpl->tpl_vars['emojiIdTmp']->step > 0 ? $_smarty_tpl->getVariable('item')->value+1 - 1 : 1-($_smarty_tpl->getVariable('item')->value)+1)/abs($_smarty_tpl->tpl_vars['emojiIdTmp']->step));
if ($_smarty_tpl->tpl_vars['emojiIdTmp']->total > 0){
for ($_smarty_tpl->tpl_vars['emojiIdTmp']->value = 1, $_smarty_tpl->tpl_vars['emojiIdTmp']->iteration = 1;$_smarty_tpl->tpl_vars['emojiIdTmp']->iteration <= $_smarty_tpl->tpl_vars['emojiIdTmp']->total;$_smarty_tpl->tpl_vars['emojiIdTmp']->value += $_smarty_tpl->tpl_vars['emojiIdTmp']->step, $_smarty_tpl->tpl_vars['emojiIdTmp']->iteration++){
$_smarty_tpl->tpl_vars['emojiIdTmp']->first = $_smarty_tpl->tpl_vars['emojiIdTmp']->iteration == 1;$_smarty_tpl->tpl_vars['emojiIdTmp']->last = $_smarty_tpl->tpl_vars['emojiIdTmp']->iteration == $_smarty_tpl->tpl_vars['emojiIdTmp']->total;?>
                                        <?php if ($_smarty_tpl->getVariable('emojiIdTmp')->value<10){?>
                                            <?php $_smarty_tpl->assign("emojiId",smarty_modifier_cat("00",$_smarty_tpl->getVariable('emojiIdTmp')->value),null,null);?>
                                        <?php }elseif($_smarty_tpl->getVariable('emojiIdTmp')->value<100){?>
                                            <?php $_smarty_tpl->assign("emojiId",smarty_modifier_cat("0",$_smarty_tpl->getVariable('emojiIdTmp')->value),null,null);?>
                                        <?php }else{ ?>
                                            <?php $_smarty_tpl->assign("emojiId",$_smarty_tpl->getVariable('emojiIdTmp')->value,null,null);?>
                                        <?php }?>
                                        <li data-stkid="<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
_<?php echo $_smarty_tpl->getVariable('emojiId')->value;?>
">
                                            <img style="width:39px;height:39px;" DataSrc="<?php echo $_smarty_tpl->getVariable('EmojiLink_Path')->value;?>
<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
<?php echo $_smarty_tpl->getVariable('EmojiLink_OS')->value;?>
<?php echo $_smarty_tpl->getVariable('emojiId')->value;?>
<?php echo $_smarty_tpl->getVariable('EmojiLink_Extension')->value;?>
" src="<?php if ($_smarty_tpl->getVariable('notify')->value&&$_smarty_tpl->getVariable('packageId')->value==1){?><?php echo $_smarty_tpl->getVariable('EmojiLink_Path')->value;?>
<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
<?php echo $_smarty_tpl->getVariable('EmojiLink_OS')->value;?>
<?php echo $_smarty_tpl->getVariable('emojiId')->value;?>
<?php echo $_smarty_tpl->getVariable('EmojiLink_Extension')->value;?>
<?php }?>">
                                        </li>
                                    <?php }} ?>
                                </ul>
                            </div>
                        <?php }?>
                    <?php }} ?>
                </div>
                <div class="tab-pane fade" id="kaomoji">
                    <ul>
                        <li>p(^-^q)</li> <li>(´▽｀)</li> <li>(￣ー￣)</li> <li>(⌒∩⌒)</li> <li>( ^ω^)</li> <li>ψ(｀∇´)ψ</li> <li>(＾v＾)</li> <li>(*^-^*)</li> <li>(*^o^*)</li> <li>(-^〇^-)</li> <li>(*≧∇≦*)</li> <li>(///▽///)</li> <li>(`o´)</li> <li>(｀А´)</li> <li>(･A･)</li> <li>(*｀＾´)=3</li> <li>(* - -)</li> <li>( #｀Д´)</li> <li>(｀ε´)</li> <li>( *｀ω´)</li> <li>(o｀з’*)</li> <li>【o´ﾟ□ﾟ`o】</li> <li>σ(oдolll)</li> <li>σ(o'ω'o)</li> <li>Σ(=ω= ;)</li> <li>Σ(´д｀;)</li> <li>(^-^;</li> <li>(-o-;)</li> <li>(::^ω^::)</li> <li>(；´Д`A</li> <li>(^◇^;)</li> <li>(´c_,｀lll)</li> <li>(&gt;_&lt;)</li> <li>(*´&gt;д&lt;)</li> <li>('A`)</li> <li>(T-T)</li> <li>(；_；)</li> <li>(/_T)</li> <li>(T.T ) ( T.T)</li> <li>(´;ω;`)</li> <li>(´；ω；｀)</li> <li>(P'_`)q</li> <li>( . .)</li> <li>(・_・)</li> <li>(・。・)</li> <li>(・_・｜</li> <li>(ё_ё)</li> <li>d(-_^)</li> <li>(^3^)</li> <li>(*'A^q)</li> <li>(^_^)/</li> <li>φ(._.)</li> <li>＼(^o^)／</li> <li>(* -_･)oO○</li> <li>(=^ェ^=)</li> <li>u・ェ・u</li> <li>▽・ｗ・▽</li> <li>（・◇・）/~~~</li> <li>( ´Д`)y━･~~</li> <li>( ^ ^ )/■</li> <li>＼(^^＼)</li> <li>（*´з)(ε｀*)</li> <li>...φ(･ω･*)☆</li>  
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 貼圖  Modal  -->
<div id="ShowStickerBox" class="modal fade" role="dialog">
    <div class="modal-dialog tag-7">
        <!-- Modal content-->
        <div class="modal-content">
            <h3>　貼圖</h3>
            <ul class="nav nav-tabs">
                <?php if (!$_smarty_tpl->getVariable('notify')->value){?>
                    <li class="active">
                        <a href="#ImgTypeCommonlyUsed" data-toggle="tab" aria-expanded="true">
                            <i style="font-size: 27px;" class="fa fa-history"></i>
                        </a>
                    </li>
                <?php }?>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['packageId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('StickerList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['packageId']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <?php if (!$_smarty_tpl->getVariable('notify')->value||($_smarty_tpl->getVariable('notify')->value&&($_smarty_tpl->getVariable('packageId')->value=='1'||$_smarty_tpl->getVariable('packageId')->value=='2'||$_smarty_tpl->getVariable('packageId')->value=='3'||$_smarty_tpl->getVariable('packageId')->value=='4'))){?>
                        <li class="<?php if ($_smarty_tpl->getVariable('notify')->value&&$_smarty_tpl->getVariable('packageId')->value==1){?>active<?php }?>" onclick="$('#ShowStickerBox .nav-tabs li>a>img').each(function(e){ $(this).attr('src', $(this).attr('<?php echo $_smarty_tpl->getVariable('StickerTabOff')->value;?>
')); });
                                                                            $(this).find('a>img').attr('src', $(this).find('a>img').attr('<?php echo $_smarty_tpl->getVariable('StickerTabOn')->value;?>
'));
                                                                            $('#ImgType<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
 img').each(function(e){ if(!$(this).attr('src')){ $(this).attr('src', $(this).attr('DataSrc')); } });">
                            <a href="#ImgType<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
" data-toggle="tab" aria-expanded="true">
                                <img style="width:34px;height:29px;"
                                    tab_on="<?php echo $_smarty_tpl->getVariable('StickerPageLink_Path')->value;?>
<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
<?php echo $_smarty_tpl->getVariable('StickerLink_OS')->value;?>
<?php echo $_smarty_tpl->getVariable('StickerTabOn')->value;?>
<?php echo $_smarty_tpl->getVariable('StickerPageLink_Extension')->value;?>
"
                                    tab_off="<?php echo $_smarty_tpl->getVariable('StickerPageLink_Path')->value;?>
<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
<?php echo $_smarty_tpl->getVariable('StickerLink_OS')->value;?>
<?php echo $_smarty_tpl->getVariable('StickerTabOff')->value;?>
<?php echo $_smarty_tpl->getVariable('StickerPageLink_Extension')->value;?>
"
                                    src="<?php echo $_smarty_tpl->getVariable('StickerPageLink_Path')->value;?>
<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
<?php echo $_smarty_tpl->getVariable('StickerLink_OS')->value;?>
<?php if ($_smarty_tpl->getVariable('notify')->value&&$_smarty_tpl->getVariable('packageId')->value==1){?><?php echo $_smarty_tpl->getVariable('StickerTabOn')->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('StickerTabOff')->value;?>
<?php }?><?php echo $_smarty_tpl->getVariable('StickerPageLink_Extension')->value;?>
">
                            </a>
                        </li>
                    <?php }?>
                <?php }} ?>
            </ul>
            <div id="myTabContent" class="tab-content">
                <?php if (!$_smarty_tpl->getVariable('notify')->value){?>
                    <div class="tab-pane fade ImgType active in" id="ImgTypeCommonlyUsed">
                        <div class="btn btn-danger btn-bordered" onclick="if(confirm('確定要清空常用貼圖?')){ UpdateCommonlyUsed('Sticker'); }">
                            <i class="fa fa-trash-o"></i> 清除
                        </div>
                        <ul></ul>
                    </div>
                <?php }?>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['packageId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('StickerList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['packageId']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <?php if (!$_smarty_tpl->getVariable('notify')->value||($_smarty_tpl->getVariable('notify')->value&&($_smarty_tpl->getVariable('packageId')->value=='1'||$_smarty_tpl->getVariable('packageId')->value=='2'||$_smarty_tpl->getVariable('packageId')->value=='3'||$_smarty_tpl->getVariable('packageId')->value=='4'))){?>
                        <div class="tab-pane fade ImgType <?php if ($_smarty_tpl->getVariable('notify')->value&&$_smarty_tpl->getVariable('packageId')->value==1){?>active in<?php }?>" id="ImgType<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
">
                            <ul>
                                <?php  $_smarty_tpl->tpl_vars['itemVal'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['itemKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itemVal']->key => $_smarty_tpl->tpl_vars['itemVal']->value){
 $_smarty_tpl->tpl_vars['itemKey']->value = $_smarty_tpl->tpl_vars['itemVal']->key;
?>
                                    <?php $_smarty_tpl->tpl_vars['stickerId'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['stickerId']->step = ($_smarty_tpl->getVariable('itemVal')->value['end'] - ($_smarty_tpl->getVariable('itemVal')->value['start']) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['stickerId']->total = (int)ceil(($_smarty_tpl->tpl_vars['stickerId']->step > 0 ? $_smarty_tpl->getVariable('itemVal')->value['end']+1 - $_smarty_tpl->getVariable('itemVal')->value['start'] : $_smarty_tpl->getVariable('itemVal')->value['start']-($_smarty_tpl->getVariable('itemVal')->value['end'])+1)/abs($_smarty_tpl->tpl_vars['stickerId']->step));
if ($_smarty_tpl->tpl_vars['stickerId']->total > 0){
for ($_smarty_tpl->tpl_vars['stickerId']->value = $_smarty_tpl->getVariable('itemVal')->value['start'], $_smarty_tpl->tpl_vars['stickerId']->iteration = 1;$_smarty_tpl->tpl_vars['stickerId']->iteration <= $_smarty_tpl->tpl_vars['stickerId']->total;$_smarty_tpl->tpl_vars['stickerId']->value += $_smarty_tpl->tpl_vars['stickerId']->step, $_smarty_tpl->tpl_vars['stickerId']->iteration++){
$_smarty_tpl->tpl_vars['stickerId']->first = $_smarty_tpl->tpl_vars['stickerId']->iteration == 1;$_smarty_tpl->tpl_vars['stickerId']->last = $_smarty_tpl->tpl_vars['stickerId']->iteration == $_smarty_tpl->tpl_vars['stickerId']->total;?>
                                        <li data-stkid="<?php echo $_smarty_tpl->getVariable('packageId')->value;?>
_<?php echo $_smarty_tpl->getVariable('stickerId')->value;?>
">
                                            <img style="width:75px;height:70px;" DataSrc="<?php echo $_smarty_tpl->getVariable('StickerLink_Path')->value;?>
<?php echo $_smarty_tpl->getVariable('stickerId')->value;?>
<?php echo $_smarty_tpl->getVariable('StickerLink_File')->value;?>
" src="<?php if ($_smarty_tpl->getVariable('notify')->value&&$_smarty_tpl->getVariable('packageId')->value==1){?><?php echo $_smarty_tpl->getVariable('StickerLink_Path')->value;?>
<?php echo $_smarty_tpl->getVariable('stickerId')->value;?>
<?php echo $_smarty_tpl->getVariable('StickerLink_File')->value;?>
<?php }?>">
                                        </li>
                                    <?php }} ?>
                                <?php }} ?>
                            </ul>
                        </div>
                    <?php }?>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>
<!--  彈出 圖文訊息  Modal  -->
<div id="ShowImageMapBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent ImageMap">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows_ImageMap')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr class="" data-id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-type="ImageMap" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value);?>
'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        <?php if ($_smarty_tpl->getVariable('item')->value['subject']['img0']){?>
                                            <img class="img-responsive" alt="Image" src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('item')->value['subject']['img0'];?>
">
                                        <?php }else{ ?>
                                            <i class="fa fa-window-close"></i>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject'];?>

                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 卡片式選單  Modal  -->
<div id="ShowTemplateBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent LineTemplate">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows_LineTemplate')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr class="" data-id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-type="LineTemplate" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value);?>
'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        <?php if ($_smarty_tpl->getVariable('item')->value['subject']['img0']){?>
                                            <img class="img-responsive" alt="Image" src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('item')->value['subject']['img0'];?>
">
                                        <?php }else{ ?>
                                            <i class="fa fa-window-close"></i>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject'];?>

                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 大圖選單  Modal  -->
<div id="ShowImageCarouselBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent ImageCarousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows_ImageCarousel')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr class="" data-id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-type="ImageCarousel" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value);?>
'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        <?php if ($_smarty_tpl->getVariable('item')->value['subject']['img0']){?>
                                            <img class="img-responsive" alt="Image" src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('item')->value['subject']['img0'];?>
">
                                        <?php }else{ ?>
                                            <i class="fa fa-window-close"></i>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject'];?>

                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 照片  Modal  -->
<div id="ShowImageBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (4 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 4+1 - 0 : 0-(4)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                    <div id="UploadImage<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="UploadImage">
                        <label class="btn btn-info" style="float:right;">
                            <input style="display:none;" id="FILES_img<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="form-control" name="value_<?php echo $_smarty_tpl->getVariable('G')->value;?>
" onchange="init_inputImage(this, '<?php echo $_smarty_tpl->getVariable('G')->value;?>
');" type="file">
                            <i class="fa fa-photo"></i>上傳圖片
                        </label>
                        <img style="width:300px;height:200px;display: none;" class="img-thumbnail1" id="previews_img<?php echo $_smarty_tpl->getVariable('G')->value;?>
" src=""/>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>
<!--  彈出 影片  Modal  -->
<div id="ShowVideoBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (4 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 4+1 - 0 : 0-(4)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                    <div id="UploadVideo<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="UploadVideo">
                        <label class="btn btn-info" style="float:right;">
                            <input style="display:none;" id="FILES_video<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="form-control" name="value_<?php echo $_smarty_tpl->getVariable('G')->value;?>
" onchange="init_inputVideo(this, '<?php echo $_smarty_tpl->getVariable('G')->value;?>
');" type="file" accept="video/mp4" maxsize="200MB">
                            <i class="fa fa-photo"></i>上傳影片
                        </label>
                        <video style="width:300px;height:200px;display: none;" class="img-thumbnail1" id="previews_video<?php echo $_smarty_tpl->getVariable('G')->value;?>
" crossorigin="anonymous" controls>
                            <source src="">
                        </video>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>
<!--  彈出 語音訊息  Modal  -->
<div id="ShowAudioBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (4 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 4+1 - 0 : 0-(4)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                    <div id="UploadAudio<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="UploadAudio">
                        <label class="btn btn-info" style="float:right;">
                            <input style="display:none;" id="FILES_audio<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="form-control" name="value_<?php echo $_smarty_tpl->getVariable('G')->value;?>
" onchange="init_inputAudio(this, '<?php echo $_smarty_tpl->getVariable('G')->value;?>
');" type="file" accept="audio/x-m4a, audio/mp3" maxsize="10MB">
                            <i class="fa fa-photo"></i>上傳語音訊息
                        </label>
                        <audio class="img-thumbnail1" id="previews_audio<?php echo $_smarty_tpl->getVariable('G')->value;?>
" style="width:300px;height:200px;display: none;" controls>
                            <source src="">
                        </audio>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>
<!--  彈出 自訂訊息  Modal  -->
<div id="ShowCustomBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div id="CustomPreview" class="PhoneContent CustomMessage">
                        
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows_CustomMessage')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr class="" data-id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-type="CustomMessage" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value);?>
' msg-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value['subject']['data']);?>
'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject'];?>

                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 快捷語  Modal  -->
<div id="ShowQuicklyReplyBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent QuicklyReply">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG" style="text-align: left;">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows_QuicklyReply')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr class="" data-id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-type="QuicklyReply" data-next="<?php echo $_smarty_tpl->getVariable('item')->value['next'];?>
" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value);?>
'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        <?php if ($_smarty_tpl->getVariable('item')->value['subject']['img0']){?>
                                            <img class="img-responsive" alt="Image" src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('item')->value['subject']['img0'];?>
">
                                        <?php }else{ ?>
                                            <i class="fa fa-window-close"></i>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject'];?>

                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!--  彈出 一般型卡片  Modal  -->
<div id="ShowFB_TemplateBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent FB FB_Template">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows_FB_Template')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr class="" data-id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-type="FB_Template" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value);?>
'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        <?php if ($_smarty_tpl->getVariable('item')->value['subject']['img0']){?>
                                            <img class="img-responsive" alt="Image" src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('item')->value['subject']['img0'];?>
">
                                        <?php }else{ ?>
                                            <i class="fa fa-window-close"></i>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject'];?>

                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 清單卡片  Modal  -->
<div id="ShowFB_ListTemplateBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent FB FB_ListTemplate">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows_FB_ListTemplate')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr class="" data-id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-type="FB_ListTemplate" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value);?>
'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        <?php if ($_smarty_tpl->getVariable('item')->value['subject']['img0']){?>
                                            <img class="img-responsive" alt="Image" src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('item')->value['subject']['img0'];?>
">
                                        <?php }else{ ?>
                                            <i class="fa fa-window-close"></i>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject'];?>

                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 按鈕卡片  Modal  -->
<div id="ShowFB_BtnTemplateBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent FB FB_BtnTemplate">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows_FB_BtnTemplate')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr class="" data-id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-type="FB_BtnTemplate" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value);?>
'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject'];?>

                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 媒體卡片  Modal  -->
<div id="ShowFB_MediaTemplateBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent FB FB_MediaTemplate">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows_FB_MediaTemplate')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr class="" data-id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-type="FB_MediaTemplate" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value);?>
'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        <?php if ($_smarty_tpl->getVariable('item')->value['subject']['type0']=='video'){?>
                                            <video class="img-responsive" controls>
                                                <source src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/video/<?php echo $_smarty_tpl->getVariable('item')->value['subject']['img0'];?>
">
                                            </video>
                                        <?php }else{ ?>
                                            <img class="img-responsive" alt="Image" src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('item')->value['subject']['img0'];?>
">
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject'];?>

                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 收據卡片  Modal  -->
<div id="ShowFB_ReceiptTemplateBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent FB FB_ReceiptTemplate">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows_FB_ReceiptTemplate')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr class="" data-id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-type="FB_ReceiptTemplate" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value);?>
'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        <?php if ($_smarty_tpl->getVariable('item')->value['subject']['element_image_url0']){?>
                                            <img class="img-responsive" alt="Image" src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('item')->value['subject']['element_image_url0'];?>
">
                                        <?php }else{ ?>
                                            <i class="fa fa-window-close"></i>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject'];?>

                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'LocalStorage.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
