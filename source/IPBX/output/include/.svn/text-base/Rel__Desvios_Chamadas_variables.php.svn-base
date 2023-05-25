<?php
$strTableName="Rel. Desvios Chamadas";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cdr";

$gstrOrderBy="ORDER BY calldate";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "calldate");
$gsqlHead="SELECT calldate,  src,  dst,  sec_to_time(billsec) as billsec,  sec_to_time(duration) as duration,  accountcode";
$gsqlFrom="FROM cdr";
$gsqlWhereExpr="(length(src) > 4) AND (length(dst) > 4)";
$gsqlTail="";

include(getabspath("include/Rel__Desvios_Chamadas_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Desvios_Chamadas;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>