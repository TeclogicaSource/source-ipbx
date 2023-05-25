<?php
$strTableName="ipbx_ura_rev_conf";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_ura_rev_conf";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_ipbx_ura_rev,   mx_tent,   tp_entre_tent,   hr_inicio,   hr_fim,   mx_chamada,   id_interf";
$gsqlFrom="FROM ipbx_ura_rev_conf";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/ipbx_ura_rev_conf_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_ipbx_ura_rev_conf;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>