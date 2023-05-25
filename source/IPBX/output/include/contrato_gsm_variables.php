<?php
$strTableName="contrato_gsm";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="contrato_gsm";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_contrato,  num_contrato,  nm_operadora,  Vingencia,  flg_ativo,  VC1_CAD,  VC1_VLR,  VC2VC3_CAD,  VC2VC3_VLR,  dia_ini,  dia_fim,  posicao_mes";
$gsqlFrom="FROM contrato_gsm";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/contrato_gsm_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_contrato_gsm;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>