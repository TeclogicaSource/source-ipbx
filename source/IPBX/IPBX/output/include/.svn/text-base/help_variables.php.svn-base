<?php
$strTableName="help";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="help";

$gstrOrderBy="order by atalho";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "atalho");
$gsqlHead="SELECT funcao,  atalho,  dsc_help,  idt_help";
$gsqlFrom="FROM help";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/help_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_help;

include(getabspath("include/help_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>