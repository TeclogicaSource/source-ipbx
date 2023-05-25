<?php
$strTableName="ipbx_audit";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_audit";

$gstrOrderBy="ORDER BY `datetime` DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(2, (0 ? "ASC" : "DESC"), "`datetime`");
$gsqlHead="SELECT id,  `datetime`,  ip,  `user`,  `table`,  `action`,  description";
$gsqlFrom="FROM ipbx_audit";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_audit_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_audit;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>