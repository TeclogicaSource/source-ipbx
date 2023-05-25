<?php







































// Before Insert Record
function BeforeInsert(&$rawvalues,&$values)
{






return true;
;
} // function BeforeInsert
$arrEventTables["BeforeInsert"]="VONO";















































// After Import Finished
function AfterImport($count,$skipCount)
{


//**********  Insert a record into another table  ************
global $conn;
$strSQLInsert = "delete from VONO where prefixo=''";
db_exec($strSQLInsert,$conn);

// Place event code here.
// Use "Add Action" button to add code snippets.
;
} // function AfterImport
$arrEventTables["AfterImport"]="VONO";












































// Before Import Started
function BeforeImport()
{

//**********  Insert a record into another table  ************
global $conn;
$strSQLInsert = "truncate table VONO";
db_exec($strSQLInsert,$conn);


return true;
;
} // function BeforeImport
$arrEventTables["BeforeImport"]="VONO";








?>