<?php
$strTableName="planos_discagem";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="planos_discagem";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_plano,   DDD,   id_tronco,   id_regiao";
$gsqlFrom="FROM planos_discagem";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/planos_discagem_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_planos_discagem;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>