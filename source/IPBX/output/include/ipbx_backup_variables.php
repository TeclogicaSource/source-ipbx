<?php
$strTableName="ipbx_backup";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_backup";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_bkp,   dt_backup,   dsc_backup,   nom_arq";
$gsqlFrom="FROM ipbx_backup";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_backup_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_backup;

include(getabspath("include/ipbx_backup_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>