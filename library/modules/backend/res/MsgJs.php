<?php
    $_From = kCore_get('FrontEndAndBackEnd', $_SERVER['PATH_TRANSLATED']);
    $_Module = !empty($_From) ? kCore_get($_From, $_SERVER['PATH_TRANSLATED']) : '';
    $_Action = ($_From=='backend') ? kCore_get($_Module) : '';
    $SystemType = kCore_get('SystemMessage');
    $CustomerService = kCore_get('CustomerService');
    $id = kCore_get('id');
?>
<script type="text/javascript">
    var Path = '<?php echo __CustomStickers_Web; ?>/be/<?php echo $_Module; ?>/';
    function SendLineMsg() {
        if(confirm('確定要送出嗎?')){
            var valueCtn = 0;
            $('.MsgDataValue').each(function(e) {
                if($(this).parent().find('.MsgDataType').val() === 'QuicklyReply'){
                    $(this).parent().find('.MsgDataValue').attr('name', 'fields[subject][QuicklyReply]');
                    $(this).parent().find('.MsgDataType').attr('name', 'fields[subject][type_QuicklyReply]');
                }else{
                    $(this).parent().find('.MsgDataValue').attr('name', 'fields[subject][value_'+ valueCtn +']');
                    $(this).parent().find('.MsgDataType').attr('name', 'fields[subject][type_'+ valueCtn +']');
                    $(this).parent().find('.MsgDataFile').attr('name', 'value_' + valueCtn);
                    valueCtn ++;
                }
            });
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
                console.log(data);
                if(data.state){
                    if(data.preView!==null && data.preView!=='null' && typeof data.preView!=="undefined"){
                        console.log(data.preView);
                        var preView = JSON.parse(data.preView);
                        var PreviewImages = preView.PreviewImg;
                        var PrevCtn = 0;
                        var LoadCtn = 0;
                        PreviewImages.forEach(function(Image){
                            var iframeHTML = '<iframe id="PreviewImage'+PrevCtn+'" style="display:none;" src="<?php echo __CustomStickers_Web; ?>/ft/CreateVideoPreviewImage/'+ Image +'"></iframe>';
                            $('body').append(iframeHTML);
                            $('#PreviewImage'+PrevCtn).on("load", function() {
                                LoadCtn++;
                                if(PrevCtn === LoadCtn){
                                    xajax_SendLineMsg(data.UID, data.data);
                                    $('#TypeMsg').val('').change();
                                    $('.Item>.fa-close').click();
                                }
                            });
                            PrevCtn++;
                        });
                    }else{
                        xajax_SendLineMsg(data.UID, data.data);
                        $('#TypeMsg').val('').change();
                        $('.Item>.fa-close').click();
                    }
                }else{
                    swal({type: 'error',title: '發送失敗',text:data.msg,showConfirmButton: true});
                }
            }, error: function (data, status, e){
                console.log(data);		        	  
            } ,url:     '<?php echo __CustomStickers_Web; ?>/be/System/process/ps/SendLineMsgProcess'
            ,type:      'POST'   
            ,dataType:  'json'   
            }; 	
            $('#SendLineMsgForm').ajaxSubmit(options);
        }
    }
    function SendFacebookMsg() {
        if(confirm('確定要送出嗎?')){
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
                console.log(data);
                if(data.state){
                    swal({type: 'success',title: '發送成功',text:data.msg,showConfirmButton: true});
                    if(data.preView!==null && data.preView!=='null' && typeof data.preView!=="undefined"){
                        location.reload();
                    }else{
                        location.reload();
                    }
                }else{
                    swal({type: 'error',title: '發送失敗',text:data.msg,showConfirmButton: true});
                }
            }, error: function (data, status, e){
                console.log(data);		        	  
            } ,url:     '<?php echo __CustomStickers_Web; ?>/be/System/process/ps/SendFacebookMsg'
            ,type:      'POST'   
            ,dataType:  'json'   
            }; 	
            $('#SendFacebookMsgForm').ajaxSubmit(options);
        }
    }
    $(function () {
        var NowTime = new Date();
        var LastRecordTimeLocal =   NowTime.getFullYear()+
                                    '-'+('0'+(NowTime.getMonth()*1+1)).substr(-2)+
                                    '-'+('0'+NowTime.getDate()).substr(-2)+
                                    ' '+('0'+NowTime.getHours()).substr(-2)+
                                    ':'+('0'+NowTime.getMinutes()).substr(-2)+
                                    ':'+('0'+NowTime.getSeconds()).substr(-2);
        window.localStorage.setItem('<?= kCore_get('ChatRoom'); ?>_LastRecordTime', LastRecordTimeLocal);
        xajax_updateMsg(
            $('#ChatMember').val()
        );
        var updateMsg = setInterval(function(){ 
            xajax_updateMsg(
                $('#ChatMember').val()
            );
        }, 3000);

        var CheckRoomList = setInterval(function(){
            if($('#RoomList>li')[0]){
                clearInterval(CheckRoomList);
                $('#RoomList>li[UID="<?= kCore_get('UID'); ?>"]').click();
                if('<?= kCore_get('ClickId'); ?>' !== ''){
                    $('#<?= kCore_get('ClickId'); ?>').click();
                }
            }
        }, 100);
    });
</script>