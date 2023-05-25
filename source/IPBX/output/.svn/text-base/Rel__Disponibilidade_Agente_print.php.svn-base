<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
if (@$_REQUEST["format"]!="excel" && @$_REQUEST["format"]!="word") 
{
add_nocache_headers();
}

include("include/Rel__Disponibilidade_Agente_variables.php");

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

include('include/xtempl.php');
include 'classes/runnerpage.php';
$xt = new Xtempl();

$id = postvalue("id") != "" ? postvalue("id") : 1;
//array of params for classes
$params = array("pageType" => PAGE_PRINT, "id" =>$id, "tName"=>$strTableName);
$pageObject = new RunnerPage($params);

// add onload event
$onLoadJsCode = GetTableData($pageObject->tName, ".jsOnloadPrint", '');
$pageObject->addOnLoadJsEvent($onLoadJsCode);

// add button events if exist
$buttonHandlers = GetTableData($pageObject->tName, ".buttonHandlers_".$pageObject->getPageType(), array());
$pageObject->addButtonHandlers($buttonHandlers);

$sessionPrefix = $strTableName;

//	Before Process event
if(function_exists("BeforeProcessPrint"))
	BeforeProcessPrint($conn);
	
$forExport = false;

if (@$_REQUEST["format"]=="excel")
{
	$forExport = true;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=Rel__Disponibilidade_Agente.xls");
	echo "<html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">";
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$cCharset."\">";
}
else if (@$_REQUEST["format"]=="word")
{
	$forExport = true;
	header("Content-Type: application/vnd.ms-word");
	header("Content-Disposition: attachment;Filename=Rel__Disponibilidade_Agente.doc");
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$cCharset."\">";
}

if(!$_SESSION[$sessionPrefix."_pagenumber"])
	$_SESSION[$sessionPrefix."_pagenumber"]=1;
	
if(!$_SESSION[$sessionPrefix."_pagesize"])
	$_SESSION[$sessionPrefix."_pagesize"]=999;

$PageSize=$_SESSION[$sessionPrefix."_pagesize"];
$bAll = isset($_REQUEST["all"]) && $_REQUEST["all"];
$pagestart = ($_SESSION[$sessionPrefix."_pagenumber"]-1)*$_SESSION[$sessionPrefix."_pagesize"];

if (@$_REQUEST["format"])
{
	//$forExport = true;
	// read stylesheet file
	$cssdata = myfile_get_contents(getabspath("include/style.css"), "r");
	$xt->assign("cssdata",$cssdata);
	$xt->assign("stylesheetlink",false);
	//$bAll=false;
}
else
{
	$xt->assign("cssdata","");
	$xt->assign("stylesheetlink",true);	
}

$strWhereClause = @$_SESSION[$sessionPrefix."_where"];

$strSQL = gSQLWhere($strWhereClause);

$strSQLbak = $strSQL;
if(function_exists("BeforeQueryPrint"))
	BeforeQueryPrint($strSQL,$strWhereClause,$strOrderBy);

if($strSQLbak == $strSQL)
	$strSQL = gSQLWhere($strWhereClause);
LogInfo($strSQL);

//////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['a']) && $_REQUEST['a'] == 'advsearch')
	$search = true;
else
	$search = false;

include('classes/reportlib.php');
include('classes/searchclause.php');


// array with all params
$params = array();


$params['sessionPrefix'] = $sessionPrefix;
// report table info
$params['tName'] = $strTableName;
$params['shortTName'] = "Rel__Disponibilidade_Agente";
$params['repGroupFieldsCount'] = 1;
$params['repPageSummary'] = 0;
$params['repGlobalSummary'] = 0;
$params['repLayout'] = 3;
$params['showGroupSummaryCount'] = 1;
$params['repShowDet'] = 1;


// report field info
$repGroupFields = array();
$groupField = array();
$groupField['strGroupField'] = "agente";
$groupField['groupInterval'] = 0;
$groupField['groupOrder'] = 1;
$groupField['strGroupField'] = "agente";
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
$fieldArr['name'] = "Data";
$fieldArr['goodName'] = "Data";
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
$fieldArr['editFormat'] = "Lookup wizard";
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
$fieldArr['name'] = "agente";
$fieldArr['goodName'] = "agente";
$fieldArr['repPage'] = "1";
$fieldArr['viewFormat'] = "";
$fieldArr['editFormat'] = "Lookup wizard";
$fieldArr['thumbnail'] = "";
$fieldArr['imageWidth'] = 0;
$fieldArr['imageHeight'] = 0;
$fieldArr['fileName'] = "";
$fieldArr['strhlPrefix'] = "files/";
$fieldArr['showThumb'] = 0;
$fieldArr['totalMax'] = false;
$fieldArr['totalMin'] = false;
$fieldArr['totalAvg'] = false;
$fieldArr['totalSum'] = false;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "Logon";
$fieldArr['goodName'] = "Logon";
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
$fieldArr['name'] = "Logout";
$fieldArr['goodName'] = "Logout";
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
$fieldArr['name'] = "TempoDisponivel";
$fieldArr['goodName'] = "TempoDisponivel";
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
$fieldArr['totalAvg'] = true;
$fieldArr['totalSum'] = true;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "TempoPausaNProdutiva";
$fieldArr['goodName'] = "TempoPausaNProdutiva";
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
$fieldArr['totalAvg'] = true;
$fieldArr['totalSum'] = true;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "TempoPausaProdutiva";
$fieldArr['goodName'] = "TempoPausaProdutiva";
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
$fieldArr['totalAvg'] = true;
$fieldArr['totalSum'] = true;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "TempoPausa";
$fieldArr['goodName'] = "TempoPausa";
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
$fieldArr['totalAvg'] = true;
$fieldArr['totalSum'] = true;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "TempoAtendimento";
$fieldArr['goodName'] = "TempoAtendimento";
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
$fieldArr['totalAvg'] = true;
$fieldArr['totalSum'] = true;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;
$fieldArr = array();
$fieldArr['name'] = "TempoLivre";
$fieldArr['goodName'] = "TempoLivre";
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
$fieldArr['totalAvg'] = true;
$fieldArr['totalSum'] = true;
$fieldArr['showThumb'] = 0;
$params['fieldsArr'][] = $fieldArr;

