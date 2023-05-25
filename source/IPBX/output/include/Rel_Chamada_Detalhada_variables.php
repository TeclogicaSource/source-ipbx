<?php
$strTableName="Rel. Cham Detalhada";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_rel_detalhado_agentes";

$gstrOrderBy="ORDER BY dt_entrada, hr_entrada";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(6, (1 ? "ASC" : "DESC"), "dt_entrada");
$g_orderindexes[] = array(7, (1 ? "ASC" : "DESC"), "hr_entrada");
$gsqlHead="SELECT Fila,  Telefone,  `Entrada/Saida`,  Terminado,  Agente,  dt_entrada,  hr_entrada,  tp_espera,  tp_atendimento,  tptotal,  `Obs.`";
$gsqlFrom="FROM v_rel_detalhado_chamadas";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Rel_Chamada_Detalhada_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel_Chamada_Detalhada;

include(getabspath("include/Rel_Chamada_Detalhada_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>