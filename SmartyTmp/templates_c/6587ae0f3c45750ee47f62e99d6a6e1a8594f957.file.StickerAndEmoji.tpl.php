<?php /* Smarty version Smarty3-b7, created on 2020-10-08 17:44:07
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/StickerAndEmoji.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19536009625f7edf677d5325-41890019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6587ae0f3c45750ee47f62e99d6a6e1a8594f957' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/StickerAndEmoji.tpl',
      1 => 1602150206,
    ),
  ),
  'nocache_hash' => '19536009625f7edf677d5325-41890019',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home1/rickytest.gadclubs.com/CustomStickers/library/plugin/smarty/class/plugins/modifier.date_format.php';
?><link href="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/css/app.css?<?php echo smarty_modifier_date_format(time(),'%Y%m%d%H:%M:%S');?>
" rel="stylesheet">
<script>
    $(function(){
        //JSON寫入表情選項
        $.getJSON("<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/js/data.json", function (data) {
            var html = "";
            for (var i = 0; i < data.length; i++) {
                html += '<li data-img="(' + data[i][0] + ')" data-code="' + data[i][2] + '"><span class="emoticon-'+ data[i][2] +'_k"></span></li>';
            }
            $("#emoticon>ul").html(html);
        });
        for (var i = 0; i <  $(".ImgType").length; i++) {
            var $ImgType=$("#ImgType0"+(i+1));
            //新增圖片寫入，class (因為sprite是用class定位)
            for (var j = 0; j < $ImgType.find('li').length; j++) {
                var SerialNO=$ImgType.find('li').eq(j).attr('data-stkid');
                SerialNO=SerialNO.replace(/(.*?)[_]/g,''); //濾掉_之前的文字
                $ImgType.find('li').eq(j).html('<span class="stkid-'+ SerialNO +'_key"></span>');
            }
        }
        //貼圖
        $(".ImgType>ul>li").click(function () {
            $("#ShowStickerBox").click(); //點一下關掉
            var _src = $(this).attr("data-stkid").replace(/(.*?)[_]/g,'');
            var id = $(this).attr("data-stkid");
            $('#SaveMsg'+SelectMsg).val(id);
            $('#msgview'+SelectMsg).html('<img src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/img/'+_src+'_key.png">');
        });
        //表情
        $(document).on('click', '#emoticon>ul>li', function (e) {
            $("#ShowkaomojiBox").click(); //點一下關掉
            var _emoticon = unescape(encodeURIComponent($(this).attr('data-img')));
            InsertContent(_emoticon);
        });
        //表情符號
        $("#kaomoji>ul>li").on('click', function (e) {
            $("#ShowkaomojiBox").click(); //點一下關掉
            var _kaomoji = $(this).text();
            InsertContent(_kaomoji);
        });
        $('.ShowValueList tbody tr').on('click', function (e) {
            var oneTemplateNo = 0;
            var addHtml = " ";
            switch($(this).attr('data-type')){
                case 'ImageMap':
                    var ImageMap = JSON.parse($(this).attr('data-json'));
                    var _subimg = ImageMap['subject']['img0'];
                    var _subtitle = ImageMap['subject']['subject'];
                    oneTemplateNo = ($('.LineTemplateStyle').width()/270)-10;
                    addHtml += '<img class="ShowImgmapIMG" src="/CustomStickers/upload/image/'+_subimg+'">';
                    break;
                case 'LineTemplate':
                    var Template = JSON.parse($(this).attr('data-json'));
                    for (i = 0; i < 10; i++) {
                        // 取值
                        var _subtitle = Template['subject']['subtitle' + i];
                        var _subcontent = Template['subject']['subcontent' + i];
                        var _subimg = Template['subject']['img' + i];
                        var subject_0 = Template['subject']['subject' + i + '_0'];
                        var subject_1 = Template['subject']['subject' + i + '_1'];
                        var subject_2 = Template['subject']['subject' + i + '_2'];

                        // 判斷是否為'不設定動作'
                        var action_0 = Template['subject']['action' + i + '_0'];
                        var action_1 = Template['subject']['action' + i + '_1'];
                        var action_2 = Template['subject']['action' + i + '_2'];

                        // 只要有任何一欄有值、就創建整塊
                        if (_subtitle != "" || _subcontent != "" || subject_0 != "" || subject_1 != "" || subject_2 != "") {

                            oneTemplateNo += 1;
                            addHtml += '<div class="swiper-slide oneTemplate">';
                            if (_subimg != undefined && _subimg !='') {
                                addHtml += '<div class="TemplateImg LineTemplate" style="background-image:url(/CustomStickers/upload/image/' + _subimg + ');"></div>';
                                addHtml += '<div class="TemplateInfo"><h3>' + _subtitle + '</h3>';
                            }else{
                                addHtml += '<div class="TemplateInfo"  style="border-radius: 10px;"><h3>' + _subtitle + '</h3>'; 
                            }
                            addHtml += '<pre>' + _subcontent + '</pre>';
                            addHtml+='<ul>';
                            if (action_0!='noaction'){
                                addHtml+='<li>'+ subject_0 +'</li>';
                            }
                            if (action_1!='noaction'){
                                addHtml+='<li>'+ subject_1 +'</li>';
                            }
                            if (action_2!='noaction'){
                                addHtml+='<li>'+ subject_2 +'</li>';
                            }
                            addHtml+='</ul></div></div>';

                        }
                    }
                    break;
                case 'ImageCarousel':
                    var ImageCarousel = JSON.parse($(this).attr('data-json'));
                    for (i = 0; i < 10; i++) {
                        // 取值
                        var _subtitle = ImageCarousel['subject']['subject'+i+'_0'];
                        var _subimg = ImageCarousel['subject']['img'+i];
                        //只要有任何一欄有值、就創建整塊
                        if ( _subtitle!="" && _subimg!=undefined){
                            oneTemplateNo+=1;
                            addHtml+='<div class="swiper-slide oneTemplate">';
                            addHtml+='<div class="TemplateImg ImageCarousel" style="background-image:url(/CustomStickers/upload/image/'+_subimg+');"><h3>'+ _subtitle +'</h3></div>';
                            addHtml+='</div>';
                        }
                    }
                    break;
                case 'QuicklyReply':
                    var QuicklyReply = JSON.parse($(this).attr('data-json'));
                    for (i = 0; i < 10; i++) {

                        // 取值
                        var _subtitle = QuicklyReply['subject']['subject'+i+'_0'];
                        var _subimg = QuicklyReply['subject']['pic'+i];
                        _subimg = _subimg ? _subimg : '';


                        //只要有任何一欄有值、就創建整塊
                        if ( _subtitle!="" && _subimg!=undefined ){
                            oneTemplateNo+=1;
                            addHtml+='<div class="quickReplyItem">';
                            if (_subimg!=""){
                                addHtml+='<span style="background-image:url(/CustomStickers/upload/image/'+_subimg+');"></span>';
                            }
                            addHtml+=_subtitle;
                            addHtml+='</div>';
                        }
                    }
                    break;
                case 'Flex':
                    break;
            }
            $('.PhoneContent.'+$(this).attr('data-type')+' .TemplateBG').html(addHtml).css('min-width', 270*oneTemplateNo+'px').show();
            $('#SaveMsg'+SelectMsg).val($(this).attr('data-id'));
            $('#msgview'+SelectMsg).html($('.PhoneContent.'+$(this).attr('data-type')).html());
        });
        LoadMsg();
        //window.setTimeout(( () => LoadMsg() ), 1000);
    });
    function LoadMsg(){
        for(var i=0;i<5;i++){
            EditMsg(i, 'load');
        }
        if('<?php echo $_smarty_tpl->getVariable('row')->value['subject']['QuicklyReply'];?>
'){
            EditMsg(5, 'load');
        }
    }
    //表情代碼寫入
    function InsertContent(Content) {
        var myArea = $('#textValue');
        if (document.selection) { //for IE
            myArea.focus();
            var mySelection = document.selection.createRange();
            mySelection.text = Content;
        } else { //for FireFox
            var myPrefix = myArea.val().substr(0, myArea[0].selectionStart); // 取出游標之前
            var mySuffix = myArea.val().substr(myArea[0].selectionEnd); //取出游標之後
            myArea.val(myPrefix + Content + mySuffix);
        }
        UpdateMsg();
    }
    function UpdateMedia(action){
        if(action === 'new'){
            $('#SaveMsg'+SelectMsg).val('');
        }
        var MsgType = $('#MsgType'+SelectMsg).val();
        var ShowBox = '';
        var PreView = '';
        var PreType = '';
        switch(MsgType){
            case 'image':
                ShowBox = '#ShowImageBox';
                PreView = '#previews_img';
                break;
            case 'video':
                 ShowBox = '#ShowVideoBox';
                PreView = '#previews_video';
                break;
            case 'audio':
                 ShowBox = '#ShowAudioBox';
                PreView = '#previews_audio';
                break;
        }
        PreType = ShowBox + ' '+PreView+SelectMsg;
        $('#msgview'+SelectMsg).html($(PreType).clone());
        if(action === 'new'){
            $(ShowBox).click();
        }
    }
</script>

<!--  彈出 文字  Modal  -->
<div id="ShowTextBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" style="padding: 20vh 0px;">
                <textarea id="textValue" type="text" class="form-control" rows="10" onchange="UpdateMsg();"></textarea>
                <?php if (!$_smarty_tpl->getVariable('notify')->value){?>
                    <div class="btn btn-primary btn-sm BtnEmoticon" data-toggle="modal" data-target="#ShowkaomojiBox">  </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<!--  彈出 表情  Modal  -->
<div id="ShowkaomojiBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <!-- Modal content-->
        <div class="modal-content">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#emoticon" data-toggle="tab" aria-expanded="false">表情</a></li>
                <li class=""><a href="#kaomoji" data-toggle="tab" aria-expanded="true">表情符號</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="emoticon">
                    <ul>
                            <!-- <li data-img="(hee)"><img src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/10018C_k.png"></li> 由data.json載入 -->
                    </ul>
                </div>
                <div class="tab-pane fade" id="kaomoji">
                    <ul>
                        <li>p(^-^q)</li> <li>(´▽｀)</li> <li>(￣ー￣)</li> <li>(⌒∩⌒)</li> <li>( ^ω^)</li> <li>ψ(｀∇´)ψ</li> <li>(＾v＾)</li> <li>(*^-^*)</li> <li>(*^o^*)</li> <li>(-^〇^-)</li> <li>(*≧∇≦*)</li> <li>(///▽///)</li> <li>(`o´)</li> <li>(｀А´)</li> <li>(･A･)</li> <li>(*｀＾´)=3</li> <li>(* - -)</li> <li>( #｀Д´)</li> <li>(｀ε´)</li> <li>( *｀ω´)</li> <li>(o｀з’*)</li> <li>【o´ﾟ□ﾟ`o】</li> <li>σ(oдolll)</li> <li>σ(o'ω'o)</li> <li>Σ(=ω= ;)</li> <li>Σ(´д｀;)</li> <li>(^-^;</li> <li>(-o-;)</li> <li>(::^ω^::)</li> <li>(；´Д`A</li> <li>(^◇^;)</li> <li>(´c_,｀lll)</li> <li>(&gt;_&lt;)</li> <li>(*´&gt;д&lt;)</li> <li>('A`)</li> <li>(T-T)</li> <li>(；_；)</li> <li>(/_T)</li> <li>(T.T ) ( T.T)</li> <li>(´;ω;`)</li> <li>(´；ω；｀)</li> <li>(P'_`)q</li> <li>( . .)</li> <li>(・_・)</li> <li>(・。・)</li> <li>(・_・｜</li> <li>(ё_ё)</li> <li>d(-_^)</li> <li>(^3^)</li> <li>(*'A^q)</li> <li>(^_^)/</li> <li>φ(._.)</li> <li>＼(^o^)／</li> <li>(* -_･)oO○</li> <li>(=^ェ^=)</li> <li>u・ェ・u</li> <li>▽・ｗ・▽</li> <li>（・◇・）/~~~</li> <li>( ´Д`)y━･~~</li> <li>( ^ ^ )/■</li> <li>＼(^^＼)</li> <li>（*´з)(ε｀*)</li> <li>...φ(･ω･*)☆</li>  
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 貼圖  Modal  -->
<div id="ShowStickerBox" class="modal fade" role="dialog">
    <div class="modal-dialog tag-7">
        <!-- Modal content-->
        <div class="modal-content">
            <h3>貼圖</h3>
            <ul class="nav nav-tabs">
                <?php if (!$_smarty_tpl->getVariable('notify')->value){?>
                    <li class="active"><a href="#ImgType01" data-toggle="tab" aria-expanded="false"><img src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/tab_on_1.png"></a></li>   
                    <li class=""><a href="#ImgType02" data-toggle="tab" aria-expanded="false"><img src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/tab_on_2.png"></a></li> 
                    <li class=""><a href="#ImgType03" data-toggle="tab" aria-expanded="false"><img src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/tab_on_3.png"></a></li>
                <?php }?>
                <!-- 新增貼圖 -->
                <li class="<?php if ($_smarty_tpl->getVariable('notify')->value){?>active<?php }?>"><a href="#ImgType04" data-toggle="tab" aria-expanded="false"><img src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/tab_on_4.png"></a></li>
                <li class=""><a href="#ImgType05" data-toggle="tab" aria-expanded="true"><img src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/tab_on_5.png"></a></li>
                <li class=""><a href="#ImgType06" data-toggle="tab" aria-expanded="true"><img src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/tab_on_6.png"> </a></li>
                <li class=""><a href="#ImgType07" data-toggle="tab" aria-expanded="true"><img src="<?php echo $_smarty_tpl->getVariable('__RES_Web')->value;?>
/images/tab_on_7.png"> </a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade ImgType <?php if (!$_smarty_tpl->getVariable('notify')->value){?>active in<?php }?>" id="ImgType01">
                    <ul>
                        <li data-stkid="11537_52002734"></li><li data-stkid="11537_52002735"></li><li data-stkid="11537_52002736"></li><li data-stkid="11537_52002737"></li><li data-stkid="11537_52002738"></li><li data-stkid="11537_52002739"></li><li data-stkid="11537_52002740"></li><li data-stkid="11537_52002741"></li><li data-stkid="11537_52002742"></li><li data-stkid="11537_52002743"></li><li data-stkid="11537_52002744"></li><li data-stkid="11537_52002745"></li><li data-stkid="11537_52002746"></li><li data-stkid="11537_52002747"></li><li data-stkid="11537_52002748"></li><li data-stkid="11537_52002749"></li><li data-stkid="11537_52002750"></li><li data-stkid="11537_52002751"></li><li data-stkid="11537_52002752"></li><li data-stkid="11537_52002753"></li><li data-stkid="11537_52002754"></li><li data-stkid="11537_52002755"></li><li data-stkid="11537_52002756"></li><li data-stkid="11537_52002757"></li><li data-stkid="11537_52002758"></li><li data-stkid="11537_52002759"></li><li data-stkid="11537_52002760"></li><li data-stkid="11537_52002761"></li><li data-stkid="11537_52002762"></li><li data-stkid="11537_52002763"></li><li data-stkid="11537_52002764"></li><li data-stkid="11537_52002765"></li><li data-stkid="11537_52002766"></li><li data-stkid="11537_52002767"></li><li data-stkid="11537_52002768"></li><li data-stkid="11537_52002769"></li><li data-stkid="11537_52002770"></li><li data-stkid="11537_52002771"></li><li data-stkid="11537_52002772"></li><li data-stkid="11537_52002773"></li>
                    </ul>
                </div>
                <div class="tab-pane fade ImgType" id="ImgType02">
                    <ul>
                        <li data-stkid="11538_51626494"></li><li data-stkid="11538_51626495"></li><li data-stkid="11538_51626496"></li><li data-stkid="11538_51626497"></li><li data-stkid="11538_51626498"></li><li data-stkid="11538_51626499"></li><li data-stkid="11538_51626500"></li><li data-stkid="11538_51626501"></li><li data-stkid="11538_51626502"></li><li data-stkid="11538_51626503"></li><li data-stkid="11538_51626504"></li><li data-stkid="11538_51626505"></li><li data-stkid="11538_51626506"></li><li data-stkid="11538_51626507"></li><li data-stkid="11538_51626508"></li><li data-stkid="11538_51626509"></li><li data-stkid="11538_51626510"></li><li data-stkid="11538_51626511"></li><li data-stkid="11538_51626512"></li><li data-stkid="11538_51626513"></li><li data-stkid="11538_51626514"></li><li data-stkid="11538_51626515"></li><li data-stkid="11538_51626516"></li><li data-stkid="11538_51626517"></li><li data-stkid="11538_51626518"></li><li data-stkid="11538_51626519"></li><li data-stkid="11538_51626520"></li><li data-stkid="11538_51626521"></li><li data-stkid="11538_51626522"></li><li data-stkid="11538_51626523"></li><li data-stkid="11538_51626524"></li><li data-stkid="11538_51626525"></li><li data-stkid="11538_51626526"></li><li data-stkid="11538_51626527"></li><li data-stkid="11538_51626528"></li><li data-stkid="11538_51626529"></li><li data-stkid="11538_51626530"></li><li data-stkid="11538_51626531"></li><li data-stkid="11538_51626532"></li><li data-stkid="11538_51626533"></li>
                    </ul>
                </div>
                <div class="tab-pane fade ImgType" id="ImgType03">
                    <ul>
                        <li data-stkid="11539_52114110"></li><li data-stkid="11539_52114111"></li><li data-stkid="11539_52114112"></li><li data-stkid="11539_52114113"></li><li data-stkid="11539_52114114"></li><li data-stkid="11539_52114115"></li><li data-stkid="11539_52114116"></li><li data-stkid="11539_52114117"></li><li data-stkid="11539_52114118"></li><li data-stkid="11539_52114119"></li><li data-stkid="11539_52114120"></li><li data-stkid="11539_52114121"></li><li data-stkid="11539_52114122"></li><li data-stkid="11539_52114123"></li><li data-stkid="11539_52114124"></li><li data-stkid="11539_52114125"></li><li data-stkid="11539_52114126"></li><li data-stkid="11539_52114127"></li><li data-stkid="11539_52114128"></li><li data-stkid="11539_52114129"></li><li data-stkid="11539_52114130"></li><li data-stkid="11539_52114131"></li><li data-stkid="11539_52114132"></li><li data-stkid="11539_52114133"></li><li data-stkid="11539_52114134"></li><li data-stkid="11539_52114135"></li><li data-stkid="11539_52114136"></li><li data-stkid="11539_52114137"></li><li data-stkid="11539_52114138"></li><li data-stkid="11539_52114139"></li><li data-stkid="11539_52114140"></li><li data-stkid="11539_52114141"></li><li data-stkid="11539_52114142"></li><li data-stkid="11539_52114143"></li><li data-stkid="11539_52114144"></li><li data-stkid="11539_52114145"></li><li data-stkid="11539_52114146"></li><li data-stkid="11539_52114147"></li><li data-stkid="11539_52114148"></li><li data-stkid="11539_52114149"></li>
                    </ul>
                </div>
                <!-- 新增貼圖 -->
                <div class="tab-pane fade ImgType <?php if ($_smarty_tpl->getVariable('notify')->value){?>active in<?php }?>" id="ImgType04">
                    <ul>
                        <li data-stkid="1_4"></li><li data-stkid="1_13"></li><li data-stkid="1_2"></li><li data-stkid="1_10"></li><li data-stkid="1_17"></li><li data-stkid="1_401"></li><li data-stkid="1_402"></li><li data-stkid="1_5"></li><li data-stkid="1_15"></li><li data-stkid="1_1"></li><li data-stkid="1_3"></li><li data-stkid="1_16"></li><li data-stkid="1_403"></li><li data-stkid="1_404"></li><li data-stkid="1_405"></li><li data-stkid="1_406"></li><li data-stkid="1_11"></li><li data-stkid="1_7"></li><li data-stkid="1_21"></li><li data-stkid="1_14"></li><li data-stkid="1_8"></li><li data-stkid="1_9"></li><li data-stkid="1_12"></li><li data-stkid="1_6"></li><li data-stkid="1_100"></li><li data-stkid="1_101"></li><li data-stkid="1_102"></li><li data-stkid="1_103"></li><li data-stkid="1_104"></li><li data-stkid="1_105"></li><li data-stkid="1_106"></li><li data-stkid="1_107"></li><li data-stkid="1_108"></li><li data-stkid="1_109"></li><li data-stkid="1_110"></li><li data-stkid="1_111"></li><li data-stkid="1_112"></li><li data-stkid="1_113"></li><li data-stkid="1_114"></li><li data-stkid="1_115"></li><li data-stkid="1_116"></li><li data-stkid="1_117"></li><li data-stkid="1_118"></li><li data-stkid="1_407"></li><li data-stkid="1_408"></li><li data-stkid="1_409"></li><li data-stkid="1_410"></li><li data-stkid="1_411"></li><li data-stkid="1_412"></li><li data-stkid="1_413"></li><li data-stkid="1_414"></li><li data-stkid="1_415"></li><li data-stkid="1_416"></li><li data-stkid="1_417"></li><li data-stkid="1_418"></li><li data-stkid="1_419"></li><li data-stkid="1_420"></li><li data-stkid="1_421"></li><li data-stkid="1_422"></li><li data-stkid="1_423"></li><li data-stkid="1_424"></li><li data-stkid="1_425"></li><li data-stkid="1_426"></li><li data-stkid="1_427"></li><li data-stkid="1_428"></li><li data-stkid="1_429"></li><li data-stkid="1_430"></li><li data-stkid="1_119"></li><li data-stkid="1_120"></li><li data-stkid="1_121"></li><li data-stkid="1_122"></li><li data-stkid="1_123"></li><li data-stkid="1_124"></li><li data-stkid="1_125"></li><li data-stkid="1_126"></li><li data-stkid="1_127"></li><li data-stkid="1_128"></li><li data-stkid="1_129"></li><li data-stkid="1_130"></li><li data-stkid="1_131"></li><li data-stkid="1_132"></li><li data-stkid="1_133"></li><li data-stkid="1_134"></li><li data-stkid="1_135"></li><li data-stkid="1_136"></li><li data-stkid="1_137"></li><li data-stkid="1_138"></li><li data-stkid="1_139"></li>
                    </ul>
                </div>
                <div class="tab-pane fade ImgType " id="ImgType05">
                    <ul>
                        <li data-stkid="2_140"></li><li data-stkid="2_141"></li><li data-stkid="2_142"></li><li data-stkid="2_143"></li><li data-stkid="2_501"></li><li data-stkid="2_502"></li><li data-stkid="2_503"></li><li data-stkid="2_144"></li><li data-stkid="2_145"></li><li data-stkid="2_146"></li><li data-stkid="2_147"></li><li data-stkid="2_504"></li><li data-stkid="2_505"></li><li data-stkid="2_506"></li><li data-stkid="2_507"></li><li data-stkid="2_148"></li><li data-stkid="2_149"></li><li data-stkid="2_150"></li><li data-stkid="2_151"></li><li data-stkid="2_152"></li><li data-stkid="2_153"></li><li data-stkid="2_154"></li><li data-stkid="2_155"></li><li data-stkid="2_19"></li><li data-stkid="2_508"></li><li data-stkid="2_509"></li><li data-stkid="2_510"></li><li data-stkid="2_511"></li><li data-stkid="2_512"></li><li data-stkid="2_513"></li><li data-stkid="2_18"></li><li data-stkid="2_38"></li><li data-stkid="2_514"></li><li data-stkid="2_515"></li><li data-stkid="2_516"></li><li data-stkid="2_156"></li><li data-stkid="2_158"></li><li data-stkid="2_157"></li><li data-stkid="2_517"></li><li data-stkid="2_518"></li><li data-stkid="2_519"></li><li data-stkid="2_520"></li><li data-stkid="2_159"></li><li data-stkid="2_521"></li><li data-stkid="2_522"></li><li data-stkid="2_523"></li><li data-stkid="2_524"></li><li data-stkid="2_525"></li><li data-stkid="2_22"></li><li data-stkid="2_34"></li><li data-stkid="2_32"></li><li data-stkid="2_23"></li><li data-stkid="2_526"></li><li data-stkid="2_527"></li><li data-stkid="2_39"></li><li data-stkid="2_33"></li><li data-stkid="2_24"></li><li data-stkid="2_25"></li><li data-stkid="2_27"></li><li data-stkid="2_29"></li><li data-stkid="2_30"></li><li data-stkid="2_31"></li><li data-stkid="2_26"></li><li data-stkid="2_160"></li><li data-stkid="2_161"></li><li data-stkid="2_162"></li><li data-stkid="2_163"></li><li data-stkid="2_164"></li><li data-stkid="2_165"></li><li data-stkid="2_166"></li><li data-stkid="2_167"></li><li data-stkid="2_168"></li><li data-stkid="2_169"></li><li data-stkid="2_170"></li><li data-stkid="2_171"></li><li data-stkid="2_172"></li><li data-stkid="2_173"></li><li data-stkid="2_174"></li><li data-stkid="2_175"></li><li data-stkid="2_176"></li><li data-stkid="2_177"></li><li data-stkid="2_178"></li><li data-stkid="2_179"></li><li data-stkid="2_37"></li><li data-stkid="2_36"></li><li data-stkid="2_46"></li><li data-stkid="2_35"></li><li data-stkid="2_28"></li><li data-stkid="2_20"></li><li data-stkid="2_42"></li><li data-stkid="2_41"></li><li data-stkid="2_47"></li><li data-stkid="2_43"></li><li data-stkid="2_45"></li><li data-stkid="2_40"></li><li data-stkid="2_44"></li>
                    </ul>
                </div>
                <div class="tab-pane fade ImgType " id="ImgType06">
                    <ul>
                        <li data-stkid="3_180"></li><li data-stkid="3_181"></li><li data-stkid="3_182"></li><li data-stkid="3_183"></li><li data-stkid="3_184"></li><li data-stkid="3_185"></li><li data-stkid="3_186"></li><li data-stkid="3_187"></li><li data-stkid="3_188"></li><li data-stkid="3_189"></li><li data-stkid="3_190"></li><li data-stkid="3_191"></li><li data-stkid="3_192"></li><li data-stkid="3_193"></li><li data-stkid="3_194"></li><li data-stkid="3_195"></li><li data-stkid="3_196"></li><li data-stkid="3_197"></li><li data-stkid="3_198"></li><li data-stkid="3_199"></li><li data-stkid="3_200"></li><li data-stkid="3_201"></li><li data-stkid="3_202"></li><li data-stkid="3_203"></li><li data-stkid="3_204"></li><li data-stkid="3_205"></li><li data-stkid="3_206"></li><li data-stkid="3_207"></li><li data-stkid="3_208"></li><li data-stkid="3_209"></li><li data-stkid="3_210"></li><li data-stkid="3_211"></li><li data-stkid="3_212"></li><li data-stkid="3_213"></li><li data-stkid="3_214"></li><li data-stkid="3_215"></li><li data-stkid="3_216"></li><li data-stkid="3_217"></li><li data-stkid="3_218"></li><li data-stkid="3_219"></li><li data-stkid="3_220"></li><li data-stkid="3_221"></li><li data-stkid="3_222"></li><li data-stkid="3_223"></li><li data-stkid="3_224"></li><li data-stkid="3_225"></li><li data-stkid="3_226"></li><li data-stkid="3_227"></li><li data-stkid="3_228"></li><li data-stkid="3_229"></li><li data-stkid="3_230"></li><li data-stkid="3_231"></li><li data-stkid="3_232"></li><li data-stkid="3_233"></li><li data-stkid="3_234"></li><li data-stkid="3_235"></li><li data-stkid="3_236"></li><li data-stkid="3_237"></li><li data-stkid="3_238"></li><li data-stkid="3_239"></li><li data-stkid="3_240"></li><li data-stkid="3_241"></li><li data-stkid="3_242"></li><li data-stkid="3_243"></li><li data-stkid="3_244"></li><li data-stkid="3_245"></li><li data-stkid="3_246"></li><li data-stkid="3_247"></li><li data-stkid="3_248"></li><li data-stkid="3_249"></li><li data-stkid="3_250"></li><li data-stkid="3_251"></li><li data-stkid="3_252"></li><li data-stkid="3_253"></li><li data-stkid="3_254"></li><li data-stkid="3_255"></li><li data-stkid="3_256"></li><li data-stkid="3_257"></li><li data-stkid="3_258"></li><li data-stkid="3_259"></li>
                    </ul>
                </div>
                <div class="tab-pane fade ImgType " id="ImgType07">
                    <ul>
                        <li data-stkid="4_263"></li><li data-stkid="4_264"></li><li data-stkid="4_265"></li><li data-stkid="4_266"></li><li data-stkid="4_267"></li><li data-stkid="4_268"></li><li data-stkid="4_601"></li><li data-stkid="4_602"></li><li data-stkid="4_603"></li><li data-stkid="4_604"></li><li data-stkid="4_605"></li><li data-stkid="4_606"></li><li data-stkid="4_260"></li><li data-stkid="4_261"></li><li data-stkid="4_262"></li><li data-stkid="4_607"></li><li data-stkid="4_269"></li><li data-stkid="4_270"></li><li data-stkid="4_271"></li><li data-stkid="4_272"></li><li data-stkid="4_273"></li><li data-stkid="4_608"></li><li data-stkid="4_274"></li><li data-stkid="4_275"></li><li data-stkid="4_276"></li><li data-stkid="4_277"></li><li data-stkid="4_278"></li><li data-stkid="4_609"></li><li data-stkid="4_610"></li><li data-stkid="4_282"></li><li data-stkid="4_283"></li><li data-stkid="4_291"></li><li data-stkid="4_279"></li><li data-stkid="4_280"></li><li data-stkid="4_281"></li><li data-stkid="4_284"></li><li data-stkid="4_285"></li><li data-stkid="4_611"></li><li data-stkid="4_286"></li><li data-stkid="4_612"></li><li data-stkid="4_288"></li><li data-stkid="4_289"></li><li data-stkid="4_613"></li><li data-stkid="4_614"></li><li data-stkid="4_615"></li><li data-stkid="4_290"></li><li data-stkid="4_616"></li><li data-stkid="4_617"></li><li data-stkid="4_292"></li><li data-stkid="4_293"></li><li data-stkid="4_294"></li><li data-stkid="4_295"></li><li data-stkid="4_296"></li><li data-stkid="4_618"></li><li data-stkid="4_619"></li><li data-stkid="4_287"></li><li data-stkid="4_297"></li><li data-stkid="4_298"></li><li data-stkid="4_299"></li><li data-stkid="4_300"></li><li data-stkid="4_301"></li><li data-stkid="4_302"></li><li data-stkid="4_620"></li><li data-stkid="4_303"></li><li data-stkid="4_304"></li><li data-stkid="4_305"></li><li data-stkid="4_306"></li><li data-stkid="4_307"></li><li data-stkid="4_621"></li><li data-stkid="4_622"></li><li data-stkid="4_623"></li><li data-stkid="4_624"></li><li data-stkid="4_625"></li><li data-stkid="4_629"></li><li data-stkid="4_627"></li><li data-stkid="4_628"></li><li data-stkid="4_626"></li><li data-stkid="4_630"></li><li data-stkid="4_631"></li><li data-stkid="4_632"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 圖文訊息  Modal  -->
<div id="ShowImageMapBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent ImageMap">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows_ImageMap')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr class="active" data-id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-type="ImageMap" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value);?>
'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        <?php if ($_smarty_tpl->getVariable('item')->value['subject']['img0']){?>
                                            <img class="img-responsive" alt="Image" src="/CustomStickers/upload/image/<?php echo $_smarty_tpl->getVariable('item')->value['subject']['img0'];?>
">
                                        <?php }else{ ?>
                                            <i class="fa fa-window-close"></i>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject'];?>

                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 卡片式選單  Modal  -->
<div id="ShowTemplateBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent LineTemplate">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows_LineTemplate')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr class="active" data-id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-type="LineTemplate" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value);?>
'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        <?php if ($_smarty_tpl->getVariable('item')->value['subject']['img0']){?>
                                            <img class="img-responsive" alt="Image" src="/CustomStickers/upload/image/<?php echo $_smarty_tpl->getVariable('item')->value['subject']['img0'];?>
">
                                        <?php }else{ ?>
                                            <i class="fa fa-window-close"></i>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->getVariable('item')->value['subject']['subtitle0'];?>

                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 大圖選單  Modal  -->
<div id="ShowImageCarouselBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent ImageCarousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows_ImageCarousel')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr class="active" data-id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-type="ImageCarousel" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value);?>
'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        <?php if ($_smarty_tpl->getVariable('item')->value['subject']['img0']){?>
                                            <img class="img-responsive" alt="Image" src="/CustomStickers/upload/image/<?php echo $_smarty_tpl->getVariable('item')->value['subject']['img0'];?>
">
                                        <?php }else{ ?>
                                            <i class="fa fa-window-close"></i>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject0_0'];?>

                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 照片  Modal  -->
<div id="ShowImageBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (4 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 4+1 - 0 : 0-(4)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                    <div id="UploadImage<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="UploadImage">
                        <label class="btn btn-info" style="float:right;">
                            <input style="display:none;" id="FILES_img<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="form-control" name="value_<?php echo $_smarty_tpl->getVariable('G')->value;?>
" onchange="init_inputImage(this, '<?php echo $_smarty_tpl->getVariable('G')->value;?>
');" type="file">
                            <i class="fa fa-photo"></i>上傳圖片
                        </label>
                        <img style="width:300px;height:200px;display: none;" class="img-thumbnail1" id="previews_img<?php echo $_smarty_tpl->getVariable('G')->value;?>
" src="#"/>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>
<!--  彈出 影片  Modal  -->
<div id="ShowVideoBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (4 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 4+1 - 0 : 0-(4)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                    <div id="UploadVideo<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="UploadVideo">
                        <label class="btn btn-info" style="float:right;">
                            <input style="display:none;" id="FILES_video<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="form-control" name="value_<?php echo $_smarty_tpl->getVariable('G')->value;?>
" onchange="init_inputVideo(this, '<?php echo $_smarty_tpl->getVariable('G')->value;?>
');" type="file" accept="video/mp4" maxsize="200MB">
                            <i class="fa fa-photo"></i>上傳影片
                        </label>
                        <video style="width:300px;height:200px;display: none;" class="img-thumbnail1" id="previews_video<?php echo $_smarty_tpl->getVariable('G')->value;?>
" crossorigin="anonymous" controls>
                            <source src="#">
                        </video>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>
<!--  彈出 語音訊息  Modal  -->
<div id="ShowAudioBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <?php $_smarty_tpl->tpl_vars['G'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['G']->step = (4 - (0) < 0) ? -1 : 1;$_smarty_tpl->tpl_vars['G']->total = (int)ceil(($_smarty_tpl->tpl_vars['G']->step > 0 ? 4+1 - 0 : 0-(4)+1)/abs($_smarty_tpl->tpl_vars['G']->step));
if ($_smarty_tpl->tpl_vars['G']->total > 0){
for ($_smarty_tpl->tpl_vars['G']->value = 0, $_smarty_tpl->tpl_vars['G']->iteration = 1;$_smarty_tpl->tpl_vars['G']->iteration <= $_smarty_tpl->tpl_vars['G']->total;$_smarty_tpl->tpl_vars['G']->value += $_smarty_tpl->tpl_vars['G']->step, $_smarty_tpl->tpl_vars['G']->iteration++){
$_smarty_tpl->tpl_vars['G']->first = $_smarty_tpl->tpl_vars['G']->iteration == 1;$_smarty_tpl->tpl_vars['G']->last = $_smarty_tpl->tpl_vars['G']->iteration == $_smarty_tpl->tpl_vars['G']->total;?>
                    <div id="UploadAudio<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="UploadAudio">
                        <label class="btn btn-info" style="float:right;">
                            <input style="display:none;" id="FILES_audio<?php echo $_smarty_tpl->getVariable('G')->value;?>
" class="form-control" name="value_<?php echo $_smarty_tpl->getVariable('G')->value;?>
" onchange="init_inputAudio(this, '<?php echo $_smarty_tpl->getVariable('G')->value;?>
');" type="file" accept="audio/x-m4a, audio/mp3" maxsize="10MB">
                            <i class="fa fa-photo"></i>上傳語音訊息
                        </label>
                        <audio class="img-thumbnail1" id="previews_audio<?php echo $_smarty_tpl->getVariable('G')->value;?>
" style="width:300px;height:200px;display: none;" controls>
                            <source src="#">
                        </audio>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>
<!--  彈出 Flex訊息  Modal  -->
<div id="ShowFlexBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                
            </div>
        </div>
    </div>
</div>
<!--  彈出 快捷語  Modal  -->
<div id="ShowQuicklyReplyBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent QuicklyReply">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG" style="text-align: left;">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows_QuicklyReply')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr class="active" data-id="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" data-type="QuicklyReply" data-json='<?php echo json_encode($_smarty_tpl->getVariable('item')->value);?>
'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        <?php if ($_smarty_tpl->getVariable('item')->value['subject']['img0']){?>
                                            <img class="img-responsive" alt="Image" src="/CustomStickers/upload/image/<?php echo $_smarty_tpl->getVariable('item')->value['subject']['img0'];?>
">
                                        <?php }else{ ?>
                                            <i class="fa fa-window-close"></i>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->getVariable('item')->value['subject']['subject0_0'];?>

                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>