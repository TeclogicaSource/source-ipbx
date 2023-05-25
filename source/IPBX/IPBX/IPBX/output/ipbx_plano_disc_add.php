<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/ipbx_plano_disc_variables.php");
include('include/xtempl.php');
include('classes/runnerpage.php');

//	check if logged in
if(@$_SESSION["UserID"] && IsAdmin() && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Add"))
{
	echo "<p>"."Você não tem permissão para acessar esta tabela"."<br>Proceed to <a href=\"admin.php\">Admin Area</a> to set up user permissions</p>";
	return;
}
if(!@$_SESSION["UserID"] || !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Add"))
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}


$filename="";
$status="";
$message="";
$mesClass = "";
$usermessage="";
$error_happened=false;
$readavalues=false;

$keys=array();
$showKeys = array();
$showValues = array();
$showRawValues = array();
$showFields = array();
$showDetailKeys = array();
$IsSaved = false;
$HaveData = true;

$sessionPrefix = $strTableName;

if(@$_REQUEST["editType"]=="inline")
	$inlineadd=ADD_INLINE;
elseif(@$_REQUEST["editType"]=="onthefly")
{
	$inlineadd=ADD_ONTHEFLY;
	$sessionPrefix = $strTableName."_add";	
}
elseif(@$_REQUEST["editType"]=="addmaster")
	$inlineadd=ADD_MASTER;
else
	$inlineadd=ADD_SIMPLE;

if($inlineadd==ADD_INLINE)
	$templatefile = "ipbx_plano_disc_inline_add.htm";
else
	$templatefile = "ipbx_plano_disc_add.htm";

if($inlineadd==ADD_ONTHEFLY)
	$id=postvalue("id");	
elseif($inlineadd==ADD_INLINE)
	$id=postvalue("recordID");
else
{
	$id=postvalue("id");
	if(intval($id)==0)
		$id = 1;
}
//If undefined session value for mastet table, but exist post value master table, than take second
//It may be happen only when use dpInline mode on page add
if(!@$_SESSION[$sessionPrefix."_mastertable"] && postvalue("mastertable"))
	$_SESSION[$sessionPrefix."_mastertable"] = postvalue("mastertable");
//Get detail table keys	
$detailKeys = array();
$detailKeys = GetDetailKeysByMasterTable($_SESSION[$sessionPrefix."_mastertable"], $strTableName);	

$xt = new Xtempl();
	
// assign an id		
$xt->assign("id",$id);
$formname="editform".$id;
	

$auditObj = GetAuditObject($strTableName);

//array of params for classes
$params = array("pageType" => PAGE_ADD,"id" => $id,"mode" => $inlineadd);

$params['tName'] = $strTableName;
$params['strOriginalTableName'] = $strOriginalTableName;
$params['menuTablesArr'] = $menuTablesArr;
$params['xt'] = &$xt;
$params['includes_js']=$includes_js;
$params['includes_jsreq']=$includes_jsreq;
$params['includes_css']=$includes_css;
$params['locale_info']=$locale_info;

$pageObject = new RunnerPage($params);

$isCaptchaOk=1;
// proccess captcha
if ($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER)
{
	
}
// end proccess captcha

// add onload event
$onLoadJsCode = GetTableData($pageObject->tName, ".jsOnloadAdd", '');
$pageObject->addOnLoadJsEvent($onLoadJsCode);


if ($inlineadd==ADD_SIMPLE)
{
	// add button events if exist
	$buttonHandlers = GetTableData($pageObject->tName, ".buttonHandlers_".$pageObject->getPageType(), array());
	$pageObject->addButtonHandlers($buttonHandlers);
}
$url_page=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1,12);

