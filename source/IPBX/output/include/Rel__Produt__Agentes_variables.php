<?php
$strTableName="Rel. Produt. Agentes";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_rel_produt_agente_dia";

$gstrOrderBy="ORDER BY fila, Agente, DATE_FORMAT(dt_entrada,\"%m\"), DATE_FORMAT(dt_entrada,\"%Y\")";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(3, (1 ? "ASC" : "DESC"), "fila");
$g_orderindexes[] = array(4, (1 ? "ASC" : "DESC"), "Agente");
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "DATE_FORMAT(dt_entrada,\"%m\")");
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "DATE_FORMAT(dt_entrada,\"%Y\")");
$gsqlHead="select DATE_FORMAT(dt_entrada,\"%m\") AS Mes,  DATE_FORMAT(dt_entrada,\"%Y\") AS Ano,  fila,  Agente,  sec_to_time(sum(time_to_sec(tot_logado))) AS tot_logado,  SUM(qtd_atend) AS qtd_atend,  sec_to_time(sum(time_to_sec(tot_atend))) AS tot_atend,  sec_to_time(sum(time_to_sec(med_atend))) AS med_atend,  sec_to_time(sum(time_to_sec(tot_pausa_n_produtiva))) AS tot_pausa_n_produtiva,  sec_to_time(sum(time_to_sec(tot_pausa_produtiva))) AS tot_pausa_produtiva,  sec_to_time(sum(time_to_sec(tot_pausa))) AS tot_pausa,  sec_to_time(sum(time_to_sec(tot_parado))) AS tot_parado,  SUM(qtd_nao_atend) AS qtd_nao_atend,  SUM(tot_recebida) AS tot_recebida,  ((sum(qtd_atend)*100)/sum(tot_recebida)) AS cntrb_indiv,  '0' AS cntrb_tot";
$gsqlFrom="FROM v_rel_produt_agente_dia";
$gsqlWhereExpr="";
$gsqlTail="GROUP BY fila, Agente, 1, 2";

include(getabspath("include/Rel__Produt__Agentes_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Produt__Agentes;

include(getabspath("include/Rel__Produt__Agentes_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>