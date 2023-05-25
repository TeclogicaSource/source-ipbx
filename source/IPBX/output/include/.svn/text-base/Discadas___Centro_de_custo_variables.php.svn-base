<?php
$strTableName="Rel. Detalhado - Centro de custo";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="conta";

$gstrOrderBy="ORDER BY conta.calldate DESC, centrocusto.dsc_centro_cust";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(8, (0 ? "ASC" : "DESC"), "conta.calldate");
$g_orderindexes[] = array(6, (1 ? "ASC" : "DESC"), "centrocusto.dsc_centro_cust");
$gsqlHead="SELECT conta.idt_custo,  substr(conta.origem, -4) AS Origem,  conta.destino,  SEC_TO_TIME(conta.duracao) AS duracao,  conta.custo,  centrocusto.dsc_centro_cust,  ipbx_interf.dsc_interf,  conta.calldate";
$gsqlFrom="FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo  INNER JOIN ipbx_interf ON conta.id_interf = ipbx_interf.id_interf";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Discadas___Centro_de_custo_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Discadas___Centro_de_custo;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>