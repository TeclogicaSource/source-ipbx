<?php
$strTableName="ipbx_canais";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_canais";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_canal,   canal,   id_interf,   dsc_interf,   rdz_interf,   flg_disp";
$gsqlFrom="FROM ipbx_canais";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_canais_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_canais;

include(getabspath("include/ipbx_canais_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>