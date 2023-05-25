<?php
$strTableName="cc_agentes_fila";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_agentes_fila";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT idt_agentes_fila,   idt_agentes,   id_filas,   penalidade";
$gsqlFrom="FROM cc_agentes_fila";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/cc_agentes_fila_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_cc_agentes_fila;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>