<?php
$strTableName="Rel. Consolidado Fila";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="log_fila_agente_consolidada";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT Fila,   dt_periodo,   hr_periodo,   ag_logados_menor,   ag_logados_maior,   ag_logados_media,   ag_pausados_menor,   ag_pausados_maior,   ag_pausados_media,   ag_atendendo_menor,   ag_atendendo_maior,   ag_atendendo_media,   ag_discando_menor,   ag_discando_maior,   ag_discando_media,   soma_atendimento,   soma_espera,   qtd_atendimento,   qtd_abandono,   qtd_sla_espera,   qtd_sla_atendimento,   qtd_sla_operacao";
$gsqlFrom="FROM log_fila_agente_consolidada";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Rel__Consolidado_Fila_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Consolidado_Fila;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>