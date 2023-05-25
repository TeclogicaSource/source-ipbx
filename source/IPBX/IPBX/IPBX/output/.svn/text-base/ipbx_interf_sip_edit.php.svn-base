<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/ipbx_interf_sip_variables.php");
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
$templatefile = ( $inlineedit ) ? "ipbx_interf_sip_inline_edit.htm" : "ipbx_interf_sip_edit.htm";

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
$keys["id_interf"]=postvalue("editid1");
$savedKeys["id_interf"]=postvalue("editid1");
$skeys.=rawurlencode(postvalue("editid1"))."&";
$keys["id_central"]=postvalue("editid2");
$savedKeys["id_central"]=postvalue("editid2");
$skeys.=rawurlencode(postvalue("editid2"))."&";
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
	$value = postvalue("value_dsc_interf_".$id);
	$type=postvalue("type_dsc_interf_".$id);
	if(FieldSubmitted("dsc_interf_".$id))
	{
		
		$value=prepare_for_db("dsc_interf",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dsc_interf"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dsc_interf"]=$value;
		
		
	}


//	processibng dsc_interf - end
	}
	$condition = $inlineedit;

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
	$condition = $inlineedit;

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
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_ip_host_".$id);
	$type=postvalue("type_ip_host_".$id);
	if(FieldSubmitted("ip_host_".$id))
	{
		
		$value=prepare_for_db("ip_host",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ip_host"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ip_host"]=$value;
		
		
	}


//	processibng ip_host - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_central_".$id);
	$type=postvalue("type_id_central_".$id);
	if(FieldSubmitted("id_central_".$id))
	{
		
		$value=prepare_for_db("id_central",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_central"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_central"]=$value;
		
		
	}

//	update key value
	if($value!==false)
	{
		$keys["id_central"]=$value;
	}

