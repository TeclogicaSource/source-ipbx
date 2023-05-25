<?php
$strTableName="Graf. Lig. Discadas";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cdr";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="select DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS `Período`,  DATE_FORMAT(calldate ,'%T') AS Hora,  src,  case length(dst)   when 13 then substr(dst,-10)   when 12 then substr(dst,-10)   when 11 then substr(dst,-10)   when 8 then dst else dst end AS dst,  SEC_TO_TIME(duration) AS Tempo,  case disposition   when 'NO ANSWER' then 'NÃO ATENDE'   when 'ANSWERED' then 'ATENDIDO'   when 'BUSY' then 'OCUPADO'   else disposition end AS disposition,  COUNT(*) AS Total";
$gsqlFrom="FROM cdr";
$gsqlWhereExpr="(lastapp <> 'VoiceMail') AND (length(dst) > 4) AND (channel not like 'Local/%')";
$gsqlTail="GROUP BY disposition";

include(getabspath("include/Liga__es_discadas_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Liga__es_discadas;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>