<?php
















// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{

// Inclus�o das interfaces de gera��o
include './include/teclogica/funcoes_gerais.php';
include './include/teclogica/gerador_interf.php';

//Inserir mensagem informando da altera��o
insereMensagem("Altera��o realizada na interface GSM.");


// Teste de include.
sincronizaGSM($values['id_interf'], $values["board"]);

;
} // function AfterEdit
$arrEventTables["AfterEdit"]="ipbx_interf_gsm";











































// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{

// Inclus�o das interfaces de gera��o
include_once './include/teclogica/funcoes_gerais.php';

// Conex�o com o banco de dados
global $conn;

// Altera��o do ipbx_canais
$delete_ipbx_canais = mysql_query("delete from ipbx_canais where id_interf = ".$deleted_values["id_interf"]);

//Inserir mensagem informando da altera��o
insereMensagem("Altera��o realizada na interface E1.");
;
} // function AfterDelete
$arrEventTables["AfterDelete"]="ipbx_interf_gsm";












































// After record added
function AfterAdd(&$values,&$keys,$inline)
{

// Inclus�o das interfaces de gera��o
include_once './include/teclogica/funcoes_gerais.php';
include_once './include/teclogica/gerador_interf.php';

/*
//Inserir mensagem informando da altera��o
$sql = "select MAX(id_interf) + 1 as id from ipbx_interf;";
$query = mysql_query($sql) or die(mysql_error());
$result = mysql_fetch_array($query) or die(mysql_error());

sincronizaGSM($result[0], $values["board"]);
*/

//Inserir mensagem informando da altera��o
insereMensagem("Altera��o realizada na interface FXS.");
;
} // function AfterAdd
$arrEventTables["AfterAdd"]="ipbx_interf_gsm";













































// Before record added
function BeforeAdd(&$values,&$message,$inline)
{

	$values["id_chamada"]=trim($values["id_chamada"]);
	return true;
;
} // function BeforeAdd
$arrEventTables["BeforeAdd"]="ipbx_interf_gsm";



















































// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{

	$values["id_chamada"]=trim($values["id_chamada"]);
	return true;

;
} // function BeforeEdit
$arrEventTables["BeforeEdit"]="ipbx_interf_gsm";































?>