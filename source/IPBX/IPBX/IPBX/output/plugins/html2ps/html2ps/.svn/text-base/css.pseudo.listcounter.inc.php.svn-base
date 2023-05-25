<?php
// $Header: /cvsrepos/html2ps/css.pseudo.listcounter.inc.php,v 1.1 2008/07/01 12:30:27 sergey Exp $

class CSSPseudoListCounter extends CSSPropertyHandler {
  function CSSPseudoListCounter() { 
    $this->CSSPropertyHandler(true, false); 
  }

  function default_value() { 
    return 0; 
  }

  function getPropertyCode() {
    return CSS_HTML2PS_LIST_COUNTER;
  }

  function getPropertyName() {
    return '-html2ps-list-counter';
  }

  function parse($value) {
    return (int)$value;
  }
}

CSS::register_css_property(new CSSPseudoListCounter);

?>