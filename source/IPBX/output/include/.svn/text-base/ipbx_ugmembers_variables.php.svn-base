<?php
$strTableName="ipbx_ugmembers";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_ugmembers";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT UserName,  GroupID";
$gsqlFrom="FROM ipbx_ugmembers";
$gsqlWhereExpr="(GroupID > 0)";
$gsqlTail="";

include(getabspath("include/ipbx_ugmembers_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_ugmembers;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>