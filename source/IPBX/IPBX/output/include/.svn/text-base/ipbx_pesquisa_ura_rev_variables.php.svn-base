<?php
$strTableName="ipbx_pesquisa_ura_rev";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_pesquisa_ura_rev";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_pesquisa,   dsc_pesquisa,   arq_audio";
$gsqlFrom="FROM ipbx_pesquisa_ura_rev";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_pesquisa_ura_rev_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_pesquisa_ura_rev;

include(getabspath("include/ipbx_pesquisa_ura_rev_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>