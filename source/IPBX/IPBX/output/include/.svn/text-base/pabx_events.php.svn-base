<?php













// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{


//**********  Deleta desvios de ramal analogicos ************
global $conn;
$strSQLInsert = "delete from desvios_pabx where ramal='".$deleted_values["ramal"]."'";
db_exec($strSQLInsert,$conn);



//**********  libera ramal para utilizaчуo ************
global $conn;
$strSQLInsert = "update ramal_pabx_autorizado set flg_disp=1 where ramal='".$deleted_values["ramal"]."'";
db_exec($strSQLInsert,$conn);



// Place event code here.
// Use "Add Action" button to add code snippets.
;
} // function AfterDelete
$arrEventTables["AfterDelete"]="pabx";












































// After record added
function AfterAdd(&$values,&$keys,$inline)
{

//**********  Reserva ramal para utilizaчуo  ************
global $conn;
$strSQLInsert = "update ramal_pabx_autorizado set flg_disp=0 where ramal='".$values["ramal"]."'";
db_exec($strSQLInsert,$conn);

// Place event code here.
// Use "Add Action" button to add code snippets.
;
} // function AfterAdd
$arrEventTables["AfterAdd"]="pabx";



































?>