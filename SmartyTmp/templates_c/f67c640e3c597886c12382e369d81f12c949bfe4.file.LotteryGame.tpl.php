<?php /* Smarty version Smarty3-b7, created on 2022-01-05 09:50:47
         compiled from "/home1/bot.gadclubs.com//library/modules/frontend/view/LotteryGame.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34957371361d4f9773280a3-77136840%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f67c640e3c597886c12382e369d81f12c949bfe4' => 
    array (
      0 => '/home1/bot.gadclubs.com//library/modules/frontend/view/LotteryGame.tpl',
      1 => 1641346869,
    ),
  ),
  'nocache_hash' => '34957371361d4f9773280a3-77136840',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="想到什麼，就做什麼">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <title>抽獎</title>
        <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/AdminLTE.min.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/font-awesome.min.css" rel="stylesheet">
        
        
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/jquery-3.3.1.min.js"></script>
        <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.css">
        
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.js"></script>
        <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/signaturepad/vconsole.min.js"></script>
        <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/dist/adminlte.min.js"></script>
    </head>
    <style>
        .content {
            padding: 0px;
        }
        body {
            background-color: #5b5b5b;
        }
        #top, #bottom , #canvas, .MachineBody, #BottomChild, #BottomChild>div {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        #BtnList {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
        }
        #BtnList>.btn {
            margin: 0px 20px;
            margin-top: 20px;
            width: -webkit-fill-available;
        }
    </style>
    <?php if ($_smarty_tpl->getVariable('LotteryType')->value){?><link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Lottery/<?php echo $_smarty_tpl->getVariable('LotteryType')->value;?>
/style.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
"><?php }?>
    
    <body onselectstart="return false">
        <div class="wrapper1">
            <div class="content-wrapper1">
                <section class="content">
                    <div class="row">
                        <?php if ($_smarty_tpl->getVariable('LotteryType')->value=='Slots'){?>
                            <div class="col-md-12">
                                <div class="MachineBody">
                                    <div class="MachineHeader">點擊按鈕抽獎</div>
                                    <div class="MachineWindow">
                                        <div class="MachineContainer">
                                            <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (3 - (1) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 3+1 - 1 : 1-(3)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 1, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                                                <div id="casino<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="slotMachine">
                                                    <?php $_smarty_tpl->tpl_vars['J'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['J']->step = (9 - (1) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['J']->total = (int)ceil(($_smarty_tpl->tpl_vars['J']->step > 0 ? 9+1 - 1 : 1-(9)+1)/abs($_smarty_tpl->tpl_vars['J']->step));
if ($_smarty_tpl->tpl_vars['J']->total > 0){
for ($_smarty_tpl->tpl_vars['J']->value = 1, $_smarty_tpl->tpl_vars['J']->iteration = 1;$_smarty_tpl->tpl_vars['J']->iteration <= $_smarty_tpl->tpl_vars['J']->total;$_smarty_tpl->tpl_vars['J']->value += $_smarty_tpl->tpl_vars['J']->step, $_smarty_tpl->tpl_vars['J']->iteration++){
$_smarty_tpl->tpl_vars['J']->first = $_smarty_tpl->tpl_vars['J']->iteration == 1;$_smarty_tpl->tpl_vars['J']->last = $_smarty_tpl->tpl_vars['J']->iteration == $_smarty_tpl->tpl_vars['J']->total;?>
                                                        <div class="slotItem"><?php echo $_smarty_tpl->getVariable('J')->value;?>
</div>
                                                    <?php }} ?>
                                                </div>
                                            <?php }} ?>
                                            <div class="fence1"></div>
                                            <div class="fence2"></div>
                                        </div>
                                    </div>
                                    <div class="MachineHandler">
                                        <div class="stick2"></div>
                                        <div class="stick"></div>
                                        <div class="ball" onclick="ShuffleAll();"></div>
                                    </div>
                                    <div class="MachineBottom"></div>
                                </div>
                            </div>
                        <?php }elseif($_smarty_tpl->getVariable('LotteryType')->value=='Wheel'){?>
                            <div class="col-md-12">
                                <div class="CircleInfo">
                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('TotalPrizes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                        <div class="InfoItem">
                                            <div class="InfoCircle" style="background-color: <?php echo $_smarty_tpl->getVariable('ColorList')->value[$_smarty_tpl->getVariable('key')->value];?>
;"></div>
                                            <div class="InfoText"><?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject'];?>
</div>
                                        </div>
                                    <?php }} ?>
                                </div>
                                <div class="CircleBG">
                                    <?php $_smarty_tpl->tpl_vars['P'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['P']->step = (12 - (1) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['P']->total = (int)ceil(($_smarty_tpl->tpl_vars['P']->step > 0 ? 12+1 - 1 : 1-(12)+1)/abs($_smarty_tpl->tpl_vars['P']->step));
if ($_smarty_tpl->tpl_vars['P']->total > 0){
for ($_smarty_tpl->tpl_vars['P']->value = 1, $_smarty_tpl->tpl_vars['P']->iteration = 1;$_smarty_tpl->tpl_vars['P']->iteration <= $_smarty_tpl->tpl_vars['P']->total;$_smarty_tpl->tpl_vars['P']->value += $_smarty_tpl->tpl_vars['P']->step, $_smarty_tpl->tpl_vars['P']->iteration++){
$_smarty_tpl->tpl_vars['P']->first = $_smarty_tpl->tpl_vars['P']->iteration == 1;$_smarty_tpl->tpl_vars['P']->last = $_smarty_tpl->tpl_vars['P']->iteration == $_smarty_tpl->tpl_vars['P']->total;?>
                                        <div class="SmallCircle"></div>
                                    <?php }} ?>
                                </div>
                                <div class="CircleWheel" onclick="startSpin();">
                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('TotalPrizes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                        <div class="fan" style="transform: rotate(<?php echo $_smarty_tpl->getVariable('item')->value['subject']['fan_deg'];?>
deg);">
                                            <div class="inner" style="transform: rotate(<?php echo $_smarty_tpl->getVariable('item')->value['subject']['inner_deg'];?>
deg);background-color: <?php echo $_smarty_tpl->getVariable('ColorList')->value[$_smarty_tpl->getVariable('key')->value];?>
;"></div>
                                        </div>
                                    <?php }} ?>
                                </div>
                                <span id="WheelPin">➤</span>
                            </div>
                        <?php }elseif($_smarty_tpl->getVariable('LotteryType')->value=='ScratchOff'){?>
                            <div class="col-md-12">
                                <div id="bottom">
                                    <?php if ($_smarty_tpl->getVariable('WinFlag')->value&&$_smarty_tpl->getVariable('BingoItem')->value['value']['subject']['pic']){?>
                                        <img id="BottomChild" src="<?php echo $_smarty_tpl->getVariable('BingoItem')->value['value']['subject']['pic'];?>
">
                                    <?php }else{ ?>
                                        <div id="BottomChild">
                                            <div>
                                                <img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Lottery/<?php if ($_smarty_tpl->getVariable('WinFlag')->value){?>gift.gif<?php }else{ ?>sad.png<?php }?>" alt="Image">
                                                <?php if ($_smarty_tpl->getVariable('WinFlag')->value){?><?php echo $_smarty_tpl->getVariable('BingoItem')->value['value']['subject']['subject'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('WinItem')->value['value']['subject']['subject'];?>
<?php }?>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                                <canvas id="top"></canvas>
                            </div>
                        <?php }elseif($_smarty_tpl->getVariable('LotteryType')->value=='Shake'){?>
                            <div class="col-md-12">
                                <div id="deviceConfirm">
                                    <div class="btn btn-primary btn-lg" id="deviceConfirmBtn">開始遊戲</div>
                                    <h6>請按下請求確認</h6>
                                </div>
                                <div class="shakeGame">
                                    <div class="shakeGameBG">
                                        <div class="InsideCircle"></div>
                                        <div class="hand" id="handBox"></div>
                                        <div class="DialogBox">
                                            <img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Lottery/shakebanner.png">
                                            <div class="DialogBoxInfo">
                                                <div class="remind">
                                                    <div class="remindImg" id="remindImg">
                                                        <img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Lottery/remindImg.png" class="img-responsive remindIcon" alt="Image">
                                                        <img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Lottery/remindImg2.png" class="img-responsive remindIcon2" alt="Image">
                                                        <img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Lottery/gift.gif" class="img-responsive giftIcon" alt="Image">
                                                        <img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Lottery/sad.png" class="img-responsive loseIcon" alt="Image">
                                                    </div>
                                                    <button id="playGame" type="button" class="btn btn-primary btn-lg ">抽 獎</button>
                                                    <h2 id="winning">點擊按鈕抽大獎</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }elseif($_smarty_tpl->getVariable('LotteryType')->value=='Gacha'){?>
                            <div class="col-md-12">
                                <div class="niu_danji">
                                    <!-- 轉蛋機-->
                                    <div class="InsideMachine">
                                        <div class="InsideMachineHeader"><div class="Shadow"></div></div>
                                        <div class="InsideMachineBody"><div class="Shadow"></div></div>
                                        <div class="InsideMachineFooter"><div class="Shadow"></div></div>
                                        <div class="InsideMachineBottom"><div class="Shadow"></div></div>
                                    </div>
                                    <div class="game_qu" style="/*background: url('<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Lottery/game_ndj.png') no-repeat;*/">
                                        <!--觸發鈕 -->
                                        <div class="game_go" style="/*background: url('<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Lottery/coin-slot-bg.png') no-repeat;*/">
                                            <div class="CoinSlotBg"><div class="Shadow"></div></div>
                                            <div class="game_goAll">
                                                <div class="coin" id="coin"></div>
                                                <div class="turn-crank" id="turnCrank"></div>
                                                <div class="remind" id="remind"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 轉蛋 -->
                                    <div class="dan_gund">
                                        <?php $_smarty_tpl->tpl_vars['J'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['J']->step = (11 - (1) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['J']->total = (int)ceil(($_smarty_tpl->tpl_vars['J']->step > 0 ? 11+1 - 1 : 1-(11)+1)/abs($_smarty_tpl->tpl_vars['J']->step));
if ($_smarty_tpl->tpl_vars['J']->total > 0){
for ($_smarty_tpl->tpl_vars['J']->value = 1, $_smarty_tpl->tpl_vars['J']->iteration = 1;$_smarty_tpl->tpl_vars['J']->iteration <= $_smarty_tpl->tpl_vars['J']->total;$_smarty_tpl->tpl_vars['J']->value += $_smarty_tpl->tpl_vars['J']->step, $_smarty_tpl->tpl_vars['J']->iteration++){
$_smarty_tpl->tpl_vars['J']->first = $_smarty_tpl->tpl_vars['J']->iteration == 1;$_smarty_tpl->tpl_vars['J']->last = $_smarty_tpl->tpl_vars['J']->iteration == $_smarty_tpl->tpl_vars['J']->total;?>
                                            <span class="qiu_<?php echo $_smarty_tpl->getVariable('J')->value;?>
 diaol_<?php echo $_smarty_tpl->getVariable('J')->value;?>
"></span>
                                        <?php }} ?>
                                    </div>

                                    <!--轉蛋出口-->
                                    <div class="medon">
                                        <div class="MachineExitBody"><div class="Shadow"></div></div>
                                        <div class="MachineExitBottom"><div class="Shadow"></div></div>
                                        <!--<img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Lottery/mendong.png" class="img-responsive">-->
                                    </div>
                                    <div class="zjdl">
                                        <span class=""></span>
                                    </div>
                                </div>
                            </div>
                        <?php }elseif($_smarty_tpl->getVariable('LotteryType')->value=='NineSquare'){?>
                            <div class="col-md-12">
                                <div class="box-wrap">
                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('TotalPrizes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                        <?php if ($_smarty_tpl->getVariable('key')->value==4){?>
                                            <div class="square" id="StartBtn" onclick="StartSpin();">開始</div>
                                            <div class="square"><?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject'];?>
</div>
                                        <?php }else{ ?>
                                            <div class="square"><?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject'];?>
</div>
                                        <?php }?>
                                    <?php }} ?>
                                    <?php $_smarty_tpl->tpl_vars['J'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['J']->step = (7 - (count($_smarty_tpl->getVariable('TotalPrizes')->value)) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['J']->total = (int)ceil(($_smarty_tpl->tpl_vars['J']->step > 0 ? 7+1 - count($_smarty_tpl->getVariable('TotalPrizes')->value) : count($_smarty_tpl->getVariable('TotalPrizes')->value)-(7)+1)/abs($_smarty_tpl->tpl_vars['J']->step));
if ($_smarty_tpl->tpl_vars['J']->total > 0){
for ($_smarty_tpl->tpl_vars['J']->value = count($_smarty_tpl->getVariable('TotalPrizes')->value), $_smarty_tpl->tpl_vars['J']->iteration = 1;$_smarty_tpl->tpl_vars['J']->iteration <= $_smarty_tpl->tpl_vars['J']->total;$_smarty_tpl->tpl_vars['J']->value += $_smarty_tpl->tpl_vars['J']->step, $_smarty_tpl->tpl_vars['J']->iteration++){
$_smarty_tpl->tpl_vars['J']->first = $_smarty_tpl->tpl_vars['J']->iteration == 1;$_smarty_tpl->tpl_vars['J']->last = $_smarty_tpl->tpl_vars['J']->iteration == $_smarty_tpl->tpl_vars['J']->total;?>
                                        <div class="square none"></div>
                                    <?php }} ?>
                                </div>
                            </div>
                        <?php }elseif($_smarty_tpl->getVariable('LotteryType')->value=='Treasure'){?>
                            <div class="col-md-12">
                                <input type="checkbox" id="toggle-treasure">
                                <div id="treasure-chest-positioner" onclick="OpenPrize();">
                                    <label id="treasure-chest" for="/*toggle-treasure*/">
                                        <div id="lid">
                                            <div id="lid-left">
                                                <?php $_smarty_tpl->tpl_vars['SidePanel'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['SidePanel']->step = (5 - (1) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['SidePanel']->total = (int)ceil(($_smarty_tpl->tpl_vars['SidePanel']->step > 0 ? 5+1 - 1 : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['SidePanel']->step));
if ($_smarty_tpl->tpl_vars['SidePanel']->total > 0){
for ($_smarty_tpl->tpl_vars['SidePanel']->value = 1, $_smarty_tpl->tpl_vars['SidePanel']->iteration = 1;$_smarty_tpl->tpl_vars['SidePanel']->iteration <= $_smarty_tpl->tpl_vars['SidePanel']->total;$_smarty_tpl->tpl_vars['SidePanel']->value += $_smarty_tpl->tpl_vars['SidePanel']->step, $_smarty_tpl->tpl_vars['SidePanel']->iteration++){
$_smarty_tpl->tpl_vars['SidePanel']->first = $_smarty_tpl->tpl_vars['SidePanel']->iteration == 1;$_smarty_tpl->tpl_vars['SidePanel']->last = $_smarty_tpl->tpl_vars['SidePanel']->iteration == $_smarty_tpl->tpl_vars['SidePanel']->total;?><div class="side-panel"></div><?php }} ?>
                                            </div>
                                            <div id="lid-panels">
                                                <?php $_smarty_tpl->tpl_vars['J'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['J']->step = (4 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['J']->total = (int)ceil(($_smarty_tpl->tpl_vars['J']->step > 0 ? 4+1 - 0 : 0-(4)+1)/abs($_smarty_tpl->tpl_vars['J']->step));
if ($_smarty_tpl->tpl_vars['J']->total > 0){
for ($_smarty_tpl->tpl_vars['J']->value = 0, $_smarty_tpl->tpl_vars['J']->iteration = 1;$_smarty_tpl->tpl_vars['J']->iteration <= $_smarty_tpl->tpl_vars['J']->total;$_smarty_tpl->tpl_vars['J']->value += $_smarty_tpl->tpl_vars['J']->step, $_smarty_tpl->tpl_vars['J']->iteration++){
$_smarty_tpl->tpl_vars['J']->first = $_smarty_tpl->tpl_vars['J']->iteration == 1;$_smarty_tpl->tpl_vars['J']->last = $_smarty_tpl->tpl_vars['J']->iteration == $_smarty_tpl->tpl_vars['J']->total;?>
                                                    <div class="panel" id="panel-<?php echo $_smarty_tpl->getVariable('J')->value;?>
">
                                                        <div class="board top"></div>
                                                        <div class="board bottom"></div>
                                                        <div class="iron-band left">
                                                            
                                                        </div>
                                                        <div class="iron-band middle">
                                                            
                                                        </div>
                                                        <div class="iron-band right">
                                                            
                                                        </div>
                                                    </div>
                                                <?php }} ?>
                                            </div>
                                            <div id="lid-right">
                                                <?php $_smarty_tpl->tpl_vars['SidePanel'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['SidePanel']->step = (5 - (1) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['SidePanel']->total = (int)ceil(($_smarty_tpl->tpl_vars['SidePanel']->step > 0 ? 5+1 - 1 : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['SidePanel']->step));
if ($_smarty_tpl->tpl_vars['SidePanel']->total > 0){
for ($_smarty_tpl->tpl_vars['SidePanel']->value = 1, $_smarty_tpl->tpl_vars['SidePanel']->iteration = 1;$_smarty_tpl->tpl_vars['SidePanel']->iteration <= $_smarty_tpl->tpl_vars['SidePanel']->total;$_smarty_tpl->tpl_vars['SidePanel']->value += $_smarty_tpl->tpl_vars['SidePanel']->step, $_smarty_tpl->tpl_vars['SidePanel']->iteration++){
$_smarty_tpl->tpl_vars['SidePanel']->first = $_smarty_tpl->tpl_vars['SidePanel']->iteration == 1;$_smarty_tpl->tpl_vars['SidePanel']->last = $_smarty_tpl->tpl_vars['SidePanel']->iteration == $_smarty_tpl->tpl_vars['SidePanel']->total;?><div class="side-panel"></div><?php }} ?>
                                            </div>
                                        </div>
                                        <div id="chest">
                                            <?php $_smarty_tpl->tpl_vars['P'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['P']->step = (4 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['P']->total = (int)ceil(($_smarty_tpl->tpl_vars['P']->step > 0 ? 4+1 - 0 : 0-(4)+1)/abs($_smarty_tpl->tpl_vars['P']->step));
if ($_smarty_tpl->tpl_vars['P']->total > 0){
for ($_smarty_tpl->tpl_vars['P']->value = 0, $_smarty_tpl->tpl_vars['P']->iteration = 1;$_smarty_tpl->tpl_vars['P']->iteration <= $_smarty_tpl->tpl_vars['P']->total;$_smarty_tpl->tpl_vars['P']->value += $_smarty_tpl->tpl_vars['P']->step, $_smarty_tpl->tpl_vars['P']->iteration++){
$_smarty_tpl->tpl_vars['P']->first = $_smarty_tpl->tpl_vars['P']->iteration == 1;$_smarty_tpl->tpl_vars['P']->last = $_smarty_tpl->tpl_vars['P']->iteration == $_smarty_tpl->tpl_vars['P']->total;?>
                                                <?php if ($_smarty_tpl->getVariable('P')->value==0){?>
                                                    <?php $_smarty_tpl->assign("Position",'front',null,null);?>
                                                <?php }elseif($_smarty_tpl->getVariable('P')->value==1){?>
                                                    <?php $_smarty_tpl->assign("Position",'left',null,null);?>
                                                <?php }elseif($_smarty_tpl->getVariable('P')->value==2){?>
                                                    <?php $_smarty_tpl->assign("Position",'bottom',null,null);?>
                                                <?php }elseif($_smarty_tpl->getVariable('P')->value==3){?>
                                                    <?php $_smarty_tpl->assign("Position",'right',null,null);?>
                                                <?php }elseif($_smarty_tpl->getVariable('P')->value==4){?>
                                                    <?php $_smarty_tpl->assign("Position",'back',null,null);?>
                                                <?php }?>
                                                <div id="<?php echo $_smarty_tpl->getVariable('Position')->value;?>
-panel">
                                                    <?php $_smarty_tpl->tpl_vars['SideChestPanel'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['SideChestPanel']->step = (4 - (1) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['SideChestPanel']->total = (int)ceil(($_smarty_tpl->tpl_vars['SideChestPanel']->step > 0 ? 4+1 - 1 : 1-(4)+1)/abs($_smarty_tpl->tpl_vars['SideChestPanel']->step));
if ($_smarty_tpl->tpl_vars['SideChestPanel']->total > 0){
for ($_smarty_tpl->tpl_vars['SideChestPanel']->value = 1, $_smarty_tpl->tpl_vars['SideChestPanel']->iteration = 1;$_smarty_tpl->tpl_vars['SideChestPanel']->iteration <= $_smarty_tpl->tpl_vars['SideChestPanel']->total;$_smarty_tpl->tpl_vars['SideChestPanel']->value += $_smarty_tpl->tpl_vars['SideChestPanel']->step, $_smarty_tpl->tpl_vars['SideChestPanel']->iteration++){
$_smarty_tpl->tpl_vars['SideChestPanel']->first = $_smarty_tpl->tpl_vars['SideChestPanel']->iteration == 1;$_smarty_tpl->tpl_vars['SideChestPanel']->last = $_smarty_tpl->tpl_vars['SideChestPanel']->iteration == $_smarty_tpl->tpl_vars['SideChestPanel']->total;?><div class="side-chest-panel"></div><?php }} ?>
                                                    <?php if ($_smarty_tpl->getVariable('Position')->value!='bottom'){?>
                                                        <div class="iron-bars">
                                                            <div class="top-bar iron-bar long">
                                                                
                                                            </div>
                                                            <div class="bottom-bar iron-bar long">
                                                                
                                                            </div>
                                                            <?php if ($_smarty_tpl->getVariable('Position')->value=='front'||$_smarty_tpl->getVariable('Position')->value=='back'){?>
                                                                <div class="middle-bar iron-bar short">
                                                                    <?php if ($_smarty_tpl->getVariable('Position')->value=='front'){?>
                                                                        <div id="lock"><div id="keyhole"></div></div>
                                                                    <?php }?>
                                                                </div>
                                                            <?php }?>
                                                            <div class="left-bar iron-bar short">
                                                                
                                                            </div>
                                                            <div class="right-bar iron-bar short">
                                                                
                                                            </div>
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            <?php }} ?>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div class="col-md-12">
                                <div id="BtnList">
                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('LotteryTypeList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                        <a class="btn btn-warning form-control" href="<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/ft/LotteryGame/LotteryType/<?php echo $_smarty_tpl->getVariable('key')->value;?>
"><?php echo $_smarty_tpl->getVariable('item')->value;?>
</a>
                                    <?php }} ?>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </section>
            </div>
        </div>
        
        
        <script>
            <?php if ($_smarty_tpl->getVariable('WinFlag')->value){?>
                <?php $_smarty_tpl->assign("PriceKey",$_smarty_tpl->getVariable('BingoItem')->value['key'],null,null);?>
                var PriceName = '<?php echo $_smarty_tpl->getVariable('BingoItem')->value['value']['subject']['subject'];?>
';
                var PricePic = '<?php echo $_smarty_tpl->getVariable('BingoItem')->value['value']['subject']['pic'];?>
' ? '<?php echo $_smarty_tpl->getVariable('BingoItem')->value['value']['subject']['pic'];?>
' : '<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Lottery/gift.gif';
            <?php }else{ ?>
                <?php $_smarty_tpl->assign("PriceKey",count($_smarty_tpl->getVariable('TotalPrizes')->value)-1,null,null);?>
                var PriceName = '<?php echo $_smarty_tpl->getVariable('WinItem')->value['value']['subject']['subject'];?>
';
                var PricePic = '<?php echo $_smarty_tpl->getVariable('WinItem')->value['value']['subject']['pic'];?>
' ? '<?php echo $_smarty_tpl->getVariable('WinItem')->value['value']['subject']['pic'];?>
' : '<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/Lottery/sad.png';
            <?php }?>
            function alertPrize(Segment=null){
                swal({
                    title: PriceName,
                    confirmButtonText: '確定',
                    imageUrl: PricePic,
                    //imageWidth: 400,
                    //imageHeight: 200,
                }).then(function () {
                    
                });
            }
            function getRandom(num1, num2){
                var min = (num1>num2) ? num2 : num1;
                var max = (num1>num2) ? num1 : num2;
                return Math.floor(Math.random()*(max-min)) + min;
            };
        </script>
        <?php if ($_smarty_tpl->getVariable('LotteryType')->value=='Slots'){?>
            <!-- http://josex2r.github.io/jQuery-SlotMachine/ -->
            <script src="https://josex2r.github.io/jQuery-SlotMachine/dist/slotmachine.js"></script>
            <script src="https://josex2r.github.io/jQuery-SlotMachine/dist/jquery.slotmachine.js"></script>
            <script>
                var casino1, casino2, casino3;
                $(function () {
                    var winNo = <?php if ($_smarty_tpl->getVariable('WinFlag')->value){?>getRandom(0, 8)<?php }else{ ?>-1<?php }?>;
                    casino1 = $('#casino1').slotMachine({
                        active: 0,
                        delay: 450,
                        auto: false,
                        randomize() {
                            return (winNo>-1) ? winNo : getRandom(0, 8);
                        }
                    });
                    casino2 = $('#casino2').slotMachine({
                        active: 0,
                        delay: 450,
                        auto: false,
                        randomize() {
                            return (winNo>-1) ? winNo : getRandom(0, 3);
                        }
                    });
                    casino3 = $('#casino3').slotMachine({
                        active: 0,
                        delay: 450,
                        auto: false,
                        randomize() {
                            return (winNo>-1) ? winNo : getRandom(4, 8);
                        }
                    });
                    //ShuffleAll();
                });
                function ShuffleAll(){
                    if($('.MachineHandler>.ball').css('cursor')==='pointer'){
                        casino1.shuffle(5);
                        casino2.shuffle(10);
                        casino3.shuffle(15);
                        $('.MachineHeader').html('抽獎中...');
                        $('.MachineHandler>.ball').css('cursor', 'not-allowed').css('animation', 'none');
                        $('.MachineHandler').addClass('turning');
                        
                        window.setTimeout(function(){
                            $('.MachineHandler').removeClass('turning');
                        }, 500);
                        window.setTimeout(function(){
                            //$('.MachineHandler>.ball').css('cursor', 'pointer').css('animation', 'ballLight 1s infinite alternate-reverse linear');
                            $('.MachineHeader').html(PriceName);
                            alertPrize();
                        }, 6000);
                    }
                }
            </script>
        <?php }elseif($_smarty_tpl->getVariable('LotteryType')->value=='Wheel'){?>
            <script>
                function startSpin(){
                    if ($('.CircleWheel').css('cursor') === 'pointer') {
                        var SpinSec = 3;
                        var SpinRound = 5;
                        let stopAt = 360*(SpinRound+1) - getRandom(<?php echo $_smarty_tpl->getVariable('TotalPrizes')->value[$_smarty_tpl->getVariable('PriceKey')->value]['subject']['fan_deg'];?>
, <?php echo $_smarty_tpl->getVariable('TotalPrizes')->value[$_smarty_tpl->getVariable('PriceKey')->value]['subject']['fan_deg']+$_smarty_tpl->getVariable('TotalPrizes')->value[$_smarty_tpl->getVariable('PriceKey')->value]['subject']['inner_deg'];?>
);
                        $('.CircleWheel').css('cursor', 'not-allowed')
                                        .css('transform', 'translate(-50%, -50%) rotate('+stopAt+'deg)')
                                        .css('transition', 'all '+SpinSec+'s ease 0s');
                        setTimeout(function () {
                            alertPrize();
                            //$('.CircleWheel').css('transform', 'translate(-50%, -50%) rotate(0deg)').css('cursor', 'pointer');
                        }, SpinSec * 1000);
                    }
                }
            </script>
        <?php }elseif($_smarty_tpl->getVariable('LotteryType')->value=='ScratchOff'){?>
            <script>
                var mousedown, alertFlag=true, w=300, h=300;
                var topCanvas = document.querySelector('#top');
                topCanvas.width = w;
                topCanvas.height = h;
                var ctxTop = topCanvas.getContext('2d');
                
                function drawTop(){
                    $('#bottom').css('width', w).css('height', h);
                    $('#BottomChild').css('max-width', w+'px');
                    ctxTop.canvas.style.opacity = 1;
                    ctxTop.fillStyle = '#c8c8c8';
                    ctxTop.fillRect(0, 0, w, h);
                    ctxTop.globalCompositeOperation = 'destination-out';//destination-out、source-atop
                    ctxTop.lineWidth = 30;
                }
                
                topCanvas.addEventListener('mousedown', eventDown);
                topCanvas.addEventListener('mouseup', eventUp);
                topCanvas.addEventListener('mousemove', eventMove);
                topCanvas.addEventListener('touchstart', eventDown);
                topCanvas.addEventListener('touchend', eventUp);
                topCanvas.addEventListener('touchmove', eventMove);
                
                function eventDown(ev){
                    ev = ev || event;
                    ev.preventDefault();
                    mousedown = true;
                    Draw(ev, true);
                }
                function eventUp(ev){
                    ev = ev || event;
                    ev.preventDefault();
                    mousedown = false;
                }
                function eventMove(ev){
                    ev = ev || event;
                    ev.preventDefault();
                    Draw(ev, false);
                }
                function Draw(ev, fresh=false){
                    if(mousedown) {
                        if(ev.changedTouches){
                            ev = ev.changedTouches[ev.changedTouches.length-1];
                        }
                        var MoveX = (ev.offsetX) ? ev.offsetX : ev.pageX-((document.documentElement.clientWidth-topCanvas.width)/2);
                        var MoveY = (ev.offsetY) ? ev.offsetY : ev.pageY-((document.documentElement.clientHeight-topCanvas.height)/2);
                        if(fresh){
                            ctxTop.beginPath();
                            ctxTop.moveTo(MoveX, MoveY);//+0.01
                        }
                        ctxTop.lineTo(MoveX, MoveY);
                        ctxTop.stroke();
                        CheckArea();
                    }
                }
                
                // 判斷刮開區域大於60%時，頂層canvas消失，顯示底層數據
                function CheckArea(){
                    var data = ctxTop.getImageData(0, 0, w, h).data;
                    var n = 0 ;
                    for (var i = 0; i < data.length; i++) {
                        if (data[i] == 0) {
                            n++;
                        };
                    };
                    
                    if (alertFlag && n >= data.length * 0.6) {
                        alertFlag = false;
                        ctxTop.globalCompositeOperation = 'destination-over';
                        ctxTop.canvas.style.opacity = 0;
                        alertPrize();
                    }
                }
                
                drawTop(); 
            </script>
        <?php }elseif($_smarty_tpl->getVariable('LotteryType')->value=='Shake'){?>
            <script type="text/javascript">
                $(function(){
                    // DOM
                    var $deviceConfirm = $('#deviceConfirm'); //遮罩
                    var $deviceConfirmBtn = $('#deviceConfirmBtn'); //開始遊戲按鈕
                    var $handBox = $('#handBox'); // 手
                    var $playGame = $('#playGame'); //  抽獎按鈕
                    
                    var $winning = $('#winning');// 吐抽獎結果
                    var $remindImg = $('#remindImg'); // 提示ICON
                    var $remindIcon = $('.remindIcon'); // 左右搖晃手機ICON
                    var $remindIcon2 = $('.remindIcon2'); // 左右滑動手機ICON
                    var $giftIcon = $('.giftIcon'); // 中獎ICON
                    var $loseIcon = $('.loseIcon'); // 沒中ICON
                    
                    // var $againBox=$('#againBox');// 再玩一次
                    var $playCount = $('#playCount'); //吐剩下可玩次數
                    // var $againBtn=$('#againBtn'); // 再玩一次按鈕
                    var $gift = $('#gift');// 獎品資訊
                    
                    // 數據
                    var halfWidth = (window.screen.width)/2; //取一半螢幕寬為分左右基準
                    var pageX = 0; //觸控位置X點 
                    var _playCountVal = 1; // 可玩次數
                    var _maxRotate = 30;//最大Rotate幅度 
                    var _positive = false; // 正、紀錄前次幅度 
                    var _negative = false; // 負、紀錄前次幅度 
                    var _actionShake = _shakeCount = 6; //搖晃符合開獎次數、搖晃次數 
                    var _threshold = 5; // 搖晃震幅 (度)
                    var _slideThreshold = 20; // 觸控距離
                    
                    // 開始遊戲(取得同意偵測)
                    function btnPlayAction(userAgent){
                        $remindImg.hide();
                        $playGame.show();
                        $winning.html('點擊按鈕抽大獎');
                        if (userAgent=='mobile'){
                            $deviceConfirm.addClass('active');
                        }
                        BtnPlay();
                    }
                    
                    function shakePlayAction(){
                        $remindIcon.show();
                        $remindImg.addClass('animation');
                        $deviceConfirm.addClass('active');
                        $winning.html('左右搖晃手機<br>即可抽獎');
                        window.addEventListener('deviceorientation', handleOrientation, false); 
                    }

                    function slidePlayAction(){
                        $remindIcon2.show();
                        $remindImg.addClass('animation');
                        $deviceConfirm.addClass('active');
                        $winning.html('手指左右滑動螢幕<br>即可抽獎');
                        window.addEventListener('touchmove',slidePlay);
                    }
                    
                    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Opera Mobi|Opera Tablet/i.test(navigator.userAgent)){
                        $deviceConfirm.show();
                        $deviceConfirmBtn.on('click',function(){
                            if (typeof DeviceOrientationEvent.requestPermission === 'function') {
                                DeviceOrientationEvent.requestPermission()
                                    .then(permissionState => {
                                        if (permissionState === 'granted') {
                                            // ios取得同意
                                            shakePlayAction();
                                        } else {
                                            // ios取得不同意
                                            // alert('ios 不允許偵測將無法進行遊戲')
                                            slidePlayAction();
                                        }
                                    })
                                    .catch((err) => {
                                        console.log(err);
                                    });
                            } else {
                                // android不需取得同意
                                shakePlayAction(); //搖晃
                                // slidePlayAction(); //觸控
                            }   
                        });
                    } else {
                        // 桌機不偵測直接帶入btn
                        btnPlayAction('desktop');
                    }
                    
                    // 偵測觸控
                    function slidePlay(){
                        if (event.targetTouches.length == 1) { // 判定如果只有一根指頭 
                            var touch = event.targetTouches[0];  // 取陣列的第一個
                            pageX = Math.floor(touch.pageX);

                            pageX = pageX-halfWidth;  
                            pageX = Math.floor((90/halfWidth)*pageX);

                            getShakeCount(pageX, _slideThreshold); 

                            var _rotate = Math.floor(pageX*(_maxRotate/90));
                            $handBox.css('transform', "rotate("+_rotate+"deg)");

                            if (_shakeCount==0){ //符合搖晃次數後開獎
                                checkWin('slide'); 
                            }
                        }
                    }
                    
                    // 偵測搖晃
                    function handleOrientation(event) {
                        var y = event.gamma; 
                        // var x = event.beta; 
                        // var z = event.alpha; 

                        if (y >  90) { y =  90};
                        if (y < -90) { y = -90};


                        y=Math.floor(y);
                        getShakeCount(y, _threshold); 

                        // 搖晃動態 
                        var _rotate=Math.floor(y*(_maxRotate/90));
                        $handBox.css('transform', "rotate("+_rotate+"deg)");

                        if (_shakeCount==0){ //符合搖晃次數後開獎
                            checkWin('shake'); 
                        }
                    }
                    
                    // 取搖晃次數
                    function getShakeCount(val, threshold){
                        if ( val>threshold ){
                            _positive = true;
                        }else if (val<-(threshold) ) {
                            _negative = true;
                        }
                        
                        if ( _positive && _negative){
                            _shakeCount--;
                            _positive = false; 
                            _negative = false;
                        }
                    }
                    
                    // 不同意偵測改使用按鈕開始遊戲 
                    // BtnPlay();
                    function BtnPlay(){
                        $playGame.on('click',function(){
                            $handBox.addClass('animation');
                            if ($(this).hasClass('btn-primary')){
                                $(this).removeClass('btn-primary').addClass('btn-secondary').attr('disabled', 'disabled');
                                setTimeout(function () {
                                    checkWin('btn');
                                }, 3000);
                            }
                        });
                    }
                    
                    // 開奬結果
                    function checkWin(type){
                        if ( type=='shake' ){
                            window.removeEventListener('deviceorientation', handleOrientation, false);
                        }else if ( type=='btn'){
                            $handBox.removeClass('animation');
                        }else if ( type=='slide' ){
                            window.removeEventListener('touchmove', slidePlay);
                        }
                        
                        showInfo(type, <?php if ($_smarty_tpl->getVariable('WinFlag')->value){?>$giftIcon<?php }else{ ?>$loseIcon<?php }?>, PriceName);
                        alertPrize();
                    }
                    
                    function showInfo(type, iconDom, text) {
                        if ( type=='shake' ){
                            $remindImg.removeClass('animation').find('img').hide();
                        }else if ( type=='btn'){
                            $playGame.hide();
                            $remindImg.show().find('img').hide();
                        }else if( type=='slide'){
                            $remindImg.removeClass('animation').find('img').hide();
                        }
                        iconDom.show();
                        $winning.html(text);
                    }
                });
            </script>
        <?php }elseif($_smarty_tpl->getVariable('LotteryType')->value=='Gacha'){?>
            <script type="text/javascript">
                var $coin = $("#coin"); // 投幣
                var $turnCrank = $('#turnCrank'); // 扭幣
                var $zjdl = $('.zjdl'); // 中獎轉蛋 
                var $remind = $('#remind'); // 提醒文字 
                $(function(){
                    $coin.click(function(){
                        $(this).addClass('in');
                        $remind.addClass('hide');
                        var number = Math.floor(Math.random() * (1 - 0 + 1)) + 0;
                        setTimeout(function () {
                            setTimeout(function () {
                                $turnCrank.addClass('in');
                                draw(number);
                            }, 300)
                        }, 300);
                    });
                });
                
                function draw(number){
                    for(i=1;i<=11;i++){
                        $(".qiu_"+i).removeClass("diaol_"+i);
                        $(".qiu_"+i).addClass("wieyi_"+i);
                    };
                    setTimeout(function(){
                        for(i=1;i<=11;i++){
                            $(".qiu_"+i).removeClass("wieyi_"+i);
                        }
                        switch(number){
                            case 0:$zjdl.children("span").addClass("diaL_1");break;
                            case 1:$zjdl.children("span").addClass("diaL_2");break;
                        }
                        $zjdl.removeClass("none").addClass("dila_Y");
                        setTimeout(function (){
                            alertPrize();
                        }, 1500);
                    }, 2200);
                }
            </script>
        <?php }elseif($_smarty_tpl->getVariable('LotteryType')->value=='NineSquare'){?>
            <script>
                var Order = [0, 1, 2, 5, 8, 7, 6, 3];
                function StartSpin(){
                    if ($('#StartBtn').css('cursor') === 'pointer') {
                        var SpinSec = 3;
                        var SpinRound = 5;
                        $('#StartBtn').css('cursor', 'not-allowed').html('抽獎中...');
                        var Ctn = 0;
                        var SpinInterval = setInterval(function () {
                            $('.box-wrap>.square').removeClass('active');
                            $('.box-wrap>.square').eq(Order[Ctn%8]).addClass('active');
                            if(Ctn>((SpinRound-1)*8)){ // && Order[Ctn%8]===0
                                clearInterval(SpinInterval);
                                var FinalRoundInterval = setInterval(function () {
                                    $('.box-wrap>.square').removeClass('active');
                                    $('.box-wrap>.square').eq(Order[Ctn%8]).addClass('active');
                                    if(Ctn>((SpinRound-1)*8) && Order[Ctn%8]===<?php if ($_smarty_tpl->getVariable('PriceKey')->value>3){?><?php echo $_smarty_tpl->getVariable('PriceKey')->value+1;?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('PriceKey')->value;?>
<?php }?>){ //最後一圈
                                        clearInterval(FinalRoundInterval);
                                        setTimeout(function () {
                                            alertPrize();
                                            $('#StartBtn')
                                                    //.css('cursor', 'pointer')
                                                    .html('已開獎');
                                        }, 500);
                                    }
                                    Ctn++;
                                }, Math.round((SpinSec*1000)/(SpinRound*8))*5);
                            }
                            Ctn++;
                        }, Math.round((SpinSec*1000)/(SpinRound*8)));
                    }
                }
            </script>
        <?php }elseif($_smarty_tpl->getVariable('LotteryType')->value=='Treasure'){?>
            <script>
                function OpenPrize(){
                    if ($('#treasure-chest-positioner').css('cursor') === 'pointer') {
                        $('#treasure-chest-positioner').css('cursor', 'not-allowed').addClass('shake');
                        setTimeout(function () {
                            $('#toggle-treasure').prop('checked', true);
                            setTimeout(function () {
                                alertPrize();
                            }, 500);
                        }, 1200);
                    }else{
                        $('#treasure-chest-positioner').css('cursor', 'pointer').removeClass('shake');
                        $('#toggle-treasure').prop('checked', false);
                    }
                }
                /*var Deg = -15;
                setInterval(function () {
                    $('html').css('--rotate-y', Deg + 'deg');
                    Deg++;
                }, 100);*/
            </script>
        <?php }?>
        <?php echo $_smarty_tpl->getVariable('xajax_js')->value;?>

    </body>
</html>