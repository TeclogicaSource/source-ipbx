<?php
$strTableName="Rel. Simplificado - Centro Custo";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="conta";

$gstrOrderBy="ORDER BY 4, centrocusto.dsc_centro_cust";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(4, (1 ? "ASC" : "DESC"), "conta.calldate");
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "centrocusto.dsc_centro_cust");
$gsqlHead="SELECT conta.idt_custo,  centrocusto.dsc_centro_cust,  round(sum(conta.custo), 2) AS custo,  conta.calldate as DataHora,  ipbx_interf.dsc_interf";
$gsqlFrom="FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo  INNER JOIN ipbx_interf ON conta.id_interf = ipbx_interf.id_interf";
$gsqlWhereExpr="";
$gsqlTail="GROUP BY centrocusto.dsc_centro_cust, dsc_interf, 4";

include(getabspath("include/Rel__Simplificado___Centro_Custo_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Simplificado___Centro_Custo;

include(getabspath("include/Rel__Simplificado___Centro_Custo_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>