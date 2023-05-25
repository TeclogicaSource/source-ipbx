<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/sip_users_variables.php");
include('include/xtempl.php');
include('classes/runnerpage.php');

//	check if logged in
if(@$_SESSION["UserID"] && IsAdmin() && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Add"))
{
	echo "<p>"."Voc� n�o tem permiss�o para acessar esta tabela"."<br>Proceed to <a href=\"admin.php\">Admin Area</a> to set up user permissions</p>";
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
	$templatefile = "sip_users_inline_add.htm";
else
	$templatefile = "sip_users_add.htm";

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
	$mKeys["desvios_pabx"] = GetMasterKeysByDetailTable("desvios_pabx", $strTableName);
	$dpParams['strTableNames'][] = "desvios_pabx";
	$dpParams['ids'][] = ++$ids;
	$mKeys["sip_users_additional"] = GetMasterKeysByDetailTable("sip_users_additional", $strTableName);
	$dpParams['strTableNames'][] = "sip_users_additional";
	$dpParams['ids'][] = ++$ids;
	if($inlineadd==ADD_SIMPLE)
	{
		$pageObject->AddJSCode("window.dpObj = new dpInlineOnAddEdit({
			'mTableName':'".jsreplace($strTableName)."',
			'mShortTableName':'sip_users', 
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
//	processing secret - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_secret_".$id);
	$type=postvalue("type_secret_".$id);
	if (FieldSubmitted("secret_".$id))
	{
		$value=prepare_for_db("secret",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "secret"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["secret"]=$value;
	}
	}
//	processibng secret - end
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
//	processing accountcode - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_accountcode_".$id);
	$type=postvalue("type_accountcode_".$id);
	if (FieldSubmitted("accountcode_".$id))
	{
		$value=prepare_for_db("accountcode",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "accountcode"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["accountcode"]=$value;
	}
	}
//	processibng accountcode - end
//	processing callerid - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_callerid_".$id);
	$type=postvalue("type_callerid_".$id);
	if (FieldSubmitted("callerid_".$id))
	{
		$value=prepare_for_db("callerid",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "callerid"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["callerid"]=$value;
	}
	}
//	processibng callerid - end
//	processing context - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_context_".$id);
	$type=postvalue("type_context_".$id);
	if (FieldSubmitted("context_".$id))
	{
		$value=prepare_for_db("context",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "context"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["context"]=$value;
	}
	}
//	processibng context - end
//	processing call-limit - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_call_limit_".$id);
	$type=postvalue("type_call_limit_".$id);
	if (FieldSubmitted("call-limit_".$id))
	{
		$value=prepare_for_db("call-limit",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "call-limit"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["call-limit"]=$value;
	}
	}
//	processibng call-limit - end
//	processing pickupgroup - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_pickupgroup_".$id);
	$type=postvalue("type_pickupgroup_".$id);
	if (FieldSubmitted("pickupgroup_".$id))
	{
		$value=prepare_for_db("pickupgroup",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "pickupgroup"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["pickupgroup"]=$value;
	}
	}
//	processibng pickupgroup - end
//	processing allow - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_allow_".$id);
	$type=postvalue("type_allow_".$id);
	if (FieldSubmitted("allow_".$id))
	{
		$value=prepare_for_db("allow",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "allow"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["allow"]=$value;
	}
	}
//	processibng allow - end



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
					$message .='&nbsp;<a href=\'sip_users_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'sip_users_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: sip_users_".$pageObject->getPageType().".php");
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
		$copykeys["id"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["id"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id"]="";
//call CopyOnLoad event
	if(function_exists("CopyOnLoad"))
		CopyOnLoad($defvalues,$strWhere);
}
else
{
}

if($readavalues)
{
	$defvalues["name"]=@$avalues["name"];
	$defvalues["accountcode"]=@$avalues["accountcode"];
	$defvalues["call-limit"]=@$avalues["call-limit"];
	$defvalues["callerid"]=@$avalues["callerid"];
	$defvalues["context"]=@$avalues["context"];
	$defvalues["pickupgroup"]=@$avalues["pickupgroup"];
	$defvalues["secret"]=@$avalues["secret"];
	$defvalues["allow"]=@$avalues["allow"];
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
	$xt->assign("name_fieldblock",true);
	$xt->assign("name_label",true);
	if(isEnableSection508())
		$xt->assign_section("name_label","<label for=\"".GetInputElementId("name", $id)."\">","</label>");
	$xt->assign("accountcode_fieldblock",true);
	$xt->assign("accountcode_label",true);
	if(isEnableSection508())
		$xt->assign_section("accountcode_label","<label for=\"".GetInputElementId("accountcode", $id)."\">","</label>");
	$xt->assign("call_limit_fieldblock",true);
	$xt->assign("call_limit_label",true);
	if(isEnableSection508())
		$xt->assign_section("call_limit_label","<label for=\"".GetInputElementId("call-limit", $id)."\">","</label>");
	$xt->assign("callerid_fieldblock",true);
	$xt->assign("callerid_label",true);
	if(isEnableSection508())
		$xt->assign_section("callerid_label","<label for=\"".GetInputElementId("callerid", $id)."\">","</label>");
	$xt->assign("context_fieldblock",true);
	$xt->assign("context_label",true);
	if(isEnableSection508())
		$xt->assign_section("context_label","<label for=\"".GetInputElementId("context", $id)."\">","</label>");
	$xt->assign("pickupgroup_fieldblock",true);
	$xt->assign("pickupgroup_label",true);
	if(isEnableSection508())
		$xt->assign_section("pickupgroup_label","<label for=\"".GetInputElementId("pickupgroup", $id)."\">","</label>");
	$xt->assign("secret_fieldblock",true);
	$xt->assign("secret_label",true);
	if(isEnableSection508())
		$xt->assign_section("secret_label","<label for=\"".GetInputElementId("secret", $id)."\">","</label>");
	$xt->assign("allow_fieldblock",true);
	$xt->assign("allow_label",true);
	if(isEnableSection508())
		$xt->assign_section("allow_label","<label for=\"".GetInputElementId("allow", $id)."\">","</label>");
	
	
	if($inlineadd!=ADD_ONTHEFLY)
	{
		if($onsubmit)
			$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit)."\"";
		
		$pageObject->body["begin"] .= $includes;
		if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='sip_users_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="sip_users_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="sip_users_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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
	$masterquery="mastertable=sip%5Fusers";
	$masterquery.="&masterkey1=".rawurlencode($data["name"]);
	$showDetailKeys["desvios_pabx"]=$masterquery;
	$masterquery="mastertable=sip%5Fusers";
	$masterquery.="&masterkey1=".rawurlencode($data["name"]);
	$showDetailKeys["sip_users_additional"]=$masterquery;

	$showKeys[] = htmlspecialchars($keys["id"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));

	

	
	
////////////////////////////////////////////
//	name - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"name", ""),"field=name".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "name";
				$showRawValues[] = substr($data["name"],0,100);
	}	
//	accountcode - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("accountcode",$data["accountcode"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "accountcode";
				$showRawValues[] = substr($data["accountcode"],0,100);
	}	
//	call-limit - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"call-limit", ""),"field=call%2Dlimit".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "call_limit";
				$showRawValues[] = substr($data["call-limit"],0,100);
	}	
//	callerid - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"callerid", ""),"field=callerid".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "callerid";
				$showRawValues[] = substr($data["callerid"],0,100);
	}	
//	context - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"context", ""),"field=context".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "context";
				$showRawValues[] = substr($data["context"],0,100);
	}	
//	pickupgroup - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"pickupgroup", ""),"field=pickupgroup".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "pickupgroup";
				$showRawValues[] = substr($data["pickupgroup"],0,100);
	}	
