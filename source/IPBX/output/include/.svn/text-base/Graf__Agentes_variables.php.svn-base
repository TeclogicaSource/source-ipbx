<?php
$strTableName="Graf. Agentes";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_graf_agentes";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT DATE_FORMAT(calldate,'%m-%Y') AS `DATA`,  Filas,  round(sum(status)) AS Status,  round(sum(status2)) AS Status2";
$gsqlFrom="FROM cc_receptivo_graf_agentes";
$gsqlWhereExpr="";
$gsqlTail="GROUP BY DATE_FORMAT(calldate,'%m-%Y'), Filas";

include(getabspath("include/Graf__Agentes_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Graf__Agentes;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>