<?php
$strTableName="ipbx_ura_rev_outbound";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_ura_rev_outbound";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_ura_rev_outbound,   arquivo";
$gsqlFrom="FROM ipbx_ura_rev_outbound";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_ura_rev_outbound_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_ura_rev_outbound;

include(getabspath("include/ipbx_ura_rev_outbound_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>