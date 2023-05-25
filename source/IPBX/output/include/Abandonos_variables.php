<?php
$strTableName="Rel. Abandonos";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_filas_atend";

$gstrOrderBy="ORDER BY dt_entrada, hr_entrada, Fila";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "dt_entrada");
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "hr_entrada");
$g_orderindexes[] = array(3, (1 ? "ASC" : "DESC"), "Fila");
$gsqlHead="SELECT dt_entrada,  hr_entrada,  Fila,  tp_espera,  hr_abandono,  Telefone,  concat(ps_entrada, \"/\", ps_abandono) AS `\"Entrada/Saida\"`";
$gsqlFrom="FROM cc_receptivo_filas_atend";
$gsqlWhereExpr="(hr_abandono <> '')";
$gsqlTail="";

include(getabspath("include/Abandonos_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Abandonos;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>