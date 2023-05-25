<?php
// $Header: /cvsrepos/html2ps/xhtml.style.inc.php,v 1.1 2008/07/01 12:30:52 sergey Exp $

function process_style(&$html) {
  $styles = array();

  if (preg_match('#^(.*)(<style[^>]*>)(.*?)(</style>)(.*)$#is', $html, $matches)) {
    $styles = array_merge(array($matches[2].process_style_content($matches[3]).$matches[4]),
                          process_style($matches[5]));
    $html = $matches[1].$matches[5];
  };

  return $styles;
}

function process_style_content($html) {
  // Remove CDATA comment bounds inside the <style>...</style> 
  $html = preg_replace("#<!\[CDATA\[#","",$html); 
  $html = preg_replace("#\]\]>#is","",$html);

  // Remove HTML comment bounds inside the <style>...</style> 
  $html = preg_replace("#<!--#is","",$html); 
  $html = preg_replace("#-->#is","",$html);

  // Remove CSS comments
  $html = preg_replace("#/\*.*?\*/#is","",$html);

  // Force CDATA comment
  $html = '<![CDATA['.$html.']]>';

  return $html;
}

function insert_styles($html, $styles) {
  // This function is called after HTML code has been fixed; thus, 
  // HEAD closing tag should be present

  $html = preg_replace('#</head>#', join("\n", $styles)."\n</head>", $html);
  return $html;
}

?>