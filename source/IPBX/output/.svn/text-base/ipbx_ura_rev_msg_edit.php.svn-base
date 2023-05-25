<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/ipbx_ura_rev_msg_variables.php");
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
$templatefile = ( $inlineedit ) ? "ipbx_ura_rev_msg_inline_edit.htm" : "ipbx_ura_rev_msg_edit.htm";

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
$keys["id_ipbx_ura_rev_msg"]=postvalue("editid1");
$savedKeys["id_ipbx_ura_rev_msg"]=postvalue("editid1");
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

	$condition = 1;

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
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_opc_resp_".$id);
	$type=postvalue("type_opc_resp_".$id);
	if(FieldSubmitted("opc_resp_".$id))
	{
		
		$value=prepare_for_db("opc_resp",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "opc_resp"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["opc_resp"]=$value;
		
		
	}


//	processibng opc_resp - end
	}
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_dsc_mensagem_".$id);
	$type=postvalue("type_dsc_mensagem_".$id);
	if(FieldSubmitted("dsc_mensagem_".$id))
	{
		
		$value=prepare_for_db("dsc_mensagem",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dsc_mensagem"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dsc_mensagem"]=$value;
		
		
	}


//	processibng dsc_mensagem - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_pesquisa_".$id);
	$type=postvalue("type_id_pesquisa_".$id);
	if(FieldSubmitted("id_pesquisa_".$id))
	{
		
		$value=prepare_for_db("id_pesquisa",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_pesquisa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_pesquisa"]=$value;
		
		
	}


//	processibng id_pesquisa - end
	}
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_ref0_".$id);
	$type=postvalue("type_ref0_".$id);
	if(FieldSubmitted("ref0_".$id))
	{
		
		$value=prepare_for_db("ref0",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ref0"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ref0"]=$value;
		
		
	}


//	processibng ref0 - end
	}
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_ref1_".$id);
	$type=postvalue("type_ref1_".$id);
	if(FieldSubmitted("ref1_".$id))
	{
		
		$value=prepare_for_db("ref1",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ref1"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ref1"]=$value;
		
		
	}


//	processibng ref1 - end
	}
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_ref3_".$id);
	$type=postvalue("type_ref3_".$id);
	if(FieldSubmitted("ref3_".$id))
	{
		
		$value=prepare_for_db("ref3",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ref3"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ref3"]=$value;
		
		
	}


//	processibng ref3 - end
	}
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_ref4_".$id);
	$type=postvalue("type_ref4_".$id);
	if(FieldSubmitted("ref4_".$id))
	{
		
		$value=prepare_for_db("ref4",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ref4"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ref4"]=$value;
		
		
	}


//	processibng ref4 - end
	}
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_ref5_".$id);
	$type=postvalue("type_ref5_".$id);
	if(FieldSubmitted("ref5_".$id))
	{
		
		$value=prepare_for_db("ref5",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ref5"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ref5"]=$value;
		
		
	}


//	processibng ref5 - end
	}
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_ref6_".$id);
	$type=postvalue("type_ref6_".$id);
	if(FieldSubmitted("ref6_".$id))
	{
		
		$value=prepare_for_db("ref6",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ref6"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ref6"]=$value;
		
		
	}


//	processibng ref6 - end
	}
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_ref7_".$id);
	$type=postvalue("type_ref7_".$id);
	if(FieldSubmitted("ref7_".$id))
	{
		
		$value=prepare_for_db("ref7",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ref7"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ref7"]=$value;
		
		
	}


//	processibng ref7 - end
	}
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_ref8_".$id);
	$type=postvalue("type_ref8_".$id);
	if(FieldSubmitted("ref8_".$id))
	{
		
		$value=prepare_for_db("ref8",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ref8"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ref8"]=$value;
		
		
	}


//	processibng ref8 - end
	}
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_ref9_".$id);
	$type=postvalue("type_ref9_".$id);
	if(FieldSubmitted("ref9_".$id))
	{
		
		$value=prepare_for_db("ref9",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ref9"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ref9"]=$value;
		
		
	}


//	processibng ref9 - end
	}
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_ref2_".$id);
	$type=postvalue("type_ref2_".$id);
	if(FieldSubmitted("ref2_".$id))
	{
		
		$value=prepare_for_db("ref2",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ref2"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ref2"]=$value;
		
		
	}


