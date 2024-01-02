<?php
    $_From = kCore_get('FrontEndAndBackEnd', $_SERVER['PATH_TRANSLATED']);
    $_Module = !empty($_From) ? kCore_get($_From, $_SERVER['PATH_TRANSLATED']) : '';
    $_Action = ($_From=='backend') ? kCore_get($_Module) : '';
    $SystemType = kCore_get('SystemMessage');
    $id = kCore_get('id');
    $type = kCore_get('type');
    $_Origin_QUERY = explode('/be/'.$_Module.'/', $_SERVER['REQUEST_URI'])[1];
?>
<script type="text/javascript">
    var Path = '<?php echo __CustomStickers_Web; ?>/be/<?php echo $_Module; ?>/';
    $(function(){
        <?php if(kCore_CheckAuthority('CustomerService', 'index')){ ?>
            var updateLastRecordInterval = setInterval(function(){ 
                updateLastRecord();
            }, 3000);
            updateLastRecord();
        <?php } ?>
        $("[data-toggle='tooltip']").tooltip(/*'show'*/);
        $(document).on('click', '[name="cancel"]', function(event) {
            if(confirm('確定要放棄這次編輯嗎?')){
                if('<?php echo $type; ?>'){
                    Path += 'index/type/<?php echo $type; ?>';
                }
                location.href = Path;
            }
        });
        $(document).on('click', '#SubmitDataForm', function(event) {
            var Action = '<?php echo $id; ?>'!=='' ? 'UpdateRow/id/<?php echo $id; ?>' : 'AddRow';
            var SystemType = '<?php echo $SystemType; ?>'!=='' ? '/SystemType/<?php echo $SystemType; ?>' : '';
            var tmp;
            var options = {
            target:        '#state'   
            ,beforeSubmit:  function(){
                swal({
                    onOpen: function () {
                      swal.showLoading()
                    },
                    title: '處理中',
                    text: '如有檔案附件，檔案越大，處理時間將會越久',
                    showConfirmButton: false
                });
            },success: function (data, status){
                if(data.state){
                    Path += '<?php echo $SystemType; ?>';
                    if('<?php echo $type; ?>'){
                        Path += 'index/type/<?php echo $type; ?>';
                    }
                    console.log(data);
                    if(data.preView!=="" && data.preView!==null && data.preView!=='null' && typeof data.preView!=="undefined"){
                        var preView = JSON.parse(data.preView);
                        if(preView){
                            var PreviewImages = preView.PreviewImg;
                            var PrevCtn = 0;
                            var LoadCtn = 0;
                            if(PreviewImages){
                                PreviewImages.forEach(function(Image){
                                    var iframeHTML = '<iframe id="PreviewImage'+PrevCtn+'" style="display:none;" src="<?php echo __CustomStickers_Web; ?>/ft/CreateVideoPreviewImage/'+ Image +'"></iframe>';
                                    $('body').append(iframeHTML);
                                    $('#PreviewImage'+PrevCtn).on("load", function() {
                                        LoadCtn++;
                                        if(PrevCtn === LoadCtn){
                                            location.href = Path;
                                        }
                                    });
                                    PrevCtn++;
                                });
                            }else{
                                location.href = Path;
                            }
                        }else{
                            location.href = Path;
                        }
                    }else{
                        location.href = Path;
                    }
                }else{
                    swal({type: 'error',title: '新增失敗',text:data.msg,showConfirmButton: true});
                }
            }, error: function (data, status, e){
                console.log(data);		        	  
            } ,url:     Path+'process/ps/' + Action + SystemType
            ,type:      'POST'   
            ,dataType:  'json'   
            }; 	
            $('#DataForm').ajaxSubmit(options);
        });
        $(document).on('click', '#Export', function(event) {
            location.href = Path+'process/ps/Export/<?php echo $_Origin_QUERY; ?>';
        });
    });
    function updateLastRecord(){
        fetch(`/be/CustomerService/process/ps/LastRecord`, {
            method: "POST",
        }).then((response) => {
            return response.json(); 
        }).then((jsonData) => {
            if(jsonData){
                if(jsonData.line_LastRecordTime){
                    var line_LastRecordTimeLocal = window.localStorage.getItem('line_LastRecordTime');
                    if(!line_LastRecordTimeLocal || (line_LastRecordTimeLocal&&line_LastRecordTimeLocal<jsonData.line_LastRecordTime)){
                        $('.sidebar-menu>.SideBar_LineChat>a>i.fa-circle').show();
                    }else{
                        $('.sidebar-menu>.SideBar_LineChat>a>i.fa-circle').hide();
                    }
                }
                if(jsonData.facebook_LastRecordTime){
                    var facebook_LastRecordTimeLocal = window.localStorage.getItem('facebook_LastRecordTime');
                    if(!facebook_LastRecordTimeLocal || (facebook_LastRecordTimeLocal&&facebook_LastRecordTimeLocal<jsonData.facebook_LastRecordTime)){
                        $('.sidebar-menu>.SideBar_FacebookChat>a>i.fa-circle').show();
                    }else{
                        $('.sidebar-menu>.SideBar_FacebookChat>a>i.fa-circle').hide();
                    }
                }
            }
        }).catch((err) => {
            console.log('錯誤:', err);
        });
    }
    function ListPageSaveButton(){
        var tmp;
        var options = {
        target:        '#state'   
        ,beforeSubmit:  function(){
            swal({
                onOpen: function () {
                  swal.showLoading()
                },
                title: '處理中',showConfirmButton: false
            });
        },success: function (data, status){
            if(data.state){
                if('<?php echo $type; ?>'){
                    Path += 'index/type/<?php echo $type; ?>';
                }
                location.href = Path;
            }else{
                swal({type: 'error',title: '儲存失敗',text:data.msg,showConfirmButton: true});
            }
        }, error: function (data, status, e){
            console.log(data);		        	  
        } ,url:       Path+'process/ps/SaveMultiRows' 
        ,type:      'POST'   
        ,dataType:  'json'   
        }; 	
        $('#template_form').ajaxSubmit(options);
    }
    function template_btn_deleteall(){
        if(confirm('確定要刪除所選項目嗎?')){
            var tmp;
            var options = {
            target:        '#state'   
            ,beforeSubmit:  function(){
                swal({
                    onOpen: function () {
                      swal.showLoading()
                    },
                    title: '處理中',showConfirmButton: false
                });
            },success: function (data, status){
                if(data.state){
                    if('<?php echo $type; ?>'){
                        Path += 'index/type/<?php echo $type; ?>';
                    }
                    location.href = Path;
                }else{
                    swal({type: 'error',title: '刪除失敗',text:data.msg,showConfirmButton: true});
                }
            }, error: function (data, status, e){
                console.log(data);		        	  
            } ,url:       Path+'process/ps/DeleteMultiRows' 
            ,type:      'POST'   
            ,dataType:  'json'   
            }; 	
            $('#template_form').ajaxSubmit(options);
        }
    }
    function init_inputVideo(a, t, from='line') {
        if (a.files && a.files[0]) {
            var file = a.files[0];
            var ErrorMsg = '';
            var error = 0;
            if (file.size > 10240000) {//10MB
                ErrorMsg += "\n" + '檔案大小：不符，影片上限10MB，選擇影片為' + file.size + 'K';
                error ++;
            }     
            if (file.type !== 'video/mp4') {
                ErrorMsg += "\n" + '檔案類型：不符，影片限制為mp4，選擇影片為' + file.type;
                error ++;
            }
            var ShowBoxClass = '';
            var previewId = '';
            switch(from){
                case 'fb':
                    ShowBoxClass = '#fbShowVideoBox';
                    previewId = '#fbpreviews_video';
                    break;
                case 'line':
                    ShowBoxClass = '#ShowVideoBox';
                    previewId = '#previews_video';
                    break;
            }
            if (error === 0) {
                $(ShowBoxClass + ' ' + previewId + t + ' source').attr('src', URL.createObjectURL(a.files[0]));
                $(ShowBoxClass + ' ' + previewId + t)[0].load();
                $(ShowBoxClass + ' ' + previewId + t).show();
            }else{
                AlertMsg('danger', '錯誤訊息：', ErrorMsg);
                $(ShowBoxClass + ' ' + previewId + t).hide();
                $(ShowBoxClass + ' ' + previewId + t + ' source').removeAttr('src');
                a.value = '';
            }
            switch(from){
                case 'fb':
                    fbUpdateMedia('new');
                    break;
                case 'line':
                    UpdateMedia('new');
                    break;
            }
        }else{
            $(ShowBoxClass + ' ' + previewId + t).hide();
            $(ShowBoxClass + ' ' + previewId + t + ' source').removeAttr('src');
            a.value = '';
        }
            
    }
    function init_inputAudio(a, t, from='line') {
        if (a.files && a.files[0]) {
            var file = a.files[0];
            var ErrorMsg = '';
            var error = 0;
            if (file.size > 10240000) {
                ErrorMsg += "\n" + '檔案大小：不符，聲音檔上限10MB，選擇聲音檔為' + file.size + 'K';
                error ++;
            }
            if (file.type !== 'audio/m4a' && file.type !== 'audio/x-m4a' ) {
                ErrorMsg += "\n" + '檔案類型：不符，聲音檔限制為m4a，選擇聲音檔為' + file.type;
                error ++;
            }
            var ShowBoxClass = '';
            var previewId = '';
            switch(from){
                case 'fb':
                    ShowBoxClass = '#fbShowAudioBox';
                    previewId = '#fbpreviews_audio';
                    break;
                case 'line':
                    ShowBoxClass = '#ShowAudioBox';
                    previewId = '#previews_audio';
                    break;
            }
            if (error === 0) {
                $(ShowBoxClass + ' ' + previewId + t).show();
                $(ShowBoxClass + ' ' + previewId + t + ' source').attr('src', URL.createObjectURL(a.files[0]));
                $(ShowBoxClass + ' ' + previewId + t)[0].load();
            } else {
                AlertMsg('danger', '錯誤訊息：', ErrorMsg);
                $(ShowBoxClass + ' ' + previewId + t).hide();
                $(ShowBoxClass + ' ' + previewId + t + ' source').removeAttr('src');
                a.value = '';
            }
            switch(from){
                case 'fb':
                    fbUpdateMedia('new');
                    break;
                case 'line':
                    UpdateMedia('new');
                    break;
            }
        }else{
            $(ShowBoxClass + ' ' + previewId + t).hide();
            $(ShowBoxClass + ' ' + previewId + t + ' source').removeAttr('src');
            a.value = '';
        }
    }
    function init_inputImage(a, t, from='line') {
        var reader = new FileReader();
        if (a.files && a.files[0]) {
            var file = a.files[0];
            var ErrorMsg = '';
            var error = 0;
            if (file.size > 1024000) {
                ErrorMsg += "\n" + '檔案大小：不符，圖片上限1024K，選擇圖片為' + file.size + 'K';
                error ++;
            }
            if (file.type !== 'image/jpeg') {
                ErrorMsg += "\n" + '檔案類型：不符，圖片限制為jpeg，選擇圖片為' + file.type;
                error ++;
            }
            var ShowBoxClass = '';
            var previewId = '';
            switch(from){
                case 'fb':
                    ShowBoxClass = '#fbShowImageBox';
                    previewId = '#fbpreviews_img';
                    break;
                case 'line':
                    ShowBoxClass = '#ShowImageBox';
                    previewId = '#previews_img';
                    break;
            }
            reader.onload = function (e) {
                var imgSrc = e.target.result;
                var newImg = new Image();
                newImg.onload = function () {
                    if (newImg.height > 1024 || newImg.width > 1024) {
                        ErrorMsg += "\n" + '圖片尺寸：不符，大小限制為1024x1024(選擇圖片為' + newImg.width + 'x' + newImg.height + ')';
                        error ++;
                    }
                    if (error === 0) {
                        $(ShowBoxClass + ' ' + previewId + t).attr('src', imgSrc).show();
                    } else {
                        AlertMsg('danger', '錯誤訊息：', ErrorMsg);
                        $(ShowBoxClass + ' ' + previewId + t).removeAttr('src').hide();
                        a.value = '';
                    }
                    switch(from){
                        case 'fb':
                            fbUpdateMedia('new');
                            break;
                        case 'line':
                            UpdateMedia('new');
                            break;
                    }
                };
                newImg.src = imgSrc; // this must be done AFTER setting onload
            };
            if (error === 0) {
                reader.readAsDataURL(a.files[0]);
            } else {
                AlertMsg('danger', '錯誤訊息：', ErrorMsg);
                $(ShowBoxClass + ' ' + previewId + t).removeAttr('src').hide();
                a.value = '';
            }
            switch(from){
                case 'fb':
                    fbUpdateMedia('new');
                    break;
                case 'line':
                    UpdateMedia('new');
                    break;
            }
        }else{
            $(ShowBoxClass + ' ' + previewId + t).removeAttr('src').hide();
            a.value = '';
        }
    }
    function init_inputImagemapImg(obj, _Module) {
        $('#EditorArea').html('');
        if (typeof AddArea === "function") {
            AddArea(0, 0, 200, 100);
        }
        var Name = obj.name;
        var reader = new FileReader();
        if (obj.files && obj.files[0]) {
            var file = obj.files[0];
            var ErrorMsg = '';
            var error = 0;
            if (file.size > 1024000) {
                ErrorMsg += "\n" + '檔案大小：不符，圖片上限1024K，選擇圖片為' + file.size + 'K';
                error ++;
            }
            if (file.type!=='image/jpeg' && file.type =='image/png') {
                ErrorMsg += "\n" + '檔案類型：不符，圖片限制為jpeg、png，選擇圖片為' + file.type;
                error ++;
            }
            reader.onload = function (e) {
                var imgSrc = e.target.result;
                var newImg = new Image();
                newImg.onload = function () {
                    if (
                        !(_Module==='ImageMap'&&newImg.width===1040&&newImg.height>=520&&newImg.height<=2080) && 
                        !(_Module==='RichMenu'&&newImg.width>=800&&newImg.width<=2500&&newImg.height>=250&&(newImg.width/newImg.height)>=1.45) && 
                        !(newImg.width===1200&&(newImg.height===405||newImg.height===810))
                    ) {
                        var MoreSize = (_Module==='ImageMap') ? '1040x(520~2080)、1200x(405、810)' : '寬(800~2500)、高>=250、寬高比(寬/高)>=1.45，建議尺寸:1200x(405、810)';
                        ErrorMsg += "\n" + '圖片尺寸：不符，大小限制為'+MoreSize+'「選擇圖片為' + newImg.width + 'x' + newImg.height + '」';
                        error ++;
                    }
                    if (error === 0) {
                        var SlideBoxClass = '';
                        switch(newImg.width + 'x' + newImg.height){
                            case '2500x843':
                            case '1200x405':
                                SlideBoxClass = 'half';
                                break;
                            case '2500x1686':
                            case '1200x810':
                                SlideBoxClass = 'full';
                                break;
                            default:
                                SlideBoxClass = 'custom' + '.'+_Module;
                                break;
                        }
                        $('#SampleArea .SliderBox').hide();
                        if(SlideBoxClass){
                            $('#SampleArea .'+SlideBoxClass).show();
                        }
                        $('#SampleAreaLabel').show();
                        $('#ContainerBox').show();
                        $('#EditorArea').css('background-image', 'url("'+imgSrc+'")').css('width', newImg.width).css('height', newImg.height).show();
                        $('#previews_'+Name).attr('src', imgSrc).show();
                    } else {
                        AlertMsg('danger', '錯誤訊息：', ErrorMsg);
                        $('#SampleAreaLabel').hide();
                        $('#ContainerBox').hide();
                        $('#EditorArea').css('background-image', '').hide();
                        $('#previews_'+Name).removeAttr('src').hide();
                        obj.value = '';
                    }
                };
                newImg.src = imgSrc;
            };
            if (error === 0) {
                reader.readAsDataURL(obj.files[0]);
            } else {
                AlertMsg('danger', '錯誤訊息：', ErrorMsg);
                $('#ContainerBox').hide();
                $('#EditorArea').css('background-image', '').hide();
                $('#previews_'+Name).removeAttr('src').hide();
                obj.value = '';
            }
        }else{
            $('#SampleAreaLabel').hide();
            $('#ContainerBox').hide();
            $('#EditorArea').css('background-image', '').hide();
            $('#previews_'+Name).removeAttr('src').hide();
        }
    }
    
    function UpdateDefaultRichMenu(action, RichMenuID, RichMenuName, obj){
        var crontab_start = obj.attr('crontab_start');
        var crontab_end = obj.attr('crontab_end');
        var today = new Date();
        today.setMinutes(today.getMinutes()+5);
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();
        var hour = today.getHours();
        var min = today.getMinutes();
        var sec = '00';
         if(dd<10){
            dd='0'+dd;
        } 
        if(mm<10){
            mm='0'+mm;
        }
        if(hour<10){
            hour='0'+hour;
        }
        if(min<10){
            min='0'+min;
        }
        today = yyyy+'-'+mm+'-'+dd;
        var time = hour+':'+min+':'+sec;
        var default_date1 = today;
        var default_date2 = today;
        var default_time1 = time;
        var default_time2 = '23:59';
        if(crontab_start){
            crontab_start = crontab_start.split(' ');
            default_date1 = crontab_start[0];
            default_time1 = crontab_start[1];
            if(default_date1+' '+default_time1 < today+' '+time){
                crontab_start = '';
                default_date1 = today;
                default_time1 = time;
            }
        }
        if(crontab_end){
            crontab_end = crontab_end.split(' ');
            default_date2 = crontab_end[0];
            default_time2 = crontab_end[1];
            if(default_date2+' '+default_time2 < today+' '+time){
                crontab_end = '';
                default_date2 = today;
                default_time2 = '23:59';
            }
        }
        var datechecked = (crontab_start||crontab_end) ? 'checked' : '';
        var nowchecked = (crontab_start||crontab_end) ? '' : 'checked';
        if(action==='Cancel'){
           swal({type: 'warning',
               title: '確定將「'+RichMenuName+'」取消預設選單嗎?',
               cancelButtonText: '取消',
               showCancelButton: true,
               text: '所有成員的主選單將會被變更',
               confirmButtonText: '確定'
           }).then(function () {
                swal({onOpen: function () {
                    swal.showLoading()
                }, title: '處理中', showConfirmButton: false});
                setTimeout(function () {
                    xajax_UpdateDefaultRichMenu('Cancel', '');
                }, 1000);
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    console.log('取消');
                }
            });
        }else{
            swal({
                type: 'warning',
                title: '確定將「'+RichMenuName+'」設為預設選單嗎?',
                html:'<div style="padding-left: 25px;" onclick='+"'"+'$("#optionsRadios1").prop("checked", true);'+"'"+'>'+ 
                        '<input class="optionsRadios" type="radio" name="swalfields[viewC]" style="float: left;margin-top: 10px;" id="optionsRadios1" value="date" '+datechecked+'>'+
                        '<div style="float: left;margin-top: 5px;">設定排程</div>'+
                        '<input class="form-control" type="date" name="swalfields[date1]" min="' + today + '" value="' + default_date1 + '">'+
                        '<input style="margin-top: 5px;" class="form-control" name="swalfields[time1]" type="time" value="' + default_time1 + '">'+
                        '<input style="margin-top: 10px;" class="form-control" type="date" name="swalfields[date2]" min="' + today + '" value="' + default_date2 + '">'+
                        '<input style="margin-top: 5px;" class="form-control" name="swalfields[time2]" type="time" value="' + default_time2 + '">'+
                    '</div>'+
                    '<div style="padding-left: 25px;text-align: left;padding-top: 10px;" onclick='+"'"+'$("#optionsRadios2").prop("checked", true);'+"'"+'>'+
                        '<input style="margin-top: 6px!important;" class="optionsRadios" type="radio" name="swalfields[viewC]" id="optionsRadios2" value="now" '+nowchecked+'>'+
                        '無期限'+
                    '</div>'+
                    '<div style="margin-top: 2px;margin-bottom: -17px;">所有成員的主選單將會被變更</div>',
                cancelButtonText: '取消',
                showCancelButton: true,
                confirmButtonText: '確定',
            }).then(function (dismiss) {
                var viewC = $("input[name='swalfields[viewC]']:checked").val();
                var date1 = $("input[name='swalfields[date1]']").val();
                var time1 = $("input[name='swalfields[time1]']").val();
                var date2 = $("input[name='swalfields[date2]']").val();
                var time2 = $("input[name='swalfields[time2]']").val();
                var Data = {
                    'date1' : date1,
                    'time1' : time1,
                    'date2' : date2,
                    'time2' : time2,
                };
                obj.attr('crontab_start', date1+' '+time1).attr('crontab_end', date2+' '+time2);
                if(viewC==='now'){
                    xajax_UpdateDefaultRichMenu(action, RichMenuID);
                }else{
                    xajax_UpdateCrontabDefaultRichMenu(RichMenuID, JSON.stringify(Data));
                }
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    console.log('取消');
                }
            });
        }
    }
</script>