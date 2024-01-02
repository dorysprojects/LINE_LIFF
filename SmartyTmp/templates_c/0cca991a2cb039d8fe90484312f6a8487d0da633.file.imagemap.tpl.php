<?php /* Smarty version Smarty3-b7, created on 2022-01-05 14:28:41
         compiled from "/home1/bot.gadclubs.com//library/modules/_public/view/type/imagemap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159652725061d53a996b82d4-47668657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cca991a2cb039d8fe90484312f6a8487d0da633' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/_public/view/type/imagemap.tpl',
      1 => 1639622513,
    ),
  ),
  'nocache_hash' => '159652725061d53a996b82d4-47668657',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.cat.php';
if (!is_callable('smarty_modifier_date_format')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'/UrlInfo.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<!--<script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>-->
<style>
    .resize-drag {
        width: 200px;
        height: 100px;
        border: 1px solid #333333;
        background-color: #666666;
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
        margin-top: 20px;
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
<label id="SampleAreaLabel" for="SampleArea" style="display:none;">範例</label>
<div id="ContainerBox">
    <input id="SaveData" type="hidden" name="fields[subject][actions]">
    <div id="SampleArea">
        <div class="SliderBox full">
            <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (10 - (1) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 10+1 - 1 : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 1, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                <img typectn="<?php echo $_smarty_tpl->getVariable('G')->value;?>
" src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/img-message/type_richmenu_<?php if ($_smarty_tpl->getVariable('G')->value<10){?>0<?php }?><?php echo $_smarty_tpl->getVariable('G')->value;?>
.png?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
">
            <?php }} ?>
            <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (19 - (19) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 19+1 - 19 : 19-(19)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 19, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                <img  typectn="<?php echo $_smarty_tpl->getVariable('G')->value;?>
" src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/img-message/type_richmenu_<?php if ($_smarty_tpl->getVariable('G')->value<10){?>0<?php }?><?php echo $_smarty_tpl->getVariable('G')->value;?>
.png?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
">
            <?php }} ?>
        </div>
        <div class="SliderBox half">
            <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (25 - (20) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 25+1 - 20 : 20-(25)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 20, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                <img typectn="<?php echo $_smarty_tpl->getVariable('G')->value;?>
"  src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/img-message/type_richmenu_<?php if ($_smarty_tpl->getVariable('G')->value<10){?>0<?php }?><?php echo $_smarty_tpl->getVariable('G')->value;?>
.png?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
">
            <?php }} ?>
        </div>
        <div class="SliderBox custom">
            <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (26 - (28) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 26+1 - 28 : 28-(26)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 28, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                <img typectn="<?php echo $_smarty_tpl->getVariable('G')->value;?>
"  src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/img-message/type_richmenu_<?php if ($_smarty_tpl->getVariable('G')->value<10){?>0<?php }?><?php echo $_smarty_tpl->getVariable('G')->value;?>
.png?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
">
            <?php }} ?>
            <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (18 - (11) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 18+1 - 11 : 11-(18)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 11, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                <img typectn="<?php echo $_smarty_tpl->getVariable('G')->value;?>
"  src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/img-message/type_richmenu_<?php if ($_smarty_tpl->getVariable('G')->value<10){?>0<?php }?><?php echo $_smarty_tpl->getVariable('G')->value;?>
.png?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
">
            <?php }} ?>
        </div>
    </div>
    <div id="EditorArea">
        <div class="resize-drag" ctn="0">
            <div class="TextContent"></div>
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
                    <select id="Type" class="form-control select2">
                        <option value="" disabled>請選擇動作</option>
                        <option value="noaction">不設定動作</option>
                        <option value="uri">超連結</option>
                        <option value="message">文字</option>
                        <?php if ($_smarty_tpl->getVariable('_Module')->value==='RichMenu'){?>
                            <option value="postback">輸入代碼</option>
                        <?php }?>
                    </select>
                    <textarea id="Data" type="text" class="form-control" style="margin: 10px 0px;" rows="10"></textarea>
                    <div class="btn btn-warning" onclick="UpdateActionData();$('#ShowActionBox').addClass('_Hide').removeClass('_Show');">確定</div>
                    <div class="btn btn-default" onclick="$('#ShowActionBox').addClass('_Hide').removeClass('_Show');">取消</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var NowCtn = 0;
    var DataActions = <?php if ($_smarty_tpl->getVariable('actions')->value){?><?php echo $_smarty_tpl->getVariable('actions')->value;?>
<?php }else{ ?>{}<?php }?>;
    function AddArea(NewX=0, NewY=0, NewWidth=200, NewHeight=100, Type='', Data='', TextContent='', ShowInfo=''){
        var target = $('#EditorArea');
        target.append('<div class="resize-drag" ctn="" data-x="'+NewX+'" data-y="'+NewY+'" data-width="'+NewWidth+'" data-height="'+NewHeight+'" type="'+Type+'" data="'+Data+'" style="left: '+NewX+'px; top: '+NewY+'px;width: '+NewWidth+'px;height: '+NewHeight+'px;">\
                        <div class="TextContent">'+TextContent+'</div>\
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
            var SlideBoxClass = '';
            switch('<?php echo $_smarty_tpl->getVariable('row')->value['subject']['width'];?>
x<?php echo $_smarty_tpl->getVariable('row')->value['subject']['height'];?>
'){
                case '1200x405':
                    SlideBoxClass = 'half';
                    break;
                case '1200x810':
                    SlideBoxClass = 'full';
                    break;
                default:
                    SlideBoxClass = 'custom';
                    break;
            }
            $('#SampleArea .SliderBox').hide();
            if(SlideBoxClass){
                $('#SampleArea .'+SlideBoxClass).show();
            }
            $('#SampleAreaLabel').show();
            $('#ContainerBox').show();
            $('#EditorArea').css('background-image', 'url("<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('row')->value['subject']['img0'];?>
")').css('width', '<?php echo $_smarty_tpl->getVariable('row')->value['subject']['width'];?>
').css('height','<?php echo $_smarty_tpl->getVariable('row')->value['subject']['height'];?>
').show();
        <?php }?>
        $(document).on('click', '#SampleArea .SliderBox img', function(event) {
            var typectn = $(this).attr('typectn');
            var width = $('#EditorArea').width();
            var height = $('#EditorArea').height();
            $('#EditorArea').html('');
            
            switch(typectn){
                case '1':
                    AddArea(Math.round(width/3*0), Math.round(height/2*0), Math.round(width/3), Math.round(height/2));
                    AddArea(Math.round(width/3*1), Math.round(height/2*0), Math.round(width/3), Math.round(height/2));
                    AddArea(Math.round(width/3*2), Math.round(height/2*0), Math.round(width/3), Math.round(height/2));
                    AddArea(Math.round(width/3*0), Math.round(height/2*1), Math.round(width/3), Math.round(height/2));
                    AddArea(Math.round(width/3*1), Math.round(height/2*1), Math.round(width/3), Math.round(height/2));
                    AddArea(Math.round(width/3*2), Math.round(height/2*1), Math.round(width/3), Math.round(height/2));
                    break;
                case '2':
                case '15':
                    AddArea(Math.round(width/2*0), Math.round(height/2*0), Math.round(width/2), Math.round(height/2));
                    AddArea(Math.round(width/2*1), Math.round(height/2*0), Math.round(width/2), Math.round(height/2));
                    AddArea(Math.round(width/2*0), Math.round(height/2*1), Math.round(width/2), Math.round(height/2));
                    AddArea(Math.round(width/2*1), Math.round(height/2*1), Math.round(width/2), Math.round(height/2));
                    break;
                case '3':
                    AddArea(Math.round(width/3*0), Math.round(height/2*0), Math.round(width/3*3), Math.round(height/2));
                    AddArea(Math.round(width/3*0), Math.round(height/2*1), Math.round(width/3*1), Math.round(height/2));
                    AddArea(Math.round(width/3*1), Math.round(height/2*1), Math.round(width/3*1), Math.round(height/2));
                    AddArea(Math.round(width/3*2), Math.round(height/2*1), Math.round(width/3*1), Math.round(height/2));
                    break;
                case '4':
                    AddArea(Math.round(width/3*0), Math.round(height/2*0), Math.round(width/3*2), Math.round(height));
                    AddArea(Math.round(width/3*2), Math.round(height/2*0), Math.round(width/3), Math.round(height/2));
                    AddArea(Math.round(width/3*2), Math.round(height/2*1), Math.round(width/3), Math.round(height/2));
                    break;
                case '5':
                case '13':
                    AddArea(0, Math.round(height/2*0), width, Math.round(height/2));
                    AddArea(0, Math.round(height/2*1), width, Math.round(height/2));
                    break;
                case '6':
                case '12':
                case '25':
                    AddArea(Math.round(width/2*0), 0, Math.round(width/2), height);
                    AddArea(Math.round(width/2*1), 0, Math.round(width/2), height);
                    break;
                case '7':
                case '11':
                case '21':
                    AddArea(0, 0, width, height);
                    break;
                case '8':
                    AddArea(Math.round(width/2*0), Math.round(height/2*0), Math.round(width/2), Math.round(height/2));
                    AddArea(Math.round(width/2*0), Math.round(height/2*1), Math.round(width/2), Math.round(height/2));
                    AddArea(Math.round(width/2*1), Math.round(height/2*0), Math.round(width/2), Math.round(height));
                    break;
                case '9':
                    AddArea(Math.round(width/2*0), Math.round(height/4*0), Math.round(width/2), Math.round(height/4));
                    AddArea(Math.round(width/2*0), Math.round(height/4*1), Math.round(width/2), Math.round(height/4));
                    AddArea(Math.round(width/2*0), Math.round(height/4*2), Math.round(width/2), Math.round(height/4));
                    AddArea(Math.round(width/2*0), Math.round(height/4*3), Math.round(width/2), Math.round(height/4));
                    AddArea(Math.round(width/2*1), Math.round(height/4*0), Math.round(width/2), Math.round(height/4));
                    AddArea(Math.round(width/2*1), Math.round(height/4*1), Math.round(width/2), Math.round(height/4));
                    AddArea(Math.round(width/2*1), Math.round(height/4*2), Math.round(width/2), Math.round(height/4));
                    AddArea(Math.round(width/2*1), Math.round(height/4*3), Math.round(width/2), Math.round(height/4));
                    break;
                case '10':
                    AddArea(Math.round(width/2*0), Math.round(height/2*0), Math.round(width/2), Math.round(height/2));
                    AddArea(Math.round(width/2*1), Math.round(height/2*0), Math.round(width/2), Math.round(height/2));
                    AddArea(Math.round(width/2*0), Math.round(height/2*1), Math.round(width/2), Math.round(height/2));
                    AddArea(Math.round(width/4*1), Math.round(height/4*1), Math.round(width/2), Math.round(height/2));
                    AddArea(Math.round(width/2*1), Math.round(height/2*1), Math.round(width/2), Math.round(height/2));
                    break;
                case '14':
                    AddArea(0, Math.round(height/3*0), width, Math.round(height/3));
                    AddArea(0, Math.round(height/3*1), width, Math.round(height/3));
                    AddArea(0, Math.round(height/3*2), width, Math.round(height/3));
                    break;
                case '16':
                    AddArea(Math.round(width/2*0), Math.round(height/2*0), Math.round(width/2*2), Math.round(height/2));
                    AddArea(Math.round(width/2*0), Math.round(height/2*1), Math.round(width/2*1), Math.round(height/2));
                    AddArea(Math.round(width/2*1), Math.round(height/2*1), Math.round(width/2*1), Math.round(height/2));
                    break;
                case '17':
                    AddArea(0, Math.round(height/4*0), width, Math.round(height/4*2));
                    AddArea(0, Math.round(height/4*2), width, Math.round(height/4*1));
                    AddArea(0, Math.round(height/4*3), width, Math.round(height/4*1));
                    break;
                case '18':
                    AddArea(Math.round(width/3*0), Math.round(height/2*0), Math.round(width/3), Math.round(height/2));
                    AddArea(Math.round(width/3*1), Math.round(height/2*0), Math.round(width/3), Math.round(height/2));
                    AddArea(Math.round(width/3*2), Math.round(height/2*0), Math.round(width/3), Math.round(height/2));
                    AddArea(Math.round(width/3*0), Math.round(height/2*1), Math.round(width/3), Math.round(height/2));
                    AddArea(Math.round(width/3*1), Math.round(height/2*1), Math.round(width/3), Math.round(height/2));
                    AddArea(Math.round(width/3*2), Math.round(height/2*1), Math.round(width/3), Math.round(height/2));
                    break;
                case '19':
                    AddArea(Math.round(width/4*0), Math.round(height/2*0), Math.round(width/4), Math.round(height/2));
                    AddArea(Math.round(width/4*1), Math.round(height/2*0), Math.round(width/4), Math.round(height/2));
                    AddArea(Math.round(width/4*2), Math.round(height/2*0), Math.round(width/4), Math.round(height/2));
                    AddArea(Math.round(width/4*3), Math.round(height/2*0), Math.round(width/4), Math.round(height/2));
                    AddArea(Math.round(width/4*0), Math.round(height/2*1), Math.round(width/4), Math.round(height/2));
                    AddArea(Math.round(width/4*1), Math.round(height/2*1), Math.round(width/4), Math.round(height/2));
                    AddArea(Math.round(width/4*2), Math.round(height/2*1), Math.round(width/4), Math.round(height/2));
                    AddArea(Math.round(width/4*3), Math.round(height/2*1), Math.round(width/4), Math.round(height/2));
                    break;
                case '20':
                    AddArea(Math.round(width/4*0), 0, Math.round(width/4), height);
                    AddArea(Math.round(width/4*1), 0, Math.round(width/4), height);
                    AddArea(Math.round(width/4*2), 0, Math.round(width/4), height);
                    AddArea(Math.round(width/4*3), 0, Math.round(width/4), height);
                    break;
                case '22':
                    AddArea(Math.round(width/3*0), 0, Math.round(width/3*1), height);
                    AddArea(Math.round(width/3*1), 0, Math.round(width/3*2), height);
                    break;
                case '23':
                    AddArea(Math.round(width/3*0), 0, Math.round(width/3*2), height);
                    AddArea(Math.round(width/3*2), 0, Math.round(width/3*1), height);
                    break;
                case '24':
                    AddArea(Math.round(width/3*0), 0, Math.round(width/3), height);
                    AddArea(Math.round(width/3*1), 0, Math.round(width/3), height);
                    AddArea(Math.round(width/3*2), 0, Math.round(width/3), height);
                    break;
                case '26':
                    AddArea(0, Math.round(height/5*0), width, Math.round(height/5*2));
                    AddArea(0, Math.round(height/5*2), width, Math.round(height/5*1));
                    AddArea(0, Math.round(height/5*3), width, Math.round(height/5*1));
                    AddArea(0, Math.round(height/5*4), width, Math.round(height/5*1));
                    break;
                case '27':
                    AddArea(0, Math.round(height/6*0), width, Math.round(height/6*3));
                    AddArea(0, Math.round(height/6*3), width, Math.round(height/6*1));
                    AddArea(0, Math.round(height/6*4), width, Math.round(height/6*1));
                    AddArea(0, Math.round(height/6*5), width, Math.round(height/6*1));
                    break;
                case '28':
                    AddArea(0, 0, 200, 100);
                    break;
            }
        });
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
                        var NewWidth = '200';
                        var NewHeight = '100';
                        var Type = '';
                        var Data = '';
                        var TextContent = '';
                        var ShowInfo = NewWidth+'x'+NewHeight+'</br>('+NewX+','+NewY+')';
                        
                        AddArea(NewX, NewY, NewWidth, NewHeight, Type, Data, TextContent, ShowInfo);
                    }else{
                        alert('最多10個區域');
                    }
                }
            }
        });
        if(DataActions[0]){
            $('#EditorArea').html('');
            DataActions.forEach(function(action){
                var Type = action<?php if ($_smarty_tpl->getVariable('_Module')->value==='RichMenu'){?>['action']<?php }?>['type'];
                var ActName = '';
                var Action = '';
                switch(Type){
                    case 'message':
                        Action = '文字';
                        ActName = 'text';
                        break;
                    case 'uri':
                        Action = '超連結';
                        ActName = 'linkUri';
                        break;
                    case 'postback':
                        Action = '背景處理';
                        ActName = 'data';
                        break;
                    case 'noaction':
                        Action = '不設定動作';
                        ActName = 'unset';
                        break;
                }
                var Data = action<?php if ($_smarty_tpl->getVariable('_Module')->value==='RichMenu'){?>['action']<?php }?>[ActName];
                var NewX = action<?php if ($_smarty_tpl->getVariable('_Module')->value==='ImageMap'){?>['area']<?php }else{ ?>['bounds']<?php }?>['x'];
                var NewY = action<?php if ($_smarty_tpl->getVariable('_Module')->value==='ImageMap'){?>['area']<?php }else{ ?>['bounds']<?php }?>['y'];
                var NewWidth = action<?php if ($_smarty_tpl->getVariable('_Module')->value==='ImageMap'){?>['area']<?php }else{ ?>['bounds']<?php }?>['width'];
                var NewHeight = action<?php if ($_smarty_tpl->getVariable('_Module')->value==='ImageMap'){?>['area']<?php }else{ ?>['bounds']<?php }?>['height'];
                var TextContent = '動作：'+Action+'</br>內容：'+Data;
                var ShowInfo = NewWidth+'x'+NewHeight+'</br>('+NewX+','+NewY+')';
                
                AddArea(NewX, NewY, NewWidth, NewHeight, Type, Data, TextContent, ShowInfo);
            });
        }
        AddListener();
        $('#SaveData').val(JSON.stringify(DataActions));
    });
    function UpdateActionData(){
        var Type = $('#ShowActionBox #Type').val();
        var Data = $('#ShowActionBox #Data').val();
        $("#EditorArea .resize-drag[ctn='"+NowCtn+"']").attr('type', Type).attr('data', Data);
        UpdataData();
    }
    function UpdataData(){
        var actions = [];
        $("#EditorArea .resize-drag").each(function(e) {
            var Ctn = $(this).attr('ctn');
            var Type = $(this).attr('type');
            var Data = $(this).attr('data');
            var ActName = '';
            var Action = '';
            switch(Type){
                case 'message':
                    Action = '文字';
                    ActName = 'text';
                    break;
                case 'uri':
                    Action = '超連結';
                    ActName = 'linkUri';
                    break;
                case 'postback':
                    Action = '背景處理';
                    ActName = 'data';
                    break;
                case 'noaction':
                    Action = '不設定動作';
                    ActName = 'unset';
                    break;
            }
            if(Type || Data){
                $(this).find('.TextContent').html('動作：'+Action+'</br>內容：'+Data);
            }
            if(Type){
                <?php if ($_smarty_tpl->getVariable('_Module')->value==='ImageMap'){?>
                    var action = {
                        'type' : Type,
                        'area' : {
                            'x' : $(this).attr('data-x'),
                            'y' : $(this).attr('data-y'),
                            'width' : $(this).attr('data-width'),
                            'height' : $(this).attr('data-height')
                        }
                    };
                    action[ActName] = Data;
                <?php }else{ ?>
                    var actionTmp = {
                        'type' : Type
                    };
                    actionTmp[ActName] = Data;
                    var action = {
                        'bounds' : {
                            'x' : $(this).attr('data-x'),
                            'y' : $(this).attr('data-y'),
                            'width' : $(this).attr('data-width'),
                            'height' : $(this).attr('data-height')
                        },
                        'action' : actionTmp
                    };
                <?php }?>
                    
                actions.push(action);
            }
        });
        $('#SaveData').val(JSON.stringify(actions));
    }
    function AddListener(){
        $(document).on('click', '#EditorArea .resize-drag .EditBtn', function(event) {
            var NowObj = $(this).parents('.resize-drag');
            $('#ShowActionBox #Type').val(NowObj.attr('type'));
            $('#ShowActionBox #Data').val(NowObj.attr('data'));
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
<script type="module"> 
    import interact from 
    'https://cdn.interactjs.io/v1.10.9/interactjs/index.js'
    
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
                min: { width: 200, height: 100 }
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
</script>