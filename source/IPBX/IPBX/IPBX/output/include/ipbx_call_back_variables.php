<?php
$strTableName="ipbx_call_back";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_call_back";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_call_back,   name,   id_cod_gen,   rdb_opcao,   `interface`,   nm_externo";
$gsqlFrom="FROM ipbx_call_back";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_call_back_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_call_back;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>