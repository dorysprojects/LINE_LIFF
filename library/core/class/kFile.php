<?php 
class kFile{    
    function upload($dir=NULL, $OldData=NULL, $NewData=NULL){
        if($_FILES){
            $ReturnSubject = array();
            foreach ($_FILES as $fileKey => $fileVal){
                $NAME = $fileVal['name'];
                $TYPE = $fileVal['type'];
                $ERROR = $fileVal['error'];
                $TMP_NAME = $fileVal['tmp_name'];
                $SIZE = $fileVal['size'];
                if($ERROR == UPLOAD_ERR_OK){
                    $filename = $NAME;
                    $pos = strrpos($filename,'.');
                    $filename_title = substr($filename, 0, $pos);
                    $filename_type = substr($filename, $pos+1);
                    $filename_title_rand = kCore_rand();
                    
                    if(!is_dir(__ROOT_UPLOAD . "/image/")){
                        mkdir(__ROOT_UPLOAD . "/image/",0777);
                    }
                    //如果[ /upload ]底下[ video ]資料夾不存在，則建立
                    if (!is_dir(__ROOT_UPLOAD . "/video/")) {
                        mkdir(__ROOT_UPLOAD . "/video/", 0777);
                    }
                    //如果[ /upload ]底下[ audio ]資料夾不存在，則建立
                    if (!is_dir(__ROOT_UPLOAD . "/audio/")) {
                        mkdir(__ROOT_UPLOAD . "/audio/", 0777);
                    }
                    if(!empty($OldData['subject'][$fileKey])){
                        $ChangeOrder = FALSE;
                        if($NewData['subject']){
                            foreach ($NewData['subject'] as $NewDataKey => $NewDataValue) {
                                if($NewDataValue===$OldData['subject'][$fileKey]){
                                    $ChangeOrder = TRUE;
                                }
                            }
                        }
                        if(!$ChangeOrder){
                            $_FileName_ = explode('.', $OldData['subject'][$fileKey]);
                            if(file_exists(__ROOT_UPLOAD."/video/".$_FileName_[0].'.mp4')){
                                @unlink(__ROOT_UPLOAD."/video/".$_FileName_[0].'.mp4');
                            }
                            if(file_exists(__ROOT_UPLOAD."/image/".$_FileName_[0].'.jpg')){
                                @unlink(__ROOT_UPLOAD."/image/".$_FileName_[0].'.jpg');
                            }
                            if(file_exists(__ROOT_UPLOAD."/audio/".$OldData['subject'][$fileKey])){
                                @unlink(__ROOT_UPLOAD."/audio/".$OldData['subject'][$fileKey]);
                            }
                            if(file_exists(__ROOT_UPLOAD."/image/".$OldData['subject'][$fileKey])){
                                @unlink(__ROOT_UPLOAD."/image/".$OldData['subject'][$fileKey]);
                            }
                        }
                    }
                    
                    if($dir){
                        //如果[ /upload ]底下[ $dir ]資料夾不存在，則建立
                        if (!is_dir(__ROOT_UPLOAD . "/" . $dir . "/")) {
                            mkdir(__ROOT_UPLOAD . "/" . $dir . "/", 0777);
                        }
                        if($OldData['subject'][$fileKey] && file_exists(__ROOT_UPLOAD."/" . $dir . "/".$OldData['subject'][$fileKey])){
                            @unlink(__ROOT_UPLOAD."/" . $dir . "/".$OldData['subject'][$fileKey]);
                        }
                        move_uploaded_file($TMP_NAME, __ROOT_UPLOAD . '/' . $dir . '/' . $filename_title_rand . '.' . $filename_type);
                    }else{
                        switch (substr( $TYPE , 0 , 5 )) {
                            case'video':
                                move_uploaded_file($TMP_NAME, __ROOT_UPLOAD . '/video/' . $filename_title_rand . '.' . $filename_type);
                                break;
                            case'audio':
                                move_uploaded_file($TMP_NAME, __ROOT_UPLOAD . '/audio/' . $filename_title_rand . '.' . $filename_type);
                                break;
                            default :
                                move_uploaded_file($TMP_NAME, __ROOT_UPLOAD . '/image/' . $filename_title_rand . '.' . $filename_type);
                                break;
                        }
                    }
                    
                    if($filename_type === 'mp4'){
                        if(!empty($OldData['content']['PreviewImg']) && empty($ReturnSubject['content']['PreviewImg'])){
                            $ReturnSubject['content']['PreviewImg'] = $OldData['content']['PreviewImg'];
                        }
                        $ReturnSubject['content']['PreviewImg'][$fileKey] = $filename_title_rand;
                    }
                    $ReturnSubject['subject'][] = array(
                        $fileKey => $filename_title_rand.'.'.$filename_type,
                        $fileKey.'name' => $filename_title,
                        $fileKey.'size' => round($SIZE/1024, 1),
                    );
                }
            }                
        }
        return $ReturnSubject;
    }
    
    function delete($OldData = NULL){
        if($OldData['subject']){
            foreach ($OldData['subject'] as $key => $value) {
                switch ($key) {
                    case 'img0':
                    case 'img1':
                    case 'img2':
                    case 'img3':
                    case 'img4':
                    case 'img5':
                    case 'img6':
                    case 'img7':
                    case 'img8':
                    case 'img9':
                    case 'value_0':
                    case 'value_1':
                    case 'value_2':
                    case 'value_3':
                    case 'value_4':
                        if(strpos($value, '.') !== false){
                            $_FileName_ = explode('.', $value);
                            if(file_exists(__ROOT_UPLOAD."/video/".$_FileName_[0].'.mp4')){
                                @unlink(__ROOT_UPLOAD."/video/".$_FileName_[0].'.mp4');
                            }
                            if(file_exists(__ROOT_UPLOAD."/image/".$_FileName_[0].'.jpg')){
                                @unlink(__ROOT_UPLOAD."/image/".$_FileName_[0].'.jpg');
                            }
                            if(file_exists(__ROOT_UPLOAD."/audio/".$value)){
                                @unlink(__ROOT_UPLOAD."/audio/".$value);
                            }
                            if(file_exists(__ROOT_UPLOAD."/image/".$value)){
                                @unlink(__ROOT_UPLOAD."/image/".$value);
                            }
                        }
                        break;
                }
            }
        }
    }
    
}