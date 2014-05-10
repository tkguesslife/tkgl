<?php

namespace Tkgl\CoreBundle\Lib;

/**
 * Description of Debug
 *
 * @author tk
 */
class Debug {

  static function check($var1, $var2 = null) {

    echo '<pre>';
    if (!$var2) {
      exit(print_r($var1, 1));
    } else {
      echo print_r($var1, 1);
      echo "\n";
      echo '<pre>';
      echo print_r($var2, 1);
      exit();
    }
  }

  static function printAndContinue($var) {
    echo '<pre>';
    echo print_r($var, 1);
  }
  
  static function objectDump($obj, $intRecursiveLevelToDisplay = 2){
     echo '<pre>';
    \Doctrine\Common\Util\Debug::dump($obj, $intRecursiveLevelToDisplay);
    exit();
  }

}

?>