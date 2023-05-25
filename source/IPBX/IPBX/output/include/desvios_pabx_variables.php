<?php
$strTableName="desvios_pabx";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="desvios_pabx";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_desvio,   ramal,   destino,   seg,   ter,   qua,   qui,   sex,   sab,   dom,   hr_inicio,   hr_fim";
$gsqlFrom="FROM desvios_pabx";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/desvios_pabx_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_desvios_pabx;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>