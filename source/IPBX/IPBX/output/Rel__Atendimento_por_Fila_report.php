<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");

add_nocache_headers();

include("include/Rel__Atendimento_por_Fila_variables.php");

if(!@$_SESSION["UserID"])
{ 
	$_SESSION["MyURL"] = $_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}
if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"], "Search"))
{
	echo "<p>"."Você não tem permissão para acessar esta tabela"." <a href=\"login.php\">"."Voltar à página de Login"."</a></p>";
	return;
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
//array of params for, most of them used by searchPanel class
$params = array("id" =>$id, 
				"tName"=>$strTableName, 
				"pageType" => PAGE_REPORT, 
				"searchClauseObj"=>$searchClauseObj, 
				"shortTableName"=>"Rel__Atendimento_por_Fila",
				"isDisplayLoading"=>GetTableData($strTableName,".isDisplayLoading",false),
				"menuTablesArr"=> $menuTablesArr,
				"isGroupSecurity"=>$isGroupSecurity);
$params["xt"]=&$xt;
$pageObject = new RunnerPage($params);
// add button events if exist
$buttonHandlers = GetTableData($pageObject->tName, ".buttonHandlers_".$pageObject->getPageType(), array());
$pageObject->addButtonHandlers($buttonHandlers);

// add onload event
$onLoadJsCode = GetTableData($pageObject->tName, ".jsOnloadReport", '');
$pageObject->addOnLoadJsEvent($onLoadJsCode);

$pageObject->addCommonJs();

//	Before Process event
if(function_exists("BeforeProcessReport"))
	BeforeProcessReport($conn);

//	process reqest data, fill session variables
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

if(isset($_REQUEST["pagesize"]))
{
	$_SESSION[$sessionPrefix."_pagesize"]=intval($_REQUEST["pagesize"]);
	$_SESSION[$sessionPrefix."_pagenumber"]=1;
}

if(isset($_REQUEST["goto"]))
	$_SESSION[$sessionPrefix."_pagenumber"]=intval($_REQUEST["goto"]);

$pageObject->AddJSFile("include/customlabels");
$pageObject->addJSCode("\nwindow.bSelected=false;");

if(!$_SESSION[$sessionPrefix."_pagenumber"])
	$_SESSION[$sessionPrefix."_pagenumber"]=1;

if(!$_SESSION[$sessionPrefix."_pagesize"])
{
	$_SESSION[$sessionPrefix."_pagesize"] = 5;
}

$PageSize=$_SESSION[$sessionPrefix."_pagesize"];
$pagestart=($_SESSION[$sessionPrefix."_pagenumber"]-1)*$_SESSION[$sessionPrefix."_pagesize"];
$pagelen=$_SESSION[$sessionPrefix."_pagesize"];

////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['a']) && $_REQUEST['a'] == 'advsearch')
	$search = true;
else
	$search = false;

include_once('classes/reportlib.php');


// array with all params
$params = array();


$params['sessionPrefix'] = $sessionPrefix;
// report table info
$params['tName'] = $strTableName;
$params['shortTName'] = "Rel__Atendimento_por_Fila";
$params['repGroupFieldsCount'] = 1;
$params['repPageSummary'] = 0;
$params['repGlobalSummary'] = 0;
$params['repLayout'] = 1;
$params['showGroupSummaryCount'] = 1;
$params['repShowDet'] = 1;


// report field info
$repGroupFields = array();
$groupField = array();
$groupField['strGroupField'] = "Fila";
$groupField['groupInterval'] = 0;
$groupField['groupOrder'] = 1;
$groupField['strGroupField'] = "Fila";
$groupField['showGroupSummary'] = "1";
$repGroupFields[] = $groupField;
$params['repGroupFields'] = &$repGroupFields;



// current table key fields
$params['tKeyFields'] = GetTableKeys($strTableName);
// if any field used for totals
$params['isExistTotalFields'] = true;
// table fields list


$params['fieldsArr'] = array();
$fieldArr = array();
$fieldArr['name'] = "dt_entrada";
$fieldArr['goodName'] = "dt_entrada";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Short Date";
$fieldArr['editFormat'] = "Date";
$fieldArr['thumbnail'] = "";
$fieldArr['imageWidth'] = 0;
$fieldArr['imageHeight'] = 0;
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['showThumb'] = 0;
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Fila";
$fieldArr['goodName'] = "Fila";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "";
$fieldArr['imageWidth'] = 0;
$fieldArr['imageHeight'] = 0;
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['showThumb'] = 0;
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "hr_entrada";
$fieldArr['goodName'] = "hr_entrada";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Time";
$fieldArr['editFormat'] = "Time";
$fieldArr['thumbnail'] = "";
$fieldArr['imageWidth'] = 0;
$fieldArr['imageHeight'] = 0;
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['showThumb'] = 0;
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "hr_atendimento";
$fieldArr['goodName'] = "hr_atendimento";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Time";
$fieldArr['editFormat'] = "Time";
$fieldArr['thumbnail'] = "";
$fieldArr['imageWidth'] = 0;
$fieldArr['imageHeight'] = 0;
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['showThumb'] = 0;
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Telefone";
$fieldArr['goodName'] = "Telefone";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "";
$fieldArr['editFormat'] = "Text field";
$fieldArr['thumbnail'] = "";
$fieldArr['imageWidth'] = 0;
$fieldArr['imageHeight'] = 0;
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['showThumb'] = 0;
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "tp_espera";
$fieldArr['goodName'] = "tp_espera";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Time";
$fieldArr['editFormat'] = "Time";
$fieldArr['thumbnail'] = "";
$fieldArr['imageWidth'] = 0;
$fieldArr['imageHeight'] = 0;
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['showThumb'] = 0;
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "tp_atendimento";
$fieldArr['goodName'] = "tp_atendimento";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Time";
$fieldArr['editFormat'] = "Time";
$fieldArr['thumbnail'] = "";
$fieldArr['imageWidth'] = 0;
$fieldArr['imageHeight'] = 0;
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['showThumb'] = 0;
$fieldArr['totalMax'] = true;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = true;
$fieldArr['totalSum'] = false;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "TMO";
$fieldArr['goodName'] = "TMO";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "Time";
$fieldArr['editFormat'] = "Time";
$fieldArr['thumbnail'] = "";
$fieldArr['imageWidth'] = 0;
$fieldArr['imageHeight'] = 0;
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "";
$fieldArr['showThumb'] = 0;
$fieldArr['totalMax'] = true;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = true;
$fieldArr['totalSum'] = false;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;

$oHaving = $gQuery->Having();
$sqlHaving = $oHaving->toSql($gQuery);

$sqlGroupBy = $gQuery->GroupByToSql();

if(GetTableData($strTableName,".noRecordsFirstPage",false) && ! count($_GET) && ! count($_POST))
	$gsqlWhereExpr = whereAdd($gsqlWhereExpr, "1=0");


$strSecuritySql = SecuritySQL("Search", $strTableName);
$gsqlWhereExpr = whereAdd($gsqlWhereExpr, $strSecuritySql);
			
$rb = new Report(array($gsqlHead, $gsqlFrom, $gsqlWhereExpr, $sqlGroupBy, $sqlHaving), $g_orderindexes, $searchClauseObj, $conn, $_SESSION[$sessionPrefix."_pagesize"], -1, $params);

$_SESSION[$sessionPrefix.'_advsearch'] = serialize($searchClauseObj);
	
	
$arrReport = $rb->getReport($pagestart);

foreach($arrReport['page'] as $key => $value)
	$xt->assign($key, $value);

foreach($arrReport['global'] as $key => $value)
	$xt->assign($key, $value);

$xt->assign('grid_row', array('data' => $arrReport['list']));
////////////////////////////////////////////////////////////////////////////////////////

$mypage=$_SESSION[$sessionPrefix."_pagenumber"];
$maxpages=$arrReport['maxpages'];
//	write pagination
if($maxpages>1)
{
	$xt->assign("pagination_block",true);
	$pageObject->addJSCode("WritePagination(".$mypage.",".$maxpages.", ".$id.");
		window.GotoPage = function (nPageNumber)
		{
			window.location='Rel__Atendimento_por_Fila_report.php?goto='+nPageNumber;
		}
	");
	
	$xt->assign("pagination","<div id=\"pagination".$id."\"></div>");
}

// set groups or records per peage selected option
if ($PageSize != -1)
{
	$rppName = 	'rpp'.$PageSize.'_selected';
}
else 
{
	$rppName = 'rpp_all_selected';
}
$xt->assign($rppName, 'selected');


$xt->assign("security_block",true);
$xt->assign("username",htmlspecialchars($_SESSION["UserID"]));
$xt->assign("logoutlink_attrs","onclick=\"window.location.href='login.php?a=logout';return false;\"");

$pageObject->createOldMenu();

if($pageObject->isCreateMenu())
{
	$xt->assign("menu_block",true);
	$xt->assign("menustyle_block",true);
}
$xt->assign("quickjump_attrs","onchange=\"window.location.href=this.options[this.selectedIndex].value;\"");


$strPerm = GetUserPermissions();
$allow_add=(strpos($strPerm,"A")!==false);
$allow_delete=(strpos($strPerm,"D")!==false);
$allow_edit=(strpos($strPerm,"E")!==false);
$allow_search=(strpos($strPerm,"S")!==false);
$allow_export=(strpos($strPerm,"P")!==false);
$allow_import=(strpos($strPerm,"I")!==false);

$xt->assign("toplinks_block",$allow_search);
$xt->assign("asearch_link",$allow_search);
$xt->assign("asearchlink_attrs","onclick=\"window.location.href='Rel__Atendimento_por_Fila_search.php';return false;\"");
$xt->assign("print_link",$allow_export);
$xt->assign("printall_link",$allow_export);
$xt->assign("export_link",$allow_export);
$xt->assign("printlink_attrs","onclick=\"window.open('Rel__Atendimento_por_Fila_print.php','wPrint');return false;\"");
$xt->assign("printalllink_attrs","onclick=\"window.open('Rel__Atendimento_por_Fila_print.php?all=1','wPrint');return false;\"");
$xt->assign("recordspp_block",$allow_search);
$xt->assign("grid_block",$allow_search);

if(IsAdmin())
	$xt->assign("adminarea_link",true);
$xt->assign("adminarealink_attrs","onclick=\"window.location.href='admin_rights_list.php';return false;\"");
$xt->assign("changepwd_link",$_SESSION["AccessLevel"] != ACCESS_LEVEL_GUEST);
$xt->assign("changepwdlink_attrs","onclick=\"window.location.href='changepwd.php';return false;\"");



// assign for lheader

// create searchPanel
$args = array();
$args['pageObj'] = &$pageObject;
$searchPanelObj = new SearchPanelSimple($args);
$searchPanelObj->buildSearchPanel('adv_search_panel');


function displayBody(&$params) 
{	
	echo "\r\n","<script>".$params['pageObject']->PrepareJS()."</script>";
}

if(GetTableData($strTableName,".useIbox",false)) 
{
	$pageObject->AddJSFile("include/ibox");
	$pageObject->AddCSSFile("include/ibox");	
	$pageObject->AddJsCode("init_ibox();");	
}


$pageObject->body["begin"] .= "<script type=\"text/javascript\" src=\"include/jquery.js\"></script>".
"<script type=\"text/javascript\" src=\"include/jsfunctions.js\"></script>";

if ($pageObject->debugJSMode === true)
{

	$pageObject->body["begin"] .= "<script type=\"text/javascript\" src=\"include/runnerJS/Runner.js\"></script>".
		"<script type=\"text/javascript\" src=\"include/runnerJS/Util.js\"></script>";
}
else
{
	$pageObject->body["begin"] .= "<script type=\"text/javascript\" src=\"include/runnerJS/RunnerBase.js\"></script>";
}





$pageObject->body["begin"] .= ($pageObject->isDisplayLoading ? "<script type=\"text/javascript\">runLoading(".$id.",document.body,0);</script>" : "").
				'<form id="frmSearch'.$id.'" name="frmSearch'.$id.'" method="GET" action="'.GetTableURL($strTableName).'_report.php"></form>'.
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

$xt->assign("details_block", $arrReport['countRows']!=0);
$xt->assign("records_found", $arrReport['countRows']);
$xt->assign("pages_block", $arrReport['countRows']!=0);
$xt->assign("page", $mypage);
$xt->assign("maxpages", $maxpages);

$xt->assign("style_block",true);
$xt->assign("shiftstyle_block", true);
// end assign for lheader

$templatefile = "Rel__Atendimento_por_Fila_report.htm";
if(function_exists("BeforeShowReport"))
	BeforeShowReport($xt,$templatefile);
$xt->display($templatefile);

?>
