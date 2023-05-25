<?php
$strTableName="queue_table";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="queue_table";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT name,   musiconhold,   announce,   context,   timeout,   monitor_join,   monitor_format,   queue_youarenext,   queue_thereare,   queue_callswaiting,   queue_holdtime,   queue_minutes,   queue_seconds,   queue_lessthan,   queue_thankyou,   queue_reporthold,   announce_frequency,   announce_round_seconds,   announce_holdtime,   retry,   wrapuptime,   maxlen,   servicelevel,   strategy,   joinempty,   leavewhenempty,   eventmemberstatus,   eventwhencalled,   reportholdtime,   memberdelay,   weight,   timeoutrestart,   periodic_announce,   periodic_announce_frequency,   ringinuse,   setinterfacevar";
$gsqlFrom="FROM queue_table";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/queue_table_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_queue_table;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>