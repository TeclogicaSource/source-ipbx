<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/ipbx_ura_rev_msg_variables.php");
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
	$templatefile = "ipbx_ura_rev_msg_inline_add.htm";
else
	$templatefile = "ipbx_ura_rev_msg_add.htm";

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
			'mShortTableName':'ipbx_ura_rev_msg', 
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
//	processing nr_ordem - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_nr_ordem_".$id);
	$type=postvalue("type_nr_ordem_".$id);
	if (FieldSubmitted("nr_ordem_".$id))
	{
		$value=prepare_for_db("nr_ordem",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "nr_ordem"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["nr_ordem"]=$value;
	}
	}
//	processibng nr_ordem - end
//	processing dsc_mensagem - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_dsc_mensagem_".$id);
	$type=postvalue("type_dsc_mensagem_".$id);
	if (FieldSubmitted("dsc_mensagem_".$id))
	{
		$value=prepare_for_db("dsc_mensagem",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dsc_mensagem"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dsc_mensagem"]=$value;
	}
	}
//	processibng dsc_mensagem - end
//	processing id_pesquisa - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_pesquisa_".$id);
	$type=postvalue("type_id_pesquisa_".$id);
	if (FieldSubmitted("id_pesquisa_".$id))
	{
		$value=prepare_for_db("id_pesquisa",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_pesquisa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_pesquisa"]=$value;
	}
	}
//	processibng id_pesquisa - end
//	processing arq_audio - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_arq_audio_".$id);
	$type=postvalue("type_arq_audio_".$id);
	if (FieldSubmitted("arq_audio_".$id))
	{
	$fileNameForPrepareFunc = postvalue("filename_arq_audio_".$id);
			$value=prepare_upload("arq_audio","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id);
			
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "arq_audio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["arq_audio"]=$value;
	}
	}
//	processibng arq_audio - end
//	processing opc_resp - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_opc_resp_".$id);
	$type=postvalue("type_opc_resp_".$id);
	if (FieldSubmitted("opc_resp_".$id))
	{
		$value=prepare_for_db("opc_resp",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "opc_resp"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["opc_resp"]=$value;
	}
	}
//	processibng opc_resp - end
//	processing ref0 - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_ref0_".$id);
	$type=postvalue("type_ref0_".$id);
	if (FieldSubmitted("ref0_".$id))
	{
		$value=prepare_for_db("ref0",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ref0"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ref0"]=$value;
	}
	}
//	processibng ref0 - end
//	processing ref1 - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_ref1_".$id);
	$type=postvalue("type_ref1_".$id);
	if (FieldSubmitted("ref1_".$id))
	{
		$value=prepare_for_db("ref1",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ref1"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ref1"]=$value;
	}
	}
//	processibng ref1 - end
//	processing ref2 - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_ref2_".$id);
	$type=postvalue("type_ref2_".$id);
	if (FieldSubmitted("ref2_".$id))
	{
		$value=prepare_for_db("ref2",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ref2"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ref2"]=$value;
	}
	}
//	processibng ref2 - end
//	processing ref3 - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_ref3_".$id);
	$type=postvalue("type_ref3_".$id);
	if (FieldSubmitted("ref3_".$id))
	{
		$value=prepare_for_db("ref3",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ref3"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ref3"]=$value;
	}
	}
//	processibng ref3 - end
//	processing ref4 - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_ref4_".$id);
	$type=postvalue("type_ref4_".$id);
	if (FieldSubmitted("ref4_".$id))
	{
		$value=prepare_for_db("ref4",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ref4"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ref4"]=$value;
	}
	}
//	processibng ref4 - end
//	processing ref5 - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_ref5_".$id);
	$type=postvalue("type_ref5_".$id);
	if (FieldSubmitted("ref5_".$id))
	{
		$value=prepare_for_db("ref5",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ref5"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ref5"]=$value;
	}
	}
//	processibng ref5 - end
//	processing ref6 - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_ref6_".$id);
	$type=postvalue("type_ref6_".$id);
	if (FieldSubmitted("ref6_".$id))
	{
		$value=prepare_for_db("ref6",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ref6"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ref6"]=$value;
	}
	}
