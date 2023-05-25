<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/cc_receptivo_filas_variables.php");
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
	$templatefile = "cc_receptivo_filas_inline_add.htm";
else
	$templatefile = "cc_receptivo_filas_add.htm";

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
			'mShortTableName':'cc_receptivo_filas', 
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
//	processing nm_fila - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_nm_fila_".$id);
	$type=postvalue("type_nm_fila_".$id);
	if (FieldSubmitted("nm_fila_".$id))
	{
		$value=prepare_for_db("nm_fila",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "nm_fila"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["nm_fila"]=$value;
	}
	}
//	processibng nm_fila - end
//	processing nm_grupo - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_nm_grupo_".$id);
	$type=postvalue("type_nm_grupo_".$id);
	if (FieldSubmitted("nm_grupo_".$id))
	{
		$value=prepare_for_db("nm_grupo",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "nm_grupo"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["nm_grupo"]=$value;
	}
	}
//	processibng nm_grupo - end
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
//	processing estrategia - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_estrategia_".$id);
	$type=postvalue("type_estrategia_".$id);
	if (FieldSubmitted("estrategia_".$id))
	{
		$value=prepare_for_db("estrategia",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "estrategia"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["estrategia"]=$value;
	}
	}
//	processibng estrategia - end
//	processing tp_excedido - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_tp_excedido_".$id);
	$type=postvalue("type_tp_excedido_".$id);
	if (FieldSubmitted("tp_excedido_".$id))
	{
		$value=prepare_for_db("tp_excedido",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "tp_excedido"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["tp_excedido"]=$value;
	}
	}
//	processibng tp_excedido - end
//	processing acao_tp_excedido - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_acao_tp_excedido_".$id);
	$type=postvalue("type_acao_tp_excedido_".$id);
	if (FieldSubmitted("acao_tp_excedido_".$id))
	{
		$value=prepare_for_db("acao_tp_excedido",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "acao_tp_excedido"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["acao_tp_excedido"]=$value;
	}
	}
//	processibng acao_tp_excedido - end
//	processing acao_falta_agente - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_acao_falta_agente_".$id);
	$type=postvalue("type_acao_falta_agente_".$id);
	if (FieldSubmitted("acao_falta_agente_".$id))
	{
		$value=prepare_for_db("acao_falta_agente",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "acao_falta_agente"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["acao_falta_agente"]=$value;
	}
	}
//	processibng acao_falta_agente - end
//	processing acao_fr_horario - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_acao_fr_horario_".$id);
	$type=postvalue("type_acao_fr_horario_".$id);
	if (FieldSubmitted("acao_fr_horario_".$id))
	{
		$value=prepare_for_db("acao_fr_horario",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "acao_fr_horario"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["acao_fr_horario"]=$value;
	}
	}
//	processibng acao_fr_horario - end
//	processing id_desvio - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_desvio_".$id);
	$type=postvalue("type_id_desvio_".$id);
	if (FieldSubmitted("id_desvio_".$id))
	{
		$value=prepare_for_db("id_desvio",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_desvio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_desvio"]=$value;
	}
	}
//	processibng id_desvio - end
//	processing gravacao - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_gravacao_".$id);
	$type=postvalue("type_gravacao_".$id);
	if (FieldSubmitted("gravacao_".$id))
	{
		$value=prepare_for_db("gravacao",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "gravacao"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["gravacao"]=$value;
	}
	}
//	processibng gravacao - end
//	processing arq_audio - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
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
//	processing arq_mesg - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_arq_mesg_".$id);
	$type=postvalue("type_arq_mesg_".$id);
	if (FieldSubmitted("arq_mesg_".$id))
	{
	$fileNameForPrepareFunc = postvalue("filename_arq_mesg_".$id);
			$value=prepare_upload("arq_mesg","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id);
			
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "arq_mesg"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["arq_mesg"]=$value;
	}
	}
//	processibng arq_mesg - end
//	processing id_logout - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_logout_".$id);
	$type=postvalue("type_id_logout_".$id);
	if (FieldSubmitted("id_logout_".$id))
	{
		$value=prepare_for_db("id_logout",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_logout"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_logout"]=$value;
	}
	}
//	processibng id_logout - end
//	processing maxlen - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_maxlen_".$id);
	$type=postvalue("type_maxlen_".$id);
	if (FieldSubmitted("maxlen_".$id))
	{
		$value=prepare_for_db("maxlen",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "maxlen"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["maxlen"]=$value;
	}
	}
//	processibng maxlen - end
//	processing wrapuptime - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_wrapuptime_".$id);
	$type=postvalue("type_wrapuptime_".$id);
	if (FieldSubmitted("wrapuptime_".$id))
	{
		$value=prepare_for_db("wrapuptime",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "wrapuptime"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["wrapuptime"]=$value;
	}
	}
//	processibng wrapuptime - end
//	processing seg_tmo - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_seg_tmo_".$id);
	$type=postvalue("type_seg_tmo_".$id);
	if (FieldSubmitted("seg_tmo_".$id))
	{
		$value=prepare_for_db("seg_tmo",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "seg_tmo"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["seg_tmo"]=$value;
	}
	}
//	processibng seg_tmo - end
//	processing perc_tmo - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_perc_tmo_".$id);
	$type=postvalue("type_perc_tmo_".$id);
	if (FieldSubmitted("perc_tmo_".$id))
	{
		$value=prepare_for_db("perc_tmo",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "perc_tmo"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["perc_tmo"]=$value;
	}
	}
