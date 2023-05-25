<?php













// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{


//**********  altera horario de ligaчуo para nulo nos numeros sip ************
global $conn;
$strSQLInsert = "update ipbx_ramais set id_horario=NULL where id_horario='".$deleted_values["id_horario"]."'";
db_exec($strSQLInsert,$conn);




;
} // function AfterDelete
$arrEventTables["AfterDelete"]="horario";

































?>