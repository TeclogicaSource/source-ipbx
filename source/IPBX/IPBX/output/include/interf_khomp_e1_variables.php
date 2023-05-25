<?php
$strTableName="interf_khomp_e1";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="interf_khomp_e1";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_k_e1,   dsc_interf,   id_contrato,   board,   link,   id_central";
$gsqlFrom="FROM interf_khomp_e1";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/interf_khomp_e1_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_interf_khomp_e1;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>