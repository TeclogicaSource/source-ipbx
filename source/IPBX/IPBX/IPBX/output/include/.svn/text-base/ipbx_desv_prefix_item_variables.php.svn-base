<?php
$strTableName="ipbx_desv_prefix_item";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_desv_prefix_item";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_desv_pref_item,   id_desv_prefix,   prefixo";
$gsqlFrom="FROM ipbx_desv_prefix_item";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_desv_prefix_item_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_desv_prefix_item;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>