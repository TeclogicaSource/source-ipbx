<?php
$strTableName="Rel. Produt. Agentes Dia";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_rel_prod_agentes_dia";

$gstrOrderBy="ORDER BY fila, agente, dt_entrada";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "fila");
$g_orderindexes[] = array(3, (1 ? "ASC" : "DESC"), "agente");
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "dt_entrada");
$gsqlHead="SELECT dt_entrada,  fila,  agente,  tot_logado,  qtd_atend,  tot_atend,  med_atend,  tot_pausa,  tot_parado,  qtd_nao_atend,  tot_recebida,  cntrb_indiv,  cntrb_tot";
$gsqlFrom="FROM v_rel_prod_agentes_dia";
$gsqlWhereExpr="(agente is not null)";
$gsqlTail="";

include(getabspath("include/Rel__Produt_Agentes_Dia_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Produt_Agentes_Dia;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>