//	processibng perc_tmo - end
//	processing seg_tma - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_seg_tma_".$id);
	$type=postvalue("type_seg_tma_".$id);
	if (FieldSubmitted("seg_tma_".$id))
	{
		$value=prepare_for_db("seg_tma",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "seg_tma"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["seg_tma"]=$value;
	}
	}
//	processibng seg_tma - end
//	processing perc_tma - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_perc_tma_".$id);
	$type=postvalue("type_perc_tma_".$id);
	if (FieldSubmitted("perc_tma_".$id))
	{
		$value=prepare_for_db("perc_tma",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "perc_tma"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["perc_tma"]=$value;
	}
	}
//	processibng perc_tma - end
//	processing seg_tme - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_seg_tme_".$id);
	$type=postvalue("type_seg_tme_".$id);
	if (FieldSubmitted("seg_tme_".$id))
	{
		$value=prepare_for_db("seg_tme",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "seg_tme"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["seg_tme"]=$value;
	}
	}
//	processibng seg_tme - end
//	processing perc_tme - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_perc_tme_".$id);
	$type=postvalue("type_perc_tme_".$id);
	if (FieldSubmitted("perc_tme_".$id))
	{
		$value=prepare_for_db("perc_tme",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "perc_tme"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["perc_tme"]=$value;
	}
	}
//	processibng perc_tme - end
//	processing tx_abandono - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_tx_abandono_".$id);
	$type=postvalue("type_tx_abandono_".$id);
	if (FieldSubmitted("tx_abandono_".$id))
	{
		$value=prepare_for_db("tx_abandono",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "tx_abandono"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["tx_abandono"]=$value;
	}
	}
//	processibng tx_abandono - end
//	processing flg_estim_do_dia - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_estim_do_dia_".$id);
	$type=postvalue("type_flg_estim_do_dia_".$id);
	if (FieldSubmitted("flg_estim_do_dia_".$id))
	{
		$value=prepare_for_db("flg_estim_do_dia",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_estim_do_dia"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_estim_do_dia"]=$value;
	}
	}
//	processibng flg_estim_do_dia - end
//	processing tp_estimativa - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_tp_estimativa_".$id);
	$type=postvalue("type_tp_estimativa_".$id);
	if (FieldSubmitted("tp_estimativa_".$id))
	{
		$value=prepare_for_db("tp_estimativa",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "tp_estimativa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["tp_estimativa"]=$value;
	}
	}
//	processibng tp_estimativa - end
//	processing id_name_gestor - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_name_gestor_".$id);
	$type=postvalue("type_id_name_gestor_".$id);
	if (FieldSubmitted("id_name_gestor_".$id))
	{
		$value=prepare_for_db("id_name_gestor",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_name_gestor"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_name_gestor"]=$value;
	}
	}
