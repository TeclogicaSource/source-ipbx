<?php











// After record added
function AfterAdd(&$values,&$keys,$inline)
{


;
} // function AfterAdd
$arrEventTables["AfterAdd"]="ipbx_horario_desv";
















































// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{


//**********  Insert a record into another table  ************
global $conn;
$strSQLDelete = "DELETE FROM `ipbx_horario_desv_ramais` WHERE `id_desvio` = {$deleted_values['id_desvio']};";
db_exec($strSQLDelete,$conn);



;
} // function AfterDelete
$arrEventTables["AfterDelete"]="ipbx_horario_desv";


























































// List page: After record processed
function BeforeMoveNextList(&$data,&$row,&$record)
{


;
} // function BeforeMoveNextList
$arrEventTables["BeforeMoveNextList"]="ipbx_horario_desv";
























// Add page: Before process
function BeforeProcessAdd(&$conn)
{


;
} // function BeforeProcessAdd
$arrEventTables["BeforeProcessAdd"]="ipbx_horario_desv";























































// Before record deleted
function BeforeDelete($where,&$deleted_values,&$message)
{

//**********  Check if specific record exists  ************
global $conn;
$strSQLExists = "select * from ipbx_ramais where `id_desvio`={$deleted_values['id_desvio']};";
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);

if($data)
{
		$message = '<font color=red>Este desvio está em uso por um ramal.</font>';
		return false;
}
else
{
   return true;
}

return true;
;
} // function BeforeDelete
$arrEventTables["BeforeDelete"]="ipbx_horario_desv";


































?>