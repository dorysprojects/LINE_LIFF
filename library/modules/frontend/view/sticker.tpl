<!DOCTYPE html>
<html>
    <head>
        <title>{#$ProjectName#}</title>
        {#include file=$__PublicView|cat:'head.tpl'#}
    </head>

    <body onselectstart="return false">
        {#include file=$__PublicView|cat:'top.tpl'#}

        <div id="enlarge_pic">
            {#$Html_close#}
            <img id="the_enlarge_pic" src="" class="pic_press">
        </div>
        <div id="upload_area">
            {#$Html_close2#}
            <div id="UploadLocalFile">上傳本地檔案:</div>
            {#$Html_upload_form#}
            <div id="piclink">圖片網址:</div>
            <input id="imgur_result" type="textbox" placeholder="建議上傳PNG、GIF檔案">
            <div id="send_url" onclick="send_url();">送出</div>
        </div>
        <div id="signature-pad" class="signature-pad">
            <div style="display:none;">
                <select id="choose_user" class="selector" onchange="choose_user(this);">
                    <option value="全部">全部 ({#count($store_names)#})</option>
                    {#foreach $store_names as $key=>$item#}
                        <option value="{#$item#}">{#$item#}({#$search_store_all_names.$item#})</option>
                    {#/foreach#}
                </select>
            </div>
            {#include file=$__PublicView|cat:'project_details.tpl'#}
            <div id="pic_details" class="press_background">
                <div class="press_button_area">
                    <div class="press_button">日期</div>
                    <img src="" class="pic_press">
                    <div id="pic_press_cancel" class="press_button" onclick="pic_press_cancel();">關閉</div>
                </div>
            </div>
            <div id="profile_details" class="press_background">
                <div class="press_button_area">
                    <img src="" class="the_profile_pic" onerror="this.src = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNf0Teecy2bqycPmLAMFuMoOd29LRhR4kKSofmjQq5TxDIXge_xw';">
                    <div id="name" class="profile"></div>
                    <div id="profile_statusMessage" class="profile"></div>
                    <div id="profile_press_cancel" class="press_button" onclick="profile_press_cancel();">關閉</div>
                </div>
            </div>
            <div id="press_background" class="press_background">
                <div id="press_button_area" class="press_button_area">
                    <div id="check_profile" class="press_button" onclick="check_profile();">查看個人資料</div>
                    <div id="add_favorite_btn" class="press_button" onclick="add_favorite();">加入我的最愛</div>
                    <div id="check_pic" class="press_button" onclick="check_pic();">查看圖片</div>
                    <div id="go_pic_link" class="press_button" onclick="go_pic_link();">前往圖片位址</div>
                    <div id="press_modify" class="press_button" onclick="press_modify();">編輯</div>
                    <div id="press_delete" class="press_button delete" onclick="press_delete();">刪除</div>
                    <div id="all_press_cancel" class="press_button" onclick="$(this).parent().parent().hide();">取消</div>
                </div>
            </div>
            <div class="signature-pad--body" style="overflow:auto;">
                <canvas id="canvas" width="307" height="331" style="touch-action:none;display:block;"></canvas>
                <div id="list_area" style="height: 100%;">
                    {#if $userId != ''#}
                        {#foreach $store_list as $key=>$item#}
                            <div id="push_pic{#$key+1#}" ctn="{#$key#}" data-id="{#$item.id#}" class="pic_block" onclick="push_pic($(this));">
                                {#if ($item.propertyB|substr:-3) == 'mp4'#}
                                    <!--<video class='pic' crossorigin='anonymous' src='{#$item.propertyB#}' autoplay></video>
                                    <svg width="20" height="20" style="position:absolute;margin-left:-20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
                                        <path id="heart{#$key+1#}" style="transition:fill ease-in .5s;{#if $item.viewA=='true'#}fill:rgb(206, 61, 61);{#else#}fill:#fff;{#/if#}" stroke="rgb(206, 61, 61)" stroke-width="40" stroke-linejoin="round" d="M412 79c-53-40-146-17-162 68-16-85-109-108-162-68-43 32-55 94-44 137 30 119 194 217 206 224 12-7 176-105 206-224 11-43-1-105-44-137z"></path>
                                    </svg>-->
                                    <img class='pic' crossorigin='anonymous' src='{#$item.propertyB#}'>
                                    <svg width="20" height="20" style="position:absolute;margin-left:-20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
                                        <path id="heart{#$key+1#}" style="transition:fill ease-in .5s;{#if $item.viewA=='true'#}fill:rgb(206, 61, 61);{#else#}fill:#fff;{#/if#}" stroke="rgb(206, 61, 61)" stroke-width="40" stroke-linejoin="round" d="M412 79c-53-40-146-17-162 68-16-85-109-108-162-68-43 32-55 94-44 137 30 119 194 217 206 224 12-7 176-105 206-224 11-43-1-105-44-137z"></path>
                                    </svg>
                                {#else#}
                                    <img class='pic' crossorigin='anonymous' src='{#$item.propertyB#}'>
                                    <svg width="20" height="20" style="position:absolute;margin-left:-20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
                                        <path id="heart{#$key+1#}" style="transition:fill ease-in .5s;{#if $item.viewA=='true'#}fill:rgb(206, 61, 61);{#else#}fill:#fff;{#/if#}" stroke="rgb(206, 61, 61)" stroke-width="40" stroke-linejoin="round" d="M412 79c-53-40-146-17-162 68-16-85-109-108-162-68-43 32-55 94-44 137 30 119 194 217 206 224 12-7 176-105 206-224 11-43-1-105-44-137z"></path>
                                    </svg>
                                {#/if#}
                            </div>
                        {#/foreach#}
                    {#/if#}
                </div>
            </div>
            <div class="signature-pad--footer">
                <div id="addarea" style="">
                    <div id='DrawArea'>
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div id="ProjectListBtn" class="button" onclick="$('#project_details').show();$('.press_button_area>#CloseBtn').show();"><i class="fa fa-fw fa-th-list"></i></div>
                                    <span>
                                        <input id="List_input" name="List_input" type="checkbox" style="display: none;" onchange="List(this);">
                                        <label for="List_input"><div id="List" class="button"><i class="fa fa-fw fa-th-large"></i></div></label>
                                    </span>
                                    <div id="upload_btn" class="button" onclick="upload_btn(this);"><i class="fa fa-fw fa-cloud-upload"></i></div>
                                    <div class="button" onclick="SendSticker();"><i class="fa fa-fw fa-send"></i></div>
                                </div>
                                <div class="swiper-slide">
                                    <span>
                                        <input id="add_word_input" name="add_word_input" type="checkbox" style="display: none;" onchange="change_word(this);">
                                        <label for="add_word_input"><div id="add_word" class="button"><i class="fa fa-fw fa-font"></i></div></label>
                                    </span>
                                    <div id="choose_color" class="button" onclick="change_color(this);"><i class="fa fa-fw fa-paint-brush"></i></div>
                                    <div id="the_return" class="button" data-action="the_return"><i class="fa fa-fw fa-undo"></i></div>
                                    <div id="clear" class="button" data-action="clear_all"><i class="fa fa-fw fa-remove"></i></div>
                                </div>
                                <div class="swiper-slide" style="display:none;">
                                    <div id="choose_width" class="button" onclick="change_width(this);"><i class="fa fa-fw fa-bold"></i></div>
                                    <span>
                                        <input id="erase_input" name="erase_input" type="checkbox" style="display: none;">
                                        <label for="erase_input"><div id="erase" class="button"><i class="fa fa-fw fa-eraser"></i></div></label>
                                    </span>
                                    <div id="the_download_btn" class="button" onclick="the_download(this);"><i class="fa fa-fw fa-cloud-download"></i></div>
                                </div>
                            </div>
                            <div class="swiper-pagination" style="margin-bottom: -15px;"></div>
                        </div>
                    </div>
                    <div id="change_color" class="EditArea" style="">
                        <div onclick="$(this).parent().hide();" data-action="change_the_color" class="X"><i class="fa fa-close" style="font-size: 25px;"></i></div>
                        <form id="form" style="background-color:#f4f4f4;margin-top: 40px;">
                            <input type="text" id="color" name="color" value="#000000">
                        </form>
                        <div id="picker" style="background-color:#f4f4f4;">
                            <div class="farbtastic">
                                <div class="color" style="background-color: rgb(255, 0, 15);"></div>
                                <div class="wheel"></div>
                                <div class="overlay"></div>
                                <div class="h-marker marker" style="left: 92px; top: 13px;"></div>
                                <div class="sl-marker marker" style="left: 74px; top: 90px;"></div>
                            </div>
                        </div>
                    </div>
                    <div id="change_width" class="EditArea" style="">
                        {#$Html_close#}
                        <select id="select_width" class="selector" onchange="select_width(this);" /*data-action="select_width"*/>
                            {#for $trg=1 to 30#}
                                <option value="{#$trg#}">{#$trg#}</option>
                            {#/for#}
                        </select>
                    </div>
                    <div id="the_download" class="EditArea" style="">
                        {#$Html_close#}
                        <div id="the_png" class="button" data-action="the_png">png</div>
                        <div id="the_jpg" class="button" data-action="the_jpg">jpg</div>
                        <div id="the_svg" class="button" data-action="the_svg">svg</div>
                    </div>
                    <div id="change_word" class="EditArea" style="padding:50px 0px;">
                        {#$Html_close#}
                        <div class="word_div" style="display:none;">X座標</div>
                        <input id="add_word_x" class="word_input" type="text" placeholder="輸入X" value="0" style="display:none;">
                        <div class="word_div" style="display:none;">Y座標</div>
                        <input id="add_word_y" class="word_input" type="text" placeholder="輸入Y" value="0" style="display:none;">
                        <div class="word_div">內容</div>
                        <input id="add_word_text" class="word_input" type="text" placeholder="輸入文字">
                        <div class="word_div">字的大小</div>
                        <input id="add_word_size" class="word_input" type="tel" placeholder="輸入數字" value="20" onkeyup="value = value.replace(/[^\d]/g, '')" onblur="location.href = '#send';">
                        <div class="word_div" style="display:none">字型</div>
                        <select id="select_family" class="selector" style="display:none">
                            {#foreach $family as $key=>$item#}
                                <option value="{#$item#}">{#$BubbleSizeZhTw.$item#}</option>
                            {#/foreach#}
                        </select>
                        <div class="button" style="width:85%;border-radius:20px;margin-top:20px;" onclick="add_word($('#add_word_x').val(), ($('#add_word_y').val() * 1 + $('#add_word_size').val() * 0.8), $('#add_word_text').val(), $('#add_word_size').val() + 'px', document.getElementById('color').style.backgroundColor, 'true', $('#select_width').val(), 'false', $('#select_family').val())">確定新增</div>
                    </div>
                </div>

                <div class="signature-pad--actions" style="display:none">
                    <div>
                        <button type="button" class="button clear" data-action="clear">Clear</button>
                        <button type="button" class="button" data-action="change-color">Change color</button>
                        <button type="button" class="button" data-action="undo">Undo</button>
                    </div>
                    <div>
                        <button type="button" class="button save" data-action="save-png">PNG</button>
                        <button type="button" class="button save" data-action="save-jpg">JPG</button>
                        <button type="button" class="button save" data-action="save-svg">SVG</button>
                    </div>
                </div>
            </div>
        </div>

        {#include file=$__PublicView|cat:'footer.tpl'#}

        <script>
            var store_datetime = ["{#$store_datetime#}"];

            function push_pic(obj) {
                var nowTime = new Date().getTime();
                console.log(nowTime+'/'+lastClickTime+'='+(nowTime-lastClickTime));
                if (nowTime - lastClickTime < 400) {
                    lastClickTime = 0;
                    clickTimer && clearTimeout(clickTimer);
                    /*雙擊*/
                    dbl_push_pic(obj);
                } else {
                    lastClickTime = nowTime;
                    clickTimer = setTimeout(() => {
                        /*單擊*/
                        var pic_url = obj.find('.pic').attr("src");
                        swal({
                            type: 'warning',
                            title: '請選擇',
                            cancelButtonText: '分享',
                            showCancelButton: true,
                            text: '',
                            confirmButtonText: '直接傳送'})
                        .then(function () {
                            xajax_StickerSendMedia('self', pic_url);
                        }, function (dismiss) {
                            if (dismiss === 'cancel') {
                                xajax_StickerSendMedia('share', pic_url);
                            }
                        });
                    }, 400);
                }
            }

            function dbl_push_pic(obj) {
                var id = obj.attr('data-id');
                var pic_url = obj.find('.pic').attr("src");
                var favorite = '';
                if (obj.find('svg>path').css("fill") == "rgb(206, 61, 61)") {
                    obj.find('svg>path').css("fill", "#fff");
                    favorite = "false";
                } else {
                    obj.find('svg>path').css("fill", "rgb(206, 61, 61)");
                    favorite = "true";
                }

                xajax_AddFavorite('sticker', id, favorite);
            }

            function add_favorite() {
                dbl_push_pic($("#push_pic" + the_id));
                $('#press_background').hide();
            }

            function change_color(obj) {
                $("#change_color").show();
            }

            function change_width(obj) {
                $("#change_width").show();
            }

            function the_download(obj) {
                $("#the_download").show();
            }

            function change_word(obj) {
                if (obj.checked) {
                    $("#change_word").show();
                } else {
                    $('#change_word').hide();
                }
            }

            function select_width(obj) {
                var ele_value = obj.value;
                //signaturePad.minWidth = ele_value;
                signaturePad.maxWidth = ele_value;
                //signaturePad.dotSize = ele_value;

                var data = signaturePad.toData();
                signaturePad.fromData(data);

                $('#change_width').hide();
            }

            function choose_user(obj) {
                for (ak = 0; ak < document.getElementById("list_area").childNodes.length; ak++) {
                    if (　(obj.value == $("#push_pic" + (ak + 1)).children().eq(1).html()) || (obj.value == '全部')) {
                        $("#push_pic" + (ak + 1)).css('display', 'inline-block');
                    } else {
                        $("#push_pic" + (ak + 1)).hide();
                    }
                }
            }

            function List(obj) {
                var userId = $("#userId").html();
                if (userId == '') {
                    userId = '{#$userId#}';
                }
                var displayName = $("#userId").html();
                var pictureUrl = $("#pictureUrl").html();
                var statusMessage = $("#statusMessage").html();
                if ('{#$userId#}' == '') {
                    location.href = '{#$__CustomStickers_Web#}/ft/sticker?' + 'project=手畫貼圖' + '&pic_url=' + pic_url;
                }

                if (ManagerList.indexOf(userId) != '-1') {
                    more = 'true';
                    store_all_id = ["{#$store_all_id#}"];
                    store_all_pic = ["{#$store_all_pic#}"];
                    store_all_name = ["{#$store_all_name#}"];
                    store_all_profile_pic = ["{#$store_all_profile_pic#}"];
                    store_all_profile_statusMessage = ["{#$store_all_profile_statusMessage#}"];
                    store_all_datetime = ["{#$store_all_datetime#}"];
                    store_all_favorite = ["{#$store_all_favorite#}"];

                    if (document.getElementById('List_input').checked) {
                        document.getElementById('choose_user').parentNode.style = "display:block;position:absolute;z-index:2;right:0;top:0;";
                    } else {
                        document.getElementById('choose_user').parentNode.style = "display:none";
                    }

                    document.getElementsByClassName('signature-pad--body')[0].removeChild(document.getElementById('list_area'));
                    var div = document.createElement('div');
                    div.id = "list_area";
                    div.style.display = "block";
                    //div.style.overflow = "auto";
                    document.getElementsByClassName('signature-pad--body')[0].appendChild(div);
                    for (ik = 0; ik < store_all_pic.length; ik++) {
                        var div2 = document.createElement('div');
                        if (store_all_pic[ik].substr(store_all_pic[ik].length - 3) == 'mp4') {
                            //div2.innerHTML = "<div class='pic_block' data-id='"+store_all_id[ik]+"' onclick='push_pic($(this));'><video class='pic' autoplay></video><div class='name'></div><svg width='20' height='20' style='position:absolute;margin-left:-20px;background:#fff;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 500 500'><path style='transition:fill ease-in .5s;fill:#fff;' stroke='rgb(206, 61, 61)' stroke-width='40' stroke-linejoin='round' d='M412 79c-53-40-146-17-162 68-16-85-109-108-162-68-43 32-55 94-44 137 30 119 194 217 206 224 12-7 176-105 206-224 11-43-1-105-44-137z'></path></svg></div>";
                            div2.innerHTML = "<div class='pic_block' data-id='"+store_all_id[ik]+"' onclick='push_pic($(this));'><img class='pic'><div class='name'></div><svg width='20' height='20' style='position:absolute;margin-left:-20px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 500 500'><path style='transition:fill ease-in .5s;fill:#fff;' stroke='rgb(206, 61, 61)' stroke-width='40' stroke-linejoin='round' d='M412 79c-53-40-146-17-162 68-16-85-109-108-162-68-43 32-55 94-44 137 30 119 194 217 206 224 12-7 176-105 206-224 11-43-1-105-44-137z'></path></svg></div>";
                        } else {
                            div2.innerHTML = "<div class='pic_block' data-id='"+store_all_id[ik]+"' onclick='push_pic($(this));'><img class='pic'><div class='name'></div><svg width='20' height='20' style='position:absolute;margin-left:-20px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 500 500'><path style='transition:fill ease-in .5s;fill:#fff;' stroke='rgb(206, 61, 61)' stroke-width='40' stroke-linejoin='round' d='M412 79c-53-40-146-17-162 68-16-85-109-108-162-68-43 32-55 94-44 137 30 119 194 217 206 224 12-7 176-105 206-224 11-43-1-105-44-137z'></path></svg></div>";
                        }
                        div2.childNodes[0].id = "push_pic" + (ik + 1);
                        div2.childNodes[0].childNodes[0].src = store_all_pic[ik];
                        div2.childNodes[0].childNodes[1].id = "push_name" + (ik + 1);
                        div2.childNodes[0].childNodes[1].innerHTML = store_all_name[ik];
                        div2.childNodes[0].childNodes[2].childNodes[0].id = "heart" + (ik + 1);
                        if (store_all_favorite[ik] == "true") {
                            div2.childNodes[0].childNodes[2].childNodes[0].style.fill = "rgb(206, 61, 61)";
                        } else {
                            div2.childNodes[0].childNodes[2].childNodes[0].style.fill = "#fff";
                        }
                        div.appendChild(div2);
                        div.appendChild(div2.childNodes[0]);
                        div.removeChild(div2);
                    }
                    add_press();
                    //alert(document.getElementById("list_area").childNodes[0].childNodes[0].childNodes[20].src);
                }
                if (obj.checked) {
                    $("#list_area").show();
                    $('#canvas').css('visibility', 'hidden').hide();
                } else {
                    $('#list_area').hide();
                    $('#canvas').css('visibility', 'visible').show();
                    resizeCanvas();
                }
            }

            function add_press() {
                for (iu = 0; iu < document.getElementsByClassName('pic_block').length; iu++) {
                    var hammer = new Hammer(document.getElementById('push_pic' + (iu + 1)));
                    hammer.on('press', function (ev) {
                        the_div = ev.target.parentNode;
                        the_pic = ev.target;
                        the_name = ev.target.parentNode.childNodes[1];
                        the_id = ev.target.parentNode.id.substr(8);
                        if (the_div.childNodes.length != 3) {
                            $('#check_profile').hide();
                        } else {
                            $("#check_profile").show();
                        }
                        if ($("#heart" + the_id).css('fill') == "rgb(206, 61, 61)") {
                            $("#add_favorite_btn").html('從我的最愛中移除');
                        } else {
                            $("#add_favorite_btn").html('加入我的最愛');
                        }
                        $("#press_background").show();
                    });
                }
            }

            function check_profile() {
                $("#profile_details").show();
                if ((store_all_profile_pic[the_id - 1] == '') || (store_all_profile_pic[the_id - 1] == 'undefined')) {
                    document.getElementById("profile_details").childNodes[1].childNodes[1].src = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0EWMqtjIbLunngIFIiHscmfS11Z8X__traP69mwbmB_f2sxv8';
                } else {
                    document.getElementById("profile_details").childNodes[1].childNodes[1].src = store_all_profile_pic[the_id - 1];
                }
                document.getElementById("profile_details").childNodes[1].childNodes[3].innerHTML = store_all_name[the_id - 1];
                if ((store_all_profile_statusMessage[the_id - 1] == '') || (store_all_profile_statusMessage[the_id - 1] == 'undefined')) {
                    $('#profile_details').children().eq(1).children().eq(5).hide();
                } else {
                    $("#profile_details").show();
                    document.getElementById("profile_details").childNodes[1].childNodes[5].innerHTML = store_all_profile_statusMessage[the_id - 1];
                }
                $('#press_background').hide();
            }

            function check_pic() {
                $("#pic_details").show();
                if (more == 'true') {
                    document.getElementById("pic_details").childNodes[1].childNodes[1].innerHTML = store_all_datetime[the_id - 1];
                } else {
                    document.getElementById("pic_details").childNodes[1].childNodes[1].innerHTML = store_datetime[the_id - 1];
                }
                document.getElementById("pic_details").childNodes[1].childNodes[3].src = the_pic.src;
                $('#press_background').hide();
            }

            function press_modify() {
                $('#press_background').hide();
                $('#List').click();

                signaturePad.clear();
                getDataUrl(the_pic.src);

                touchCount = 1;
            }

            function getDataUrl(SRC){
                var canva = document.getElementById("canvas");

                var image = new Image();
                image.crossOrigin = "anonymous";
                image.src = SRC;
                image.onload=function(){
                   canva.getContext("2d").drawImage(image,0,0,canvas.offsetWidth,canvas.offsetHeight);
                };

                var dataURL = canva.toDataURL();
                signaturePad.fromDataURL(dataURL);
            }

            function press_delete() {
                if (confirm("確定要永久刪除嗎?") == true) {
                    var userId = $("#userId").html();
                    var id = the_pic.parentNode.getAttribute('data-id');
                    xajax_Delete('sticker', id, userId, the_pic.src);
                }
            }

            function pic_press_cancel() {
                $('#pic_details').hide();
            }

            function profile_press_cancel() {
                $('#profile_details').hide();
            }

            function go_pic_link() {
                window.open(the_pic.src);
            }

            function upload_btn(obj) {
                $("#upload_area").show();
            }

            function upload_file(obj) {
                $("#file_result").html(obj.value);
                if (obj.value != "") {
                    $("#get_link").show();
                } else {
                    $('#get_link').hide();
                }
            }

            function send_url() {
                var imgur_result = $('#imgur_result').val();
                if (imgur_result != '') {
                    if (imgur_result.indexOf("http") != -1) {
                        if ((imgur_result.indexOf(".png") != -1) || (imgur_result.indexOf(".jpg") != -1) || (imgur_result.indexOf(".jpeg") != -1) || (imgur_result.indexOf(".gif") != -1) || (imgur_result.indexOf(".mp4") != -1)) {
                            var userId = $("#userId").html();
                            var displayName = $("#displayName").html();
                            var pictureUrl = $("#pictureUrl").html();
                            var statusMessage = $("#statusMessage").html();
                            var pic_url = $('#imgur_result').val();
                            xajax_StickerSend('self', pic_url, userId, displayName, pictureUrl, statusMessage, 'url');
                        } else {
                            alert("目前只支援: [ .png、.jpg、.jpeg、.gif、.mp4 ] ");
                        }
                    } else {
                        alert("您輸入的圖片網址有誤!");
                    }
                } else {
                    alert("圖片網址不得為空!");
                }
            }

            function componentToHex(c) {
                var hex = c.toString(16);
                return hex.length == 1 ? "0" + hex : hex;
            }

            function rgbToHex(r, g, b) {
                return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
            }

            function add_word(x, y, text, size, color, tf1, width, tf2, family) {
                var canva = document.getElementById("canvas");
                var cansText = canva.getContext("2d");
                var tester = (color.substr(4, color.length - 5)).split(",");
                color = rgbToHex(tester[0].replace(" ", "") * 1, tester[1].replace(" ", "") * 1, tester[2].replace(" ", "") * 1);
                word = [];
                word.splice(0, 0, x);
                word.splice(1, 0, y);
                word.splice(2, 0, text);
                word.splice(3, 0, size);
                word.splice(4, 0, color);
                word.splice(5, 0, family);
                if (tf1 == 'true') {
                    wordCount++;
                    word_list.push(word);
                    word.splice(0, 1, 0);
                    word.splice(1, 1, 20);
                } else {
                    word_list.splice(word_list.length - 1, 1, word);
                }
                if (document.getElementById("add_word_input").checked == false) {
                    if (tf2 == 'true') {
                        line_width.push(width);
                    } else {
                        line_width.splice(line_width.length - 1, 1, width);
                    }
                }
                //console.log('line_width = ' + line_width);
                //console.log('word_list = ' + word_list);
                for (ww = 0; ww < word_list.length; ww++) {
                    cansText.font = word_list[ww][3] + " " + word_list[ww][5];
                    //alert('word_list[ww][5] = ' + word_list[ww][5]);
                    cansText.fillStyle = word_list[ww][4];
                    cansText.fillText(word_list[ww][2], word_list[ww][0], word_list[ww][1]);
                }
                $('#change_word').hide();
                //alert(canva.offsetWidth);//307
                //alert(canva.offsetHeight);//282
            }

            function resizeCanvas() {
                //先儲存原先畫的 圖(畫的路徑)
                var sig = signaturePad.toDataURL();
                //更改畫布大小
                var ratio = Math.max(window.devicePixelRatio || 1, 1);
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
                //先清除畫布
                signaturePad.clear();
                //重畫
                signaturePad.fromDataURL(sig);
            }
            window.onresize = resizeCanvas;

            function SendSticker(_Target=null){
                /* signaturePad.isEmpty() 失效 */
                if ((touchCount > 0) || (wordCount > 0)) {
                    /* 不重複上傳同一張圖 */
                    if (dataURL_Backup == '') {
                        var dataURL = signaturePad.toDataURL();
                        var blobBin = atob(dataURL.split(',')[1]);
                        blob_array = [];
                        for (let i = 0; i < blobBin.length; i++) {
                            blob_array.push(blobBin.charCodeAt(i));
                        }
                        var fileData = new Blob([new Uint8Array(blob_array)], {type: 'image/png'});
                        // 將file 加至 formData
                        var formData = new FormData();
                        var fileName = $("#userId").html();
                        formData.append('fileData', fileData, fileName);

                        ChooseStickerSend(dataURL, formData);
                    }
                } else {
                    alert("請先建立一個圖案");
                }
            }

            function ChooseStickerSend(dataURL, formData){
                var userId = $("#userId").html();
                var displayName = $("#displayName").html();
                var pictureUrl = $("#pictureUrl").html();
                var statusMessage = $("#statusMessage").html();
                swal({
                    type: 'warning',
                    title: '請選擇',
                    cancelButtonText: '分享',
                    showCancelButton: true,
                    text: '',
                    confirmButtonText: '直接傳送'})
                .then(function () {
                    dataURL_Backup = dataURL;
                    fetch('{#$__LIBRARY#}/core/func/kPrewPic.php', {
                        method: 'POST',
                        body: formData
                    }).then(res => res.text())
                      .then(resText => xajax_StickerSend('self', resText, userId, displayName, pictureUrl, statusMessage, 'pic'));
                }, function (dismiss) {
                    if (dismiss === 'cancel') {
                        dataURL_Backup = dataURL;
                        fetch('{#$__LIBRARY#}/core/func/kPrewPic.php', {
                            method: 'POST',
                            body: formData
                        }).then(res => res.text())
                          .then(resText => xajax_StickerSend('share', resText, userId, displayName, pictureUrl, statusMessage, 'pic'));
                    }
                });
            }

            $(function () {
                {#if $imgur_result#}
                    $('#imgur_result').val('{#$imgur_result#}');
                    $('#upload_area').show();
                {#/if#}
                $('#canvas').farbtastic('#color');
                jQuery._farbtastic(function () {
                    jQuery.farbtastic('#picker').linkTo('#color');
                });
                if ($('#list_area').children().length > 0) {
                    $('#canvas').css('visibility', 'hidden').hide();
                    $('#List_input').prop('checked', true);
                }
                add_press();
                var hammer = new Hammer(document.getElementsByClassName('the_profile_pic')[0]);
                hammer.on('press', function (ev) {
                    $("#enlarge_pic").show();
                    document.getElementById('the_enlarge_pic').src = ev.target.src;
                });
                var hammer = new Hammer(document.getElementById('the_enlarge_pic'));
                hammer.on('press', function (ev) {
                    window.open(ev.target.src);
                });
                document.getElementById("erase_input").addEventListener("click", function () {
                    if (document.getElementById("erase_input").checked) {
                        var ctx = canvas.getContext('2d');
                        ctx.globalCompositeOperation = 'destination-out';
                    } else {
                        var ctx = canvas.getContext('2d');
                        ctx.globalCompositeOperation = 'source-over'; // default value
                    }
                });
                var the_return = document.getElementById("the_return");
                the_return.addEventListener("click", function (event) {
                    if (document.getElementById("add_word_input").checked) {
                        if (wordCount > 0) {
                            wordCount--;
                        }
                    } else {
                        if (touchCount > 0) {
                            touchCount--;
                        }
                    }
                    var canva = document.getElementById("canvas");
                    var cansText = canva.getContext("2d");
                    if (document.getElementById("add_word_input").checked) {
                        var data = signaturePad.toData();
                        signaturePad.fromData(data);
                        signaturePad.penColor = "rgba(255, 255, 255, 0)";
                        word_list.pop();
                    } else {
                        var color = document.getElementById("color").style.backgroundColor;
                        signaturePad.penColor = color;

                        var data = signaturePad.toData();
                        if (data) {
                            line_width.pop();
                            data.pop(); // remove the last dot or line
                            signaturePad.fromData(data);
                        }
                        signaturePad.penColor = color;
                    }
                    $('#add_word_text').val('');
                    $('#add_word_size').val('20');
                    $('#color').val('#000000');
                    for (ww = 0; ww < word_list.length; ww++) {
                        $('#add_word_text').val(word_list[ww][2]);
                        $('#add_word_size').val(word_list[ww][3].substr(0, word_list[ww][3].length - 2));
                        $('#color').val(word_list[ww][4]);
                        document.getElementById("color").style.backgroundColor = word_list[ww][4];
                        cansText.font = word_list[ww][3] + " " + "標楷體";
                        cansText.fillStyle = word_list[ww][4];
                        cansText.fillText(word_list[ww][2], word_list[ww][0], word_list[ww][1]);
                    }

                    if (wordCount>0 || touchCount>0) {
                        if(the_pic.src){
                            getDataUrl(the_pic.src);
                        }
                    }
                    /*for(tt=0;tt<data.length;tt++){
                        $('#add_word_text').val(word_list[ww][2]);
                        $('#add_word_size').val(word_list[ww][3].substr(0, word_list[ww][3].length - 2));
                        $('#color').val(word_list[ww][4]);
                        document.getElementById("color").style.backgroundColor = word_list[tt][4];
                        cansText.font = word_list[tt][3] + " " + "標楷體";
                        cansText.fillStyle = word_list[tt][4];
                        cansText.fillText(word_list[tt][2], word_list[tt][0], word_list[tt][1]);
                    }*/
                });
                var clear_all = wrapper.querySelector("[data-action=clear_all]");
                clear_all.addEventListener("click", function (event) {
                    if (confirm("確定要清除嗎?") == true) {
                        the_pic = '';
                        touchCount = 0;
                        wordCount = 0;
                        signaturePad.clear();
                        line_width = [];
                        word_list = [];
                    }
                });
                document.getElementById("add_word_input").addEventListener("click", function (event) {
                    if (document.getElementById("add_word_input").checked) {
                        signaturePad.penColor = "rgba(255, 255, 255, 0)";
                    } else {
                        var color = document.getElementById("color").style.backgroundColor;
                        signaturePad.penColor = color;
                    }
                });
                //放在上面
                document.getElementById("canvas").addEventListener("touchstart", function (event) {
                    if (document.getElementById("add_word_input").checked) {
                        signaturePad.penColor = "rgba(255, 255, 255, 0)";
                    } else {
                        var color = document.getElementById("color").style.backgroundColor;
                        signaturePad.penColor = color;
                    }
                });
                //拖曳
                document.getElementById("canvas").addEventListener("touchmove", function (event) {
                    touches = event.targetTouches.length;
                    if (touches == 1) {
                        // 如果这个元素的位置内只有一个手指的话
                        var touch = event.targetTouches[0];

                        if (document.getElementById("add_word_input").checked) {
                            //
                            get_X = touch.pageX - 25;
                            get_Y = touch.pageY - 40;
                            $('#add_word_x').val(get_X);
                            $('#add_word_y').val(get_Y);
                            var data = signaturePad.toData();
                            signaturePad.fromData(data);
                            signaturePad.penColor = "rgba(255, 255, 255, 0)";
                            add_word(get_X, get_Y, $('#add_word_text').val(), $('#add_word_size').val() + 'px', document.getElementById('color').style.backgroundColor, 'false', $('#select_width').val(), 'false', $('#select_family').val());
                        }
                    }
                });
                //移开
                document.getElementById("canvas").addEventListener("touchend", function (event) {
                    if (touches == 1) {
                        if (document.getElementById("add_word_input").checked) {
                            var data = signaturePad.toData();
                            if (data) {
                                data.pop(); // remove the last dot or line
                                if(the_pic.src){
                                    getDataUrl(the_pic.src);
                                }
                                signaturePad.fromData(data);
                            }
                            signaturePad.penColor = "rgba(255, 255, 255, 0)";
                            add_word(get_X, get_Y, $('#add_word_text').val(), $('#add_word_size').val() + 'px', document.getElementById('color').style.backgroundColor, 'false', $('#select_width').val(), 'false', $('#select_family').val());
                        } else {
                            touchCount++;
                            add_word(get_X, get_Y, $('#add_word_text').val(), $('#add_word_size').val() + 'px', document.getElementById('color').style.backgroundColor, 'false', $('#select_width').val(), 'true', $('#select_family').val());
                        }
                    }
                });
                resizeCanvas();
            });
        </script>
    </body>
</html>