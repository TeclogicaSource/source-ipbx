<?php
$strTableName="Rel. Detalh. Chamadas";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_filas_atend";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="select Fila,  Telefone,  (case when ps_abandono is NULL then ps_entrada   else concat(ps_entrada,',',ps_abandono)   end) AS `Entrada/Saida`,  case when dsl_motiv is NULL then \" \"  when dsl_motiv = \"COMPLETECALLER\" then \"ORIGEM\"  when dsl_motiv = \"COMPLETEAGENT\" then \"AGENTE\"  else dsl_motiv  end AS Terminado,  Agente,  dt_entrada,  hr_entrada,  tp_espera,  tp_atendimento,  sec_to_time(time_to_sec(tp_espera)+time_to_sec(tp_atendimento)) AS tptotal,  case   when tp_atendimento is NULL then \"Abandono\"  when tel_trans is NULL then \" \"  else concat(\"Transf. \", tel_trans, \" \" ,(select substr(callerid,1,10) from ipbx_ramais where name = tel_trans)) end AS `Obs.`";
$gsqlFrom="FROM cc_receptivo_filas_atend";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Rel__Detalh__Chamadas_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Detalh__Chamadas;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>