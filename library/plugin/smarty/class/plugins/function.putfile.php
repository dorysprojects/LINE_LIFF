<?php

function smarty_function_putfile($params)
{
	$params['data']=str_replace("<#","{#",$params['data']);
	$params['data']=str_replace("#>","#}",$params['data']);
	$params['filename']=str_replace("\n\r","",$params['filename']);
	file_put_contents($params['filename'],$params['data']);

}
?>
