<?php
$strTableName="conf_sala";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="conf_sala";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_conf,  nm_sala,  dsc_sala,  dt_conferencia,  flg_pass,  flg_rec,  hr_inicio,  hr_fim,  dt_expiracao,  senha,  Status";
$gsqlFrom="FROM conf_sala";
$gsqlWhereExpr="(Status <> 'Sala Expirada')";
$gsqlTail="";

include(getabspath("include/conf_sala_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_conf_sala;

include(getabspath("include/conf_sala_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>