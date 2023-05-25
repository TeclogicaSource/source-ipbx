<?php
$strTableName="sip_buddies_horario";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="sip_buddies_horario";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_ramal_horario,  id,  id_horario,  dsc_horario";
$gsqlFrom="FROM sip_buddies_horario";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/sip_buddies_horario_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_sip_buddies_horario;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>