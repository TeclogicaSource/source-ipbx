<?php
$strTableName="cdr Report";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="cdr";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT calldate,   clid,   src,   dst,   dcontext,   channel,   dstchannel,   lastapp,   lastdata,   duration,   billsec,   disposition,   amaflags,   accountcode,   \"teste\",  uniqueid,   userfield";
$gsqlFrom="FROM cdr";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/cdr_Report_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_cdr_Report;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>