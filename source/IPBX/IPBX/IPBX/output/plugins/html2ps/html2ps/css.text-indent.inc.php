<?php
// $Header: /cvsrepos/html2ps/css.text-indent.inc.php,v 1.1 2008/07/01 12:30:28 sergey Exp $

require_once(HTML2PS_DIR.'value.text-indent.class.php');

class CSSTextIndent extends CSSPropertyHandler {
  function CSSTextIndent() { 
    $this->CSSPropertyHandler(true, true); 
  }

  function default_value() { 
    return new TextIndentValuePDF(array(0,false)); 
  }

  function parse($value) {
    if ($value === 'inherit') {
      return CSS_PROPERTY_INHERIT;
    };

    if (is_percentage($value)) { 
      return new TextIndentValuePDF(array((int)$value, true));
    } else {
      return new TextIndentValuePDF(array($value, false));
    };
  }

  function getPropertyCode() {
    return CSS_TEXT_INDENT;
  }

  function getPropertyName() {
    return 'text-indent';
  }
}

CSS::register_css_property(new CSSTextIndent());

?>