<?php
$strTableName="Rel. Perf. Tempo Espera";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_graf_perf_temp_atendimento";

$gstrOrderBy="ORDER BY Fila, Espera";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "Fila");
$g_orderindexes[] = array(4, (1 ? "ASC" : "DESC"), "Espera");
$gsqlHead="SELECT Fila,  Mes AS Mes,  Ano AS Ano,  Espera AS `Tempo em faixas`,  qtd_atend AS Quantidade,  round((qtd_atend/(f_atendidos_fila(Fila,Mes,Ano))*100), 2) AS Percentual";
$gsqlFrom="FROM v_graf_perf_temp_espera_dia";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Rel__Perf__Tempo_Espera_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Perf__Tempo_Espera;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>