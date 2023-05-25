<?php

// List page: Before process
function BeforeProcessList(&$conn)
{


$username=$_SESSION["UserID"];

echo("
  <SCRIPT type=text/javascript>
  var http = false;
  var UserLogado=".$username.";");

echo ("
  if(navigator.appName == 'Microsoft Internet Explorer') {
  http = new ActiveXObject('Microsoft.XMLHTTP');
} else {
  http = new XMLHttpRequest();
}

function dial(destino) {
  http.abort();
  http.open('GET', 'dial.php?origem=' + UserLogado + '&destino=' + destino, true);
  http.onreadystatechange=function() {
   if(http.readyState == 4) {
     document.getElementById('foo').innerHTML = http.responseText;
   }

  }
  http.send(null);
}

</SCRIPT>");

echo ("<div id='foo'> </div>");
;
} // function BeforeProcessList
$arrEventTables["BeforeProcessList"]="v_contatos";













































?>