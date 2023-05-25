<?php
$strTableName="Rel. Historico Fila";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_rel_hist_fila";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT Fila,   `Data`,   Hora,   `Agent.Disp`,   AgentesPausa,   `Chamadas Atendidas`,   `Chamadas Abandonadas`";
$gsqlFrom="FROM v_rel_hist_fila";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Rel__Historico_Fila_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Historico_Fila;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>