//	processibng ref6 - end
//	processing ref7 - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_ref7_".$id);
	$type=postvalue("type_ref7_".$id);
	if (FieldSubmitted("ref7_".$id))
	{
		$value=prepare_for_db("ref7",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ref7"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ref7"]=$value;
	}
	}
//	processibng ref7 - end
//	processing ref8 - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_ref8_".$id);
	$type=postvalue("type_ref8_".$id);
	if (FieldSubmitted("ref8_".$id))
	{
		$value=prepare_for_db("ref8",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ref8"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ref8"]=$value;
	}
	}
//	processibng ref8 - end
//	processing ref9 - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_ref9_".$id);
	$type=postvalue("type_ref9_".$id);
	if (FieldSubmitted("ref9_".$id))
	{
		$value=prepare_for_db("ref9",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ref9"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ref9"]=$value;
	}
	}
//	processibng ref9 - end


//	insert masterkey value if exists and if not specified
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="ipbx_pesquisa_ura_rev")
	{
		if(!@$_SESSION[$sessionPrefix."_masterkey1"] && postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		if($avalues["id_pesquisa"]=="")
			$avalues["id_pesquisa"]=prepare_for_db("id_pesquisa",$_SESSION[$sessionPrefix."_masterkey1"]);
	}

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
					$message .='&nbsp;<a href=\'ipbx_ura_rev_msg_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'ipbx_ura_rev_msg_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: ipbx_ura_rev_msg_".$pageObject->getPageType().".php");
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
		$copykeys["id_ipbx_ura_rev_msg"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["id_ipbx_ura_rev_msg"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id_ipbx_ura_rev_msg"]="";
//call CopyOnLoad event
	if(function_exists("CopyOnLoad"))
		CopyOnLoad($defvalues,$strWhere);
}
else
{
}
//	set default values for the foreign keys
if(@$_SESSION[$sessionPrefix."_mastertable"]=="ipbx_pesquisa_ura_rev")
{
	if(!@$_SESSION[$sessionPrefix."_masterkey1"] && postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
	$defvalues["id_pesquisa"]=@$_SESSION[$sessionPrefix."_masterkey1"];	
}

if($readavalues)
{
	$defvalues["opc_resp"]=@$avalues["opc_resp"];
	$defvalues["dsc_mensagem"]=@$avalues["dsc_mensagem"];
	$defvalues["ref0"]=@$avalues["ref0"];
	$defvalues["ref1"]=@$avalues["ref1"];
	$defvalues["ref3"]=@$avalues["ref3"];
	$defvalues["ref4"]=@$avalues["ref4"];
	$defvalues["ref5"]=@$avalues["ref5"];
	$defvalues["ref6"]=@$avalues["ref6"];
	$defvalues["ref7"]=@$avalues["ref7"];
	$defvalues["ref8"]=@$avalues["ref8"];
	$defvalues["ref9"]=@$avalues["ref9"];
	$defvalues["ref2"]=@$avalues["ref2"];
	$defvalues["nr_ordem"]=@$avalues["nr_ordem"];
}
//for basic files
$includes="";
if ($inlineadd!==ADD_INLINE && $inlineadd!=ADD_ONTHEFLY)
	$pageObject->addJSCode("AddEventForControl('".jsreplace($strTableName)."', '', ".$id.");\r\n");

		
	
$onsubmit = $pageObject->onSubmitForEditingPage($formname,$inlineadd);
	

//////////////////////////////////////////////////////////////////	
////////////////////// time picker
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
	$xt->assign("arq_audio_fieldblock",true);
	$xt->assign("arq_audio_label",true);
	if(isEnableSection508())
		$xt->assign_section("arq_audio_label","<label for=\"".GetInputElementId("arq_audio", $id)."\">","</label>");
	$xt->assign("opc_resp_fieldblock",true);
	$xt->assign("opc_resp_label",true);
	if(isEnableSection508())
		$xt->assign_section("opc_resp_label","<label for=\"".GetInputElementId("opc_resp", $id)."\">","</label>");
	$xt->assign("dsc_mensagem_fieldblock",true);
	$xt->assign("dsc_mensagem_label",true);
	if(isEnableSection508())
		$xt->assign_section("dsc_mensagem_label","<label for=\"".GetInputElementId("dsc_mensagem", $id)."\">","</label>");
	$xt->assign("ref0_fieldblock",true);
	$xt->assign("ref0_label",true);
	if(isEnableSection508())
		$xt->assign_section("ref0_label","<label for=\"".GetInputElementId("ref0", $id)."\">","</label>");
	$xt->assign("ref1_fieldblock",true);
	$xt->assign("ref1_label",true);
	if(isEnableSection508())
		$xt->assign_section("ref1_label","<label for=\"".GetInputElementId("ref1", $id)."\">","</label>");
	$xt->assign("ref3_fieldblock",true);
	$xt->assign("ref3_label",true);
	if(isEnableSection508())
		$xt->assign_section("ref3_label","<label for=\"".GetInputElementId("ref3", $id)."\">","</label>");
	$xt->assign("ref4_fieldblock",true);
	$xt->assign("ref4_label",true);
	if(isEnableSection508())
		$xt->assign_section("ref4_label","<label for=\"".GetInputElementId("ref4", $id)."\">","</label>");
	$xt->assign("ref5_fieldblock",true);
	$xt->assign("ref5_label",true);
	if(isEnableSection508())
		$xt->assign_section("ref5_label","<label for=\"".GetInputElementId("ref5", $id)."\">","</label>");
	$xt->assign("ref6_fieldblock",true);
	$xt->assign("ref6_label",true);
	if(isEnableSection508())
		$xt->assign_section("ref6_label","<label for=\"".GetInputElementId("ref6", $id)."\">","</label>");
	$xt->assign("ref7_fieldblock",true);
	$xt->assign("ref7_label",true);
	if(isEnableSection508())
		$xt->assign_section("ref7_label","<label for=\"".GetInputElementId("ref7", $id)."\">","</label>");
	$xt->assign("ref8_fieldblock",true);
	$xt->assign("ref8_label",true);
	if(isEnableSection508())
		$xt->assign_section("ref8_label","<label for=\"".GetInputElementId("ref8", $id)."\">","</label>");
	$xt->assign("ref9_fieldblock",true);
	$xt->assign("ref9_label",true);
	if(isEnableSection508())
		$xt->assign_section("ref9_label","<label for=\"".GetInputElementId("ref9", $id)."\">","</label>");
	$xt->assign("ref2_fieldblock",true);
	$xt->assign("ref2_label",true);
	if(isEnableSection508())
		$xt->assign_section("ref2_label","<label for=\"".GetInputElementId("ref2", $id)."\">","</label>");
	$xt->assign("nr_ordem_fieldblock",true);
	$xt->assign("nr_ordem_label",true);
	if(isEnableSection508())
		$xt->assign_section("nr_ordem_label","<label for=\"".GetInputElementId("nr_ordem", $id)."\">","</label>");
	
	
	if($inlineadd!=ADD_ONTHEFLY)
	{
		if($onsubmit)
			$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit)."\"";
		
		$pageObject->body["begin"] .= $includes;
		if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='ipbx_ura_rev_msg_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="ipbx_ura_rev_msg_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="ipbx_ura_rev_msg_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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

	$showKeys[] = htmlspecialchars($keys["id_ipbx_ura_rev_msg"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_ipbx_ura_rev_msg"]));

	

	
	
////////////////////////////////////////////
//	arq_audio - Document Download
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"arq_audio", "Document Download");
		$showValues[] = $value;
		$showFields[] = "arq_audio";
				$showRawValues[] = substr($data["arq_audio"],0,100);
	}	
//	opc_resp - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"opc_resp", ""),"field=opc%5Fresp".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "opc_resp";
				$showRawValues[] = substr($data["opc_resp"],0,100);
	}	
//	dsc_mensagem - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dsc_mensagem", ""),"field=dsc%5Fmensagem".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dsc_mensagem";
				$showRawValues[] = substr($data["dsc_mensagem"],0,100);
	}	
//	id_pesquisa - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"id_pesquisa", ""),"field=id%5Fpesquisa".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_pesquisa";
				$showRawValues[] = substr($data["id_pesquisa"],0,100);
	}	
