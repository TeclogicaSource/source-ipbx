<?php
// $Header: /cvsrepos/html2ps/css.pseudo.localalign.inc.php,v 1.1 2008/07/01 12:30:27 sergey Exp $

define('LA_LEFT',0);
define('LA_CENTER',1);
define('LA_RIGHT',2);

class CSSLocalAlign extends CSSPropertyHandler {
  function CSSLocalAlign() { $this->CSSPropertyHandler(false, false); }

  function default_value() { return LA_LEFT; }

  function parse($value) { return $value; }

  function getPropertyCode() {
    return CSS_HTML2PS_LOCALALIGN;
  }

  function getPropertyName() {
    return '-html2ps-localalign';
  }
}

CSS::register_css_property(new CSSLocalAlign);

?>