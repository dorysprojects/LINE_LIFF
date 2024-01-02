<?php /* Smarty version Smarty3-b7, created on 2022-08-08 18:03:22
         compiled from "/home1/bot.gadclubs.com//library/modules/_public/view/LocalStorage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96819459962f0df6aaec011-63631039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72afd497fc9bbaf8509d1bc5eb706e22e2f79ff7' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/_public/view/LocalStorage.tpl',
      1 => 1659951882,
    ),
  ),
  'nocache_hash' => '96819459962f0df6aaec011-63631039',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
    var emList = <?php if ($_smarty_tpl->getVariable('emList')->value){?><?php echo json_encode($_smarty_tpl->getVariable('emList')->value);?>
<?php }else{ ?>{}<?php }?>;
    var emoticonList = <?php if ($_smarty_tpl->getVariable('emoticonList')->value){?><?php echo json_encode($_smarty_tpl->getVariable('emoticonList')->value);?>
<?php }else{ ?>{}<?php }?>;
    var EmojiLink_Path = '<?php echo $_smarty_tpl->getVariable('EmojiLink_Path')->value;?>
';
    var EmojiLink_OS = '<?php echo $_smarty_tpl->getVariable('EmojiLink_OS')->value;?>
';
    var EmojiLink_Extension = '<?php echo $_smarty_tpl->getVariable('EmojiLink_Extension')->value;?>
';
    var StickerLink_Path = '<?php echo $_smarty_tpl->getVariable('StickerLink_Path')->value;?>
';
    var StickerLink_File = '<?php echo $_smarty_tpl->getVariable('StickerLink_File')->value;?>
';
    function GetLocalStorage(key){
        if(key){
            return window.localStorage.getItem(key) ? JSON.parse(window.localStorage.getItem(key)) : [];
        }else{
            return false;
        }
    }

    function SetLocalStorage(key, value){
        if(key && value){
            return window.localStorage.setItem(key, JSON.stringify(value));
        }else{
            return false;
        }
    }

    function RemoveLocalStorage(key){
        if(key){
            return window.localStorage.removeItem(key);
        }else{
            return false;
        }
    }

    function UpdateCommonlyUsed(type, value){
        var key;
        switch(type){
            case 'Emoticon':
                key = 'CommonlyUsedEmoticon';
                break;
            case 'Sticker':
                key = 'CommonlyUsedSticker';
                break;
        }
        if(value){
            var CommonlyUsed = GetLocalStorage(key);
            if(CommonlyUsed.length > 0){
                var OldIndex = CommonlyUsed.indexOf(value);
                if(OldIndex !== -1){
                    CommonlyUsed.splice(OldIndex, 1);
                }
            }
            CommonlyUsed.unshift(value);
            SetLocalStorage(key, CommonlyUsed);
            switch(type){
                case 'Emoticon':
                    UpdateEmoticonHtml();
                    break;
                case 'Sticker':
                    UpdateStickerHtml();
                    break;
            }
            return CommonlyUsed;
        }else{
            switch(type){
                case 'Emoticon':
                    $('#EmojiTypeCommonlyUsed>ul').html('');
                    AppendDefaultHtml('EmojiTypeCommonlyUsed');
                    break;
                case 'Sticker':
                    $('#ImgTypeCommonlyUsed>ul').html('');
                    AppendDefaultHtml('ImgTypeCommonlyUsed');
                    break;
            }
            RemoveLocalStorage(key);
            return [];
        }
    }

    function UpdateEmoticonHtml(){
        var CommonlyUsedEmoticon = GetLocalStorage('CommonlyUsedEmoticon');
        var HTML = '';
        for (const [key, item] of Object.entries(CommonlyUsedEmoticon)) {
            var Tmp = item.split('_');//.substr(1, (item.length-2))
            var packageId = Tmp[0];
            var emojiId = Tmp[1];
            var _src = EmojiLink_Path + packageId + EmojiLink_OS + emojiId + EmojiLink_Extension;
            var _Img = (location.pathname.includes("/CustomerService/index/"))
                        ? `<div class="Img" datasrc="${_src}" style="background-image: url(${_src})"></div>`
                        : `<img style="width:39px;height:39px;" DataSrc="${_src}" src="${_src}">`;
            HTML += `<li data-img="${item}" data-stkid="${packageId}_${emojiId}">
                ${_Img}
            </li>`;
        }
        $('#EmojiTypeCommonlyUsed>ul').html(HTML);
        AppendDefaultHtml('EmojiTypeCommonlyUsed');
    }

    function UpdateStickerHtml(){
        var CommonlyUsedSticker = GetLocalStorage('CommonlyUsedSticker');
        var HTML = '';
        for (const [key, item] of Object.entries(CommonlyUsedSticker)) {
            var _stkid = item.replace(/(.*?)[_]/g,'');
            var _src = StickerLink_Path+_stkid+StickerLink_File;
            var _Img = (location.pathname.includes("/CustomerService/index/"))
                        ? `<div class="Img" datasrc="${_src}" style="background-image: url(${_src});"></div>`
                        : `<img style="width:75px;height:70px;" datasrc="${_src}" src="${_src}">`;
            HTML += `<li data-stkid="${item}">
                ${_Img}
            </li>`;
        }
        $('#ImgTypeCommonlyUsed>ul').html(HTML);
        AppendDefaultHtml('ImgTypeCommonlyUsed');
    }
    function AppendDefaultHtml(CommonlyUsed){
        var HTML = $('#'+CommonlyUsed+'>ul').html();
        if(location.pathname.includes("/CustomerService/index/")){
            for(var i=0;i<20;i++){
                HTML += `<li data-img="" data-stkid=""><div class="Img" datasrc="" style="background-image: url();"></div></li>`;
            }
        }
        $('#'+CommonlyUsed+'>ul').html(HTML);
    }

    $(function(){
        if($('#EmojiTypeCommonlyUsed>ul')[0]){
            UpdateEmoticonHtml();
        }
        if($('#ImgTypeCommonlyUsed>ul')[0]){
            UpdateStickerHtml();
        }
    });
</script>