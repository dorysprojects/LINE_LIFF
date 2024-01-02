{#if $item.required=='on'#}*{#/if#}
<label for="{#$item.name#}">{#$item.label#}</label><br/>
<img style="max-height:200px;max-width:200px;{#if !$item.img0#}display: none;{#/if#}" class="img-thumbnail" id="previews_{#$item.name#}" src="{#if $item.img0#}{#$__WEB_UPLOAD#}/image/{#$item.img0#}{#/if#}" alt="上傳圖片" />
<label class="btn btn-info">
    <input type="hidden" name="fields[subject][{#$item.name#}]" value="{#$item.img0#}">
    <input style="display:none;" id="image-mapper-file" name="{#$item.name#}" onchange="init_inputCardRobotImg(this);" type="file" class="form-control">
    <i class="fa fa-photo"></i>{#if $item.img0#}更換卡片底圖{#else#}上傳卡片底圖{#/if#}
</label>

<script>
    function init_inputCardRobotImg(obj) {
        $('#EditorArea').html('');
        if (typeof AddArea === "function") {
            AddArea(0, 0, 100, 100);
        }
        var Name = obj.name;
        var reader = new FileReader();
        if (obj.files && obj.files[0]) {
            var file = obj.files[0];
            var ErrorMsg = '';
            var error = 0;
            if (file.size > 1024000) {
                ErrorMsg += "\n" + '檔案大小：不符，圖片上限1024K，選擇圖片為' + file.size + 'K';
                error ++;
            }
            if (file.type !== 'image/jpeg'&&file.type !== 'image/png') {
                ErrorMsg += "\n" + '檔案類型：不符，圖片限制為jpeg、png，選擇圖片為' + file.type;
                error ++;
            }
            reader.onload = function (e) {
                var imgSrc = e.target.result;
                var newImg = new Image();
                newImg.onload = function () {
                    if (0 && newImg.width===1040&&newImg.height===520) {
                        var MoreSize = '1040x520';
                        ErrorMsg += "\n" + '圖片尺寸：不符，大小限制為'+MoreSize+'「選擇圖片為' + newImg.width + 'x' + newImg.height + '」';
                        error ++;
                    }
                    if (error === 0) {
                        $('#ContainerBox').show();
                        $('#EditorArea').css('background-image', 'url("'+imgSrc+'")').css('width', newImg.width).css('height', newImg.height).show();
                        $('#previews_'+Name).attr('src', imgSrc).show();
                    } else {
                        AlertMsg('danger', '錯誤訊息：', ErrorMsg);
                        $('#ContainerBox').hide();
                        $('#EditorArea').css('background-image', '').hide();
                        $('#previews_'+Name).removeAttr('src').hide();
                        obj.value = '';
                    }
                };
                newImg.src = imgSrc; // this must be done AFTER setting onload
            };
            if (error === 0) {
                reader.readAsDataURL(obj.files[0]);
            } else {
                AlertMsg('danger', '錯誤訊息：', ErrorMsg);
                $('#ContainerBox').hide();
                $('#EditorArea').css('background-image', '').hide();
                $('#previews_'+Name).removeAttr('src').hide();
                obj.value = '';
            }
        }else{
            $('#ContainerBox').hide();
            $('#EditorArea').css('background-image', '').hide();
            $('#previews_'+Name).removeAttr('src').hide();
        }
    }
</script>