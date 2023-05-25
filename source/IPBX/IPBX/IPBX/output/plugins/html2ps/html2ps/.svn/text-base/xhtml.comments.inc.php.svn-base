<?php
// $Header: /cvsrepos/html2ps/xhtml.comments.inc.php,v 1.1 2008/07/01 12:30:52 sergey Exp $

function remove_comments(&$html) {
  $html = preg_replace("#<!--.*?-->#is","",$html);
  $html = preg_replace("#<!.*?>#is","",$html);
}

?>