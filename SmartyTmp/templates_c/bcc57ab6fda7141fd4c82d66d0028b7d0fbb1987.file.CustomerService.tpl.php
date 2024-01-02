<?php /* Smarty version Smarty3-b7, created on 2022-10-21 11:25:09
         compiled from "/home1/bot.lineapie.tw/library/modules/_public/view/CustomerService.tpl" */ ?>
<?php /*%%SmartyHeaderCode:767071730635211155ec292-80306776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bcc57ab6fda7141fd4c82d66d0028b7d0fbb1987' => 
    array (
      0 => '/home1/bot.lineapie.tw/library/modules/_public/view/CustomerService.tpl',
      1 => 1627808196,
    ),
  ),
  'nocache_hash' => '767071730635211155ec292-80306776',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/bot.lineapie.tw/library/plugin/smarty/class/plugins/modifier.cat.php';
?><script type='text/javascript' src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
<style>
    .emojionearea .emojionearea-editor {
        min-height: auto;
    }
    ul.sidebar-menu>li.header {
        border-bottom: 1px solid;
    }
</style>
<div>
    <textarea id='TranslateEmoji' class="hide"></textarea>
</div>
<script>
    $(function () {
        $('#TranslateEmoji').emojioneArea({
            pickerPosition: "top",
            tonesStyle: "bullet"
        });
        $(document).on('click', 'ul.sidebar-menu>li', function(event) {
            if(!$(this).hasClass('header')){
                $("ul.sidebar-menu>li.active").removeClass('active');
                $(this).addClass('active');
            }else{
                var headerId = $(this).attr('id');
                if($('.'+headerId).eq(0).css('display')==='none'){
                    if($('.'+headerId+'.active').hasClass('treeview')){
                        $('ul.sidebar-menu.tree>li').show();
                    }else{
                        $('.'+headerId).show();
                    }
                    $('.'+headerId + '.treeview.active>a').click();
                }else{
                    $('.'+headerId).hide();
                    $('.'+headerId + '.treeview.active.menu-open>a').click();
                }
            }
        });
    });
    function TranslateEmoji(ObjHtml){
        var EmojiEditor = $('#TranslateEmoji').parent().find('.emojionearea .emojionearea-editor');
        if(ObjHtml){
            EmojiEditor.html(ObjHtml.split('<').join('《').split('>').join('》')).focus().blur();
            return EmojiEditor.html().split('《').join('<').split('》').join('>');
        }else{
            return ObjHtml;
        }
    }
    function GetEmojiIcon(Chat=null, DefaultColor=null, OriginalIcon=null){
        if(!DefaultColor){
            DefaultColor = [
                119, 120, 122, 123, 124, 127, 130, 133, 134, 135,
                137, 139, 141, 145, 146, 150, 155, 156, 159, 160,
                171, 174, 176, 179, 180, 181, 193, 204, 207, 208,
                210, 211, 213, 216, 223, 230, 231, 232, 238, 243,
                245, 246, 249, 250, 251
            ];
        }
        if(!OriginalIcon){
            OriginalIcon = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAABuCAYAAADMB4ipAAAHfElEQVRo3u1XS1NT2Rb+9uOcQF4YlAJzLymFUHaLrdxKULvEUNpdTnRqD532f+AHMLMc94gqR1Zbt8rBnUh3YXipPGKwRDoWgXvrYiFUlEdIkPPYZ/dAkwox5yQCVt/bzRrBPnt9e+211/etFeDQDu3ArL+/X37OeqmRWoH7+vpItfWawStF1tfXR+zW9xW5ne0p8loOcAKuCdwpRft60C8a+X5zTvebCqcAvmidf1GGHtqhHdpf1qqKzsrKipyensbi4iKWl5cBAMFgEG1tbYhGo2hpadlbmxseHpaDg4MAgI6ODng8HgBAPp/H/Pw8AODatWvo7e2tvUHrui7v3r2L+fl5XL58GVeuXIHH49m1N5/Py0ePHmF0dBQdHR24desWVFXdtYdXAn/48CHm5+dx8+ZNRKPRigEUDpuenpb3799H4YaOnWh5eVmOj48jFoshGo0STdPkwMCAXF5elqV7BgYGpKZpMhqNklgshrGxMbx580Y6gicSCTDGEIvFAADpdBqpVArJZLK4J5lMIpVKIZ1OAwBisRgYY0gkEs6Rp1IphMNh+Hw+AgCGYQAANE0r7in8Xfjm8/lIOBzGq1evnMHX19fR1NRU/D8UCoFzjnA4XFwLh8PgnCMUChXXmpqakM1mUfVBS62xsZHk83lZWi1nz579ZA0AhBDO4A0NDchkMsWSJIRAURRiVy26rktVVUkmk0EgEHAGP3XqFKamppDP56Vpmrhz5w5u374t/X4/OP+w3TRNZLNZ6LoO0zSRz+dlf38/Ll686Jzz8+fPQwiBeDwOt9tNrl+/jkwmU6yaQpVkMhncuHEDbrebxONxCCEQiUScIw8Gg+TBgwdyZGQEyWRSdnV1kVQqJYeGhrC6ugrGGEKhEHp7e3Hy5EmSTCblvXv30NPTg2AwSA6M/vF4HCMjI7b0/yzh8vv9AIBsNrt34aokuQsLC7skt729varkHtqftUFf++FHsrq0QN3eBvp68Tfvf9Mv12oFCYU7G//e9nVuO7dpNbe2W4M//yQr0p8yRvyBo1Zr++lwLcCt7afD/sBRizJGavrB1dDYYh47Htrq+Kb7jBNwxzfdZ44dD201NLaYVUkU7ozQpuAJBkARwnRZpunN5zaa5hJjiXLH05GeiMd7JEM5zzHGNQBGZvk/Iv0yYVWMvK0zKk1Dl6ahW5RQobjqdjy+wEZn9PKF0n2d0csXPL7AhuKq26GECtPQLdPQZVtn1LlB69p7yRVVSEiDEGJwRd12e4+8PR3piRQidnuPvOWKuk0IMSSkwRVV6Np7WVVbSqvGsgSnlKkAFNPQXdrOtuKqcxtcUTUAhmUJnVJmlleJo3CVHmAaOlPUOmYJkxFKibQsSRkXhr4juKIKO2BHVSwcoLrqCVdUYho6K3YYRRWmoUtdey/tgKtK7rUffiQAsLq08MnbNLe2WwBgB/zHzueFyD8nwlIfbvdx8eU0WV1aKD1cVAMs9+F2j9gUPEEKemEJIe3AnXy4XfkBoNKSZHNthWfX31EA69VKttyHVyIOY1wRwmS6tqNsrr31vXo5k/bUu4gT2cp9lhbm0rzCJpeUUrE0vS63+c7/6uXMbDUWl/ssLczNFrVFddUT09AZpUy1LKvO0DVfPrfR9HxqfNbuEe185l9MFX3o6tIC5YpKFLWOfdQQ93Zu49j0+FDCDtjOp1yaOQCYhs4Y40wI05XfWj8yPT40Ua2ey33mEmMTtp2IUEq0nW3FKeJPGPjRp1Iz2QUuLUu66txG9NLVSK3gBZ+C1lcE54oqKOOCK6rm8QU2unu+u1ANuNynvFsBAG1ubbdMQ5eGviMAFDuP0w3sfMpvQEtb24fOQncU1bXl8R7JnOu+ZNv97XxKJwY6+PNPsrm13drObVqUMlMIU5OWpVHOc96Go5lTnV2fzC/VfAozD7HTCa6olBBa1Imlhbmq2lLuQ5xaW6nCPfnln0Yt7bDUhzhps8cfKH5//uTXmvS81OeLdqI/ZoROzSZrHqG/OvOPzxuhK5VgJTvV2bW3EdqJRABwrvvS/kfoSkoZvXT1YEbociHr7vnuYEfogpBFL109HKH/h0fomnXg3Lff79r7/MmvVbWG7gX4QObzc99+Tz7mHKah05KcW6ahQ9feS6cbMCdgt7eBWJagjCuUAC5tZzuouuo0Spm0hElc9R4cbf4bVl8v1p6WUmCuqEwIs34ruxaeeTy4uJVd67As08UVlVmWoG5vA7FLG3WMmHEupVTyW+vh2cn4DADMTsaTuc21LiGEhzHOnQ6gNtMrJSBMCKHkNt999WLi0S7hejEZH81n174WpukiIMw0dKq66p3Bw50RwhUVXFGJKUy28Xal48VkfKrSlWenhsc23q2cEB9SR7iiItwZIbbgHn8AlDFCCMW7laXjqZnHjkNpaubJzNuVpWZCKChjxOMPVH/QlaW0f/G3ZLqWWl6ce/bvlddp7yFD/w8Z+njoX1+GoZMjgzMAMDkyeLAMnRh+uKveJ0YGD4ahEyODFRk6OfrL/hj67GnckaHPng7vjaGzyYmaGDr77KktQ38H8tqx8Wja+WIAAAAASUVORK5CYII=';
        }
        
        var SendBox = '';
        var IconColorRGB = {};
        var MinColor = DefaultColor[0];
        
        switch(Chat){
            case 'line':
                SendBox = '#SendLineBox';
                IconColorRGB = {
                    "R" : 70,
                    "G" : 76,
                    "B" : 107
                };
                break;
            case 'facebook':
                SendBox = '#SendFacebookBox';
                IconColorRGB = {
                    "R" : 0,
                    "G" : 153,
                    "B" : 255
                };
                break;
            default :
                break;
        }
        if(Chat && SendBox){
            var myImg = new Image();
            var EmojiIconSrc = null;
            myImg.src = OriginalIcon;
            myImg.onload = function() {
                var canvas = document.createElement("canvas");
                var ctx = canvas.getContext("2d");
                canvas.width = myImg.width;
                canvas.height = myImg.height;
                ctx.drawImage(myImg,0,0);
                var imgd = ctx.getImageData(0, 0, myImg.width, myImg.height);
                for (var i = 0; i <imgd.data.length; i += 4) {
                    if( (imgd.data[i+0]===imgd.data[i+1]&&imgd.data[i+0]===imgd.data[i+2]) && (DefaultColor.indexOf(imgd.data[i+0])>-1) ){
                        var NowColor = imgd.data[i+0];
                        imgd.data[i+0] = IconColorRGB['R'];
                        imgd.data[i+1] = IconColorRGB['G'];
                        imgd.data[i+2] = IconColorRGB['B'];
                        imgd.data[i+3] = 255 + MinColor - NowColor;
                    }
                }
                ctx.putImageData(imgd, 0, 0);
                var newImage = new Image();
                EmojiIconSrc = canvas.toDataURL("image/png");
                $(SendBox + ' .emojionearea .emojionearea-button>div').attr('style', 'background-image: url("'+ EmojiIconSrc +'")!important');
            };
        }
    }
</script>
<audio id="CustomerServiceSound" class="hide">
    <source src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/line.mp3" type="audio/mpeg">
</audio>
<script type="text/javascript">
    var _firstTitle = document.title;
    var CustomerLineServiceInterval;
    var CustomerLineServiceTimeout;
    var CustomerFacebookServiceInterval;
    var CustomerFacebookServiceTimeout;
    
    var TimeoutId = window.setTimeout(function() {}, 0);
    while (TimeoutId--) {
        window.clearTimeout(TimeoutId);
    }
    var IntervalId = window.setInterval(function() {}, 0);
    while (IntervalId--) {
        window.clearInterval(IntervalId);
    }
    
    function PlaySound(name, chatroom) {
        $("#CustomerServiceSound")[0].play();
        
        var CustomerServiceInterval = null;
        var CustomerServiceTimeout = null;   
        var ChatBoxClassName = '';
        var BGcolor = '';
        var _firstChatTitle = '';
        
        switch(chatroom){
            case 'line':
                ChatBoxClassName = '#LineChatBox';
                BGcolor = '#00b900';
                CustomerServiceInterval = CustomerLineServiceInterval;
                CustomerServiceTimeout = CustomerLineServiceTimeout;
                _firstChatTitle = 'Line客服';
                break;
            case 'facebook':
                ChatBoxClassName = '#FacebookChatBox';
                BGcolor = '#3b5998';
                CustomerServiceInterval = CustomerFacebookServiceInterval;
                CustomerServiceTimeout = CustomerFacebookServiceTimeout;
                _firstChatTitle = 'Facebook客服';
                break;
        }
        
        if(CustomerServiceInterval){
            clearInterval(CustomerServiceInterval);
        }
        if(CustomerServiceTimeout){
            clearTimeout(CustomerServiceTimeout);
        }
        CustomerServiceInterval = setInterval(function(){
            $(ChatBoxClassName).css('border-color', BGcolor);
            $(ChatBoxClassName + ' .box-header.with-border').css('background-color', BGcolor).css('border-color', BGcolor);
            $(ChatBoxClassName + ' .box-header.with-border .box-title').html(name + '正在說..');
            document.title = name + '正在說..';
            CustomerServiceTimeout = setTimeout(function(){
                $(ChatBoxClassName).css('border-color', '#202a43');
                $(ChatBoxClassName + ' .box-header.with-border').css('background-color', '#202a43').css('border-color', '#202a43');
                $(ChatBoxClassName + ' .box-header.with-border .box-title').html(_firstChatTitle);
                document.title = _firstTitle;
            }, 2000);
        }, 3000);
    }
</script>
<?php if ($_smarty_tpl->getVariable('LineChat')->value){?>
    <div id="LineChatBox" class="box box-success direct-chat direct-chat-success direct-chat-contacts-open collapsed-box ChatBox">
        <div class="box-header with-border">
            <h3 class="box-title">Line客服</h3>
            <div class="box-tools pull-right">
                <span id="LineRedBubble" data-toggle="tooltip" title="" class="badge bg-red <?php if ($_smarty_tpl->getVariable('LineTotalMember')->value==0){?>hide<?php }?>"><?php echo $_smarty_tpl->getVariable('LineTotalMember')->value;?>
</span>
                <button type="button" class="btn btn-box-tool" onclick="$('#LineChatMember').val('');" data-widget="collapse"><i class="fa fa-plus"></i></button>
                <button type="button" class="btn btn-box-tool" onclick="if($('#SendLineBox').css('display')!=='none' || $('#LineMessagesArea').children().length===0){ $('#SendLineBox').hide();$('#SendLineBox').parents('.box-footer').css('padding', '0px'); }else{ $('#SendLineBox').show();$('#SendLineBox').parents('.box-footer').css('padding', '10px'); }" data-toggle="tooltip" data-widget="chat-pane-toggle"><i class="fa fa-fw fa-comment-o"></i></button>
                <button type="button" class="btn btn-box-tool" onclick="$('#LineChatMember').val('');" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <!-- 目前用戶 訊息記錄 -->
            <div id="LineMessagesArea" class="direct-chat-messages begin MessagesArea" UID="">
                
            </div>
            <!-- 列表 -->
            <div id="UserArea" class="direct-chat-contacts">
                <div class="input-group ChatSearch">
                    <input id="LineSearchKey" type="text" class="form-control SearchKey" placeholder="搜尋">
                    <span class="input-group-btn">
                        <div id="LineSearchBtn" class="btn btn-flat SearchBtn">
                            <i class="fa fa-search"></i>
                        </div>
                    </span>
                </div>
                <ul id="LineRoomList" class="contacts-list"></ul>
            </div>
        </div>
        <div class="box-footer">
            <form id="SendLineMsgForm">
                <div id="LineMsgBox" class="MsgBox">
                    <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'type/message.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                </div>
                <div id="SendLineBox" class="input-group LineBox" style="display: none;">
                    <input id="LineChatMember" type="hidden" name="fields[UID]">
                    <span class="input-group-btn" onclick="OpenLineMsg();">
                        <i class="fa fa-fw fa-plus-square AddMsgBtn" style="margin-right: 5px;"></i>
                    </span>
                    <textarea id="TypeLineMsg" type="text" name="fields[message]" placeholder="輸入訊息 ..." rows="1" class="form-control TypeMsg" onchange="LineResize($(this));" onkeyup="LineResize($(this));"></textarea>
                    <span id="SendLineMsgBtn" class="input-group-btn" onclick="SendLineMsg();">
                        <i class="fa fa-fw fa-send SendMsgBtn" style="margin-left: 5px;"></i>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function OpenLineMsg(){
            if($('#LineMsgBox').css('display') === 'none'){
                $('#LineMsgBox').show();
                $('#SendLineBox .AddMsgBtn').removeClass('fa-plus-square').addClass('fa-minus-square');
                if($('#FacebookMsgBox').css('display') !== 'none'){
                    $('#FacebookMsgBox').hide();
                    $('#SendFacebookBox .AddMsgBtn').removeClass('fa-minus-square').addClass('fa-plus-square');
                }
            }else{
                $('#LineMsgBox').hide();
                $('#SendLineBox .AddMsgBtn').removeClass('fa-minus-square').addClass('fa-plus-square');
            }
        }
        function AppendLineMsg(_Action, _Html, _Key){
            if($("#LineMessagesArea .direct-chat-msg[data-key='"+ _Key +"']").length === 0){
                switch(_Action){
                    case 'append':
                        $("#LineMessagesArea").append(_Html);
                        break;
                    default :
                        $("#LineMessagesArea").prepend(_Html);
                        break;
                }
            }
        }
        function ReSortLineMsg(){
            var $msgListItem = $("#LineMessagesArea .direct-chat-msg");
            $msgListItem.sort(function (a, b) {
                var sort1 = a.getAttribute('data-sort') * 1;
                var sort2 = b.getAttribute('data-sort') * 1;
                var sortNum = 1;
                if (sort1 > sort2)
                    return 1 * sortNum;
                if (sort1 < sort2)
                    return -1 * sortNum;
                        return 0;
            });
            $msgListItem.detach().appendTo("#LineMessagesArea");
            $("#LineMessagesArea .direct-chat-text.text").each(function(e) {
                if(!$(this).hasClass("ToEmoji")){
                    $(this).addClass('ToEmoji').html(TranslateEmoji($(this).html()));
                }
            });
        }
        var Linestep = 0; // 步驟變數
        var LinetextList = new Array(); // array容器
        function LineResize(obj){
            obj.css({'height':'auto','overflow-y':'hidden'}).height(obj[0].scrollHeight);
            var Line = parseInt((obj.height()-12)/20) - 1;
            if(Line > 20){
                obj.val(LinetextList[Linestep-1]);
                obj.css({'height':'auto','overflow-y':'hidden'}).height(obj[0].scrollHeight);
            }else{
                Linestep++;
                LinetextList.push(obj.val());
            }
        }
        function LineUserSelect(obj){
            $("#LineMessagesArea").removeClass("begin");
            $("#LineChatMember").val(obj.attr("UID"));
            $("#LineMessagesArea").attr("UID", obj.attr("UID")).attr("ChatRoom", obj.attr("ChatRoom")).html("");
            var ServiceMsgLen = $('#LineMessagesArea .direct-chat-msg.right').length;
            var MsgLength = $('#LineMessagesArea .direct-chat-msg').length - ServiceMsgLen;
            xajax_LoadMsg(obj.attr("ChatRoom"), obj.attr("UID"), MsgLength, "prepend", null, 'start');
        }
        
        $(function () {
            $('#TypeLineMsg').emojioneArea({
                pickerPosition: "top",
                tonesStyle: "bullet"
            });
            window.setTimeout(function () {
                GetEmojiIcon('line');
            }, 1000);
            $('#LineMessagesArea').scroll(function(e) {
                if( $('#LineMessagesArea').scrollTop() === 0 ){
                    var ChatRoom = $('#LineMessagesArea').attr('ChatRoom');
                    var UID = $('#LineMessagesArea').attr('UID');
                    var ServiceMsgLen = $('#LineMessagesArea .direct-chat-msg.right').length;
                    var MsgLength = $('#LineMessagesArea .direct-chat-msg').length - ServiceMsgLen;
                    if(MsgLength > 0){
                        xajax_LoadMsg(ChatRoom, UID, MsgLength, "prepend", null, 'more');
                    }
                }
            });
            $(document).on('click', '#LineSearchBtn', function(event) {
                var LineSearchKey = $('#LineSearchKey').val();
                if(LineSearchKey){
                    $("#LineRoomList li").hide();
                    $("#LineRoomList li[UID='"+ LineSearchKey +"']").show();
                    $("#LineRoomList li[displayName='"+ LineSearchKey +"']").show();
                    $("#LineRoomList li").each(function(e) {
                        var UID = $(this).attr('UID');
                        var displayName = $(this).attr('displayName');
                        if( (UID.indexOf(LineSearchKey)!==-1) || (displayName.indexOf(LineSearchKey)!==-1) ){
                            $(this).show();
                        }
                    });
                }
            });
        });
    </script>
<?php }?>
<?php if ($_smarty_tpl->getVariable('FacebookChat')->value){?>
    <div id="FacebookChatBox" class="box box-primary direct-chat direct-chat-success direct-chat-contacts-open collapsed-box ChatBox">
        <div class="box-header with-border">
            <h3 class="box-title">Facebook客服</h3>
            <div class="box-tools pull-right">
                <span id="FacebookRedBubble" data-toggle="tooltip" title="" class="badge bg-red <?php if ($_smarty_tpl->getVariable('FacebookTotalMember')->value==0){?>hide<?php }?>"><?php echo $_smarty_tpl->getVariable('FacebookTotalMember')->value;?>
</span>
                <button type="button" class="btn btn-box-tool" onclick="$('#FacebookChatMember').val('');" data-widget="collapse"><i class="fa fa-plus"></i></button>
                <button type="button" class="btn btn-box-tool" onclick="if($('#SendFacebookBox').css('display')!=='none' || $('#FacebookMessagesArea').children().length===0){ $('#SendFacebookBox').hide();$('#SendFacebookBox').parents('.box-footer').css('padding', '0px'); }else{ $('#SendFacebookBox').show();$('#SendFacebookBox').parents('.box-footer').css('padding', '10px'); }" data-toggle="tooltip" data-widget="chat-pane-toggle"><i class="fa fa-fw fa-comment-o"></i></button>
                <button type="button" class="btn btn-box-tool" onclick="$('#FacebookChatMember').val('');" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <!-- 目前用戶 訊息記錄 -->
            <div id="FacebookMessagesArea" class="direct-chat-messages begin MessagesArea" UID="">
                
            </div>
            <!-- 列表 -->
            <div id="UserArea" class="direct-chat-contacts">
                <div class="input-group ChatSearch">
                    <input id="FacebookSearchKey" type="text" class="form-control SearchKey" placeholder="搜尋">
                    <span class="input-group-btn">
                        <div id="FacebookSearchBtn" class="btn btn-flat SearchBtn">
                            <i class="fa fa-search"></i>
                        </div>
                    </span>
                </div>
                <ul id="FacebookRoomList" class="contacts-list"></ul>
            </div>
        </div>
        <div class="box-footer">            
            <form id="SendFacebookMsgForm">
                <div id="FacebookMsgBox" class="MsgBox">
                    <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'type/fbmessage.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                </div>
                <div id="SendFacebookBox" class="input-group LineBox" style="display: none;">
                    <input id="FacebookChatMember" type="hidden" name="fields[UID]">
                    <span class="input-group-btn" onclick="OpenFacebookMsg();">
                        <i class="fa fa-fw fa-plus-square AddMsgBtn" style="margin-right: 5px;"></i>
                    </span>
                    <textarea id="TypeFacebookMsg" type="text" name="fields[message]" placeholder="輸入訊息 ..." rows="1" class="form-control TypeMsg" onchange="FacebookResize($(this));" onkeyup="FacebookResize($(this));"></textarea>
                    <span id="SendFacebookMsgBtn" class="input-group-btn" onclick="SendFacebookMsg();">
                        <i class="fa fa-fw fa-send SendMsgBtn" style="margin-left: 5px;"></i>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function OpenFacebookMsg(){
            if($('#FacebookMsgBox').css('display') === 'none'){
                $('#FacebookMsgBox').show();
                $('#SendFacebookBox .AddMsgBtn').removeClass('fa-plus-square').addClass('fa-minus-square');
                if($('#LineMsgBox').css('display') !== 'none'){
                    $('#LineMsgBox').hide();
                    $('#SendLineBox .AddMsgBtn').removeClass('fa-minus-square').addClass('fa-plus-square');
                }
            }else{
                $('#FacebookMsgBox').hide();
                $('#SendFacebookBox .AddMsgBtn').removeClass('fa-minus-square').addClass('fa-plus-square');
            }
        }
        function AppendFacebookMsg(_Action, _Html, _Key){
            if($("#FacebookMessagesArea .direct-chat-msg[data-key='"+ _Key +"']").length === 0){
                switch(_Action){
                    case 'append':
                        $("#FacebookMessagesArea").append(_Html);
                        break;
                    default :
                        $("#FacebookMessagesArea").prepend(_Html);
                        break;
                }
            }
        }
        function ReSortFacebookMsg(){
            var $msgListItem = $("#FacebookMessagesArea .direct-chat-msg");
            $msgListItem.sort(function (a, b) {
                var sort1 = a.getAttribute('data-sort') * 1;
                var sort2 = b.getAttribute('data-sort') * 1;
                var sortNum = 1;
                if (sort1 > sort2)
                    return 1 * sortNum;
                if (sort1 < sort2)
                    return -1 * sortNum;
                        return 0;
            });
            $msgListItem.detach().appendTo("#FacebookMessagesArea");
            $("#FacebookMessagesArea .direct-chat-text.text").each(function(e) {
                if(!$(this).hasClass("ToEmoji")){
                    $(this).addClass('ToEmoji').html(TranslateEmoji($(this).html()));
                }
            });
        }
        var Facebookstep = 0; // 步驟變數
        var FacebooktextList = new Array(); // array容器
        function FacebookResize(obj){
            obj.css({'height':'auto','overflow-y':'hidden'}).height(obj[0].scrollHeight);
            var Line = parseInt((obj.height()-12)/20) - 1;
            if(Line > 20){
                obj.val(FacebooktextList[Facebookstep-1]);
                obj.css({'height':'auto','overflow-y':'hidden'}).height(obj[0].scrollHeight);
            }else{
                Facebookstep++;
                FacebooktextList.push(obj.val());
            }
        }
        function FacebookUserSelect(obj){
            $("#FacebookMessagesArea").removeClass("begin");
            $("#FacebookChatMember").val(obj.attr("UID"));
            $("#FacebookMessagesArea").attr("UID", obj.attr("UID")).attr("ChatRoom", obj.attr("ChatRoom")).html("");
            var ServiceMsgLen = $('#FacebookMessagesArea .direct-chat-msg.right').length;
            var MsgLength = $('#FacebookMessagesArea .direct-chat-msg').length - ServiceMsgLen;
            xajax_LoadMsg(obj.attr("ChatRoom"), obj.attr("UID"), MsgLength, "prepend", null, 'start');
        }
        
        $(function () {
            $('#TypeFacebookMsg').emojioneArea({
                pickerPosition: "top",
                tonesStyle: "bullet"
            });
            window.setTimeout(function () {
                GetEmojiIcon('facebook');
            }, 1000);
            $('#FacebookMessagesArea').scroll(function(e) {
                if( $('#FacebookMessagesArea').scrollTop() === 0 ){
                    var ChatRoom = $('#FacebookMessagesArea').attr('ChatRoom');
                    var UID = $('#FacebookMessagesArea').attr('UID');
                    var ServiceMsgLen = $('#FacebookMessagesArea .direct-chat-msg.right').length;
                    var MsgLength = $('#FacebookMessagesArea .direct-chat-msg').length - ServiceMsgLen;
                    if(MsgLength > 0){
                        xajax_LoadMsg(ChatRoom, UID, MsgLength, "prepend", null, 'more');
                    }
                }
            });
            $(document).on('click', '#FacebookSearchBtn', function(event) {
                var LineSearchKey = $('#FacebookSearchKey').val();
                if(LineSearchKey){
                    $("#FacebookRoomList li").hide();
                    $("#FacebookRoomList li[UID='"+ LineSearchKey +"']").show();
                    $("#FacebookRoomList li[displayName='"+ LineSearchKey +"']").show();
                    $("#FacebookRoomList li").each(function(e) {
                        var UID = $(this).attr('UID');
                        var displayName = $(this).attr('displayName');
                        if( (UID.indexOf(LineSearchKey)!==-1) || (displayName.indexOf(LineSearchKey)!==-1) ){
                            $(this).show();
                        }
                    });
                }
            });
        });
    </script>
<?php }?>

<?php if ($_smarty_tpl->getVariable('MsgJs')->value){?>
    <?php echo $_smarty_tpl->getVariable('MsgJs')->value;?>

<?php }?>