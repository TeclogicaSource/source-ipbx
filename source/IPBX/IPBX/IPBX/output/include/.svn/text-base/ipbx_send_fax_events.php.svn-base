<?php










// Before record added
function BeforeAdd(&$values,&$message,$inline)
{



// Verifica se o arquivo que esta sendo inserido й arquivo wav.
$wrk_str=strtolower(substr($values["arq_fax"], -3)); 

if ( $wrk_str == "pdf" || $values["arq_fax"] == "" ){
   if ( strlen($values["nm_telefone"]) >= 8){
	  //$values["arq_fax"]=$linha['pasta']."/".$values["arq_fax"];
	  return true;
   }else{
		$message="Favor digitar um nъmero externo para envio de fax.";
		return false;
	}
}else{
	$message="Arquivo de fax invalido, favor adicionar somente arquivos PDF.";
	return false;
}  
	

;
} // function BeforeAdd
$arrEventTables["BeforeAdd"]="ipbx_send_fax";















































// After record added
function AfterAdd(&$values,&$keys,$inline)
{





// Verifica a configuraзгo de gravaзгo
global $conn;

//Configuracao de Fax
$resultado_fax = mysql_query("select pasta from ipbx_conf_fax");
$linha = mysql_fetch_assoc($resultado_fax);
mysql_free_result($resultado_fax);

// Envio de fax
exec('/usr/bin/sudo /usr/local/bin/sendfax -t 1 -n -d '.$values["nm_telefone"].' /var/www/html/fax/'.$values["arq_fax"]);

$data_fax=date('Y-m-d H:i:s');

mysql_query("insert into ipbx_tx_fax (nm_telefone, dt_fax, status, arq_fax) values ('".$values["nm_telefone"]."','".$data_fax."','Enviando','".$values["arq_fax"]."')");
mysql_query("delete from ipbx_send_fax where nm_telefone='".$values["nm_telefone"]."'");

// Dispara processo de preenchimento da solicitaзгo
$retorno=shell_exec('/usr/bin/nohup /usr/bin/sudo /var/www/html/include/teclogica/sendfax.sh "'.$data_fax.'" > /dev/null &');

//Desvia para pagina de envio.
header("Location: ipbx_tx_fax_list.php");
exit();

;
} // function AfterAdd
$arrEventTables["AfterAdd"]="ipbx_send_fax";



































?>