<?php /* Smarty version Smarty3-b7, created on 2020-09-28 13:54:56
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/backend_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11745161525f717ab00c34b5-14186758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5da53bf3f40f774da00e4bab0fd418968e0679d' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/backend_header.tpl',
      1 => 1601272482,
    ),
  ),
  'nocache_hash' => '11745161525f717ab00c34b5-14186758',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<header class="main-header">
    <!-- Logo -->
    <a href="/Console/App/Welcome" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/upload/<<?php ?>?=$Account['PICTURE']?<??>>" class="user-image" alt="<<?php ?>?=$Account['FIRST_NAME']?<??>>">
                        <span class="hidden-xs"><<?php ?>?=$Account['FIRST_NAME']?<??>></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header hide">
                            <img src="/upload/<<?php ?>?=$Account['PICTURE']?<??>>" class="img-circle" alt="<<?php ?>?=$Account['FIRST_NAME']?<??>>">

                            <p>
                                <<?php ?>?=$Account['FIRST_NAME']?<??>> <<?php ?>?=$Account['LAST_NAME']?<??>>
                                <small><<?php ?>?=$Account['Group']['GROUP_NAME']?<??>></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body hide">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/Console/App/Profile" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="/App/Console/Logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>