<?php
$strTableName="Rel. Historico Fila Hora";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_rel_hist_fila_data_hora";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT Fila,  DATE_FORMAT(`Data`, '%m') AS Mes,  DATE_FORMAT(`Data`, '%Y') AS Ano,  Hora,  round(avg(`Agent.Disp`)) AS `Agent.Disp`,  round(avg(AgentesPausa)) AS AgentesPausa,  round(sum(`Chamadas Atendidas`)) AS `Chamadas Atendidas`,  round(sum(`Chamadas Abandonadas`)) AS `Chamadas Abandonadas`";
$gsqlFrom="FROM v_rel_hist_fila_data_hora";
$gsqlWhereExpr="";
$gsqlTail="GROUP BY Fila, Hora, Mes, Ano";

include(getabspath("include/Rel__Historico_Fila_Hora_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Historico_Fila_Hora;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>