<?php /* Smarty version Smarty3-b7, created on 2021-11-02 16:31:58
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/invoice.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18784024736180f77eb3eed3-33064229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9df1d1268585e6618b9c6a7fb4e566b69793111' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/_public/view/type/invoice.tpl',
      1 => 1635841905,
    ),
  ),
  'nocache_hash' => '18784024736180f77eb3eed3-33064229',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('UrlMsgOption')->value=='qrcode'){?>
    <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>
    <style type="text/css">
        html {
            height: 100%;
        }

        body {
            font-family: sans-serif;
            padding: 0 10px;
            height: 100%;
            background: black;
            margin: 0;
        }

        h1 {
            /*color: white;*/
            margin: 0;
            padding: 15px;
        }

        #container {
            text-align: center;
            margin: 0;
        }

        #qr-canvas {
            margin: auto;
            width: calc(100% - 20px);
            max-width: 400px;
        }

        #btn-scan-qr {
            cursor: pointer;
        }

        #outputData {
            word-wrap: break-word;
        }

        #btn-scan-qr img {
            height: 10em;
            padding: 15px;
            margin: 15px;
            background: white;
        }

        #qr-result {
            font-size: 1.2em;
            margin: 20px auto;
            padding: 20px;
            max-width: 700px;
            background-color: white;
        }
    </style>
    <div id="container">
        <h1>QR Code 掃描器</h1>

        <a id="btn-scan-qr">
            <img src="https://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg">
        <a/>

        <canvas hidden="" id="qr-canvas"></canvas>

        <div id="qr-result" hidden="">
            <div id="outputData"></div>
        </div>
    </div>
    <script type="text/javascript">
        var qrcode = window.qrcode;
        
        const video = document.createElement("video");
        const canvasElement = document.getElementById("qr-canvas");
        const canvas = canvasElement.getContext("2d");

        const qrResult = document.getElementById("qr-result");
        const outputData = document.getElementById("outputData");
        const btnScanQR = document.getElementById("btn-scan-qr");
        
        var DefaultPic = $('#btn-scan-qr>img').attr('src');

        let scanning = false;
        $(function () {
            //var vConsole = new VConsole();
            if (0 && liff.scanCode) { //OS 在 9.19.0 之後已經暫停此功能， Android 目前維持不變
                liff.scanCode()
                    .then(function(res) {
                        console.log(res);
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            }else if (0 && liff.scanCode) { //
                liff.scanCode()
                    .then(function(res) {
                        console.log(res);
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            }else{
                console.log('IOS 在 9.19.0 之後已經暫停此功能， Android 目前維持不變');
                var getUserMedia = true;
                btnScanQR.onclick = () => {
                    $('#btn-scan-qr>img').css('height', '10em').css('width', 'auto').attr('src', DefaultPic);
                    video.setAttribute('autoplay', '');
                    video.setAttribute('muted', '');
                    video.setAttribute('playsinline', '');
                    
                    if (navigator.mediaDevices === undefined) {
                        navigator.mediaDevices = {};
                    }
                    if (navigator.mediaDevices.getUserMedia === undefined) {
                        navigator.mediaDevices.getUserMedia = function(constraints) {
                            // First get ahold of the legacy getUserMedia, if present
                            getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

                            // Some browsers just don't implement it - return a rejected promise with an error
                            // to keep a consistent interface
                            if (!getUserMedia) {
                                if(0){
                                    location.href = 'https://line.me/R/nv/QRCodeReader';
                                }
                            }

                            // Otherwise, wrap the call to the old navigator.getUserMedia with a Promise
                            return new Promise(function(resolve, reject) {
                                getUserMedia.call(navigator, constraints, resolve, reject);
                            });
                        };
                    }
                    
                    navigator.mediaDevices
                        .getUserMedia({ audio: false,video: { facingMode:"environment" } })//user、environment
                        .then(function(stream) {
                            scanning = true;
                            qrResult.hidden = true;
                            btnScanQR.hidden = true;
                            canvasElement.hidden = false;
                            video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
                            video.srcObject = stream;
                            video.play();
                            tick();
                            scan();
                        }).catch(function (error) {
                            if (!getUserMedia) {
                                alert('此瀏覽器不支援鏡頭功能');
                                <?php if ($_smarty_tpl->getVariable('openExternalBrowser')->value){?>
                                    location.href = "<?php echo $_smarty_tpl->getVariable('openExternalBrowser')->value;?>
";
                                <?php }?>
                            }else{
                                alert('無可用的鏡頭');
                            }
                        });
                };
            }
            
            var DecodeImg = 'https://rickytest.gadclubs.com/CustomStickers/upload/contentId/QrCodeTmp.jpg';//https://rickytest.gadclubs.com/CustomStickers/upload/contentId/13663251551655.jpg、QrCodeTmp
            
            /*toDataURL(
                DecodeImg
                function(dataUrl) {
                    qrcode.decode(dataUrl);
                }
            );*/
            
            qrcode.callback = function(res) {
                if(res instanceof Error) {
                    //alert("QrCode Notfound!");
                } else {
                    if (res) {
                        scanning = false;
                        
                        video.srcObject.getTracks().forEach(track => {
                            track.stop();
                        });
                        
                        qrResult.hidden = false;
                        canvasElement.hidden = true;
                        btnScanQR.hidden = false;
                        
                        if(res!='**' && res.substr(0, 2)!='**' && res.length>=77){
                            $('#btn-scan-qr>img').css('height', 'auto').css('width', '100%').attr('src', canvasElement.toDataURL());
                            res = res.substr(0, 77);
                            outputData.innerText = res;
                            alert(res);
                        }else{
                            console.log(res);
                            btnScanQR.click();
                        }
                    }
                }
            };
        });

        function tick() {
            canvasElement.height = video.videoHeight;
            canvasElement.width = video.videoWidth;
            canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);

            scanning && requestAnimationFrame(tick);
        }
        
        if(1){
            function toDataURL(src, callback, outputFormat) {
                var img = new Image();
                img.crossOrigin = 'Anonymous';
                img.onload = function() {
                    var canvas = document.createElement('CANVAS');
                    var ctx = canvas.getContext('2d');
                    var dataURL;
                    canvas.height = this.naturalHeight;
                    canvas.width = this.naturalWidth;
                    ctx.drawImage(this, 0, 0);
                    dataURL = canvas.toDataURL(outputFormat);
                    callback(dataURL);
                };
                img.src = src;
                if (img.complete || img.complete === undefined) {
                    img.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
                    img.src = src;
                }
            }
        }

        function scan() {
            if(scanning){
                try {
                    qrcode.decode();
                } catch (e) {
                    setTimeout(scan, 100);
                }
            }
        }
    </script>
<?php }else{ ?>
    <input name="FormType" type="hidden" value="invoice">
    <input name="fields[answer]" type="hidden" value="">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 form-group">
                <div class="col-md-3">
                    <label>發票號碼</label>
                </div>
                <div class="col-md-9">
                    <input type="text" id="invTxt" name="fields[invTxt]" class="form-control" style="display: inline-block;width: 20%;" maxlength="2" placeholder="" value="" onkeyup="if($(this).val().length===2){ $('#invNum').focus(); }"><!-- onchange -->
                    <span style="margin-right:2px;">-</span>
                    <input type="text" id="invNum" name="fields[invNum]" class="form-control" style="display: inline-block;width: 70%;" maxlength="8" placeholder="請輸入發票號碼" value="" onkeyup="if($(this).val().length===0&&(event.keyCode===8||event.keyCode===46)){ $('#invTxt').focus(); }"><!-- onchange -->
                </div>
                </br>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-3">
                    <label>開立時間</label>
                </div>
                <div class="col-md-9">
                    <input type="date" name="fields[invDate]" class="form-control" placeholder="請輸入開立時間" value="">
                </div>
                </br>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-3">
                    <label>隨機碼</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="fields[randomNumber]" class="form-control" maxlength="4" placeholder="請輸入隨機碼" value="">
                </div>
                </br>
            </div>
        </div>
    </div>

    <div class="col-md-12" style="text-align: center;">
        <button type="button" id="sendCardBtn" class="btn btn-primary" style="display: none;">送出資料</button>
        <button type="button" id="sendBtn" class="btn btn-primary" style="">進行登錄</button>
    </div>

    <script type="text/javascript">
        $(function () {
            $(document).on('click', '#sendBtn, #sendCardBtn', function(event) {
                var options = {
                    target: '#state'
                    , beforeSubmit: function () {
                        $.blockUI({message: '處理中...'});
                        $('.redBorder').removeClass('redBorder');
                    }, success: function (data, status) {
                        if (data.state) {
                            if(event.target.id==='sendCardBtn'){
                                $('#FormArea').hide();
                                $('#DetailsArea').html('');
                                $('#sendCardBtn').hide();
                                $('#sendBtn').show();
                                $('#ReturnBtn').show();
                                $('#FormTitle').html('發票明細');
                                $('#FormTitleIcon').removeClass('fa-info-circle').addClass('fa-list-alt');
                                var Html = '';
                                console.log(data);
                                if(data.Data.details){
                                    data.Data.details.forEach(function(item){
                                        Html += '<label class="">';
                                            Html += '<div class="col-md-12">';
                                                Html += '<div class="col-md-1">';
                                                    Html += "<input type='radio' name='fields[choose]' value='"+ JSON.stringify(item) +"'>";
                                                Html += '</div>';
                                                Html += '<div class="col-md-11">';
                                                    Html += '<div class="col-md-3">';
                                                        Html += '發票日期';
                                                    Html += '</div>';
                                                    Html += '<div class="col-md-9">';
                                                        Html += (item['invDate']['year']*1+1911) + '-' + ('0'+item['invDate']['month']).substr(-2) + '-' + ('0'+item['invDate']['date']).substr(-2);
                                                    Html += '</div>';
                                                    Html += '<div class="col-md-3">';
                                                        Html += '發票號碼';
                                                    Html += '</div>';
                                                    Html += '<div class="col-md-9">';
                                                        Html += item['invNum'].substr(0, 2) + '-' + item['invNum'].substr(2);
                                                    Html += '</div>';
                                                    if(item['buyerBan']){
                                                        Html += '<div class="col-md-3">';
                                                            Html += '統編';
                                                        Html += '</div>';
                                                        Html += '<div class="col-md-9">';
                                                            Html += item['buyerBan'];
                                                        Html += '</div>';
                                                    }
                                                    Html += '<div class="col-md-3">';
                                                        Html += '店家';
                                                    Html += '</div>';
                                                    Html += '<div class="col-md-9">';
                                                        Html += item['sellerName'];
                                                    Html += '</div>';
                                                    if(item['sellerAddress']){
                                                        Html += '<div class="col-md-3">';
                                                            Html += '地址';
                                                        Html += '</div>';
                                                        Html += '<div class="col-md-9">';
                                                            Html += item['sellerAddress'];
                                                        Html += '</div>';
                                                    }
                                                    Html += '<div class="col-md-3">';
                                                        Html += '金額';
                                                    Html += '</div>';
                                                    Html += '<div class="col-md-9">';
                                                        Html += item['amount'];
                                                    Html += '</div>';
                                                Html += '</div>';
                                                Html += '<div class="col-md-12"><hr style="margin: 10px 0px;"></div>';
                                            Html += '</div>';
                                        Html += '</label>';
                                    });
                                }
                                $('#DetailsArea').show().html(Html);
                            }else{
                                console.log(data);
                                if(data.Data){
                                    switch($("input[name='FormType']").val()){
                                        case 'card':
                                            SendOrShareMsg(data.Data, 1, 1);
                                            break;
                                        case 'invoice':
                                            SendOrShareMsg(data.Data, 1, 1);
                                            break;
                                    }
                                }
                            }
                        }else{
                            alert(data.msg);
                        }
                        $.unblockUI();
                    }, error: function (data, status, e) {
                        //alert(data);
                    }
                    , url: '<?php echo $_smarty_tpl->getVariable('__CustomStickers_Web')->value;?>
/?process/ps/exeEinvoice/targetId/' + event.target.id
                    , type: 'post'
                    , dataType: 'json'
                };
                $('#dataForm').ajaxSubmit(options);
            });
        });
    </script>
<?php }?>