//	processibng id_central - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_codec_".$id);
	$type=postvalue("type_codec_".$id);
	if(FieldSubmitted("codec_".$id))
	{
		
		$value=prepare_for_db("codec",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "codec"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["codec"]=$value;
		
		
	}


//	processibng codec - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_tp_interf_".$id);
	$type=postvalue("type_id_tp_interf_".$id);
	if(FieldSubmitted("id_tp_interf_".$id))
	{
		
		$value=prepare_for_db("id_tp_interf",$value,$type);
	}
	else
	{
		$value=false;
	}
	$value = 6;
	if($value!==false)
	{	





		
	if(0 && "id_tp_interf"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_tp_interf"]=$value;
		
		
	}


//	processibng id_tp_interf - end
	}
	$condition = $inlineedit;

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
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_piloto_".$id);
	$type=postvalue("type_piloto_".$id);
	if(FieldSubmitted("piloto_".$id))
	{
		
		$value=prepare_for_db("piloto",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "piloto"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["piloto"]=$value;
		
		
	}


//	processibng piloto - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_logon_remoto_".$id);
	$type=postvalue("type_flg_logon_remoto_".$id);
	if(FieldSubmitted("flg_logon_remoto_".$id))
	{
		
		$value=prepare_for_db("flg_logon_remoto",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_logon_remoto"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_logon_remoto"]=$value;
		
		
	}


//	processibng flg_logon_remoto - end
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
		$keyGetQ.="editid1=".rawurldecode($keys["id_interf"])."&";
		$keyGetQ.="editid2=".rawurldecode($keys["id_central"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: ipbx_interf_sip_".$pageObject->getPageType().".php?".$keyGetQ);
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
$query = $queryData_ipbx_interf_sip->Copy();



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
		header("Location: ipbx_interf_sip_list.php?a=return");
		exit();
	}
	else
		$data=array();
}

$readonlyfields=array();


	


//if(!$data["id_tp_interf"])
	$data["id_tp_interf"] = 6;
  $readonlyfields["id_tp_interf"] = htmlspecialchars(GetData($data,"id_tp_interf", ""));

if($readevalues)
{
	$data["dsc_interf"]=$evalues["dsc_interf"];
	$data["usuario"]=$evalues["usuario"];
	$data["senha"]=$evalues["senha"];
	$data["ip_host"]=$evalues["ip_host"];
	$data["id_central"]=$evalues["id_central"];
	$data["codec"]=$evalues["codec"];
	$data["tp_chamada"]=$evalues["tp_chamada"];
	$data["piloto"]=$evalues["piloto"];
	$data["flg_logon_remoto"]=$evalues["flg_logon_remoto"];
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
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid1\" value=\"".htmlspecialchars($keys["id_interf"])."\">";
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id_interf", "")));
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid2\" value=\"".htmlspecialchars($keys["id_central"])."\">";
	$xt->assign("show_key2", htmlspecialchars(GetData($data,"id_central", "")));
	
	$xt->assign('editForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="ipbx_interf_sip_edit.php" '.$onsubmit.'>'.
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
	
	if(GetFieldIndex("id_interf"))
		$key[]=GetFieldIndex("id_interf");
	if(GetFieldIndex("id_central"))
		$key[]=GetFieldIndex("id_central");
	
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
					$next[1]=$row_next["id_interf"];
					$next[2]=$row_next["id_central"];
			}
			
			$res_prev=db_query($sql_prev,$conn);	
			if($row_prev=db_fetch_array($res_prev))
			{
					$prev[1]=$row_prev["id_interf"];
					$prev[2]=$row_prev["id_central"];
			}
		}
	}
}
	$nextlink=$prevlink="";
	// reset button handler
	$resetEditors="";
	$unblRec="UnlockRecord('ipbx_interf_sip_edit.php','".$skeys."','',function(){window.location.href='ipbx_interf_sip_edit.php?";
	if(count($next))
	{
		$xt->assign("next_button",true);
				$nextlink .="editid1=".htmlspecialchars(rawurlencode($next[1]));
				$nextlink .="&";
		$nextlink .="editid2=".htmlspecialchars(rawurlencode($next[2]));
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
	$xt->assign("backbutton_attrs","onclick=\"UnlockRecord('ipbx_interf_sip_edit.php','".$skeys."','',function(){window.location.href='ipbx_interf_sip_list.php?a=return'});return false;\"");
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
$showKeys[] = rawurlencode($keys["id_interf"]);
$showKeys[] = rawurlencode($keys["id_central"]);
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_interf"]));
	$keylink.="&key2=".htmlspecialchars(rawurlencode(@$data["id_central"]));


//	id_central - 

		$value="";
				$value = ProcessLargeText(GetData($data,"id_central", ""),"field=id%5Fcentral".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_central";
				$showRawValues[] = substr($data["id_central"],0,100);

//	dsc_interf - 

		$value="";
				$value = ProcessLargeText(GetData($data,"dsc_interf", ""),"field=dsc%5Finterf".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dsc_interf";
				$showRawValues[] = substr($data["dsc_interf"],0,100);

//	piloto - 

		$value="";
				$value=DisplayLookupWizard("piloto",$data["piloto"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "piloto";
				$showRawValues[] = substr($data["piloto"],0,100);

//	usuario - 

		$value="";
				$value = ProcessLargeText(GetData($data,"usuario", ""),"field=usuario".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "usuario";
				$showRawValues[] = substr($data["usuario"],0,100);

//	senha - 

		$value="";
				$value = ProcessLargeText(GetData($data,"senha", ""),"field=senha".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "senha";
				$showRawValues[] = substr($data["senha"],0,100);

//	ip_host - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ip_host", ""),"field=ip%5Fhost".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ip_host";
				$showRawValues[] = substr($data["ip_host"],0,100);

//	codec - 

		$value="";
				$value=DisplayLookupWizard("codec",$data["codec"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "codec";
				$showRawValues[] = substr($data["codec"],0,100);

//	tp_chamada - 

		$value="";
				$value = ProcessLargeText(GetData($data,"tp_chamada", ""),"field=tp%5Fchamada".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_chamada";
				$showRawValues[] = substr($data["tp_chamada"],0,100);

//	id_tp_interf - 

		$value="";
				$value = ProcessLargeText(GetData($data,"id_tp_interf", ""),"field=id%5Ftp%5Finterf".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_tp_interf";
				$showRawValues[] = substr($data["id_tp_interf"],0,100);

//	flg_logon_remoto - Checkbox

		$value="";
				$value = GetData($data,"flg_logon_remoto", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "flg_logon_remoto";
				$showRawValues[] = substr($data["flg_logon_remoto"],0,100);
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
//	control - dsc_interf
$control_dsc_interf=array();
$control_dsc_interf["func"]="xt_buildeditcontrol";
$control_dsc_interf["params"] = array();
$control_dsc_interf["params"]["field"]="dsc_interf";
$control_dsc_interf["params"]["value"]=@$data["dsc_interf"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_dsc_interf["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dsc_interf["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dsc_interf["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dsc_interf["params"]["mode"]="inline_edit";
else
	$control_dsc_interf["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dsc_interf", $detailKeys))	
	$xt->assign("dsc_interf_editcontrol",$control_dsc_interf);
else if(array_key_exists("dsc_interf",$data))
{
				$value = ProcessLargeText(GetData($data,"dsc_interf", ""),"field=dsc%5Finterf","",MODE_VIEW);
		$xt->assign("dsc_interf_editcontrol",$value);
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

$arrValidate['basicValidate'][] = "IsRequired";

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
//	control - ip_host
$control_ip_host=array();
$control_ip_host["func"]="xt_buildeditcontrol";
$control_ip_host["params"] = array();
$control_ip_host["params"]["field"]="ip_host";
$control_ip_host["params"]["value"]=@$data["ip_host"];
//	Begin Add validation
$arrValidate = array();	

$control_ip_host["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ip_host["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ip_host["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ip_host["params"]["mode"]="inline_edit";
else
	$control_ip_host["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ip_host", $detailKeys))	
	$xt->assign("ip_host_editcontrol",$control_ip_host);
else if(array_key_exists("ip_host",$data))
{
				$value = ProcessLargeText(GetData($data,"ip_host", ""),"field=ip%5Fhost","",MODE_VIEW);
		$xt->assign("ip_host_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_central
$control_id_central=array();
$control_id_central["func"]="xt_buildeditcontrol";
$control_id_central["params"] = array();
$control_id_central["params"]["field"]="id_central";
$control_id_central["params"]["value"]=@$data["id_central"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_id_central["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_central["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_central["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_central["params"]["mode"]="inline_edit";
else
	$control_id_central["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_central", $detailKeys))	
	$xt->assign("id_central_editcontrol",$control_id_central);
else if(array_key_exists("id_central",$data))
{
				$value = ProcessLargeText(GetData($data,"id_central", ""),"field=id%5Fcentral","",MODE_VIEW);
		$xt->assign("id_central_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - codec
$control_codec=array();
$control_codec["func"]="xt_buildeditcontrol";
$control_codec["params"] = array();
$control_codec["params"]["field"]="codec";
$control_codec["params"]["value"]=@$data["codec"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_codec["params"]["validate"]=$arrValidate;
//	End Add validation
$control_codec["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_codec["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_codec["params"]["mode"]="inline_edit";
else
	$control_codec["params"]["mode"]="edit";
if(!$detailKeys || !in_array("codec", $detailKeys))	
	$xt->assign("codec_editcontrol",$control_codec);
else if(array_key_exists("codec",$data))
{
				$value=DisplayLookupWizard("codec",$data["codec"],$data,"",MODE_VIEW);
		$xt->assign("codec_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_tp_interf
$control_id_tp_interf=array();
$control_id_tp_interf["func"]="xt_buildeditcontrol";
$control_id_tp_interf["params"] = array();
$control_id_tp_interf["params"]["field"]="id_tp_interf";
$control_id_tp_interf["params"]["value"]=@$data["id_tp_interf"];
//	Begin Add validation
$arrValidate = array();	


$control_id_tp_interf["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_tp_interf["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_tp_interf["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_tp_interf["params"]["mode"]="inline_edit";
else
	$control_id_tp_interf["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_tp_interf", $detailKeys))	
	$xt->assign("id_tp_interf_editcontrol",$control_id_tp_interf);
else if(array_key_exists("id_tp_interf",$data))
{
				$value = ProcessLargeText(GetData($data,"id_tp_interf", ""),"field=id%5Ftp%5Finterf","",MODE_VIEW);
		$xt->assign("id_tp_interf_editcontrol",$value);
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

$arrValidate['basicValidate'][] = "IsRequired";

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
//	control - piloto
$control_piloto=array();
$control_piloto["func"]="xt_buildeditcontrol";
$control_piloto["params"] = array();
$control_piloto["params"]["field"]="piloto";
$control_piloto["params"]["value"]=@$data["piloto"];
//	Begin Add validation
$arrValidate = array();	

$control_piloto["params"]["validate"]=$arrValidate;
//	End Add validation
$control_piloto["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_piloto["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_piloto["params"]["mode"]="inline_edit";
else
	$control_piloto["params"]["mode"]="edit";
if(!$detailKeys || !in_array("piloto", $detailKeys))	
	$xt->assign("piloto_editcontrol",$control_piloto);
else if(array_key_exists("piloto",$data))
{
				$value=DisplayLookupWizard("piloto",$data["piloto"],$data,"",MODE_VIEW);
		$xt->assign("piloto_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_logon_remoto
$control_flg_logon_remoto=array();
$control_flg_logon_remoto["func"]="xt_buildeditcontrol";
$control_flg_logon_remoto["params"] = array();
$control_flg_logon_remoto["params"]["field"]="flg_logon_remoto";
$control_flg_logon_remoto["params"]["value"]=@$data["flg_logon_remoto"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_logon_remoto["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_logon_remoto["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_logon_remoto["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_logon_remoto["params"]["mode"]="inline_edit";
else
	$control_flg_logon_remoto["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_logon_remoto", $detailKeys))	
	$xt->assign("flg_logon_remoto_editcontrol",$control_flg_logon_remoto);
else if(array_key_exists("flg_logon_remoto",$data))
{
				$value = GetData($data,"flg_logon_remoto", "Checkbox");
		$xt->assign("flg_logon_remoto_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();


if($lockingObj && $enableCtrlsForEditing)
	$pageObject->AddJSCode("window.timeid".$id."=setInterval( function() {ConfirmLock('ipbx_interf_sip_edit.php','".jsreplace($strTableName)."','".$skeys."',".$id.",'".$inlineedit."');},".($lockingObj->ConfirmTime*1000).");");

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
			$strTableName = "ipbx_interf_sip";		
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
	$strTableName = "ipbx_interf_sip";		
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
