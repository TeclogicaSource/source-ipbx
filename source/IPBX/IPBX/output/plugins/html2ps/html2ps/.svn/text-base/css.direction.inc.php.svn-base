<?php
// $Header: /cvsrepos/html2ps/css.direction.inc.php,v 1.1 2008/07/01 12:30:25 sergey Exp $

define('DIRECTION_LTR', 1);
define('DIRECTION_RTF', 1);

class CSSDirection extends CSSPropertyStringSet {
  function CSSDirection() { 
    $this->CSSPropertyStringSet(true, 
                                true,
                                array('lrt' => DIRECTION_LTR,
                                      'rtl' => DIRECTION_RTF)); 
  }

  function default_value() { 
    return DIRECTION_LTR; 
  }

  function getPropertyCode() {
    return CSS_DIRECTION;
  }

  function getPropertyName() {
    return 'direction';
  }
}

CSS::register_css_property(new CSSDirection);

?>