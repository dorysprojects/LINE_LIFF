<?php
$class = array(
    'Rsa',
    'kSQL',
    'kProcess',
    'kHtml',
    'kFile',
);
if (!empty($class)) {
    foreach ($class as $FileName) {
        $flag = substr($FileName, 0, 1);
        if ($flag == '-' or empty($flag)) {
            continue;
        }
        include_once __LIB . "/core/class/" . $FileName . ".php";
    }
}