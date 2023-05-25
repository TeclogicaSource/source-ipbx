<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/admin_users_variables.php");
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
	$templatefile = "admin_users_inline_add.htm";
else
	$templatefile = "admin_users_add.htm";

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
			'mShortTableName':'admin_users', 
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
//	processing id - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_".$id);
	$type=postvalue("type_id_".$id);
	if (FieldSubmitted("id_".$id))
	{
		$value=prepare_for_db("id",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id"]=$value;
	}
	}
//	processibng id - end
//	processing name - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
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
//	processing host - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_host_".$id);
	$type=postvalue("type_host_".$id);
	if (FieldSubmitted("host_".$id))
	{
		$value=prepare_for_db("host",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "host"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["host"]=$value;
	}
	}
//	processibng host - end
//	processing nat - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_nat_".$id);
	$type=postvalue("type_nat_".$id);
	if (FieldSubmitted("nat_".$id))
	{
		$value=prepare_for_db("nat",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "nat"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["nat"]=$value;
	}
	}
//	processibng nat - end
//	processing type - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_type_".$id);
	$type=postvalue("type_type_".$id);
	if (FieldSubmitted("type_".$id))
	{
		$value=prepare_for_db("type",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "type"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["type"]=$value;
	}
	}
//	processibng type - end
//	processing accountcode - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
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
//	processing amaflags - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_amaflags_".$id);
	$type=postvalue("type_amaflags_".$id);
	if (FieldSubmitted("amaflags_".$id))
	{
		$value=prepare_for_db("amaflags",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "amaflags"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["amaflags"]=$value;
	}
	}
//	processibng amaflags - end
//	processing call-limit - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
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
//	processing callgroup - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_callgroup_".$id);
	$type=postvalue("type_callgroup_".$id);
	if (FieldSubmitted("callgroup_".$id))
	{
		$value=prepare_for_db("callgroup",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "callgroup"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["callgroup"]=$value;
	}
	}
//	processibng callgroup - end
//	processing callerid - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
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
//	processing cancallforward - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_cancallforward_".$id);
	$type=postvalue("type_cancallforward_".$id);
	if (FieldSubmitted("cancallforward_".$id))
	{
		$value=prepare_for_db("cancallforward",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "cancallforward"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["cancallforward"]=$value;
	}
	}
//	processibng cancallforward - end
//	processing canreinvite - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_canreinvite_".$id);
	$type=postvalue("type_canreinvite_".$id);
	if (FieldSubmitted("canreinvite_".$id))
	{
		$value=prepare_for_db("canreinvite",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "canreinvite"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["canreinvite"]=$value;
	}
	}
//	processibng canreinvite - end
//	processing context - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
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
//	processing defaultip - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_defaultip_".$id);
	$type=postvalue("type_defaultip_".$id);
	if (FieldSubmitted("defaultip_".$id))
	{
		$value=prepare_for_db("defaultip",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "defaultip"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["defaultip"]=$value;
	}
	}
//	processibng defaultip - end
//	processing dtmfmode - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dtmfmode_".$id);
	$type=postvalue("type_dtmfmode_".$id);
	if (FieldSubmitted("dtmfmode_".$id))
	{
		$value=prepare_for_db("dtmfmode",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dtmfmode"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dtmfmode"]=$value;
	}
	}
//	processibng dtmfmode - end
//	processing fromuser - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_fromuser_".$id);
	$type=postvalue("type_fromuser_".$id);
	if (FieldSubmitted("fromuser_".$id))
	{
		$value=prepare_for_db("fromuser",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "fromuser"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["fromuser"]=$value;
	}
	}
//	processibng fromuser - end
//	processing fromdomain - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_fromdomain_".$id);
	$type=postvalue("type_fromdomain_".$id);
	if (FieldSubmitted("fromdomain_".$id))
	{
		$value=prepare_for_db("fromdomain",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "fromdomain"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["fromdomain"]=$value;
	}
	}
//	processibng fromdomain - end
//	processing insecure - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_insecure_".$id);
	$type=postvalue("type_insecure_".$id);
	if (FieldSubmitted("insecure_".$id))
	{
		$value=prepare_for_db("insecure",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "insecure"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["insecure"]=$value;
	}
	}
//	processibng insecure - end
//	processing language - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_language_".$id);
	$type=postvalue("type_language_".$id);
	if (FieldSubmitted("language_".$id))
	{
		$value=prepare_for_db("language",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "language"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["language"]=$value;
	}
	}
//	processibng language - end
//	processing mailbox - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_mailbox_".$id);
	$type=postvalue("type_mailbox_".$id);
	if (FieldSubmitted("mailbox_".$id))
	{
		$value=prepare_for_db("mailbox",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "mailbox"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["mailbox"]=$value;
	}
	}
//	processibng mailbox - end
//	processing md5secret - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_md5secret_".$id);
	$type=postvalue("type_md5secret_".$id);
	if (FieldSubmitted("md5secret_".$id))
	{
		$value=prepare_for_db("md5secret",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "md5secret"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["md5secret"]=$value;
	}
	}
//	processibng md5secret - end
//	processing deny - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_deny_".$id);
	$type=postvalue("type_deny_".$id);
	if (FieldSubmitted("deny_".$id))
	{
		$value=prepare_for_db("deny",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "deny"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["deny"]=$value;
	}
	}
//	processibng deny - end
//	processing permit - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_permit_".$id);
	$type=postvalue("type_permit_".$id);
	if (FieldSubmitted("permit_".$id))
	{
		$value=prepare_for_db("permit",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "permit"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["permit"]=$value;
	}
	}
//	processibng permit - end
//	processing mask - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_mask_".$id);
	$type=postvalue("type_mask_".$id);
	if (FieldSubmitted("mask_".$id))
	{
		$value=prepare_for_db("mask",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "mask"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["mask"]=$value;
	}
	}
//	processibng mask - end
//	processing musiconhold - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_musiconhold_".$id);
	$type=postvalue("type_musiconhold_".$id);
	if (FieldSubmitted("musiconhold_".$id))
	{
		$value=prepare_for_db("musiconhold",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "musiconhold"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["musiconhold"]=$value;
	}
	}
//	processibng musiconhold - end
//	processing pickupgroup - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
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
//	processing qualify - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_qualify_".$id);
	$type=postvalue("type_qualify_".$id);
	if (FieldSubmitted("qualify_".$id))
	{
		$value=prepare_for_db("qualify",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "qualify"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["qualify"]=$value;
	}
	}
//	processibng qualify - end
//	processing rtcachefriends - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_rtcachefriends_".$id);
	$type=postvalue("type_rtcachefriends_".$id);
	if (FieldSubmitted("rtcachefriends_".$id))
	{
		$value=prepare_for_db("rtcachefriends",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "rtcachefriends"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["rtcachefriends"]=$value;
	}
	}
//	processibng rtcachefriends - end
//	processing regexten - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_regexten_".$id);
	$type=postvalue("type_regexten_".$id);
	if (FieldSubmitted("regexten_".$id))
	{
		$value=prepare_for_db("regexten",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "regexten"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["regexten"]=$value;
	}
	}
//	processibng regexten - end
//	processing restrictcid - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_restrictcid_".$id);
	$type=postvalue("type_restrictcid_".$id);
	if (FieldSubmitted("restrictcid_".$id))
	{
		$value=prepare_for_db("restrictcid",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "restrictcid"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["restrictcid"]=$value;
	}
	}
//	processibng restrictcid - end
//	processing rtptimeout - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_rtptimeout_".$id);
	$type=postvalue("type_rtptimeout_".$id);
	if (FieldSubmitted("rtptimeout_".$id))
	{
		$value=prepare_for_db("rtptimeout",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "rtptimeout"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["rtptimeout"]=$value;
	}
	}
//	processibng rtptimeout - end
//	processing rtpholdtimeout - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_rtpholdtimeout_".$id);
	$type=postvalue("type_rtpholdtimeout_".$id);
	if (FieldSubmitted("rtpholdtimeout_".$id))
	{
		$value=prepare_for_db("rtpholdtimeout",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "rtpholdtimeout"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["rtpholdtimeout"]=$value;
	}
	}
//	processibng rtpholdtimeout - end
//	processing secret - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
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
//	processing setvar - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_setvar_".$id);
	$type=postvalue("type_setvar_".$id);
	if (FieldSubmitted("setvar_".$id))
	{
		$value=prepare_for_db("setvar",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "setvar"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["setvar"]=$value;
	}
	}
