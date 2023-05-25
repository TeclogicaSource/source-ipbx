<?php
$strTableName="cc_tipos_pausa";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_tipos_pausa";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT idt_pausa,   dsc_pausa,   flg_ativo,   abreviado,   flg_produtiva";
$gsqlFrom="FROM cc_tipos_pausa";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/cc_tipos_pausa_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_cc_tipos_pausa;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>