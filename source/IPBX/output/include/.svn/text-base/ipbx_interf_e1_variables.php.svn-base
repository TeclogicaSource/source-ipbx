<?php
$strTableName="ipbx_interf_e1";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_interf_e1";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_interf,   dsc_interf,   id_contrato,   id_central,   board,   link,   id_tp_interf,   tp_chamada,   piloto,   id_chamada,   flg_id_cham_parc,   cd_operadora,   flg_logon_remoto";
$gsqlFrom="FROM ipbx_interf_e1";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_interf_e1_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_interf_e1;

include(getabspath("include/ipbx_interf_e1_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>