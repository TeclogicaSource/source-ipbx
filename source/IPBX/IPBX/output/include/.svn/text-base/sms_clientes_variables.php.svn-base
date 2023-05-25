<?php
$strTableName="sms_clientes";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="sms_clientes";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_cliente,   Nome";
$gsqlFrom="FROM sms_clientes";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/sms_clientes_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_sms_clientes;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>