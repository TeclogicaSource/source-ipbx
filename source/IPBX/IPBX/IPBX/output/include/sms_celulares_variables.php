<?php
$strTableName="sms_celulares";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="sms_celulares";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_celular,   dsc_nome,   telefone,   id_grupo";
$gsqlFrom="FROM sms_celulares";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/sms_celulares_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_sms_celulares;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>