<?php
$strTableName="cc_agentes";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_agentes";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT idt_agentes,   nm_agente,   codigo,   tp_atendimento,   tp_max_atendimento,   acao_atendimento,   idt_agentes_fila,   name,   `interface`,   flg_ativo";
$gsqlFrom="FROM cc_agentes";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/cc_agentes_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_cc_agentes;

include(getabspath("include/cc_agentes_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>