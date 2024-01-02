<div class="TemplateContainer" style="overflow:auto;background-color:#fff;border:none;">
    <div class="TemplateSlider" style="width:320px;">
        {#for $G=0 to 0#}
            {#assign var="subtitle" value="subtitle"|cat:$G#}
            {#assign var="subcontent" value="subcontent"|cat:$G#}
            {#assign var="img" value="img"|cat:$G#}
            <div class="col-lg-4 Template" style="display:inline-block;width:300px;margin: 10px;text-align:center;">
                <img style="width:300px;height:200px;{#if !$row.subject.$img#}display: none;{#/if#}" class="img-thumbnail1" id="previews_{#$img#}" src="{#if $row.subject.$img#}{#$__WEB_UPLOAD#}/image/{#$row.subject.$img#}{#/if#}"/>
                <div class="card-body" style="margin-top:5px;">
                    <textarea name="fields[subject][subtitle{#$G#}]" rows="1" maxlength="640" class="form-control" style="width:300px;margin-top:5px;" placeholder="標題">{#$row.subject.$subtitle#}</textarea>
                    <div class="card-button">
                        {#for $N=0 to 2#}
                        {#assign var="subject" value="subject"|cat:$G|cat:"_"|cat:$N#}
                        {#assign var="action" value="action"|cat:$G|cat:"_"|cat:$N#}
                        {#assign var="data" value="data"|cat:$G|cat:"_"|cat:$N#}
                            <div class="button-group" style="width:300px;">
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
            </div>
        {#/for#}
    </div>
</div>
{#include file=$__PublicFunc|cat:'/SortJs.php'#}