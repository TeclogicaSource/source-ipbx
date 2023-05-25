<?php
$strTableName="interf_vono";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="interf_vono";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_interf_vono,   id_contrato,   codec,   usuario,   senha,   ip_host,   id_central";
$gsqlFrom="FROM interf_vono";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/interf_vono_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_interf_vono;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>