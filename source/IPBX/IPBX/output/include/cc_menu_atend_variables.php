<?php
$strTableName="cc_menu_atend";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_menu_atend";

$gstrOrderBy="ORDER BY dsc_menu";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "dsc_menu");
$gsqlHead="SELECT id_menu,  dsc_menu,  ramal_acesso,  arq_audio,  flg_dig_ramal,  nm_tentativas,  destino";
$gsqlFrom="FROM cc_menu_atend";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/cc_menu_atend_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_cc_menu_atend;

include(getabspath("include/cc_menu_atend_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>