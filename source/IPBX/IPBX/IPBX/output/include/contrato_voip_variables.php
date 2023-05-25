<?php
$strTableName="contrato_voip";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="contrato_voip";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_contrato,  num_contrato,  nm_operadora,  Vingencia,  flg_ativo,  `F-F_VONO_CAD`,  `F-F_VONO_VLR`,  `F-F_NVONO_CAD`,  `F-F_NVONO_VLR`,  `F-M_VC1_CAD`,  `F-M_VC1_VLR`,  `F-M_VC2VC3_CAD`,  `F-M_VC2VC3_VLR`,  LDI_FIXO_CAD,  LDI_FIXO_VLR,  LDI_MOVEL_CAD,  LDI_MOVEL_VLR";
$gsqlFrom="FROM contrato_voip";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/contrato_voip_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_contrato_voip;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>