$isShowDetailTables = displayDetailsOn($strTableName,PAGE_ADD);
$dpParams = array();
if($isShowDetailTables && ($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER))
{
	$ids = $id;
	if($inlineadd==ADD_SIMPLE)
	{
		$pageObject->AddJSCode("window.dpObj = new dpInlineOnAddEdit({
			'mTableName':'".jsreplace($strTableName)."',
			'mShortTableName':'ipbx_plano_disc', 
			'mForm':$('#".$formname."'),
			'mPageType':'".PAGE_ADD."',
			'mMessage':'', 
			'mId':".$id.",
			'ext':'php',
			'dMessages':'', 
			'dCaptions':[],
			'dInlineObjs':[]});
			window.dpInline".$id." = new detailsPreviewInline({'pageId':".$id.",'mode':'add_master'}); 
			window.dpInline".$id.".createPreviewIframe();");
		$pageObject->AddJSFile("include/detailspreview");
	}
}

//	Before Process event
if(function_exists("BeforeProcessAdd"))
	BeforeProcessAdd($conn);

// insert new record if we have to
if(@$_POST["a"]=="added")
{
	$afilename_values=array();
	$avalues=array();
	$blobfields=array();
	$files_move=array();
	$files_save=array();
//	processing padrao - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_padrao_".$id);
	$type=postvalue("type_padrao_".$id);
	if (FieldSubmitted("padrao_".$id))
	{
		$value=prepare_for_db("padrao",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "padrao"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["padrao"]=$value;
	}
	}
//	processibng padrao - end
//	processing contexto - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_contexto_".$id);
	$type=postvalue("type_contexto_".$id);
	if (FieldSubmitted("contexto_".$id))
	{
		$value=prepare_for_db("contexto",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "contexto"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["contexto"]=$value;
	}
	}
//	processibng contexto - end
//	processing rota - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_rota_".$id);
	$type=postvalue("type_rota_".$id);
	if (FieldSubmitted("rota_".$id))
	{
		$value=prepare_for_db("rota",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "rota"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["rota"]=$value;
	}
	}
//	processibng rota - end
//	processing id_interf_1 - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_interf_1_".$id);
	$type=postvalue("type_id_interf_1_".$id);
	if (FieldSubmitted("id_interf_1_".$id))
	{
		$value=prepare_for_db("id_interf_1",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_interf_1"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_interf_1"]=$value;
	}
	}
//	processibng id_interf_1 - end
//	processing add_rota_1 - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_add_rota_1_".$id);
	$type=postvalue("type_add_rota_1_".$id);
	if (FieldSubmitted("add_rota_1_".$id))
	{
		$value=prepare_for_db("add_rota_1",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "add_rota_1"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["add_rota_1"]=$value;
	}
	}
//	processibng add_rota_1 - end
//	processing id_interf_2 - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_interf_2_".$id);
	$type=postvalue("type_id_interf_2_".$id);
	if (FieldSubmitted("id_interf_2_".$id))
	{
		$value=prepare_for_db("id_interf_2",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_interf_2"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_interf_2"]=$value;
	}
	}
//	processibng id_interf_2 - end
//	processing add_rota_2 - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_add_rota_2_".$id);
	$type=postvalue("type_add_rota_2_".$id);
	if (FieldSubmitted("add_rota_2_".$id))
	{
		$value=prepare_for_db("add_rota_2",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "add_rota_2"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["add_rota_2"]=$value;
	}
	}
//	processibng add_rota_2 - end



	$failed_inline_add=false;
//	add filenames to values
	foreach($afilename_values as $akey=>$value)
		$avalues[$akey]=$value;
	
