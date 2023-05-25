<?php
$strTableName="cc_receptivo_filas_atend";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_filas_atend";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT chave,   dt_entrada,   hr_entrada,   Fila,   Agente,   hr_atendimento,   hr_abandono,   tp_espera,   tp_atendimento,   Telefone,   ps_entrada,   ps_abandono,   tel_trans,   dsl_motiv,   flg_timeout_fila";
$gsqlFrom="FROM cc_receptivo_filas_atend";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/cc_receptivo_filas_atend_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_cc_receptivo_filas_atend;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>