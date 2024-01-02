<?php

function smarty_modifier_geturl($string)
{
	
	preg_match('/value="(.*?)"/',$string,$match);
	if(empty($match[1]))
	 preg_match('/src="(.*?)"/',$string,$match);
    return $match[1];
}

?>
