<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/sip_users_additional_variables.php");
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
	$templatefile = "sip_users_additional_inline_add.htm";
else
	$templatefile = "sip_users_additional_add.htm";

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
			'mShortTableName':'sip_users_additional', 
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
//	processing id_additional - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_additional_".$id);
	$type=postvalue("type_id_additional_".$id);
	if (FieldSubmitted("id_additional_".$id))
	{
		$value=prepare_for_db("id_additional",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_additional"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_additional"]=$value;
	}
	}
//	processibng id_additional - end
//	processing name - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_name_".$id);
	$type=postvalue("type_name_".$id);
	if (FieldSubmitted("name_".$id))
	{
		$value=prepare_for_db("name",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "name"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["name"]=$value;
	}
	}
//	processibng name - end
//	processing trc_piloto - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_trc_piloto_".$id);
	$type=postvalue("type_trc_piloto_".$id);
	if (FieldSubmitted("trc_piloto_".$id))
	{
		$value=prepare_for_db("trc_piloto",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "trc_piloto"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["trc_piloto"]=$value;
	}
	}
//	processibng trc_piloto - end
//	processing mail - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_mail_".$id);
	$type=postvalue("type_mail_".$id);
	if (FieldSubmitted("mail_".$id))
	{
		$value=prepare_for_db("mail",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "mail"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["mail"]=$value;
	}
	}
//	processibng mail - end
//	processing call_forward - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_call_forward_".$id);
	$type=postvalue("type_call_forward_".$id);
	if (FieldSubmitted("call_forward_".$id))
	{
		$value=prepare_for_db("call_forward",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "call_forward"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["call_forward"]=$value;
	}
	}
//	processibng call_forward - end
//	processing flg_fax - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_fax_".$id);
	$type=postvalue("type_flg_fax_".$id);
	if (FieldSubmitted("flg_fax_".$id))
	{
		$value=prepare_for_db("flg_fax",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_fax"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_fax"]=$value;
	}
	}
//	processibng flg_fax - end


