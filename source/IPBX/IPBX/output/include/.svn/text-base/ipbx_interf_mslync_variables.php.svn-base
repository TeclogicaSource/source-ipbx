<?php
$strTableName="ipbx_interf_mslync";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_interf_mslync";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_interf,   dsc_interf,   ip_host,   id_central,   codec,   id_tp_interf,   tp_chamada,   piloto,   id_chamada,   flg_id_cham_parc,   flg_logon_remoto";
$gsqlFrom="FROM ipbx_interf_mslync";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_interf_mslync_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_interf_mslync;

include(getabspath("include/ipbx_interf_mslync_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>