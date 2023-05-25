<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/personal_info_variables.php");
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
$templatefile = "personal_info_edit.htm";

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
$keys["id"]=postvalue("editid1");
$savedKeys["id"]=postvalue("editid1");
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
	$value = postvalue("value_name_".$id);
	$type=postvalue("type_name_".$id);
	if(FieldSubmitted("name_".$id))
	{
		
		$value=prepare_for_db("name",$value,$type);
	}
	else
	{
		$value=false;
	}
	$value = false;
	if($value!==false)
	{	





		
	if(0 && "name"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["name"]=$value;
		
		
	}


//	processibng name - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_callerid_".$id);
	$type=postvalue("type_callerid_".$id);
	if(FieldSubmitted("callerid_".$id))
	{
		
		$value=prepare_for_db("callerid",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "callerid"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["callerid"]=$value;
		
		
	}


//	processibng callerid - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_secret_".$id);
	$type=postvalue("type_secret_".$id);
	if(FieldSubmitted("secret_".$id))
	{
		
		$value=prepare_for_db("secret",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "secret"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["secret"]=$value;
		
		
	}


//	processibng secret - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_mail_".$id);
	$type=postvalue("type_mail_".$id);
	if(FieldSubmitted("mail_".$id))
	{
		
		$value=prepare_for_db("mail",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "mail"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["mail"]=$value;
		
		
	}


//	processibng mail - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_Transbordo_".$id);
	$type=postvalue("type_Transbordo_".$id);
	if(FieldSubmitted("Transbordo_".$id))
	{
		
		$value=prepare_for_db("Transbordo",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "Transbordo"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["Transbordo"]=$value;
		
		
	}


//	processibng Transbordo - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_tp_chamada_".$id);
	$type=postvalue("type_tp_chamada_".$id);
	if(FieldSubmitted("tp_chamada_".$id))
	{
		
		$value=prepare_for_db("tp_chamada",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "tp_chamada"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["tp_chamada"]=$value;
		
		
	}


//	processibng tp_chamada - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_cadeado_".$id);
	$type=postvalue("type_flg_cadeado_".$id);
	if(FieldSubmitted("flg_cadeado_".$id))
	{
		
		$value=prepare_for_db("flg_cadeado",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_cadeado"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_cadeado"]=$value;
		
		
	}


//	processibng flg_cadeado - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_desvio_".$id);
	$type=postvalue("type_desvio_".$id);
	if(FieldSubmitted("desvio_".$id))
	{
		
		$value=prepare_for_db("desvio",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "desvio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["desvio"]=$value;
		
		
	}


//	processibng desvio - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_desvio_ddr_".$id);
	$type=postvalue("type_desvio_ddr_".$id);
	if(FieldSubmitted("desvio_ddr_".$id))
	{
		
		$value=prepare_for_db("desvio_ddr",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "desvio_ddr"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["desvio_ddr"]=$value;
		
		
	}


//	processibng desvio_ddr - end
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
	$value = postvalue("value_flg_info_centrocusto_".$id);
	$type=postvalue("type_flg_info_centrocusto_".$id);
	if(FieldSubmitted("flg_info_centrocusto_".$id))
	{
		
		$value=prepare_for_db("flg_info_centrocusto",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_info_centrocusto"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_info_centrocusto"]=$value;
		
		
	}


//	processibng flg_info_centrocusto - end
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
		$keyGetQ.="editid1=".rawurldecode($keys["id"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: personal_info_".$pageObject->getPageType().".php?".$keyGetQ);
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
$query = $queryData_personal_info->Copy();



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
		header("Location: personal_info_list.php?a=return");
		exit();
	}
	else
		$data=array();
}

$readonlyfields=array();


	


  $readonlyfields["name"] = htmlspecialchars(GetData($data,"name", ""));

if($readevalues)
{
	$data["callerid"]=$evalues["callerid"];
	$data["secret"]=$evalues["secret"];
	$data["mail"]=$evalues["mail"];
	$data["Transbordo"]=$evalues["Transbordo"];
	$data["tp_chamada"]=$evalues["tp_chamada"];
	$data["flg_cadeado"]=$evalues["flg_cadeado"];
	$data["desvio"]=$evalues["desvio"];
	$data["desvio_ddr"]=$evalues["desvio_ddr"];
	$data["id_desvio"]=$evalues["id_desvio"];
	$data["flg_info_centrocusto"]=$evalues["flg_info_centrocusto"];
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
	$xt->assign("name_fieldblock",true);
	$xt->assign("name_label",true);
	if(isEnableSection508())
		$xt->assign_section("name_label","<label for=\"".GetInputElementId("name", $id)."\">","</label>");
	$xt->assign("callerid_fieldblock",true);
	$xt->assign("callerid_label",true);
	if(isEnableSection508())
		$xt->assign_section("callerid_label","<label for=\"".GetInputElementId("callerid", $id)."\">","</label>");
	$xt->assign("secret_fieldblock",true);
	$xt->assign("secret_label",true);
	if(isEnableSection508())
		$xt->assign_section("secret_label","<label for=\"".GetInputElementId("secret", $id)."\">","</label>");
	$xt->assign("mail_fieldblock",true);
	$xt->assign("mail_label",true);
	if(isEnableSection508())
		$xt->assign_section("mail_label","<label for=\"".GetInputElementId("mail", $id)."\">","</label>");
	$xt->assign("Transbordo_fieldblock",true);
	$xt->assign("Transbordo_label",true);
	if(isEnableSection508())
		$xt->assign_section("Transbordo_label","<label for=\"".GetInputElementId("Transbordo", $id)."\">","</label>");
	$xt->assign("tp_chamada_fieldblock",true);
	$xt->assign("tp_chamada_label",true);
	if(isEnableSection508())
		$xt->assign_section("tp_chamada_label","<label for=\"".GetInputElementId("tp_chamada", $id)."\">","</label>");
	$xt->assign("flg_cadeado_fieldblock",true);
	$xt->assign("flg_cadeado_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_cadeado_label","<label for=\"".GetInputElementId("flg_cadeado", $id)."\">","</label>");
	$xt->assign("desvio_fieldblock",true);
	$xt->assign("desvio_label",true);
	if(isEnableSection508())
		$xt->assign_section("desvio_label","<label for=\"".GetInputElementId("desvio", $id)."\">","</label>");
	$xt->assign("desvio_ddr_fieldblock",true);
	$xt->assign("desvio_ddr_label",true);
	if(isEnableSection508())
		$xt->assign_section("desvio_ddr_label","<label for=\"".GetInputElementId("desvio_ddr", $id)."\">","</label>");
	$xt->assign("id_desvio_fieldblock",true);
	$xt->assign("id_desvio_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_desvio_label","<label for=\"".GetInputElementId("id_desvio", $id)."\">","</label>");
	$xt->assign("flg_info_centrocusto_fieldblock",true);
	$xt->assign("flg_info_centrocusto_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_info_centrocusto_label","<label for=\"".GetInputElementId("flg_info_centrocusto", $id)."\">","</label>");
	
	if(strlen($onsubmit))
		$onsubmit="onSubmit=\"".htmlspecialchars($onsubmit)."\"";
	$pageObject->body["begin"] .= $includes;
	
	if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
	
	
	$hiddenKeys = '';
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid1\" value=\"".htmlspecialchars($keys["id"])."\">";
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id", "")));
	
	$xt->assign('editForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="personal_info_edit.php" '.$onsubmit.'>'.
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
	
	if(GetFieldIndex("id"))
		$key[]=GetFieldIndex("id");
	
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
					$next[1]=$row_next["id"];
			}
			
			$res_prev=db_query($sql_prev,$conn);	
			if($row_prev=db_fetch_array($res_prev))
			{
					$prev[1]=$row_prev["id"];
			}
		}
	}
}
	$nextlink=$prevlink="";
	// reset button handler
	$resetEditors="";
	$unblRec="UnlockRecord('personal_info_edit.php','".$skeys."','',function(){window.location.href='personal_info_edit.php?";
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
	$xt->assign("backbutton_attrs","onclick=\"UnlockRecord('personal_info_edit.php','".$skeys."','',function(){window.location.href='personal_info_list.php?a=return'});return false;\"");
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
$showKeys[] = rawurlencode($keys["id"]);
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
//	control - name
$control_name=array();
$control_name["func"]="xt_buildeditcontrol";
$control_name["params"] = array();
$control_name["params"]["field"]="name";
$control_name["params"]["value"]=@$data["name"];
//	Begin Add validation
$arrValidate = array();	

$control_name["params"]["validate"]=$arrValidate;
//	End Add validation
$control_name["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_name["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_name["params"]["mode"]="inline_edit";
else
	$control_name["params"]["mode"]="edit";
if(!$detailKeys || !in_array("name", $detailKeys))	
	$xt->assign("name_editcontrol",$control_name);
else if(array_key_exists("name",$data))
{
				$value = ProcessLargeText(GetData($data,"name", ""),"field=name","",MODE_VIEW);
		$xt->assign("name_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - callerid
$control_callerid=array();
$control_callerid["func"]="xt_buildeditcontrol";
$control_callerid["params"] = array();
$control_callerid["params"]["field"]="callerid";
$control_callerid["params"]["value"]=@$data["callerid"];
//	Begin Add validation
$arrValidate = array();	

$control_callerid["params"]["validate"]=$arrValidate;
//	End Add validation
$control_callerid["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_callerid["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_callerid["params"]["mode"]="inline_edit";
else
	$control_callerid["params"]["mode"]="edit";
if(!$detailKeys || !in_array("callerid", $detailKeys))	
	$xt->assign("callerid_editcontrol",$control_callerid);
else if(array_key_exists("callerid",$data))
{
				$value = ProcessLargeText(GetData($data,"callerid", ""),"field=callerid","",MODE_VIEW);
		$xt->assign("callerid_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - secret
$control_secret=array();
$control_secret["func"]="xt_buildeditcontrol";
$control_secret["params"] = array();
$control_secret["params"]["field"]="secret";
$control_secret["params"]["value"]=@$data["secret"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_secret["params"]["validate"]=$arrValidate;
//	End Add validation
$control_secret["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_secret["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_secret["params"]["mode"]="inline_edit";
else
	$control_secret["params"]["mode"]="edit";
if(!$detailKeys || !in_array("secret", $detailKeys))	
	$xt->assign("secret_editcontrol",$control_secret);
else if(array_key_exists("secret",$data))
{
				$value = ProcessLargeText(GetData($data,"secret", ""),"field=secret","",MODE_VIEW);
		$xt->assign("secret_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - mail
$control_mail=array();
$control_mail["func"]="xt_buildeditcontrol";
$control_mail["params"] = array();
$control_mail["params"]["field"]="mail";
$control_mail["params"]["value"]=@$data["mail"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Email");
$arrValidate['basicValidate'][] = $validatetype;


$control_mail["params"]["validate"]=$arrValidate;
//	End Add validation
$control_mail["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_mail["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_mail["params"]["mode"]="inline_edit";
else
	$control_mail["params"]["mode"]="edit";
if(!$detailKeys || !in_array("mail", $detailKeys))	
	$xt->assign("mail_editcontrol",$control_mail);
else if(array_key_exists("mail",$data))
{
				$value = ProcessLargeText(GetData($data,"mail", ""),"field=mail","",MODE_VIEW);
		$xt->assign("mail_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - Transbordo
$control_Transbordo=array();
$control_Transbordo["func"]="xt_buildeditcontrol";
$control_Transbordo["params"] = array();
$control_Transbordo["params"]["field"]="Transbordo";
$control_Transbordo["params"]["value"]=@$data["Transbordo"];
//	Begin Add validation
$arrValidate = array();	

$control_Transbordo["params"]["validate"]=$arrValidate;
//	End Add validation
$control_Transbordo["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_Transbordo["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_Transbordo["params"]["mode"]="inline_edit";
else
	$control_Transbordo["params"]["mode"]="edit";
if(!$detailKeys || !in_array("Transbordo", $detailKeys))	
	$xt->assign("Transbordo_editcontrol",$control_Transbordo);
else if(array_key_exists("Transbordo",$data))
{
				$value = ProcessLargeText(GetData($data,"Transbordo", ""),"field=Transbordo","",MODE_VIEW);
		$xt->assign("Transbordo_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - tp_chamada
$control_tp_chamada=array();
$control_tp_chamada["func"]="xt_buildeditcontrol";
$control_tp_chamada["params"] = array();
$control_tp_chamada["params"]["field"]="tp_chamada";
$control_tp_chamada["params"]["value"]=@$data["tp_chamada"];
//	Begin Add validation
$arrValidate = array();	


$control_tp_chamada["params"]["validate"]=$arrValidate;
//	End Add validation
$control_tp_chamada["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_tp_chamada["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_tp_chamada["params"]["mode"]="inline_edit";
else
	$control_tp_chamada["params"]["mode"]="edit";
if(!$detailKeys || !in_array("tp_chamada", $detailKeys))	
	$xt->assign("tp_chamada_editcontrol",$control_tp_chamada);
else if(array_key_exists("tp_chamada",$data))
{
				$value = ProcessLargeText(GetData($data,"tp_chamada", ""),"field=tp%5Fchamada","",MODE_VIEW);
		$xt->assign("tp_chamada_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_cadeado
$control_flg_cadeado=array();
$control_flg_cadeado["func"]="xt_buildeditcontrol";
$control_flg_cadeado["params"] = array();
$control_flg_cadeado["params"]["field"]="flg_cadeado";
$control_flg_cadeado["params"]["value"]=@$data["flg_cadeado"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_cadeado["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_cadeado["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_cadeado["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_cadeado["params"]["mode"]="inline_edit";
else
	$control_flg_cadeado["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_cadeado", $detailKeys))	
	$xt->assign("flg_cadeado_editcontrol",$control_flg_cadeado);
else if(array_key_exists("flg_cadeado",$data))
{
				$value = GetData($data,"flg_cadeado", "Checkbox");
		$xt->assign("flg_cadeado_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - desvio
$control_desvio=array();
$control_desvio["func"]="xt_buildeditcontrol";
$control_desvio["params"] = array();
$control_desvio["params"]["field"]="desvio";
$control_desvio["params"]["value"]=@$data["desvio"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_desvio["params"]["validate"]=$arrValidate;
//	End Add validation
$control_desvio["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_desvio["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_desvio["params"]["mode"]="inline_edit";
else
	$control_desvio["params"]["mode"]="edit";
if(!$detailKeys || !in_array("desvio", $detailKeys))	
	$xt->assign("desvio_editcontrol",$control_desvio);
else if(array_key_exists("desvio",$data))
{
				$value = ProcessLargeText(GetData($data,"desvio", ""),"field=desvio","",MODE_VIEW);
		$xt->assign("desvio_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - desvio_ddr
$control_desvio_ddr=array();
$control_desvio_ddr["func"]="xt_buildeditcontrol";
$control_desvio_ddr["params"] = array();
$control_desvio_ddr["params"]["field"]="desvio_ddr";
$control_desvio_ddr["params"]["value"]=@$data["desvio_ddr"];
//	Begin Add validation
$arrValidate = array();	


$control_desvio_ddr["params"]["validate"]=$arrValidate;
//	End Add validation
$control_desvio_ddr["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_desvio_ddr["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_desvio_ddr["params"]["mode"]="inline_edit";
else
	$control_desvio_ddr["params"]["mode"]="edit";
if(!$detailKeys || !in_array("desvio_ddr", $detailKeys))	
	$xt->assign("desvio_ddr_editcontrol",$control_desvio_ddr);
else if(array_key_exists("desvio_ddr",$data))
{
				$value=DisplayLookupWizard("desvio_ddr",$data["desvio_ddr"],$data,"",MODE_VIEW);
		$xt->assign("desvio_ddr_editcontrol",$value);
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
//	control - flg_info_centrocusto
$control_flg_info_centrocusto=array();
$control_flg_info_centrocusto["func"]="xt_buildeditcontrol";
$control_flg_info_centrocusto["params"] = array();
$control_flg_info_centrocusto["params"]["field"]="flg_info_centrocusto";
$control_flg_info_centrocusto["params"]["value"]=@$data["flg_info_centrocusto"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_info_centrocusto["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_info_centrocusto["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_info_centrocusto["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_info_centrocusto["params"]["mode"]="inline_edit";
else
	$control_flg_info_centrocusto["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_info_centrocusto", $detailKeys))	
	$xt->assign("flg_info_centrocusto_editcontrol",$control_flg_info_centrocusto);
else if(array_key_exists("flg_info_centrocusto",$data))
{
				$value = GetData($data,"flg_info_centrocusto", "Checkbox");
		$xt->assign("flg_info_centrocusto_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();


if($lockingObj && $enableCtrlsForEditing)
	$pageObject->AddJSCode("window.timeid".$id."=setInterval( function() {ConfirmLock('personal_info_edit.php','".jsreplace($strTableName)."','".$skeys."',".$id.",'".$inlineedit."');},".($lockingObj->ConfirmTime*1000).");");

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
			$strTableName = "personal_info";		
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
	$strTableName = "personal_info";		
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
