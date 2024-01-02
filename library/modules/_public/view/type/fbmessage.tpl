<label>設定訊息</label>
<div class="TemplateContainer" style="overflow:auto;background-color:#fff;">
    <div class="TemplateSlider" style="width:1625px;">
        {#if !$notify#}
            {#assign var="MsgMax" value=4#}
        {#else#}
            {#assign var="MsgMax" value=2#}
        {#/if#}
        {#for $G=0 to $MsgMax#}
            {#assign var="type" value="type_"|cat:$G#}
            {#assign var="value" value="value_"|cat:$G#}
            <div class="col-lg-4 Template" style="display:inline-block;width:300px;margin: 10px;text-align:center;">
                <div class="TemplateBtn" style="width:300px;height:35px;">
                    <span class="label label-success" style="padding:10px;float:left;">訊息 {#$G+1#}</span>
                    <div id="fbEditMsg{#$G#}" class="btn btn-success" style="float:right;" msgctn="{#$G#}" onclick="fbEditMsg({#$G#});">編輯訊息</div>
                    {#if !$notify#}
                        {#if $G!==0#}
                            <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeVal('left','{#$G#}');"><i class="fa fa-fw fa-arrow-left"></i></span>
                        {#/if#}
                        {#if $G!==4#}
                            <span class="btn btn-sm label label-primary" style="padding:10px;float:left;margin-left:5px;" onclick="ChangeVal('right','{#$G#}');"><i class="fa fa-fw fa-arrow-right"></i></span>
                        {#/if#}
                    {#/if#}
                    <span id="DeleteMsg_{#$G#}" class="btn btn-sm label label-danger" style="padding:10px;float:left;margin-left:5px;" onclick="$('#fbMsgType{#$G#}').val('');$('#fbFILES_img{#$G#}').val('');$('#fbFILES_video{#$G#}').val('');$('#fbFILES_audio{#$G#}').val('');$('#fbSaveMsg{#$G#}').val('');$('#fbmsgview{#$G#}').html('');"><i class="fa fa-fw fa-trash"></i></span>
                </div>
                <div class="card-body" style="margin-top:5px;">
                    <div class="card-button">
                        <div id="fbBtnGrp{#$G#}" class="button-group" msgctn="{#$G#}" style="width:300px;">
                            <select id="fbMsgType{#$G#}" name="fields[subject][type_{#$G#}]" msgctn="{#$G#}" class="form-control select2" style="margin-top:5px;" onchange="$('#fbFILES_img{#$G#}').val('');$('#fbFILES_video{#$G#}').val('');$('#fbFILES_audio{#$G#}').val('');$('#fbSaveMsg{#$G#}').val('');$('#fbmsgview{#$G#}').html('');$('#fbEditMsg{#$G#}').click();">
                                <option value="">請選擇訊息格式</option>
                                {#if !$notify || ($notify&&$G==0)#}
                                    <option value="text" {#if $row.subject.$type=='text'#}selected{#/if#}>文字</option>
                                {#/if#}
                                <!--{#if !$notify || ($notify&&$G==1)#}
                                    <option value="sticker" {#if $row.subject.$type=='sticker'#}selected{#/if#}>貼圖</option>
                                {#/if#}-->
                                {#if !$notify#}
                                    {#if $rows_FB_Template#}<option class="facebook" style="display:block;" value="fb_template" {#if $row.subject.$type=='fb_template'#}selected{#/if#}>一般型卡片</option>{#/if#}
                                    {#if $rows_FB_ListTemplate#}<!--<option class="facebook" style="display:block;" value="fb_listtemplate" {#if $row.subject.$type=='fb_listtemplate'#}selected{#/if#}>清單卡片(已停用)</option>-->{#/if#}
                                    {#if $rows_FB_BtnTemplate#}<option class="facebook" style="display:block;" value="fb_btntemplate" {#if $row.subject.$type=='fb_btntemplate'#}selected{#/if#}>按鈕卡片</option>{#/if#}
                                    {#if $rows_FB_SocialTemplate#}<!--<option class="facebook" style="display:block;" value="fb_socialtemplate" {#if $row.subject.$type=='fb_socialtemplate'#}selected{#/if#}>社交卡片(已停用)</option>-->{#/if#}
                                    {#if $rows_FB_MediaTemplate#}<option class="facebook" style="display:block;" value="fb_mediatemplate" {#if $row.subject.$type=='fb_mediatemplate'#}selected{#/if#}>媒體卡片</option>{#/if#}
                                    {#if $rows_FB_ReceiptTemplate#}<option class="facebook" style="display:block;" value="fb_receipttemplate" {#if $row.subject.$type=='fb_receipttemplate'#}selected{#/if#}>收據卡片</option>{#/if#}
                                    {#if $rows_FB_AirlineTemplate#}<!--<option class="facebook" style="display:block;" value="fb_airlinetemplate" {#if $row.subject.$type=='fb_airlinetemplate'#}selected{#/if#}>航班卡片(暫不開發)</option>-->{#/if#}
                                    {#if $rows_FB_ProductTemplate#}<!--<option class="facebook" style="display:block;" value="fb_producttemplate" {#if $row.subject.$type=='fb_producttemplate'#}selected{#/if#}>產品卡片(暫不開發)</option>-->{#/if#}
                                {#/if#}
                                {#if !$notify || ($notify&&$G==2)#}
                                    <option value="image" {#if $row.subject.$type=='image'#}selected{#/if#}>照片</option>
                                {#/if#}
                                {#if !$notify#}
                                    <option value="video" {#if $row.subject.$type=='video'#}selected{#/if#}>影片</option>
                                    <option value="audio" {#if $row.subject.$type=='audio'#}selected{#/if#}>語音訊息</option>
                                    {#if $rows_CustomMessage#}<!--<option value="custom" {#if $row.subject.$type=='custom'#}selected{#/if#}>自訂訊息</option>-->{#/if#}
                                {#/if#}
                            </select>
                            <textarea id="fbSaveMsg{#$G#}" class="form-control hide" style="margin-top:5px;" rows="1" name="fields[subject][value_{#$G#}]" msgctn="{#$G#}" placeholder="內容{#$G+1#}">{#$row.subject.$value#}</textarea>
                            <div id="fbmsgview{#$G#}" style="margin-top: 10px;" class="fbmsgview" onclick="$('#fbEditMsg{#$G#}').click();"></div>
                        </div>
                    </div>
                </div>
            </div>
        {#/for#}
    </div>
</div>
{#if $rows_QuicklyReply && !$notify#}
    <label>設定快捷語</label>
    <div class="TemplateContainer" style="background-color:#fff;">
        <div class="col-lg-4 Template" style="display:inline-block;width:300px;margin: 10px;text-align:center;float:none;">
            <div class="TemplateBtn" style="width:300px;height:35px;">
                <span class="label label-success" style="padding:10px;float:left;">快捷語</span>
                <div id="fbEditMsg5" class="btn btn-success" style="float:right;" msgctn="5" onclick="fbEditMsg(5);">編輯快捷語</div>
                <span class="label label-danger" style="padding:10px;float:left;margin-left:5px;" onclick="$('#fbSaveMsg5').val('');$('#fbmsgview5').html('');"><i class="fa fa-fw fa-trash"></i></span>
            </div>
            <div class="card-body" style="margin-top:5px;">
                <div class="card-button">
                    <div id="fbBtnGrp5" class="button-group" msgctn="5" style="width:300px;">
                        <textarea id="fbSaveMsg5" class="form-control hide" style="margin-top:5px;" rows="1" name="fields[subject][QuicklyReply]" msgctn="5" placeholder="快捷語">{#$row.subject.QuicklyReply#}</textarea>
                        <div id="fbmsgview5" style="margin-top: 10px;" class="fbmsgview" onclick="$('#fbEditMsg5').click();"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{#/if#}
<script>
    var fbSelectMsg = '';
    function ChangeVal(direction, Ctn){ //left、right，0~5
        var NowCtn = Ctn*1;
        var Now_Type = $('#fbMsgType'+NowCtn).val();
        var Now_Msg= $('#fbSaveMsg'+NowCtn).val();
        var Now_view = $('#fbmsgview'+NowCtn).html();
        var Now_fbUploadImage = $('#fbUploadImage'+NowCtn);
        var Now_fbUploadVideo = $('#fbUploadVideo'+NowCtn);
        var Now_fbUploadAudio = $('#fbUploadAudio'+NowCtn);
        
        if(direction==='right'){
            var NextCtn = NowCtn+1;
            var Next_Type = $('#fbMsgType'+NextCtn).val();
            var Next_Msg= $('#fbSaveMsg'+NextCtn).val();
            var Next_view = $('#fbmsgview'+NextCtn).html();
            var Next_fbUploadImage = $('#fbUploadImage'+NextCtn);
            var Next_fbUploadVideo = $('#fbUploadVideo'+NextCtn);
            var Next_fbUploadAudio = $('#fbUploadAudio'+NextCtn);
            
            $('#fbMsgType'+NowCtn).val(Next_Type);
            $('#fbSaveMsg'+NowCtn).val(Next_Msg);
            $('#fbmsgview'+NowCtn).html(Next_view);
            if(Next_Type==='text' || Next_Type==='sticker'){
                $('#fbmsgview'+NowCtn).addClass('Message');
            }else{
                $('#fbmsgview'+NowCtn).removeClass('Message');
            }
            Now_fbUploadImage.attr('id', 'fbUploadImage'+NextCtn);
            Now_fbUploadImage.find('label input').attr('id', 'fbFILES_img'+NextCtn).attr('name', 'value_'+NextCtn).attr('onchange', "init_inputImage(this, '"+NextCtn+"', 'fb');");
            Now_fbUploadImage.find('img').attr('id', 'fbpreviews_img'+NextCtn);
            Now_fbUploadVideo.attr('id', 'fbUploadVideo'+NextCtn);
            Now_fbUploadVideo.find('label input').attr('id', 'fbFILES_video'+NextCtn).attr('name', 'value_'+NextCtn).attr('onchange', "init_inputVideo(this, '"+NextCtn+"', 'fb');");
            Now_fbUploadVideo.find('video').attr('id', 'fbpreviews_video'+NextCtn);
            Now_fbUploadAudio.attr('id', 'fbUploadAudio'+NextCtn);
            Now_fbUploadAudio.find('label input').attr('id', 'fbFILES_audio'+NextCtn).attr('name', 'value_'+NextCtn).attr('onchange', "init_inputAudio(this, '"+NextCtn+"', 'fb');");
            Now_fbUploadAudio.find('audio').attr('id', 'fbpreviews_audio'+NextCtn);
            
            $('#fbMsgType'+NextCtn).val(Now_Type);
            $('#fbSaveMsg'+NextCtn).val(Now_Msg);
            $('#fbmsgview'+NextCtn).html(Now_view);
            if(Now_Type==='text' || Now_Type==='sticker'){
                $('#fbmsgview'+NextCtn).addClass('Message');
            }else{
                $('#fbmsgview'+NextCtn).removeClass('Message');
            }
            Next_fbUploadImage.attr('id', 'fbUploadImage'+NowCtn);
            Next_fbUploadImage.find('label input').attr('id', 'fbFILES_img'+NowCtn).attr('name', 'value_'+NowCtn).attr('onchange', "init_inputImage(this, '"+NowCtn+"', 'fb');");
            Next_fbUploadImage.find('img').attr('id', 'fbpreviews_img'+NowCtn);
            Next_fbUploadVideo.attr('id', 'fbUploadVideo'+NowCtn);
            Next_fbUploadVideo.find('label input').attr('id', 'fbFILES_video'+NowCtn).attr('name', 'value_'+NowCtn).attr('onchange', "init_inputVideo(this, '"+NowCtn+"', 'fb');");
            Next_fbUploadVideo.find('video').attr('id', 'fbpreviews_video'+NowCtn);
            Next_fbUploadAudio.attr('id', 'fbUploadAudio'+NowCtn);
            Next_fbUploadAudio.find('label input').attr('id', 'fbFILES_audio'+NowCtn).attr('name', 'value_'+NowCtn).attr('onchange', "init_inputAudio(this, '"+NowCtn+"', 'fb');");
            Next_fbUploadAudio.find('audio').attr('id', 'fbpreviews_audio'+NowCtn);
        }else{
            var PrevCtn = NowCtn-1;
            var Prev_Type = $('#fbMsgType'+PrevCtn).val();
            var Prev_Msg= $('#fbSaveMsg'+PrevCtn).val();
            var Prev_view = $('#fbmsgview'+PrevCtn).html();
            var Prev_fbUploadImage = $('#fbUploadImage'+PrevCtn);
            var Prev_fbUploadVideo = $('#fbUploadVideo'+PrevCtn);
            var Prev_fbUploadAudio = $('#fbUploadAudio'+PrevCtn);
            
            $('#fbMsgType'+PrevCtn).val(Now_Type);
            $('#fbSaveMsg'+PrevCtn).val(Now_Msg);
            $('#fbmsgview'+PrevCtn).html(Now_view);
            if(Now_Type==='text' || Now_Type==='sticker'){
                $('#fbmsgview'+PrevCtn).addClass('Message');
            }else{
                $('#fbmsgview'+PrevCtn).removeClass('Message');
            }
            Now_fbUploadImage.attr('id', 'fbUploadImage'+PrevCtn);
            Now_fbUploadImage.find('label input').attr('id', 'fbFILES_img'+PrevCtn).attr('name', 'value_'+PrevCtn).attr('onchange', "init_inputImage(this, '"+PrevCtn+"', 'fb');");
            Now_fbUploadImage.find('img').attr('id', 'fbpreviews_img'+PrevCtn);
            Now_fbUploadVideo.attr('id', 'fbUploadVideo'+PrevCtn);
            Now_fbUploadVideo.find('label input').attr('id', 'fbFILES_video'+PrevCtn).attr('name', 'value_'+PrevCtn).attr('onchange', "init_inputVideo(this, '"+PrevCtn+"', 'fb');");
            Now_fbUploadVideo.find('video').attr('id', 'fbpreviews_video'+PrevCtn);
            Now_fbUploadAudio.attr('id', 'fbUploadAudio'+PrevCtn);
            Now_fbUploadAudio.find('label input').attr('id', 'fbFILES_audio'+PrevCtn).attr('name', 'value_'+PrevCtn).attr('onchange', "init_inputAudio(this, '"+PrevCtn+"', 'fb');");
            Now_fbUploadAudio.find('audio').attr('id', 'fbpreviews_audio'+PrevCtn);
            
            $('#fbMsgType'+NowCtn).val(Prev_Type);
            $('#fbSaveMsg'+NowCtn).val(Prev_Msg);
            $('#fbmsgview'+NowCtn).html(Prev_view);
            if(Prev_Type==='text' || Prev_Type==='sticker'){
                $('#fbmsgview'+NowCtn).addClass('Message');
            }else{
                $('#fbmsgview'+NowCtn).removeClass('Message');
            }
            Prev_fbUploadImage.attr('id', 'fbUploadImage'+NowCtn);
            Prev_fbUploadImage.find('label input').attr('id', 'fbFILES_img'+NowCtn).attr('name', 'value_'+NowCtn).attr('onchange', "init_inputImage(this, '"+NowCtn+"', 'fb');");
            Prev_fbUploadImage.find('img').attr('id', 'fbpreviews_img'+NowCtn);
            Prev_fbUploadVideo.attr('id', 'fbUploadVideo'+NowCtn);
            Prev_fbUploadVideo.find('label input').attr('id', 'fbFILES_video'+NowCtn).attr('name', 'value_'+NowCtn).attr('onchange', "init_inputVideo(this, '"+NowCtn+"', 'fb');");
            Prev_fbUploadVideo.find('video').attr('id', 'fbpreviews_video'+NowCtn);
            Prev_fbUploadAudio.attr('id', 'fbUploadAudio'+NowCtn);
            Prev_fbUploadAudio.find('label input').attr('id', 'fbFILES_audio'+NowCtn).attr('name', 'value_'+NowCtn).attr('onchange', "init_inputAudio(this, '"+NowCtn+"', 'fb');");
            Prev_fbUploadAudio.find('audio').attr('id', 'fbpreviews_audio'+NowCtn);
        }
    }
    function fbEditMsg(ctn, action){
        fbSelectMsg = $('#fbBtnGrp'+ctn).attr('msgctn');
        var fbMsgType = $('#fbMsgType'+fbSelectMsg).val();
        var MsgValue = $('#fbSaveMsg'+fbSelectMsg).val();
        var MsgView = $('#fbmsgview'+fbSelectMsg).html();
        
        $('#fbSelectMsgTitle').show();
        $('#fbSelectMsg').html(fbSelectMsg*1+1);
        $('#fbmsgview'+fbSelectMsg).removeClass('Message');
        if(ctn === 5){
            $('#fbaddQuicklyReplyBox').click();
            if(MsgValue){
                $('#fbShowQuicklyReplyBox .fbShowValueList tr[data-type="QuicklyReply"][data-id="'+MsgValue+'"]').click();
            }else{
                $('#fbShowQuicklyReplyBox .fbShowValueList tbody tr[data-type="QuicklyReply"]').eq(0).click();
            }
            if(action === 'load'){
                $('#fbaddQuicklyReplyBox').click();
            }
        }else{
            switch(fbMsgType){
                case 'text':
                    MsgValue = MsgValue.replace(/\n/g,"<br />");
                    $('#fbmsgview'+fbSelectMsg).addClass('Message');
                    $('#fbaddTextBox').click();
                    $('#fb'+fbMsgType+'Value').parent().find('.emojionearea .emojionearea-editor').html(MsgValue).focus().blur();
                    if(action === 'load'){
                        fbUpdateMsg(fbSelectMsg);
                        $('#fbaddTextBox').click();
                    }
                    break;
                case 'sticker':
                    $('#fbmsgview'+fbSelectMsg).addClass('Message');
                    $('#fbaddStickerBox').click();
                    if(action === 'load'){
                        $('.fbImgType>ul>li[data-stkid="'+ MsgValue +'"]').click();
                        $('#fbaddStickerBox').click();
                    }
                    break;
                case 'imagemap':
                    $('#fbaddImageMapBox').click();
                    if(MsgValue){
                        $('#fbShowImageMapBox .fbShowValueList tr[data-type="ImageMap"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#fbShowImageMapBox .fbShowValueList tbody tr[data-type="ImageMap"]').eq(0).click();
                    }
                    if(action === 'load'){
                        $('#fbShowImageMapBox').click();
                    }
                    break;
                case 'linetemplate':
                    $('#fbaddTemplateBox').click();
                    if(MsgValue){
                        $('#fbShowTemplateBox .fbShowValueList tr[data-type="LineTemplate"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#fbShowTemplateBox .fbShowValueList tbody tr[data-type="LineTemplate"]').eq(0).click();
                    }
                    if(action === 'load'){
                        $('#fbShowTemplateBox').click();
                    }
                    break;
                case 'imagecarousel':
                    $('#fbaddImageCarouselBox').click();
                    if(MsgValue){
                        $('#fbShowImageCarouselBox .fbShowValueList tr[data-type="ImageCarousel"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#fbShowImageCarouselBox .fbShowValueList tbody tr[data-type="ImageCarousel"]').eq(0).click();
                    }
                    if(action === 'load'){
                        $('#fbaddImageCarouselBox').click();
                    }
                    break;
                case 'image':
                    if(MsgValue){
                        $('#fbShowImageBox #fbpreviews_img'+fbSelectMsg).attr('src', '{#$__WEB_UPLOAD#}/image/'+MsgValue).show();
                    }
                    $('.fbUploadImage').hide();
                    $('#fbUploadImage'+fbSelectMsg).show();
                    $('#fbaddImageBox').click();
                    fbUpdateMedia();
                    if(action === 'load'){
                        $('#fbaddImageBox').click();
                    }
                    break;
                case 'video':
                    if(MsgValue){
                        $('#fbShowVideoBox #fbpreviews_video'+fbSelectMsg+ ' source').attr('src', '{#$__WEB_UPLOAD#}/video/'+MsgValue);
                        $('#fbShowVideoBox #fbpreviews_video'+fbSelectMsg)[0].load();
                        $('#fbShowVideoBox #fbpreviews_video'+fbSelectMsg).show();
                    }
                    $('.fbUploadVideo').hide();
                    $('#fbUploadVideo'+fbSelectMsg).show();
                    $('#fbaddVideoBox').click();
                    fbUpdateMedia();
                    if(action === 'load'){
                        $('#fbaddVideoBox').click();
                    }
                    break;
                case 'audio':
                    if(MsgValue){
                        $('#fbShowAudioBox #fbpreviews_audio'+fbSelectMsg+ ' source').attr('src', '{#$__WEB_UPLOAD#}/audio/'+MsgValue);
                        $('#fbShowAudioBox #fbpreviews_audio'+fbSelectMsg)[0].load();
                        $('#fbShowAudioBox #fbpreviews_audio'+fbSelectMsg).show();
                    }
                    $('.fbUploadAudio').hide();
                    $('#fbUploadAudio'+fbSelectMsg).show();
                    $('#fbaddAudioBox').click();
                    fbUpdateMedia();
                    if(action === 'load'){
                        $('#fbaddAudioBox').click();
                    }
                    break;
                case 'custom':
                    $('#fbaddCustomBox').click();
                    if(MsgValue){
                        $('#ShowCustomBox .fbShowValueList tr[data-type="CustomMessage"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#ShowCustomBox .fbShowValueList tbody tr[data-type="CustomMessage"]').eq(0).click();
                    }
                    if(action === 'load'){
                        $('#fbaddCustomBox').click();
                    }
                    break;
                case 'fb_template':
                    if(MsgValue){
                        $('#fbShowFB_TemplateBox .fbShowValueList tr[data-type="FB_Template"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#fbShowFB_TemplateBox .fbShowValueList tbody tr[data-type="FB_Template"]').eq(0).click();
                    }
                    if(action !== 'load'){
                        $('#fbaddFB_TemplateBox').click();
                    }
                    break;
                case 'fb_listtemplate':
                    if(MsgValue){
                        $('#fbShowFB_ListTemplateBox .fbShowValueList tr[data-type="FB_ListTemplate"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#fbShowFB_ListTemplateBox .fbShowValueList tbody tr[data-type="FB_ListTemplate"]').eq(0).click();
                    }
                    if(action !== 'load'){
                        $('#fbaddFB_ListTemplateBox').click();
                    }
                    break;
                case 'fb_btntemplate':
                    if(MsgValue){
                        $('#fbShowFB_BtnTemplateBox .fbShowValueList tr[data-type="FB_BtnTemplate"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#fbShowFB_BtnTemplateBox .fbShowValueList tbody tr[data-type="FB_BtnTemplate"]').eq(0).click();
                    }
                    if(action !== 'load'){
                        $('#fbaddFB_BtnTemplateBox').click();
                    }
                    break;
                case 'fb_mediatemplate':
                    if(MsgValue){
                        $('#fbShowFB_MediaTemplateBox .fbShowValueList tr[data-type="FB_MediaTemplate"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#fbShowFB_MediaTemplateBox .fbShowValueList tbody tr[data-type="FB_MediaTemplate"]').eq(0).click();
                    }
                    if(action !== 'load'){
                        $('#fbaddFB_MediaTemplateBox').click();
                    }
                    break;
                case 'fb_receipttemplate':
                    if(MsgValue){
                        $('#fbShowFB_ReceiptTemplateBox .fbShowValueList tr[data-type="FB_ReceiptTemplate"][data-id="'+MsgValue+'"]').click();
                    }else{
                        $('#fbShowFB_ReceiptTemplateBox .fbShowValueList tbody tr[data-type="FB_ReceiptTemplate"]').eq(0).click();
                    }
                    if(action !== 'load'){
                        $('#fbaddFB_ReceiptTemplateBox').click();
                    }
                    break;
            }
        }
    }
    function fbUpdateMsg(NowfbSelectMsg=fbSelectMsg){
        //$.getJSON("{#$__RES_Web#}/js/data.json", function (data) {
            var fbMsgType = $('#fbMsgType'+NowfbSelectMsg).val();
            var UpdateValue = $('#fb'+fbMsgType+'Value').val().replace(/\u2028/g, " ");
            $('#fbSaveMsg'+NowfbSelectMsg).val(UpdateValue);
            if(UpdateValue && UpdateValue.replace(/\s+/g,"")!==""){
                var result = UpdateValue.replace(/\n/g,"<br />");
                /*$.each(data, function(val) {
                    var valAdj = data[val][0].replace(/\(|\)/g,'').replace(/\?/g,'\\?');
                    result = result.replace(new RegExp('[\(]('+ valAdj +')[\)]','g'), '<img src="{#$__RES_Web#}/images/emoticon/'+data[val][1]+'"/>');
                });*/
                UpdateValue = result;
            }
            //$('#fbmsgview'+NowfbSelectMsg).html(UpdateValue);
            $('#fbmsgview'+NowfbSelectMsg).html(TranslateEmoji(UpdateValue));
        //});
    }
</script>
<div class="EditArea hide">
    <div id="fbaddTextBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fbShowTextBox">文字</div>
    <div id="fbaddStickerBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fbShowStickerBox">貼圖</div>
    <div id="fbaddImageMapBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fbShowImageMapBox">圖文訊息</div>
    <div id="fbaddTemplateBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fbShowTemplateBox">卡片式選單</div>
    <div id="fbaddImageCarouselBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fbShowImageCarouselBox">大圖選單</div>
    <div id="fbaddImageBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fbShowImageBox">照片</div>
    <div id="fbaddVideoBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fbShowVideoBox">影片</div>
    <div id="fbaddAudioBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fbShowAudioBox">語音訊息</div>
    <div id="fbaddCustomBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ShowCustomBox">自訂訊息</div>
    <div id="fbaddQuicklyReplyBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fbShowQuicklyReplyBox">快捷語</div>
    
    <div id="fbaddFB_TemplateBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fbShowFB_TemplateBox">一般型卡片</div>
    <div id="fbaddFB_ListTemplateBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fbShowFB_ListTemplateBox">清單卡片</div>
    <div id="fbaddFB_BtnTemplateBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fbShowFB_BtnTemplateBox">按鈕卡片</div>
    <div id="fbaddFB_MediaTemplateBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fbShowFB_MediaTemplateBox">媒體卡片</div>
    <div id="fbaddFB_ReceiptTemplateBox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fbShowFB_ReceiptTemplateBox">收據卡片</div>
</div>

<!--<link href="{#$__RES_Web#}/css/app.css?{#$smarty.now|date_format:'%Y%m%d%H:%M:%S'#}" rel="stylesheet">-->
<script>
    $(function(){
        $('tr[data-type="ImageMap"], tr[data-type="LineTemplate"], tr[data-type="ImageCarousel"], tr[data-type="QuicklyReply"], tr[data-type="CustomMessage"], tr[data-type="FB_Template"], tr[data-type="FB_ListTemplate"], tr[data-type="FB_BtnTemplate"], tr[data-type="FB_MediaTemplate"], tr[data-type="FB_ReceiptTemplate"]').click(function () {
            $('tr[data-type="'+ $(this).attr("data-type") +'"]').removeClass('active');
            $(this).addClass('active');
        });
        //JSON寫入表情選項
        $.getJSON("{#$__RES_Web#}/js/data.json", function (data) {
            var html = "";
            for (var i = 0; i < data.length; i++) {
                html += '<li data-img="(' + data[i][0] + ')" data-code="' + data[i][2] + '"><span class="emoticon-'+ data[i][2] +'_k"></span></li>';
            }
            $("#emoticon>ul").html(html);
        });
        for (var i = 0; i <  $(".fbImgType").length; i++) {
            var $fbImgType=$("#fbImgType0"+(i+1));
            //新增圖片寫入，class (因為sprite是用class定位)
            for (var j = 0; j < $fbImgType.find('li').length; j++) {
                var SerialNO=$fbImgType.find('li').eq(j).attr('data-stkid');
                SerialNO=SerialNO.replace(/(.*?)[_]/g,''); //濾掉_之前的文字
                $fbImgType.find('li').eq(j).html('<span class="stkid-'+ SerialNO +'_key"></span>');
            }
        }
        //貼圖
        /*$(".fbImgType>ul>li").click(function () {
            $("#fbShowStickerBox").click(); //點一下關掉
            var _src = $(this).attr("data-stkid").replace(/(.*?)[_]/g,'');
            var id = $(this).attr("data-stkid");
            $('#fbSaveMsg'+fbSelectMsg).val(id);
            $('#fbmsgview'+fbSelectMsg).html('<img src="{#$__RES_Web#}/images/img/'+_src+'_key.png">');
        });
        //表情
        $(document).on('click', '#emoticon>ul>li', function (e) {
            $("#fbShowkaomojiBox").click(); //點一下關掉
            var _emoticon = unescape(encodeURIComponent($(this).attr('data-img')));
            InsertContent(_emoticon);
        });
        //表情符號
        $("#kaomoji>ul>li").on('click', function (e) {
            $("#fbShowkaomojiBox").click(); //點一下關掉
            var _kaomoji = $(this).text();
            InsertContent(_kaomoji);
        });*/
        $('.fbShowValueList tbody tr').on('click', function (e) {
            var oneTemplateNo = 0;
            var minWidth = '';
            var addHtml = " ";
            switch($(this).attr('data-type')){
                case 'ImageMap':
                    var ImageMap = JSON.parse($(this).attr('data-json'));
                    var _subimg = ImageMap['subject']['img0'];
                    var _subtitle = ImageMap['subject']['subject'];
                    oneTemplateNo = ($('.LineTemplateStyle').width()/270)-10;
                    addHtml += '<img class="ShowImgmapIMG" src="{#$__WEB_UPLOAD#}/image/'+_subimg+'">';
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
                                addHtml += '<div class="TemplateImg LineTemplate" style="background-image:url({#$__WEB_UPLOAD#}/image/' + _subimg + ');"></div>';
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
                            addHtml+='<div class="TemplateImg ImageCarousel" style="background-image:url({#$__WEB_UPLOAD#}/image/'+_subimg+');"><h3>'+ _subtitle +'</h3></div>';
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
                                addHtml+='<span style="background-image:url({#$__WEB_UPLOAD#}/image/'+_subimg+');"></span>';
                            }
                            addHtml+=_subtitle;
                            addHtml+='</div>';
                        }
                    }
                    break;
                case 'CustomMessage':
                    var msgjson = $(this).attr('msg-json').replace(/"{/g, "{").replace(/}"/g, "}").replace(/\\"/g, '"');
                    var MsgVal = JSON.parse(msgjson);
                    xajax_BuildMsg('return', '', 'next', 'type', 'message', MsgVal, 'MemberInfo', 'fbmsgview'+fbSelectMsg);
                    break;
                case 'FB_Template':
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
                                    addHtml += '<div class="TemplateImg LineTemplate" style="background-image:url({#$__WEB_UPLOAD#}/image/' + _subimg + ');"></div>';
                                    addHtml += '<div class="TemplateInfo FB"><h3>' + _subtitle + '</h3>';
                                }else{
                                    addHtml += '<div class="TemplateInfo FB"  style="border-radius: 10px;"><h3>' + _subtitle + '</h3>'; 
                                }
                                    addHtml += '<pre>' + _subcontent + '</pre>';
                                    addHtml += '<ul>';
                                        if (action_0!='noaction'){
                                            addHtml += '<li>'+ subject_0 +'</li>';
                                        }
                                        if (action_1!='noaction'){
                                            addHtml += '<li>'+ subject_1 +'</li>';
                                        }
                                        if (action_2!='noaction'){
                                            addHtml += '<li>'+ subject_2 +'</li>';
                                        }
                                    addHtml += '</ul>';
                                addHtml += '</div>';
                            addHtml += '</div>';
                        }
                    }
                    break;
                case 'FB_ListTemplate':
                    var Template = JSON.parse($(this).attr('data-json'));
                    oneTemplateNo += 1;
                    addHtml += '<div class="swiper-slide oneTemplate">';
                    var Last = 0;
                    for (i = 0; i < 4; i++) {
                        if (Template['subject']['subtitle' + i] != "") {
                            Last = i;
                        }
                    }
                    for (i = 0; i < 4; i++) {
                        // 取值
                        var _subtitle = Template['subject']['subtitle' + i];
                        var _subcontent = Template['subject']['subcontent' + i];
                        var _subimg = Template['subject']['img' + i];
                        var subject_0 = Template['subject']['subject' + i + '_0'];

                        // 判斷是否為'不設定動作'
                        var action_0 = Template['subject']['action' + i + '_0'];

                        // 只要有值、就創建整塊
                        if (_subtitle != "") {
                            var Style = 'background-color:#fff;';
                            var borderRadius = (i===Last&&!(Template['subject']['bottomSubject']&&Template['subject']['bottomAction']&&Template['subject']['bottomData'])) ? '' : 'border-radius:0px;';
                            if(i===0){
                                if(Template['subject']['topStyle']!=='compact'){
                                    if(_subimg != undefined && _subimg !=''){
                                        Style = 'background-color:#ffffff00;position:absolute;width:260px;margin-top:-79px;';
                                        addHtml += '<div class="TemplateImg LineTemplate" style="background-size:100% 100%;background-image:url({#$__WEB_UPLOAD#}/image/' + _subimg + ');"></div>';
                                    }else{
                                        borderRadius = 'border-radius:10px 10px 0px 0px;';
                                    }
                                }else{
                                    borderRadius = 'border-radius:10px 10px 0px 0px;';
                                }
                            }
                            addHtml += '<div class="TemplateInfo FB" style="'+ Style+borderRadius +'border-bottom:1px solid #eaeaea;">';
                            addHtml += '<h3 style="width:150px;">' + _subtitle + '</h3><pre style="width:150px;background-color:#fff;">' + _subcontent + '</pre>';
                            if(i!==0 || (i===0&&Template['subject']['topStyle']==='compact')){
                                if(_subimg != undefined && _subimg !=''){
                                    addHtml += '<div class="TemplateImg LineTemplate" style="float:right;margin-top:-60px;width:90px;height:60px;background-size:100% 100%;background-image:url({#$__WEB_UPLOAD#}/image/' + _subimg + ');"></div>';
                                }
                            }
                            addHtml+='</div>';
                        }
                    }
                    if(Template['subject']['bottomSubject']&&Template['subject']['bottomAction']&&Template['subject']['bottomData']){
                        addHtml += '<div class="TemplateInfo FB" style="background-color:#fff;border-bottom:1px solid #eaeaea;">';
                            addHtml += '<h3 style="color:#627fab;margin-bottom:0px;text-align:center;">' + Template['subject']['bottomSubject'] + '</h3>';
                        addHtml += '</div>';
                    }
                    break;
                case 'FB_BtnTemplate':
                    var Template = JSON.parse($(this).attr('data-json'));
                    for (i = 0; i < 1; i++) {
                        // 取值
                        var _subtitle = Template['subject']['subtitle' + i];
                        var subject_0 = Template['subject']['subject' + i + '_0'];
                        var subject_1 = Template['subject']['subject' + i + '_1'];
                        var subject_2 = Template['subject']['subject' + i + '_2'];

                        // 判斷是否為'不設定動作'
                        var action_0 = Template['subject']['action' + i + '_0'];
                        var action_1 = Template['subject']['action' + i + '_1'];
                        var action_2 = Template['subject']['action' + i + '_2'];

                        // 只要有任何一欄有值、就創建整塊
                        if (_subtitle != "" || subject_0 != "" || subject_1 != "" || subject_2 != "") {

                            oneTemplateNo += 1;
                            addHtml += '<div class="swiper-slide oneTemplate">';
                                addHtml += '<div class="TemplateInfo FB"  style="border-radius: 10px;"><h3>' + _subtitle + '</h3>'; 
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
                                    addHtml+='</ul>';
                                addHtml += '</div>';
                            addHtml += '</div>';
                        }
                    }
                    break;
                case 'FB_MediaTemplate':
                    var Template = JSON.parse($(this).attr('data-json'));
                    for (i = 0; i < 1; i++) {
                        // 取值
                        var _subtype = Template['subject']['type' + i];
                        var _subimg = Template['subject']['img' + i];
                        var subject_0 = Template['subject']['subject' + i + '_0'];
                        var subject_1 = Template['subject']['subject' + i + '_1'];
                        var subject_2 = Template['subject']['subject' + i + '_2'];

                        // 判斷是否為'不設定動作'
                        var action_0 = Template['subject']['action' + i + '_0'];
                        var action_1 = Template['subject']['action' + i + '_1'];
                        var action_2 = Template['subject']['action' + i + '_2'];

                        // 只要有任何一欄有值、就創建整塊
                        if (subject_0 != "" || subject_1 != "" || subject_2 != "") {
                            oneTemplateNo += 1;
                            addHtml += '<div class="swiper-slide oneTemplate">';
                                if(_subtype==='video'){
                                    addHtml += '<video style="width:100%;height:100%;margin-bottom:-5px;background-color:#eaeaea;" class="TemplateImg LineTemplate" controls><source src="{#$__WEB_UPLOAD#}/video/'+ _subimg +'"></video>';
                                }else{
                                    addHtml += '<img style="width:100%;height:100%;background-color:#eaeaea;" class="TemplateImg LineTemplate" src="{#$__WEB_UPLOAD#}/image/'+ _subimg +'" />';
                                }
                                addHtml += '<div style="padding-top:0px;" class="TemplateInfo FB">';
                                    addHtml += '<ul>';
                                        var Btn = 0;
                                        for(var x=0;x<3;x++){
                                            if(Template['subject']['action' + i + '_' + x]!='noaction'){
                                                Btn++;
                                            }
                                        }
                                        var Style = 'color:#000;';
                                        Style += (Btn===2) ? 'display:inline-block;width:49%;' : '';
                                        if (action_0!='noaction'){
                                            addHtml += '<li style="'+ Style +'">'+ subject_0 +'</li>';
                                        }
                                        if (action_1!='noaction'){
                                            Style += (Btn===2) ? 'margin-left: 2%;' : '';
                                            addHtml += '<li style="'+ Style +'">'+ subject_1 +'</li>';
                                        }
                                        if (action_2!='noaction'){
                                            addHtml += '<li style="'+ Style +'">'+ subject_2 +'</li>';
                                        }
                                    addHtml += '</ul>';
                                addHtml += '</div>';
                            addHtml += '</div>';
                        }
                    }
                    break;
                case 'FB_ReceiptTemplate':
                    var Template = JSON.parse($(this).attr('data-json'));
                    var elementCtn = 0;
                    addHtml += '<div class="OrderConfirmDetails" style="display:none;">';
                        addHtml += '<div class="h4">';
                            addHtml += '<span class="confirmTitle">訂單確認</span>';
                            addHtml += '<span class="finish" onclick="$(this).parents(\'.OrderConfirmDetails\').hide();$(this).parents(\'.OrderConfirmDetails\').parent().find(\'.OrderConfirm\').show();">完成</span>';
                        addHtml += '</div>';
                        addHtml += '<div class="body">';
                            addHtml += '<div class="products">';
                                addHtml += '<div class="subtitle">商品</div>';
                                addHtml += '<div class="subbody">';
                                    for (i = 0; i < 20; i++){
                                        if(Template['subject']['element_title' + i]){
                                            elementCtn++;
                                            addHtml += '<div class="productItem">';
                                                addHtml += '<div class="pic">';
                                                    if(Template['subject']['element_image_url' + i]){ addHtml += '<img src="{#$__WEB_UPLOAD#}/image/'+ Template['subject']['element_image_url' + i] +'">'; }
                                                addHtml += '</div>';
                                                addHtml += '<div class="text">';
                                                    addHtml += '<div class="productTitle">';
                                                        if(Template['subject']['element_title' + i]){ addHtml += Template['subject']['element_title' + i]; }
                                                        if(Template['subject']['element_quantity' + i]>=0){ addHtml += '▪Qty.' + Template['subject']['element_quantity' + i] ; }
                                                        if(Template['subject']['element_price' + i]>=0){ addHtml += '▪' + NumFormat(Template['subject']['element_price' + i]); }
                                                    addHtml += '</div>';
                                                    if(Template['subject']['element_subtitle' + i]){ addHtml += '<div class="productContent">'+ Template['subject']['element_subtitle' + i] +'</div>'; }
                                                addHtml += '</div>';
                                            addHtml += '</div>';
                                        }
                                    }
                                addHtml += '</div>';
                            addHtml += '</div>';
                            addHtml += '<div class="ordertime">';
                                addHtml += '<div class="subtitle">訂購時間</div>';
                                var timestampTmp = new Date(Template['subject']['timestamp']);
                                var timestamp = timestampTmp.getFullYear()+ '年' +
                                    (timestampTmp.getMonth()*1+1)+ '月' +
                                    timestampTmp.getDate()+ '日 ' +
                                    (  timestampTmp.getHours()<10?'0':'')+  timestampTmp.getHours()+ ':' +
                                    (timestampTmp.getMinutes()<10?'0':'')+timestampTmp.getMinutes()+ ':' +
                                    (timestampTmp.getSeconds()<10?'0':'')+timestampTmp.getSeconds();
                                addHtml += '<div class="subbody">'+ timestamp +'</div>';
                            addHtml += '</div>';
                            addHtml += '<div class="payway">';
                                addHtml += '<div class="subtitle">付款方式</div>';
                                addHtml += '<div class="subbody">'+ Template['subject']['payment_method'] +'</div>';
                            addHtml += '</div>';
                            addHtml += '<div class="receiptplace">';
                                addHtml += '<div class="subtitle">收貨地點</div>';
                                addHtml += '<div class="subbody">';
                                    if(Template['subject']['subject']){ addHtml += Template['subject']['subject'] + '<br>'; }
                                    if(Template['subject']['street_1']){ addHtml += Template['subject']['street_1']; }
                                    if(Template['subject']['street_2']){ addHtml += ' ' + Template['subject']['street_2']; }
                                    if(Template['subject']['street_1'] || Template['subject']['street_2']){  addHtml += '<br>'; }
                                    if(Template['subject']['city']){ addHtml += Template['subject']['city']; }
                                    if(Template['subject']['state']){ addHtml += ', ' + Template['subject']['state']; }
                                    if(Template['subject']['postal_code']){ addHtml += ' ' + Template['subject']['postal_code']; }
                                addHtml += '</div>';
                            addHtml += '</div>';
                            addHtml += '<div class="summary">';
                                addHtml += '<div class="subtitle">摘要</div>';
                                addHtml += '<div class="subbody">';
                                    if(Template['subject']['subtotal']>=0){
                                        addHtml += '<div>小計';
                                            addHtml += '<div class="summaryItem">'+ NumFormat(Template['subject']['subtotal']) +'</div>';
                                        addHtml += '</div>';
                                    }
                                    if(Template['subject']['shipping_cost']>=0){
                                        addHtml += '<div>運費';
                                            addHtml += '<div class="summaryItem">'+ NumFormat(Template['subject']['shipping_cost']) +'</div>';
                                        addHtml += '</div>';
                                    }
                                    if(Template['subject']['total_tax']>=0){
                                        addHtml += '<div>預估稅金';
                                            addHtml += '<div class="summaryItem">'+ NumFormat(Template['subject']['total_tax']) +'</div>';
                                        addHtml += '</div>';
                                    }
                                    for(var t=0;t<10;t++){
                                        if(Template['subject']['adjustment_name' + t] && Template['subject']['adjustment_amount' + t]>=0){
                                            addHtml += '<div>' + Template['subject']['adjustment_name' + t];
                                                addHtml += '<div class="summaryItem">'+ NumFormat(Template['subject']['adjustment_amount' + t]) +'</div>';
                                            addHtml += '</div>';
                                        }
                                    }
                                    if(Template['subject']['total_cost']>=0){
                                        addHtml += '<br><div>總計';
                                            addHtml += '<div class="summaryItem">'+ NumFormat(Template['subject']['total_cost']) +'</div>';
                                        addHtml += '</div>';
                                    }
                                addHtml += '</div>';
                            addHtml += '</div>';
                        addHtml += '</div>';
                    addHtml += '</div>';
                    
                    addHtml += '<div class="OrderConfirm" onclick="$(this).hide();$(this).parent().find(\'.OrderConfirmDetails\').show();">';
                        addHtml += '<div class="IconArea">';
                            addHtml += '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 507.2 507.2" xml:space="preserve">'+
                                            '<circle style="fill:#32BA7C;" cx="253.6" cy="253.6" r="253.6"/>'+
                                            '<path style="fill:#0AA06E;" d="M188.8,368l130.4,130.4c108-28.8,188-127.2,188-244.8c0-2.4,0-4.8,0-7.2L404.8,152L188.8,368z"/>'+
                                            '<g>'+
                                                '<path style="fill:#FFFFFF;" d="M260,310.4c11.2,11.2,11.2,30.4,0,41.6l-23.2,23.2c-11.2,11.2-30.4,11.2-41.6,0L93.6,272.8   c-11.2-11.2-11.2-30.4,0-41.6l23.2-23.2c11.2-11.2,30.4-11.2,41.6,0L260,310.4z"/>'+
                                                '<path style="fill:#FFFFFF;" d="M348.8,133.6c11.2-11.2,30.4-11.2,41.6,0l23.2,23.2c11.2,11.2,11.2,30.4,0,41.6l-176,175.2   c-11.2,11.2-30.4,11.2-41.6,0l-23.2-23.2c-11.2-11.2-11.2-30.4,0-41.6L348.8,133.6z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g>'+
                                            '</g>'+
                                        '</svg>';
                        addHtml += '</div>';
                        addHtml += '<div class="TextArea">';
                            addHtml += '<h4>訂單確認</h4>';
                            addHtml += '<span>'+ elementCtn +' 項目 '+ NumFormat(Template['subject']['total_cost']) +'</span><br>';
                            addHtml += '<span>'+ Template['subject']['payment_method'] +'</span><br>';
                            addHtml += '<span>收貨地點 '+ Template['subject']['city']+','+Template['subject']['state']+' '+Template['subject']['postal_code'] +'</span>';
                        addHtml += '</div>';
                    addHtml += '</div>';
                    break;
            }
            $('#fbSaveMsg'+fbSelectMsg).val($(this).attr('data-id'));
            if($(this).attr('data-type') !== 'CustomMessage'){
                minWidth = minWidth ? minWidth : 270*oneTemplateNo+'px';
                $('.PhoneContent.'+$(this).attr('data-type')+' .TemplateBG').html(addHtml).css('min-width', minWidth).show();
                $('#fbmsgview'+fbSelectMsg).html($('.PhoneContent.'+$(this).attr('data-type')).html());
            }            
        });
        LoadMsg();
        //window.setTimeout(( () => LoadMsg() ), 1000);
    });
    function LoadMsg(){
        for(var i=0;i<5;i++){
            fbEditMsg(i, 'load');
        }
        if('{#$row.subject.QuicklyReply#}'){
            fbEditMsg(5, 'load');
        }
    }
    //表情代碼寫入
    /*function InsertContent(Content) {
        var myArea = $('#fbtextValue');
        if (document.selection) { //for IE
            myArea.focus();
            var mySelection = document.selection.createRange();
            mySelection.text = Content;
        } else { //for FireFox
            var myPrefix = myArea.val().substr(0, myArea[0].selectionStart); // 取出游標之前
            var mySuffix = myArea.val().substr(myArea[0].selectionEnd); //取出游標之後
            myArea.val(myPrefix + Content + mySuffix);
        }
        fbUpdateMsg();
    }*/
    function fbUpdateMedia(action){
        if(action === 'new'){
            $('#fbSaveMsg'+fbSelectMsg).val('');
        }
        var fbMsgType = $('#fbMsgType'+fbSelectMsg).val();
        var ShowBox = '';
        var PreView = '';
        var PreType = '';
        switch(fbMsgType){
            case 'image':
                ShowBox = '#fbShowImageBox';
                PreView = '#fbpreviews_img';
                break;
            case 'video':
                ShowBox = '#fbShowVideoBox';
                PreView = '#fbpreviews_video';
                break;
            case 'audio':
                ShowBox = '#fbShowAudioBox';
                PreView = '#fbpreviews_audio';
                break;
        }
        PreType = ShowBox + ' '+PreView+fbSelectMsg;
        $('#fbmsgview'+fbSelectMsg).html($(PreType).clone());
        if(action === 'new'){
            $(ShowBox).click();
        }
    }
</script>

<!--  彈出 文字  Modal  -->
<div id="fbShowTextBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" style="padding: 20vh 0px;">
                <textarea id="fbtextValue" type="text" class="form-control" rows="10" onchange="fbUpdateMsg();"></textarea>
                <style>
                    #fbShowTextBox .emojionearea .emojionearea-editor {
                        min-height: 300px;
                    }
                </style>
                <script>
                    $(function () {
                        $('#fbtextValue').emojioneArea({
                            pickerPosition: "left",
                            tonesStyle: "bullet"
                        });
                    });
                </script>
                {#if !$notify#}
                    <!--<div class="btn btn-primary btn-sm BtnEmoticon" data-toggle="modal" data-target="#fbShowkaomojiBox">  </div>-->
                {#/if#}
            </div>
        </div>
    </div>
</div>
<!--  彈出 表情  Modal  -->
<div id="fbShowkaomojiBox" class="modal fade" role="dialog">
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
                            <!-- <li data-img="(hee)"><img src="{#$__RES_Web#}/images/10018C_k.png"></li> 由data.json載入 -->
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
<div id="fbShowStickerBox" class="modal fade" role="dialog">
    <div class="modal-dialog tag-7">
        <!-- Modal content-->
        <div class="modal-content">
            <h3>貼圖</h3>
            <ul class="nav nav-tabs">
                {#if !$notify#}
                    <li class="active"><a href="#fbImgType01" data-toggle="tab" aria-expanded="false"><img src="{#$__RES_Web#}/images/tab_on_1.png"></a></li>   
                    <li class=""><a href="#fbImgType02" data-toggle="tab" aria-expanded="false"><img src="{#$__RES_Web#}/images/tab_on_2.png"></a></li> 
                    <li class=""><a href="#fbImgType03" data-toggle="tab" aria-expanded="false"><img src="{#$__RES_Web#}/images/tab_on_3.png"></a></li>
                {#/if#}
                <!-- 新增貼圖 -->
                <li class="{#if $notify#}active{#/if#}"><a href="#fbImgType04" data-toggle="tab" aria-expanded="false"><img src="{#$__RES_Web#}/images/tab_on_4.png"></a></li>
                <li class=""><a href="#fbImgType05" data-toggle="tab" aria-expanded="true"><img src="{#$__RES_Web#}/images/tab_on_5.png"></a></li>
                <li class=""><a href="#fbImgType06" data-toggle="tab" aria-expanded="true"><img src="{#$__RES_Web#}/images/tab_on_6.png"> </a></li>
                <li class=""><a href="#fbImgType07" data-toggle="tab" aria-expanded="true"><img src="{#$__RES_Web#}/images/tab_on_7.png"> </a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade fbImgType {#if !$notify#}active in{#/if#}" id="fbImgType01">
                    <ul>
                        <li data-stkid="11537_52002734"></li><li data-stkid="11537_52002735"></li><li data-stkid="11537_52002736"></li><li data-stkid="11537_52002737"></li><li data-stkid="11537_52002738"></li><li data-stkid="11537_52002739"></li><li data-stkid="11537_52002740"></li><li data-stkid="11537_52002741"></li><li data-stkid="11537_52002742"></li><li data-stkid="11537_52002743"></li><li data-stkid="11537_52002744"></li><li data-stkid="11537_52002745"></li><li data-stkid="11537_52002746"></li><li data-stkid="11537_52002747"></li><li data-stkid="11537_52002748"></li><li data-stkid="11537_52002749"></li><li data-stkid="11537_52002750"></li><li data-stkid="11537_52002751"></li><li data-stkid="11537_52002752"></li><li data-stkid="11537_52002753"></li><li data-stkid="11537_52002754"></li><li data-stkid="11537_52002755"></li><li data-stkid="11537_52002756"></li><li data-stkid="11537_52002757"></li><li data-stkid="11537_52002758"></li><li data-stkid="11537_52002759"></li><li data-stkid="11537_52002760"></li><li data-stkid="11537_52002761"></li><li data-stkid="11537_52002762"></li><li data-stkid="11537_52002763"></li><li data-stkid="11537_52002764"></li><li data-stkid="11537_52002765"></li><li data-stkid="11537_52002766"></li><li data-stkid="11537_52002767"></li><li data-stkid="11537_52002768"></li><li data-stkid="11537_52002769"></li><li data-stkid="11537_52002770"></li><li data-stkid="11537_52002771"></li><li data-stkid="11537_52002772"></li><li data-stkid="11537_52002773"></li>
                    </ul>
                </div>
                <div class="tab-pane fade fbImgType" id="fbImgType02">
                    <ul>
                        <li data-stkid="11538_51626494"></li><li data-stkid="11538_51626495"></li><li data-stkid="11538_51626496"></li><li data-stkid="11538_51626497"></li><li data-stkid="11538_51626498"></li><li data-stkid="11538_51626499"></li><li data-stkid="11538_51626500"></li><li data-stkid="11538_51626501"></li><li data-stkid="11538_51626502"></li><li data-stkid="11538_51626503"></li><li data-stkid="11538_51626504"></li><li data-stkid="11538_51626505"></li><li data-stkid="11538_51626506"></li><li data-stkid="11538_51626507"></li><li data-stkid="11538_51626508"></li><li data-stkid="11538_51626509"></li><li data-stkid="11538_51626510"></li><li data-stkid="11538_51626511"></li><li data-stkid="11538_51626512"></li><li data-stkid="11538_51626513"></li><li data-stkid="11538_51626514"></li><li data-stkid="11538_51626515"></li><li data-stkid="11538_51626516"></li><li data-stkid="11538_51626517"></li><li data-stkid="11538_51626518"></li><li data-stkid="11538_51626519"></li><li data-stkid="11538_51626520"></li><li data-stkid="11538_51626521"></li><li data-stkid="11538_51626522"></li><li data-stkid="11538_51626523"></li><li data-stkid="11538_51626524"></li><li data-stkid="11538_51626525"></li><li data-stkid="11538_51626526"></li><li data-stkid="11538_51626527"></li><li data-stkid="11538_51626528"></li><li data-stkid="11538_51626529"></li><li data-stkid="11538_51626530"></li><li data-stkid="11538_51626531"></li><li data-stkid="11538_51626532"></li><li data-stkid="11538_51626533"></li>
                    </ul>
                </div>
                <div class="tab-pane fade fbImgType" id="fbImgType03">
                    <ul>
                        <li data-stkid="11539_52114110"></li><li data-stkid="11539_52114111"></li><li data-stkid="11539_52114112"></li><li data-stkid="11539_52114113"></li><li data-stkid="11539_52114114"></li><li data-stkid="11539_52114115"></li><li data-stkid="11539_52114116"></li><li data-stkid="11539_52114117"></li><li data-stkid="11539_52114118"></li><li data-stkid="11539_52114119"></li><li data-stkid="11539_52114120"></li><li data-stkid="11539_52114121"></li><li data-stkid="11539_52114122"></li><li data-stkid="11539_52114123"></li><li data-stkid="11539_52114124"></li><li data-stkid="11539_52114125"></li><li data-stkid="11539_52114126"></li><li data-stkid="11539_52114127"></li><li data-stkid="11539_52114128"></li><li data-stkid="11539_52114129"></li><li data-stkid="11539_52114130"></li><li data-stkid="11539_52114131"></li><li data-stkid="11539_52114132"></li><li data-stkid="11539_52114133"></li><li data-stkid="11539_52114134"></li><li data-stkid="11539_52114135"></li><li data-stkid="11539_52114136"></li><li data-stkid="11539_52114137"></li><li data-stkid="11539_52114138"></li><li data-stkid="11539_52114139"></li><li data-stkid="11539_52114140"></li><li data-stkid="11539_52114141"></li><li data-stkid="11539_52114142"></li><li data-stkid="11539_52114143"></li><li data-stkid="11539_52114144"></li><li data-stkid="11539_52114145"></li><li data-stkid="11539_52114146"></li><li data-stkid="11539_52114147"></li><li data-stkid="11539_52114148"></li><li data-stkid="11539_52114149"></li>
                    </ul>
                </div>
                <!-- 新增貼圖 -->
                <div class="tab-pane fade fbImgType {#if $notify#}active in{#/if#}" id="fbImgType04">
                    <ul>
                        <li data-stkid="1_4"></li><li data-stkid="1_13"></li><li data-stkid="1_2"></li><li data-stkid="1_10"></li><li data-stkid="1_17"></li><li data-stkid="1_401"></li><li data-stkid="1_402"></li><li data-stkid="1_5"></li><li data-stkid="1_15"></li><li data-stkid="1_1"></li><li data-stkid="1_3"></li><li data-stkid="1_16"></li><li data-stkid="1_403"></li><li data-stkid="1_404"></li><li data-stkid="1_405"></li><li data-stkid="1_406"></li><li data-stkid="1_11"></li><li data-stkid="1_7"></li><li data-stkid="1_21"></li><li data-stkid="1_14"></li><li data-stkid="1_8"></li><li data-stkid="1_9"></li><li data-stkid="1_12"></li><li data-stkid="1_6"></li><li data-stkid="1_100"></li><li data-stkid="1_101"></li><li data-stkid="1_102"></li><li data-stkid="1_103"></li><li data-stkid="1_104"></li><li data-stkid="1_105"></li><li data-stkid="1_106"></li><li data-stkid="1_107"></li><li data-stkid="1_108"></li><li data-stkid="1_109"></li><li data-stkid="1_110"></li><li data-stkid="1_111"></li><li data-stkid="1_112"></li><li data-stkid="1_113"></li><li data-stkid="1_114"></li><li data-stkid="1_115"></li><li data-stkid="1_116"></li><li data-stkid="1_117"></li><li data-stkid="1_118"></li><li data-stkid="1_407"></li><li data-stkid="1_408"></li><li data-stkid="1_409"></li><li data-stkid="1_410"></li><li data-stkid="1_411"></li><li data-stkid="1_412"></li><li data-stkid="1_413"></li><li data-stkid="1_414"></li><li data-stkid="1_415"></li><li data-stkid="1_416"></li><li data-stkid="1_417"></li><li data-stkid="1_418"></li><li data-stkid="1_419"></li><li data-stkid="1_420"></li><li data-stkid="1_421"></li><li data-stkid="1_422"></li><li data-stkid="1_423"></li><li data-stkid="1_424"></li><li data-stkid="1_425"></li><li data-stkid="1_426"></li><li data-stkid="1_427"></li><li data-stkid="1_428"></li><li data-stkid="1_429"></li><li data-stkid="1_430"></li><li data-stkid="1_119"></li><li data-stkid="1_120"></li><li data-stkid="1_121"></li><li data-stkid="1_122"></li><li data-stkid="1_123"></li><li data-stkid="1_124"></li><li data-stkid="1_125"></li><li data-stkid="1_126"></li><li data-stkid="1_127"></li><li data-stkid="1_128"></li><li data-stkid="1_129"></li><li data-stkid="1_130"></li><li data-stkid="1_131"></li><li data-stkid="1_132"></li><li data-stkid="1_133"></li><li data-stkid="1_134"></li><li data-stkid="1_135"></li><li data-stkid="1_136"></li><li data-stkid="1_137"></li><li data-stkid="1_138"></li><li data-stkid="1_139"></li>
                    </ul>
                </div>
                <div class="tab-pane fade fbImgType " id="fbImgType05">
                    <ul>
                        <li data-stkid="2_140"></li><li data-stkid="2_141"></li><li data-stkid="2_142"></li><li data-stkid="2_143"></li><li data-stkid="2_501"></li><li data-stkid="2_502"></li><li data-stkid="2_503"></li><li data-stkid="2_144"></li><li data-stkid="2_145"></li><li data-stkid="2_146"></li><li data-stkid="2_147"></li><li data-stkid="2_504"></li><li data-stkid="2_505"></li><li data-stkid="2_506"></li><li data-stkid="2_507"></li><li data-stkid="2_148"></li><li data-stkid="2_149"></li><li data-stkid="2_150"></li><li data-stkid="2_151"></li><li data-stkid="2_152"></li><li data-stkid="2_153"></li><li data-stkid="2_154"></li><li data-stkid="2_155"></li><li data-stkid="2_19"></li><li data-stkid="2_508"></li><li data-stkid="2_509"></li><li data-stkid="2_510"></li><li data-stkid="2_511"></li><li data-stkid="2_512"></li><li data-stkid="2_513"></li><li data-stkid="2_18"></li><li data-stkid="2_38"></li><li data-stkid="2_514"></li><li data-stkid="2_515"></li><li data-stkid="2_516"></li><li data-stkid="2_156"></li><li data-stkid="2_158"></li><li data-stkid="2_157"></li><li data-stkid="2_517"></li><li data-stkid="2_518"></li><li data-stkid="2_519"></li><li data-stkid="2_520"></li><li data-stkid="2_159"></li><li data-stkid="2_521"></li><li data-stkid="2_522"></li><li data-stkid="2_523"></li><li data-stkid="2_524"></li><li data-stkid="2_525"></li><li data-stkid="2_22"></li><li data-stkid="2_34"></li><li data-stkid="2_32"></li><li data-stkid="2_23"></li><li data-stkid="2_526"></li><li data-stkid="2_527"></li><li data-stkid="2_39"></li><li data-stkid="2_33"></li><li data-stkid="2_24"></li><li data-stkid="2_25"></li><li data-stkid="2_27"></li><li data-stkid="2_29"></li><li data-stkid="2_30"></li><li data-stkid="2_31"></li><li data-stkid="2_26"></li><li data-stkid="2_160"></li><li data-stkid="2_161"></li><li data-stkid="2_162"></li><li data-stkid="2_163"></li><li data-stkid="2_164"></li><li data-stkid="2_165"></li><li data-stkid="2_166"></li><li data-stkid="2_167"></li><li data-stkid="2_168"></li><li data-stkid="2_169"></li><li data-stkid="2_170"></li><li data-stkid="2_171"></li><li data-stkid="2_172"></li><li data-stkid="2_173"></li><li data-stkid="2_174"></li><li data-stkid="2_175"></li><li data-stkid="2_176"></li><li data-stkid="2_177"></li><li data-stkid="2_178"></li><li data-stkid="2_179"></li><li data-stkid="2_37"></li><li data-stkid="2_36"></li><li data-stkid="2_46"></li><li data-stkid="2_35"></li><li data-stkid="2_28"></li><li data-stkid="2_20"></li><li data-stkid="2_42"></li><li data-stkid="2_41"></li><li data-stkid="2_47"></li><li data-stkid="2_43"></li><li data-stkid="2_45"></li><li data-stkid="2_40"></li><li data-stkid="2_44"></li>
                    </ul>
                </div>
                <div class="tab-pane fade fbImgType " id="fbImgType06">
                    <ul>
                        <li data-stkid="3_180"></li><li data-stkid="3_181"></li><li data-stkid="3_182"></li><li data-stkid="3_183"></li><li data-stkid="3_184"></li><li data-stkid="3_185"></li><li data-stkid="3_186"></li><li data-stkid="3_187"></li><li data-stkid="3_188"></li><li data-stkid="3_189"></li><li data-stkid="3_190"></li><li data-stkid="3_191"></li><li data-stkid="3_192"></li><li data-stkid="3_193"></li><li data-stkid="3_194"></li><li data-stkid="3_195"></li><li data-stkid="3_196"></li><li data-stkid="3_197"></li><li data-stkid="3_198"></li><li data-stkid="3_199"></li><li data-stkid="3_200"></li><li data-stkid="3_201"></li><li data-stkid="3_202"></li><li data-stkid="3_203"></li><li data-stkid="3_204"></li><li data-stkid="3_205"></li><li data-stkid="3_206"></li><li data-stkid="3_207"></li><li data-stkid="3_208"></li><li data-stkid="3_209"></li><li data-stkid="3_210"></li><li data-stkid="3_211"></li><li data-stkid="3_212"></li><li data-stkid="3_213"></li><li data-stkid="3_214"></li><li data-stkid="3_215"></li><li data-stkid="3_216"></li><li data-stkid="3_217"></li><li data-stkid="3_218"></li><li data-stkid="3_219"></li><li data-stkid="3_220"></li><li data-stkid="3_221"></li><li data-stkid="3_222"></li><li data-stkid="3_223"></li><li data-stkid="3_224"></li><li data-stkid="3_225"></li><li data-stkid="3_226"></li><li data-stkid="3_227"></li><li data-stkid="3_228"></li><li data-stkid="3_229"></li><li data-stkid="3_230"></li><li data-stkid="3_231"></li><li data-stkid="3_232"></li><li data-stkid="3_233"></li><li data-stkid="3_234"></li><li data-stkid="3_235"></li><li data-stkid="3_236"></li><li data-stkid="3_237"></li><li data-stkid="3_238"></li><li data-stkid="3_239"></li><li data-stkid="3_240"></li><li data-stkid="3_241"></li><li data-stkid="3_242"></li><li data-stkid="3_243"></li><li data-stkid="3_244"></li><li data-stkid="3_245"></li><li data-stkid="3_246"></li><li data-stkid="3_247"></li><li data-stkid="3_248"></li><li data-stkid="3_249"></li><li data-stkid="3_250"></li><li data-stkid="3_251"></li><li data-stkid="3_252"></li><li data-stkid="3_253"></li><li data-stkid="3_254"></li><li data-stkid="3_255"></li><li data-stkid="3_256"></li><li data-stkid="3_257"></li><li data-stkid="3_258"></li><li data-stkid="3_259"></li>
                    </ul>
                </div>
                <div class="tab-pane fade fbImgType " id="fbImgType07">
                    <ul>
                        <li data-stkid="4_263"></li><li data-stkid="4_264"></li><li data-stkid="4_265"></li><li data-stkid="4_266"></li><li data-stkid="4_267"></li><li data-stkid="4_268"></li><li data-stkid="4_601"></li><li data-stkid="4_602"></li><li data-stkid="4_603"></li><li data-stkid="4_604"></li><li data-stkid="4_605"></li><li data-stkid="4_606"></li><li data-stkid="4_260"></li><li data-stkid="4_261"></li><li data-stkid="4_262"></li><li data-stkid="4_607"></li><li data-stkid="4_269"></li><li data-stkid="4_270"></li><li data-stkid="4_271"></li><li data-stkid="4_272"></li><li data-stkid="4_273"></li><li data-stkid="4_608"></li><li data-stkid="4_274"></li><li data-stkid="4_275"></li><li data-stkid="4_276"></li><li data-stkid="4_277"></li><li data-stkid="4_278"></li><li data-stkid="4_609"></li><li data-stkid="4_610"></li><li data-stkid="4_282"></li><li data-stkid="4_283"></li><li data-stkid="4_291"></li><li data-stkid="4_279"></li><li data-stkid="4_280"></li><li data-stkid="4_281"></li><li data-stkid="4_284"></li><li data-stkid="4_285"></li><li data-stkid="4_611"></li><li data-stkid="4_286"></li><li data-stkid="4_612"></li><li data-stkid="4_288"></li><li data-stkid="4_289"></li><li data-stkid="4_613"></li><li data-stkid="4_614"></li><li data-stkid="4_615"></li><li data-stkid="4_290"></li><li data-stkid="4_616"></li><li data-stkid="4_617"></li><li data-stkid="4_292"></li><li data-stkid="4_293"></li><li data-stkid="4_294"></li><li data-stkid="4_295"></li><li data-stkid="4_296"></li><li data-stkid="4_618"></li><li data-stkid="4_619"></li><li data-stkid="4_287"></li><li data-stkid="4_297"></li><li data-stkid="4_298"></li><li data-stkid="4_299"></li><li data-stkid="4_300"></li><li data-stkid="4_301"></li><li data-stkid="4_302"></li><li data-stkid="4_620"></li><li data-stkid="4_303"></li><li data-stkid="4_304"></li><li data-stkid="4_305"></li><li data-stkid="4_306"></li><li data-stkid="4_307"></li><li data-stkid="4_621"></li><li data-stkid="4_622"></li><li data-stkid="4_623"></li><li data-stkid="4_624"></li><li data-stkid="4_625"></li><li data-stkid="4_629"></li><li data-stkid="4_627"></li><li data-stkid="4_628"></li><li data-stkid="4_626"></li><li data-stkid="4_630"></li><li data-stkid="4_631"></li><li data-stkid="4_632"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 圖文訊息  Modal  -->
<div id="fbShowImageMapBox" class="modal fade" role="dialog">
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
                <div class="fbShowValueListBG ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table fbShowValueList ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            {#foreach $rows_ImageMap as $key=>$item#}
                                <tr class="" data-id="{#$item.id#}" data-type="ImageMap" data-json='{#json_encode($item)#}'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        {#if $item.subject.img0#}
                                            <img class="img-responsive" alt="Image" src="{#$__WEB_UPLOAD#}/image/{#$item.subject.img0#}">
                                        {#else#}
                                            <i class="fa fa-window-close"></i>
                                        {#/if#}
                                    </td>
                                    <td>
                                        {#$item.subject.subject#}
                                    </td>
                                </tr>
                            {#/foreach#}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 卡片式選單  Modal  -->
<div id="fbShowTemplateBox" class="modal fade" role="dialog">
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
                <div class="fbShowValueListBG ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table fbShowValueList ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            {#foreach $rows_LineTemplate as $key=>$item#}
                                <tr class="" data-id="{#$item.id#}" data-type="LineTemplate" data-json='{#json_encode($item)#}'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        {#if $item.subject.img0#}
                                            <img class="img-responsive" alt="Image" src="{#$__WEB_UPLOAD#}/image/{#$item.subject.img0#}">
                                        {#else#}
                                            <i class="fa fa-window-close"></i>
                                        {#/if#}
                                    </td>
                                    <td>
                                        {#$item.subject.subtitle0#}
                                    </td>
                                </tr>
                            {#/foreach#}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 大圖選單  Modal  -->
<div id="fbShowImageCarouselBox" class="modal fade" role="dialog">
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
                <div class="fbShowValueListBG ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table fbShowValueList ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            {#foreach $rows_ImageCarousel as $key=>$item#}
                                <tr class="" data-id="{#$item.id#}" data-type="ImageCarousel" data-json='{#json_encode($item)#}'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        {#if $item.subject.img0#}
                                            <img class="img-responsive" alt="Image" src="{#$__WEB_UPLOAD#}/image/{#$item.subject.img0#}">
                                        {#else#}
                                            <i class="fa fa-window-close"></i>
                                        {#/if#}
                                    </td>
                                    <td>
                                        {#$item.subject.subject0_0#}
                                    </td>
                                </tr>
                            {#/foreach#}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 照片  Modal  -->
<div id="fbShowImageBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                {#for $G=0 to 4#}
                    <div id="fbUploadImage{#$G#}" class="fbUploadImage">
                        <label class="btn btn-info" style="float:right;">
                            <input style="display:none;" id="fbFILES_img{#$G#}" class="form-control" name="value_{#$G#}" onchange="init_inputImage(this, '{#$G#}', 'fb');" type="file">
                            <i class="fa fa-photo"></i>上傳圖片
                        </label>
                        <img style="width:300px;height:200px;display: none;" class="img-thumbnail1" id="fbpreviews_img{#$G#}" src=""/>
                    </div>
                {#/for#}
            </div>
        </div>
    </div>
</div>
<!--  彈出 影片  Modal  -->
<div id="fbShowVideoBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                {#for $G=0 to 4#}
                    <div id="fbUploadVideo{#$G#}" class="fbUploadVideo">
                        <label class="btn btn-info" style="float:right;">
                            <input style="display:none;" id="fbFILES_video{#$G#}" class="form-control" name="value_{#$G#}" onchange="init_inputVideo(this, '{#$G#}', 'fb');" type="file" accept="video/mp4" maxsize="200MB">
                            <i class="fa fa-photo"></i>上傳影片
                        </label>
                        <video style="width:300px;height:200px;display: none;" class="img-thumbnail1" id="fbpreviews_video{#$G#}" crossorigin="anonymous" controls>
                            <source src="">
                        </video>
                    </div>
                {#/for#}
            </div>
        </div>
    </div>
</div>
<!--  彈出 語音訊息  Modal  -->
<div id="fbShowAudioBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                {#for $G=0 to 4#}
                    <div id="fbUploadAudio{#$G#}" class="fbUploadAudio">
                        <label class="btn btn-info" style="float:right;">
                            <input style="display:none;" id="fbFILES_audio{#$G#}" class="form-control" name="value_{#$G#}" onchange="init_inputAudio(this, '{#$G#}', 'fb');" type="file" accept="audio/x-m4a, audio/mp3" maxsize="10MB">
                            <i class="fa fa-photo"></i>上傳語音訊息
                        </label>
                        <audio class="img-thumbnail1" id="fbpreviews_audio{#$G#}" style="width:300px;height:200px;display: none;" controls>
                            <source src="">
                        </audio>
                    </div>
                {#/for#}
            </div>
        </div>
    </div>
</div>
<!--  彈出 自訂訊息  Modal  -->
<div id="ShowCustomBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div id="CustomPreview" class="PhoneContent CustomMessage">
                        
                    </div>
                </div>
                <div class="fbShowValueListBG ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table fbShowValueList ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            {#foreach $rows_CustomMessage as $key=>$item#}
                                <tr class="" data-id="{#$item.id#}" data-type="CustomMessage" data-json='{#json_encode($item)#}' msg-json='{#json_encode($item.subject.data)#}'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td>
                                        {#$item.subject.subject#}
                                    </td>
                                </tr>
                            {#/foreach#}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 快捷語  Modal  -->
<div id="fbShowQuicklyReplyBox" class="modal fade" role="dialog">
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
                <div class="fbShowValueListBG ShowValueList" style="width: 58%;float: left;background-color: #f5f5f5;height: 65vh;">
                    <table class="table fbShowValueList ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            {#foreach $rows_QuicklyReply as $key=>$item#}
                                <tr class="" data-id="{#$item.id#}" data-type="QuicklyReply" data-json='{#json_encode($item)#}'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        {#if $item.subject.img0#}
                                            <img class="img-responsive" alt="Image" src="{#$__WEB_UPLOAD#}/image/{#$item.subject.img0#}">
                                        {#else#}
                                            <i class="fa fa-window-close"></i>
                                        {#/if#}
                                    </td>
                                    <td>
                                        {#$item.subject.subject0_0#}
                                    </td>
                                </tr>
                            {#/foreach#}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!--  彈出 一般型卡片  Modal  -->
<div id="fbShowFB_TemplateBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent FB FB_Template">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table fbShowValueList ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            {#foreach $rows_FB_Template as $key=>$item#}
                                <tr class="" data-id="{#$item.id#}" data-type="FB_Template" data-json='{#json_encode($item)#}'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        {#if $item.subject.img0#}
                                            <img class="img-responsive" alt="Image" src="{#$__WEB_UPLOAD#}/image/{#$item.subject.img0#}">
                                        {#else#}
                                            <i class="fa fa-window-close"></i>
                                        {#/if#}
                                    </td>
                                    <td>
                                        {#$item.subject.subject#}
                                    </td>
                                </tr>
                            {#/foreach#}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 清單卡片  Modal  -->
<div id="fbShowFB_ListTemplateBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent FB FB_ListTemplate">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table fbShowValueList ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            {#foreach $rows_FB_ListTemplate as $key=>$item#}
                                <tr class="" data-id="{#$item.id#}" data-type="FB_ListTemplate" data-json='{#json_encode($item)#}'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        {#if $item.subject.img0#}
                                            <img class="img-responsive" alt="Image" src="{#$__WEB_UPLOAD#}/image/{#$item.subject.img0#}">
                                        {#else#}
                                            <i class="fa fa-window-close"></i>
                                        {#/if#}
                                    </td>
                                    <td>
                                        {#$item.subject.subject#}
                                    </td>
                                </tr>
                            {#/foreach#}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 按鈕卡片  Modal  -->
<div id="fbShowFB_BtnTemplateBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent FB FB_BtnTemplate">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table fbShowValueList ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            {#foreach $rows_FB_BtnTemplate as $key=>$item#}
                                <tr class="" data-id="{#$item.id#}" data-type="FB_BtnTemplate" data-json='{#json_encode($item)#}'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td>
                                        {#$item.subject.subject#}
                                    </td>
                                </tr>
                            {#/foreach#}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 媒體卡片  Modal  -->
<div id="fbShowFB_MediaTemplateBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent FB FB_MediaTemplate">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table fbShowValueList ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            {#foreach $rows_FB_MediaTemplate as $key=>$item#}
                                <tr class="" data-id="{#$item.id#}" data-type="FB_MediaTemplate" data-json='{#json_encode($item)#}'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        {#if $item.subject.type0=='video'#}
                                            <video class="img-responsive" controls>
                                                <source src="{#$__WEB_UPLOAD#}/video/{#$item.subject.img0#}">
                                            </video>
                                        {#else#}
                                            <img class="img-responsive" alt="Image" src="{#$__WEB_UPLOAD#}/image/{#$item.subject.img0#}">
                                        {#/if#}
                                    </td>
                                    <td>
                                        {#$item.subject.subject#}
                                    </td>
                                </tr>
                            {#/foreach#}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  彈出 收據卡片  Modal  -->
<div id="fbShowFB_ReceiptTemplateBox" class="modal fade" role="dialog">
    <div class="modal-dialog  tag-2">
        <div class="tab-content">
            <div class="tab-pane fade active in" >
                <div class="LineTemplateStyle" style="width: 42%;float: left;background-color: #f5f5f5;">
                    <div class="PhoneContent FB FB_ReceiptTemplate">
                        <div class="swiper-container">
                            <div class="swiper-wrapper TemplateBG">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ShowValueListBG" style="width: 58%;float: left;background-color: #f5f5f5;">
                    <table class="table fbShowValueList ShowValueList">
                        <thead>
                            <tr>
                                <th class="target">選擇</th>
                                <th class="img">圖片</th>
                                <th class="name">標題備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            {#foreach $rows_FB_ReceiptTemplate as $key=>$item#}
                                <tr class="" data-id="{#$item.id#}" data-type="FB_ReceiptTemplate" data-json='{#json_encode($item)#}'>
                                    <td class="target">
                                        <i class="fa fa-check-square"></i>
                                    </td>
                                    <td class="img">
                                        {#if $item.subject.element_image_url0#}
                                            <img class="img-responsive" alt="Image" src="{#$__WEB_UPLOAD#}/image/{#$item.subject.element_image_url0#}">
                                        {#else#}
                                            <i class="fa fa-window-close"></i>
                                        {#/if#}
                                    </td>
                                    <td>
                                        {#$item.subject.subject#}
                                    </td>
                                </tr>
                            {#/foreach#}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>