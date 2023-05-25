<?php
$strTableName="desvios";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="desvios";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT ramal,  destino,  seg,  ter,  qua,  qui,  sex,  sab,  dom,  hr_inicio,  hr_fim,  id_desvio";
$gsqlFrom="FROM desvios";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/desvios_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_desvios;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>