<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/cc_tipos_pausa_atend_variables.php");
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
$templatefile = ( $inlineedit ) ? "cc_tipos_pausa_atend_inline_edit.htm" : "cc_tipos_pausa_atend_edit.htm";

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
$keys["idt_pausa_atend"]=postvalue("editid1");
$savedKeys["idt_pausa_atend"]=postvalue("editid1");
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
	$value = postvalue("value_dt_acao_pausa_".$id);
	$type=postvalue("type_dt_acao_pausa_".$id);
	if(FieldSubmitted("dt_acao_pausa_".$id))
	{
		
		$value=prepare_for_db("dt_acao_pausa",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dt_acao_pausa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dt_acao_pausa"]=$value;
		
		
	}


//	processibng dt_acao_pausa - end
	}
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_hr_acao_pausa_".$id);
	$type=postvalue("type_hr_acao_pausa_".$id);
	if(FieldSubmitted("hr_acao_pausa_".$id))
	{
		
		$value=prepare_for_db("hr_acao_pausa",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "hr_acao_pausa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["hr_acao_pausa"]=$value;
		
		
	}


//	processibng hr_acao_pausa - end
	}
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_tp_pausa_".$id);
	$type=postvalue("type_tp_pausa_".$id);
	if(FieldSubmitted("tp_pausa_".$id))
	{
		
		$value=prepare_for_db("tp_pausa",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "tp_pausa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["tp_pausa"]=$value;
		
		
	}


//	processibng tp_pausa - end
	}
	$condition = 1;

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
	$condition = 1;

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
	if($value!==false)
	{	





		
	if(0 && "name"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["name"]=$value;
		
		
	}


//	processibng name - end
	}
	$condition = 1;

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
	$condition = 1;

	if($condition)
	{
	$value = postvalue("value_tipo_pausa_".$id);
	$type=postvalue("type_tipo_pausa_".$id);
	if(FieldSubmitted("tipo_pausa_".$id))
	{
		
		$value=prepare_for_db("tipo_pausa",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "tipo_pausa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["tipo_pausa"]=$value;
		
		
	}


//	processibng tipo_pausa - end
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
		$keyGetQ.="editid1=".rawurldecode($keys["idt_pausa_atend"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: cc_tipos_pausa_atend_".$pageObject->getPageType().".php?".$keyGetQ);
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
$query = $queryData_cc_tipos_pausa_atend->Copy();



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
		header("Location: cc_tipos_pausa_atend_list.php?a=return");
		exit();
	}
	else
		$data=array();
}

$readonlyfields=array();


	



if($readevalues)
{
	$data["dt_acao_pausa"]=$evalues["dt_acao_pausa"];
	$data["hr_acao_pausa"]=$evalues["hr_acao_pausa"];
	$data["tp_pausa"]=$evalues["tp_pausa"];
	$data["Agente"]=$evalues["Agente"];
	$data["name"]=$evalues["name"];
	$data["Fila"]=$evalues["Fila"];
	$data["tipo_pausa"]=$evalues["tipo_pausa"];
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
	$xt->assign("dt_acao_pausa_fieldblock",true);
	$xt->assign("dt_acao_pausa_label",true);
	if(isEnableSection508())
		$xt->assign_section("dt_acao_pausa_label","<label for=\"".GetInputElementId("dt_acao_pausa", $id)."\">","</label>");
	$xt->assign("hr_acao_pausa_fieldblock",true);
	$xt->assign("hr_acao_pausa_label",true);
	if(isEnableSection508())
		$xt->assign_section("hr_acao_pausa_label","<label for=\"".GetInputElementId("hr_acao_pausa", $id)."\">","</label>");
	$xt->assign("tp_pausa_fieldblock",true);
	$xt->assign("tp_pausa_label",true);
	if(isEnableSection508())
		$xt->assign_section("tp_pausa_label","<label for=\"".GetInputElementId("tp_pausa", $id)."\">","</label>");
	$xt->assign("Agente_fieldblock",true);
	$xt->assign("Agente_label",true);
	if(isEnableSection508())
		$xt->assign_section("Agente_label","<label for=\"".GetInputElementId("Agente", $id)."\">","</label>");
	$xt->assign("name_fieldblock",true);
	$xt->assign("name_label",true);
	if(isEnableSection508())
		$xt->assign_section("name_label","<label for=\"".GetInputElementId("name", $id)."\">","</label>");
	$xt->assign("Fila_fieldblock",true);
	$xt->assign("Fila_label",true);
	if(isEnableSection508())
		$xt->assign_section("Fila_label","<label for=\"".GetInputElementId("Fila", $id)."\">","</label>");
	$xt->assign("tipo_pausa_fieldblock",true);
	$xt->assign("tipo_pausa_label",true);
	if(isEnableSection508())
		$xt->assign_section("tipo_pausa_label","<label for=\"".GetInputElementId("tipo_pausa", $id)."\">","</label>");
	
	if(strlen($onsubmit))
		$onsubmit="onSubmit=\"".htmlspecialchars($onsubmit)."\"";
	$pageObject->body["begin"] .= $includes;
	
	if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
	
	
	$hiddenKeys = '';
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid1\" value=\"".htmlspecialchars($keys["idt_pausa_atend"])."\">";
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"idt_pausa_atend", "")));
	
	$xt->assign('editForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="cc_tipos_pausa_atend_edit.php" '.$onsubmit.'>'.
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
	
	if(GetFieldIndex("idt_pausa_atend"))
		$key[]=GetFieldIndex("idt_pausa_atend");
	
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
					$next[1]=$row_next["idt_pausa_atend"];
			}
			
			$res_prev=db_query($sql_prev,$conn);	
			if($row_prev=db_fetch_array($res_prev))
			{
					$prev[1]=$row_prev["idt_pausa_atend"];
			}
		}
	}
}
	$nextlink=$prevlink="";
	// reset button handler
	$resetEditors="";
	$unblRec="UnlockRecord('cc_tipos_pausa_atend_edit.php','".$skeys."','',function(){window.location.href='cc_tipos_pausa_atend_edit.php?";
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
	$xt->assign("backbutton_attrs","onclick=\"UnlockRecord('cc_tipos_pausa_atend_edit.php','".$skeys."','',function(){window.location.href='cc_tipos_pausa_atend_list.php?a=return'});return false;\"");
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
$showKeys[] = rawurlencode($keys["idt_pausa_atend"]);
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["idt_pausa_atend"]));


