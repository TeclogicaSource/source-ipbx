<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");

add_nocache_headers();

include('include/xtempl.php');
include("include/central_variables.php");
include("include/ipbx_interf_vono_settings.php");
include("include/ipbx_interf_fxs_settings.php");
include("include/ipbx_interf_e1_settings.php");
include("include/ipbx_interf_gsm_settings.php");
include("include/ipbx_interf_mslync_settings.php");
include("include/ipbx_interf_sip_settings.php");
include("include/ipbx_interf_voxip_settings.php");
include("include/ipbx_interf_callman_settings.php");
include("include/ipbx_interf_fxo_settings.php");
include("include/ipbx_interf_sip_generica_settings.php");
include('classes/runnerpage.php');
include('classes/listpage.php');
include("classes/searchpanel.php");
include("classes/searchcontrol.php");
include("classes/searchclause.php");
include("classes/panelsearchcontrol.php");	

if(!@$_SESSION["UserID"])
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}
if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search") && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Add"))
{
	if(IsAdmin())
		echo "<p>"."Você não tem permissão para acessar esta tabela"."<br><a href=\"admin_rights_list.php\">"."Siga para a Área Admin"."</a> "."para configurar permissões de usuário"."</p>";
	else
		echo "<p>"."Você não tem permissão para acessar esta tabela"." <a href=\"login.php\">"."Voltar à página de Login"."</a></p>";
	exit();
}

//	Include necessary files in accordance with mode displaying page
if (postvalue("mode")=="")
{
	$mode = LIST_SIMPLE;
	include('classes/listpage_simple.php');
	include("classes/searchpanelsimple.php");	
}
elseif(postvalue("mode") == "ajax")
{
	$mode = LIST_AJAX;
	include('classes/listpage_simple.php');
	include('classes/listpage_ajax.php');
	include("classes/searchpanelsimple.php");	
}
elseif(postvalue("mode") == "lookup")
{	
	include('classes/listpage_embed.php');
	include('classes/listpage_lookup.php');
	include("classes/searchpanellookup.php");	
	$mode=LIST_LOOKUP;
	//determine which field should be used to select values
}
elseif(postvalue("mode")=="listdetails")
{
	include('classes/listpage_embed.php');
	include('classes/listpage_dpinline.php');
	$mode=LIST_DETAILS;
}
$xt = new Xtempl();

// Modify query: remove blob fields from fieldlist.
// Blob fields on a list page are shown using imager.php (for example).
// They don't need to be selected from DB in list.php itself.
$gQuery->ReplaceFieldsWithDummies(GetBinaryFieldsIndices());

$options = array();
//array of params for classes
$options["pageType"] = PAGE_LIST;
$options["id"] = postvalue("id") ? postvalue("id") : 1;
$options["mode"] = $mode;
$options['xt'] = &$xt;
$options['masterPageType'] = postvalue("masterpagetype");
$options["masterTable"] = postvalue("mastertable");
$options["masterId"] = postvalue("masterid");
$options["firstTime"] = postvalue("firsttime");

$i = 1;
while(isset($_REQUEST["masterkey".$i])) 
{	
	$options["masterKeysReq"][$i] = $_REQUEST["masterkey".$i];
	$i++;
}
$pageObject = ListPage::createListPage($strTableName, $options);
 

// prepare code for build page
$pageObject->prepareForBuildPage();

$includesArr = array();

//include files if need
for($i=0;$i<count($includesArr);$i++)
	include($includesArr[$i]);

// show page depends of mode
$pageObject->showPage();

?>
