<?php
$strTableName="Graf. Historico fila hora";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_rel_hist_fila_data_hora";

$gstrOrderBy="order by `Data`";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(3, (1 ? "ASC" : "DESC"), "`Data`");
$gsqlHead="SELECT Fila,  Periodo,  `Data`,  DATE_FORMAT(Hora, \"%H\") AS Hora,  `Agent.Disp`,  AgentesPausa,  `Chamadas Atendidas`,  `Chamadas Abandonadas`";
$gsqlFrom="FROM v_rel_hist_fila_data_hora";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Graf__Historico_fila_hora_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Graf__Historico_fila_hora;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>