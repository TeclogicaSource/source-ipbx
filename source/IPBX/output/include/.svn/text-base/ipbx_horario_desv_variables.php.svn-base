<?php
$strTableName="ipbx_horario_desv";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_horario_desv";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_desvio,   dsc_desvio";
$gsqlFrom="FROM ipbx_horario_desv";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_horario_desv_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_horario_desv;

include(getabspath("include/ipbx_horario_desv_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>