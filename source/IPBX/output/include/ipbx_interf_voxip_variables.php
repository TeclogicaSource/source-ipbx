<?php
$strTableName="ipbx_interf_voxip";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_interf_voxip";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_interf,   dsc_interf,   id_contrato,   usuario,   senha,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   id_chamada,   flg_id_cham_parc,   cd_operadora,   qtd_cham_por_ramal";
$gsqlFrom="FROM ipbx_interf_voxip";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_interf_voxip_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_interf_voxip;

include(getabspath("include/ipbx_interf_voxip_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>