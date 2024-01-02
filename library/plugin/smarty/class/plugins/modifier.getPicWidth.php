<?php 

function smarty_modifier_getPicWidth($path){
	if(!file_exists(ROOT_UPLOAD.'/'.$path))return false;
	
do{
$return=getimagesize(__ROOT_UPLOAD.'/'.$path);
$s++;
}while((empty($return[0]) or ($return[0]<=0)) and ($s<100));
return $return[0];
	
}


?>