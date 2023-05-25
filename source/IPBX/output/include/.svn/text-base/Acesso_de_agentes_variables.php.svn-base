<?php
$strTableName="Rel. Acesso de agentes";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cc_receptivo_log_agentes";

$gstrOrderBy="ORDER BY cc.`data` DESC, cc.hora DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (0 ? "ASC" : "DESC"), "cc.`data`");
$g_orderindexes[] = array(2, (0 ? "ASC" : "DESC"), "cc.hora");
$gsqlHead="SELECT cc.`data`,  cc.hora,  ir.name AS ramal,  cc.acao,  cc.agente";
$gsqlFrom="FROM cc_receptivo_log_agentes AS cc  , ipbx_ramais AS ir  LEFT OUTER JOIN ipbx_interf AS ii ON ir.id_interf = ii.id_interf";
$gsqlWhereExpr="(4 = length(cc.`ramal`) AND ir.name = cc.ramal) AND cc.`data` <> '0000-00-00' OR (cc.ramal = concat('b',ii.board,'c', ident_interf) OR length(cc.ramal) > 5 AND ir.id_interf = ii.id_interf AND cc.`data` <> '0000-00-00')";
$gsqlTail="GROUP BY cc.`data`, cc.hora, cc.acao";

include(getabspath("include/Acesso_de_agentes_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Acesso_de_agentes;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>