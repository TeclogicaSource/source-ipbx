<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/troncos_vono_variables.php");
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
	$templatefile = "troncos_vono_inline_add.htm";
else
	$templatefile = "troncos_vono_add.htm";

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
			'mShortTableName':'troncos_vono', 
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
//	processing dsc_tronco - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dsc_tronco_".$id);
	$type=postvalue("type_dsc_tronco_".$id);
	if (FieldSubmitted("dsc_tronco_".$id))
	{
		$value=prepare_for_db("dsc_tronco",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dsc_tronco"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dsc_tronco"]=$value;
	}
	}
//	processibng dsc_tronco - end
//	processing usuario - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_usuario_".$id);
	$type=postvalue("type_usuario_".$id);
	if (FieldSubmitted("usuario_".$id))
	{
		$value=prepare_for_db("usuario",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "usuario"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["usuario"]=$value;
	}
	}
//	processibng usuario - end
//	processing senha - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_senha_".$id);
	$type=postvalue("type_senha_".$id);
	if (FieldSubmitted("senha_".$id))
	{
		$value=prepare_for_db("senha",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "senha"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["senha"]=$value;
	}
	}
//	processibng senha - end
//	processing ip_interf - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_ip_interf_".$id);
	$type=postvalue("type_ip_interf_".$id);
	if (FieldSubmitted("ip_interf_".$id))
	{
		$value=prepare_for_db("ip_interf",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ip_interf"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ip_interf"]=$value;
	}
	}
//	processibng ip_interf - end
//	processing tp_toques - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_tp_toques_".$id);
	$type=postvalue("type_tp_toques_".$id);
	if (FieldSubmitted("tp_toques_".$id))
	{
		$value=prepare_for_db("tp_toques",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "tp_toques"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["tp_toques"]=$value;
	}
	}
//	processibng tp_toques - end
//	processing dig_rota - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dig_rota_".$id);
	$type=postvalue("type_dig_rota_".$id);
	if (FieldSubmitted("dig_rota_".$id))
	{
		$value=prepare_for_db("dig_rota",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dig_rota"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dig_rota"]=$value;
	}
	}
//	processibng dig_rota - end
//	processing id_contrato - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_contrato_".$id);
	$type=postvalue("type_id_contrato_".$id);
	if (FieldSubmitted("id_contrato_".$id))
	{
		$value=prepare_for_db("id_contrato",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_contrato"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_contrato"]=$value;
	}
	}
//	processibng id_contrato - end
//	processing flg_grava_ent - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_grava_ent_".$id);
	$type=postvalue("type_flg_grava_ent_".$id);
	if (FieldSubmitted("flg_grava_ent_".$id))
	{
		$value=prepare_for_db("flg_grava_ent",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_grava_ent"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_grava_ent"]=$value;
	}
	}
//	processibng flg_grava_ent - end
//	processing flg_grava_sai - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_grava_sai_".$id);
	$type=postvalue("type_flg_grava_sai_".$id);
	if (FieldSubmitted("flg_grava_sai_".$id))
	{
		$value=prepare_for_db("flg_grava_sai",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_grava_sai"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_grava_sai"]=$value;
	}
	}
//	processibng flg_grava_sai - end
//	processing flg_pabx_remoto - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_pabx_remoto_".$id);
	$type=postvalue("type_flg_pabx_remoto_".$id);
	if (FieldSubmitted("flg_pabx_remoto_".$id))
	{
		$value=prepare_for_db("flg_pabx_remoto",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_pabx_remoto"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_pabx_remoto"]=$value;
	}
	}
//	processibng flg_pabx_remoto - end
//	processing flg_cel_local - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_cel_local_".$id);
	$type=postvalue("type_flg_cel_local_".$id);
	if (FieldSubmitted("flg_cel_local_".$id))
	{
		$value=prepare_for_db("flg_cel_local",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_cel_local"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_cel_local"]=$value;
	}
	}
//	processibng flg_cel_local - end
//	processing flg_local - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_local_".$id);
	$type=postvalue("type_flg_local_".$id);
	if (FieldSubmitted("flg_local_".$id))
	{
		$value=prepare_for_db("flg_local",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_local"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_local"]=$value;
	}
	}
