<?php
$strTableName="ipbx_tx_fax";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_tx_fax";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_tx_fax,   nm_telefone,   dt_fax,   status,   arq_fax";
$gsqlFrom="FROM ipbx_tx_fax";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_tx_fax_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_tx_fax;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>