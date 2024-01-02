<?php /* Smarty version Smarty3-b7, created on 2021-02-03 15:04:23
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/CardPrev.tpl" */ ?>
<?php /*%%SmartyHeaderCode:251081668601a4af7d8c6a6-84894121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d175069e1ed6921ab2a7c7ba07c5e5d4cf32e9b' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/CardPrev.tpl',
      1 => 1612335863,
    ),
  ),
  'nocache_hash' => '251081668601a4af7d8c6a6-84894121',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php  $_smarty_tpl->tpl_vars['actionitem'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['actionkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('CardList')->value['subject']['actions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['actionitem']->key => $_smarty_tpl->tpl_vars['actionitem']->value){
 $_smarty_tpl->tpl_vars['actionkey']->value = $_smarty_tpl->tpl_vars['actionitem']->key;
?>
            <span style="position: absolute;font-size: <?php if ($_smarty_tpl->getVariable('actionitem')->value['area']['width']>$_smarty_tpl->getVariable('actionitem')->value['area']['height']){?><?php echo $_smarty_tpl->getVariable('actionitem')->value['area']['height'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('actionitem')->value['area']['width'];?>
<?php }?>px;color:<?php echo $_smarty_tpl->getVariable('actionitem')->value['color'];?>
;top:<?php echo $_smarty_tpl->getVariable('actionitem')->value['area']['y'];?>
px;left:<?php echo $_smarty_tpl->getVariable('actionitem')->value['area']['x'];?>
px;"><?php echo $_smarty_tpl->getVariable('actionitem')->value['text'];?>
</span>
        <?php }} ?>
        <img id="ShowPre" src="/CustomStickers/upload/image/<?php echo $_smarty_tpl->getVariable('CardList')->value['subject']['img0'];?>
">
    </body>
</html>