//	processibng setvar - end
//	processing disallow - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_disallow_".$id);
	$type=postvalue("type_disallow_".$id);
	if (FieldSubmitted("disallow_".$id))
	{
		$value=prepare_for_db("disallow",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "disallow"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["disallow"]=$value;
	}
	}
//	processibng disallow - end
//	processing allow - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
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
//	processing fullcontact - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_fullcontact_".$id);
	$type=postvalue("type_fullcontact_".$id);
	if (FieldSubmitted("fullcontact_".$id))
	{
		$value=prepare_for_db("fullcontact",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "fullcontact"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["fullcontact"]=$value;
	}
	}
//	processibng fullcontact - end
//	processing ipaddr - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_ipaddr_".$id);
	$type=postvalue("type_ipaddr_".$id);
	if (FieldSubmitted("ipaddr_".$id))
	{
		$value=prepare_for_db("ipaddr",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ipaddr"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ipaddr"]=$value;
	}
	}
//	processibng ipaddr - end
//	processing port - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_port_".$id);
	$type=postvalue("type_port_".$id);
	if (FieldSubmitted("port_".$id))
	{
		$value=prepare_for_db("port",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "port"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["port"]=$value;
	}
	}
//	processibng port - end
//	processing regserver - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_regserver_".$id);
	$type=postvalue("type_regserver_".$id);
	if (FieldSubmitted("regserver_".$id))
	{
		$value=prepare_for_db("regserver",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "regserver"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["regserver"]=$value;
	}
	}
//	processibng regserver - end
//	processing regseconds - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_regseconds_".$id);
	$type=postvalue("type_regseconds_".$id);
	if (FieldSubmitted("regseconds_".$id))
	{
		$value=prepare_for_db("regseconds",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "regseconds"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["regseconds"]=$value;
	}
	}
//	processibng regseconds - end
//	processing lastms - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_lastms_".$id);
	$type=postvalue("type_lastms_".$id);
	if (FieldSubmitted("lastms_".$id))
	{
		$value=prepare_for_db("lastms",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "lastms"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["lastms"]=$value;
	}
	}
//	processibng lastms - end
//	processing username - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_username_".$id);
	$type=postvalue("type_username_".$id);
	if (FieldSubmitted("username_".$id))
	{
		$value=prepare_for_db("username",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "username"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["username"]=$value;
	}
	}
//	processibng username - end
//	processing defaultuser - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_defaultuser_".$id);
	$type=postvalue("type_defaultuser_".$id);
	if (FieldSubmitted("defaultuser_".$id))
	{
		$value=prepare_for_db("defaultuser",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "defaultuser"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["defaultuser"]=$value;
	}
	}
//	processibng defaultuser - end
//	processing subscribecontext - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_subscribecontext_".$id);
	$type=postvalue("type_subscribecontext_".$id);
	if (FieldSubmitted("subscribecontext_".$id))
	{
		$value=prepare_for_db("subscribecontext",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "subscribecontext"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["subscribecontext"]=$value;
	}
	}
//	processibng subscribecontext - end
//	processing useragent - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_useragent_".$id);
	$type=postvalue("type_useragent_".$id);
	if (FieldSubmitted("useragent_".$id))
	{
		$value=prepare_for_db("useragent",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "useragent"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["useragent"]=$value;
	}
	}
//	processibng useragent - end
//	processing gateway - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_gateway_".$id);
	$type=postvalue("type_gateway_".$id);
	if (FieldSubmitted("gateway_".$id))
	{
		$value=prepare_for_db("gateway",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "gateway"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["gateway"]=$value;
	}
	}
//	processibng gateway - end
//	processing id_horario - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_horario_".$id);
	$type=postvalue("type_id_horario_".$id);
	if (FieldSubmitted("id_horario_".$id))
	{
		$value=prepare_for_db("id_horario",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_horario"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_horario"]=$value;
	}
	}
//	processibng id_horario - end
//	processing mail - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
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
//	processing grava_chamada - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_grava_chamada_".$id);
	$type=postvalue("type_grava_chamada_".$id);
	if (FieldSubmitted("grava_chamada_".$id))
	{
		$value=prepare_for_db("grava_chamada",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "grava_chamada"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["grava_chamada"]=$value;
	}
	}
//	processibng grava_chamada - end
//	processing tp_ramal - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_tp_ramal_".$id);
	$type=postvalue("type_tp_ramal_".$id);
	if (FieldSubmitted("tp_ramal_".$id))
	{
		$value=prepare_for_db("tp_ramal",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "tp_ramal"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["tp_ramal"]=$value;
	}
	}
//	processibng tp_ramal - end
//	processing Transbordo - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_Transbordo_".$id);
	$type=postvalue("type_Transbordo_".$id);
	if (FieldSubmitted("Transbordo_".$id))
	{
		$value=prepare_for_db("Transbordo",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "Transbordo"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["Transbordo"]=$value;
	}
	}
//	processibng Transbordo - end
//	processing id_interf - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_interf_".$id);
	$type=postvalue("type_id_interf_".$id);
	if (FieldSubmitted("id_interf_".$id))
	{
		$value=prepare_for_db("id_interf",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_interf"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_interf"]=$value;
	}
	}
//	processibng id_interf - end
//	processing ident_interf - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_ident_interf_".$id);
	$type=postvalue("type_ident_interf_".$id);
	if (FieldSubmitted("ident_interf_".$id))
	{
		$value=prepare_for_db("ident_interf",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ident_interf"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ident_interf"]=$value;
	}
	}
//	processibng ident_interf - end
//	processing tp_chamada - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_tp_chamada_".$id);
	$type=postvalue("type_tp_chamada_".$id);
	if (FieldSubmitted("tp_chamada_".$id))
	{
		$value=prepare_for_db("tp_chamada",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "tp_chamada"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["tp_chamada"]=$value;
	}
	}
//	processibng tp_chamada - end
//	processing flg_cadeado - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_cadeado_".$id);
	$type=postvalue("type_flg_cadeado_".$id);
	if (FieldSubmitted("flg_cadeado_".$id))
	{
		$value=prepare_for_db("flg_cadeado",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_cadeado"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_cadeado"]=$value;
	}
	}
//	processibng flg_cadeado - end
//	processing desvio - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_desvio_".$id);
	$type=postvalue("type_desvio_".$id);
	if (FieldSubmitted("desvio_".$id))
	{
		$value=prepare_for_db("desvio",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "desvio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["desvio"]=$value;
	}
	}
//	processibng desvio - end
//	processing id_pesquisa - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_pesquisa_".$id);
	$type=postvalue("type_id_pesquisa_".$id);
	if (FieldSubmitted("id_pesquisa_".$id))
	{
		$value=prepare_for_db("id_pesquisa",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_pesquisa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_pesquisa"]=$value;
	}
	}
//	processibng id_pesquisa - end
//	processing desvio_ddr - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_desvio_ddr_".$id);
	$type=postvalue("type_desvio_ddr_".$id);
	if (FieldSubmitted("desvio_ddr_".$id))
	{
		$value=prepare_for_db("desvio_ddr",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "desvio_ddr"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["desvio_ddr"]=$value;
	}
	}
//	processibng desvio_ddr - end
//	processing id_saida - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_saida_".$id);
	$type=postvalue("type_id_saida_".$id);
	if (FieldSubmitted("id_saida_".$id))
	{
		$value=prepare_for_db("id_saida",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_saida"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_saida"]=$value;
	}
	}
//	processibng id_saida - end



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
					$message .='&nbsp;<a href=\'admin_users_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'admin_users_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: admin_users_".$pageObject->getPageType().".php");
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
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='admin_users_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="admin_users_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="admin_users_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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

	$showKeys[] = htmlspecialchars($keys["id"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));

	

	
	
////////////////////////////////////////////
//	id - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"id", ""),"field=id".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id";
				$showRawValues[] = substr($data["id"],0,100);
	}	
//	name - 
	$display = false;
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
//	host - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"host", ""),"field=host".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "host";
				$showRawValues[] = substr($data["host"],0,100);
	}	
//	nat - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"nat", ""),"field=nat".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "nat";
				$showRawValues[] = substr($data["nat"],0,100);
	}	