//	before Add event
	$retval = true;
	if(function_exists("BeforeAdd"))
		$retval=BeforeAdd($avalues,$usermessage,$inlineadd);
	if($retval && $isCaptchaOk == 1)
	{
		if(DoInsertRecord($strOriginalTableName,$avalues,$blobfields,$id))
		{
			$IsSaved=true;
			
//	after edit event
			if($auditObj || function_exists("AfterAdd"))
			{
				foreach($keys as $idx=>$val)
					$avalues[$idx]=$val;
			}
			
			if($auditObj)
				$auditObj->LogAdd($strTableName,$avalues,$keys);

			if(function_exists("AfterAdd"))
				AfterAdd($avalues,$keys,$inlineadd);
				
			if($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER)
			{
				$_SESSION[$strTableName."_count_captcha"] = $_SESSION[$strTableName."_count_captcha"]+1;
				$permis = array();
				$keylink = "";$k = 0;
				foreach($keys as $idx=>$val)
				{
					if($k!=0)
						$keylink .="&";
					$keylink .="editid".(++$k)."=".htmlspecialchars(rawurlencode(@$val));
				}
				$permis = $pageObject->getPermissions();
				$message .="</br>";
				if(GetTableData($strTableName,".edit",false) && $permis['edit'])
					$message .='&nbsp;<a href=\'ipbx_plano_disc_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'ipbx_plano_disc_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
				$mesClass = "mes_ok";	
			}
		}
		elseif($inlineadd!=ADD_INLINE)
			$mesClass = "mes_not";	
	}
	else
	{
		$message = $usermessage;
		$status="DECLINED";
		$readavalues=true;
	}
}




$message = "<div class='message ".$mesClass."'>".$message."</div>";

// PRG rule, to avoid POSTDATA resend
if (no_output_done() && $inlineadd==ADD_SIMPLE && $IsSaved)
{
	// saving message
	$_SESSION["message"] = ($message ? $message : "");
	// redirect
	header("Location: ipbx_plano_disc_".$pageObject->getPageType().".php");
	// turned on output buffering, so we need to stop script
	exit();
}

if($inlineadd==ADD_MASTER && $IsSaved)
	$_SESSION["message"] = ($message ? $message : "");
	
// for PRG rule, to avoid POSTDATA resend. Saving mess in session
if($inlineadd==ADD_SIMPLE && isset($_SESSION["message"]))
{
	$message = $_SESSION["message"];
	unset($_SESSION["message"]);
}

$defvalues=array();

