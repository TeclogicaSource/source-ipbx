<?php
$strTableName="codecs";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="codecs";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT idt_codec,   codec,   dsc_codec";
$gsqlFrom="FROM codecs";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/codecs_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_codecs;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>