//	processibng id_name_gestor - end



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
					$message .='&nbsp;<a href=\'cc_receptivo_filas_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'cc_receptivo_filas_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: cc_receptivo_filas_".$pageObject->getPageType().".php");
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
		$copykeys["id_filas"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["id_filas"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id_filas"]="";
//call CopyOnLoad event
	if(function_exists("CopyOnLoad"))
		CopyOnLoad($defvalues,$strWhere);
}
else
{
}

if($readavalues)
{
	$defvalues["nm_fila"]=@$avalues["nm_fila"];
	$defvalues["estrategia"]=@$avalues["estrategia"];
	$defvalues["gravacao"]=@$avalues["gravacao"];
	$defvalues["tp_toques"]=@$avalues["tp_toques"];
	$defvalues["id_desvio"]=@$avalues["id_desvio"];
	$defvalues["tp_excedido"]=@$avalues["tp_excedido"];
	$defvalues["acao_falta_agente"]=@$avalues["acao_falta_agente"];
	$defvalues["acao_tp_excedido"]=@$avalues["acao_tp_excedido"];
	$defvalues["acao_fr_horario"]=@$avalues["acao_fr_horario"];
	$defvalues["seg_tmo"]=@$avalues["seg_tmo"];
	$defvalues["perc_tmo"]=@$avalues["perc_tmo"];
	$defvalues["seg_tma"]=@$avalues["seg_tma"];
	$defvalues["perc_tma"]=@$avalues["perc_tma"];
	$defvalues["seg_tme"]=@$avalues["seg_tme"];
	$defvalues["perc_tme"]=@$avalues["perc_tme"];
	$defvalues["tx_abandono"]=@$avalues["tx_abandono"];
	$defvalues["flg_estim_do_dia"]=@$avalues["flg_estim_do_dia"];
	$defvalues["tp_estimativa"]=@$avalues["tp_estimativa"];
	$defvalues["id_name_gestor"]=@$avalues["id_name_gestor"];
	$defvalues["maxlen"]=@$avalues["maxlen"];
	$defvalues["wrapuptime"]=@$avalues["wrapuptime"];
	$defvalues["nm_grupo"]=@$avalues["nm_grupo"];
	$defvalues["id_logout"]=@$avalues["id_logout"];
}
//for basic files
$includes="";
if ($inlineadd!==ADD_INLINE && $inlineadd!=ADD_ONTHEFLY)
	$pageObject->addJSCode("AddEventForControl('".jsreplace($strTableName)."', '', ".$id.");\r\n");

		
	
$onsubmit = $pageObject->onSubmitForEditingPage($formname,$inlineadd);
	

//////////////////////////////////////////////////////////////////	
$pageObject->AddJSFile("include/ui");
$pageObject->AddJSFile("include/ui.core","include/ui");
$pageObject->AddJSFile("include/ui.resizable","include/ui.core");
$pageObject->AddJSFile("include/onthefly");
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
	$xt->assign("nm_fila_fieldblock",true);
	$xt->assign("nm_fila_label",true);
	if(isEnableSection508())
		$xt->assign_section("nm_fila_label","<label for=\"".GetInputElementId("nm_fila", $id)."\">","</label>");
	$xt->assign("estrategia_fieldblock",true);
	$xt->assign("estrategia_label",true);
	if(isEnableSection508())
		$xt->assign_section("estrategia_label","<label for=\"".GetInputElementId("estrategia", $id)."\">","</label>");
	$xt->assign("gravacao_fieldblock",true);
	$xt->assign("gravacao_label",true);
	if(isEnableSection508())
		$xt->assign_section("gravacao_label","<label for=\"".GetInputElementId("gravacao", $id)."\">","</label>");
	$xt->assign("arq_audio_fieldblock",true);
	$xt->assign("arq_audio_label",true);
	if(isEnableSection508())
		$xt->assign_section("arq_audio_label","<label for=\"".GetInputElementId("arq_audio", $id)."\">","</label>");
	$xt->assign("arq_mesg_fieldblock",true);
	$xt->assign("arq_mesg_label",true);
	if(isEnableSection508())
		$xt->assign_section("arq_mesg_label","<label for=\"".GetInputElementId("arq_mesg", $id)."\">","</label>");
	$xt->assign("tp_toques_fieldblock",true);
	$xt->assign("tp_toques_label",true);
	if(isEnableSection508())
		$xt->assign_section("tp_toques_label","<label for=\"".GetInputElementId("tp_toques", $id)."\">","</label>");
	$xt->assign("id_desvio_fieldblock",true);
	$xt->assign("id_desvio_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_desvio_label","<label for=\"".GetInputElementId("id_desvio", $id)."\">","</label>");
	$xt->assign("tp_excedido_fieldblock",true);
	$xt->assign("tp_excedido_label",true);
	if(isEnableSection508())
		$xt->assign_section("tp_excedido_label","<label for=\"".GetInputElementId("tp_excedido", $id)."\">","</label>");
	$xt->assign("acao_falta_agente_fieldblock",true);
	$xt->assign("acao_falta_agente_label",true);
	if(isEnableSection508())
		$xt->assign_section("acao_falta_agente_label","<label for=\"".GetInputElementId("acao_falta_agente", $id)."\">","</label>");
	$xt->assign("acao_tp_excedido_fieldblock",true);
	$xt->assign("acao_tp_excedido_label",true);
	if(isEnableSection508())
		$xt->assign_section("acao_tp_excedido_label","<label for=\"".GetInputElementId("acao_tp_excedido", $id)."\">","</label>");
	$xt->assign("acao_fr_horario_fieldblock",true);
	$xt->assign("acao_fr_horario_label",true);
	if(isEnableSection508())
		$xt->assign_section("acao_fr_horario_label","<label for=\"".GetInputElementId("acao_fr_horario", $id)."\">","</label>");
	$xt->assign("seg_tmo_fieldblock",true);
	$xt->assign("seg_tmo_label",true);
	if(isEnableSection508())
		$xt->assign_section("seg_tmo_label","<label for=\"".GetInputElementId("seg_tmo", $id)."\">","</label>");
	$xt->assign("perc_tmo_fieldblock",true);
	$xt->assign("perc_tmo_label",true);
	if(isEnableSection508())
		$xt->assign_section("perc_tmo_label","<label for=\"".GetInputElementId("perc_tmo", $id)."\">","</label>");
	$xt->assign("seg_tma_fieldblock",true);
	$xt->assign("seg_tma_label",true);
	if(isEnableSection508())
		$xt->assign_section("seg_tma_label","<label for=\"".GetInputElementId("seg_tma", $id)."\">","</label>");
	$xt->assign("perc_tma_fieldblock",true);
	$xt->assign("perc_tma_label",true);
	if(isEnableSection508())
		$xt->assign_section("perc_tma_label","<label for=\"".GetInputElementId("perc_tma", $id)."\">","</label>");
	$xt->assign("seg_tme_fieldblock",true);
	$xt->assign("seg_tme_label",true);
	if(isEnableSection508())
		$xt->assign_section("seg_tme_label","<label for=\"".GetInputElementId("seg_tme", $id)."\">","</label>");
	$xt->assign("perc_tme_fieldblock",true);
	$xt->assign("perc_tme_label",true);
	if(isEnableSection508())
		$xt->assign_section("perc_tme_label","<label for=\"".GetInputElementId("perc_tme", $id)."\">","</label>");
	$xt->assign("tx_abandono_fieldblock",true);
	$xt->assign("tx_abandono_label",true);
	if(isEnableSection508())
		$xt->assign_section("tx_abandono_label","<label for=\"".GetInputElementId("tx_abandono", $id)."\">","</label>");
	$xt->assign("flg_estim_do_dia_fieldblock",true);
	$xt->assign("flg_estim_do_dia_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_estim_do_dia_label","<label for=\"".GetInputElementId("flg_estim_do_dia", $id)."\">","</label>");
	$xt->assign("tp_estimativa_fieldblock",true);
	$xt->assign("tp_estimativa_label",true);
	if(isEnableSection508())
		$xt->assign_section("tp_estimativa_label","<label for=\"".GetInputElementId("tp_estimativa", $id)."\">","</label>");
	$xt->assign("id_name_gestor_fieldblock",true);
	$xt->assign("id_name_gestor_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_name_gestor_label","<label for=\"".GetInputElementId("id_name_gestor", $id)."\">","</label>");
	$xt->assign("maxlen_fieldblock",true);
	$xt->assign("maxlen_label",true);
	if(isEnableSection508())
		$xt->assign_section("maxlen_label","<label for=\"".GetInputElementId("maxlen", $id)."\">","</label>");
	$xt->assign("wrapuptime_fieldblock",true);
	$xt->assign("wrapuptime_label",true);
	if(isEnableSection508())
		$xt->assign_section("wrapuptime_label","<label for=\"".GetInputElementId("wrapuptime", $id)."\">","</label>");
	$xt->assign("nm_grupo_fieldblock",true);
	$xt->assign("nm_grupo_label",true);
	if(isEnableSection508())
		$xt->assign_section("nm_grupo_label","<label for=\"".GetInputElementId("nm_grupo", $id)."\">","</label>");
	$xt->assign("id_logout_fieldblock",true);
	$xt->assign("id_logout_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_logout_label","<label for=\"".GetInputElementId("id_logout", $id)."\">","</label>");
	
	
	if($inlineadd!=ADD_ONTHEFLY)
	{
		if($onsubmit)
			$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit)."\"";
		
		$pageObject->body["begin"] .= $includes;
		if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='cc_receptivo_filas_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="cc_receptivo_filas_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="cc_receptivo_filas_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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

	$showKeys[] = htmlspecialchars($keys["id_filas"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_filas"]));

	

	
	
////////////////////////////////////////////
//	nm_fila - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"nm_fila", ""),"field=nm%5Ffila".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "nm_fila";
				$showRawValues[] = substr($data["nm_fila"],0,100);
	}	
//	estrategia - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("estrategia",$data["estrategia"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "estrategia";
				$showRawValues[] = substr($data["estrategia"],0,100);
	}	
//	gravacao - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"gravacao", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "gravacao";
				$showRawValues[] = substr($data["gravacao"],0,100);
	}	
