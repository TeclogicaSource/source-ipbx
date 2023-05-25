<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/ipbx_ldap_conf_variables.php");
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
$templatefile = ( $inlineedit ) ? "ipbx_ldap_conf_inline_edit.htm" : "ipbx_ldap_conf_edit.htm";

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
$keys["id_ldap"]=postvalue("editid1");
$savedKeys["id_ldap"]=postvalue("editid1");
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
	$value = postvalue("value_tp_ldap_".$id);
	$type=postvalue("type_tp_ldap_".$id);
	if(FieldSubmitted("tp_ldap_".$id))
	{
		
		$value=prepare_for_db("tp_ldap",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "tp_ldap"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["tp_ldap"]=$value;
		
		
	}


//	processibng tp_ldap - end
	}
	$condition = $inlineedit;

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
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_dsc_conf_".$id);
	$type=postvalue("type_dsc_conf_".$id);
	if(FieldSubmitted("dsc_conf_".$id))
	{
		
		$value=prepare_for_db("dsc_conf",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dsc_conf"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dsc_conf"]=$value;
		
		
	}


//	processibng dsc_conf - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_port_".$id);
	$type=postvalue("type_port_".$id);
	if(FieldSubmitted("port_".$id))
	{
		
		$value=prepare_for_db("port",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "port"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["port"]=$value;
		
		
	}


//	processibng port - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_ip_server_".$id);
	$type=postvalue("type_ip_server_".$id);
	if(FieldSubmitted("ip_server_".$id))
	{
		
		$value=prepare_for_db("ip_server",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ip_server"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ip_server"]=$value;
		
		
	}


//	processibng ip_server - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_ou_usuarios_".$id);
	$type=postvalue("type_ou_usuarios_".$id);
	if(FieldSubmitted("ou_usuarios_".$id))
	{
		
		$value=prepare_for_db("ou_usuarios",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ou_usuarios"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ou_usuarios"]=$value;
		
		
	}


//	processibng ou_usuarios - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_filtro_".$id);
	$type=postvalue("type_filtro_".$id);
	if(FieldSubmitted("filtro_".$id))
	{
		
		$value=prepare_for_db("filtro",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "filtro"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["filtro"]=$value;
		
		
	}


//	processibng filtro - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_ad_usuario_".$id);
	$type=postvalue("type_ad_usuario_".$id);
	if(FieldSubmitted("ad_usuario_".$id))
	{
		
		$value=prepare_for_db("ad_usuario",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ad_usuario"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ad_usuario"]=$value;
		
		
	}


//	processibng ad_usuario - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_ad_senha_".$id);
	$type=postvalue("type_ad_senha_".$id);
	if(FieldSubmitted("ad_senha_".$id))
	{
		
		$value=prepare_for_db("ad_senha",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ad_senha"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ad_senha"]=$value;
		
		
	}


//	processibng ad_senha - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_ad_dominio_".$id);
	$type=postvalue("type_ad_dominio_".$id);
	if(FieldSubmitted("ad_dominio_".$id))
	{
		
		$value=prepare_for_db("ad_dominio",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ad_dominio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ad_dominio"]=$value;
		
		
	}


//	processibng ad_dominio - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_padrao_".$id);
	$type=postvalue("type_flg_padrao_".$id);
	if(FieldSubmitted("flg_padrao_".$id))
	{
		
		$value=prepare_for_db("flg_padrao",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_padrao"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_padrao"]=$value;
		
		
	}


//	processibng flg_padrao - end
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
		$keyGetQ.="editid1=".rawurldecode($keys["id_ldap"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: ipbx_ldap_conf_".$pageObject->getPageType().".php?".$keyGetQ);
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
$query = $queryData_ipbx_ldap_conf->Copy();



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
		header("Location: ipbx_ldap_conf_list.php?a=return");
		exit();
	}
	else
		$data=array();
}

$readonlyfields=array();


	



if($readevalues)
{
	$data["tp_ldap"]=$evalues["tp_ldap"];
	$data["flg_ativo"]=$evalues["flg_ativo"];
	$data["dsc_conf"]=$evalues["dsc_conf"];
	$data["port"]=$evalues["port"];
	$data["ip_server"]=$evalues["ip_server"];
	$data["ou_usuarios"]=$evalues["ou_usuarios"];
	$data["filtro"]=$evalues["filtro"];
	$data["ad_usuario"]=$evalues["ad_usuario"];
	$data["ad_senha"]=$evalues["ad_senha"];
	$data["ad_dominio"]=$evalues["ad_dominio"];
	$data["flg_padrao"]=$evalues["flg_padrao"];
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
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid1\" value=\"".htmlspecialchars($keys["id_ldap"])."\">";
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id_ldap", "")));
	
	$xt->assign('editForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="ipbx_ldap_conf_edit.php" '.$onsubmit.'>'.
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
	
	if(GetFieldIndex("id_ldap"))
		$key[]=GetFieldIndex("id_ldap");
	
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
					$next[1]=$row_next["id_ldap"];
			}
			
			$res_prev=db_query($sql_prev,$conn);	
			if($row_prev=db_fetch_array($res_prev))
			{
					$prev[1]=$row_prev["id_ldap"];
			}
		}
	}
}
	$nextlink=$prevlink="";
	// reset button handler
	$resetEditors="";
	$unblRec="UnlockRecord('ipbx_ldap_conf_edit.php','".$skeys."','',function(){window.location.href='ipbx_ldap_conf_edit.php?";
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
	$xt->assign("backbutton_attrs","onclick=\"UnlockRecord('ipbx_ldap_conf_edit.php','".$skeys."','',function(){window.location.href='ipbx_ldap_conf_list.php?a=return'});return false;\"");
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
$showKeys[] = rawurlencode($keys["id_ldap"]);
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_ldap"]));


//	tp_ldap - 

		$value="";
				$value = ProcessLargeText(GetData($data,"tp_ldap", ""),"field=tp%5Fldap".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_ldap";
				$showRawValues[] = substr($data["tp_ldap"],0,100);

//	flg_ativo - Checkbox

		$value="";
				$value = GetData($data,"flg_ativo", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "flg_ativo";
				$showRawValues[] = substr($data["flg_ativo"],0,100);

//	dsc_conf - 

		$value="";
				$value = ProcessLargeText(GetData($data,"dsc_conf", ""),"field=dsc%5Fconf".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dsc_conf";
				$showRawValues[] = substr($data["dsc_conf"],0,100);

//	port - 

		$value="";
				$value = ProcessLargeText(GetData($data,"port", ""),"field=port".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "port";
				$showRawValues[] = substr($data["port"],0,100);

//	ip_server - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ip_server", ""),"field=ip%5Fserver".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ip_server";
				$showRawValues[] = substr($data["ip_server"],0,100);

//	ou_usuarios - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ou_usuarios", ""),"field=ou%5Fusuarios".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ou_usuarios";
				$showRawValues[] = substr($data["ou_usuarios"],0,100);

//	filtro - 

		$value="";
				$value = ProcessLargeText(GetData($data,"filtro", ""),"field=filtro".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "filtro";
				$showRawValues[] = substr($data["filtro"],0,100);

//	ad_usuario - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ad_usuario", ""),"field=ad%5Fusuario".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ad_usuario";
				$showRawValues[] = substr($data["ad_usuario"],0,100);

//	ad_senha - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ad_senha", ""),"field=ad%5Fsenha".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ad_senha";
				$showRawValues[] = substr($data["ad_senha"],0,100);

//	ad_dominio - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ad_dominio", ""),"field=ad%5Fdominio".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ad_dominio";
				$showRawValues[] = substr($data["ad_dominio"],0,100);

//	flg_padrao - Checkbox

		$value="";
				$value = GetData($data,"flg_padrao", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "flg_padrao";
				$showRawValues[] = substr($data["flg_padrao"],0,100);
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
//	control - tp_ldap
$control_tp_ldap=array();
$control_tp_ldap["func"]="xt_buildeditcontrol";
$control_tp_ldap["params"] = array();
$control_tp_ldap["params"]["field"]="tp_ldap";
$control_tp_ldap["params"]["value"]=@$data["tp_ldap"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

$control_tp_ldap["params"]["validate"]=$arrValidate;
//	End Add validation
$control_tp_ldap["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_tp_ldap["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_tp_ldap["params"]["mode"]="inline_edit";
else
	$control_tp_ldap["params"]["mode"]="edit";
if(!$detailKeys || !in_array("tp_ldap", $detailKeys))	
	$xt->assign("tp_ldap_editcontrol",$control_tp_ldap);
else if(array_key_exists("tp_ldap",$data))
{
				$value = ProcessLargeText(GetData($data,"tp_ldap", ""),"field=tp%5Fldap","",MODE_VIEW);
		$xt->assign("tp_ldap_editcontrol",$value);
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
//	control - dsc_conf
$control_dsc_conf=array();
$control_dsc_conf["func"]="xt_buildeditcontrol";
$control_dsc_conf["params"] = array();
$control_dsc_conf["params"]["field"]="dsc_conf";
$control_dsc_conf["params"]["value"]=@$data["dsc_conf"];
//	Begin Add validation
$arrValidate = array();	

$control_dsc_conf["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dsc_conf["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dsc_conf["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dsc_conf["params"]["mode"]="inline_edit";
else
	$control_dsc_conf["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dsc_conf", $detailKeys))	
	$xt->assign("dsc_conf_editcontrol",$control_dsc_conf);
else if(array_key_exists("dsc_conf",$data))
{
				$value = ProcessLargeText(GetData($data,"dsc_conf", ""),"field=dsc%5Fconf","",MODE_VIEW);
		$xt->assign("dsc_conf_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - port
$control_port=array();
$control_port["func"]="xt_buildeditcontrol";
$control_port["params"] = array();
$control_port["params"]["field"]="port";
$control_port["params"]["value"]=@$data["port"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;

$arrValidate['basicValidate'][] = "IsRequired";

$control_port["params"]["validate"]=$arrValidate;
//	End Add validation
$control_port["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_port["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_port["params"]["mode"]="inline_edit";
else
	$control_port["params"]["mode"]="edit";
if(!$detailKeys || !in_array("port", $detailKeys))	
	$xt->assign("port_editcontrol",$control_port);
else if(array_key_exists("port",$data))
{
				$value = ProcessLargeText(GetData($data,"port", ""),"field=port","",MODE_VIEW);
		$xt->assign("port_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ip_server
$control_ip_server=array();
$control_ip_server["func"]="xt_buildeditcontrol";
$control_ip_server["params"] = array();
$control_ip_server["params"]["field"]="ip_server";
$control_ip_server["params"]["value"]=@$data["ip_server"];
//	Begin Add validation
$arrValidate = array();	

$control_ip_server["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ip_server["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ip_server["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ip_server["params"]["mode"]="inline_edit";
else
	$control_ip_server["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ip_server", $detailKeys))	
	$xt->assign("ip_server_editcontrol",$control_ip_server);
else if(array_key_exists("ip_server",$data))
{
				$value = ProcessLargeText(GetData($data,"ip_server", ""),"field=ip%5Fserver","",MODE_VIEW);
		$xt->assign("ip_server_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ou_usuarios
$control_ou_usuarios=array();
$control_ou_usuarios["func"]="xt_buildeditcontrol";
$control_ou_usuarios["params"] = array();
$control_ou_usuarios["params"]["field"]="ou_usuarios";
$control_ou_usuarios["params"]["value"]=@$data["ou_usuarios"];
//	Begin Add validation
$arrValidate = array();	

$control_ou_usuarios["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ou_usuarios["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ou_usuarios["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ou_usuarios["params"]["mode"]="inline_edit";
else
	$control_ou_usuarios["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ou_usuarios", $detailKeys))	
	$xt->assign("ou_usuarios_editcontrol",$control_ou_usuarios);
else if(array_key_exists("ou_usuarios",$data))
{
				$value = ProcessLargeText(GetData($data,"ou_usuarios", ""),"field=ou%5Fusuarios","",MODE_VIEW);
		$xt->assign("ou_usuarios_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - filtro
$control_filtro=array();
$control_filtro["func"]="xt_buildeditcontrol";
$control_filtro["params"] = array();
$control_filtro["params"]["field"]="filtro";
$control_filtro["params"]["value"]=@$data["filtro"];
//	Begin Add validation
$arrValidate = array();	

$control_filtro["params"]["validate"]=$arrValidate;
//	End Add validation
$control_filtro["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_filtro["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_filtro["params"]["mode"]="inline_edit";
else
	$control_filtro["params"]["mode"]="edit";
if(!$detailKeys || !in_array("filtro", $detailKeys))	
	$xt->assign("filtro_editcontrol",$control_filtro);
else if(array_key_exists("filtro",$data))
{
				$value = ProcessLargeText(GetData($data,"filtro", ""),"field=filtro","",MODE_VIEW);
		$xt->assign("filtro_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ad_usuario
$control_ad_usuario=array();
$control_ad_usuario["func"]="xt_buildeditcontrol";
$control_ad_usuario["params"] = array();
$control_ad_usuario["params"]["field"]="ad_usuario";
$control_ad_usuario["params"]["value"]=@$data["ad_usuario"];
//	Begin Add validation
$arrValidate = array();	

$control_ad_usuario["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ad_usuario["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ad_usuario["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ad_usuario["params"]["mode"]="inline_edit";
else
	$control_ad_usuario["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ad_usuario", $detailKeys))	
	$xt->assign("ad_usuario_editcontrol",$control_ad_usuario);
else if(array_key_exists("ad_usuario",$data))
{
				$value = ProcessLargeText(GetData($data,"ad_usuario", ""),"field=ad%5Fusuario","",MODE_VIEW);
		$xt->assign("ad_usuario_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ad_senha
$control_ad_senha=array();
$control_ad_senha["func"]="xt_buildeditcontrol";
$control_ad_senha["params"] = array();
$control_ad_senha["params"]["field"]="ad_senha";
$control_ad_senha["params"]["value"]=@$data["ad_senha"];
//	Begin Add validation
$arrValidate = array();	

$control_ad_senha["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ad_senha["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ad_senha["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ad_senha["params"]["mode"]="inline_edit";
else
	$control_ad_senha["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ad_senha", $detailKeys))	
	$xt->assign("ad_senha_editcontrol",$control_ad_senha);
else if(array_key_exists("ad_senha",$data))
{
				$value = ProcessLargeText(GetData($data,"ad_senha", ""),"field=ad%5Fsenha","",MODE_VIEW);
		$xt->assign("ad_senha_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ad_dominio
$control_ad_dominio=array();
$control_ad_dominio["func"]="xt_buildeditcontrol";
$control_ad_dominio["params"] = array();
$control_ad_dominio["params"]["field"]="ad_dominio";
$control_ad_dominio["params"]["value"]=@$data["ad_dominio"];
//	Begin Add validation
$arrValidate = array();	

$control_ad_dominio["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ad_dominio["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ad_dominio["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ad_dominio["params"]["mode"]="inline_edit";
else
	$control_ad_dominio["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ad_dominio", $detailKeys))	
	$xt->assign("ad_dominio_editcontrol",$control_ad_dominio);
else if(array_key_exists("ad_dominio",$data))
{
				$value = ProcessLargeText(GetData($data,"ad_dominio", ""),"field=ad%5Fdominio","",MODE_VIEW);
		$xt->assign("ad_dominio_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_padrao
$control_flg_padrao=array();
$control_flg_padrao["func"]="xt_buildeditcontrol";
$control_flg_padrao["params"] = array();
$control_flg_padrao["params"]["field"]="flg_padrao";
$control_flg_padrao["params"]["value"]=@$data["flg_padrao"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_padrao["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_padrao["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_padrao["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_padrao["params"]["mode"]="inline_edit";
else
	$control_flg_padrao["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_padrao", $detailKeys))	
	$xt->assign("flg_padrao_editcontrol",$control_flg_padrao);
else if(array_key_exists("flg_padrao",$data))
{
				$value = GetData($data,"flg_padrao", "Checkbox");
		$xt->assign("flg_padrao_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();


if($lockingObj && $enableCtrlsForEditing)
	$pageObject->AddJSCode("window.timeid".$id."=setInterval( function() {ConfirmLock('ipbx_ldap_conf_edit.php','".jsreplace($strTableName)."','".$skeys."',".$id.",'".$inlineedit."');},".($lockingObj->ConfirmTime*1000).");");

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
			$strTableName = "ipbx_ldap_conf";		
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
	$strTableName = "ipbx_ldap_conf";		
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
