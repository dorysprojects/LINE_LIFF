<?php /* Smarty version Smarty3-b7, created on 2021-05-12 13:57:57
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/ShowMsg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1773298071609b6e659195d6-41571791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7bf983a5a9a13d17bddbcb2094703e73668cbbf' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/ShowMsg.tpl',
      1 => 1620712838,
    ),
  ),
  'nocache_hash' => '1773298071609b6e659195d6-41571791',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.cat.php';
?><!DOCTYPE html>
<html>
    <head>
        <title><?php if ($_smarty_tpl->getVariable('ErrorTitle')->value){?><?php echo $_smarty_tpl->getVariable('ErrorTitle')->value;?>
<?php }else{ ?>錯誤訊息<?php }?></title>
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'head.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        <style type="text/css">
            body{
                    display: block;
                    background-color: #efefef;
            }

            .ErrorBox{
                    width: 75%;
                    max-width: 300px;
                    background-color: #fff;
                    margin: 0px auto;
                    text-align: center;
                    padding: 100px 25px 50px;
                    box-shadow: 0px 0px 15px #ddd;
                    border-top: 6px solid <?php echo $_smarty_tpl->getVariable('ErrorColor')->value;?>
;
            }

            .ErrorBoxIcon{
                    margin-top: 15vh;
                    margin: 10vh auto -80px;
                    color: #fff;
                    width: 125px;
                    height: 125px;
                    font-size: 50px;
                    line-height: 125px;
                    display: block;
                    background-color: <?php echo $_smarty_tpl->getVariable('ErrorColor')->value;?>
;
                    border-radius: 50%;
                    position: relative;
            }

            .ErrorBoxIcon:before{
                    display: block;
                    width: 100%;
                    height: 100%;
                    text-align: center;
            }

            .ErrorBoxIcon.fa-calendar-times{
                    font-size: 70px;
            }
            .ErrorBoxIcon.fa-times{
                    font-size: 80px;
            }
            .ErrorBoxIcon.fa-users,
            .ErrorBoxIcon.fa-exclamation{
                    font-size: 65px;
            }
            .ErrorBox>h4{
                    font-size: 18px;
                    line-height: 26px;
            }

    </style>
    </head>

    <body onselectstart="return false" style="">
        
        <?php if ($_smarty_tpl->getVariable('ErrorType')->value){?>
            <div class="ErrorBox" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);border-color: <?php echo $_smarty_tpl->getVariable('BGcolor')->value;?>
;background-color: <?php echo $_smarty_tpl->getVariable('BGcolor')->value;?>
;color: #fff;padding: 20px;border-radius: 15px;">
                <img style="width: 100%;margin: 20px 0px;" src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/flex_alert/<?php echo $_smarty_tpl->getVariable('ErrorType')->value;?>
.png">
                <?php if ($_smarty_tpl->getVariable('ErrorSubContent')->value){?>
                    <h4 style="font-size: 22px;font-weight: bold;margin-top: 20px;margin-bottom: 20px;"><?php echo $_smarty_tpl->getVariable('ErrorContent')->value;?>
</h4>
                    <hr style="border-color: #fff;position: absolute;width: 100%;margin-left: -20px;margin-top: -10px;">
                    <h4 style="font-size: 16px;"><?php echo $_smarty_tpl->getVariable('ErrorSubContent')->value;?>
</h4>
                <?php }else{ ?>
                    <hr style="border-color: #fff;position: absolute;width: 100%;margin-left: -20px;">
                    <h3 style="font-weight: bold;margin-top: 20px;"><?php echo $_smarty_tpl->getVariable('ErrorContent')->value;?>
</h3>
                <?php }?>
            </div>
        <?php }else{ ?>
            <i class="ErrorBoxIcon fa fa-<?php echo $_smarty_tpl->getVariable('ErrorIcon')->value;?>
"></i>
            <div class="ErrorBox">
                <h4><?php echo $_smarty_tpl->getVariable('ErrorText')->value;?>
</h4>
                <?php if ($_smarty_tpl->getVariable('AddFriendBtn')->value){?>
                    <a id="AddFriendBtn" class="btn btn-success" href="https://line.me/R/ti/p/@<?php echo $_smarty_tpl->getVariable('__LineAtID')->value;?>
">加入好友</a>
                <?php }?>
            </div>
        <?php }?>
        
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'footer.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        
        <?php if ($_smarty_tpl->getVariable('CheckFollow')->value){?>
            <script>
                $(function(){
                    setInterval(function(){
                        xajax_CheckFollow('<?php echo $_smarty_tpl->getVariable('userId')->value;?>
', '<?php echo $_smarty_tpl->getVariable('__LineAtID')->value;?>
', '<?php echo $_smarty_tpl->getVariable('AddAction')->value;?>
');
                    },1000);
                });
            </script>
        <?php }?>
        
        <?php echo $_smarty_tpl->getVariable('xajax_js')->value;?>

    </body>
</html>