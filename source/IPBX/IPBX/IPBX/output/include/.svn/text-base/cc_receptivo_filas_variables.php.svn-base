<?php
$strTableName="cc_receptivo_filas";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_filas";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_filas,  nm_fila,  estrategia,  gravacao,  arq_audio,  arq_mesg,  tp_toques,  id_desvio,  tp_excedido,  acao_falta_agente,  acao_tp_excedido,  acao_fr_horario,  seg_tmo,  perc_tmo,  seg_tma,  perc_tma,  seg_tme,  perc_tme,  tx_abandono,  flg_estim_do_dia,  tp_estimativa,  id_name_gestor,  maxlen,  wrapuptime,  nm_grupo,  id_logout";
$gsqlFrom="FROM cc_receptivo_filas";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/cc_receptivo_filas_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_cc_receptivo_filas;

include(getabspath("include/cc_receptivo_filas_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>