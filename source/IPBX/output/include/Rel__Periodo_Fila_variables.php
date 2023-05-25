<?php
$strTableName="Rel. Periodo Fila";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="log_fila_agente_periodo";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT Fila,   dt_entrada,   hr_entrada,   logados,   pausados,   atendendo,   discando";
$gsqlFrom="FROM log_fila_agente_periodo";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Rel__Periodo_Fila_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Periodo_Fila;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>