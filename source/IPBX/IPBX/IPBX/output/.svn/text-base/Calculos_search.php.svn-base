<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
add_nocache_headers();

include("include/Calculos_variables.php");
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
$templatefile = "Calculos_search.htm";

// for ajax query, used when page buffers new control
if(postvalue("mode")=="inlineLoadCtrl"){
	$mode=SEARCH_LOAD_CONTROL;
	$templatefile = "Calculos_inline_search.htm";
}	
	
$xt->assign("id", $id);
$formname = "frmSearch".$id;

$calendar = false;
$calendar = true;

$params = array();
$params["id"] = $id;
$params["mode"] = $mode;
$params["calendar"] = $calendar;
$params['xt'] = &$xt;
$params['shortTableName'] = 'Calculos';
$params['origTName'] = $strOriginalTableName;
$params['dataSourceTable'] = "Calculos";
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
	$srchFields = $searchObject->getSearchCtrlParams("calldate");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "calldate";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("calldate_label","<label for=\"".GetInputElementId("calldate", $id)."\">","</label>");
	else 
		$xt->assign("calldate_label", true);
	
	$xt->assign("calldate_fieldblock", true);		
	$xt->assignbyref("calldate_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("calldate_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("calldate_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_calldate", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("calldate", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("calldate")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("clid");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "clid";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("clid_label","<label for=\"".GetInputElementId("clid", $id)."\">","</label>");
	else 
		$xt->assign("clid_label", true);
	
	$xt->assign("clid_fieldblock", true);		
	$xt->assignbyref("clid_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("clid_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("clid_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_clid", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("clid", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("clid")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("src");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "src";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("src_label","<label for=\"".GetInputElementId("src", $id)."\">","</label>");
	else 
		$xt->assign("src_label", true);
	
	$xt->assign("src_fieldblock", true);		
	$xt->assignbyref("src_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("src_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("src_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_src", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("src", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("src")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("dst");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "dst";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("dst_label","<label for=\"".GetInputElementId("dst", $id)."\">","</label>");
	else 
		$xt->assign("dst_label", true);
	
	$xt->assign("dst_fieldblock", true);		
	$xt->assignbyref("dst_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("dst_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("dst_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_dst", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("dst", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("dst")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("dcontext");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "dcontext";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("dcontext_label","<label for=\"".GetInputElementId("dcontext", $id)."\">","</label>");
	else 
		$xt->assign("dcontext_label", true);
	
	$xt->assign("dcontext_fieldblock", true);		
	$xt->assignbyref("dcontext_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("dcontext_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("dcontext_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_dcontext", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("dcontext", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("dcontext")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("channel");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "channel";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("channel_label","<label for=\"".GetInputElementId("channel", $id)."\">","</label>");
	else 
		$xt->assign("channel_label", true);
	
	$xt->assign("channel_fieldblock", true);		
	$xt->assignbyref("channel_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("channel_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("channel_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_channel", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("channel", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("channel")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("dstchannel");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "dstchannel";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("dstchannel_label","<label for=\"".GetInputElementId("dstchannel", $id)."\">","</label>");
	else 
		$xt->assign("dstchannel_label", true);
	
	$xt->assign("dstchannel_fieldblock", true);		
	$xt->assignbyref("dstchannel_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("dstchannel_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("dstchannel_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_dstchannel", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("dstchannel", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("dstchannel")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("lastapp");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "lastapp";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("lastapp_label","<label for=\"".GetInputElementId("lastapp", $id)."\">","</label>");
	else 
		$xt->assign("lastapp_label", true);
	
	$xt->assign("lastapp_fieldblock", true);		
	$xt->assignbyref("lastapp_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("lastapp_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("lastapp_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_lastapp", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("lastapp", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("lastapp")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("lastdata");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "lastdata";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("lastdata_label","<label for=\"".GetInputElementId("lastdata", $id)."\">","</label>");
	else 
		$xt->assign("lastdata_label", true);
	
	$xt->assign("lastdata_fieldblock", true);		
	$xt->assignbyref("lastdata_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("lastdata_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("lastdata_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_lastdata", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("lastdata", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("lastdata")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("duration");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "duration";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("duration_label","<label for=\"".GetInputElementId("duration", $id)."\">","</label>");
	else 
		$xt->assign("duration_label", true);
	
	$xt->assign("duration_fieldblock", true);		
	$xt->assignbyref("duration_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("duration_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("duration_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_duration", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("duration", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("duration")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("billsec");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "billsec";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("billsec_label","<label for=\"".GetInputElementId("billsec", $id)."\">","</label>");
	else 
		$xt->assign("billsec_label", true);
	
	$xt->assign("billsec_fieldblock", true);		
	$xt->assignbyref("billsec_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("billsec_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("billsec_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_billsec", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("billsec", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("billsec")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("disposition");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "disposition";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("disposition_label","<label for=\"".GetInputElementId("disposition", $id)."\">","</label>");
	else 
		$xt->assign("disposition_label", true);
	
	$xt->assign("disposition_fieldblock", true);		
	$xt->assignbyref("disposition_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("disposition_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("disposition_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_disposition", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("disposition", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("disposition")."', ".$pageObject->id.", ".$ctrlsMap.");";
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
	$srchFields = $searchObject->getSearchCtrlParams("uniqueid");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "uniqueid";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("uniqueid_label","<label for=\"".GetInputElementId("uniqueid", $id)."\">","</label>");
	else 
		$xt->assign("uniqueid_label", true);
	
	$xt->assign("uniqueid_fieldblock", true);		
	$xt->assignbyref("uniqueid_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("uniqueid_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("uniqueid_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_uniqueid", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("uniqueid", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("uniqueid")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("userfield");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "userfield";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("userfield_label","<label for=\"".GetInputElementId("userfield", $id)."\">","</label>");
	else 
		$xt->assign("userfield_label", true);
	
	$xt->assign("userfield_fieldblock", true);		
	$xt->assignbyref("userfield_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("userfield_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("userfield_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_userfield", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("userfield", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("userfield")."', ".$pageObject->id.", ".$ctrlsMap.");";
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
	$contents_block["begin"].="action=\"Calculos_chart.php\" ";
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
