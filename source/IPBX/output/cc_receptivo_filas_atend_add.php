<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/cc_receptivo_filas_atend_variables.php");
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
	$templatefile = "cc_receptivo_filas_atend_inline_add.htm";
else
	$templatefile = "cc_receptivo_filas_atend_add.htm";

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
			'mShortTableName':'cc_receptivo_filas_atend', 
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
//	processing chave - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_chave_".$id);
	$type=postvalue("type_chave_".$id);
	if (FieldSubmitted("chave_".$id))
	{
		$value=prepare_for_db("chave",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "chave"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["chave"]=$value;
	}
	}
//	processibng chave - end
//	processing dt_entrada - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dt_entrada_".$id);
	$type=postvalue("type_dt_entrada_".$id);
	if (FieldSubmitted("dt_entrada_".$id))
	{
		$value=prepare_for_db("dt_entrada",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dt_entrada"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dt_entrada"]=$value;
	}
	}
//	processibng dt_entrada - end
//	processing hr_entrada - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_hr_entrada_".$id);
	$type=postvalue("type_hr_entrada_".$id);
	if (FieldSubmitted("hr_entrada_".$id))
	{
		$value=prepare_for_db("hr_entrada",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "hr_entrada"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["hr_entrada"]=$value;
	}
	}
//	processibng hr_entrada - end
//	processing Fila - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_Fila_".$id);
	$type=postvalue("type_Fila_".$id);
	if (FieldSubmitted("Fila_".$id))
	{
		$value=prepare_for_db("Fila",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "Fila"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["Fila"]=$value;
	}
	}
//	processibng Fila - end
//	processing Agente - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_Agente_".$id);
	$type=postvalue("type_Agente_".$id);
	if (FieldSubmitted("Agente_".$id))
	{
		$value=prepare_for_db("Agente",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "Agente"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["Agente"]=$value;
	}
	}
//	processibng Agente - end
//	processing hr_atendimento - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_hr_atendimento_".$id);
	$type=postvalue("type_hr_atendimento_".$id);
	if (FieldSubmitted("hr_atendimento_".$id))
	{
		$value=prepare_for_db("hr_atendimento",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "hr_atendimento"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["hr_atendimento"]=$value;
	}
	}
//	processibng hr_atendimento - end
//	processing hr_abandono - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_hr_abandono_".$id);
	$type=postvalue("type_hr_abandono_".$id);
	if (FieldSubmitted("hr_abandono_".$id))
	{
		$value=prepare_for_db("hr_abandono",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "hr_abandono"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["hr_abandono"]=$value;
	}
	}
//	processibng hr_abandono - end
//	processing tp_espera - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_tp_espera_".$id);
	$type=postvalue("type_tp_espera_".$id);
	if (FieldSubmitted("tp_espera_".$id))
	{
		$value=prepare_for_db("tp_espera",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "tp_espera"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["tp_espera"]=$value;
	}
	}
//	processibng tp_espera - end
//	processing tp_atendimento - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_tp_atendimento_".$id);
	$type=postvalue("type_tp_atendimento_".$id);
	if (FieldSubmitted("tp_atendimento_".$id))
	{
		$value=prepare_for_db("tp_atendimento",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "tp_atendimento"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["tp_atendimento"]=$value;
	}
	}
//	processibng tp_atendimento - end
//	processing Telefone - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_Telefone_".$id);
	$type=postvalue("type_Telefone_".$id);
	if (FieldSubmitted("Telefone_".$id))
	{
		$value=prepare_for_db("Telefone",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "Telefone"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["Telefone"]=$value;
	}
	}
//	processibng Telefone - end
//	processing ps_entrada - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_ps_entrada_".$id);
	$type=postvalue("type_ps_entrada_".$id);
	if (FieldSubmitted("ps_entrada_".$id))
	{
		$value=prepare_for_db("ps_entrada",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ps_entrada"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ps_entrada"]=$value;
	}
	}
