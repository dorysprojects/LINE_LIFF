<?php

/** Sample :

  <!--[ switch expr=$toTest]-->
   <!--[case expr="The"]-->
      case "The"<br/>
   <!--[/case]-->
   <!--[case expr="word"]-->
      case word<br/>
   <!--[/case]-->
    <!--[case]-->
      Default used as nothing found.  Humm - maybe an alias should be defined for default - to allow for the default keyword.<br/>
   <!--[/case]-->
  <!--[/switch]-->
 */

/**
* Smarty {switch}{/switch} block plugin
*
* Type: block function<br>
* Name: switch<br>
* Purpose: container for {page}...{/page} blocks
* author: messju mohr <messju@lammfellpuschen.de>
* very slightly modified: dasher <dasher@inspiredthinking.co.uk>
* @param array
* Params: expr: string|numeric to be tested
* @param string contents of the block
* @param Smarty
* @return string
*/
function smarty_block_switch($params, $content, &$smarty, &$pages) {

   if (is_null($content) && !array_key_exists('expr', $params)) {
      $smarty->trigger_error("{switch}: parameter 'expr' not given");
   }
   return $content;
}


?> 