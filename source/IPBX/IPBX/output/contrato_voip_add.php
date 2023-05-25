<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/contrato_voip_variables.php");
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
	$templatefile = "contrato_voip_inline_add.htm";
else
	$templatefile = "contrato_voip_add.htm";

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

$params["calendar"] = true;
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
			'mShortTableName':'contrato_voip', 
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
//	processing num_contrato - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_num_contrato_".$id);
	$type=postvalue("type_num_contrato_".$id);
	if (FieldSubmitted("num_contrato_".$id))
	{
		$value=prepare_for_db("num_contrato",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "num_contrato"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["num_contrato"]=$value;
	}
	}
//	processibng num_contrato - end
//	processing nm_operadora - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_nm_operadora_".$id);
	$type=postvalue("type_nm_operadora_".$id);
	if (FieldSubmitted("nm_operadora_".$id))
	{
		$value=prepare_for_db("nm_operadora",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "nm_operadora"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["nm_operadora"]=$value;
	}
	}
//	processibng nm_operadora - end
//	processing Vingencia - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_Vingencia_".$id);
	$type=postvalue("type_Vingencia_".$id);
	if (FieldSubmitted("Vingencia_".$id))
	{
		$value=prepare_for_db("Vingencia",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "Vingencia"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["Vingencia"]=$value;
	}
	}
//	processibng Vingencia - end
//	processing flg_ativo - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_ativo_".$id);
	$type=postvalue("type_flg_ativo_".$id);
	if (FieldSubmitted("flg_ativo_".$id))
	{
		$value=prepare_for_db("flg_ativo",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_ativo"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_ativo"]=$value;
	}
	}
//	processibng flg_ativo - end
//	processing F-F_VONO_CAD - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_F_VONO_CAD_".$id);
	$type=postvalue("type_F_F_VONO_CAD_".$id);
	if (FieldSubmitted("F-F_VONO_CAD_".$id))
	{
		$value=prepare_for_db("F-F_VONO_CAD",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-F_VONO_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-F_VONO_CAD"]=$value;
	}
	}
//	processibng F-F_VONO_CAD - end
//	processing F-F_VONO_VLR - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_F_VONO_VLR_".$id);
	$type=postvalue("type_F_F_VONO_VLR_".$id);
	if (FieldSubmitted("F-F_VONO_VLR_".$id))
	{
		$value=prepare_for_db("F-F_VONO_VLR",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-F_VONO_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-F_VONO_VLR"]=$value;
	}
	}
//	processibng F-F_VONO_VLR - end
//	processing F-F_NVONO_CAD - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_F_NVONO_CAD_".$id);
	$type=postvalue("type_F_F_NVONO_CAD_".$id);
	if (FieldSubmitted("F-F_NVONO_CAD_".$id))
	{
		$value=prepare_for_db("F-F_NVONO_CAD",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-F_NVONO_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-F_NVONO_CAD"]=$value;
	}
	}
//	processibng F-F_NVONO_CAD - end
//	processing F-F_NVONO_VLR - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_F_NVONO_VLR_".$id);
	$type=postvalue("type_F_F_NVONO_VLR_".$id);
	if (FieldSubmitted("F-F_NVONO_VLR_".$id))
	{
		$value=prepare_for_db("F-F_NVONO_VLR",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-F_NVONO_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-F_NVONO_VLR"]=$value;
	}
	}
//	processibng F-F_NVONO_VLR - end
//	processing F-M_VC1_CAD - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_M_VC1_CAD_".$id);
	$type=postvalue("type_F_M_VC1_CAD_".$id);
	if (FieldSubmitted("F-M_VC1_CAD_".$id))
	{
		$value=prepare_for_db("F-M_VC1_CAD",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-M_VC1_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-M_VC1_CAD"]=$value;
	}
	}
//	processibng F-M_VC1_CAD - end
//	processing F-M_VC1_VLR - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_M_VC1_VLR_".$id);
	$type=postvalue("type_F_M_VC1_VLR_".$id);
	if (FieldSubmitted("F-M_VC1_VLR_".$id))
	{
		$value=prepare_for_db("F-M_VC1_VLR",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-M_VC1_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-M_VC1_VLR"]=$value;
	}
	}
