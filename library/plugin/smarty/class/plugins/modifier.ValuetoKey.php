<?
function smarty_modifier_ValuetoKey($value)
{

	if(!empty($value)){
		foreach($value as $v){
			$var["$v"]=True;
		}
	}
return $var;
}
?>