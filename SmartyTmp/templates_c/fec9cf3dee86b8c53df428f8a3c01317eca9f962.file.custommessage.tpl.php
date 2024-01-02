<?php /* Smarty version Smarty3-b7, created on 2022-08-12 13:57:25
         compiled from "/home1/bot.gadclubs.com/library/modules/_public/view/type/custommessage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124772278362f5ebc56936b1-58423227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fec9cf3dee86b8c53df428f8a3c01317eca9f962' => 
    array (
      0 => '/home1/bot.gadclubs.com/library/modules/_public/view/type/custommessage.tpl',
      1 => 1660278781,
    ),
  ),
  'nocache_hash' => '124772278362f5ebc56936b1-58423227',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include '/home1/bot.gadclubs.com/library/plugin/smarty/class/plugins/modifier.cat.php';
?><?php $_template = new Smarty_Internal_Template(smarty_modifier_cat($_smarty_tpl->getVariable('__PublicView')->value,'/UrlInfo.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.1.2/jsoneditor.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.1.2/jsoneditor.min.js"></script>

*<label for="">訊息(JSON)</label>
<div class="row" style="margin: 0px;">
    <input id="SaveData" type="hidden" name="fields[subject][data]">
    <input id="SaveType" type="hidden" name="fields[propertyA]">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">訊息分類 (<a id="OfficialLink" link="https://developers.line.biz/en/reference/messaging-api/#" target='_blank' href='https://developers.line.biz/en/reference/messaging-api/#text-message'><span>官方文件</span></a>) - <code id="SelectType">文字[text]</code></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="SampleMessage btn btn-tumblr"     _type="text"           _msgtype="text-message"     data='{ "type":"text","text":"$ LINE emoji $","emojis":[{ "index":0,"productId":"5ac1bfd5040ab15980c9b435","emojiId":"001" },{ "index":13,"productId":"5ac1bfd5040ab15980c9b435","emojiId":"002" }] }'>文字</div>
                <div class="SampleMessage btn btn-soundcloud" _type="sticker"        _msgtype="sticker-message"  data='{ "type": "sticker", "packageId": "1", "stickerId": "1" }'>貼圖</div>
                <div class="SampleMessage btn btn-github"     _type="image"          _msgtype="image-message"    data='{ "type": "image", "originalContentUrl": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_2_restaurant.png", "previewImageUrl": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_2_restaurant.png" }'>圖片</div>
                <div class="SampleMessage btn btn-dropbox"    _type="video"          _msgtype="video-message"    data='{ "type": "video", "originalContentUrl": "<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/original.mp4", "previewImageUrl": "<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/preview.jpg" }'>影片</div>
                <div class="SampleMessage btn btn-facebook"   _type="audio"          _msgtype="audio-message"    data='{ "type": "audio", "originalContentUrl": "https://filesamples.com/samples/audio/m4a/sample3.m4a", "duration": 105000 }'>語音</div>
                <div class="SampleMessage btn btn-yahoo"      _type="location"       _msgtype="location-message" data='{ "type": "location", "title": "my location", "address": "〒150-0002 東京都渋谷区渋谷２丁目２１−１", "latitude": 35.65910807942215, "longitude": 139.70372892916203 }'>位置</div>
                <div class="SampleMessage btn btn-google"     _type="imagemap"       _msgtype="imagemap-message" data='{ "type":"imagemap","baseUrl":"https://developers.line.biz/assets/img/richmenu-template-guide-01.0ca7294f.png?/1040","altText":"This is an imagemap","baseSize":{ "width":1040,"height":1040 },"actions":[{ "type":"uri","linkUri":"https://example.com/","area":{ "x":0,"y":586,"width":520,"height":454 } },{ "type":"message","text":"Hello","area":{ "x":520,"y":586,"width":520,"height":454 } }] }' 
                                                                                                                 flex-data='{"type":"flex","altText":"This is an imagemap","contents":{"type":"bubble","size":"giga","body":{"type":"box","layout":"vertical","paddingAll":"0px","contents":[{"type":"image","url":"https://developers.line.biz/assets/img/richmenu-template-guide-01.0ca7294f.png?/1040","size":"full","aspectMode":"cover","aspectRatio":"2500:1686"},{"type":"box","layout":"vertical","position":"absolute","width":"100%","height":"50%","offsetStart":"0%","offsetTop":"0%","action":{"type":"uri","uri":"https://example.com/"},"contents":[]},{"type":"box","layout":"vertical","position":"absolute","width":"100%","height":"50%","offsetStart":"0%","offsetTop":"50%","action":{"type":"message","text":"Hello"},"contents":[]}]}}}'>圖文訊息</div>
                <div class="SampleMessage btn btn-instagram"  _type="buttons"        _msgtype="buttons"          data='{ "type":"template","altText":"This is a buttons template","template":{ "type":"buttons","thumbnailImageUrl":"https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_1_cafe.png","imageAspectRatio":"rectangle","imageSize":"cover","imageBackgroundColor":"#FFFFFF","title":"Menu","text":"Please select","defaultAction":{ "type":"uri","label":"View detail","uri":"http://example.com/page/123" },"actions":[{ "type":"postback","label":"Buy","data":"action=buy&itemid=123" },{ "type":"postback","label":"Add to cart","data":"action=add&itemid=123" },{ "type":"uri","label":"View detail","uri":"http://example.com/page/123" }] } }' 
                                                                                                                 flex-data='{ "type":"flex","altText":"This is a buttons template","contents":{ "type":"bubble","size":"mega","body":{ "type":"box","layout":"vertical","paddingAll":"0px","contents":[{ "type":"image","url":"https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_1_cafe.png","size":"full","aspectRatio":"1.51:1","aspectMode":"cover","backgroundColor":"#FFFFFF" },{ "type":"box","layout":"vertical","paddingAll":"15px","backgroundColor":"#ffffff","contents":[{ "type":"text","text":"Menu","wrap":true,"weight":"bold","color":"#000000" },{ "type":"text","text":"Please select","wrap":true,"color":"#666666","size":"sm","margin":"md" }] },{ "type":"filler" },{ "type":"separator" },{ "type":"box","layout":"vertical","spacing":"sm","flex":0,"paddingAll":"7.5px","contents":[{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"postback","label":"Buy","data":"action=buy&itemid=123" },"contents":[{ "type":"text","text":"Buy","align":"center","color":"#627da3" }] },{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"postback","label":"Add to cart","data":"action=add&itemid=123" },"contents":[{ "type":"text","text":"Add to cart","align":"center","color":"#627da3" }] },{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"uri","label":"View detail","uri":"http://example.com/page/123" },"contents":[{ "type":"text","text":"View detail","align":"center","color":"#627da3" }] }] }] } } }'>按鈕卡片</div>
                <div class="SampleMessage btn btn-twitter"    _type="confirm"        _msgtype="confirm"          data='{ "type":"template","altText":"this is a confirm template","template":{ "type":"confirm","text":"Are you sure?","actions":[{ "type":"message","label":"Yes","text":"yes" },{ "type":"message","label":"No","text":"no" }] } }' 
                                                                                                                 flex-data='{ "type":"flex","altText":"this is a confirm template","contents":{ "type":"bubble","size":"mega","body":{ "type":"box","layout":"vertical","paddingAll":"0px","contents":[{ "type":"box","layout":"vertical","paddingAll":"15px","backgroundColor":"#fafafa","contents":[{ "type":"text","text":"Are you sure?","wrap":true,"color":"#29313e","size":"md","margin":"md" }] },{ "type":"separator" },{ "type":"box","layout":"horizontal","spacing":"sm","flex":0,"paddingAll":"7.5px","contents":[{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","flex": 1,"action":{ "type":"message","label":"Yes","text":"yes" },"contents":[{ "type":"text","text":"Yes","align":"center","color":"#627da3" }] },{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","flex": 1,"action":{ "type":"message","label":"No","text":"no" },"contents":[{ "type":"text","text":"No","align":"center","color":"#627da3" }] }] }] } } }'>確認卡片</div>
                <div class="SampleMessage btn btn-success"    _type="line_tempelate" _msgtype="carousel"         data='{ "type":"template","altText":"this is a carousel template","template":{ "type":"carousel","columns":[{ "thumbnailImageUrl":"https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_5_carousel.png","imageBackgroundColor":"#FFFFFF","title":"this is menu","text":"description","defaultAction":{ "type":"uri","label":"View detail","uri":"http://example.com/page/123" },"actions":[{ "type":"postback","label":"Buy","data":"action=buy&itemid=111" },{ "type":"postback","label":"Add to cart","data":"action=add&itemid=111" },{ "type":"uri","label":"View detail","uri":"http://example.com/page/111" }] },{ "thumbnailImageUrl":"https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_6_carousel.png","imageBackgroundColor":"#000000","title":"this is menu","text":"description","defaultAction":{ "type":"uri","label":"View detail","uri":"http://example.com/page/222" },"actions":[{ "type":"postback","label":"Buy","data":"action=buy&itemid=222" },{ "type":"postback","label":"Add to cart","data":"action=add&itemid=222" },{ "type":"uri","label":"View detail","uri":"http://example.com/page/222" }] }],"imageAspectRatio":"rectangle","imageSize":"cover" } }' 
                                                                                                                 flex-data='{ "type":"flex","altText":"this is a carousel template","contents":{ "type":"carousel","contents":[{ "type":"bubble","size":"mega","body":{ "type":"box","layout":"vertical","paddingAll":"0px","contents":[{ "type":"image","url":"https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_5_carousel.png","size":"full","aspectRatio":"1.51:1","aspectMode":"cover","backgroundColor":"#FFFFFF" },{ "type":"box","layout":"vertical","paddingAll":"15px","backgroundColor":"#ffffff","contents":[{ "type":"text","text":"this is menu","wrap":true,"weight":"bold","color":"#000000" },{ "type":"text","text":"description","wrap":true,"color":"#666666","size":"sm","margin":"md" }] },{ "type":"filler" },{ "type":"separator" },{ "type":"box","layout":"vertical","spacing":"sm","flex":0,"paddingAll":"15px","contents":[{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"postback","label":"Buy","data":"action=buy&itemid=111" },"contents":[{ "type":"text","text":"Buy","align":"center","color":"#627da3" }] },{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"postback","label":"Add to cart","data":"action=add&itemid=111" },"contents":[{ "type":"text","text":"Add to cart","align":"center","color":"#627da3" }] },{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"uri","label":"View detail","uri":"http://example.com/page/111" },"contents":[{ "type":"text","text":"View detail","align":"center","color":"#627da3" }] }] },{ "type":"spacer","size":"sm" }] } },{ "type":"bubble","size":"mega","body":{ "type":"box","layout":"vertical","paddingAll":"0px","contents":[{ "type":"image","url":"https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_6_carousel.png","size":"full","aspectRatio":"1.51:1","aspectMode":"cover","backgroundColor":"#FFFFFF" },{ "type":"box","layout":"vertical","paddingAll":"15px","backgroundColor":"#ffffff","contents":[{ "type":"text","text":"this is menu","wrap":true,"weight":"bold","color":"#000000" },{ "type":"text","text":"description","wrap":true,"color":"#666666","size":"sm","margin":"md" }] },{ "type":"filler" },{ "type":"separator" },{ "type":"box","layout":"vertical","spacing":"sm","flex":0,"paddingAll":"15px","contents":[{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"postback","label":"Buy","data":"action=buy&itemid=222" },"contents":[{ "type":"text","text":"Buy","align":"center","color":"#627da3" }] },{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"postback","label":"Add to cart","data":"action=add&itemid=222" },"contents":[{ "type":"text","text":"Add to cart","align":"center","color":"#627da3" }] },{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"uri","label":"View detail","uri":"http://example.com/page/222" },"contents":[{ "type":"text","text":"View detail","align":"center","color":"#627da3" }] }] },{ "type":"spacer","size":"sm" }] } }] } }'>卡片式選單</div>
                <div class="SampleMessage btn btn-vimeo"      _type="image_carousel" _msgtype="image-carousel"   data='{ "type":"template","altText":"this is a image carousel template","template":{ "type":"image_carousel","columns":[{ "imageUrl":"https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip10.jpg","action":{ "type":"postback","label":"Buy","data":"action=buy&itemid=111" } },{ "imageUrl":"https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip11.jpg","action":{ "type":"message","label":"Yes","text":"yes" } },{ "imageUrl":"https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip12.jpg","action":{ "type":"uri","label":"View detail","uri":"http://example.com/page/222" } }] } }' 
                                                                                                                 flex-data='{ "type":"flex","altText":"this is a image carousel template","contents":{ "type":"carousel","contents":[{ "type":"bubble","size":"giga","body":{ "type":"box","layout":"horizontal","paddingAll":"0px","justifyContent":"center","contents":[{ "type":"image","url":"https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip10.jpg","size":"full","aspectMode":"cover","gravity":"bottom" },{ "type":"box","layout":"vertical","backgroundColor":"#0606068f","paddingAll":"10px","cornerRadius":"30px","paddingStart":"15px","paddingEnd":"15px","position":"absolute","offsetBottom":"30px","contents":[{ "type":"text","text":"Buy","color":"#ffffff","align":"center","size":"sm" }] }],"action":{ "type":"postback","label":"Buy","data":"action=buy&itemid=111" } } },{ "type":"bubble","size":"giga","body":{ "type":"box","layout":"horizontal","paddingAll":"0px","justifyContent":"center","contents":[{ "type":"image","url":"https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip11.jpg","size":"full","aspectMode":"cover","gravity":"bottom" },{ "type":"box","layout":"vertical","backgroundColor":"#0606068f","paddingAll":"10px","cornerRadius":"30px","paddingStart":"15px","paddingEnd":"15px","position":"absolute","offsetBottom":"30px","contents":[{ "type":"text","text":"Yes","color":"#ffffff","align":"center","size":"sm" }] }],"action":{ "type":"message","label":"Yes","text":"yes" } } },{ "type":"bubble","size":"giga","body":{ "type":"box","layout":"horizontal","paddingAll":"0px","justifyContent":"center","contents":[{ "type":"image","url":"https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip12.jpg","size":"full","aspectMode":"cover","gravity":"bottom" },{ "type":"box","layout":"vertical","backgroundColor":"#0606068f","paddingAll":"10px","cornerRadius":"30px","paddingStart":"15px","paddingEnd":"15px","position":"absolute","offsetBottom":"30px","contents":[{ "type":"text","text":"View detail","color":"#ffffff","align":"center","size":"sm" }] }],"action":{ "type":"uri","label":"View detail","uri":"http://example.com/page/222" } } }] } }'>大圖選單</div>
                <div class="SampleMessage btn btn-danger"     _type="flex"           _msgtype="flex-message"     data='{ "type":"flex","altText":"this is a flex message","contents":"在此(去掉前後「雙引號」)貼上flex-simulator右上方[ View as JSON ]中複製的Json" }'>Flex訊息</div>
            </div>
        </div>
    </div>
    <div id="ExType" class="col-md-12">
        <div class="box box-info collapsed-box">
            <div class="box-header with-border">
                <div class="col-md-6">
                    <h3 class="box-title">格式</h3>
                </div>
                <div class="col-md-6">
                    <h3 class="box-title">範例</h3>
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa fa-plus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!-- 文字[text] -->
                <div class="Type text">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="box box-warning custom-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Number of characters and index position of emojis</h3>
                                </div>
                                <div class="box-body">
                                    <p>
                                        The number of characters and index position of emojis in text set to the property must be the number and position of the code unit when encoded in UTF-16.
                                        For some characters, such as those that use surrogate pairs and emojis that can be expressed in UTF-16, count them as multiple characters instead of one.
                                    </p>
                                    <p>For more information, see <a href="https://developers.line.biz/en/docs/messaging-api/text-character-count/" class="">Counting characters in a text</a> in the Messaging API documentation.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><code>text</code></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>text</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>Message text. You can include the following emoji:</p>
                                            <ul>
                                                <li>LINE emojis. Use a <code>$</code> character as a placeholder and specify the <code>product ID</code> and <code>emoji ID</code> of the LINE emoji you want to use in the <code>emojis</code> property. For more information, see <a href="https://developers.line.biz/en/docs/messaging-api/emoji-list/" class="">List of available LINE emojis</a>.</li>
                                                <li>Unicode emojis</li>
                                            </ul>
                                            <p>Max character limit: 5000</p>
                                            <div class="box box-danger custom-box">
                                                <div class="box-header with-border">
                                                    <i class="las la-exclamation-triangle text-danger mr-1"></i>"LINE original unicode emojis" has been discontinued as of March 31, 2022
                                                </div>
                                                <div class="box-body">
                                                    <p>Use "LINE Emoji" with the <code>emojis</code> property instead of "LINE original unicode emojis".</p>
                                                    <p>For more information, see the news from April 1, 2022, <a href="https://developers.line.biz/en/news/2022/04/01/line-original-unicode-emojis-has-been-discontinued/" class="">"LINE original unicode emojis" of the Messaging API has been discontinued as of March 31, 2022</a> and <a href="https://developers.line.biz/en/docs/messaging-api/emoji-list/" class="">List of available LINE emojis</a>.</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>emojis</h4>
                                            <span class="text-muted">Array of LINE emoji objects</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>One or more LINE emoji.</p>
                                            <p>Max: 20 LINE emoji</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>emojis.index</h4>
                                            <span class="text-muted">Number</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>The index position for <code>$</code> indicating the placeholder for LINE emojis in <code>text</code>, with the first character being at position <code>0</code>. See the text message example for details.</p>
                                            <div class="box box-warning custom-box">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Note</h3>
                                                </div>
                                                <div class="box-body">
                                                    <p>If you specify a position that doesn't match the position of <code>$</code>, the API returns HTTP <code>400 Bad request</code>.</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>emojis.productId</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>Product ID for a set of LINE emoji. For more information on product IDs, see <a href="https://developers.line.biz/en/docs/messaging-api/emoji-list/" class="">List of available LINE emojis</a>.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>emojis.emojiId</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>Emoji ID. For more information on emoji IDs for LINE emojis that are sendable with the Messaging API, see <a href="https://developers.line.biz/en/docs/messaging-api/emoji-list/" class="">List of available LINE emojis</a>.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Text message example" Json='{ "type":"text","text":"$ LINE emoji $","emojis":[{ "index":0,"productId":"5ac1bfd5040ab15980c9b435","emojiId":"001" },{ "index":13,"productId":"5ac1bfd5040ab15980c9b435","emojiId":"002" }] }'>
                            
                        </div>
                    </div>
                </div>
                <!-- 貼圖[sticker] -->
                <div class="Type sticker">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><code>sticker</code></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>packageId</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>Package ID for a set of stickers. For information on package IDs, see the <a href="https://developers.line.biz/en/docs/messaging-api/sticker-list/" class="">List of available stickers</a>.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>stickerId</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>Sticker ID. For a list of sticker IDs for stickers that can be sent with the Messaging API, see the <a href="https://developers.line.biz/en/docs/messaging-api/sticker-list/" class="">List of available stickers</a>.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Sticker message example" Json='{ "type":"sticker","packageId":"1","stickerId":"1" }'>
                            
                        </div>
                    </div>
                </div>
                <!-- 圖片[image] -->
                <div class="Type image">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><code>image</code></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>originalContentUrl</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Image URL (Max character limit: 2000)<br> <strong>HTTPS</strong> over <strong>TLS 1.2</strong> or later<br>
                                                JPG, JPEG, or PNG<br>
                                                Max image size: No limits<br>
                                                Max file size: 10 MB
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>previewImageUrl</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Preview image URL (Max character limit: 2000)<br> <strong>HTTPS</strong> over <strong>TLS 1.2</strong> or later<br>
                                                JPG, JPEG or PNG<br>
                                                Max image size: No limits<br>
                                                Max file size: 1 MB
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Image message example" Json='{ "type":"image","originalContentUrl":"<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/original.jpg","previewImageUrl":"<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/preview.jpg" }'>
                            
                        </div>
                    </div>
                </div>
                <!-- 影片[video] -->
                <div class="Type video">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <div class="box box-warning custom-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Video isn't working properly</h3>
                                            </div>
                                            <div class="box-body">
                                                <p>If the video isn't playing properly, make sure the video is a supported file type and the HTTP server hosting the video supports HTTP range requests.</p>
                                            </div>
                                        </div>
                                        <div class="box box-warning custom-box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Video aspect ratio</h3>
                                            </div>
                                            <div class="box-body">
                                                <ul>
                                                    <li>A very wide or tall video may be cropped when played in some environments.</li>
                                                    <li>The aspect ratio of the video specified in <code>originalContentUrl</code> and the preview image specified in <code>previewImageUrl</code> should be the same. If the aspect ratio is different, a preview image will appear behind the video.</li>
                                                </ul>
                                                <p><img alt="A video message in the LINE chat room. A preview image with a 1:1 aspect ratio is displayed behind the video that has an aspect ratio of 16:9." data-src="https://developers.line.biz/assets/img/image-overlapping-en.0e89fa18.png" loading="lazy" style="width: 440px;max-width: 100%;" src="https://developers.line.biz/assets/img/image-overlapping-en.0e89fa18.png"></p>
                                            </div>
                                        </div>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><code>video</code></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>originalContentUrl</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                URL of video file (Max character limit: 2000)<br> <strong>HTTPS</strong> over <strong>TLS 1.2</strong> or later<br>
                                                mp4<br>
                                                Max file size: 200 MB
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>previewImageUrl</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                URL of preview image (Max character limit: 2000)<br> <strong>HTTPS</strong> over <strong>TLS 1.2</strong> or later<br>
                                                JPEG or PNG<br>
                                                Max file size: 1 MB
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>trackingId</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>ID used to identify the video when <a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#video-viewing-complete">Video viewing complete event</a> occurs. If you send a video message with <code>trackingId</code> added, the video viewing complete event occurs when the user finishes watching the video.</p>
                                            <p>You can use the same ID in multiple messages.</p>
                                            <ul>
                                                <li>Max character limit: 100</li>
                                                <li>Supported character types: Half-width alphanumeric characters (<code>a-z</code>, <code>A-Z</code>, <code>0-9</code>) and symbols (<code>-.=,+*()%$&amp;;:@{}!?&lt;&gt;[]</code>)</li>
                                            </ul>
                                            <div class="box box-warning custom-box">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Note</h3>
                                                </div>
                                                <div class="box-body">
                                                    <p>You can't use the <code>trackingId</code> property in messages addressed to groups or talk rooms, or in audience match.</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Video message example" Json='{ "type":"video","originalContentUrl":"https://example.com/original.mp4","previewImageUrl":"https://example.com/preview.jpg","trackingId":"track_id" }'>
                            
                        </div>
                    </div>
                </div>
                <!-- 語音[audio] -->
                <div class="Type audio">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><code>audio</code></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>originalContentUrl</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                URL of audio file (Max character limit: 2000)<br> <strong>HTTPS</strong> over <strong>TLS 1.2</strong> or later<br>
                                                m4a<br>
                                                Max file size: 200 MB
                                            </p>
                                            <div class="box box-warning custom-box">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Note</h3>
                                                </div>
                                                <div class="box-body">
                                                    <p>Only M4A files are supported on the Messaging API. If a service only supports MP3 files, you can use a service like FFmpeg to convert the files to M4A.</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>duration</h4>
                                            <span class="text-muted">Number</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>Length of audio file (milliseconds)</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Audio message example" Json='{ "type":"audio","originalContentUrl":"https://example.com/original.m4a","duration":60000 }'>
                            
                        </div>
                    </div>
                </div>
                <!-- 位置[location] -->
                <div class="Type location">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><code>location</code></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>title</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>Title<br>
                                            Max character limit: 100</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>address</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>Address<br>
                                            Max character limit: 100</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>latitude</h4>
                                            <span class="text-muted">Decimal</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>Latitude</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>longitude</h4>
                                            <span class="text-muted">Decimal</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>Longitude</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Location message example" Json='{ "type":"location","title":"my location","address":"〒160-0022 東京都新宿区新宿４丁目１−６","latitude":35.688806,"longitude":139.701739 }'>
                            
                        </div>
                    </div>
                </div>
                <!-- 圖文訊息[imagemap] -->
                <div class="Type imagemap">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <h3 id="imagemap-message"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#imagemap-message" class="header-anchor">#</a> Imagemap message</h3>
                            <p>Imagemap messages are messages configured with an image that has multiple tappable areas. You can assign one tappable area for the entire image or different tappable areas on divided areas of the image.</p>
                            <p>You can also play a video on the image and display a label with a hyperlink after the video is finished.</p>
                            <div class="box box-warning custom-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Video isn't working properly</h3>
                                </div>
                                <div class="box-body">
                                    <p>If the video isn't playing properl, make sure the video is a supported file type and the HTTP server hosting the video supports HTTP partial requests (range request).</p>
                                </div>
                            </div>
                            <div class="box box-warning custom-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Video aspect ratio</h3>
                                </div>
                                <div class="box-body">
                                    <ul>
                                        <li>A very wide or tall video may be cropped when played in some environments.</li>
                                        <li>The aspect ratio of the video specified in <code>originalContentUrl</code> and the preview image specified in <code>previewImageUrl</code> should be the same. If the aspect ratio is different, a preview image will appear behind the video.</li>
                                    </ul>
                                    <p><img alt="A video message in the LINE chat room. A preview image with a 1:1 aspect ratio is displayed behind the video that has an aspect ratio of 16:9." data-src="https://developers.line.biz/assets/img/image-overlapping-en.0e89fa18.png" loading="lazy" style="width: 440px;max-width: 100%;" src="https://developers.line.biz/assets/img/image-overlapping-en.0e89fa18.png"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><code>imagemap</code></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>baseUrl</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Base URL of the image<br>
                                                Max character limit: 2000<br> <strong>HTTPS</strong> over <strong>TLS 1.2</strong> or later<br>
                                                For more information about supported images in imagemap messages, see <a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#base-url">How to configure an image</a>.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>altText</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Alternative text<br>
                                                Max character limit: 400
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>baseSize.width</h4>
                                            <span class="text-muted">Number</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>Width of base image in pixels. Set to 1040.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>baseSize.height</h4>
                                            <span class="text-muted">Number</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>Height of base image. Set to the height that corresponds to a width of 1040 pixels.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>video.originalContentUrl</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">*1</span>
                                        </td>
                                        <td>
                                            <p>
                                                URL of the video file (Max character limit: 2000)<br> <strong>HTTPS</strong> over <strong>TLS 1.2</strong> or later<br>
                                                mp4<br>
                                                Max length: No limit
                                                Max file size: 200 MB
                                            </p>
                                            <div class="box box-warning custom-box">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Note</h3>
                                                </div>
                                                <div class="box-body">
                                                    <p>A very wide or tall video may be cropped when played in some environments.</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>video.previewImageUrl</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">*1</span>
                                        </td>
                                        <td>
                                            <p>
                                                URL of the preview image (Max character limit: 2000)<br> <strong>HTTPS</strong> over <strong>TLS 1.2</strong> or later<br>
                                                JPG, JPEG, or PNG<br>
                                                Max image size: No limits<br>
                                                Max file size: 1 MB
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>video.area.x</h4>
                                            <span class="text-muted">Number</span>
                                            <span class="badge">*1</span>
                                        </td>
                                        <td>
                                            <p>Horizontal position of the video area relative to the left edge of the imagemap area. Value must be <code>0</code> or higher.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>video.area.y</h4>
                                            <span class="text-muted">Number</span>
                                            <span class="badge">*1</span>
                                        </td>
                                        <td>
                                            <p>Vertical position of the video area relative to the top of the imagemap area. Value must be <code>0</code> or higher.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>video.area.width</h4>
                                            <span class="text-muted">Number</span>
                                            <span class="badge">*1</span>
                                        </td>
                                        <td>
                                            <p>Width of the video area</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>video.area.height</h4>
                                            <span class="text-muted">Number</span>
                                            <span class="badge">*1</span>
                                        </td>
                                        <td>
                                            <p>Height of the video area</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>video.externalLink.linkUri</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">*2</span>
                                        </td>
                                        <td>
                                            <p>
                                                Webpage URL. Called when the label displayed after the video is tapped.<br>
                                                Max character limit: 1000<br>
                                                The available schemes are <code>http</code>, <code>https</code>, <code>line</code>, and <code>tel</code>. For more information about the LINE URL scheme, see <a target="_blank" href="https://developers.line.biz/en/docs/messaging-api/using-line-url-scheme/" class="">Using LINE features with the LINE URL scheme</a>.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>video.externalLink.label</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">*2</span>
                                        </td>
                                        <td>
                                            <p>
                                                Label. Displayed after the video is finished.<br>
                                                Max character limit: 30
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>actions</h4>
                                            <span class="text-muted"><p>Array of <a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#imagemap-action-objects">imagemap action objects</a></p></span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Action when tapped<br>
                                                Max: 50
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <p>
                                                *1 This property is required if you set a video to play on the imagemap.<br>
                                                *2 This property is required if you set a video to play and a label to display after the video on the imagemap.
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <h4 id="base-url"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#base-url" class="header-anchor">#</a> How to configure an image</h4>
                                <p>Images used in imagemap messages must meet the following requirements.</p>
                                <ul><li>Image format: JPG, JPEG, or PNG</li> <li>Image width: 240px, 300px, 460px, 700px, 1040px</li> <li>Max file size: 10 MB</li></ul>
                                <div class="box box-info custom-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Using transparent PNG</h3>
                                    </div>
                                    <div class="box-body">
                                        <p>It is possible to use transparent PNG in your imagemap messages.</p>
                                    </div>
                                </div>
                                <p>Make it possible to access images of 5 different sizes using the <code>baseUrl/{image width}</code> URL format. LINE will then download an image at the appropriate resolution based on the device.</p>
                                <p>For example, if we had a base URL of <code>https://example.com/images/cats</code>, the URL for the image with a width of 700px would be <code>https://example.com/images/cats/700</code>. To confirm all images display properly, access the image URLs.</p>
                                <table class="table"><thead><tr><th>Image width</th> <th>Example URL</th></tr></thead> <tbody><tr><td>240px</td> <td>https://example.com/bot/images/rm001/240</td></tr> <tr><td>300px</td> <td>https://example.com/bot/images/rm001/300</td></tr> <tr><td>460px</td> <td>https://example.com/bot/images/rm001/460</td></tr> <tr><td>700px</td> <td>https://example.com/bot/images/rm001/700</td></tr> <tr><td>1040px</td> <td>https://example.com/bot/images/rm001/1040</td></tr></tbody></table>
                                <div class="box box-warning custom-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Exclude image extension from URL</h3>
                                    </div>
                                    <div class="box-body">
                                        <p>Don't include the extension in the image filename. The image will not display in the imagemap message if the URL contains the image file extension (e.g. <code>https://example.com/bot/images/rm001/700.png</code>).</p>
                                    </div>
                                </div>
                                <h4 id="imagemap-action-objects"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#imagemap-action-objects" class="header-anchor">#</a> Imagemap action objects</h4>
                                <p>Object which specifies the actions and tappable areas of an imagemap.</p>
                                <p>When an area is tapped, the user is redirected to the URI specified in <code>uri</code> and the message specified in <code>message</code> is sent.</p>
                            </div>
                            </br><h5 id="imagemap-uri-action-object"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#imagemap-uri-action-object" class="header-anchor">#</a> Imagemap URI action object</h5>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Imagemap message example with two tappable areas" Json='{ "type":"imagemap","baseUrl":"https://example.com/bot/images/rm001","altText":"This is an imagemap","baseSize":{ "width":1040,"height":1040 },"video":{ "originalContentUrl":"https://example.com/video.mp4","previewImageUrl":"https://example.com/video_preview.jpg","area":{ "x":0,"y":0,"width":1040,"height":585 },"externalLink":{ "linkUri":"https://example.com/see_more.html","label":"See More" } },"actions":[{ "type":"uri","linkUri":"https://example.com/","area":{ "x":0,"y":586,"width":520,"height":454 } },{ "type":"message","text":"Hello","area":{ "x":520,"y":586,"width":520,"height":454 } }] }'>
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><code>uri</code></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>label</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>
                                                Label for the action. Spoken when the accessibility feature is enabled on the client device.<br>
                                                Max character limit: 50
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>linkUri</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Webpage URL<br>
                                                Max character limit: 1000<br>
                                                The available schemes are <code>http</code>, <code>https</code>, <code>line</code>, and <code>tel</code>. For more information about the LINE URL scheme, see <a target="_blank" href="https://developers.line.biz/en/docs/messaging-api/using-line-url-scheme/" class="">Using LINE features with the LINE URL scheme</a>.
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>area</h4>
                                            <span class="text-muted"><p><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#imagemap-area-object">Imagemap area object</a></p></span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>Defined tappable area</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h5 id="imagemap-message-action-object"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#imagemap-message-action-object" class="header-anchor">#</a> Imagemap message action object</h5>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Example imagemap URI action object" Json='{"type":"uri","label":"https://example.com/","linkUri":"https://example.com/","area":{"x":0,"y":0,"width":520,"height":1040}}'>
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><code>message</code></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>label</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>
                                                Label for the action. Spoken when the accessibility feature is enabled on the client device.<br>
                                                Max character limit: 50
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>text</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Message to send<br>
                                                Max character limit: 400
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>area</h4>
                                            <span class="text-muted"><p><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#imagemap-area-object">Imagemap area object</a></p></span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>Defined tappable area</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h6 id="imagemap-area-object"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#imagemap-area-object" class="header-anchor">#</a> Imagemap area object</h6>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Example imagemap message action object" Json='{ "type":"message","label":"hello","text":"hello","area":{ "x":520,"y":0,"width":520,"height":1040 } }'>
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <p>Defines the size of a tappable area. The top left is used as the origin of the area. Set these properties based on the <code>baseSize.width</code> property and the <code>baseSize.height</code> property.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>x</h4>
                                            <span class="text-muted">Number</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><p>Horizontal position relative to the left edge of the area. Value must be <code>0</code> or higher.</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>y</h4>
                                            <span class="text-muted">Number</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><p>Vertical position relative to the top of the area. Value must be <code>0</code> or higher.</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>width</h4>
                                            <span class="text-muted">Number</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><p>Width of the tappable area</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>height</h4>
                                            <span class="text-muted">Number</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><p>Height of the tappable area</p></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Example imagemap area object" Json='{ "x":520,"y":0,"width":520,"height":1040 }'>
                            
                        </div>
                    </div>
                </div>
                <!-- Template -->
                <div class="Type template">
                    <!-- Template Common -->
                    <div class="col-md-12 TemplateCommon">
                        <div class="col-md-6">
                            <h3 id="template-messages"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#template-messages" class="header-anchor">#</a> Template messages</h3>
                            <p>Template messages are messages with predefined layouts which you can customize. For more information, see <a target="_blank" href="https://developers.line.biz/en/docs/messaging-api/message-types/#template-messages" class="">Template messages</a>.</p>
                            <p>The following template types are available:</p>
                            <ul><li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#buttons">Buttons</a></li> <li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#confirm">Confirm</a></li> <li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#carousel">Carousel</a></li> <li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#image-carousel">Image carousel</a></li></ul>
                            <div class="box box-warning custom-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Note</h3>
                                </div>
                                <div class="box-body">
                                    <p>Template messages are only available on LINE for iOS and LINE for Android.</p>
                                </div>
                            </div>
                            <h4 id="common-properties-of-template-message-objects"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#common-properties-of-template-message-objects" class="header-anchor">#</a> Common properties of template message objects</h4>
                            <p>The following properties are common to all template message objects.</p>
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><code>template</code></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>altText</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Alternative text. Displayed on devices that do not support template messages.<br>
                                                Max character limit: 400
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>template</h4>
                                            <span class="text-muted">Object</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>A <a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#buttons">Buttons</a>, <a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#confirm">Confirm</a>, <a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#carousel">Carousel</a>, or <a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#image-carousel">Image Carousel</a> object.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- 按鈕卡片[buttons] -->
                    <div class="col-md-12 Type buttons">
                        <div class="col-md-12">
                            <h4 id="buttons"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#buttons" class="header-anchor">#</a> Buttons template</h4>
                            <p>Template with an image, title, text, and multiple action buttons.</p>
                        </div>
                        <div class="col-md-6">
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><code>buttons</code></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>thumbnailImageUrl</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>
                                                Image URL (Max character limit: 2,000)<br> <strong>HTTPS</strong> over <strong>TLS 1.2</strong> or later<br>
                                                JPEG or PNG<br>
                                                Max width: 1024px<br>
                                                Max file size: 10 MB
                                            </p>
                                            <div class="box box-info custom-box">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Recommended file size</h3>
                                                </div>
                                                <div class="box-body">
                                                    <p>To avoid delays in displaying messages, keep the size of individual image files small (1 MB or less recommended).</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>imageAspectRatio</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>Aspect ratio of the image. One of:</p>
                                            <ul><li><code>rectangle</code>: 1.51:1</li> <li><code>square</code>: 1:1</li></ul>
                                            <p>Default: <code>rectangle</code></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>imageSize</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>Size of the image. One of:</p>
                                            <ul><li><code>cover</code>: The image fills the entire image area. Parts of the image that do not fit in the area are not displayed.</li> <li><code>contain</code>: The entire image is displayed in the image area. A background is displayed in the unused areas to the left and right of vertical images and in the areas above and below horizontal images.</li></ul>
                                            <p>Default: <code>cover</code></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>imageBackgroundColor</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>Background color of the image. Specify a RGB color value. Default: <code>#FFFFFF</code> (white)</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>title</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>
                                                Title<br>
                                                Max character limit: 40
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>text</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Message text<br>
                                                Max character limit: 160 (no image or title)<br>
                                                Max character limit: 60 (message with an image or title)
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>defaultAction</h4>
                                            <span class="text-muted"><p><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#action-objects">Action object</a></p></span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>Action when image, title or text area is tapped.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>actions</h4>
                                            <span class="text-muted"><p>Array of <a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#action-objects">action objects</a></p></span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Action when tapped<br>
                                                Max objects: 4
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="box box-danger custom-box">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Warning</h3>
                                                </div>
                                                <div class="box-body">
                                                    <p>Because of the height limitation for buttons template messages, the lower part of the <code>text</code> display area will get cut off if the height limitation is exceeded. For this reason, depending on the character width, the message text may not be fully displayed even when it is within the character limits.</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Buttons template message example" Json='{ "type":"template","altText":"This is a buttons template","template":{ "type":"buttons","thumbnailImageUrl":"https://example.com/bot/images/image.jpg","imageAspectRatio":"rectangle","imageSize":"cover","imageBackgroundColor":"#FFFFFF","title":"Menu","text":"Please select","defaultAction":{ "type":"uri","label":"View detail","uri":"http://example.com/page/123" },"actions":[{ "type":"postback","label":"Buy","data":"action=buy&itemid=123" },{ "type":"postback","label":"Add to cart","data":"action=add&itemid=123" },{ "type":"uri","label":"View detail","uri":"http://example.com/page/123" }] } }' flex-Json='{ "type":"flex","altText":"This is a buttons template","contents":{ "type":"bubble","size":"mega","body":{ "type":"box","layout":"vertical","paddingAll":"0px","contents":[{ "type":"image","url":"https://example.com/bot/images/image.jpg","size":"full","aspectRatio":"1.51:1","aspectMode":"cover","backgroundColor":"#FFFFFF" },{ "type":"box","layout":"vertical","paddingAll":"15px","backgroundColor":"#ffffff","contents":[{ "type":"text","text":"Menu","wrap":true,"weight":"bold","color":"#000000" },{ "type":"text","text":"Please select","wrap":true,"color":"#666666","size":"sm","margin":"md" }] },{ "type":"filler" },{ "type":"separator" },{ "type":"box","layout":"vertical","spacing":"sm","flex":0,"paddingAll":"7.5px","contents":[{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"postback","label":"Buy","data":"action=buy&itemid=123" },"contents":[{ "type":"text","text":"Buy","align":"center","color":"#627da3" }] },{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"postback","label":"Add to cart","data":"action=add&itemid=123" },"contents":[{ "type":"text","text":"Add to cart","align":"center","color":"#627da3" }] },{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"uri","label":"View detail","uri":"http://example.com/page/123" },"contents":[{ "type":"text","text":"View detail","align":"center","color":"#627da3" }] }] }] } } }'>
                            
                        </div>
                    </div>
                    <!-- 確認卡片[confirm] -->
                    <div class="col-md-12 Type confirm">
                        <div class="col-md-12">
                            <h4 id="confirm"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#confirm" class="header-anchor">#</a> Confirm template</h4>
                            <p>Template with two action buttons.</p>
                        </div>
                        <div class="col-md-6">
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><code>confirm</code></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>text</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Message text<br>
                                                Max character limit: 240
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>actions</h4>
                                            <span class="text-muted"><p>Array of <a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#action-objects">action objects</a></p></span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Action when tapped<br>
                                                Set 2 actions for the 2 buttons
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="box box-danger custom-box">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Warning</h3>
                                                </div>
                                                <div class="box-body">
                                                    <p>Because of the height limitation for confirm template messages, the lower part of the <code>text</code> display area will get cut off if the height limitation is exceeded. For this reason, depending on the character width, the message text may not be fully displayed even when it is within the character limits.</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Confirm template message example" Json='{ "type":"template","altText":"this is a confirm template","template":{ "type":"confirm","text":"Are you sure?","actions":[{ "type":"message","label":"Yes","text":"yes" },{ "type":"message","label":"No","text":"no" }] } }' flex-Json='{ "type":"flex","altText":"this is a confirm template","contents":{ "type":"bubble","size":"mega","body":{ "type":"box","layout":"vertical","paddingAll":"0px","contents":[{ "type":"box","layout":"vertical","paddingAll":"15px","backgroundColor":"#fafafa","contents":[{ "type":"text","text":"Are you sure?","wrap":true,"color":"#29313e","size":"md","margin":"md" }] },{ "type":"separator" },{ "type":"box","layout":"horizontal","spacing":"sm","flex":0,"paddingAll":"7.5px","contents":[{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","flex": 1,"action":{ "type":"message","label":"Yes","text":"yes" },"contents":[{ "type":"text","text":"Yes","align":"center","color":"#627da3" }] },{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","flex": 1,"action":{ "type":"message","label":"No","text":"no" },"contents":[{ "type":"text","text":"No","align":"center","color":"#627da3" }] }] }] } } }'>
                            
                        </div>
                    </div>
                    <!-- 卡片式選單[line_tempelate] -->
                    <div class="col-md-12 Type line_tempelate">
                        <div class="col-md-12">
                            <h4 id="carousel"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#carousel" class="header-anchor">#</a> Carousel template</h4>
                            <p>Template with multiple columns which can be cycled like a carousel. The columns are shown in order when scrolling horizontally.</p>
                        </div>
                        <div class="col-md-6">
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><code>carousel</code></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>columns</h4>
                                            <span class="text-muted"><p>Array of <a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#column-object-for-carousel">column objects</a></p></span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Array of columns<br>
                                                Max columns: 10
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>imageAspectRatio</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>Aspect ratio of the image. One of:</p>
                                            <ul><li><code>rectangle</code>: 1.51:1</li> <li><code>square</code>: 1:1</li></ul>
                                            <p>Default: <code>rectangle</code></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>imageSize</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>Size of the image. One of:</p>
                                            <ul><li><code>cover</code>: The image fills the entire image area. Parts of the image that do not fit in the area are not displayed.</li> <li><code>contain</code>: The entire image is displayed in the image area. A background is displayed in the unused areas to the left and right of vertical images and in the areas above and below horizontal images.</li></ul>
                                            <p>Default: <code>cover</code></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table" width="100%" cellspacing="0">
                                <h5 id="column-object-for-carousel"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#column-object-for-carousel" class="header-anchor">#</a> Column object for carousel</h5>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>thumbnailImageUrl</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>
                                                Image URL (Max character limit: 2,000)<br> <strong>HTTPS</strong> over <strong>TLS 1.2</strong> or later<br>
                                                JPEG or PNG<br>
                                                Max width: 1024px<br>
                                                Max file size: 10 MB
                                            </p>
                                            <div class="box box-info custom-box">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Recommended file size</h3>
                                                </div>
                                                <div class="box-body">
                                                    <p>To avoid delays in displaying messages, keep the size of individual image files small (1 MB or less recommended).</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>imageBackgroundColor</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>Background color of the image. Specify a RGB color value. Default: <code>#FFFFFF</code> (white)</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>title</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>
                                                Title<br>
                                                Max character limit: 40
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>text</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Message text<br>
                                                Max character limit: 120 (no image or title)<br>
                                                Max character limit: 60 (message with an image or title)
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>defaultAction</h4>
                                            <span class="text-muted"><p><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#action-objects">Action object</a></p></span>
                                            <span class="badge">Optional</span>
                                        </td>
                                        <td>
                                            <p>Action when image, title or text area is tapped.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>actions</h4>
                                            <span class="text-muted"><p>Array of <a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#action-objects">action objects</a></p></span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Action when tapped<br>
                                                Max objects: 3
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="box box-danger custom-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Warning</h3>
                                </div>
                                <div class="box-body">
                                    <p>Because of the height limitation for carousel template messages, the lower part of the <code>text</code> display area will get cut off if the height limitation is exceeded. For this reason, depending on the character width, the message text may not be fully displayed even when it is within the character limits.</p>
                                </div>
                            </div>
                            <div class="box box-warning custom-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Note</h3>
                                </div>
                                <div class="box-body">
                                    <p>Keep the number of actions consistent for all columns. If you use an image or title for a column, make sure to do the same for all other columns.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Carousel template message example" Json='{ "type":"template","altText":"this is a carousel template","template":{ "type":"carousel","columns":[{ "thumbnailImageUrl":"https://example.com/bot/images/item1.jpg","imageBackgroundColor":"#FFFFFF","title":"this is menu","text":"description","defaultAction":{ "type":"uri","label":"View detail","uri":"http://example.com/page/123" },"actions":[{ "type":"postback","label":"Buy","data":"action=buy&itemid=111" },{ "type":"postback","label":"Add to cart","data":"action=add&itemid=111" },{ "type":"uri","label":"View detail","uri":"http://example.com/page/111" }] },{ "thumbnailImageUrl":"https://example.com/bot/images/item2.jpg","imageBackgroundColor":"#000000","title":"this is menu","text":"description","defaultAction":{ "type":"uri","label":"View detail","uri":"http://example.com/page/222" },"actions":[{ "type":"postback","label":"Buy","data":"action=buy&itemid=222" },{ "type":"postback","label":"Add to cart","data":"action=add&itemid=222" },{ "type":"uri","label":"View detail","uri":"http://example.com/page/222" }] }],"imageAspectRatio":"rectangle","imageSize":"cover" } }' flex-Json='{ "type":"flex","altText":"this is a carousel template","contents":{ "type":"carousel","contents":[{ "type":"bubble","size":"mega","body":{ "type":"box","layout":"vertical","paddingAll":"0px","contents":[{ "type":"image","url":"https://example.com/bot/images/item1.jpg","size":"full","aspectRatio":"1.51:1","aspectMode":"cover","backgroundColor":"#FFFFFF" },{ "type":"box","layout":"vertical","paddingAll":"15px","backgroundColor":"#ffffff","contents":[{ "type":"text","text":"this is menu","wrap":true,"weight":"bold","color":"#000000" },{ "type":"text","text":"description","wrap":true,"color":"#666666","size":"sm","margin":"md" }] },{ "type":"filler" },{ "type":"separator" },{ "type":"box","layout":"vertical","spacing":"sm","flex":0,"paddingAll":"15px","contents":[{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"postback","label":"Buy","data":"action=buy&itemid=111" },"contents":[{ "type":"text","text":"Buy","align":"center","color":"#627da3" }] },{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"postback","label":"Add to cart","data":"action=add&itemid=111" },"contents":[{ "type":"text","text":"Add to cart","align":"center","color":"#627da3" }] },{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"uri","label":"View detail","uri":"http://example.com/page/111" },"contents":[{ "type":"text","text":"View detail","align":"center","color":"#627da3" }] }] },{ "type":"spacer","size":"sm" }] } },{ "type":"bubble","size":"mega","body":{ "type":"box","layout":"vertical","paddingAll":"0px","contents":[{ "type":"image","url":"https://example.com/bot/images/item2.jpg","size":"full","aspectRatio":"1.51:1","aspectMode":"cover","backgroundColor":"#FFFFFF" },{ "type":"box","layout":"vertical","paddingAll":"15px","backgroundColor":"#ffffff","contents":[{ "type":"text","text":"this is menu","wrap":true,"weight":"bold","color":"#000000" },{ "type":"text","text":"description","wrap":true,"color":"#666666","size":"sm","margin":"md" }] },{ "type":"filler" },{ "type":"separator" },{ "type":"box","layout":"vertical","spacing":"sm","flex":0,"paddingAll":"15px","contents":[{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"postback","label":"Buy","data":"action=buy&itemid=222" },"contents":[{ "type":"text","text":"Buy","align":"center","color":"#627da3" }] },{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"postback","label":"Add to cart","data":"action=add&itemid=222" },"contents":[{ "type":"text","text":"Add to cart","align":"center","color":"#627da3" }] },{ "type":"box","layout":"vertical","paddingAll":"7.5px","backgroundColor":"#ffffff","cornerRadius":"7.5px","action":{ "type":"uri","label":"View detail","uri":"http://example.com/page/222" },"contents":[{ "type":"text","text":"View detail","align":"center","color":"#627da3" }] }] },{ "type":"spacer","size":"sm" }] } }] } }'>
                            
                        </div>
                    </div>
                    <!-- 大圖選單[image_carousel] -->
                    <div class="col-md-12 Type image_carousel">
                        <div class="col-md-12">
                            <h4 id="image-carousel"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#image-carousel" class="header-anchor">#</a> Image carousel template</h4>
                            <p>Template with multiple images which can be cycled like a carousel. The images are shown in order when scrolling horizontally.</p>
                        </div>
                        <div class="col-md-6">
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td><code>image_carousel</code></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>columns</h4>
                                            <span class="text-muted"><p>Array of <a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#column-object-for-carousel">column objects</a></p></span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Array of columns<br>
                                                Max columns: 10
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table" width="100%" cellspacing="0">
                                <h5 id="column-object-for-image-carousel"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#column-object-for-image-carousel" class="header-anchor">#</a> Column object for image carousel</h5>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>imageUrl</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Image URL (Max character limit: 2,000)<br> <strong>HTTPS</strong> over <strong>TLS 1.2</strong> or later<br>
                                                JPEG or PNG<br>
                                                Aspect ratio: 1:1<br>
                                                Max width: 1024px<br>
                                                Max file size: 10 MB
                                            </p>
                                            <div class="box box-info custom-box">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Recommended file size</h3>
                                                </div>
                                                <div class="box-body">
                                                    <p>To avoid delays in displaying messages, keep the size of individual image files small (1 MB or less recommended).</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>action</h4>
                                            <span class="text-muted"><p><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#action-objects">Action object</a></p></span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>Action when image is tapped</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Image carousel template message example" Json='{ "type":"template","altText":"this is a image carousel template","template":{ "type":"image_carousel","columns":[{ "imageUrl":"https://example.com/bot/images/item1.jpg","action":{ "type":"postback","label":"Buy","data":"action=buy&itemid=111" } },{ "imageUrl":"https://example.com/bot/images/item2.jpg","action":{ "type":"message","label":"Yes","text":"yes" } },{ "imageUrl":"https://example.com/bot/images/item3.jpg","action":{ "type":"uri","label":"View detail","uri":"http://example.com/page/222" } }] } }' flex-Json='{ "type":"flex","altText":"this is a image carousel template","contents":{ "type":"carousel","contents":[{ "type":"bubble","size":"giga","body":{ "type":"box","layout":"horizontal","paddingAll":"0px","justifyContent":"center","contents":[{ "type":"image","url":"https://example.com/bot/images/item1.jpg","size":"full","gravity":"bottom" },{ "type":"box","layout":"vertical","backgroundColor":"#0606068f","paddingAll":"10px","cornerRadius":"30px","paddingStart":"15px","paddingEnd":"15px","position":"absolute","offsetBottom":"30px","contents":[{ "type":"text","text":"Buy","color":"#ffffff","align":"center","size":"sm" }] }],"action":{ "type":"postback","label":"Buy","data":"action=buy&itemid=111" } } },{ "type":"bubble","size":"giga","body":{ "type":"box","layout":"horizontal","paddingAll":"0px","justifyContent":"center","contents":[{ "type":"image","url":"https://example.com/bot/images/item2.jpg","size":"full","gravity":"bottom" },{ "type":"box","layout":"vertical","backgroundColor":"#0606068f","paddingAll":"10px","cornerRadius":"30px","paddingStart":"15px","paddingEnd":"15px","position":"absolute","offsetBottom":"30px","contents":[{ "type":"text","text":"Yes","color":"#ffffff","align":"center","size":"sm" }] }],"action":{ "type":"message","label":"Yes","text":"yes" } } },{ "type":"bubble","size":"giga","body":{ "type":"box","layout":"horizontal","paddingAll":"0px","justifyContent":"center","contents":[{ "type":"image","url":"https://example.com/bot/images/item3.jpg","size":"full","gravity":"bottom" },{ "type":"box","layout":"vertical","backgroundColor":"#0606068f","paddingAll":"10px","cornerRadius":"30px","paddingStart":"15px","paddingEnd":"15px","position":"absolute","offsetBottom":"30px","contents":[{ "type":"text","text":"View detail","color":"#ffffff","align":"center","size":"sm" }] }],"action":{ "type":"uri","label":"View detail","uri":"http://example.com/page/222" } } }] } }'>
                            
                        </div>
                    </div>
                </div>
                <!-- Flex訊息[flex] -->
                <div class="Type flex">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <h3 id="flex-message"><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#flex-message" class="header-anchor">#</a> Flex Message</h3>
                            <p>Flex Messages are messages with a customizable layout. You can customize the layout freely based on the specification for <a href="https://www.w3.org/TR/css-flexbox-1/" target="_blank" rel="noopener noreferrer">CSS Flexible Box (CSS Flexbox)<span><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" x="0px" y="0px" viewBox="0 0 100 100" width="15" height="15" class="icon outbound"><path fill="currentColor" d="M18.8,85.1h56l0,0c2.2,0,4-1.8,4-4v-32h-8v28h-48v-48h28v-8h-32l0,0c-2.2,0-4,1.8-4,4v56C14.8,83.3,16.6,85.1,18.8,85.1z"></path> <polygon fill="currentColor" points="45.7,48.7 51.3,54.3 77.2,28.5 77.2,37.2 85.2,37.2 85.2,14.9 62.8,14.9 62.8,22.9 71.5,22.9"></polygon></svg> <span class="sr-only">(opens new window)</span></span></a>. For more information, see <a target="_blank" href="https://developers.line.biz/en/docs/messaging-api/using-flex-messages/" class="">Sending Flex Messages</a> in the Messaging API documentation.</p>
                            <ul><li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#container">Container</a> <ul><li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#bubble">Bubble</a></li> <li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#f-carousel">Carousel</a></li></ul></li> <li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#flex-component">Component</a> <ul><li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#box">Box</a></li> <li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#button">Button</a></li> <li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#f-image">Image</a></li> <li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#icon">Icon</a></li> <li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#f-text">Text</a></li> <li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#span">Span</a></li> <li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#separator">Separator</a></li> <li><a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#filler">Filler</a></li></ul></li></ul>
                            <table class="table" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>type</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p><code>flex</code></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>altText</h4>
                                            <span class="text-muted">String</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>
                                                Alternative text<br>
                                                Max character limit: 400
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>contents</h4>
                                            <span class="text-muted">Object</span>
                                            <span class="badge bg-red">Required</span>
                                        </td>
                                        <td>
                                            <p>Flex Message <a target="_blank" href="https://developers.line.biz/en/reference/messaging-api/#container">container</a></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 ExampleJson" Title="Flex Message example" Json='{ "type":"flex","altText":"this is a flex message","contents":{ "type":"bubble","body":{ "type":"box","layout":"vertical","contents":[{ "type":"text","text":"hello" },{ "type":"text","text":"world" }] } } }'>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="EditMsg" class="col-md-12">
        <div class="col-md-3">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">預覽</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="LineTemplateStyle" style="height: 700px;">
                        <div id="CustomPreview" class="PhoneContent CustomMessage">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">編碼</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="CustomerMsg" style="height: 700px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">樹狀</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="JsonEditor" style="height: 700px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <?php if ($_smarty_tpl->getVariable('row')->value['subject']['data']){?>
            <?php $_smarty_tpl->assign("flexdata",json_decode($_smarty_tpl->getVariable('row')->value['subject']['data'],true),null,null);?>
        <?php }?>
        <iframe id="FlexSimulator" src="<?php if ($_smarty_tpl->getVariable('flexdata')->value['type']&&$_smarty_tpl->getVariable('flexdata')->value['type']==='flex'){?><?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/ft/flex-simulator<?php }?>" style="width: -webkit-fill-available;height: 100vh;display: none;"></iframe>
    </div>
</div>

<script>
    const MsgEditor = new JSONEditor($('#CustomerMsg')[0], { mode: 'code', onChange: function(){UpdateJson();} });
    const JsonEditor = new JSONEditor($('#JsonEditor')[0], { mode: 'tree', onChange: function(){UpdateMsg ();} });
    
    function UpdateJson(_Data = MsgEditor.get()){
        $('#SaveData').val(JSON.stringify(_Data));
        xajax_BuildMsg('return', '', 'next', 'type', 'message', _Data, 'MemberInfo', 'MsgKey');
        JsonEditor.set(_Data);
    }
    function UpdateMsg(_Data = JsonEditor.get()){
        xajax_BuildMsg('return', '', 'next', 'type', 'message', _Data, 'MemberInfo', 'MsgKey');
        MsgEditor.set(_Data);
    }
    function SetVal(_Data = {}){
        //$("#FlexSimulator").contents().find('#header').hide();
        $("#FlexSimulator").contents().find('#FlexJson').hide();
        var data = JSON.parse(_Data);
        UpdateJson(data);
        UpdateMsg(data);
    }
    function JsonToHtml(item=null, _Level=-1, _TotalString=''){
        _Level++;
        var Html = '';
        var _Space = '    ';
        if(_TotalString.substr(-9) !== ': </span>'){
            Html += _Space.repeat(_Level);
        }
        var _Start = (item[0]) ? '[' : '{';
        var _End = (item[0]) ? ']' : '}';
        Html += '<span class="token punctuation">'+ _Start +'</span>' + "\n";
        var _Ctn = 0;
        var _KeyCtn = 0;
        for (const [key, value] of Object.entries(item)) {
            _Ctn++;
            if(!$.isNumeric(key)){
                Html += _Space.repeat((_Level+1)) + '<span class="token property">"'+ key +'"</span>';
                Html += '<span class="token operator">: </span>';
            }
            if(typeof value==="object" && value!==null){
                Html += JsonToHtml(value, _Level, Html);
            }else{
                if(typeof value==='boolean'){
                    Html += '<span class="token boolean">'+ value +'</span>';
                }else if(typeof value==='string'){
                    Html += '<span class="token string">"'+ value +'"</span>';
                }else{
                    Html += '<span class="token number">'+ value +'</span>';
                }
            }
            if(_Ctn < Object.keys(item).length){
                Html += '<span class="token punctuation">,</span>';
            }
            Html += "\n";
            _KeyCtn++;
        }
        Html += _Space.repeat(_Level) + '<span class="token punctuation">'+ _End +'</span>';
        return Html;
    }
    function JsonToPre(_JSON=null){
        var _Array = JSON.parse(_JSON);
        var _Return = "<pre class='Example'><code>";
        if(_Array){
            _Return += JsonToHtml(_Array, -1, '');
        }
        _Return += "</code></pre>\n";
        return _Return;
    }
    function SampleMessageClick(obj, ask=true, _Json=null){
        $('#SaveType').val(obj.attr('_type'));
        $(".SampleMessage").css('border', '');
        obj.css('border', '3px solid #f39c12');
        $('#ExType .Type').hide();
        switch($('#SaveType').val()){
            case 'buttons':
            case 'confirm':
            case 'line_tempelate':
            case 'image_carousel':
                $('#ExType .Type.template').show();
                break;
        }
        $('#ExType .Type.' + $('#SaveType').val()).show();
        $("#OfficialLink").attr('href', $("#OfficialLink").attr('link')+obj.attr('_msgtype'));
        $('#SelectType').html(obj.html()+'['+$('#SaveType').val()+']');
        switch($('#SaveType').val()){
            case 'imagemap':
            case 'buttons':
            case 'confirm':
            case 'line_tempelate':
            case 'image_carousel':
                if( (ask&&confirm('是否要帶入Flex版本?')) || (!ask&&JSON.parse(_Json)['type']==='flex') ){
                    var flexData = ask ? obj.attr('flex-data') : _Json;
                    var flexContents = JSON.stringify(JSON.parse(flexData)['contents']);
                    $('#ExType').hide();
                    $('#EditMsg').hide();
                    if(JSON.parse(flexData)['type']==='flex'){
                        var loaded = true;
                        if(!$('#FlexSimulator').attr('src')){
                            loaded = false;
                            $('#FlexSimulator').attr('src', '<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/ft/flex-simulator');
                        }
                        if(loaded && ask){
                            $("#FlexSimulator").contents().find('#ShowcaseCancelBtn').click();
                            $("#FlexSimulator").contents().find("#editor").val(flexContents);
                            $("#FlexSimulator").contents().find("#editor").click();
                            $("#FlexSimulator").contents().find('#ApplyFlex').click();
                            $('#FlexSimulator').show();
                        }else{
                            $('#FlexSimulator')[0].onload = function(){
                                var CheckedFrameLoadedInterval = window.setInterval(function() {
                                    if($("#FlexSimulator").contents().find('body>div')[0]){
                                        window.clearInterval(CheckedFrameLoadedInterval);
                                        window.setTimeout(function() {
                                            $("#FlexSimulator").contents().find('#ShowcaseCancelBtn').click();
                                            $("#FlexSimulator").contents().find("#editor").val(flexContents);
                                            $("#FlexSimulator").contents().find("#editor").click();
                                            $("#FlexSimulator").contents().find('#ApplyFlex').click();
                                            $('#FlexSimulator').show();
                                        }, 100);
                                    }
                                }, 100);
                            };
                        }
                    }else{
                        SetVal(flexData);
                    }
                }else{
                    SetVal(obj.attr('data'));
                    $('#ExType').show();
                    $('#EditMsg').show();
                    $('#FlexSimulator').hide();
                }
                break;
            case 'flex':
                if(!$('#FlexSimulator').attr('src')){
                    $('#FlexSimulator').attr('src', '<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/ft/flex-simulator');
                }
                var flexData = ask ? obj.attr('data') : _Json;
                var flexContents = JSON.stringify(JSON.parse(flexData)['contents']);
                $('#ExType').hide();
                $('#EditMsg').hide();
                if(ask){
                    $("#FlexSimulator").contents().find('#FlexSamples').click();
                    $('#FlexSimulator').show();
                }else{
                    $('#FlexSimulator')[0].onload = function(){
                        var CheckedFrameLoadedInterval = window.setInterval(function() {
                            if($("#FlexSimulator").contents().find('body>div')[0]){
                                window.clearInterval(CheckedFrameLoadedInterval);
                                window.setTimeout(function() {
                                    $("#FlexSimulator").contents().find('#ShowcaseCancelBtn').click();
                                    $("#FlexSimulator").contents().find("#editor").val(flexContents);
                                    $("#FlexSimulator").contents().find("#editor").click();
                                    $("#FlexSimulator").contents().find('#ApplyFlex').click();
                                    $('#FlexSimulator').show();
                                }, 1000);
                            }
                        }, 100);
                    };
                }
                break;
            default:
                var flexData = ask ? obj.attr('data') : _Json;
                SetVal(flexData);
                $('#ExType').show();
                $('#EditMsg').show();
                $('#FlexSimulator').hide();
                break;
        }
    }
    $(function(){
        $('body').addClass('sidebar-collapse');
        $('.ExampleJson').each(function(e) {
            $(this).html('<p><em>'+$(this).attr('Title')+'</em></p>');
            $(this).append( JsonToPre($(this).attr('Json')) );
        });
        $(".SampleMessage").on('click', function(event) {
            SampleMessageClick($(this), true);
        });
        
        <?php if ($_smarty_tpl->getVariable('row')->value['subject']['data']){?>
            SampleMessageClick($(".SampleMessage[_type='<?php echo $_smarty_tpl->getVariable('row')->value['propertyA'];?>
']"), false, <?php echo json_encode($_smarty_tpl->getVariable('row')->value['subject']['data']);?>
);
        <?php }?>
    });
</script>