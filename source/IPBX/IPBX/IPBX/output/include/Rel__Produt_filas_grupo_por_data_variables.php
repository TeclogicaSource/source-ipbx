<?php
$strTableName="Rel. Produt filas grupo por data";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_produt_filas_grupo_data";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT dt_entrada,   nm_grupo,   `Receb.`,   `Atend.`,   `Aband.`,   TME,   TMA,   TMO,   `Aband.Contr.`,   `Aband.Real.`,   NivelServicoEsperaContratado,   NivelServicoEsperaRealizado,   NivelServicoEsperaQuantidade,   NivelServicoAtendimentoContratado,   NivelServicoAtendimentoRealizado,   NivelServicoAtendimentoQuantidade,   NivelServicoOperacaoContratado,   NivelServicoOperacaoRealizado,   NivelServicoOperacaoQuantidade";
$gsqlFrom="FROM v_produt_filas_grupo_data";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Rel__Produt_filas_grupo_por_data_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Produt_filas_grupo_por_data;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>