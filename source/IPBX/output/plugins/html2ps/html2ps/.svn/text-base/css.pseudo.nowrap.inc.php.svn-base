<?php
// $Header: /cvsrepos/html2ps/css.pseudo.nowrap.inc.php,v 1.1 2008/07/01 12:30:27 sergey Exp $

define('NOWRAP_NORMAL',0);
define('NOWRAP_NOWRAP',1);

class CSSPseudoNoWrap extends CSSPropertyHandler {
  function CSSPseudoNoWrap() { $this->CSSPropertyHandler(false, false); }
  function default_value() { return NOWRAP_NORMAL; }

  function getPropertyCode() {
    return CSS_HTML2PS_NOWRAP;
  }

  function getPropertyName() {
    return '-html2ps-nowrap';
  }
}

CSS::register_css_property(new CSSPseudoNoWrap);
  
?>