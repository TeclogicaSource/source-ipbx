<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/contrato_trad_variables.php");
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
	$templatefile = "contrato_trad_inline_add.htm";
else
	$templatefile = "contrato_trad_add.htm";

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
			'mShortTableName':'contrato_trad', 
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
//	processing dia_ini - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dia_ini_".$id);
	$type=postvalue("type_dia_ini_".$id);
	if (FieldSubmitted("dia_ini_".$id))
	{
		$value=prepare_for_db("dia_ini",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dia_ini"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dia_ini"]=$value;
	}
	}
//	processibng dia_ini - end
//	processing dia_fim - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dia_fim_".$id);
	$type=postvalue("type_dia_fim_".$id);
	if (FieldSubmitted("dia_fim_".$id))
	{
		$value=prepare_for_db("dia_fim",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dia_fim"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dia_fim"]=$value;
	}
	}
//	processibng dia_fim - end
//	processing posicao_mes - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_posicao_mes_".$id);
	$type=postvalue("type_posicao_mes_".$id);
	if (FieldSubmitted("posicao_mes_".$id))
	{
		$value=prepare_for_db("posicao_mes",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "posicao_mes"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["posicao_mes"]=$value;
	}
	}
//	processibng posicao_mes - end
//	processing F-F_LOCAL_CAD - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_F_LOCAL_CAD_".$id);
	$type=postvalue("type_F_F_LOCAL_CAD_".$id);
	if (FieldSubmitted("F-F_LOCAL_CAD_".$id))
	{
		$value=prepare_for_db("F-F_LOCAL_CAD",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-F_LOCAL_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-F_LOCAL_CAD"]=$value;
	}
	}
//	processibng F-F_LOCAL_CAD - end
//	processing F-F_LOCAL_VLR - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_F_LOCAL_VLR_".$id);
	$type=postvalue("type_F_F_LOCAL_VLR_".$id);
	if (FieldSubmitted("F-F_LOCAL_VLR_".$id))
	{
		$value=prepare_for_db("F-F_LOCAL_VLR",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-F_LOCAL_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-F_LOCAL_VLR"]=$value;
	}
	}
//	processibng F-F_LOCAL_VLR - end
//	processing F-M_LOCAL_VC1_CAD - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_M_LOCAL_VC1_CAD_".$id);
	$type=postvalue("type_F_M_LOCAL_VC1_CAD_".$id);
	if (FieldSubmitted("F-M_LOCAL_VC1_CAD_".$id))
	{
		$value=prepare_for_db("F-M_LOCAL_VC1_CAD",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-M_LOCAL_VC1_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-M_LOCAL_VC1_CAD"]=$value;
	}
	}
//	processibng F-M_LOCAL_VC1_CAD - end
//	processing F-M_LOCAL_VC1_VLR - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_M_LOCAL_VC1_VLR_".$id);
	$type=postvalue("type_F_M_LOCAL_VC1_VLR_".$id);
	if (FieldSubmitted("F-M_LOCAL_VC1_VLR_".$id))
	{
		$value=prepare_for_db("F-M_LOCAL_VC1_VLR",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-M_LOCAL_VC1_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-M_LOCAL_VC1_VLR"]=$value;
	}
	}
//	processibng F-M_LOCAL_VC1_VLR - end
//	processing F-M_VC2_CAD - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_M_VC2_CAD_".$id);
	$type=postvalue("type_F_M_VC2_CAD_".$id);
	if (FieldSubmitted("F-M_VC2_CAD_".$id))
	{
		$value=prepare_for_db("F-M_VC2_CAD",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-M_VC2_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-M_VC2_CAD"]=$value;
	}
	}
//	processibng F-M_VC2_CAD - end
//	processing F-M_VC2_VLR - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_M_VC2_VLR_".$id);
	$type=postvalue("type_F_M_VC2_VLR_".$id);
	if (FieldSubmitted("F-M_VC2_VLR_".$id))
	{
		$value=prepare_for_db("F-M_VC2_VLR",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-M_VC2_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-M_VC2_VLR"]=$value;
	}
	}
//	processibng F-M_VC2_VLR - end
//	processing F-M_VC3_CAD - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_M_VC3_CAD_".$id);
	$type=postvalue("type_F_M_VC3_CAD_".$id);
	if (FieldSubmitted("F-M_VC3_CAD_".$id))
	{
		$value=prepare_for_db("F-M_VC3_CAD",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-M_VC3_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-M_VC3_CAD"]=$value;
	}
	}
