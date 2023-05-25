<?php
$strTableName="ipbx_send_fax";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_send_fax";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_send_fax,   nm_telefone,   arq_fax";
$gsqlFrom="FROM ipbx_send_fax";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_send_fax_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_send_fax;

include(getabspath("include/ipbx_send_fax_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>