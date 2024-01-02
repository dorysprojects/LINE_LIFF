<div class="TemplateContainer" style="overflow:auto;background-color:#fff;border:none;">
    <div class="TemplateSlider">
        {#for $G=0 to 0#}
            {#assign var="subtitle" value="subtitle"|cat:$G#}
            {#assign var="subcontent" value="subcontent"|cat:$G#}
            {#assign var="type" value="type"|cat:$G#}
            {#assign var="img" value="img"|cat:$G#}
            <div class="Template" style="margin: 10px;">
                <div class="TemplateBtn" style="height:35px;">
                    <label class="btn btn-info">
                        <input id="SubjectType{#$G#}" type="hidden" name="fields[subject][type{#$G#}]" value="{#$row.subject.$type#}">
                        <input type="hidden" name="fields[subject][img{#$G#}]" value="{#$row.subject.$img#}">
                        <input style="display:none;" id="FILES_{#$img#}" accept="image/*,video/*" name="{#$img#}" onchange="if (this.files && this.files[0]) {
                                    var fileType = this.files[0].type.split('/');
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        $('#SubjectType{#$G#}').val(fileType[0]);
                                        switch(fileType[0]){
                                            case 'image':
                                                $('#previews_video_{#$img#}').hide();
                                                $('#previews_image_{#$img#}').attr('src', e.target.result).show();
                                                break;
                                            case 'video':
                                                $('#previews_image_{#$img#}').hide();
                                                $('#previews_video_{#$img#} source').attr('src', e.target.result);
                                                $('#previews_video_{#$img#}')[0].load();
                                                $('#previews_video_{#$img#}').show();
                                                break;
                                        }
                                    };
                                    reader.readAsDataURL(this.files[0]);
                                }else{
                                    $('#SubjectType{#$G#}').val('');
                                    $('#previews_image_{#$img#}').attr('src', '').hide();
                                    $('#previews_video_{#$img#}').attr('src', '').hide();
                                }" type="file" class="form-control">
                        <i class="fa fa-photo"></i>{#if $row.subject.$img#}更換圖片、影片{#else#}上傳圖片、影片{#/if#}
                    </label>
                </div>
                <img style="width:300px;height:200px;{#if $row.subject.$type!='image'||!$row.subject.$img#}display: none;{#/if#}" class="img-thumbnail1" id="previews_image_{#$img#}" src="{#if $row.subject.$type=='image'&&$row.subject.$img#}{#$__WEB_UPLOAD#}/image/{#$row.subject.$img#}{#/if#}"/>
                <video style="width:300px;height:200px;{#if $row.subject.$type!='video'||!$row.subject.$img#}display: none;{#/if#}" class="img-thumbnail1" id="previews_video_{#$img#}" controls><source src="{#if $row.subject.$type=='video'&&$row.subject.$img#}{#$__WEB_UPLOAD#}/video/{#$row.subject.$img#}{#/if#}"></video>
                <div class="card-body" style="margin-top:5px;width:300px;">
                    <div class="card-button">
                        {#for $N=0 to 2#}
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
            </div>
        {#/for#}
    </div>
</div>