//	processibng ps_entrada - end
//	processing ps_abandono - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_ps_abandono_".$id);
	$type=postvalue("type_ps_abandono_".$id);
	if (FieldSubmitted("ps_abandono_".$id))
	{
		$value=prepare_for_db("ps_abandono",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ps_abandono"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ps_abandono"]=$value;
	}
	}
//	processibng ps_abandono - end
//	processing tel_trans - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_tel_trans_".$id);
	$type=postvalue("type_tel_trans_".$id);
	if (FieldSubmitted("tel_trans_".$id))
	{
		$value=prepare_for_db("tel_trans",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "tel_trans"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["tel_trans"]=$value;
	}
	}
//	processibng tel_trans - end
//	processing dsl_motiv - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dsl_motiv_".$id);
	$type=postvalue("type_dsl_motiv_".$id);
	if (FieldSubmitted("dsl_motiv_".$id))
	{
		$value=prepare_for_db("dsl_motiv",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dsl_motiv"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dsl_motiv"]=$value;
	}
	}
//	processibng dsl_motiv - end
//	processing flg_timeout_fila - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_timeout_fila_".$id);
	$type=postvalue("type_flg_timeout_fila_".$id);
	if (FieldSubmitted("flg_timeout_fila_".$id))
	{
		$value=prepare_for_db("flg_timeout_fila",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_timeout_fila"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_timeout_fila"]=$value;
	}
	}
//	processibng flg_timeout_fila - end



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
					$message .='&nbsp;<a href=\'cc_receptivo_filas_atend_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'cc_receptivo_filas_atend_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: cc_receptivo_filas_atend_".$pageObject->getPageType().".php");
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
		$copykeys["chave"]=postvalue("copyid1");
		$copykeys["dt_entrada"]=postvalue("copyid2");
		$copykeys["hr_entrada"]=postvalue("copyid3");
	}
	else
	{
		$copykeys["chave"]=postvalue("editid1");
		$copykeys["dt_entrada"]=postvalue("editid2");
		$copykeys["hr_entrada"]=postvalue("editid3");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["chave"]="";
	$defvalues["dt_entrada"]="";
	$defvalues["hr_entrada"]="";
//call CopyOnLoad event
	if(function_exists("CopyOnLoad"))
		CopyOnLoad($defvalues,$strWhere);
}
else
{
}

