<?php /* Smarty version Smarty3-b7, created on 2021-09-23 15:24:34
         compiled from "/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/CreateVideoPreviewImage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:637672408614c2bb2f05664-72221649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d92ce0e8ec40d0fbd3c02ba3061700a78f95f63' => 
    array (
      0 => '/home1/rickytest.gadclubs.com/CustomStickers/library/modules/frontend/view/CreateVideoPreviewImage.tpl',
      1 => 1612778075,
    ),
  ),
  'nocache_hash' => '637672408614c2bb2f05664-72221649',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <video style="display: none;" crossorigin="anonymous" controls="">
            <source src="<?php echo $_smarty_tpl->getVariable('__WEB_UPLOAD')->value;?>
/video/<?php echo $_smarty_tpl->getVariable('VideoFile')->value;?>
.mp4" id="originalContentUrl_previewImg1">
        </video>
        <img id="ShowPre" src="">
        <script>
            var video = document.getElementById('originalContentUrl_previewImg1').parentNode;
            var captureImage = function() {
                var scale = 1;
                var canvas = document.createElement("canvas");
                canvas.width = video.videoWidth * scale;
                canvas.height = video.videoHeight * scale;
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

                var dataURL = canvas.toDataURL('image/png');
                document.getElementById("ShowPre").src = dataURL;
                //var blob = dataURItoBlob(dataURL);

                var blobBin = atob(dataURL.split(',')[1]);
                var blob_array = [];
                for (let i = 0; i < blobBin.length; i++) {
                    blob_array.push(blobBin.charCodeAt(i));
                }
                var fileData = new Blob([new Uint8Array(blob_array)], { type: 'image/png' });
                // 將file 加至 formData
                var formData = new FormData();
                var fileName = 'test';

                formData.append('PrevImage', fileData, fileName);
                
                fetch('<?php echo $_smarty_tpl->getVariable('__LIBRARY')->value;?>
/core/func/kPrewPic.php?fileName=<?php echo $_smarty_tpl->getVariable('VideoFile')->value;?>
', {
                    method: 'POST',
                    body: formData
                }).then((response) => {
                    
                }).then((resText) => {
                    
                })
            };
            video.addEventListener('loadeddata', captureImage);
        </script>
    </body>
</html>