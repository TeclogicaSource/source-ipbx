<?php
$strTableName="v_contrato_trad";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="contrato_trad";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT contrato_trad.id_contrato,  contrato_trad.num_contrato,  contrato_trad.nm_operadora,  contrato_trad.Vingencia,  contrato_trad.flg_ativo,  cad_1.cad_ini as \"F-F_LOCAL_CAD_INI\",  cad_1.cad_frac as \"F-F_LOCAL_CAD_FRAC\",  contrato_trad.`F-F_LOCAL_VLR`,  cad_2.cad_ini as \"F-M_LOCAL_VC1_CAD_INI\",  cad_2.cad_frac as \"F-M_LOCAL_VC1_CAD_FRAC\",  contrato_trad.`F-M_LOCAL_VC1_VLR`,  cad_3.cad_ini as \"F-M_VC2_CAD_INI\",  cad_3.cad_frac as \"F-M_VC2_CAD_FRAC\",  contrato_trad.`F-M_VC2_VLR`,  cad_4.cad_ini as \"F-F_LDN_CAD_INI\",  cad_4.cad_frac as \"F-F_LDN_CAD_FRAC\",  contrato_trad.`F-F_LDN_VLR`,  cad_5.cad_ini as \"F-F_LDI_CAD_INI\",  cad_5.cad_frac as \"F-F_LDI_CAD_FRAC\",  contrato_trad.`F-F_LDI_VLR`,  cad_6.cad_ini as \"F-M_LDI_CAD_INI\",  cad_6.cad_frac as \"F-M_LDI_CAD_FRAC\",  contrato_trad.`F-M_LDI_VLR`,  cad_7.cad_ini as \"F-M_VC3_CAD_INI\",  cad_7.cad_frac as \"F-M_VC3_CAD_FRAC\",  contrato_trad.`F-M_VC3_VLR`";
$gsqlFrom="FROM contrato_trad, cadencias cad_1, cadencias cad_2,cadencias cad_3,cadencias cad_4,cadencias cad_5,cadencias cad_6,cadencias cad_7";
$gsqlWhereExpr="contrato_trad.`F-F_LOCAL_CAD` = cad_1.id_cadencia and  contrato_trad.`F-M_LOCAL_VC1_CAD` = cad_2.id_cadencia and  contrato_trad.`F-M_VC2_CAD` = cad_3.id_cadencia and   contrato_trad.`F-F_LDN_CAD` = cad_4.id_cadencia and   contrato_trad.`F-F_LDI_CAD` = cad_5.id_cadencia and   contrato_trad.`F-M_LDI_CAD` = cad_6.id_cadencia and   contrato_trad.`F-M_VC3_CAD` = cad_7.id_cadencia";
$gsqlTail="";

include(getabspath("include/v_contrato_trad_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_v_contrato_trad;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>