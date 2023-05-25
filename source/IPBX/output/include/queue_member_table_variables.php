<?php
$strTableName="queue_member_table";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="queue_member_table";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="select distinct queue_member_table.uniqueid AS uniqueid,  queue_member_table.membername AS membername,  queue_member_table.queue_name AS queue_name,  queue_member_table.`interface` AS `interface`,  queue_member_table.penalty AS penalty,  queue_member_table.paused AS paused,  ir.name AS Ramal";
$gsqlFrom="FROM queue_member_table  , ipbx_ramais AS ir  , ipbx_interf AS ii";
$gsqlWhereExpr="(queue_member_table.`interface` like 'SIP%'   AND ir.name = substr(queue_member_table.interface,5))   OR (queue_member_table.`interface` = concat('khomp/b',ii.board,'c', ident_interf)   OR queue_member_table.interface like '%/%/%'  AND ir.id_interf = ii.id_interf)";
$gsqlTail="";

include(getabspath("include/queue_member_table_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_queue_member_table;

include(getabspath("include/queue_member_table_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>