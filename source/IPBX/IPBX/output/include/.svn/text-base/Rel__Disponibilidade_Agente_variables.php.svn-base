<?php
$strTableName="Rel. Disponibilidade Agente";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="v_rel_disp_agente";

$gstrOrderBy="ORDER BY `Data`, Logon";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(1, (1 ? "ASC" : "DESC"), "`Data`");
$g_orderindexes[] = array(4, (1 ? "ASC" : "DESC"), "Logon");
$gsqlHead="SELECT `Data`,  Nome,  Fila,  Logon,  Logout,  TempoDisponivel,  TempoPausa,  TempoAtendimento,  TempoLivre";
$gsqlFrom="FROM v_rel_disp_agente";
$gsqlWhereExpr="(Nome is not null)";
$gsqlTail="";

include(getabspath("include/Rel__Disponibilidade_Agente_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Rel__Disponibilidade_Agente;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>