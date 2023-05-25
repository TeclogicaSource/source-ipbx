<?php
$strTableName="Rel. Produt. Agentes";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_filas_atend";

$gstrOrderBy="ORDER BY fila, agente, Mes, Ano";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(3, (1 ? "ASC" : "DESC"), "fila");
$g_orderindexes[] = array(4, (1 ? "ASC" : "DESC"), "agente");
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "Mes");
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "Ano");
$gsqlHead="select Mes,  Ano,  fila,  agente,  tot_logado,  qtd_atend,  tot_atend,  med_atend,  tot_pausa,  tot_parado,  qtd_nao_atend,  tot_recebida,  cntrb_indiv,  cntrb_tot";
$gsqlFrom="FROM v_rel_prod_agentes";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Rel__Produt__Agentes_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Produt__Agentes;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>