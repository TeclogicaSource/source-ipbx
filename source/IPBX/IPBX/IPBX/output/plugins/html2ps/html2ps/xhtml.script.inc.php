<?php
// $Header: /cvsrepos/html2ps/xhtml.script.inc.php,v 1.1 2008/07/01 12:30:52 sergey Exp $

function process_script($sample_html) {
  return preg_replace("#<script.*?</script>#is","",$sample_html);
}

?>