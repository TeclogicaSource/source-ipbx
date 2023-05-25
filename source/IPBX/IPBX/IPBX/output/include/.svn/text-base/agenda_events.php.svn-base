<?php




























// List page: Before display
function BeforeShowList(&$xt,&$templatefile)
{


;
} // function BeforeShowList
$arrEventTables["BeforeShowList"]="agenda";



















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
$arrEventTables["BeforeProcessList"]="agenda";


























































































function agenda_Snippet1(&$params)
{

if ( $_SESSION["UserID"] == 'admin' ){
	
   // Busca existencia de correios para enviar.
	global $conn;
	$result_acesso = mysql_query("select count(*) as existe from timeout where dt_timeout > ( now() - INTERVAL 1 DAY)");

	// Requisita informação para a construção do correio (numero de acesso)
	while ($linha_acesso = mysql_fetch_assoc($result_acesso)){
		if ( $linha_acesso['existe'] != '0' ){
		echo "<script language='javascript'>alert 'Antes' </script>";
			echo "<span style='font-family:Verdana;font-size:10px;font-style:normal;font-weight:bold;text-decoration:none;text-transform:none;color:FF0000;background-color:ffffff;'>Atenção: Timeout detectado, verificar utilização de banda. <br> Quantidade: ( ".$linha_acesso['existe']." ) </span>";		}
	}
}

;
}

?>