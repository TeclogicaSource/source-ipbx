<?php
// $Header: /cvsrepos/html2ps/css.page-break-inside.inc.php,v 1.1 2008/07/01 12:30:26 sergey Exp $

class CSSPageBreakInside extends CSSPageBreak {
  function getPropertyCode() {
    return CSS_PAGE_BREAK_INSIDE;
  }

  function getPropertyName() {
    return 'page-break-inside';
  }
}

CSS::register_css_property(new CSSPageBreakInside);

?>