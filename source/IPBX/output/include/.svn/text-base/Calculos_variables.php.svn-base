<?php
$strTableName="Calculos";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cdr";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT calldate,  clid,  src,  dst,  dcontext,  channel,  dstchannel,  lastapp,  lastdata,  duration,  billsec,  disposition,  amaflags,  accountcode,  uniqueid,  userfield";
$gsqlFrom="FROM cdr";
$gsqlWhereExpr="src like '%7914%'";
$gsqlTail="";

include(getabspath("include/Calculos_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_Calculos;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>