<?php
$strTableName="Graf. Custo Trad";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="conta";

$gstrOrderBy="ORDER BY DATE_FORMAT(ct.calldate,'%Y'), DATE_FORMAT(ct.calldate,'%m')";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(4, (1 ? "ASC" : "DESC"), "DATE_FORMAT(ct.calldate,'%Y')");
$g_orderindexes[] = array(5, (1 ? "ASC" : "DESC"), "DATE_FORMAT(ct.calldate,'%m')");
$gsqlHead="select DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";
$gsqlFrom="FROM conta AS ct";
$gsqlWhereExpr="(select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf   in (2,8))";
$gsqlTail="GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";

include(getabspath("include/Graf__Custo_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Graf__Custo;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>