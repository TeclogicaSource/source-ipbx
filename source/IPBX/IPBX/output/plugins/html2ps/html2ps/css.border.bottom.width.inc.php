<?php
// $Header: /cvsrepos/html2ps/css.border.bottom.width.inc.php,v 1.1 2008/07/01 12:30:24 sergey Exp $

class CSSBorderBottomWidth extends CSSSubProperty {
  function CSSBorderBottomWidth(&$owner) {
    $this->CSSSubProperty($owner);
  }

  function setValue(&$owner_value, &$value) {
    if ($value != CSS_PROPERTY_INHERIT) {
      $owner_value->bottom->width = $value->copy();
    } else {
      $owner_value->bottom->width = $value;
    };
  }

  function getValue(&$owner_value) {
    return $owner_value->bottom->width;
  }

  function getPropertyCode() {
    return CSS_BORDER_BOTTOM_WIDTH;
  }

  function getPropertyName() {
    return 'border-bottom-width';
  }

  function parse($value) {
    if ($value == 'inherit') {
      return CSS_PROPERTY_INHERIT;
    }

    $width_handler = CSS::get_handler(CSS_BORDER_WIDTH);
    $width = $width_handler->parse_value($value);
    return $width;
  }
}

?>