//	processibng flg_local - end
//	processing flg_fixo_ddd - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_fixo_ddd_".$id);
	$type=postvalue("type_flg_fixo_ddd_".$id);
	if (FieldSubmitted("flg_fixo_ddd_".$id))
	{
		$value=prepare_for_db("flg_fixo_ddd",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_fixo_ddd"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_fixo_ddd"]=$value;
	}
	}
//	processibng flg_fixo_ddd - end
//	processing flg_cel_ddd - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_cel_ddd_".$id);
	$type=postvalue("type_flg_cel_ddd_".$id);
	if (FieldSubmitted("flg_cel_ddd_".$id))
	{
		$value=prepare_for_db("flg_cel_ddd",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_cel_ddd"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_cel_ddd"]=$value;
	}
	}
//	processibng flg_cel_ddd - end
//	processing flg_ddi - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_ddi_".$id);
	$type=postvalue("type_flg_ddi_".$id);
	if (FieldSubmitted("flg_ddi_".$id))
	{
		$value=prepare_for_db("flg_ddi",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_ddi"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_ddi"]=$value;
	}
	}
//	processibng flg_ddi - end
//	processing dig_operadora - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dig_operadora_".$id);
	$type=postvalue("type_dig_operadora_".$id);
	if (FieldSubmitted("dig_operadora_".$id))
	{
		$value=prepare_for_db("dig_operadora",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dig_operadora"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dig_operadora"]=$value;
	}
	}
//	processibng dig_operadora - end
//	processing prioridade - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_prioridade_".$id);
	$type=postvalue("type_prioridade_".$id);
	if (FieldSubmitted("prioridade_".$id))
	{
		$value=prepare_for_db("prioridade",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "prioridade"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["prioridade"]=$value;
	}
	}
