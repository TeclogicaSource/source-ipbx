<?php
$strTableName="Ramais";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="conta";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_conta,  idt_custo,  origem,  destino,  duracao,  custo,  calldate";
$gsqlFrom="FROM conta";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Por_Ramal_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Por_Ramal;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>