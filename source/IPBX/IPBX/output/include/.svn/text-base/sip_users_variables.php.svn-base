<?php
$strTableName="sip_users";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="sip_users";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id,  name,  `host`,  nat,  `type`,  accountcode,  amaflags,  `call-limit`,  callgroup,  callerid,  cancallforward,  canreinvite,  context,  defaultip,  dtmfmode,  fromuser,  fromdomain,  insecure,  `language`,  mailbox,  md5secret,  `deny`,  permit,  mask,  musiconhold,  pickupgroup,  qualify,  regexten,  restrictcid,  rtptimeout,  rtpholdtimeout,  secret,  setvar,  disallow,  allow,  fullcontact,  ipaddr,  port,  regserver,  regseconds,  lastms,  username,  defaultuser,  subscribecontext,  useragent";
$gsqlFrom="FROM sip_users";
$gsqlWhereExpr="(name <> \"admin\")";
$gsqlTail="";

include(getabspath("include/sip_users_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_sip_users;

include(getabspath("include/sip_users_events.php"));

$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>