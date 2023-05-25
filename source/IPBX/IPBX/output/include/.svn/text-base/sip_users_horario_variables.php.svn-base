<?php
$strTableName="sip_users_horario";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="sip_users_horario";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT sip_users_horario.id,  sip_users_horario.id_horario,  sip_users_horario.dsc_plano,  horario.hr_inicio,  horario.hr_fim,  horario.seg";
$gsqlFrom="FROM sip_users_horario  INNER JOIN horario ON sip_users_horario.id_horario = horario.id_horario";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/sip_users_horario_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_sip_users_horario;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>