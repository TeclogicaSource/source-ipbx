<?php
$strTableName="pabx";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="pabx";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT idt_tronco,   ramal,   Nome,   idt_custo,   context,   id_horario,   tronco";
$gsqlFrom="FROM pabx";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/pabx_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_pabx;

include(getabspath("include/pabx_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>