//	processibng F-M_VC3_CAD - end
//	processing F-M_VC3_VLR - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_M_VC3_VLR_".$id);
	$type=postvalue("type_F_M_VC3_VLR_".$id);
	if (FieldSubmitted("F-M_VC3_VLR_".$id))
	{
		$value=prepare_for_db("F-M_VC3_VLR",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-M_VC3_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-M_VC3_VLR"]=$value;
	}
	}
//	processibng F-M_VC3_VLR - end
//	processing F-F_LDN_CAD - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_F_LDN_CAD_".$id);
	$type=postvalue("type_F_F_LDN_CAD_".$id);
	if (FieldSubmitted("F-F_LDN_CAD_".$id))
	{
		$value=prepare_for_db("F-F_LDN_CAD",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-F_LDN_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-F_LDN_CAD"]=$value;
	}
	}
//	processibng F-F_LDN_CAD - end
//	processing F-F_LDN_VLR - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_F_LDN_VLR_".$id);
	$type=postvalue("type_F_F_LDN_VLR_".$id);
	if (FieldSubmitted("F-F_LDN_VLR_".$id))
	{
		$value=prepare_for_db("F-F_LDN_VLR",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-F_LDN_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-F_LDN_VLR"]=$value;
	}
	}
//	processibng F-F_LDN_VLR - end
//	processing F-F_LDI_CAD - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_F_LDI_CAD_".$id);
	$type=postvalue("type_F_F_LDI_CAD_".$id);
	if (FieldSubmitted("F-F_LDI_CAD_".$id))
	{
		$value=prepare_for_db("F-F_LDI_CAD",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-F_LDI_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-F_LDI_CAD"]=$value;
	}
	}
//	processibng F-F_LDI_CAD - end
//	processing F-F_LDI_VLR - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_F_LDI_VLR_".$id);
	$type=postvalue("type_F_F_LDI_VLR_".$id);
	if (FieldSubmitted("F-F_LDI_VLR_".$id))
	{
		$value=prepare_for_db("F-F_LDI_VLR",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-F_LDI_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-F_LDI_VLR"]=$value;
	}
	}
//	processibng F-F_LDI_VLR - end
//	processing F-M_LDI_CAD - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_M_LDI_CAD_".$id);
	$type=postvalue("type_F_M_LDI_CAD_".$id);
	if (FieldSubmitted("F-M_LDI_CAD_".$id))
	{
		$value=prepare_for_db("F-M_LDI_CAD",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-M_LDI_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-M_LDI_CAD"]=$value;
	}
	}
//	processibng F-M_LDI_CAD - end
//	processing F-M_LDI_VLR - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_F_M_LDI_VLR_".$id);
	$type=postvalue("type_F_M_LDI_VLR_".$id);
	if (FieldSubmitted("F-M_LDI_VLR_".$id))
	{
		$value=prepare_for_db("F-M_LDI_VLR",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "F-M_LDI_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["F-M_LDI_VLR"]=$value;
	}
	}
