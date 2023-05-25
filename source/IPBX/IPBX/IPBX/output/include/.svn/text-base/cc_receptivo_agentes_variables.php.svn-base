<?php
$strTableName="cc_receptivo_agentes";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_agentes";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_cc_rec_agentes,   id_agente,   nm_agente,   penalidade,   senha,   id_fila";
$gsqlFrom="FROM cc_receptivo_agentes";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/cc_receptivo_agentes_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_cc_receptivo_agentes;

include(getabspath("include/cc_receptivo_agentes_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>