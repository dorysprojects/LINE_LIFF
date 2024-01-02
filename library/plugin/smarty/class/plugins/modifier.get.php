<?php

function smarty_modifier_get($row, $name)
{
	$names=explode('.',$name);
    $name=$names[0];
    $name2=$names[1];
    $name3=$names[2];
	$size=count($names);
    
	if($size==1) return $row["$name"];
	if($size==2) return $row["$name"]["$name2"];
	if($size==3) return $row["$name"]["$name2"]["$name3"];	
   
}

?>
