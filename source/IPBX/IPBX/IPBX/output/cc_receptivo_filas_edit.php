<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/cc_receptivo_filas_variables.php");
include('include/xtempl.php');
include('classes/runnerpage.php');
include("classes/searchclause.php");

add_nocache_headers();

/////////////////////////////////////////////////////////////
//	check if logged in
/////////////////////////////////////////////////////////////
if(!@$_SESSION["UserID"] || !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Edit"))
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}

$auditObj = GetAuditObject($strTableName);
$lockingObj = GetLockingObject($strTableName);
if($lockingObj)
{
	$system_attrs = "style='visibility:hidden;'";
	$system_message = "";
}

if($_REQUEST["action"]!="")
{
	if($lockingObj)
	{
		$arrkeys = explode("&",refine($_REQUEST["keys"]));
		foreach($arrkeys as $ind=>$val)
		{
			$arrkeys[$ind]=urldecode($val);
		}
		if($_REQUEST["action"]=="unlock")
		{
			$lockingObj->UnlockRecord($strTableName,$arrkeys,$_REQUEST["sid"]);
			exit();	
		}
		else if($_REQUEST["action"]=="lockadmin" && (IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP))
		{
			$lockingObj->UnlockAdmin($strTableName,$arrkeys,$_REQUEST["startEdit"]=="yes");
			if($_REQUEST["startEdit"]=="no")
				echo "unlock";
			else if($_REQUEST["startEdit"]=="yes")
				echo "lock";
			exit();	
		}
		else if($_REQUEST["action"]=="confirm")
		{
			if(!$lockingObj->ConfirmLock($strTableName,$arrkeys,$message));
				echo $message;
			exit();	
		}
	}
	else
	{
		exit();
	}
}

/////////////////////////////////////////////////////////////
//init variables
/////////////////////////////////////////////////////////////

$filename = "";
$status = "";
$message = "";
$mesClass = "";
$usermessage = "";
$error_happened = false;
$readevalues = false;
$bodyonload = "";
$key = array();
$next = array();
$prev = array();


$showKeys = array();
$showValues = array();
$showRawValues = array();
$showFields = array();
$showDetailKeys = array();
$IsSaved = false;
$HaveData = true;

$strWhereClause = "";
	
$inlineedit = (postvalue("editType")=="inline") ? true : false;
$templatefile = "cc_receptivo_filas_edit.htm";

//Get detail table keys	
$detailKeys = array();
$detailKeys = GetDetailKeysByMasterTable($_SESSION[$strTableName."_mastertable"], $strTableName);	

$xt = new Xtempl();

// SearchClause class stuff
if (isset($_SESSION[$strTableName.'_advsearch']))
	$searchClauseObj = unserialize($_SESSION[$strTableName.'_advsearch']);
else
{
	$allSearchFields = GetTableData($strTableName, '.allSearchFields', array());
	$searchClauseObj = new SearchClause($strTableName, $allSearchFields, $strTableName);
}
$searchClauseObj->parseRequest();
$_SESSION[$strTableName.'_advsearch'] = serialize($searchClauseObj);

if(postvalue("recordID"))
	$id = postvalue("recordID");
else 
{
	$id=postvalue("id");
	if(intval($id)==0)
		$id = 1;
}

// assign an id		
$xt->assign("id",$id);
$formname="editform".$id;

//array of params for classes
$params = array("pageType" => PAGE_EDIT,"id" => $id,"mode" => $inlineedit);
$enableCtrlsForEditing = true;

$params['tName'] = $strTableName;
$params['xt'] = &$xt;
$params['includes_js']=$includes_js;
$params['includes_jsreq']=$includes_jsreq;
$params['includes_css']=$includes_css;
$params['locale_info']=$locale_info;

$pageObject = new RunnerPage($params);

$isCaptchaOk=1;
// proccess captcha
if (!$inlineedit)
{
	
}
// end proccess captcha


// add onload event
$onLoadJsCode = GetTableData($pageObject->tName, ".jsOnloadEdit", '');
$pageObject->addOnLoadJsEvent($onLoadJsCode);


if (!$inlineedit)
{
	// add button events if exist
	$buttonHandlers = GetTableData($pageObject->tName, ".buttonHandlers_".$pageObject->getPageType(), array());
	$pageObject->addButtonHandlers($buttonHandlers);
}

$url_page=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1,12);

//	Before Process event
if(function_exists("BeforeProcessEdit"))
	BeforeProcessEdit($conn);

$keys=array();
$savedKeys=array();
$skeys="";
$keys["id_filas"]=postvalue("editid1");
$savedKeys["id_filas"]=postvalue("editid1");
$skeys.=rawurlencode(postvalue("editid1"))."&";
if($skeys!="")
	$skeys=substr($skeys,0,-1);
	
$isShowDetailTables = displayDetailsOn($strTableName,PAGE_EDIT);	
$dpParams = array();
if($isShowDetailTables && !$inlineedit)
{
	$ids = $id;
	$pageObject->AddJSCode("window.dpObj = new dpInlineOnAddEdit({
			'mTableName':'".jsreplace($strTableName)."',
			'mForm':$('#".$formname."'),
			'mPageType':'".PAGE_EDIT."',
			'dMessages':'',
			'dCaptions':[],			
			'dInlineObjs':[]});");		
	$pageObject->AddJSFile("include/detailspreview");
}	
	
/////////////////////////////////////////////////////////////
//	process entered data, read and save
/////////////////////////////////////////////////////////////

