<?
function smarty_modifier_xor($name,$data,$keys,&$tmps)
{

	if($tmps["$name"]==1) 
	   return ;
	else if((($keys["$name"])?1:0)+$tmps["$name"]==0){
	 $tmps["$name"]=1;
	 return 1;
	}
	else if(($name==$data) and !$tmps["$name"]) {
		$tmps["$name"]=1;
		return 1;
	  
	}
	
	

}
?>