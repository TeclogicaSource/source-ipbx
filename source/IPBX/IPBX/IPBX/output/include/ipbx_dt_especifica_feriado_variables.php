<?php
$strTableName="ipbx_dt_especifica_feriado";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_dt_especifica_feriado";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_dt_espec,   dsc_data,   dt_especifica";
$gsqlFrom="FROM ipbx_dt_especifica_feriado";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_dt_especifica_feriado_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_dt_especifica_feriado;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>