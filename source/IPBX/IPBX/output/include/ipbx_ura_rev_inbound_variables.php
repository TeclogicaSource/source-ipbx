<?php
$strTableName="ipbx_ura_rev_inbound";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_ura_rev_inbound";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_ura_rev_inbount,   Arquivo";
$gsqlFrom="FROM ipbx_ura_rev_inbound";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_ura_rev_inbound_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_ura_rev_inbound;

include(getabspath("include/ipbx_ura_rev_inbound_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>