<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
add_nocache_headers();

include("include/admin_members_variables.php");
include("classes/searchcontrol.php");
include("classes/advancedsearchcontrol.php");
include("classes/panelsearchcontrol.php");
include("classes/searchclause.php");

$sessionPrefix = $strTableName;


if(isset($_SESSION[$strTableName.'_advsearch']))
{
	$searchObject = unserialize($_SESSION[$strTableName.'_advsearch']);
}
else
{
	$allSearchFields = GetTableData($strTableName, '.allSearchFields', array());
	$searchObject = new SearchClause($strTableName, $allSearchFields, $sessionPrefix);
}

//Basic includes js files
$includes="";
// predefined fields num
$predefFieldNum = 0;

$chrt_array=array();
$rpt_array=array();
//	check if logged in
if( (!@$_SESSION["UserID"] || !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search") && !@$chrt_array['status'] && !@$rpt_array['status'])
|| (@$rpt_array['status'] == "private" && @$rpt_array['owner'] != @$_SESSION["UserID"])
|| (@$chrt_array['status'] == "private" && @$chrt_array['owner'] != @$_SESSION["UserID"]) )
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}

include('include/xtempl.php');
include('classes/runnerpage.php');
$xt = new Xtempl();

// id that used to add to controls names
if(postvalue("id"))
	$id = postvalue("id");
else
	$id = 1;
	
// for usual page show proccess
$mode=SEARCH_SIMPLE;
$templatefile = "admin_members_search.htm";

// for ajax query, used when page buffers new control
if(postvalue("mode")=="inlineLoadCtrl"){
	$mode=SEARCH_LOAD_CONTROL;
	$templatefile = "admin_members_inline_search.htm";
}	
	
$xt->assign("id", $id);
$formname = "frmSearch".$id;

$calendar = false;

$params = array();
$params["id"] = $id;
$params["mode"] = $mode;
$params["calendar"] = $calendar;
$params['xt'] = &$xt;
$params['shortTableName'] = 'admin_members';
$params['origTName'] = $strOriginalTableName;
$params['dataSourceTable'] = "admin_members";
$params['sessionPrefix'] = $sessionPrefix;
$params['tName'] = $strTableName;
$params['includes_js']=$includes_js;
$params['includes_jsreq']=$includes_jsreq;
$params['includes_css']=$includes_css;
$params['locale_info']=$locale_info;
$params['pageType']=PAGE_SEARCH;

//PAGE_SEARCH,$id,$calendar

$pageObject = new RunnerPage($params);

// create reusable searchControl builder instance
$searchControllerId = (postvalue('searchControllerId') ? postvalue('searchControllerId') : $pageObject->id);

$searchControlBuilder = new AdvancedSearchControl($searchControllerId, $strTableName, $searchObject, $pageObject);


//	Before Process event
if(function_exists("BeforeProcessSearch"))
	BeforeProcessSearch($conn);

////////////////////// time picker
	
