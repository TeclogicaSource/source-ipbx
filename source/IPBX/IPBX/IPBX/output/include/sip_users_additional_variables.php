<?php
$strTableName="sip_users_additional";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="sip_users_additional";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_additional,   name,   trc_piloto,   mail,   call_forward,   flg_fax,   flg_grava";
$gsqlFrom="FROM sip_users_additional";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/sip_users_additional_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_sip_users_additional;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>