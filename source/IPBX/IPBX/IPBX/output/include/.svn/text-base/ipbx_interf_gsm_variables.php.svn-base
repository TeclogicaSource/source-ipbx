<?php
$strTableName="ipbx_interf_gsm";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_interf_gsm";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_interf,   dsc_interf,   id_contrato,   id_central,   board,   id_tp_interf,   tp_chamada,   id_chamada,   piloto,   cd_operadora";
$gsqlFrom="FROM ipbx_interf_gsm";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_interf_gsm_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_interf_gsm;

include(getabspath("include/ipbx_interf_gsm_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>