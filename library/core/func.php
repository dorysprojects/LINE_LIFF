<?php

$func = array(
    'kCore',
);

if (!empty($func)):
    foreach ($func as $f):
        $flag = substr($f, 0, 1);
        if ($flag == '-' or empty($flag))
            continue;
        //	$str.='include_once(__LIB."/core/func/'.$f.'.php");'."\n"; 
        include_once(__LIB . "/core/func/" . $f . ".php");
    endforeach;
/* if(!file_exists(__TMP.'/lib'))mkdir(__TMP.'/lib');
  if(!file_exists(__TMP.'/lib/core'))mkdir(__TMP.'/lib/core');
  $str="<?\n".$str."?>";
  file_put_contents(__TMP.'/lib/core/func.php',$str,LOCK_EX); */
endif;