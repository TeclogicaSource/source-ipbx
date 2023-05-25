<?php
$strTableName="Rel. Historico Fila Hora";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_rel_hist_fila_data_hora";

$gstrOrderBy="order by 1 , 2 desc, 3 desc, 4";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "Fila");
$g_orderindexes[] = array(2, (0 ? "ASC" : "DESC"), "date_format(concat(log.dt_periodo, ' ', log.hr_periodo),
            '%Y')");
$g_orderindexes[] = array(3, (0 ? "ASC" : "DESC"), "date_format(concat(log.dt_periodo, ' ', log.hr_periodo),
            '%m')");
$g_orderindexes[] = array(4, (1 ? "ASC" : "DESC"), "hr_periodo");
$gsqlHead="select log.Fila AS Fila,      date_format(concat(log.dt_periodo, ' ', log.hr_periodo),              '%Y') AS Ano,      date_format(concat(log.dt_periodo, ' ', log.hr_periodo),              '%m') AS Mes,      log.hr_periodo AS Hora,      round(avg(floor(log.ag_logados_media - (log.ag_pausados_media + log.ag_atendendo_media)))) AS 'Agent.Disp',      round(max(floor(log.ag_logados_maior))) AS 'Agent.Disp.Maior',      round(max(floor(log.ag_pausados_maior))) AS 'Agent.Pausa.Maior',      round(avg(floor(log.ag_pausados_media))) AS AgentesPausa,      round(sum((select                       count(0)                  from                      cc_receptivo_filas_atend                  where                      ((cc_receptivo_filas_atend.Fila = log.Fila)                          and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                          and (cc_receptivo_filas_atend.hr_entrada >= log.hr_periodo)                          and (cc_receptivo_filas_atend.hr_entrada < sec_to_time((time_to_sec(log.hr_periodo) + 3600)))                          and (cc_receptivo_filas_atend.tp_atendimento is not null or cc_receptivo_filas_atend.tp_atendimento <> sec_to_time(0)))))) AS 'Chamadas Atendidas',      round(sum((select                       count(0)                  from                      cc_receptivo_filas_atend                  where                      ((cc_receptivo_filas_atend.Fila = log.Fila)                          and (cc_receptivo_filas_atend.dt_entrada = log.dt_periodo)                          and (cc_receptivo_filas_atend.hr_entrada >= log.hr_periodo)                          and (cc_receptivo_filas_atend.hr_entrada < sec_to_time((time_to_sec(log.hr_periodo) + 3600)))                          and (cc_receptivo_filas_atend.hr_abandono is not null or cc_receptivo_filas_atend.hr_abandono <> sec_to_time(0)))))) AS 'Chamadas Abandonadas'";
$gsqlFrom="from      log_fila_agente_consolidada log";
$gsqlWhereExpr="";
$gsqlTail="group by log.Fila , log.hr_periodo , 3 , 2";

include(getabspath("include/Rel__Historico_Fila_Hora_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Historico_Fila_Hora;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>