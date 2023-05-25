<?php
$strTableName="cc_tipos_pausa_atend";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_tipos_pausa_atend";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT idt_pausa_atend,   dt_acao_pausa,   hr_acao_pausa,   tp_pausa,   Agente,   name,   Fila,   tipo_pausa";
$gsqlFrom="FROM cc_tipos_pausa_atend";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/cc_tipos_pausa_atend_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_cc_tipos_pausa_atend;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>