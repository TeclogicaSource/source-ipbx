<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/horario_variables.php");
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
$templatefile = "horario_edit.htm";

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
$keys["id_horario"]=postvalue("editid1");
$savedKeys["id_horario"]=postvalue("editid1");
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
	$value = postvalue("value_hr_inicio_01_".$id);
	$type=postvalue("type_hr_inicio_01_".$id);
	if(FieldSubmitted("hr_inicio_01_".$id))
	{
		
		$value=prepare_for_db("hr_inicio_01",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "hr_inicio_01"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["hr_inicio_01"]=$value;
		
		
	}


//	processibng hr_inicio_01 - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_hr_fim_01_".$id);
	$type=postvalue("type_hr_fim_01_".$id);
	if(FieldSubmitted("hr_fim_01_".$id))
	{
		
		$value=prepare_for_db("hr_fim_01",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "hr_fim_01"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["hr_fim_01"]=$value;
		
		
	}


//	processibng hr_fim_01 - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_seg_".$id);
	$type=postvalue("type_seg_".$id);
	if(FieldSubmitted("seg_".$id))
	{
		
		$value=prepare_for_db("seg",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "seg"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["seg"]=$value;
		
		
	}


//	processibng seg - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_ter_".$id);
	$type=postvalue("type_ter_".$id);
	if(FieldSubmitted("ter_".$id))
	{
		
		$value=prepare_for_db("ter",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ter"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ter"]=$value;
		
		
	}


//	processibng ter - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_qua_".$id);
	$type=postvalue("type_qua_".$id);
	if(FieldSubmitted("qua_".$id))
	{
		
		$value=prepare_for_db("qua",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "qua"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["qua"]=$value;
		
		
	}


//	processibng qua - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_qui_".$id);
	$type=postvalue("type_qui_".$id);
	if(FieldSubmitted("qui_".$id))
	{
		
		$value=prepare_for_db("qui",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "qui"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["qui"]=$value;
		
		
	}


//	processibng qui - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_sex_".$id);
	$type=postvalue("type_sex_".$id);
	if(FieldSubmitted("sex_".$id))
	{
		
		$value=prepare_for_db("sex",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "sex"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["sex"]=$value;
		
		
	}


//	processibng sex - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_sab_".$id);
	$type=postvalue("type_sab_".$id);
	if(FieldSubmitted("sab_".$id))
	{
		
		$value=prepare_for_db("sab",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "sab"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["sab"]=$value;
		
		
	}


//	processibng sab - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_dom_".$id);
	$type=postvalue("type_dom_".$id);
	if(FieldSubmitted("dom_".$id))
	{
		
		$value=prepare_for_db("dom",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dom"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dom"]=$value;
		
		
	}


//	processibng dom - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_hr_inicio_02_".$id);
	$type=postvalue("type_hr_inicio_02_".$id);
	if(FieldSubmitted("hr_inicio_02_".$id))
	{
		
		$value=prepare_for_db("hr_inicio_02",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "hr_inicio_02"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["hr_inicio_02"]=$value;
		
		
	}


//	processibng hr_inicio_02 - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_hr_fim_02_".$id);
	$type=postvalue("type_hr_fim_02_".$id);
	if(FieldSubmitted("hr_fim_02_".$id))
	{
		
		$value=prepare_for_db("hr_fim_02",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "hr_fim_02"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["hr_fim_02"]=$value;
		
		
	}


//	processibng hr_fim_02 - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_dsc_horario_".$id);
	$type=postvalue("type_dsc_horario_".$id);
	if(FieldSubmitted("dsc_horario_".$id))
	{
		
		$value=prepare_for_db("dsc_horario",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dsc_horario"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dsc_horario"]=$value;
		
		
	}


//	processibng dsc_horario - end
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
		$keyGetQ.="editid1=".rawurldecode($keys["id_horario"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: horario_".$pageObject->getPageType().".php?".$keyGetQ);
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
$query = $queryData_horario->Copy();



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
		header("Location: horario_list.php?a=return");
		exit();
	}
	else
		$data=array();
}

$readonlyfields=array();


	



if($readevalues)
{
	$data["hr_inicio_01"]=$evalues["hr_inicio_01"];
	$data["hr_fim_01"]=$evalues["hr_fim_01"];
	$data["seg"]=$evalues["seg"];
	$data["ter"]=$evalues["ter"];
	$data["qua"]=$evalues["qua"];
	$data["qui"]=$evalues["qui"];
	$data["sex"]=$evalues["sex"];
	$data["sab"]=$evalues["sab"];
	$data["dom"]=$evalues["dom"];
	$data["hr_inicio_02"]=$evalues["hr_inicio_02"];
	$data["hr_fim_02"]=$evalues["hr_fim_02"];
	$data["dsc_horario"]=$evalues["dsc_horario"];
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
$pageObject->AddJSFile("include/ui");
$pageObject->AddJSFile("include/jquery.utils","include/ui");
$pageObject->AddJSFile("include/ui.dropslide","include/jquery.utils");
$pageObject->AddJSFile("include/ui.timepickr","include/ui.dropslide");
$pageObject->AddCSSFile("include/ui.dropslide");
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
	$xt->assign("hr_inicio_01_fieldblock",true);
	$xt->assign("hr_inicio_01_label",true);
	if(isEnableSection508())
		$xt->assign_section("hr_inicio_01_label","<label for=\"".GetInputElementId("hr_inicio_01", $id)."\">","</label>");
	$xt->assign("hr_fim_01_fieldblock",true);
	$xt->assign("hr_fim_01_label",true);
	if(isEnableSection508())
		$xt->assign_section("hr_fim_01_label","<label for=\"".GetInputElementId("hr_fim_01", $id)."\">","</label>");
	$xt->assign("seg_fieldblock",true);
	$xt->assign("seg_label",true);
	if(isEnableSection508())
		$xt->assign_section("seg_label","<label for=\"".GetInputElementId("seg", $id)."\">","</label>");
	$xt->assign("ter_fieldblock",true);
	$xt->assign("ter_label",true);
	if(isEnableSection508())
		$xt->assign_section("ter_label","<label for=\"".GetInputElementId("ter", $id)."\">","</label>");
	$xt->assign("qua_fieldblock",true);
	$xt->assign("qua_label",true);
	if(isEnableSection508())
		$xt->assign_section("qua_label","<label for=\"".GetInputElementId("qua", $id)."\">","</label>");
	$xt->assign("qui_fieldblock",true);
	$xt->assign("qui_label",true);
	if(isEnableSection508())
		$xt->assign_section("qui_label","<label for=\"".GetInputElementId("qui", $id)."\">","</label>");
	$xt->assign("sex_fieldblock",true);
	$xt->assign("sex_label",true);
	if(isEnableSection508())
		$xt->assign_section("sex_label","<label for=\"".GetInputElementId("sex", $id)."\">","</label>");
	$xt->assign("sab_fieldblock",true);
	$xt->assign("sab_label",true);
	if(isEnableSection508())
		$xt->assign_section("sab_label","<label for=\"".GetInputElementId("sab", $id)."\">","</label>");
	$xt->assign("dom_fieldblock",true);
	$xt->assign("dom_label",true);
	if(isEnableSection508())
		$xt->assign_section("dom_label","<label for=\"".GetInputElementId("dom", $id)."\">","</label>");
	$xt->assign("hr_inicio_02_fieldblock",true);
	$xt->assign("hr_inicio_02_label",true);
	if(isEnableSection508())
		$xt->assign_section("hr_inicio_02_label","<label for=\"".GetInputElementId("hr_inicio_02", $id)."\">","</label>");
	$xt->assign("hr_fim_02_fieldblock",true);
	$xt->assign("hr_fim_02_label",true);
	if(isEnableSection508())
		$xt->assign_section("hr_fim_02_label","<label for=\"".GetInputElementId("hr_fim_02", $id)."\">","</label>");
	$xt->assign("dsc_horario_fieldblock",true);
	$xt->assign("dsc_horario_label",true);
	if(isEnableSection508())
		$xt->assign_section("dsc_horario_label","<label for=\"".GetInputElementId("dsc_horario", $id)."\">","</label>");
	
	if(strlen($onsubmit))
		$onsubmit="onSubmit=\"".htmlspecialchars($onsubmit)."\"";
	$pageObject->body["begin"] .= $includes;
	
	if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
	
	
	$hiddenKeys = '';
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid1\" value=\"".htmlspecialchars($keys["id_horario"])."\">";
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id_horario", "")));
	
	$xt->assign('editForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="horario_edit.php" '.$onsubmit.'>'.
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
	
	if(GetFieldIndex("id_horario"))
		$key[]=GetFieldIndex("id_horario");
	
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
					$next[1]=$row_next["id_horario"];
			}
			
			$res_prev=db_query($sql_prev,$conn);	
			if($row_prev=db_fetch_array($res_prev))
			{
					$prev[1]=$row_prev["id_horario"];
			}
		}
	}
}
	$nextlink=$prevlink="";
	// reset button handler
	$resetEditors="";
	$unblRec="UnlockRecord('horario_edit.php','".$skeys."','',function(){window.location.href='horario_edit.php?";
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
	$xt->assign("backbutton_attrs","onclick=\"UnlockRecord('horario_edit.php','".$skeys."','',function(){window.location.href='horario_list.php?a=return'});return false;\"");
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
$showKeys[] = rawurlencode($keys["id_horario"]);
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
//	control - hr_inicio_01
$control_hr_inicio_01=array();
$control_hr_inicio_01["func"]="xt_buildeditcontrol";
$control_hr_inicio_01["params"] = array();
$control_hr_inicio_01["params"]["field"]="hr_inicio_01";
$control_hr_inicio_01["params"]["value"]=@$data["hr_inicio_01"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Time");
$arrValidate['basicValidate'][] = $validatetype;

$arrValidate['basicValidate'][] = "IsRequired";

$control_hr_inicio_01["params"]["validate"]=$arrValidate;
//	End Add validation
$control_hr_inicio_01["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_hr_inicio_01["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_hr_inicio_01["params"]["mode"]="inline_edit";
else
	$control_hr_inicio_01["params"]["mode"]="edit";
if(!$detailKeys || !in_array("hr_inicio_01", $detailKeys))	
	$xt->assign("hr_inicio_01_editcontrol",$control_hr_inicio_01);
else if(array_key_exists("hr_inicio_01",$data))
{
				$value = ProcessLargeText(GetData($data,"hr_inicio_01", "Time"),"field=hr%5Finicio%5F01","",MODE_VIEW);
		$xt->assign("hr_inicio_01_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - hr_fim_01
$control_hr_fim_01=array();
$control_hr_fim_01["func"]="xt_buildeditcontrol";
$control_hr_fim_01["params"] = array();
$control_hr_fim_01["params"]["field"]="hr_fim_01";
$control_hr_fim_01["params"]["value"]=@$data["hr_fim_01"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Time");
$arrValidate['basicValidate'][] = $validatetype;

$arrValidate['basicValidate'][] = "IsRequired";

$control_hr_fim_01["params"]["validate"]=$arrValidate;
//	End Add validation
$control_hr_fim_01["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_hr_fim_01["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_hr_fim_01["params"]["mode"]="inline_edit";
else
	$control_hr_fim_01["params"]["mode"]="edit";
if(!$detailKeys || !in_array("hr_fim_01", $detailKeys))	
	$xt->assign("hr_fim_01_editcontrol",$control_hr_fim_01);
else if(array_key_exists("hr_fim_01",$data))
{
				$value = ProcessLargeText(GetData($data,"hr_fim_01", "Time"),"field=hr%5Ffim%5F01","",MODE_VIEW);
		$xt->assign("hr_fim_01_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - seg
$control_seg=array();
$control_seg["func"]="xt_buildeditcontrol";
$control_seg["params"] = array();
$control_seg["params"]["field"]="seg";
$control_seg["params"]["value"]=@$data["seg"];
//	Begin Add validation
$arrValidate = array();	


$control_seg["params"]["validate"]=$arrValidate;
//	End Add validation
$control_seg["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_seg["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_seg["params"]["mode"]="inline_edit";
else
	$control_seg["params"]["mode"]="edit";
if(!$detailKeys || !in_array("seg", $detailKeys))	
	$xt->assign("seg_editcontrol",$control_seg);
else if(array_key_exists("seg",$data))
{
				$value = GetData($data,"seg", "Checkbox");
		$xt->assign("seg_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ter
$control_ter=array();
$control_ter["func"]="xt_buildeditcontrol";
$control_ter["params"] = array();
$control_ter["params"]["field"]="ter";
$control_ter["params"]["value"]=@$data["ter"];
//	Begin Add validation
$arrValidate = array();	


$control_ter["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ter["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ter["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ter["params"]["mode"]="inline_edit";
else
	$control_ter["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ter", $detailKeys))	
	$xt->assign("ter_editcontrol",$control_ter);
else if(array_key_exists("ter",$data))
{
				$value = GetData($data,"ter", "Checkbox");
		$xt->assign("ter_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - qua
$control_qua=array();
$control_qua["func"]="xt_buildeditcontrol";
$control_qua["params"] = array();
$control_qua["params"]["field"]="qua";
$control_qua["params"]["value"]=@$data["qua"];
//	Begin Add validation
$arrValidate = array();	


$control_qua["params"]["validate"]=$arrValidate;
//	End Add validation
$control_qua["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_qua["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_qua["params"]["mode"]="inline_edit";
else
	$control_qua["params"]["mode"]="edit";
if(!$detailKeys || !in_array("qua", $detailKeys))	
	$xt->assign("qua_editcontrol",$control_qua);
else if(array_key_exists("qua",$data))
{
				$value = GetData($data,"qua", "Checkbox");
		$xt->assign("qua_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - qui
$control_qui=array();
$control_qui["func"]="xt_buildeditcontrol";
$control_qui["params"] = array();
$control_qui["params"]["field"]="qui";
$control_qui["params"]["value"]=@$data["qui"];
//	Begin Add validation
$arrValidate = array();	


$control_qui["params"]["validate"]=$arrValidate;
//	End Add validation
$control_qui["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_qui["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_qui["params"]["mode"]="inline_edit";
else
	$control_qui["params"]["mode"]="edit";
if(!$detailKeys || !in_array("qui", $detailKeys))	
	$xt->assign("qui_editcontrol",$control_qui);
else if(array_key_exists("qui",$data))
{
				$value = GetData($data,"qui", "Checkbox");
		$xt->assign("qui_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - sex
$control_sex=array();
$control_sex["func"]="xt_buildeditcontrol";
$control_sex["params"] = array();
$control_sex["params"]["field"]="sex";
$control_sex["params"]["value"]=@$data["sex"];
//	Begin Add validation
$arrValidate = array();	


$control_sex["params"]["validate"]=$arrValidate;
//	End Add validation
$control_sex["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_sex["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_sex["params"]["mode"]="inline_edit";
else
	$control_sex["params"]["mode"]="edit";
if(!$detailKeys || !in_array("sex", $detailKeys))	
	$xt->assign("sex_editcontrol",$control_sex);
else if(array_key_exists("sex",$data))
{
				$value = GetData($data,"sex", "Checkbox");
		$xt->assign("sex_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - sab
$control_sab=array();
$control_sab["func"]="xt_buildeditcontrol";
$control_sab["params"] = array();
$control_sab["params"]["field"]="sab";
$control_sab["params"]["value"]=@$data["sab"];
//	Begin Add validation
$arrValidate = array();	


$control_sab["params"]["validate"]=$arrValidate;
//	End Add validation
$control_sab["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_sab["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_sab["params"]["mode"]="inline_edit";
else
	$control_sab["params"]["mode"]="edit";
if(!$detailKeys || !in_array("sab", $detailKeys))	
	$xt->assign("sab_editcontrol",$control_sab);
else if(array_key_exists("sab",$data))
{
				$value = GetData($data,"sab", "Checkbox");
		$xt->assign("sab_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - dom
$control_dom=array();
$control_dom["func"]="xt_buildeditcontrol";
$control_dom["params"] = array();
$control_dom["params"]["field"]="dom";
$control_dom["params"]["value"]=@$data["dom"];
//	Begin Add validation
$arrValidate = array();	


$control_dom["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dom["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dom["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dom["params"]["mode"]="inline_edit";
else
	$control_dom["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dom", $detailKeys))	
	$xt->assign("dom_editcontrol",$control_dom);
else if(array_key_exists("dom",$data))
{
				$value = GetData($data,"dom", "Checkbox");
		$xt->assign("dom_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - hr_inicio_02
$control_hr_inicio_02=array();
$control_hr_inicio_02["func"]="xt_buildeditcontrol";
$control_hr_inicio_02["params"] = array();
$control_hr_inicio_02["params"]["field"]="hr_inicio_02";
$control_hr_inicio_02["params"]["value"]=@$data["hr_inicio_02"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Time");
$arrValidate['basicValidate'][] = $validatetype;


$control_hr_inicio_02["params"]["validate"]=$arrValidate;
//	End Add validation
$control_hr_inicio_02["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_hr_inicio_02["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_hr_inicio_02["params"]["mode"]="inline_edit";
else
	$control_hr_inicio_02["params"]["mode"]="edit";
if(!$detailKeys || !in_array("hr_inicio_02", $detailKeys))	
	$xt->assign("hr_inicio_02_editcontrol",$control_hr_inicio_02);
else if(array_key_exists("hr_inicio_02",$data))
{
				$value = ProcessLargeText(GetData($data,"hr_inicio_02", "Time"),"field=hr%5Finicio%5F02","",MODE_VIEW);
		$xt->assign("hr_inicio_02_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - hr_fim_02
$control_hr_fim_02=array();
$control_hr_fim_02["func"]="xt_buildeditcontrol";
$control_hr_fim_02["params"] = array();
$control_hr_fim_02["params"]["field"]="hr_fim_02";
$control_hr_fim_02["params"]["value"]=@$data["hr_fim_02"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Time");
$arrValidate['basicValidate'][] = $validatetype;


$control_hr_fim_02["params"]["validate"]=$arrValidate;
//	End Add validation
$control_hr_fim_02["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_hr_fim_02["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_hr_fim_02["params"]["mode"]="inline_edit";
else
	$control_hr_fim_02["params"]["mode"]="edit";
if(!$detailKeys || !in_array("hr_fim_02", $detailKeys))	
	$xt->assign("hr_fim_02_editcontrol",$control_hr_fim_02);
else if(array_key_exists("hr_fim_02",$data))
{
				$value = ProcessLargeText(GetData($data,"hr_fim_02", "Time"),"field=hr%5Ffim%5F02","",MODE_VIEW);
		$xt->assign("hr_fim_02_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - dsc_horario
$control_dsc_horario=array();
$control_dsc_horario["func"]="xt_buildeditcontrol";
$control_dsc_horario["params"] = array();
$control_dsc_horario["params"]["field"]="dsc_horario";
$control_dsc_horario["params"]["value"]=@$data["dsc_horario"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_dsc_horario["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dsc_horario["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dsc_horario["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dsc_horario["params"]["mode"]="inline_edit";
else
	$control_dsc_horario["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dsc_horario", $detailKeys))	
	$xt->assign("dsc_horario_editcontrol",$control_dsc_horario);
else if(array_key_exists("dsc_horario",$data))
{
				$value = ProcessLargeText(GetData($data,"dsc_horario", ""),"field=dsc%5Fhorario","",MODE_VIEW);
		$xt->assign("dsc_horario_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();


if($lockingObj && $enableCtrlsForEditing)
	$pageObject->AddJSCode("window.timeid".$id."=setInterval( function() {ConfirmLock('horario_edit.php','".jsreplace($strTableName)."','".$skeys."',".$id.",'".$inlineedit."');},".($lockingObj->ConfirmTime*1000).");");

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
			$strTableName = "horario";		
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
	$strTableName = "horario";		
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
