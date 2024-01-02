<?php /* Smarty version Smarty3-b7, created on 2022-01-05 10:51:52
         compiled from "/home1/bot.gadclubs.com//library/modules/_public/view/project_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144742390061d507c84bbee2-47690726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4705d4d39e93f6c977bf88e5c09f712b7c9450ce' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/_public/view/project_details.tpl',
      1 => 1641346602,
    ),
  ),
  'nocache_hash' => '144742390061d507c84bbee2-47690726',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="project_details" class="press_background" style="display: block;">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="press_button_area" style="margin: 15%;position: unset;transform: none;width: auto;">
                    <div id="stickerPage" class="press_button" project="sticker" onclick="SelectProject($(this));">手畫貼圖</div>
                    <div id="messagePage" class="press_button" project="message" onclick="SelectProject($(this));">訊息DIY</div>
                    <div id="notePage" class="press_button" project="note" onclick="SelectProject($(this));">筆記本</div>
                    <div id="placePage" class="press_button" project="place" onclick="SelectProject($(this));">行程規劃</div>
                    <div id="SetNotify" style="display: none;" class="press_button" data-flag="off" onclick="xajax_AddNotify($(this).attr('data-type'), $(this).attr('data-userId'), $(this).attr('data-ID'));">設定通知</div>

                    <div id="CloseBtn" class="press_button" onclick="$('#project_details').hide();">關閉</div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="press_button_area" style="margin: 15%;position: unset;transform: none;width: auto;">
                    <a target="_blank" href="<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/be/Home"><div class="press_button">API後台</div></a>
                    <a target="_blank" href="<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/ft/flex-simulator"><div class="press_button">Flex訊息模擬器</div></a>
                    <a target="_blank" href="<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/ft/LotteryGame"><div class="press_button">抽獎</div></a>
                    <a target="_blank" href="<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/ft/SuperRatio"><div class="press_button">超級比一比</div></a>        

                    <div id="CloseBtn" class="press_button" onclick="$('#project_details').hide();">關閉</div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="press_button_area" style="margin: 15%;position: unset;transform: none;width: auto;">
                    <a target="_blank" href="<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/ft/LotteryHistory"><div class="press_button">樂透分析</div></a>
                    <a target="_blank" href="<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/ft/Call"><div class="press_button">即時聊天室</div></a>
                    <a target="_blank" href="<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/ft/GrabTickets"><div class="press_button">搶票系統</div></a>
                    <a target="_blank" href="<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/ft/analytics"><div class="press_button">聊天分析</div></a>

                    <div id="CloseBtn" class="press_button" onclick="$('#project_details').hide();">關閉</div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<script>
    $(function(){
        var swiper = new Swiper('.swiper-container', {
            //slidesPerView: 1,
            //loop: true,
            autoHeight: true,
            paginationClickable: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                //type: "fraction",
                //dynamicBullets: true,
            },
            /*navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },*/
        });
        <?php if ($_smarty_tpl->getVariable('userId')->value){?>
            $('#project_details').hide();
        <?php }?>
        $('.press_button_area>#CloseBtn').hide();
    });
</script>