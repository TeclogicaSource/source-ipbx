<?php
$strTableName="sigame";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="sigame";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT Ramal,  Destino";
$gsqlFrom="FROM sigame";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/sigame_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_sigame;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>