<?php
$strTableName="Graf. Tempo Espera Filas Atendimento";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_filas_atend";

$gstrOrderBy="ORDER BY dt_entrada";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(3, (1 ? "ASC" : "DESC"), "dt_entrada");
$gsqlHead="SELECT AVG(Time_to_sec(tp_espera)) AS Media,  MAX(Time_to_sec(tp_espera)) AS Maximo,  dt_entrada AS `Data`,  Fila AS Fila";
$gsqlFrom="FROM cc_receptivo_filas_atend";
$gsqlWhereExpr="(dt_entrada > Subdate(CURRENT_DATE, 7))";
$gsqlTail="GROUP BY dt_entrada, Fila";

include(getabspath("include/Graf__Tempo_Espera_Filas_Atendimento_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Graf__Tempo_Espera_Filas_Atendimento;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>