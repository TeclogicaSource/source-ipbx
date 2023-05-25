<?php
$strTableName="Rel. Produt filas grupo";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_produt_filas_grupo";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT DATE_FORMAT(dt_entrada, '%m') AS Mes,  DATE_FORMAT(dt_entrada, '%Y') AS Ano,  nm_grupo,  `Receb.`,  `Atend.`,  `Aband.`,  TME,  TMA,  TMO,  `Aband.Contr.`,  `Aband.Real.`,  NivelServicoEsperaContratado,  NivelServicoEsperaRealizado,  NivelServicoEsperaQuantidade,  NivelServicoAtendimentoContratado,  NivelServicoAtendimentoRealizado,  NivelServicoAtendimentoQuantidade,  NivelServicoOperacaoContratado,  NivelServicoOperacaoRealizado,  NivelServicoOperacaoQuantidade";
$gsqlFrom="FROM v_produt_filas_grupo";
$gsqlWhereExpr="";
$gsqlTail="GROUP BY nm_grupo, Mes, Ano";

include(getabspath("include/Rel_Produt_filas_grupo_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel_Produt_filas_grupo;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>