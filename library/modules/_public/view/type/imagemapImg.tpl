{#if $item.required=='on'#}*{#/if#}
<label for="{#$item.name#}">{#$item.label#}</label><br/>
<img style="max-height:200px;max-width:200px;{#if !$item.img0#}display: none;{#/if#}" class="img-thumbnail" id="previews_{#$item.name#}" src="{#if $item.img0#}{#$__WEB_UPLOAD#}/image/{#$item.img0#}{#/if#}" alt="上傳圖片" />
<label class="btn btn-info">
    <input type="hidden" name="fields[subject][{#$item.name#}]" value="{#$item.img0#}">
    <input style="display:none;" id="image-mapper-file" name="{#$item.name#}" onchange="init_inputImagemapImg(this, '{#$_Module#}');" type="file" class="form-control">
    <i class="fa fa-photo"></i>{#if $item.img0#}更換圖片{#else#}上傳圖片{#/if#}
</label>