//	processibng prioridade - end



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
					$message .='&nbsp;<a href=\'troncos_vono_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'troncos_vono_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: troncos_vono_".$pageObject->getPageType().".php");
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
		$copykeys["id_tronco"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["id_tronco"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id_tronco"]="";
//call CopyOnLoad event
	if(function_exists("CopyOnLoad"))
		CopyOnLoad($defvalues,$strWhere);
}
else
{
}

if($readavalues)
{
	$defvalues["dsc_tronco"]=@$avalues["dsc_tronco"];
	$defvalues["usuario"]=@$avalues["usuario"];
	$defvalues["senha"]=@$avalues["senha"];
	$defvalues["ip_interf"]=@$avalues["ip_interf"];
	$defvalues["tp_toques"]=@$avalues["tp_toques"];
	$defvalues["dig_rota"]=@$avalues["dig_rota"];
	$defvalues["id_contrato"]=@$avalues["id_contrato"];
	$defvalues["flg_grava_ent"]=@$avalues["flg_grava_ent"];
	$defvalues["flg_grava_sai"]=@$avalues["flg_grava_sai"];
	$defvalues["flg_pabx_remoto"]=@$avalues["flg_pabx_remoto"];
	$defvalues["flg_cel_local"]=@$avalues["flg_cel_local"];
	$defvalues["flg_local"]=@$avalues["flg_local"];
	$defvalues["flg_fixo_ddd"]=@$avalues["flg_fixo_ddd"];
	$defvalues["flg_cel_ddd"]=@$avalues["flg_cel_ddd"];
	$defvalues["flg_ddi"]=@$avalues["flg_ddi"];
	$defvalues["dig_operadora"]=@$avalues["dig_operadora"];
	$defvalues["prioridade"]=@$avalues["prioridade"];
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
	$xt->assign("dsc_tronco_fieldblock",true);
	$xt->assign("dsc_tronco_label",true);
	if(isEnableSection508())
		$xt->assign_section("dsc_tronco_label","<label for=\"".GetInputElementId("dsc_tronco", $id)."\">","</label>");
	$xt->assign("usuario_fieldblock",true);
	$xt->assign("usuario_label",true);
	if(isEnableSection508())
		$xt->assign_section("usuario_label","<label for=\"".GetInputElementId("usuario", $id)."\">","</label>");
	$xt->assign("senha_fieldblock",true);
	$xt->assign("senha_label",true);
	if(isEnableSection508())
		$xt->assign_section("senha_label","<label for=\"".GetInputElementId("senha", $id)."\">","</label>");
	$xt->assign("ip_interf_fieldblock",true);
	$xt->assign("ip_interf_label",true);
	if(isEnableSection508())
		$xt->assign_section("ip_interf_label","<label for=\"".GetInputElementId("ip_interf", $id)."\">","</label>");
	$xt->assign("tp_toques_fieldblock",true);
	$xt->assign("tp_toques_label",true);
	if(isEnableSection508())
		$xt->assign_section("tp_toques_label","<label for=\"".GetInputElementId("tp_toques", $id)."\">","</label>");
	$xt->assign("dig_rota_fieldblock",true);
	$xt->assign("dig_rota_label",true);
	if(isEnableSection508())
		$xt->assign_section("dig_rota_label","<label for=\"".GetInputElementId("dig_rota", $id)."\">","</label>");
	$xt->assign("id_contrato_fieldblock",true);
	$xt->assign("id_contrato_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_contrato_label","<label for=\"".GetInputElementId("id_contrato", $id)."\">","</label>");
	$xt->assign("flg_grava_ent_fieldblock",true);
	$xt->assign("flg_grava_ent_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_grava_ent_label","<label for=\"".GetInputElementId("flg_grava_ent", $id)."\">","</label>");
	$xt->assign("flg_grava_sai_fieldblock",true);
	$xt->assign("flg_grava_sai_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_grava_sai_label","<label for=\"".GetInputElementId("flg_grava_sai", $id)."\">","</label>");
	$xt->assign("flg_pabx_remoto_fieldblock",true);
	$xt->assign("flg_pabx_remoto_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_pabx_remoto_label","<label for=\"".GetInputElementId("flg_pabx_remoto", $id)."\">","</label>");
	$xt->assign("flg_cel_local_fieldblock",true);
	$xt->assign("flg_cel_local_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_cel_local_label","<label for=\"".GetInputElementId("flg_cel_local", $id)."\">","</label>");
	$xt->assign("flg_local_fieldblock",true);
	$xt->assign("flg_local_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_local_label","<label for=\"".GetInputElementId("flg_local", $id)."\">","</label>");
	$xt->assign("flg_fixo_ddd_fieldblock",true);
	$xt->assign("flg_fixo_ddd_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_fixo_ddd_label","<label for=\"".GetInputElementId("flg_fixo_ddd", $id)."\">","</label>");
	$xt->assign("flg_cel_ddd_fieldblock",true);
	$xt->assign("flg_cel_ddd_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_cel_ddd_label","<label for=\"".GetInputElementId("flg_cel_ddd", $id)."\">","</label>");
	$xt->assign("flg_ddi_fieldblock",true);
	$xt->assign("flg_ddi_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_ddi_label","<label for=\"".GetInputElementId("flg_ddi", $id)."\">","</label>");
	$xt->assign("dig_operadora_fieldblock",true);
	$xt->assign("dig_operadora_label",true);
	if(isEnableSection508())
		$xt->assign_section("dig_operadora_label","<label for=\"".GetInputElementId("dig_operadora", $id)."\">","</label>");
	$xt->assign("prioridade_fieldblock",true);
	$xt->assign("prioridade_label",true);
	if(isEnableSection508())
		$xt->assign_section("prioridade_label","<label for=\"".GetInputElementId("prioridade", $id)."\">","</label>");
	
	
	if($inlineadd!=ADD_ONTHEFLY)
	{
		if($onsubmit)
			$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit)."\"";
		
		$pageObject->body["begin"] .= $includes;
		if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='troncos_vono_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="troncos_vono_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="troncos_vono_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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

	$showKeys[] = htmlspecialchars($keys["id_tronco"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_tronco"]));

	

	
	
////////////////////////////////////////////
//	dsc_tronco - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dsc_tronco", ""),"field=dsc%5Ftronco".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dsc_tronco";
				$showRawValues[] = substr($data["dsc_tronco"],0,100);
	}	
//	usuario - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"usuario", ""),"field=usuario".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "usuario";
				$showRawValues[] = substr($data["usuario"],0,100);
	}	
//	senha - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"senha", ""),"field=senha".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "senha";
				$showRawValues[] = substr($data["senha"],0,100);
	}	
//	ip_interf - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ip_interf", ""),"field=ip%5Finterf".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ip_interf";
				$showRawValues[] = substr($data["ip_interf"],0,100);
	}	
