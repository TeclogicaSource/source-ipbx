<?php
$strTableName="ipbx_interf_callman";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_interf_callman";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_interf,   dsc_interf,   ip_host,   id_central,   codec,   dtmf,   id_tp_interf,   tp_chamada,   piloto,   flg_logon_remoto";
$gsqlFrom="FROM ipbx_interf_callman";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_interf_callman_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_interf_callman;

include(getabspath("include/ipbx_interf_callman_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>