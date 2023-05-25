<?php
$strTableName="admin_users";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="ipbx_ramais";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

$g_orderindexes=array();
$gsqlHead="SELECT id,   name,   `host`,   nat,   `type`,   accountcode,   amaflags,   `call-limit`,   callgroup,   callerid,   cancallforward,   canreinvite,   context,   defaultip,   dtmfmode,   fromuser,   fromdomain,   insecure,   `language`,   mailbox,   md5secret,   `deny`,   permit,   mask,   musiconhold,   pickupgroup,   qualify,   rtcachefriends,   regexten,   restrictcid,   rtptimeout,   rtpholdtimeout,   secret,   setvar,   disallow,   allow,   fullcontact,   ipaddr,   port,   regserver,   regseconds,   lastms,   username,   defaultuser,   subscribecontext,   useragent,   gateway,   id_horario,   mail,   grava_chamada,   tp_ramal,   Transbordo,   id_interf,   ident_interf,   tp_chamada,   flg_cadeado,   desvio,   id_pesquisa,   desvio_ddr,   id_saida";
$gsqlFrom="FROM ipbx_ramais";
$gsqlWhereExpr="";
$gsqlTail="";

include(getabspath("include/admin_users_settings.php"));

// alias for 'SQLQuery' object
$gQuery = &$queryData_admin_users;


$reportCaseSensitiveGroupFields = false;

$gstrSQL = gSQLWhere("");


?>