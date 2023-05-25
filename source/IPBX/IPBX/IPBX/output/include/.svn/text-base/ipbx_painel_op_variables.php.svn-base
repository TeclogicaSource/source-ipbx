<?php
$strTableName="ipbx_painel_op";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_painel_op";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_painel_op,   dsc_painel,   privilegios,   usuarios,   fila";
$gsqlFrom="FROM ipbx_painel_op";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_painel_op_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_painel_op;

include(getabspath("include/ipbx_painel_op_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>