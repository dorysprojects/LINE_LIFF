<?php
    /*
     * \init.php
     * \index.php
     * \LineCrontab.php
     * \config\LineFakeWebhook.php
     * \library\core\func\kPrewPic.php
     *
     * \library\plugin\analytics\src\analyze.js
     * \library\plugin\flex\main.js
     */
    define('__DOMAIN', $_SERVER['SERVER_NAME'] ? $_SERVER['SERVER_NAME'] : explode('/', explode('/home1/', __DIR__)[1])[0]);
    if(!defined('__ROOT')){
        if($_SERVER['DOCUMENT_ROOT']){
            define('__ROOT', (substr($_SERVER['DOCUMENT_ROOT'], -1)==='/') ? $_SERVER['DOCUMENT_ROOT'] : $_SERVER['DOCUMENT_ROOT'].'/');
        }else{
            define('__ROOT', '/home1/'.__DOMAIN.'/');
        }
    }
    include_once(__ROOT . '/init.php');

    $kHTML = new kHTML();
    $LIFF = new kLineLIFF();
    $TPL = new Smarty();//樣板物件
    $TPL->template_dir = __SmartyTmp . "/templates/";
    $TPL->compile_dir = __SmartyTmp . "/templates_c/";
    $TPL->config_dir = __SmartyTmp . "/configs/";
    $TPL->cache_dir = __SmartyTmp . "/cache/";
    $TPL->left_delimiter = '{#';
    $TPL->right_delimiter = '#}';

    $_From = kCore_get('FrontEndAndBackEnd', $_SERVER['PATH_TRANSLATED']);
    $_Module = !empty($_From) ? kCore_get($_From, $_SERVER['PATH_TRANSLATED']) : '';
    $_Action = ($_From=='backend') ? kCore_get($_Module) : '';
    if(!empty($_From)){
        $redirectUrl = $_SESSION[__DOMAIN.'_redirect'];
        switch ($_From) {
            case 'backend':
                $_FromFuncPath = __BackendFunc;
                $_FromResPath = __BackendRes;
                $_FromViewPath = __BackendView;
                break;
            case 'frontend':
                $_FromFuncPath = __FrontendFunc;
                $_FromResPath = __FrontendRes;
                $_FromViewPath = __FrontendView;
                break;
        }
        $TPL->assign('_From', $_From);
        $TPL->assign('__DOMAIN', __DOMAIN);
        $TPL->assign('__CustomStickers', __CustomStickers);
        $TPL->assign('__CustomStickers_Web', __CustomStickers_Web);
        $TPL->assign('_Module', $_Module);
        $TPL->assign('__TYPE', kCore_get('type'));
        $TPL->assign('__CONFIG', __CONFIG);
        $TPL->assign('__RES', __RES);
        $TPL->assign('__RES_Web', __RES_Web);
        $TPL->assign('__PLUGIN', __PLUGIN);
        $TPL->assign('__PLUGIN_Web', __PLUGIN_Web);
        $TPL->assign('__ROOT_UPLOAD', __ROOT_UPLOAD);
        $TPL->assign('__WEB_UPLOAD', __WEB_UPLOAD);
        $TPL->assign('__LIBRARY', __LIBRARY);
        $TPL->assign('__PublicFunc', __PublicFunc);
        $TPL->assign('__PublicView', __PublicView);
        $TPL->assign('__FrontendFunc', __FrontendFunc);
        $TPL->assign('__FrontendRes', __FrontendRes);
        $TPL->assign('__FrontendView', __FrontendView);
        $TPL->assign('__BackendFunc', __BackendFunc);
        $TPL->assign('__BackendRes', __BackendRes);
        $TPL->assign('__BackendView', __BackendView);
        $TPL->assign('_FromFuncPath', $_FromFuncPath);
        $TPL->assign('_FromResPath', $_FromResPath);
        $TPL->assign('_FromViewPath', $_FromViewPath);

        $TPL->assign('__BotInfo', __BotInfo);
        $TPL->assign('_LineAtPic', _LineAtPic);
        $TPL->assign('_LineAtName', _LineAtName);
        $TPL->assign('__LineAtID', __LineAtID);
        if(defined('__Parameter') && !empty(__Parameter)){
            $TPL->assign('__Parameter', __Parameter);
            foreach (__Parameter as $__ParameterKey => $__ParameterValue) {
                if(defined($__ParameterValue)){
                    $TPL->assign($__ParameterValue, constant($__ParameterValue));
                }
            }
        }
        switch ($_From) {
            case 'backend':
                define('_Module', $_Module);
                //加入xajax
                include_once __PublicFunc.'xajax.php';
                if(!empty($xajax)){
                    $TPL->assign('xajax_js', $xajax->getJavascript());
                }
                $TPL->assign('_Action', $_Action);
                switch ($_Module) {
                    case 'SystemMessage':
                        $_ActionName = $_Action;
                        $_Action = ($_Action=='process') ? $_Action : 'index';
                        break;
                    default:
                        $_Action = !empty($_Action) ? $_Action : 'index';
                        $_ActionName = $_Action;
                        break;
                }
                define('_Action', $_Action);
                $TPL->assign('_ActionName', $_ActionName);
                if($_Module!=='System' && $_Action!=='process'){
                    if(empty($_SESSION[__DOMAIN.'_backend'])){
                        $_SESSION[__DOMAIN.'_redirect'] = __CustomStickers_Web . $_SERVER['REQUEST_URI'];
                        header("Location:" . __CustomStickers_Web . '/be/System/login');
                    }else if(!kCore_CheckAuthority($_Module, $_Action)){
                        header("Location:" . __CustomStickers_Web . '/be/System/PermissionDenied');
                    }
                }
                if(file_exists($_FromFuncPath.$_Module."/".$_Action.".php")){
                    include_once($_FromFuncPath."init.php");
                    if(file_exists($_FromFuncPath.$_Module."/init.php")){
                        include_once($_FromFuncPath.$_Module."/init.php");
                    }
                    $TPL->assign('js', $kHTML->getJsFile($_FromResPath.'/js.php'));
                    include_once($_FromFuncPath.$_Module."/".$_Action.".php");
                    switch ($_Module) {
                        case 'SystemMessage':
                            $_TplView = ($_Action=='process') ? '' : 'add';
                            break;
                        default:
                            $_TplView = ($_Action=='edit') ? 'add' : $_Action;
                            break;
                    }
                    if(!$TPL->displayFlag){
                        if(file_exists($_FromViewPath.$_Module."/".$_TplView.".tpl")){
                            $TPL->display($_FromViewPath.$_Module."/".$_TplView.".tpl");
                        }else if(file_exists($_FromViewPath.$_TplView.".tpl")){
                            $TPL->display($_FromViewPath.$_TplView.".tpl");
                        }
                    }
                }else{
                    header("Location:" . __CustomStickers_Web . '/be/System/PageNotFound');
                }
                break;
            case 'frontend':
                $_ModuleTmp = explode('&', $_Module);
                $_ModuleTmp = explode('?', $_ModuleTmp[0]);
                $_Module = !empty(kCore_get('page')) ? kCore_get('page') : $_ModuleTmp[0];
                define('_Module', $_Module);
                $TPL->assign('_Module', $_Module);
                if(file_exists($_FromFuncPath.$_Module.".php")){
                    $IncludeXajaxFlag = false;
                    include_once($_FromResPath."/sticker_common.php");
                    if($IncludeXajaxFlag){
                        //加入xajax
                        include_once $_FromFuncPath.'xajax.php';
                        if(!empty($xajax)){
                            $TPL->assign('xajax_js', $xajax->getJavascript());
                        }
                    }
                    include_once($_FromFuncPath.$_Module.".php");
                    if(!$TPL->displayFlag){
                        if(file_exists($_FromViewPath.$_Module.".tpl")){
                            $TPL->display($_FromViewPath.$_Module.".tpl");
                        }
                    }
                }else{
                    header("Location:" . __CustomStickers_Web . '/be/System/PageNotFound');
                }
                break;
        }
    }