//	tp_toques - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"tp_toques", ""),"field=tp%5Ftoques".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_toques";
				$showRawValues[] = substr($data["tp_toques"],0,100);
	}	
//	dig_rota - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dig_rota", ""),"field=dig%5Frota".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dig_rota";
				$showRawValues[] = substr($data["dig_rota"],0,100);
	}	
//	id_contrato - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("id_contrato",$data["id_contrato"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_contrato";
				$showRawValues[] = substr($data["id_contrato"],0,100);
	}	
//	flg_grava_ent - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"flg_grava_ent", ""),"field=flg%5Fgrava%5Fent".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "flg_grava_ent";
				$showRawValues[] = substr($data["flg_grava_ent"],0,100);
	}	
//	flg_grava_sai - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"flg_grava_sai", ""),"field=flg%5Fgrava%5Fsai".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "flg_grava_sai";
				$showRawValues[] = substr($data["flg_grava_sai"],0,100);
	}	
//	flg_pabx_remoto - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"flg_pabx_remoto", ""),"field=flg%5Fpabx%5Fremoto".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "flg_pabx_remoto";
				$showRawValues[] = substr($data["flg_pabx_remoto"],0,100);
	}	
//	flg_cel_local - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"flg_cel_local", ""),"field=flg%5Fcel%5Flocal".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "flg_cel_local";
				$showRawValues[] = substr($data["flg_cel_local"],0,100);
	}	
//	flg_local - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"flg_local", ""),"field=flg%5Flocal".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "flg_local";
				$showRawValues[] = substr($data["flg_local"],0,100);
	}	
//	flg_fixo_ddd - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"flg_fixo_ddd", ""),"field=flg%5Ffixo%5Fddd".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "flg_fixo_ddd";
				$showRawValues[] = substr($data["flg_fixo_ddd"],0,100);
	}	
//	flg_cel_ddd - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"flg_cel_ddd", ""),"field=flg%5Fcel%5Fddd".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "flg_cel_ddd";
				$showRawValues[] = substr($data["flg_cel_ddd"],0,100);
	}	
//	flg_ddi - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"flg_ddi", ""),"field=flg%5Fddi".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "flg_ddi";
				$showRawValues[] = substr($data["flg_ddi"],0,100);
	}	
//	dig_operadora - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dig_operadora", ""),"field=dig%5Foperadora".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dig_operadora";
				$showRawValues[] = substr($data["dig_operadora"],0,100);
	}	
//	prioridade - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"prioridade", ""),"field=prioridade".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "prioridade";
				$showRawValues[] = substr($data["prioridade"],0,100);
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
//	control - dsc_tronco
$control_dsc_tronco=array();
$control_dsc_tronco["func"]="xt_buildeditcontrol";
$control_dsc_tronco["params"] = array();
$control_dsc_tronco["params"]["field"]="dsc_tronco";
$control_dsc_tronco["params"]["value"]=@$defvalues["dsc_tronco"];

