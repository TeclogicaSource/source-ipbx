<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include("include/admin_members_variables.php");

$gsqlHead="select `name` ";
$gsqlFrom="from `ipbx_ramais`";
$gsqlWhereExpr="";
$gsqlTail="";
// $gstrSQL = "SELECT id,   name,   `host`,   nat,   `type`,   accountcode,   amaflags,   `call-limit`,   callgroup,   callerid,   cancallforward,   canreinvite,   context,   defaultip,   dtmfmode,   fromuser,   fromdomain,   insecure,   `language`,   mailbox,   md5secret,   `deny`,   permit,   mask,   musiconhold,   pickupgroup,   qualify,   rtcachefriends,   regexten,   restrictcid,   rtptimeout,   rtpholdtimeout,   secret,   setvar,   disallow,   allow,   fullcontact,   ipaddr,   port,   regserver,   regseconds,   lastms,   username,   defaultuser,   subscribecontext,   useragent,   gateway,   id_horario,   mail,   grava_chamada,   tp_ramal,   Transbordo,   id_interf,   ident_interf,   tp_chamada,   flg_cadeado,   desvio,   id_pesquisa,   desvio_ddr,   id_saida  FROM ipbx_ramais ";
$gstrSQL = gSQLWhere("");

if(!@$_SESSION["UserID"])
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}
if(!IsAdmin())
{
	echo "<p>"."Você não tem permissão para acessar esta tabela"." <a href=\"login.php\">"."Voltar à página de Login"."</a></p>";
	exit();
}


include('include/xtempl.php');
include("classes/searchclause.php");

include("classes/searchcontrol.php");
include("classes/panelsearchcontrol.php");

include("classes/searchpanel.php");
include("classes/searchpanelsimple.php");	

include('classes/runnerpage.php');
include('classes/listpage.php');
include('classes/listpage_simple.php');
include('classes/memberspage.php');
$xt = new Xtempl();






$options = array();
//array of params for classes
$options["pageType"] = PAGE_LIST;
$options["id"] = postvalue("id") ? postvalue("id") : 1;
$options["mode"] = MEMBERS_PAGE;
$options['xt'] = &$xt;



$pageObject = ListPage::createListPage($strTableName, $options);

$buttonHandlers = array();
 // add button events if exist
$pageObject->addButtonHandlers($buttonHandlers);
// prepare code for build page
$pageObject->prepareForBuildPage();

// show page depends of mode
$pageObject->showPage();



	

?>