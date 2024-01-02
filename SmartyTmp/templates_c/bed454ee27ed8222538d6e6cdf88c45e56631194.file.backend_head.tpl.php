<?php /* Smarty version Smarty3-b7, created on 2022-01-04 16:56:59
         compiled from "/home1/bot.gadclubs.com//library/modules/_public/view/backend_head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214526292661d40bdb29a613-61159059%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bed454ee27ed8222538d6e6cdf88c45e56631194' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/_public/view/backend_head.tpl',
      1 => 1631344485,
    ),
  ),
  'nocache_hash' => '214526292661d40bdb29a613-61159059',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.cat.php';
if (!is_callable('smarty_modifier_date_format')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.date_format.php';
?>    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="想到什麼，就做什麼">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <?php $_smarty_tpl->assign("_backend_",smarty_modifier_cat($_smarty_tpl->getVariable('__DOMAIN')->value,'_backend'),null,null);?>
    <?php $_smarty_tpl->assign("_backend_value",$_SESSION[$_smarty_tpl->getVariable('_backend_')->value],null,null);?>
    <?php if ($_smarty_tpl->getVariable('_backend_value')->value){?>
        <?php $_smarty_tpl->assign("_authority",$_smarty_tpl->getVariable('_backend_value')->value['subject']['authority'],null,null);?>
        <?php if ($_smarty_tpl->getVariable('_backend_value')->value['subject']['img0']){?>
            <link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('_backend_value')->value['subject']['img0'];?>
">
        <?php }?>
    <?php }?>
    
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/morris.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/jquery-jvectormap.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/AdminLTE.min.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/_all-skins.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/daterangepicker.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/bootstrap3-wysihtml5.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/blackUI/blackUI.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/css/app.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">
    
    <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/jquery-3.3.1.min.js"></script>
    <script type='text/javascript' src='<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/blackUI/blackUI.js'></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.js"></script>
    <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/bootstrap.min.js"></script>
    <script src='<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/form.js'></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    
    <!--<div id="ckeditortest"></div>
    <script>ckEditorInstall('ckeditortest');</script>-->
    <script>
        $('#dataTable').addClass('table-striped').hide();
        function ckEditorInstall(id){
            ClassicEditor.create(document.querySelector('#'+id))
                         .then(editor=>{ /*console.log(editor);*/ })
                         .catch(error=>{ /*console.error(error);*/ });
        }
        $(function () {
            $('#dataTable').DataTable();
            $('#dataTable').show();
        });
    </script>