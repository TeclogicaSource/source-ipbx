<?php
$strTableName="ipbx_conf_fax";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_conf_fax";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_conf_fax,   tp_reter_fax,   pasta";
$gsqlFrom="FROM ipbx_conf_fax";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_conf_fax_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_conf_fax;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>