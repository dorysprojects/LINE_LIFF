<?php /* Smarty version Smarty3-b7, created on 2023-03-15 10:42:09
         compiled from "/home1/bot.lineapie.tw/library/modules/_public/view/type/imagemapImg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12795631526411308198a973-05270922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdcd99d1539460798abaeca03f219d6b473386e4' => 
    array (
      0 => '/home1/bot.lineapie.tw/library/modules/_public/view/type/imagemapImg.tpl',
      1 => 1612777752,
    ),
  ),
  'nocache_hash' => '12795631526411308198a973-05270922',
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
" onchange="init_inputImagemapImg(this, '<?php echo $_smarty_tpl->getVariable('_Module')->value;?>
');" type="file" class="form-control">
    <i class="fa fa-photo"></i><?php if ($_smarty_tpl->getVariable('item')->value['img0']){?>更換圖片<?php }else{ ?>上傳圖片<?php }?>
</label>