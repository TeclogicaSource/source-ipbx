<?php
$strTableName="Rel. Ligações não atendidas";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_n_atend";

$gstrOrderBy="ORDER BY dt_entrada, hr_entrada, Fila, agente";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "dt_entrada");
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "hr_entrada");
$g_orderindexes[] = array(3, (1 ? "ASC" : "DESC"), "Fila");
$g_orderindexes[] = array(4, (1 ? "ASC" : "DESC"), "agente");
$gsqlHead="SELECT dt_entrada,  hr_entrada,  Fila,  agente";
$gsqlFrom="FROM cc_receptivo_n_atend";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Liga__es_n_o_atendidas_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Liga__es_n_o_atendidas;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>