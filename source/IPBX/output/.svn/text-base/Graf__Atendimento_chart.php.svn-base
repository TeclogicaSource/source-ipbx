<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
add_nocache_headers();

include("include/Graf__Atendimento_variables.php");

if(!@$_SESSION["UserID"])
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}
if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
{
	echo "<p>"."Você não tem permissão para acessar esta tabela"." <a href=\"login.php\">"."Voltar à página de Login"."</a></p>";
	return;
}

//	Before Process event
if(function_exists("BeforeProcessChart"))
	BeforeProcessChart($conn);

//	process request data, fill session variables

if(!count($_POST) && !count($_GET))
{
	$sess_unset = array();
	foreach($_SESSION as $key=>$value)
		if(substr($key,0,strlen($strTableName)+1)==$strTableName."_" &&
			strpos(substr($key,strlen($strTableName)+1),"_")===false)
			$sess_unset[] = $key;
	foreach($sess_unset as $key)
		unset($_SESSION[$key]);
}

include('include/xtempl.php');
include('classes/runnerpage.php');
include('classes/searchclause.php');
include("classes/searchpanel.php");
include("classes/searchpanelsimple.php");	
include("classes/searchcontrol.php");
include("classes/panelsearchcontrol.php");	

$xt = new Xtempl();

$sessionPrefix = $strTableName;

if(postvalue("id"))
	$id = postvalue("id");
else
	$id = 1;
// assign an id			
$xt->assign("id",$id);	


// SearchClause class stuff
if (isset($_SESSION[$sessionPrefix.'_advsearch']))
{
	$searchClauseObj = unserialize($_SESSION[$sessionPrefix.'_advsearch']);		
}
else
{
	$allSearchFields = GetTableData($strTableName, '.allSearchFields', array());
	$searchClauseObj = new SearchClause($strTableName, $allSearchFields, $sessionPrefix);
}

$searchClauseObj->parseRequest();

$_SESSION[$sessionPrefix.'_advsearch'] = serialize($searchClauseObj);
//array of params for, most of them used by searchPanel class
$params = array("id" =>$id, 
				"tName"=>$strTableName,
				"pageType" => PAGE_CHART,
				"searchClauseObj"=>$searchClauseObj, 
				"shortTableName"=>"Graf__Atendimento",
				"isDisplayLoading"=>GetTableData($strTableName,".isDisplayLoading",false),
				"menuTablesArr"=> $menuTablesArr,
				"isGroupSecurity"=>$isGroupSecurity);
$params["xt"]=&$xt;
$pageObject = new RunnerPage($params);
// add button events if exist
$buttonHandlers = GetTableData($pageObject->tName, ".buttonHandlers_".$pageObject->getPageType(), array());
$pageObject->addButtonHandlers($buttonHandlers);

// add onload event
$onLoadJsCode = GetTableData($pageObject->tName, ".jsOnloadChart", '');
$pageObject->addOnLoadJsEvent($onLoadJsCode);


$pageObject->addCommonJs();

$pageObject->createOldMenu();

if($pageObject->isCreateMenu())
{
	$xt->assign("menu_block",true);
	$xt->assign("menustyle_block",true);
}




if(IsAdmin())
	$xt->assign("adminarea_link",true);
$xt->assign("adminarealink_attrs","href=\"admin_rights_list.php\" onclick=\"window.location.href='admin_rights_list.php';return false;\"");

$xt->assign("quickjump_attrs","onchange=\"window.location.href=this.options[this.selectedIndex].value;\"");


$xt->assign("security_block", true);
$xt->assign("username",htmlspecialchars($_SESSION["UserID"]));
$xt->assign("logoutlink_attrs","onclick=\"window.location.href='login.php?a=logout';return false;\"");

$xt->assign("chart_block",true);
$xt->assign("toplinks_block",true);
$xt->assign("asearch_link",true);
$xt->assign("asearchlink_attrs","onclick=\"window.location.href='Graf__Atendimento_search.php';return false;\"");
$xt->assign("search_records_block",true);
//$xt->assign("recordcontrols_block",true);

$xt->assign("searchform_showall",true);
$xt->assign("showallbutton_attrs","onclick=\"window.location.href='Graf__Atendimento_chart.php?a=showall';\"");

if(!GetChartXML("Graf__Atendimento"))
	$xt->assign("chart_block",false);

	
// assign for lheader

// create searchPanel
$args = array();
$args['pageObj'] = &$pageObject;
$searchPanelObj = new SearchPanelSimple($args);
$searchPanelObj->buildSearchPanel('adv_search_panel');


function displayBody(&$params) {	
	echo "<script>".$params['pageObject']->PrepareJS()."</script>";
}
$pageObject->AddJSFile("include/customlabels");


$pageObject->body['begin'] .= "<script type=\"text/javascript\" src=\"include/jquery.js\"></script>\r\n";
if ($pageObject->debugJSMode === true)
{
	$pageObject->body['begin'] .= "<script type=\"text/javascript\" src=\"include/runnerJS/Runner.js\"></script>\r\n".
		"<script type=\"text/javascript\" src=\"include/runnerJS/Util.js\"></script>\r\n";
}
else
{
	$pageObject->body['begin'] .= "<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";
}
				
				
$pageObject->body['begin'] .= "<script language=\"JavaScript\" src=\"include/jsfunctions.js\"></script>\r\n".
				($pageObject->isDisplayLoading ? "<script type=\"text/javascript\">runLoading(".$id.",document.body,0);</script>" : "").
				'<form id="frmSearch'.$id.'" name="frmSearch'.$id.'" method="GET" action="'.GetTableURL($strTableName).'_chart.php"></form>'.
				"<div id=\"search_suggest\" class=\"search_suggest\"></div>";

if($pageObject->isDisplayLoading)				
	$pageObject->getStopLoading();				
				
// assign body end in such way, to prevent collisions with flyId increment 
$pageObject->body['end'] = array();
$pageObject->body['end']["func"]="displayBody";
$pageObject->body['end']["params"]=array();
$pageObject->body['end']["params"]["pageObject"]=&$pageObject;
$xt->assignbyref('body', $pageObject->body);

$xt->assign("left_block", true);

$xt->assign("style_block",true);
$xt->assign("shiftstyle_block", true);
// end assign for lheader
	
$templatefile = "Graf__Atendimento_chart.htm";
if(function_exists("BeforeShowChart"))
	BeforeShowChart($xt,$templatefile);

$xt->display($templatefile);



?>
