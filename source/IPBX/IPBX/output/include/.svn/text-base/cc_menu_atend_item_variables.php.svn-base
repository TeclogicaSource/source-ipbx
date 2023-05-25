<?php
$strTableName="cc_menu_atend_item";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_menu_atend_item";

$gstrOrderBy="ORDER BY opc_dig";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(3, (1 ? "ASC" : "DESC"), "opc_dig");
$gsqlHead="SELECT id_item,  id_menu,  opc_dig,  id_cod_gen,  prefixo,  rdb_opcao";
$gsqlFrom="FROM cc_menu_atend_item";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/cc_menu_atend_item_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_cc_menu_atend_item;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>