//	ref0 - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ref0", ""),"field=ref0".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref0";
				$showRawValues[] = substr($data["ref0"],0,100);
	}	
//	ref1 - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ref1", ""),"field=ref1".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref1";
				$showRawValues[] = substr($data["ref1"],0,100);
	}	
//	ref3 - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ref3", ""),"field=ref3".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref3";
				$showRawValues[] = substr($data["ref3"],0,100);
	}	
//	ref4 - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ref4", ""),"field=ref4".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref4";
				$showRawValues[] = substr($data["ref4"],0,100);
	}	
//	ref5 - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ref5", ""),"field=ref5".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref5";
				$showRawValues[] = substr($data["ref5"],0,100);
	}	
//	ref6 - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ref6", ""),"field=ref6".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref6";
				$showRawValues[] = substr($data["ref6"],0,100);
	}	
//	ref7 - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ref7", ""),"field=ref7".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref7";
				$showRawValues[] = substr($data["ref7"],0,100);
	}	
//	ref8 - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ref8", ""),"field=ref8".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref8";
				$showRawValues[] = substr($data["ref8"],0,100);
	}	
//	ref9 - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ref9", ""),"field=ref9".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref9";
				$showRawValues[] = substr($data["ref9"],0,100);
	}	
