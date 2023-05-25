<?php
$strTableName="Telefones Discados";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="agenda";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT idt_agenda,  Nome,  Numero,  idt_custo";
$gsqlFrom="FROM agenda";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Telefone_discado_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Telefone_discado;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>