if($readavalues)
{
	$defvalues["chave"]=@$avalues["chave"];
	$defvalues["dt_entrada"]=@$avalues["dt_entrada"];
	$defvalues["hr_entrada"]=@$avalues["hr_entrada"];
	$defvalues["Fila"]=@$avalues["Fila"];
	$defvalues["Agente"]=@$avalues["Agente"];
	$defvalues["hr_atendimento"]=@$avalues["hr_atendimento"];
	$defvalues["hr_abandono"]=@$avalues["hr_abandono"];
	$defvalues["tp_espera"]=@$avalues["tp_espera"];
	$defvalues["tp_atendimento"]=@$avalues["tp_atendimento"];
	$defvalues["Telefone"]=@$avalues["Telefone"];
	$defvalues["ps_entrada"]=@$avalues["ps_entrada"];
	$defvalues["ps_abandono"]=@$avalues["ps_abandono"];
	$defvalues["tel_trans"]=@$avalues["tel_trans"];
	$defvalues["dsl_motiv"]=@$avalues["dsl_motiv"];
	$defvalues["flg_timeout_fila"]=@$avalues["flg_timeout_fila"];
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
	$xt->assign("chave_fieldblock",true);
	$xt->assign("chave_label",true);
	if(isEnableSection508())
		$xt->assign_section("chave_label","<label for=\"".GetInputElementId("chave", $id)."\">","</label>");
	$xt->assign("dt_entrada_fieldblock",true);
	$xt->assign("dt_entrada_label",true);
	if(isEnableSection508())
		$xt->assign_section("dt_entrada_label","<label for=\"".GetInputElementId("dt_entrada", $id)."\">","</label>");
	$xt->assign("hr_entrada_fieldblock",true);
	$xt->assign("hr_entrada_label",true);
	if(isEnableSection508())
		$xt->assign_section("hr_entrada_label","<label for=\"".GetInputElementId("hr_entrada", $id)."\">","</label>");
	$xt->assign("Fila_fieldblock",true);
	$xt->assign("Fila_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fila_label","<label for=\"".GetInputElementId("Fila", $id)."\">","</label>");
	$xt->assign("Agente_fieldblock",true);
	$xt->assign("Agente_label",true);
	if(isEnableSection508())
		$xt->assign_section("Agente_label","<label for=\"".GetInputElementId("Agente", $id)."\">","</label>");
	$xt->assign("hr_atendimento_fieldblock",true);
	$xt->assign("hr_atendimento_label",true);
	if(isEnableSection508())
		$xt->assign_section("hr_atendimento_label","<label for=\"".GetInputElementId("hr_atendimento", $id)."\">","</label>");
	$xt->assign("hr_abandono_fieldblock",true);
	$xt->assign("hr_abandono_label",true);
	if(isEnableSection508())
		$xt->assign_section("hr_abandono_label","<label for=\"".GetInputElementId("hr_abandono", $id)."\">","</label>");
	$xt->assign("tp_espera_fieldblock",true);
	$xt->assign("tp_espera_label",true);
	if(isEnableSection508())
		$xt->assign_section("tp_espera_label","<label for=\"".GetInputElementId("tp_espera", $id)."\">","</label>");
	$xt->assign("tp_atendimento_fieldblock",true);
	$xt->assign("tp_atendimento_label",true);
	if(isEnableSection508())
		$xt->assign_section("tp_atendimento_label","<label for=\"".GetInputElementId("tp_atendimento", $id)."\">","</label>");
	$xt->assign("Telefone_fieldblock",true);
	$xt->assign("Telefone_label",true);
	if(isEnableSection508())
		$xt->assign_section("Telefone_label","<label for=\"".GetInputElementId("Telefone", $id)."\">","</label>");
	$xt->assign("ps_entrada_fieldblock",true);
	$xt->assign("ps_entrada_label",true);
	if(isEnableSection508())
		$xt->assign_section("ps_entrada_label","<label for=\"".GetInputElementId("ps_entrada", $id)."\">","</label>");
	$xt->assign("ps_abandono_fieldblock",true);
	$xt->assign("ps_abandono_label",true);
	if(isEnableSection508())
		$xt->assign_section("ps_abandono_label","<label for=\"".GetInputElementId("ps_abandono", $id)."\">","</label>");
	$xt->assign("tel_trans_fieldblock",true);
	$xt->assign("tel_trans_label",true);
	if(isEnableSection508())
		$xt->assign_section("tel_trans_label","<label for=\"".GetInputElementId("tel_trans", $id)."\">","</label>");
	$xt->assign("dsl_motiv_fieldblock",true);
	$xt->assign("dsl_motiv_label",true);
	if(isEnableSection508())
		$xt->assign_section("dsl_motiv_label","<label for=\"".GetInputElementId("dsl_motiv", $id)."\">","</label>");
	$xt->assign("flg_timeout_fila_fieldblock",true);
	$xt->assign("flg_timeout_fila_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_timeout_fila_label","<label for=\"".GetInputElementId("flg_timeout_fila", $id)."\">","</label>");
	
	
	if($inlineadd!=ADD_ONTHEFLY)
	{
		if($onsubmit)
			$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit)."\"";
		
		$pageObject->body["begin"] .= $includes;
		if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='cc_receptivo_filas_atend_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="cc_receptivo_filas_atend_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="cc_receptivo_filas_atend_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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
	if(postvalue("table")=="Rel. Historico Fila Hora" && postvalue("field")=="Fila") 
	{
	$linkfield = "Fila";
	$dispfield = "Fila";
	$LookupSQL = "select ";
	$LookupSQL .= "`Fila`";
		$LookupSQL .= ",`Fila`";
	}
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

	$showKeys[] = htmlspecialchars($keys["chave"]);
	$showKeys[] = htmlspecialchars($keys["dt_entrada"]);
	$showKeys[] = htmlspecialchars($keys["hr_entrada"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["chave"]));
	$keylink.="&key2=".htmlspecialchars(rawurlencode(@$data["dt_entrada"]));
	$keylink.="&key3=".htmlspecialchars(rawurlencode(@$data["hr_entrada"]));

	

	
	
////////////////////////////////////////////
//	chave - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"chave", ""),"field=chave".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "chave";
				$showRawValues[] = substr($data["chave"],0,100);
	}	
