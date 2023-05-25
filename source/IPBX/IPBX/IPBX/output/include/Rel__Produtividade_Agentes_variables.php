<?php
$strTableName="Rel. Produtividade Agentes";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_rel_prod_agentes";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT fila,   agente,   tot_logado,   qtd_atend,   tot_atend,   med_atend,   tot_pausa,   qtd_nao_atend,   tot_recebida,   cntrb_indiv,   cntrb_tot";
$gsqlFrom="FROM v_rel_prod_agentes";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Rel__Produtividade_Agentes_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Produtividade_Agentes;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>