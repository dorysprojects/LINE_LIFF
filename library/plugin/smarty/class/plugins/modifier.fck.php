<?php 

function smarty_modifier_fck($data,$id,$w,$h)
{
	
	
	
	
	if(!empty($_SESSION[__HOST]['backend']['user'])):
	   $tmp=str_replace(' ','',$_SESSION[__HOST]['backend']['user']);
	   $tmp=str_replace('/','_',$tmp);
	   $tmp=str_replace(';','_',$tmp);
	   $tmp=str_replace('>','_',$tmp);
	   $tmp=str_replace('|','_',$tmp);
	   $_SESSION['fck_filepath']=__Mname.'/'.$tmp;
	elseif( !empty($_SESSION[__HOST][managerA][state])) :
	   $tmp=str_replace(' ','', $_SESSION[__HOST][managerA][a_name]);
	   $tmp=str_replace('/','_',$tmp);
	   $tmp=str_replace(';','_',$tmp);
	   $tmp=str_replace('>','_',$tmp);
	   $tmp=str_replace('|','_',$tmp);
	   $_SESSION['fck_filepath']=__Mname.'/'.$tmp.$_SESSION[__HOST][managerA][a_id];
	else:
	   $_SESSION['fck_filepath']=__Mname.'/guest';
	endif;
	
return return_edit($id,__Fckeditor,"songo_nopic",$w,$h,htmlspecialchars_decode($data));

}
?>