if(@$_POST["a"] == "edited")
{
	$strWhereClause = whereAdd($strWhereClause,KeyWhere($keys));
		if(function_exists("AfterEdit") || function_exists("BeforeEdit") || $auditObj)
	{
		//	read old values
		$rsold=db_query(gSQLWhere($strWhereClause), $conn);
		$dataold=db_fetch_array($rsold);
	}
	$evalues=array();
	$efilename_values=array();
	$files_delete=array();
	$files_move=array();
	$files_save=array();
	$blobfields=array();

	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_nm_fila_".$id);
	$type=postvalue("type_nm_fila_".$id);
	if(FieldSubmitted("nm_fila_".$id))
	{
		
		$value=prepare_for_db("nm_fila",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "nm_fila"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["nm_fila"]=$value;
		
		
	}


//	processibng nm_fila - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_estrategia_".$id);
	$type=postvalue("type_estrategia_".$id);
	if(FieldSubmitted("estrategia_".$id))
	{
		
		$value=prepare_for_db("estrategia",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "estrategia"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["estrategia"]=$value;
		
		
	}


//	processibng estrategia - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_gravacao_".$id);
	$type=postvalue("type_gravacao_".$id);
	if(FieldSubmitted("gravacao_".$id))
	{
		
		$value=prepare_for_db("gravacao",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "gravacao"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["gravacao"]=$value;
		
		
	}


//	processibng gravacao - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_arq_audio_".$id);
	$type=postvalue("type_arq_audio_".$id);
	if(FieldSubmitted("arq_audio_".$id))
	{
		
			$fileNameForPrepareFunc = postvalue("filename_arq_audio_".$id);
		if($fileNameForPrepareFunc)
			$value = $fileNameForPrepareFunc;
		if(substr($type,0,4)=="file")
		{		
			$value = prepare_file($value,"arq_audio",$type,$fileNameForPrepareFunc ,$id);
		}
		else if(substr($type,0,6)=="upload")
		{		
			$value=prepare_upload("arq_audio",$type,$fileNameForPrepareFunc,$value,"" ,$id);
		}
			
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "arq_audio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["arq_audio"]=$value;
		
		
	}


//	processibng arq_audio - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_arq_mesg_".$id);
	$type=postvalue("type_arq_mesg_".$id);
	if(FieldSubmitted("arq_mesg_".$id))
	{
		
			$fileNameForPrepareFunc = postvalue("filename_arq_mesg_".$id);
		if($fileNameForPrepareFunc)
			$value = $fileNameForPrepareFunc;
		if(substr($type,0,4)=="file")
		{		
			$value = prepare_file($value,"arq_mesg",$type,$fileNameForPrepareFunc ,$id);
		}
		else if(substr($type,0,6)=="upload")
		{		
			$value=prepare_upload("arq_mesg",$type,$fileNameForPrepareFunc,$value,"" ,$id);
		}
			
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "arq_mesg"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["arq_mesg"]=$value;
		
		
	}


//	processibng arq_mesg - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_tp_toques_".$id);
	$type=postvalue("type_tp_toques_".$id);
	if(FieldSubmitted("tp_toques_".$id))
	{
		
		$value=prepare_for_db("tp_toques",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "tp_toques"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["tp_toques"]=$value;
		
		
	}


//	processibng tp_toques - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_desvio_".$id);
	$type=postvalue("type_id_desvio_".$id);
	if(FieldSubmitted("id_desvio_".$id))
	{
		
		$value=prepare_for_db("id_desvio",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_desvio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_desvio"]=$value;
		
		
	}


//	processibng id_desvio - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_tp_excedido_".$id);
	$type=postvalue("type_tp_excedido_".$id);
	if(FieldSubmitted("tp_excedido_".$id))
	{
		
		$value=prepare_for_db("tp_excedido",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "tp_excedido"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["tp_excedido"]=$value;
		
		
	}


//	processibng tp_excedido - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_acao_falta_agente_".$id);
	$type=postvalue("type_acao_falta_agente_".$id);
	if(FieldSubmitted("acao_falta_agente_".$id))
	{
		
		$value=prepare_for_db("acao_falta_agente",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "acao_falta_agente"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["acao_falta_agente"]=$value;
		
		
	}


//	processibng acao_falta_agente - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_acao_tp_excedido_".$id);
	$type=postvalue("type_acao_tp_excedido_".$id);
	if(FieldSubmitted("acao_tp_excedido_".$id))
	{
		
		$value=prepare_for_db("acao_tp_excedido",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "acao_tp_excedido"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["acao_tp_excedido"]=$value;
		
		
	}


//	processibng acao_tp_excedido - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_acao_fr_horario_".$id);
	$type=postvalue("type_acao_fr_horario_".$id);
	if(FieldSubmitted("acao_fr_horario_".$id))
	{
		
		$value=prepare_for_db("acao_fr_horario",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "acao_fr_horario"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["acao_fr_horario"]=$value;
		
		
	}


//	processibng acao_fr_horario - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_seg_tmo_".$id);
	$type=postvalue("type_seg_tmo_".$id);
	if(FieldSubmitted("seg_tmo_".$id))
	{
		
		$value=prepare_for_db("seg_tmo",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "seg_tmo"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["seg_tmo"]=$value;
		
		
	}


//	processibng seg_tmo - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_perc_tmo_".$id);
	$type=postvalue("type_perc_tmo_".$id);
	if(FieldSubmitted("perc_tmo_".$id))
	{
		
		$value=prepare_for_db("perc_tmo",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "perc_tmo"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["perc_tmo"]=$value;
		
		
	}


//	processibng perc_tmo - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_seg_tma_".$id);
	$type=postvalue("type_seg_tma_".$id);
	if(FieldSubmitted("seg_tma_".$id))
	{
		
		$value=prepare_for_db("seg_tma",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "seg_tma"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["seg_tma"]=$value;
		
		
	}


//	processibng seg_tma - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_perc_tma_".$id);
	$type=postvalue("type_perc_tma_".$id);
	if(FieldSubmitted("perc_tma_".$id))
	{
		
		$value=prepare_for_db("perc_tma",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "perc_tma"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["perc_tma"]=$value;
		
		
	}


//	processibng perc_tma - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_seg_tme_".$id);
	$type=postvalue("type_seg_tme_".$id);
	if(FieldSubmitted("seg_tme_".$id))
	{
		
		$value=prepare_for_db("seg_tme",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "seg_tme"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["seg_tme"]=$value;
		
		
	}


//	processibng seg_tme - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_perc_tme_".$id);
	$type=postvalue("type_perc_tme_".$id);
	if(FieldSubmitted("perc_tme_".$id))
	{
		
		$value=prepare_for_db("perc_tme",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "perc_tme"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["perc_tme"]=$value;
		
		
	}


//	processibng perc_tme - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_tx_abandono_".$id);
	$type=postvalue("type_tx_abandono_".$id);
	if(FieldSubmitted("tx_abandono_".$id))
	{
		
		$value=prepare_for_db("tx_abandono",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "tx_abandono"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["tx_abandono"]=$value;
		
		
	}


//	processibng tx_abandono - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_estim_do_dia_".$id);
	$type=postvalue("type_flg_estim_do_dia_".$id);
	if(FieldSubmitted("flg_estim_do_dia_".$id))
	{
		
		$value=prepare_for_db("flg_estim_do_dia",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_estim_do_dia"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_estim_do_dia"]=$value;
		
		
	}


//	processibng flg_estim_do_dia - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_tp_estimativa_".$id);
	$type=postvalue("type_tp_estimativa_".$id);
	if(FieldSubmitted("tp_estimativa_".$id))
	{
		
		$value=prepare_for_db("tp_estimativa",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "tp_estimativa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["tp_estimativa"]=$value;
		
		
	}


//	processibng tp_estimativa - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_name_gestor_".$id);
	$type=postvalue("type_id_name_gestor_".$id);
	if(FieldSubmitted("id_name_gestor_".$id))
	{
		
		$value=prepare_for_db("id_name_gestor",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_name_gestor"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_name_gestor"]=$value;
		
		
	}


//	processibng id_name_gestor - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_maxlen_".$id);
	$type=postvalue("type_maxlen_".$id);
	if(FieldSubmitted("maxlen_".$id))
	{
		
		$value=prepare_for_db("maxlen",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "maxlen"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["maxlen"]=$value;
		
		
	}


//	processibng maxlen - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_wrapuptime_".$id);
	$type=postvalue("type_wrapuptime_".$id);
	if(FieldSubmitted("wrapuptime_".$id))
	{
		
		$value=prepare_for_db("wrapuptime",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "wrapuptime"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["wrapuptime"]=$value;
		
		
	}


//	processibng wrapuptime - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_nm_grupo_".$id);
	$type=postvalue("type_nm_grupo_".$id);
	if(FieldSubmitted("nm_grupo_".$id))
	{
		
		$value=prepare_for_db("nm_grupo",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "nm_grupo"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["nm_grupo"]=$value;
		
		
	}


//	processibng nm_grupo - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_logout_".$id);
	$type=postvalue("type_id_logout_".$id);
	if(FieldSubmitted("id_logout_".$id))
	{
		
		$value=prepare_for_db("id_logout",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_logout"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_logout"]=$value;
		
		
	}


//	processibng id_logout - end
	}

	foreach($efilename_values as $ekey=>$value)
	{
		$evalues[$ekey]=$value;
	}
	
	if($lockingObj )
	{
		$lockmessage="";
		if(!$lockingObj->ConfirmLock($strTableName,$savedKeys,$lockmessage))
		{
			$enableCtrlsForEditing = false;
			$system_attrs = "style='visibility:visible;'";
			if($inlineedit)
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					echo $lockingObj->GetLockInfo($strTableName,$savedKeys,false,$id);
				else
					echo $lockmessage;
				exit();
			}
			else
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					$system_message = $lockingObj->GetLockInfo($strTableName,$savedKeys,true,$id);
				else
					$system_message = $lockmessage;
			}
			$status="DECLINED";
			$readevalues=true;
		}
	}
	
	if($readevalues==false)
	{
	//	do event
		$retval=true;
		if(function_exists("BeforeEdit"))
		{
			$retval=BeforeEdit($evalues,$strWhereClause,$dataold,$keys,$usermessage,$inlineedit);
		}
		if($retval && $isCaptchaOk == 1)
		{		
			if(DoUpdateRecord($strOriginalTableName,$evalues,$blobfields,$strWhereClause,$id))
			{
				$IsSaved=true;
				
				//	after edit event
				if($lockingObj && $inlineedit)
				{
					$lockingObj->UnlockRecord($strTableName,$savedKeys,"");
				}
				if($auditObj || function_exists("AfterEdit"))
				{
					foreach($dataold as $idx=>$val)
					{
						if(!array_key_exists($idx,$evalues))
						{
							$evalues[$idx]=$val;
						}
					}
				}

				if($auditObj)
				{
					$auditObj->LogEdit($strTableName,$evalues,$dataold,$keys);
				}
				if(function_exists("AfterEdit"))
				{
					AfterEdit($evalues,KeyWhere($keys),$dataold,$keys,$inlineedit);
				}
				
				if(!$inlineedit)
				{	
					$_SESSION[$strTableName."_count_captcha"] = $_SESSION[$strTableName."_count_captcha"]+1;
					$mesClass = "mes_ok";	
				}
			}
			elseif(!$inlineedit)
				$mesClass = "mes_not";	
		}
		else
		{
			$readevalues=true;
			$message = $usermessage;
			$status="DECLINED";
		}
	}
	if($readevalues)
		$keys=$savedKeys;
}
//else
{
	/////////////////////////
	//Locking recors
	/////////////////////////

	if($lockingObj)
	{
		$enableCtrlsForEditing = $lockingObj->LockRecord($strTableName,$keys);
		if(!$enableCtrlsForEditing)
		{
			if($inlineedit)
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					echo "lock ".$lockingObj->GetLockInfo($strTableName,$keys,false,$id);
				else
					echo "lock ".$lockingObj->LockUser;
				exit();
			}
			$system_attrs = "style='visibility:visible;'";

			$system_message = $lockingObj->LockUser;
			
			if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
			{
				$rb = $lockingObj->GetLockInfo($strTableName,$keys,true,$id);
				if($rb!="")
				{
					$system_attrs = "style='visibility:visible;'";
					$system_message = $rb;
				}
			}
		}
	}
}

if($lockingObj && !$inlineedit)
{
	$pageObject->body["begin"] .='<div id="system_div'.$id.'" class="admin_message" '.$system_attrs.'>'.$system_message.'</div>';
}

$message = "<div class='message ".$mesClass."'>".$message."</div>";

// PRG rule, to avoid POSTDATA resend
if ($IsSaved && no_output_done() && !$inlineedit )
{
	// saving message
	$_SESSION["message"] = ($message ? $message : "");
	// key get query
	$keyGetQ = "";
		$keyGetQ.="editid1=".rawurldecode($keys["id_filas"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: cc_receptivo_filas_".$pageObject->getPageType().".php?".$keyGetQ);
	// turned on output buffering, so we need to stop script
	exit();
}
// for PRG rule, to avoid POSTDATA resend. Saving mess in session
if (!$inlineedit && isset($_SESSION["message"])){
	$message = $_SESSION["message"];
	unset($_SESSION["message"]);
}



/////////////////////////////////////////////////////////////
//	read current values from the database
/////////////////////////////////////////////////////////////
$query = $queryData_cc_receptivo_filas->Copy();



$strWhereClause = KeyWhere($keys);


$searchWhereClause = $searchClauseObj->getWhere(GetListOfFieldsByExprType(false));
$searchHavingClause = $searchClauseObj->getWhere(GetListOfFieldsByExprType(true));

$strWhereClause = whereAdd($strWhereClause,$searchWhereClause);
$strHavingClause = $searchHavingClause;

$strSQL = gSQLWhere($strWhereClause,$strHavingClause);

$strSQLbak = $strSQL;
//	Before Query event
if(function_exists("BeforeQueryEdit"))
	BeforeQueryEdit($strSQL, $strWhereClause);

if($strSQLbak == $strSQL)
{
	$strSQL = gSQLWhere($strWhereClause,$strHavingClause);
}	
LogInfo($strSQL);

$rs=db_query($strSQL, $conn);
$data=db_fetch_array($rs);

if(!$data)
{
	if(!$inlineedit)
	{
		header("Location: cc_receptivo_filas_list.php?a=return");
		exit();
	}
	else
		$data=array();
}

$readonlyfields=array();


	



if($readevalues)
{
	$data["nm_fila"]=$evalues["nm_fila"];
	$data["estrategia"]=$evalues["estrategia"];
	$data["gravacao"]=$evalues["gravacao"];
	$data["tp_toques"]=$evalues["tp_toques"];
	$data["id_desvio"]=$evalues["id_desvio"];
	$data["tp_excedido"]=$evalues["tp_excedido"];
	$data["acao_falta_agente"]=$evalues["acao_falta_agente"];
	$data["acao_tp_excedido"]=$evalues["acao_tp_excedido"];
	$data["acao_fr_horario"]=$evalues["acao_fr_horario"];
	$data["seg_tmo"]=$evalues["seg_tmo"];
	$data["perc_tmo"]=$evalues["perc_tmo"];
	$data["seg_tma"]=$evalues["seg_tma"];
	$data["perc_tma"]=$evalues["perc_tma"];
	$data["seg_tme"]=$evalues["seg_tme"];
	$data["perc_tme"]=$evalues["perc_tme"];
	$data["tx_abandono"]=$evalues["tx_abandono"];
	$data["flg_estim_do_dia"]=$evalues["flg_estim_do_dia"];
	$data["tp_estimativa"]=$evalues["tp_estimativa"];
	$data["id_name_gestor"]=$evalues["id_name_gestor"];
	$data["maxlen"]=$evalues["maxlen"];
	$data["wrapuptime"]=$evalues["wrapuptime"];
	$data["nm_grupo"]=$evalues["nm_grupo"];
	$data["id_logout"]=$evalues["id_logout"];
}
/////////////////////////////////////////////////////////////
//	assign values to $xt class, prepare page for displaying
/////////////////////////////////////////////////////////////
//Basic includes js files
$includes="";
//javascript code
if (!$inlineedit)
	$pageObject->addJSCode("AddEventForControl('".jsreplace($strTableName)."', prevNextButtonHandler,".$id.");\r\n");
	
//event for onsubmit
$onsubmit = $pageObject->onSubmitForEditingPage($formname);

$pageObject->AddJSFile("include/ui");
$pageObject->AddJSFile("include/ui.core","include/ui");
$pageObject->AddJSFile("include/ui.resizable","include/ui.core");
$pageObject->AddJSFile("include/onthefly");
////////////////////// time picker
//////////////////////
$pageObject->AddJSFile("include/customlabels");
if(isset($params["calendar"]))
	$pageObject->AddJSFile("include/calendar");
	
	
if(!$inlineedit)
{
	$includes .="<script language=\"JavaScript\" src=\"include/jquery.js\"></script>\r\n";
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
	$includes.="<div id=\"search_suggest".$id."\"></div>\r\n";
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
	
	if(strlen($onsubmit))
		$onsubmit="onSubmit=\"".htmlspecialchars($onsubmit)."\"";
	$pageObject->body["begin"] .= $includes;
	
	if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
	
	
	$hiddenKeys = '';
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid1\" value=\"".htmlspecialchars($keys["id_filas"])."\">";
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id_filas", "")));
	
	$xt->assign('editForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="cc_receptivo_filas_edit.php" '.$onsubmit.'>'.
		'<input type="hidden" name="a" value="edited">'.$hiddenKeys, 'end'=>'</form>'));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
if(!@$_SESSION[$strTableName."_noNextPrev"])
{
	$where_next="";
	$where_prev="";
	$order_next="";
	$order_prev="";
	$arrFieldForSort=array();
	$arrHowFieldSort=array();
	$where=$_SESSION[$strTableName."_where"];
	
	if(GetFieldIndex("id_filas"))
		$key[]=GetFieldIndex("id_filas");
	
//if session mass sorting empty, then create it as a sheet
	if(@$_SESSION[$strTableName."_arrFieldForSort"] && @$_SESSION[$strTableName."_arrHowFieldSort"])
	{
		$arrFieldForSort=$_SESSION[$strTableName."_arrFieldForSort"];
		$arrHowFieldSort=$_SESSION[$strTableName."_arrHowFieldSort"];
		$lenArr=count($arrFieldForSort);
	}
	else
	{
		if(count($g_orderindexes))
		{
			for($i=0;$i<count($g_orderindexes);$i++)
			{
				$arrFieldForSort[]=$g_orderindexes[$i][0];
				$arrHowFieldSort[]=$g_orderindexes[$i][1];
			}
		}
		elseif($gstrOrderBy!='')
		{
			$_SESSION[$strTableName."_noNextPrev"] = 1;
		}
		
		if(count($key))
		{
			for($i=0;$i<count($key);$i++)
			{
				$idsearch=array_search($key[$i],$arrFieldForSort);
				if($idsearch===false)
				{
					$arrFieldForSort[]=$key[$i];
					$arrHowFieldSort[]="ASC";
				}
			}
		}
		
		$_SESSION[$strTableName."_arrFieldForSort"]=$arrFieldForSort;
		$_SESSION[$strTableName."_arrHowFieldSort"]=$arrHowFieldSort;
		$lenArr=count($arrFieldForSort);
	}
//if session order by empty, then create a line order		
	if(@$_SESSION[$strTableName."_order"])
	{
		$order_next=$_SESSION[$strTableName."_order"];
	}
	elseif($lenArr>0)
	{
		for($i=0;$i<$lenArr;$i++)
		{
			$order_next .=(GetFieldByIndex($arrFieldForSort[$i]) ? ($order_next!="" ? ", " : " ORDER BY ").$arrFieldForSort[$i]." ".$arrHowFieldSort[$i] : "");
		}
	}
//create a line where and order for the two queries
	if($lenArr>0 and count($key) and !$_SESSION[$strTableName."_noNextPrev"])
	{
		if($where)
			$where = "(".$where.") and ";
		$scob="";
		$flag=0;
		for($i=0;$i<$lenArr;$i++)
		{
			$fieldName=GetFieldByIndex($arrFieldForSort[$i]);
			if($fieldName)
			{
				$order_prev .=($order_prev!="" ? ", " : " ORDER BY ").$arrFieldForSort[$i].($arrHowFieldSort[$i]=="ASC" ? " DESC" : " ASC");
				$dbg=GetFullFieldName($fieldName);
				if(!is_null($data[$fieldName]))
				{
					$mdv=make_db_value($fieldName,$data[$fieldName]);
					$ga=($arrHowFieldSort[$i]=="ASC" ? ">" : "<");
					$gd=($arrHowFieldSort[$i]=="ASC" ? "<" : ">");
					$gasc=$dbg.$ga.$mdv;
					$gdesc=$dbg.$gd.$mdv;
					$gravn=($i!=$lenArr-1 ? $dbg."=".$mdv : "");
					$ganull=($ga=="<" ? " or ".$dbg." IS NULL" : "");
					$gdnull=($gd=="<" ? " or ".$dbg." IS NULL" : "");
				}
				else
				{
					$gasc=($arrHowFieldSort[$i]=="ASC" ? $dbg." IS NOT NULL" : "");
					$gdesc=($arrHowFieldSort[$i]=="ASC" ? "" : $dbg." IS NOT NULL");
					$gravn=($i!=$lenArr-1 ? $dbg." IS NULL" : "");
					$ganull=$gdnull="";
				}
				
				//create where clause for next sql
				$where_next .= ($where_next!="" ? " and (" : " (");
				if($gasc=="" && $gravn=="") 
					$where_next .= " 1=0 "; 
				else{
						if($gasc!="") 
							$where_next .= $gasc.$ganull;
						if($gasc!="" && $gravn!="")
							$where_next .= " or ";
						$where_next .= $gravn." ";
					}
				
				//create where clause for prev sql
				$where_prev .= ($where_prev!="" ? " and (" : " (");
				if($gdesc=="" && $gravn=="") 
					$where_prev .= " 1=0 ";
				else{
						
						if($gdesc!="")
							$where_prev .= $gdesc.$gdnull;
						if($gdesc!="" && $gravn!="") 
							$where_prev .= " or ";
						$where_prev .= $gravn." ";
					}
				$scob .=")";
			}
			else 
				$flag=1;
		}
		$where_next =$where_next.$scob;
		$where_prev =$where_prev.$scob;
		$where_next=whereAdd($where_next,SecuritySQL("Edit"));
		$where_prev=whereAdd($where_prev,SecuritySQL("Edit"));
		$oWhere = $query->Where();
		$where_next=whereAdd($where_next,$oWhere->toSql($query));
		$where_prev=whereAdd($where_prev,$oWhere->toSql($query));

		if($flag==1)
		{
			$order_next="";
			for($i=0;$i<$lenArr;$i++)
				$order_next .=(GetFieldByIndex($arrFieldForSort[$i]) ? ($order_next!="" ? ", " : " ORDER BY ").$arrFieldForSort[$i]." ".$arrHowFieldSort[$i] : "");
		}
		
		$query->ReplaceFieldsWithDummies(GetBinaryFieldsIndices());
		$sql_next = $query->toSql($where.$where_next, $order_next);
		$sql_prev = $query->toSql($where.$where_prev, $order_prev);
		
		if($where_next!="" and $order_next!="" and $where_prev!="" and $order_prev!="")
		{
					$sql_next.=" limit 1";
			$sql_prev.=" limit 1";
		
			$res_next=db_query($sql_next,$conn);		
			if($row_next=db_fetch_array($res_next))
			{
					$next[1]=$row_next["id_filas"];
			}
			
			$res_prev=db_query($sql_prev,$conn);	
			if($row_prev=db_fetch_array($res_prev))
			{
					$prev[1]=$row_prev["id_filas"];
			}
		}
	}
}
	$nextlink=$prevlink="";
	// reset button handler
	$resetEditors="";
	$unblRec="UnlockRecord('cc_receptivo_filas_edit.php','".$skeys."','',function(){window.location.href='cc_receptivo_filas_edit.php?";
	if(count($next))
	{
		$xt->assign("next_button",true);
				$nextlink .="editid1=".htmlspecialchars(rawurlencode($next[1]));
		$xt->assign("nextbutton_attrs","align=\"absmiddle\" onclick=\"".$unblRec.$nextlink."'});return false;\"");
		$resetEditors.="$('#next".$id."').attr('style','');$('#next".$id."').attr('disabled','');";
	}
	else 
		$xt->assign("next_button",false);
	if(count($prev))
	{
		$xt->assign("prev_button",true);
				$prevlink .="editid1=".htmlspecialchars(rawurlencode($prev[1]));
		$xt->assign("prevbutton_attrs","align=\"absmiddle\" onclick=\"".$unblRec.$prevlink."'});return false;\"");
		$resetEditors.="$('#prev".$id."').attr('style','');$('#prev".$id."').attr('disabled','');";
	}
	else 
		$xt->assign("prev_button",false);
	
	$resetEditors .= "Runner.controls.ControlManager.resetControlsForTable('".htmlspecialchars(jsreplace($strTableName))."');return false;";
	$xt->assign("resetbutton_attrs",'onclick="'.$resetEditors.'" onmouseover="this.focus();"');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//End Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
	$xt->assign("backbutton_attrs","onclick=\"UnlockRecord('cc_receptivo_filas_edit.php','".$skeys."','',function(){window.location.href='cc_receptivo_filas_list.php?a=return'});return false;\"");
	// onmouseover event, for changing focus. Needed to proper submit form
	$onmouseover = "this.focus();";
	$onmouseover = 'onmouseover="'.$onmouseover.'"';
	
	if(!$enableCtrlsForEditing)
		$xt->assign("savebutton_attrs","disabled=true style='background-color:#dcdcdc' ".$onmouseover);
	else
		$xt->assign("savebutton_attrs",$onmouseover);
	
	$xt->assign("save_button",true);
	$xt->assign("reset_button",true);
	$xt->assign("back_button",true);
}
$showKeys[] = rawurlencode($keys["id_filas"]);
if($message)
{
	$xt->assign("message_block",true);
	$xt->assign("message",$message);
}
/////////////////////////////////////////////////////////////
//process readonly and auto-update fields
/////////////////////////////////////////////////////////////
//old way to disabled button prev next
	if(!$inlineedit) 
		$pageObject->AddJSCode($bodyonload."\r\n SetToFirstControl('".$formname."');\r\n");
	
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
$control_nm_fila["params"]["value"]=@$data["nm_fila"];
//	Begin Add validation
$arrValidate = array();	

$control_nm_fila["params"]["validate"]=$arrValidate;
//	End Add validation
$control_nm_fila["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_nm_fila["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_nm_fila["params"]["mode"]="inline_edit";
else
	$control_nm_fila["params"]["mode"]="edit";
if(!$detailKeys || !in_array("nm_fila", $detailKeys))	
	$xt->assign("nm_fila_editcontrol",$control_nm_fila);
else if(array_key_exists("nm_fila",$data))
{
				$value = ProcessLargeText(GetData($data,"nm_fila", ""),"field=nm%5Ffila","",MODE_VIEW);
		$xt->assign("nm_fila_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - estrategia
$control_estrategia=array();
$control_estrategia["func"]="xt_buildeditcontrol";
$control_estrategia["params"] = array();
$control_estrategia["params"]["field"]="estrategia";
$control_estrategia["params"]["value"]=@$data["estrategia"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_estrategia["params"]["validate"]=$arrValidate;
//	End Add validation
$control_estrategia["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_estrategia["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_estrategia["params"]["mode"]="inline_edit";
else
	$control_estrategia["params"]["mode"]="edit";
if(!$detailKeys || !in_array("estrategia", $detailKeys))	
	$xt->assign("estrategia_editcontrol",$control_estrategia);
else if(array_key_exists("estrategia",$data))
{
				$value=DisplayLookupWizard("estrategia",$data["estrategia"],$data,"",MODE_VIEW);
		$xt->assign("estrategia_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - gravacao
$control_gravacao=array();
$control_gravacao["func"]="xt_buildeditcontrol";
$control_gravacao["params"] = array();
$control_gravacao["params"]["field"]="gravacao";
$control_gravacao["params"]["value"]=@$data["gravacao"];
//	Begin Add validation
$arrValidate = array();	


$control_gravacao["params"]["validate"]=$arrValidate;
//	End Add validation
$control_gravacao["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_gravacao["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_gravacao["params"]["mode"]="inline_edit";
else
	$control_gravacao["params"]["mode"]="edit";
if(!$detailKeys || !in_array("gravacao", $detailKeys))	
	$xt->assign("gravacao_editcontrol",$control_gravacao);
else if(array_key_exists("gravacao",$data))
{
				$value = GetData($data,"gravacao", "Checkbox");
		$xt->assign("gravacao_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - arq_audio
$control_arq_audio=array();
$control_arq_audio["func"]="xt_buildeditcontrol";
$control_arq_audio["params"] = array();
$control_arq_audio["params"]["field"]="arq_audio";
$control_arq_audio["params"]["value"]=@$data["arq_audio"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_arq_audio["params"]["validate"]=$arrValidate;
//	End Add validation
$control_arq_audio["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_arq_audio["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_arq_audio["params"]["mode"]="inline_edit";
else
	$control_arq_audio["params"]["mode"]="edit";
if(!$detailKeys || !in_array("arq_audio", $detailKeys))	
	$xt->assign("arq_audio_editcontrol",$control_arq_audio);
else if(array_key_exists("arq_audio",$data))
{
				$value = GetData($data,"arq_audio", "Document Download");
		$xt->assign("arq_audio_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - arq_mesg
$control_arq_mesg=array();
$control_arq_mesg["func"]="xt_buildeditcontrol";
$control_arq_mesg["params"] = array();
$control_arq_mesg["params"]["field"]="arq_mesg";
$control_arq_mesg["params"]["value"]=@$data["arq_mesg"];
//	Begin Add validation
$arrValidate = array();	

$control_arq_mesg["params"]["validate"]=$arrValidate;
//	End Add validation
$control_arq_mesg["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_arq_mesg["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_arq_mesg["params"]["mode"]="inline_edit";
else
	$control_arq_mesg["params"]["mode"]="edit";
if(!$detailKeys || !in_array("arq_mesg", $detailKeys))	
	$xt->assign("arq_mesg_editcontrol",$control_arq_mesg);
else if(array_key_exists("arq_mesg",$data))
{
				$value = GetData($data,"arq_mesg", "Document Download");
		$xt->assign("arq_mesg_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - tp_toques
$control_tp_toques=array();
$control_tp_toques["func"]="xt_buildeditcontrol";
$control_tp_toques["params"] = array();
$control_tp_toques["params"]["field"]="tp_toques";
$control_tp_toques["params"]["value"]=@$data["tp_toques"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_tp_toques["params"]["validate"]=$arrValidate;
//	End Add validation
$control_tp_toques["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_tp_toques["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_tp_toques["params"]["mode"]="inline_edit";
else
	$control_tp_toques["params"]["mode"]="edit";
if(!$detailKeys || !in_array("tp_toques", $detailKeys))	
	$xt->assign("tp_toques_editcontrol",$control_tp_toques);
else if(array_key_exists("tp_toques",$data))
{
				$value = ProcessLargeText(GetData($data,"tp_toques", ""),"field=tp%5Ftoques","",MODE_VIEW);
		$xt->assign("tp_toques_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_desvio
$control_id_desvio=array();
$control_id_desvio["func"]="xt_buildeditcontrol";
$control_id_desvio["params"] = array();
$control_id_desvio["params"]["field"]="id_desvio";
$control_id_desvio["params"]["value"]=@$data["id_desvio"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_id_desvio["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_desvio["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_desvio["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_desvio["params"]["mode"]="inline_edit";
else
	$control_id_desvio["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_desvio", $detailKeys))	
	$xt->assign("id_desvio_editcontrol",$control_id_desvio);
else if(array_key_exists("id_desvio",$data))
{
				$value=DisplayLookupWizard("id_desvio",$data["id_desvio"],$data,"",MODE_VIEW);
		$xt->assign("id_desvio_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - tp_excedido
$control_tp_excedido=array();
$control_tp_excedido["func"]="xt_buildeditcontrol";
$control_tp_excedido["params"] = array();
$control_tp_excedido["params"]["field"]="tp_excedido";
$control_tp_excedido["params"]["value"]=@$data["tp_excedido"];
//	Begin Add validation
$arrValidate = array();	


$control_tp_excedido["params"]["validate"]=$arrValidate;
//	End Add validation
$control_tp_excedido["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_tp_excedido["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_tp_excedido["params"]["mode"]="inline_edit";
else
	$control_tp_excedido["params"]["mode"]="edit";
if(!$detailKeys || !in_array("tp_excedido", $detailKeys))	
	$xt->assign("tp_excedido_editcontrol",$control_tp_excedido);
else if(array_key_exists("tp_excedido",$data))
{
				$value = ProcessLargeText(GetData($data,"tp_excedido", ""),"field=tp%5Fexcedido","",MODE_VIEW);
		$xt->assign("tp_excedido_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - acao_falta_agente
$control_acao_falta_agente=array();
$control_acao_falta_agente["func"]="xt_buildeditcontrol";
$control_acao_falta_agente["params"] = array();
$control_acao_falta_agente["params"]["field"]="acao_falta_agente";
$control_acao_falta_agente["params"]["value"]=@$data["acao_falta_agente"];
//	Begin Add validation
$arrValidate = array();	


$control_acao_falta_agente["params"]["validate"]=$arrValidate;
//	End Add validation
$control_acao_falta_agente["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_acao_falta_agente["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_acao_falta_agente["params"]["mode"]="inline_edit";
else
	$control_acao_falta_agente["params"]["mode"]="edit";
if(!$detailKeys || !in_array("acao_falta_agente", $detailKeys))	
	$xt->assign("acao_falta_agente_editcontrol",$control_acao_falta_agente);
else if(array_key_exists("acao_falta_agente",$data))
{
				$value=DisplayLookupWizard("acao_falta_agente",$data["acao_falta_agente"],$data,"",MODE_VIEW);
		$xt->assign("acao_falta_agente_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - acao_tp_excedido
$control_acao_tp_excedido=array();
$control_acao_tp_excedido["func"]="xt_buildeditcontrol";
$control_acao_tp_excedido["params"] = array();
$control_acao_tp_excedido["params"]["field"]="acao_tp_excedido";
$control_acao_tp_excedido["params"]["value"]=@$data["acao_tp_excedido"];
//	Begin Add validation
$arrValidate = array();	


$control_acao_tp_excedido["params"]["validate"]=$arrValidate;
//	End Add validation
$control_acao_tp_excedido["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_acao_tp_excedido["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_acao_tp_excedido["params"]["mode"]="inline_edit";
else
	$control_acao_tp_excedido["params"]["mode"]="edit";
if(!$detailKeys || !in_array("acao_tp_excedido", $detailKeys))	
	$xt->assign("acao_tp_excedido_editcontrol",$control_acao_tp_excedido);
else if(array_key_exists("acao_tp_excedido",$data))
{
				$value=DisplayLookupWizard("acao_tp_excedido",$data["acao_tp_excedido"],$data,"",MODE_VIEW);
		$xt->assign("acao_tp_excedido_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - acao_fr_horario
$control_acao_fr_horario=array();
$control_acao_fr_horario["func"]="xt_buildeditcontrol";
$control_acao_fr_horario["params"] = array();
$control_acao_fr_horario["params"]["field"]="acao_fr_horario";
$control_acao_fr_horario["params"]["value"]=@$data["acao_fr_horario"];
//	Begin Add validation
$arrValidate = array();	


$control_acao_fr_horario["params"]["validate"]=$arrValidate;
//	End Add validation
$control_acao_fr_horario["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_acao_fr_horario["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_acao_fr_horario["params"]["mode"]="inline_edit";
else
	$control_acao_fr_horario["params"]["mode"]="edit";
if(!$detailKeys || !in_array("acao_fr_horario", $detailKeys))	
	$xt->assign("acao_fr_horario_editcontrol",$control_acao_fr_horario);
else if(array_key_exists("acao_fr_horario",$data))
{
				$value=DisplayLookupWizard("acao_fr_horario",$data["acao_fr_horario"],$data,"",MODE_VIEW);
		$xt->assign("acao_fr_horario_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - seg_tmo
$control_seg_tmo=array();
$control_seg_tmo["func"]="xt_buildeditcontrol";
$control_seg_tmo["params"] = array();
$control_seg_tmo["params"]["field"]="seg_tmo";
$control_seg_tmo["params"]["value"]=@$data["seg_tmo"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_seg_tmo["params"]["validate"]=$arrValidate;
//	End Add validation
$control_seg_tmo["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_seg_tmo["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_seg_tmo["params"]["mode"]="inline_edit";
else
	$control_seg_tmo["params"]["mode"]="edit";
if(!$detailKeys || !in_array("seg_tmo", $detailKeys))	
	$xt->assign("seg_tmo_editcontrol",$control_seg_tmo);
else if(array_key_exists("seg_tmo",$data))
{
				$value = ProcessLargeText(GetData($data,"seg_tmo", "Number"),"field=seg%5Ftmo","",MODE_VIEW);
		$xt->assign("seg_tmo_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - perc_tmo
$control_perc_tmo=array();
$control_perc_tmo["func"]="xt_buildeditcontrol";
$control_perc_tmo["params"] = array();
$control_perc_tmo["params"]["field"]="perc_tmo";
$control_perc_tmo["params"]["value"]=@$data["perc_tmo"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_perc_tmo["params"]["validate"]=$arrValidate;
//	End Add validation
$control_perc_tmo["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_perc_tmo["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_perc_tmo["params"]["mode"]="inline_edit";
else
	$control_perc_tmo["params"]["mode"]="edit";
if(!$detailKeys || !in_array("perc_tmo", $detailKeys))	
	$xt->assign("perc_tmo_editcontrol",$control_perc_tmo);
else if(array_key_exists("perc_tmo",$data))
{
				$value = ProcessLargeText(GetData($data,"perc_tmo", "Number"),"field=perc%5Ftmo","",MODE_VIEW);
		$xt->assign("perc_tmo_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - seg_tma
$control_seg_tma=array();
$control_seg_tma["func"]="xt_buildeditcontrol";
$control_seg_tma["params"] = array();
$control_seg_tma["params"]["field"]="seg_tma";
$control_seg_tma["params"]["value"]=@$data["seg_tma"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_seg_tma["params"]["validate"]=$arrValidate;
//	End Add validation
$control_seg_tma["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_seg_tma["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_seg_tma["params"]["mode"]="inline_edit";
else
	$control_seg_tma["params"]["mode"]="edit";
if(!$detailKeys || !in_array("seg_tma", $detailKeys))	
	$xt->assign("seg_tma_editcontrol",$control_seg_tma);
else if(array_key_exists("seg_tma",$data))
{
				$value = ProcessLargeText(GetData($data,"seg_tma", ""),"field=seg%5Ftma","",MODE_VIEW);
		$xt->assign("seg_tma_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - perc_tma
$control_perc_tma=array();
$control_perc_tma["func"]="xt_buildeditcontrol";
$control_perc_tma["params"] = array();
$control_perc_tma["params"]["field"]="perc_tma";
$control_perc_tma["params"]["value"]=@$data["perc_tma"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_perc_tma["params"]["validate"]=$arrValidate;
//	End Add validation
$control_perc_tma["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_perc_tma["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_perc_tma["params"]["mode"]="inline_edit";
else
	$control_perc_tma["params"]["mode"]="edit";
if(!$detailKeys || !in_array("perc_tma", $detailKeys))	
	$xt->assign("perc_tma_editcontrol",$control_perc_tma);
else if(array_key_exists("perc_tma",$data))
{
				$value = ProcessLargeText(GetData($data,"perc_tma", ""),"field=perc%5Ftma","",MODE_VIEW);
		$xt->assign("perc_tma_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - seg_tme
$control_seg_tme=array();
$control_seg_tme["func"]="xt_buildeditcontrol";
$control_seg_tme["params"] = array();
$control_seg_tme["params"]["field"]="seg_tme";
$control_seg_tme["params"]["value"]=@$data["seg_tme"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_seg_tme["params"]["validate"]=$arrValidate;
//	End Add validation
$control_seg_tme["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_seg_tme["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_seg_tme["params"]["mode"]="inline_edit";
else
	$control_seg_tme["params"]["mode"]="edit";
if(!$detailKeys || !in_array("seg_tme", $detailKeys))	
	$xt->assign("seg_tme_editcontrol",$control_seg_tme);
else if(array_key_exists("seg_tme",$data))
{
				$value = ProcessLargeText(GetData($data,"seg_tme", ""),"field=seg%5Ftme","",MODE_VIEW);
		$xt->assign("seg_tme_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - perc_tme
$control_perc_tme=array();
$control_perc_tme["func"]="xt_buildeditcontrol";
$control_perc_tme["params"] = array();
$control_perc_tme["params"]["field"]="perc_tme";
$control_perc_tme["params"]["value"]=@$data["perc_tme"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_perc_tme["params"]["validate"]=$arrValidate;
//	End Add validation
$control_perc_tme["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_perc_tme["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_perc_tme["params"]["mode"]="inline_edit";
else
	$control_perc_tme["params"]["mode"]="edit";
if(!$detailKeys || !in_array("perc_tme", $detailKeys))	
	$xt->assign("perc_tme_editcontrol",$control_perc_tme);
else if(array_key_exists("perc_tme",$data))
{
				$value = ProcessLargeText(GetData($data,"perc_tme", ""),"field=perc%5Ftme","",MODE_VIEW);
		$xt->assign("perc_tme_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - tx_abandono
$control_tx_abandono=array();
$control_tx_abandono["func"]="xt_buildeditcontrol";
$control_tx_abandono["params"] = array();
$control_tx_abandono["params"]["field"]="tx_abandono";
$control_tx_abandono["params"]["value"]=@$data["tx_abandono"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_tx_abandono["params"]["validate"]=$arrValidate;
//	End Add validation
$control_tx_abandono["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_tx_abandono["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_tx_abandono["params"]["mode"]="inline_edit";
else
	$control_tx_abandono["params"]["mode"]="edit";
if(!$detailKeys || !in_array("tx_abandono", $detailKeys))	
	$xt->assign("tx_abandono_editcontrol",$control_tx_abandono);
else if(array_key_exists("tx_abandono",$data))
{
				$value = ProcessLargeText(GetData($data,"tx_abandono", ""),"field=tx%5Fabandono","",MODE_VIEW);
		$xt->assign("tx_abandono_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_estim_do_dia
$control_flg_estim_do_dia=array();
$control_flg_estim_do_dia["func"]="xt_buildeditcontrol";
$control_flg_estim_do_dia["params"] = array();
$control_flg_estim_do_dia["params"]["field"]="flg_estim_do_dia";
$control_flg_estim_do_dia["params"]["value"]=@$data["flg_estim_do_dia"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_estim_do_dia["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_estim_do_dia["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_estim_do_dia["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_estim_do_dia["params"]["mode"]="inline_edit";
else
	$control_flg_estim_do_dia["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_estim_do_dia", $detailKeys))	
	$xt->assign("flg_estim_do_dia_editcontrol",$control_flg_estim_do_dia);
else if(array_key_exists("flg_estim_do_dia",$data))
{
				$value = GetData($data,"flg_estim_do_dia", "Checkbox");
		$xt->assign("flg_estim_do_dia_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - tp_estimativa
$control_tp_estimativa=array();
$control_tp_estimativa["func"]="xt_buildeditcontrol";
$control_tp_estimativa["params"] = array();
$control_tp_estimativa["params"]["field"]="tp_estimativa";
$control_tp_estimativa["params"]["value"]=@$data["tp_estimativa"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_tp_estimativa["params"]["validate"]=$arrValidate;
//	End Add validation
$control_tp_estimativa["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_tp_estimativa["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_tp_estimativa["params"]["mode"]="inline_edit";
else
	$control_tp_estimativa["params"]["mode"]="edit";
if(!$detailKeys || !in_array("tp_estimativa", $detailKeys))	
	$xt->assign("tp_estimativa_editcontrol",$control_tp_estimativa);
else if(array_key_exists("tp_estimativa",$data))
{
				$value = ProcessLargeText(GetData($data,"tp_estimativa", ""),"field=tp%5Festimativa","",MODE_VIEW);
		$xt->assign("tp_estimativa_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_name_gestor
$control_id_name_gestor=array();
$control_id_name_gestor["func"]="xt_buildeditcontrol";
$control_id_name_gestor["params"] = array();
$control_id_name_gestor["params"]["field"]="id_name_gestor";
$control_id_name_gestor["params"]["value"]=@$data["id_name_gestor"];
//	Begin Add validation
$arrValidate = array();	

$control_id_name_gestor["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_name_gestor["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_name_gestor["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_name_gestor["params"]["mode"]="inline_edit";
else
	$control_id_name_gestor["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_name_gestor", $detailKeys))	
	$xt->assign("id_name_gestor_editcontrol",$control_id_name_gestor);
else if(array_key_exists("id_name_gestor",$data))
{
				$value=DisplayLookupWizard("id_name_gestor",$data["id_name_gestor"],$data,"",MODE_VIEW);
		$xt->assign("id_name_gestor_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - maxlen
$control_maxlen=array();
$control_maxlen["func"]="xt_buildeditcontrol";
$control_maxlen["params"] = array();
$control_maxlen["params"]["field"]="maxlen";
$control_maxlen["params"]["value"]=@$data["maxlen"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;

$arrValidate['basicValidate'][] = "IsRequired";

$control_maxlen["params"]["validate"]=$arrValidate;
//	End Add validation
$control_maxlen["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_maxlen["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_maxlen["params"]["mode"]="inline_edit";
else
	$control_maxlen["params"]["mode"]="edit";
if(!$detailKeys || !in_array("maxlen", $detailKeys))	
	$xt->assign("maxlen_editcontrol",$control_maxlen);
else if(array_key_exists("maxlen",$data))
{
				$value = ProcessLargeText(GetData($data,"maxlen", ""),"field=maxlen","",MODE_VIEW);
		$xt->assign("maxlen_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - wrapuptime
$control_wrapuptime=array();
$control_wrapuptime["func"]="xt_buildeditcontrol";
$control_wrapuptime["params"] = array();
$control_wrapuptime["params"]["field"]="wrapuptime";
$control_wrapuptime["params"]["value"]=@$data["wrapuptime"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;

$arrValidate['basicValidate'][] = "IsRequired";

$control_wrapuptime["params"]["validate"]=$arrValidate;
//	End Add validation
$control_wrapuptime["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_wrapuptime["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_wrapuptime["params"]["mode"]="inline_edit";
else
	$control_wrapuptime["params"]["mode"]="edit";
if(!$detailKeys || !in_array("wrapuptime", $detailKeys))	
	$xt->assign("wrapuptime_editcontrol",$control_wrapuptime);
else if(array_key_exists("wrapuptime",$data))
{
				$value = ProcessLargeText(GetData($data,"wrapuptime", ""),"field=wrapuptime","",MODE_VIEW);
		$xt->assign("wrapuptime_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - nm_grupo
$control_nm_grupo=array();
$control_nm_grupo["func"]="xt_buildeditcontrol";
$control_nm_grupo["params"] = array();
$control_nm_grupo["params"]["field"]="nm_grupo";
$control_nm_grupo["params"]["value"]=@$data["nm_grupo"];
//	Begin Add validation
$arrValidate = array();	

$control_nm_grupo["params"]["validate"]=$arrValidate;
//	End Add validation
$control_nm_grupo["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_nm_grupo["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_nm_grupo["params"]["mode"]="inline_edit";
else
	$control_nm_grupo["params"]["mode"]="edit";
if(!$detailKeys || !in_array("nm_grupo", $detailKeys))	
	$xt->assign("nm_grupo_editcontrol",$control_nm_grupo);
else if(array_key_exists("nm_grupo",$data))
{
				$value = ProcessLargeText(GetData($data,"nm_grupo", ""),"field=nm%5Fgrupo","",MODE_VIEW);
		$xt->assign("nm_grupo_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_logout
$control_id_logout=array();
$control_id_logout["func"]="xt_buildeditcontrol";
$control_id_logout["params"] = array();
$control_id_logout["params"]["field"]="id_logout";
$control_id_logout["params"]["value"]=@$data["id_logout"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_id_logout["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_logout["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_logout["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_logout["params"]["mode"]="inline_edit";
else
	$control_id_logout["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_logout", $detailKeys))	
	$xt->assign("id_logout_editcontrol",$control_id_logout);
else if(array_key_exists("id_logout",$data))
{
				$value=DisplayLookupWizard("id_logout",$data["id_logout"],$data,"",MODE_VIEW);
		$xt->assign("id_logout_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();


if($lockingObj && $enableCtrlsForEditing)
	$pageObject->AddJSCode("window.timeid".$id."=setInterval( function() {ConfirmLock('cc_receptivo_filas_edit.php','".jsreplace($strTableName)."','".$skeys."',".$id.",'".$inlineedit."');},".($lockingObj->ConfirmTime*1000).");");

/////////////////////////////////////////////////////////////
if($isShowDetailTables)
{
	$options = array();
	//array of params for classes
	$options["mode"] = LIST_DETAILS;
	$options["pageType"] = PAGE_LIST;
	$options["masterPageType"] = PAGE_EDIT;
	$options['masterTable'] = $strTableName;
	$options['firstTime'] = 1;
	
	if(count($dpParams['ids']))
	{
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
		$xt->assign("detail_tables",true);	
	}
	
	for($d=0;$d<count($dpParams['ids']);$d++)
	{
		$strTableName = $dpParams['strTableNames'][$d];
		include("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "cc_receptivo_filas";		
			continue;
		}
		$options['xt'] = new Xtempl();
		$options['id'] = $dpParams['ids'][$d];
		$mkr=1;
		foreach($mKeys[$strTableName] as $mk)
			$options['masterKeysReq'][$mkr++] = $data[$mk];

		$listPageObject = ListPage::createListPage($strTableName, $options);
		// prepare code
		$listPageObject->prepareForBuildPage();
		// show page
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

if($inlineedit)
{
	$jscode = str_replace(array("&","<",">"),array("&amp;","&lt;","&gt;"),$jscode);
	$xt->assignbyref("linkdata",$jscode);
}
else{
	$pageObject->body["end"] .= "<script>".$jscode."</script>";	
	$xt->assignbyref("body",$pageObject->body);
}

$pageObject->xt->assign("legend", true);




/////////////////////////////////////////////////////////////
//display the page
/////////////////////////////////////////////////////////////
if(function_exists("BeforeShowEdit"))
	BeforeShowEdit($xt,$templatefile);

$xt->display($templatefile);

?>
