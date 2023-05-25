<?php
$strTableName="v_contatos";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_contatos";

$gstrOrderBy="ORDER BY Nome";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "Nome");
$gsqlHead="SELECT Nome,  Numero,  Discar,  idt_custo,  idt_agenda";
$gsqlFrom="FROM v_contatos";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/v_contatos_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_v_contatos;

include(getabspath("include/v_contatos_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>