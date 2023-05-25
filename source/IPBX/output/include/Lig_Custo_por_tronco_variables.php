<?php
$strTableName="Rel. Lig Custo por tronco";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cdr";

$gstrOrderBy="ORDER BY ii.dsc_interf, c.origem";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(4, (1 ? "ASC" : "DESC"), "ii.dsc_interf");
$g_orderindexes[] = array(6, (1 ? "ASC" : "DESC"), "c.origem");
$gsqlHead="select substr(c.origem, -4) AS Origem,  c.mes_referencia AS Mes,  c.ano_referencia AS Ano,  ii.dsc_interf AS `Interface`,  SUM(c.custo) AS Custo,  c.origem AS `c.origem`";
$gsqlFrom="FROM conta AS c  , ipbx_interf AS ii";
$gsqlWhereExpr="c.id_interf =ii.id_interf";
$gsqlTail="GROUP BY ii.dsc_interf, c.origem";

include(getabspath("include/Lig_Custo_por_tronco_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Lig_Custo_por_tronco;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>