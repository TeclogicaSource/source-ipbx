<?php
$strTableName="Rel. Simplificado - Centro de custo";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="conta";

$gstrOrderBy="ORDER BY date_format(conta.calldate,'%Y') DESC, date_format(conta.calldate,'%m'), centrocusto.dsc_centro_cust";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(5, (0 ? "ASC" : "DESC"), "date_format(conta.calldate,'%Y') ");
$g_orderindexes[] = array(4, (1 ? "ASC" : "DESC"), "date_format(conta.calldate,'%m')");
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "centrocusto.dsc_centro_cust");
$gsqlHead="SELECT conta.idt_custo,  centrocusto.dsc_centro_cust,  round(sum(conta.custo), 2) AS custo,  date_format(conta.calldate,'%m') AS Mes,  date_format(conta.calldate,'%Y') AS Ano,  ipbx_interf.dsc_interf";
$gsqlFrom="FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo  INNER JOIN ipbx_interf ON conta.id_interf = ipbx_interf.id_interf";
$gsqlWhereExpr="";
$gsqlTail="GROUP BY centrocusto.dsc_centro_cust, dsc_interf, Ano, Mes";

include(getabspath("include/Simplificado_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Simplificado;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>