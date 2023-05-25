<?php
$strTableName="Graf. Atendimento";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_filas_atend";

$gstrOrderBy="ORDER BY dt_entrada DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (0 ? "ASC" : "DESC"), "dt_entrada");
$gsqlHead="SELECT dt_entrada,  Fila,  COUNT(hr_atendimento) AS Atendimentos,  COUNT(hr_abandono) AS Abandonos";
$gsqlFrom="FROM cc_receptivo_filas_atend";
$gsqlWhereExpr="";
$gsqlTail="GROUP BY dt_entrada";

include(getabspath("include/Graf__Atendimento_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Graf__Atendimento;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>