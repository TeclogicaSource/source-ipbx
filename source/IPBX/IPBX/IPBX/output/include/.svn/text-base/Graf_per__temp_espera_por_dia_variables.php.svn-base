<?php
$strTableName="Graf. Perfil Tempo de espera por dia";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_graf_perf_temp_espera_dia";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT Fila,  Mes,  Ano,  Espera AS `Tempo em faixas`,  qtd_atend AS Quantidade";
$gsqlFrom="FROM v_graf_perf_temp_espera_dia";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Graf_per__temp_espera_por_dia_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Graf_per__temp_espera_por_dia;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>