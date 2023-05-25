<?php
$strTableName="cadencias";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cadencias";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_cadencia,   cad_ini,   cad_frac,   dsc_cadencia";
$gsqlFrom="FROM cadencias";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/cadencias_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_cadencias;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>