//	copy record
if(array_key_exists("copyid1",$_REQUEST) || array_key_exists("editid1",$_REQUEST))
{
	$copykeys=array();
	if(array_key_exists("copyid1",$_REQUEST))
	{
		$copykeys["id_plano"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["id_plano"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id_plano"]="";
//call CopyOnLoad event
	if(function_exists("CopyOnLoad"))
		CopyOnLoad($defvalues,$strWhere);
}
else
{
}

if($readavalues)
{
}
//for basic files
$includes="";
if ($inlineadd!==ADD_INLINE && $inlineadd!=ADD_ONTHEFLY)
	$pageObject->addJSCode("AddEventForControl('".jsreplace($strTableName)."', '', ".$id.");\r\n");

		
	
$onsubmit = $pageObject->onSubmitForEditingPage($formname,$inlineadd);
	

//////////////////////////////////////////////////////////////////	
////////////////////// time picker
//////////////////////

$pageObject->AddJSFile("include/customlabels");
if(isset($params["calendar"]))
	$pageObject->AddJSFile("include/calendar");
if($inlineadd!=ADD_INLINE)
{
	if($inlineadd!=ADD_ONTHEFLY)
	{
		$includes .="<script language=\"JavaScript\" src=\"include/jquery.js\"></script>\r\n";
		$includes .="<script language=\"JavaScript\" src=\"include/jsfunctions.js\"></script>\r\n";	
		if ($pageObject->debugJSMode===true)
		{
			$includes .= "<script type=\"text/javascript\" src=\"include/runnerJS/Runner.js\"></script>";
			$includes .= "<script type=\"text/javascript\" src=\"include/runnerJS/Util.js\"></script>";
		}
		else 
		{
			$includes .= "<script type=\"text/javascript\" src=\"include/runnerJS/RunnerBase.js\"></script>";
		}
		$pageObject->AddJSFile("include/ajaxsuggest");		
		$includes.="<script language=\"JavaScript\" src=\"include/jsfunctions.js\"></script>\r\n";
		$includes.="<div id=\"search_suggest\"></div>\r\n";
	}
	
	
	if($inlineadd!=ADD_ONTHEFLY)
	{
		if($onsubmit)
			$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit)."\"";
		
		$pageObject->body["begin"] .= $includes;
		if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='ipbx_plano_disc_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="ipbx_plano_disc_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="ipbx_plano_disc_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
		'<input type=hidden name="a" value="added">'.
		'<input type=hidden name="editType" value="onthefly">'.
		'<input type=hidden name="table" value="'.postvalue('table').'">'.
		'<input type=hidden name="field" value="'.postvalue('field').'">'.
		'<input type=hidden name="category" value="'.postvalue('category').'">'.
		'<input type=hidden name="id" value="'.$id.'">';

		$xt->assign("cancelbutton_attrs", "onclick=\"RemoveFlyDiv('".$id."');".$destroyCtrls."\"");
		$xt->assign("cancel_button",true);
		$xt->assign("header","");
		// destroy controls befor destroy win		
		//$xt->assign("savebutton_attrs","onclick=\"$destroyCtrls\"");		
	}
	$xt->assign("save_button",true);
}

if($message)
{
	$xt->assign("message_block",true);
	$xt->assign("message",$message);
}
//$xt->assign("status",$status);

$readonlyfields=array();

//	show readonly fields
$linkdata="";

if(!$inlineadd==ADD_INLINE) 
	$pageObject->AddJSCode("SetToFirstControl('".$formname."');");
	
if(@$_POST["a"]=="added" && $inlineadd==ADD_ONTHEFLY && !$error_happened && $status!="DECLINED")
{
	$LookupSQL="";
	if($LookupSQL)
		$LookupSQL.=" from ".AddTableWrappers($strOriginalTableName);

	$data=0;
	if(count($keys) && $LookupSQL)
	{
		$where=KeyWhere($keys);
		$LookupSQL.=" where ".$where;
		$rs=db_query($LookupSQL,$conn);
		$data=db_fetch_numarray($rs);
	}
	if(!$data)
	{
		$data=array(@$avalues[$linkfield],@$avalues[$dispfield]);
	}
	echo "<textarea id=\"data\">";
	echo "added";
	print_inline_array($data);
	echo "</textarea>";
	exit();
}

if(@$_POST["a"]=="added" && ($inlineadd==ADD_INLINE || $inlineadd==ADD_MASTER)) 
{
	//Preparation   view values
	//	get current values and show edit controls
	$dispFieldAlias = "";
	$data=0;
	if(count($keys))
	{
		$where=KeyWhere($keys);
			
		$sqlHead = $gQuery->HeadToSql();
		$sqlGroupBy = $gQuery->GroupByToSql();
		$oHaving = $gQuery->Having();
		$sqlHaving = $oHaving->toSql($gQuery);
		
		$dispFieldAlias = postvalue('dispFieldAlias');
		$dispField = postvalue('dispField');
		
		if ($dispFieldAlias)
		{
			$sqlHead.=", ".($dispField)." as ".AddFieldWrappers($dispFieldAlias)." ";
		}
		$strSQL = gSQLWhere_having($sqlHead, $gsqlFrom, $gsqlWhereExpr, $sqlGroupBy, $sqlHaving, $where, '');		
		
		LogInfo($strSQL);
		$rs=db_query($strSQL,$conn);
		$data=db_fetch_array($rs);
	}
	if(!$data)
	{
		$data=$avalues;
		$HaveData=false;
	}
	//check if correct values added

	$showKeys[] = htmlspecialchars($keys["id_plano"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_plano"]));

	

	
	
////////////////////////////////////////////
//	padrao - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"padrao", ""),"field=padrao".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "padrao";
				$showRawValues[] = substr($data["padrao"],0,100);
	}	
//	contexto - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"contexto", ""),"field=contexto".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "contexto";
				$showRawValues[] = substr($data["contexto"],0,100);
	}	
//	rota - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"rota", ""),"field=rota".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "rota";
				$showRawValues[] = substr($data["rota"],0,100);
	}	
//	id_interf_1 - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("id_interf_1",$data["id_interf_1"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_interf_1";
				$showRawValues[] = substr($data["id_interf_1"],0,100);
	}	
//	add_rota_1 - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"add_rota_1", ""),"field=add%5Frota%5F1".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "add_rota_1";
				$showRawValues[] = substr($data["add_rota_1"],0,100);
	}	
