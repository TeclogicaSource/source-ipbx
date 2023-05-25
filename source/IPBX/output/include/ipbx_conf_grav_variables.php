<?php
$strTableName="ipbx_conf_grav";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_conf_grav";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_conf,   tp_reter_grav,   pasta";
$gsqlFrom="FROM ipbx_conf_grav";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_conf_grav_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_conf_grav;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>