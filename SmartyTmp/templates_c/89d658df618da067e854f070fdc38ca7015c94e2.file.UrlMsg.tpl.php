<?php /* Smarty version Smarty3-b7, created on 2021-12-16 14:07:24
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/UrlMsg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139457925161bad79c19c162-31730012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89d658df618da067e854f070fdc38ca7015c94e2' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/UrlMsg.tpl',
      1 => 1639634765,
    ),
  ),
  'nocache_hash' => '139457925161bad79c19c162-31730012',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.cat.php';
?><!DOCTYPE html>
<html>
    <head>
        <title>連結訊息</title>
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'head.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </head>

    <body onselectstart="return false" style="  background-color : #03c754;
                                                background-image : url('<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/LineBG.jpg');
                                                background-repeat: no-repeat;
                                                background-size  : contain;">
        
        
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'footer.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        <script>
            $(function () {
                var ShareMsgInterval = window.setInterval(function () {
                    if($("#data_area").find("#userId").html()){
                        <?php if ($_smarty_tpl->getVariable('Msg')->value){?>
                            if($("#friendFlag").html()==='false'){
                                xajax_CheckFollow($("#userId").html(), '<?php echo $_smarty_tpl->getVariable('__LineAtID')->value;?>
', 'Invite');
                            }else{
                                ShareMsg(<?php echo $_smarty_tpl->getVariable('Msg')->value;?>
, 1, 1);
                            }
                        <?php }elseif($_smarty_tpl->getVariable('Vote')->value){?>
                            xajax_Vote($("#userId").html(), '<?php echo $_smarty_tpl->getVariable('Vote')->value;?>
', $("#displayName").html(), $("#pictureUrl").html());
                        <?php }else{ ?>
                            liff.closeWindow();
                        <?php }?>
                        window.clearInterval(ShareMsgInterval);
                    }
                }, 100);
            });
        </script>
    </body>
</html>