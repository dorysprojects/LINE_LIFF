<?php /* Smarty version Smarty3-b7, created on 2022-01-05 10:53:49
         compiled from "/home1/bot.gadclubs.com//library/modules/frontend/view/message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193911198461d5083d82fc60-39680693%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '197adaca9bbb6f3cbe883aadb37f699cf2c4bfd0' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/frontend/view/message.tpl',
      1 => 1627279029,
    ),
  ),
  'nocache_hash' => '193911198461d5083d82fc60-39680693',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.cat.php';
?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->getVariable('ProjectName')->value;?>
</title>
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'head.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </head>

    <body onselectstart="return false">
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'top.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        
        <div id="signature-pad" class="signature-pad">
            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'project_details.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <div id="flex_press_background" class="press_background">
                <div id="flex_press_button_area" class="press_button_area">
                    <div class="press_button" onclick="flex_add_favorite();">加入我的最愛</div>
                    <div class="press_button" onclick="flex_press_modify();">編輯</div>
                    <div class="press_button delete" onclick="flex_press_delete();">刪除</div>
                    <div class="press_button" onclick="$(this).parent().parent().hide();">取消</div>
                </div>
            </div>
            <div class="signature-pad--body" style="overflow:auto;">
                <div id="flex_list">
                    <?php if ($_smarty_tpl->getVariable('userId')->value!=''){?>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('flex_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            <div id="push_flex<?php echo $_smarty_tpl->getVariable('key')->value+1;?>
" ctn="<?php echo $_smarty_tpl->getVariable('key')->value;?>
" class="flex_block" onclick="push_flex($(this));">
                                <?php $_smarty_tpl->assign('FlexItem',$_smarty_tpl->getVariable('item')->value['content'],null,null);?>
                                <?php $_smarty_tpl->assign('BGItem',$_smarty_tpl->getVariable('FlexItem')->value['body']['contents'][0],null,null);?>
                                <?php $_smarty_tpl->assign('TextItem',$_smarty_tpl->getVariable('BGItem')->value['contents'][0],null,null);?>
                                <?php $_smarty_tpl->assign('weight',$_smarty_tpl->getVariable('TextItem')->value['weight'],null,null);?>
                                <?php if ($_smarty_tpl->getVariable('weight')->value=='bold'){?>
                                    <?php $_smarty_tpl->assign('Text_Weight','粗',null,null);?>
                                <?php }else{ ?>
                                    <?php $_smarty_tpl->assign('Text_Weight','細',null,null);?>
                                <?php }?>
                                <?php $_smarty_tpl->assign('Itemsize',$_smarty_tpl->getVariable('FlexItem')->value['size'],null,null);?>
                                <?php if ($_smarty_tpl->getVariable('Itemsize')->value){?>
                                    <?php $_smarty_tpl->assign('Bubble_Size',$_smarty_tpl->getVariable('BubbleSizeZhTw')->value[$_smarty_tpl->getVariable('Itemsize')->value],null,null);?>
                                <?php }else{ ?>
                                    <?php $_smarty_tpl->assign('Bubble_Size',$_smarty_tpl->getVariable('BubbleSizeZhTw')->value['mega'],null,null);?>
                                <?php }?>
                                <div class='flex' id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" NO="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value['content']);?>
' style='background-color: <?php echo $_smarty_tpl->getVariable('BGItem')->value['backgroundColor'];?>
'>
                                    <span class="TextSize" style='color: <?php echo $_smarty_tpl->getVariable('TextItem')->value['color'];?>
'><?php echo $_smarty_tpl->getVariable('TextItem')->value['size'];?>
(<?php echo $_smarty_tpl->getVariable('Text_Weight')->value;?>
)</span>
                                    <span style='color: <?php echo $_smarty_tpl->getVariable('TextItem')->value['color'];?>
'><?php echo $_smarty_tpl->getVariable('Bubble_Size')->value;?>
</span>
                                </div>
                                <svg width="20" height="20" style="position:absolute;margin-left:-20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
                                    <path id="flex_heart<?php echo $_smarty_tpl->getVariable('key')->value+1;?>
" style="transition:fill ease-in .5s;<?php if ($_smarty_tpl->getVariable('item')->value['viewA']=='true'){?>fill:rgb(206, 61, 61);<?php }else{ ?>fill:#fff;<?php }?>" stroke="rgb(206, 61, 61)" stroke-width="40" stroke-linejoin="round" d="M412 79c-53-40-146-17-162 68-16-85-109-108-162-68-43 32-55 94-44 137 30 119 194 217 206 224 12-7 176-105 206-224 11-43-1-105-44-137z"></path>
                                </svg>
                            </div>
                        <?php }} ?>
                    <?php }?>
                </div>
            </div>
            <div class="signature-pad--footer">
                <div id="addarea" style="">
                    <div id='WriteArea'>
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div id="ProjectListBtn" class="button" onclick="$('#project_details').show();$('.press_button_area>#CloseBtn').show();"><i class="fa fa-fw fa-th-list"></i></div>
                                    <input id="flex_send_Text" class="word_input" placeholder="flex內文字">
                                    <div class="button" onclick="SendFlex();"><i class="fa fa-fw fa-send"></i></div>
                                </div>
                                <div class="swiper-slide"><div class="button" onclick="ChooseFlex();"><i class="fa fa-fw fa-plus"></i></div>
                                    <input id="flex_send_altText" class="word_input" placeholder="預覽文字">
                                </div>
                            </div>
                            <div class="swiper-pagination" style="margin-bottom: -15px;"></div>
                        </div>
                    </div>
                    <div id="choose_flex" class="EditArea" style="padding:20px 0px;overflow: auto;">
                        <div onclick="$(this).parent().hide();" data-action="choose_the_flex" class="X"><i class="fa fa-close" style="font-size: 25px;"></i></div>
                        <div class="word_div" style="font-size: 16px;">訊息寬度</div>
                        <select id="flex_BubbleSize" class="btn_info word_input">
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('BubbleSize')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <option value="<?php echo $_smarty_tpl->getVariable('item')->value;?>
"><?php echo $_smarty_tpl->getVariable('BubbleSizeZhTw')->value[$_smarty_tpl->getVariable('item')->value];?>
</option>
                            <?php }} ?>
                        </select>
                        <div class="word_div" style="font-size: 16px;">背景顏色</div>
                        <input id="flex_BGColor" class="jscolor word_input" value="ffffff">
                        <div class="word_div" style="font-size: 16px;">字體顏色</div>
                        <input id="flex_Color" class="jscolor word_input" value="000000">
                        <div class="word_div" style="font-size: 16px;">字體大小</div>
                        <select id="flex_Size" class="btn_info word_input">
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('size')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <option value="<?php echo $_smarty_tpl->getVariable('item')->value;?>
"><?php echo $_smarty_tpl->getVariable('item')->value;?>
</option>
                            <?php }} ?>
                        </select>
                        <div class="word_div" style="font-size: 16px;">字體粗細</div>
                        <div id="flex_Weight">
                            <input type="radio" id="flex_Weight_regular" name="flex_Weight" value="regular" checked>
                            <label for="flex_Weight_regular">細</label>
                            <input type="radio" id="flex_Weight_bold" name="flex_Weight" value="bold">
                            <label for="flex_Weight_bold">粗</label>
                        </div>
                        <div class="word_div" style="font-size: 16px;">文本對齊方式</div>
                        <div id="flex_Align">
                            <input type="radio" id="flex_Align_start" name="flex_Align" value="start" checked>
                            <label for="flex_Align_start">置左</label>
                            <input type="radio" id="flex_Align_center" name="flex_Align" value="center">
                            <label for="flex_Align_center">置中</label>
                            <input type="radio" id="flex_Align_end" name="flex_Align" value="end">
                            <label for="flex_Align_end">置右</label>
                        </div>
                        </br></br>
                        <div id="CreateFlex" class="button" onclick="CreateFlex();">建立</div>
                        <div id="CopyFlex" class="button" onclick="CopyFlex();">複製</div>
                        <div id="UpdateFlex" class="button" onclick="UpdateFlex();">更新</div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'footer.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        <script>
            var Text_DefaultJson = {
                "type": "bubble",
                "body": {
                    "type": "box",
                    "layout": "vertical",
                    "contents": [
                        {
                            "type": "box",
                            "layout": "horizontal",
                            "contents": [
                                {
                                    "type": "text",
                                    "text": "HelloWorld",
                                    "size": "md",
                                    "gravity": "center",
                                    "wrap": true
                                }
                            ],
                            "paddingAll": "15px"
                        }
                    ],
                    "paddingAll": "0px"
                }
            };
            
            function ChooseFlex(val){
                $("#flex_BubbleSize").val('mega');
                $("#flex_BGColor").val('ffffff');
                $("#flex_BGColor").css('background-color', '#ffffff');
                $("#flex_Color").val('000000');
                $("#flex_Color").css('background-color', '#000000');
                $("#flex_Size").val('md');
                $('#flex_Weight input[type="radio"]').prop('checked', false);
                $("#flex_Weight_regular").prop('checked', true);
                $('#flex_Align input[type="radio"]').prop('checked', false);
                $("#flex_Align_start").prop('checked', true);
                $("#choose_flex").show();
                if(val){
                    var ValJson = JSON.parse(val);
                    var contentsCtn = ValJson['body']['contents'].length-1;
                    var textCtn = ValJson['body']['contents'][contentsCtn]['contents'].length-1;

                    if(ValJson['size']){
                        $("#flex_BubbleSize").val(ValJson['size']);
                    }
                    if(ValJson['body']['contents'][contentsCtn]['backgroundColor']){
                        $("#flex_BGColor").val(ValJson['body']['contents'][contentsCtn]['backgroundColor'].replace(/\#/, ''));
                        $("#flex_BGColor").css('background-color', ValJson['body']['contents'][contentsCtn]['backgroundColor']);
                    }
                    if(ValJson['body']['contents'][contentsCtn]['contents'][textCtn]['color']){
                        $("#flex_Color").val(ValJson['body']['contents'][contentsCtn]['contents'][textCtn]['color'].replace(/\#/, ''));
                        $("#flex_Color").css('background-color', ValJson['body']['contents'][contentsCtn]['contents'][textCtn]['color']);
                    }
                    if(ValJson['body']['contents'][contentsCtn]['contents'][textCtn]['size']){
                        $("#flex_Size").val(ValJson['body']['contents'][contentsCtn]['contents'][textCtn]['size']);
                    }
                    if(ValJson['body']['contents'][contentsCtn]['contents'][textCtn]['weight'] == 'bold'){
                        $('#flex_Weight input[type="radio"]').prop('checked', false);
                        $("#flex_Weight_bold").prop('checked', true);
                    }
                    if(ValJson['body']['contents'][contentsCtn]['contents'][textCtn]['align']){
                        $('#flex_Align input[type="radio"]').prop('checked', false);
                        $("#flex_Align_"+ValJson['body']['contents'][contentsCtn]['contents'][textCtn]['align']).prop('checked', true);
                    }
                    $("#UpdateFlex").show();
                    $("#CopyFlex").show();
                    $("#CreateFlex").hide();
                }else{
                    $("#UpdateFlex").hide();
                    $("#CopyFlex").hide();
                    $("#CreateFlex").show();
                }
            }
            
            function CreateFlex(val, act){
                var Text_DefaultArray = JSON.parse(JSON.stringify(Text_DefaultJson));
                var action = 'add';
                var id = '';
                if(val){
                    Text_DefaultArray = JSON.parse(val);
                    if(act != 'copy'){
                        action = 'edit';
                        id = $("#"+the_pic.id).attr('NO');
                    }
                }
                var contentsCtn = Text_DefaultArray['body']['contents'].length-1;
                var textCtn = Text_DefaultArray['body']['contents'][contentsCtn]['contents'].length-1;

                if($('#flex_BubbleSize').val()){ Text_DefaultArray['size'] = $('#flex_BubbleSize').val(); }
                if($('#flex_BGColor').val()){ Text_DefaultArray['body']['contents'][contentsCtn]['backgroundColor'] = '#' + $('#flex_BGColor').val(); }
                if($('#flex_Color').val()){ Text_DefaultArray['body']['contents'][contentsCtn]['contents'][textCtn]['color'] = '#' + $('#flex_Color').val(); }
                if($('#flex_Size').val()){ Text_DefaultArray['body']['contents'][contentsCtn]['contents'][textCtn]['size'] = $('#flex_Size').val(); }
                if($('#flex_Weight input[type="radio"]:checked').val()){ Text_DefaultArray['body']['contents'][contentsCtn]['contents'][textCtn]['weight'] = $('#flex_Weight input[type="radio"]:checked').val(); }
                if($('#flex_Align input[type="radio"]:checked').val()){ Text_DefaultArray['body']['contents'][contentsCtn]['contents'][textCtn]['align'] = $('#flex_Align input[type="radio"]:checked').val(); }
                if($('#flex_Text').val()){ Text_DefaultArray['body']['contents'][contentsCtn]['contents'][textCtn]['text'] = $('#flex_Text').val(); }

                if($('#flex_BGColor').val() && $('#flex_Color').val()){
                    var userId = $("#userId").html();
                    var displayName = $("#displayName").html();
                    var pictureUrl = $("#pictureUrl").html();
                    var statusMessage = $("#statusMessage").html();
                    var flex_json = JSON.stringify(Text_DefaultArray);
                    xajax_AddMessage('message', userId, displayName, pictureUrl, statusMessage, flex_json, id);
                }else{
                    alert('請填寫完整');
                }
            }

            function UpdateFlex(){
                CreateFlex(SelectModule);
            }

            function CopyFlex(){
                CreateFlex(SelectModule, 'copy');
            }

            function SendFlex(){
                if(SelectModule && $('#flex_send_Text').val()){
                    var Text_DefaultArray = JSON.parse(SelectModule);
                    var contentsCtn = Text_DefaultArray['body']['contents'].length-1;
                    var textCtn = Text_DefaultArray['body']['contents'][contentsCtn]['contents'].length-1;

                    if($('#flex_send_Text').val()){ Text_DefaultArray['body']['contents'][contentsCtn]['contents'][textCtn]['text'] = $('#flex_send_Text').val(); }
                    var Msg = [{
                        "type": "flex",
                        "altText": $('#flex_send_altText').val() ? $('#flex_send_altText').val() : $('#flex_send_Text').val(),
                        "contents": Text_DefaultArray
                    }];
                    swal({
                        type: 'warning',
                        title: '請選擇', 
                        cancelButtonText: '分享',
                        showCancelButton: true,
                        text: '',
                        confirmButtonText: '直接傳送'})
                    .then(function () {
                        SendMsg(Msg, 1);
                    }, function (dismiss) {
                        if (dismiss === 'cancel') {
                            ShareMsg(Msg, 1);
                        }
                    });
                }else{
                    if(!SelectModule && !$('#flex_send_Text').val()){
                        alert('請選擇flex模板，並填寫flex內文字');
                    }else if(!SelectModule){
                        alert('請選擇flex模板');
                    }else if(!$('#flex_send_Text').val()){
                        alert('請填寫flex內文字');
                    }             
                }
            }
            
            function push_flex(obj) {
                var nowTime = new Date().getTime();
                console.log(nowTime+'/'+lastClickTime+'='+(nowTime-lastClickTime));
                if (nowTime - lastClickTime < 400) {
                    lastClickTime = 0;
                    clickTimer && clearTimeout(clickTimer);
                    /*雙擊*/
                    dbl_push_flex(obj);
                } else {
                    lastClickTime = nowTime;
                    clickTimer = setTimeout(() => {
                        /*單擊*/
                        SelectModule = obj.children().eq(0).attr('data-json');
                        $('.Select').removeClass('Select');
                        obj.addClass('Select');
                    }, 400);
                }
            }
            
            function dbl_push_flex(obj) {
                var favorite = '';
                var id = obj.find('.flex').attr('NO');
                
                if (obj.find('svg>path').css("fill") == "rgb(206, 61, 61)") {
                    obj.find('svg>path').css("fill", "#fff");
                    favorite = "false";
                } else {
                    obj.find('svg>path').css("fill", "rgb(206, 61, 61)");
                    favorite = "true";
                }
                
                xajax_AddFavorite('message', id, favorite);
            }
            
            function flex_add_favorite(){
                dbl_push_flex($("#push_flex" + the_id));
                $('#flex_press_background').hide();
            }
            
            function add_press() {
                for (iu = 0; iu < document.getElementsByClassName('flex_block').length; iu++) {
                    var hammer = new Hammer(document.getElementById('push_flex' + (iu + 1)).childNodes[1]);
                    hammer.on('press', function (ev) {
                        if(ev.target.tagName == 'SPAN'){
                            the_pic = ev.target.parentNode;
                            the_div = the_pic.parentNode;
                            the_name = the_div.childNodes[1];
                            the_id = the_div.id.substr(9);
                        }else if(ev.target.tagName == 'DIV'){
                            the_pic = ev.target;
                            the_div = the_pic.parentNode;
                            the_name = the_div.childNodes[1];
                            the_id = the_div.id.substr(9);
                        }
                        if ($("#flex_heart" + the_id).css('fill') == "rgb(206, 61, 61)") {
                            $("#flex_add_favorite_btn").html('從我的最愛中移除');
                        } else {
                            $("#flex_add_favorite_btn").html('加入我的最愛');
                        }
                        $("#flex_press_background").show();
                    });
                }
            }
            
            function flex_press_modify() {
                $('#flex_press_background').hide();
                SelectModule = $("#"+the_pic.id).attr('data-json');
                $('.Select').removeClass('Select');
                $("#"+the_pic.id).parent().addClass('Select');
                ChooseFlex(SelectModule);
            }
            
            function flex_press_delete(){
                if (confirm("確定要永久刪除嗎?") == true) {
                    var userId = $("#userId").html();
                    
                    xajax_Delete('message', the_pic.id, userId);
                }
            }
            
            $(function () {
                add_press();
            });
        </script>
    </body>
</html>