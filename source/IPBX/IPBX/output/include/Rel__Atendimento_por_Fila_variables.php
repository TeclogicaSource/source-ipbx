<?php
$strTableName="Rel. Atendimento por Fila";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_filas_atend";

$gstrOrderBy="ORDER BY dt_entrada, hr_entrada, Fila";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "dt_entrada");
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "hr_entrada");
$g_orderindexes[] = array(3, (1 ? "ASC" : "DESC"), "Fila");
$gsqlHead="SELECT dt_entrada,  hr_entrada,  Fila,  hr_atendimento,  tp_espera,  tp_atendimento,  Telefone,  TIME(tp_espera + tp_atendimento) AS TMO";
$gsqlFrom="FROM cc_receptivo_filas_atend";
$gsqlWhereExpr="(dt_entrada > '0000-00-00') AND (hr_atendimento <> '')";
$gsqlTail="";

include(getabspath("include/Rel__Atendimento_por_Fila_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Atendimento_por_Fila;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>