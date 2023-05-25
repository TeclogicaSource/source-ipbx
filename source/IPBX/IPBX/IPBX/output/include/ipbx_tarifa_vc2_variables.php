<?php
$strTableName="ipbx_tarifa_vc2";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_tarifa_vc2";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id,   prefixo";
$gsqlFrom="FROM ipbx_tarifa_vc2";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_tarifa_vc2_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_tarifa_vc2;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>