<label for="topStyle">第一個項目</label><br>
<input name="fields[subject][topStyle]" type="radio" class="minimal" value="large" onchange="topStyleChg();" {#if $row.subject.topStyle!='compact'#}checked{#/if#}>封面
<input name="fields[subject][topStyle]" type="radio" class="minimal" value="compact" onchange="topStyleChg();" {#if $row.subject.topStyle=='compact'#}checked{#/if#}>清單

<br><br><label for="TemplateContainer">內容</label>
<div class="TemplateContainer" style="overflow:auto;background-color:#fff;border:none;">
    <div class="TemplateSlider">
        {#for $G=0 to 3#}
            {#assign var="subtitle" value="subtitle"|cat:$G#}
            {#assign var="subcontent" value="subcontent"|cat:$G#}
            {#assign var="img" value="img"|cat:$G#}
            <div class="Template" style="margin: 10px;">
                <div class="TemplateBtn" style="height:35px;">
                    <span class="btn label-success">第{#$G+1#}組</span>
                    {#if $G!==0#}
                        <span class="btn label-primary" onclick="ChangeVal('left','{#$G#}');"><i class="fa fa-fw fa-arrow-left"></i></span>
                    {#/if#}
                    {#if $G!==3#}
                        <span class="btn label-primary" onclick="ChangeVal('right','{#$G#}');"><i class="fa fa-fw fa-arrow-right"></i></span>
                    {#/if#}
                    <span class="btn label-danger" onclick="ClearData('{#$G#}');"><i class="fa fa-fw fa-trash"></i></span>
                    <label class="btn btn-info">
                        <input type="hidden" name="fields[subject][img{#$G#}]" value="{#$row.subject.$img#}">
                        <input style="display:none;" id="FILES_{#$img#}" name="{#$img#}" onchange="var Ctn = '{#$img#}';if (this.files && this.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        {#if $G===0#}
                                            topStyleChg(e);
                                        {#else#}
                                            $('#previewsList_'+Ctn).attr('src', e.target.result).show();
                                        {#/if#}
                                    };
                                    reader.readAsDataURL(this.files[0]);
                                }else{
                                    {#if $G===0#}
                                        topStyleChg('e');
                                    {#else#}
                                        $('#previewsList_'+Ctn).attr('src', '').hide();
                                    {#/if#}
                                }" type="file" class="form-control">
                        <i class="fa fa-photo"></i>{#if $row.subject.$img#}更換圖片{#else#}上傳圖片{#/if#}
                    </label>
                </div>
                <img style="width:300px;height:200px;{#if $row.subject.topStyle=='compact' || ($row.subject.topStyle!='compact'&&!$row.subject.$img) || $G!==0#}display: none;{#else#}display: block;{#/if#}" class="img-thumbnail1" id="previews_{#$img#}" src="{#if $row.subject.$img#}{#$__WEB_UPLOAD#}/image/{#$row.subject.$img#}{#/if#}"/>
                <div class="card-body" style="margin-top:5px;width:300px;display:inline-block;">
                    <input name="fields[subject][subtitle{#$G#}]" type="text" maxlength="80" value="{#$row.subject.$subtitle#}" class="form-control" style="{#if $G!==0#}width:210px;{#/if#}" placeholder="標題">
                    <textarea name="fields[subject][subcontent{#$G#}]" rows="1" maxlength="80" class="form-control" style="margin-top:5px;{#if $G!==0#}width:210px;{#/if#}" placeholder="描述">{#$row.subject.$subcontent#}</textarea>
                    <div class="card-button">
                        {#for $N=0 to 0#}
                        {#assign var="subject" value="subject"|cat:$G|cat:"_"|cat:$N#}
                        {#assign var="action" value="action"|cat:$G|cat:"_"|cat:$N#}
                        {#assign var="data" value="data"|cat:$G|cat:"_"|cat:$N#}
                            <div class="button-group" style="">
                                <input name="fields[subject][subject{#$G#}_{#$N#}]" type="text" value="{#$row.subject.$subject#}" class="form-control" style="width:30%;display:inline-block;margin-top:5px;" placeholder="按鈕{#$N+1#}">
                                <select name="fields[subject][action{#$G#}_{#$N#}]" class="form-control select2" style="width:30%;display:inline-block;margin-top:5px;">
                                    <option value="" disabled>請選擇動作</option>
                                    <option value="noaction" {#if $row.subject.$action=='noaction'#}selected{#/if#}>不設定動作</option>
                                    <option value="hyperlink" {#if $row.subject.$action=='hyperlink'#}selected{#/if#}>超連結動作</option>
                                    <option value="text" {#if $row.subject.$action=='text'#}selected{#/if#}>文字</option>
                                    <option value="postback" {#if $row.subject.$action=='postback'#}selected{#/if#}>背景處理</option>
                                </select>
                                <input name="fields[subject][data{#$G#}_{#$N#}]" type="text" value="{#$row.subject.$data#}" class="form-control" style="width:35%;display:inline-block;margin-top:5px;" placeholder="內容">
                            </div>
                        {#/for#}
                    </div>
                </div>
                <img style="{#if $G!==0#}margin-left:-90px;{#/if#}width:90px;height:60px;vertical-align:35px;{#if (($row.subject.topStyle!='compact' || ($row.subject.topStyle=='compact'&&!$row.subject.$img)) && $G===0) || (!$row.subject.$img&&$G!==0)#}display: none;{#/if#}" class="img-thumbnail1" id="previewsList_{#$img#}" src="{#if $row.subject.$img#}{#$__WEB_UPLOAD#}/image/{#$row.subject.$img#}{#/if#}"/>
            </div>
        {#/for#}
    </div>
</div>

<br><br><label for="BottomBtn">底部按鈕</label>
<div class="button-group" style="width:300px;">
    <input name="fields[subject][bottomSubject]" type="text" value="{#$row.subject.bottomSubject#}" class="form-control" style="margin-top:5px;" placeholder="按鈕">
    <select name="fields[subject][bottomAction]" class="form-control select2" style="margin-top:5px;">
        <option value="" disabled>請選擇動作</option>
        <option value="noaction" {#if $row.subject.bottomAction=='noaction'#}selected{#/if#}>不設定動作</option>
        <option value="hyperlink" {#if $row.subject.bottomAction=='hyperlink'#}selected{#/if#}>超連結動作</option>
        <option value="text" {#if $row.subject.bottomAction=='text'#}selected{#/if#}>文字</option>
        <option value="postback" {#if $row.subject.bottomAction=='postback'#}selected{#/if#}>背景處理</option>
    </select>
    <input name="fields[subject][bottomData]" type="text" value="{#$row.subject.bottomData#}" class="form-control" style="margin-top:5px;" placeholder="內容">
</div>

<script>
    function topStyleChg(e){
        var Ctn = 'img0';
        if(e || $('#previewsList_'+Ctn).attr('src')){
            switch($('input[name="fields[subject][topStyle]"]:checked').val()){
                case 'large':
                    $('#previewsList_'+Ctn).parent().find('.card-body>input').css('width', '300px');
                    $('#previewsList_'+Ctn).parent().find('.card-body>textarea').css('width', '300px');
                    $('#previews_'+Ctn).css('display', 'block');
                    $('#previewsList_'+Ctn).css('margin-left', '0px').hide();
                    break;
                case 'compact':
                    $('#previewsList_'+Ctn).parent().find('.card-body>input').css('width', '210px');
                    $('#previewsList_'+Ctn).parent().find('.card-body>textarea').css('width', '210px');
                    $('#previews_'+Ctn).hide();
                    $('#previewsList_'+Ctn).css('margin-left', '-90px').show();
                    break;
            }
        }else{
            $('#previewsList_'+Ctn).parent().find('.card-body>input').css('width', '300px');
            $('#previewsList_'+Ctn).parent().find('.card-body>textarea').css('width', '300px');
            $('#previews_'+Ctn).hide();
            $('#previewsList_'+Ctn).css('margin-left', '0px').hide();
        }
        if(e){
            if(e.target && e.target.result){
                $('#previews_'+Ctn).attr('src', e.target.result);
                $('#previewsList_'+Ctn).attr('src', e.target.result);
            }else{
                $('#previews_'+Ctn).attr('src', '').hide();
                $('#previewsList_'+Ctn).attr('src', '').hide();
                $('#previewsList_'+Ctn).parent().find('.card-body>input').css('width', '300px');
                $('#previewsList_'+Ctn).parent().find('.card-body>textarea').css('width', '300px');
            }
        }
    }
</script>
{#include file=$__PublicFunc|cat:'/SortJs.php'#}