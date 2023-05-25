<?php
// $Header: /cvsrepos/html2ps/css.word-spacing.inc.php,v 1.1 2008/07/01 12:30:28 sergey Exp $

class CSSWordSpacing extends CSSPropertyHandler {
  var $_default_value;

  function CSSWordSpacing() { 
    $this->CSSPropertyHandler(false, true); 

    $this->_default_value = Value::fromString("0");
  }

  function default_value() { 
    return $this->_default_value;
  }

  function parse($value) {
    $value = trim($value);

    if ($value === 'inherit') {
      return CSS_PROPERTY_INHERIT;
    };

    if ($value === 'normal') { 
      return $this->_default_value; 
    };

    return Value::fromString($value);
  }

  function getPropertyCode() {
    return CSS_WORD_SPACING;
  }

  function getPropertyName() {
    return 'word-spacing';
  }
}

CSS::register_css_property(new CSSWordSpacing);

?>