//	ref2 - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ref2", ""),"field=ref2".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref2";
				$showRawValues[] = substr($data["ref2"],0,100);
	}	
//	nr_ordem - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"nr_ordem", ""),"field=nr%5Fordem".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "nr_ordem";
				$showRawValues[] = substr($data["nr_ordem"],0,100);
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
//	control - arq_audio
$control_arq_audio=array();
$control_arq_audio["func"]="xt_buildeditcontrol";
$control_arq_audio["params"] = array();
$control_arq_audio["params"]["field"]="arq_audio";
$control_arq_audio["params"]["value"]=@$defvalues["arq_audio"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_arq_audio["params"]["validate"]=$arrValidate;
//	End Add validation

$control_arq_audio["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_arq_audio["params"]["mode"]="inline_add";
else
	$control_arq_audio["params"]["mode"]="add";

if(!$detailKeys || !in_array("arq_audio", $detailKeys))
	$xt->assignbyref("arq_audio_editcontrol",$control_arq_audio);
else if(array_key_exists("arq_audio", $defvalues))
{
				$value = GetData($defvalues,"arq_audio", "Document Download");
		$xt->assign("arq_audio_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - opc_resp
$control_opc_resp=array();
$control_opc_resp["func"]="xt_buildeditcontrol";
$control_opc_resp["params"] = array();
$control_opc_resp["params"]["field"]="opc_resp";
$control_opc_resp["params"]["value"]=@$defvalues["opc_resp"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_opc_resp["params"]["validate"]=$arrValidate;
//	End Add validation

$control_opc_resp["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_opc_resp["params"]["mode"]="inline_add";
else
	$control_opc_resp["params"]["mode"]="add";

if(!$detailKeys || !in_array("opc_resp", $detailKeys))
	$xt->assignbyref("opc_resp_editcontrol",$control_opc_resp);
else if(array_key_exists("opc_resp", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"opc_resp", ""),"field=opc%5Fresp","",MODE_VIEW);
		$xt->assign("opc_resp_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - dsc_mensagem
$control_dsc_mensagem=array();
$control_dsc_mensagem["func"]="xt_buildeditcontrol";
$control_dsc_mensagem["params"] = array();
$control_dsc_mensagem["params"]["field"]="dsc_mensagem";
$control_dsc_mensagem["params"]["value"]=@$defvalues["dsc_mensagem"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_dsc_mensagem["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dsc_mensagem["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dsc_mensagem["params"]["mode"]="inline_add";
else
	$control_dsc_mensagem["params"]["mode"]="add";

if(!$detailKeys || !in_array("dsc_mensagem", $detailKeys))
	$xt->assignbyref("dsc_mensagem_editcontrol",$control_dsc_mensagem);
else if(array_key_exists("dsc_mensagem", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dsc_mensagem", ""),"field=dsc%5Fmensagem","",MODE_VIEW);
		$xt->assign("dsc_mensagem_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - id_pesquisa
$control_id_pesquisa=array();
$control_id_pesquisa["func"]="xt_buildeditcontrol";
$control_id_pesquisa["params"] = array();
$control_id_pesquisa["params"]["field"]="id_pesquisa";
$control_id_pesquisa["params"]["value"]=@$defvalues["id_pesquisa"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_id_pesquisa["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_pesquisa["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_pesquisa["params"]["mode"]="inline_add";
else
	$control_id_pesquisa["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_pesquisa", $detailKeys))
	$xt->assignbyref("id_pesquisa_editcontrol",$control_id_pesquisa);
else if(array_key_exists("id_pesquisa", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"id_pesquisa", ""),"field=id%5Fpesquisa","",MODE_VIEW);
		$xt->assign("id_pesquisa_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ref0
$control_ref0=array();
$control_ref0["func"]="xt_buildeditcontrol";
$control_ref0["params"] = array();
$control_ref0["params"]["field"]="ref0";
$control_ref0["params"]["value"]=@$defvalues["ref0"];

//	Begin Add validation
$arrValidate = array();	
$control_ref0["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ref0["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ref0["params"]["mode"]="inline_add";
else
	$control_ref0["params"]["mode"]="add";

if(!$detailKeys || !in_array("ref0", $detailKeys))
	$xt->assignbyref("ref0_editcontrol",$control_ref0);
else if(array_key_exists("ref0", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ref0", ""),"field=ref0","",MODE_VIEW);
		$xt->assign("ref0_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ref1
$control_ref1=array();
$control_ref1["func"]="xt_buildeditcontrol";
$control_ref1["params"] = array();
$control_ref1["params"]["field"]="ref1";
$control_ref1["params"]["value"]=@$defvalues["ref1"];

//	Begin Add validation
$arrValidate = array();	
$control_ref1["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ref1["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ref1["params"]["mode"]="inline_add";
else
	$control_ref1["params"]["mode"]="add";

if(!$detailKeys || !in_array("ref1", $detailKeys))
	$xt->assignbyref("ref1_editcontrol",$control_ref1);
else if(array_key_exists("ref1", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ref1", ""),"field=ref1","",MODE_VIEW);
		$xt->assign("ref1_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ref3
$control_ref3=array();
$control_ref3["func"]="xt_buildeditcontrol";
$control_ref3["params"] = array();
$control_ref3["params"]["field"]="ref3";
$control_ref3["params"]["value"]=@$defvalues["ref3"];

//	Begin Add validation
$arrValidate = array();	
$control_ref3["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ref3["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ref3["params"]["mode"]="inline_add";
else
	$control_ref3["params"]["mode"]="add";

if(!$detailKeys || !in_array("ref3", $detailKeys))
	$xt->assignbyref("ref3_editcontrol",$control_ref3);
else if(array_key_exists("ref3", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ref3", ""),"field=ref3","",MODE_VIEW);
		$xt->assign("ref3_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ref4
$control_ref4=array();
$control_ref4["func"]="xt_buildeditcontrol";
$control_ref4["params"] = array();
$control_ref4["params"]["field"]="ref4";
$control_ref4["params"]["value"]=@$defvalues["ref4"];

//	Begin Add validation
$arrValidate = array();	
$control_ref4["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ref4["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ref4["params"]["mode"]="inline_add";
else
	$control_ref4["params"]["mode"]="add";

if(!$detailKeys || !in_array("ref4", $detailKeys))
	$xt->assignbyref("ref4_editcontrol",$control_ref4);
else if(array_key_exists("ref4", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ref4", ""),"field=ref4","",MODE_VIEW);
		$xt->assign("ref4_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ref5
$control_ref5=array();
$control_ref5["func"]="xt_buildeditcontrol";
$control_ref5["params"] = array();
$control_ref5["params"]["field"]="ref5";
$control_ref5["params"]["value"]=@$defvalues["ref5"];

//	Begin Add validation
$arrValidate = array();	
$control_ref5["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ref5["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ref5["params"]["mode"]="inline_add";
else
	$control_ref5["params"]["mode"]="add";

if(!$detailKeys || !in_array("ref5", $detailKeys))
	$xt->assignbyref("ref5_editcontrol",$control_ref5);
else if(array_key_exists("ref5", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ref5", ""),"field=ref5","",MODE_VIEW);
		$xt->assign("ref5_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ref6
$control_ref6=array();
$control_ref6["func"]="xt_buildeditcontrol";
$control_ref6["params"] = array();
$control_ref6["params"]["field"]="ref6";
$control_ref6["params"]["value"]=@$defvalues["ref6"];

//	Begin Add validation
$arrValidate = array();	
$control_ref6["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ref6["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ref6["params"]["mode"]="inline_add";
else
	$control_ref6["params"]["mode"]="add";

if(!$detailKeys || !in_array("ref6", $detailKeys))
	$xt->assignbyref("ref6_editcontrol",$control_ref6);
else if(array_key_exists("ref6", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ref6", ""),"field=ref6","",MODE_VIEW);
		$xt->assign("ref6_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ref7
$control_ref7=array();
$control_ref7["func"]="xt_buildeditcontrol";
$control_ref7["params"] = array();
$control_ref7["params"]["field"]="ref7";
$control_ref7["params"]["value"]=@$defvalues["ref7"];

//	Begin Add validation
$arrValidate = array();	
$control_ref7["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ref7["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ref7["params"]["mode"]="inline_add";
else
	$control_ref7["params"]["mode"]="add";

if(!$detailKeys || !in_array("ref7", $detailKeys))
	$xt->assignbyref("ref7_editcontrol",$control_ref7);
else if(array_key_exists("ref7", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ref7", ""),"field=ref7","",MODE_VIEW);
		$xt->assign("ref7_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ref8
$control_ref8=array();
$control_ref8["func"]="xt_buildeditcontrol";
$control_ref8["params"] = array();
$control_ref8["params"]["field"]="ref8";
$control_ref8["params"]["value"]=@$defvalues["ref8"];

//	Begin Add validation
$arrValidate = array();	
$control_ref8["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ref8["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ref8["params"]["mode"]="inline_add";
else
	$control_ref8["params"]["mode"]="add";

if(!$detailKeys || !in_array("ref8", $detailKeys))
	$xt->assignbyref("ref8_editcontrol",$control_ref8);
else if(array_key_exists("ref8", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ref8", ""),"field=ref8","",MODE_VIEW);
		$xt->assign("ref8_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ref9
$control_ref9=array();
$control_ref9["func"]="xt_buildeditcontrol";
$control_ref9["params"] = array();
$control_ref9["params"]["field"]="ref9";
$control_ref9["params"]["value"]=@$defvalues["ref9"];

//	Begin Add validation
$arrValidate = array();	
$control_ref9["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ref9["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ref9["params"]["mode"]="inline_add";
else
	$control_ref9["params"]["mode"]="add";

if(!$detailKeys || !in_array("ref9", $detailKeys))
	$xt->assignbyref("ref9_editcontrol",$control_ref9);
else if(array_key_exists("ref9", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ref9", ""),"field=ref9","",MODE_VIEW);
		$xt->assign("ref9_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ref2
$control_ref2=array();
$control_ref2["func"]="xt_buildeditcontrol";
$control_ref2["params"] = array();
$control_ref2["params"]["field"]="ref2";
$control_ref2["params"]["value"]=@$defvalues["ref2"];

//	Begin Add validation
$arrValidate = array();	
$control_ref2["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ref2["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ref2["params"]["mode"]="inline_add";
else
	$control_ref2["params"]["mode"]="add";

if(!$detailKeys || !in_array("ref2", $detailKeys))
	$xt->assignbyref("ref2_editcontrol",$control_ref2);
else if(array_key_exists("ref2", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ref2", ""),"field=ref2","",MODE_VIEW);
		$xt->assign("ref2_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - nr_ordem
$control_nr_ordem=array();
$control_nr_ordem["func"]="xt_buildeditcontrol";
$control_nr_ordem["params"] = array();
$control_nr_ordem["params"]["field"]="nr_ordem";
$control_nr_ordem["params"]["value"]=@$defvalues["nr_ordem"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_nr_ordem["params"]["validate"]=$arrValidate;
//	End Add validation

$control_nr_ordem["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_nr_ordem["params"]["mode"]="inline_add";
else
	$control_nr_ordem["params"]["mode"]="add";

if(!$detailKeys || !in_array("nr_ordem", $detailKeys))
	$xt->assignbyref("nr_ordem_editcontrol",$control_nr_ordem);
else if(array_key_exists("nr_ordem", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"nr_ordem", ""),"field=nr%5Fordem","",MODE_VIEW);
		$xt->assign("nr_ordem_editcontrol",$value);
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
	$strTableName = "ipbx_ura_rev_msg";
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
