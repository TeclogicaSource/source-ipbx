<?php
$strTableName="ipbx_grupo_captura";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_grupo_captura";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_captura,   dsc_grupo";
$gsqlFrom="FROM ipbx_grupo_captura";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_grupo_captura_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_grupo_captura;

include(getabspath("include/ipbx_grupo_captura_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>