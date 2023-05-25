<?php
$strTableName="Rel Produtividade da Fila";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_produt_filas";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT dt_entrada,  `Receb.`,  `Atend.`,  `Aband.`,  TME,  TMA,  TMO,  `Aband.Contr.`,  `Aband.Real.`,  NivelServicoEsperaContratado,  NivelServicoEsperaRealizado,  NivelServicoEsperaQuantidade,  NivelServicoAtendimentoContratado,  NivelServicoAtendimentoRealizado,  NivelServicoAtendimentoQuantidade,  NivelServicoOperacaoContratado,  NivelServicoOperacaoRealizado,  NivelServicoOperacaoQuantidade,  Fila";
$gsqlFrom="FROM v_produt_filas";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Rel_Produtividade_da_Fila_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel_Produtividade_da_Fila;

include(getabspath("include/Rel_Produtividade_da_Fila_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>