//	dt_entrada - Short Date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dt_entrada", "Short Date"),"field=dt%5Fentrada".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dt_entrada";
				$showRawValues[] = substr($data["dt_entrada"],0,100);
	}	
//	hr_entrada - Time
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"hr_entrada", "Time"),"field=hr%5Fentrada".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "hr_entrada";
				$showRawValues[] = substr($data["hr_entrada"],0,100);
	}	
//	Fila - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"Fila", ""),"field=Fila".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "Fila";
				$showRawValues[] = substr($data["Fila"],0,100);
	}	
//	Agente - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"Agente", ""),"field=Agente".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "Agente";
				$showRawValues[] = substr($data["Agente"],0,100);
	}	
//	hr_atendimento - Time
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"hr_atendimento", "Time"),"field=hr%5Fatendimento".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "hr_atendimento";
				$showRawValues[] = substr($data["hr_atendimento"],0,100);
	}	
//	hr_abandono - Time
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"hr_abandono", "Time"),"field=hr%5Fabandono".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "hr_abandono";
				$showRawValues[] = substr($data["hr_abandono"],0,100);
	}	
//	tp_espera - Time
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"tp_espera", "Time"),"field=tp%5Fespera".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_espera";
				$showRawValues[] = substr($data["tp_espera"],0,100);
	}	
//	tp_atendimento - Time
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"tp_atendimento", "Time"),"field=tp%5Fatendimento".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_atendimento";
				$showRawValues[] = substr($data["tp_atendimento"],0,100);
	}	
//	Telefone - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"Telefone", ""),"field=Telefone".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "Telefone";
				$showRawValues[] = substr($data["Telefone"],0,100);
	}	
//	ps_entrada - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ps_entrada", ""),"field=ps%5Fentrada".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ps_entrada";
				$showRawValues[] = substr($data["ps_entrada"],0,100);
	}	
//	ps_abandono - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ps_abandono", ""),"field=ps%5Fabandono".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ps_abandono";
				$showRawValues[] = substr($data["ps_abandono"],0,100);
	}	
//	tel_trans - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"tel_trans", ""),"field=tel%5Ftrans".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tel_trans";
				$showRawValues[] = substr($data["tel_trans"],0,100);
	}	
//	dsl_motiv - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dsl_motiv", ""),"field=dsl%5Fmotiv".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dsl_motiv";
				$showRawValues[] = substr($data["dsl_motiv"],0,100);
	}	
//	flg_timeout_fila - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"flg_timeout_fila", ""),"field=flg%5Ftimeout%5Ffila".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "flg_timeout_fila";
				$showRawValues[] = substr($data["flg_timeout_fila"],0,100);
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
//	control - chave
$control_chave=array();
$control_chave["func"]="xt_buildeditcontrol";
$control_chave["params"] = array();
$control_chave["params"]["field"]="chave";
$control_chave["params"]["value"]=@$defvalues["chave"];

//	Begin Add validation
$arrValidate = array();	
$control_chave["params"]["validate"]=$arrValidate;
//	End Add validation

