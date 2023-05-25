<?php
$strTableName="Graf. Custo GSM";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="conta";

$gstrOrderBy="ORDER BY ano_referencia desc, mes_referencia desc";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$g_orderindexes[] = array(4, (0 ? "ASC" : "DESC"), "ano_referencia");
$g_orderindexes[] = array(5, (0 ? "ASC" : "DESC"), "mes_referencia");
$gsqlHead="select concat(mes_referencia,'-',ano_referencia) AS `DATA`,  round(sum(ct.custo)) AS custo,  round(sum(ct.duracao/60)) AS Minutos,  ano_referencia AS `DATE_FORMAT(conta.calldate,'%Y')`,  mes_referencia AS `DATE_FORMAT(conta.calldate,'%m')`";
$gsqlFrom="FROM conta AS ct";
$gsqlWhereExpr="(select  id_tp_interf  FROM ipbx_interf  WHERE id_interf = ct.id_interf)     in (3)";
$gsqlTail="GROUP BY concat(mes_referencia,'-',ano_referencia)";

include(getabspath("include/Graf__Custo_GSM_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Graf__Custo_GSM;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>