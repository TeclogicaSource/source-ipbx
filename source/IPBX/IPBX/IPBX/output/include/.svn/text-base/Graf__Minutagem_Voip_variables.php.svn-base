<?php
$strTableName="Graf. Minutagem Voip";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cdr";

$gstrOrderBy="ORDER BY DATE_FORMAT(ct.calldate,'%Y'), DATE_FORMAT(ct.calldate,'%m')";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(4, (1 ? "ASC" : "DESC"), "DATE_FORMAT(ct.calldate,'%Y')");
$g_orderindexes[] = array(5, (1 ? "ASC" : "DESC"), "DATE_FORMAT(ct.calldate,'%m')");
$gsqlHead="select DATE_FORMAT(ct.calldate,'%m-%Y') AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  DATE_FORMAT(ct.calldate,'%Y') AS `DATE_FORMAT(conta.calldate,'%Y')`,  DATE_FORMAT(ct.calldate,'%m') AS `DATE_FORMAT(conta.calldate,'%m')`";
$gsqlFrom="FROM conta ct, ipbx_interf ii";
$gsqlWhereExpr="ct.id_interf = ii.id_interf and  ii.id_tp_interf in (1)";
$gsqlTail="GROUP BY DATE_FORMAT(ct.calldate,'%m-%Y')";

include(getabspath("include/Graf__Minutagem_Voip_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Graf__Minutagem_Voip;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>