//	processibng F-M_LDI_VLR - end



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
					$message .='&nbsp;<a href=\'contrato_trad_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'contrato_trad_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: contrato_trad_".$pageObject->getPageType().".php");
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
	$defvalues["F-F_LOCAL_CAD"]=@$avalues["F-F_LOCAL_CAD"];
	$defvalues["F-F_LOCAL_VLR"]=@$avalues["F-F_LOCAL_VLR"];
	$defvalues["F-M_LOCAL_VC1_CAD"]=@$avalues["F-M_LOCAL_VC1_CAD"];
	$defvalues["F-M_LOCAL_VC1_VLR"]=@$avalues["F-M_LOCAL_VC1_VLR"];
	$defvalues["F-M_VC2_CAD"]=@$avalues["F-M_VC2_CAD"];
	$defvalues["F-M_VC2_VLR"]=@$avalues["F-M_VC2_VLR"];
	$defvalues["F-F_LDN_CAD"]=@$avalues["F-F_LDN_CAD"];
	$defvalues["F-F_LDN_VLR"]=@$avalues["F-F_LDN_VLR"];
	$defvalues["F-F_LDI_CAD"]=@$avalues["F-F_LDI_CAD"];
	$defvalues["F-F_LDI_VLR"]=@$avalues["F-F_LDI_VLR"];
	$defvalues["F-M_LDI_CAD"]=@$avalues["F-M_LDI_CAD"];
	$defvalues["F-M_LDI_VLR"]=@$avalues["F-M_LDI_VLR"];
	$defvalues["F-M_VC3_CAD"]=@$avalues["F-M_VC3_CAD"];
	$defvalues["F-M_VC3_VLR"]=@$avalues["F-M_VC3_VLR"];
	$defvalues["dia_ini"]=@$avalues["dia_ini"];
	$defvalues["dia_fim"]=@$avalues["dia_fim"];
	$defvalues["posicao_mes"]=@$avalues["posicao_mes"];
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
	$xt->assign("F_F_LOCAL_CAD_fieldblock",true);
	$xt->assign("F_F_LOCAL_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_F_LOCAL_CAD_label","<label for=\"".GetInputElementId("F-F_LOCAL_CAD", $id)."\">","</label>");
	$xt->assign("F_F_LOCAL_VLR_fieldblock",true);
	$xt->assign("F_F_LOCAL_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_F_LOCAL_VLR_label","<label for=\"".GetInputElementId("F-F_LOCAL_VLR", $id)."\">","</label>");
	$xt->assign("F_M_LOCAL_VC1_CAD_fieldblock",true);
	$xt->assign("F_M_LOCAL_VC1_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_M_LOCAL_VC1_CAD_label","<label for=\"".GetInputElementId("F-M_LOCAL_VC1_CAD", $id)."\">","</label>");
	$xt->assign("F_M_LOCAL_VC1_VLR_fieldblock",true);
	$xt->assign("F_M_LOCAL_VC1_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_M_LOCAL_VC1_VLR_label","<label for=\"".GetInputElementId("F-M_LOCAL_VC1_VLR", $id)."\">","</label>");
	$xt->assign("F_M_VC2_CAD_fieldblock",true);
	$xt->assign("F_M_VC2_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_M_VC2_CAD_label","<label for=\"".GetInputElementId("F-M_VC2_CAD", $id)."\">","</label>");
	$xt->assign("F_M_VC2_VLR_fieldblock",true);
	$xt->assign("F_M_VC2_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_M_VC2_VLR_label","<label for=\"".GetInputElementId("F-M_VC2_VLR", $id)."\">","</label>");
	$xt->assign("F_F_LDN_CAD_fieldblock",true);
	$xt->assign("F_F_LDN_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_F_LDN_CAD_label","<label for=\"".GetInputElementId("F-F_LDN_CAD", $id)."\">","</label>");
	$xt->assign("F_F_LDN_VLR_fieldblock",true);
	$xt->assign("F_F_LDN_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_F_LDN_VLR_label","<label for=\"".GetInputElementId("F-F_LDN_VLR", $id)."\">","</label>");
	$xt->assign("F_F_LDI_CAD_fieldblock",true);
	$xt->assign("F_F_LDI_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_F_LDI_CAD_label","<label for=\"".GetInputElementId("F-F_LDI_CAD", $id)."\">","</label>");
	$xt->assign("F_F_LDI_VLR_fieldblock",true);
	$xt->assign("F_F_LDI_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_F_LDI_VLR_label","<label for=\"".GetInputElementId("F-F_LDI_VLR", $id)."\">","</label>");
	$xt->assign("F_M_LDI_CAD_fieldblock",true);
	$xt->assign("F_M_LDI_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_M_LDI_CAD_label","<label for=\"".GetInputElementId("F-M_LDI_CAD", $id)."\">","</label>");
	$xt->assign("F_M_LDI_VLR_fieldblock",true);
	$xt->assign("F_M_LDI_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_M_LDI_VLR_label","<label for=\"".GetInputElementId("F-M_LDI_VLR", $id)."\">","</label>");
	$xt->assign("F_M_VC3_CAD_fieldblock",true);
	$xt->assign("F_M_VC3_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_M_VC3_CAD_label","<label for=\"".GetInputElementId("F-M_VC3_CAD", $id)."\">","</label>");
	$xt->assign("F_M_VC3_VLR_fieldblock",true);
	$xt->assign("F_M_VC3_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("F_M_VC3_VLR_label","<label for=\"".GetInputElementId("F-M_VC3_VLR", $id)."\">","</label>");
	$xt->assign("dia_ini_fieldblock",true);
	$xt->assign("dia_ini_label",true);
	if(isEnableSection508())
		$xt->assign_section("dia_ini_label","<label for=\"".GetInputElementId("dia_ini", $id)."\">","</label>");
	$xt->assign("dia_fim_fieldblock",true);
	$xt->assign("dia_fim_label",true);
	if(isEnableSection508())
		$xt->assign_section("dia_fim_label","<label for=\"".GetInputElementId("dia_fim", $id)."\">","</label>");
	$xt->assign("posicao_mes_fieldblock",true);
	$xt->assign("posicao_mes_label",true);
	if(isEnableSection508())
		$xt->assign_section("posicao_mes_label","<label for=\"".GetInputElementId("posicao_mes", $id)."\">","</label>");
	
	
	if($inlineadd!=ADD_ONTHEFLY)
	{
		if($onsubmit)
			$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit)."\"";
		
		$pageObject->body["begin"] .= $includes;
		if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='contrato_trad_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="contrato_trad_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="contrato_trad_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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
