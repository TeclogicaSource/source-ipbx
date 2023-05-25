<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/cc_receptivo_filas_atend_variables.php");
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
$templatefile = ( $inlineedit ) ? "cc_receptivo_filas_atend_inline_edit.htm" : "cc_receptivo_filas_atend_edit.htm";

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
$keys["chave"]=postvalue("editid1");
$savedKeys["chave"]=postvalue("editid1");
$skeys.=rawurlencode(postvalue("editid1"))."&";
$keys["dt_entrada"]=postvalue("editid2");
$savedKeys["dt_entrada"]=postvalue("editid2");
$skeys.=rawurlencode(postvalue("editid2"))."&";
$keys["hr_entrada"]=postvalue("editid3");
$savedKeys["hr_entrada"]=postvalue("editid3");
$skeys.=rawurlencode(postvalue("editid3"))."&";
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

	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_chave_".$id);
	$type=postvalue("type_chave_".$id);
	if(FieldSubmitted("chave_".$id))
	{
		
		$value=prepare_for_db("chave",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "chave"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["chave"]=$value;
		
		
	}

//	update key value
	if($value!==false)
	{
		$keys["chave"]=$value;
	}

//	processibng chave - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_dt_entrada_".$id);
	$type=postvalue("type_dt_entrada_".$id);
	if(FieldSubmitted("dt_entrada_".$id))
	{
		
		$value=prepare_for_db("dt_entrada",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dt_entrada"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dt_entrada"]=$value;
		
		
	}

//	update key value
	if($value!==false)
	{
		$keys["dt_entrada"]=$value;
	}

//	processibng dt_entrada - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_hr_entrada_".$id);
	$type=postvalue("type_hr_entrada_".$id);
	if(FieldSubmitted("hr_entrada_".$id))
	{
		
		$value=prepare_for_db("hr_entrada",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "hr_entrada"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["hr_entrada"]=$value;
		
		
	}

//	update key value
	if($value!==false)
	{
		$keys["hr_entrada"]=$value;
	}

//	processibng hr_entrada - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_Fila_".$id);
	$type=postvalue("type_Fila_".$id);
	if(FieldSubmitted("Fila_".$id))
	{
		
		$value=prepare_for_db("Fila",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "Fila"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["Fila"]=$value;
		
		
	}


//	processibng Fila - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_Agente_".$id);
	$type=postvalue("type_Agente_".$id);
	if(FieldSubmitted("Agente_".$id))
	{
		
		$value=prepare_for_db("Agente",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "Agente"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["Agente"]=$value;
		
		
	}


//	processibng Agente - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_hr_atendimento_".$id);
	$type=postvalue("type_hr_atendimento_".$id);
	if(FieldSubmitted("hr_atendimento_".$id))
	{
		
		$value=prepare_for_db("hr_atendimento",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "hr_atendimento"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["hr_atendimento"]=$value;
		
		
	}


//	processibng hr_atendimento - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_hr_abandono_".$id);
	$type=postvalue("type_hr_abandono_".$id);
	if(FieldSubmitted("hr_abandono_".$id))
	{
		
		$value=prepare_for_db("hr_abandono",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "hr_abandono"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["hr_abandono"]=$value;
		
		
	}


//	processibng hr_abandono - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_tp_espera_".$id);
	$type=postvalue("type_tp_espera_".$id);
	if(FieldSubmitted("tp_espera_".$id))
	{
		
		$value=prepare_for_db("tp_espera",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "tp_espera"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["tp_espera"]=$value;
		
		
	}


//	processibng tp_espera - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_tp_atendimento_".$id);
	$type=postvalue("type_tp_atendimento_".$id);
	if(FieldSubmitted("tp_atendimento_".$id))
	{
		
		$value=prepare_for_db("tp_atendimento",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "tp_atendimento"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["tp_atendimento"]=$value;
		
		
	}


//	processibng tp_atendimento - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_Telefone_".$id);
	$type=postvalue("type_Telefone_".$id);
	if(FieldSubmitted("Telefone_".$id))
	{
		
		$value=prepare_for_db("Telefone",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "Telefone"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["Telefone"]=$value;
		
		
	}


//	processibng Telefone - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_ps_entrada_".$id);
	$type=postvalue("type_ps_entrada_".$id);
	if(FieldSubmitted("ps_entrada_".$id))
	{
		
		$value=prepare_for_db("ps_entrada",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ps_entrada"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ps_entrada"]=$value;
		
		
	}


//	processibng ps_entrada - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_ps_abandono_".$id);
	$type=postvalue("type_ps_abandono_".$id);
	if(FieldSubmitted("ps_abandono_".$id))
	{
		
		$value=prepare_for_db("ps_abandono",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ps_abandono"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ps_abandono"]=$value;
		
		
	}


//	processibng ps_abandono - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_tel_trans_".$id);
	$type=postvalue("type_tel_trans_".$id);
	if(FieldSubmitted("tel_trans_".$id))
	{
		
		$value=prepare_for_db("tel_trans",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "tel_trans"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["tel_trans"]=$value;
		
		
	}


//	processibng tel_trans - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_dsl_motiv_".$id);
	$type=postvalue("type_dsl_motiv_".$id);
	if(FieldSubmitted("dsl_motiv_".$id))
	{
		
		$value=prepare_for_db("dsl_motiv",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dsl_motiv"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dsl_motiv"]=$value;
		
		
	}


//	processibng dsl_motiv - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_timeout_fila_".$id);
	$type=postvalue("type_flg_timeout_fila_".$id);
	if(FieldSubmitted("flg_timeout_fila_".$id))
	{
		
		$value=prepare_for_db("flg_timeout_fila",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_timeout_fila"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_timeout_fila"]=$value;
		
		
	}


//	processibng flg_timeout_fila - end
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
		$keyGetQ.="editid1=".rawurldecode($keys["chave"])."&";
		$keyGetQ.="editid2=".rawurldecode($keys["dt_entrada"])."&";
		$keyGetQ.="editid3=".rawurldecode($keys["hr_entrada"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: cc_receptivo_filas_atend_".$pageObject->getPageType().".php?".$keyGetQ);
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
$query = $queryData_cc_receptivo_filas_atend->Copy();



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
		header("Location: cc_receptivo_filas_atend_list.php?a=return");
		exit();
	}
	else
		$data=array();
}

$readonlyfields=array();


	



if($readevalues)
{
	$data["chave"]=$evalues["chave"];
	$data["dt_entrada"]=$evalues["dt_entrada"];
	$data["hr_entrada"]=$evalues["hr_entrada"];
	$data["Fila"]=$evalues["Fila"];
	$data["Agente"]=$evalues["Agente"];
	$data["hr_atendimento"]=$evalues["hr_atendimento"];
	$data["hr_abandono"]=$evalues["hr_abandono"];
	$data["tp_espera"]=$evalues["tp_espera"];
	$data["tp_atendimento"]=$evalues["tp_atendimento"];
	$data["Telefone"]=$evalues["Telefone"];
	$data["ps_entrada"]=$evalues["ps_entrada"];
	$data["ps_abandono"]=$evalues["ps_abandono"];
	$data["tel_trans"]=$evalues["tel_trans"];
	$data["dsl_motiv"]=$evalues["dsl_motiv"];
	$data["flg_timeout_fila"]=$evalues["flg_timeout_fila"];
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
	
	if(strlen($onsubmit))
		$onsubmit="onSubmit=\"".htmlspecialchars($onsubmit)."\"";
	$pageObject->body["begin"] .= $includes;
	
	if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
	
	
	$hiddenKeys = '';
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid1\" value=\"".htmlspecialchars($keys["chave"])."\">";
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"chave", "")));
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid2\" value=\"".htmlspecialchars($keys["dt_entrada"])."\">";
	$xt->assign("show_key2", htmlspecialchars(GetData($data,"dt_entrada", "Short Date")));
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid3\" value=\"".htmlspecialchars($keys["hr_entrada"])."\">";
	$xt->assign("show_key3", htmlspecialchars(GetData($data,"hr_entrada", "Time")));
	
	$xt->assign('editForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="cc_receptivo_filas_atend_edit.php" '.$onsubmit.'>'.
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
	
	if(GetFieldIndex("chave"))
		$key[]=GetFieldIndex("chave");
	if(GetFieldIndex("dt_entrada"))
		$key[]=GetFieldIndex("dt_entrada");
	if(GetFieldIndex("hr_entrada"))
		$key[]=GetFieldIndex("hr_entrada");
	
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
					$next[1]=$row_next["chave"];
					$next[2]=$row_next["dt_entrada"];
					$next[3]=$row_next["hr_entrada"];
			}
			
			$res_prev=db_query($sql_prev,$conn);	
			if($row_prev=db_fetch_array($res_prev))
			{
					$prev[1]=$row_prev["chave"];
					$prev[2]=$row_prev["dt_entrada"];
					$prev[3]=$row_prev["hr_entrada"];
			}
		}
	}
}
	$nextlink=$prevlink="";
	// reset button handler
	$resetEditors="";
	$unblRec="UnlockRecord('cc_receptivo_filas_atend_edit.php','".$skeys."','',function(){window.location.href='cc_receptivo_filas_atend_edit.php?";
	if(count($next))
	{
		$xt->assign("next_button",true);
				$nextlink .="editid1=".htmlspecialchars(rawurlencode($next[1]));
				$nextlink .="&";
		$nextlink .="editid2=".htmlspecialchars(rawurlencode($next[2]));
				$nextlink .="&";
		$nextlink .="editid3=".htmlspecialchars(rawurlencode($next[3]));
		$xt->assign("nextbutton_attrs","align=\"absmiddle\" onclick=\"".$unblRec.$nextlink."'});return false;\"");
		$resetEditors.="$('#next".$id."').attr('style','');$('#next".$id."').attr('disabled','');";
	}
	else 
		$xt->assign("next_button",false);
	if(count($prev))
	{
		$xt->assign("prev_button",true);
				$prevlink .="editid1=".htmlspecialchars(rawurlencode($prev[1]));
				$prevlink .="&";
		$prevlink .="editid2=".htmlspecialchars(rawurlencode($prev[2]));
				$prevlink .="&";
		$prevlink .="editid3=".htmlspecialchars(rawurlencode($prev[3]));
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
	$xt->assign("backbutton_attrs","onclick=\"UnlockRecord('cc_receptivo_filas_atend_edit.php','".$skeys."','',function(){window.location.href='cc_receptivo_filas_atend_list.php?a=return'});return false;\"");
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
$showKeys[] = rawurlencode($keys["chave"]);
$showKeys[] = rawurlencode($keys["dt_entrada"]);
$showKeys[] = rawurlencode($keys["hr_entrada"]);
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
//	return new data to the List page or report an error
/////////////////////////////////////////////////////////////
if (postvalue("a")=="edited" && $inlineedit ) 
{
	if(!$data)
	{
		$data=$evalues;
		$HaveData=false;
	}
	//Preparation   view values

//	detail tables

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["chave"]));
	$keylink.="&key2=".htmlspecialchars(rawurlencode(@$data["dt_entrada"]));
	$keylink.="&key3=".htmlspecialchars(rawurlencode(@$data["hr_entrada"]));


//	chave - 

		$value="";
				$value = ProcessLargeText(GetData($data,"chave", ""),"field=chave".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "chave";
				$showRawValues[] = substr($data["chave"],0,100);

//	dt_entrada - Short Date

		$value="";
				$value = ProcessLargeText(GetData($data,"dt_entrada", "Short Date"),"field=dt%5Fentrada".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dt_entrada";
				$showRawValues[] = substr($data["dt_entrada"],0,100);

//	hr_entrada - Time

		$value="";
				$value = ProcessLargeText(GetData($data,"hr_entrada", "Time"),"field=hr%5Fentrada".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "hr_entrada";
				$showRawValues[] = substr($data["hr_entrada"],0,100);

//	Fila - 

		$value="";
				$value = ProcessLargeText(GetData($data,"Fila", ""),"field=Fila".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "Fila";
				$showRawValues[] = substr($data["Fila"],0,100);

//	Agente - 

		$value="";
				$value = ProcessLargeText(GetData($data,"Agente", ""),"field=Agente".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "Agente";
				$showRawValues[] = substr($data["Agente"],0,100);

//	hr_atendimento - Time

		$value="";
				$value = ProcessLargeText(GetData($data,"hr_atendimento", "Time"),"field=hr%5Fatendimento".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "hr_atendimento";
				$showRawValues[] = substr($data["hr_atendimento"],0,100);

//	hr_abandono - Time

		$value="";
				$value = ProcessLargeText(GetData($data,"hr_abandono", "Time"),"field=hr%5Fabandono".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "hr_abandono";
				$showRawValues[] = substr($data["hr_abandono"],0,100);

//	tp_espera - Time

		$value="";
				$value = ProcessLargeText(GetData($data,"tp_espera", "Time"),"field=tp%5Fespera".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_espera";
				$showRawValues[] = substr($data["tp_espera"],0,100);

//	tp_atendimento - Time

		$value="";
				$value = ProcessLargeText(GetData($data,"tp_atendimento", "Time"),"field=tp%5Fatendimento".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_atendimento";
				$showRawValues[] = substr($data["tp_atendimento"],0,100);

//	Telefone - 

		$value="";
				$value = ProcessLargeText(GetData($data,"Telefone", ""),"field=Telefone".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "Telefone";
				$showRawValues[] = substr($data["Telefone"],0,100);

//	ps_entrada - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ps_entrada", ""),"field=ps%5Fentrada".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ps_entrada";
				$showRawValues[] = substr($data["ps_entrada"],0,100);

//	ps_abandono - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ps_abandono", ""),"field=ps%5Fabandono".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ps_abandono";
				$showRawValues[] = substr($data["ps_abandono"],0,100);

//	tel_trans - 

		$value="";
				$value = ProcessLargeText(GetData($data,"tel_trans", ""),"field=tel%5Ftrans".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tel_trans";
				$showRawValues[] = substr($data["tel_trans"],0,100);

//	dsl_motiv - 

		$value="";
				$value = ProcessLargeText(GetData($data,"dsl_motiv", ""),"field=dsl%5Fmotiv".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dsl_motiv";
				$showRawValues[] = substr($data["dsl_motiv"],0,100);

//	flg_timeout_fila - 

		$value="";
				$value = ProcessLargeText(GetData($data,"flg_timeout_fila", ""),"field=flg%5Ftimeout%5Ffila".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "flg_timeout_fila";
				$showRawValues[] = substr($data["flg_timeout_fila"],0,100);
/////////////////////////////////////////////////////////////
//	start inline output
/////////////////////////////////////////////////////////////
	echo "<textarea id=\"data\">";
	if($IsSaved)
	{
		if($lockingObj)
			$lockingObj->UnlockRecord($strTableName,$keys,"");
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
$control_chave["params"]["value"]=@$data["chave"];
//	Begin Add validation
$arrValidate = array();	

$control_chave["params"]["validate"]=$arrValidate;
//	End Add validation
$control_chave["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_chave["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_chave["params"]["mode"]="inline_edit";
else
	$control_chave["params"]["mode"]="edit";
if(!$detailKeys || !in_array("chave", $detailKeys))	
	$xt->assign("chave_editcontrol",$control_chave);
else if(array_key_exists("chave",$data))
{
				$value = ProcessLargeText(GetData($data,"chave", ""),"field=chave","",MODE_VIEW);
		$xt->assign("chave_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - dt_entrada
$control_dt_entrada=array();
$control_dt_entrada["func"]="xt_buildeditcontrol";
$control_dt_entrada["params"] = array();
$control_dt_entrada["params"]["field"]="dt_entrada";
$control_dt_entrada["params"]["value"]=@$data["dt_entrada"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_dt_entrada["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dt_entrada["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dt_entrada["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dt_entrada["params"]["mode"]="inline_edit";
else
	$control_dt_entrada["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dt_entrada", $detailKeys))	
	$xt->assign("dt_entrada_editcontrol",$control_dt_entrada);
else if(array_key_exists("dt_entrada",$data))
{
				$value = ProcessLargeText(GetData($data,"dt_entrada", "Short Date"),"field=dt%5Fentrada","",MODE_VIEW);
		$xt->assign("dt_entrada_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - hr_entrada
$control_hr_entrada=array();
$control_hr_entrada["func"]="xt_buildeditcontrol";
$control_hr_entrada["params"] = array();
$control_hr_entrada["params"]["field"]="hr_entrada";
$control_hr_entrada["params"]["value"]=@$data["hr_entrada"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_hr_entrada["params"]["validate"]=$arrValidate;
//	End Add validation
$control_hr_entrada["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_hr_entrada["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_hr_entrada["params"]["mode"]="inline_edit";
else
	$control_hr_entrada["params"]["mode"]="edit";
if(!$detailKeys || !in_array("hr_entrada", $detailKeys))	
	$xt->assign("hr_entrada_editcontrol",$control_hr_entrada);
else if(array_key_exists("hr_entrada",$data))
{
				$value = ProcessLargeText(GetData($data,"hr_entrada", "Time"),"field=hr%5Fentrada","",MODE_VIEW);
		$xt->assign("hr_entrada_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - Fila
$control_Fila=array();
$control_Fila["func"]="xt_buildeditcontrol";
$control_Fila["params"] = array();
$control_Fila["params"]["field"]="Fila";
$control_Fila["params"]["value"]=@$data["Fila"];
//	Begin Add validation
$arrValidate = array();	

$control_Fila["params"]["validate"]=$arrValidate;
//	End Add validation
$control_Fila["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_Fila["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_Fila["params"]["mode"]="inline_edit";
else
	$control_Fila["params"]["mode"]="edit";
if(!$detailKeys || !in_array("Fila", $detailKeys))	
	$xt->assign("Fila_editcontrol",$control_Fila);
else if(array_key_exists("Fila",$data))
{
				$value = ProcessLargeText(GetData($data,"Fila", ""),"field=Fila","",MODE_VIEW);
		$xt->assign("Fila_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - Agente
$control_Agente=array();
$control_Agente["func"]="xt_buildeditcontrol";
$control_Agente["params"] = array();
$control_Agente["params"]["field"]="Agente";
$control_Agente["params"]["value"]=@$data["Agente"];
//	Begin Add validation
$arrValidate = array();	

$control_Agente["params"]["validate"]=$arrValidate;
//	End Add validation
$control_Agente["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_Agente["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_Agente["params"]["mode"]="inline_edit";
else
	$control_Agente["params"]["mode"]="edit";
if(!$detailKeys || !in_array("Agente", $detailKeys))	
	$xt->assign("Agente_editcontrol",$control_Agente);
else if(array_key_exists("Agente",$data))
{
				$value = ProcessLargeText(GetData($data,"Agente", ""),"field=Agente","",MODE_VIEW);
		$xt->assign("Agente_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - hr_atendimento
$control_hr_atendimento=array();
$control_hr_atendimento["func"]="xt_buildeditcontrol";
$control_hr_atendimento["params"] = array();
$control_hr_atendimento["params"]["field"]="hr_atendimento";
$control_hr_atendimento["params"]["value"]=@$data["hr_atendimento"];
//	Begin Add validation
$arrValidate = array();	

$control_hr_atendimento["params"]["validate"]=$arrValidate;
//	End Add validation
$control_hr_atendimento["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_hr_atendimento["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_hr_atendimento["params"]["mode"]="inline_edit";
else
	$control_hr_atendimento["params"]["mode"]="edit";
if(!$detailKeys || !in_array("hr_atendimento", $detailKeys))	
	$xt->assign("hr_atendimento_editcontrol",$control_hr_atendimento);
else if(array_key_exists("hr_atendimento",$data))
{
				$value = ProcessLargeText(GetData($data,"hr_atendimento", "Time"),"field=hr%5Fatendimento","",MODE_VIEW);
		$xt->assign("hr_atendimento_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - hr_abandono
$control_hr_abandono=array();
$control_hr_abandono["func"]="xt_buildeditcontrol";
$control_hr_abandono["params"] = array();
$control_hr_abandono["params"]["field"]="hr_abandono";
$control_hr_abandono["params"]["value"]=@$data["hr_abandono"];
//	Begin Add validation
$arrValidate = array();	

$control_hr_abandono["params"]["validate"]=$arrValidate;
//	End Add validation
$control_hr_abandono["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_hr_abandono["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_hr_abandono["params"]["mode"]="inline_edit";
else
	$control_hr_abandono["params"]["mode"]="edit";
if(!$detailKeys || !in_array("hr_abandono", $detailKeys))	
	$xt->assign("hr_abandono_editcontrol",$control_hr_abandono);
else if(array_key_exists("hr_abandono",$data))
{
				$value = ProcessLargeText(GetData($data,"hr_abandono", "Time"),"field=hr%5Fabandono","",MODE_VIEW);
		$xt->assign("hr_abandono_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - tp_espera
$control_tp_espera=array();
$control_tp_espera["func"]="xt_buildeditcontrol";
$control_tp_espera["params"] = array();
$control_tp_espera["params"]["field"]="tp_espera";
$control_tp_espera["params"]["value"]=@$data["tp_espera"];
//	Begin Add validation
$arrValidate = array();	

$control_tp_espera["params"]["validate"]=$arrValidate;
//	End Add validation
$control_tp_espera["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_tp_espera["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_tp_espera["params"]["mode"]="inline_edit";
else
	$control_tp_espera["params"]["mode"]="edit";
if(!$detailKeys || !in_array("tp_espera", $detailKeys))	
	$xt->assign("tp_espera_editcontrol",$control_tp_espera);
else if(array_key_exists("tp_espera",$data))
{
				$value = ProcessLargeText(GetData($data,"tp_espera", "Time"),"field=tp%5Fespera","",MODE_VIEW);
		$xt->assign("tp_espera_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - tp_atendimento
$control_tp_atendimento=array();
$control_tp_atendimento["func"]="xt_buildeditcontrol";
$control_tp_atendimento["params"] = array();
$control_tp_atendimento["params"]["field"]="tp_atendimento";
$control_tp_atendimento["params"]["value"]=@$data["tp_atendimento"];
//	Begin Add validation
$arrValidate = array();	

$control_tp_atendimento["params"]["validate"]=$arrValidate;
//	End Add validation
$control_tp_atendimento["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_tp_atendimento["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_tp_atendimento["params"]["mode"]="inline_edit";
else
	$control_tp_atendimento["params"]["mode"]="edit";
if(!$detailKeys || !in_array("tp_atendimento", $detailKeys))	
	$xt->assign("tp_atendimento_editcontrol",$control_tp_atendimento);
else if(array_key_exists("tp_atendimento",$data))
{
				$value = ProcessLargeText(GetData($data,"tp_atendimento", "Time"),"field=tp%5Fatendimento","",MODE_VIEW);
		$xt->assign("tp_atendimento_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - Telefone
$control_Telefone=array();
$control_Telefone["func"]="xt_buildeditcontrol";
$control_Telefone["params"] = array();
$control_Telefone["params"]["field"]="Telefone";
$control_Telefone["params"]["value"]=@$data["Telefone"];
//	Begin Add validation
$arrValidate = array();	

$control_Telefone["params"]["validate"]=$arrValidate;
//	End Add validation
$control_Telefone["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_Telefone["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_Telefone["params"]["mode"]="inline_edit";
else
	$control_Telefone["params"]["mode"]="edit";
if(!$detailKeys || !in_array("Telefone", $detailKeys))	
	$xt->assign("Telefone_editcontrol",$control_Telefone);
else if(array_key_exists("Telefone",$data))
{
				$value = ProcessLargeText(GetData($data,"Telefone", ""),"field=Telefone","",MODE_VIEW);
		$xt->assign("Telefone_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ps_entrada
$control_ps_entrada=array();
$control_ps_entrada["func"]="xt_buildeditcontrol";
$control_ps_entrada["params"] = array();
$control_ps_entrada["params"]["field"]="ps_entrada";
$control_ps_entrada["params"]["value"]=@$data["ps_entrada"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_ps_entrada["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ps_entrada["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ps_entrada["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ps_entrada["params"]["mode"]="inline_edit";
else
	$control_ps_entrada["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ps_entrada", $detailKeys))	
	$xt->assign("ps_entrada_editcontrol",$control_ps_entrada);
else if(array_key_exists("ps_entrada",$data))
{
				$value = ProcessLargeText(GetData($data,"ps_entrada", ""),"field=ps%5Fentrada","",MODE_VIEW);
		$xt->assign("ps_entrada_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ps_abandono
$control_ps_abandono=array();
$control_ps_abandono["func"]="xt_buildeditcontrol";
$control_ps_abandono["params"] = array();
$control_ps_abandono["params"]["field"]="ps_abandono";
$control_ps_abandono["params"]["value"]=@$data["ps_abandono"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_ps_abandono["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ps_abandono["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ps_abandono["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ps_abandono["params"]["mode"]="inline_edit";
else
	$control_ps_abandono["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ps_abandono", $detailKeys))	
	$xt->assign("ps_abandono_editcontrol",$control_ps_abandono);
else if(array_key_exists("ps_abandono",$data))
{
				$value = ProcessLargeText(GetData($data,"ps_abandono", ""),"field=ps%5Fabandono","",MODE_VIEW);
		$xt->assign("ps_abandono_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - tel_trans
$control_tel_trans=array();
$control_tel_trans["func"]="xt_buildeditcontrol";
$control_tel_trans["params"] = array();
$control_tel_trans["params"]["field"]="tel_trans";
$control_tel_trans["params"]["value"]=@$data["tel_trans"];
//	Begin Add validation
$arrValidate = array();	

$control_tel_trans["params"]["validate"]=$arrValidate;
//	End Add validation
$control_tel_trans["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_tel_trans["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_tel_trans["params"]["mode"]="inline_edit";
else
	$control_tel_trans["params"]["mode"]="edit";
if(!$detailKeys || !in_array("tel_trans", $detailKeys))	
	$xt->assign("tel_trans_editcontrol",$control_tel_trans);
else if(array_key_exists("tel_trans",$data))
{
				$value = ProcessLargeText(GetData($data,"tel_trans", ""),"field=tel%5Ftrans","",MODE_VIEW);
		$xt->assign("tel_trans_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - dsl_motiv
$control_dsl_motiv=array();
$control_dsl_motiv["func"]="xt_buildeditcontrol";
$control_dsl_motiv["params"] = array();
$control_dsl_motiv["params"]["field"]="dsl_motiv";
$control_dsl_motiv["params"]["value"]=@$data["dsl_motiv"];
//	Begin Add validation
$arrValidate = array();	

$control_dsl_motiv["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dsl_motiv["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dsl_motiv["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dsl_motiv["params"]["mode"]="inline_edit";
else
	$control_dsl_motiv["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dsl_motiv", $detailKeys))	
	$xt->assign("dsl_motiv_editcontrol",$control_dsl_motiv);
else if(array_key_exists("dsl_motiv",$data))
{
				$value = ProcessLargeText(GetData($data,"dsl_motiv", ""),"field=dsl%5Fmotiv","",MODE_VIEW);
		$xt->assign("dsl_motiv_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_timeout_fila
$control_flg_timeout_fila=array();
$control_flg_timeout_fila["func"]="xt_buildeditcontrol";
$control_flg_timeout_fila["params"] = array();
$control_flg_timeout_fila["params"]["field"]="flg_timeout_fila";
$control_flg_timeout_fila["params"]["value"]=@$data["flg_timeout_fila"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_flg_timeout_fila["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_timeout_fila["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_timeout_fila["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_timeout_fila["params"]["mode"]="inline_edit";
else
	$control_flg_timeout_fila["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_timeout_fila", $detailKeys))	
	$xt->assign("flg_timeout_fila_editcontrol",$control_flg_timeout_fila);
else if(array_key_exists("flg_timeout_fila",$data))
{
				$value = ProcessLargeText(GetData($data,"flg_timeout_fila", ""),"field=flg%5Ftimeout%5Ffila","",MODE_VIEW);
		$xt->assign("flg_timeout_fila_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();


if($lockingObj && $enableCtrlsForEditing)
	$pageObject->AddJSCode("window.timeid".$id."=setInterval( function() {ConfirmLock('cc_receptivo_filas_atend_edit.php','".jsreplace($strTableName)."','".$skeys."',".$id.",'".$inlineedit."');},".($lockingObj->ConfirmTime*1000).");");

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
			$strTableName = "cc_receptivo_filas_atend";		
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
	$strTableName = "cc_receptivo_filas_atend";		
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
