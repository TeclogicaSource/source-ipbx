<?php
$strTableName="ipbx_horario_desv_ramais";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_horario_desv_ramais";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_desvio_prog,   id_desvio,   diasemana,   txt_referencia,   hr_inicio_01,   hr_fim_01,   dsv_01,   hr_inicio_02,   hr_fim_02,   dsv_02,   hr_inicio_03,   hr_fim_03,   dsv_03,   hr_inicio_04,   hr_fim_04,   dsv_04";
$gsqlFrom="FROM ipbx_horario_desv_ramais";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_horario_desv_ramais_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_horario_desv_ramais;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>