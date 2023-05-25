<?php
$strTableName="Rel. Historico Fila Data";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_rel_hist_fila_data";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT Fila,   `Data`,   `Agent.Disp`,   AgentesPausa,   `Chamadas Atendidas`,   `Chamadas Abandonadas`";
$gsqlFrom="FROM v_rel_hist_fila_data";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Rel__Historico_Fila_Data_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Historico_Fila_Data;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>