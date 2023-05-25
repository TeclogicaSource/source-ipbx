<?php
// $Header: /cvsrepos/html2ps/css.min-width.inc.php,v 1.1 2008/07/01 12:30:26 sergey Exp $

class CSSMinWidth extends CSSSubFieldProperty {
  function CSSMinWidth(&$owner, $field) {
    $this->CSSSubFieldProperty($owner, $field);
  }

  function getPropertyCode() {
    return CSS_MIN_WIDTH;
  }

  function getPropertyName() {
    return 'min-width';
  }

  function parse($value) {
    if ($value == 'inherit') {
      return CSS_PROPERTY_INHERIT;
    }
    
    return Value::fromString($value);
  }
}

?>