<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/desvios_variables.php");
include('include/xtempl.php');
include('classes/runnerpage.php');

//	check if logged in
if(@$_SESSION["UserID"] && IsAdmin() && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Add"))
{
	echo "<p>"."Você não tem permissão para acessar esta tabela"."<br>Proceed to <a href=\"admin.php\">Admin Area</a> to set up user permissions</p>";
	return;
}
if(!@$_SESSION["UserID"] || !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Add"))
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}


$filename="";
$status="";
$message="";
$mesClass = "";
$usermessage="";
$error_happened=false;
$readavalues=false;

$keys=array();
$showKeys = array();
$showValues = array();
$showRawValues = array();
$showFields = array();
$showDetailKeys = array();
$IsSaved = false;
$HaveData = true;

$sessionPrefix = $strTableName;

if(@$_REQUEST["editType"]=="inline")
	$inlineadd=ADD_INLINE;
elseif(@$_REQUEST["editType"]=="onthefly")
{
	$inlineadd=ADD_ONTHEFLY;
	$sessionPrefix = $strTableName."_add";	
}
elseif(@$_REQUEST["editType"]=="addmaster")
	$inlineadd=ADD_MASTER;
else
	$inlineadd=ADD_SIMPLE;

if($inlineadd==ADD_INLINE)
	$templatefile = "desvios_inline_add.htm";
else
	$templatefile = "desvios_add.htm";

if($inlineadd==ADD_ONTHEFLY)
	$id=postvalue("id");	
elseif($inlineadd==ADD_INLINE)
	$id=postvalue("recordID");
else
{
	$id=postvalue("id");
	if(intval($id)==0)
		$id = 1;
}
//If undefined session value for mastet table, but exist post value master table, than take second
//It may be happen only when use dpInline mode on page add
if(!@$_SESSION[$sessionPrefix."_mastertable"] && postvalue("mastertable"))
	$_SESSION[$sessionPrefix."_mastertable"] = postvalue("mastertable");
//Get detail table keys	
$detailKeys = array();
$detailKeys = GetDetailKeysByMasterTable($_SESSION[$sessionPrefix."_mastertable"], $strTableName);	

$xt = new Xtempl();
	
// assign an id		
$xt->assign("id",$id);
$formname="editform".$id;
	

$auditObj = GetAuditObject($strTableName);

//array of params for classes
$params = array("pageType" => PAGE_ADD,"id" => $id,"mode" => $inlineadd);

$params['tName'] = $strTableName;
$params['strOriginalTableName'] = $strOriginalTableName;
$params['menuTablesArr'] = $menuTablesArr;
$params['xt'] = &$xt;
$params['includes_js']=$includes_js;
$params['includes_jsreq']=$includes_jsreq;
$params['includes_css']=$includes_css;
$params['locale_info']=$locale_info;

$pageObject = new RunnerPage($params);

$isCaptchaOk=1;
// proccess captcha
if ($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER)
{
	
}
// end proccess captcha

// add onload event
$onLoadJsCode = GetTableData($pageObject->tName, ".jsOnloadAdd", '');
$pageObject->addOnLoadJsEvent($onLoadJsCode);


if ($inlineadd==ADD_SIMPLE)
{
	// add button events if exist
	$buttonHandlers = GetTableData($pageObject->tName, ".buttonHandlers_".$pageObject->getPageType(), array());
	$pageObject->addButtonHandlers($buttonHandlers);
}
$url_page=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1,12);

$isShowDetailTables = displayDetailsOn($strTableName,PAGE_ADD);
$dpParams = array();
if($isShowDetailTables && ($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER))
{
	$ids = $id;
	if($inlineadd==ADD_SIMPLE)
	{
		$pageObject->AddJSCode("window.dpObj = new dpInlineOnAddEdit({
			'mTableName':'".jsreplace($strTableName)."',
			'mShortTableName':'desvios', 
			'mForm':$('#".$formname."'),
			'mPageType':'".PAGE_ADD."',
			'mMessage':'', 
			'mId':".$id.",
			'ext':'php',
			'dMessages':'', 
			'dCaptions':[],
			'dInlineObjs':[]});
			window.dpInline".$id." = new detailsPreviewInline({'pageId':".$id.",'mode':'add_master'}); 
			window.dpInline".$id.".createPreviewIframe();");
		$pageObject->AddJSFile("include/detailspreview");
	}
}

//	Before Process event
if(function_exists("BeforeProcessAdd"))
	BeforeProcessAdd($conn);

