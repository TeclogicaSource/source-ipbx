<?php
$strTableName="centrocusto";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="centrocusto";

$gstrOrderBy="ORDER BY flg_ativado DESC, dsc_centro_cust";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(4, (0 ? "ASC" : "DESC"), "flg_ativado");
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "dsc_centro_cust");
$gsqlHead="SELECT dsc_centro_cust,  idt_colab,  idt_custo,  flg_ativado";
$gsqlFrom="FROM centrocusto";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/centrocusto_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_centrocusto;

include(getabspath("include/centrocusto_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>