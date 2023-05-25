<?php
$strTableName="Rel. Centro de custo";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="centrocusto";

$gstrOrderBy="order by DATE_FORMAT(conta.calldate,'%m-%Y'), centrocusto.dsc_centro_cust";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "DATE_FORMAT(conta.calldate,'%m-%Y')");
$g_orderindexes[] = array(6, (1 ? "ASC" : "DESC"), "centrocusto.dsc_centro_cust");
$gsqlHead="SELECT round(sum(conta.duracao/60)) AS Minutos,  DATE_FORMAT(conta.calldate,'%m-%Y') AS dt,  DATE_FORMAT(conta.calldate,'%m') AS Mes,  DATE_FORMAT(conta.calldate,'%Y') AS Ano,  conta.calldate as periodo,  centrocusto.dsc_centro_cust,  (select sum(custo) from conta ct where DATE_FORMAT(ct.calldate,'%m-%Y') = DATE_FORMAT(conta.calldate,'%m-%Y') ) as \"Total MES\",  round((sum(conta.custo)*100/(select sum(custo) from conta ct where DATE_FORMAT(ct.calldate,'%m-%Y') = DATE_FORMAT(conta.calldate,'%m-%Y'))), 2) as \"Percentual\",  round(sum(conta.custo)) AS custo";
$gsqlFrom="FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";
$gsqlWhereExpr="";
$gsqlTail="GROUP BY DATE_FORMAT(calldate,'%m-%Y'), centrocusto.dsc_centro_cust";

include(getabspath("include/Rel__Centro_de_custo_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Centro_de_custo;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>