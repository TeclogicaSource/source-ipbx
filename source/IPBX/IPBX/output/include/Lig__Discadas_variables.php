<?php
$strTableName="Rel. Lig. Discadas";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cdr";

$gstrOrderBy="ORDER BY substr(src, -4), calldate";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(3, (1 ? "ASC" : "DESC"), "substr(src, -4)");
$g_orderindexes[] = array(7, (1 ? "ASC" : "DESC"), "cdr.calldate");
$gsqlHead="select DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS Periodo,  DATE_FORMAT(calldate ,'%T') AS Hora,  substr(src, -4) AS src,  case dst  when 'i' then 'SEM PRIVILÉGIO'   else dst end AS dst,  SEC_TO_TIME(duration) AS Tempo,  case disposition   when 'NO ANSWER' then 'NÃO ATENDE'   when 'ANSWERED' then 'ATENDIDO'   when 'BUSY' then 'OCUPADO'   else disposition end AS disposition,  calldate,  concat(\"<a href=./download.php?table=ipbx_gravacoes&field=nm_arq&key1=\", ipbx_gravacoes.id_grav, \"> DOWNLOAD </a>\") as Audio";
$gsqlFrom="FROM cdr LEFT OUTER JOIN ipbx_gravacoes ON cdr.uniqueid = ipbx_gravacoes.uniqueid";
$gsqlWhereExpr="(lastapp <> 'VoiceMail') AND (length(src) < 5 && length(src) > 3)";
$gsqlTail="";

include(getabspath("include/Lig__Discadas_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Lig__Discadas;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>