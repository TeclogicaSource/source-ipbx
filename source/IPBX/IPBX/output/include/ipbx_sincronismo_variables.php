<?php
$strTableName="ipbx_sincronismo";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_sincronismo";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_sinc,   usuario,   senha,   trafego,   ip_server,   flg_ativo,   flg_fax,   flg_gravacoes,   ult_sincronismo";
$gsqlFrom="FROM ipbx_sincronismo";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_sincronismo_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_sincronismo;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>