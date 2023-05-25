<?php










// Before record added
function BeforeAdd(&$values,&$message,$inline)
{

//**********  Check if specific record exists  ************
global $conn;
$strSQLExists = "select * from cc_receptivo_agentes where id_agente=".$values['id_agente']." OR nm_agente='".$values['nm_agente']."';";
$rsExists = mysql_query($strSQLExists);
$data=mysql_fetch_array($rsExists);

if($data)
{
	$message='Por favor, informe um login ou um nome disponível.';
	return false;
}
else
{
	return true;
}
;
} // function BeforeAdd
$arrEventTables["BeforeAdd"]="cc_receptivo_agentes";
















































// Before record deleted
function BeforeDelete($where,&$deleted_values,&$message)
{


//**********  Check if specific record exists  ************
global $conn;
$strSQLExists = "select * from queue_member_table where membername='".$deleted_values["nm_agente"]."'";
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);
if($data)
{
	$message='Usuário esta logado, favor deslogar o usuário antes de remover';
	return false;
}
else
{
	return true;
}





;
} // function BeforeDelete
$arrEventTables["BeforeDelete"]="cc_receptivo_agentes";

















































// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{

//**********  Check if specific record exists  ************
global $conn;
$strSQLExists = "select * from queue_member_table where membername='".$oldvalues["nm_agente"]."'";
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);

$stringRows = "select * from cc_receptivo_agentes where id_agente=".$values['id_agente']." OR nm_agente='".$values['nm_agente']."';";
$queryRows = mysql_query($stringRows);
$rows=mysql_fetch_array($queryRows);

if ($rows) {
	$message='Por favor, informe um login ou um nome disponível.';
	return false;
}

if($data)
{
	$message='Usuário esta logado, favor deslogar o usuário antes de alterar';
	return false;
}
else
{
	return true;
}
;
} // function BeforeEdit
$arrEventTables["BeforeEdit"]="cc_receptivo_agentes";































?>