//	processibng ref2 - end
	}
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_nr_ordem_".$id);
	$type=postvalue("type_nr_ordem_".$id);
	if(FieldSubmitted("nr_ordem_".$id))
	{
		
		$value=prepare_for_db("nr_ordem",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "nr_ordem"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["nr_ordem"]=$value;
		
		
	}


//	processibng nr_ordem - end
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
		$keyGetQ.="editid1=".rawurldecode($keys["id_ipbx_ura_rev_msg"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: ipbx_ura_rev_msg_".$pageObject->getPageType().".php?".$keyGetQ);
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
$query = $queryData_ipbx_ura_rev_msg->Copy();



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
		header("Location: ipbx_ura_rev_msg_list.php?a=return");
		exit();
	}
	else
		$data=array();
}

$readonlyfields=array();


	



if($readevalues)
{
	$data["opc_resp"]=$evalues["opc_resp"];
	$data["dsc_mensagem"]=$evalues["dsc_mensagem"];
	$data["id_pesquisa"]=$evalues["id_pesquisa"];
	$data["ref0"]=$evalues["ref0"];
	$data["ref1"]=$evalues["ref1"];
	$data["ref3"]=$evalues["ref3"];
	$data["ref4"]=$evalues["ref4"];
	$data["ref5"]=$evalues["ref5"];
	$data["ref6"]=$evalues["ref6"];
	$data["ref7"]=$evalues["ref7"];
	$data["ref8"]=$evalues["ref8"];
	$data["ref9"]=$evalues["ref9"];
	$data["ref2"]=$evalues["ref2"];
	$data["nr_ordem"]=$evalues["nr_ordem"];
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
	
	if(strlen($onsubmit))
		$onsubmit="onSubmit=\"".htmlspecialchars($onsubmit)."\"";
	$pageObject->body["begin"] .= $includes;
	
	if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
	
	
	$hiddenKeys = '';
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid1\" value=\"".htmlspecialchars($keys["id_ipbx_ura_rev_msg"])."\">";
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id_ipbx_ura_rev_msg", "")));
	
	$xt->assign('editForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="ipbx_ura_rev_msg_edit.php" '.$onsubmit.'>'.
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
	
	if(GetFieldIndex("id_ipbx_ura_rev_msg"))
		$key[]=GetFieldIndex("id_ipbx_ura_rev_msg");
	
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
					$next[1]=$row_next["id_ipbx_ura_rev_msg"];
			}
			
			$res_prev=db_query($sql_prev,$conn);	
			if($row_prev=db_fetch_array($res_prev))
			{
					$prev[1]=$row_prev["id_ipbx_ura_rev_msg"];
			}
		}
	}
}
	$nextlink=$prevlink="";
	// reset button handler
	$resetEditors="";
	$unblRec="UnlockRecord('ipbx_ura_rev_msg_edit.php','".$skeys."','',function(){window.location.href='ipbx_ura_rev_msg_edit.php?";
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
	$xt->assign("backbutton_attrs","onclick=\"UnlockRecord('ipbx_ura_rev_msg_edit.php','".$skeys."','',function(){window.location.href='ipbx_ura_rev_msg_list.php?a=return'});return false;\"");
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
$showKeys[] = rawurlencode($keys["id_ipbx_ura_rev_msg"]);
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_ipbx_ura_rev_msg"]));


