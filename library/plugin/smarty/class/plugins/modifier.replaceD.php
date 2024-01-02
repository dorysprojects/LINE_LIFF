<?
function smarty_modifier_replaceD($string,$A,$A_replace,$B,$B_replace)
{
	if($string==$A) return $A_replace;
	else if($string==$B) return $B_replace;
	else return;
} 
?>