// insert new record if we have to
if(@$_POST["a"]=="added")
{
	$afilename_values=array();
	$avalues=array();
	$blobfields=array();
	$files_move=array();
	$files_save=array();
//	processing ramal - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_ramal_".$id);
	$type=postvalue("type_ramal_".$id);
	if (FieldSubmitted("ramal_".$id))
	{
		$value=prepare_for_db("ramal",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ramal"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ramal"]=$value;
	}
	}
//	processibng ramal - end
//	processing hr_inicio - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_hr_inicio_".$id);
	$type=postvalue("type_hr_inicio_".$id);
	if (FieldSubmitted("hr_inicio_".$id))
	{
		$value=prepare_for_db("hr_inicio",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "hr_inicio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["hr_inicio"]=$value;
	}
	}
//	processibng hr_inicio - end
//	processing hr_fim - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_hr_fim_".$id);
	$type=postvalue("type_hr_fim_".$id);
	if (FieldSubmitted("hr_fim_".$id))
	{
		$value=prepare_for_db("hr_fim",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "hr_fim"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["hr_fim"]=$value;
	}
	}
//	processibng hr_fim - end
//	processing destino - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_destino_".$id);
	$type=postvalue("type_destino_".$id);
	if (FieldSubmitted("destino_".$id))
	{
		$value=prepare_for_db("destino",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "destino"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["destino"]=$value;
	}
	}
//	processibng destino - end
//	processing seg - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_seg_".$id);
	$type=postvalue("type_seg_".$id);
	if (FieldSubmitted("seg_".$id))
	{
		$value=prepare_for_db("seg",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "seg"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["seg"]=$value;
	}
	}
//	processibng seg - end
//	processing ter - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_ter_".$id);
	$type=postvalue("type_ter_".$id);
	if (FieldSubmitted("ter_".$id))
	{
		$value=prepare_for_db("ter",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ter"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ter"]=$value;
	}
	}
//	processibng ter - end
//	processing qua - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_qua_".$id);
	$type=postvalue("type_qua_".$id);
	if (FieldSubmitted("qua_".$id))
	{
		$value=prepare_for_db("qua",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "qua"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["qua"]=$value;
	}
	}
//	processibng qua - end
//	processing qui - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_qui_".$id);
	$type=postvalue("type_qui_".$id);
	if (FieldSubmitted("qui_".$id))
	{
		$value=prepare_for_db("qui",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "qui"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["qui"]=$value;
	}
	}
//	processibng qui - end
//	processing sex - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_sex_".$id);
	$type=postvalue("type_sex_".$id);
	if (FieldSubmitted("sex_".$id))
	{
		$value=prepare_for_db("sex",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "sex"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["sex"]=$value;
	}
	}
//	processibng sex - end
//	processing sab - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_sab_".$id);
	$type=postvalue("type_sab_".$id);
	if (FieldSubmitted("sab_".$id))
	{
		$value=prepare_for_db("sab",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "sab"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["sab"]=$value;
	}
	}
//	processibng sab - end
//	processing dom - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dom_".$id);
	$type=postvalue("type_dom_".$id);
	if (FieldSubmitted("dom_".$id))
	{
		$value=prepare_for_db("dom",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dom"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dom"]=$value;
	}
	}
//	processibng dom - end



	$failed_inline_add=false;
//	add filenames to values
	foreach($afilename_values as $akey=>$value)
		$avalues[$akey]=$value;
	
//	before Add event
	$retval = true;
	if(function_exists("BeforeAdd"))
		$retval=BeforeAdd($avalues,$usermessage,$inlineadd);
	if($retval && $isCaptchaOk == 1)
	{
		if(DoInsertRecord($strOriginalTableName,$avalues,$blobfields,$id))
		{
			$IsSaved=true;
			
//	after edit event
			if($auditObj || function_exists("AfterAdd"))
			{
				foreach($keys as $idx=>$val)
					$avalues[$idx]=$val;
			}
			
			if($auditObj)
				$auditObj->LogAdd($strTableName,$avalues,$keys);

			if(function_exists("AfterAdd"))
				AfterAdd($avalues,$keys,$inlineadd);
				
			if($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER)
			{
				$_SESSION[$strTableName."_count_captcha"] = $_SESSION[$strTableName."_count_captcha"]+1;
				$permis = array();
				$keylink = "";$k = 0;
				foreach($keys as $idx=>$val)
				{
					if($k!=0)
						$keylink .="&";
					$keylink .="editid".(++$k)."=".htmlspecialchars(rawurlencode(@$val));
				}
				$permis = $pageObject->getPermissions();
				$message .="</br>";
				if(GetTableData($strTableName,".edit",false) && $permis['edit'])
					$message .='&nbsp;<a href=\'desvios_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'desvios_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
				$mesClass = "mes_ok";	
			}
		}
		elseif($inlineadd!=ADD_INLINE)
			$mesClass = "mes_not";	
	}
	else
	{
		$message = $usermessage;
		$status="DECLINED";
		$readavalues=true;
	}
}




