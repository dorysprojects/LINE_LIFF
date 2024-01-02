<?php

function smarty_modifier_strpos($string, $search,$return)
{
	if(strpos($string,$search)!==FALSE) return $return;
}

?>
