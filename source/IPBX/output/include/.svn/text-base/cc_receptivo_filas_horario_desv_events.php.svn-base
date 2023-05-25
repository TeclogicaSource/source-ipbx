<?php













// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{

global $conn;
$strSQLDelete = "DELETE FROM `cc_receptivo_filas_horario_desv_ramais` WHERE `id_desvio` = {$deleted_values['id_desvio']};";
db_exec($strSQLDelete,$conn);
;
} // function AfterDelete
$arrEventTables["AfterDelete"]="cc_receptivo_filas_horario_desv";












































// After record added
function AfterAdd(&$values,&$keys,$inline)
{


;
} // function AfterAdd
$arrEventTables["AfterAdd"]="cc_receptivo_filas_horario_desv";















































// Before record deleted
function BeforeDelete($where,&$deleted_values,&$message)
{

//**********  Check if specific record exists  ************
global $conn;
$strSQLExists = "select * from cc_receptivo_filas where `id_desvio`={$deleted_values['id_desvio']};";
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);

if($data)
{
		$message = '<font color=red>Este desvio está em uso por uma fila.</font>';
		return false;
}
else
{
   return true;
}

return true;
;
} // function BeforeDelete
$arrEventTables["BeforeDelete"]="cc_receptivo_filas_horario_desv";


































?>