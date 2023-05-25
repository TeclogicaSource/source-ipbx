<?php
$strTableName="ipbx_interf_fxo";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_interf_fxo";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_interf,   dsc_interf,   id_central,   board,   id_tp_interf,   tp_chamada,   piloto,   cd_operadora,   id_contrato,   id_chamada";
$gsqlFrom="FROM ipbx_interf_fxo";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_interf_fxo_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_interf_fxo;

include(getabspath("include/ipbx_interf_fxo_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>