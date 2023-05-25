<?php
$strTableName="relat_centrocusto";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cdr";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT calldate AS `\"Data e Hora\"`,  clid AS `\"Usuário\"`,  src AS `\"Origem\"`,  dst AS `\"Destino\"`,  billsec/60 AS `\"Minutos Tarifados\"`,  accountcode AS `\"Centro de custo\"`,  (billsec/30)*0.05 AS `\"Valor R\$\"`,  uniqueid";
$gsqlFrom="FROM cdr";
$gsqlWhereExpr="(accountcode <> '') AND (disposition = \"ANSWERED\")";
$gsqlTail="";

include(getabspath("include/relat_centrocusto_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_relat_centrocusto;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>