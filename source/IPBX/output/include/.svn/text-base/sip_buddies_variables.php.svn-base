<?php
$strTableName="sip_buddies";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="sip_buddies";

$gstrOrderBy="ORDER BY sip_buddies.name";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "sip_buddies.name");
$gsqlHead="SELECT sip_buddies.id,  sip_buddies.name,  sip_buddies.accountcode,  sip_buddies.mailbox,  sip_buddies.secret,  sip_buddies.allow,  sip_buddies.callerid,  sip_buddies.context,  sip_buddies_horario.id_horario";
$gsqlFrom="FROM sip_buddies  LEFT OUTER JOIN sip_buddies_horario ON sip_buddies.id = sip_buddies_horario.id";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/sip_buddies_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_sip_buddies;

include(getabspath("include/sip_buddies_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>