//	id_pesquisa - 

		$value="";
				$value = ProcessLargeText(GetData($data,"id_pesquisa", ""),"field=id%5Fpesquisa".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_pesquisa";
				$showRawValues[] = substr($data["id_pesquisa"],0,100);

//	nr_ordem - 

		$value="";
				$value = ProcessLargeText(GetData($data,"nr_ordem", ""),"field=nr%5Fordem".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "nr_ordem";
				$showRawValues[] = substr($data["nr_ordem"],0,100);

//	dsc_mensagem - 

		$value="";
				$value = ProcessLargeText(GetData($data,"dsc_mensagem", ""),"field=dsc%5Fmensagem".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dsc_mensagem";
				$showRawValues[] = substr($data["dsc_mensagem"],0,100);

//	arq_audio - Document Download

		$value="";
				$value = GetData($data,"arq_audio", "Document Download");
		$showValues[] = $value;
		$showFields[] = "arq_audio";
				$showRawValues[] = substr($data["arq_audio"],0,100);

//	opc_resp - 

		$value="";
				$value = ProcessLargeText(GetData($data,"opc_resp", ""),"field=opc%5Fresp".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "opc_resp";
				$showRawValues[] = substr($data["opc_resp"],0,100);

//	ref0 - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ref0", ""),"field=ref0".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref0";
				$showRawValues[] = substr($data["ref0"],0,100);

//	ref1 - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ref1", ""),"field=ref1".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref1";
				$showRawValues[] = substr($data["ref1"],0,100);

//	ref2 - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ref2", ""),"field=ref2".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref2";
				$showRawValues[] = substr($data["ref2"],0,100);

//	ref3 - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ref3", ""),"field=ref3".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref3";
				$showRawValues[] = substr($data["ref3"],0,100);

//	ref4 - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ref4", ""),"field=ref4".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref4";
				$showRawValues[] = substr($data["ref4"],0,100);

//	ref5 - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ref5", ""),"field=ref5".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref5";
				$showRawValues[] = substr($data["ref5"],0,100);

//	ref6 - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ref6", ""),"field=ref6".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref6";
				$showRawValues[] = substr($data["ref6"],0,100);

//	ref7 - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ref7", ""),"field=ref7".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref7";
				$showRawValues[] = substr($data["ref7"],0,100);

//	ref8 - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ref8", ""),"field=ref8".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref8";
				$showRawValues[] = substr($data["ref8"],0,100);

//	ref9 - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ref9", ""),"field=ref9".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ref9";
				$showRawValues[] = substr($data["ref9"],0,100);
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
//	control - opc_resp
$control_opc_resp=array();
$control_opc_resp["func"]="xt_buildeditcontrol";
$control_opc_resp["params"] = array();
$control_opc_resp["params"]["field"]="opc_resp";
$control_opc_resp["params"]["value"]=@$data["opc_resp"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_opc_resp["params"]["validate"]=$arrValidate;
//	End Add validation
$control_opc_resp["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_opc_resp["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_opc_resp["params"]["mode"]="inline_edit";
else
	$control_opc_resp["params"]["mode"]="edit";
if(!$detailKeys || !in_array("opc_resp", $detailKeys))	
	$xt->assign("opc_resp_editcontrol",$control_opc_resp);
else if(array_key_exists("opc_resp",$data))
{
				$value = ProcessLargeText(GetData($data,"opc_resp", ""),"field=opc%5Fresp","",MODE_VIEW);
		$xt->assign("opc_resp_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - dsc_mensagem
$control_dsc_mensagem=array();
$control_dsc_mensagem["func"]="xt_buildeditcontrol";
$control_dsc_mensagem["params"] = array();
$control_dsc_mensagem["params"]["field"]="dsc_mensagem";
$control_dsc_mensagem["params"]["value"]=@$data["dsc_mensagem"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_dsc_mensagem["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dsc_mensagem["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dsc_mensagem["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dsc_mensagem["params"]["mode"]="inline_edit";
else
	$control_dsc_mensagem["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dsc_mensagem", $detailKeys))	
	$xt->assign("dsc_mensagem_editcontrol",$control_dsc_mensagem);
else if(array_key_exists("dsc_mensagem",$data))
{
				$value = ProcessLargeText(GetData($data,"dsc_mensagem", ""),"field=dsc%5Fmensagem","",MODE_VIEW);
		$xt->assign("dsc_mensagem_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_pesquisa
$control_id_pesquisa=array();
$control_id_pesquisa["func"]="xt_buildeditcontrol";
$control_id_pesquisa["params"] = array();
$control_id_pesquisa["params"]["field"]="id_pesquisa";
$control_id_pesquisa["params"]["value"]=@$data["id_pesquisa"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_id_pesquisa["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_pesquisa["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_pesquisa["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_pesquisa["params"]["mode"]="inline_edit";
else
	$control_id_pesquisa["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_pesquisa", $detailKeys))	
	$xt->assign("id_pesquisa_editcontrol",$control_id_pesquisa);
else if(array_key_exists("id_pesquisa",$data))
{
				$value = ProcessLargeText(GetData($data,"id_pesquisa", ""),"field=id%5Fpesquisa","",MODE_VIEW);
		$xt->assign("id_pesquisa_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ref0
$control_ref0=array();
$control_ref0["func"]="xt_buildeditcontrol";
$control_ref0["params"] = array();
$control_ref0["params"]["field"]="ref0";
$control_ref0["params"]["value"]=@$data["ref0"];
//	Begin Add validation
$arrValidate = array();	

$control_ref0["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ref0["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ref0["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ref0["params"]["mode"]="inline_edit";
else
	$control_ref0["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ref0", $detailKeys))	
	$xt->assign("ref0_editcontrol",$control_ref0);
else if(array_key_exists("ref0",$data))
{
				$value = ProcessLargeText(GetData($data,"ref0", ""),"field=ref0","",MODE_VIEW);
		$xt->assign("ref0_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ref1
$control_ref1=array();
$control_ref1["func"]="xt_buildeditcontrol";
$control_ref1["params"] = array();
$control_ref1["params"]["field"]="ref1";
$control_ref1["params"]["value"]=@$data["ref1"];
//	Begin Add validation
$arrValidate = array();	

$control_ref1["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ref1["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ref1["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ref1["params"]["mode"]="inline_edit";
else
	$control_ref1["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ref1", $detailKeys))	
	$xt->assign("ref1_editcontrol",$control_ref1);
else if(array_key_exists("ref1",$data))
{
				$value = ProcessLargeText(GetData($data,"ref1", ""),"field=ref1","",MODE_VIEW);
		$xt->assign("ref1_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ref3
$control_ref3=array();
$control_ref3["func"]="xt_buildeditcontrol";
$control_ref3["params"] = array();
$control_ref3["params"]["field"]="ref3";
$control_ref3["params"]["value"]=@$data["ref3"];
//	Begin Add validation
$arrValidate = array();	

$control_ref3["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ref3["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ref3["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ref3["params"]["mode"]="inline_edit";
else
	$control_ref3["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ref3", $detailKeys))	
	$xt->assign("ref3_editcontrol",$control_ref3);
else if(array_key_exists("ref3",$data))
{
				$value = ProcessLargeText(GetData($data,"ref3", ""),"field=ref3","",MODE_VIEW);
		$xt->assign("ref3_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ref4
$control_ref4=array();
$control_ref4["func"]="xt_buildeditcontrol";
$control_ref4["params"] = array();
$control_ref4["params"]["field"]="ref4";
$control_ref4["params"]["value"]=@$data["ref4"];
//	Begin Add validation
$arrValidate = array();	

$control_ref4["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ref4["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ref4["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ref4["params"]["mode"]="inline_edit";
else
	$control_ref4["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ref4", $detailKeys))	
	$xt->assign("ref4_editcontrol",$control_ref4);
else if(array_key_exists("ref4",$data))
{
				$value = ProcessLargeText(GetData($data,"ref4", ""),"field=ref4","",MODE_VIEW);
		$xt->assign("ref4_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ref5
$control_ref5=array();
$control_ref5["func"]="xt_buildeditcontrol";
$control_ref5["params"] = array();
$control_ref5["params"]["field"]="ref5";
$control_ref5["params"]["value"]=@$data["ref5"];
//	Begin Add validation
$arrValidate = array();	

$control_ref5["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ref5["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ref5["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ref5["params"]["mode"]="inline_edit";
else
	$control_ref5["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ref5", $detailKeys))	
	$xt->assign("ref5_editcontrol",$control_ref5);
else if(array_key_exists("ref5",$data))
{
				$value = ProcessLargeText(GetData($data,"ref5", ""),"field=ref5","",MODE_VIEW);
		$xt->assign("ref5_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ref6
$control_ref6=array();
$control_ref6["func"]="xt_buildeditcontrol";
$control_ref6["params"] = array();
$control_ref6["params"]["field"]="ref6";
$control_ref6["params"]["value"]=@$data["ref6"];
//	Begin Add validation
$arrValidate = array();	

$control_ref6["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ref6["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ref6["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ref6["params"]["mode"]="inline_edit";
else
	$control_ref6["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ref6", $detailKeys))	
	$xt->assign("ref6_editcontrol",$control_ref6);
else if(array_key_exists("ref6",$data))
{
				$value = ProcessLargeText(GetData($data,"ref6", ""),"field=ref6","",MODE_VIEW);
		$xt->assign("ref6_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ref7
$control_ref7=array();
$control_ref7["func"]="xt_buildeditcontrol";
$control_ref7["params"] = array();
$control_ref7["params"]["field"]="ref7";
$control_ref7["params"]["value"]=@$data["ref7"];
//	Begin Add validation
$arrValidate = array();	

$control_ref7["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ref7["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ref7["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ref7["params"]["mode"]="inline_edit";
else
	$control_ref7["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ref7", $detailKeys))	
	$xt->assign("ref7_editcontrol",$control_ref7);
else if(array_key_exists("ref7",$data))
{
				$value = ProcessLargeText(GetData($data,"ref7", ""),"field=ref7","",MODE_VIEW);
		$xt->assign("ref7_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ref8
$control_ref8=array();
$control_ref8["func"]="xt_buildeditcontrol";
$control_ref8["params"] = array();
$control_ref8["params"]["field"]="ref8";
$control_ref8["params"]["value"]=@$data["ref8"];
//	Begin Add validation
$arrValidate = array();	

$control_ref8["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ref8["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ref8["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ref8["params"]["mode"]="inline_edit";
else
	$control_ref8["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ref8", $detailKeys))	
	$xt->assign("ref8_editcontrol",$control_ref8);
else if(array_key_exists("ref8",$data))
{
				$value = ProcessLargeText(GetData($data,"ref8", ""),"field=ref8","",MODE_VIEW);
		$xt->assign("ref8_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ref9
$control_ref9=array();
$control_ref9["func"]="xt_buildeditcontrol";
$control_ref9["params"] = array();
$control_ref9["params"]["field"]="ref9";
$control_ref9["params"]["value"]=@$data["ref9"];
//	Begin Add validation
$arrValidate = array();	

$control_ref9["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ref9["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ref9["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ref9["params"]["mode"]="inline_edit";
else
	$control_ref9["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ref9", $detailKeys))	
	$xt->assign("ref9_editcontrol",$control_ref9);
else if(array_key_exists("ref9",$data))
{
				$value = ProcessLargeText(GetData($data,"ref9", ""),"field=ref9","",MODE_VIEW);
		$xt->assign("ref9_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ref2
$control_ref2=array();
$control_ref2["func"]="xt_buildeditcontrol";
$control_ref2["params"] = array();
$control_ref2["params"]["field"]="ref2";
$control_ref2["params"]["value"]=@$data["ref2"];
//	Begin Add validation
$arrValidate = array();	

$control_ref2["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ref2["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ref2["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ref2["params"]["mode"]="inline_edit";
else
	$control_ref2["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ref2", $detailKeys))	
	$xt->assign("ref2_editcontrol",$control_ref2);
else if(array_key_exists("ref2",$data))
{
				$value = ProcessLargeText(GetData($data,"ref2", ""),"field=ref2","",MODE_VIEW);
		$xt->assign("ref2_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - nr_ordem
$control_nr_ordem=array();
$control_nr_ordem["func"]="xt_buildeditcontrol";
$control_nr_ordem["params"] = array();
$control_nr_ordem["params"]["field"]="nr_ordem";
$control_nr_ordem["params"]["value"]=@$data["nr_ordem"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_nr_ordem["params"]["validate"]=$arrValidate;
//	End Add validation
$control_nr_ordem["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_nr_ordem["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_nr_ordem["params"]["mode"]="inline_edit";
else
	$control_nr_ordem["params"]["mode"]="edit";
if(!$detailKeys || !in_array("nr_ordem", $detailKeys))	
	$xt->assign("nr_ordem_editcontrol",$control_nr_ordem);
else if(array_key_exists("nr_ordem",$data))
{
				$value = ProcessLargeText(GetData($data,"nr_ordem", ""),"field=nr%5Fordem","",MODE_VIEW);
		$xt->assign("nr_ordem_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();


if($lockingObj && $enableCtrlsForEditing)
	$pageObject->AddJSCode("window.timeid".$id."=setInterval( function() {ConfirmLock('ipbx_ura_rev_msg_edit.php','".jsreplace($strTableName)."','".$skeys."',".$id.",'".$inlineedit."');},".($lockingObj->ConfirmTime*1000).");");

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
			$strTableName = "ipbx_ura_rev_msg";		
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
	$strTableName = "ipbx_ura_rev_msg";		
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