//	id_interf_2 - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("id_interf_2",$data["id_interf_2"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_interf_2";
				$showRawValues[] = substr($data["id_interf_2"],0,100);
	}	
//	add_rota_2 - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"add_rota_2", ""),"field=add%5Frota%5F2".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "add_rota_2";
				$showRawValues[] = substr($data["add_rota_2"],0,100);
	}	
	
	// for custom expression for display field
	if ($dispFieldAlias)
	{
		$showValues[] = $data[$dispFieldAlias];	
		$showFields[] = $dispFieldAlias;
		$showRawValues[] = substr($data[$dispFieldAlias],0,100);
	}		
	
	if($inlineadd==ADD_INLINE)
	{	
		echo "<textarea id=\"data\">";
		if($IsSaved && count($showValues))
		{
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
} 

/////////////////////////////////////////////////////////////
if($inlineadd==ADD_MASTER)
{
	echo "<textarea id=\"data\">";
	$code = "";
	if(($_POST["a"]=="added" && $IsSaved))
	{
		$code .= "window.dpObj.Opts.mSavedValues = {";
		for($i=0;$i<count($showFields);$i++)
			$code .= "'".jsreplace($showFields[$i])."':'".jsreplace($showValues[$i])."'".($i!=(count($showFields)-1) ? "," : "")." ";
		$code .= "};";
		for($i=0;$i<count($dpParams['ids']);$i++)
		{
			$data=0;
			if(count($keys))
			{
				$where=KeyWhere($keys);
							$strSQL = gSQLWhere($where);
				LogInfo($strSQL);
				$rs=db_query($strSQL,$conn);
				$data=db_fetch_array($rs);
			}
			if(!$data)
				$data=$avalues;
				
			$code .= "var obj = window.inlineEditing".$dpParams['ids'][$i].";
					  if(obj && obj.isSbmSuc){obj.mKeys = [";
			foreach($mKeys[$dpParams['strTableNames'][$i]] as $mk)
				$code .= "'".jsreplace($data[$mk])."',";
			$code = substr($code, 0, -1);
			$code .= "];}";
		}
		if((isset($_SESSION[$strTableName."_count_captcha"])) or ($_SESSION[$strTableName."_count_captcha"]>0) or ($_SESSION[$strTableName."_count_captcha"]<5))
			$code .= "window.dpObj.hideCaptcha();";	
		$code .= "window.dpObj.saveAllDetail();";
	}
	elseif(@$_REQUEST["isSbmSuc"]==='0')
		$code .= "window.dpObj.saveAllDetail();";
	elseif(!$isCaptchaOk)
		$code .= "window.dpObj.showHideInvalidCaptcha('show');";
	else
		$code .= "window.dpObj.Opts.mMessage =\"".$message."\";
				  window.dpObj.showMessage();
				  window.dpObj.showHideInvalidCaptcha('hide');";	
	echo $code."</textarea>";
	exit();
}


/////////////////////////////////////////////////////////////
//	prepare Edit Controls
/////////////////////////////////////////////////////////////
//	validation stuff
$regex='';
$regexmessage='';
$regextype = '';
//	control - padrao
$control_padrao=array();
$control_padrao["func"]="xt_buildeditcontrol";
$control_padrao["params"] = array();
$control_padrao["params"]["field"]="padrao";
$control_padrao["params"]["value"]=@$defvalues["padrao"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_padrao["params"]["validate"]=$arrValidate;
//	End Add validation

$control_padrao["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_padrao["params"]["mode"]="inline_add";
else
	$control_padrao["params"]["mode"]="add";

if(!$detailKeys || !in_array("padrao", $detailKeys))
	$xt->assignbyref("padrao_editcontrol",$control_padrao);
else if(array_key_exists("padrao", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"padrao", ""),"field=padrao","",MODE_VIEW);
		$xt->assign("padrao_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - contexto
$control_contexto=array();
$control_contexto["func"]="xt_buildeditcontrol";
$control_contexto["params"] = array();
$control_contexto["params"]["field"]="contexto";
$control_contexto["params"]["value"]=@$defvalues["contexto"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_contexto["params"]["validate"]=$arrValidate;
//	End Add validation

$control_contexto["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_contexto["params"]["mode"]="inline_add";
else
	$control_contexto["params"]["mode"]="add";

if(!$detailKeys || !in_array("contexto", $detailKeys))
	$xt->assignbyref("contexto_editcontrol",$control_contexto);
else if(array_key_exists("contexto", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"contexto", ""),"field=contexto","",MODE_VIEW);
		$xt->assign("contexto_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - rota
$control_rota=array();
$control_rota["func"]="xt_buildeditcontrol";
$control_rota["params"] = array();
$control_rota["params"]["field"]="rota";
$control_rota["params"]["value"]=@$defvalues["rota"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_rota["params"]["validate"]=$arrValidate;
//	End Add validation

$control_rota["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_rota["params"]["mode"]="inline_add";
else
	$control_rota["params"]["mode"]="add";

if(!$detailKeys || !in_array("rota", $detailKeys))
	$xt->assignbyref("rota_editcontrol",$control_rota);
else if(array_key_exists("rota", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"rota", ""),"field=rota","",MODE_VIEW);
		$xt->assign("rota_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - id_interf_1
$control_id_interf_1=array();
$control_id_interf_1["func"]="xt_buildeditcontrol";
$control_id_interf_1["params"] = array();
$control_id_interf_1["params"]["field"]="id_interf_1";
$control_id_interf_1["params"]["value"]=@$defvalues["id_interf_1"];

//	Begin Add validation
$arrValidate = array();	
$control_id_interf_1["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_interf_1["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_interf_1["params"]["mode"]="inline_add";
else
	$control_id_interf_1["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_interf_1", $detailKeys))
	$xt->assignbyref("id_interf_1_editcontrol",$control_id_interf_1);
else if(array_key_exists("id_interf_1", $defvalues))
{
				$value=DisplayLookupWizard("id_interf_1",$defvalues["id_interf_1"],$defvalues,"",MODE_VIEW);
		$xt->assign("id_interf_1_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - add_rota_1
$control_add_rota_1=array();
$control_add_rota_1["func"]="xt_buildeditcontrol";
$control_add_rota_1["params"] = array();
$control_add_rota_1["params"]["field"]="add_rota_1";
$control_add_rota_1["params"]["value"]=@$defvalues["add_rota_1"];

//	Begin Add validation
$arrValidate = array();	
$control_add_rota_1["params"]["validate"]=$arrValidate;
//	End Add validation

$control_add_rota_1["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_add_rota_1["params"]["mode"]="inline_add";
else
	$control_add_rota_1["params"]["mode"]="add";

if(!$detailKeys || !in_array("add_rota_1", $detailKeys))
	$xt->assignbyref("add_rota_1_editcontrol",$control_add_rota_1);
else if(array_key_exists("add_rota_1", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"add_rota_1", ""),"field=add%5Frota%5F1","",MODE_VIEW);
		$xt->assign("add_rota_1_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - id_interf_2
$control_id_interf_2=array();
$control_id_interf_2["func"]="xt_buildeditcontrol";
$control_id_interf_2["params"] = array();
$control_id_interf_2["params"]["field"]="id_interf_2";
$control_id_interf_2["params"]["value"]=@$defvalues["id_interf_2"];

//	Begin Add validation
$arrValidate = array();	
$control_id_interf_2["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_interf_2["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_interf_2["params"]["mode"]="inline_add";
else
	$control_id_interf_2["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_interf_2", $detailKeys))
	$xt->assignbyref("id_interf_2_editcontrol",$control_id_interf_2);
else if(array_key_exists("id_interf_2", $defvalues))
{
				$value=DisplayLookupWizard("id_interf_2",$defvalues["id_interf_2"],$defvalues,"",MODE_VIEW);
		$xt->assign("id_interf_2_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - add_rota_2
$control_add_rota_2=array();
$control_add_rota_2["func"]="xt_buildeditcontrol";
$control_add_rota_2["params"] = array();
$control_add_rota_2["params"]["field"]="add_rota_2";
$control_add_rota_2["params"]["value"]=@$defvalues["add_rota_2"];

//	Begin Add validation
$arrValidate = array();	
$control_add_rota_2["params"]["validate"]=$arrValidate;
//	End Add validation

$control_add_rota_2["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_add_rota_2["params"]["mode"]="inline_add";
else
	$control_add_rota_2["params"]["mode"]="add";

if(!$detailKeys || !in_array("add_rota_2", $detailKeys))
	$xt->assignbyref("add_rota_2_editcontrol",$control_add_rota_2);
else if(array_key_exists("add_rota_2", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"add_rota_2", ""),"field=add%5Frota%5F2","",MODE_VIEW);
		$xt->assign("add_rota_2_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();
/////////////////////////////////////////////////////////////
if($isShowDetailTables)
{
	$options = array();
	//array of params for classes
	$options["mode"] = LIST_DETAILS;
	$options["pageType"] = PAGE_LIST;
	$options["masterPageType"] = PAGE_ADD;
	$options['masterTable'] = $strTableName;
	$options['firstTime'] = 1;

	if(count($dpParams['ids']))
	{
		$xt->assign("detail_tables",true);
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
		include("classes/searchclause.php");
	}
	
	for($d=0;$d<count($dpParams['ids']);$d++)
	{
		$strTableName = $dpParams['strTableNames'][$d];
		include("include/".GetTableURL($strTableName)."_settings.php");
		$options['xt'] = new Xtempl();
		$options['id'] = $dpParams['ids'][$d];

		$listPageObject = ListPage::createListPage($strTableName,$options);
		// prepare code
		$listPageObject->prepareForBuildPage();
		
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
	$strTableName = "ipbx_plano_disc";
}
/////////////////////////////////////////////////////////////

$jscode = $pageObject->PrepareJS();
if($inlineadd!=ADD_ONTHEFLY && $inlineadd!=ADD_MASTER)
{
	if($inlineadd==ADD_INLINE)
	{
		$jscode=str_replace(array("&","<",">"),array("&amp;","&lt;","&gt;"),$jscode);
		$xt->assignbyref("linkdata",$jscode);
	}
	$pageObject->body["end"] .= "<script>".$jscode."</script>";
	$xt->assign("body",$pageObject->body);
	$xt->assign("flybody",true);
}
else
{
	if(!@$_POST["a"]=="added")
	{
		echo "<jscode>";
		echo str_replace(array("\\","\r","\n"),array("\\\\","\\r","\\n"),$jscode);;
		echo "</jscode>";
	}
	else if(@$_POST["a"]=="added" && ($error_happened || $status=="DECLINED"))
	{
		echo "<textarea id=\"data\">decli";
		//$jscode = "\n\rwindow.Runner = window.opener.Runner;console.log(window.Runner, window.opener.Runner);".$jscode;
		echo htmlspecialchars($jscode);
		echo "</textarea>";
	}
	$pageObject->body["end"] .= "</form>";	
	$xt->assign("footer","");
	$xt->assign("flybody",$pageObject->body);
	$xt->assign("body",true);
}	



$xt->assign("style_block",true);
$pageObject->xt->assign("legendBreak", '<br/>');




if(function_exists("BeforeShowAdd"))
	BeforeShowAdd($xt,$templatefile);

if($inlineadd==ADD_ONTHEFLY)
{
	$xt->load_template($templatefile);
	if(@$_POST["a"]=="added" && ($error_happened || $status=="DECLINED"))
	{
		echo "<textarea id=\"html\">";		
		$xt->display_loaded("style_block");
		$xt->display_loaded("flybody");
		echo "</textarea>";
	}
	else
	{		
		$xt->display_loaded("style_block");
		$xt->display_loaded("flybody");
	}
	
}
else
	$xt->display($templatefile);
?>