//	F-F_LOCAL_CAD - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("F-F_LOCAL_CAD",$data["F-F_LOCAL_CAD"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_F_LOCAL_CAD";
				$showRawValues[] = substr($data["F-F_LOCAL_CAD"],0,100);
	}	
//	F-F_LOCAL_VLR - Currency
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"F-F_LOCAL_VLR", "Currency"),"field=F%2DF%5FLOCAL%5FVLR".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_F_LOCAL_VLR";
				$showRawValues[] = substr($data["F-F_LOCAL_VLR"],0,100);
	}	
//	F-M_LOCAL_VC1_CAD - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("F-M_LOCAL_VC1_CAD",$data["F-M_LOCAL_VC1_CAD"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_M_LOCAL_VC1_CAD";
				$showRawValues[] = substr($data["F-M_LOCAL_VC1_CAD"],0,100);
	}	
//	F-M_LOCAL_VC1_VLR - Currency
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"F-M_LOCAL_VC1_VLR", "Currency"),"field=F%2DM%5FLOCAL%5FVC1%5FVLR".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_M_LOCAL_VC1_VLR";
				$showRawValues[] = substr($data["F-M_LOCAL_VC1_VLR"],0,100);
	}	
//	F-M_VC2_CAD - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("F-M_VC2_CAD",$data["F-M_VC2_CAD"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_M_VC2_CAD";
				$showRawValues[] = substr($data["F-M_VC2_CAD"],0,100);
	}	
//	F-M_VC2_VLR - Currency
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"F-M_VC2_VLR", "Currency"),"field=F%2DM%5FVC2%5FVLR".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_M_VC2_VLR";
				$showRawValues[] = substr($data["F-M_VC2_VLR"],0,100);
	}	
//	F-F_LDN_CAD - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("F-F_LDN_CAD",$data["F-F_LDN_CAD"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_F_LDN_CAD";
				$showRawValues[] = substr($data["F-F_LDN_CAD"],0,100);
	}	
//	F-F_LDN_VLR - Currency
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"F-F_LDN_VLR", "Currency"),"field=F%2DF%5FLDN%5FVLR".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_F_LDN_VLR";
				$showRawValues[] = substr($data["F-F_LDN_VLR"],0,100);
	}	
//	F-F_LDI_CAD - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("F-F_LDI_CAD",$data["F-F_LDI_CAD"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_F_LDI_CAD";
				$showRawValues[] = substr($data["F-F_LDI_CAD"],0,100);
	}	
//	F-F_LDI_VLR - Currency
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"F-F_LDI_VLR", "Currency"),"field=F%2DF%5FLDI%5FVLR".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_F_LDI_VLR";
				$showRawValues[] = substr($data["F-F_LDI_VLR"],0,100);
	}	
//	F-M_LDI_CAD - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("F-M_LDI_CAD",$data["F-M_LDI_CAD"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_M_LDI_CAD";
				$showRawValues[] = substr($data["F-M_LDI_CAD"],0,100);
	}	
//	F-M_LDI_VLR - Currency
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"F-M_LDI_VLR", "Currency"),"field=F%2DM%5FLDI%5FVLR".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_M_LDI_VLR";
				$showRawValues[] = substr($data["F-M_LDI_VLR"],0,100);
	}	
//	F-M_VC3_CAD - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("F-M_VC3_CAD",$data["F-M_VC3_CAD"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_M_VC3_CAD";
				$showRawValues[] = substr($data["F-M_VC3_CAD"],0,100);
	}	
//	F-M_VC3_VLR - Currency
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"F-M_VC3_VLR", "Currency"),"field=F%2DM%5FVC3%5FVLR".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "F_M_VC3_VLR";
				$showRawValues[] = substr($data["F-M_VC3_VLR"],0,100);
	}	
//	dia_ini - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dia_ini", ""),"field=dia%5Fini".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dia_ini";
				$showRawValues[] = substr($data["dia_ini"],0,100);
	}	
