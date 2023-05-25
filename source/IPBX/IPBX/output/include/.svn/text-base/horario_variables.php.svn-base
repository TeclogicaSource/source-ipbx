<?php
$strTableName="horario";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="horario";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_horario,   hr_inicio_01,   hr_fim_01,   seg,   ter,   qua,   qui,   sex,   sab,   dom,   hr_inicio_02,   hr_fim_02,   dsc_horario";
$gsqlFrom="FROM horario";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/horario_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_horario;

include(getabspath("include/horario_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>