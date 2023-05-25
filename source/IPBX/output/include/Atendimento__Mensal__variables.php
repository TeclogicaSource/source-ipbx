<?php
$strTableName="Graf. Atendimento (Mensal)";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_filas_atend";

$gstrOrderBy="ORDER BY DATE_FORMAT(dt_entrada,'%m-%Y') DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (0 ? "ASC" : "DESC"), "DATE_FORMAT(dt_entrada,'%m-%Y') ");
$gsqlHead="SELECT DATE_FORMAT(dt_entrada,'%m-%Y') AS `Data`,  Fila,  DATE_FORMAT(dt_entrada,'%m') AS Mes,  DATE_FORMAT(dt_entrada,'%Y') AS Ano,  COUNT(hr_atendimento) AS Atendimentos,  COUNT(hr_abandono) AS Abandonos";
$gsqlFrom="FROM cc_receptivo_filas_atend";
$gsqlWhereExpr="";
$gsqlTail="GROUP BY Data";

include(getabspath("include/Atendimento__Mensal__settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Atendimento__Mensal_;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>