<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
add_nocache_headers();

include("include/cc_tipos_pausa_atend_variables.php");
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
$templatefile = "cc_tipos_pausa_atend_search.htm";

// for ajax query, used when page buffers new control
if(postvalue("mode")=="inlineLoadCtrl"){
	$mode=SEARCH_LOAD_CONTROL;
	$templatefile = "cc_tipos_pausa_atend_inline_search.htm";
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
$params['shortTableName'] = 'cc_tipos_pausa_atend';
$params['origTName'] = $strOriginalTableName;
$params['dataSourceTable'] = "cc_tipos_pausa_atend";
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
	$srchFields = $searchObject->getSearchCtrlParams("idt_pausa_atend");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "idt_pausa_atend";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("idt_pausa_atend_label","<label for=\"".GetInputElementId("idt_pausa_atend", $id)."\">","</label>");
	else 
		$xt->assign("idt_pausa_atend_label", true);
	
	$xt->assign("idt_pausa_atend_fieldblock", true);		
	$xt->assignbyref("idt_pausa_atend_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("idt_pausa_atend_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("idt_pausa_atend_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_idt_pausa_atend", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("idt_pausa_atend", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("idt_pausa_atend")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("dt_acao_pausa");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "dt_acao_pausa";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("dt_acao_pausa_label","<label for=\"".GetInputElementId("dt_acao_pausa", $id)."\">","</label>");
	else 
		$xt->assign("dt_acao_pausa_label", true);
	
	$xt->assign("dt_acao_pausa_fieldblock", true);		
	$xt->assignbyref("dt_acao_pausa_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("dt_acao_pausa_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("dt_acao_pausa_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_dt_acao_pausa", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("dt_acao_pausa", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("dt_acao_pausa")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("hr_acao_pausa");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "hr_acao_pausa";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("hr_acao_pausa_label","<label for=\"".GetInputElementId("hr_acao_pausa", $id)."\">","</label>");
	else 
		$xt->assign("hr_acao_pausa_label", true);
	
	$xt->assign("hr_acao_pausa_fieldblock", true);		
	$xt->assignbyref("hr_acao_pausa_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("hr_acao_pausa_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("hr_acao_pausa_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_hr_acao_pausa", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("hr_acao_pausa", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("hr_acao_pausa")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("tp_pausa");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "tp_pausa";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("tp_pausa_label","<label for=\"".GetInputElementId("tp_pausa", $id)."\">","</label>");
	else 
		$xt->assign("tp_pausa_label", true);
	
	$xt->assign("tp_pausa_fieldblock", true);		
	$xt->assignbyref("tp_pausa_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("tp_pausa_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("tp_pausa_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_tp_pausa", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("tp_pausa", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("tp_pausa")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("Agente");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Agente";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("Agente_label","<label for=\"".GetInputElementId("Agente", $id)."\">","</label>");
	else 
		$xt->assign("Agente_label", true);
	
	$xt->assign("Agente_fieldblock", true);		
	$xt->assignbyref("Agente_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("Agente_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("Agente_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_Agente", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("Agente", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("Agente")."', ".$pageObject->id.", ".$ctrlsMap.");";
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
	$srchFields = $searchObject->getSearchCtrlParams("Fila");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "Fila";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("Fila_label","<label for=\"".GetInputElementId("Fila", $id)."\">","</label>");
	else 
		$xt->assign("Fila_label", true);
	
	$xt->assign("Fila_fieldblock", true);		
	$xt->assignbyref("Fila_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("Fila_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("Fila_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_Fila", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("Fila", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("Fila")."', ".$pageObject->id.", ".$ctrlsMap.");";
	// search fields data
	$srchFields = $searchObject->getSearchCtrlParams("tipo_pausa");
	$firstFieldParams = array();
	if (count($srchFields))
	{
		$firstFieldParams = $srchFields[0];
	}
	else
	{
		$firstFieldParams['fName'] = "tipo_pausa";
		$firstFieldParams['eType'] = '';
		$firstFieldParams['value1'] = '';
		$firstFieldParams['opt'] = '';
		$firstFieldParams['value2'] = '';
		$firstFieldParams['not'] = false;
	}
	// create control		
	$ctrlBlockArr = $searchControlBuilder->buildSearchCtrlBlockArr($id, $firstFieldParams['fName'], 0, $firstFieldParams['opt'], $firstFieldParams['not'], false, $firstFieldParams['value1'], $firstFieldParams['value2']);	

	if(isEnableSection508())
		$xt->assign_section("tipo_pausa_label","<label for=\"".GetInputElementId("tipo_pausa", $id)."\">","</label>");
	else 
		$xt->assign("tipo_pausa_label", true);
	
	$xt->assign("tipo_pausa_fieldblock", true);		
	$xt->assignbyref("tipo_pausa_editcontrol", $ctrlBlockArr['searchcontrol']);					
	$xt->assign("tipo_pausa_notbox", $ctrlBlockArr['notbox']);		
	// create second control, if need it		
	$xt->assignbyref("tipo_pausa_editcontrol1", $ctrlBlockArr['searchcontrol1']);		
	// create search type select
	$xt->assign("searchtype_tipo_pausa", $ctrlBlockArr['searchtype']);	
	
	$suggestJS = $searchControlBuilder->createSearchSuggestJS("tipo_pausa", $id);
	$pageObject->AddJsCode($suggestJS);
	
	$ctrlsMap = $ctrlBlockArr['searchcontrol1'] ? "[0,1]" : "[0]";
	$regBlocksJS .= "searchController".$searchControllerId.".addRegCtrlsBlock('".jsreplace("tipo_pausa")."', ".$pageObject->id.", ".$ctrlsMap.");";
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
	$contents_block["begin"].="action=\"cc_tipos_pausa_atend_list.php\" ";
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