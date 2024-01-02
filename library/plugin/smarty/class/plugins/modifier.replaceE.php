<?
function smarty_modifier_replaceE($content,$len,$addstring)
{
$size=mb_strlen($content,"UTF-8");
if($len<$size)return mb_substr($content,0,$len,"UTF-8").$addstring;
else return mb_substr($content,0,$len,"UTF-8");
} 
?>