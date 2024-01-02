<?php /* Smarty version Smarty3-b7, created on 2021-03-28 13:47:09
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/GrabTickets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5364989866060185d4e3519-60331021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79d00ea1aa27658472311e0e628e718881788edf' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/GrabTickets.tpl',
      1 => 1616745452,
    ),
  ),
  'nocache_hash' => '5364989866060185d4e3519-60331021',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_cat')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.cat.php';
?><!DOCTYPE html>
<head>
    <title><?php if ($_smarty_tpl->getVariable('typeList')->value[$_smarty_tpl->getVariable('type')->value]){?><?php echo $_smarty_tpl->getVariable('typeList')->value[$_smarty_tpl->getVariable('type')->value];?>
 - <?php }?>搶票系統</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.css">
    
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/jquery-3.3.1.min.js"></script>
    <script type='text/javascript' src='<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/blackUI/blackUI.js'></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.js"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/bootstrap.min.js"></script>
    <script src='<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/form.js'></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    
    <!--<link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/AdminLTE.min.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">-->
    <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/dist/adminlte.min.js"></script>
    <style>
        .Type>.Title {
            font-weight: bold;
        }
        .Type>.Btn {
            width: -webkit-fill-available;
            margin-top: 10px;
            padding: 12px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'alertArea.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>
        <?php if ($_smarty_tpl->getVariable('typeList')->value[$_smarty_tpl->getVariable('type')->value]){?>
            <div class="col-xs-12">
                <a class="btn btn-warning" href="<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/?GrabTickets">回首頁</a>
            </div>
            <div class="col-xs-12">
                <textarea id="Copy" class="hide" value=""></textarea>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columns')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <div class="form-group Fields">
                        <?php $_smarty_tpl->assign("_subject",'',null,null);?>
                        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat(smarty_modifier_cat(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'type/'),$_smarty_tpl->getVariable('item')->value['type']),'.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                    </div>
                <?php }} ?>
                <div id="SendBtn" class="btn btn-success">複製代碼</div>
                <?php if ($_smarty_tpl->getVariable('TimetableUrl')->value){?>
                    <a class="btn btn-warning" target="_blank" href="<?php echo $_smarty_tpl->getVariable('TimetableUrl')->value;?>
">時刻表</a>
                <?php }?>
            </div>
        <?php }else{ ?>
            <div class="col-xs-12 Type">
                <h3 class="Title">選擇服務：</h3>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('typeList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <a class="btn btn-warning Btn" href="<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/?GrabTickets/type/<?php echo $_smarty_tpl->getVariable('key')->value;?>
"><?php echo $_smarty_tpl->getVariable('item')->value;?>
</a>
                <?php }} ?>
            </div>
        <?php }?>
    </div>
</div>

<script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/vconsole.min.js"></script>

<script>
    //var vConsole = new VConsole();
    var _type = '<?php echo $_smarty_tpl->getVariable('type')->value;?>
';
    $(function(){
        $("#SendBtn").bind('click', function(event) {
            var ErrorMsg = "";
            //高鐵
            if(_type==='thsrc'){
                var AutoTxt = "/*\n * 高鐵搶票 - 1. 查詢車次 + 2. 選擇車次\n */\n$(function(){ \n";
            //台鐵
            }else if(_type==='railway'){
                var AutoTxt = "/*\n * 台鐵搶票\n */\n$(function(){ \n";
            }else if(_type==='kktix'){
                var AutoTxt = "/*\n * KKTIX搶票\n */\n";
            }else if(_type==='tixCraft'){
                var AutoTxt = "/*\n * 拓元搶票\n */\n";
            }
            switch(_type){
                case 'thsrc':
                case 'railway':
                    $(".Fields .field").each(function(e) {
                        var value = $(this).val();
                        var name = $(this).attr('name').replace('fields[', '');
                        name = name.substr(0, name.length-1);
                        var label = $(this).parents('.Fields').find('label[for="'+name+'"]').html();
                        var tagname='', action='', attr='';
                        if(!value){
                            if(ErrorMsg){
                                ErrorMsg += '、';
                            }
                            ErrorMsg += label + '未填';
                        }else{
                            var AddFlag = true;
                            switch($(this).prop("tagName")){
                                case 'SELECT':
                                    //高鐵
                                    if(_type==='thsrc'){
                                        tagname = 'select';
                                    //台鐵
                                    }else if(_type==='railway'){
                                        switch(label){
                                            case '出發站':
                                            case '抵達站':
                                            case '一般座票數':
                                                tagname = 'input';
                                                break;
                                            default:
                                                tagname = 'select';
                                                break;
                                        }
                                    }
                                    action = ".val('"+ value +"')";
                                    break;
                                case 'INPUT':
                                    tagname = 'input';
                                    switch($(this).attr("type")){
                                        case 'radio':
                                            if(!$(this).prop("checked")){
                                                AddFlag = false;
                                            }
                                            action = ".click()";
                                            attr = ".eq("+ $(tagname+'[name="'+$(this).attr('name')+'"]').index($(this)) +")";
                                            break;
                                        case 'text':
                                            action = ".val('"+ value +"')";
                                            break;
                                        case 'date':
                                            action = ".val('"+ value.replaceAll('-', '/') +"')";
                                            break;
                                    }
                                    break;
                            }
                            if(AddFlag){
                                //高鐵
                                if(_type==='thsrc'){
                                    switch(label){
                                        case '身分證':
                                            AutoTxt += "alert('請輸入驗證碼後，送出');\n";
                                            AutoTxt += "/*\n * 高鐵搶票 - 3. 取票資訊\n */\n";
                                            AutoTxt += "$('[name="+'"'+ "idInputRadio" +'"'+"]').eq(0).click(); //選擇-身分證\n";
                                            break;
                                        case '電話':
                                            AutoTxt += "$('[name="+'"'+ "eaiPhoneCon:phoneInputRadio" +'"'+"]').eq(0).click(); //選擇-電話\n";
                                            break;
                                    }
                                //台鐵
                                }else if(_type==='railway'){
                                    switch(label){
                                        case '身份證':
                                            AutoTxt += "$('[name="+'"'+ "custIdTypeEnum" +'"'+"]').eq(0).click(); //選擇-身份證\n";
                                            break;
                                    }
                                }

                                AutoTxt += "$('"+ tagname +"[name="+'"'+ name +'"'+"]')"+ attr + action +";" +' //' + label + "\n";
                            }
                        }
                    });
                    //高鐵
                    if(_type==='thsrc'){
                        AutoTxt += "$('[name="+'"'+ "agree" +'"'+"]').click(); //注意事項、保護權益 同意\n";
                        AutoTxt += "$('#isSubmit').click(); //送出\n";
                    //台鐵
                    }else if(_type==='railway'){
                        AutoTxt += "alert('請點擊我不是機器人後，送出');\n";
                    }
                    AutoTxt += "});";
                    break;
                case 'kktix':
                    var ChooseArea = $(".Fields .field[name='fields[ChooseArea]']").val();
                    var ChoosePrice = $(".Fields .field[name='fields[ChoosePrice]']").val();
                    var ChooseQty = $(".Fields .field[name='fields[ChooseQty]']").val();
                    var ChooseQuestion = $(".Fields .field[name='fields[ChooseQuestion]']").val();
                    if(!ChooseArea){
                        if(ErrorMsg){
                            ErrorMsg += '、';
                        }
                        ErrorMsg += '價位未填';
                    }
                    if(!ChoosePrice){
                        if(ErrorMsg){
                            ErrorMsg += '、';
                        }
                        ErrorMsg += '區域未填';
                    }else{
                        ChoosePrice = ChoosePrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    }
                    if(!ChooseQty){
                        if(ErrorMsg){
                            ErrorMsg += '、';
                        }
                        ErrorMsg += '數量未填';
                    }
                    AutoTxt += "$(function(){ \n\
    $('.form-actions.align-center.register-new-next-button-area').css('position', 'relative'); \n\
    var ChooseArea = '"+ ChooseArea +"'; //選區域 \n\
    var ChoosePrice = '"+ ChoosePrice +"'; //選價位 \n\
    var ChooseQty = "+ ChooseQty +"; //選數量 \n\
    var ChooseQuestion = '"+ ChooseQuestion +"'; //自動填入答案 \n\
    var ticketLabel = ($('.display-table [ng-if="+'"'+"!!ticket.labelsText"+'"'+"]')[0]) ? $('.display-table [ng-if="+'"'+"!!ticket.labelsText"+'"'+"]') : $('.display-table .ticket-name');\n\
 \n\
    ticketLabel.each(function(e) { \n\
        var displayTable = $(this).parents('.display-table').eq(0); \n\
        if($(this).html() && $(this).html().indexOf(ChooseArea)!=-1){ \n\
            if(displayTable.find('[ng-if="+'"'+"ticket.price"+'"'+"]>span').html().indexOf(ChoosePrice)!=-1){ \n\
                for(var i=0;i<ChooseQty;i++){ displayTable.find('[ng-if="+'"'+"purchasableAndSelectable"+'"'+"]>.plus').click(); } \n\
                if($('#person_agree_terms').prop('checked')!==true){ $('#person_agree_terms').click() }; //同意 \n\
                if(!$('[ng-if="+'"'+"hasRecaptcha()"+'"'+"]>[ng-switch="+'"'+"runTime.event.captcha_type"+'"'+"] [ng-if="+'"'+"ticketChosen()"+'"'+"]')[0]){ //沒問題，直接送出 \n\
                    $('[ng-show="+'"'+"anyPurchasable()"+'"'+"]>button').click(); //送出 \n\
                }else{ \n\
                    var ticketChosen = $('[ng-if="+'"'+"ticketChosen()"+'"'+"]'); \n\
                    var answer = ticketChosen.find('[name="+'"'+"captcha_answer"+'"'+"]').eq(0); \n\
                    $('html, body').stop().animate({ scrollTop: answer.offset().top }, 1); \n\
                    var Question = ticketChosen.find('p.ng-binding').html(); \n\
                    ChooseQuestion = (ChooseQuestion) ? ChooseQuestion : prompt(Question); \n\
                    if(!answer.val()){ answer.val(ChooseQuestion).change(); } \n\
                    answer.filter(':visible').focus(); \n\
                    if(ChooseQuestion){ $('[ng-show="+'"'+"anyPurchasable()"+'"'+"]>button').click(); } //有答案自動送出 \n\
                } \n\
            } \n\
        } \n\
    }); \n\
});";//ticketChosen.find('h4.ng-binding').html() + "+ '"\\n\\n"' +" + 
                    break;
                case 'tixCraft':
                    var ChooseDate = $(".Fields .field[name='fields[ChooseDate]']").val().replaceAll('-', '/');
                    var ChooseTitle = $(".Fields .field[name='fields[ChooseTitle]']").val();
                    var ChoosePlace = $(".Fields .field[name='fields[ChoosePlace]']").val();
                    var ChooseArea = $(".Fields .field[name='fields[ChooseArea]']").val();
                    var ChoosePrice = $(".Fields .field[name='fields[ChoosePrice]']").val();
                    var ChooseQty = $(".Fields .field[name='fields[ChooseQty]']").val();
                    var ChooseQuestion = $(".Fields .field[name='fields[ChooseQuestion]']").val();
                    if(!ChooseDate){
                        if(ErrorMsg){
                            ErrorMsg += '、';
                        }
                        ErrorMsg += '活動日期未填';
                    }
                    if(!ChooseTitle){
                        if(ErrorMsg){
                            ErrorMsg += '、';
                        }
                        ErrorMsg += '活動名稱未填';
                    }
                    if(!ChoosePlace){
                        if(ErrorMsg){
                            ErrorMsg += '、';
                        }
                        ErrorMsg += '活動地點未填';
                    }
                    if(!ChooseArea){
                        if(ErrorMsg){
                            ErrorMsg += '、';
                        }
                        ErrorMsg += '價位未填';
                    }
                    if(!ChoosePrice){
                        if(ErrorMsg){
                            ErrorMsg += '、';
                        }
                        ErrorMsg += '區域未填';
                    }
                    if(!ChooseQty){
                        if(ErrorMsg){
                            ErrorMsg += '、';
                        }
                        ErrorMsg += '數量未填';
                    }
                    AutoTxt += "$(function(){ \n\
    var ChooseDate = '"+ ChooseDate +"'; //選活動日期 \n\
    var ChooseTitle = '"+ ChooseTitle +"'; //輸入活動名稱 \n\
    var ChoosePlace = '"+ ChoosePlace +"'; //輸入活動地點 \n\
    var ChooseArea = '"+ ChooseArea +"'; //選區域 \n\
    var ChoosePrice = '"+ ChoosePrice +"'; //選價位 \n\
    var ChooseQty = "+ ChooseQty +"; //選數量 \n\
    var ChooseQuestion = '"+ ChooseQuestion +"'; //自動填入答案 \n\
    $('#gameList>table>tbody>tr').each(function(e) { \n\
        var Date = $(this).find('td').eq(0).html(); \n\
        var Title = $(this).find('td').eq(1).html(); \n\
        var Place = $(this).find('td').eq(2).html(); \n\
        var Btn = $(this).find('td>input[type="+'"'+"button"+'"'+"]'); \n\
        if(Date.indexOf(ChooseDate)!=-1 && Title.indexOf(ChooseTitle)!=-1 && Place.indexOf(ChoosePlace)!=-1 && Btn[0]){ \n\
            location.href = Btn.attr('data-href'); \n\
        } \n\
    }); \n\
    $('.zone.area-list>.zone-label>b').each(function(e) { \n\
        var PriceArea = $(this); \n\
        if(PriceArea.html() && PriceArea.html().indexOf(ChoosePrice)!=-1){ \n\
            $('.area-list[id="+'"'+"'+ PriceArea.parent().attr('data-id') +'"+'"'+"]>.select_form_b>a').each(function(e) { \n\
                if($(this).html() && $(this).html().indexOf(ChooseArea)!=-1 && $(this).html().indexOf(ChoosePrice)!=-1){ \n\
                    $(this).click(); \n\
                } \n\
            }); \n\
        } \n\
    }); \n\
    $('#ticketPriceList .mobile-select').val(ChooseQty).change(); \n\
    if($('label[for="+'"'+"TicketForm_agree"+'"'+"]')[0]){ \n\
        $('label[for="+'"'+"TicketForm_agree"+'"'+"]')[0].dispatchEvent(new MouseEvent('click', { \n\
              view: window, \n\
              bubbles: true, \n\
              cancelable: true \n\
        })); \n\
    } \n\
    $('#TicketForm_verifyCode').filter(':visible').focus(); \n\
});";
                    break;
            }
            
            if(ErrorMsg){
                alert(ErrorMsg);
            }else{
                $('#Copy').val(AutoTxt).removeClass('hide').select();
                document.execCommand("Copy");
                $('#Copy').val('').addClass('hide');
                var Msg = '代碼已複製，請於分頁[F12-Console]中貼上代碼，並以[Enter]送出' + "\n是否自動跳轉頁面?";
                <?php if ($_smarty_tpl->getVariable('OrderUrl')->value){?>
                    if(confirm(Msg)){ 
                        var NewWindow = window.open('<?php echo $_smarty_tpl->getVariable('OrderUrl')->value;?>
');
                    }
                <?php }?>
            }
        });
    });
</script>

</body>
</html>