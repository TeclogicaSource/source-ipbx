<?php
$strTableName="Graf. Historico fila data";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_rel_hist_fila_data";

$gstrOrderBy="ORDER BY `Data`";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "`Data`");
$gsqlHead="SELECT Fila,  `Data`,  DATE_FORMAT(`Data`, \"%d/%m\") as Dia,  `Agent.Disp`,  AgentesPausa,  `Chamadas Atendidas`,  `Chamadas Abandonadas`";
$gsqlFrom="FROM v_rel_hist_fila_data";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/Graf__Historico_fila_data_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Graf__Historico_fila_data;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>