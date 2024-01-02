<?
function smarty_modifier_replaceB($string)
{
	if($string=='on' or $string==1) return "checked='checked'";
	else return '';
} 
?>