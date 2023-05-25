<?php
$strTableName="Rel. Prod. Filas";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_filas_atend";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="select ccrfa.dt_entrada AS dt_entrada,  ccrfa.Fila,  COUNT(ccrfa.hr_entrada) AS `Receb.`,  COUNT(ccrfa.hr_atendimento) AS `Atend.`,  COUNT(ccrfa.hr_abandono) AS `Aband.`,  sec_to_time(avg(time_to_sec(ccrfa.tp_espera))) AS TME,  sec_to_time(avg(time_to_sec(ccrfa.tp_atendimento))) AS TMA,  sec_to_time(avg(time_to_sec(ccrfa.tp_espera)+(time_to_sec(ccrfa.tp_atendimento)))) AS TMO,  case   when ccrf.tx_abandono is NULL then \"N/A\"   else concat(\"< \",ccrf.tx_abandono) end AS `Aband.Contr.`,  ((count(ccrfa.hr_abandono)*100)/count(ccrfa.hr_entrada)) AS `Aband.Real.`,  concat(ccrf.perc_tme, \"% em \", seg_tme, \"S\") AS NivelServicoContratado";
$gsqlFrom="FROM cc_receptivo_filas_atend AS ccrfa  , cc_receptivo_filas AS ccrf";
$gsqlWhereExpr="(ccrfa.dt_entrada > 0000) AND (ccrfa.Fila = ccrf.nm_fila)";
$gsqlTail="GROUP BY ccrfa.dt_entrada, ccrfa.Fila";

include(getabspath("include/Rel__Prod__Filas_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Prod__Filas;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>