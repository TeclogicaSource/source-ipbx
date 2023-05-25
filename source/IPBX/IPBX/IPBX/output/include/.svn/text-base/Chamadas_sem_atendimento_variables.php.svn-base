<?php
$strTableName="Graf. Chamadas sem atendimento";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_n_atend";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT agente AS Agentes,  COUNT(*) AS Perdidas,  dt_entrada AS `Data`,  Fila";
$gsqlFrom="FROM cc_receptivo_n_atend";
$gsqlWhereExpr="";
$gsqlTail="GROUP BY Fila, Agentes";

include(getabspath("include/Chamadas_sem_atendimento_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Chamadas_sem_atendimento;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>