$message = "<div class='message ".$mesClass."'>".$message."</div>";

// PRG rule, to avoid POSTDATA resend
if (no_output_done() && $inlineadd==ADD_SIMPLE && $IsSaved)
{
	// saving message
	$_SESSION["message"] = ($message ? $message : "");
	// redirect
	header("Location: desvios_".$pageObject->getPageType().".php");
	// turned on output buffering, so we need to stop script
	exit();
}

if($inlineadd==ADD_MASTER && $IsSaved)
	$_SESSION["message"] = ($message ? $message : "");
	
// for PRG rule, to avoid POSTDATA resend. Saving mess in session
if($inlineadd==ADD_SIMPLE && isset($_SESSION["message"]))
{
	$message = $_SESSION["message"];
	unset($_SESSION["message"]);
}

$defvalues=array();

//	copy record
if(array_key_exists("copyid1",$_REQUEST) || array_key_exists("editid1",$_REQUEST))
{
	$copykeys=array();
	if(array_key_exists("copyid1",$_REQUEST))
	{
		$copykeys["id_desvio"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["id_desvio"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id_desvio"]="";
//call CopyOnLoad event
	if(function_exists("CopyOnLoad"))
		CopyOnLoad($defvalues,$strWhere);
}
else
{
}

if($readavalues)
{
	$defvalues["ramal"]=@$avalues["ramal"];
	$defvalues["destino"]=@$avalues["destino"];
	$defvalues["seg"]=@$avalues["seg"];
	$defvalues["ter"]=@$avalues["ter"];
	$defvalues["qua"]=@$avalues["qua"];
	$defvalues["qui"]=@$avalues["qui"];
	$defvalues["sex"]=@$avalues["sex"];
	$defvalues["sab"]=@$avalues["sab"];
	$defvalues["dom"]=@$avalues["dom"];
	$defvalues["hr_inicio"]=@$avalues["hr_inicio"];
	$defvalues["hr_fim"]=@$avalues["hr_fim"];
}
//for basic files
$includes="";
if ($inlineadd!==ADD_INLINE && $inlineadd!=ADD_ONTHEFLY)
	$pageObject->addJSCode("AddEventForControl('".jsreplace($strTableName)."', '', ".$id.");\r\n");

		
	
$onsubmit = $pageObject->onSubmitForEditingPage($formname,$inlineadd);
	

//////////////////////////////////////////////////////////////////	
////////////////////// time picker
$pageObject->AddJSFile("include/ui");
$pageObject->AddJSFile("include/jquery.utils","include/ui");
$pageObject->AddJSFile("include/ui.dropslide","include/jquery.utils");
$pageObject->AddJSFile("include/ui.timepickr","include/ui.dropslide");
$pageObject->AddCSSFile("include/ui.dropslide");
//////////////////////

$pageObject->AddJSFile("include/customlabels");
if(isset($params["calendar"]))
	$pageObject->AddJSFile("include/calendar");
if($inlineadd!=ADD_INLINE)
{
	if($inlineadd!=ADD_ONTHEFLY)
	{
		$includes .="<script language=\"JavaScript\" src=\"include/jquery.js\"></script>\r\n";
		$includes .="<script language=\"JavaScript\" src=\"include/jsfunctions.js\"></script>\r\n";	
		if ($pageObject->debugJSMode===true)
		{
			$includes .= "<script type=\"text/javascript\" src=\"include/runnerJS/Runner.js\"></script>";
			$includes .= "<script type=\"text/javascript\" src=\"include/runnerJS/Util.js\"></script>";
		}
		else 
		{
			$includes .= "<script type=\"text/javascript\" src=\"include/runnerJS/RunnerBase.js\"></script>";
		}
		$pageObject->AddJSFile("include/ajaxsuggest");		
		$includes.="<script language=\"JavaScript\" src=\"include/jsfunctions.js\"></script>\r\n";
		$includes.="<div id=\"search_suggest\"></div>\r\n";
	}
	$xt->assign("ramal_fieldblock",true);
	$xt->assign("ramal_label",true);
	if(isEnableSection508())
		$xt->assign_section("ramal_label","<label for=\"".GetInputElementId("ramal", $id)."\">","</label>");
	$xt->assign("destino_fieldblock",true);
	$xt->assign("destino_label",true);
	if(isEnableSection508())
		$xt->assign_section("destino_label","<label for=\"".GetInputElementId("destino", $id)."\">","</label>");
	$xt->assign("seg_fieldblock",true);
	$xt->assign("seg_label",true);
	if(isEnableSection508())
		$xt->assign_section("seg_label","<label for=\"".GetInputElementId("seg", $id)."\">","</label>");
	$xt->assign("ter_fieldblock",true);
	$xt->assign("ter_label",true);
	if(isEnableSection508())
		$xt->assign_section("ter_label","<label for=\"".GetInputElementId("ter", $id)."\">","</label>");
	$xt->assign("qua_fieldblock",true);
	$xt->assign("qua_label",true);
	if(isEnableSection508())
		$xt->assign_section("qua_label","<label for=\"".GetInputElementId("qua", $id)."\">","</label>");
	$xt->assign("qui_fieldblock",true);
	$xt->assign("qui_label",true);
	if(isEnableSection508())
		$xt->assign_section("qui_label","<label for=\"".GetInputElementId("qui", $id)."\">","</label>");
	$xt->assign("sex_fieldblock",true);
	$xt->assign("sex_label",true);
	if(isEnableSection508())
		$xt->assign_section("sex_label","<label for=\"".GetInputElementId("sex", $id)."\">","</label>");
	$xt->assign("sab_fieldblock",true);
	$xt->assign("sab_label",true);
	if(isEnableSection508())
		$xt->assign_section("sab_label","<label for=\"".GetInputElementId("sab", $id)."\">","</label>");
	$xt->assign("dom_fieldblock",true);
	$xt->assign("dom_label",true);
	if(isEnableSection508())
		$xt->assign_section("dom_label","<label for=\"".GetInputElementId("dom", $id)."\">","</label>");
	$xt->assign("hr_inicio_fieldblock",true);
	$xt->assign("hr_inicio_label",true);
	if(isEnableSection508())
		$xt->assign_section("hr_inicio_label","<label for=\"".GetInputElementId("hr_inicio", $id)."\">","</label>");
	$xt->assign("hr_fim_fieldblock",true);
	$xt->assign("hr_fim_label",true);
	if(isEnableSection508())
		$xt->assign_section("hr_fim_label","<label for=\"".GetInputElementId("hr_fim", $id)."\">","</label>");
	
	
	if($inlineadd!=ADD_ONTHEFLY)
	{
		if($onsubmit)
			$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit)."\"";
		
		$pageObject->body["begin"] .= $includes;
		if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='desvios_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="desvios_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="desvios_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
		'<input type=hidden name="a" value="added">'.
		'<input type=hidden name="editType" value="onthefly">'.
		'<input type=hidden name="table" value="'.postvalue('table').'">'.
		'<input type=hidden name="field" value="'.postvalue('field').'">'.
		'<input type=hidden name="category" value="'.postvalue('category').'">'.
		'<input type=hidden name="id" value="'.$id.'">';

		$xt->assign("cancelbutton_attrs", "onclick=\"RemoveFlyDiv('".$id."');".$destroyCtrls."\"");
		$xt->assign("cancel_button",true);
		$xt->assign("header","");
		// destroy controls befor destroy win		
		//$xt->assign("savebutton_attrs","onclick=\"$destroyCtrls\"");		
	}
	$xt->assign("save_button",true);
}

if($message)
{
	$xt->assign("message_block",true);
	$xt->assign("message",$message);
}
//$xt->assign("status",$status);

$readonlyfields=array();

//	show readonly fields
$linkdata="";

if(!$inlineadd==ADD_INLINE) 
	$pageObject->AddJSCode("SetToFirstControl('".$formname."');");
	
if(@$_POST["a"]=="added" && $inlineadd==ADD_ONTHEFLY && !$error_happened && $status!="DECLINED")
{
	$LookupSQL="";
	if($LookupSQL)
		$LookupSQL.=" from ".AddTableWrappers($strOriginalTableName);

	$data=0;
	if(count($keys) && $LookupSQL)
	{
		$where=KeyWhere($keys);
		$LookupSQL.=" where ".$where;
		$rs=db_query($LookupSQL,$conn);
		$data=db_fetch_numarray($rs);
	}
	if(!$data)
	{
		$data=array(@$avalues[$linkfield],@$avalues[$dispfield]);
	}
	echo "<textarea id=\"data\">";
	echo "added";
	print_inline_array($data);
	echo "</textarea>";
	exit();
}

if(@$_POST["a"]=="added" && ($inlineadd==ADD_INLINE || $inlineadd==ADD_MASTER)) 
{
	//Preparation   view values
	//	get current values and show edit controls
	$dispFieldAlias = "";
	$data=0;
	if(count($keys))
	{
		$where=KeyWhere($keys);
			
		$sqlHead = $gQuery->HeadToSql();
		$sqlGroupBy = $gQuery->GroupByToSql();
		$oHaving = $gQuery->Having();
		$sqlHaving = $oHaving->toSql($gQuery);
		
		$dispFieldAlias = postvalue('dispFieldAlias');
		$dispField = postvalue('dispField');
		
		if ($dispFieldAlias)
		{
			$sqlHead.=", ".($dispField)." as ".AddFieldWrappers($dispFieldAlias)." ";
		}
		$strSQL = gSQLWhere_having($sqlHead, $gsqlFrom, $gsqlWhereExpr, $sqlGroupBy, $sqlHaving, $where, '');		
		
		LogInfo($strSQL);
		$rs=db_query($strSQL,$conn);
		$data=db_fetch_array($rs);
	}
	if(!$data)
	{
		$data=$avalues;
		$HaveData=false;
	}
	//check if correct values added

	$showKeys[] = htmlspecialchars($keys["id_desvio"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_desvio"]));

	

	
	
////////////////////////////////////////////
//	ramal - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("ramal",$data["ramal"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ramal";
				$showRawValues[] = substr($data["ramal"],0,100);
	}	
//	destino - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"destino", ""),"field=destino".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "destino";
				$showRawValues[] = substr($data["destino"],0,100);
	}	
//	seg - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"seg", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "seg";
				$showRawValues[] = substr($data["seg"],0,100);
	}	
//	ter - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"ter", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "ter";
				$showRawValues[] = substr($data["ter"],0,100);
	}	
//	qua - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"qua", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "qua";
				$showRawValues[] = substr($data["qua"],0,100);
	}	
