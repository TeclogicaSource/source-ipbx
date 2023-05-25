<?php
$strTableName="Informações de Fila";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_filas";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_filas";
$gsqlFrom="FROM cc_receptivo_filas";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Informa__es_de_Fila_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Informa__es_de_Fila;

include(getabspath("include/Informa__es_de_Fila_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>