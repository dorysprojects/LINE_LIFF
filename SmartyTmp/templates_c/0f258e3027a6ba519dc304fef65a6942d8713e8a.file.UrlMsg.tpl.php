<?php /* Smarty version Smarty3-b7, created on 2022-08-17 18:07:22
         compiled from "/home1/bot.gadclubs.com/library/modules/frontend/view/UrlMsg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116333354162fcbdda3d2830-63875676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f258e3027a6ba519dc304fef65a6942d8713e8a' => 
    array (
      0 => '/home1/bot.gadclubs.com/library/modules/frontend/view/UrlMsg.tpl',
      1 => 1645425513,
    ),
  ),
  'nocache_hash' => '116333354162fcbdda3d2830-63875676',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.cat.php';
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
                        <?php }elseif($_smarty_tpl->getVariable('CloseFlag')->value){?>
                            liff.closeWindow();
                        <?php }else{ ?>
                            xajax_Process($("#userId").html(), '<?php echo $_smarty_tpl->getVariable('UrlMsgId')->value;?>
', '<?php echo $_smarty_tpl->getVariable('UrlMsgAction')->value;?>
', '<?php echo $_smarty_tpl->getVariable('UrlMsgUserId')->value;?>
', '<?php echo $_smarty_tpl->getVariable('UrlMsgMode')->value;?>
');
                        <?php }?>
                        window.clearInterval(ShareMsgInterval);
                    }
                }, 100);
            });
        </script>
    </body>
</html>