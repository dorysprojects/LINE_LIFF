<?php 

function smarty_modifier_getPicHeight($path){

	if(!file_exists(ROOT_UPLOAD.'/'.$path))return false;
	
do{
$return=getimagesize(__ROOT_UPLOAD.'/'.$path);
$s++;
}while((empty($return[1]) or ($return[1]<=0)) and ($s<100));
return $return[1];
	
}


?>