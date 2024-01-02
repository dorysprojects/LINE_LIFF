<?php /* Smarty version Smarty3-b7, created on 2021-12-16 11:14:04
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view//UrlInfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77960803261baaefccce8a2-97546784%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bf4aeeb3656a76c7895bd232db506f74ff589bf' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view//UrlInfo.tpl',
      1 => 1639622830,
    ),
  ),
  'nocache_hash' => '77960803261baaefccce8a2-97546784',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<style>
    .floatInfo {
        position: fixed;
        z-index: 2;
        top: 50%;
        right: 15px;
        margin-top: -26px;
        width: 50px;
        padding: 5px;
        background: #3C9CDB;
        color: #fff;
        text-align: center;
        cursor: pointer;
        text-shadow: 0 1px 0 #175f8e;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
    }
    .floatInfo span {
        font-size: 25px;
    }
    #UrlInfo .alert-info {
        color: #31708f !important;
        background-color: #d9edf7 !important;
        border-color: #bce8f1 !important;
    }
</style>
<div class="floatInfo" data-toggle="modal" data-target="#UrlInfo" title="連結說明">
    <span class="fa fa-info-circle fa-fw"></span>連結說明
</div>
<div class="modal fade UrlInfo" id="UrlInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span class="fa fa-remove"></span>
                </button>
                <h4 class="modal-title" id="myModalLabel">連結說明</h4>
            </div>
            <div class="modal-body" style="-webkit-user-select:text;-moz-user-select:text;-o-user-select:text;user-select:text;padding-bottom: 0px;">
                <div class="alert alert-info">
                    <ul class="fa-ul">
                        <li>
                            <i class="fa fa-info-circle fa-lg fa-li"></i>
                            <span class="remark">打電話(<font color="#FF0000">tel:【電話號碼】</font>)<br>範例:<font color="#FF0000">tel:0987654321</font></span>
                        </li>
                    </ul>
                </div>
                <div class="alert alert-info">
                    <ul class="fa-ul">
                        <li>
                            <i class="fa fa-info-circle fa-lg fa-li"></i>
                            <span class="remark">email(<font color="#FF0000">mailto:【信箱】</font>)<br>範例:<font color="#FF0000">mailto:test@example.com</font></span>
                        </li>
                    </ul>
                </div>
                <div class="alert alert-info">
                    <ul class="fa-ul">
                        <li>
                            <i class="fa fa-info-circle fa-lg fa-li"></i>
                            <span class="remark">分享給Line好友(<font color="#FF0000">https://line.me/R/msg/text/?【分享給好友的文字】</font>)<br>範例:<font color="#FF0000">https://line.me/R/msg/text/?好康分享%0D%0Ahttps://www.google.com</font></span>
                        </li>
                    </ul>
                </div>
                <div class="alert alert-info">
                    <ul class="fa-ul">
                        <li>
                            <i class="fa fa-info-circle fa-lg fa-li"></i>
                            <span class="remark">前往Line@(<font color="#FF0000">https://line.me/R/ti/p/【Line@ID】</font>)<br>範例:<font color="#FF0000">https://line.me/R/ti/p/@<?php echo $_smarty_tpl->getVariable('__LineAtID')->value;?>
</font></span>
                        </li>
                    </ul>
                </div>
                <div class="alert alert-info">
                    <ul class="fa-ul">
                        <li>
                            <i class="fa fa-info-circle fa-lg fa-li"></i>
                            <span class="remark">前往Line@並帶上文字(<font color="#FF0000">https://line.me/R/oaMessage/【Line@ID】/?【要帶上的文字】</font>)<br>範例:<font color="#FF0000">https://line.me/R/oaMessage/@<?php echo $_smarty_tpl->getVariable('__LineAtID')->value;?>
/?好康分享%0D%0Ahttps://www.google.com</font></span>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">關閉</button>
            </div>
        </div>
    </div>
</div>