//	qui - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"qui", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "qui";
				$showRawValues[] = substr($data["qui"],0,100);
	}	
//	sex - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"sex", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "sex";
				$showRawValues[] = substr($data["sex"],0,100);
	}	
//	sab - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"sab", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "sab";
				$showRawValues[] = substr($data["sab"],0,100);
	}	
//	dom - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"dom", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "dom";
				$showRawValues[] = substr($data["dom"],0,100);
	}	
//	hr_inicio - Time
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"hr_inicio", "Time"),"field=hr%5Finicio".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "hr_inicio";
				$showRawValues[] = substr($data["hr_inicio"],0,100);
	}	
//	hr_fim - Time
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"hr_fim", "Time"),"field=hr%5Ffim".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "hr_fim";
				$showRawValues[] = substr($data["hr_fim"],0,100);
	}	
	
	// for custom expression for display field
	if ($dispFieldAlias)
	{
		$showValues[] = $data[$dispFieldAlias];	
		$showFields[] = $dispFieldAlias;
		$showRawValues[] = substr($data[$dispFieldAlias],0,100);
	}		
	
	if($inlineadd==ADD_INLINE)
	{	
		echo "<textarea id=\"data\">";
		if($IsSaved && count($showValues))
		{
			if($HaveData)
				echo "saved";
			else
				echo "savnd";
			print_inline_array($showKeys);
			echo "\n";
			print_inline_array($showValues);
			echo "\n";
			print_inline_array($showFields);
			echo "\n";
			print_inline_array($showRawValues);
			echo "\n";
			print_inline_array($showDetailKeys,true);
			echo "\n";
			print_inline_array($showDetailKeys);
			echo "\n";
			echo str_replace(array("&","<","\\","\r","\n"),array("&amp;","&lt;","\\\\","\\r","\\n"),$usermessage);
		}
		else
		{
			if($status=="DECLINED")
				echo "decli";
			else
				echo "error";
			echo str_replace(array("&","<","\\","\r","\n"),array("&amp;","&lt;","\\\\","\\r","\\n"),$message);
		}
		echo "</textarea>";
		exit();
	}	
} 

