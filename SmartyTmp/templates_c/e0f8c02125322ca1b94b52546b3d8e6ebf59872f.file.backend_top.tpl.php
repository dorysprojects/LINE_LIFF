<?php /* Smarty version Smarty3-b7, created on 2021-02-09 09:32:29
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/backend_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2449490646021e62d0ce180-10190932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0f8c02125322ca1b94b52546b3d8e6ebf59872f' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/backend_top.tpl',
      1 => 1612777316,
    ),
  ),
  'nocache_hash' => '2449490646021e62d0ce180-10190932',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.cat.php';
?><header class="main-header">
    <?php $_smarty_tpl->assign("_backend_",smarty_modifier_cat($_smarty_tpl->getVariable('__DOMAIN')->value,'_backend'),null,null);?>
    <?php $_smarty_tpl->assign("_backend_value",$_SESSION[$_smarty_tpl->getVariable('_backend_')->value],null,null);?>
    <?php $_smarty_tpl->assign("_authority",$_smarty_tpl->getVariable('_backend_value')->value['subject']['authority'],null,null);?>
    <a href="?BackEnd/Home" class="logo">
        <span class="logo-mini"><i class="fa fa-home"></i></span>
        <span class="logo-lg"><b><i class="fa fa-home"></i> 後台管理</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img <?php if ($_smarty_tpl->getVariable('_backend_value')->value['subject']['img0']){?>src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('_backend_value')->value['subject']['img0'];?>
"<?php }else{ ?>style="display: none;"<?php }?> class="user-image" alt="<?php echo $_smarty_tpl->getVariable('Account')->value['subject']['FirstName'];?>
">
                        <span class="hidden-xs"><?php echo $_smarty_tpl->getVariable('_backend_value')->value['propertyA'];?>
</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header" style="<?php if (!$_smarty_tpl->getVariable('_backend_value')->value['subject']['img0']){?>height: 85px;<?php }?>">
                            <img <?php if ($_smarty_tpl->getVariable('_backend_value')->value['subject']['img0']){?>src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/image/<?php echo $_smarty_tpl->getVariable('_backend_value')->value['subject']['img0'];?>
"<?php }else{ ?>style="display: none;"<?php }?> class="img-circle" alt="<?php echo $_smarty_tpl->getVariable('_backend_value')->value['propertyA'];?>
">
                            <p><?php echo $_smarty_tpl->getVariable('_backend_value')->value['propertyA'];?>
</p>
                        </li>
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    追蹤<br/><?php echo $_smarty_tpl->getVariable('FollowStatusList')->value['follow'];?>

                                </div>
                                <div class="col-xs-4 text-center">
                                    封鎖<br/><?php echo $_smarty_tpl->getVariable('FollowStatusList')->value['block'];?>

                                </div>
                                <div class="col-xs-4 text-center">
                                    總人數<br/><?php echo $_smarty_tpl->getVariable('FollowStatusList')->value['total'];?>

                                </div>
                            </div>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="?BackEnd/Home" class="btn btn-default btn-flat">帳戶資訊</a>
                            </div>
                            <div class="pull-right">
                                <a href="?BackEnd/System/process/ps/logout" class="btn btn-default btn-flat">登出</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>