<?php
$strTableName="Contatos";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="agenda";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT Nome,  Numero,  Concat('<button type=\"button\" onclick=\"dial(\\'', Numero, '\\')\"> Discagem </button>') AS Discar,  idt_custo,  idt_agenda";
$gsqlFrom="FROM agenda";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Contatos_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Contatos;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>