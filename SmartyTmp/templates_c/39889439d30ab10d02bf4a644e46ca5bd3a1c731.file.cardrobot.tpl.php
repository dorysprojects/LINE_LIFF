<?php /* Smarty version Smarty3-b7, created on 2022-08-16 10:01:49
         compiled from "/home1/bot.gadclubs.com/library/modules/_public/view/type/cardrobot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73982410462fafa8da982b3-79749079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39889439d30ab10d02bf4a644e46ca5bd3a1c731' => 
    array (
      0 => '/home1/bot.gadclubs.com/library/modules/_public/view/type/cardrobot.tpl',
      1 => 1627622640,
    ),
  ),
  'nocache_hash' => '73982410462fafa8da982b3-79749079',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.cat.php';
?><script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
<style>
    .resize-drag {
        width: 200px;
        height: 100px;
        border: 1px solid #333333;
        background-color: #66666600;
        opacity: 0.6;
        padding: 20px;
        color: white;
        font-size: 20px;
        font-family: sans-serif;
        touch-action: none;
        box-sizing: border-box;
        top: 0px;
        left: 0px;
        text-align: center;
        position: absolute;
    }
    .resize-drag .ShowInfo {
        position: absolute;
        top: 0px;
        left: 50px;
        font-size: 16px;
        display: none;
    }
    .resize-drag .TextContent {
        text-align: left;
        position: absolute;
        padding: 0px;
        margin: 0px;
        top: 0px;
        left: 0px;
        background-color: unset;
        border: 0px;
    }
    .resize-drag .EditBtn {
        position: absolute;
        top: 0px;
        left: 0px;
    }
    .resize-drag .DeleteBtn {
        position: absolute;
        top: 0px;
        right: 0px;
    }
    .modal-backdrop.fade.in {
        display: none;
    }
    ._Hide {
        display: none!important;
        opacity: 0!important;
    }
    ._Show {
        display: block!important;
        opacity: 1!important;
    }
    #ContainerBox {
        width: 100%;
        text-align: center;
        display: none;
    }
    #EditorArea {
        cursor: cell;/*cell、crosshair*/
        width:100%;
        height:100%;
        position: relative;
    }
    #SampleArea {
        overflow: auto;
        margin-bottom: 5px;
        padding-bottom: 5px;
    }
    #SampleArea .SliderBox {
        display: none;
    }
    #SampleArea .SliderBox.full {
        width: 1650px;
    }
    #SampleArea .SliderBox.half {
        width: 900px;
    }
    #SampleArea .SliderBox.custom {
        width: 1650px;
    }
    #SampleArea .SliderBox img {
        margin-left: 4px;
        display: inline-block;
        float: left;
        cursor: pointer;
    }