//	processibng F-M_VC1_VLR - end
//	processing F-M_VC2VC3_CAD - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_M_VC2VC3_CAD_".$id);
	$type=postvalue("type_F_M_VC2VC3_CAD_".$id);
	if (FieldSubmitted("F-M_VC2VC3_CAD_".$id))
	{
		$value=prepare_for_db("F-M_VC2VC3_CAD",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-M_VC2VC3_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-M_VC2VC3_CAD"]=$value;
	}
	}
//	processibng F-M_VC2VC3_CAD - end
//	processing F-M_VC2VC3_VLR - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_M_VC2VC3_VLR_".$id);
	$type=postvalue("type_F_M_VC2VC3_VLR_".$id);
	if (FieldSubmitted("F-M_VC2VC3_VLR_".$id))
	{
		$value=prepare_for_db("F-M_VC2VC3_VLR",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-M_VC2VC3_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-M_VC2VC3_VLR"]=$value;
	}
	}
//	processibng F-M_VC2VC3_VLR - end
//	processing LDI_FIXO_CAD - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_LDI_FIXO_CAD_".$id);
	$type=postvalue("type_LDI_FIXO_CAD_".$id);
	if (FieldSubmitted("LDI_FIXO_CAD_".$id))
	{
		$value=prepare_for_db("LDI_FIXO_CAD",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "LDI_FIXO_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["LDI_FIXO_CAD"]=$value;
	}
	}
//	processibng LDI_FIXO_CAD - end
//	processing LDI_FIXO_VLR - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_LDI_FIXO_VLR_".$id);
	$type=postvalue("type_LDI_FIXO_VLR_".$id);
	if (FieldSubmitted("LDI_FIXO_VLR_".$id))
	{
		$value=prepare_for_db("LDI_FIXO_VLR",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "LDI_FIXO_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["LDI_FIXO_VLR"]=$value;
	}
	}
//	processibng LDI_FIXO_VLR - end
//	processing LDI_MOVEL_CAD - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_LDI_MOVEL_CAD_".$id);
	$type=postvalue("type_LDI_MOVEL_CAD_".$id);
	if (FieldSubmitted("LDI_MOVEL_CAD_".$id))
	{
		$value=prepare_for_db("LDI_MOVEL_CAD",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "LDI_MOVEL_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["LDI_MOVEL_CAD"]=$value;
	}
	}
//	processibng LDI_MOVEL_CAD - end
//	processing LDI_MOVEL_VLR - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_LDI_MOVEL_VLR_".$id);
	$type=postvalue("type_LDI_MOVEL_VLR_".$id);
	if (FieldSubmitted("LDI_MOVEL_VLR_".$id))
	{
		$value=prepare_for_db("LDI_MOVEL_VLR",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "LDI_MOVEL_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["LDI_MOVEL_VLR"]=$value;
	}
	}
