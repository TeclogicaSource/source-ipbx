<?php
$strTableName="Aplicar";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_backup";

$gstrOrderBy="ORDER BY dt_backup DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(2, (0 ? "ASC" : "DESC"), "dt_backup");
$gsqlHead="SELECT id_bkp,  dt_backup,  dsc_backup";
$gsqlFrom="FROM ipbx_backup";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Aplicar_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Aplicar;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>