//	secret - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"secret", ""),"field=secret".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "secret";
				$showRawValues[] = substr($data["secret"],0,100);
	}	
//	allow - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("allow",$data["allow"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "allow";
				$showRawValues[] = substr($data["allow"],0,100);
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
//	control - name
$control_name=array();
$control_name["func"]="xt_buildeditcontrol";
$control_name["params"] = array();
$control_name["params"]["field"]="name";
$control_name["params"]["value"]=@$defvalues["name"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
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
				$value=DisplayLookupWizard("name",$defvalues["name"],$defvalues,"",MODE_VIEW);
		$xt->assign("name_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - accountcode
$control_accountcode=array();
$control_accountcode["func"]="xt_buildeditcontrol";
$control_accountcode["params"] = array();
$control_accountcode["params"]["field"]="accountcode";
$control_accountcode["params"]["value"]=@$defvalues["accountcode"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_accountcode["params"]["validate"]=$arrValidate;
//	End Add validation

$control_accountcode["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_accountcode["params"]["mode"]="inline_add";
else
	$control_accountcode["params"]["mode"]="add";

if(!$detailKeys || !in_array("accountcode", $detailKeys))
	$xt->assignbyref("accountcode_editcontrol",$control_accountcode);
else if(array_key_exists("accountcode", $defvalues))
{
				$value=DisplayLookupWizard("accountcode",$defvalues["accountcode"],$defvalues,"",MODE_VIEW);
		$xt->assign("accountcode_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - call_limit
$control_call_limit=array();
$control_call_limit["func"]="xt_buildeditcontrol";
$control_call_limit["params"] = array();
$control_call_limit["params"]["field"]="call-limit";
$control_call_limit["params"]["value"]=@$defvalues["call-limit"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_call_limit["params"]["validate"]=$arrValidate;
//	End Add validation

$control_call_limit["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_call_limit["params"]["mode"]="inline_add";
else
	$control_call_limit["params"]["mode"]="add";

if(!$detailKeys || !in_array("call-limit", $detailKeys))
	$xt->assignbyref("call_limit_editcontrol",$control_call_limit);
else if(array_key_exists("call-limit", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"call-limit", ""),"field=call%2Dlimit","",MODE_VIEW);
		$xt->assign("call_limit_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - callerid
$control_callerid=array();
$control_callerid["func"]="xt_buildeditcontrol";
$control_callerid["params"] = array();
$control_callerid["params"]["field"]="callerid";
$control_callerid["params"]["value"]=@$defvalues["callerid"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_callerid["params"]["validate"]=$arrValidate;
//	End Add validation

$control_callerid["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_callerid["params"]["mode"]="inline_add";
else
	$control_callerid["params"]["mode"]="add";

if(!$detailKeys || !in_array("callerid", $detailKeys))
	$xt->assignbyref("callerid_editcontrol",$control_callerid);
else if(array_key_exists("callerid", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"callerid", ""),"field=callerid","",MODE_VIEW);
		$xt->assign("callerid_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - context
$control_context=array();
$control_context["func"]="xt_buildeditcontrol";
$control_context["params"] = array();
$control_context["params"]["field"]="context";
$control_context["params"]["value"]=@$defvalues["context"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_context["params"]["validate"]=$arrValidate;
//	End Add validation

$control_context["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_context["params"]["mode"]="inline_add";
else
	$control_context["params"]["mode"]="add";

if(!$detailKeys || !in_array("context", $detailKeys))
	$xt->assignbyref("context_editcontrol",$control_context);
else if(array_key_exists("context", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"context", ""),"field=context","",MODE_VIEW);
		$xt->assign("context_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - pickupgroup
$control_pickupgroup=array();
$control_pickupgroup["func"]="xt_buildeditcontrol";
$control_pickupgroup["params"] = array();
$control_pickupgroup["params"]["field"]="pickupgroup";
$control_pickupgroup["params"]["value"]=@$defvalues["pickupgroup"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_pickupgroup["params"]["validate"]=$arrValidate;
//	End Add validation

$control_pickupgroup["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_pickupgroup["params"]["mode"]="inline_add";
else
	$control_pickupgroup["params"]["mode"]="add";

if(!$detailKeys || !in_array("pickupgroup", $detailKeys))
	$xt->assignbyref("pickupgroup_editcontrol",$control_pickupgroup);
else if(array_key_exists("pickupgroup", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"pickupgroup", ""),"field=pickupgroup","",MODE_VIEW);
		$xt->assign("pickupgroup_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - secret
$control_secret=array();
$control_secret["func"]="xt_buildeditcontrol";
$control_secret["params"] = array();
$control_secret["params"]["field"]="secret";
$control_secret["params"]["value"]=@$defvalues["secret"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_secret["params"]["validate"]=$arrValidate;
//	End Add validation

$control_secret["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_secret["params"]["mode"]="inline_add";
else
	$control_secret["params"]["mode"]="add";

if(!$detailKeys || !in_array("secret", $detailKeys))
	$xt->assignbyref("secret_editcontrol",$control_secret);
else if(array_key_exists("secret", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"secret", ""),"field=secret","",MODE_VIEW);
		$xt->assign("secret_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - allow
$control_allow=array();
$control_allow["func"]="xt_buildeditcontrol";
$control_allow["params"] = array();
$control_allow["params"]["field"]="allow";
$control_allow["params"]["value"]=@$defvalues["allow"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_allow["params"]["validate"]=$arrValidate;
//	End Add validation

$control_allow["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_allow["params"]["mode"]="inline_add";
else
	$control_allow["params"]["mode"]="add";

if(!$detailKeys || !in_array("allow", $detailKeys))
	$xt->assignbyref("allow_editcontrol",$control_allow);
else if(array_key_exists("allow", $defvalues))
{
				$value=DisplayLookupWizard("allow",$defvalues["allow"],$defvalues,"",MODE_VIEW);
		$xt->assign("allow_editcontrol",$value);
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
	$strTableName = "sip_users";
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
