<?php /* Smarty version Smarty3-b7, created on 2022-02-15 16:43:58
         compiled from "/home1/bot.gadclubs.com//library/modules/_public/view/type/uploadImageA.tpl" */ ?>
<?php /*%%SmartyHeaderCode:806465008620b67ce0a64c1-47838832%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '788ec6094a96c33ab4c20e28a7924ca6535aa827' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/_public/view/type/uploadImageA.tpl',
      1 => 1616486399,
    ),
  ),
  'nocache_hash' => '806465008620b67ce0a64c1-47838832',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('item')->value['nolabel']!='on'){?>
    <?php if ($_smarty_tpl->getVariable('item')->value['required']=='on'){?>*<?php }?>
    <label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
</label></br>
<?php }?>
<img style="max-height:200px;max-width:200px;<?php if (!$_smarty_tpl->getVariable('item')->value['value']){?>display: none;<?php }?>" class="img-thumbnail" id="previews_<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" src="<?php if ($_smarty_tpl->getVariable('item')->value['value']){?><?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('item')->value['value'];?>
<?php }?>" alt="上傳圖片" />
<label class="btn btn-info" <?php if ($_smarty_tpl->getVariable('item')->value['disabled']){?>disabled<?php }?>>
    <input type="hidden" name="fields[subject][<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
]" class="<?php echo $_smarty_tpl->getVariable('item')->value['class'];?>
" value="<?php echo $_smarty_tpl->getVariable('item')->value['value'];?>
">
    <input style="display:none;" id="FILES_<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" name="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" <?php if ($_smarty_tpl->getVariable('item')->value['disabled']){?>disabled<?php }?> onchange="if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) { $('#previews_<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
').attr('src', e.target.result).show(); };
                reader.readAsDataURL(this.files[0]);
            }else{
                $('#previews_<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
').attr('src', '').hide();
            }" type="file" class="form-control">
    <i class="fa fa-photo"></i><?php if ($_smarty_tpl->getVariable('item')->value['value']){?>更換圖片<?php }else{ ?>上傳圖片<?php }?>
</label>