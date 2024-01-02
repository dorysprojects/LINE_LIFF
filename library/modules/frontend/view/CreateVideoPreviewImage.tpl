<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <video style="display: none;" crossorigin="anonymous" controls="">
            <source src="{#$__WEB_UPLOAD#}/video/{#$VideoFile#}.mp4" id="originalContentUrl_previewImg1">
        </video>
        <img id="ShowPre" src="">
        <script>
            var video = document.getElementById('originalContentUrl_previewImg1').parentNode;
            var captureImage = function() {
                window.setTimeout(function() {
                    var scale = 1;
                    var canvas = document.createElement("canvas");
                    canvas.width = video.videoWidth * scale;
                    canvas.height = video.videoHeight * scale;
                    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                    
                    var dataURL = canvas.toDataURL('image/jpeg', 0.8);
                    document.getElementById("ShowPre").src = dataURL;
                    //var blob = dataURItoBlob(dataURL);
                    
                    var blobBin = atob(dataURL.split(',')[1]);
                    var blob_array = [];
                    for (let i = 0; i < blobBin.length; i++) {
                        blob_array.push(blobBin.charCodeAt(i));
                    }
                    var fileData = new Blob([new Uint8Array(blob_array)], { type: 'image/jpeg' });
                    // 將file 加至 formData
                    var formData = new FormData();
                    var fileName = 'test';
                    
                    formData.append('PrevImage', fileData, fileName);
                    fetch('{#$__LIBRARY#}/core/func/kPrewPic.php?fileName={#$VideoFile#}', {
                        method: 'POST',
                        body: formData
                    }).then((response) => {
                        
                    }).then((resText) => {
                        
                    });
                }, 1000);
            };
            video.addEventListener('loadeddata', captureImage);
        </script>
    </body>
</html>