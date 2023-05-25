<?php
$strTableName="plano_discagem_regiao";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="plano_discagem_regiao";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_regiao,   regiao,   id_tronco,   tp_destino";
$gsqlFrom="FROM plano_discagem_regiao";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/plano_discagem_regiao_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_plano_discagem_regiao;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>