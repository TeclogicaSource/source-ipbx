<?php
$strTableName="central";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="central";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_central,   dsc_conf_central,   flg_ativa,   pers_params";
$gsqlFrom="FROM central";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/central_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_central;

include(getabspath("include/central_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>