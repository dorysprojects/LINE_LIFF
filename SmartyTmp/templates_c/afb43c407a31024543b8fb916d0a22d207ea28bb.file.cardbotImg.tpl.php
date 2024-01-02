<?php /* Smarty version Smarty3-b7, created on 2021-02-09 10:34:26
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/cardbotImg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4946914486021f4b20a9f31-96597869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afb43c407a31024543b8fb916d0a22d207ea28bb' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/cardbotImg.tpl',
      1 => 1612777384,
    ),
  ),
  'nocache_hash' => '4946914486021f4b20a9f31-96597869',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>*<?php }?>
<label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
</label><br/>
<img style="max-height:200px;max-width:200px;<?php if (!$_smarty_tpl->getVariable('item')->value['img0']){?>display: none;<?php }?>" class="img-thumbnail" id="previews_<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" src="<?php if ($_smarty_tpl->getVariable('item')->value['img0']){?><?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('item')->value['img0'];?>
<?php }?>" alt="上傳圖片" />
<label class="btn btn-info">
    <input type="hidden" name="fields[subject][<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]" value="<?php echo $_smarty_tpl->getVariable('item')->value['img0'];?>
">
    <input style="display:none;" id="image-mapper-file" name="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" onchange="init_inputCardRobotImg(this);" type="file" class="form-control">
    <i class="fa fa-photo"></i><?php if ($_smarty_tpl->getVariable('item')->value['img0']){?>更換卡片底圖<?php }else{ ?>上傳卡片底圖<?php }?>
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