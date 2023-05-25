<?php
$strTableName="conf_sala_convidado";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="conf_sala_convidado";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_convidado,   id_conf,   nm_convidado,   `e-mail`,   nm_convidado_interno";
$gsqlFrom="FROM conf_sala_convidado";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/conf_sala_convidado_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_conf_sala_convidado;

include(getabspath("include/conf_sala_convidado_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>