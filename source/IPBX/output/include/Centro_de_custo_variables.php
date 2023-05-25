<?php
$strTableName="Rel. Bilhetagem";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="conta";

$gstrOrderBy="ORDER BY conta.calldate";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(3, (1 ? "ASC" : "DESC"), "conta.calldate");
$gsqlHead="select DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS `Data`,  DATE_FORMAT(calldate ,'%T') AS Hora,  conta.calldate AS `conta.calldate`,  substr(conta.origem, -4) AS origem,  case conta.destino   when 'i' then 'SEM PRIVILÉGIO'   else conta.destino end AS destino,  centrocusto.dsc_centro_cust AS `Centro de custos`,  SEC_TO_TIME(conta.duracao) AS Duracao,  conta.custo,  conta.mes_referencia,  conta.ano_referencia";
$gsqlFrom="FROM conta  INNER JOIN centrocusto ON conta.idt_custo = centrocusto.idt_custo";
$gsqlWhereExpr="(conta.origem <> \"\") AND (conta.idt_custo is not NULL)";
$gsqlTail="";

include(getabspath("include/Centro_de_custo_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Centro_de_custo;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>