//	processibng LDI_MOVEL_VLR - end



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
					$message .='&nbsp;<a href=\'contrato_voip_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'contrato_voip_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: contrato_voip_".$pageObject->getPageType().".php");
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
		$copykeys["id_contrato"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["id_contrato"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id_contrato"]="";
//call CopyOnLoad event
	if(function_exists("CopyOnLoad"))
		CopyOnLoad($defvalues,$strWhere);
}
else
{
}

if($readavalues)
{
	$defvalues["num_contrato"]=@$avalues["num_contrato"];
	$defvalues["nm_operadora"]=@$avalues["nm_operadora"];
	$defvalues["Vingencia"]=@$avalues["Vingencia"];
	$defvalues["flg_ativo"]=@$avalues["flg_ativo"];
	$defvalues["F-F_VONO_CAD"]=@$avalues["F-F_VONO_CAD"];
	$defvalues["F-F_VONO_VLR"]=@$avalues["F-F_VONO_VLR"];
	$defvalues["F-F_NVONO_CAD"]=@$avalues["F-F_NVONO_CAD"];
	$defvalues["F-F_NVONO_VLR"]=@$avalues["F-F_NVONO_VLR"];
	$defvalues["F-M_VC1_CAD"]=@$avalues["F-M_VC1_CAD"];
	$defvalues["F-M_VC1_VLR"]=@$avalues["F-M_VC1_VLR"];
	$defvalues["F-M_VC2VC3_CAD"]=@$avalues["F-M_VC2VC3_CAD"];
	$defvalues["F-M_VC2VC3_VLR"]=@$avalues["F-M_VC2VC3_VLR"];
	$defvalues["LDI_FIXO_CAD"]=@$avalues["LDI_FIXO_CAD"];
	$defvalues["LDI_FIXO_VLR"]=@$avalues["LDI_FIXO_VLR"];
	$defvalues["LDI_MOVEL_CAD"]=@$avalues["LDI_MOVEL_CAD"];
	$defvalues["LDI_MOVEL_VLR"]=@$avalues["LDI_MOVEL_VLR"];
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
	$xt->assign("num_contrato_fieldblock",true);
	$xt->assign("num_contrato_label",true);
	if(isEnableSection508())
		$xt->assign_section("num_contrato_label","<label for=\"".GetInputElementId("num_contrato", $id)."\">","</label>");
	$xt->assign("nm_operadora_fieldblock",true);
	$xt->assign("nm_operadora_label",true);
	if(isEnableSection508())
		$xt->assign_section("nm_operadora_label","<label for=\"".GetInputElementId("nm_operadora", $id)."\">","</label>");
	$xt->assign("Vingencia_fieldblock",true);
	$xt->assign("Vingencia_label",true);
	if(isEnableSection508())
		$xt->assign_section("Vingencia_label","<label for=\"".GetInputElementId("Vingencia", $id)."\">","</label>");
	$xt->assign("flg_ativo_fieldblock",true);
	$xt->assign("flg_ativo_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_ativo_label","<label for=\"".GetInputElementId("flg_ativo", $id)."\">","</label>");
	$xt->assign("F_F_VONO_CAD_fieldblock",true);
	$xt->assign("F_F_VONO_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_F_VONO_CAD_label","<label for=\"".GetInputElementId("F-F_VONO_CAD", $id)."\">","</label>");
	$xt->assign("F_F_VONO_VLR_fieldblock",true);
	$xt->assign("F_F_VONO_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_F_VONO_VLR_label","<label for=\"".GetInputElementId("F-F_VONO_VLR", $id)."\">","</label>");
	$xt->assign("F_F_NVONO_CAD_fieldblock",true);
	$xt->assign("F_F_NVONO_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_F_NVONO_CAD_label","<label for=\"".GetInputElementId("F-F_NVONO_CAD", $id)."\">","</label>");
	$xt->assign("F_F_NVONO_VLR_fieldblock",true);
	$xt->assign("F_F_NVONO_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_F_NVONO_VLR_label","<label for=\"".GetInputElementId("F-F_NVONO_VLR", $id)."\">","</label>");
	$xt->assign("F_M_VC1_CAD_fieldblock",true);
	$xt->assign("F_M_VC1_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_M_VC1_CAD_label","<label for=\"".GetInputElementId("F-M_VC1_CAD", $id)."\">","</label>");
	$xt->assign("F_M_VC1_VLR_fieldblock",true);
	$xt->assign("F_M_VC1_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_M_VC1_VLR_label","<label for=\"".GetInputElementId("F-M_VC1_VLR", $id)."\">","</label>");
	$xt->assign("F_M_VC2VC3_CAD_fieldblock",true);
	$xt->assign("F_M_VC2VC3_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_M_VC2VC3_CAD_label","<label for=\"".GetInputElementId("F-M_VC2VC3_CAD", $id)."\">","</label>");
	$xt->assign("F_M_VC2VC3_VLR_fieldblock",true);
	$xt->assign("F_M_VC2VC3_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_M_VC2VC3_VLR_label","<label for=\"".GetInputElementId("F-M_VC2VC3_VLR", $id)."\">","</label>");
	$xt->assign("LDI_FIXO_CAD_fieldblock",true);
	$xt->assign("LDI_FIXO_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("LDI_FIXO_CAD_label","<label for=\"".GetInputElementId("LDI_FIXO_CAD", $id)."\">","</label>");
	$xt->assign("LDI_FIXO_VLR_fieldblock",true);
	$xt->assign("LDI_FIXO_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("LDI_FIXO_VLR_label","<label for=\"".GetInputElementId("LDI_FIXO_VLR", $id)."\">","</label>");
	$xt->assign("LDI_MOVEL_CAD_fieldblock",true);
	$xt->assign("LDI_MOVEL_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("LDI_MOVEL_CAD_label","<label for=\"".GetInputElementId("LDI_MOVEL_CAD", $id)."\">","</label>");
	$xt->assign("LDI_MOVEL_VLR_fieldblock",true);
	$xt->assign("LDI_MOVEL_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("LDI_MOVEL_VLR_label","<label for=\"".GetInputElementId("LDI_MOVEL_VLR", $id)."\">","</label>");
	
	
	if($inlineadd!=ADD_ONTHEFLY)
	{
		if($onsubmit)
			$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit)."\"";
		
		$pageObject->body["begin"] .= $includes;
		if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='contrato_voip_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="contrato_voip_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="contrato_voip_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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

	$showKeys[] = htmlspecialchars($keys["id_contrato"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_contrato"]));

	

	
	
////////////////////////////////////////////
//	num_contrato - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"num_contrato", ""),"field=num%5Fcontrato".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "num_contrato";
				$showRawValues[] = substr($data["num_contrato"],0,100);
	}	
//	nm_operadora - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"nm_operadora", ""),"field=nm%5Foperadora".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "nm_operadora";
				$showRawValues[] = substr($data["nm_operadora"],0,100);
	}	
//	Vingencia - Short Date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"Vingencia", "Short Date"),"field=Vingencia".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "Vingencia";
				$showRawValues[] = substr($data["Vingencia"],0,100);
	}	
//	flg_ativo - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"flg_ativo", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "flg_ativo";
				$showRawValues[] = substr($data["flg_ativo"],0,100);
	}	
