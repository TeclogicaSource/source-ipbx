<?php
$strTableName="ipbx_provisionamento";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_provisionamento";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_provis,   dsc_aparelho,   nome_arq,   ipservidor,   ipntp,   txt_provis";
$gsqlFrom="FROM ipbx_provisionamento";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_provisionamento_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_provisionamento;

include(getabspath("include/ipbx_provisionamento_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>