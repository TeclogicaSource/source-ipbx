<?php
// $Header: /cvsrepos/html2ps/css.table-layout.inc.php,v 1.1 2008/07/01 12:30:28 sergey Exp $

define('TABLE_LAYOUT_AUTO',   1);
define('TABLE_LAYOUT_FIXED',  2);

class CSSTableLayout extends CSSPropertyStringSet {
  function CSSTableLayout() { 
    $this->CSSPropertyStringSet(false, 
                                false,
                                array('auto'  => TABLE_LAYOUT_AUTO,
                                      'fixed' => TABLE_LAYOUT_FIXED)); 
  }

  function default_value() { 
    return TABLE_LAYOUT_AUTO; 
  }

  function getPropertyCode() {
    return CSS_TABLE_LAYOUT;
  }

  function getPropertyName() {
    return 'table-layout';
  }
}

CSS::register_css_property(new CSSTableLayout());
  
?>