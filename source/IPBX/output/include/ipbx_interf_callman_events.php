<?php











// After record added
function AfterAdd(&$values,&$keys,$inline)
{

// Inclus�o das interfaces de gera��o
include_once './include/teclogica/funcoes_gerais.php';

//Inserir mensagem informando da altera��o
insereMensagem("Altera��o realizada na interface CALL MANAGER.");
;
} // function AfterAdd
$arrEventTables["AfterAdd"]="ipbx_interf_callman";



















































// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{

// Inclus�o das interfaces de gera��o
include_once './include/teclogica/funcoes_gerais.php';

//Inserir mensagem informando da altera��o
insereMensagem("Altera��o realizada na interface CALL MANAGER.");
;
} // function AfterEdit
$arrEventTables["AfterEdit"]="ipbx_interf_callman";











































// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{

// Inclus�o das interfaces de gera��o
include_once './include/teclogica/funcoes_gerais.php';

//Inserir mensagem informando da altera��o
insereMensagem("Altera��o realizada na interface CALL MANAGER.");
;
} // function AfterDelete
$arrEventTables["AfterDelete"]="ipbx_interf_callman";
















































// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{

//**********  Check if specific record exists  ************
global $conn;
$strSQLExists = "SELECT SUM(IFNULL(flg_logon_remoto, 0)) logon FROM ipbx_interf";
$rsExists = mysql_query($strSQLExists);
$data=mysql_fetch_array($rsExists);
if($data[0] > 1)
{
	$message = "N�o � poss�vel ativar o logon remoto se outro j� estiver em uso.";
	return false;
}
else
{
	//$values["id_chamada"]=trim($values["id_chamada"]);
	return true;
}
;
} // function BeforeEdit
$arrEventTables["BeforeEdit"]="ipbx_interf_callman";









































// Before record added
function BeforeAdd(&$values,&$message,$inline)
{

//**********  Check if specific record exists  ************
global $conn;
$strSQLExists = "SELECT SUM(IFNULL(flg_logon_remoto, 0)) logon FROM ipbx_interf";
$rsExists = mysql_query($strSQLExists);
$data=mysql_fetch_array($rsExists);
if($data[0] > 1)
{
	$message = "N�o � poss�vel ativar o logon remoto se outro j� estiver em uso.";
	return false;
}
else
{
	//$values["id_chamada"]=trim($values["id_chamada"]);
	return true;
}


;
} // function BeforeAdd
$arrEventTables["BeforeAdd"]="ipbx_interf_callman";




































?>