//	type - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"type", ""),"field=type".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "type";
				$showRawValues[] = substr($data["type"],0,100);
	}	
//	accountcode - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"accountcode", ""),"field=accountcode".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "accountcode";
				$showRawValues[] = substr($data["accountcode"],0,100);
	}	
//	amaflags - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"amaflags", ""),"field=amaflags".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "amaflags";
				$showRawValues[] = substr($data["amaflags"],0,100);
	}	
//	call-limit - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"call-limit", ""),"field=call%2Dlimit".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "call_limit";
				$showRawValues[] = substr($data["call-limit"],0,100);
	}	
//	callgroup - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"callgroup", ""),"field=callgroup".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "callgroup";
				$showRawValues[] = substr($data["callgroup"],0,100);
	}	
//	callerid - 
	$display = false;
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
//	cancallforward - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"cancallforward", ""),"field=cancallforward".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "cancallforward";
				$showRawValues[] = substr($data["cancallforward"],0,100);
	}	
//	canreinvite - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"canreinvite", ""),"field=canreinvite".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "canreinvite";
				$showRawValues[] = substr($data["canreinvite"],0,100);
	}	
//	context - 
	$display = false;
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
//	defaultip - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"defaultip", ""),"field=defaultip".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "defaultip";
				$showRawValues[] = substr($data["defaultip"],0,100);
	}	
//	dtmfmode - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dtmfmode", ""),"field=dtmfmode".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dtmfmode";
				$showRawValues[] = substr($data["dtmfmode"],0,100);
	}	
//	fromuser - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"fromuser", ""),"field=fromuser".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "fromuser";
				$showRawValues[] = substr($data["fromuser"],0,100);
	}	
//	fromdomain - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"fromdomain", ""),"field=fromdomain".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "fromdomain";
				$showRawValues[] = substr($data["fromdomain"],0,100);
	}	
//	insecure - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"insecure", ""),"field=insecure".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "insecure";
				$showRawValues[] = substr($data["insecure"],0,100);
	}	
//	language - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"language", ""),"field=language".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "language";
				$showRawValues[] = substr($data["language"],0,100);
	}	
//	mailbox - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"mailbox", ""),"field=mailbox".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "mailbox";
				$showRawValues[] = substr($data["mailbox"],0,100);
	}	
//	md5secret - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"md5secret", ""),"field=md5secret".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "md5secret";
				$showRawValues[] = substr($data["md5secret"],0,100);
	}	
//	deny - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"deny", ""),"field=deny".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "deny";
				$showRawValues[] = substr($data["deny"],0,100);
	}	
//	permit - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"permit", ""),"field=permit".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "permit";
				$showRawValues[] = substr($data["permit"],0,100);
	}	
//	mask - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"mask", ""),"field=mask".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "mask";
				$showRawValues[] = substr($data["mask"],0,100);
	}	
//	musiconhold - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"musiconhold", ""),"field=musiconhold".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "musiconhold";
				$showRawValues[] = substr($data["musiconhold"],0,100);
	}	
//	pickupgroup - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"pickupgroup", ""),"field=pickupgroup".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "pickupgroup";
				$showRawValues[] = substr($data["pickupgroup"],0,100);
	}	
//	qualify - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"qualify", ""),"field=qualify".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "qualify";
				$showRawValues[] = substr($data["qualify"],0,100);
	}	
//	rtcachefriends - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"rtcachefriends", ""),"field=rtcachefriends".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "rtcachefriends";
				$showRawValues[] = substr($data["rtcachefriends"],0,100);
	}	
//	regexten - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"regexten", ""),"field=regexten".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "regexten";
				$showRawValues[] = substr($data["regexten"],0,100);
	}	
//	restrictcid - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"restrictcid", ""),"field=restrictcid".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "restrictcid";
				$showRawValues[] = substr($data["restrictcid"],0,100);
	}	
//	rtptimeout - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"rtptimeout", ""),"field=rtptimeout".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "rtptimeout";
				$showRawValues[] = substr($data["rtptimeout"],0,100);
	}	
//	rtpholdtimeout - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"rtpholdtimeout", ""),"field=rtpholdtimeout".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "rtpholdtimeout";
				$showRawValues[] = substr($data["rtpholdtimeout"],0,100);
	}	
//	secret - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"secret", ""),"field=secret".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "secret";
				$showRawValues[] = substr($data["secret"],0,100);
	}	
//	setvar - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"setvar", ""),"field=setvar".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "setvar";
				$showRawValues[] = substr($data["setvar"],0,100);
	}	
//	disallow - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"disallow", ""),"field=disallow".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "disallow";
				$showRawValues[] = substr($data["disallow"],0,100);
	}	
//	allow - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"allow", ""),"field=allow".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "allow";
				$showRawValues[] = substr($data["allow"],0,100);
	}	
//	fullcontact - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"fullcontact", ""),"field=fullcontact".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "fullcontact";
				$showRawValues[] = substr($data["fullcontact"],0,100);
	}	
//	ipaddr - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ipaddr", ""),"field=ipaddr".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ipaddr";
				$showRawValues[] = substr($data["ipaddr"],0,100);
	}	
//	port - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"port", ""),"field=port".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "port";
				$showRawValues[] = substr($data["port"],0,100);
	}	
//	regserver - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"regserver", ""),"field=regserver".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "regserver";
				$showRawValues[] = substr($data["regserver"],0,100);
	}	
//	regseconds - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"regseconds", ""),"field=regseconds".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "regseconds";
				$showRawValues[] = substr($data["regseconds"],0,100);
	}	
//	lastms - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"lastms", ""),"field=lastms".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "lastms";
				$showRawValues[] = substr($data["lastms"],0,100);
	}	
//	username - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"username", ""),"field=username".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "username";
				$showRawValues[] = substr($data["username"],0,100);
	}	
//	defaultuser - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"defaultuser", ""),"field=defaultuser".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "defaultuser";
				$showRawValues[] = substr($data["defaultuser"],0,100);
	}	
//	subscribecontext - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"subscribecontext", ""),"field=subscribecontext".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "subscribecontext";
				$showRawValues[] = substr($data["subscribecontext"],0,100);
	}	
//	useragent - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"useragent", ""),"field=useragent".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "useragent";
				$showRawValues[] = substr($data["useragent"],0,100);
	}	
//	gateway - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"gateway", ""),"field=gateway".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "gateway";
				$showRawValues[] = substr($data["gateway"],0,100);
	}	
//	id_horario - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"id_horario", ""),"field=id%5Fhorario".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_horario";
				$showRawValues[] = substr($data["id_horario"],0,100);
	}	
//	mail - 
	$display = false;
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
//	grava_chamada - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"grava_chamada", ""),"field=grava%5Fchamada".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "grava_chamada";
				$showRawValues[] = substr($data["grava_chamada"],0,100);
	}	
//	tp_ramal - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"tp_ramal", ""),"field=tp%5Framal".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_ramal";
				$showRawValues[] = substr($data["tp_ramal"],0,100);
	}	
//	Transbordo - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"Transbordo", ""),"field=Transbordo".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "Transbordo";
				$showRawValues[] = substr($data["Transbordo"],0,100);
	}	
//	id_interf - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"id_interf", ""),"field=id%5Finterf".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_interf";
				$showRawValues[] = substr($data["id_interf"],0,100);
	}	
//	ident_interf - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ident_interf", ""),"field=ident%5Finterf".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ident_interf";
				$showRawValues[] = substr($data["ident_interf"],0,100);
	}	
//	tp_chamada - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"tp_chamada", ""),"field=tp%5Fchamada".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_chamada";
				$showRawValues[] = substr($data["tp_chamada"],0,100);
	}	
//	flg_cadeado - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"flg_cadeado", ""),"field=flg%5Fcadeado".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "flg_cadeado";
				$showRawValues[] = substr($data["flg_cadeado"],0,100);
	}	
//	desvio - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"desvio", ""),"field=desvio".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "desvio";
				$showRawValues[] = substr($data["desvio"],0,100);
	}	
//	id_pesquisa - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"id_pesquisa", ""),"field=id%5Fpesquisa".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_pesquisa";
				$showRawValues[] = substr($data["id_pesquisa"],0,100);
	}	
//	desvio_ddr - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"desvio_ddr", ""),"field=desvio%5Fddr".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "desvio_ddr";
				$showRawValues[] = substr($data["desvio_ddr"],0,100);
	}	
