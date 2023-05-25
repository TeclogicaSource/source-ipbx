<?php
$strTableName="ipbx_interf_sip_generica";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_interf_sip_generica";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_interf,   dsc_interf,   id_contrato,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   id_chamada,   flg_id_cham_parc,   cd_operadora,   flg_logon_remoto,   registro,   pers_params";
$gsqlFrom="FROM ipbx_interf_sip_generica";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_interf_sip_generica_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_interf_sip_generica;

include(getabspath("include/ipbx_interf_sip_generica_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>