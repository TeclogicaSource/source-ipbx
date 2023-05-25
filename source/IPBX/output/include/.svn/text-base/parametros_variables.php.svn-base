<?php
$strTableName="parametros";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="parametros";

$gstrOrderBy="ORDER BY id_param";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "id_param");
$gsqlHead="SELECT id_param,  nome,  valor";
$gsqlFrom="FROM parametros";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/parametros_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_parametros;

include(getabspath("include/parametros_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>