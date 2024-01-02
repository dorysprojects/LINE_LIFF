<?php /* Smarty version Smarty3-b7, created on 2021-01-20 16:41:38
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/fb_receipttemplate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14239226146007ecc2965bc9-69992710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fabdd0f3b07cd61845e245898c4aa68b81fd6351' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/fb_receipttemplate.tpl',
      1 => 1611122064,
    ),
  ),
  'nocache_hash' => '14239226146007ecc2965bc9-69992710',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.cat.php';
?><label for="TemplateContainer">商品</label>
<div class="TemplateContainer" style="overflow:auto;background-color:#fff;border:none;">
    <div class="TemplateSlider" style="width:6400px;">
        <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (19 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 19+1 - 0 : 0-(19)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
            <?php $_smarty_tpl->assign("element_title",smarty_modifier_cat("element_title",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <?php $_smarty_tpl->assign("element_subtitle",smarty_modifier_cat("element_subtitle",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <?php $_smarty_tpl->assign("element_image_url",smarty_modifier_cat("element_image_url",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <?php $_smarty_tpl->assign("element_price",smarty_modifier_cat("element_price",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <?php $_smarty_tpl->assign("element_quantity",smarty_modifier_cat("element_quantity",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <?php $_smarty_tpl->assign("element_currency",smarty_modifier_cat("element_currency",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <div class="col-lg-4 Template" style="display:inline-block;width:300px;margin: 10px;text-align:center;">
                <div class="TemplateBtn" style="width:300px;height:35px;">
                    <span class="label label-success" style="padding:10px;float:left;">第<?php echo $_smarty_tpl->getVariable('G')->value+1;?>
組</span>
                    <?php if ($_smarty_tpl->getVariable('G')->value!==0){?>
                        <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeProductVal('left','<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-arrow-left"></i></span>
                    <?php }?>
                    <?php if ($_smarty_tpl->getVariable('G')->value!==19){?>
                        <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeProductVal('right','<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-arrow-right"></i></span>
                    <?php }?>
                    <span class="btn btn-sm label label-danger" style="padding:10px;float:left;margin-left:5px;" onclick="ClearProductData('<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-trash"></i></span>
                    <label class="btn btn-info" style="float:right;">
                        <input type="hidden" name="fields[subject][element_image_url<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('element_image_url')->value];?>
">
                        <input style="display:none;" id="FILES_<?php echo $_smarty_tpl->getVariable('element_image_url')->value;?>
" name="<?php echo $_smarty_tpl->getVariable('element_image_url')->value;?>
" onchange="if (this.files && this.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        $('#previews_<?php echo $_smarty_tpl->getVariable('element_image_url')->value;?>
').attr('src', e.target.result).show();
                                    };
                                    reader.readAsDataURL(this.files[0]);
                                }else{
                                    $('#previews_<?php echo $_smarty_tpl->getVariable('element_image_url')->value;?>
').attr('src', '').hide();
                                }" type="file" class="form-control">
                        <i class="fa fa-photo"></i><?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('element_image_url')->value]){?>更換圖片<?php }else{ ?>上傳圖片<?php }?>
                    </label>
                </div>
                <img style="width:300px;height:200px;<?php if (!$_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('element_image_url')->value]){?>display: none;<?php }?>" class="img-thumbnail1" id="previews_<?php echo $_smarty_tpl->getVariable('element_image_url')->value;?>
" src="<?php if ($_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('element_image_url')->value]){?>/CustomStickers/upload/image/<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('element_image_url')->value];?>
<?php }?>"/>
                <div class="card-body" style="margin-top:5px;">
                    <input name="fields[subject][element_title<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" type="text" maxlength="80" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('element_title')->value];?>
" class="form-control" style="width:300px;" placeholder="商品名稱">
                    <textarea name="fields[subject][element_subtitle<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" rows="1" maxlength="80" class="form-control" style="width:300px;margin-top:5px;" placeholder="商品描述"><?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('element_subtitle')->value];?>
</textarea>
                    <input name="fields[subject][element_price<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" type="number" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('element_price')->value];?>
" class="form-control" style="width:300px;margin-top:5px;" placeholder="商品價格">
                    <input name="fields[subject][element_quantity<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" type="number" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('element_quantity')->value];?>
" class="form-control" style="width:300px;margin-top:5px;" placeholder="商品數量">
                    <input name="fields[subject][element_currency<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" type="text" maxlength="80" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('element_currency')->value];?>
" class="form-control" style="width:300px;margin-top:5px;" placeholder="貨幣單位">
                </div>
            </div>
        <?php }} ?>
    </div>
</div>

<br><label for="">訂購時間</label><br>
<input id="OrderTimestamp" name="fields[subject][timestamp]" type="hidden" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['timestamp'];?>
" class="form-control" placeholder="訂購時間">
<input id="OrderDate" name="fields[subject][date]" type="date" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['date'];?>
" style="display:inline-block;width:50%;" class="form-control" placeholder="日期" onchange="if($('#OrderDate').val() && $('#OrderTime').val()){ $('#OrderTimestamp').val( $('#OrderDate').val()+' '+$('#OrderTime').val() ); }">
<input id="OrderTime" name="fields[subject][time]" type="time" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['time'];?>
" style="display:inline-block;width:49%;" class="form-control" placeholder="時間" onchange="if($('#OrderDate').val() && $('#OrderTime').val()){ $('#OrderTimestamp').val( $('#OrderDate').val()+' '+$('#OrderTime').val() ); }">
<br><label for="">訂單編號</label>
<input name="fields[subject][order_number]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['order_number'];?>
" class="form-control" placeholder="訂單編號">
<br><label for="">*付款方式</label>
<input name="fields[subject][payment_method]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['payment_method'];?>
" class="form-control" placeholder="付款方式">
<br><label for="">*貨幣單位</label>
<input name="fields[subject][currency]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['currency'];?>
" class="form-control" placeholder="貨幣單位">
<br><label for="">收貨地點</label>
<input name="fields[subject][city]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['city'];?>
" class="form-control" placeholder="城市">
<input name="fields[subject][postal_code]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['postal_code'];?>
" class="form-control" style="margin-top:5px;" placeholder="郵遞區號">
<input name="fields[subject][state]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['state'];?>
" class="form-control" style="margin-top:5px;" placeholder="地區/省/州">
<input name="fields[subject][country]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['country'];?>
" class="form-control" style="margin-top:5px;" placeholder="國家">
<input name="fields[subject][street_1]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['street_1'];?>
" class="form-control" style="margin-top:5px;" placeholder="街道一">
<input name="fields[subject][street_2]" type="text" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['street_2'];?>
" class="form-control" style="margin-top:5px;" placeholder="街道二">

<h3>摘要</h3>
<label for="">小計</label>
<input name="fields[subject][subtotal]" type="number" min="0" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['subtotal'];?>
" class="form-control" placeholder="小計">
<br><label for="">運費</label>
<input name="fields[subject][shipping_cost]" type="number" min="0" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['shipping_cost'];?>
" class="form-control" placeholder="運費">
<br><label for="">預估稅金</label>
<input name="fields[subject][total_tax]" type="number" min="0" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['total_tax'];?>
" class="form-control" placeholder="預估稅金">
<br><label for="">折扣</label>
<div class="TemplateContainer" style="overflow:auto;background-color:#fff;border: none;">
    <div class="TemplateSlider" style="width:3200px;">
        <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (9 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 9+1 - 0 : 0-(9)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
            <?php $_smarty_tpl->assign("adjustment_name",smarty_modifier_cat("adjustment_name",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <?php $_smarty_tpl->assign("adjustment_amount",smarty_modifier_cat("adjustment_amount",$_smarty_tpl->getVariable('G')->value),null,null);?>
            <div class="col-lg-4 Template" style="display:inline-block;width:300px;margin: 10px;text-align:center;">
                <div class="TemplateBtn" style="width:300px;height:35px;">
                    <span class="label label-success" style="padding:10px;float:left;">第<?php echo $_smarty_tpl->getVariable('G')->value+1;?>
組</span>
                    <?php if ($_smarty_tpl->getVariable('G')->value!==0){?>
                        <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeAdjustmentVal('left','<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-arrow-left"></i></span>
                    <?php }?>
                    <?php if ($_smarty_tpl->getVariable('G')->value!==9){?>
                        <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeAdjustmentVal('right','<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-arrow-right"></i></span>
                    <?php }?>
                    <span class="btn btn-sm label label-danger" style="padding:10px;float:left;margin-left:5px;" onclick="ClearAdjustmentData('<?php echo $_smarty_tpl->getVariable('G')->value;?>
');"><i class="fa fa-fw fa-trash"></i></span>
                </div>
                <div class="card-body" style="margin-top:5px;">
                    <input name="fields[subject][adjustment_name<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" type="text" maxlength="80" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('adjustment_name')->value];?>
" class="form-control" style="width:300px;margin-top:5px;" placeholder="折扣名稱">
                    <input name="fields[subject][adjustment_amount<?php echo $_smarty_tpl->getVariable('G')->value;?>
]" type="number" min="0" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject'][$_smarty_tpl->getVariable('adjustment_amount')->value];?>
" class="form-control" style="width:300px;margin-top:5px;" placeholder="折扣金額">
                </div>
            </div>
        <?php }} ?>
    </div>
</div>
<br><label for="">*總計</label>
<input name="fields[subject][total_cost]" type="number" value="<?php echo $_smarty_tpl->getVariable('row')->value['subject']['total_cost'];?>
" class="form-control" placeholder="總計">

<script>
    function ClearProductData(Ctn){
        $("input[name='fields[subject][element_image_url"+ Ctn +"]']").val('');
        $("#previews_image_url" + Ctn).attr('src', '').hide();
        $("input[name='fields[subject][element_title"+ Ctn +"]']").val('');
        $("textarea[name='fields[subject][element_subtitle"+ Ctn +"]']").val('');
        $("input[name='fields[subject][element_price"+ Ctn +"]']").val('');
        $("input[name='fields[subject][element_quantity"+ Ctn +"]']").val('');
        $("input[name='fields[subject][element_currency"+ Ctn +"]']").val('');
    }
    function ClearAdjustmentData(Ctn){
        $("input[name='fields[subject][adjustment_name"+ Ctn +"]']").val('');
        $("input[name='fields[subject][adjustment_amount"+ Ctn +"]']").val('');
    }
    
    function ChangeProductVal(direction, Ctn){
        var NowCtn = Ctn*1;
        var Now_element_title = $("input[name='fields[subject][element_title"+ NowCtn +"]']").val();
        var Now_element_subtitle = $("input[name='fields[subject][element_subtitle"+ NowCtn +"]']").val();
        var Now_element_price = $("input[name='fields[subject][element_price"+ NowCtn +"]']").val();
        var Now_element_quantity = $("input[name='fields[subject][element_quantity"+ NowCtn +"]']").val();
        var Now_element_currency = $("input[name='fields[subject][element_currency"+ NowCtn +"]']").val();
        var Now_element_image_url = $("input[name='fields[subject][element_image_url"+ NowCtn +"]']").val();
        var Now_preview = $("#previews_image_url" + NowCtn).attr('src');
        
        if(direction==='right'){
            var NextCtn = NowCtn+1;
            var Next_element_title = $("input[name='fields[subject][element_title"+ NextCtn +"]']").val();
            var Next_element_subtitle = $("input[name='fields[subject][element_subtitle"+ NextCtn +"]']").val();
            var Next_element_price = $("input[name='fields[subject][element_price"+ NextCtn +"]']").val();
            var Next_element_quantity = $("input[name='fields[subject][element_quantity"+ NextCtn +"]']").val();
            var Next_element_currency = $("input[name='fields[subject][element_currency"+ NextCtn +"]']").val();
            var Next_element_image_url = $("input[name='fields[subject][element_image_url"+ NextCtn +"]']").val();
            var Next_preview = $("#previews_image_url" + NextCtn).attr('src');
            
            $("input[name='fields[subject][element_title"+ NowCtn +"]']").val(Next_element_title);
            $("input[name='fields[subject][element_subtitle"+ NowCtn +"]']").val(Next_element_subtitle);
            $("input[name='fields[subject][element_price"+ NowCtn +"]']").val(Next_element_price);
            $("input[name='fields[subject][element_quantity"+ NowCtn +"]']").val(Next_element_quantity);
            $("input[name='fields[subject][element_currency"+ NowCtn +"]']").val(Next_element_currency);
            $("input[name='fields[subject][element_image_url"+ NowCtn +"]']").val(Next_element_image_url);
            if(Next_preview!=='' && Next_preview!=='#'){
                $("#previews_img" + NowCtn).show();
            }else{
                $("#previews_img" + NowCtn).hide();
            }
            
            $("input[name='fields[subject][element_title"+ NextCtn +"]']").val(Now_element_title);
            $("input[name='fields[subject][element_subtitle"+ NextCtn +"]']").val(Now_element_subtitle);
            $("input[name='fields[subject][element_price"+ NextCtn +"]']").val(Now_element_price);
            $("input[name='fields[subject][element_quantity"+ NextCtn +"]']").val(Now_element_quantity);
            $("input[name='fields[subject][element_currency"+ NextCtn +"]']").val(Now_element_currency);
            $("input[name='fields[subject][element_image_url"+ NextCtn +"]']").val(Now_element_image_url);
            if(Now_preview!=='' && Now_preview!=='#'){
                $("#previews_img" + NextCtn).show();
            }else{
                $("#previews_img" + NextCtn).hide();
            }
        }else{
            var PrevCtn = NowCtn-1;
            var Prev_element_title = $("input[name='fields[subject][element_title"+ PrevCtn +"]']").val();
            var Prev_element_subtitle = $("input[name='fields[subject][element_subtitle"+ PrevCtn +"]']").val();
            var Prev_element_price = $("input[name='fields[subject][element_price"+ PrevCtn +"]']").val();
            var Prev_element_quantity = $("input[name='fields[subject][element_quantity"+ PrevCtn +"]']").val();
            var Prev_element_currency = $("input[name='fields[subject][element_currency"+ PrevCtn +"]']").val();
            var Prev_element_image_url = $("input[name='fields[subject][element_image_url"+ PrevCtn +"]']").val();
            var Prev_preview = $("#previews_image_url" + PrevCtn).attr('src');
            
            $("input[name='fields[subject][element_title"+ PrevCtn +"]']").val(Now_element_title);
            $("input[name='fields[subject][element_subtitle"+ PrevCtn +"]']").val(Now_element_subtitle);
            $("input[name='fields[subject][element_price"+ PrevCtn +"]']").val(Now_element_price);
            $("input[name='fields[subject][element_quantity"+ PrevCtn +"]']").val(Now_element_quantity);
            $("input[name='fields[subject][element_currency"+ PrevCtn +"]']").val(Now_element_currency);
            $("input[name='fields[subject][element_image_url"+ PrevCtn +"]']").val(Now_element_image_url);
            if(Now_preview!=='' && Now_preview!=='#'){
                $("#previews_img" + PrevCtn).show();
            }else{
                $("#previews_img" + PrevCtn).hide();
            }
            
            $("input[name='fields[subject][element_title"+ NowCtn +"]']").val(Prev_element_title);
            $("input[name='fields[subject][element_subtitle"+ NowCtn +"]']").val(Prev_element_subtitle);
            $("input[name='fields[subject][element_price"+ NowCtn +"]']").val(Prev_element_price);
            $("input[name='fields[subject][element_quantity"+ NowCtn +"]']").val(Prev_element_quantity);
            $("input[name='fields[subject][element_currency"+ NowCtn +"]']").val(Prev_element_currency);
            $("input[name='fields[subject][element_image_url"+ NowCtn +"]']").val(Prev_element_image_url);
            if(Prev_preview!=='' && Prev_preview!=='#'){
                $("#previews_img" + NowCtn).show();
            }else{
                $("#previews_img" + NowCtn).hide();
            }
        }
    }
    function ChangeAdjustmentVal(direction, Ctn){
        var NowCtn = Ctn*1;
        var Now_adjustment_name = $("input[name='fields[subject][adjustment_name"+ NowCtn +"]']").val();
        var Now_adjustment_amount = $("input[name='fields[subject][adjustment_amount"+ NowCtn +"]']").val();
        
        if(direction==='right'){
            var NextCtn = NowCtn+1;
            var Next_adjustment_name = $("input[name='fields[subject][adjustment_name"+ NextCtn +"]']").val();
            var Next_adjustment_amount = $("input[name='fields[subject][adjustment_amount"+ NextCtn +"]']").val();
            
            $("input[name='fields[subject][adjustment_name"+ NowCtn +"]']").val(Next_adjustment_name);
            $("input[name='fields[subject][adjustment_amount"+ NowCtn +"]']").val(Next_adjustment_amount);
            
            $("input[name='fields[subject][adjustment_name"+ NextCtn +"]']").val(Now_adjustment_name);
            $("input[name='fields[subject][adjustment_amount"+ NextCtn +"]']").val(Now_adjustment_amount);
        }else{
            var PrevCtn = NowCtn-1;
            var Prev_adjustment_name = $("input[name='fields[subject][adjustment_name"+ PrevCtn +"]']").val();
            var Prev_adjustment_amount = $("input[name='fields[subject][adjustment_amount"+ PrevCtn +"]']").val();
            
            $("input[name='fields[subject][adjustment_name"+ PrevCtn +"]']").val(Now_adjustment_name);
            $("input[name='fields[subject][adjustment_amount"+ PrevCtn +"]']").val(Now_adjustment_amount);
            
            $("input[name='fields[subject][adjustment_name"+ NowCtn +"]']").val(Prev_adjustment_name);
            $("input[name='fields[subject][adjustment_amount"+ NowCtn +"]']").val(Prev_adjustment_amount);
        }
    }
</script>