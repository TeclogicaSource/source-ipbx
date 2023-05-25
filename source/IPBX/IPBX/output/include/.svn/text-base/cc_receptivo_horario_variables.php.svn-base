<?php
$strTableName="cc_receptivo_horario";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_horario";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_horario,   dsc_horario,   hr_inicio,   hr_fim,   seg,   ter,   qua,   qui,   sex,   sab,   dom";
$gsqlFrom="FROM cc_receptivo_horario";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/cc_receptivo_horario_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_cc_receptivo_horario;

include(getabspath("include/cc_receptivo_horario_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>