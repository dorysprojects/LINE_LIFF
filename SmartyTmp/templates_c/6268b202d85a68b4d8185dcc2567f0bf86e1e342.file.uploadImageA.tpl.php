<?php /* Smarty version Smarty3-b7, created on 2021-05-11 11:49:03
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/uploadImageA.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9019096796099feaf588914-46226751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6268b202d85a68b4d8185dcc2567f0bf86e1e342' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/uploadImageA.tpl',
      1 => 1616486399,
    ),
  ),
  'nocache_hash' => '9019096796099feaf588914-46226751',
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