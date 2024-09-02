<?php

$func = array(
    'kCore',
);

if (!empty($func)):
    foreach ($func as $f):
        $flag = substr($f, 0, 1);
        if ($flag == '-' or empty($flag))
            continue;
        include_once(__LIB . "/core/func/" . $f . ".php");
    endforeach;
endif;