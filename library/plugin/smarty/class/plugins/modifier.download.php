<?

function smarty_modifier_download($gotopage,$filepath, $filename)
{
   	$filepath=urlencode($filepath);
	$filename=urlencode($filename);
	return $str=$gotopage."?filepath=".$filepath."&filename=".$filename;
	
}
?>