//	insert masterkey value if exists and if not specified
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="sip_users")
	{
		if(!@$_SESSION[$sessionPrefix."_masterkey1"] && postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		if($avalues["name"]=="")
			$avalues["name"]=prepare_for_db("name",$_SESSION[$sessionPrefix."_masterkey1"]);
	}

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
					$message .='&nbsp;<a href=\'sip_users_additional_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'sip_users_additional_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: sip_users_additional_".$pageObject->getPageType().".php");
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
		$copykeys["id_additional"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["id_additional"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id_additional"]="";
//call CopyOnLoad event
	if(function_exists("CopyOnLoad"))
		CopyOnLoad($defvalues,$strWhere);
}
else
{
}
//	set default values for the foreign keys
if(@$_SESSION[$sessionPrefix."_mastertable"]=="sip_users")
{
	if(!@$_SESSION[$sessionPrefix."_masterkey1"] && postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
	$defvalues["name"]=@$_SESSION[$sessionPrefix."_masterkey1"];	
}

if($readavalues)
{
	$defvalues["id_additional"]=@$avalues["id_additional"];
	$defvalues["name"]=@$avalues["name"];
	$defvalues["trc_piloto"]=@$avalues["trc_piloto"];
	$defvalues["mail"]=@$avalues["mail"];
	$defvalues["call_forward"]=@$avalues["call_forward"];
	$defvalues["flg_fax"]=@$avalues["flg_fax"];
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
	$xt->assign("id_additional_fieldblock",true);
	$xt->assign("id_additional_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_additional_label","<label for=\"".GetInputElementId("id_additional", $id)."\">","</label>");
	$xt->assign("name_fieldblock",true);
	$xt->assign("name_label",true);
	if(isEnableSection508())
		$xt->assign_section("name_label","<label for=\"".GetInputElementId("name", $id)."\">","</label>");
	$xt->assign("trc_piloto_fieldblock",true);
	$xt->assign("trc_piloto_label",true);
	if(isEnableSection508())
		$xt->assign_section("trc_piloto_label","<label for=\"".GetInputElementId("trc_piloto", $id)."\">","</label>");
	$xt->assign("mail_fieldblock",true);
	$xt->assign("mail_label",true);
	if(isEnableSection508())
		$xt->assign_section("mail_label","<label for=\"".GetInputElementId("mail", $id)."\">","</label>");
	$xt->assign("call_forward_fieldblock",true);
	$xt->assign("call_forward_label",true);
	if(isEnableSection508())
		$xt->assign_section("call_forward_label","<label for=\"".GetInputElementId("call_forward", $id)."\">","</label>");
	$xt->assign("flg_fax_fieldblock",true);
	$xt->assign("flg_fax_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_fax_label","<label for=\"".GetInputElementId("flg_fax", $id)."\">","</label>");
	
	
	if($inlineadd!=ADD_ONTHEFLY)
	{
		if($onsubmit)
			$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit)."\"";
		
		$pageObject->body["begin"] .= $includes;
		if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='sip_users_additional_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="sip_users_additional_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="sip_users_additional_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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

	$showKeys[] = htmlspecialchars($keys["id_additional"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_additional"]));

	

	
	
////////////////////////////////////////////
//	id_additional - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"id_additional", ""),"field=id%5Fadditional".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_additional";
				$showRawValues[] = substr($data["id_additional"],0,100);
	}	
//	name - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"name", ""),"field=name".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "name";
				$showRawValues[] = substr($data["name"],0,100);
	}	
//	trc_piloto - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("trc_piloto",$data["trc_piloto"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "trc_piloto";
				$showRawValues[] = substr($data["trc_piloto"],0,100);
	}	
//	mail - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"mail", ""),"field=mail".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "mail";
				$showRawValues[] = substr($data["mail"],0,100);
	}	
//	call_forward - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("call_forward",$data["call_forward"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "call_forward";
				$showRawValues[] = substr($data["call_forward"],0,100);
	}	
//	flg_fax - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"flg_fax", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "flg_fax";
				$showRawValues[] = substr($data["flg_fax"],0,100);
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
//	control - id_additional
$control_id_additional=array();
$control_id_additional["func"]="xt_buildeditcontrol";
$control_id_additional["params"] = array();
$control_id_additional["params"]["field"]="id_additional";
$control_id_additional["params"]["value"]=@$defvalues["id_additional"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_id_additional["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_additional["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_additional["params"]["mode"]="inline_add";
else
	$control_id_additional["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_additional", $detailKeys))
	$xt->assignbyref("id_additional_editcontrol",$control_id_additional);
else if(array_key_exists("id_additional", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"id_additional", ""),"field=id%5Fadditional","",MODE_VIEW);
		$xt->assign("id_additional_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - name
$control_name=array();
$control_name["func"]="xt_buildeditcontrol";
$control_name["params"] = array();
$control_name["params"]["field"]="name";
$control_name["params"]["value"]=@$defvalues["name"];

//	Begin Add validation
$arrValidate = array();	
$control_name["params"]["validate"]=$arrValidate;
//	End Add validation

$control_name["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_name["params"]["mode"]="inline_add";
else
	$control_name["params"]["mode"]="add";

if(!$detailKeys || !in_array("name", $detailKeys))
	$xt->assignbyref("name_editcontrol",$control_name);
else if(array_key_exists("name", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"name", ""),"field=name","",MODE_VIEW);
		$xt->assign("name_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - trc_piloto
$control_trc_piloto=array();
$control_trc_piloto["func"]="xt_buildeditcontrol";
$control_trc_piloto["params"] = array();
$control_trc_piloto["params"]["field"]="trc_piloto";
$control_trc_piloto["params"]["value"]=@$defvalues["trc_piloto"];

//	Begin Add validation
$arrValidate = array();	
$control_trc_piloto["params"]["validate"]=$arrValidate;
//	End Add validation

$control_trc_piloto["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_trc_piloto["params"]["mode"]="inline_add";
else
	$control_trc_piloto["params"]["mode"]="add";

if(!$detailKeys || !in_array("trc_piloto", $detailKeys))
	$xt->assignbyref("trc_piloto_editcontrol",$control_trc_piloto);
else if(array_key_exists("trc_piloto", $defvalues))
{
				$value=DisplayLookupWizard("trc_piloto",$defvalues["trc_piloto"],$defvalues,"",MODE_VIEW);
		$xt->assign("trc_piloto_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - mail
$control_mail=array();
$control_mail["func"]="xt_buildeditcontrol";
$control_mail["params"] = array();
$control_mail["params"]["field"]="mail";
$control_mail["params"]["value"]=@$defvalues["mail"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Email");
	$arrValidate['basicValidate'][] = $validatetype;
$control_mail["params"]["validate"]=$arrValidate;
//	End Add validation

$control_mail["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_mail["params"]["mode"]="inline_add";
else
	$control_mail["params"]["mode"]="add";

if(!$detailKeys || !in_array("mail", $detailKeys))
	$xt->assignbyref("mail_editcontrol",$control_mail);
else if(array_key_exists("mail", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"mail", ""),"field=mail","",MODE_VIEW);
		$xt->assign("mail_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - call_forward
$control_call_forward=array();
$control_call_forward["func"]="xt_buildeditcontrol";
$control_call_forward["params"] = array();
$control_call_forward["params"]["field"]="call_forward";
$control_call_forward["params"]["value"]=@$defvalues["call_forward"];

//	Begin Add validation
$arrValidate = array();	
$control_call_forward["params"]["validate"]=$arrValidate;
//	End Add validation

$control_call_forward["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_call_forward["params"]["mode"]="inline_add";
else
	$control_call_forward["params"]["mode"]="add";

if(!$detailKeys || !in_array("call_forward", $detailKeys))
	$xt->assignbyref("call_forward_editcontrol",$control_call_forward);
else if(array_key_exists("call_forward", $defvalues))
{
				$value=DisplayLookupWizard("call_forward",$defvalues["call_forward"],$defvalues,"",MODE_VIEW);
		$xt->assign("call_forward_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_fax
$control_flg_fax=array();
$control_flg_fax["func"]="xt_buildeditcontrol";
$control_flg_fax["params"] = array();
$control_flg_fax["params"]["field"]="flg_fax";
$control_flg_fax["params"]["value"]=@$defvalues["flg_fax"];

//	Begin Add validation
$arrValidate = array();	
$control_flg_fax["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_fax["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_fax["params"]["mode"]="inline_add";
else
	$control_flg_fax["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_fax", $detailKeys))
	$xt->assignbyref("flg_fax_editcontrol",$control_flg_fax);
else if(array_key_exists("flg_fax", $defvalues))
{
				$value = GetData($defvalues,"flg_fax", "Checkbox");
		$xt->assign("flg_fax_editcontrol",$value);
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
	$strTableName = "sip_users_additional";
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
$pageObject->xt->assign("legend", true);




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
