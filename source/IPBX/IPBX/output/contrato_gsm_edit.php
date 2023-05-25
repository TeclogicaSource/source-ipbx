<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/contrato_gsm_variables.php");
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
$templatefile = "contrato_gsm_edit.htm";

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
$keys["id_contrato"]=postvalue("editid1");
$savedKeys["id_contrato"]=postvalue("editid1");
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
	$value = postvalue("value_num_contrato_".$id);
	$type=postvalue("type_num_contrato_".$id);
	if(FieldSubmitted("num_contrato_".$id))
	{
		
		$value=prepare_for_db("num_contrato",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "num_contrato"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["num_contrato"]=$value;
		
		
	}


//	processibng num_contrato - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_nm_operadora_".$id);
	$type=postvalue("type_nm_operadora_".$id);
	if(FieldSubmitted("nm_operadora_".$id))
	{
		
		$value=prepare_for_db("nm_operadora",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "nm_operadora"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["nm_operadora"]=$value;
		
		
	}


//	processibng nm_operadora - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_Vingencia_".$id);
	$type=postvalue("type_Vingencia_".$id);
	if(FieldSubmitted("Vingencia_".$id))
	{
		
		$value=prepare_for_db("Vingencia",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "Vingencia"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["Vingencia"]=$value;
		
		
	}


//	processibng Vingencia - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_ativo_".$id);
	$type=postvalue("type_flg_ativo_".$id);
	if(FieldSubmitted("flg_ativo_".$id))
	{
		
		$value=prepare_for_db("flg_ativo",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_ativo"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_ativo"]=$value;
		
		
	}


//	processibng flg_ativo - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_VC1_CAD_".$id);
	$type=postvalue("type_VC1_CAD_".$id);
	if(FieldSubmitted("VC1_CAD_".$id))
	{
		
		$value=prepare_for_db("VC1_CAD",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "VC1_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["VC1_CAD"]=$value;
		
		
	}


//	processibng VC1_CAD - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_VC1_VLR_".$id);
	$type=postvalue("type_VC1_VLR_".$id);
	if(FieldSubmitted("VC1_VLR_".$id))
	{
		
		$value=prepare_for_db("VC1_VLR",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "VC1_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["VC1_VLR"]=$value;
		
		
	}


//	processibng VC1_VLR - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_VC2VC3_CAD_".$id);
	$type=postvalue("type_VC2VC3_CAD_".$id);
	if(FieldSubmitted("VC2VC3_CAD_".$id))
	{
		
		$value=prepare_for_db("VC2VC3_CAD",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "VC2VC3_CAD"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["VC2VC3_CAD"]=$value;
		
		
	}


//	processibng VC2VC3_CAD - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_VC2VC3_VLR_".$id);
	$type=postvalue("type_VC2VC3_VLR_".$id);
	if(FieldSubmitted("VC2VC3_VLR_".$id))
	{
		
		$value=prepare_for_db("VC2VC3_VLR",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "VC2VC3_VLR"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["VC2VC3_VLR"]=$value;
		
		
	}


//	processibng VC2VC3_VLR - end
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
		$keyGetQ.="editid1=".rawurldecode($keys["id_contrato"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: contrato_gsm_".$pageObject->getPageType().".php?".$keyGetQ);
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
$query = $queryData_contrato_gsm->Copy();



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
		header("Location: contrato_gsm_list.php?a=return");
		exit();
	}
	else
		$data=array();
}

$readonlyfields=array();


	



if($readevalues)
{
	$data["num_contrato"]=$evalues["num_contrato"];
	$data["nm_operadora"]=$evalues["nm_operadora"];
	$data["Vingencia"]=$evalues["Vingencia"];
	$data["flg_ativo"]=$evalues["flg_ativo"];
	$data["VC1_CAD"]=$evalues["VC1_CAD"];
	$data["VC1_VLR"]=$evalues["VC1_VLR"];
	$data["VC2VC3_CAD"]=$evalues["VC2VC3_CAD"];
	$data["VC2VC3_VLR"]=$evalues["VC2VC3_VLR"];
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
	$xt->assign("VC1_CAD_fieldblock",true);
	$xt->assign("VC1_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("VC1_CAD_label","<label for=\"".GetInputElementId("VC1_CAD", $id)."\">","</label>");
	$xt->assign("VC1_VLR_fieldblock",true);
	$xt->assign("VC1_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("VC1_VLR_label","<label for=\"".GetInputElementId("VC1_VLR", $id)."\">","</label>");
	$xt->assign("VC2VC3_CAD_fieldblock",true);
	$xt->assign("VC2VC3_CAD_label",true);
	if(isEnableSection508())
		$xt->assign_section("VC2VC3_CAD_label","<label for=\"".GetInputElementId("VC2VC3_CAD", $id)."\">","</label>");
	$xt->assign("VC2VC3_VLR_fieldblock",true);
	$xt->assign("VC2VC3_VLR_label",true);
	if(isEnableSection508())
		$xt->assign_section("VC2VC3_VLR_label","<label for=\"".GetInputElementId("VC2VC3_VLR", $id)."\">","</label>");
	
	if(strlen($onsubmit))
		$onsubmit="onSubmit=\"".htmlspecialchars($onsubmit)."\"";
	$pageObject->body["begin"] .= $includes;
	
	if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
	
	
	$hiddenKeys = '';
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid1\" value=\"".htmlspecialchars($keys["id_contrato"])."\">";
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id_contrato", "")));
	
	$xt->assign('editForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="contrato_gsm_edit.php" '.$onsubmit.'>'.
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
	
	if(GetFieldIndex("id_contrato"))
		$key[]=GetFieldIndex("id_contrato");
	
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
					$next[1]=$row_next["id_contrato"];
			}
			
			$res_prev=db_query($sql_prev,$conn);	
			if($row_prev=db_fetch_array($res_prev))
			{
					$prev[1]=$row_prev["id_contrato"];
			}
		}
	}
}
	$nextlink=$prevlink="";
	// reset button handler
	$resetEditors="";
	$unblRec="UnlockRecord('contrato_gsm_edit.php','".$skeys."','',function(){window.location.href='contrato_gsm_edit.php?";
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
	$xt->assign("backbutton_attrs","onclick=\"UnlockRecord('contrato_gsm_edit.php','".$skeys."','',function(){window.location.href='contrato_gsm_list.php?a=return'});return false;\"");
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
$showKeys[] = rawurlencode($keys["id_contrato"]);
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
//	control - num_contrato
$control_num_contrato=array();
$control_num_contrato["func"]="xt_buildeditcontrol";
$control_num_contrato["params"] = array();
$control_num_contrato["params"]["field"]="num_contrato";
$control_num_contrato["params"]["value"]=@$data["num_contrato"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_num_contrato["params"]["validate"]=$arrValidate;
//	End Add validation
$control_num_contrato["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_num_contrato["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_num_contrato["params"]["mode"]="inline_edit";
else
	$control_num_contrato["params"]["mode"]="edit";
if(!$detailKeys || !in_array("num_contrato", $detailKeys))	
	$xt->assign("num_contrato_editcontrol",$control_num_contrato);
else if(array_key_exists("num_contrato",$data))
{
				$value = ProcessLargeText(GetData($data,"num_contrato", ""),"field=num%5Fcontrato","",MODE_VIEW);
		$xt->assign("num_contrato_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - nm_operadora
$control_nm_operadora=array();
$control_nm_operadora["func"]="xt_buildeditcontrol";
$control_nm_operadora["params"] = array();
$control_nm_operadora["params"]["field"]="nm_operadora";
$control_nm_operadora["params"]["value"]=@$data["nm_operadora"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_nm_operadora["params"]["validate"]=$arrValidate;
//	End Add validation
$control_nm_operadora["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_nm_operadora["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_nm_operadora["params"]["mode"]="inline_edit";
else
	$control_nm_operadora["params"]["mode"]="edit";
if(!$detailKeys || !in_array("nm_operadora", $detailKeys))	
	$xt->assign("nm_operadora_editcontrol",$control_nm_operadora);
else if(array_key_exists("nm_operadora",$data))
{
				$value = ProcessLargeText(GetData($data,"nm_operadora", ""),"field=nm%5Foperadora","",MODE_VIEW);
		$xt->assign("nm_operadora_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - Vingencia
$control_Vingencia=array();
$control_Vingencia["func"]="xt_buildeditcontrol";
$control_Vingencia["params"] = array();
$control_Vingencia["params"]["field"]="Vingencia";
$control_Vingencia["params"]["value"]=@$data["Vingencia"];
//	Begin Add validation
$arrValidate = array();	

$control_Vingencia["params"]["validate"]=$arrValidate;
//	End Add validation
$control_Vingencia["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_Vingencia["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_Vingencia["params"]["mode"]="inline_edit";
else
	$control_Vingencia["params"]["mode"]="edit";
if(!$detailKeys || !in_array("Vingencia", $detailKeys))	
	$xt->assign("Vingencia_editcontrol",$control_Vingencia);
else if(array_key_exists("Vingencia",$data))
{
				$value = ProcessLargeText(GetData($data,"Vingencia", "Short Date"),"field=Vingencia","",MODE_VIEW);
		$xt->assign("Vingencia_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_ativo
$control_flg_ativo=array();
$control_flg_ativo["func"]="xt_buildeditcontrol";
$control_flg_ativo["params"] = array();
$control_flg_ativo["params"]["field"]="flg_ativo";
$control_flg_ativo["params"]["value"]=@$data["flg_ativo"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_ativo["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_ativo["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_ativo["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_ativo["params"]["mode"]="inline_edit";
else
	$control_flg_ativo["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_ativo", $detailKeys))	
	$xt->assign("flg_ativo_editcontrol",$control_flg_ativo);
else if(array_key_exists("flg_ativo",$data))
{
				$value = GetData($data,"flg_ativo", "Checkbox");
		$xt->assign("flg_ativo_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - VC1_CAD
$control_VC1_CAD=array();
$control_VC1_CAD["func"]="xt_buildeditcontrol";
$control_VC1_CAD["params"] = array();
$control_VC1_CAD["params"]["field"]="VC1_CAD";
$control_VC1_CAD["params"]["value"]=@$data["VC1_CAD"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_VC1_CAD["params"]["validate"]=$arrValidate;
//	End Add validation
$control_VC1_CAD["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_VC1_CAD["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_VC1_CAD["params"]["mode"]="inline_edit";
else
	$control_VC1_CAD["params"]["mode"]="edit";
if(!$detailKeys || !in_array("VC1_CAD", $detailKeys))	
	$xt->assign("VC1_CAD_editcontrol",$control_VC1_CAD);
else if(array_key_exists("VC1_CAD",$data))
{
				$value=DisplayLookupWizard("VC1_CAD",$data["VC1_CAD"],$data,"",MODE_VIEW);
		$xt->assign("VC1_CAD_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - VC1_VLR
$control_VC1_VLR=array();
$control_VC1_VLR["func"]="xt_buildeditcontrol";
$control_VC1_VLR["params"] = array();
$control_VC1_VLR["params"]["field"]="VC1_VLR";
$control_VC1_VLR["params"]["value"]=@$data["VC1_VLR"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Currency");
$arrValidate['basicValidate'][] = $validatetype;

$arrValidate['basicValidate'][] = "IsRequired";

$control_VC1_VLR["params"]["validate"]=$arrValidate;
//	End Add validation
$control_VC1_VLR["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_VC1_VLR["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_VC1_VLR["params"]["mode"]="inline_edit";
else
	$control_VC1_VLR["params"]["mode"]="edit";
if(!$detailKeys || !in_array("VC1_VLR", $detailKeys))	
	$xt->assign("VC1_VLR_editcontrol",$control_VC1_VLR);
else if(array_key_exists("VC1_VLR",$data))
{
				$value = ProcessLargeText(GetData($data,"VC1_VLR", "Currency"),"field=VC1%5FVLR","",MODE_VIEW);
		$xt->assign("VC1_VLR_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - VC2VC3_CAD
$control_VC2VC3_CAD=array();
$control_VC2VC3_CAD["func"]="xt_buildeditcontrol";
$control_VC2VC3_CAD["params"] = array();
$control_VC2VC3_CAD["params"]["field"]="VC2VC3_CAD";
$control_VC2VC3_CAD["params"]["value"]=@$data["VC2VC3_CAD"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_VC2VC3_CAD["params"]["validate"]=$arrValidate;
//	End Add validation
$control_VC2VC3_CAD["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_VC2VC3_CAD["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_VC2VC3_CAD["params"]["mode"]="inline_edit";
else
	$control_VC2VC3_CAD["params"]["mode"]="edit";
if(!$detailKeys || !in_array("VC2VC3_CAD", $detailKeys))	
	$xt->assign("VC2VC3_CAD_editcontrol",$control_VC2VC3_CAD);
else if(array_key_exists("VC2VC3_CAD",$data))
{
				$value=DisplayLookupWizard("VC2VC3_CAD",$data["VC2VC3_CAD"],$data,"",MODE_VIEW);
		$xt->assign("VC2VC3_CAD_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - VC2VC3_VLR
$control_VC2VC3_VLR=array();
$control_VC2VC3_VLR["func"]="xt_buildeditcontrol";
$control_VC2VC3_VLR["params"] = array();
$control_VC2VC3_VLR["params"]["field"]="VC2VC3_VLR";
$control_VC2VC3_VLR["params"]["value"]=@$data["VC2VC3_VLR"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Currency");
$arrValidate['basicValidate'][] = $validatetype;

$arrValidate['basicValidate'][] = "IsRequired";

$control_VC2VC3_VLR["params"]["validate"]=$arrValidate;
//	End Add validation
$control_VC2VC3_VLR["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_VC2VC3_VLR["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_VC2VC3_VLR["params"]["mode"]="inline_edit";
else
	$control_VC2VC3_VLR["params"]["mode"]="edit";
if(!$detailKeys || !in_array("VC2VC3_VLR", $detailKeys))	
	$xt->assign("VC2VC3_VLR_editcontrol",$control_VC2VC3_VLR);
else if(array_key_exists("VC2VC3_VLR",$data))
{
				$value = ProcessLargeText(GetData($data,"VC2VC3_VLR", "Currency"),"field=VC2VC3%5FVLR","",MODE_VIEW);
		$xt->assign("VC2VC3_VLR_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();


if($lockingObj && $enableCtrlsForEditing)
	$pageObject->AddJSCode("window.timeid".$id."=setInterval( function() {ConfirmLock('contrato_gsm_edit.php','".jsreplace($strTableName)."','".$skeys."',".$id.",'".$inlineedit."');},".($lockingObj->ConfirmTime*1000).");");

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
			$strTableName = "contrato_gsm";		
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
	$strTableName = "contrato_gsm";		
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
