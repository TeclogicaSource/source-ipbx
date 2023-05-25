<?php
// $Header: /cvsrepos/html2ps/css.page.inc.php,v 1.1 2008/07/01 12:30:26 sergey Exp $

class CSSPage extends CSSPropertyHandler {
  function CSSPage() { 
    $this->CSSPropertyHandler(true, true); 
  }

  function default_value() { 
    return 'auto'; 
  }

  function parse($value) {
    return $value;
  }

  function getPropertyCode() {
    return CSS_PAGE;
  }

  function getPropertyName() {
    return 'page';
  }
}

CSS::register_css_property(new CSSPage());

?>