//	F-F_VONO_CAD - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("F-F_VONO_CAD",$data["F-F_VONO_CAD"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_F_VONO_CAD";
				$showRawValues[] = substr($data["F-F_VONO_CAD"],0,100);
	}	
//	F-F_VONO_VLR - Currency
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"F-F_VONO_VLR", "Currency"),"field=F%2DF%5FVONO%5FVLR".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_F_VONO_VLR";
				$showRawValues[] = substr($data["F-F_VONO_VLR"],0,100);
	}	
//	F-F_NVONO_CAD - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("F-F_NVONO_CAD",$data["F-F_NVONO_CAD"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_F_NVONO_CAD";
				$showRawValues[] = substr($data["F-F_NVONO_CAD"],0,100);
	}	
//	F-F_NVONO_VLR - Currency
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"F-F_NVONO_VLR", "Currency"),"field=F%2DF%5FNVONO%5FVLR".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_F_NVONO_VLR";
				$showRawValues[] = substr($data["F-F_NVONO_VLR"],0,100);
	}	
//	F-M_VC1_CAD - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("F-M_VC1_CAD",$data["F-M_VC1_CAD"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_M_VC1_CAD";
				$showRawValues[] = substr($data["F-M_VC1_CAD"],0,100);
	}	
//	F-M_VC1_VLR - Currency
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"F-M_VC1_VLR", "Currency"),"field=F%2DM%5FVC1%5FVLR".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_M_VC1_VLR";
				$showRawValues[] = substr($data["F-M_VC1_VLR"],0,100);
	}	
//	F-M_VC2VC3_CAD - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("F-M_VC2VC3_CAD",$data["F-M_VC2VC3_CAD"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_M_VC2VC3_CAD";
				$showRawValues[] = substr($data["F-M_VC2VC3_CAD"],0,100);
	}	
//	F-M_VC2VC3_VLR - Currency
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"F-M_VC2VC3_VLR", "Currency"),"field=F%2DM%5FVC2VC3%5FVLR".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_M_VC2VC3_VLR";
				$showRawValues[] = substr($data["F-M_VC2VC3_VLR"],0,100);
	}	
//	LDI_FIXO_CAD - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("LDI_FIXO_CAD",$data["LDI_FIXO_CAD"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "LDI_FIXO_CAD";
				$showRawValues[] = substr($data["LDI_FIXO_CAD"],0,100);
	}	
//	LDI_FIXO_VLR - Currency
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"LDI_FIXO_VLR", "Currency"),"field=LDI%5FFIXO%5FVLR".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "LDI_FIXO_VLR";
				$showRawValues[] = substr($data["LDI_FIXO_VLR"],0,100);
	}	
//	LDI_MOVEL_CAD - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("LDI_MOVEL_CAD",$data["LDI_MOVEL_CAD"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "LDI_MOVEL_CAD";
				$showRawValues[] = substr($data["LDI_MOVEL_CAD"],0,100);
	}	
