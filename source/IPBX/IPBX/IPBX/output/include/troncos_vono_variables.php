<?php
$strTableName="troncos_vono";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="troncos_vono";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_tronco,  dsc_tronco,  channel,  id_interf,  usuario,  senha,  ip_interf,  mcdu_inicio,  mcdu_fim,  tp_toques,  dig_rota,  id_contrato,  flg_grava_ent,  flg_grava_sai,  flg_pabx_remoto,  flg_cel_local,  flg_local,  flg_fixo_ddd,  flg_cel_ddd,  flg_ddi,  dig_operadora,  prioridade";
$gsqlFrom="FROM troncos_vono";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/troncos_vono_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_troncos_vono;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>