//	dia_fim - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dia_fim", ""),"field=dia%5Ffim".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dia_fim";
				$showRawValues[] = substr($data["dia_fim"],0,100);
	}	
//	posicao_mes - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"posicao_mes", ""),"field=posicao%5Fmes".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "posicao_mes";
				$showRawValues[] = substr($data["posicao_mes"],0,100);
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
//	control - F_F_LOCAL_CAD
$control_F_F_LOCAL_CAD=array();
$control_F_F_LOCAL_CAD["func"]="xt_buildeditcontrol";
$control_F_F_LOCAL_CAD["params"] = array();
$control_F_F_LOCAL_CAD["params"]["field"]="F-F_LOCAL_CAD";
$control_F_F_LOCAL_CAD["params"]["value"]=@$defvalues["F-F_LOCAL_CAD"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_F_LOCAL_CAD["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_F_LOCAL_CAD["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_F_LOCAL_CAD["params"]["mode"]="inline_add";
else
	$control_F_F_LOCAL_CAD["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-F_LOCAL_CAD", $detailKeys))
	$xt->assignbyref("F_F_LOCAL_CAD_editcontrol",$control_F_F_LOCAL_CAD);
else if(array_key_exists("F-F_LOCAL_CAD", $defvalues))
{
				$value=DisplayLookupWizard("F-F_LOCAL_CAD",$defvalues["F-F_LOCAL_CAD"],$defvalues,"",MODE_VIEW);
		$xt->assign("F_F_LOCAL_CAD_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_F_LOCAL_VLR
$control_F_F_LOCAL_VLR=array();
$control_F_F_LOCAL_VLR["func"]="xt_buildeditcontrol";
$control_F_F_LOCAL_VLR["params"] = array();
$control_F_F_LOCAL_VLR["params"]["field"]="F-F_LOCAL_VLR";
$control_F_F_LOCAL_VLR["params"]["value"]=@$defvalues["F-F_LOCAL_VLR"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Currency");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_F_LOCAL_VLR["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_F_LOCAL_VLR["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_F_LOCAL_VLR["params"]["mode"]="inline_add";
else
	$control_F_F_LOCAL_VLR["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-F_LOCAL_VLR", $detailKeys))
	$xt->assignbyref("F_F_LOCAL_VLR_editcontrol",$control_F_F_LOCAL_VLR);
else if(array_key_exists("F-F_LOCAL_VLR", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"F-F_LOCAL_VLR", "Currency"),"field=F%2DF%5FLOCAL%5FVLR","",MODE_VIEW);
		$xt->assign("F_F_LOCAL_VLR_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_M_LOCAL_VC1_CAD
$control_F_M_LOCAL_VC1_CAD=array();
$control_F_M_LOCAL_VC1_CAD["func"]="xt_buildeditcontrol";
$control_F_M_LOCAL_VC1_CAD["params"] = array();
$control_F_M_LOCAL_VC1_CAD["params"]["field"]="F-M_LOCAL_VC1_CAD";
$control_F_M_LOCAL_VC1_CAD["params"]["value"]=@$defvalues["F-M_LOCAL_VC1_CAD"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_M_LOCAL_VC1_CAD["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_M_LOCAL_VC1_CAD["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_M_LOCAL_VC1_CAD["params"]["mode"]="inline_add";
else
	$control_F_M_LOCAL_VC1_CAD["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-M_LOCAL_VC1_CAD", $detailKeys))
	$xt->assignbyref("F_M_LOCAL_VC1_CAD_editcontrol",$control_F_M_LOCAL_VC1_CAD);
else if(array_key_exists("F-M_LOCAL_VC1_CAD", $defvalues))
{
				$value=DisplayLookupWizard("F-M_LOCAL_VC1_CAD",$defvalues["F-M_LOCAL_VC1_CAD"],$defvalues,"",MODE_VIEW);
		$xt->assign("F_M_LOCAL_VC1_CAD_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_M_LOCAL_VC1_VLR
$control_F_M_LOCAL_VC1_VLR=array();
$control_F_M_LOCAL_VC1_VLR["func"]="xt_buildeditcontrol";
$control_F_M_LOCAL_VC1_VLR["params"] = array();
$control_F_M_LOCAL_VC1_VLR["params"]["field"]="F-M_LOCAL_VC1_VLR";
$control_F_M_LOCAL_VC1_VLR["params"]["value"]=@$defvalues["F-M_LOCAL_VC1_VLR"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Currency");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_M_LOCAL_VC1_VLR["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_M_LOCAL_VC1_VLR["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_M_LOCAL_VC1_VLR["params"]["mode"]="inline_add";
else
	$control_F_M_LOCAL_VC1_VLR["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-M_LOCAL_VC1_VLR", $detailKeys))
	$xt->assignbyref("F_M_LOCAL_VC1_VLR_editcontrol",$control_F_M_LOCAL_VC1_VLR);
else if(array_key_exists("F-M_LOCAL_VC1_VLR", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"F-M_LOCAL_VC1_VLR", "Currency"),"field=F%2DM%5FLOCAL%5FVC1%5FVLR","",MODE_VIEW);
		$xt->assign("F_M_LOCAL_VC1_VLR_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_M_VC2_CAD
$control_F_M_VC2_CAD=array();
$control_F_M_VC2_CAD["func"]="xt_buildeditcontrol";
$control_F_M_VC2_CAD["params"] = array();
$control_F_M_VC2_CAD["params"]["field"]="F-M_VC2_CAD";
$control_F_M_VC2_CAD["params"]["value"]=@$defvalues["F-M_VC2_CAD"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_M_VC2_CAD["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_M_VC2_CAD["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_M_VC2_CAD["params"]["mode"]="inline_add";
else
	$control_F_M_VC2_CAD["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-M_VC2_CAD", $detailKeys))
	$xt->assignbyref("F_M_VC2_CAD_editcontrol",$control_F_M_VC2_CAD);
else if(array_key_exists("F-M_VC2_CAD", $defvalues))
{
				$value=DisplayLookupWizard("F-M_VC2_CAD",$defvalues["F-M_VC2_CAD"],$defvalues,"",MODE_VIEW);
		$xt->assign("F_M_VC2_CAD_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_M_VC2_VLR
$control_F_M_VC2_VLR=array();
$control_F_M_VC2_VLR["func"]="xt_buildeditcontrol";
$control_F_M_VC2_VLR["params"] = array();
$control_F_M_VC2_VLR["params"]["field"]="F-M_VC2_VLR";
$control_F_M_VC2_VLR["params"]["value"]=@$defvalues["F-M_VC2_VLR"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Currency");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_M_VC2_VLR["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_M_VC2_VLR["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_M_VC2_VLR["params"]["mode"]="inline_add";
else
	$control_F_M_VC2_VLR["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-M_VC2_VLR", $detailKeys))
	$xt->assignbyref("F_M_VC2_VLR_editcontrol",$control_F_M_VC2_VLR);
else if(array_key_exists("F-M_VC2_VLR", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"F-M_VC2_VLR", "Currency"),"field=F%2DM%5FVC2%5FVLR","",MODE_VIEW);
		$xt->assign("F_M_VC2_VLR_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_F_LDN_CAD
$control_F_F_LDN_CAD=array();
$control_F_F_LDN_CAD["func"]="xt_buildeditcontrol";
$control_F_F_LDN_CAD["params"] = array();
$control_F_F_LDN_CAD["params"]["field"]="F-F_LDN_CAD";
$control_F_F_LDN_CAD["params"]["value"]=@$defvalues["F-F_LDN_CAD"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_F_LDN_CAD["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_F_LDN_CAD["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_F_LDN_CAD["params"]["mode"]="inline_add";
else
	$control_F_F_LDN_CAD["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-F_LDN_CAD", $detailKeys))
	$xt->assignbyref("F_F_LDN_CAD_editcontrol",$control_F_F_LDN_CAD);
else if(array_key_exists("F-F_LDN_CAD", $defvalues))
{
				$value=DisplayLookupWizard("F-F_LDN_CAD",$defvalues["F-F_LDN_CAD"],$defvalues,"",MODE_VIEW);
		$xt->assign("F_F_LDN_CAD_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_F_LDN_VLR
$control_F_F_LDN_VLR=array();
$control_F_F_LDN_VLR["func"]="xt_buildeditcontrol";
$control_F_F_LDN_VLR["params"] = array();
$control_F_F_LDN_VLR["params"]["field"]="F-F_LDN_VLR";
$control_F_F_LDN_VLR["params"]["value"]=@$defvalues["F-F_LDN_VLR"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Currency");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_F_LDN_VLR["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_F_LDN_VLR["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_F_LDN_VLR["params"]["mode"]="inline_add";
else
	$control_F_F_LDN_VLR["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-F_LDN_VLR", $detailKeys))
	$xt->assignbyref("F_F_LDN_VLR_editcontrol",$control_F_F_LDN_VLR);
else if(array_key_exists("F-F_LDN_VLR", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"F-F_LDN_VLR", "Currency"),"field=F%2DF%5FLDN%5FVLR","",MODE_VIEW);
		$xt->assign("F_F_LDN_VLR_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_F_LDI_CAD
$control_F_F_LDI_CAD=array();
$control_F_F_LDI_CAD["func"]="xt_buildeditcontrol";
$control_F_F_LDI_CAD["params"] = array();
$control_F_F_LDI_CAD["params"]["field"]="F-F_LDI_CAD";
$control_F_F_LDI_CAD["params"]["value"]=@$defvalues["F-F_LDI_CAD"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_F_LDI_CAD["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_F_LDI_CAD["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_F_LDI_CAD["params"]["mode"]="inline_add";
else
	$control_F_F_LDI_CAD["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-F_LDI_CAD", $detailKeys))
	$xt->assignbyref("F_F_LDI_CAD_editcontrol",$control_F_F_LDI_CAD);
else if(array_key_exists("F-F_LDI_CAD", $defvalues))
{
				$value=DisplayLookupWizard("F-F_LDI_CAD",$defvalues["F-F_LDI_CAD"],$defvalues,"",MODE_VIEW);
		$xt->assign("F_F_LDI_CAD_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_F_LDI_VLR
$control_F_F_LDI_VLR=array();
$control_F_F_LDI_VLR["func"]="xt_buildeditcontrol";
$control_F_F_LDI_VLR["params"] = array();
$control_F_F_LDI_VLR["params"]["field"]="F-F_LDI_VLR";
$control_F_F_LDI_VLR["params"]["value"]=@$defvalues["F-F_LDI_VLR"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Currency");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_F_LDI_VLR["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_F_LDI_VLR["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_F_LDI_VLR["params"]["mode"]="inline_add";
else
	$control_F_F_LDI_VLR["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-F_LDI_VLR", $detailKeys))
	$xt->assignbyref("F_F_LDI_VLR_editcontrol",$control_F_F_LDI_VLR);
else if(array_key_exists("F-F_LDI_VLR", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"F-F_LDI_VLR", "Currency"),"field=F%2DF%5FLDI%5FVLR","",MODE_VIEW);
		$xt->assign("F_F_LDI_VLR_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_M_LDI_CAD
$control_F_M_LDI_CAD=array();
$control_F_M_LDI_CAD["func"]="xt_buildeditcontrol";
$control_F_M_LDI_CAD["params"] = array();
$control_F_M_LDI_CAD["params"]["field"]="F-M_LDI_CAD";
$control_F_M_LDI_CAD["params"]["value"]=@$defvalues["F-M_LDI_CAD"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_M_LDI_CAD["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_M_LDI_CAD["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_M_LDI_CAD["params"]["mode"]="inline_add";
else
	$control_F_M_LDI_CAD["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-M_LDI_CAD", $detailKeys))
	$xt->assignbyref("F_M_LDI_CAD_editcontrol",$control_F_M_LDI_CAD);
else if(array_key_exists("F-M_LDI_CAD", $defvalues))
{
				$value=DisplayLookupWizard("F-M_LDI_CAD",$defvalues["F-M_LDI_CAD"],$defvalues,"",MODE_VIEW);
		$xt->assign("F_M_LDI_CAD_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_M_LDI_VLR
$control_F_M_LDI_VLR=array();
$control_F_M_LDI_VLR["func"]="xt_buildeditcontrol";
$control_F_M_LDI_VLR["params"] = array();
$control_F_M_LDI_VLR["params"]["field"]="F-M_LDI_VLR";
$control_F_M_LDI_VLR["params"]["value"]=@$defvalues["F-M_LDI_VLR"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Currency");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_M_LDI_VLR["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_M_LDI_VLR["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_M_LDI_VLR["params"]["mode"]="inline_add";
else
	$control_F_M_LDI_VLR["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-M_LDI_VLR", $detailKeys))
	$xt->assignbyref("F_M_LDI_VLR_editcontrol",$control_F_M_LDI_VLR);
else if(array_key_exists("F-M_LDI_VLR", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"F-M_LDI_VLR", "Currency"),"field=F%2DM%5FLDI%5FVLR","",MODE_VIEW);
		$xt->assign("F_M_LDI_VLR_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_M_VC3_CAD
$control_F_M_VC3_CAD=array();
$control_F_M_VC3_CAD["func"]="xt_buildeditcontrol";
$control_F_M_VC3_CAD["params"] = array();
$control_F_M_VC3_CAD["params"]["field"]="F-M_VC3_CAD";
$control_F_M_VC3_CAD["params"]["value"]=@$defvalues["F-M_VC3_CAD"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_M_VC3_CAD["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_M_VC3_CAD["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_M_VC3_CAD["params"]["mode"]="inline_add";
else
	$control_F_M_VC3_CAD["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-M_VC3_CAD", $detailKeys))
	$xt->assignbyref("F_M_VC3_CAD_editcontrol",$control_F_M_VC3_CAD);
else if(array_key_exists("F-M_VC3_CAD", $defvalues))
{
				$value=DisplayLookupWizard("F-M_VC3_CAD",$defvalues["F-M_VC3_CAD"],$defvalues,"",MODE_VIEW);
		$xt->assign("F_M_VC3_CAD_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - F_M_VC3_VLR
$control_F_M_VC3_VLR=array();
$control_F_M_VC3_VLR["func"]="xt_buildeditcontrol";
$control_F_M_VC3_VLR["params"] = array();
$control_F_M_VC3_VLR["params"]["field"]="F-M_VC3_VLR";
$control_F_M_VC3_VLR["params"]["value"]=@$defvalues["F-M_VC3_VLR"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Currency");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_F_M_VC3_VLR["params"]["validate"]=$arrValidate;
//	End Add validation

$control_F_M_VC3_VLR["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_F_M_VC3_VLR["params"]["mode"]="inline_add";
else
	$control_F_M_VC3_VLR["params"]["mode"]="add";

if(!$detailKeys || !in_array("F-M_VC3_VLR", $detailKeys))
	$xt->assignbyref("F_M_VC3_VLR_editcontrol",$control_F_M_VC3_VLR);
else if(array_key_exists("F-M_VC3_VLR", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"F-M_VC3_VLR", "Currency"),"field=F%2DM%5FVC3%5FVLR","",MODE_VIEW);
		$xt->assign("F_M_VC3_VLR_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - dia_ini
$control_dia_ini=array();
$control_dia_ini["func"]="xt_buildeditcontrol";
$control_dia_ini["params"] = array();
$control_dia_ini["params"]["field"]="dia_ini";
$control_dia_ini["params"]["value"]=@$defvalues["dia_ini"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_dia_ini["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dia_ini["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dia_ini["params"]["mode"]="inline_add";
else
	$control_dia_ini["params"]["mode"]="add";

if(!$detailKeys || !in_array("dia_ini", $detailKeys))
	$xt->assignbyref("dia_ini_editcontrol",$control_dia_ini);
else if(array_key_exists("dia_ini", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dia_ini", ""),"field=dia%5Fini","",MODE_VIEW);
		$xt->assign("dia_ini_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - dia_fim
$control_dia_fim=array();
$control_dia_fim["func"]="xt_buildeditcontrol";
$control_dia_fim["params"] = array();
$control_dia_fim["params"]["field"]="dia_fim";
$control_dia_fim["params"]["value"]=@$defvalues["dia_fim"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_dia_fim["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dia_fim["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dia_fim["params"]["mode"]="inline_add";
else
	$control_dia_fim["params"]["mode"]="add";

if(!$detailKeys || !in_array("dia_fim", $detailKeys))
	$xt->assignbyref("dia_fim_editcontrol",$control_dia_fim);
else if(array_key_exists("dia_fim", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dia_fim", ""),"field=dia%5Ffim","",MODE_VIEW);
		$xt->assign("dia_fim_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - posicao_mes
$control_posicao_mes=array();
$control_posicao_mes["func"]="xt_buildeditcontrol";
$control_posicao_mes["params"] = array();
$control_posicao_mes["params"]["field"]="posicao_mes";
$control_posicao_mes["params"]["value"]=@$defvalues["posicao_mes"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_posicao_mes["params"]["validate"]=$arrValidate;
//	End Add validation

$control_posicao_mes["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_posicao_mes["params"]["mode"]="inline_add";
else
	$control_posicao_mes["params"]["mode"]="add";

if(!$detailKeys || !in_array("posicao_mes", $detailKeys))
	$xt->assignbyref("posicao_mes_editcontrol",$control_posicao_mes);
else if(array_key_exists("posicao_mes", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"posicao_mes", ""),"field=posicao%5Fmes","",MODE_VIEW);
		$xt->assign("posicao_mes_editcontrol",$value);
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
	$strTableName = "contrato_trad";
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
