<?php
$strTableName="ipbx_gravacoes";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_gravacoes";

$gstrOrderBy="ORDER BY ipbx_gravacoes.dt_gravacao DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(3, (0 ? "ASC" : "DESC"), "ipbx_gravacoes.dt_gravacao");
$gsqlHead="SELECT ipbx_gravacoes.id_grav,  ipbx_gravacoes.tp_gravacao,  ipbx_gravacoes.dt_gravacao,  ipbx_gravacoes.nm_arq,  ipbx_gravacoes.num_destino,  ipbx_gravacoes.num_final,  case   when cdr.billsec > 2 then (SEC_TO_TIME(cdr.billsec))  else 'CHAMADA SEM AUDIO' end AS Tempo";
$gsqlFrom="FROM ipbx_gravacoes  , cdr";
$gsqlWhereExpr="(ipbx_gravacoes.uniqueid = cdr.uniqueid)";
$gsqlTail="";

include(getabspath("include/ipbx_gravacoes_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_gravacoes;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>