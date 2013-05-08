<?php

/* vim: set shiftwidth=2 expandtab softtabstop=2: */

namespace Boris;

/**
 * Passes values through var_dump() to inspect them.
 */
class KohanaInspector implements Inspector {
  public function inspect($variable) {
    ob_start();

    if(method_exists($variable, '__toString')){
      echo $variable;
    } else if(is_array($variable)){
      print_r($variable);
    } else {
      var_dump($variable);
    }

    return trim(ob_get_clean());
  }
}
