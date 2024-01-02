<?php /* Smarty version Smarty3-b7, created on 2021-04-07 12:17:24
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/analytics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:662975201606d325448ea48-84298278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f402f667eb354062a19575a1f5a4bfbf7a54c353' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/analytics.tpl',
      1 => 1617769042,
    ),
  ),
  'nocache_hash' => '662975201606d325448ea48-84298278',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" /> 
    <meta http-equiv="Pragma" content="no-cache" /> 
    <meta http-equiv="Expires" content="0" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/img/line.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/style.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
">
    <script defer src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script defer src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script defer src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/src/lib/wordcloud2.js"></script>
    <script defer src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/src/lib/wordfreq.worker.js"></script>
    <script defer src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/src/lib/wordfreq.js"></script>
    <script defer src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/src/lib/rpie.js"></script>
    <script defer src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/src/analyze.js?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/src/lib/jquery-1.9.1.min.js"></script>
    <title>聊天分析</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #7C7877;">
        <a class="navbar-brand" href="<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/?analytics">
            <img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/img/line.png" width="30" height="30" class="d-inline-block align-top" alt="">
            <div class="navBrand">LINE 訊息統計分析</div>
        </a>
        <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/chonyy/line-message-analyzer">Source code</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/chonyy">Creator</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://tenor.com/view/cat-loading-error-angry-fuck-gif-8985245">Image
                        source</a>
                </li>
            </ul>
        </div>-->
    </nav>
    <div id="LoadingProgressBar" style="display: none;background-color: #f1bbba;width: 0%;height: 20px;">0%</div>
    <main id="swup" class="transition-fade">
        <?php if ($_smarty_tpl->getVariable('type')->value=='index'){?>
            <div class="landing-container">
                <div class="main-container">
                    <div class="titleandbutton">
                        <div class="title">LINE 統計分析</div>
                        <div class="titleinfo">以數字和圖表呈現您的聊天紀錄</div>
                        <div>
                            <div class="mainbutton" onclick="document.getElementById('file').click();">載入聊天</div>
                            <input type="file" style="display:none;" id="file" name="file" />
                        </div>
                        <div class="samplebutton" onclick="samplefile()">使用範例</div>
                    </div>
                    <div class="image-container">
                        <div class="demo-image mobile-hidden">
                            <img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/img/demo1.PNG">
                        </div>
                        <div class="demo-image mobile-hidden">
                            <img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/img/demo2.PNG">
                        </div>
                        <div class="demo-image mobile-show demo-mobile">
                            <img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/img/demo-mobile.PNG">
                        </div>
                    </div>
                </div>
                <!--<div class="wave-button"></div>
                <div class="how-insturction">
                    <div class="how">How?</div>
                    <div class="ins-image-container">
                        <div class="ins-row">
                            <div class="ins-container">
                                <div class="ins-text">IOS: 請先點選右上方選單</div>
                                <div class="ins-image">
                                    <img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/img/info-ios1.jpg">
                                </div>
                            </div>
                            <div class="ins-container">
                                <div class="ins-text">IOS: 再點選右上方齒輪</div>
                                <div class="ins-image">
                                    <img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/img/info-ios2.jpg">
                                </div>
                            </div>
                        </div>
                        <div class="ins-row">
                            <div class="ins-container">
                                <div class="ins-text">Android: 請點選右上方選單後再點選齒輪</div>
                                <div class="ins-image">
                                    <img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/img/info-android.jpg">
                                </div>
                            </div>
                            <div class="ins-container">
                                <div class="ins-text">最後: 儲存聊天紀錄後再從上方載入聊天</div>
                                <div class="ins-image">
                                    <img src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/analytics/img/info-last.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        <?php }elseif($_smarty_tpl->getVariable('type')->value=='analyze'){?>
            <div class="swap-container">
                <div class="content-container">
                    <div class="chatname" chat-title>Loading... 訊息越多需載入越久，請稍等</div>
                    <div class="firstrow">
                        <div class="donutandstat">
                            <div class="donutchart">
                                <div class="chartContainer">
                                    <canvas id="myCanvas" width="275" height="275"></canvas>
                                </div>
                                <div class="legend">
                                    <div class="lg-container">
                                        <div class="icon white"></div>
                                        <div class="text-container">
                                            <div class="legendtext">User1</div>
                                            <div class="legendtext">xxxx 則</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="stat-container">
                                <div class="stat-row">
                                    <div class="stat-item">
                                        <div class="statname-container">
                                            <div class="stat-name">聊天天數</div>
                                            <div class="underline"></div>
                                        </div>
                                        <div class="stat-num" stat-day>000</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="statname-container">
                                            <div class="stat-name">訊息</div>
                                            <div class="underline"></div>
                                        </div>
                                        <div class="stat-num" stat-message>000</div>
                                    </div>
                                </div>
                                <div class="stat-row">
                                    <div class="stat-item">
                                        <div class="statname-container">
                                            <div class="stat-name">通話</div>
                                            <div class="underline"></div>
                                        </div>
                                        <div class="stat-num" stat-call>0</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="statname-container">
                                            <div class="stat-name">通話時間</div>
                                            <div class="underline"></div>
                                        </div>
                                        <div class="stat-num calltime" stat-calltime>0 時 0 分 0 秒</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="maximum mobile-hidden">
                            <div class="max-item">
                                <div class="max-name">最多訊息數:</div>
                                <div class="max-num" max-message>xx 則</div>
                                <div class="maxdate">
                                    <div class="datefont year" max-year>0000</div>
                                    <div class="monthandday">
                                        <div class="datefont month" max-month>xx</div>
                                        <div class="datefont day" max-day>xx</div>
                                    </div>
                                </div>
                            </div>
                            <div class="max-item">
                                <div class="max-name">最多單日通話時間:</div>
                                <div class="max-num" max-calltime>0 時 0 分 0 秒</div>
                                <div class="maxdate">
                                    <div class="datefont year" max-calltime-year>0000</div>
                                    <div class="monthandday">
                                        <div class="datefont month" max-calltime-month>xx</div>
                                        <div class="datefont day" max-calltime-day>xx</div>
                                    </div>
                                </div>
                            </div>
                            <div class="max-item">
                                <div class="max-name">單日最多通話:</div>
                                <div class="max-num" max-callctn>xx 次</div>
                                <div class="maxdate">
                                    <div class="datefont year" max-callctn-year>0000</div>
                                    <div class="monthandday">
                                        <div class="datefont month" max-callctn-month>xx</div>
                                        <div class="datefont day" max-callctn-day>xx</div>
                                    </div>
                                </div>
                            </div>
                            <div class="max-item">
                                <div class="max-name">單次最久通話時間:</div>
                                <div class="max-num" max-calllong>0 時 0 分 0 秒</div>
                                <div class="maxdate">
                                    <div class="datefont year" max-calllong-year>0000</div>
                                    <div class="monthandday">
                                        <div class="datefont month" max-calllong-month>xx</div>
                                        <div class="datefont day" max-calllong-day>xx</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="secondrow">
                        <div class="member">
                            <div class="member-name" data-type="chart">User1</div>
                            <div class="underline whiteline"></div>
                            <div class="memberchart">
                                <div class="memberdonut">
                                    <canvas id="memberCanvas1" width="225" height="225"></canvas>
                                </div>
                                <div class="legend">
                                    <div class="lg-container">
                                        <div class="icon red membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="texts">xxxxx 文字</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon white membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="stickers">xxxx 貼圖</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon black membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="photos">xx 照片</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon red membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="urls">xx 連結</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon white membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="notes">xx 記事本</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon black membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="gallerys">xx 相簿</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon red membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="phones">xx 電話</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon white membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="delphotos">xx 刪除相簿照片</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon black membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="changegallerys">xx 更改相簿名稱</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon black membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="changegrpname">xx 更改群組名稱</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon black membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="changegrpphoto">xx 變更群組圖片</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon red membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="delgallerys">xx 刪除相簿</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon white membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="revokemsgs">xx 收回訊息</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon black membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="missedcalls">xx 未接來電</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon red membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="videos">xx 影片</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon white membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="audios">xx 語音訊息</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon white membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="joingroups">xx 加入群組</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon white membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="leavegroups">xx 退出群組</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon white membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="startgroupcalls">xx 開始群組通話</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon white membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="polls">xx 發起投票</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon white membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="pollends">xx 投票截止</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon white membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="sendcontactinfos">xx 傳送聯絡資訊</div>
                                        </div>
                                    </div>
                                    <div class="lg-container">
                                        <div class="icon white membericon"></div>
                                        <div class="text-container">
                                            <div class="legendtext" data-type="invites">xx 邀請加入</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="freqandsearch mobile-hidden">
                            <div class="freqimg">
                                <div class="cloud-container">
                                    <div id="wordcloud"> </div>
                                </div>
                            </div>
                            <!--<div class="search">
                                <div class="info">輸入欲尋找的字眼:</div>
                                <div class="underline searchline"></div>
                                <div class="searchbar" style="z-index: 9999;">
                                    <input type="text" class="searchbox" placeholder="輸入字眼...">
                                    <div class="submitbutton" onclick="findword()">尋找</div>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <div class="thirdrow mobile-show">
                        <div class="maximum">
                            <div class="max-item">
                                <div class="max-name">最多訊息數:</div>
                                <div class="max-num" max-message>xx 則</div>
                                <div class="maxdate">
                                    <div class="datefont year" max-year>0000</div>
                                    <div class="monthandday">
                                        <div class="datefont month" max-month>xx</div>
                                        <div class="datefont day" max-day>xx</div>
                                    </div>
                                </div>
                            </div>
                            <div class="max-item">
                                <div class="max-name">最多單日通話時間:</div>
                                <div class="max-num" max-calltime>0 時 0 分 0 秒</div>
                                <div class="maxdate">
                                    <div class="datefont year" max-calltime-year>0000</div>
                                    <div class="monthandday">
                                        <div class="datefont month" max-calltime-month>xx</div>
                                        <div class="datefont day" max-calltime-day>xx</div>
                                    </div>
                                </div>
                            </div>
                            <div class="max-item">
                                <div class="max-name">單日最多通話:</div>
                                <div class="max-num" max-callctn>xx 次</div>
                                <div class="maxdate">
                                    <div class="datefont year" max-callctn-year>0000</div>
                                    <div class="monthandday">
                                        <div class="datefont month" max-callctn-month>xx</div>
                                        <div class="datefont day" max-callctn-day>xx</div>
                                    </div>
                                </div>
                            </div>
                            <div class="max-item">
                                <div class="max-name">單次最久通話時間:</div>
                                <div class="max-num" max-calllong>xx 則</div>
                                <div class="maxdate">
                                    <div class="datefont year" max-calllong-year>0000</div>
                                    <div class="monthandday">
                                        <div class="datefont month" max-calllong-month>xx</div>
                                        <div class="datefont day" max-calllong-day>xx</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="freqandsearch">
                            <div class="freqimg">
                                <div class="cloud-container">
                                    <div id="wordcloud-mobile"> </div>
                                </div>
                            </div>
                            <div class="search">
                                <div class="info">輸入欲尋找的字眼:</div>
                                <div class="underline searchline"></div>
                                <div class="searchbar" style="z-index: 9999;">
                                    <input type="text" class="searchbox" id="searchbox-mobile" placeholder="輸入字眼...">
                                    <div class="submitbutton" onclick="findword()">尋找</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="plot-container">
                        <div class="message-plot" id="allMessage"></div>
                        <div class="message-plot" id="memberMessage"></div>
                        <div class="message-plot" id="callTime"></div>
                    </div>
                    <div class="plot-container findword">
                        <div class="message-plot word-plot hidden" id="findingWord"></div>
                    </div>
                </div>
            </div>
        <?php }?>
    </main>

</body>

</html>