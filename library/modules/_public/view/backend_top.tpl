<header class="main-header">
    {#assign var="_backend_" value=$__DOMAIN|cat:'_backend'#}
    {#assign var="_backend_value" value=$smarty.session.$_backend_#}
    {#assign var="_authority" value=$_backend_value.subject.authority#}
    <a href="/be/Home" class="logo">
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
                        <img {#if $_backend_value.subject.img0#}src="{#$__WEB_UPLOAD#}/image/{#$_backend_value.subject.img0#}"{#else#}style="display: none;"{#/if#} class="user-image" alt="{#$Account.subject.FirstName#}">
                        <span class="hidden-xs">{#$_backend_value.propertyA#}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header" style="{#if !$_backend_value.subject.img0#}height: 85px;{#/if#}">
                            <img {#if $_backend_value.subject.img0#}src="{#$__WEB_UPLOAD#}/image/{#$_backend_value.subject.img0#}"{#else#}style="display: none;"{#/if#} class="img-circle" alt="{#$_backend_value.propertyA#}">
                            <p>{#$_backend_value.propertyA#}</p>
                        </li>
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    追蹤<br/>{#$FollowStatusList.follow#}
                                </div>
                                <div class="col-xs-4 text-center">
                                    封鎖<br/>{#$FollowStatusList.block#}
                                </div>
                                <div class="col-xs-4 text-center">
                                    總人數<br/>{#$FollowStatusList.total#}
                                </div>
                            </div>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/be/Home" class="btn btn-default btn-flat">帳戶資訊</a>
                            </div>
                            <div class="pull-right">
                                <a href="/be/System/process/ps/logout" class="btn btn-default btn-flat">登出</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>