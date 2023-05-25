<?php
$strTableName="blacklist";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="blacklist";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_bl_list,   dsc_bl_list,   num_bl_list";
$gsqlFrom="FROM blacklist";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/blacklist_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_blacklist;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>