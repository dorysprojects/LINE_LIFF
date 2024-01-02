{#include file=$__PublicView|cat:'/UrlInfo.tpl'#}

<div class="TemplateContainer" style="overflow:auto;">
    <div class="TemplateSlider" style="width:3200px;">
        {#for $G=0 to 9#}
            {#assign var="subtitle" value="subtitle"|cat:$G#}
            {#assign var="subcontent" value="subcontent"|cat:$G#}
            {#assign var="img" value="img"|cat:$G#}
            <div class="col-lg-4 Template" style="display:inline-block;width:300px;margin: 10px;text-align:center;">
                <div class="TemplateBtn" style="width:300px;height:35px;">
                    <span class="label label-success" style="padding:10px;float:left;">第{#$G+1#}組</span>
                    {#if $G!==0#}
                        <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeVal('left','{#$G#}');"><i class="fa fa-fw fa-arrow-left"></i></span>
                    {#/if#}
                    {#if $G!==9#}
                        <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeVal('right','{#$G#}');"><i class="fa fa-fw fa-arrow-right"></i></span>
                    {#/if#}
                    <span class="btn btn-sm label label-danger" style="padding:10px;float:left;margin-left:5px;" onclick="ClearData('{#$G#}');"><i class="fa fa-fw fa-trash"></i></span>
                    <label class="btn btn-info" style="float:right;">
                        <input type="hidden" name="fields[subject][img{#$G#}]" value="{#$row.subject.$img#}">
                        <input style="display:none;" id="FILES_{#$img#}" name="{#$img#}" onchange="if (this.files && this.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) { $('#previews_{#$img#}').attr('src', e.target.result).show(); };
                                    reader.readAsDataURL(this.files[0]);
                                }else{
                                    $('#previews_{#$img#}').attr('src', '').hide();
                                }" type="file" class="form-control">
                        <i class="fa fa-photo"></i>{#if $row.subject.$img#}更換圖片{#else#}上傳圖片{#/if#}
                    </label>
                </div>
                <img style="width:300px;height:200px;{#if !$row.subject.$img#}display: none;{#/if#}" class="img-thumbnail1" id="previews_{#$img#}" src="{#if $row.subject.$img#}{#$__WEB_UPLOAD#}/image/{#$row.subject.$img#}{#/if#}"/>
                <div class="card-body" style="margin-top:5px;">
                    <div class="card-button">
                        {#assign var="N" value=0#}
                        {#assign var="subject" value="subject"|cat:$G|cat:"_"|cat:$N#}
                        {#assign var="action" value="action"|cat:$G|cat:"_"|cat:$N#}
                        {#assign var="data" value="data"|cat:$G|cat:"_"|cat:$N#}
                        <div class="button-group" style="width:300px;">
                            <input name="fields[subject][subject{#$G#}_{#$N#}]" type="text" value="{#$row.subject.$subject#}" class="form-control" style="margin-top:5px;" placeholder="按鈕{#$N+1#}">
                            <select name="fields[subject][action{#$G#}_{#$N#}]" class="form-control select2" style="margin-top:5px;">
                                <option value="" disabled>請選擇動作</option>
                                <option value="noaction" {#if $row.subject.$action=='noaction'#}selected{#/if#}>不設定動作</option>
                                <option value="hyperlink" {#if $row.subject.$action=='hyperlink'#}selected{#/if#}>超連結動作</option>
                                <option value="text" {#if $row.subject.$action=='text'#}selected{#/if#}>文字</option>
                                <option value="postback" {#if $row.subject.$action=='postback'#}selected{#/if#}>輸入代碼</option>
                            </select>
                            <input name="fields[subject][data{#$G#}_{#$N#}]" type="text" value="{#$row.subject.$data#}" class="form-control" style="margin-top:5px;" placeholder="內容">
                        </div>
                    </div>
                </div>
            </div>
        {#/for#}
    </div>
</div>
{#include file=$__PublicFunc|cat:'/SortJs.php'#}