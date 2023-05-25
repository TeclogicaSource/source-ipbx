<?php
$strTableName="Rel. Recebidas";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cdr";

$gstrOrderBy="ORDER BY calldate";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(2, (1 ? "ASC" : "DESC"), "c.calldate");
$gsqlHead="SELECT DATE(DATE_FORMAT(c.calldate, '%Y-%m-%d')) AS `Período`,    c.calldate,    c.clid,    c.src,    c.dst,    SEC_TO_TIME(c.duration) AS duration,    SEC_TO_TIME(c.billsec) AS billsec,    c.accountcode,    CASE c.disposition      WHEN 'NO ANSWER' THEN 'NÃO ATENDE'      WHEN 'ANSWERED' THEN 'ATENDIDO'      WHEN 'BUSY' THEN 'OCUPADO'      ELSE c.disposition    END AS disposition,    concat('<a href=./download.php?table=ipbx_gravacoes&field=nm_arq&key1=', ig.id_grav, '>DOWNLOAD</a>') as Audio";
$gsqlFrom="FROM cdr c  LEFT OUTER JOIN ipbx_gravacoes ig    ON (c.uniqueid = ig.uniqueid)";
$gsqlWhereExpr="(src <> \"\")  AND (dst <> \"\")  AND (LENGTH(dst) < 5)  AND (LENGTH(dst) > 2)";
$gsqlTail="";

include(getabspath("include/Recebidas_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Recebidas;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>