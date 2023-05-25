<?php
// $Header: /cvsrepos/html2ps/css.right.inc.php,v 1.1 2008/07/01 12:30:27 sergey Exp $

require_once(HTML2PS_DIR.'value.right.php');

class CSSRight extends CSSPropertyHandler {
  function CSSRight() { 
    $this->CSSPropertyHandler(false, false); 
    $this->_autoValue = ValueRight::fromString('auto');
  }

  function _getAutoValue() {
    return $this->_autoValue->copy();
  }

  function default_value() { 
    return $this->_getAutoValue();
  }

  function parse($value) { 
    return ValueRight::fromString($value);
  }

  function getPropertyCode() {
    return CSS_RIGHT;
  }

  function getPropertyName() {
    return 'right';
  }
}

CSS::register_css_property(new CSSRight);

?>