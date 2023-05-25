<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/conf_sala_variables.php");
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
$templatefile = "conf_sala_edit.htm";

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

$params["calendar"] = true;
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
$keys["id_conf"]=postvalue("editid1");
$savedKeys["id_conf"]=postvalue("editid1");
$skeys.=rawurlencode(postvalue("editid1"))."&";
if($skeys!="")
	$skeys=substr($skeys,0,-1);
	
$isShowDetailTables = displayDetailsOn($strTableName,PAGE_EDIT);	
$dpParams = array();
if($isShowDetailTables && !$inlineedit)
{
	$ids = $id;
	$mKeys["conf_sala_convidado"] = GetMasterKeysByDetailTable("conf_sala_convidado", $strTableName);
	$dpParams['strTableNames'][] = "conf_sala_convidado";
	$dpParams['ids'][] = ++$ids;
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
	$value = postvalue("value_nm_sala_".$id);
	$type=postvalue("type_nm_sala_".$id);
	if(FieldSubmitted("nm_sala_".$id))
	{
		
		$value=prepare_for_db("nm_sala",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "nm_sala"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["nm_sala"]=$value;
		
		
	}


//	processibng nm_sala - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_dsc_sala_".$id);
	$type=postvalue("type_dsc_sala_".$id);
	if(FieldSubmitted("dsc_sala_".$id))
	{
		
		$value=prepare_for_db("dsc_sala",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dsc_sala"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dsc_sala"]=$value;
		
		
	}


//	processibng dsc_sala - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_dt_conferencia_".$id);
	$type=postvalue("type_dt_conferencia_".$id);
	if(FieldSubmitted("dt_conferencia_".$id))
	{
		
		$value=prepare_for_db("dt_conferencia",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dt_conferencia"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dt_conferencia"]=$value;
		
		
	}


//	processibng dt_conferencia - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_pass_".$id);
	$type=postvalue("type_flg_pass_".$id);
	if(FieldSubmitted("flg_pass_".$id))
	{
		
		$value=prepare_for_db("flg_pass",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_pass"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_pass"]=$value;
		
		
	}


//	processibng flg_pass - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_rec_".$id);
	$type=postvalue("type_flg_rec_".$id);
	if(FieldSubmitted("flg_rec_".$id))
	{
		
		$value=prepare_for_db("flg_rec",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_rec"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_rec"]=$value;
		
		
	}


//	processibng flg_rec - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_hr_inicio_".$id);
	$type=postvalue("type_hr_inicio_".$id);
	if(FieldSubmitted("hr_inicio_".$id))
	{
		
		$value=prepare_for_db("hr_inicio",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "hr_inicio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["hr_inicio"]=$value;
		
		
	}


//	processibng hr_inicio - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_hr_fim_".$id);
	$type=postvalue("type_hr_fim_".$id);
	if(FieldSubmitted("hr_fim_".$id))
	{
		
		$value=prepare_for_db("hr_fim",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "hr_fim"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["hr_fim"]=$value;
		
		
	}


//	processibng hr_fim - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_dt_expiracao_".$id);
	$type=postvalue("type_dt_expiracao_".$id);
	if(FieldSubmitted("dt_expiracao_".$id))
	{
		
		$value=prepare_for_db("dt_expiracao",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dt_expiracao"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dt_expiracao"]=$value;
		
		
	}


//	processibng dt_expiracao - end
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
		$keyGetQ.="editid1=".rawurldecode($keys["id_conf"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: conf_sala_".$pageObject->getPageType().".php?".$keyGetQ);
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
$query = $queryData_conf_sala->Copy();



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
		header("Location: conf_sala_list.php?a=return");
		exit();
	}
	else
		$data=array();
}

$readonlyfields=array();


	



if($readevalues)
{
	$data["nm_sala"]=$evalues["nm_sala"];
	$data["dsc_sala"]=$evalues["dsc_sala"];
	$data["dt_conferencia"]=$evalues["dt_conferencia"];
	$data["flg_pass"]=$evalues["flg_pass"];
	$data["flg_rec"]=$evalues["flg_rec"];
	$data["hr_inicio"]=$evalues["hr_inicio"];
	$data["hr_fim"]=$evalues["hr_fim"];
	$data["dt_expiracao"]=$evalues["dt_expiracao"];
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
	$xt->assign("nm_sala_fieldblock",true);
	$xt->assign("nm_sala_label",true);
	if(isEnableSection508())
		$xt->assign_section("nm_sala_label","<label for=\"".GetInputElementId("nm_sala", $id)."\">","</label>");
	$xt->assign("dsc_sala_fieldblock",true);
	$xt->assign("dsc_sala_label",true);
	if(isEnableSection508())
		$xt->assign_section("dsc_sala_label","<label for=\"".GetInputElementId("dsc_sala", $id)."\">","</label>");
	$xt->assign("dt_conferencia_fieldblock",true);
	$xt->assign("dt_conferencia_label",true);
	if(isEnableSection508())
		$xt->assign_section("dt_conferencia_label","<label for=\"".GetInputElementId("dt_conferencia", $id)."\">","</label>");
	$xt->assign("flg_pass_fieldblock",true);
	$xt->assign("flg_pass_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_pass_label","<label for=\"".GetInputElementId("flg_pass", $id)."\">","</label>");
	$xt->assign("flg_rec_fieldblock",true);
	$xt->assign("flg_rec_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_rec_label","<label for=\"".GetInputElementId("flg_rec", $id)."\">","</label>");
	$xt->assign("hr_inicio_fieldblock",true);
	$xt->assign("hr_inicio_label",true);
	if(isEnableSection508())
		$xt->assign_section("hr_inicio_label","<label for=\"".GetInputElementId("hr_inicio", $id)."\">","</label>");
	$xt->assign("hr_fim_fieldblock",true);
	$xt->assign("hr_fim_label",true);
	if(isEnableSection508())
		$xt->assign_section("hr_fim_label","<label for=\"".GetInputElementId("hr_fim", $id)."\">","</label>");
	$xt->assign("dt_expiracao_fieldblock",true);
	$xt->assign("dt_expiracao_label",true);
	if(isEnableSection508())
		$xt->assign_section("dt_expiracao_label","<label for=\"".GetInputElementId("dt_expiracao", $id)."\">","</label>");
	
	if(strlen($onsubmit))
		$onsubmit="onSubmit=\"".htmlspecialchars($onsubmit)."\"";
	$pageObject->body["begin"] .= $includes;
	
	if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
	
	
	$hiddenKeys = '';
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid1\" value=\"".htmlspecialchars($keys["id_conf"])."\">";
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id_conf", "")));
	
	$xt->assign('editForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="conf_sala_edit.php" '.$onsubmit.'>'.
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
	
	if(GetFieldIndex("id_conf"))
		$key[]=GetFieldIndex("id_conf");
	
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
					$next[1]=$row_next["id_conf"];
			}
			
			$res_prev=db_query($sql_prev,$conn);	
			if($row_prev=db_fetch_array($res_prev))
			{
					$prev[1]=$row_prev["id_conf"];
			}
		}
	}
}
	$nextlink=$prevlink="";
	// reset button handler
	$resetEditors="";
	$unblRec="UnlockRecord('conf_sala_edit.php','".$skeys."','',function(){window.location.href='conf_sala_edit.php?";
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
	$xt->assign("backbutton_attrs","onclick=\"UnlockRecord('conf_sala_edit.php','".$skeys."','',function(){window.location.href='conf_sala_list.php?a=return'});return false;\"");
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
$showKeys[] = rawurlencode($keys["id_conf"]);
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
//	control - nm_sala
$control_nm_sala=array();
$control_nm_sala["func"]="xt_buildeditcontrol";
$control_nm_sala["params"] = array();
$control_nm_sala["params"]["field"]="nm_sala";
$control_nm_sala["params"]["value"]=@$data["nm_sala"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_nm_sala["params"]["validate"]=$arrValidate;
//	End Add validation
$control_nm_sala["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_nm_sala["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_nm_sala["params"]["mode"]="inline_edit";
else
	$control_nm_sala["params"]["mode"]="edit";
if(!$detailKeys || !in_array("nm_sala", $detailKeys))	
	$xt->assign("nm_sala_editcontrol",$control_nm_sala);
else if(array_key_exists("nm_sala",$data))
{
				$value = ProcessLargeText(GetData($data,"nm_sala", ""),"field=nm%5Fsala","",MODE_VIEW);
		$xt->assign("nm_sala_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - dsc_sala
$control_dsc_sala=array();
$control_dsc_sala["func"]="xt_buildeditcontrol";
$control_dsc_sala["params"] = array();
$control_dsc_sala["params"]["field"]="dsc_sala";
$control_dsc_sala["params"]["value"]=@$data["dsc_sala"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_dsc_sala["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dsc_sala["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dsc_sala["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dsc_sala["params"]["mode"]="inline_edit";
else
	$control_dsc_sala["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dsc_sala", $detailKeys))	
	$xt->assign("dsc_sala_editcontrol",$control_dsc_sala);
else if(array_key_exists("dsc_sala",$data))
{
				$value = ProcessLargeText(GetData($data,"dsc_sala", ""),"field=dsc%5Fsala","",MODE_VIEW);
		$xt->assign("dsc_sala_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - dt_conferencia
$control_dt_conferencia=array();
$control_dt_conferencia["func"]="xt_buildeditcontrol";
$control_dt_conferencia["params"] = array();
$control_dt_conferencia["params"]["field"]="dt_conferencia";
$control_dt_conferencia["params"]["value"]=@$data["dt_conferencia"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_dt_conferencia["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dt_conferencia["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dt_conferencia["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dt_conferencia["params"]["mode"]="inline_edit";
else
	$control_dt_conferencia["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dt_conferencia", $detailKeys))	
	$xt->assign("dt_conferencia_editcontrol",$control_dt_conferencia);
else if(array_key_exists("dt_conferencia",$data))
{
				$value = ProcessLargeText(GetData($data,"dt_conferencia", "Short Date"),"field=dt%5Fconferencia","",MODE_VIEW);
		$xt->assign("dt_conferencia_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_pass
$control_flg_pass=array();
$control_flg_pass["func"]="xt_buildeditcontrol";
$control_flg_pass["params"] = array();
$control_flg_pass["params"]["field"]="flg_pass";
$control_flg_pass["params"]["value"]=@$data["flg_pass"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_pass["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_pass["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_pass["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_pass["params"]["mode"]="inline_edit";
else
	$control_flg_pass["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_pass", $detailKeys))	
	$xt->assign("flg_pass_editcontrol",$control_flg_pass);
else if(array_key_exists("flg_pass",$data))
{
				$value = GetData($data,"flg_pass", "Checkbox");
		$xt->assign("flg_pass_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_rec
$control_flg_rec=array();
$control_flg_rec["func"]="xt_buildeditcontrol";
$control_flg_rec["params"] = array();
$control_flg_rec["params"]["field"]="flg_rec";
$control_flg_rec["params"]["value"]=@$data["flg_rec"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_rec["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_rec["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_rec["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_rec["params"]["mode"]="inline_edit";
else
	$control_flg_rec["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_rec", $detailKeys))	
	$xt->assign("flg_rec_editcontrol",$control_flg_rec);
else if(array_key_exists("flg_rec",$data))
{
				$value = GetData($data,"flg_rec", "Checkbox");
		$xt->assign("flg_rec_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - hr_inicio
$control_hr_inicio=array();
$control_hr_inicio["func"]="xt_buildeditcontrol";
$control_hr_inicio["params"] = array();
$control_hr_inicio["params"]["field"]="hr_inicio";
$control_hr_inicio["params"]["value"]=@$data["hr_inicio"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_hr_inicio["params"]["validate"]=$arrValidate;
//	End Add validation
$control_hr_inicio["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_hr_inicio["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_hr_inicio["params"]["mode"]="inline_edit";
else
	$control_hr_inicio["params"]["mode"]="edit";
if(!$detailKeys || !in_array("hr_inicio", $detailKeys))	
	$xt->assign("hr_inicio_editcontrol",$control_hr_inicio);
else if(array_key_exists("hr_inicio",$data))
{
				$value = ProcessLargeText(GetData($data,"hr_inicio", "Time"),"field=hr%5Finicio","",MODE_VIEW);
		$xt->assign("hr_inicio_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - hr_fim
$control_hr_fim=array();
$control_hr_fim["func"]="xt_buildeditcontrol";
$control_hr_fim["params"] = array();
$control_hr_fim["params"]["field"]="hr_fim";
$control_hr_fim["params"]["value"]=@$data["hr_fim"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Time");
$arrValidate['basicValidate'][] = $validatetype;

$arrValidate['basicValidate'][] = "IsRequired";

$control_hr_fim["params"]["validate"]=$arrValidate;
//	End Add validation
$control_hr_fim["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_hr_fim["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_hr_fim["params"]["mode"]="inline_edit";
else
	$control_hr_fim["params"]["mode"]="edit";
if(!$detailKeys || !in_array("hr_fim", $detailKeys))	
	$xt->assign("hr_fim_editcontrol",$control_hr_fim);
else if(array_key_exists("hr_fim",$data))
{
				$value = ProcessLargeText(GetData($data,"hr_fim", "Time"),"field=hr%5Ffim","",MODE_VIEW);
		$xt->assign("hr_fim_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - dt_expiracao
$control_dt_expiracao=array();
$control_dt_expiracao["func"]="xt_buildeditcontrol";
$control_dt_expiracao["params"] = array();
$control_dt_expiracao["params"]["field"]="dt_expiracao";
$control_dt_expiracao["params"]["value"]=@$data["dt_expiracao"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_dt_expiracao["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dt_expiracao["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dt_expiracao["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dt_expiracao["params"]["mode"]="inline_edit";
else
	$control_dt_expiracao["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dt_expiracao", $detailKeys))	
	$xt->assign("dt_expiracao_editcontrol",$control_dt_expiracao);
else if(array_key_exists("dt_expiracao",$data))
{
				$value = ProcessLargeText(GetData($data,"dt_expiracao", "Short Date"),"field=dt%5Fexpiracao","",MODE_VIEW);
		$xt->assign("dt_expiracao_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();


if($lockingObj && $enableCtrlsForEditing)
	$pageObject->AddJSCode("window.timeid".$id."=setInterval( function() {ConfirmLock('conf_sala_edit.php','".jsreplace($strTableName)."','".$skeys."',".$id.",'".$inlineedit."');},".($lockingObj->ConfirmTime*1000).");");

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
			$strTableName = "conf_sala";		
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
	$strTableName = "conf_sala";		
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
