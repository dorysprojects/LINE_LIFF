<?
function smarty_modifier_replaceG($content,$len)
{
$size=mb_strlen($content,"UTF-8");

for($i=0;$i<=$size;)
{
	$str.="<p style='height:15px'>".mb_substr($content,$i,$len,"UTF-8")."</p>";
	$i+=$len;
}

return $str;
}
?>