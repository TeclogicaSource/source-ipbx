<?php
$strTableName="Graf. Perfil Tempo de espera";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_graf_perf_temp_espera";

$gstrOrderBy="ORDER BY tp_espera";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(5, (1 ? "ASC" : "DESC"), "tp_espera");
$gsqlHead="SELECT Fila AS Fila,  `Mes/Ano` AS Periodo,  time_to_sec(tp_espera) AS `Tempo de Espera`,  qtd_atend AS Atendidas,  tp_espera AS tp_espera";
$gsqlFrom="FROM v_graf_perf_temp_espera";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Graf__Perfil_Tempo_de_espera_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Graf__Perfil_Tempo_de_espera;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>