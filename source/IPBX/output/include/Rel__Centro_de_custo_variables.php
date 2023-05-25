<?php
$strTableName="Rel. Centro de custo";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="centrocusto";

$gstrOrderBy="order by concat(mes_referencia,\"-\", ano_referencia), centrocusto.dsc_centro_cust";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "concat(mes_referencia, \"-\", ano_referencia)");
$g_orderindexes[] = array(5, (1 ? "ASC" : "DESC"), "centrocusto.dsc_centro_cust");
$gsqlHead="SELECT round(sum(conta.duracao/60)) AS Minutos,  concat(mes_referencia,\"-\", ano_referencia) AS dt,  mes_referencia AS Mes,  ano_referencia AS Ano,  centrocusto.dsc_centro_cust,  (select sum(custo) from conta ct where concat(ct.mes_referencia,\"-\", ct.ano_referencia) = concat(conta.mes_referencia,\"-\", conta.ano_referencia) ) as \"Total MES\",  round((sum(conta.custo)*100/(select sum(custo) from conta ct where concat(ct.mes_referencia,\"-\", ct.ano_referencia) = concat(conta.mes_referencia,\"-\", conta.ano_referencia))), 2) as \"Percentual\",  round(sum(conta.custo)) AS custo";
$gsqlFrom="FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";
$gsqlWhereExpr="";
$gsqlTail="GROUP BY concat(mes_referencia,\"-\", ano_referencia), centrocusto.dsc_centro_cust";

include(getabspath("include/Rel__Centro_de_custo_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Centro_de_custo;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>