<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/troncos_variables.php");
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
$templatefile = "troncos_edit.htm";

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
$keys["id_tronco"]=postvalue("editid1");
$savedKeys["id_tronco"]=postvalue("editid1");
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
	$value = postvalue("value_dsc_tronco_".$id);
	$type=postvalue("type_dsc_tronco_".$id);
	if(FieldSubmitted("dsc_tronco_".$id))
	{
		
		$value=prepare_for_db("dsc_tronco",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dsc_tronco"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dsc_tronco"]=$value;
		
		
	}


//	processibng dsc_tronco - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_interf_".$id);
	$type=postvalue("type_id_interf_".$id);
	if(FieldSubmitted("id_interf_".$id))
	{
		
		$value=prepare_for_db("id_interf",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_interf"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_interf"]=$value;
		
		
	}


//	processibng id_interf - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_usuario_".$id);
	$type=postvalue("type_usuario_".$id);
	if(FieldSubmitted("usuario_".$id))
	{
		
		$value=prepare_for_db("usuario",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "usuario"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["usuario"]=$value;
		
		
	}


//	processibng usuario - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_senha_".$id);
	$type=postvalue("type_senha_".$id);
	if(FieldSubmitted("senha_".$id))
	{
		
		$value=prepare_for_db("senha",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "senha"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["senha"]=$value;
		
		
	}


//	processibng senha - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_ip_interf_".$id);
	$type=postvalue("type_ip_interf_".$id);
	if(FieldSubmitted("ip_interf_".$id))
	{
		
		$value=prepare_for_db("ip_interf",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ip_interf"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ip_interf"]=$value;
		
		
	}


//	processibng ip_interf - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_mcdu_inicio_".$id);
	$type=postvalue("type_mcdu_inicio_".$id);
	if(FieldSubmitted("mcdu_inicio_".$id))
	{
		
		$value=prepare_for_db("mcdu_inicio",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "mcdu_inicio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["mcdu_inicio"]=$value;
		
		
	}


//	processibng mcdu_inicio - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_mcdu_fim_".$id);
	$type=postvalue("type_mcdu_fim_".$id);
	if(FieldSubmitted("mcdu_fim_".$id))
	{
		
		$value=prepare_for_db("mcdu_fim",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "mcdu_fim"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["mcdu_fim"]=$value;
		
		
	}


//	processibng mcdu_fim - end
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
	$value = postvalue("value_dig_rota_".$id);
	$type=postvalue("type_dig_rota_".$id);
	if(FieldSubmitted("dig_rota_".$id))
	{
		
		$value=prepare_for_db("dig_rota",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dig_rota"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dig_rota"]=$value;
		
		
	}


//	processibng dig_rota - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_contrato_".$id);
	$type=postvalue("type_id_contrato_".$id);
	if(FieldSubmitted("id_contrato_".$id))
	{
		
		$value=prepare_for_db("id_contrato",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_contrato"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_contrato"]=$value;
		
		
	}


//	processibng id_contrato - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_grava_ent_".$id);
	$type=postvalue("type_flg_grava_ent_".$id);
	if(FieldSubmitted("flg_grava_ent_".$id))
	{
		
		$value=prepare_for_db("flg_grava_ent",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_grava_ent"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_grava_ent"]=$value;
		
		
	}


//	processibng flg_grava_ent - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_grava_sai_".$id);
	$type=postvalue("type_flg_grava_sai_".$id);
	if(FieldSubmitted("flg_grava_sai_".$id))
	{
		
		$value=prepare_for_db("flg_grava_sai",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_grava_sai"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_grava_sai"]=$value;
		
		
	}


//	processibng flg_grava_sai - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_pabx_remoto_".$id);
	$type=postvalue("type_flg_pabx_remoto_".$id);
	if(FieldSubmitted("flg_pabx_remoto_".$id))
	{
		
		$value=prepare_for_db("flg_pabx_remoto",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_pabx_remoto"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_pabx_remoto"]=$value;
		
		
	}


//	processibng flg_pabx_remoto - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_cel_local_".$id);
	$type=postvalue("type_flg_cel_local_".$id);
	if(FieldSubmitted("flg_cel_local_".$id))
	{
		
		$value=prepare_for_db("flg_cel_local",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_cel_local"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_cel_local"]=$value;
		
		
	}


//	processibng flg_cel_local - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_local_".$id);
	$type=postvalue("type_flg_local_".$id);
	if(FieldSubmitted("flg_local_".$id))
	{
		
		$value=prepare_for_db("flg_local",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_local"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_local"]=$value;
		
		
	}


//	processibng flg_local - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_fixo_ddd_".$id);
	$type=postvalue("type_flg_fixo_ddd_".$id);
	if(FieldSubmitted("flg_fixo_ddd_".$id))
	{
		
		$value=prepare_for_db("flg_fixo_ddd",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_fixo_ddd"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_fixo_ddd"]=$value;
		
		
	}


//	processibng flg_fixo_ddd - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_cel_ddd_".$id);
	$type=postvalue("type_flg_cel_ddd_".$id);
	if(FieldSubmitted("flg_cel_ddd_".$id))
	{
		
		$value=prepare_for_db("flg_cel_ddd",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_cel_ddd"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_cel_ddd"]=$value;
		
		
	}


//	processibng flg_cel_ddd - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_ddi_".$id);
	$type=postvalue("type_flg_ddi_".$id);
	if(FieldSubmitted("flg_ddi_".$id))
	{
		
		$value=prepare_for_db("flg_ddi",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_ddi"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_ddi"]=$value;
		
		
	}


//	processibng flg_ddi - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_dig_operadora_".$id);
	$type=postvalue("type_dig_operadora_".$id);
	if(FieldSubmitted("dig_operadora_".$id))
	{
		
		$value=prepare_for_db("dig_operadora",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dig_operadora"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dig_operadora"]=$value;
		
		
	}


//	processibng dig_operadora - end
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
		$keyGetQ.="editid1=".rawurldecode($keys["id_tronco"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: troncos_".$pageObject->getPageType().".php?".$keyGetQ);
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
$query = $queryData_troncos->Copy();



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
		header("Location: troncos_list.php?a=return");
		exit();
	}
	else
		$data=array();
}

$readonlyfields=array();


	


//if(!$data["tp_toques"])
	$data["tp_toques"] = 15;

if($readevalues)
{
	$data["dsc_tronco"]=$evalues["dsc_tronco"];
	$data["id_interf"]=$evalues["id_interf"];
	$data["usuario"]=$evalues["usuario"];
	$data["senha"]=$evalues["senha"];
	$data["ip_interf"]=$evalues["ip_interf"];
	$data["mcdu_inicio"]=$evalues["mcdu_inicio"];
	$data["mcdu_fim"]=$evalues["mcdu_fim"];
	$data["tp_toques"]=$evalues["tp_toques"];
	$data["dig_rota"]=$evalues["dig_rota"];
	$data["id_contrato"]=$evalues["id_contrato"];
	$data["flg_grava_ent"]=$evalues["flg_grava_ent"];
	$data["flg_grava_sai"]=$evalues["flg_grava_sai"];
	$data["flg_pabx_remoto"]=$evalues["flg_pabx_remoto"];
	$data["flg_cel_local"]=$evalues["flg_cel_local"];
	$data["flg_local"]=$evalues["flg_local"];
	$data["flg_fixo_ddd"]=$evalues["flg_fixo_ddd"];
	$data["flg_cel_ddd"]=$evalues["flg_cel_ddd"];
	$data["flg_ddi"]=$evalues["flg_ddi"];
	$data["dig_operadora"]=$evalues["dig_operadora"];
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
	$xt->assign("dsc_tronco_fieldblock",true);
	$xt->assign("dsc_tronco_label",true);
	if(isEnableSection508())
		$xt->assign_section("dsc_tronco_label","<label for=\"".GetInputElementId("dsc_tronco", $id)."\">","</label>");
	$xt->assign("id_interf_fieldblock",true);
	$xt->assign("id_interf_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_interf_label","<label for=\"".GetInputElementId("id_interf", $id)."\">","</label>");
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
	$xt->assign("mcdu_inicio_fieldblock",true);
	$xt->assign("mcdu_inicio_label",true);
	if(isEnableSection508())
		$xt->assign_section("mcdu_inicio_label","<label for=\"".GetInputElementId("mcdu_inicio", $id)."\">","</label>");
	$xt->assign("mcdu_fim_fieldblock",true);
	$xt->assign("mcdu_fim_label",true);
	if(isEnableSection508())
		$xt->assign_section("mcdu_fim_label","<label for=\"".GetInputElementId("mcdu_fim", $id)."\">","</label>");
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
	
	if(strlen($onsubmit))
		$onsubmit="onSubmit=\"".htmlspecialchars($onsubmit)."\"";
	$pageObject->body["begin"] .= $includes;
	
	if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
	
	
	$hiddenKeys = '';
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid1\" value=\"".htmlspecialchars($keys["id_tronco"])."\">";
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id_tronco", "")));
	
	$xt->assign('editForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="troncos_edit.php" '.$onsubmit.'>'.
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
	
	if(GetFieldIndex("id_tronco"))
		$key[]=GetFieldIndex("id_tronco");
	
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
					$next[1]=$row_next["id_tronco"];
			}
			
			$res_prev=db_query($sql_prev,$conn);	
			if($row_prev=db_fetch_array($res_prev))
			{
					$prev[1]=$row_prev["id_tronco"];
			}
		}
	}
}
	$nextlink=$prevlink="";
	// reset button handler
	$resetEditors="";
	$unblRec="UnlockRecord('troncos_edit.php','".$skeys."','',function(){window.location.href='troncos_edit.php?";
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
	$xt->assign("backbutton_attrs","onclick=\"UnlockRecord('troncos_edit.php','".$skeys."','',function(){window.location.href='troncos_list.php?a=return'});return false;\"");
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
$showKeys[] = rawurlencode($keys["id_tronco"]);
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
//	control - dsc_tronco
$control_dsc_tronco=array();
$control_dsc_tronco["func"]="xt_buildeditcontrol";
$control_dsc_tronco["params"] = array();
$control_dsc_tronco["params"]["field"]="dsc_tronco";
$control_dsc_tronco["params"]["value"]=@$data["dsc_tronco"];
//	Begin Add validation
$arrValidate = array();	

$control_dsc_tronco["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dsc_tronco["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dsc_tronco["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dsc_tronco["params"]["mode"]="inline_edit";
else
	$control_dsc_tronco["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dsc_tronco", $detailKeys))	
	$xt->assign("dsc_tronco_editcontrol",$control_dsc_tronco);
else if(array_key_exists("dsc_tronco",$data))
{
				$value = ProcessLargeText(GetData($data,"dsc_tronco", ""),"field=dsc%5Ftronco","",MODE_VIEW);
		$xt->assign("dsc_tronco_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_interf
$control_id_interf=array();
$control_id_interf["func"]="xt_buildeditcontrol";
$control_id_interf["params"] = array();
$control_id_interf["params"]["field"]="id_interf";
$control_id_interf["params"]["value"]=@$data["id_interf"];
//	Begin Add validation
$arrValidate = array();	


$control_id_interf["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_interf["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_interf["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_interf["params"]["mode"]="inline_edit";
else
	$control_id_interf["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_interf", $detailKeys))	
	$xt->assign("id_interf_editcontrol",$control_id_interf);
else if(array_key_exists("id_interf",$data))
{
				$value=DisplayLookupWizard("id_interf",$data["id_interf"],$data,"",MODE_VIEW);
		$xt->assign("id_interf_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - usuario
$control_usuario=array();
$control_usuario["func"]="xt_buildeditcontrol";
$control_usuario["params"] = array();
$control_usuario["params"]["field"]="usuario";
$control_usuario["params"]["value"]=@$data["usuario"];
//	Begin Add validation
$arrValidate = array();	

$control_usuario["params"]["validate"]=$arrValidate;
//	End Add validation
$control_usuario["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_usuario["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_usuario["params"]["mode"]="inline_edit";
else
	$control_usuario["params"]["mode"]="edit";
if(!$detailKeys || !in_array("usuario", $detailKeys))	
	$xt->assign("usuario_editcontrol",$control_usuario);
else if(array_key_exists("usuario",$data))
{
				$value = ProcessLargeText(GetData($data,"usuario", ""),"field=usuario","",MODE_VIEW);
		$xt->assign("usuario_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - senha
$control_senha=array();
$control_senha["func"]="xt_buildeditcontrol";
$control_senha["params"] = array();
$control_senha["params"]["field"]="senha";
$control_senha["params"]["value"]=@$data["senha"];
//	Begin Add validation
$arrValidate = array();	

$control_senha["params"]["validate"]=$arrValidate;
//	End Add validation
$control_senha["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_senha["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_senha["params"]["mode"]="inline_edit";
else
	$control_senha["params"]["mode"]="edit";
if(!$detailKeys || !in_array("senha", $detailKeys))	
	$xt->assign("senha_editcontrol",$control_senha);
else if(array_key_exists("senha",$data))
{
				$value = ProcessLargeText(GetData($data,"senha", ""),"field=senha","",MODE_VIEW);
		$xt->assign("senha_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ip_interf
$control_ip_interf=array();
$control_ip_interf["func"]="xt_buildeditcontrol";
$control_ip_interf["params"] = array();
$control_ip_interf["params"]["field"]="ip_interf";
$control_ip_interf["params"]["value"]=@$data["ip_interf"];
//	Begin Add validation
$arrValidate = array();	

$control_ip_interf["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ip_interf["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ip_interf["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ip_interf["params"]["mode"]="inline_edit";
else
	$control_ip_interf["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ip_interf", $detailKeys))	
	$xt->assign("ip_interf_editcontrol",$control_ip_interf);
else if(array_key_exists("ip_interf",$data))
{
				$value = ProcessLargeText(GetData($data,"ip_interf", ""),"field=ip%5Finterf","",MODE_VIEW);
		$xt->assign("ip_interf_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - mcdu_inicio
$control_mcdu_inicio=array();
$control_mcdu_inicio["func"]="xt_buildeditcontrol";
$control_mcdu_inicio["params"] = array();
$control_mcdu_inicio["params"]["field"]="mcdu_inicio";
$control_mcdu_inicio["params"]["value"]=@$data["mcdu_inicio"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_mcdu_inicio["params"]["validate"]=$arrValidate;
//	End Add validation
$control_mcdu_inicio["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_mcdu_inicio["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_mcdu_inicio["params"]["mode"]="inline_edit";
else
	$control_mcdu_inicio["params"]["mode"]="edit";
if(!$detailKeys || !in_array("mcdu_inicio", $detailKeys))	
	$xt->assign("mcdu_inicio_editcontrol",$control_mcdu_inicio);
else if(array_key_exists("mcdu_inicio",$data))
{
				$value = ProcessLargeText(GetData($data,"mcdu_inicio", ""),"field=mcdu%5Finicio","",MODE_VIEW);
		$xt->assign("mcdu_inicio_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - mcdu_fim
$control_mcdu_fim=array();
$control_mcdu_fim["func"]="xt_buildeditcontrol";
$control_mcdu_fim["params"] = array();
$control_mcdu_fim["params"]["field"]="mcdu_fim";
$control_mcdu_fim["params"]["value"]=@$data["mcdu_fim"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_mcdu_fim["params"]["validate"]=$arrValidate;
//	End Add validation
$control_mcdu_fim["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_mcdu_fim["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_mcdu_fim["params"]["mode"]="inline_edit";
else
	$control_mcdu_fim["params"]["mode"]="edit";
if(!$detailKeys || !in_array("mcdu_fim", $detailKeys))	
	$xt->assign("mcdu_fim_editcontrol",$control_mcdu_fim);
else if(array_key_exists("mcdu_fim",$data))
{
				$value = ProcessLargeText(GetData($data,"mcdu_fim", ""),"field=mcdu%5Ffim","",MODE_VIEW);
		$xt->assign("mcdu_fim_editcontrol",$value);
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
//	control - dig_rota
$control_dig_rota=array();
$control_dig_rota["func"]="xt_buildeditcontrol";
$control_dig_rota["params"] = array();
$control_dig_rota["params"]["field"]="dig_rota";
$control_dig_rota["params"]["value"]=@$data["dig_rota"];
//	Begin Add validation
$arrValidate = array();	


$control_dig_rota["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dig_rota["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dig_rota["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dig_rota["params"]["mode"]="inline_edit";
else
	$control_dig_rota["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dig_rota", $detailKeys))	
	$xt->assign("dig_rota_editcontrol",$control_dig_rota);
else if(array_key_exists("dig_rota",$data))
{
				$value = ProcessLargeText(GetData($data,"dig_rota", ""),"field=dig%5Frota","",MODE_VIEW);
		$xt->assign("dig_rota_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_contrato
$control_id_contrato=array();
$control_id_contrato["func"]="xt_buildeditcontrol";
$control_id_contrato["params"] = array();
$control_id_contrato["params"]["field"]="id_contrato";
$control_id_contrato["params"]["value"]=@$data["id_contrato"];
//	Begin Add validation
$arrValidate = array();	


$control_id_contrato["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_contrato["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_contrato["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_contrato["params"]["mode"]="inline_edit";
else
	$control_id_contrato["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_contrato", $detailKeys))	
	$xt->assign("id_contrato_editcontrol",$control_id_contrato);
else if(array_key_exists("id_contrato",$data))
{
				$value=DisplayLookupWizard("id_contrato",$data["id_contrato"],$data,"",MODE_VIEW);
		$xt->assign("id_contrato_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_grava_ent
$control_flg_grava_ent=array();
$control_flg_grava_ent["func"]="xt_buildeditcontrol";
$control_flg_grava_ent["params"] = array();
$control_flg_grava_ent["params"]["field"]="flg_grava_ent";
$control_flg_grava_ent["params"]["value"]=@$data["flg_grava_ent"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_grava_ent["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_grava_ent["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_grava_ent["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_grava_ent["params"]["mode"]="inline_edit";
else
	$control_flg_grava_ent["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_grava_ent", $detailKeys))	
	$xt->assign("flg_grava_ent_editcontrol",$control_flg_grava_ent);
else if(array_key_exists("flg_grava_ent",$data))
{
				$value = GetData($data,"flg_grava_ent", "Checkbox");
		$xt->assign("flg_grava_ent_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_grava_sai
$control_flg_grava_sai=array();
$control_flg_grava_sai["func"]="xt_buildeditcontrol";
$control_flg_grava_sai["params"] = array();
$control_flg_grava_sai["params"]["field"]="flg_grava_sai";
$control_flg_grava_sai["params"]["value"]=@$data["flg_grava_sai"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_grava_sai["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_grava_sai["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_grava_sai["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_grava_sai["params"]["mode"]="inline_edit";
else
	$control_flg_grava_sai["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_grava_sai", $detailKeys))	
	$xt->assign("flg_grava_sai_editcontrol",$control_flg_grava_sai);
else if(array_key_exists("flg_grava_sai",$data))
{
				$value = GetData($data,"flg_grava_sai", "Checkbox");
		$xt->assign("flg_grava_sai_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_pabx_remoto
$control_flg_pabx_remoto=array();
$control_flg_pabx_remoto["func"]="xt_buildeditcontrol";
$control_flg_pabx_remoto["params"] = array();
$control_flg_pabx_remoto["params"]["field"]="flg_pabx_remoto";
$control_flg_pabx_remoto["params"]["value"]=@$data["flg_pabx_remoto"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_pabx_remoto["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_pabx_remoto["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_pabx_remoto["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_pabx_remoto["params"]["mode"]="inline_edit";
else
	$control_flg_pabx_remoto["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_pabx_remoto", $detailKeys))	
	$xt->assign("flg_pabx_remoto_editcontrol",$control_flg_pabx_remoto);
else if(array_key_exists("flg_pabx_remoto",$data))
{
				$value = GetData($data,"flg_pabx_remoto", "Checkbox");
		$xt->assign("flg_pabx_remoto_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_cel_local
$control_flg_cel_local=array();
$control_flg_cel_local["func"]="xt_buildeditcontrol";
$control_flg_cel_local["params"] = array();
$control_flg_cel_local["params"]["field"]="flg_cel_local";
$control_flg_cel_local["params"]["value"]=@$data["flg_cel_local"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_cel_local["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_cel_local["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_cel_local["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_cel_local["params"]["mode"]="inline_edit";
else
	$control_flg_cel_local["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_cel_local", $detailKeys))	
	$xt->assign("flg_cel_local_editcontrol",$control_flg_cel_local);
else if(array_key_exists("flg_cel_local",$data))
{
				$value = GetData($data,"flg_cel_local", "Checkbox");
		$xt->assign("flg_cel_local_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_local
$control_flg_local=array();
$control_flg_local["func"]="xt_buildeditcontrol";
$control_flg_local["params"] = array();
$control_flg_local["params"]["field"]="flg_local";
$control_flg_local["params"]["value"]=@$data["flg_local"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_local["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_local["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_local["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_local["params"]["mode"]="inline_edit";
else
	$control_flg_local["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_local", $detailKeys))	
	$xt->assign("flg_local_editcontrol",$control_flg_local);
else if(array_key_exists("flg_local",$data))
{
				$value = GetData($data,"flg_local", "Checkbox");
		$xt->assign("flg_local_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_fixo_ddd
$control_flg_fixo_ddd=array();
$control_flg_fixo_ddd["func"]="xt_buildeditcontrol";
$control_flg_fixo_ddd["params"] = array();
$control_flg_fixo_ddd["params"]["field"]="flg_fixo_ddd";
$control_flg_fixo_ddd["params"]["value"]=@$data["flg_fixo_ddd"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_fixo_ddd["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_fixo_ddd["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_fixo_ddd["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_fixo_ddd["params"]["mode"]="inline_edit";
else
	$control_flg_fixo_ddd["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_fixo_ddd", $detailKeys))	
	$xt->assign("flg_fixo_ddd_editcontrol",$control_flg_fixo_ddd);
else if(array_key_exists("flg_fixo_ddd",$data))
{
				$value = GetData($data,"flg_fixo_ddd", "Checkbox");
		$xt->assign("flg_fixo_ddd_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_cel_ddd
$control_flg_cel_ddd=array();
$control_flg_cel_ddd["func"]="xt_buildeditcontrol";
$control_flg_cel_ddd["params"] = array();
$control_flg_cel_ddd["params"]["field"]="flg_cel_ddd";
$control_flg_cel_ddd["params"]["value"]=@$data["flg_cel_ddd"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_cel_ddd["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_cel_ddd["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_cel_ddd["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_cel_ddd["params"]["mode"]="inline_edit";
else
	$control_flg_cel_ddd["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_cel_ddd", $detailKeys))	
	$xt->assign("flg_cel_ddd_editcontrol",$control_flg_cel_ddd);
else if(array_key_exists("flg_cel_ddd",$data))
{
				$value = GetData($data,"flg_cel_ddd", "Checkbox");
		$xt->assign("flg_cel_ddd_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_ddi
$control_flg_ddi=array();
$control_flg_ddi["func"]="xt_buildeditcontrol";
$control_flg_ddi["params"] = array();
$control_flg_ddi["params"]["field"]="flg_ddi";
$control_flg_ddi["params"]["value"]=@$data["flg_ddi"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_ddi["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_ddi["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_ddi["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_ddi["params"]["mode"]="inline_edit";
else
	$control_flg_ddi["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_ddi", $detailKeys))	
	$xt->assign("flg_ddi_editcontrol",$control_flg_ddi);
else if(array_key_exists("flg_ddi",$data))
{
				$value = GetData($data,"flg_ddi", "Checkbox");
		$xt->assign("flg_ddi_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - dig_operadora
$control_dig_operadora=array();
$control_dig_operadora["func"]="xt_buildeditcontrol";
$control_dig_operadora["params"] = array();
$control_dig_operadora["params"]["field"]="dig_operadora";
$control_dig_operadora["params"]["value"]=@$data["dig_operadora"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_dig_operadora["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dig_operadora["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dig_operadora["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dig_operadora["params"]["mode"]="inline_edit";
else
	$control_dig_operadora["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dig_operadora", $detailKeys))	
	$xt->assign("dig_operadora_editcontrol",$control_dig_operadora);
else if(array_key_exists("dig_operadora",$data))
{
				$value = ProcessLargeText(GetData($data,"dig_operadora", ""),"field=dig%5Foperadora","",MODE_VIEW);
		$xt->assign("dig_operadora_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();


if($lockingObj && $enableCtrlsForEditing)
	$pageObject->AddJSCode("window.timeid".$id."=setInterval( function() {ConfirmLock('troncos_edit.php','".jsreplace($strTableName)."','".$skeys."',".$id.",'".$inlineedit."');},".($lockingObj->ConfirmTime*1000).");");

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
			$strTableName = "troncos";		
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
	$strTableName = "troncos";		
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

$pageObject->xt->assign("legendBreak", '<br/>');




/////////////////////////////////////////////////////////////
//display the page
/////////////////////////////////////////////////////////////
if(function_exists("BeforeShowEdit"))
	BeforeShowEdit($xt,$templatefile);

$xt->display($templatefile);

?>
