<?php












// Before record deleted
function BeforeDelete($where,&$deleted_values,&$message)
{


//**********  Verifica se o horário esta sendo utilizado em outra fila  ************
global $conn;
$strSQLExists = "select * from cc_receptivo_filas where id_horario='".$deleted_values["id_horario"]."'";
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);
if($data)
{
	$message="Horário esta sendo utilizado por uma fila de atendimento.";
   return false;
}
else
{
	return true;
}









;
} // function BeforeDelete
$arrEventTables["BeforeDelete"]="cc_receptivo_horario";


































?>