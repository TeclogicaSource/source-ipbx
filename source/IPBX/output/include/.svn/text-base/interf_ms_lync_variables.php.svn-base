<?php
$strTableName="interf_ms_lync";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="interf_ms_lync";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id_ms_lync,   ip_host,   port,   codec,   id_central";
$gsqlFrom="FROM interf_ms_lync";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/interf_ms_lync_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_interf_ms_lync;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>