//	arq_audio - Document Download
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"arq_audio", "Document Download");
		$showValues[] = $value;
		$showFields[] = "arq_audio";
				$showRawValues[] = substr($data["arq_audio"],0,100);
	}	
//	arq_mesg - Document Download
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"arq_mesg", "Document Download");
		$showValues[] = $value;
		$showFields[] = "arq_mesg";
				$showRawValues[] = substr($data["arq_mesg"],0,100);
	}	
//	tp_toques - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"tp_toques", ""),"field=tp%5Ftoques".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_toques";
				$showRawValues[] = substr($data["tp_toques"],0,100);
	}	
//	id_desvio - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("id_desvio",$data["id_desvio"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_desvio";
				$showRawValues[] = substr($data["id_desvio"],0,100);
	}	
//	tp_excedido - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"tp_excedido", ""),"field=tp%5Fexcedido".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_excedido";
				$showRawValues[] = substr($data["tp_excedido"],0,100);
	}	
//	acao_falta_agente - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("acao_falta_agente",$data["acao_falta_agente"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "acao_falta_agente";
				$showRawValues[] = substr($data["acao_falta_agente"],0,100);
	}	
//	acao_tp_excedido - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("acao_tp_excedido",$data["acao_tp_excedido"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "acao_tp_excedido";
				$showRawValues[] = substr($data["acao_tp_excedido"],0,100);
	}	
//	acao_fr_horario - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("acao_fr_horario",$data["acao_fr_horario"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "acao_fr_horario";
				$showRawValues[] = substr($data["acao_fr_horario"],0,100);
	}	
//	seg_tmo - Number
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"seg_tmo", "Number"),"field=seg%5Ftmo".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "seg_tmo";
				$showRawValues[] = substr($data["seg_tmo"],0,100);
	}	
//	perc_tmo - Number
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"perc_tmo", "Number"),"field=perc%5Ftmo".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "perc_tmo";
				$showRawValues[] = substr($data["perc_tmo"],0,100);
	}	
//	seg_tma - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"seg_tma", ""),"field=seg%5Ftma".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "seg_tma";
				$showRawValues[] = substr($data["seg_tma"],0,100);
	}	
//	perc_tma - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"perc_tma", ""),"field=perc%5Ftma".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "perc_tma";
				$showRawValues[] = substr($data["perc_tma"],0,100);
	}	
//	seg_tme - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"seg_tme", ""),"field=seg%5Ftme".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "seg_tme";
				$showRawValues[] = substr($data["seg_tme"],0,100);
	}	
//	perc_tme - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"perc_tme", ""),"field=perc%5Ftme".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "perc_tme";
				$showRawValues[] = substr($data["perc_tme"],0,100);
	}	
//	tx_abandono - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"tx_abandono", ""),"field=tx%5Fabandono".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tx_abandono";
				$showRawValues[] = substr($data["tx_abandono"],0,100);
	}	
//	flg_estim_do_dia - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"flg_estim_do_dia", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "flg_estim_do_dia";
				$showRawValues[] = substr($data["flg_estim_do_dia"],0,100);
	}	
//	tp_estimativa - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"tp_estimativa", ""),"field=tp%5Festimativa".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_estimativa";
				$showRawValues[] = substr($data["tp_estimativa"],0,100);
	}	
