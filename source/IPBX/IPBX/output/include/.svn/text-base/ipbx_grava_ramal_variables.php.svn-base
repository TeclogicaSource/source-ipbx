<?php
$strTableName="ipbx_grava_ramal";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_grava_ramal";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT name,   ID";
$gsqlFrom="FROM ipbx_grava_ramal";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_grava_ramal_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_grava_ramal;

include(getabspath("include/ipbx_grava_ramal_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>