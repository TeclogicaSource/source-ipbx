<?php
$strTableName="diag_ipbx";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="timeout";

$gstrOrderBy="ORDER BY dt_timeout DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (0 ? "ASC" : "DESC"), "dt_timeout");
$gsqlHead="SELECT dt_timeout,  ip_address,  timeout";
$gsqlFrom="FROM timeout";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/diag_ipbx_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_diag_ipbx;

include(getabspath("include/diag_ipbx_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>