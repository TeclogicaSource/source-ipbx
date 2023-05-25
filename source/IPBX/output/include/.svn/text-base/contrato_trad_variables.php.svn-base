<?php
$strTableName="contrato_trad";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="contrato_trad";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_contrato,  num_contrato,  nm_operadora,  Vingencia,  flg_ativo,  `F-F_LOCAL_CAD`,  `F-F_LOCAL_VLR`,  `F-M_LOCAL_VC1_CAD`,  `F-M_LOCAL_VC1_VLR`,  `F-M_VC2_CAD`,  `F-M_VC2_VLR`,  `F-F_LDN_CAD`,  `F-F_LDN_VLR`,  `F-F_LDI_CAD`,  `F-F_LDI_VLR`,  `F-M_LDI_CAD`,  `F-M_LDI_VLR`,  `F-M_VC3_CAD`,  `F-M_VC3_VLR`,  dia_ini,  dia_fim,  posicao_mes";
$gsqlFrom="FROM contrato_trad";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/contrato_trad_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_contrato_trad;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>