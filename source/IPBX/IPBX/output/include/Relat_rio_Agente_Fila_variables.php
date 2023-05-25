<?php
$strTableName="Rel. Agente x Fila";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_agente_fila";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT dt_entrada AS `Data de Entrada`,  hr_entrada AS `Hora de Entrada`,  Telefone AS Telefone,  hr_atendimento AS `Horário de Atendimento`,  evento AS Evento,  Fila AS Fila,  Agente AS Agente,  tp_espera AS `Tempo de Espera`,  tp_atendimento AS `Tempo de Atendimento`,  hr_abandono AS `Hora de Abandono`,  tel_trans AS `Telefone Transferido`,  chave AS `Chave Única`";
$gsqlFrom="FROM v_agente_fila";
$gsqlWhereExpr="(dt_entrada  != '0000-00-00') AND (Agente is not NULL)";
$gsqlTail="";

include(getabspath("include/Relat_rio_Agente_Fila_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Relat_rio_Agente_Fila;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>