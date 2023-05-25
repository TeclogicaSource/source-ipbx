<?php
class DOMTree {
  var $domelement;
  var $content;
  
  function DOMTree($domelement) {
    $this->domelement = $domelement;
    $this->content = $domelement->textContent;
  }

  function &document_element() { 
    return $this; 
  }
  
  // XLINEFIX
  function fixTables(){
  	$tables = $this->domelement->getElementsByTagName("table");
  	for($i = 0; $i < $tables->length; $i++){
  		$isTBodyExist = false;
  		$tag = $tables->item($i)->firstChild;
		while ($tag) {
			if($tag->tagName == 'tbody'){
	   			$isTBodyExist = true;
	   			break;
			}
			if($isTBodyExist)
				break;
			$tag = $tag->nextSibling;
		}
		if($isTBodyExist)
			continue;
		$tbodyElement = $tables->item($i)->ownerDocument->createElement('tbody');
  		$tag = $tables->item($i)->firstChild;
		while ($tag) {
			$nextChild = $tag->nextSibling;
			if($tag->tagName != 'thead' && $tag->tagName != 'tfoot'){
				$tables->item($i)->removeChild($tag);
				$tbodyElement->appendChild($tag);				
			}
			$tag = $nextChild;
		}
		$tables->item($i)->appendChild($tbodyElement);
  	}
  }
  // XLINEFIX

  function &first_child() {
    if ($this->domelement->firstChild) {
      $child = new DOMTree($this->domelement->firstChild);
      return $child;
    } else {
      $null = false;
      return $null;
    };
  }

  function &from_DOMDocument($domdocument) { 
    $tree = new DOMTree($domdocument->documentElement); 
    return $tree;
  }

  function get_attribute($name) { 
    return $this->domelement->getAttribute($name); 
  }

  function get_content() { 
    return $this->domelement->textContent; 
  }

  function has_attribute($name) { 
    return $this->domelement->hasAttribute($name); 
  }

  function &last_child() {
    $child =& $this->first_child();

    if ($child) {
      $sibling =& $child->next_sibling();
      while ($sibling) {
        $child =& $sibling;
        $sibling =& $child->next_sibling();
      };
    };

    return $child;
  }

  function &next_sibling() {
    if ($this->domelement->nextSibling) {
      $child = new DOMTree($this->domelement->nextSibling);
      return $child;
    } else {
      $null = false;
      return $null;
    };
  }
  
  function node_type() { 
    return $this->domelement->nodeType; 
  }

  function &parent() {
    if ($this->domelement->parentNode) {
      $parent = new DOMTree($this->domelement->parentNode);
      return $parent;
    } else {
      $null = false;
      return $null;
    };
  }

  function &previous_sibling() {
    if ($this->domelement->previousSibling) {
      $sibling = new DOMTree($this->domelement->previousSibling);
      return $sibling;
    } else {
      $null = false;
      return $null;
    };
  }

  function tagname() { 
    return $this->domelement->localName; 
  }
}
?>