//	id_name_gestor - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("id_name_gestor",$data["id_name_gestor"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_name_gestor";
				$showRawValues[] = substr($data["id_name_gestor"],0,100);
	}	
//	maxlen - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"maxlen", ""),"field=maxlen".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "maxlen";
				$showRawValues[] = substr($data["maxlen"],0,100);
	}	
//	wrapuptime - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"wrapuptime", ""),"field=wrapuptime".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "wrapuptime";
				$showRawValues[] = substr($data["wrapuptime"],0,100);
	}	
//	nm_grupo - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"nm_grupo", ""),"field=nm%5Fgrupo".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "nm_grupo";
				$showRawValues[] = substr($data["nm_grupo"],0,100);
	}	
//	id_logout - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("id_logout",$data["id_logout"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_logout";
				$showRawValues[] = substr($data["id_logout"],0,100);
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
//	control - nm_fila
$control_nm_fila=array();
$control_nm_fila["func"]="xt_buildeditcontrol";
$control_nm_fila["params"] = array();
$control_nm_fila["params"]["field"]="nm_fila";
$control_nm_fila["params"]["value"]=@$defvalues["nm_fila"];

//	Begin Add validation
$arrValidate = array();	
$control_nm_fila["params"]["validate"]=$arrValidate;
//	End Add validation

