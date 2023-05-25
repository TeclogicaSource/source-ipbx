<?php
// $Header: /cvsrepos/html2ps/css.border.right.inc.php,v 1.1 2008/07/01 12:30:24 sergey Exp $

class CSSBorderRight extends CSSSubFieldProperty {
  function getPropertyCode() {
    return CSS_BORDER_RIGHT;
  }

  function getPropertyName() {
    return 'border-right';
  }

  function parse($value) {
    if ($value == 'inherit') {
      return CSS_PROPERTY_INHERIT;
    };

    $border = CSSBorder::parse($value);
    return $border->right;
  }
}

?>