<?php
$strTableName="ipbx_interf_iax";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_interf_iax";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_interf,   dsc_interf,   id_contrato,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf";
$gsqlFrom="FROM ipbx_interf_iax";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_interf_iax_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_interf_iax;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>