<?php
$strTableName="Graf. perfil atendimento";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_graf_perf_temp_atendimento";

$gstrOrderBy="ORDER BY Fila, Atendimento";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "Fila");
$g_orderindexes[] = array(4, (1 ? "ASC" : "DESC"), "Atendimento");
$gsqlHead="SELECT Fila,  Mes,  Ano,  Atendimento AS `Tempo em faixas`,  qtd_atend AS Quantidade";
$gsqlFrom="FROM v_graf_perf_temp_atendimento";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Graf__perfil_atendimento_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Graf__perfil_atendimento;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>