// add constants and files for simple view
if ($mode==SEARCH_SIMPLE)
{
	// add onload event
	$onLoadJsCode = GetTableData($pageObject->tName, ".jsOnloadSearch", '');
	$pageObject->addOnLoadJsEvent($onLoadJsCode);

	// add button events if exist
	$buttonHandlers = GetTableData($pageObject->tName, ".buttonHandlers_".$pageObject->getPageType(), array());
	$pageObject->addButtonHandlers($buttonHandlers);

	$includes .="<script language=\"JavaScript\" src=\"include/jquery.js\"></script>\r\n";
	$includes.="<script language=\"JavaScript\" src=\"include/customlabels.js\"></script>\r\n";
	$includes .="<script language=\"JavaScript\" src=\"include/jsfunctions.js\"></script>\r\n";	
	if ($pageObject->debugJSMode === true)
	{
		$includes.="<script language=\"JavaScript\" src=\"include/runnerJS/Runner.js\"></script>\r\n";
		$includes.="<script language=\"JavaScript\" src=\"include/runnerJS/RunnerEvent.js\"></script>\r\n";
		$includes.= "<script type=\"text/javascript\" src=\"include/runnerJS/Util.js\"></script>";	
	}
	else
	{
		$includes.="<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";
	}	
		
	$pageObject->AddJSFile("include/ajaxsuggest");
	if($calendar)
		$pageObject->AddJSFile("include/calendar");



//---------------------------------------------------------------------------
	$pageObject->AddJsCode("detect = navigator.userAgent.toLowerCase();
		window.checkIt = function(string){
			place = detect.indexOf(string) + 1;
			thestring = string;
			return place;
		};
	");



	
	// if not simple, this div already exist on page
	$includes.="<div id=\"search_suggest\" class=\"search_suggest\"></div>";
	
			
	$fNamesJsArr = $searchControlBuilder->fNamesJSArr(GetTableData($strTableName,".globSearchFields",array()));	
	
	
	$pageObject->addJSCode("searchController".$searchControllerId." = new Runner.search.SearchForm({
		id: ".$id.",
		tName: '".jsreplace($strTableName)."',
		shortTName: '".GetTableData($strTableName, ".shortTableName", '')."',
		fNamesArr:[".$fNamesJsArr."],
		searchType: 'advanced'
	});");
		
//--------------------------------------------------------------------------------------	
	// search panel radio button assign
	$searchRadio = $searchControlBuilder->getSearchRadio();
	$xt->assign_section("all_checkbox_label", $searchRadio['all_checkbox_label'][0], $searchRadio['all_checkbox_label'][1]);
	$xt->assign_section("any_checkbox_label", $searchRadio['any_checkbox_label'][0], $searchRadio['any_checkbox_label'][1]);
	$xt->assignbyref("all_checkbox",$searchRadio['all_checkbox']);
	$xt->assignbyref("any_checkbox",$searchRadio['any_checkbox']);
	
	
	
	$regBlocksJS = '';
	
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("id");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "id";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("id_label","<label for=\"".GetInputElementId("id", $id)."\">","</label>");
	else 
		$xt->assign("id_label", true);
	
	$xt->assign("id_fieldblock", true);		
	$xt->assignbyref("id_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("id_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("id_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_id", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("id", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("id")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("name");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "name";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("name_label","<label for=\"".GetInputElementId("name", $id)."\">","</label>");
	else 
		$xt->assign("name_label", true);
	
	$xt->assign("name_fieldblock", true);		
	$xt->assignbyref("name_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("name_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("name_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_name", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("name", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("name")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("host");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "host";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("host_label","<label for=\"".GetInputElementId("host", $id)."\">","</label>");
	else 
		$xt->assign("host_label", true);
	
	$xt->assign("host_fieldblock", true);		
	$xt->assignbyref("host_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("host_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("host_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_host", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("host", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("host")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("nat");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "nat";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("nat_label","<label for=\"".GetInputElementId("nat", $id)."\">","</label>");
	else 
		$xt->assign("nat_label", true);
	
	$xt->assign("nat_fieldblock", true);		
	$xt->assignbyref("nat_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("nat_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("nat_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_nat", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("nat", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("nat")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("type");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "type";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("type_label","<label for=\"".GetInputElementId("type", $id)."\">","</label>");
	else 
		$xt->assign("type_label", true);
	
	$xt->assign("type_fieldblock", true);		
	$xt->assignbyref("type_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("type_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("type_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_type", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("type", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("type")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("accountcode");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "accountcode";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("accountcode_label","<label for=\"".GetInputElementId("accountcode", $id)."\">","</label>");
	else 
		$xt->assign("accountcode_label", true);
	
	$xt->assign("accountcode_fieldblock", true);		
	$xt->assignbyref("accountcode_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("accountcode_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("accountcode_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_accountcode", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("accountcode", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("accountcode")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("amaflags");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "amaflags";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("amaflags_label","<label for=\"".GetInputElementId("amaflags", $id)."\">","</label>");
	else 
		$xt->assign("amaflags_label", true);
	
	$xt->assign("amaflags_fieldblock", true);		
	$xt->assignbyref("amaflags_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("amaflags_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("amaflags_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_amaflags", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("amaflags", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("amaflags")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("call-limit");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "call-limit";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("call_limit_label","<label for=\"".GetInputElementId("call-limit", $id)."\">","</label>");
	else 
		$xt->assign("call_limit_label", true);
	
	$xt->assign("call_limit_fieldblock", true);		
	$xt->assignbyref("call_limit_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("call_limit_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("call_limit_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_call_limit", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("call-limit", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("call-limit")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("callgroup");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "callgroup";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("callgroup_label","<label for=\"".GetInputElementId("callgroup", $id)."\">","</label>");
	else 
		$xt->assign("callgroup_label", true);
	
	$xt->assign("callgroup_fieldblock", true);		
	$xt->assignbyref("callgroup_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("callgroup_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("callgroup_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_callgroup", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("callgroup", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("callgroup")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("callerid");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "callerid";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("callerid_label","<label for=\"".GetInputElementId("callerid", $id)."\">","</label>");
	else 
		$xt->assign("callerid_label", true);
	
	$xt->assign("callerid_fieldblock", true);		
	$xt->assignbyref("callerid_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("callerid_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("callerid_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_callerid", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("callerid", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("callerid")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("cancallforward");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "cancallforward";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("cancallforward_label","<label for=\"".GetInputElementId("cancallforward", $id)."\">","</label>");
	else 
		$xt->assign("cancallforward_label", true);
	
	$xt->assign("cancallforward_fieldblock", true);		
	$xt->assignbyref("cancallforward_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("cancallforward_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("cancallforward_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_cancallforward", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("cancallforward", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("cancallforward")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("canreinvite");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "canreinvite";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("canreinvite_label","<label for=\"".GetInputElementId("canreinvite", $id)."\">","</label>");
	else 
		$xt->assign("canreinvite_label", true);
	
	$xt->assign("canreinvite_fieldblock", true);		
	$xt->assignbyref("canreinvite_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("canreinvite_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("canreinvite_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_canreinvite", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("canreinvite", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("canreinvite")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("context");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "context";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("context_label","<label for=\"".GetInputElementId("context", $id)."\">","</label>");
	else 
		$xt->assign("context_label", true);
	
	$xt->assign("context_fieldblock", true);		
	$xt->assignbyref("context_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("context_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("context_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_context", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("context", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("context")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("defaultip");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "defaultip";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("defaultip_label","<label for=\"".GetInputElementId("defaultip", $id)."\">","</label>");
	else 
		$xt->assign("defaultip_label", true);
	
	$xt->assign("defaultip_fieldblock", true);		
	$xt->assignbyref("defaultip_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("defaultip_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("defaultip_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_defaultip", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("defaultip", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("defaultip")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("dtmfmode");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "dtmfmode";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("dtmfmode_label","<label for=\"".GetInputElementId("dtmfmode", $id)."\">","</label>");
	else 
		$xt->assign("dtmfmode_label", true);
	
	$xt->assign("dtmfmode_fieldblock", true);		
	$xt->assignbyref("dtmfmode_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("dtmfmode_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("dtmfmode_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_dtmfmode", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("dtmfmode", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("dtmfmode")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("fromuser");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "fromuser";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("fromuser_label","<label for=\"".GetInputElementId("fromuser", $id)."\">","</label>");
	else 
		$xt->assign("fromuser_label", true);
	
	$xt->assign("fromuser_fieldblock", true);		
	$xt->assignbyref("fromuser_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("fromuser_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("fromuser_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_fromuser", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("fromuser", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("fromuser")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("fromdomain");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "fromdomain";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("fromdomain_label","<label for=\"".GetInputElementId("fromdomain", $id)."\">","</label>");
	else 
		$xt->assign("fromdomain_label", true);
	
	$xt->assign("fromdomain_fieldblock", true);		
	$xt->assignbyref("fromdomain_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("fromdomain_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("fromdomain_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_fromdomain", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("fromdomain", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("fromdomain")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("insecure");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "insecure";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("insecure_label","<label for=\"".GetInputElementId("insecure", $id)."\">","</label>");
	else 
		$xt->assign("insecure_label", true);
	
	$xt->assign("insecure_fieldblock", true);		
	$xt->assignbyref("insecure_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("insecure_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("insecure_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_insecure", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("insecure", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("insecure")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("language");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "language";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("language_label","<label for=\"".GetInputElementId("language", $id)."\">","</label>");
	else 
		$xt->assign("language_label", true);
	
	$xt->assign("language_fieldblock", true);		
	$xt->assignbyref("language_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("language_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("language_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_language", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("language", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("language")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("mailbox");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "mailbox";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("mailbox_label","<label for=\"".GetInputElementId("mailbox", $id)."\">","</label>");
	else 
		$xt->assign("mailbox_label", true);
	
	$xt->assign("mailbox_fieldblock", true);		
	$xt->assignbyref("mailbox_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("mailbox_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("mailbox_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_mailbox", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("mailbox", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("mailbox")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("md5secret");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "md5secret";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("md5secret_label","<label for=\"".GetInputElementId("md5secret", $id)."\">","</label>");
	else 
		$xt->assign("md5secret_label", true);
	
	$xt->assign("md5secret_fieldblock", true);		
	$xt->assignbyref("md5secret_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("md5secret_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("md5secret_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_md5secret", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("md5secret", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("md5secret")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("deny");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "deny";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("deny_label","<label for=\"".GetInputElementId("deny", $id)."\">","</label>");
	else 
		$xt->assign("deny_label", true);
	
	$xt->assign("deny_fieldblock", true);		
	$xt->assignbyref("deny_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("deny_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("deny_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_deny", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("deny", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("deny")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("permit");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "permit";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("permit_label","<label for=\"".GetInputElementId("permit", $id)."\">","</label>");
	else 
		$xt->assign("permit_label", true);
	
	$xt->assign("permit_fieldblock", true);		
	$xt->assignbyref("permit_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("permit_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("permit_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_permit", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("permit", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("permit")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("mask");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "mask";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("mask_label","<label for=\"".GetInputElementId("mask", $id)."\">","</label>");
	else 
		$xt->assign("mask_label", true);
	
	$xt->assign("mask_fieldblock", true);		
	$xt->assignbyref("mask_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("mask_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("mask_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_mask", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("mask", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("mask")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("musiconhold");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "musiconhold";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("musiconhold_label","<label for=\"".GetInputElementId("musiconhold", $id)."\">","</label>");
	else 
		$xt->assign("musiconhold_label", true);
	
	$xt->assign("musiconhold_fieldblock", true);		
	$xt->assignbyref("musiconhold_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("musiconhold_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("musiconhold_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_musiconhold", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("musiconhold", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("musiconhold")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("pickupgroup");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "pickupgroup";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("pickupgroup_label","<label for=\"".GetInputElementId("pickupgroup", $id)."\">","</label>");
	else 
		$xt->assign("pickupgroup_label", true);
	
	$xt->assign("pickupgroup_fieldblock", true);		
	$xt->assignbyref("pickupgroup_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("pickupgroup_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("pickupgroup_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_pickupgroup", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("pickupgroup", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("pickupgroup")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("qualify");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "qualify";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("qualify_label","<label for=\"".GetInputElementId("qualify", $id)."\">","</label>");
	else 
		$xt->assign("qualify_label", true);
	
	$xt->assign("qualify_fieldblock", true);		
	$xt->assignbyref("qualify_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("qualify_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("qualify_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_qualify", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("qualify", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("qualify")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("rtcachefriends");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "rtcachefriends";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("rtcachefriends_label","<label for=\"".GetInputElementId("rtcachefriends", $id)."\">","</label>");
	else 
		$xt->assign("rtcachefriends_label", true);
	
	$xt->assign("rtcachefriends_fieldblock", true);		
	$xt->assignbyref("rtcachefriends_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("rtcachefriends_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("rtcachefriends_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_rtcachefriends", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("rtcachefriends", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("rtcachefriends")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("regexten");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "regexten";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("regexten_label","<label for=\"".GetInputElementId("regexten", $id)."\">","</label>");
	else 
		$xt->assign("regexten_label", true);
	
	$xt->assign("regexten_fieldblock", true);		
	$xt->assignbyref("regexten_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("regexten_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("regexten_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_regexten", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("regexten", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("regexten")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("restrictcid");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "restrictcid";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("restrictcid_label","<label for=\"".GetInputElementId("restrictcid", $id)."\">","</label>");
	else 
		$xt->assign("restrictcid_label", true);
	
	$xt->assign("restrictcid_fieldblock", true);		
	$xt->assignbyref("restrictcid_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("restrictcid_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("restrictcid_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_restrictcid", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("restrictcid", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("restrictcid")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("rtptimeout");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "rtptimeout";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("rtptimeout_label","<label for=\"".GetInputElementId("rtptimeout", $id)."\">","</label>");
	else 
		$xt->assign("rtptimeout_label", true);
	
	$xt->assign("rtptimeout_fieldblock", true);		
	$xt->assignbyref("rtptimeout_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("rtptimeout_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("rtptimeout_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_rtptimeout", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("rtptimeout", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("rtptimeout")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("rtpholdtimeout");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "rtpholdtimeout";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("rtpholdtimeout_label","<label for=\"".GetInputElementId("rtpholdtimeout", $id)."\">","</label>");
	else 
		$xt->assign("rtpholdtimeout_label", true);
	
	$xt->assign("rtpholdtimeout_fieldblock", true);		
	$xt->assignbyref("rtpholdtimeout_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("rtpholdtimeout_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("rtpholdtimeout_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_rtpholdtimeout", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("rtpholdtimeout", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("rtpholdtimeout")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("secret");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "secret";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("secret_label","<label for=\"".GetInputElementId("secret", $id)."\">","</label>");
	else 
		$xt->assign("secret_label", true);
	
	$xt->assign("secret_fieldblock", true);		
	$xt->assignbyref("secret_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("secret_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("secret_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_secret", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("secret", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("secret")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("setvar");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "setvar";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("setvar_label","<label for=\"".GetInputElementId("setvar", $id)."\">","</label>");
	else 
		$xt->assign("setvar_label", true);
	
	$xt->assign("setvar_fieldblock", true);		
	$xt->assignbyref("setvar_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("setvar_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("setvar_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_setvar", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("setvar", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("setvar")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("disallow");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "disallow";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("disallow_label","<label for=\"".GetInputElementId("disallow", $id)."\">","</label>");
	else 
		$xt->assign("disallow_label", true);
	
	$xt->assign("disallow_fieldblock", true);		
	$xt->assignbyref("disallow_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("disallow_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("disallow_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_disallow", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("disallow", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("disallow")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("allow");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "allow";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("allow_label","<label for=\"".GetInputElementId("allow", $id)."\">","</label>");
	else 
		$xt->assign("allow_label", true);
	
	$xt->assign("allow_fieldblock", true);		
	$xt->assignbyref("allow_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("allow_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("allow_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_allow", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("allow", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("allow")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("fullcontact");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "fullcontact";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("fullcontact_label","<label for=\"".GetInputElementId("fullcontact", $id)."\">","</label>");
	else 
		$xt->assign("fullcontact_label", true);
	
	$xt->assign("fullcontact_fieldblock", true);		
	$xt->assignbyref("fullcontact_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("fullcontact_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("fullcontact_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_fullcontact", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("fullcontact", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("fullcontact")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("ipaddr");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "ipaddr";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("ipaddr_label","<label for=\"".GetInputElementId("ipaddr", $id)."\">","</label>");
	else 
		$xt->assign("ipaddr_label", true);
	
	$xt->assign("ipaddr_fieldblock", true);		
	$xt->assignbyref("ipaddr_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("ipaddr_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("ipaddr_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_ipaddr", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("ipaddr", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("ipaddr")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("port");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "port";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("port_label","<label for=\"".GetInputElementId("port", $id)."\">","</label>");
	else 
		$xt->assign("port_label", true);
	
	$xt->assign("port_fieldblock", true);		
	$xt->assignbyref("port_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("port_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("port_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_port", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("port", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("port")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("regserver");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "regserver";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("regserver_label","<label for=\"".GetInputElementId("regserver", $id)."\">","</label>");
	else 
		$xt->assign("regserver_label", true);
	
	$xt->assign("regserver_fieldblock", true);		
	$xt->assignbyref("regserver_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("regserver_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("regserver_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_regserver", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("regserver", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("regserver")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("regseconds");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "regseconds";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("regseconds_label","<label for=\"".GetInputElementId("regseconds", $id)."\">","</label>");
	else 
		$xt->assign("regseconds_label", true);
	
	$xt->assign("regseconds_fieldblock", true);		
	$xt->assignbyref("regseconds_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("regseconds_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("regseconds_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_regseconds", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("regseconds", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("regseconds")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("lastms");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "lastms";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("lastms_label","<label for=\"".GetInputElementId("lastms", $id)."\">","</label>");
	else 
		$xt->assign("lastms_label", true);
	
	$xt->assign("lastms_fieldblock", true);		
	$xt->assignbyref("lastms_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("lastms_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("lastms_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_lastms", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("lastms", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("lastms")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("username");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "username";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("username_label","<label for=\"".GetInputElementId("username", $id)."\">","</label>");
	else 
		$xt->assign("username_label", true);
	
	$xt->assign("username_fieldblock", true);		
	$xt->assignbyref("username_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("username_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("username_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_username", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("username", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("username")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("defaultuser");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "defaultuser";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("defaultuser_label","<label for=\"".GetInputElementId("defaultuser", $id)."\">","</label>");
	else 
		$xt->assign("defaultuser_label", true);
	
	$xt->assign("defaultuser_fieldblock", true);		
	$xt->assignbyref("defaultuser_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("defaultuser_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("defaultuser_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_defaultuser", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("defaultuser", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("defaultuser")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("subscribecontext");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "subscribecontext";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("subscribecontext_label","<label for=\"".GetInputElementId("subscribecontext", $id)."\">","</label>");
	else 
		$xt->assign("subscribecontext_label", true);
	
	$xt->assign("subscribecontext_fieldblock", true);		
	$xt->assignbyref("subscribecontext_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("subscribecontext_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("subscribecontext_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_subscribecontext", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("subscribecontext", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("subscribecontext")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("useragent");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "useragent";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("useragent_label","<label for=\"".GetInputElementId("useragent", $id)."\">","</label>");
	else 
		$xt->assign("useragent_label", true);
	
	$xt->assign("useragent_fieldblock", true);		
	$xt->assignbyref("useragent_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("useragent_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("useragent_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_useragent", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("useragent", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("useragent")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("gateway");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "gateway";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("gateway_label","<label for=\"".GetInputElementId("gateway", $id)."\">","</label>");
	else 
		$xt->assign("gateway_label", true);
	
	$xt->assign("gateway_fieldblock", true);		
	$xt->assignbyref("gateway_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("gateway_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("gateway_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_gateway", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("gateway", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("gateway")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("id_horario");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "id_horario";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("id_horario_label","<label for=\"".GetInputElementId("id_horario", $id)."\">","</label>");
	else 
		$xt->assign("id_horario_label", true);
	
	$xt->assign("id_horario_fieldblock", true);		
	$xt->assignbyref("id_horario_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("id_horario_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("id_horario_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_id_horario", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("id_horario", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("id_horario")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("mail");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "mail";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("mail_label","<label for=\"".GetInputElementId("mail", $id)."\">","</label>");
	else 
		$xt->assign("mail_label", true);
	
	$xt->assign("mail_fieldblock", true);		
	$xt->assignbyref("mail_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("mail_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("mail_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_mail", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("mail", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("mail")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("grava_chamada");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "grava_chamada";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("grava_chamada_label","<label for=\"".GetInputElementId("grava_chamada", $id)."\">","</label>");
	else 
		$xt->assign("grava_chamada_label", true);
	
	$xt->assign("grava_chamada_fieldblock", true);		
	$xt->assignbyref("grava_chamada_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("grava_chamada_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("grava_chamada_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_grava_chamada", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("grava_chamada", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("grava_chamada")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("tp_ramal");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "tp_ramal";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("tp_ramal_label","<label for=\"".GetInputElementId("tp_ramal", $id)."\">","</label>");
	else 
		$xt->assign("tp_ramal_label", true);
	
	$xt->assign("tp_ramal_fieldblock", true);		
	$xt->assignbyref("tp_ramal_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("tp_ramal_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("tp_ramal_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_tp_ramal", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("tp_ramal", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("tp_ramal")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("id_interf");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "id_interf";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("id_interf_label","<label for=\"".GetInputElementId("id_interf", $id)."\">","</label>");
	else 
		$xt->assign("id_interf_label", true);
	
	$xt->assign("id_interf_fieldblock", true);		
	$xt->assignbyref("id_interf_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("id_interf_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("id_interf_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_id_interf", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("id_interf", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("id_interf")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("tp_chamada");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "tp_chamada";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("tp_chamada_label","<label for=\"".GetInputElementId("tp_chamada", $id)."\">","</label>");
	else 
		$xt->assign("tp_chamada_label", true);
	
	$xt->assign("tp_chamada_fieldblock", true);		
	$xt->assignbyref("tp_chamada_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("tp_chamada_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("tp_chamada_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_tp_chamada", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("tp_chamada", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("tp_chamada")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("flg_cadeado");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "flg_cadeado";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("flg_cadeado_label","<label for=\"".GetInputElementId("flg_cadeado", $id)."\">","</label>");
	else 
		$xt->assign("flg_cadeado_label", true);
	
	$xt->assign("flg_cadeado_fieldblock", true);		
	$xt->assignbyref("flg_cadeado_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("flg_cadeado_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("flg_cadeado_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_flg_cadeado", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("flg_cadeado", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("flg_cadeado")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("id_pesquisa");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "id_pesquisa";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("id_pesquisa_label","<label for=\"".GetInputElementId("id_pesquisa", $id)."\">","</label>");
	else 
		$xt->assign("id_pesquisa_label", true);
	
	$xt->assign("id_pesquisa_fieldblock", true);		
	$xt->assignbyref("id_pesquisa_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("id_pesquisa_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("id_pesquisa_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_id_pesquisa", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("id_pesquisa", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("id_pesquisa")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("desvio_ddr");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "desvio_ddr";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("desvio_ddr_label","<label for=\"".GetInputElementId("desvio_ddr", $id)."\">","</label>");
	else 
		$xt->assign("desvio_ddr_label", true);
	
	$xt->assign("desvio_ddr_fieldblock", true);		
	$xt->assignbyref("desvio_ddr_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("desvio_ddr_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("desvio_ddr_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_desvio_ddr", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("desvio_ddr", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("desvio_ddr")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("id_saida");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "id_saida";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("id_saida_label","<label for=\"".GetInputElementId("id_saida", $id)."\">","</label>");
	else 
		$xt->assign("id_saida_label", true);
	
	$xt->assign("id_saida_fieldblock", true);		
	$xt->assignbyref("id_saida_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("id_saida_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("id_saida_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_id_saida", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("id_saida", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("id_saida")."', ".$pageObject->id.", ".$ctrlsMap.");";
	$pageObject->AddJsCode($regBlocksJS);
	
	//--------------------------------------------------------
	
	$pageObject->body["begin"] .= $includes;

	$pageObject->addCommonJs();
		
	$xt->assignbyref("body",$pageObject->body);

	$contents_block=array();
	$contents_block["begin"]="<form method=\"POST\" ";
	if(isset( $_GET["rname"]))
	{
		$contents_block["begin"].="action=\"dreport.php?rname=".htmlspecialchars(rawurlencode(postvalue("rname")))."\" ";
	}	
	else if(isset( $_GET["cname"]))
	{
		$contents_block["begin"].="action=\"dchart.php?cname=".htmlspecialchars(rawurlencode(postvalue("cname")))."\" ";
	}	
	else
	{
	$contents_block["begin"].="action=\"admin_members_list.php\" ";
	}
	//$contents_block["begin"].='name="'.$formname.'"><input type="hidden" id="a" name="a" value="advsearch">';
	$contents_block["begin"].='name="'.$formname.'" id="'.$formname.'"><input type="hidden" id="a" name="a" value="advsearch"></form>';
	//$contents_block["end"]="</form>";
	$xt->assignbyref("contents_block",$contents_block);
	
	$xt->assign("searchbutton_attrs", "onClick=\"javascript: searchController".$searchControllerId.".submitSearch();\"");
	
	//$xt->assign("searchbutton_attrs","name=\"SearchButton\" onclick=\"javascript:document.forms.".$formname.".submit();\"");
	$xt->assign("resetbutton_attrs","onclick=\"return searchController".$searchControllerId.".resetCtrls();\"");
	
	$xt->assign("backbutton_attrs","onclick=\"searchController".$searchControllerId.".returnSubmit();\"");
	
	$xt->assign("conditions_block",true);
	$xt->assign("search_button",true);
	$xt->assign("reset_button",true);
	$xt->assign("back_button",true);
	
	
	if(function_exists("BeforeShowSearch"))
		BeforeShowSearch($xt,$templatefile);
	// load controls for first page loading	
	$pageObject->body["end"] .= "</form><script>".$pageObject->PrepareJs()."</script>";	
	$xt->assignbyref("body",$pageObject->body);
	$xt->display($templatefile);
	exit();	
}
else if($mode==SEARCH_LOAD_CONTROL)
{	
	$searchControlBuilder = new PanelSearchControl($searchControllerId, $strTableName, $searchObject, $pageObject);
	
	$ctrlField = postvalue('ctrlField');					
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $ctrlField, 0, '', false, true, '', '');
	// add js code
	$searchSuggestJS = $searchControlBuilder->createSearchSuggestJS($ctrlField, $id);
	$pageObject->AddJsCode($searchSuggestJS);
	// build array for encode
	$resArr = array();
	$resArr['control1'] = trim($xt->call_func($ctrlBlockArr['searchcontrol']));
	$resArr['control2'] = trim($xt->call_func($ctrlBlockArr['searchcontrol1']));
	$resArr['comboHtml'] = trim($ctrlBlockArr['searchtype']);
	$resArr['delButt'] = trim($ctrlBlockArr['delCtrlButt']);
	$resArr['delButtId'] =  trim($searchControlBuilder->getDelButtonId($ctrlField, $id));
	$resArr['divInd'] = trim($id);
	$resArr['jsCode'] = trim($pageObject->PrepareJs());
	$resArr['fLabel'] = GetFieldLabel(GoodFieldName($strTableName),GoodFieldName($ctrlField));
	// return JSON
	echo my_json_encode($resArr);
	exit();
}
	

?>