//	idt_pausa_atend - 

		$value="";
				$value = ProcessLargeText(GetData($data,"idt_pausa_atend", ""),"field=idt%5Fpausa%5Fatend".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "idt_pausa_atend";
				$showRawValues[] = substr($data["idt_pausa_atend"],0,100);

//	dt_acao_pausa - Short Date

		$value="";
				$value = ProcessLargeText(GetData($data,"dt_acao_pausa", "Short Date"),"field=dt%5Facao%5Fpausa".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dt_acao_pausa";
				$showRawValues[] = substr($data["dt_acao_pausa"],0,100);

//	hr_acao_pausa - Time

		$value="";
				$value = ProcessLargeText(GetData($data,"hr_acao_pausa", "Time"),"field=hr%5Facao%5Fpausa".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "hr_acao_pausa";
				$showRawValues[] = substr($data["hr_acao_pausa"],0,100);

//	tp_pausa - Time

		$value="";
				$value = ProcessLargeText(GetData($data,"tp_pausa", "Time"),"field=tp%5Fpausa".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_pausa";
				$showRawValues[] = substr($data["tp_pausa"],0,100);

//	Agente - 

		$value="";
				$value = ProcessLargeText(GetData($data,"Agente", ""),"field=Agente".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "Agente";
				$showRawValues[] = substr($data["Agente"],0,100);

//	name - 

		$value="";
				$value = ProcessLargeText(GetData($data,"name", ""),"field=name".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "name";
				$showRawValues[] = substr($data["name"],0,100);

//	Fila - 

		$value="";
				$value = ProcessLargeText(GetData($data,"Fila", ""),"field=Fila".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "Fila";
				$showRawValues[] = substr($data["Fila"],0,100);

//	tipo_pausa - 

		$value="";
				$value = ProcessLargeText(GetData($data,"tipo_pausa", ""),"field=tipo%5Fpausa".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tipo_pausa";
				$showRawValues[] = substr($data["tipo_pausa"],0,100);
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
//	control - dt_acao_pausa
$control_dt_acao_pausa=array();
$control_dt_acao_pausa["func"]="xt_buildeditcontrol";
$control_dt_acao_pausa["params"] = array();
$control_dt_acao_pausa["params"]["field"]="dt_acao_pausa";
$control_dt_acao_pausa["params"]["value"]=@$data["dt_acao_pausa"];
//	Begin Add validation
$arrValidate = array();	

$control_dt_acao_pausa["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dt_acao_pausa["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dt_acao_pausa["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dt_acao_pausa["params"]["mode"]="inline_edit";
else
	$control_dt_acao_pausa["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dt_acao_pausa", $detailKeys))	
	$xt->assign("dt_acao_pausa_editcontrol",$control_dt_acao_pausa);
else if(array_key_exists("dt_acao_pausa",$data))
{
				$value = ProcessLargeText(GetData($data,"dt_acao_pausa", "Short Date"),"field=dt%5Facao%5Fpausa","",MODE_VIEW);
		$xt->assign("dt_acao_pausa_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - hr_acao_pausa
$control_hr_acao_pausa=array();
$control_hr_acao_pausa["func"]="xt_buildeditcontrol";
$control_hr_acao_pausa["params"] = array();
$control_hr_acao_pausa["params"]["field"]="hr_acao_pausa";
$control_hr_acao_pausa["params"]["value"]=@$data["hr_acao_pausa"];
//	Begin Add validation
$arrValidate = array();	

$control_hr_acao_pausa["params"]["validate"]=$arrValidate;
//	End Add validation
$control_hr_acao_pausa["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_hr_acao_pausa["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_hr_acao_pausa["params"]["mode"]="inline_edit";
else
	$control_hr_acao_pausa["params"]["mode"]="edit";
if(!$detailKeys || !in_array("hr_acao_pausa", $detailKeys))	
	$xt->assign("hr_acao_pausa_editcontrol",$control_hr_acao_pausa);
else if(array_key_exists("hr_acao_pausa",$data))
{
				$value = ProcessLargeText(GetData($data,"hr_acao_pausa", "Time"),"field=hr%5Facao%5Fpausa","",MODE_VIEW);
		$xt->assign("hr_acao_pausa_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - tp_pausa
$control_tp_pausa=array();
$control_tp_pausa["func"]="xt_buildeditcontrol";
$control_tp_pausa["params"] = array();
$control_tp_pausa["params"]["field"]="tp_pausa";
$control_tp_pausa["params"]["value"]=@$data["tp_pausa"];
//	Begin Add validation
$arrValidate = array();	

$control_tp_pausa["params"]["validate"]=$arrValidate;
//	End Add validation
$control_tp_pausa["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_tp_pausa["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_tp_pausa["params"]["mode"]="inline_edit";
else
	$control_tp_pausa["params"]["mode"]="edit";
if(!$detailKeys || !in_array("tp_pausa", $detailKeys))	
	$xt->assign("tp_pausa_editcontrol",$control_tp_pausa);
else if(array_key_exists("tp_pausa",$data))
{
				$value = ProcessLargeText(GetData($data,"tp_pausa", "Time"),"field=tp%5Fpausa","",MODE_VIEW);
		$xt->assign("tp_pausa_editcontrol",$value);
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
//	control - tipo_pausa
$control_tipo_pausa=array();
$control_tipo_pausa["func"]="xt_buildeditcontrol";
$control_tipo_pausa["params"] = array();
$control_tipo_pausa["params"]["field"]="tipo_pausa";
$control_tipo_pausa["params"]["value"]=@$data["tipo_pausa"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_tipo_pausa["params"]["validate"]=$arrValidate;
//	End Add validation
$control_tipo_pausa["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_tipo_pausa["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_tipo_pausa["params"]["mode"]="inline_edit";
else
	$control_tipo_pausa["params"]["mode"]="edit";
if(!$detailKeys || !in_array("tipo_pausa", $detailKeys))	
	$xt->assign("tipo_pausa_editcontrol",$control_tipo_pausa);
else if(array_key_exists("tipo_pausa",$data))
{
				$value = ProcessLargeText(GetData($data,"tipo_pausa", ""),"field=tipo%5Fpausa","",MODE_VIEW);
		$xt->assign("tipo_pausa_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();


if($lockingObj && $enableCtrlsForEditing)
	$pageObject->AddJSCode("window.timeid".$id."=setInterval( function() {ConfirmLock('cc_tipos_pausa_atend_edit.php','".jsreplace($strTableName)."','".$skeys."',".$id.",'".$inlineedit."');},".($lockingObj->ConfirmTime*1000).");");

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
			$strTableName = "cc_tipos_pausa_atend";		
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
	$strTableName = "cc_tipos_pausa_atend";		
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
