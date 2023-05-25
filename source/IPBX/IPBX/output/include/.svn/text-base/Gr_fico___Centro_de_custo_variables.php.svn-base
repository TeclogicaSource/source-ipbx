<?php
$strTableName="Graf. Centro de custo";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="conta";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT conta.id_conta,  conta.origem,  conta.destino,  round(sum(custo)) AS custo,  round(sum(duracao/60)) AS Minutos,  DATE_FORMAT(calldate,'%m-%Y') AS dt,  DATE_FORMAT(calldate,'%m') AS Mes,  DATE_FORMAT(calldate,'%Y') AS Ano,  conta.uniqueid,  conta.id_interf,  conta.id_contrato,  centrocusto.dsc_centro_cust";
$gsqlFrom="FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";
$gsqlWhereExpr="";
$gsqlTail="GROUP BY DATE_FORMAT(calldate,'%m-%Y'), centrocusto.dsc_centro_cust";

include(getabspath("include/Gr_fico___Centro_de_custo_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Gr_fico___Centro_de_custo;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>