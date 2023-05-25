<?php
$strTableName="Graf Centro de custos";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="conta";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT centrocusto.dsc_centro_cust,  round(sum(conta.custo)/60) AS `\"Valor Custo\"`";
$gsqlFrom="FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";
$gsqlWhereExpr="";
$gsqlTail="GROUP BY 1";

include(getabspath("include/Graf_Centro_de_custos_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Graf_Centro_de_custos;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>