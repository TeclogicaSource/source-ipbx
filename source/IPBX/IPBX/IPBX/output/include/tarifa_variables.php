<?php
$strTableName="tarifa";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="tarifa";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT hr_inicio,  hr_fim,  vlr_unid,  cad_inicial,  cad_frac,  seg,  ter,  qua,  qui,  sex,  sab,  dom,  IDT_TARIFA,  dsc_tarifa";
$gsqlFrom="FROM tarifa";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/tarifa_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_tarifa;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>