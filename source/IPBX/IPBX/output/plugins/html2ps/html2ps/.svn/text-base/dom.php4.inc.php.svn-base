<?php

class PHP4DOMTree {
  var $_element;
  
  function PHP4DOMTree($domelement) {
    $this->_element = $domelement;
    $this->content = $domelement->get_content();
  }

  function &document_element() { 
    $element = $this->_element->document_element();
    return $element;
  }
  
  // XLINEFIX
  function fixTables(){
  	$tables = $this->_element->get_elements_by_tagname("table");
  	for($i = 0; $i < count($tables); $i++){
  		$isTBodyExist = false;
  		$tag = $tables[$i]->first_child();
		while ($tag) {
			if($tag->tagname() == 'tbody'){
	   			$isTBodyExist = true;
	   			break;
			}
			if($isTBodyExist)
				break;
			$tag = $tag->next_sibling();
		}
		if($isTBodyExist)
			continue;
		$tbodyElement = $tables[$i]->document_element()->create_element('tbody');
  		$tag = $tables[$i]->first_child();
		while ($tag) {
			$nextTag = $tag->next_sibling();
			if($tag->tagname() != 'thead' && $tag->tagname() != 'tfoot'){
				$tables[$i]->remove_child($tag);
				$tbodyElement->append_child($tag);				
			}
			$tag = $nextTag;
		}
		$tables[$i]->append_child($tbodyElement);
  	}
  }
  // XLINEFIX

  function &first_child() {
    $child =& PHP4DOMTree::from_DOMDocument($this->_element->first_child());
    return $child;
  }

  function &from_DOMDocument($domdocument) { 
    if (!$domdocument) {
      $null = null;
      return $null;
    };

    $tree = new PHP4DOMTree($domdocument); 
    return $tree;
  }

  function get_attribute($name) { 
    return $this->_element->get_attribute($name); 
  }

  function get_content() { 
    return $this->_element->get_content(); 
  }

  function has_attribute($name) { 
    return $this->_element->has_attribute($name);
  }

  function &last_child() {
    $child =& PHP4DOMTree::from_DOMDocument($this->_element->last_child());
    return $child;
  }

  function &next_sibling() {
    $sibling =& PHP4DOMTree::from_DOMDocument($this->_element->next_sibling());
    return $sibling;
  }
  
  function node_type() { 
    return $this->_element->node_type();
  }

  function &parent() {
    $parent =& PHP4DOMTree::from_DOMDocument($this->_element->parent());
    return $parent;
  }

  function &previous_sibling() {
    $sibling =& PHP4DOMTree::from_DOMDocument($this->_element->previous_sibling());
    return $sibling;
  }

  function tagname() { 
    return $this->_element->tagname();
  }
}
?>