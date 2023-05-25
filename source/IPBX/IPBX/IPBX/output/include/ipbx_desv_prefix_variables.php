<?php
$strTableName="ipbx_desv_prefix";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_desv_prefix";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_desv_prefix,   dsc_grp_pref";
$gsqlFrom="FROM ipbx_desv_prefix";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_desv_prefix_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_desv_prefix;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>