// SearchClause class stuff
if (isset($_SESSION[$sessionPrefix.'_advsearch']))
{
	$searchClauseObj = unserialize($_SESSION[$sessionPrefix.'_advsearch']);
		
}else{
	$allSearchFields = GetTableData($strTableName, '.allSearchFields', array());
	$searchClauseObj = new SearchClause($strTableName, $allSearchFields, $sessionPrefix);
}

$searchClauseObj->parseRequest();	

$oHaving = $gQuery->Having();
$sqlHaving = $oHaving->toSql($gQuery);

$sqlGroupBy = $gQuery->GroupByToSql();

$rb = new Report(array($gsqlHead, $gsqlFrom, $gsqlWhereExpr, $sqlGroupBy, $sqlHaving), $g_orderindexes, $searchClauseObj, $conn, $PageSize, 999, $params);
$rb->forExport = $forExport;


$_SESSION[$sessionPrefix.'_advsearch'] = serialize($searchClauseObj);


$arrReport = $rb->getReport($bAll ? -1 : $pagestart);

//////////////////////////////////////////////////////////////////////////////////////
$pages=array();
if($pagestart == -1 || $bAll)
{
	$pages = $rb->getPages();
	for($i = 0; $i < count($pages); $i++)
	{
		$pages[$i]['grid_row'] = array("data" => $arrReport['list'][$i]);
		$pages[$i]['begin'] = ($i < count($pages) - 1) ? "<div name=page class=printpage>" : "<div name=page>";
		$pages[$i]['end'] = "</div>";
		$pages[$i]['pageno'] = $i+1;
	}
	$xt->assign("maxpages",count($pages));
}
else
{
	$pages[0]['grid_row'] = array("data" => $arrReport['list']);
	$pages[0]['begin'] = "<div name=page class=printpage>";
	$pages[0]['end'] = "</div>";
	$xt->assign("pageno",$_SESSION[$sessionPrefix."_pagenumber"]);
	$xt->assign("maxpages",$arrReport['maxpages']);
}

foreach($arrReport['page'] as $key => $value)
	$xt->assign($key, $value);


$xt->assign_loopsection("page", $pages);
$mypage = $_SESSION[$sessionPrefix."_pagenumber"];
$maxpages = count($pages);






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

$pageObject->body["begin"] .= "<script type=\"text/javascript\" src=\"include/onthefly.js\"></script>";


$pageObject->body["end"] .= "<script type=\"text/javascript\">".$pageObject->PrepareJs()."</script>";
	
	
$xt->assignbyref("body",$pageObject->body);
$xt->assign("grid_block",true);
$xt->assign("grid_header",true);

$xt->assign("Data_fieldheader",true);
$xt->assign("agente_fieldheader",true);
$xt->assign("Fila_fieldheader",true);
$xt->assign("Logon_fieldheader",true);
$xt->assign("Logout_fieldheader",true);
$xt->assign("TempoDisponivel_fieldheader",true);
$xt->assign("TempoPausaNProdutiva_fieldheader",true);
$xt->assign("TempoPausaProdutiva_fieldheader",true);
$xt->assign("TempoPausa_fieldheader",true);
$xt->assign("TempoAtendimento_fieldheader",true);
$xt->assign("TempoLivre_fieldheader",true);

if (@$_REQUEST["format"] && $_REQUEST["format"]!="pdf")
{
	$pages[0]["page_summary"]=false;
	$xt->assign_loopsection("page",$pages);
	$xt->assign("pdflink_block",false);
	$pageObject->body["begin"]="";
	$pageObject->body["end"]="";
	$xt->assignbyref("body",$pageObject->body);
}

$templatefile = "Rel__Disponibilidade_Agente_print.htm";
if(function_exists("BeforeShowPrint"))
	BeforeShowPrint($xt,$templatefile);

if(!postvalue("pdf"))
{
	$xt->display($templatefile);

	if (@$_REQUEST["format"]=="pdf")
	{
		echo("<script>RunPDF();</script>");
	}	
}
else
{
}
?>