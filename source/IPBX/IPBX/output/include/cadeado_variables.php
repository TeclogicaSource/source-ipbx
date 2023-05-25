<?php
$strTableName="cadeado";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cadeado";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT idt_cadeado,  Ramal,  dt_ativacao";
$gsqlFrom="FROM cadeado";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/cadeado_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_cadeado;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>