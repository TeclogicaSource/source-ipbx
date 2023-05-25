<?php 
// $Header: /cvsrepos/html2ps/xhtml.selects.inc.php,v 1.1 2008/07/01 12:30:52 sergey Exp $

function process_option(&$sample_html, $offset) {
  return autoclose_tag($sample_html, $offset, "(option|/select|/option)", 
                       array(), 
                       "/option");  
};

function process_select(&$sample_html, $offset) {
  return autoclose_tag($sample_html, $offset, "(option|/select)", 
                       array("option" => "process_option"), 
                       "/select");  
};

function process_selects(&$sample_html, $offset) {
  return autoclose_tag($sample_html, $offset, "(select)", 
                       array("select" => "process_select"), 
                       "");  
};

?>