//	Begin Add validation
$arrValidate = array();	
$control_dsc_tronco["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dsc_tronco["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dsc_tronco["params"]["mode"]="inline_add";
else
	$control_dsc_tronco["params"]["mode"]="add";

if(!$detailKeys || !in_array("dsc_tronco", $detailKeys))
	$xt->assignbyref("dsc_tronco_editcontrol",$control_dsc_tronco);
else if(array_key_exists("dsc_tronco", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dsc_tronco", ""),"field=dsc%5Ftronco","",MODE_VIEW);
		$xt->assign("dsc_tronco_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - usuario
$control_usuario=array();
$control_usuario["func"]="xt_buildeditcontrol";
$control_usuario["params"] = array();
$control_usuario["params"]["field"]="usuario";
$control_usuario["params"]["value"]=@$defvalues["usuario"];

//	Begin Add validation
$arrValidate = array();	
$control_usuario["params"]["validate"]=$arrValidate;
//	End Add validation

$control_usuario["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_usuario["params"]["mode"]="inline_add";
else
	$control_usuario["params"]["mode"]="add";

if(!$detailKeys || !in_array("usuario", $detailKeys))
	$xt->assignbyref("usuario_editcontrol",$control_usuario);
else if(array_key_exists("usuario", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"usuario", ""),"field=usuario","",MODE_VIEW);
		$xt->assign("usuario_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - senha
$control_senha=array();
$control_senha["func"]="xt_buildeditcontrol";
$control_senha["params"] = array();
$control_senha["params"]["field"]="senha";
$control_senha["params"]["value"]=@$defvalues["senha"];

//	Begin Add validation
$arrValidate = array();	
$control_senha["params"]["validate"]=$arrValidate;
//	End Add validation

$control_senha["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_senha["params"]["mode"]="inline_add";
else
	$control_senha["params"]["mode"]="add";

if(!$detailKeys || !in_array("senha", $detailKeys))
	$xt->assignbyref("senha_editcontrol",$control_senha);
else if(array_key_exists("senha", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"senha", ""),"field=senha","",MODE_VIEW);
		$xt->assign("senha_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ip_interf
$control_ip_interf=array();
$control_ip_interf["func"]="xt_buildeditcontrol";
$control_ip_interf["params"] = array();
$control_ip_interf["params"]["field"]="ip_interf";
$control_ip_interf["params"]["value"]=@$defvalues["ip_interf"];

//	Begin Add validation
$arrValidate = array();	
$control_ip_interf["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ip_interf["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ip_interf["params"]["mode"]="inline_add";
else
	$control_ip_interf["params"]["mode"]="add";

if(!$detailKeys || !in_array("ip_interf", $detailKeys))
	$xt->assignbyref("ip_interf_editcontrol",$control_ip_interf);
else if(array_key_exists("ip_interf", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ip_interf", ""),"field=ip%5Finterf","",MODE_VIEW);
		$xt->assign("ip_interf_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - tp_toques
$control_tp_toques=array();
$control_tp_toques["func"]="xt_buildeditcontrol";
$control_tp_toques["params"] = array();
$control_tp_toques["params"]["field"]="tp_toques";
$control_tp_toques["params"]["value"]=@$defvalues["tp_toques"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_tp_toques["params"]["validate"]=$arrValidate;
//	End Add validation

$control_tp_toques["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_tp_toques["params"]["mode"]="inline_add";
else
	$control_tp_toques["params"]["mode"]="add";

if(!$detailKeys || !in_array("tp_toques", $detailKeys))
	$xt->assignbyref("tp_toques_editcontrol",$control_tp_toques);
else if(array_key_exists("tp_toques", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"tp_toques", ""),"field=tp%5Ftoques","",MODE_VIEW);
		$xt->assign("tp_toques_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - dig_rota
$control_dig_rota=array();
$control_dig_rota["func"]="xt_buildeditcontrol";
$control_dig_rota["params"] = array();
$control_dig_rota["params"]["field"]="dig_rota";
$control_dig_rota["params"]["value"]=@$defvalues["dig_rota"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_dig_rota["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dig_rota["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dig_rota["params"]["mode"]="inline_add";
else
	$control_dig_rota["params"]["mode"]="add";

if(!$detailKeys || !in_array("dig_rota", $detailKeys))
	$xt->assignbyref("dig_rota_editcontrol",$control_dig_rota);
else if(array_key_exists("dig_rota", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dig_rota", ""),"field=dig%5Frota","",MODE_VIEW);
		$xt->assign("dig_rota_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - id_contrato
$control_id_contrato=array();
$control_id_contrato["func"]="xt_buildeditcontrol";
$control_id_contrato["params"] = array();
$control_id_contrato["params"]["field"]="id_contrato";
$control_id_contrato["params"]["value"]=@$defvalues["id_contrato"];

//	Begin Add validation
$arrValidate = array();	
$control_id_contrato["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_contrato["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_contrato["params"]["mode"]="inline_add";
else
	$control_id_contrato["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_contrato", $detailKeys))
	$xt->assignbyref("id_contrato_editcontrol",$control_id_contrato);
else if(array_key_exists("id_contrato", $defvalues))
{
				$value=DisplayLookupWizard("id_contrato",$defvalues["id_contrato"],$defvalues,"",MODE_VIEW);
		$xt->assign("id_contrato_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_grava_ent
$control_flg_grava_ent=array();
$control_flg_grava_ent["func"]="xt_buildeditcontrol";
$control_flg_grava_ent["params"] = array();
$control_flg_grava_ent["params"]["field"]="flg_grava_ent";
$control_flg_grava_ent["params"]["value"]=@$defvalues["flg_grava_ent"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_flg_grava_ent["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_grava_ent["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_grava_ent["params"]["mode"]="inline_add";
else
	$control_flg_grava_ent["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_grava_ent", $detailKeys))
	$xt->assignbyref("flg_grava_ent_editcontrol",$control_flg_grava_ent);
else if(array_key_exists("flg_grava_ent", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"flg_grava_ent", ""),"field=flg%5Fgrava%5Fent","",MODE_VIEW);
		$xt->assign("flg_grava_ent_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_grava_sai
$control_flg_grava_sai=array();
$control_flg_grava_sai["func"]="xt_buildeditcontrol";
$control_flg_grava_sai["params"] = array();
$control_flg_grava_sai["params"]["field"]="flg_grava_sai";
$control_flg_grava_sai["params"]["value"]=@$defvalues["flg_grava_sai"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_flg_grava_sai["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_grava_sai["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_grava_sai["params"]["mode"]="inline_add";
else
	$control_flg_grava_sai["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_grava_sai", $detailKeys))
	$xt->assignbyref("flg_grava_sai_editcontrol",$control_flg_grava_sai);
else if(array_key_exists("flg_grava_sai", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"flg_grava_sai", ""),"field=flg%5Fgrava%5Fsai","",MODE_VIEW);
		$xt->assign("flg_grava_sai_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_pabx_remoto
$control_flg_pabx_remoto=array();
$control_flg_pabx_remoto["func"]="xt_buildeditcontrol";
$control_flg_pabx_remoto["params"] = array();
$control_flg_pabx_remoto["params"]["field"]="flg_pabx_remoto";
$control_flg_pabx_remoto["params"]["value"]=@$defvalues["flg_pabx_remoto"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_flg_pabx_remoto["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_pabx_remoto["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_pabx_remoto["params"]["mode"]="inline_add";
else
	$control_flg_pabx_remoto["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_pabx_remoto", $detailKeys))
	$xt->assignbyref("flg_pabx_remoto_editcontrol",$control_flg_pabx_remoto);
else if(array_key_exists("flg_pabx_remoto", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"flg_pabx_remoto", ""),"field=flg%5Fpabx%5Fremoto","",MODE_VIEW);
		$xt->assign("flg_pabx_remoto_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_cel_local
$control_flg_cel_local=array();
$control_flg_cel_local["func"]="xt_buildeditcontrol";
$control_flg_cel_local["params"] = array();
$control_flg_cel_local["params"]["field"]="flg_cel_local";
$control_flg_cel_local["params"]["value"]=@$defvalues["flg_cel_local"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_flg_cel_local["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_cel_local["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_cel_local["params"]["mode"]="inline_add";
else
	$control_flg_cel_local["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_cel_local", $detailKeys))
	$xt->assignbyref("flg_cel_local_editcontrol",$control_flg_cel_local);
else if(array_key_exists("flg_cel_local", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"flg_cel_local", ""),"field=flg%5Fcel%5Flocal","",MODE_VIEW);
		$xt->assign("flg_cel_local_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_local
$control_flg_local=array();
$control_flg_local["func"]="xt_buildeditcontrol";
$control_flg_local["params"] = array();
$control_flg_local["params"]["field"]="flg_local";
$control_flg_local["params"]["value"]=@$defvalues["flg_local"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_flg_local["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_local["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_local["params"]["mode"]="inline_add";
else
	$control_flg_local["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_local", $detailKeys))
	$xt->assignbyref("flg_local_editcontrol",$control_flg_local);
else if(array_key_exists("flg_local", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"flg_local", ""),"field=flg%5Flocal","",MODE_VIEW);
		$xt->assign("flg_local_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_fixo_ddd
$control_flg_fixo_ddd=array();
$control_flg_fixo_ddd["func"]="xt_buildeditcontrol";
$control_flg_fixo_ddd["params"] = array();
$control_flg_fixo_ddd["params"]["field"]="flg_fixo_ddd";
$control_flg_fixo_ddd["params"]["value"]=@$defvalues["flg_fixo_ddd"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_flg_fixo_ddd["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_fixo_ddd["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_fixo_ddd["params"]["mode"]="inline_add";
else
	$control_flg_fixo_ddd["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_fixo_ddd", $detailKeys))
	$xt->assignbyref("flg_fixo_ddd_editcontrol",$control_flg_fixo_ddd);
else if(array_key_exists("flg_fixo_ddd", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"flg_fixo_ddd", ""),"field=flg%5Ffixo%5Fddd","",MODE_VIEW);
		$xt->assign("flg_fixo_ddd_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_cel_ddd
$control_flg_cel_ddd=array();
$control_flg_cel_ddd["func"]="xt_buildeditcontrol";
$control_flg_cel_ddd["params"] = array();
$control_flg_cel_ddd["params"]["field"]="flg_cel_ddd";
$control_flg_cel_ddd["params"]["value"]=@$defvalues["flg_cel_ddd"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_flg_cel_ddd["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_cel_ddd["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_cel_ddd["params"]["mode"]="inline_add";
else
	$control_flg_cel_ddd["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_cel_ddd", $detailKeys))
	$xt->assignbyref("flg_cel_ddd_editcontrol",$control_flg_cel_ddd);
else if(array_key_exists("flg_cel_ddd", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"flg_cel_ddd", ""),"field=flg%5Fcel%5Fddd","",MODE_VIEW);
		$xt->assign("flg_cel_ddd_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_ddi
$control_flg_ddi=array();
$control_flg_ddi["func"]="xt_buildeditcontrol";
$control_flg_ddi["params"] = array();
$control_flg_ddi["params"]["field"]="flg_ddi";
$control_flg_ddi["params"]["value"]=@$defvalues["flg_ddi"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_flg_ddi["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_ddi["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_ddi["params"]["mode"]="inline_add";
else
	$control_flg_ddi["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_ddi", $detailKeys))
	$xt->assignbyref("flg_ddi_editcontrol",$control_flg_ddi);
else if(array_key_exists("flg_ddi", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"flg_ddi", ""),"field=flg%5Fddi","",MODE_VIEW);
		$xt->assign("flg_ddi_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - dig_operadora
$control_dig_operadora=array();
$control_dig_operadora["func"]="xt_buildeditcontrol";
$control_dig_operadora["params"] = array();
$control_dig_operadora["params"]["field"]="dig_operadora";
$control_dig_operadora["params"]["value"]=@$defvalues["dig_operadora"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_dig_operadora["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dig_operadora["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dig_operadora["params"]["mode"]="inline_add";
else
	$control_dig_operadora["params"]["mode"]="add";

if(!$detailKeys || !in_array("dig_operadora", $detailKeys))
	$xt->assignbyref("dig_operadora_editcontrol",$control_dig_operadora);
else if(array_key_exists("dig_operadora", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dig_operadora", ""),"field=dig%5Foperadora","",MODE_VIEW);
		$xt->assign("dig_operadora_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - prioridade
$control_prioridade=array();
$control_prioridade["func"]="xt_buildeditcontrol";
$control_prioridade["params"] = array();
$control_prioridade["params"]["field"]="prioridade";
$control_prioridade["params"]["value"]=@$defvalues["prioridade"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_prioridade["params"]["validate"]=$arrValidate;
//	End Add validation

$control_prioridade["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_prioridade["params"]["mode"]="inline_add";
else
	$control_prioridade["params"]["mode"]="add";

if(!$detailKeys || !in_array("prioridade", $detailKeys))
	$xt->assignbyref("prioridade_editcontrol",$control_prioridade);
else if(array_key_exists("prioridade", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"prioridade", ""),"field=prioridade","",MODE_VIEW);
		$xt->assign("prioridade_editcontrol",$value);
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
	$strTableName = "troncos_vono";
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
$pageObject->xt->assign("legendBreak", '<br/>');




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
