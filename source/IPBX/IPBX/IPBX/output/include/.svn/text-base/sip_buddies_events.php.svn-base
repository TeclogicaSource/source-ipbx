<?php











// After record added
function AfterAdd(&$values,&$keys,$inline)
{


//**********  Insert a record into another table  ************
global $conn;
$strSQLInsert = "update ramal_autorizado set flg_disp=0 where ramal=".$values["name"];
db_exec($strSQLInsert,$conn);



;
} // function AfterAdd
$arrEventTables["AfterAdd"]="sip_buddies";
















































// After record deleted
function AfterDelete($where,&$deleted_values,&$message)
{


//**********  Insert a record into another table  ************
global $conn;
$strSQLInsert = "update ramal_autorizado set flg_disp=1 where ramal=".$deleted_values["name"];
db_exec($strSQLInsert,$conn);




// Place event code here.
// Use "Add Action" button to add code snippets.
;
} // function AfterDelete
$arrEventTables["AfterDelete"]="sip_buddies";

































?>