/////////////////////////////////////////////////////////////
if($inlineadd==ADD_MASTER)
{
	echo "<textarea id=\"data\">";
	$code = "";
	if(($_POST["a"]=="added" && $IsSaved))
	{
		$code .= "window.dpObj.Opts.mSavedValues = {";
		for($i=0;$i<count($showFields);$i++)
			$code .= "'".jsreplace($showFields[$i])."':'".jsreplace($showValues[$i])."'".($i!=(count($showFields)-1) ? "," : "")." ";
		$code .= "};";
		for($i=0;$i<count($dpParams['ids']);$i++)
		{
			$data=0;
			if(count($keys))
			{
				$where=KeyWhere($keys);
							$strSQL = gSQLWhere($where);
				LogInfo($strSQL);
				$rs=db_query($strSQL,$conn);
				$data=db_fetch_array($rs);
			}
			if(!$data)
				$data=$avalues;
				
			$code .= "var obj = window.inlineEditing".$dpParams['ids'][$i].";
					  if(obj && obj.isSbmSuc){obj.mKeys = [";
			foreach($mKeys[$dpParams['strTableNames'][$i]] as $mk)
				$code .= "'".jsreplace($data[$mk])."',";
			$code = substr($code, 0, -1);
			$code .= "];}";
		}
		if((isset($_SESSION[$strTableName."_count_captcha"])) or ($_SESSION[$strTableName."_count_captcha"]>0) or ($_SESSION[$strTableName."_count_captcha"]<5))
			$code .= "window.dpObj.hideCaptcha();";	
		$code .= "window.dpObj.saveAllDetail();";
	}
	elseif(@$_REQUEST["isSbmSuc"]==='0')
		$code .= "window.dpObj.saveAllDetail();";
	elseif(!$isCaptchaOk)
		$code .= "window.dpObj.showHideInvalidCaptcha('show');";
	else
		$code .= "window.dpObj.Opts.mMessage =\"".$message."\";
				  window.dpObj.showMessage();
				  window.dpObj.showHideInvalidCaptcha('hide');";	
	echo $code."</textarea>";
	exit();
}


/////////////////////////////////////////////////////////////
//	prepare Edit Controls
/////////////////////////////////////////////////////////////
//	validation stuff
$regex='';
$regexmessage='';
$regextype = '';
//	control - ramal
$control_ramal=array();
$control_ramal["func"]="xt_buildeditcontrol";
$control_ramal["params"] = array();
$control_ramal["params"]["field"]="ramal";
$control_ramal["params"]["value"]=@$defvalues["ramal"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_ramal["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ramal["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ramal["params"]["mode"]="inline_add";
else
	$control_ramal["params"]["mode"]="add";

if(!$detailKeys || !in_array("ramal", $detailKeys))
	$xt->assignbyref("ramal_editcontrol",$control_ramal);
else if(array_key_exists("ramal", $defvalues))
{
				$value=DisplayLookupWizard("ramal",$defvalues["ramal"],$defvalues,"",MODE_VIEW);
		$xt->assign("ramal_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - destino
$control_destino=array();
$control_destino["func"]="xt_buildeditcontrol";
$control_destino["params"] = array();
$control_destino["params"]["field"]="destino";
$control_destino["params"]["value"]=@$defvalues["destino"];

//	Begin Add validation
$arrValidate = array();	
$control_destino["params"]["validate"]=$arrValidate;
//	End Add validation

$control_destino["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_destino["params"]["mode"]="inline_add";
else
	$control_destino["params"]["mode"]="add";

if(!$detailKeys || !in_array("destino", $detailKeys))
	$xt->assignbyref("destino_editcontrol",$control_destino);
else if(array_key_exists("destino", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"destino", ""),"field=destino","",MODE_VIEW);
		$xt->assign("destino_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - seg
$control_seg=array();
$control_seg["func"]="xt_buildeditcontrol";
$control_seg["params"] = array();
$control_seg["params"]["field"]="seg";
$control_seg["params"]["value"]=@$defvalues["seg"];

//	Begin Add validation
$arrValidate = array();	
$control_seg["params"]["validate"]=$arrValidate;
//	End Add validation

$control_seg["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_seg["params"]["mode"]="inline_add";
else
	$control_seg["params"]["mode"]="add";

if(!$detailKeys || !in_array("seg", $detailKeys))
	$xt->assignbyref("seg_editcontrol",$control_seg);
else if(array_key_exists("seg", $defvalues))
{
				$value = GetData($defvalues,"seg", "Checkbox");
		$xt->assign("seg_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ter
$control_ter=array();
$control_ter["func"]="xt_buildeditcontrol";
$control_ter["params"] = array();
$control_ter["params"]["field"]="ter";
$control_ter["params"]["value"]=@$defvalues["ter"];

//	Begin Add validation
$arrValidate = array();	
$control_ter["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ter["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ter["params"]["mode"]="inline_add";
else
	$control_ter["params"]["mode"]="add";

if(!$detailKeys || !in_array("ter", $detailKeys))
	$xt->assignbyref("ter_editcontrol",$control_ter);
else if(array_key_exists("ter", $defvalues))
{
				$value = GetData($defvalues,"ter", "Checkbox");
		$xt->assign("ter_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - qua
$control_qua=array();
$control_qua["func"]="xt_buildeditcontrol";
$control_qua["params"] = array();
$control_qua["params"]["field"]="qua";
$control_qua["params"]["value"]=@$defvalues["qua"];

//	Begin Add validation
$arrValidate = array();	
$control_qua["params"]["validate"]=$arrValidate;
//	End Add validation

$control_qua["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_qua["params"]["mode"]="inline_add";
else
	$control_qua["params"]["mode"]="add";

if(!$detailKeys || !in_array("qua", $detailKeys))
	$xt->assignbyref("qua_editcontrol",$control_qua);
else if(array_key_exists("qua", $defvalues))
{
				$value = GetData($defvalues,"qua", "Checkbox");
		$xt->assign("qua_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - qui
$control_qui=array();
$control_qui["func"]="xt_buildeditcontrol";
$control_qui["params"] = array();
$control_qui["params"]["field"]="qui";
$control_qui["params"]["value"]=@$defvalues["qui"];

//	Begin Add validation
$arrValidate = array();	
$control_qui["params"]["validate"]=$arrValidate;
//	End Add validation

$control_qui["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_qui["params"]["mode"]="inline_add";
else
	$control_qui["params"]["mode"]="add";

if(!$detailKeys || !in_array("qui", $detailKeys))
	$xt->assignbyref("qui_editcontrol",$control_qui);
else if(array_key_exists("qui", $defvalues))
{
				$value = GetData($defvalues,"qui", "Checkbox");
		$xt->assign("qui_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - sex
$control_sex=array();
$control_sex["func"]="xt_buildeditcontrol";
$control_sex["params"] = array();
$control_sex["params"]["field"]="sex";
$control_sex["params"]["value"]=@$defvalues["sex"];

//	Begin Add validation
$arrValidate = array();	
$control_sex["params"]["validate"]=$arrValidate;
//	End Add validation

$control_sex["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_sex["params"]["mode"]="inline_add";
else
	$control_sex["params"]["mode"]="add";

if(!$detailKeys || !in_array("sex", $detailKeys))
	$xt->assignbyref("sex_editcontrol",$control_sex);
else if(array_key_exists("sex", $defvalues))
{
				$value = GetData($defvalues,"sex", "Checkbox");
		$xt->assign("sex_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - sab
$control_sab=array();
$control_sab["func"]="xt_buildeditcontrol";
$control_sab["params"] = array();
$control_sab["params"]["field"]="sab";
$control_sab["params"]["value"]=@$defvalues["sab"];

//	Begin Add validation
$arrValidate = array();	
$control_sab["params"]["validate"]=$arrValidate;
//	End Add validation

$control_sab["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_sab["params"]["mode"]="inline_add";
else
	$control_sab["params"]["mode"]="add";

if(!$detailKeys || !in_array("sab", $detailKeys))
	$xt->assignbyref("sab_editcontrol",$control_sab);
else if(array_key_exists("sab", $defvalues))
{
				$value = GetData($defvalues,"sab", "Checkbox");
		$xt->assign("sab_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - dom
$control_dom=array();
$control_dom["func"]="xt_buildeditcontrol";
$control_dom["params"] = array();
$control_dom["params"]["field"]="dom";
$control_dom["params"]["value"]=@$defvalues["dom"];

//	Begin Add validation
$arrValidate = array();	
$control_dom["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dom["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dom["params"]["mode"]="inline_add";
else
	$control_dom["params"]["mode"]="add";

if(!$detailKeys || !in_array("dom", $detailKeys))
	$xt->assignbyref("dom_editcontrol",$control_dom);
else if(array_key_exists("dom", $defvalues))
{
				$value = GetData($defvalues,"dom", "Checkbox");
		$xt->assign("dom_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - hr_inicio
$control_hr_inicio=array();
$control_hr_inicio["func"]="xt_buildeditcontrol";
$control_hr_inicio["params"] = array();
$control_hr_inicio["params"]["field"]="hr_inicio";
$control_hr_inicio["params"]["value"]=@$defvalues["hr_inicio"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Time");
	$arrValidate['basicValidate'][] = $validatetype;
$control_hr_inicio["params"]["validate"]=$arrValidate;
//	End Add validation

$control_hr_inicio["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_hr_inicio["params"]["mode"]="inline_add";
else
	$control_hr_inicio["params"]["mode"]="add";

if(!$detailKeys || !in_array("hr_inicio", $detailKeys))
	$xt->assignbyref("hr_inicio_editcontrol",$control_hr_inicio);
else if(array_key_exists("hr_inicio", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"hr_inicio", "Time"),"field=hr%5Finicio","",MODE_VIEW);
		$xt->assign("hr_inicio_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - hr_fim
$control_hr_fim=array();
$control_hr_fim["func"]="xt_buildeditcontrol";
$control_hr_fim["params"] = array();
$control_hr_fim["params"]["field"]="hr_fim";
$control_hr_fim["params"]["value"]=@$defvalues["hr_fim"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Time");
	$arrValidate['basicValidate'][] = $validatetype;
$control_hr_fim["params"]["validate"]=$arrValidate;
//	End Add validation

$control_hr_fim["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_hr_fim["params"]["mode"]="inline_add";
else
	$control_hr_fim["params"]["mode"]="add";

if(!$detailKeys || !in_array("hr_fim", $detailKeys))
	$xt->assignbyref("hr_fim_editcontrol",$control_hr_fim);
else if(array_key_exists("hr_fim", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"hr_fim", "Time"),"field=hr%5Ffim","",MODE_VIEW);
		$xt->assign("hr_fim_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();
/////////////////////////////////////////////////////////////
if($isShowDetailTables)
{
	$options = array();
	//array of params for classes
	$options["mode"] = LIST_DETAILS;
	$options["pageType"] = PAGE_LIST;
	$options["masterPageType"] = PAGE_ADD;
	$options['masterTable'] = $strTableName;
	$options['firstTime'] = 1;

	if(count($dpParams['ids']))
	{
		$xt->assign("detail_tables",true);
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
		include("classes/searchclause.php");
	}
	
	for($d=0;$d<count($dpParams['ids']);$d++)
	{
		$strTableName = $dpParams['strTableNames'][$d];
		include("include/".GetTableURL($strTableName)."_settings.php");
		$options['xt'] = new Xtempl();
		$options['id'] = $dpParams['ids'][$d];

		$listPageObject = ListPage::createListPage($strTableName,$options);
		// prepare code
		$listPageObject->prepareForBuildPage();
		
		if($listPageObject->isDispGrid())
		{
			$listJsFiles = array();
			$listCssFiles = array();
			
			//Add Detail's js code to master's code
			$pageObject->AddJSCode("\n /*---Begin code for detailsPreview_".$options['id']."---*/ \n".
									$listPageObject->grabAllJsCode().
									"\n /*---End code for detailsPreview_".$options['id']."---*/ \n");
			
			//Add detail's js files to master's files
			$listJsFiles = $listPageObject->grabAllJSFiles();
			for($i=0;$i<count($listJsFiles);$i++)
				$pageObject->AddJSFile($listJsFiles[$i]);
			
			//Add detail's css files to master's files	
			$listCssFiles = $listPageObject->grabAllCSSFiles();	
			for($i=0;$i<count($listCssFiles);$i++)
				$pageObject->AddCSSFile($listCssFiles[$i]);
		}
		$xt->assign("displayDetailTable_".GoodFieldName($strTableName), array("func" => "showDetailTable","params" => array("dpObject" => $listPageObject, "dpParams" => $strTableName)));
	}
	$strTableName = "desvios";
}
/////////////////////////////////////////////////////////////

$jscode = $pageObject->PrepareJS();
if($inlineadd!=ADD_ONTHEFLY && $inlineadd!=ADD_MASTER)
{
	if($inlineadd==ADD_INLINE)
	{
		$jscode=str_replace(array("&","<",">"),array("&amp;","&lt;","&gt;"),$jscode);
		$xt->assignbyref("linkdata",$jscode);
	}
	$pageObject->body["end"] .= "<script>".$jscode."</script>";
	$xt->assign("body",$pageObject->body);
	$xt->assign("flybody",true);
}
else
{
	if(!@$_POST["a"]=="added")
	{
		echo "<jscode>";
		echo str_replace(array("\\","\r","\n"),array("\\\\","\\r","\\n"),$jscode);;
		echo "</jscode>";
	}
	else if(@$_POST["a"]=="added" && ($error_happened || $status=="DECLINED"))
	{
		echo "<textarea id=\"data\">decli";
		//$jscode = "\n\rwindow.Runner = window.opener.Runner;console.log(window.Runner, window.opener.Runner);".$jscode;
		echo htmlspecialchars($jscode);
		echo "</textarea>";
	}
	$pageObject->body["end"] .= "</form>";	
	$xt->assign("footer","");
	$xt->assign("flybody",$pageObject->body);
	$xt->assign("body",true);
}	



$xt->assign("style_block",true);
$pageObject->xt->assign("legend", true);




if(function_exists("BeforeShowAdd"))
	BeforeShowAdd($xt,$templatefile);

if($inlineadd==ADD_ONTHEFLY)
{
	$xt->load_template($templatefile);
	if(@$_POST["a"]=="added" && ($error_happened || $status=="DECLINED"))
	{
		echo "<textarea id=\"html\">";		
		$xt->display_loaded("style_block");
		$xt->display_loaded("flybody");
		echo "</textarea>";
	}
	else
	{		
		$xt->display_loaded("style_block");
		$xt->display_loaded("flybody");
	}
	
}
else
	$xt->display($templatefile);
?>
