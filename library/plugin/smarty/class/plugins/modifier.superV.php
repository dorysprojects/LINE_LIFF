<?
function smarty_modifier_superV($su)
{

switch($su){
	case 'super':
		return $_SESSION[__HOST]['super']['state'];
	break;
	case 'admin':
		return $_SESSION[__HOST]['admin']['state'];
	break;
	default:
	return false;
	break;
}
}
?>