//	id_saida - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"id_saida", ""),"field=id%5Fsaida".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_saida";
				$showRawValues[] = substr($data["id_saida"],0,100);
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
//	control - id
$control_id=array();
$control_id["func"]="xt_buildeditcontrol";
$control_id["params"] = array();
$control_id["params"]["field"]="id";
$control_id["params"]["value"]=@$defvalues["id"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_id["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id["params"]["mode"]="inline_add";
else
	$control_id["params"]["mode"]="add";

if(!$detailKeys || !in_array("id", $detailKeys))
	$xt->assignbyref("id_editcontrol",$control_id);
else if(array_key_exists("id", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"id", ""),"field=id","",MODE_VIEW);
		$xt->assign("id_editcontrol",$value);
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
//	control - host
$control_host=array();
$control_host["func"]="xt_buildeditcontrol";
$control_host["params"] = array();
$control_host["params"]["field"]="host";
$control_host["params"]["value"]=@$defvalues["host"];

//	Begin Add validation
$arrValidate = array();	
$control_host["params"]["validate"]=$arrValidate;
//	End Add validation

$control_host["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_host["params"]["mode"]="inline_add";
else
	$control_host["params"]["mode"]="add";

if(!$detailKeys || !in_array("host", $detailKeys))
	$xt->assignbyref("host_editcontrol",$control_host);
else if(array_key_exists("host", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"host", ""),"field=host","",MODE_VIEW);
		$xt->assign("host_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - nat
$control_nat=array();
$control_nat["func"]="xt_buildeditcontrol";
$control_nat["params"] = array();
$control_nat["params"]["field"]="nat";
$control_nat["params"]["value"]=@$defvalues["nat"];

//	Begin Add validation
$arrValidate = array();	
$control_nat["params"]["validate"]=$arrValidate;
//	End Add validation

$control_nat["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_nat["params"]["mode"]="inline_add";
else
	$control_nat["params"]["mode"]="add";

if(!$detailKeys || !in_array("nat", $detailKeys))
	$xt->assignbyref("nat_editcontrol",$control_nat);
else if(array_key_exists("nat", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"nat", ""),"field=nat","",MODE_VIEW);
		$xt->assign("nat_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - type
$control_type=array();
$control_type["func"]="xt_buildeditcontrol";
$control_type["params"] = array();
$control_type["params"]["field"]="type";
$control_type["params"]["value"]=@$defvalues["type"];

//	Begin Add validation
$arrValidate = array();	
$control_type["params"]["validate"]=$arrValidate;
//	End Add validation

$control_type["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_type["params"]["mode"]="inline_add";
else
	$control_type["params"]["mode"]="add";

if(!$detailKeys || !in_array("type", $detailKeys))
	$xt->assignbyref("type_editcontrol",$control_type);
else if(array_key_exists("type", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"type", ""),"field=type","",MODE_VIEW);
		$xt->assign("type_editcontrol",$value);
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
				$value = ProcessLargeText(GetData($defvalues,"accountcode", ""),"field=accountcode","",MODE_VIEW);
		$xt->assign("accountcode_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - amaflags
$control_amaflags=array();
$control_amaflags["func"]="xt_buildeditcontrol";
$control_amaflags["params"] = array();
$control_amaflags["params"]["field"]="amaflags";
$control_amaflags["params"]["value"]=@$defvalues["amaflags"];

//	Begin Add validation
$arrValidate = array();	
$control_amaflags["params"]["validate"]=$arrValidate;
//	End Add validation

$control_amaflags["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_amaflags["params"]["mode"]="inline_add";
else
	$control_amaflags["params"]["mode"]="add";

if(!$detailKeys || !in_array("amaflags", $detailKeys))
	$xt->assignbyref("amaflags_editcontrol",$control_amaflags);
else if(array_key_exists("amaflags", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"amaflags", ""),"field=amaflags","",MODE_VIEW);
		$xt->assign("amaflags_editcontrol",$value);
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
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
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
//	control - callgroup
$control_callgroup=array();
$control_callgroup["func"]="xt_buildeditcontrol";
$control_callgroup["params"] = array();
$control_callgroup["params"]["field"]="callgroup";
$control_callgroup["params"]["value"]=@$defvalues["callgroup"];

//	Begin Add validation
$arrValidate = array();	
$control_callgroup["params"]["validate"]=$arrValidate;
//	End Add validation

$control_callgroup["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_callgroup["params"]["mode"]="inline_add";
else
	$control_callgroup["params"]["mode"]="add";

if(!$detailKeys || !in_array("callgroup", $detailKeys))
	$xt->assignbyref("callgroup_editcontrol",$control_callgroup);
else if(array_key_exists("callgroup", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"callgroup", ""),"field=callgroup","",MODE_VIEW);
		$xt->assign("callgroup_editcontrol",$value);
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
//	control - cancallforward
$control_cancallforward=array();
$control_cancallforward["func"]="xt_buildeditcontrol";
$control_cancallforward["params"] = array();
$control_cancallforward["params"]["field"]="cancallforward";
$control_cancallforward["params"]["value"]=@$defvalues["cancallforward"];

//	Begin Add validation
$arrValidate = array();	
$control_cancallforward["params"]["validate"]=$arrValidate;
//	End Add validation

$control_cancallforward["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_cancallforward["params"]["mode"]="inline_add";
else
	$control_cancallforward["params"]["mode"]="add";

if(!$detailKeys || !in_array("cancallforward", $detailKeys))
	$xt->assignbyref("cancallforward_editcontrol",$control_cancallforward);
else if(array_key_exists("cancallforward", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"cancallforward", ""),"field=cancallforward","",MODE_VIEW);
		$xt->assign("cancallforward_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - canreinvite
$control_canreinvite=array();
$control_canreinvite["func"]="xt_buildeditcontrol";
$control_canreinvite["params"] = array();
$control_canreinvite["params"]["field"]="canreinvite";
$control_canreinvite["params"]["value"]=@$defvalues["canreinvite"];

//	Begin Add validation
$arrValidate = array();	
$control_canreinvite["params"]["validate"]=$arrValidate;
//	End Add validation

$control_canreinvite["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_canreinvite["params"]["mode"]="inline_add";
else
	$control_canreinvite["params"]["mode"]="add";

if(!$detailKeys || !in_array("canreinvite", $detailKeys))
	$xt->assignbyref("canreinvite_editcontrol",$control_canreinvite);
else if(array_key_exists("canreinvite", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"canreinvite", ""),"field=canreinvite","",MODE_VIEW);
		$xt->assign("canreinvite_editcontrol",$value);
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
//	control - defaultip
$control_defaultip=array();
$control_defaultip["func"]="xt_buildeditcontrol";
$control_defaultip["params"] = array();
$control_defaultip["params"]["field"]="defaultip";
$control_defaultip["params"]["value"]=@$defvalues["defaultip"];

//	Begin Add validation
$arrValidate = array();	
$control_defaultip["params"]["validate"]=$arrValidate;
//	End Add validation

$control_defaultip["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_defaultip["params"]["mode"]="inline_add";
else
	$control_defaultip["params"]["mode"]="add";

if(!$detailKeys || !in_array("defaultip", $detailKeys))
	$xt->assignbyref("defaultip_editcontrol",$control_defaultip);
else if(array_key_exists("defaultip", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"defaultip", ""),"field=defaultip","",MODE_VIEW);
		$xt->assign("defaultip_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - dtmfmode
$control_dtmfmode=array();
$control_dtmfmode["func"]="xt_buildeditcontrol";
$control_dtmfmode["params"] = array();
$control_dtmfmode["params"]["field"]="dtmfmode";
$control_dtmfmode["params"]["value"]=@$defvalues["dtmfmode"];

//	Begin Add validation
$arrValidate = array();	
$control_dtmfmode["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dtmfmode["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dtmfmode["params"]["mode"]="inline_add";
else
	$control_dtmfmode["params"]["mode"]="add";

if(!$detailKeys || !in_array("dtmfmode", $detailKeys))
	$xt->assignbyref("dtmfmode_editcontrol",$control_dtmfmode);
else if(array_key_exists("dtmfmode", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dtmfmode", ""),"field=dtmfmode","",MODE_VIEW);
		$xt->assign("dtmfmode_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - fromuser
$control_fromuser=array();
$control_fromuser["func"]="xt_buildeditcontrol";
$control_fromuser["params"] = array();
$control_fromuser["params"]["field"]="fromuser";
$control_fromuser["params"]["value"]=@$defvalues["fromuser"];

//	Begin Add validation
$arrValidate = array();	
$control_fromuser["params"]["validate"]=$arrValidate;
//	End Add validation

$control_fromuser["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_fromuser["params"]["mode"]="inline_add";
else
	$control_fromuser["params"]["mode"]="add";

if(!$detailKeys || !in_array("fromuser", $detailKeys))
	$xt->assignbyref("fromuser_editcontrol",$control_fromuser);
else if(array_key_exists("fromuser", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"fromuser", ""),"field=fromuser","",MODE_VIEW);
		$xt->assign("fromuser_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - fromdomain
$control_fromdomain=array();
$control_fromdomain["func"]="xt_buildeditcontrol";
$control_fromdomain["params"] = array();
$control_fromdomain["params"]["field"]="fromdomain";
$control_fromdomain["params"]["value"]=@$defvalues["fromdomain"];

//	Begin Add validation
$arrValidate = array();	
$control_fromdomain["params"]["validate"]=$arrValidate;
//	End Add validation

$control_fromdomain["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_fromdomain["params"]["mode"]="inline_add";
else
	$control_fromdomain["params"]["mode"]="add";

if(!$detailKeys || !in_array("fromdomain", $detailKeys))
	$xt->assignbyref("fromdomain_editcontrol",$control_fromdomain);
else if(array_key_exists("fromdomain", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"fromdomain", ""),"field=fromdomain","",MODE_VIEW);
		$xt->assign("fromdomain_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - insecure
$control_insecure=array();
$control_insecure["func"]="xt_buildeditcontrol";
$control_insecure["params"] = array();
$control_insecure["params"]["field"]="insecure";
$control_insecure["params"]["value"]=@$defvalues["insecure"];

//	Begin Add validation
$arrValidate = array();	
$control_insecure["params"]["validate"]=$arrValidate;
//	End Add validation

$control_insecure["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_insecure["params"]["mode"]="inline_add";
else
	$control_insecure["params"]["mode"]="add";

if(!$detailKeys || !in_array("insecure", $detailKeys))
	$xt->assignbyref("insecure_editcontrol",$control_insecure);
else if(array_key_exists("insecure", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"insecure", ""),"field=insecure","",MODE_VIEW);
		$xt->assign("insecure_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - language
$control_language=array();
$control_language["func"]="xt_buildeditcontrol";
$control_language["params"] = array();
$control_language["params"]["field"]="language";
$control_language["params"]["value"]=@$defvalues["language"];

//	Begin Add validation
$arrValidate = array();	
$control_language["params"]["validate"]=$arrValidate;
//	End Add validation

$control_language["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_language["params"]["mode"]="inline_add";
else
	$control_language["params"]["mode"]="add";

if(!$detailKeys || !in_array("language", $detailKeys))
	$xt->assignbyref("language_editcontrol",$control_language);
else if(array_key_exists("language", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"language", ""),"field=language","",MODE_VIEW);
		$xt->assign("language_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - mailbox
$control_mailbox=array();
$control_mailbox["func"]="xt_buildeditcontrol";
$control_mailbox["params"] = array();
$control_mailbox["params"]["field"]="mailbox";
$control_mailbox["params"]["value"]=@$defvalues["mailbox"];

//	Begin Add validation
$arrValidate = array();	
$control_mailbox["params"]["validate"]=$arrValidate;
//	End Add validation

$control_mailbox["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_mailbox["params"]["mode"]="inline_add";
else
	$control_mailbox["params"]["mode"]="add";

if(!$detailKeys || !in_array("mailbox", $detailKeys))
	$xt->assignbyref("mailbox_editcontrol",$control_mailbox);
else if(array_key_exists("mailbox", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"mailbox", ""),"field=mailbox","",MODE_VIEW);
		$xt->assign("mailbox_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - md5secret
$control_md5secret=array();
$control_md5secret["func"]="xt_buildeditcontrol";
$control_md5secret["params"] = array();
$control_md5secret["params"]["field"]="md5secret";
$control_md5secret["params"]["value"]=@$defvalues["md5secret"];

//	Begin Add validation
$arrValidate = array();	
$control_md5secret["params"]["validate"]=$arrValidate;
//	End Add validation

$control_md5secret["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_md5secret["params"]["mode"]="inline_add";
else
	$control_md5secret["params"]["mode"]="add";

if(!$detailKeys || !in_array("md5secret", $detailKeys))
	$xt->assignbyref("md5secret_editcontrol",$control_md5secret);
else if(array_key_exists("md5secret", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"md5secret", ""),"field=md5secret","",MODE_VIEW);
		$xt->assign("md5secret_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - deny
$control_deny=array();
$control_deny["func"]="xt_buildeditcontrol";
$control_deny["params"] = array();
$control_deny["params"]["field"]="deny";
$control_deny["params"]["value"]=@$defvalues["deny"];

//	Begin Add validation
$arrValidate = array();	
$control_deny["params"]["validate"]=$arrValidate;
//	End Add validation

$control_deny["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_deny["params"]["mode"]="inline_add";
else
	$control_deny["params"]["mode"]="add";

if(!$detailKeys || !in_array("deny", $detailKeys))
	$xt->assignbyref("deny_editcontrol",$control_deny);
else if(array_key_exists("deny", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"deny", ""),"field=deny","",MODE_VIEW);
		$xt->assign("deny_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - permit
$control_permit=array();
$control_permit["func"]="xt_buildeditcontrol";
$control_permit["params"] = array();
$control_permit["params"]["field"]="permit";
$control_permit["params"]["value"]=@$defvalues["permit"];

//	Begin Add validation
$arrValidate = array();	
$control_permit["params"]["validate"]=$arrValidate;
//	End Add validation

$control_permit["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_permit["params"]["mode"]="inline_add";
else
	$control_permit["params"]["mode"]="add";

if(!$detailKeys || !in_array("permit", $detailKeys))
	$xt->assignbyref("permit_editcontrol",$control_permit);
else if(array_key_exists("permit", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"permit", ""),"field=permit","",MODE_VIEW);
		$xt->assign("permit_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - mask
$control_mask=array();
$control_mask["func"]="xt_buildeditcontrol";
$control_mask["params"] = array();
$control_mask["params"]["field"]="mask";
$control_mask["params"]["value"]=@$defvalues["mask"];

//	Begin Add validation
$arrValidate = array();	
$control_mask["params"]["validate"]=$arrValidate;
//	End Add validation

$control_mask["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_mask["params"]["mode"]="inline_add";
else
	$control_mask["params"]["mode"]="add";

if(!$detailKeys || !in_array("mask", $detailKeys))
	$xt->assignbyref("mask_editcontrol",$control_mask);
else if(array_key_exists("mask", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"mask", ""),"field=mask","",MODE_VIEW);
		$xt->assign("mask_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - musiconhold
$control_musiconhold=array();
$control_musiconhold["func"]="xt_buildeditcontrol";
$control_musiconhold["params"] = array();
$control_musiconhold["params"]["field"]="musiconhold";
$control_musiconhold["params"]["value"]=@$defvalues["musiconhold"];

//	Begin Add validation
$arrValidate = array();	
$control_musiconhold["params"]["validate"]=$arrValidate;
//	End Add validation

$control_musiconhold["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_musiconhold["params"]["mode"]="inline_add";
else
	$control_musiconhold["params"]["mode"]="add";

if(!$detailKeys || !in_array("musiconhold", $detailKeys))
	$xt->assignbyref("musiconhold_editcontrol",$control_musiconhold);
else if(array_key_exists("musiconhold", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"musiconhold", ""),"field=musiconhold","",MODE_VIEW);
		$xt->assign("musiconhold_editcontrol",$value);
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
//	control - qualify
$control_qualify=array();
$control_qualify["func"]="xt_buildeditcontrol";
$control_qualify["params"] = array();
$control_qualify["params"]["field"]="qualify";
$control_qualify["params"]["value"]=@$defvalues["qualify"];

//	Begin Add validation
$arrValidate = array();	
$control_qualify["params"]["validate"]=$arrValidate;
//	End Add validation

$control_qualify["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_qualify["params"]["mode"]="inline_add";
else
	$control_qualify["params"]["mode"]="add";

if(!$detailKeys || !in_array("qualify", $detailKeys))
	$xt->assignbyref("qualify_editcontrol",$control_qualify);
else if(array_key_exists("qualify", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"qualify", ""),"field=qualify","",MODE_VIEW);
		$xt->assign("qualify_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - rtcachefriends
$control_rtcachefriends=array();
$control_rtcachefriends["func"]="xt_buildeditcontrol";
$control_rtcachefriends["params"] = array();
$control_rtcachefriends["params"]["field"]="rtcachefriends";
$control_rtcachefriends["params"]["value"]=@$defvalues["rtcachefriends"];

//	Begin Add validation
$arrValidate = array();	
$control_rtcachefriends["params"]["validate"]=$arrValidate;
//	End Add validation

$control_rtcachefriends["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_rtcachefriends["params"]["mode"]="inline_add";
else
	$control_rtcachefriends["params"]["mode"]="add";

if(!$detailKeys || !in_array("rtcachefriends", $detailKeys))
	$xt->assignbyref("rtcachefriends_editcontrol",$control_rtcachefriends);
else if(array_key_exists("rtcachefriends", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"rtcachefriends", ""),"field=rtcachefriends","",MODE_VIEW);
		$xt->assign("rtcachefriends_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - regexten
$control_regexten=array();
$control_regexten["func"]="xt_buildeditcontrol";
$control_regexten["params"] = array();
$control_regexten["params"]["field"]="regexten";
$control_regexten["params"]["value"]=@$defvalues["regexten"];

//	Begin Add validation
$arrValidate = array();	
$control_regexten["params"]["validate"]=$arrValidate;
//	End Add validation

$control_regexten["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_regexten["params"]["mode"]="inline_add";
else
	$control_regexten["params"]["mode"]="add";

if(!$detailKeys || !in_array("regexten", $detailKeys))
	$xt->assignbyref("regexten_editcontrol",$control_regexten);
else if(array_key_exists("regexten", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"regexten", ""),"field=regexten","",MODE_VIEW);
		$xt->assign("regexten_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - restrictcid
$control_restrictcid=array();
$control_restrictcid["func"]="xt_buildeditcontrol";
$control_restrictcid["params"] = array();
$control_restrictcid["params"]["field"]="restrictcid";
$control_restrictcid["params"]["value"]=@$defvalues["restrictcid"];

//	Begin Add validation
$arrValidate = array();	
$control_restrictcid["params"]["validate"]=$arrValidate;
//	End Add validation

$control_restrictcid["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_restrictcid["params"]["mode"]="inline_add";
else
	$control_restrictcid["params"]["mode"]="add";

if(!$detailKeys || !in_array("restrictcid", $detailKeys))
	$xt->assignbyref("restrictcid_editcontrol",$control_restrictcid);
else if(array_key_exists("restrictcid", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"restrictcid", ""),"field=restrictcid","",MODE_VIEW);
		$xt->assign("restrictcid_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - rtptimeout
$control_rtptimeout=array();
$control_rtptimeout["func"]="xt_buildeditcontrol";
$control_rtptimeout["params"] = array();
$control_rtptimeout["params"]["field"]="rtptimeout";
$control_rtptimeout["params"]["value"]=@$defvalues["rtptimeout"];

//	Begin Add validation
$arrValidate = array();	
$control_rtptimeout["params"]["validate"]=$arrValidate;
//	End Add validation

$control_rtptimeout["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_rtptimeout["params"]["mode"]="inline_add";
else
	$control_rtptimeout["params"]["mode"]="add";

if(!$detailKeys || !in_array("rtptimeout", $detailKeys))
	$xt->assignbyref("rtptimeout_editcontrol",$control_rtptimeout);
else if(array_key_exists("rtptimeout", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"rtptimeout", ""),"field=rtptimeout","",MODE_VIEW);
		$xt->assign("rtptimeout_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - rtpholdtimeout
$control_rtpholdtimeout=array();
$control_rtpholdtimeout["func"]="xt_buildeditcontrol";
$control_rtpholdtimeout["params"] = array();
$control_rtpholdtimeout["params"]["field"]="rtpholdtimeout";
$control_rtpholdtimeout["params"]["value"]=@$defvalues["rtpholdtimeout"];

//	Begin Add validation
$arrValidate = array();	
$control_rtpholdtimeout["params"]["validate"]=$arrValidate;
//	End Add validation

$control_rtpholdtimeout["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_rtpholdtimeout["params"]["mode"]="inline_add";
else
	$control_rtpholdtimeout["params"]["mode"]="add";

if(!$detailKeys || !in_array("rtpholdtimeout", $detailKeys))
	$xt->assignbyref("rtpholdtimeout_editcontrol",$control_rtpholdtimeout);
else if(array_key_exists("rtpholdtimeout", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"rtpholdtimeout", ""),"field=rtpholdtimeout","",MODE_VIEW);
		$xt->assign("rtpholdtimeout_editcontrol",$value);
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
//	control - setvar
$control_setvar=array();
$control_setvar["func"]="xt_buildeditcontrol";
$control_setvar["params"] = array();
$control_setvar["params"]["field"]="setvar";
$control_setvar["params"]["value"]=@$defvalues["setvar"];

//	Begin Add validation
$arrValidate = array();	
$control_setvar["params"]["validate"]=$arrValidate;
//	End Add validation

$control_setvar["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_setvar["params"]["mode"]="inline_add";
else
	$control_setvar["params"]["mode"]="add";

if(!$detailKeys || !in_array("setvar", $detailKeys))
	$xt->assignbyref("setvar_editcontrol",$control_setvar);
else if(array_key_exists("setvar", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"setvar", ""),"field=setvar","",MODE_VIEW);
		$xt->assign("setvar_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - disallow
$control_disallow=array();
$control_disallow["func"]="xt_buildeditcontrol";
$control_disallow["params"] = array();
$control_disallow["params"]["field"]="disallow";
$control_disallow["params"]["value"]=@$defvalues["disallow"];

//	Begin Add validation
$arrValidate = array();	
$control_disallow["params"]["validate"]=$arrValidate;
//	End Add validation

$control_disallow["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_disallow["params"]["mode"]="inline_add";
else
	$control_disallow["params"]["mode"]="add";

if(!$detailKeys || !in_array("disallow", $detailKeys))
	$xt->assignbyref("disallow_editcontrol",$control_disallow);
else if(array_key_exists("disallow", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"disallow", ""),"field=disallow","",MODE_VIEW);
		$xt->assign("disallow_editcontrol",$value);
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
				$value = ProcessLargeText(GetData($defvalues,"allow", ""),"field=allow","",MODE_VIEW);
		$xt->assign("allow_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - fullcontact
$control_fullcontact=array();
$control_fullcontact["func"]="xt_buildeditcontrol";
$control_fullcontact["params"] = array();
$control_fullcontact["params"]["field"]="fullcontact";
$control_fullcontact["params"]["value"]=@$defvalues["fullcontact"];

//	Begin Add validation
$arrValidate = array();	
$control_fullcontact["params"]["validate"]=$arrValidate;
//	End Add validation

$control_fullcontact["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_fullcontact["params"]["mode"]="inline_add";
else
	$control_fullcontact["params"]["mode"]="add";

if(!$detailKeys || !in_array("fullcontact", $detailKeys))
	$xt->assignbyref("fullcontact_editcontrol",$control_fullcontact);
else if(array_key_exists("fullcontact", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"fullcontact", ""),"field=fullcontact","",MODE_VIEW);
		$xt->assign("fullcontact_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ipaddr
$control_ipaddr=array();
$control_ipaddr["func"]="xt_buildeditcontrol";
$control_ipaddr["params"] = array();
$control_ipaddr["params"]["field"]="ipaddr";
$control_ipaddr["params"]["value"]=@$defvalues["ipaddr"];

//	Begin Add validation
$arrValidate = array();	
$control_ipaddr["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ipaddr["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ipaddr["params"]["mode"]="inline_add";
else
	$control_ipaddr["params"]["mode"]="add";

if(!$detailKeys || !in_array("ipaddr", $detailKeys))
	$xt->assignbyref("ipaddr_editcontrol",$control_ipaddr);
else if(array_key_exists("ipaddr", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ipaddr", ""),"field=ipaddr","",MODE_VIEW);
		$xt->assign("ipaddr_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - port
$control_port=array();
$control_port["func"]="xt_buildeditcontrol";
$control_port["params"] = array();
$control_port["params"]["field"]="port";
$control_port["params"]["value"]=@$defvalues["port"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_port["params"]["validate"]=$arrValidate;
//	End Add validation

$control_port["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_port["params"]["mode"]="inline_add";
else
	$control_port["params"]["mode"]="add";

if(!$detailKeys || !in_array("port", $detailKeys))
	$xt->assignbyref("port_editcontrol",$control_port);
else if(array_key_exists("port", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"port", ""),"field=port","",MODE_VIEW);
		$xt->assign("port_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - regserver
$control_regserver=array();
$control_regserver["func"]="xt_buildeditcontrol";
$control_regserver["params"] = array();
$control_regserver["params"]["field"]="regserver";
$control_regserver["params"]["value"]=@$defvalues["regserver"];

//	Begin Add validation
$arrValidate = array();	
$control_regserver["params"]["validate"]=$arrValidate;
//	End Add validation

$control_regserver["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_regserver["params"]["mode"]="inline_add";
else
	$control_regserver["params"]["mode"]="add";

if(!$detailKeys || !in_array("regserver", $detailKeys))
	$xt->assignbyref("regserver_editcontrol",$control_regserver);
else if(array_key_exists("regserver", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"regserver", ""),"field=regserver","",MODE_VIEW);
		$xt->assign("regserver_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - regseconds
$control_regseconds=array();
$control_regseconds["func"]="xt_buildeditcontrol";
$control_regseconds["params"] = array();
$control_regseconds["params"]["field"]="regseconds";
$control_regseconds["params"]["value"]=@$defvalues["regseconds"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_regseconds["params"]["validate"]=$arrValidate;
//	End Add validation

$control_regseconds["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_regseconds["params"]["mode"]="inline_add";
else
	$control_regseconds["params"]["mode"]="add";

if(!$detailKeys || !in_array("regseconds", $detailKeys))
	$xt->assignbyref("regseconds_editcontrol",$control_regseconds);
else if(array_key_exists("regseconds", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"regseconds", ""),"field=regseconds","",MODE_VIEW);
		$xt->assign("regseconds_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - lastms
$control_lastms=array();
$control_lastms["func"]="xt_buildeditcontrol";
$control_lastms["params"] = array();
$control_lastms["params"]["field"]="lastms";
$control_lastms["params"]["value"]=@$defvalues["lastms"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_lastms["params"]["validate"]=$arrValidate;
//	End Add validation

$control_lastms["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_lastms["params"]["mode"]="inline_add";
else
	$control_lastms["params"]["mode"]="add";

if(!$detailKeys || !in_array("lastms", $detailKeys))
	$xt->assignbyref("lastms_editcontrol",$control_lastms);
else if(array_key_exists("lastms", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"lastms", ""),"field=lastms","",MODE_VIEW);
		$xt->assign("lastms_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - username
$control_username=array();
$control_username["func"]="xt_buildeditcontrol";
$control_username["params"] = array();
$control_username["params"]["field"]="username";
$control_username["params"]["value"]=@$defvalues["username"];

//	Begin Add validation
$arrValidate = array();	
$control_username["params"]["validate"]=$arrValidate;
//	End Add validation

$control_username["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_username["params"]["mode"]="inline_add";
else
	$control_username["params"]["mode"]="add";

if(!$detailKeys || !in_array("username", $detailKeys))
	$xt->assignbyref("username_editcontrol",$control_username);
else if(array_key_exists("username", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"username", ""),"field=username","",MODE_VIEW);
		$xt->assign("username_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - defaultuser
$control_defaultuser=array();
$control_defaultuser["func"]="xt_buildeditcontrol";
$control_defaultuser["params"] = array();
$control_defaultuser["params"]["field"]="defaultuser";
$control_defaultuser["params"]["value"]=@$defvalues["defaultuser"];

//	Begin Add validation
$arrValidate = array();	
$control_defaultuser["params"]["validate"]=$arrValidate;
//	End Add validation

$control_defaultuser["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_defaultuser["params"]["mode"]="inline_add";
else
	$control_defaultuser["params"]["mode"]="add";

if(!$detailKeys || !in_array("defaultuser", $detailKeys))
	$xt->assignbyref("defaultuser_editcontrol",$control_defaultuser);
else if(array_key_exists("defaultuser", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"defaultuser", ""),"field=defaultuser","",MODE_VIEW);
		$xt->assign("defaultuser_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - subscribecontext
$control_subscribecontext=array();
$control_subscribecontext["func"]="xt_buildeditcontrol";
$control_subscribecontext["params"] = array();
$control_subscribecontext["params"]["field"]="subscribecontext";
$control_subscribecontext["params"]["value"]=@$defvalues["subscribecontext"];

//	Begin Add validation
$arrValidate = array();	
$control_subscribecontext["params"]["validate"]=$arrValidate;
//	End Add validation

$control_subscribecontext["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_subscribecontext["params"]["mode"]="inline_add";
else
	$control_subscribecontext["params"]["mode"]="add";

if(!$detailKeys || !in_array("subscribecontext", $detailKeys))
	$xt->assignbyref("subscribecontext_editcontrol",$control_subscribecontext);
else if(array_key_exists("subscribecontext", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"subscribecontext", ""),"field=subscribecontext","",MODE_VIEW);
		$xt->assign("subscribecontext_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - useragent
$control_useragent=array();
$control_useragent["func"]="xt_buildeditcontrol";
$control_useragent["params"] = array();
$control_useragent["params"]["field"]="useragent";
$control_useragent["params"]["value"]=@$defvalues["useragent"];

//	Begin Add validation
$arrValidate = array();	
$control_useragent["params"]["validate"]=$arrValidate;
//	End Add validation

$control_useragent["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_useragent["params"]["mode"]="inline_add";
else
	$control_useragent["params"]["mode"]="add";

if(!$detailKeys || !in_array("useragent", $detailKeys))
	$xt->assignbyref("useragent_editcontrol",$control_useragent);
else if(array_key_exists("useragent", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"useragent", ""),"field=useragent","",MODE_VIEW);
		$xt->assign("useragent_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - gateway
$control_gateway=array();
$control_gateway["func"]="xt_buildeditcontrol";
$control_gateway["params"] = array();
$control_gateway["params"]["field"]="gateway";
$control_gateway["params"]["value"]=@$defvalues["gateway"];

//	Begin Add validation
$arrValidate = array();	
$control_gateway["params"]["validate"]=$arrValidate;
//	End Add validation

$control_gateway["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_gateway["params"]["mode"]="inline_add";
else
	$control_gateway["params"]["mode"]="add";

if(!$detailKeys || !in_array("gateway", $detailKeys))
	$xt->assignbyref("gateway_editcontrol",$control_gateway);
else if(array_key_exists("gateway", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"gateway", ""),"field=gateway","",MODE_VIEW);
		$xt->assign("gateway_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - id_horario
$control_id_horario=array();
$control_id_horario["func"]="xt_buildeditcontrol";
$control_id_horario["params"] = array();
$control_id_horario["params"]["field"]="id_horario";
$control_id_horario["params"]["value"]=@$defvalues["id_horario"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_id_horario["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_horario["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_horario["params"]["mode"]="inline_add";
else
	$control_id_horario["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_horario", $detailKeys))
	$xt->assignbyref("id_horario_editcontrol",$control_id_horario);
else if(array_key_exists("id_horario", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"id_horario", ""),"field=id%5Fhorario","",MODE_VIEW);
		$xt->assign("id_horario_editcontrol",$value);
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
//	control - grava_chamada
$control_grava_chamada=array();
$control_grava_chamada["func"]="xt_buildeditcontrol";
$control_grava_chamada["params"] = array();
$control_grava_chamada["params"]["field"]="grava_chamada";
$control_grava_chamada["params"]["value"]=@$defvalues["grava_chamada"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_grava_chamada["params"]["validate"]=$arrValidate;
//	End Add validation

$control_grava_chamada["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_grava_chamada["params"]["mode"]="inline_add";
else
	$control_grava_chamada["params"]["mode"]="add";

if(!$detailKeys || !in_array("grava_chamada", $detailKeys))
	$xt->assignbyref("grava_chamada_editcontrol",$control_grava_chamada);
else if(array_key_exists("grava_chamada", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"grava_chamada", ""),"field=grava%5Fchamada","",MODE_VIEW);
		$xt->assign("grava_chamada_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - tp_ramal
$control_tp_ramal=array();
$control_tp_ramal["func"]="xt_buildeditcontrol";
$control_tp_ramal["params"] = array();
$control_tp_ramal["params"]["field"]="tp_ramal";
$control_tp_ramal["params"]["value"]=@$defvalues["tp_ramal"];

//	Begin Add validation
$arrValidate = array();	
$control_tp_ramal["params"]["validate"]=$arrValidate;
//	End Add validation

$control_tp_ramal["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_tp_ramal["params"]["mode"]="inline_add";
else
	$control_tp_ramal["params"]["mode"]="add";

if(!$detailKeys || !in_array("tp_ramal", $detailKeys))
	$xt->assignbyref("tp_ramal_editcontrol",$control_tp_ramal);
else if(array_key_exists("tp_ramal", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"tp_ramal", ""),"field=tp%5Framal","",MODE_VIEW);
		$xt->assign("tp_ramal_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - Transbordo
$control_Transbordo=array();
$control_Transbordo["func"]="xt_buildeditcontrol";
$control_Transbordo["params"] = array();
$control_Transbordo["params"]["field"]="Transbordo";
$control_Transbordo["params"]["value"]=@$defvalues["Transbordo"];

//	Begin Add validation
$arrValidate = array();	
$control_Transbordo["params"]["validate"]=$arrValidate;
//	End Add validation

$control_Transbordo["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_Transbordo["params"]["mode"]="inline_add";
else
	$control_Transbordo["params"]["mode"]="add";

if(!$detailKeys || !in_array("Transbordo", $detailKeys))
	$xt->assignbyref("Transbordo_editcontrol",$control_Transbordo);
else if(array_key_exists("Transbordo", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"Transbordo", ""),"field=Transbordo","",MODE_VIEW);
		$xt->assign("Transbordo_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - id_interf
$control_id_interf=array();
$control_id_interf["func"]="xt_buildeditcontrol";
$control_id_interf["params"] = array();
$control_id_interf["params"]["field"]="id_interf";
$control_id_interf["params"]["value"]=@$defvalues["id_interf"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_id_interf["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_interf["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_interf["params"]["mode"]="inline_add";
else
	$control_id_interf["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_interf", $detailKeys))
	$xt->assignbyref("id_interf_editcontrol",$control_id_interf);
else if(array_key_exists("id_interf", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"id_interf", ""),"field=id%5Finterf","",MODE_VIEW);
		$xt->assign("id_interf_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ident_interf
$control_ident_interf=array();
$control_ident_interf["func"]="xt_buildeditcontrol";
$control_ident_interf["params"] = array();
$control_ident_interf["params"]["field"]="ident_interf";
$control_ident_interf["params"]["value"]=@$defvalues["ident_interf"];

//	Begin Add validation
$arrValidate = array();	
$control_ident_interf["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ident_interf["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ident_interf["params"]["mode"]="inline_add";
else
	$control_ident_interf["params"]["mode"]="add";

if(!$detailKeys || !in_array("ident_interf", $detailKeys))
	$xt->assignbyref("ident_interf_editcontrol",$control_ident_interf);
else if(array_key_exists("ident_interf", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ident_interf", ""),"field=ident%5Finterf","",MODE_VIEW);
		$xt->assign("ident_interf_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - tp_chamada
$control_tp_chamada=array();
$control_tp_chamada["func"]="xt_buildeditcontrol";
$control_tp_chamada["params"] = array();
$control_tp_chamada["params"]["field"]="tp_chamada";
$control_tp_chamada["params"]["value"]=@$defvalues["tp_chamada"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_tp_chamada["params"]["validate"]=$arrValidate;
//	End Add validation

$control_tp_chamada["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_tp_chamada["params"]["mode"]="inline_add";
else
	$control_tp_chamada["params"]["mode"]="add";

if(!$detailKeys || !in_array("tp_chamada", $detailKeys))
	$xt->assignbyref("tp_chamada_editcontrol",$control_tp_chamada);
else if(array_key_exists("tp_chamada", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"tp_chamada", ""),"field=tp%5Fchamada","",MODE_VIEW);
		$xt->assign("tp_chamada_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_cadeado
$control_flg_cadeado=array();
$control_flg_cadeado["func"]="xt_buildeditcontrol";
$control_flg_cadeado["params"] = array();
$control_flg_cadeado["params"]["field"]="flg_cadeado";
$control_flg_cadeado["params"]["value"]=@$defvalues["flg_cadeado"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_flg_cadeado["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_cadeado["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_cadeado["params"]["mode"]="inline_add";
else
	$control_flg_cadeado["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_cadeado", $detailKeys))
	$xt->assignbyref("flg_cadeado_editcontrol",$control_flg_cadeado);
else if(array_key_exists("flg_cadeado", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"flg_cadeado", ""),"field=flg%5Fcadeado","",MODE_VIEW);
		$xt->assign("flg_cadeado_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - desvio
$control_desvio=array();
$control_desvio["func"]="xt_buildeditcontrol";
$control_desvio["params"] = array();
$control_desvio["params"]["field"]="desvio";
$control_desvio["params"]["value"]=@$defvalues["desvio"];

//	Begin Add validation
$arrValidate = array();	
$control_desvio["params"]["validate"]=$arrValidate;
//	End Add validation

$control_desvio["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_desvio["params"]["mode"]="inline_add";
else
	$control_desvio["params"]["mode"]="add";

if(!$detailKeys || !in_array("desvio", $detailKeys))
	$xt->assignbyref("desvio_editcontrol",$control_desvio);
else if(array_key_exists("desvio", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"desvio", ""),"field=desvio","",MODE_VIEW);
		$xt->assign("desvio_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - id_pesquisa
$control_id_pesquisa=array();
$control_id_pesquisa["func"]="xt_buildeditcontrol";
$control_id_pesquisa["params"] = array();
$control_id_pesquisa["params"]["field"]="id_pesquisa";
$control_id_pesquisa["params"]["value"]=@$defvalues["id_pesquisa"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_id_pesquisa["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_pesquisa["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_pesquisa["params"]["mode"]="inline_add";
else
	$control_id_pesquisa["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_pesquisa", $detailKeys))
	$xt->assignbyref("id_pesquisa_editcontrol",$control_id_pesquisa);
else if(array_key_exists("id_pesquisa", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"id_pesquisa", ""),"field=id%5Fpesquisa","",MODE_VIEW);
		$xt->assign("id_pesquisa_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - desvio_ddr
$control_desvio_ddr=array();
$control_desvio_ddr["func"]="xt_buildeditcontrol";
$control_desvio_ddr["params"] = array();
$control_desvio_ddr["params"]["field"]="desvio_ddr";
$control_desvio_ddr["params"]["value"]=@$defvalues["desvio_ddr"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_desvio_ddr["params"]["validate"]=$arrValidate;
//	End Add validation

$control_desvio_ddr["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_desvio_ddr["params"]["mode"]="inline_add";
else
	$control_desvio_ddr["params"]["mode"]="add";

if(!$detailKeys || !in_array("desvio_ddr", $detailKeys))
	$xt->assignbyref("desvio_ddr_editcontrol",$control_desvio_ddr);
else if(array_key_exists("desvio_ddr", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"desvio_ddr", ""),"field=desvio%5Fddr","",MODE_VIEW);
		$xt->assign("desvio_ddr_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - id_saida
$control_id_saida=array();
$control_id_saida["func"]="xt_buildeditcontrol";
$control_id_saida["params"] = array();
$control_id_saida["params"]["field"]="id_saida";
$control_id_saida["params"]["value"]=@$defvalues["id_saida"];

//	Begin Add validation
$arrValidate = array();	
$control_id_saida["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_saida["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_saida["params"]["mode"]="inline_add";
else
	$control_id_saida["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_saida", $detailKeys))
	$xt->assignbyref("id_saida_editcontrol",$control_id_saida);
else if(array_key_exists("id_saida", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"id_saida", ""),"field=id%5Fsaida","",MODE_VIEW);
		$xt->assign("id_saida_editcontrol",$value);
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
	$strTableName = "admin_users";
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
