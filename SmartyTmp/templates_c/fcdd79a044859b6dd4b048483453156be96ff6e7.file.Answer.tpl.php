<?php /* Smarty version Smarty3-b7, created on 2022-01-05 14:56:06
         compiled from "/home1/bot.gadclubs.com//library/modules/frontend/view/Answer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187573912261d54106ce81c3-15827792%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcdd79a044859b6dd4b048483453156be96ff6e7' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/frontend/view/Answer.tpl',
      1 => 1614938010,
    ),
  ),
  'nocache_hash' => '187573912261d54106ce81c3-15827792',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.cat.php';
if (!is_callable('smarty_modifier_date_format')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html style="background-color: unset;color: unset;"><!-- #333 -->
    <head>
        <title><?php echo $_smarty_tpl->getVariable('_Title')->value;?>
</title>
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'head.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/AdminLTE.min.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">
    </head>
    <body class="hold-transition login-page" onselectstart="return false" style="">
        <div class="login-box">
            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'alertArea.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <!--<div class="login-logo">
                <b>請作答</b>
            </div>-->
            <div class="login-box-body">
                <form id="dataForm" action="#" onsubmit="return false;">
                    <?php if ($_smarty_tpl->getVariable('UrlMsgType')->value){?>
                        <div class="form-group">
                            <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat(smarty_modifier_cat(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'type/'),$_smarty_tpl->getVariable('UrlMsgType')->value),'.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                        </div>
                    <?php }?>
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="btn btn-primary btn-block btn-flat <?php if ($_smarty_tpl->getVariable('CheckAnswerHide')->value){?>hide<?php }?>" onclick="CheckAnswer();">送出</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'footer.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        <script>
            function CheckAnswer(){
                if($('[name="fields[answer]"]').val()){
                    SendMsg([{
                        "type" : "image",
                        "originalContentUrl" : '<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/postback.png?data=' + encodeURI('BOT(_)kBOTClass(_)'+$('[name="fields[answer]"]').val()),
                        "previewImageUrl" : '<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/postback.png?data=' + encodeURI('BOT(_)kBOTClass(_)'+$('[name="fields[answer]"]').val())
                    }], 1, 1);
                }else{
                    alert('請作答');
                }
            }
        </script>
    </body>
</html>