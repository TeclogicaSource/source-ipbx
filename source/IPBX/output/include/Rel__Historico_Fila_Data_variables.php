<?php
$strTableName="Rel. Historico Fila Data";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_rel_hist_fila_data";

$gstrOrderBy="order by 1 , 2 , 3";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "Fila");
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "dt_periodo");
$g_orderindexes[] = array(3, (1 ? "ASC" : "DESC"), "floor(avg((log.ag_logados_media - (log.ag_pausados_media + log.ag_atendendo_media))))");
$gsqlHead="select log.Fila AS Fila,      log.dt_periodo AS Data,      floor(avg((log.ag_logados_media - (log.ag_pausados_media + log.ag_atendendo_media)))) AS \"Agent.Disp\",  	floor(max(log.ag_logados_maior)) AS \"Agent.Disp.Maior\",  	floor(max(log.ag_pausados_maior)) AS \"Agent.Pausa.Maior\",      floor(avg(log.ag_pausados_media)) AS AgentesPausa,      (select               count(0) AS \"count(*)\"          from              cc_receptivo_filas_atend          where              ((cc_receptivo_filas_atend.Fila = log.Fila)                  and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                  and (cc_receptivo_filas_atend.tp_atendimento is not null or cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0)))) AS \"Chamadas Atendidas\",      (select               count(0) AS \"count(*)\"          from              cc_receptivo_filas_atend          where              ((cc_receptivo_filas_atend.Fila = log.Fila)                  and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                  and (cc_receptivo_filas_atend.hr_abandono is not null or cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0)))) AS \"Chamadas Abandonadas\"";
$gsqlFrom="from      log_fila_agente_consolidada log";
$gsqlWhereExpr="";
$gsqlTail="group by log.Fila , log.dt_periodo";

include(getabspath("include/Rel__Historico_Fila_Data_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Historico_Fila_Data;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>