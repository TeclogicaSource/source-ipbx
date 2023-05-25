<?php
$strTableName="Rel. Lig. Externas Transferidas";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cdr";

$gstrOrderBy="ORDER BY calldate";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "calldate");
$gsqlHead="select calldate AS `Data/Hora Ligacao`,  DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS `Data`,  src,  dst,  SEC_TO_TIME(billsec) AS Tempo,  calldate AS calldate";
$gsqlFrom="FROM cdr";
$gsqlWhereExpr="(channel like 'Local/%') AND (length(src) > 4) AND (lastapp <> 'VoiceMail')";
$gsqlTail="";

include(getabspath("include/Lig__Externas_Transferidas_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Lig__Externas_Transferidas;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>