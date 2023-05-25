<?php












// Before record deleted
function BeforeDelete($where,&$deleted_values,&$message)
{


//  Verifica se o id do registro esta sendo utilizado.
global $conn;
$strSQLExists = "select * from ipbx_ramais where pickupgroup='".$deleted_values["id_captura"]."'";
$rsExists = db_query($strSQLExists,$conn);
$data=db_fetch_array($rsExists);
if($data)
{
	$message="Não é possível deletar grupo de captura, sendo utilizado em um ramal";
	return false;
}
else
{
	return true;
}







;
} // function BeforeDelete
$arrEventTables["BeforeDelete"]="ipbx_grupo_captura";


































?>