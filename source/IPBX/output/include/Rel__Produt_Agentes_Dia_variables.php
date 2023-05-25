<?php
$strTableName="Rel. Produt. Agentes Dia";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_rel_prod_agentes_dia";

$gstrOrderBy="ORDER BY Agente, dt_entrada, fila";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(3, (1 ? "ASC" : "DESC"), "Agente");
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "dt_entrada");
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "fila");
$gsqlHead="SELECT dt_entrada,  fila,  Agente,  tot_logado,  qtd_atend,  tot_atend,  med_atend,  tot_pausa_n_produtiva,  tot_pausa_produtiva,  tot_pausa,  tot_parado,  qtd_nao_atend,  tot_recebida,  cntrb_indiv,  cntrb_tot";
$gsqlFrom="FROM v_rel_produt_agente_dia";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Rel__Produt_Agentes_Dia_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Produt_Agentes_Dia;

include(getabspath("include/Rel__Produt_Agentes_Dia_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>