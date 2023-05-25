<?php
$strTableName="Restore";
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

include(getabspath("include/Restore_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Restore;

include(getabspath("include/Restore_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>