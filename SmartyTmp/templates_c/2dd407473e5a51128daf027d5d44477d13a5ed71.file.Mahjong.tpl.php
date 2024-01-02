<?php /* Smarty version Smarty3-b7, created on 2022-11-07 16:36:25
         compiled from "/home1/bot.lineapie.tw/library/modules/frontend/view/Mahjong.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13980792086368c389e50613-21494564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2dd407473e5a51128daf027d5d44477d13a5ed71' => 
    array (
      0 => '/home1/bot.lineapie.tw/library/modules/frontend/view/Mahjong.tpl',
      1 => 1667810182,
    ),
  ),
  'nocache_hash' => '13980792086368c389e50613-21494564',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
    <head>
        <link href="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/jquery-3.3.1.min.js"></script>
        <script src="<?php echo $_smarty_tpl->getVariable('__PLUGIN_Web')->value;?>
/bootstrap/bootstrap.min.js"></script>
    </head>
    <body>
        <script>
            var cardList = [];
            for(var a=0;a<4;a++){
                for(var b=0;b<9;b++){
                    cardList.push({
                        'pic' : '',
                        'key' : (b*1+1) + '-wan',//一萬~九萬
                        'type' : 'wan',//萬
                    });
                }
                for(var b=0;b<9;b++){
                    cardList.push({
                        'pic' : '',
                        'key' : (b*1+1) + '-tong',//一筒~九筒
                        'type' : 'tong',//筒
                    });
                }
                for(var b=0;b<9;b++){
                    cardList.push({
                        'pic' : '',
                        'key' : (b*1+1) + '-tiao',//一條~九條
                        'type' : 'tiao',//條
                    });
                }
                cardList.push({
                    'pic' : '',
                    'key' : 'hongzhong',//紅中
                    'type' : 'hongzhong',//紅中
                });
                cardList.push({
                    'pic' : 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/U%2B1F005_MJGreendragon.svg/800px-U%2B1F005_MJGreendragon.svg.png',
                    'key' : 'fachai',//發財
                    'type' : 'fachai',//發財
                });
                cardList.push({
                    'pic' : '',
                    'key' : 'baiban',//白板
                    'type' : 'baiban',//白板
                });
                cardList.push({
                    'pic' : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfpPY_Q_yy_yxxYpHHtpsAGTQmvkPQ1vh2yANTcSOx&s',
                    'key' : 'east',//東
                    'type' : 'east',//東
                });
                cardList.push({
                    'pic' : '',
                    'key' : 'west',//西
                    'type' : 'west',//西
                });
                cardList.push({
                    'pic' : '',
                    'key' : 'south',//南
                    'type' : 'south',//南
                });
                cardList.push({
                    'pic' : '',
                    'key' : 'north',//北
                    'type' : 'north',//北
                });
            }
            cardList.push({
                'pic' : '',
                'key' : 'mei',//梅(四君子)
                'type' : 'flower',//花牌
            });
            cardList.push({
                'pic' : '',
                'key' : 'lan',//蘭(四君子)
                'type' : 'flower',//花牌
            });
            cardList.push({
                'pic' : '',
                'key' : 'ju',//菊(四君子)
                'type' : 'flower',//花牌
            });
            cardList.push({
                'pic' : '',
                'key' : 'zhu',//竹(四君子)
                'type' : 'flower',//花牌
            });
            cardList.push({
                'pic' : '',
                'key' : 'chun',//春(四季)
                'type' : 'flower',//花牌
            });
            cardList.push({
                'pic' : '',
                'key' : 'xia',//夏(四季)
                'type' : 'flower',//花牌
            });
            cardList.push({
                'pic' : '',
                'key' : 'qiu',//秋(四季)
                'type' : 'flower',//花牌
            });
            cardList.push({
                'pic' : '',
                'key' : 'dong',//冬(四季)
                'type' : 'flower',//花牌
            });
            console.log(cardList);

            $(function () {
                for (const [cardkey, carditem] of Object.entries(cardList)) {
                    $('#Area').append(`<img src="${carditem.pic}">`);
                }
            });
        </script>
        <div id="Area">
        </div>
    </body>
</html>