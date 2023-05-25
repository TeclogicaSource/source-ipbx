<?php
// $Header: /cvsrepos/html2ps/css.clear.inc.php,v 1.1 2008/07/01 12:30:25 sergey Exp $

define('CLEAR_NONE',0);
define('CLEAR_LEFT',1);
define('CLEAR_RIGHT',2);
define('CLEAR_BOTH',3);

class CSSClear extends CSSPropertyStringSet {
  function CSSClear() { 
    $this->CSSPropertyStringSet(false, 
                                false,
                                array('inherit' => CSS_PROPERTY_INHERIT,
                                      'left'    => CLEAR_LEFT,
                                      'right'   => CLEAR_RIGHT,
                                      'both'    => CLEAR_BOTH,
                                      'none'    => CLEAR_NONE)); 
  }

  function default_value() { 
    return CLEAR_NONE; 
  }

  function getPropertyCode() {
    return CSS_CLEAR;
  }

  function getPropertyName() {
    return 'clear';
  }
}

CSS::register_css_property(new CSSClear);

?>