<?php
// $Header: /cvsrepos/html2ps/stubs.file_get_contents.inc.php,v 1.1 2008/07/01 12:30:50 sergey Exp $

function file_get_contents($file) {
  $lines = file($file);
  if ($lines) {
    return implode('',$lines);
  } else {
    return "";
  };
}
?>