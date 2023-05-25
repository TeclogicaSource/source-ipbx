<?php
$strTableName="ipbx_rcv_fax";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_rcv_fax";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_rcv_fax,   name,   dt_fax,   nm_telefone,   status,   arq_fax,   paginas";
$gsqlFrom="FROM ipbx_rcv_fax";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_rcv_fax_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_rcv_fax;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>