</style>
<div id="ContainerBox">
    <input id="SaveData" type="hidden" name="fields[subject][actions]">
    <div class="" style="text-align: left;">
        <div>*<label>問題</label></div>
        <div class="TemplateContainer" style="overflow:auto;background-color:#fff;border: none;">
            <div class="TemplateSlider" style="width:3200px;">
                <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (9 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 9+1 - 0 : 0-(9)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                    <?php $_smarty_tpl->assign("question",smarty_modifier_cat("question",$_smarty_tpl->getVariable('G')->value),null,null);?>
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
                        </div>
                    </div>
                <?php }} ?>
            </div>
        </div>
        <div>*<label>文字位置</label></div>
    </div>
    <div id="EditorArea">
        <div class="resize-drag" ctn="0">
            <pre class="TextContent"></pre>
            <div class="ShowInfo"></div>
            <div class="btn btn-warning EditBtn">
                <i class="fa fa-fw fa-pencil-square-o"></i>
            </div>
            <div class="btn btn-danger DeleteBtn">
                <i class="fa fa-fw fa-trash-o"></i>
            </div>
        </div>
    </div>
    <div id="addActionBox" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#ShowActionBox">設定動作</div>
    <div id="ShowActionBox" class="modal fade _Hide" role="dialog">
        <div class="modal-dialog  tag-2">
            <div class="tab-content">
                <div class="tab-pane fade active in" style="padding: 20vh 0px;">
                    <select id="ChooseQuestion" class="form-control">
                        <option value="">選擇對應的問題</option>
                        <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (9 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 9+1 - 0 : 0-(9)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                            <option value="<?php echo $_smarty_tpl->getVariable('G')->value;?>
">問題<?php echo $_smarty_tpl->getVariable('G')->value+1;?>
</option>
                        <?php }} ?>
                    </select>
                    <input id="FontSize" type="number" min="12" class="form-control" style="margin: 10px 0px;" placeholder="字體大小">
                    <input id="TextLimit" type="number" min="0" class="form-control" style="margin: 10px 0px;" onchange="$('#ExampleText').attr('maxlength', $(this).val());" placeholder="字數上限">
                    <textarea id="ExampleText" class="form-control" style="margin: 10px 0px;" maxlength="0" placeholder="範例文本(請先設定「字數上限」)"></textarea>
                    <input id="TextColor" type="color" class="form-control" style="margin: 10px 0px;" placeholder="文本顏色">
                    
                    <div class="btn btn-warning" onclick="UpdateActionData();$('#ShowActionBox').addClass('_Hide').removeClass('_Show');">確定</div>
                    <div class="btn btn-default" onclick="$('#ShowActionBox').addClass('_Hide').removeClass('_Show');">取消</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function ChangeQuestionVal(direction, Ctn){
        var NowCtn = Ctn*1;
        var Now_question = $("input[name='fields[subject][question"+ NowCtn +"]']").val();
        
        if(direction==='right'){
            var NextCtn = NowCtn+1;
            var Next_question = $("input[name='fields[subject][question"+ NextCtn +"]']").val();
            
            $("input[name='fields[subject][question"+ NowCtn +"]']").val(Next_question);
            
            $("input[name='fields[subject][question"+ NextCtn +"]']").val(Now_question);
        }else{
            var PrevCtn = NowCtn-1;
            var Prev_question = $("input[name='fields[subject][question"+ PrevCtn +"]']").val();
            
            $("input[name='fields[subject][question"+ PrevCtn +"]']").val(Now_question);
            
            $("input[name='fields[subject][question"+ NowCtn +"]']").val(Prev_question);
        }
    }
    function ClearQuestionData(Ctn){
        $("input[name='fields[subject][question"+ Ctn +"]']").val('');
    }
    
    var NowCtn = 0;
    var DataActions = <?php if ($_smarty_tpl->getVariable('actions')->value){?><?php echo $_smarty_tpl->getVariable('actions')->value;?>
<?php }else{ ?>{}<?php }?>;
    function AddArea(NewX=0, NewY=0, NewWidth=100, NewHeight=100, ChooseQuestion='', FontSize='', TextLimit='', ExampleText='', TextColor='', ShowInfo=''){
        var target = $('#EditorArea');
        target.append('<div class="resize-drag" ctn="" data-x="'+NewX+'" data-y="'+NewY+'" data-width="'+NewWidth+'" data-height="'+NewHeight+'" ChooseQuestion="'+ChooseQuestion+'" FontSize="'+FontSize+'" TextLimit="'+TextLimit+'" ExampleText="'+ExampleText+'" TextColor="'+TextColor+'" style="left: '+NewX+'px; top: '+NewY+'px;width: '+NewWidth+'px;height: '+NewHeight+'px;">\
                        <pre class="TextContent" style="color:'+TextColor+';font-size:'+FontSize+'px;">'+ExampleText+'</pre>\
                        <div class="ShowInfo">'+ShowInfo+'</div>\
                        <div class="btn btn-warning EditBtn">\
                            <i class="fa fa-fw fa-pencil-square-o"></i>\
                        </div>\
                        <div class="btn btn-danger DeleteBtn">\
                            <i class="fa fa-fw fa-trash-o"></i>\
                        </div>\
                    </div>');
        ReFreshBox();
    }
    $(function(){
        <?php if ($_smarty_tpl->getVariable('row')->value['subject']['img0']){?>
            $('#ContainerBox').show();
            $('#EditorArea').css('background-image', 'url("<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('row')->value['subject']['img0'];?>
")').css('width', '<?php echo $_smarty_tpl->getVariable('row')->value['subject']['width'];?>
').css('height','<?php echo $_smarty_tpl->getVariable('row')->value['subject']['height'];?>
').show();
        <?php }?>
        var IsMoving;
        $(document).on('mousedown', '#EditorArea', function(event) {
            IsMoving = false;
        });
        $(document).on('mousemove', '#EditorArea', function(event) {
            IsMoving = true;
        });
        $(document).on('mouseup', '#EditorArea', function(event) {
            if (!IsMoving) {
                if(event.target.id === 'EditorArea'){
                    if($("#EditorArea .resize-drag").length<=9){
                        var target = $('#EditorArea');
                        var NewX = event.originalEvent.clientX - target.offset().left + window.scrollX;
                        var NewY = event.originalEvent.clientY - target.offset().top + window.scrollY;
                        var NewWidth = '100';
                        var NewHeight = '100';
                        var ChooseQuestion = '';
                        var FontSize = '';
                        var TextLimit = '';
                        var ExampleText = '';
                        var TextColor = '';
                        var ShowInfo = NewWidth+'x'+NewHeight+'</br>('+NewX+','+NewY+')';
                        
                        AddArea(NewX, NewY, NewWidth, NewHeight, ChooseQuestion, FontSize, TextLimit, ExampleText, TextColor, ShowInfo);
                    }else{
                        alert('最多10個區域');
                    }
                }
            }
        });
        if(DataActions[0]){
            $('#EditorArea').html('');
            DataActions.forEach(function(action){
                var ChooseQuestion = action['question'];
                var FontSize = action['size'];
                var TextLimit = action['limit'];
                var ExampleText = action['text'];
                var TextColor = action['color'];
                var NewX = action['area']['x'];
                var NewY = action['area']['y'];
                var NewWidth = action['area']['width'];
                var NewHeight = action['area']['height'];
                
                var ShowInfo = NewWidth+'x'+NewHeight+'</br>('+NewX+','+NewY+')';
                
                AddArea(NewX, NewY, NewWidth, NewHeight, ChooseQuestion, FontSize, TextLimit, ExampleText, TextColor, ShowInfo);
            });
        }
        AddListener();
        $('#SaveData').val(JSON.stringify(DataActions));
    });
    function UpdateActionData(){
        var ChooseQuestion='',ChooseQuestionCtn = $('#ShowActionBox #ChooseQuestion').val();
        if($('input[name="fields[subject][question'+ ChooseQuestionCtn +']"]').val()){
            ChooseQuestion = ChooseQuestionCtn;
        }
        var FontSize = $('#ShowActionBox #FontSize').val();
        var TextLimit = $('#ShowActionBox #TextLimit').val();
        var ExampleText = $('#ShowActionBox #ExampleText').val();
        var TextColor = $('#ShowActionBox #TextColor').val();
        
        var errorMsg = '';
        if(ChooseQuestionCtn==='' || ChooseQuestionCtn===null){
            if(errorMsg){
                errorMsg += "\n";
            }
            errorMsg += '問題 未選擇';
        }else if(ChooseQuestion===''){
            if(errorMsg){
                errorMsg += "\n";
            }
            errorMsg += '問題'+ (ChooseQuestionCtn*1+1) +' 未填寫';
        }
        if(FontSize===''){
            if(errorMsg){
                errorMsg += "\n";
            }
            errorMsg += '範例文本 未填寫';
        }
        if(TextLimit==='' || TextLimit===0){
            if(errorMsg){
                errorMsg += "\n";
            }
            errorMsg += '字數上限 未填寫';
        }
        if(ExampleText===''){
            if(errorMsg){
                errorMsg += "\n";
            }
            errorMsg += '範例文本 未填寫';
        }
        if(TextColor===''){
            if(errorMsg){
                errorMsg += "\n";
            }
            errorMsg += '文本顏色 未選擇';
        }
        if(errorMsg){
            alert(errorMsg);
        }else{
            $("#EditorArea .resize-drag[ctn='"+NowCtn+"']").attr('ChooseQuestion', ChooseQuestion).attr('FontSize', FontSize).attr('TextLimit', TextLimit).attr('ExampleText', ExampleText).attr('TextColor', TextColor);
            UpdataData();
        }
    }
    function UpdataData(){
        var actions = [];
        $("#EditorArea .resize-drag").each(function(e) {
            var Ctn = $(this).attr('ctn');
            var ChooseQuestion = $(this).attr('ChooseQuestion');
            var FontSize = $(this).attr('FontSize');
            var TextLimit = $(this).attr('TextLimit');
            var ExampleText = $(this).attr('ExampleText');
            var TextColor = $(this).attr('TextColor');
            
            if(ChooseQuestion && FontSize && TextLimit && ExampleText && TextColor){
                $(this).find('.TextContent').css('color', TextColor).css('font-size', FontSize+'px').html(ExampleText);
                var action = {
                    'question' : ChooseQuestion,
                    'size' : FontSize,
                    'limit' : TextLimit,
                    'color' : TextColor,
                    'text' : ExampleText,
                    'area' : {
                        'x' : $(this).attr('data-x'),
                        'y' : $(this).attr('data-y'),
                        'width' : $(this).attr('data-width'),
                        'height' : $(this).attr('data-height')
                    }
                };
                
                actions.push(action);
            }
        });
        $('#SaveData').val(JSON.stringify(actions));
    }
    function AddListener(){
        $(document).on('click', '#EditorArea .resize-drag .EditBtn', function(event) {
            var NowObj = $(this).parents('.resize-drag');
            $('#ShowActionBox #ChooseQuestion').val(NowObj.attr('ChooseQuestion'));
            $('#ShowActionBox #FontSize').val(NowObj.attr('FontSize'));
            $('#ShowActionBox #TextLimit').val(NowObj.attr('TextLimit'));
            $('#ShowActionBox #TextColor').val(NowObj.attr('TextColor'));
            $('#ShowActionBox #ExampleText').val(NowObj.attr('ExampleText')).attr('maxlength', NowObj.attr('TextLimit') ? NowObj.attr('TextLimit') : '0');
            NowCtn = NowObj.attr('ctn');
            $('#ShowActionBox').removeClass('_Hide').addClass('_Show');
        });
        $(document).on('click', '#EditorArea .resize-drag .DeleteBtn', function(event) {
            $(this).parent('.resize-drag').remove();
            ReFreshBox();
        });
    }
    function ReFreshBox(){
        var Ctn = 0;
        $("#EditorArea .resize-drag").each(function(e) {
            $(this).attr('ctn', Ctn);
            Ctn++;
        });
        AddListener();
        UpdataData();
    }
    interact('.resize-drag').resizable({
        edges: { left: true, right: true, bottom: true, top: true },
        listeners: {
            move (event) {
                var Ctn = event.target.getAttribute('ctn');
                var target = $("div.resize-drag[ctn='"+Ctn+"']");
                var x = (parseFloat(target.attr('data-x')) || 0) + event.deltaRect.left;
                var y = (parseFloat(target.attr('data-y')) || 0) + event.deltaRect.top;
                
                target.css('width', event.rect.width + 'px')
                    .css('height', event.rect.height + 'px')
                    .css('left', x + 'px')
                    .css('top', y + 'px');
                var DataX = Math.round(x);
                var DataY = Math.round(y);
                var DataWidth = Math.round(event.rect.width);
                var DataHeight= Math.round(event.rect.height);
                target.attr('data-x', DataX)
                    .attr('data-y', DataY)
                    .attr('data-width', DataWidth)
                    .attr('data-height', DataHeight);
                
                target.find('.ShowInfo').html( DataWidth+'x'+DataHeight+'</br>('+DataX+','+DataY+')' );
                UpdataData();
            }
        },
        modifiers: [
            interact.modifiers.restrictEdges({
                outer: 'parent'
            }),
            interact.modifiers.restrictSize({
                min: { width: 100, height: 100 }
            })
        ],
        inertia: true
    }).draggable({
        inertia: true,
        modifiers: [
          interact.modifiers.restrictRect({
            restriction: 'parent',
            endOnly: true
          })
        ],
        autoScroll: true,
        listeners: {
            move: dragMoveListener,
            end (event) {
                var Ctn = event.target.getAttribute('ctn');
                var target = $("div.resize-drag[ctn='"+Ctn+"']");
                
            }
        }
    });
    function dragMoveListener (event) {
        var Ctn = event.target.getAttribute('ctn');
        var target = $("div.resize-drag[ctn='"+Ctn+"']");
        var x = (parseFloat(target.attr('data-x')) || 0) + event.dx;
        var y = (parseFloat(target.attr('data-y')) || 0) + event.dy;
        
        target.css('left', x + 'px')
            .css('top', y + 'px');;
        var DataX = Math.round(x);
        var DataY = Math.round(y);
        var DataWidth = Math.round(target.width());
        var DataHeight= Math.round(target.height());
        target.attr('data-x', DataX)
            .attr('data-y', DataY);
        target.find('.ShowInfo').html( DataWidth+'x'+DataHeight+'</br>('+DataX+','+DataY+')' );
        UpdataData();
    }
    window.dragMoveListener = dragMoveListener;
</script>