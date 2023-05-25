<?php
$strTableName="ipbx_plano_disc";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_plano_disc";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_plano,  padrao,  contexto,  rota,  id_interf_1,  add_rota_1,  id_interf_2,  add_rota_2";
$gsqlFrom="FROM ipbx_plano_disc";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_plano_disc_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_plano_disc;

include(getabspath("include/ipbx_plano_disc_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>