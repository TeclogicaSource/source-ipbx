<?php
$strTableName="ramal_pabx_autorizado";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ramal_pabx_autorizado";

$gstrOrderBy="ORDER BY ramal";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "ramal");
$gsqlHead="SELECT id_ramal_pabx,  ramal,  flg_disp";
$gsqlFrom="FROM ramal_pabx_autorizado";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ramal_pabx_autorizado_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ramal_pabx_autorizado;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>