$control_nm_fila["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_nm_fila["params"]["mode"]="inline_add";
else
	$control_nm_fila["params"]["mode"]="add";

if(!$detailKeys || !in_array("nm_fila", $detailKeys))
	$xt->assignbyref("nm_fila_editcontrol",$control_nm_fila);
else if(array_key_exists("nm_fila", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"nm_fila", ""),"field=nm%5Ffila","",MODE_VIEW);
		$xt->assign("nm_fila_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - estrategia
$control_estrategia=array();
$control_estrategia["func"]="xt_buildeditcontrol";
$control_estrategia["params"] = array();
$control_estrategia["params"]["field"]="estrategia";
$control_estrategia["params"]["value"]=@$defvalues["estrategia"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_estrategia["params"]["validate"]=$arrValidate;
//	End Add validation

$control_estrategia["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_estrategia["params"]["mode"]="inline_add";
else
	$control_estrategia["params"]["mode"]="add";

if(!$detailKeys || !in_array("estrategia", $detailKeys))
	$xt->assignbyref("estrategia_editcontrol",$control_estrategia);
else if(array_key_exists("estrategia", $defvalues))
{
				$value=DisplayLookupWizard("estrategia",$defvalues["estrategia"],$defvalues,"",MODE_VIEW);
		$xt->assign("estrategia_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - gravacao
$control_gravacao=array();
$control_gravacao["func"]="xt_buildeditcontrol";
$control_gravacao["params"] = array();
$control_gravacao["params"]["field"]="gravacao";
$control_gravacao["params"]["value"]=@$defvalues["gravacao"];

//	Begin Add validation
$arrValidate = array();	
$control_gravacao["params"]["validate"]=$arrValidate;
//	End Add validation

$control_gravacao["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_gravacao["params"]["mode"]="inline_add";
else
	$control_gravacao["params"]["mode"]="add";

if(!$detailKeys || !in_array("gravacao", $detailKeys))
	$xt->assignbyref("gravacao_editcontrol",$control_gravacao);
else if(array_key_exists("gravacao", $defvalues))
{
				$value = GetData($defvalues,"gravacao", "Checkbox");
		$xt->assign("gravacao_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
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
//	control - arq_mesg
$control_arq_mesg=array();
$control_arq_mesg["func"]="xt_buildeditcontrol";
$control_arq_mesg["params"] = array();
$control_arq_mesg["params"]["field"]="arq_mesg";
$control_arq_mesg["params"]["value"]=@$defvalues["arq_mesg"];

//	Begin Add validation
$arrValidate = array();	
$control_arq_mesg["params"]["validate"]=$arrValidate;
//	End Add validation

$control_arq_mesg["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_arq_mesg["params"]["mode"]="inline_add";
else
	$control_arq_mesg["params"]["mode"]="add";

if(!$detailKeys || !in_array("arq_mesg", $detailKeys))
	$xt->assignbyref("arq_mesg_editcontrol",$control_arq_mesg);
else if(array_key_exists("arq_mesg", $defvalues))
{
				$value = GetData($defvalues,"arq_mesg", "Document Download");
		$xt->assign("arq_mesg_editcontrol",$value);
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
$arrValidate['basicValidate'][] = "IsRequired";
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
//	control - id_desvio
$control_id_desvio=array();
$control_id_desvio["func"]="xt_buildeditcontrol";
$control_id_desvio["params"] = array();
$control_id_desvio["params"]["field"]="id_desvio";
$control_id_desvio["params"]["value"]=@$defvalues["id_desvio"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_id_desvio["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_desvio["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_desvio["params"]["mode"]="inline_add";
else
	$control_id_desvio["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_desvio", $detailKeys))
	$xt->assignbyref("id_desvio_editcontrol",$control_id_desvio);
else if(array_key_exists("id_desvio", $defvalues))
{
				$value=DisplayLookupWizard("id_desvio",$defvalues["id_desvio"],$defvalues,"",MODE_VIEW);
		$xt->assign("id_desvio_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - tp_excedido
$control_tp_excedido=array();
$control_tp_excedido["func"]="xt_buildeditcontrol";
$control_tp_excedido["params"] = array();
$control_tp_excedido["params"]["field"]="tp_excedido";
$control_tp_excedido["params"]["value"]=@$defvalues["tp_excedido"];

//	Begin Add validation
$arrValidate = array();	
$control_tp_excedido["params"]["validate"]=$arrValidate;
//	End Add validation

$control_tp_excedido["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_tp_excedido["params"]["mode"]="inline_add";
else
	$control_tp_excedido["params"]["mode"]="add";

if(!$detailKeys || !in_array("tp_excedido", $detailKeys))
	$xt->assignbyref("tp_excedido_editcontrol",$control_tp_excedido);
else if(array_key_exists("tp_excedido", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"tp_excedido", ""),"field=tp%5Fexcedido","",MODE_VIEW);
		$xt->assign("tp_excedido_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - acao_falta_agente
$control_acao_falta_agente=array();
$control_acao_falta_agente["func"]="xt_buildeditcontrol";
$control_acao_falta_agente["params"] = array();
$control_acao_falta_agente["params"]["field"]="acao_falta_agente";
$control_acao_falta_agente["params"]["value"]=@$defvalues["acao_falta_agente"];

//	Begin Add validation
$arrValidate = array();	
$control_acao_falta_agente["params"]["validate"]=$arrValidate;
//	End Add validation

$control_acao_falta_agente["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_acao_falta_agente["params"]["mode"]="inline_add";
else
	$control_acao_falta_agente["params"]["mode"]="add";

if(!$detailKeys || !in_array("acao_falta_agente", $detailKeys))
	$xt->assignbyref("acao_falta_agente_editcontrol",$control_acao_falta_agente);
else if(array_key_exists("acao_falta_agente", $defvalues))
{
				$value=DisplayLookupWizard("acao_falta_agente",$defvalues["acao_falta_agente"],$defvalues,"",MODE_VIEW);
		$xt->assign("acao_falta_agente_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - acao_tp_excedido
$control_acao_tp_excedido=array();
$control_acao_tp_excedido["func"]="xt_buildeditcontrol";
$control_acao_tp_excedido["params"] = array();
$control_acao_tp_excedido["params"]["field"]="acao_tp_excedido";
$control_acao_tp_excedido["params"]["value"]=@$defvalues["acao_tp_excedido"];

//	Begin Add validation
$arrValidate = array();	
$control_acao_tp_excedido["params"]["validate"]=$arrValidate;
//	End Add validation

$control_acao_tp_excedido["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_acao_tp_excedido["params"]["mode"]="inline_add";
else
	$control_acao_tp_excedido["params"]["mode"]="add";

if(!$detailKeys || !in_array("acao_tp_excedido", $detailKeys))
	$xt->assignbyref("acao_tp_excedido_editcontrol",$control_acao_tp_excedido);
else if(array_key_exists("acao_tp_excedido", $defvalues))
{
				$value=DisplayLookupWizard("acao_tp_excedido",$defvalues["acao_tp_excedido"],$defvalues,"",MODE_VIEW);
		$xt->assign("acao_tp_excedido_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - acao_fr_horario
$control_acao_fr_horario=array();
$control_acao_fr_horario["func"]="xt_buildeditcontrol";
$control_acao_fr_horario["params"] = array();
$control_acao_fr_horario["params"]["field"]="acao_fr_horario";
$control_acao_fr_horario["params"]["value"]=@$defvalues["acao_fr_horario"];

//	Begin Add validation
$arrValidate = array();	
$control_acao_fr_horario["params"]["validate"]=$arrValidate;
//	End Add validation

$control_acao_fr_horario["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_acao_fr_horario["params"]["mode"]="inline_add";
else
	$control_acao_fr_horario["params"]["mode"]="add";

if(!$detailKeys || !in_array("acao_fr_horario", $detailKeys))
	$xt->assignbyref("acao_fr_horario_editcontrol",$control_acao_fr_horario);
else if(array_key_exists("acao_fr_horario", $defvalues))
{
				$value=DisplayLookupWizard("acao_fr_horario",$defvalues["acao_fr_horario"],$defvalues,"",MODE_VIEW);
		$xt->assign("acao_fr_horario_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - seg_tmo
$control_seg_tmo=array();
$control_seg_tmo["func"]="xt_buildeditcontrol";
$control_seg_tmo["params"] = array();
$control_seg_tmo["params"]["field"]="seg_tmo";
$control_seg_tmo["params"]["value"]=@$defvalues["seg_tmo"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_seg_tmo["params"]["validate"]=$arrValidate;
//	End Add validation

$control_seg_tmo["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_seg_tmo["params"]["mode"]="inline_add";
else
	$control_seg_tmo["params"]["mode"]="add";

if(!$detailKeys || !in_array("seg_tmo", $detailKeys))
	$xt->assignbyref("seg_tmo_editcontrol",$control_seg_tmo);
else if(array_key_exists("seg_tmo", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"seg_tmo", "Number"),"field=seg%5Ftmo","",MODE_VIEW);
		$xt->assign("seg_tmo_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - perc_tmo
$control_perc_tmo=array();
$control_perc_tmo["func"]="xt_buildeditcontrol";
$control_perc_tmo["params"] = array();
$control_perc_tmo["params"]["field"]="perc_tmo";
$control_perc_tmo["params"]["value"]=@$defvalues["perc_tmo"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_perc_tmo["params"]["validate"]=$arrValidate;
//	End Add validation

$control_perc_tmo["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_perc_tmo["params"]["mode"]="inline_add";
else
	$control_perc_tmo["params"]["mode"]="add";

if(!$detailKeys || !in_array("perc_tmo", $detailKeys))
	$xt->assignbyref("perc_tmo_editcontrol",$control_perc_tmo);
else if(array_key_exists("perc_tmo", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"perc_tmo", "Number"),"field=perc%5Ftmo","",MODE_VIEW);
		$xt->assign("perc_tmo_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - seg_tma
$control_seg_tma=array();
$control_seg_tma["func"]="xt_buildeditcontrol";
$control_seg_tma["params"] = array();
$control_seg_tma["params"]["field"]="seg_tma";
$control_seg_tma["params"]["value"]=@$defvalues["seg_tma"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_seg_tma["params"]["validate"]=$arrValidate;
//	End Add validation

$control_seg_tma["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_seg_tma["params"]["mode"]="inline_add";
else
	$control_seg_tma["params"]["mode"]="add";

if(!$detailKeys || !in_array("seg_tma", $detailKeys))
	$xt->assignbyref("seg_tma_editcontrol",$control_seg_tma);
else if(array_key_exists("seg_tma", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"seg_tma", ""),"field=seg%5Ftma","",MODE_VIEW);
		$xt->assign("seg_tma_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - perc_tma
$control_perc_tma=array();
$control_perc_tma["func"]="xt_buildeditcontrol";
$control_perc_tma["params"] = array();
$control_perc_tma["params"]["field"]="perc_tma";
$control_perc_tma["params"]["value"]=@$defvalues["perc_tma"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_perc_tma["params"]["validate"]=$arrValidate;
//	End Add validation

$control_perc_tma["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_perc_tma["params"]["mode"]="inline_add";
else
	$control_perc_tma["params"]["mode"]="add";

if(!$detailKeys || !in_array("perc_tma", $detailKeys))
	$xt->assignbyref("perc_tma_editcontrol",$control_perc_tma);
else if(array_key_exists("perc_tma", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"perc_tma", ""),"field=perc%5Ftma","",MODE_VIEW);
		$xt->assign("perc_tma_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - seg_tme
$control_seg_tme=array();
$control_seg_tme["func"]="xt_buildeditcontrol";
$control_seg_tme["params"] = array();
$control_seg_tme["params"]["field"]="seg_tme";
$control_seg_tme["params"]["value"]=@$defvalues["seg_tme"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_seg_tme["params"]["validate"]=$arrValidate;
//	End Add validation

$control_seg_tme["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_seg_tme["params"]["mode"]="inline_add";
else
	$control_seg_tme["params"]["mode"]="add";

if(!$detailKeys || !in_array("seg_tme", $detailKeys))
	$xt->assignbyref("seg_tme_editcontrol",$control_seg_tme);
else if(array_key_exists("seg_tme", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"seg_tme", ""),"field=seg%5Ftme","",MODE_VIEW);
		$xt->assign("seg_tme_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - perc_tme
$control_perc_tme=array();
$control_perc_tme["func"]="xt_buildeditcontrol";
$control_perc_tme["params"] = array();
$control_perc_tme["params"]["field"]="perc_tme";
$control_perc_tme["params"]["value"]=@$defvalues["perc_tme"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_perc_tme["params"]["validate"]=$arrValidate;
//	End Add validation

$control_perc_tme["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_perc_tme["params"]["mode"]="inline_add";
else
	$control_perc_tme["params"]["mode"]="add";

if(!$detailKeys || !in_array("perc_tme", $detailKeys))
	$xt->assignbyref("perc_tme_editcontrol",$control_perc_tme);
else if(array_key_exists("perc_tme", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"perc_tme", ""),"field=perc%5Ftme","",MODE_VIEW);
		$xt->assign("perc_tme_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - tx_abandono
$control_tx_abandono=array();
$control_tx_abandono["func"]="xt_buildeditcontrol";
$control_tx_abandono["params"] = array();
$control_tx_abandono["params"]["field"]="tx_abandono";
$control_tx_abandono["params"]["value"]=@$defvalues["tx_abandono"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_tx_abandono["params"]["validate"]=$arrValidate;
//	End Add validation

$control_tx_abandono["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_tx_abandono["params"]["mode"]="inline_add";
else
	$control_tx_abandono["params"]["mode"]="add";

if(!$detailKeys || !in_array("tx_abandono", $detailKeys))
	$xt->assignbyref("tx_abandono_editcontrol",$control_tx_abandono);
else if(array_key_exists("tx_abandono", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"tx_abandono", ""),"field=tx%5Fabandono","",MODE_VIEW);
		$xt->assign("tx_abandono_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_estim_do_dia
$control_flg_estim_do_dia=array();
$control_flg_estim_do_dia["func"]="xt_buildeditcontrol";
$control_flg_estim_do_dia["params"] = array();
$control_flg_estim_do_dia["params"]["field"]="flg_estim_do_dia";
$control_flg_estim_do_dia["params"]["value"]=@$defvalues["flg_estim_do_dia"];

//	Begin Add validation
$arrValidate = array();	
$control_flg_estim_do_dia["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_estim_do_dia["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_estim_do_dia["params"]["mode"]="inline_add";
else
	$control_flg_estim_do_dia["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_estim_do_dia", $detailKeys))
	$xt->assignbyref("flg_estim_do_dia_editcontrol",$control_flg_estim_do_dia);
else if(array_key_exists("flg_estim_do_dia", $defvalues))
{
				$value = GetData($defvalues,"flg_estim_do_dia", "Checkbox");
		$xt->assign("flg_estim_do_dia_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - tp_estimativa
$control_tp_estimativa=array();
$control_tp_estimativa["func"]="xt_buildeditcontrol";
$control_tp_estimativa["params"] = array();
$control_tp_estimativa["params"]["field"]="tp_estimativa";
$control_tp_estimativa["params"]["value"]=@$defvalues["tp_estimativa"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_tp_estimativa["params"]["validate"]=$arrValidate;
//	End Add validation

$control_tp_estimativa["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_tp_estimativa["params"]["mode"]="inline_add";
else
	$control_tp_estimativa["params"]["mode"]="add";

if(!$detailKeys || !in_array("tp_estimativa", $detailKeys))
	$xt->assignbyref("tp_estimativa_editcontrol",$control_tp_estimativa);
else if(array_key_exists("tp_estimativa", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"tp_estimativa", ""),"field=tp%5Festimativa","",MODE_VIEW);
		$xt->assign("tp_estimativa_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - id_name_gestor
$control_id_name_gestor=array();
$control_id_name_gestor["func"]="xt_buildeditcontrol";
$control_id_name_gestor["params"] = array();
$control_id_name_gestor["params"]["field"]="id_name_gestor";
$control_id_name_gestor["params"]["value"]=@$defvalues["id_name_gestor"];

//	Begin Add validation
$arrValidate = array();	
$control_id_name_gestor["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_name_gestor["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_name_gestor["params"]["mode"]="inline_add";
else
	$control_id_name_gestor["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_name_gestor", $detailKeys))
	$xt->assignbyref("id_name_gestor_editcontrol",$control_id_name_gestor);
else if(array_key_exists("id_name_gestor", $defvalues))
{
				$value=DisplayLookupWizard("id_name_gestor",$defvalues["id_name_gestor"],$defvalues,"",MODE_VIEW);
		$xt->assign("id_name_gestor_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - maxlen
$control_maxlen=array();
$control_maxlen["func"]="xt_buildeditcontrol";
$control_maxlen["params"] = array();
$control_maxlen["params"]["field"]="maxlen";
$control_maxlen["params"]["value"]=@$defvalues["maxlen"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_maxlen["params"]["validate"]=$arrValidate;
//	End Add validation

$control_maxlen["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_maxlen["params"]["mode"]="inline_add";
else
	$control_maxlen["params"]["mode"]="add";

if(!$detailKeys || !in_array("maxlen", $detailKeys))
	$xt->assignbyref("maxlen_editcontrol",$control_maxlen);
else if(array_key_exists("maxlen", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"maxlen", ""),"field=maxlen","",MODE_VIEW);
		$xt->assign("maxlen_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - wrapuptime
$control_wrapuptime=array();
$control_wrapuptime["func"]="xt_buildeditcontrol";
$control_wrapuptime["params"] = array();
$control_wrapuptime["params"]["field"]="wrapuptime";
$control_wrapuptime["params"]["value"]=@$defvalues["wrapuptime"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_wrapuptime["params"]["validate"]=$arrValidate;
//	End Add validation

$control_wrapuptime["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_wrapuptime["params"]["mode"]="inline_add";
else
	$control_wrapuptime["params"]["mode"]="add";

if(!$detailKeys || !in_array("wrapuptime", $detailKeys))
	$xt->assignbyref("wrapuptime_editcontrol",$control_wrapuptime);
else if(array_key_exists("wrapuptime", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"wrapuptime", ""),"field=wrapuptime","",MODE_VIEW);
		$xt->assign("wrapuptime_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - nm_grupo
$control_nm_grupo=array();
$control_nm_grupo["func"]="xt_buildeditcontrol";
$control_nm_grupo["params"] = array();
$control_nm_grupo["params"]["field"]="nm_grupo";
$control_nm_grupo["params"]["value"]=@$defvalues["nm_grupo"];

//	Begin Add validation
$arrValidate = array();	
$control_nm_grupo["params"]["validate"]=$arrValidate;
//	End Add validation

$control_nm_grupo["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_nm_grupo["params"]["mode"]="inline_add";
else
	$control_nm_grupo["params"]["mode"]="add";

if(!$detailKeys || !in_array("nm_grupo", $detailKeys))
	$xt->assignbyref("nm_grupo_editcontrol",$control_nm_grupo);
else if(array_key_exists("nm_grupo", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"nm_grupo", ""),"field=nm%5Fgrupo","",MODE_VIEW);
		$xt->assign("nm_grupo_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - id_logout
$control_id_logout=array();
$control_id_logout["func"]="xt_buildeditcontrol";
$control_id_logout["params"] = array();
$control_id_logout["params"]["field"]="id_logout";
$control_id_logout["params"]["value"]=@$defvalues["id_logout"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_id_logout["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_logout["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_logout["params"]["mode"]="inline_add";
else
	$control_id_logout["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_logout", $detailKeys))
	$xt->assignbyref("id_logout_editcontrol",$control_id_logout);
else if(array_key_exists("id_logout", $defvalues))
{
				$value=DisplayLookupWizard("id_logout",$defvalues["id_logout"],$defvalues,"",MODE_VIEW);
		$xt->assign("id_logout_editcontrol",$value);
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
	$strTableName = "cc_receptivo_filas";
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
