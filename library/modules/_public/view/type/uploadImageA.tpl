{#if $item.nolabel!='on'#}
    {#if $item.required=='on'#}*{#/if#}
    <label for="{#$item.name#}">{#$item.label#}</label></br>
{#/if#}
<img style="max-height:200px;max-width:200px;{#if !$item.value#}display: none;{#/if#}" class="img-thumbnail" id="previews_{#$item.name#}" src="{#if $item.value#}{#$__WEB_UPLOAD#}/image/{#$item.value#}{#/if#}" alt="上傳圖片" />
<label class="btn btn-info" {#if $item.disabled#}disabled{#/if#}>
    <input type="hidden" name="fields[subject][{#$item.name#}]" class="{#$item.class#}" value="{#$item.value#}">
    <input style="display:none;" id="FILES_{#$item.name#}" name="{#$item.name#}" {#if $item.disabled#}disabled{#/if#} onchange="if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) { $('#previews_{#$item.name#}').attr('src', e.target.result).show(); };
                reader.readAsDataURL(this.files[0]);
            }else{
                $('#previews_{#$item.name#}').attr('src', '').hide();
            }" type="file" class="form-control">
    <i class="fa fa-photo"></i>{#if $item.value#}更換圖片{#else#}上傳圖片{#/if#}
</label>