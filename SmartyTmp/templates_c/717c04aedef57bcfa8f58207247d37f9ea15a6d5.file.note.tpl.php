<?php /* Smarty version Smarty3-b7, created on 2022-01-05 16:19:48
         compiled from "/home1/bot.gadclubs.com//library/modules/frontend/view/note.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77918726561d554a46de835-97123570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '717c04aedef57bcfa8f58207247d37f9ea15a6d5' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/frontend/view/note.tpl',
      1 => 1641366458,
    ),
  ),
  'nocache_hash' => '77918726561d554a46de835-97123570',
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

            <div id="category_press_background" class="press_background">
                <div id="category_press_button_area" class="press_button_area">
                    <div class="press_button" onclick="AddCategory('edit');">編輯</div>
                    <div class="press_button delete" onclick="AddCategory('delete');">刪除</div>
                    <div class="press_button" onclick="$(this).parent().parent().hide();">取消</div>
                </div>
            </div>
            <div id="subcategory_press_background" class="press_background">
                <div id="subcategory_press_button_area" class="press_button_area">
                    <div class="press_button" onclick="AddSubCategory('edit');">編輯</div>
                    <div class="press_button delete" onclick="AddSubCategory('delete');">刪除</div>
                    <div class="press_button" onclick="$(this).parent().parent().hide();">取消</div>
                </div>
            </div>
            <div id="note_press_background" class="press_background">
                <div id="note_press_button_area" class="press_button_area">
                    <div class="press_button" onclick="dbl_push_note();">加入我的最愛</div>
                    <div class="press_button" onclick="AddNote('edit');">編輯</div>
                    <div class="press_button delete" onclick="AddNote('delete');">刪除</div>
                    <div class="press_button" onclick="$(this).parent().parent().hide();">取消</div>
                </div>
            </div>
            <div id="note_add_background" class="press_background">
                <div id="note_add_background_area" class="press_button_area">
                    <div class="press_button" onclick="AddCategory('add');">主類別</div>
                    <div class="press_button" onclick="AddSubCategory('add');">次類別</div>
                    <div class="press_button" onclick="AddNote('add');">筆記</div>
                    <div class="press_button" onclick="$(this).parent().parent().hide();">取消</div>
                </div>
            </div>
            <div class="signature-pad--body" style="overflow:auto;">
                <div id="note_list">
                    <?php if ($_smarty_tpl->getVariable('note_list')->value){?>
                        <?php  $_smarty_tpl->tpl_vars['categoryitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['categorykey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('category_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['categoryitem']->key => $_smarty_tpl->tpl_vars['categoryitem']->value){
 $_smarty_tpl->tpl_vars['categorykey']->value = $_smarty_tpl->tpl_vars['categoryitem']->key;
?>
                            <div id="push_category<?php echo $_smarty_tpl->getVariable('categorykey')->value+1;?>
" class="category_block" onclick="push_category($(this));" name="<?php echo $_smarty_tpl->getVariable('categoryitem')->value['propertyB'];?>
" NO="<?php echo $_smarty_tpl->getVariable('categoryitem')->value['id'];?>
" prevlevel="<?php echo $_smarty_tpl->getVariable('categoryitem')->value['prev'];?>
" UID="<?php echo $_smarty_tpl->getVariable('categoryitem')->value['propertyA'];?>
">
                                <div class="category_title"><?php echo $_smarty_tpl->getVariable('categoryitem')->value['propertyB'];?>
</div>
                                <div class="category_btn" onclick="if($(this).parent().find('.subcategory_block').eq(0).css('display')=='none'){ $(this).html('-');$(this).parent().find('.subcategory_block').show(); }else{ $(this).html('+');$(this).parent().find('.subcategory_block').hide(); }">+</div>
                                <?php  $_smarty_tpl->tpl_vars['subcategoryitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['subcategorykey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subcategory_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subcategoryitem']->key => $_smarty_tpl->tpl_vars['subcategoryitem']->value){
 $_smarty_tpl->tpl_vars['subcategorykey']->value = $_smarty_tpl->tpl_vars['subcategoryitem']->key;
?>
                                    <?php if ($_smarty_tpl->getVariable('subcategoryitem')->value['prev']==$_smarty_tpl->getVariable('categoryitem')->value['id']){?>
                                        <div id="push_subcategory<?php echo $_smarty_tpl->getVariable('subcategorykey')->value+1;?>
" class="subcategory_block" onclick="push_subcategory($(this));" name="<?php echo $_smarty_tpl->getVariable('subcategoryitem')->value['propertyB'];?>
" NO="<?php echo $_smarty_tpl->getVariable('subcategoryitem')->value['id'];?>
" prevlevel="<?php echo $_smarty_tpl->getVariable('subcategoryitem')->value['prev'];?>
" UID="<?php echo $_smarty_tpl->getVariable('subcategoryitem')->value['propertyA'];?>
">
                                            <div class="subcategory_title"><?php echo $_smarty_tpl->getVariable('subcategoryitem')->value['propertyB'];?>
</div>
                                            <div class="subcategory_btn" onclick="if($(this).parent().find('.note_block').eq(0).css('display')=='none'){ $(this).html('-');$(this).parent().find('.note_block').show(); }else{ $(this).html('+');$(this).parent().find('.note_block').hide(); }">+</div>
                                            <?php  $_smarty_tpl->tpl_vars['noteitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['notekey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('note_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['noteitem']->key => $_smarty_tpl->tpl_vars['noteitem']->value){
 $_smarty_tpl->tpl_vars['notekey']->value = $_smarty_tpl->tpl_vars['noteitem']->key;
?>
                                                <?php if ($_smarty_tpl->getVariable('noteitem')->value['prev']==$_smarty_tpl->getVariable('subcategoryitem')->value['id']){?>
                                                    <div id="push_note<?php echo $_smarty_tpl->getVariable('notekey')->value+1;?>
" class="note_block" onclick="push_note($(this));"  NO="<?php echo $_smarty_tpl->getVariable('noteitem')->value['id'];?>
" name="<?php echo $_smarty_tpl->getVariable('noteitem')->value['propertyB'];?>
" data="<?php echo $_smarty_tpl->getVariable('noteitem')->value['propertyC'];?>
" prevlevel="<?php echo $_smarty_tpl->getVariable('noteitem')->value['prev'];?>
" UID="<?php echo $_smarty_tpl->getVariable('noteitem')->value['propertyA'];?>
">
                                                        <div class='note'>
                                                            <span><?php echo $_smarty_tpl->getVariable('noteitem')->value['propertyB'];?>
</span>
                                                        </div>
                                                        <svg width="20" height="20" style="position:absolute;margin-left:-20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
                                                            <path id="note_heart<?php echo $_smarty_tpl->getVariable('notekey')->value+1;?>
" style="transition:fill ease-in .5s;<?php if ($_smarty_tpl->getVariable('item')->value['viewA']=='true'){?>fill:rgb(206, 61, 61);<?php }else{ ?>fill:#fff;<?php }?>" stroke="rgb(206, 61, 61)" stroke-width="40" stroke-linejoin="round" d="M412 79c-53-40-146-17-162 68-16-85-109-108-162-68-43 32-55 94-44 137 30 119 194 217 206 224 12-7 176-105 206-224 11-43-1-105-44-137z"></path>
                                                        </svg>
                                                    </div>
                                                <?php }?>
                                            <?php }} ?>
                                        </div>
                                    <?php }?>
                                <?php }} ?>
                            </div>
                        <?php }} ?>
                    <?php }?>
                </div>
            </div>
            <div class="signature-pad--footer">
                <div id="addarea" style="">
                    <div id='NoteArea'>
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div id="ProjectListBtn" class="button" onclick="$('#project_details').show();$('.press_button_area>#CloseBtn').show();"><i class="fa fa-fw fa-th-list"></i></div>
                                    <div class="button" onclick="$('#note_add_background').show();"><i class="fa fa-fw fa-plus"></i></div>
                                    <div class="button" onclick="$('#add_manarger').show();"><i class="fa fa-fw fa-user-plus"></i></div>
                                    <div class="button" onclick="SendNote();"><i class="fa fa-fw fa-send"></i></div>
                                </div>
                                <div class="swiper-slide" style="display: none;">
                                    
                                </div>
                            </div>
                            <div class="swiper-pagination" style="margin-bottom: -15px;display: none;"></div>
                        </div>
                    </div>
                    <div id="add_category" class="EditArea" style="padding:50px 0px;">
                        <?php echo $_smarty_tpl->getVariable('Html_close')->value;?>

                        <div class="word_div" style="font-size: 16px;">主類別名稱</div>
                        <input id="category_name" class="word_input" type="text" placeholder="輸入文字">
                        <div class="word_div" style="font-size: 16px;">選擇主類別</div>
                        <select id="select_category" class="btn_info word_input">
                            <option value="">請選擇</option>
                            <?php  $_smarty_tpl->tpl_vars['categoryitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['categorykey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('category_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['categoryitem']->key => $_smarty_tpl->tpl_vars['categoryitem']->value){
 $_smarty_tpl->tpl_vars['categorykey']->value = $_smarty_tpl->tpl_vars['categoryitem']->key;
?>
                                <?php if ($_smarty_tpl->getVariable('categoryitem')->value['propertyB']!=''){?>
                                    <option value="<?php echo $_smarty_tpl->getVariable('categoryitem')->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('categoryitem')->value['propertyB'];?>
</option>
                                <?php }?>
                            <?php }} ?>
                        </select>
                        </br></br>
                        <div class="button" onclick="CreateCategory('add');">建立</div>
                        <div class="button" onclick="CreateCategory('edit');">更新</div>
                        <div class="button" onclick="CreateCategory('delete');">刪除</div>
                    </div>
                    <div id="add_subcategory" class="EditArea" style="padding:10px 0px;overflow: auto;">
                        <?php echo $_smarty_tpl->getVariable('Html_close')->value;?>

                        <div class="word_div" style="font-size: 16px;">選擇主類別</div>
                        <select id="select_maincategory" class="btn_info word_input" onchange="UpdateSubcategory($('#select_subcategory'), $(this).val());">
                            <option value="">請選擇</option>
                            <?php  $_smarty_tpl->tpl_vars['categoryitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['categorykey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('category_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['categoryitem']->key => $_smarty_tpl->tpl_vars['categoryitem']->value){
 $_smarty_tpl->tpl_vars['categorykey']->value = $_smarty_tpl->tpl_vars['categoryitem']->key;
?>
                                <?php if ($_smarty_tpl->getVariable('categoryitem')->value['propertyB']!=''){?>
                                    <option value="<?php echo $_smarty_tpl->getVariable('categoryitem')->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('categoryitem')->value['propertyB'];?>
</option>
                                <?php }?>
                            <?php }} ?>
                        </select>
                        <div class="word_div" style="font-size: 16px;">次類別名稱</div>
                        <input id="subcategory_name" class="word_input" type="text" placeholder="輸入文字">
                        <div class="word_div" style="font-size: 16px;">選擇次類別</div>
                        <select id="select_subcategory" class="btn_info word_input">
                            <option value="">請選擇</option>
                        </select>
                        </br></br>
                        <div class="button" onclick="CreateSubCategory('add');">建立</div>
                        <div class="button" onclick="CreateSubCategory('edit');">更新</div>
                        <div class="button" onclick="CreateSubCategory('delete');">刪除</div>
                    </div>
                    <div id="add_note" class="EditArea" style="padding:50px 0px;">
                        <?php echo $_smarty_tpl->getVariable('Html_close')->value;?>

                        <div class="word_div">選擇主類別</div>
                        <select id="select_note_category" class="btn_info word_input" onchange="UpdateSubcategory($('#select_note_subcategory'), $(this).val());">
                            <option value="">請選擇</option>
                            <?php  $_smarty_tpl->tpl_vars['categoryitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['categorykey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('category_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['categoryitem']->key => $_smarty_tpl->tpl_vars['categoryitem']->value){
 $_smarty_tpl->tpl_vars['categorykey']->value = $_smarty_tpl->tpl_vars['categoryitem']->key;
?>
                                <?php if ($_smarty_tpl->getVariable('categoryitem')->value['propertyB']!=''){?>
                                    <option value="<?php echo $_smarty_tpl->getVariable('categoryitem')->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('categoryitem')->value['propertyB'];?>
</option>
                                <?php }?>
                            <?php }} ?>
                        </select>
                        <div class="word_div">選擇次類別</div>
                        <select id="select_note_subcategory" class="btn_info word_input">
                            <option value="">請選擇</option>
                        </select>
                        <div class="word_div">筆記名稱</div>
                        <input id="note_name" class="word_input" type="text" placeholder="輸入文字">
                        <div class="word_div">筆記連結或內容</div>
                        <textarea id="note_data" class="word_input" type="text" placeholder="輸入文字" maxlength="250"></textarea>
                        </br></br>
                        <div class="button" onclick="CreateNote('add');">建立</div>
                        <div class="button" onclick="CreateNote('edit');">更新</div>
                        <div class="button" onclick="CreateNote('delete');">刪除</div>
                    </div>
                    <div id="add_manarger" class="EditArea" style="padding:10px 0px;overflow: auto;">
                        <?php echo $_smarty_tpl->getVariable('Html_close')->value;?>

                        <div class="word_div">已邀請</div>
                        <?php  $_smarty_tpl->tpl_vars['manageritem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['managerkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('manager_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['manageritem']->key => $_smarty_tpl->tpl_vars['manageritem']->value){
 $_smarty_tpl->tpl_vars['managerkey']->value = $_smarty_tpl->tpl_vars['manageritem']->key;
?>
                            <div class="manager_block" NO="<?php echo $_smarty_tpl->getVariable('manageritem')->value['id'];?>
">
                                <img class="pic" src="<?php echo $_smarty_tpl->getVariable('manageritem')->value['subject']['pictureUrl'];?>
">
                                <div class="name"><?php echo $_smarty_tpl->getVariable('manageritem')->value['subject']['displayName'];?>
</div>
                                <i class="fa fa-close" onclick="RemoveManager($(this).parents('.manager_block'));" style="font-size: 30px;position: absolute;margin-left: -30px;padding: 0px 4px 4px 4px;background-color: #00000080;"></i>
                            </div>
                        <?php }} ?>
                        </br></br>
                        <div class="button" onclick="ShareNote();" style="position: absolute;bottom: 10px;left: 30px;">邀請好友</div>
                    </div>
                </div>

                <div class="signature-pad--actions" style="display:none">
                    <select id="DefaultSubcategory" class="btn_info word_input" style="display: none;">
                        <option value="">請選擇</option>
                        <?php  $_smarty_tpl->tpl_vars['subcategoryitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['subcategorykey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subcategory_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subcategoryitem']->key => $_smarty_tpl->tpl_vars['subcategoryitem']->value){
 $_smarty_tpl->tpl_vars['subcategorykey']->value = $_smarty_tpl->tpl_vars['subcategoryitem']->key;
?>
                            <?php if ($_smarty_tpl->getVariable('subcategoryitem')->value['propertyB']!=''){?>
                                <option value="<?php echo $_smarty_tpl->getVariable('subcategoryitem')->value['id'];?>
" prevlevel="<?php echo $_smarty_tpl->getVariable('subcategoryitem')->value['prev'];?>
"><?php echo $_smarty_tpl->getVariable('subcategoryitem')->value['propertyB'];?>
</option>
                            <?php }?>
                        <?php }} ?>
                    </select>
                </div>
            </div>
        </div>
        
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'footer.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        <script>
            var DefaultSubcategory = $("#DefaultSubcategory").html();
            var category_list = <?php echo json_encode($_smarty_tpl->getVariable('category_list')->value);?>
;
            var subcategory_list = <?php echo json_encode($_smarty_tpl->getVariable('subcategory_list')->value);?>
;
            var note_list = <?php echo json_encode($_smarty_tpl->getVariable('note_list')->value);?>
;
            
            function RemoveManager(obj){
                var userId = $("#userId").html();
                var name = obj.find('.name').html();
                var id = obj.attr('NO');
                if (confirm("確定要移除【" + name +"】一起編輯的權限嗎?") == true) {
                    xajax_AddFlex('note', userId, '', '', '', '', id, '', '', '', 'user');
                }
            }

            function ShareNote(){
                var userId = $("#userId").html();
                var displayName = $("#displayName").html();
                var pictureUrl = $("#pictureUrl").html();
                var statusMessage = $("#statusMessage").html();

                var Msg = '【' + displayName + '】邀請你一起編輯筆記';//一起編輯module
                location.href = 'line://msg/text/?' + Msg + '<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/ft/sharenote?module=note&admin=' + userId;//module=xxx
            }

            function UpdateSubcategory(obj, val){
                if(val != ''){
                    obj.html(DefaultSubcategory);
                    var SubCtn = 0;
                    obj.find('option').each(function(e) {
                        SubCtn++;
                        var prevlevel = $(this).attr('prevlevel');
                        if(SubCtn!=1 && prevlevel!=val){
                            $(this).remove();
                        }
                    });
                }else{
                    obj.html('<option value="">請選擇</option>');
                }
            }

            function AddCategory(act){
                $('#note_add_background').hide();
                $('#add_category').show();
                $('#add_category').find('.button').hide();
                $('#add_category').find('.word_div').hide();
                $('#add_category').find('.word_input').hide();
                $('#category_name').val('');
                $('#select_category').val('');
                switch(act){
                    case 'add':
                        $('#add_category').find('.button').eq(0).show();
                        $('#add_category').find('.word_div').eq(0).show();
                        $('#category_name').show();
                        break;
                    case 'edit':
                        $('#category_press_background').hide();
                        var category_block = $('#'+the_pic.parentNode.id);
                        var NO = category_block.attr('NO');
                        var name = category_block.attr('name');
                        $('#select_category').val(NO);
                        $('#category_name').val(name);
                        $('#add_category').find('.button').eq(1).show();
                        $('#add_category').find('.word_div').show();
                        $('#add_category').find('.word_input').show();
                        break;
                    case 'delete':
                        $('#add_category').hide();
                        CreateCategory('delete');
                        break;
                }
            }

            function AddSubCategory(act){
                $('#note_add_background').hide();
                $('#add_subcategory').show();
                $('#add_subcategory').find('.button').hide();
                $('#add_subcategory').find('.word_div').hide();
                $('#add_subcategory').find('.word_input').hide();
                $('#select_maincategory').val('');
                $('#subcategory_name').val('');
                $('#select_subcategory').html('<option value="">請選擇</option>');
                switch(act){
                    case 'add':
                        $('#add_subcategory').find('.button').eq(0).show();
                        $('#add_subcategory').find('.word_div').eq(0).show();
                        $('#add_subcategory').find('.word_div').eq(1).show();
                        $('#select_maincategory').show();
                        $('#subcategory_name').show();
                        break;
                    case 'edit':
                        $('#subcategory_press_background').hide();
                        var subcategory_block = $('#'+the_pic.parentNode.id);
                        var NO = subcategory_block.attr('NO');
                        var name = subcategory_block.attr('name');
                        var prevlevel = subcategory_block.attr('prevlevel');
                        $('#select_maincategory').val(prevlevel);
                        $('#subcategory_name').val(name);
                        UpdateSubcategory($('#select_subcategory'), prevlevel);
                        $('#select_subcategory').val(NO);
                        $('#add_subcategory').find('.button').eq(1).show();
                        $('#add_subcategory').find('.word_div').show();
                        $('#add_subcategory').find('.word_input').show();
                        break;
                    case 'delete':
                        $('#add_subcategory').hide();
                        CreateSubCategory('delete');
                        break;
                }
            }

            function AddNote(act){
                $('#note_add_background').hide();
                $('#select_note_category').val('');
                $('#select_note_subcategory').html('<option value="">請選擇</option>');
                $('#note_name').val('');
                $('#note_data').val('');
                $('#add_note').show();
                $('#add_note').find('.button').hide();
                switch(act){
                    case 'add':
                        $('#add_note').find('.button').eq(0).show();
                        break;
                    case 'edit':
                        $('#note_press_background').hide();
                        $('#add_note').find('.button').eq(1).show();
                        var note_block = $('#'+the_pic.parentNode.id);
                        var NO = note_block.attr('NO');
                        var name = note_block.attr('name');
                        var data = note_block.attr('data');
                        var prevlevel = note_block.attr('prevlevel');
                        var category_NO = note_block.parents('.category_block').attr('NO');

                        $('#select_note_category').val(category_NO);
                        UpdateSubcategory($('#select_note_subcategory'), category_NO);
                        $('#select_note_subcategory').val(prevlevel);
                        $('#note_name').val(name);
                        $('#note_data').val(data);
                        break;
                    case 'delete':
                        $('#add_note').hide();
                        if (confirm("確定要永久刪除嗎?") == true) {
                            CreateNote('delete');
                        }
                        break;
                }
            }
            
            function CreateNote(action){
                if(action == 'delete'){
                    var userId = $("#userId").html();
                    var level = 'note';
                    var id = $('#'+the_pic.parentNode.id).attr('NO');
                    xajax_AddFlex('note', userId, displayName, pictureUrl, statusMessage, NoteData, id, action, NoteName, prevlevel, level);
                }else if($('#select_note_category').val() && $('#select_note_subcategory').val() && $('#note_name').val() && $('#note_data').val()){
                    var userId = $("#userId").html();
                    var displayName = $("#displayName").html();
                    var pictureUrl = $("#pictureUrl").html();
                    var statusMessage = $("#statusMessage").html();

                    var prevlevel = $('#select_note_subcategory').val();
                    var NoteName = $('#note_name').val();
                    var NoteData = $('#note_data').val();
                    var id = '';
                    if(action == 'edit'){
                        id = $('#'+the_pic.parentNode.id).attr('NO');
                    }
                    var level = 'note';
                    xajax_AddFlex('note', userId, displayName, pictureUrl, statusMessage, NoteData, id, action, NoteName, prevlevel, level);
                }else{
                    alert('請填寫【選擇主類別、選擇次類別、筆記名稱、筆記連結或內容】');
                }
            }

            function CreateCategory(action){
                var errorMsg = '';

                switch(action){
                    case 'add':
                        if(!$('#category_name').val()){
                            errorMsg = '請填寫【主類別名稱】';
                        }
                        break;
                    case 'edit':
                        if(!$('#category_name').val() || !$('#select_category').val()){
                            errorMsg = '請填寫【主類別名稱、選擇主類別】';
                        }
                        break;
                }

                if(!errorMsg){
                    var userId = $("#userId").html();
                    var displayName = $("#displayName").html();
                    var pictureUrl = $("#pictureUrl").html();
                    var statusMessage = $("#statusMessage").html();

                    var CategoryName = $('#category_name').val();
                    var id = $('#select_category').val();
                    if(action=='delete'){
                        id = $('#'+the_pic.parentNode.id).attr('NO');
                    }
                    var prevlevel = '';
                    var level = 'category';

                    if(action=='delete'){
                        var Category_SubCategoryCtn = 0;
                        subcategory_list.forEach(function(note){
                            if(note[9] == id){
                                Category_SubCategoryCtn++;
                            }
                        });
                        if(Category_SubCategoryCtn > 0){
                            alert('請先刪除附屬之次類別');
                        }else{
                            if(confirm("確定要刪除嗎?") == true){
                                xajax_AddFlex('note', userId, displayName, pictureUrl, statusMessage, '', id, action, CategoryName, prevlevel, level);
                            }
                        }
                    }else{
                        xajax_AddFlex('note', userId, displayName, pictureUrl, statusMessage, '', id, action, CategoryName, prevlevel, level);
                    }
                }else{
                    alert(errorMsg);
                }
            }

            function CreateSubCategory(action){
                var errorMsg = '';

                switch(action){
                    case 'add':
                        if(!$('#select_maincategory').val() || !$('#subcategory_name').val()){
                            errorMsg = '請填寫【選擇主類別、次類別名稱】';
                        }
                        break;
                    case 'edit':
                        if(!$('#select_maincategory').val() || !$('#subcategory_name').val() || !$('#select_subcategory').val()){
                            errorMsg = '請填寫【選擇主類別、次類別名稱、選擇次類別】';
                        }
                        break;
                }

                if(!errorMsg){
                    var userId = $("#userId").html();
                    var displayName = $("#displayName").html();
                    var pictureUrl = $("#pictureUrl").html();
                    var statusMessage = $("#statusMessage").html();

                    var SubCategoryName = $('#subcategory_name').val();
                    var id = $('#select_subcategory').val();
                    if(action=='delete'){
                        id = $('#'+the_pic.parentNode.id).attr('NO');
                    }
                    var prevlevel = $('#select_maincategory').val();
                    var level = 'subcategory';
                    
                    if(action=='delete'){
                        var SubCategory_NoteCtn = 0;
                        note_list.forEach(function(note){
                            if(note[9] == id){
                                SubCategory_NoteCtn++;
                            }
                        });
                        if(SubCategory_NoteCtn > 0){
                            alert('請先刪除附屬之筆記');
                        }else{
                            if(confirm("確定要刪除嗎?") == true){
                                xajax_AddFlex('note', userId, displayName, pictureUrl, statusMessage, '', id, action, SubCategoryName, prevlevel, level);
                            }
                        }
                    }else{
                        xajax_AddFlex('note', userId, displayName, pictureUrl, statusMessage, '', id, action, SubCategoryName, prevlevel, level);
                    }
                }else{
                    alert(errorMsg);
                }
            }
            
            function SendNote(){
                var CategoryObj = $('.CategorySelect').find('.note_block');
                var SubCategoryObj = $('.SubCategorySelect').find('.note_block');
                var NoteObj = $('.NoteSelect');
                var BGColorList = ['#27ACB2', '#FF6B6E', '#A17DF5', '#27ACB2', '#FF6B6E', '#A17DF5', '#27ACB2', '#FF6B6E', '#A17DF5', '#27ACB2'];
                var carouselJSON = { 
                    "type": "carousel"
                  };
                var bubbleJSON = {
                    "type": "bubble",
                    "size": "nano",
                    "header": {
                        "type": "box",
                        "layout": "vertical",
                        "contents": [
                            {
                                "type": "text",
                                "text": "In Progress",
                                "color": "#ffffff",
                                "align": "start",
                                "size": "md",
                                "gravity": "center"
                            },
                            {
                                "type": "text",
                                "text": "70%",
                                "color": "#ffffff",
                                "align": "start",
                                "size": "xs",
                                "gravity": "center",
                                "margin": "lg"
                            }
                        ],
                        "backgroundColor": "#27ACB2",
                        "paddingTop": "19px",
                        "paddingAll": "12px",
                        "paddingBottom": "16px"
                    },
                    "body": {
                        "type": "box",
                        "layout": "vertical",
                        "contents": [
                            {
                                "type": "box",
                                "layout": "vertical",
                                "contents": [
                                    {
                                        "type": "text",
                                        "text": "筆記1",
                                        "color": "#8C8C8C",
                                        "size": "sm",
                                        "wrap": true
                                    }
                                ]
                            }
                        ],
                        "spacing": "md",
                        "paddingAll": "12px"
                    },
                    "styles": {
                        "footer": {
                            "separator": false
                        }
                    }
                };

                var bubbleCtn = -1;
                var carouselContent = [];
                CategoryObj.each(function(e) {
                    PushContent($(this));
                });
                SubCategoryObj.each(function(e) {
                    PushContent($(this));
                });
                NoteObj.each(function(e) {
                    PushContent($(this));
                });

                function PushContent(obj){
                    if(bubbleCtn < 9){
                        bubbleCtn++;
                        var ThisNote = JSON.parse(JSON.stringify(bubbleJSON));
                        ThisNote['header']['backgroundColor'] = BGColorList[bubbleCtn];
                        ThisNote['header']['contents'][0]['text'] = obj.parents('.category_block').find('.category_title').html();
                        ThisNote['header']['contents'][1]['text'] = obj.parents('.subcategory_block').find('.subcategory_title').html();
                        ThisNote['body']['contents'][0]['contents'][0]['text'] = obj.attr('name');
                        if(obj.attr('data')){
                            if(obj.attr('data').indexOf("http") !== -1){
                                ThisNote['action'] = {
                                    "type": 'uri',
                                    "uri": encodeURI(obj.attr('data'))
                                };
                            }else{
                                ThisNote['body']['contents'][0]['contents'][1] = { "type": "separator", "margin": "md" };
                                ThisNote['body']['contents'][0]['contents'][2] = { "type": "text", "text": obj.attr('data'), "color": "#8C8C8C", "size": "sm", "margin": "md", "wrap": true };
                            }
                        }
                        carouselContent.push(ThisNote);
                    }
                }

                if(bubbleCtn > -1){
                    var MsgJSON = JSON.parse(JSON.stringify(carouselJSON));
                    MsgJSON['contents'] = carouselContent;
                    var Msg = [{
                        "type": "flex",
                        "altText": '筆記',
                        "contents": MsgJSON
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
                    alert("請選擇要傳送的筆記");
                }
            }
            
            function push_category(obj) {
                if(event.target.className == 'category_title'){
                    var nowTime = new Date().getTime();
                    if (nowTime - lastClickTime < 400) {
                        lastClickTime = 0;
                        clickTimer && clearTimeout(clickTimer);
                        /*雙擊*/
                    } else {
                        lastClickTime = nowTime;
                        clickTimer = setTimeout(() => {
                            /*單擊*/
                            if(obj.hasClass("CategorySelect")){
                                obj.removeClass('CategorySelect');
                            }else{
                                obj.addClass('CategorySelect');
                            }
                            obj.find('.SubCategorySelect').removeClass('SubCategorySelect');
                            obj.find('.NoteSelect').removeClass('NoteSelect');
                        }, 400);
                    }
                }
            }

            function push_subcategory(obj) {
                if(event.target.className == 'subcategory_title'){
                    var nowTime = new Date().getTime();
                    if (nowTime - lastClickTime < 400) {
                        lastClickTime = 0;
                        clickTimer && clearTimeout(clickTimer);
                        /*雙擊*/
                    } else {
                        lastClickTime = nowTime;
                        clickTimer = setTimeout(() => {
                            /*單擊*/
                            var category_block = obj.parents('.category_block');
                            var all_subcategory_block = category_block.find('.subcategory_block');

                            if(category_block.hasClass("CategorySelect")){
                                category_block.removeClass('CategorySelect');
                                all_subcategory_block.addClass('SubCategorySelect');
                                obj.removeClass('SubCategorySelect');
                            }else{
                                if(obj.hasClass("SubCategorySelect")){
                                    obj.removeClass('SubCategorySelect');
                                }else{
                                    obj.addClass('SubCategorySelect');
                                    var SubCategorySelect = category_block.find('.SubCategorySelect');
                                    if(all_subcategory_block.length == SubCategorySelect.length){
                                        SubCategorySelect.removeClass('SubCategorySelect');
                                        category_block.addClass('CategorySelect');
                                    }
                                }
                            }
                            obj.find('.NoteSelect').removeClass('NoteSelect');
                        }, 400);
                    }
                }
            }

            function push_note(obj) {
                if(event.target.className == 'note'){
                    var nowTime = new Date().getTime();
                    console.log(nowTime+'/'+lastClickTime+'='+(nowTime-lastClickTime));
                    if (nowTime - lastClickTime < 400) {
                        lastClickTime = 0;
                        clickTimer && clearTimeout(clickTimer);
                        /*雙擊*/
                        dbl_push_note(obj);
                    } else {
                        lastClickTime = nowTime;
                        clickTimer = setTimeout(() => {
                            /*單擊*/
                            var category_block = obj.parents('.category_block');
                            var all_subcategory_block = category_block.find('.subcategory_block');
                            var subcategory_block = obj.parents('.subcategory_block');
                            var all_note_block = subcategory_block.find('.note_block');

                            if(category_block.hasClass("CategorySelect")){
                                category_block.removeClass('CategorySelect');
                                all_subcategory_block.addClass('SubCategorySelect');
                                subcategory_block.removeClass('SubCategorySelect');
                                all_note_block.addClass('NoteSelect');
                                obj.removeClass('NoteSelect');
                            }else{
                                if(subcategory_block.hasClass("SubCategorySelect")){
                                    subcategory_block.removeClass('SubCategorySelect');
                                    all_note_block.addClass('NoteSelect');
                                    obj.removeClass('NoteSelect');
                                }else{
                                    if(obj.hasClass("NoteSelect")){
                                        obj.removeClass('NoteSelect');
                                    }else{
                                        obj.addClass('NoteSelect');
                                        var NoteSelect = subcategory_block.find('.NoteSelect');
                                        if(all_note_block.length == NoteSelect.length){
                                            NoteSelect.removeClass('NoteSelect');
                                            subcategory_block.addClass('SubCategorySelect');
                                            var SubCategorySelect = category_block.find('.SubCategorySelect');
                                            if(all_subcategory_block.length == SubCategorySelect.length){
                                                SubCategorySelect.removeClass('SubCategorySelect');
                                                category_block.addClass('CategorySelect');
                                            }
                                        }
                                    }
                                }
                            }
                        }, 400);
                    }
                }
            }
            
            function dbl_push_note(obj) {
                if(!obj){
                    $('#note_press_background').hide();
                    obj = $('#'+the_pic.parentNode.id);
                }
                var favorite = '';
                var id = obj.attr('NO');
                
                if (obj.find('svg>path').css("fill") == "rgb(206, 61, 61)") {
                    obj.find('svg>path').css("fill", "#fff");
                    favorite = "false";
                } else {
                    obj.find('svg>path').css("fill", "rgb(206, 61, 61)");
                    favorite = "true";
                }
                
                xajax_AddFavorite('note', id, favorite);
            }
            
            function add_press() {
                for (iu = 0; iu < document.getElementsByClassName('category_block').length; iu++) {
                    var hammer = new Hammer(document.getElementById('push_category' + (iu + 1)));
                    hammer.on('press', function (ev) {
                        if(ev.target.className == 'category_title'){
                            the_div = ev.target.parentNode;
                            the_pic = ev.target;
                            the_name = ev.target.parentNode.childNodes[1];
                            the_id = ev.target.parentNode.id.substr(8);
                            $("#category_press_background").show();
                            if($("#"+the_div.id).attr("UID") == $("#userId").html()){
                                $("#category_press_background").find(".delete").show();
                            }else{
                                $("#category_press_background").find(".delete").hide();
                            }
                        }
                    });
                }
                for (iu = 0; iu < document.getElementsByClassName('subcategory_block').length; iu++) {
                    var hammer = new Hammer(document.getElementById('push_subcategory' + (iu + 1)));
                    hammer.on('press', function (ev) {
                        if(ev.target.className == 'subcategory_title'){
                            the_div = ev.target.parentNode;
                            the_pic = ev.target;
                            the_name = ev.target.parentNode.childNodes[1];
                            the_id = ev.target.parentNode.id.substr(8);
                            $("#subcategory_press_background").show();
                            if($("#"+the_div.id).attr("UID") == $("#userId").html()){
                                $("#subcategory_press_background").find(".delete").show();
                            }else{
                                $("#subcategory_press_background").find(".delete").hide();
                            }
                        }
                    });
                }
                for (iu = 0; iu < document.getElementsByClassName('note_block').length; iu++) {
                    var hammer = new Hammer(document.getElementById('push_note' + (iu + 1)));
                    hammer.on('press', function (ev) {
                        if(ev.target.className == 'note'){
                            the_div = ev.target.parentNode;
                            the_pic = ev.target;
                            the_name = ev.target.parentNode.childNodes[1];
                            the_id = ev.target.parentNode.id.substr(9);
                            if ($("#note_heart" + the_id).css('fill') == "rgb(206, 61, 61)") {
                                $("#note_press_button_area").find('.press_button').eq(0).html('從我的最愛中移除');
                            } else {
                                $("#note_press_button_area").find('.press_button').eq(0).html('加入我的最愛');
                            }
                            $("#note_press_background").show();
                            if($("#"+the_div.id).attr("UID") == $("#userId").html()){
                                $("#note_press_background").find(".delete").show();
                            }else{
                                $("#note_press_background").find(".delete").hide();
                            };
                        }
                    });
                }
            }
            
            $(function () {
                add_press();
            });
        </script>
    </body>
</html>