//	LDI_MOVEL_VLR - Currency
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"LDI_MOVEL_VLR", "Currency"),"field=LDI%5FMOVEL%5FVLR".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "LDI_MOVEL_VLR";
				$showRawValues[] = substr($data["LDI_MOVEL_VLR"],0,100);
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
//	control - num_contrato
$control_num_contrato=array();
$control_num_contrato["func"]="xt_buildeditcontrol";
$control_num_contrato["params"] = array();
$control_num_contrato["params"]["field"]="num_contrato";
$control_num_contrato["params"]["value"]=@$defvalues["num_contrato"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_num_contrato["params"]["validate"]=$arrValidate;
//	End Add validation

$control_num_contrato["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_num_contrato["params"]["mode"]="inline_add";
else
	$control_num_contrato["params"]["mode"]="add";

if(!$detailKeys || !in_array("num_contrato", $detailKeys))
	$xt->assignbyref("num_contrato_editcontrol",$control_num_contrato);
else if(array_key_exists("num_contrato", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"num_contrato", ""),"field=num%5Fcontrato","",MODE_VIEW);
		$xt->assign("num_contrato_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - nm_operadora
$control_nm_operadora=array();
$control_nm_operadora["func"]="xt_buildeditcontrol";
$control_nm_operadora["params"] = array();
$control_nm_operadora["params"]["field"]="nm_operadora";
$control_nm_operadora["params"]["value"]=@$defvalues["nm_operadora"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_nm_operadora["params"]["validate"]=$arrValidate;
//	End Add validation

$control_nm_operadora["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_nm_operadora["params"]["mode"]="inline_add";
else
	$control_nm_operadora["params"]["mode"]="add";

if(!$detailKeys || !in_array("nm_operadora", $detailKeys))
	$xt->assignbyref("nm_operadora_editcontrol",$control_nm_operadora);
else if(array_key_exists("nm_operadora", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"nm_operadora", ""),"field=nm%5Foperadora","",MODE_VIEW);
		$xt->assign("nm_operadora_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - Vingencia
$control_Vingencia=array();
$control_Vingencia["func"]="xt_buildeditcontrol";
$control_Vingencia["params"] = array();
$control_Vingencia["params"]["field"]="Vingencia";
$control_Vingencia["params"]["value"]=@$defvalues["Vingencia"];

//	Begin Add validation
$arrValidate = array();	
$control_Vingencia["params"]["validate"]=$arrValidate;
//	End Add validation

$control_Vingencia["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_Vingencia["params"]["mode"]="inline_add";
else
	$control_Vingencia["params"]["mode"]="add";

if(!$detailKeys || !in_array("Vingencia", $detailKeys))
	$xt->assignbyref("Vingencia_editcontrol",$control_Vingencia);
else if(array_key_exists("Vingencia", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"Vingencia", "Short Date"),"field=Vingencia","",MODE_VIEW);
		$xt->assign("Vingencia_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_ativo
$control_flg_ativo=array();
$control_flg_ativo["func"]="xt_buildeditcontrol";
$control_flg_ativo["params"] = array();
$control_flg_ativo["params"]["field"]="flg_ativo";
$control_flg_ativo["params"]["value"]=@$defvalues["flg_ativo"];

//	Begin Add validation
$arrValidate = array();	
$control_flg_ativo["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_ativo["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_ativo["params"]["mode"]="inline_add";
else
	$control_flg_ativo["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_ativo", $detailKeys))
	$xt->assignbyref("flg_ativo_editcontrol",$control_flg_ativo);
else if(array_key_exists("flg_ativo", $defvalues))
{
				$value = GetData($defvalues,"flg_ativo", "Checkbox");
		$xt->assign("flg_ativo_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_F_VONO_CAD
$control_F_F_VONO_CAD=array();
$control_F_F_VONO_CAD["func"]="xt_buildeditcontrol";
$control_F_F_VONO_CAD["params"] = array();
$control_F_F_VONO_CAD["params"]["field"]="F-F_VONO_CAD";
$control_F_F_VONO_CAD["params"]["value"]=@$defvalues["F-F_VONO_CAD"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_F_VONO_CAD["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_F_VONO_CAD["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_F_VONO_CAD["params"]["mode"]="inline_add";
else
	$control_F_F_VONO_CAD["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-F_VONO_CAD", $detailKeys))
	$xt->assignbyref("F_F_VONO_CAD_editcontrol",$control_F_F_VONO_CAD);
else if(array_key_exists("F-F_VONO_CAD", $defvalues))
{
				$value=DisplayLookupWizard("F-F_VONO_CAD",$defvalues["F-F_VONO_CAD"],$defvalues,"",MODE_VIEW);
		$xt->assign("F_F_VONO_CAD_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_F_VONO_VLR
$control_F_F_VONO_VLR=array();
$control_F_F_VONO_VLR["func"]="xt_buildeditcontrol";
$control_F_F_VONO_VLR["params"] = array();
$control_F_F_VONO_VLR["params"]["field"]="F-F_VONO_VLR";
$control_F_F_VONO_VLR["params"]["value"]=@$defvalues["F-F_VONO_VLR"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Currency");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_F_VONO_VLR["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_F_VONO_VLR["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_F_VONO_VLR["params"]["mode"]="inline_add";
else
	$control_F_F_VONO_VLR["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-F_VONO_VLR", $detailKeys))
	$xt->assignbyref("F_F_VONO_VLR_editcontrol",$control_F_F_VONO_VLR);
else if(array_key_exists("F-F_VONO_VLR", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"F-F_VONO_VLR", "Currency"),"field=F%2DF%5FVONO%5FVLR","",MODE_VIEW);
		$xt->assign("F_F_VONO_VLR_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_F_NVONO_CAD
$control_F_F_NVONO_CAD=array();
$control_F_F_NVONO_CAD["func"]="xt_buildeditcontrol";
$control_F_F_NVONO_CAD["params"] = array();
$control_F_F_NVONO_CAD["params"]["field"]="F-F_NVONO_CAD";
$control_F_F_NVONO_CAD["params"]["value"]=@$defvalues["F-F_NVONO_CAD"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_F_NVONO_CAD["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_F_NVONO_CAD["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_F_NVONO_CAD["params"]["mode"]="inline_add";
else
	$control_F_F_NVONO_CAD["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-F_NVONO_CAD", $detailKeys))
	$xt->assignbyref("F_F_NVONO_CAD_editcontrol",$control_F_F_NVONO_CAD);
else if(array_key_exists("F-F_NVONO_CAD", $defvalues))
{
				$value=DisplayLookupWizard("F-F_NVONO_CAD",$defvalues["F-F_NVONO_CAD"],$defvalues,"",MODE_VIEW);
		$xt->assign("F_F_NVONO_CAD_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_F_NVONO_VLR
$control_F_F_NVONO_VLR=array();
$control_F_F_NVONO_VLR["func"]="xt_buildeditcontrol";
$control_F_F_NVONO_VLR["params"] = array();
$control_F_F_NVONO_VLR["params"]["field"]="F-F_NVONO_VLR";
$control_F_F_NVONO_VLR["params"]["value"]=@$defvalues["F-F_NVONO_VLR"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Currency");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_F_NVONO_VLR["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_F_NVONO_VLR["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_F_NVONO_VLR["params"]["mode"]="inline_add";
else
	$control_F_F_NVONO_VLR["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-F_NVONO_VLR", $detailKeys))
	$xt->assignbyref("F_F_NVONO_VLR_editcontrol",$control_F_F_NVONO_VLR);
else if(array_key_exists("F-F_NVONO_VLR", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"F-F_NVONO_VLR", "Currency"),"field=F%2DF%5FNVONO%5FVLR","",MODE_VIEW);
		$xt->assign("F_F_NVONO_VLR_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_M_VC1_CAD
$control_F_M_VC1_CAD=array();
$control_F_M_VC1_CAD["func"]="xt_buildeditcontrol";
$control_F_M_VC1_CAD["params"] = array();
$control_F_M_VC1_CAD["params"]["field"]="F-M_VC1_CAD";
$control_F_M_VC1_CAD["params"]["value"]=@$defvalues["F-M_VC1_CAD"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_M_VC1_CAD["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_M_VC1_CAD["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_M_VC1_CAD["params"]["mode"]="inline_add";
else
	$control_F_M_VC1_CAD["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-M_VC1_CAD", $detailKeys))
	$xt->assignbyref("F_M_VC1_CAD_editcontrol",$control_F_M_VC1_CAD);
else if(array_key_exists("F-M_VC1_CAD", $defvalues))
{
				$value=DisplayLookupWizard("F-M_VC1_CAD",$defvalues["F-M_VC1_CAD"],$defvalues,"",MODE_VIEW);
		$xt->assign("F_M_VC1_CAD_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_M_VC1_VLR
$control_F_M_VC1_VLR=array();
$control_F_M_VC1_VLR["func"]="xt_buildeditcontrol";
$control_F_M_VC1_VLR["params"] = array();
$control_F_M_VC1_VLR["params"]["field"]="F-M_VC1_VLR";
$control_F_M_VC1_VLR["params"]["value"]=@$defvalues["F-M_VC1_VLR"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Currency");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_M_VC1_VLR["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_M_VC1_VLR["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_M_VC1_VLR["params"]["mode"]="inline_add";
else
	$control_F_M_VC1_VLR["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-M_VC1_VLR", $detailKeys))
	$xt->assignbyref("F_M_VC1_VLR_editcontrol",$control_F_M_VC1_VLR);
else if(array_key_exists("F-M_VC1_VLR", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"F-M_VC1_VLR", "Currency"),"field=F%2DM%5FVC1%5FVLR","",MODE_VIEW);
		$xt->assign("F_M_VC1_VLR_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_M_VC2VC3_CAD
$control_F_M_VC2VC3_CAD=array();
$control_F_M_VC2VC3_CAD["func"]="xt_buildeditcontrol";
$control_F_M_VC2VC3_CAD["params"] = array();
$control_F_M_VC2VC3_CAD["params"]["field"]="F-M_VC2VC3_CAD";
$control_F_M_VC2VC3_CAD["params"]["value"]=@$defvalues["F-M_VC2VC3_CAD"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_M_VC2VC3_CAD["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_M_VC2VC3_CAD["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_M_VC2VC3_CAD["params"]["mode"]="inline_add";
else
	$control_F_M_VC2VC3_CAD["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-M_VC2VC3_CAD", $detailKeys))
	$xt->assignbyref("F_M_VC2VC3_CAD_editcontrol",$control_F_M_VC2VC3_CAD);
else if(array_key_exists("F-M_VC2VC3_CAD", $defvalues))
{
				$value=DisplayLookupWizard("F-M_VC2VC3_CAD",$defvalues["F-M_VC2VC3_CAD"],$defvalues,"",MODE_VIEW);
		$xt->assign("F_M_VC2VC3_CAD_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_M_VC2VC3_VLR
$control_F_M_VC2VC3_VLR=array();
$control_F_M_VC2VC3_VLR["func"]="xt_buildeditcontrol";
$control_F_M_VC2VC3_VLR["params"] = array();
$control_F_M_VC2VC3_VLR["params"]["field"]="F-M_VC2VC3_VLR";
$control_F_M_VC2VC3_VLR["params"]["value"]=@$defvalues["F-M_VC2VC3_VLR"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Currency");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_M_VC2VC3_VLR["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_M_VC2VC3_VLR["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_M_VC2VC3_VLR["params"]["mode"]="inline_add";
else
	$control_F_M_VC2VC3_VLR["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-M_VC2VC3_VLR", $detailKeys))
	$xt->assignbyref("F_M_VC2VC3_VLR_editcontrol",$control_F_M_VC2VC3_VLR);
else if(array_key_exists("F-M_VC2VC3_VLR", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"F-M_VC2VC3_VLR", "Currency"),"field=F%2DM%5FVC2VC3%5FVLR","",MODE_VIEW);
		$xt->assign("F_M_VC2VC3_VLR_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - LDI_FIXO_CAD
$control_LDI_FIXO_CAD=array();
$control_LDI_FIXO_CAD["func"]="xt_buildeditcontrol";
$control_LDI_FIXO_CAD["params"] = array();
$control_LDI_FIXO_CAD["params"]["field"]="LDI_FIXO_CAD";
$control_LDI_FIXO_CAD["params"]["value"]=@$defvalues["LDI_FIXO_CAD"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_LDI_FIXO_CAD["params"]["validate"]=$arrValidate;
//	End Add validation

$control_LDI_FIXO_CAD["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_LDI_FIXO_CAD["params"]["mode"]="inline_add";
else
	$control_LDI_FIXO_CAD["params"]["mode"]="add";

if(!$detailKeys || !in_array("LDI_FIXO_CAD", $detailKeys))
	$xt->assignbyref("LDI_FIXO_CAD_editcontrol",$control_LDI_FIXO_CAD);
else if(array_key_exists("LDI_FIXO_CAD", $defvalues))
{
				$value=DisplayLookupWizard("LDI_FIXO_CAD",$defvalues["LDI_FIXO_CAD"],$defvalues,"",MODE_VIEW);
		$xt->assign("LDI_FIXO_CAD_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - LDI_FIXO_VLR
$control_LDI_FIXO_VLR=array();
$control_LDI_FIXO_VLR["func"]="xt_buildeditcontrol";
$control_LDI_FIXO_VLR["params"] = array();
$control_LDI_FIXO_VLR["params"]["field"]="LDI_FIXO_VLR";
$control_LDI_FIXO_VLR["params"]["value"]=@$defvalues["LDI_FIXO_VLR"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Currency");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_LDI_FIXO_VLR["params"]["validate"]=$arrValidate;
//	End Add validation

$control_LDI_FIXO_VLR["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_LDI_FIXO_VLR["params"]["mode"]="inline_add";
else
	$control_LDI_FIXO_VLR["params"]["mode"]="add";

if(!$detailKeys || !in_array("LDI_FIXO_VLR", $detailKeys))
	$xt->assignbyref("LDI_FIXO_VLR_editcontrol",$control_LDI_FIXO_VLR);
else if(array_key_exists("LDI_FIXO_VLR", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"LDI_FIXO_VLR", "Currency"),"field=LDI%5FFIXO%5FVLR","",MODE_VIEW);
		$xt->assign("LDI_FIXO_VLR_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - LDI_MOVEL_CAD
$control_LDI_MOVEL_CAD=array();
$control_LDI_MOVEL_CAD["func"]="xt_buildeditcontrol";
$control_LDI_MOVEL_CAD["params"] = array();
$control_LDI_MOVEL_CAD["params"]["field"]="LDI_MOVEL_CAD";
$control_LDI_MOVEL_CAD["params"]["value"]=@$defvalues["LDI_MOVEL_CAD"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_LDI_MOVEL_CAD["params"]["validate"]=$arrValidate;
//	End Add validation

$control_LDI_MOVEL_CAD["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_LDI_MOVEL_CAD["params"]["mode"]="inline_add";
else
	$control_LDI_MOVEL_CAD["params"]["mode"]="add";

if(!$detailKeys || !in_array("LDI_MOVEL_CAD", $detailKeys))
	$xt->assignbyref("LDI_MOVEL_CAD_editcontrol",$control_LDI_MOVEL_CAD);
else if(array_key_exists("LDI_MOVEL_CAD", $defvalues))
{
				$value=DisplayLookupWizard("LDI_MOVEL_CAD",$defvalues["LDI_MOVEL_CAD"],$defvalues,"",MODE_VIEW);
		$xt->assign("LDI_MOVEL_CAD_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - LDI_MOVEL_VLR
$control_LDI_MOVEL_VLR=array();
$control_LDI_MOVEL_VLR["func"]="xt_buildeditcontrol";
$control_LDI_MOVEL_VLR["params"] = array();
$control_LDI_MOVEL_VLR["params"]["field"]="LDI_MOVEL_VLR";
$control_LDI_MOVEL_VLR["params"]["value"]=@$defvalues["LDI_MOVEL_VLR"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Currency");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_LDI_MOVEL_VLR["params"]["validate"]=$arrValidate;
//	End Add validation

$control_LDI_MOVEL_VLR["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_LDI_MOVEL_VLR["params"]["mode"]="inline_add";
else
	$control_LDI_MOVEL_VLR["params"]["mode"]="add";

if(!$detailKeys || !in_array("LDI_MOVEL_VLR", $detailKeys))
	$xt->assignbyref("LDI_MOVEL_VLR_editcontrol",$control_LDI_MOVEL_VLR);
else if(array_key_exists("LDI_MOVEL_VLR", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"LDI_MOVEL_VLR", "Currency"),"field=LDI%5FMOVEL%5FVLR","",MODE_VIEW);
		$xt->assign("LDI_MOVEL_VLR_editcontrol",$value);
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
	$strTableName = "contrato_voip";
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