$control_chave["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_chave["params"]["mode"]="inline_add";
else
	$control_chave["params"]["mode"]="add";

if(!$detailKeys || !in_array("chave", $detailKeys))
	$xt->assignbyref("chave_editcontrol",$control_chave);
else if(array_key_exists("chave", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"chave", ""),"field=chave","",MODE_VIEW);
		$xt->assign("chave_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - dt_entrada
$control_dt_entrada=array();
$control_dt_entrada["func"]="xt_buildeditcontrol";
$control_dt_entrada["params"] = array();
$control_dt_entrada["params"]["field"]="dt_entrada";
$control_dt_entrada["params"]["value"]=@$defvalues["dt_entrada"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_dt_entrada["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dt_entrada["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dt_entrada["params"]["mode"]="inline_add";
else
	$control_dt_entrada["params"]["mode"]="add";

if(!$detailKeys || !in_array("dt_entrada", $detailKeys))
	$xt->assignbyref("dt_entrada_editcontrol",$control_dt_entrada);
else if(array_key_exists("dt_entrada", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dt_entrada", "Short Date"),"field=dt%5Fentrada","",MODE_VIEW);
		$xt->assign("dt_entrada_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - hr_entrada
$control_hr_entrada=array();
$control_hr_entrada["func"]="xt_buildeditcontrol";
$control_hr_entrada["params"] = array();
$control_hr_entrada["params"]["field"]="hr_entrada";
$control_hr_entrada["params"]["value"]=@$defvalues["hr_entrada"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_hr_entrada["params"]["validate"]=$arrValidate;
//	End Add validation

$control_hr_entrada["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_hr_entrada["params"]["mode"]="inline_add";
else
	$control_hr_entrada["params"]["mode"]="add";

if(!$detailKeys || !in_array("hr_entrada", $detailKeys))
	$xt->assignbyref("hr_entrada_editcontrol",$control_hr_entrada);
else if(array_key_exists("hr_entrada", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"hr_entrada", "Time"),"field=hr%5Fentrada","",MODE_VIEW);
		$xt->assign("hr_entrada_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - Fila
$control_Fila=array();
$control_Fila["func"]="xt_buildeditcontrol";
$control_Fila["params"] = array();
$control_Fila["params"]["field"]="Fila";
$control_Fila["params"]["value"]=@$defvalues["Fila"];

//	Begin Add validation
$arrValidate = array();	
$control_Fila["params"]["validate"]=$arrValidate;
//	End Add validation

$control_Fila["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_Fila["params"]["mode"]="inline_add";
else
	$control_Fila["params"]["mode"]="add";

if(!$detailKeys || !in_array("Fila", $detailKeys))
	$xt->assignbyref("Fila_editcontrol",$control_Fila);
else if(array_key_exists("Fila", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"Fila", ""),"field=Fila","",MODE_VIEW);
		$xt->assign("Fila_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - Agente
$control_Agente=array();
$control_Agente["func"]="xt_buildeditcontrol";
$control_Agente["params"] = array();
$control_Agente["params"]["field"]="Agente";
$control_Agente["params"]["value"]=@$defvalues["Agente"];

//	Begin Add validation
$arrValidate = array();	
$control_Agente["params"]["validate"]=$arrValidate;
//	End Add validation

$control_Agente["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_Agente["params"]["mode"]="inline_add";
else
	$control_Agente["params"]["mode"]="add";

if(!$detailKeys || !in_array("Agente", $detailKeys))
	$xt->assignbyref("Agente_editcontrol",$control_Agente);
else if(array_key_exists("Agente", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"Agente", ""),"field=Agente","",MODE_VIEW);
		$xt->assign("Agente_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - hr_atendimento
$control_hr_atendimento=array();
$control_hr_atendimento["func"]="xt_buildeditcontrol";
$control_hr_atendimento["params"] = array();
$control_hr_atendimento["params"]["field"]="hr_atendimento";
$control_hr_atendimento["params"]["value"]=@$defvalues["hr_atendimento"];

//	Begin Add validation
$arrValidate = array();	
$control_hr_atendimento["params"]["validate"]=$arrValidate;
//	End Add validation

$control_hr_atendimento["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_hr_atendimento["params"]["mode"]="inline_add";
else
	$control_hr_atendimento["params"]["mode"]="add";

if(!$detailKeys || !in_array("hr_atendimento", $detailKeys))
	$xt->assignbyref("hr_atendimento_editcontrol",$control_hr_atendimento);
else if(array_key_exists("hr_atendimento", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"hr_atendimento", "Time"),"field=hr%5Fatendimento","",MODE_VIEW);
		$xt->assign("hr_atendimento_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - hr_abandono
$control_hr_abandono=array();
$control_hr_abandono["func"]="xt_buildeditcontrol";
$control_hr_abandono["params"] = array();
$control_hr_abandono["params"]["field"]="hr_abandono";
$control_hr_abandono["params"]["value"]=@$defvalues["hr_abandono"];

//	Begin Add validation
$arrValidate = array();	
$control_hr_abandono["params"]["validate"]=$arrValidate;
//	End Add validation

$control_hr_abandono["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_hr_abandono["params"]["mode"]="inline_add";
else
	$control_hr_abandono["params"]["mode"]="add";

if(!$detailKeys || !in_array("hr_abandono", $detailKeys))
	$xt->assignbyref("hr_abandono_editcontrol",$control_hr_abandono);
else if(array_key_exists("hr_abandono", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"hr_abandono", "Time"),"field=hr%5Fabandono","",MODE_VIEW);
		$xt->assign("hr_abandono_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - tp_espera
$control_tp_espera=array();
$control_tp_espera["func"]="xt_buildeditcontrol";
$control_tp_espera["params"] = array();
$control_tp_espera["params"]["field"]="tp_espera";
$control_tp_espera["params"]["value"]=@$defvalues["tp_espera"];

//	Begin Add validation
$arrValidate = array();	
$control_tp_espera["params"]["validate"]=$arrValidate;
//	End Add validation

$control_tp_espera["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_tp_espera["params"]["mode"]="inline_add";
else
	$control_tp_espera["params"]["mode"]="add";

if(!$detailKeys || !in_array("tp_espera", $detailKeys))
	$xt->assignbyref("tp_espera_editcontrol",$control_tp_espera);
else if(array_key_exists("tp_espera", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"tp_espera", "Time"),"field=tp%5Fespera","",MODE_VIEW);
		$xt->assign("tp_espera_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - tp_atendimento
$control_tp_atendimento=array();
$control_tp_atendimento["func"]="xt_buildeditcontrol";
$control_tp_atendimento["params"] = array();
$control_tp_atendimento["params"]["field"]="tp_atendimento";
$control_tp_atendimento["params"]["value"]=@$defvalues["tp_atendimento"];

//	Begin Add validation
$arrValidate = array();	
$control_tp_atendimento["params"]["validate"]=$arrValidate;
//	End Add validation

$control_tp_atendimento["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_tp_atendimento["params"]["mode"]="inline_add";
else
	$control_tp_atendimento["params"]["mode"]="add";

if(!$detailKeys || !in_array("tp_atendimento", $detailKeys))
	$xt->assignbyref("tp_atendimento_editcontrol",$control_tp_atendimento);
else if(array_key_exists("tp_atendimento", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"tp_atendimento", "Time"),"field=tp%5Fatendimento","",MODE_VIEW);
		$xt->assign("tp_atendimento_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - Telefone
$control_Telefone=array();
$control_Telefone["func"]="xt_buildeditcontrol";
$control_Telefone["params"] = array();
$control_Telefone["params"]["field"]="Telefone";
$control_Telefone["params"]["value"]=@$defvalues["Telefone"];

//	Begin Add validation
$arrValidate = array();	
$control_Telefone["params"]["validate"]=$arrValidate;
//	End Add validation

$control_Telefone["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_Telefone["params"]["mode"]="inline_add";
else
	$control_Telefone["params"]["mode"]="add";

if(!$detailKeys || !in_array("Telefone", $detailKeys))
	$xt->assignbyref("Telefone_editcontrol",$control_Telefone);
else if(array_key_exists("Telefone", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"Telefone", ""),"field=Telefone","",MODE_VIEW);
		$xt->assign("Telefone_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ps_entrada
$control_ps_entrada=array();
$control_ps_entrada["func"]="xt_buildeditcontrol";
$control_ps_entrada["params"] = array();
$control_ps_entrada["params"]["field"]="ps_entrada";
$control_ps_entrada["params"]["value"]=@$defvalues["ps_entrada"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_ps_entrada["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ps_entrada["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ps_entrada["params"]["mode"]="inline_add";
else
	$control_ps_entrada["params"]["mode"]="add";

if(!$detailKeys || !in_array("ps_entrada", $detailKeys))
	$xt->assignbyref("ps_entrada_editcontrol",$control_ps_entrada);
else if(array_key_exists("ps_entrada", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ps_entrada", ""),"field=ps%5Fentrada","",MODE_VIEW);
		$xt->assign("ps_entrada_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ps_abandono
$control_ps_abandono=array();
$control_ps_abandono["func"]="xt_buildeditcontrol";
$control_ps_abandono["params"] = array();
$control_ps_abandono["params"]["field"]="ps_abandono";
$control_ps_abandono["params"]["value"]=@$defvalues["ps_abandono"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_ps_abandono["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ps_abandono["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ps_abandono["params"]["mode"]="inline_add";
else
	$control_ps_abandono["params"]["mode"]="add";

if(!$detailKeys || !in_array("ps_abandono", $detailKeys))
	$xt->assignbyref("ps_abandono_editcontrol",$control_ps_abandono);
else if(array_key_exists("ps_abandono", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ps_abandono", ""),"field=ps%5Fabandono","",MODE_VIEW);
		$xt->assign("ps_abandono_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - tel_trans
$control_tel_trans=array();
$control_tel_trans["func"]="xt_buildeditcontrol";
$control_tel_trans["params"] = array();
$control_tel_trans["params"]["field"]="tel_trans";
$control_tel_trans["params"]["value"]=@$defvalues["tel_trans"];

//	Begin Add validation
$arrValidate = array();	
$control_tel_trans["params"]["validate"]=$arrValidate;
//	End Add validation

$control_tel_trans["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_tel_trans["params"]["mode"]="inline_add";
else
	$control_tel_trans["params"]["mode"]="add";

if(!$detailKeys || !in_array("tel_trans", $detailKeys))
	$xt->assignbyref("tel_trans_editcontrol",$control_tel_trans);
else if(array_key_exists("tel_trans", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"tel_trans", ""),"field=tel%5Ftrans","",MODE_VIEW);
		$xt->assign("tel_trans_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - dsl_motiv
$control_dsl_motiv=array();
$control_dsl_motiv["func"]="xt_buildeditcontrol";
$control_dsl_motiv["params"] = array();
$control_dsl_motiv["params"]["field"]="dsl_motiv";
$control_dsl_motiv["params"]["value"]=@$defvalues["dsl_motiv"];

//	Begin Add validation
$arrValidate = array();	
$control_dsl_motiv["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dsl_motiv["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dsl_motiv["params"]["mode"]="inline_add";
else
	$control_dsl_motiv["params"]["mode"]="add";

if(!$detailKeys || !in_array("dsl_motiv", $detailKeys))
	$xt->assignbyref("dsl_motiv_editcontrol",$control_dsl_motiv);
else if(array_key_exists("dsl_motiv", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dsl_motiv", ""),"field=dsl%5Fmotiv","",MODE_VIEW);
		$xt->assign("dsl_motiv_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_timeout_fila
$control_flg_timeout_fila=array();
$control_flg_timeout_fila["func"]="xt_buildeditcontrol";
$control_flg_timeout_fila["params"] = array();
$control_flg_timeout_fila["params"]["field"]="flg_timeout_fila";
$control_flg_timeout_fila["params"]["value"]=@$defvalues["flg_timeout_fila"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_flg_timeout_fila["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_timeout_fila["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_timeout_fila["params"]["mode"]="inline_add";
else
	$control_flg_timeout_fila["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_timeout_fila", $detailKeys))
	$xt->assignbyref("flg_timeout_fila_editcontrol",$control_flg_timeout_fila);
else if(array_key_exists("flg_timeout_fila", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"flg_timeout_fila", ""),"field=flg%5Ftimeout%5Ffila","",MODE_VIEW);
		$xt->assign("flg_timeout_fila_editcontrol",$value);
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
	$strTableName = "cc_receptivo_filas_atend";
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
