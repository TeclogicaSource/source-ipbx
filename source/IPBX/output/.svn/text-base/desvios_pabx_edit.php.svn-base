<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/desvios_pabx_variables.php");
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
$templatefile = ( $inlineedit ) ? "desvios_pabx_inline_edit.htm" : "desvios_pabx_edit.htm";

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
$keys["id_desvio"]=postvalue("editid1");
$savedKeys["id_desvio"]=postvalue("editid1");
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

	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_ramal_".$id);
	$type=postvalue("type_ramal_".$id);
	if(FieldSubmitted("ramal_".$id))
	{
		
		$value=prepare_for_db("ramal",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ramal"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ramal"]=$value;
		
		
	}


//	processibng ramal - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_destino_".$id);
	$type=postvalue("type_destino_".$id);
	if(FieldSubmitted("destino_".$id))
	{
		
		$value=prepare_for_db("destino",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "destino"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["destino"]=$value;
		
		
	}


//	processibng destino - end
	}
	$condition = $inlineedit;

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
	$condition = $inlineedit;

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
	$condition = $inlineedit;

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
	$condition = $inlineedit;

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
	$condition = $inlineedit;

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
	$condition = $inlineedit;

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
	$condition = $inlineedit;

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
	$condition = $inlineedit;

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
	$condition = $inlineedit;

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
		$keyGetQ.="editid1=".rawurldecode($keys["id_desvio"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: desvios_pabx_".$pageObject->getPageType().".php?".$keyGetQ);
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
$query = $queryData_desvios_pabx->Copy();



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
		header("Location: desvios_pabx_list.php?a=return");
		exit();
	}
	else
		$data=array();
}

$readonlyfields=array();


	



if($readevalues)
{
	$data["ramal"]=$evalues["ramal"];
	$data["destino"]=$evalues["destino"];
	$data["seg"]=$evalues["seg"];
	$data["ter"]=$evalues["ter"];
	$data["qua"]=$evalues["qua"];
	$data["qui"]=$evalues["qui"];
	$data["sex"]=$evalues["sex"];
	$data["sab"]=$evalues["sab"];
	$data["dom"]=$evalues["dom"];
	$data["hr_inicio"]=$evalues["hr_inicio"];
	$data["hr_fim"]=$evalues["hr_fim"];
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
	
	if(strlen($onsubmit))
		$onsubmit="onSubmit=\"".htmlspecialchars($onsubmit)."\"";
	$pageObject->body["begin"] .= $includes;
	
	if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
	
	
	$hiddenKeys = '';
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid1\" value=\"".htmlspecialchars($keys["id_desvio"])."\">";
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id_desvio", "")));
	
	$xt->assign('editForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="desvios_pabx_edit.php" '.$onsubmit.'>'.
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
	
	if(GetFieldIndex("id_desvio"))
		$key[]=GetFieldIndex("id_desvio");
	
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
					$next[1]=$row_next["id_desvio"];
			}
			
			$res_prev=db_query($sql_prev,$conn);	
			if($row_prev=db_fetch_array($res_prev))
			{
					$prev[1]=$row_prev["id_desvio"];
			}
		}
	}
}
	$nextlink=$prevlink="";
	// reset button handler
	$resetEditors="";
	$unblRec="UnlockRecord('desvios_pabx_edit.php','".$skeys."','',function(){window.location.href='desvios_pabx_edit.php?";
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
	$xt->assign("backbutton_attrs","onclick=\"UnlockRecord('desvios_pabx_edit.php','".$skeys."','',function(){window.location.href='desvios_pabx_list.php?a=return'});return false;\"");
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
$showKeys[] = rawurlencode($keys["id_desvio"]);
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_desvio"]));


//	ramal - 

		$value="";
				$value=DisplayLookupWizard("ramal",$data["ramal"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ramal";
				$showRawValues[] = substr($data["ramal"],0,100);

//	hr_inicio - Time

		$value="";
				$value = ProcessLargeText(GetData($data,"hr_inicio", "Time"),"field=hr%5Finicio".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "hr_inicio";
				$showRawValues[] = substr($data["hr_inicio"],0,100);

//	hr_fim - Time

		$value="";
				$value = ProcessLargeText(GetData($data,"hr_fim", "Time"),"field=hr%5Ffim".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "hr_fim";
				$showRawValues[] = substr($data["hr_fim"],0,100);

//	destino - 

		$value="";
				$value = ProcessLargeText(GetData($data,"destino", ""),"field=destino".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "destino";
				$showRawValues[] = substr($data["destino"],0,100);

//	seg - Checkbox

		$value="";
				$value = GetData($data,"seg", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "seg";
				$showRawValues[] = substr($data["seg"],0,100);

//	ter - Checkbox

		$value="";
				$value = GetData($data,"ter", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "ter";
				$showRawValues[] = substr($data["ter"],0,100);

//	qua - Checkbox

		$value="";
				$value = GetData($data,"qua", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "qua";
				$showRawValues[] = substr($data["qua"],0,100);

//	qui - Checkbox

		$value="";
				$value = GetData($data,"qui", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "qui";
				$showRawValues[] = substr($data["qui"],0,100);

//	sex - Checkbox

		$value="";
				$value = GetData($data,"sex", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "sex";
				$showRawValues[] = substr($data["sex"],0,100);

//	sab - Checkbox

		$value="";
				$value = GetData($data,"sab", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "sab";
				$showRawValues[] = substr($data["sab"],0,100);

//	dom - Checkbox

		$value="";
				$value = GetData($data,"dom", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "dom";
				$showRawValues[] = substr($data["dom"],0,100);
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
//	control - ramal
$control_ramal=array();
$control_ramal["func"]="xt_buildeditcontrol";
$control_ramal["params"] = array();
$control_ramal["params"]["field"]="ramal";
$control_ramal["params"]["value"]=@$data["ramal"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_ramal["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ramal["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ramal["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ramal["params"]["mode"]="inline_edit";
else
	$control_ramal["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ramal", $detailKeys))	
	$xt->assign("ramal_editcontrol",$control_ramal);
else if(array_key_exists("ramal",$data))
{
				$value=DisplayLookupWizard("ramal",$data["ramal"],$data,"",MODE_VIEW);
		$xt->assign("ramal_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - destino
$control_destino=array();
$control_destino["func"]="xt_buildeditcontrol";
$control_destino["params"] = array();
$control_destino["params"]["field"]="destino";
$control_destino["params"]["value"]=@$data["destino"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_destino["params"]["validate"]=$arrValidate;
//	End Add validation
$control_destino["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_destino["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_destino["params"]["mode"]="inline_edit";
else
	$control_destino["params"]["mode"]="edit";
if(!$detailKeys || !in_array("destino", $detailKeys))	
	$xt->assign("destino_editcontrol",$control_destino);
else if(array_key_exists("destino",$data))
{
				$value = ProcessLargeText(GetData($data,"destino", ""),"field=destino","",MODE_VIEW);
		$xt->assign("destino_editcontrol",$value);
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
$pageObject->addCommonJs();


if($lockingObj && $enableCtrlsForEditing)
	$pageObject->AddJSCode("window.timeid".$id."=setInterval( function() {ConfirmLock('desvios_pabx_edit.php','".jsreplace($strTableName)."','".$skeys."',".$id.",'".$inlineedit."');},".($lockingObj->ConfirmTime*1000).");");

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
			$strTableName = "desvios_pabx";		
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
	$strTableName = "desvios_pabx";		
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
