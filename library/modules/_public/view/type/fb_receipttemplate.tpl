<label for="TemplateContainer">商品</label>
<div class="TemplateContainer" style="overflow:auto;background-color:#fff;border:none;">
    <div class="TemplateSlider" style="width:6400px;">
        {#for $G=0 to 19#}
            {#assign var="element_title" value="element_title"|cat:$G#}
            {#assign var="element_subtitle" value="element_subtitle"|cat:$G#}
            {#assign var="element_image_url" value="element_image_url"|cat:$G#}
            {#assign var="element_price" value="element_price"|cat:$G#}
            {#assign var="element_quantity" value="element_quantity"|cat:$G#}
            {#assign var="element_currency" value="element_currency"|cat:$G#}
            <div class="col-lg-4 Template" style="display:inline-block;width:300px;margin: 10px;text-align:center;">
                <div class="TemplateBtn" style="width:300px;height:35px;">
                    <span class="label label-success" style="padding:10px;float:left;">第{#$G+1#}組</span>
                    {#if $G!==0#}
                        <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeProductVal('left','{#$G#}');"><i class="fa fa-fw fa-arrow-left"></i></span>
                    {#/if#}
                    {#if $G!==19#}
                        <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeProductVal('right','{#$G#}');"><i class="fa fa-fw fa-arrow-right"></i></span>
                    {#/if#}
                    <span class="btn btn-sm label label-danger" style="padding:10px;float:left;margin-left:5px;" onclick="ClearProductData('{#$G#}');"><i class="fa fa-fw fa-trash"></i></span>
                    <label class="btn btn-info" style="float:right;">
                        <input type="hidden" name="fields[subject][element_image_url{#$G#}]" value="{#$row.subject.$element_image_url#}">
                        <input style="display:none;" id="FILES_{#$element_image_url#}" name="{#$element_image_url#}" onchange="if (this.files && this.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        $('#previews_{#$element_image_url#}').attr('src', e.target.result).show();
                                    };
                                    reader.readAsDataURL(this.files[0]);
                                }else{
                                    $('#previews_{#$element_image_url#}').attr('src', '').hide();
                                }" type="file" class="form-control">
                        <i class="fa fa-photo"></i>{#if $row.subject.$element_image_url#}更換圖片{#else#}上傳圖片{#/if#}
                    </label>
                </div>
                <img style="width:300px;height:200px;{#if !$row.subject.$element_image_url#}display: none;{#/if#}" class="img-thumbnail1" id="previews_{#$element_image_url#}" src="{#if $row.subject.$element_image_url#}{#$__WEB_UPLOAD#}/image/{#$row.subject.$element_image_url#}{#/if#}"/>
                <div class="card-body" style="margin-top:5px;">
                    <input name="fields[subject][element_title{#$G#}]" type="text" maxlength="80" value="{#$row.subject.$element_title#}" class="form-control" style="width:300px;" placeholder="商品名稱">
                    <textarea name="fields[subject][element_subtitle{#$G#}]" rows="1" maxlength="80" class="form-control" style="width:300px;margin-top:5px;" placeholder="商品描述">{#$row.subject.$element_subtitle#}</textarea>
                    <input name="fields[subject][element_price{#$G#}]" type="number" value="{#$row.subject.$element_price#}" class="form-control" style="width:300px;margin-top:5px;" placeholder="商品價格">
                    <input name="fields[subject][element_quantity{#$G#}]" type="number" value="{#$row.subject.$element_quantity#}" class="form-control" style="width:300px;margin-top:5px;" placeholder="商品數量">
                    <input name="fields[subject][element_currency{#$G#}]" type="text" maxlength="80" value="{#$row.subject.$element_currency#}" class="form-control" style="width:300px;margin-top:5px;" placeholder="貨幣單位">
                </div>
            </div>
        {#/for#}
    </div>
</div>

<br><label for="">訂購時間</label><br>
<input id="OrderTimestamp" name="fields[subject][timestamp]" type="hidden" value="{#$row.subject.timestamp#}" class="form-control" placeholder="訂購時間">
<input id="OrderDate" name="fields[subject][date]" type="date" value="{#$row.subject.date#}" style="display:inline-block;width:50%;" class="form-control" placeholder="日期" onchange="if($('#OrderDate').val() && $('#OrderTime').val()){ $('#OrderTimestamp').val( $('#OrderDate').val()+' '+$('#OrderTime').val() ); }">
<input id="OrderTime" name="fields[subject][time]" type="time" value="{#$row.subject.time#}" style="display:inline-block;width:49%;" class="form-control" placeholder="時間" onchange="if($('#OrderDate').val() && $('#OrderTime').val()){ $('#OrderTimestamp').val( $('#OrderDate').val()+' '+$('#OrderTime').val() ); }">
<br><label for="">訂單編號</label>
<input name="fields[subject][order_number]" type="text" value="{#$row.subject.order_number#}" class="form-control" placeholder="訂單編號">
<br><label for="">*付款方式</label>
<input name="fields[subject][payment_method]" type="text" value="{#$row.subject.payment_method#}" class="form-control" placeholder="付款方式">
<br><label for="">*貨幣單位</label>
<input name="fields[subject][currency]" type="text" value="{#$row.subject.currency#}" class="form-control" placeholder="貨幣單位">
<br><label for="">收貨地點</label>
<input name="fields[subject][city]" type="text" value="{#$row.subject.city#}" class="form-control" placeholder="城市">
<input name="fields[subject][postal_code]" type="text" value="{#$row.subject.postal_code#}" class="form-control" style="margin-top:5px;" placeholder="郵遞區號">
<input name="fields[subject][state]" type="text" value="{#$row.subject.state#}" class="form-control" style="margin-top:5px;" placeholder="地區/省/州">
<input name="fields[subject][country]" type="text" value="{#$row.subject.country#}" class="form-control" style="margin-top:5px;" placeholder="國家">
<input name="fields[subject][street_1]" type="text" value="{#$row.subject.street_1#}" class="form-control" style="margin-top:5px;" placeholder="街道一">
<input name="fields[subject][street_2]" type="text" value="{#$row.subject.street_2#}" class="form-control" style="margin-top:5px;" placeholder="街道二">

<h3>摘要</h3>
<label for="">小計</label>
<input name="fields[subject][subtotal]" type="number" min="0" value="{#$row.subject.subtotal#}" class="form-control" placeholder="小計">
<br><label for="">運費</label>
<input name="fields[subject][shipping_cost]" type="number" min="0" value="{#$row.subject.shipping_cost#}" class="form-control" placeholder="運費">
<br><label for="">預估稅金</label>
<input name="fields[subject][total_tax]" type="number" min="0" value="{#$row.subject.total_tax#}" class="form-control" placeholder="預估稅金">
<br><label for="">折扣</label>
<div class="TemplateContainer" style="overflow:auto;background-color:#fff;border: none;">
    <div class="TemplateSlider" style="width:3200px;">
        {#for $G=0 to 9#}
            {#assign var="adjustment_name" value="adjustment_name"|cat:$G#}
            {#assign var="adjustment_amount" value="adjustment_amount"|cat:$G#}
            <div class="col-lg-4 Template" style="display:inline-block;width:300px;margin: 10px;text-align:center;">
                <div class="TemplateBtn" style="width:300px;height:35px;">
                    <span class="label label-success" style="padding:10px;float:left;">第{#$G+1#}組</span>
                    {#if $G!==0#}
                        <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeAdjustmentVal('left','{#$G#}');"><i class="fa fa-fw fa-arrow-left"></i></span>
                    {#/if#}
                    {#if $G!==9#}
                        <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeAdjustmentVal('right','{#$G#}');"><i class="fa fa-fw fa-arrow-right"></i></span>
                    {#/if#}
                    <span class="btn btn-sm label label-danger" style="padding:10px;float:left;margin-left:5px;" onclick="ClearAdjustmentData('{#$G#}');"><i class="fa fa-fw fa-trash"></i></span>
                </div>
                <div class="card-body" style="margin-top:5px;">
                    <input name="fields[subject][adjustment_name{#$G#}]" type="text" maxlength="80" value="{#$row.subject.$adjustment_name#}" class="form-control" style="width:300px;margin-top:5px;" placeholder="折扣名稱">
                    <input name="fields[subject][adjustment_amount{#$G#}]" type="number" min="0" value="{#$row.subject.$adjustment_amount#}" class="form-control" style="width:300px;margin-top:5px;" placeholder="折扣金額">
                </div>
            </div>
        {#/for#}
    </div>
</div>
<br><label for="">*總計</label>
<input name="fields[subject][total_cost]" type="number" value="{#$row.subject.total_cost#}" class="form-control" placeholder="總計">

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