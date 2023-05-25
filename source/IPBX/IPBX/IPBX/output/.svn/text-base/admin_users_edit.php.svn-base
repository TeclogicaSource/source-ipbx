<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/admin_users_variables.php");
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
$templatefile = ( $inlineedit ) ? "admin_users_inline_edit.htm" : "admin_users_edit.htm";

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
$keys["id"]=postvalue("editid1");
$savedKeys["id"]=postvalue("editid1");
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
	$value = postvalue("value_id_".$id);
	$type=postvalue("type_id_".$id);
	if(FieldSubmitted("id_".$id))
	{
		
		$value=prepare_for_db("id",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id"]=$value;
		
		
	}

//	update key value
	if($value!==false)
	{
		$keys["id"]=$value;
	}

//	processibng id - end
	}
	$condition = $inlineedit;

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
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_host_".$id);
	$type=postvalue("type_host_".$id);
	if(FieldSubmitted("host_".$id))
	{
		
		$value=prepare_for_db("host",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "host"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["host"]=$value;
		
		
	}


//	processibng host - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_nat_".$id);
	$type=postvalue("type_nat_".$id);
	if(FieldSubmitted("nat_".$id))
	{
		
		$value=prepare_for_db("nat",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "nat"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["nat"]=$value;
		
		
	}


//	processibng nat - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_type_".$id);
	$type=postvalue("type_type_".$id);
	if(FieldSubmitted("type_".$id))
	{
		
		$value=prepare_for_db("type",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "type"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["type"]=$value;
		
		
	}


//	processibng type - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_accountcode_".$id);
	$type=postvalue("type_accountcode_".$id);
	if(FieldSubmitted("accountcode_".$id))
	{
		
		$value=prepare_for_db("accountcode",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "accountcode"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["accountcode"]=$value;
		
		
	}


//	processibng accountcode - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_amaflags_".$id);
	$type=postvalue("type_amaflags_".$id);
	if(FieldSubmitted("amaflags_".$id))
	{
		
		$value=prepare_for_db("amaflags",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "amaflags"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["amaflags"]=$value;
		
		
	}


//	processibng amaflags - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_call_limit_".$id);
	$type=postvalue("type_call_limit_".$id);
	if(FieldSubmitted("call-limit_".$id))
	{
		
		$value=prepare_for_db("call-limit",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "call-limit"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["call-limit"]=$value;
		
		
	}


//	processibng call-limit - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_callgroup_".$id);
	$type=postvalue("type_callgroup_".$id);
	if(FieldSubmitted("callgroup_".$id))
	{
		
		$value=prepare_for_db("callgroup",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "callgroup"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["callgroup"]=$value;
		
		
	}


//	processibng callgroup - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_callerid_".$id);
	$type=postvalue("type_callerid_".$id);
	if(FieldSubmitted("callerid_".$id))
	{
		
		$value=prepare_for_db("callerid",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "callerid"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["callerid"]=$value;
		
		
	}


//	processibng callerid - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_cancallforward_".$id);
	$type=postvalue("type_cancallforward_".$id);
	if(FieldSubmitted("cancallforward_".$id))
	{
		
		$value=prepare_for_db("cancallforward",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "cancallforward"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["cancallforward"]=$value;
		
		
	}


//	processibng cancallforward - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_canreinvite_".$id);
	$type=postvalue("type_canreinvite_".$id);
	if(FieldSubmitted("canreinvite_".$id))
	{
		
		$value=prepare_for_db("canreinvite",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "canreinvite"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["canreinvite"]=$value;
		
		
	}


//	processibng canreinvite - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_context_".$id);
	$type=postvalue("type_context_".$id);
	if(FieldSubmitted("context_".$id))
	{
		
		$value=prepare_for_db("context",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "context"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["context"]=$value;
		
		
	}


//	processibng context - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_defaultip_".$id);
	$type=postvalue("type_defaultip_".$id);
	if(FieldSubmitted("defaultip_".$id))
	{
		
		$value=prepare_for_db("defaultip",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "defaultip"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["defaultip"]=$value;
		
		
	}


//	processibng defaultip - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_dtmfmode_".$id);
	$type=postvalue("type_dtmfmode_".$id);
	if(FieldSubmitted("dtmfmode_".$id))
	{
		
		$value=prepare_for_db("dtmfmode",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "dtmfmode"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["dtmfmode"]=$value;
		
		
	}


//	processibng dtmfmode - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_fromuser_".$id);
	$type=postvalue("type_fromuser_".$id);
	if(FieldSubmitted("fromuser_".$id))
	{
		
		$value=prepare_for_db("fromuser",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "fromuser"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["fromuser"]=$value;
		
		
	}


//	processibng fromuser - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_fromdomain_".$id);
	$type=postvalue("type_fromdomain_".$id);
	if(FieldSubmitted("fromdomain_".$id))
	{
		
		$value=prepare_for_db("fromdomain",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "fromdomain"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["fromdomain"]=$value;
		
		
	}


//	processibng fromdomain - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_insecure_".$id);
	$type=postvalue("type_insecure_".$id);
	if(FieldSubmitted("insecure_".$id))
	{
		
		$value=prepare_for_db("insecure",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "insecure"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["insecure"]=$value;
		
		
	}


//	processibng insecure - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_language_".$id);
	$type=postvalue("type_language_".$id);
	if(FieldSubmitted("language_".$id))
	{
		
		$value=prepare_for_db("language",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "language"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["language"]=$value;
		
		
	}


//	processibng language - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_mailbox_".$id);
	$type=postvalue("type_mailbox_".$id);
	if(FieldSubmitted("mailbox_".$id))
	{
		
		$value=prepare_for_db("mailbox",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "mailbox"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["mailbox"]=$value;
		
		
	}


//	processibng mailbox - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_md5secret_".$id);
	$type=postvalue("type_md5secret_".$id);
	if(FieldSubmitted("md5secret_".$id))
	{
		
		$value=prepare_for_db("md5secret",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "md5secret"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["md5secret"]=$value;
		
		
	}


//	processibng md5secret - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_deny_".$id);
	$type=postvalue("type_deny_".$id);
	if(FieldSubmitted("deny_".$id))
	{
		
		$value=prepare_for_db("deny",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "deny"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["deny"]=$value;
		
		
	}


//	processibng deny - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_permit_".$id);
	$type=postvalue("type_permit_".$id);
	if(FieldSubmitted("permit_".$id))
	{
		
		$value=prepare_for_db("permit",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "permit"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["permit"]=$value;
		
		
	}


//	processibng permit - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_mask_".$id);
	$type=postvalue("type_mask_".$id);
	if(FieldSubmitted("mask_".$id))
	{
		
		$value=prepare_for_db("mask",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "mask"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["mask"]=$value;
		
		
	}


//	processibng mask - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_musiconhold_".$id);
	$type=postvalue("type_musiconhold_".$id);
	if(FieldSubmitted("musiconhold_".$id))
	{
		
		$value=prepare_for_db("musiconhold",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "musiconhold"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["musiconhold"]=$value;
		
		
	}


//	processibng musiconhold - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_pickupgroup_".$id);
	$type=postvalue("type_pickupgroup_".$id);
	if(FieldSubmitted("pickupgroup_".$id))
	{
		
		$value=prepare_for_db("pickupgroup",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "pickupgroup"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["pickupgroup"]=$value;
		
		
	}


//	processibng pickupgroup - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_qualify_".$id);
	$type=postvalue("type_qualify_".$id);
	if(FieldSubmitted("qualify_".$id))
	{
		
		$value=prepare_for_db("qualify",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "qualify"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["qualify"]=$value;
		
		
	}


//	processibng qualify - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_rtcachefriends_".$id);
	$type=postvalue("type_rtcachefriends_".$id);
	if(FieldSubmitted("rtcachefriends_".$id))
	{
		
		$value=prepare_for_db("rtcachefriends",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "rtcachefriends"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["rtcachefriends"]=$value;
		
		
	}


//	processibng rtcachefriends - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_regexten_".$id);
	$type=postvalue("type_regexten_".$id);
	if(FieldSubmitted("regexten_".$id))
	{
		
		$value=prepare_for_db("regexten",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "regexten"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["regexten"]=$value;
		
		
	}


//	processibng regexten - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_restrictcid_".$id);
	$type=postvalue("type_restrictcid_".$id);
	if(FieldSubmitted("restrictcid_".$id))
	{
		
		$value=prepare_for_db("restrictcid",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "restrictcid"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["restrictcid"]=$value;
		
		
	}


//	processibng restrictcid - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_rtptimeout_".$id);
	$type=postvalue("type_rtptimeout_".$id);
	if(FieldSubmitted("rtptimeout_".$id))
	{
		
		$value=prepare_for_db("rtptimeout",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "rtptimeout"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["rtptimeout"]=$value;
		
		
	}


//	processibng rtptimeout - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_rtpholdtimeout_".$id);
	$type=postvalue("type_rtpholdtimeout_".$id);
	if(FieldSubmitted("rtpholdtimeout_".$id))
	{
		
		$value=prepare_for_db("rtpholdtimeout",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "rtpholdtimeout"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["rtpholdtimeout"]=$value;
		
		
	}


//	processibng rtpholdtimeout - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_secret_".$id);
	$type=postvalue("type_secret_".$id);
	if(FieldSubmitted("secret_".$id))
	{
		
		$value=prepare_for_db("secret",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "secret"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["secret"]=$value;
		
		
	}


//	processibng secret - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_setvar_".$id);
	$type=postvalue("type_setvar_".$id);
	if(FieldSubmitted("setvar_".$id))
	{
		
		$value=prepare_for_db("setvar",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "setvar"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["setvar"]=$value;
		
		
	}


//	processibng setvar - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_disallow_".$id);
	$type=postvalue("type_disallow_".$id);
	if(FieldSubmitted("disallow_".$id))
	{
		
		$value=prepare_for_db("disallow",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "disallow"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["disallow"]=$value;
		
		
	}


//	processibng disallow - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_allow_".$id);
	$type=postvalue("type_allow_".$id);
	if(FieldSubmitted("allow_".$id))
	{
		
		$value=prepare_for_db("allow",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "allow"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["allow"]=$value;
		
		
	}


//	processibng allow - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_fullcontact_".$id);
	$type=postvalue("type_fullcontact_".$id);
	if(FieldSubmitted("fullcontact_".$id))
	{
		
		$value=prepare_for_db("fullcontact",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "fullcontact"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["fullcontact"]=$value;
		
		
	}


//	processibng fullcontact - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_ipaddr_".$id);
	$type=postvalue("type_ipaddr_".$id);
	if(FieldSubmitted("ipaddr_".$id))
	{
		
		$value=prepare_for_db("ipaddr",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ipaddr"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ipaddr"]=$value;
		
		
	}


//	processibng ipaddr - end
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
	$value = postvalue("value_regserver_".$id);
	$type=postvalue("type_regserver_".$id);
	if(FieldSubmitted("regserver_".$id))
	{
		
		$value=prepare_for_db("regserver",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "regserver"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["regserver"]=$value;
		
		
	}


//	processibng regserver - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_regseconds_".$id);
	$type=postvalue("type_regseconds_".$id);
	if(FieldSubmitted("regseconds_".$id))
	{
		
		$value=prepare_for_db("regseconds",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "regseconds"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["regseconds"]=$value;
		
		
	}


//	processibng regseconds - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_lastms_".$id);
	$type=postvalue("type_lastms_".$id);
	if(FieldSubmitted("lastms_".$id))
	{
		
		$value=prepare_for_db("lastms",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "lastms"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["lastms"]=$value;
		
		
	}


//	processibng lastms - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_username_".$id);
	$type=postvalue("type_username_".$id);
	if(FieldSubmitted("username_".$id))
	{
		
		$value=prepare_for_db("username",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "username"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["username"]=$value;
		
		
	}


//	processibng username - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_defaultuser_".$id);
	$type=postvalue("type_defaultuser_".$id);
	if(FieldSubmitted("defaultuser_".$id))
	{
		
		$value=prepare_for_db("defaultuser",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "defaultuser"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["defaultuser"]=$value;
		
		
	}


//	processibng defaultuser - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_subscribecontext_".$id);
	$type=postvalue("type_subscribecontext_".$id);
	if(FieldSubmitted("subscribecontext_".$id))
	{
		
		$value=prepare_for_db("subscribecontext",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "subscribecontext"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["subscribecontext"]=$value;
		
		
	}


//	processibng subscribecontext - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_useragent_".$id);
	$type=postvalue("type_useragent_".$id);
	if(FieldSubmitted("useragent_".$id))
	{
		
		$value=prepare_for_db("useragent",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "useragent"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["useragent"]=$value;
		
		
	}


//	processibng useragent - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_gateway_".$id);
	$type=postvalue("type_gateway_".$id);
	if(FieldSubmitted("gateway_".$id))
	{
		
		$value=prepare_for_db("gateway",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "gateway"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["gateway"]=$value;
		
		
	}


//	processibng gateway - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_horario_".$id);
	$type=postvalue("type_id_horario_".$id);
	if(FieldSubmitted("id_horario_".$id))
	{
		
		$value=prepare_for_db("id_horario",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_horario"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_horario"]=$value;
		
		
	}


//	processibng id_horario - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_mail_".$id);
	$type=postvalue("type_mail_".$id);
	if(FieldSubmitted("mail_".$id))
	{
		
		$value=prepare_for_db("mail",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "mail"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["mail"]=$value;
		
		
	}


//	processibng mail - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_grava_chamada_".$id);
	$type=postvalue("type_grava_chamada_".$id);
	if(FieldSubmitted("grava_chamada_".$id))
	{
		
		$value=prepare_for_db("grava_chamada",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "grava_chamada"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["grava_chamada"]=$value;
		
		
	}


//	processibng grava_chamada - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_tp_ramal_".$id);
	$type=postvalue("type_tp_ramal_".$id);
	if(FieldSubmitted("tp_ramal_".$id))
	{
		
		$value=prepare_for_db("tp_ramal",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "tp_ramal"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["tp_ramal"]=$value;
		
		
	}


//	processibng tp_ramal - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_Transbordo_".$id);
	$type=postvalue("type_Transbordo_".$id);
	if(FieldSubmitted("Transbordo_".$id))
	{
		
		$value=prepare_for_db("Transbordo",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "Transbordo"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["Transbordo"]=$value;
		
		
	}


//	processibng Transbordo - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_interf_".$id);
	$type=postvalue("type_id_interf_".$id);
	if(FieldSubmitted("id_interf_".$id))
	{
		
		$value=prepare_for_db("id_interf",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_interf"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_interf"]=$value;
		
		
	}


//	processibng id_interf - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_ident_interf_".$id);
	$type=postvalue("type_ident_interf_".$id);
	if(FieldSubmitted("ident_interf_".$id))
	{
		
		$value=prepare_for_db("ident_interf",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "ident_interf"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["ident_interf"]=$value;
		
		
	}


//	processibng ident_interf - end
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
	$value = postvalue("value_flg_cadeado_".$id);
	$type=postvalue("type_flg_cadeado_".$id);
	if(FieldSubmitted("flg_cadeado_".$id))
	{
		
		$value=prepare_for_db("flg_cadeado",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_cadeado"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_cadeado"]=$value;
		
		
	}


//	processibng flg_cadeado - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_desvio_".$id);
	$type=postvalue("type_desvio_".$id);
	if(FieldSubmitted("desvio_".$id))
	{
		
		$value=prepare_for_db("desvio",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "desvio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["desvio"]=$value;
		
		
	}


//	processibng desvio - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_pesquisa_".$id);
	$type=postvalue("type_id_pesquisa_".$id);
	if(FieldSubmitted("id_pesquisa_".$id))
	{
		
		$value=prepare_for_db("id_pesquisa",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_pesquisa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_pesquisa"]=$value;
		
		
	}


//	processibng id_pesquisa - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_desvio_ddr_".$id);
	$type=postvalue("type_desvio_ddr_".$id);
	if(FieldSubmitted("desvio_ddr_".$id))
	{
		
		$value=prepare_for_db("desvio_ddr",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "desvio_ddr"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["desvio_ddr"]=$value;
		
		
	}


//	processibng desvio_ddr - end
	}
	$condition = $inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_saida_".$id);
	$type=postvalue("type_id_saida_".$id);
	if(FieldSubmitted("id_saida_".$id))
	{
		
		$value=prepare_for_db("id_saida",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_saida"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_saida"]=$value;
		
		
	}


//	processibng id_saida - end
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
		$keyGetQ.="editid1=".rawurldecode($keys["id"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: admin_users_".$pageObject->getPageType().".php?".$keyGetQ);
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
$query = $queryData_admin_users->Copy();



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
		header("Location: admin_users_list.php?a=return");
		exit();
	}
	else
		$data=array();
}

$readonlyfields=array();


	



if($readevalues)
{
	$data["id"]=$evalues["id"];
	$data["name"]=$evalues["name"];
	$data["host"]=$evalues["host"];
	$data["nat"]=$evalues["nat"];
	$data["type"]=$evalues["type"];
	$data["accountcode"]=$evalues["accountcode"];
	$data["amaflags"]=$evalues["amaflags"];
	$data["call-limit"]=$evalues["call-limit"];
	$data["callgroup"]=$evalues["callgroup"];
	$data["callerid"]=$evalues["callerid"];
	$data["cancallforward"]=$evalues["cancallforward"];
	$data["canreinvite"]=$evalues["canreinvite"];
	$data["context"]=$evalues["context"];
	$data["defaultip"]=$evalues["defaultip"];
	$data["dtmfmode"]=$evalues["dtmfmode"];
	$data["fromuser"]=$evalues["fromuser"];
	$data["fromdomain"]=$evalues["fromdomain"];
	$data["insecure"]=$evalues["insecure"];
	$data["language"]=$evalues["language"];
	$data["mailbox"]=$evalues["mailbox"];
	$data["md5secret"]=$evalues["md5secret"];
	$data["deny"]=$evalues["deny"];
	$data["permit"]=$evalues["permit"];
	$data["mask"]=$evalues["mask"];
	$data["musiconhold"]=$evalues["musiconhold"];
	$data["pickupgroup"]=$evalues["pickupgroup"];
	$data["qualify"]=$evalues["qualify"];
	$data["rtcachefriends"]=$evalues["rtcachefriends"];
	$data["regexten"]=$evalues["regexten"];
	$data["restrictcid"]=$evalues["restrictcid"];
	$data["rtptimeout"]=$evalues["rtptimeout"];
	$data["rtpholdtimeout"]=$evalues["rtpholdtimeout"];
	$data["secret"]=$evalues["secret"];
	$data["setvar"]=$evalues["setvar"];
	$data["disallow"]=$evalues["disallow"];
	$data["allow"]=$evalues["allow"];
	$data["fullcontact"]=$evalues["fullcontact"];
	$data["ipaddr"]=$evalues["ipaddr"];
	$data["port"]=$evalues["port"];
	$data["regserver"]=$evalues["regserver"];
	$data["regseconds"]=$evalues["regseconds"];
	$data["lastms"]=$evalues["lastms"];
	$data["username"]=$evalues["username"];
	$data["defaultuser"]=$evalues["defaultuser"];
	$data["subscribecontext"]=$evalues["subscribecontext"];
	$data["useragent"]=$evalues["useragent"];
	$data["gateway"]=$evalues["gateway"];
	$data["id_horario"]=$evalues["id_horario"];
	$data["mail"]=$evalues["mail"];
	$data["grava_chamada"]=$evalues["grava_chamada"];
	$data["tp_ramal"]=$evalues["tp_ramal"];
	$data["Transbordo"]=$evalues["Transbordo"];
	$data["id_interf"]=$evalues["id_interf"];
	$data["ident_interf"]=$evalues["ident_interf"];
	$data["tp_chamada"]=$evalues["tp_chamada"];
	$data["flg_cadeado"]=$evalues["flg_cadeado"];
	$data["desvio"]=$evalues["desvio"];
	$data["id_pesquisa"]=$evalues["id_pesquisa"];
	$data["desvio_ddr"]=$evalues["desvio_ddr"];
	$data["id_saida"]=$evalues["id_saida"];
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
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid1\" value=\"".htmlspecialchars($keys["id"])."\">";
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id", "")));
	
	$xt->assign('editForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="admin_users_edit.php" '.$onsubmit.'>'.
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
	
	if(GetFieldIndex("id"))
		$key[]=GetFieldIndex("id");
	
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
					$next[1]=$row_next["id"];
			}
			
			$res_prev=db_query($sql_prev,$conn);	
			if($row_prev=db_fetch_array($res_prev))
			{
					$prev[1]=$row_prev["id"];
			}
		}
	}
}
	$nextlink=$prevlink="";
	// reset button handler
	$resetEditors="";
	$unblRec="UnlockRecord('admin_users_edit.php','".$skeys."','',function(){window.location.href='admin_users_edit.php?";
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
	$xt->assign("backbutton_attrs","onclick=\"UnlockRecord('admin_users_edit.php','".$skeys."','',function(){window.location.href='admin_users_list.php?a=return'});return false;\"");
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
$showKeys[] = rawurlencode($keys["id"]);
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
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));


//	id - 

		$value="";
				$value = ProcessLargeText(GetData($data,"id", ""),"field=id".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id";
				$showRawValues[] = substr($data["id"],0,100);

//	name - 

		$value="";
				$value = ProcessLargeText(GetData($data,"name", ""),"field=name".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "name";
				$showRawValues[] = substr($data["name"],0,100);

//	host - 

		$value="";
				$value = ProcessLargeText(GetData($data,"host", ""),"field=host".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "host";
				$showRawValues[] = substr($data["host"],0,100);

//	nat - 

		$value="";
				$value = ProcessLargeText(GetData($data,"nat", ""),"field=nat".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "nat";
				$showRawValues[] = substr($data["nat"],0,100);

//	type - 

		$value="";
				$value = ProcessLargeText(GetData($data,"type", ""),"field=type".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "type";
				$showRawValues[] = substr($data["type"],0,100);

//	accountcode - 

		$value="";
				$value = ProcessLargeText(GetData($data,"accountcode", ""),"field=accountcode".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "accountcode";
				$showRawValues[] = substr($data["accountcode"],0,100);

//	amaflags - 

		$value="";
				$value = ProcessLargeText(GetData($data,"amaflags", ""),"field=amaflags".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "amaflags";
				$showRawValues[] = substr($data["amaflags"],0,100);

//	call-limit - 

		$value="";
				$value = ProcessLargeText(GetData($data,"call-limit", ""),"field=call%2Dlimit".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "call_limit";
				$showRawValues[] = substr($data["call-limit"],0,100);

//	callgroup - 

		$value="";
				$value = ProcessLargeText(GetData($data,"callgroup", ""),"field=callgroup".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "callgroup";
				$showRawValues[] = substr($data["callgroup"],0,100);

//	callerid - 

		$value="";
				$value = ProcessLargeText(GetData($data,"callerid", ""),"field=callerid".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "callerid";
				$showRawValues[] = substr($data["callerid"],0,100);

//	cancallforward - 

		$value="";
				$value = ProcessLargeText(GetData($data,"cancallforward", ""),"field=cancallforward".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "cancallforward";
				$showRawValues[] = substr($data["cancallforward"],0,100);

//	canreinvite - 

		$value="";
				$value = ProcessLargeText(GetData($data,"canreinvite", ""),"field=canreinvite".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "canreinvite";
				$showRawValues[] = substr($data["canreinvite"],0,100);

//	context - 

		$value="";
				$value = ProcessLargeText(GetData($data,"context", ""),"field=context".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "context";
				$showRawValues[] = substr($data["context"],0,100);

//	defaultip - 

		$value="";
				$value = ProcessLargeText(GetData($data,"defaultip", ""),"field=defaultip".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "defaultip";
				$showRawValues[] = substr($data["defaultip"],0,100);

//	dtmfmode - 

		$value="";
				$value = ProcessLargeText(GetData($data,"dtmfmode", ""),"field=dtmfmode".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dtmfmode";
				$showRawValues[] = substr($data["dtmfmode"],0,100);

//	fromuser - 

		$value="";
				$value = ProcessLargeText(GetData($data,"fromuser", ""),"field=fromuser".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "fromuser";
				$showRawValues[] = substr($data["fromuser"],0,100);

//	fromdomain - 

		$value="";
				$value = ProcessLargeText(GetData($data,"fromdomain", ""),"field=fromdomain".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "fromdomain";
				$showRawValues[] = substr($data["fromdomain"],0,100);

//	insecure - 

		$value="";
				$value = ProcessLargeText(GetData($data,"insecure", ""),"field=insecure".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "insecure";
				$showRawValues[] = substr($data["insecure"],0,100);

//	language - 

		$value="";
				$value = ProcessLargeText(GetData($data,"language", ""),"field=language".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "language";
				$showRawValues[] = substr($data["language"],0,100);

//	mailbox - 

		$value="";
				$value = ProcessLargeText(GetData($data,"mailbox", ""),"field=mailbox".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "mailbox";
				$showRawValues[] = substr($data["mailbox"],0,100);

//	md5secret - 

		$value="";
				$value = ProcessLargeText(GetData($data,"md5secret", ""),"field=md5secret".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "md5secret";
				$showRawValues[] = substr($data["md5secret"],0,100);

//	deny - 

		$value="";
				$value = ProcessLargeText(GetData($data,"deny", ""),"field=deny".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "deny";
				$showRawValues[] = substr($data["deny"],0,100);

//	permit - 

		$value="";
				$value = ProcessLargeText(GetData($data,"permit", ""),"field=permit".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "permit";
				$showRawValues[] = substr($data["permit"],0,100);

//	mask - 

		$value="";
				$value = ProcessLargeText(GetData($data,"mask", ""),"field=mask".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "mask";
				$showRawValues[] = substr($data["mask"],0,100);

//	musiconhold - 

		$value="";
				$value = ProcessLargeText(GetData($data,"musiconhold", ""),"field=musiconhold".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "musiconhold";
				$showRawValues[] = substr($data["musiconhold"],0,100);

//	pickupgroup - 

		$value="";
				$value = ProcessLargeText(GetData($data,"pickupgroup", ""),"field=pickupgroup".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "pickupgroup";
				$showRawValues[] = substr($data["pickupgroup"],0,100);

//	qualify - 

		$value="";
				$value = ProcessLargeText(GetData($data,"qualify", ""),"field=qualify".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "qualify";
				$showRawValues[] = substr($data["qualify"],0,100);

//	rtcachefriends - 

		$value="";
				$value = ProcessLargeText(GetData($data,"rtcachefriends", ""),"field=rtcachefriends".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "rtcachefriends";
				$showRawValues[] = substr($data["rtcachefriends"],0,100);

//	regexten - 

		$value="";
				$value = ProcessLargeText(GetData($data,"regexten", ""),"field=regexten".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "regexten";
				$showRawValues[] = substr($data["regexten"],0,100);

//	restrictcid - 

		$value="";
				$value = ProcessLargeText(GetData($data,"restrictcid", ""),"field=restrictcid".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "restrictcid";
				$showRawValues[] = substr($data["restrictcid"],0,100);

//	rtptimeout - 

		$value="";
				$value = ProcessLargeText(GetData($data,"rtptimeout", ""),"field=rtptimeout".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "rtptimeout";
				$showRawValues[] = substr($data["rtptimeout"],0,100);

//	rtpholdtimeout - 

		$value="";
				$value = ProcessLargeText(GetData($data,"rtpholdtimeout", ""),"field=rtpholdtimeout".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "rtpholdtimeout";
				$showRawValues[] = substr($data["rtpholdtimeout"],0,100);

//	secret - 

		$value="";
				$value = ProcessLargeText(GetData($data,"secret", ""),"field=secret".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "secret";
				$showRawValues[] = substr($data["secret"],0,100);

//	setvar - 

		$value="";
				$value = ProcessLargeText(GetData($data,"setvar", ""),"field=setvar".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "setvar";
				$showRawValues[] = substr($data["setvar"],0,100);

//	disallow - 

		$value="";
				$value = ProcessLargeText(GetData($data,"disallow", ""),"field=disallow".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "disallow";
				$showRawValues[] = substr($data["disallow"],0,100);

//	allow - 

		$value="";
				$value = ProcessLargeText(GetData($data,"allow", ""),"field=allow".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "allow";
				$showRawValues[] = substr($data["allow"],0,100);

//	fullcontact - 

		$value="";
				$value = ProcessLargeText(GetData($data,"fullcontact", ""),"field=fullcontact".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "fullcontact";
				$showRawValues[] = substr($data["fullcontact"],0,100);

//	ipaddr - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ipaddr", ""),"field=ipaddr".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ipaddr";
				$showRawValues[] = substr($data["ipaddr"],0,100);

//	port - 

		$value="";
				$value = ProcessLargeText(GetData($data,"port", ""),"field=port".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "port";
				$showRawValues[] = substr($data["port"],0,100);

//	regserver - 

		$value="";
				$value = ProcessLargeText(GetData($data,"regserver", ""),"field=regserver".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "regserver";
				$showRawValues[] = substr($data["regserver"],0,100);

//	regseconds - 

		$value="";
				$value = ProcessLargeText(GetData($data,"regseconds", ""),"field=regseconds".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "regseconds";
				$showRawValues[] = substr($data["regseconds"],0,100);

//	lastms - 

		$value="";
				$value = ProcessLargeText(GetData($data,"lastms", ""),"field=lastms".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "lastms";
				$showRawValues[] = substr($data["lastms"],0,100);

//	username - 

		$value="";
				$value = ProcessLargeText(GetData($data,"username", ""),"field=username".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "username";
				$showRawValues[] = substr($data["username"],0,100);

//	defaultuser - 

		$value="";
				$value = ProcessLargeText(GetData($data,"defaultuser", ""),"field=defaultuser".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "defaultuser";
				$showRawValues[] = substr($data["defaultuser"],0,100);

//	subscribecontext - 

		$value="";
				$value = ProcessLargeText(GetData($data,"subscribecontext", ""),"field=subscribecontext".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "subscribecontext";
				$showRawValues[] = substr($data["subscribecontext"],0,100);

//	useragent - 

		$value="";
				$value = ProcessLargeText(GetData($data,"useragent", ""),"field=useragent".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "useragent";
				$showRawValues[] = substr($data["useragent"],0,100);

//	gateway - 

		$value="";
				$value = ProcessLargeText(GetData($data,"gateway", ""),"field=gateway".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "gateway";
				$showRawValues[] = substr($data["gateway"],0,100);

//	id_horario - 

		$value="";
				$value = ProcessLargeText(GetData($data,"id_horario", ""),"field=id%5Fhorario".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_horario";
				$showRawValues[] = substr($data["id_horario"],0,100);

//	mail - 

		$value="";
				$value = ProcessLargeText(GetData($data,"mail", ""),"field=mail".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "mail";
				$showRawValues[] = substr($data["mail"],0,100);

//	grava_chamada - 

		$value="";
				$value = ProcessLargeText(GetData($data,"grava_chamada", ""),"field=grava%5Fchamada".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "grava_chamada";
				$showRawValues[] = substr($data["grava_chamada"],0,100);

//	tp_ramal - 

		$value="";
				$value = ProcessLargeText(GetData($data,"tp_ramal", ""),"field=tp%5Framal".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_ramal";
				$showRawValues[] = substr($data["tp_ramal"],0,100);

//	Transbordo - 

		$value="";
				$value = ProcessLargeText(GetData($data,"Transbordo", ""),"field=Transbordo".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "Transbordo";
				$showRawValues[] = substr($data["Transbordo"],0,100);

//	id_interf - 

		$value="";
				$value = ProcessLargeText(GetData($data,"id_interf", ""),"field=id%5Finterf".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_interf";
				$showRawValues[] = substr($data["id_interf"],0,100);

//	ident_interf - 

		$value="";
				$value = ProcessLargeText(GetData($data,"ident_interf", ""),"field=ident%5Finterf".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ident_interf";
				$showRawValues[] = substr($data["ident_interf"],0,100);

//	tp_chamada - 

		$value="";
				$value = ProcessLargeText(GetData($data,"tp_chamada", ""),"field=tp%5Fchamada".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_chamada";
				$showRawValues[] = substr($data["tp_chamada"],0,100);

//	flg_cadeado - 

		$value="";
				$value = ProcessLargeText(GetData($data,"flg_cadeado", ""),"field=flg%5Fcadeado".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "flg_cadeado";
				$showRawValues[] = substr($data["flg_cadeado"],0,100);

//	desvio - 

		$value="";
				$value = ProcessLargeText(GetData($data,"desvio", ""),"field=desvio".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "desvio";
				$showRawValues[] = substr($data["desvio"],0,100);

//	id_pesquisa - 

		$value="";
				$value = ProcessLargeText(GetData($data,"id_pesquisa", ""),"field=id%5Fpesquisa".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_pesquisa";
				$showRawValues[] = substr($data["id_pesquisa"],0,100);

//	desvio_ddr - 

		$value="";
				$value = ProcessLargeText(GetData($data,"desvio_ddr", ""),"field=desvio%5Fddr".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "desvio_ddr";
				$showRawValues[] = substr($data["desvio_ddr"],0,100);

//	id_saida - 

		$value="";
				$value = ProcessLargeText(GetData($data,"id_saida", ""),"field=id%5Fsaida".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_saida";
				$showRawValues[] = substr($data["id_saida"],0,100);
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
//	control - id
$control_id=array();
$control_id["func"]="xt_buildeditcontrol";
$control_id["params"] = array();
$control_id["params"]["field"]="id";
$control_id["params"]["value"]=@$data["id"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;

$arrValidate['basicValidate'][] = "IsRequired";

$control_id["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id["params"]["mode"]="inline_edit";
else
	$control_id["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id", $detailKeys))	
	$xt->assign("id_editcontrol",$control_id);
else if(array_key_exists("id",$data))
{
				$value = ProcessLargeText(GetData($data,"id", ""),"field=id","",MODE_VIEW);
		$xt->assign("id_editcontrol",$value);
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
//	control - host
$control_host=array();
$control_host["func"]="xt_buildeditcontrol";
$control_host["params"] = array();
$control_host["params"]["field"]="host";
$control_host["params"]["value"]=@$data["host"];
//	Begin Add validation
$arrValidate = array();	

$control_host["params"]["validate"]=$arrValidate;
//	End Add validation
$control_host["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_host["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_host["params"]["mode"]="inline_edit";
else
	$control_host["params"]["mode"]="edit";
if(!$detailKeys || !in_array("host", $detailKeys))	
	$xt->assign("host_editcontrol",$control_host);
else if(array_key_exists("host",$data))
{
				$value = ProcessLargeText(GetData($data,"host", ""),"field=host","",MODE_VIEW);
		$xt->assign("host_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - nat
$control_nat=array();
$control_nat["func"]="xt_buildeditcontrol";
$control_nat["params"] = array();
$control_nat["params"]["field"]="nat";
$control_nat["params"]["value"]=@$data["nat"];
//	Begin Add validation
$arrValidate = array();	

$control_nat["params"]["validate"]=$arrValidate;
//	End Add validation
$control_nat["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_nat["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_nat["params"]["mode"]="inline_edit";
else
	$control_nat["params"]["mode"]="edit";
if(!$detailKeys || !in_array("nat", $detailKeys))	
	$xt->assign("nat_editcontrol",$control_nat);
else if(array_key_exists("nat",$data))
{
				$value = ProcessLargeText(GetData($data,"nat", ""),"field=nat","",MODE_VIEW);
		$xt->assign("nat_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - type
$control_type=array();
$control_type["func"]="xt_buildeditcontrol";
$control_type["params"] = array();
$control_type["params"]["field"]="type";
$control_type["params"]["value"]=@$data["type"];
//	Begin Add validation
$arrValidate = array();	

$control_type["params"]["validate"]=$arrValidate;
//	End Add validation
$control_type["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_type["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_type["params"]["mode"]="inline_edit";
else
	$control_type["params"]["mode"]="edit";
if(!$detailKeys || !in_array("type", $detailKeys))	
	$xt->assign("type_editcontrol",$control_type);
else if(array_key_exists("type",$data))
{
				$value = ProcessLargeText(GetData($data,"type", ""),"field=type","",MODE_VIEW);
		$xt->assign("type_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - accountcode
$control_accountcode=array();
$control_accountcode["func"]="xt_buildeditcontrol";
$control_accountcode["params"] = array();
$control_accountcode["params"]["field"]="accountcode";
$control_accountcode["params"]["value"]=@$data["accountcode"];
//	Begin Add validation
$arrValidate = array();	

$control_accountcode["params"]["validate"]=$arrValidate;
//	End Add validation
$control_accountcode["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_accountcode["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_accountcode["params"]["mode"]="inline_edit";
else
	$control_accountcode["params"]["mode"]="edit";
if(!$detailKeys || !in_array("accountcode", $detailKeys))	
	$xt->assign("accountcode_editcontrol",$control_accountcode);
else if(array_key_exists("accountcode",$data))
{
				$value = ProcessLargeText(GetData($data,"accountcode", ""),"field=accountcode","",MODE_VIEW);
		$xt->assign("accountcode_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - amaflags
$control_amaflags=array();
$control_amaflags["func"]="xt_buildeditcontrol";
$control_amaflags["params"] = array();
$control_amaflags["params"]["field"]="amaflags";
$control_amaflags["params"]["value"]=@$data["amaflags"];
//	Begin Add validation
$arrValidate = array();	

$control_amaflags["params"]["validate"]=$arrValidate;
//	End Add validation
$control_amaflags["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_amaflags["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_amaflags["params"]["mode"]="inline_edit";
else
	$control_amaflags["params"]["mode"]="edit";
if(!$detailKeys || !in_array("amaflags", $detailKeys))	
	$xt->assign("amaflags_editcontrol",$control_amaflags);
else if(array_key_exists("amaflags",$data))
{
				$value = ProcessLargeText(GetData($data,"amaflags", ""),"field=amaflags","",MODE_VIEW);
		$xt->assign("amaflags_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - call_limit
$control_call_limit=array();
$control_call_limit["func"]="xt_buildeditcontrol";
$control_call_limit["params"] = array();
$control_call_limit["params"]["field"]="call-limit";
$control_call_limit["params"]["value"]=@$data["call-limit"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_call_limit["params"]["validate"]=$arrValidate;
//	End Add validation
$control_call_limit["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_call_limit["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_call_limit["params"]["mode"]="inline_edit";
else
	$control_call_limit["params"]["mode"]="edit";
if(!$detailKeys || !in_array("call-limit", $detailKeys))	
	$xt->assign("call_limit_editcontrol",$control_call_limit);
else if(array_key_exists("call-limit",$data))
{
				$value = ProcessLargeText(GetData($data,"call-limit", ""),"field=call%2Dlimit","",MODE_VIEW);
		$xt->assign("call_limit_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - callgroup
$control_callgroup=array();
$control_callgroup["func"]="xt_buildeditcontrol";
$control_callgroup["params"] = array();
$control_callgroup["params"]["field"]="callgroup";
$control_callgroup["params"]["value"]=@$data["callgroup"];
//	Begin Add validation
$arrValidate = array();	

$control_callgroup["params"]["validate"]=$arrValidate;
//	End Add validation
$control_callgroup["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_callgroup["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_callgroup["params"]["mode"]="inline_edit";
else
	$control_callgroup["params"]["mode"]="edit";
if(!$detailKeys || !in_array("callgroup", $detailKeys))	
	$xt->assign("callgroup_editcontrol",$control_callgroup);
else if(array_key_exists("callgroup",$data))
{
				$value = ProcessLargeText(GetData($data,"callgroup", ""),"field=callgroup","",MODE_VIEW);
		$xt->assign("callgroup_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - callerid
$control_callerid=array();
$control_callerid["func"]="xt_buildeditcontrol";
$control_callerid["params"] = array();
$control_callerid["params"]["field"]="callerid";
$control_callerid["params"]["value"]=@$data["callerid"];
//	Begin Add validation
$arrValidate = array();	

$control_callerid["params"]["validate"]=$arrValidate;
//	End Add validation
$control_callerid["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_callerid["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_callerid["params"]["mode"]="inline_edit";
else
	$control_callerid["params"]["mode"]="edit";
if(!$detailKeys || !in_array("callerid", $detailKeys))	
	$xt->assign("callerid_editcontrol",$control_callerid);
else if(array_key_exists("callerid",$data))
{
				$value = ProcessLargeText(GetData($data,"callerid", ""),"field=callerid","",MODE_VIEW);
		$xt->assign("callerid_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - cancallforward
$control_cancallforward=array();
$control_cancallforward["func"]="xt_buildeditcontrol";
$control_cancallforward["params"] = array();
$control_cancallforward["params"]["field"]="cancallforward";
$control_cancallforward["params"]["value"]=@$data["cancallforward"];
//	Begin Add validation
$arrValidate = array();	

$control_cancallforward["params"]["validate"]=$arrValidate;
//	End Add validation
$control_cancallforward["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_cancallforward["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_cancallforward["params"]["mode"]="inline_edit";
else
	$control_cancallforward["params"]["mode"]="edit";
if(!$detailKeys || !in_array("cancallforward", $detailKeys))	
	$xt->assign("cancallforward_editcontrol",$control_cancallforward);
else if(array_key_exists("cancallforward",$data))
{
				$value = ProcessLargeText(GetData($data,"cancallforward", ""),"field=cancallforward","",MODE_VIEW);
		$xt->assign("cancallforward_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - canreinvite
$control_canreinvite=array();
$control_canreinvite["func"]="xt_buildeditcontrol";
$control_canreinvite["params"] = array();
$control_canreinvite["params"]["field"]="canreinvite";
$control_canreinvite["params"]["value"]=@$data["canreinvite"];
//	Begin Add validation
$arrValidate = array();	

$control_canreinvite["params"]["validate"]=$arrValidate;
//	End Add validation
$control_canreinvite["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_canreinvite["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_canreinvite["params"]["mode"]="inline_edit";
else
	$control_canreinvite["params"]["mode"]="edit";
if(!$detailKeys || !in_array("canreinvite", $detailKeys))	
	$xt->assign("canreinvite_editcontrol",$control_canreinvite);
else if(array_key_exists("canreinvite",$data))
{
				$value = ProcessLargeText(GetData($data,"canreinvite", ""),"field=canreinvite","",MODE_VIEW);
		$xt->assign("canreinvite_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - context
$control_context=array();
$control_context["func"]="xt_buildeditcontrol";
$control_context["params"] = array();
$control_context["params"]["field"]="context";
$control_context["params"]["value"]=@$data["context"];
//	Begin Add validation
$arrValidate = array();	

$control_context["params"]["validate"]=$arrValidate;
//	End Add validation
$control_context["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_context["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_context["params"]["mode"]="inline_edit";
else
	$control_context["params"]["mode"]="edit";
if(!$detailKeys || !in_array("context", $detailKeys))	
	$xt->assign("context_editcontrol",$control_context);
else if(array_key_exists("context",$data))
{
				$value = ProcessLargeText(GetData($data,"context", ""),"field=context","",MODE_VIEW);
		$xt->assign("context_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - defaultip
$control_defaultip=array();
$control_defaultip["func"]="xt_buildeditcontrol";
$control_defaultip["params"] = array();
$control_defaultip["params"]["field"]="defaultip";
$control_defaultip["params"]["value"]=@$data["defaultip"];
//	Begin Add validation
$arrValidate = array();	

$control_defaultip["params"]["validate"]=$arrValidate;
//	End Add validation
$control_defaultip["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_defaultip["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_defaultip["params"]["mode"]="inline_edit";
else
	$control_defaultip["params"]["mode"]="edit";
if(!$detailKeys || !in_array("defaultip", $detailKeys))	
	$xt->assign("defaultip_editcontrol",$control_defaultip);
else if(array_key_exists("defaultip",$data))
{
				$value = ProcessLargeText(GetData($data,"defaultip", ""),"field=defaultip","",MODE_VIEW);
		$xt->assign("defaultip_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - dtmfmode
$control_dtmfmode=array();
$control_dtmfmode["func"]="xt_buildeditcontrol";
$control_dtmfmode["params"] = array();
$control_dtmfmode["params"]["field"]="dtmfmode";
$control_dtmfmode["params"]["value"]=@$data["dtmfmode"];
//	Begin Add validation
$arrValidate = array();	

$control_dtmfmode["params"]["validate"]=$arrValidate;
//	End Add validation
$control_dtmfmode["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_dtmfmode["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_dtmfmode["params"]["mode"]="inline_edit";
else
	$control_dtmfmode["params"]["mode"]="edit";
if(!$detailKeys || !in_array("dtmfmode", $detailKeys))	
	$xt->assign("dtmfmode_editcontrol",$control_dtmfmode);
else if(array_key_exists("dtmfmode",$data))
{
				$value = ProcessLargeText(GetData($data,"dtmfmode", ""),"field=dtmfmode","",MODE_VIEW);
		$xt->assign("dtmfmode_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - fromuser
$control_fromuser=array();
$control_fromuser["func"]="xt_buildeditcontrol";
$control_fromuser["params"] = array();
$control_fromuser["params"]["field"]="fromuser";
$control_fromuser["params"]["value"]=@$data["fromuser"];
//	Begin Add validation
$arrValidate = array();	

$control_fromuser["params"]["validate"]=$arrValidate;
//	End Add validation
$control_fromuser["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_fromuser["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_fromuser["params"]["mode"]="inline_edit";
else
	$control_fromuser["params"]["mode"]="edit";
if(!$detailKeys || !in_array("fromuser", $detailKeys))	
	$xt->assign("fromuser_editcontrol",$control_fromuser);
else if(array_key_exists("fromuser",$data))
{
				$value = ProcessLargeText(GetData($data,"fromuser", ""),"field=fromuser","",MODE_VIEW);
		$xt->assign("fromuser_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - fromdomain
$control_fromdomain=array();
$control_fromdomain["func"]="xt_buildeditcontrol";
$control_fromdomain["params"] = array();
$control_fromdomain["params"]["field"]="fromdomain";
$control_fromdomain["params"]["value"]=@$data["fromdomain"];
//	Begin Add validation
$arrValidate = array();	

$control_fromdomain["params"]["validate"]=$arrValidate;
//	End Add validation
$control_fromdomain["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_fromdomain["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_fromdomain["params"]["mode"]="inline_edit";
else
	$control_fromdomain["params"]["mode"]="edit";
if(!$detailKeys || !in_array("fromdomain", $detailKeys))	
	$xt->assign("fromdomain_editcontrol",$control_fromdomain);
else if(array_key_exists("fromdomain",$data))
{
				$value = ProcessLargeText(GetData($data,"fromdomain", ""),"field=fromdomain","",MODE_VIEW);
		$xt->assign("fromdomain_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - insecure
$control_insecure=array();
$control_insecure["func"]="xt_buildeditcontrol";
$control_insecure["params"] = array();
$control_insecure["params"]["field"]="insecure";
$control_insecure["params"]["value"]=@$data["insecure"];
//	Begin Add validation
$arrValidate = array();	

$control_insecure["params"]["validate"]=$arrValidate;
//	End Add validation
$control_insecure["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_insecure["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_insecure["params"]["mode"]="inline_edit";
else
	$control_insecure["params"]["mode"]="edit";
if(!$detailKeys || !in_array("insecure", $detailKeys))	
	$xt->assign("insecure_editcontrol",$control_insecure);
else if(array_key_exists("insecure",$data))
{
				$value = ProcessLargeText(GetData($data,"insecure", ""),"field=insecure","",MODE_VIEW);
		$xt->assign("insecure_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - language
$control_language=array();
$control_language["func"]="xt_buildeditcontrol";
$control_language["params"] = array();
$control_language["params"]["field"]="language";
$control_language["params"]["value"]=@$data["language"];
//	Begin Add validation
$arrValidate = array();	

$control_language["params"]["validate"]=$arrValidate;
//	End Add validation
$control_language["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_language["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_language["params"]["mode"]="inline_edit";
else
	$control_language["params"]["mode"]="edit";
if(!$detailKeys || !in_array("language", $detailKeys))	
	$xt->assign("language_editcontrol",$control_language);
else if(array_key_exists("language",$data))
{
				$value = ProcessLargeText(GetData($data,"language", ""),"field=language","",MODE_VIEW);
		$xt->assign("language_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - mailbox
$control_mailbox=array();
$control_mailbox["func"]="xt_buildeditcontrol";
$control_mailbox["params"] = array();
$control_mailbox["params"]["field"]="mailbox";
$control_mailbox["params"]["value"]=@$data["mailbox"];
//	Begin Add validation
$arrValidate = array();	

$control_mailbox["params"]["validate"]=$arrValidate;
//	End Add validation
$control_mailbox["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_mailbox["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_mailbox["params"]["mode"]="inline_edit";
else
	$control_mailbox["params"]["mode"]="edit";
if(!$detailKeys || !in_array("mailbox", $detailKeys))	
	$xt->assign("mailbox_editcontrol",$control_mailbox);
else if(array_key_exists("mailbox",$data))
{
				$value = ProcessLargeText(GetData($data,"mailbox", ""),"field=mailbox","",MODE_VIEW);
		$xt->assign("mailbox_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - md5secret
$control_md5secret=array();
$control_md5secret["func"]="xt_buildeditcontrol";
$control_md5secret["params"] = array();
$control_md5secret["params"]["field"]="md5secret";
$control_md5secret["params"]["value"]=@$data["md5secret"];
//	Begin Add validation
$arrValidate = array();	

$control_md5secret["params"]["validate"]=$arrValidate;
//	End Add validation
$control_md5secret["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_md5secret["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_md5secret["params"]["mode"]="inline_edit";
else
	$control_md5secret["params"]["mode"]="edit";
if(!$detailKeys || !in_array("md5secret", $detailKeys))	
	$xt->assign("md5secret_editcontrol",$control_md5secret);
else if(array_key_exists("md5secret",$data))
{
				$value = ProcessLargeText(GetData($data,"md5secret", ""),"field=md5secret","",MODE_VIEW);
		$xt->assign("md5secret_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - deny
$control_deny=array();
$control_deny["func"]="xt_buildeditcontrol";
$control_deny["params"] = array();
$control_deny["params"]["field"]="deny";
$control_deny["params"]["value"]=@$data["deny"];
//	Begin Add validation
$arrValidate = array();	

$control_deny["params"]["validate"]=$arrValidate;
//	End Add validation
$control_deny["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_deny["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_deny["params"]["mode"]="inline_edit";
else
	$control_deny["params"]["mode"]="edit";
if(!$detailKeys || !in_array("deny", $detailKeys))	
	$xt->assign("deny_editcontrol",$control_deny);
else if(array_key_exists("deny",$data))
{
				$value = ProcessLargeText(GetData($data,"deny", ""),"field=deny","",MODE_VIEW);
		$xt->assign("deny_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - permit
$control_permit=array();
$control_permit["func"]="xt_buildeditcontrol";
$control_permit["params"] = array();
$control_permit["params"]["field"]="permit";
$control_permit["params"]["value"]=@$data["permit"];
//	Begin Add validation
$arrValidate = array();	

$control_permit["params"]["validate"]=$arrValidate;
//	End Add validation
$control_permit["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_permit["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_permit["params"]["mode"]="inline_edit";
else
	$control_permit["params"]["mode"]="edit";
if(!$detailKeys || !in_array("permit", $detailKeys))	
	$xt->assign("permit_editcontrol",$control_permit);
else if(array_key_exists("permit",$data))
{
				$value = ProcessLargeText(GetData($data,"permit", ""),"field=permit","",MODE_VIEW);
		$xt->assign("permit_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - mask
$control_mask=array();
$control_mask["func"]="xt_buildeditcontrol";
$control_mask["params"] = array();
$control_mask["params"]["field"]="mask";
$control_mask["params"]["value"]=@$data["mask"];
//	Begin Add validation
$arrValidate = array();	

$control_mask["params"]["validate"]=$arrValidate;
//	End Add validation
$control_mask["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_mask["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_mask["params"]["mode"]="inline_edit";
else
	$control_mask["params"]["mode"]="edit";
if(!$detailKeys || !in_array("mask", $detailKeys))	
	$xt->assign("mask_editcontrol",$control_mask);
else if(array_key_exists("mask",$data))
{
				$value = ProcessLargeText(GetData($data,"mask", ""),"field=mask","",MODE_VIEW);
		$xt->assign("mask_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - musiconhold
$control_musiconhold=array();
$control_musiconhold["func"]="xt_buildeditcontrol";
$control_musiconhold["params"] = array();
$control_musiconhold["params"]["field"]="musiconhold";
$control_musiconhold["params"]["value"]=@$data["musiconhold"];
//	Begin Add validation
$arrValidate = array();	

$control_musiconhold["params"]["validate"]=$arrValidate;
//	End Add validation
$control_musiconhold["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_musiconhold["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_musiconhold["params"]["mode"]="inline_edit";
else
	$control_musiconhold["params"]["mode"]="edit";
if(!$detailKeys || !in_array("musiconhold", $detailKeys))	
	$xt->assign("musiconhold_editcontrol",$control_musiconhold);
else if(array_key_exists("musiconhold",$data))
{
				$value = ProcessLargeText(GetData($data,"musiconhold", ""),"field=musiconhold","",MODE_VIEW);
		$xt->assign("musiconhold_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - pickupgroup
$control_pickupgroup=array();
$control_pickupgroup["func"]="xt_buildeditcontrol";
$control_pickupgroup["params"] = array();
$control_pickupgroup["params"]["field"]="pickupgroup";
$control_pickupgroup["params"]["value"]=@$data["pickupgroup"];
//	Begin Add validation
$arrValidate = array();	

$control_pickupgroup["params"]["validate"]=$arrValidate;
//	End Add validation
$control_pickupgroup["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_pickupgroup["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_pickupgroup["params"]["mode"]="inline_edit";
else
	$control_pickupgroup["params"]["mode"]="edit";
if(!$detailKeys || !in_array("pickupgroup", $detailKeys))	
	$xt->assign("pickupgroup_editcontrol",$control_pickupgroup);
else if(array_key_exists("pickupgroup",$data))
{
				$value = ProcessLargeText(GetData($data,"pickupgroup", ""),"field=pickupgroup","",MODE_VIEW);
		$xt->assign("pickupgroup_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - qualify
$control_qualify=array();
$control_qualify["func"]="xt_buildeditcontrol";
$control_qualify["params"] = array();
$control_qualify["params"]["field"]="qualify";
$control_qualify["params"]["value"]=@$data["qualify"];
//	Begin Add validation
$arrValidate = array();	

$control_qualify["params"]["validate"]=$arrValidate;
//	End Add validation
$control_qualify["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_qualify["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_qualify["params"]["mode"]="inline_edit";
else
	$control_qualify["params"]["mode"]="edit";
if(!$detailKeys || !in_array("qualify", $detailKeys))	
	$xt->assign("qualify_editcontrol",$control_qualify);
else if(array_key_exists("qualify",$data))
{
				$value = ProcessLargeText(GetData($data,"qualify", ""),"field=qualify","",MODE_VIEW);
		$xt->assign("qualify_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - rtcachefriends
$control_rtcachefriends=array();
$control_rtcachefriends["func"]="xt_buildeditcontrol";
$control_rtcachefriends["params"] = array();
$control_rtcachefriends["params"]["field"]="rtcachefriends";
$control_rtcachefriends["params"]["value"]=@$data["rtcachefriends"];
//	Begin Add validation
$arrValidate = array();	

$control_rtcachefriends["params"]["validate"]=$arrValidate;
//	End Add validation
$control_rtcachefriends["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_rtcachefriends["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_rtcachefriends["params"]["mode"]="inline_edit";
else
	$control_rtcachefriends["params"]["mode"]="edit";
if(!$detailKeys || !in_array("rtcachefriends", $detailKeys))	
	$xt->assign("rtcachefriends_editcontrol",$control_rtcachefriends);
else if(array_key_exists("rtcachefriends",$data))
{
				$value = ProcessLargeText(GetData($data,"rtcachefriends", ""),"field=rtcachefriends","",MODE_VIEW);
		$xt->assign("rtcachefriends_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - regexten
$control_regexten=array();
$control_regexten["func"]="xt_buildeditcontrol";
$control_regexten["params"] = array();
$control_regexten["params"]["field"]="regexten";
$control_regexten["params"]["value"]=@$data["regexten"];
//	Begin Add validation
$arrValidate = array();	

$control_regexten["params"]["validate"]=$arrValidate;
//	End Add validation
$control_regexten["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_regexten["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_regexten["params"]["mode"]="inline_edit";
else
	$control_regexten["params"]["mode"]="edit";
if(!$detailKeys || !in_array("regexten", $detailKeys))	
	$xt->assign("regexten_editcontrol",$control_regexten);
else if(array_key_exists("regexten",$data))
{
				$value = ProcessLargeText(GetData($data,"regexten", ""),"field=regexten","",MODE_VIEW);
		$xt->assign("regexten_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - restrictcid
$control_restrictcid=array();
$control_restrictcid["func"]="xt_buildeditcontrol";
$control_restrictcid["params"] = array();
$control_restrictcid["params"]["field"]="restrictcid";
$control_restrictcid["params"]["value"]=@$data["restrictcid"];
//	Begin Add validation
$arrValidate = array();	

$control_restrictcid["params"]["validate"]=$arrValidate;
//	End Add validation
$control_restrictcid["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_restrictcid["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_restrictcid["params"]["mode"]="inline_edit";
else
	$control_restrictcid["params"]["mode"]="edit";
if(!$detailKeys || !in_array("restrictcid", $detailKeys))	
	$xt->assign("restrictcid_editcontrol",$control_restrictcid);
else if(array_key_exists("restrictcid",$data))
{
				$value = ProcessLargeText(GetData($data,"restrictcid", ""),"field=restrictcid","",MODE_VIEW);
		$xt->assign("restrictcid_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - rtptimeout
$control_rtptimeout=array();
$control_rtptimeout["func"]="xt_buildeditcontrol";
$control_rtptimeout["params"] = array();
$control_rtptimeout["params"]["field"]="rtptimeout";
$control_rtptimeout["params"]["value"]=@$data["rtptimeout"];
//	Begin Add validation
$arrValidate = array();	

$control_rtptimeout["params"]["validate"]=$arrValidate;
//	End Add validation
$control_rtptimeout["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_rtptimeout["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_rtptimeout["params"]["mode"]="inline_edit";
else
	$control_rtptimeout["params"]["mode"]="edit";
if(!$detailKeys || !in_array("rtptimeout", $detailKeys))	
	$xt->assign("rtptimeout_editcontrol",$control_rtptimeout);
else if(array_key_exists("rtptimeout",$data))
{
				$value = ProcessLargeText(GetData($data,"rtptimeout", ""),"field=rtptimeout","",MODE_VIEW);
		$xt->assign("rtptimeout_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - rtpholdtimeout
$control_rtpholdtimeout=array();
$control_rtpholdtimeout["func"]="xt_buildeditcontrol";
$control_rtpholdtimeout["params"] = array();
$control_rtpholdtimeout["params"]["field"]="rtpholdtimeout";
$control_rtpholdtimeout["params"]["value"]=@$data["rtpholdtimeout"];
//	Begin Add validation
$arrValidate = array();	

$control_rtpholdtimeout["params"]["validate"]=$arrValidate;
//	End Add validation
$control_rtpholdtimeout["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_rtpholdtimeout["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_rtpholdtimeout["params"]["mode"]="inline_edit";
else
	$control_rtpholdtimeout["params"]["mode"]="edit";
if(!$detailKeys || !in_array("rtpholdtimeout", $detailKeys))	
	$xt->assign("rtpholdtimeout_editcontrol",$control_rtpholdtimeout);
else if(array_key_exists("rtpholdtimeout",$data))
{
				$value = ProcessLargeText(GetData($data,"rtpholdtimeout", ""),"field=rtpholdtimeout","",MODE_VIEW);
		$xt->assign("rtpholdtimeout_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - secret
$control_secret=array();
$control_secret["func"]="xt_buildeditcontrol";
$control_secret["params"] = array();
$control_secret["params"]["field"]="secret";
$control_secret["params"]["value"]=@$data["secret"];
//	Begin Add validation
$arrValidate = array();	

$control_secret["params"]["validate"]=$arrValidate;
//	End Add validation
$control_secret["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_secret["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_secret["params"]["mode"]="inline_edit";
else
	$control_secret["params"]["mode"]="edit";
if(!$detailKeys || !in_array("secret", $detailKeys))	
	$xt->assign("secret_editcontrol",$control_secret);
else if(array_key_exists("secret",$data))
{
				$value = ProcessLargeText(GetData($data,"secret", ""),"field=secret","",MODE_VIEW);
		$xt->assign("secret_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - setvar
$control_setvar=array();
$control_setvar["func"]="xt_buildeditcontrol";
$control_setvar["params"] = array();
$control_setvar["params"]["field"]="setvar";
$control_setvar["params"]["value"]=@$data["setvar"];
//	Begin Add validation
$arrValidate = array();	

$control_setvar["params"]["validate"]=$arrValidate;
//	End Add validation
$control_setvar["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_setvar["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_setvar["params"]["mode"]="inline_edit";
else
	$control_setvar["params"]["mode"]="edit";
if(!$detailKeys || !in_array("setvar", $detailKeys))	
	$xt->assign("setvar_editcontrol",$control_setvar);
else if(array_key_exists("setvar",$data))
{
				$value = ProcessLargeText(GetData($data,"setvar", ""),"field=setvar","",MODE_VIEW);
		$xt->assign("setvar_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - disallow
$control_disallow=array();
$control_disallow["func"]="xt_buildeditcontrol";
$control_disallow["params"] = array();
$control_disallow["params"]["field"]="disallow";
$control_disallow["params"]["value"]=@$data["disallow"];
//	Begin Add validation
$arrValidate = array();	

$control_disallow["params"]["validate"]=$arrValidate;
//	End Add validation
$control_disallow["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_disallow["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_disallow["params"]["mode"]="inline_edit";
else
	$control_disallow["params"]["mode"]="edit";
if(!$detailKeys || !in_array("disallow", $detailKeys))	
	$xt->assign("disallow_editcontrol",$control_disallow);
else if(array_key_exists("disallow",$data))
{
				$value = ProcessLargeText(GetData($data,"disallow", ""),"field=disallow","",MODE_VIEW);
		$xt->assign("disallow_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - allow
$control_allow=array();
$control_allow["func"]="xt_buildeditcontrol";
$control_allow["params"] = array();
$control_allow["params"]["field"]="allow";
$control_allow["params"]["value"]=@$data["allow"];
//	Begin Add validation
$arrValidate = array();	

$control_allow["params"]["validate"]=$arrValidate;
//	End Add validation
$control_allow["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_allow["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_allow["params"]["mode"]="inline_edit";
else
	$control_allow["params"]["mode"]="edit";
if(!$detailKeys || !in_array("allow", $detailKeys))	
	$xt->assign("allow_editcontrol",$control_allow);
else if(array_key_exists("allow",$data))
{
				$value = ProcessLargeText(GetData($data,"allow", ""),"field=allow","",MODE_VIEW);
		$xt->assign("allow_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - fullcontact
$control_fullcontact=array();
$control_fullcontact["func"]="xt_buildeditcontrol";
$control_fullcontact["params"] = array();
$control_fullcontact["params"]["field"]="fullcontact";
$control_fullcontact["params"]["value"]=@$data["fullcontact"];
//	Begin Add validation
$arrValidate = array();	

$control_fullcontact["params"]["validate"]=$arrValidate;
//	End Add validation
$control_fullcontact["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_fullcontact["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_fullcontact["params"]["mode"]="inline_edit";
else
	$control_fullcontact["params"]["mode"]="edit";
if(!$detailKeys || !in_array("fullcontact", $detailKeys))	
	$xt->assign("fullcontact_editcontrol",$control_fullcontact);
else if(array_key_exists("fullcontact",$data))
{
				$value = ProcessLargeText(GetData($data,"fullcontact", ""),"field=fullcontact","",MODE_VIEW);
		$xt->assign("fullcontact_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ipaddr
$control_ipaddr=array();
$control_ipaddr["func"]="xt_buildeditcontrol";
$control_ipaddr["params"] = array();
$control_ipaddr["params"]["field"]="ipaddr";
$control_ipaddr["params"]["value"]=@$data["ipaddr"];
//	Begin Add validation
$arrValidate = array();	

$control_ipaddr["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ipaddr["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ipaddr["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ipaddr["params"]["mode"]="inline_edit";
else
	$control_ipaddr["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ipaddr", $detailKeys))	
	$xt->assign("ipaddr_editcontrol",$control_ipaddr);
else if(array_key_exists("ipaddr",$data))
{
				$value = ProcessLargeText(GetData($data,"ipaddr", ""),"field=ipaddr","",MODE_VIEW);
		$xt->assign("ipaddr_editcontrol",$value);
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
//	control - regserver
$control_regserver=array();
$control_regserver["func"]="xt_buildeditcontrol";
$control_regserver["params"] = array();
$control_regserver["params"]["field"]="regserver";
$control_regserver["params"]["value"]=@$data["regserver"];
//	Begin Add validation
$arrValidate = array();	

$control_regserver["params"]["validate"]=$arrValidate;
//	End Add validation
$control_regserver["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_regserver["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_regserver["params"]["mode"]="inline_edit";
else
	$control_regserver["params"]["mode"]="edit";
if(!$detailKeys || !in_array("regserver", $detailKeys))	
	$xt->assign("regserver_editcontrol",$control_regserver);
else if(array_key_exists("regserver",$data))
{
				$value = ProcessLargeText(GetData($data,"regserver", ""),"field=regserver","",MODE_VIEW);
		$xt->assign("regserver_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - regseconds
$control_regseconds=array();
$control_regseconds["func"]="xt_buildeditcontrol";
$control_regseconds["params"] = array();
$control_regseconds["params"]["field"]="regseconds";
$control_regseconds["params"]["value"]=@$data["regseconds"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;

$arrValidate['basicValidate'][] = "IsRequired";

$control_regseconds["params"]["validate"]=$arrValidate;
//	End Add validation
$control_regseconds["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_regseconds["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_regseconds["params"]["mode"]="inline_edit";
else
	$control_regseconds["params"]["mode"]="edit";
if(!$detailKeys || !in_array("regseconds", $detailKeys))	
	$xt->assign("regseconds_editcontrol",$control_regseconds);
else if(array_key_exists("regseconds",$data))
{
				$value = ProcessLargeText(GetData($data,"regseconds", ""),"field=regseconds","",MODE_VIEW);
		$xt->assign("regseconds_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - lastms
$control_lastms=array();
$control_lastms["func"]="xt_buildeditcontrol";
$control_lastms["params"] = array();
$control_lastms["params"]["field"]="lastms";
$control_lastms["params"]["value"]=@$data["lastms"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;

$arrValidate['basicValidate'][] = "IsRequired";

$control_lastms["params"]["validate"]=$arrValidate;
//	End Add validation
$control_lastms["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_lastms["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_lastms["params"]["mode"]="inline_edit";
else
	$control_lastms["params"]["mode"]="edit";
if(!$detailKeys || !in_array("lastms", $detailKeys))	
	$xt->assign("lastms_editcontrol",$control_lastms);
else if(array_key_exists("lastms",$data))
{
				$value = ProcessLargeText(GetData($data,"lastms", ""),"field=lastms","",MODE_VIEW);
		$xt->assign("lastms_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - username
$control_username=array();
$control_username["func"]="xt_buildeditcontrol";
$control_username["params"] = array();
$control_username["params"]["field"]="username";
$control_username["params"]["value"]=@$data["username"];
//	Begin Add validation
$arrValidate = array();	

$control_username["params"]["validate"]=$arrValidate;
//	End Add validation
$control_username["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_username["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_username["params"]["mode"]="inline_edit";
else
	$control_username["params"]["mode"]="edit";
if(!$detailKeys || !in_array("username", $detailKeys))	
	$xt->assign("username_editcontrol",$control_username);
else if(array_key_exists("username",$data))
{
				$value = ProcessLargeText(GetData($data,"username", ""),"field=username","",MODE_VIEW);
		$xt->assign("username_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - defaultuser
$control_defaultuser=array();
$control_defaultuser["func"]="xt_buildeditcontrol";
$control_defaultuser["params"] = array();
$control_defaultuser["params"]["field"]="defaultuser";
$control_defaultuser["params"]["value"]=@$data["defaultuser"];
//	Begin Add validation
$arrValidate = array();	

$control_defaultuser["params"]["validate"]=$arrValidate;
//	End Add validation
$control_defaultuser["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_defaultuser["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_defaultuser["params"]["mode"]="inline_edit";
else
	$control_defaultuser["params"]["mode"]="edit";
if(!$detailKeys || !in_array("defaultuser", $detailKeys))	
	$xt->assign("defaultuser_editcontrol",$control_defaultuser);
else if(array_key_exists("defaultuser",$data))
{
				$value = ProcessLargeText(GetData($data,"defaultuser", ""),"field=defaultuser","",MODE_VIEW);
		$xt->assign("defaultuser_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - subscribecontext
$control_subscribecontext=array();
$control_subscribecontext["func"]="xt_buildeditcontrol";
$control_subscribecontext["params"] = array();
$control_subscribecontext["params"]["field"]="subscribecontext";
$control_subscribecontext["params"]["value"]=@$data["subscribecontext"];
//	Begin Add validation
$arrValidate = array();	

$control_subscribecontext["params"]["validate"]=$arrValidate;
//	End Add validation
$control_subscribecontext["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_subscribecontext["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_subscribecontext["params"]["mode"]="inline_edit";
else
	$control_subscribecontext["params"]["mode"]="edit";
if(!$detailKeys || !in_array("subscribecontext", $detailKeys))	
	$xt->assign("subscribecontext_editcontrol",$control_subscribecontext);
else if(array_key_exists("subscribecontext",$data))
{
				$value = ProcessLargeText(GetData($data,"subscribecontext", ""),"field=subscribecontext","",MODE_VIEW);
		$xt->assign("subscribecontext_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - useragent
$control_useragent=array();
$control_useragent["func"]="xt_buildeditcontrol";
$control_useragent["params"] = array();
$control_useragent["params"]["field"]="useragent";
$control_useragent["params"]["value"]=@$data["useragent"];
//	Begin Add validation
$arrValidate = array();	

$control_useragent["params"]["validate"]=$arrValidate;
//	End Add validation
$control_useragent["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_useragent["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_useragent["params"]["mode"]="inline_edit";
else
	$control_useragent["params"]["mode"]="edit";
if(!$detailKeys || !in_array("useragent", $detailKeys))	
	$xt->assign("useragent_editcontrol",$control_useragent);
else if(array_key_exists("useragent",$data))
{
				$value = ProcessLargeText(GetData($data,"useragent", ""),"field=useragent","",MODE_VIEW);
		$xt->assign("useragent_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - gateway
$control_gateway=array();
$control_gateway["func"]="xt_buildeditcontrol";
$control_gateway["params"] = array();
$control_gateway["params"]["field"]="gateway";
$control_gateway["params"]["value"]=@$data["gateway"];
//	Begin Add validation
$arrValidate = array();	

$control_gateway["params"]["validate"]=$arrValidate;
//	End Add validation
$control_gateway["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_gateway["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_gateway["params"]["mode"]="inline_edit";
else
	$control_gateway["params"]["mode"]="edit";
if(!$detailKeys || !in_array("gateway", $detailKeys))	
	$xt->assign("gateway_editcontrol",$control_gateway);
else if(array_key_exists("gateway",$data))
{
				$value = ProcessLargeText(GetData($data,"gateway", ""),"field=gateway","",MODE_VIEW);
		$xt->assign("gateway_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_horario
$control_id_horario=array();
$control_id_horario["func"]="xt_buildeditcontrol";
$control_id_horario["params"] = array();
$control_id_horario["params"]["field"]="id_horario";
$control_id_horario["params"]["value"]=@$data["id_horario"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_id_horario["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_horario["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_horario["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_horario["params"]["mode"]="inline_edit";
else
	$control_id_horario["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_horario", $detailKeys))	
	$xt->assign("id_horario_editcontrol",$control_id_horario);
else if(array_key_exists("id_horario",$data))
{
				$value = ProcessLargeText(GetData($data,"id_horario", ""),"field=id%5Fhorario","",MODE_VIEW);
		$xt->assign("id_horario_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - mail
$control_mail=array();
$control_mail["func"]="xt_buildeditcontrol";
$control_mail["params"] = array();
$control_mail["params"]["field"]="mail";
$control_mail["params"]["value"]=@$data["mail"];
//	Begin Add validation
$arrValidate = array();	

$control_mail["params"]["validate"]=$arrValidate;
//	End Add validation
$control_mail["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_mail["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_mail["params"]["mode"]="inline_edit";
else
	$control_mail["params"]["mode"]="edit";
if(!$detailKeys || !in_array("mail", $detailKeys))	
	$xt->assign("mail_editcontrol",$control_mail);
else if(array_key_exists("mail",$data))
{
				$value = ProcessLargeText(GetData($data,"mail", ""),"field=mail","",MODE_VIEW);
		$xt->assign("mail_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - grava_chamada
$control_grava_chamada=array();
$control_grava_chamada["func"]="xt_buildeditcontrol";
$control_grava_chamada["params"] = array();
$control_grava_chamada["params"]["field"]="grava_chamada";
$control_grava_chamada["params"]["value"]=@$data["grava_chamada"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_grava_chamada["params"]["validate"]=$arrValidate;
//	End Add validation
$control_grava_chamada["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_grava_chamada["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_grava_chamada["params"]["mode"]="inline_edit";
else
	$control_grava_chamada["params"]["mode"]="edit";
if(!$detailKeys || !in_array("grava_chamada", $detailKeys))	
	$xt->assign("grava_chamada_editcontrol",$control_grava_chamada);
else if(array_key_exists("grava_chamada",$data))
{
				$value = ProcessLargeText(GetData($data,"grava_chamada", ""),"field=grava%5Fchamada","",MODE_VIEW);
		$xt->assign("grava_chamada_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - tp_ramal
$control_tp_ramal=array();
$control_tp_ramal["func"]="xt_buildeditcontrol";
$control_tp_ramal["params"] = array();
$control_tp_ramal["params"]["field"]="tp_ramal";
$control_tp_ramal["params"]["value"]=@$data["tp_ramal"];
//	Begin Add validation
$arrValidate = array();	

$control_tp_ramal["params"]["validate"]=$arrValidate;
//	End Add validation
$control_tp_ramal["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_tp_ramal["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_tp_ramal["params"]["mode"]="inline_edit";
else
	$control_tp_ramal["params"]["mode"]="edit";
if(!$detailKeys || !in_array("tp_ramal", $detailKeys))	
	$xt->assign("tp_ramal_editcontrol",$control_tp_ramal);
else if(array_key_exists("tp_ramal",$data))
{
				$value = ProcessLargeText(GetData($data,"tp_ramal", ""),"field=tp%5Framal","",MODE_VIEW);
		$xt->assign("tp_ramal_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - Transbordo
$control_Transbordo=array();
$control_Transbordo["func"]="xt_buildeditcontrol";
$control_Transbordo["params"] = array();
$control_Transbordo["params"]["field"]="Transbordo";
$control_Transbordo["params"]["value"]=@$data["Transbordo"];
//	Begin Add validation
$arrValidate = array();	

$control_Transbordo["params"]["validate"]=$arrValidate;
//	End Add validation
$control_Transbordo["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_Transbordo["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_Transbordo["params"]["mode"]="inline_edit";
else
	$control_Transbordo["params"]["mode"]="edit";
if(!$detailKeys || !in_array("Transbordo", $detailKeys))	
	$xt->assign("Transbordo_editcontrol",$control_Transbordo);
else if(array_key_exists("Transbordo",$data))
{
				$value = ProcessLargeText(GetData($data,"Transbordo", ""),"field=Transbordo","",MODE_VIEW);
		$xt->assign("Transbordo_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_interf
$control_id_interf=array();
$control_id_interf["func"]="xt_buildeditcontrol";
$control_id_interf["params"] = array();
$control_id_interf["params"]["field"]="id_interf";
$control_id_interf["params"]["value"]=@$data["id_interf"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_id_interf["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_interf["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_interf["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_interf["params"]["mode"]="inline_edit";
else
	$control_id_interf["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_interf", $detailKeys))	
	$xt->assign("id_interf_editcontrol",$control_id_interf);
else if(array_key_exists("id_interf",$data))
{
				$value = ProcessLargeText(GetData($data,"id_interf", ""),"field=id%5Finterf","",MODE_VIEW);
		$xt->assign("id_interf_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - ident_interf
$control_ident_interf=array();
$control_ident_interf["func"]="xt_buildeditcontrol";
$control_ident_interf["params"] = array();
$control_ident_interf["params"]["field"]="ident_interf";
$control_ident_interf["params"]["value"]=@$data["ident_interf"];
//	Begin Add validation
$arrValidate = array();	

$control_ident_interf["params"]["validate"]=$arrValidate;
//	End Add validation
$control_ident_interf["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_ident_interf["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_ident_interf["params"]["mode"]="inline_edit";
else
	$control_ident_interf["params"]["mode"]="edit";
if(!$detailKeys || !in_array("ident_interf", $detailKeys))	
	$xt->assign("ident_interf_editcontrol",$control_ident_interf);
else if(array_key_exists("ident_interf",$data))
{
				$value = ProcessLargeText(GetData($data,"ident_interf", ""),"field=ident%5Finterf","",MODE_VIEW);
		$xt->assign("ident_interf_editcontrol",$value);
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
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


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
//	control - flg_cadeado
$control_flg_cadeado=array();
$control_flg_cadeado["func"]="xt_buildeditcontrol";
$control_flg_cadeado["params"] = array();
$control_flg_cadeado["params"]["field"]="flg_cadeado";
$control_flg_cadeado["params"]["value"]=@$data["flg_cadeado"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_flg_cadeado["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_cadeado["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_cadeado["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_cadeado["params"]["mode"]="inline_edit";
else
	$control_flg_cadeado["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_cadeado", $detailKeys))	
	$xt->assign("flg_cadeado_editcontrol",$control_flg_cadeado);
else if(array_key_exists("flg_cadeado",$data))
{
				$value = ProcessLargeText(GetData($data,"flg_cadeado", ""),"field=flg%5Fcadeado","",MODE_VIEW);
		$xt->assign("flg_cadeado_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - desvio
$control_desvio=array();
$control_desvio["func"]="xt_buildeditcontrol";
$control_desvio["params"] = array();
$control_desvio["params"]["field"]="desvio";
$control_desvio["params"]["value"]=@$data["desvio"];
//	Begin Add validation
$arrValidate = array();	

$control_desvio["params"]["validate"]=$arrValidate;
//	End Add validation
$control_desvio["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_desvio["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_desvio["params"]["mode"]="inline_edit";
else
	$control_desvio["params"]["mode"]="edit";
if(!$detailKeys || !in_array("desvio", $detailKeys))	
	$xt->assign("desvio_editcontrol",$control_desvio);
else if(array_key_exists("desvio",$data))
{
				$value = ProcessLargeText(GetData($data,"desvio", ""),"field=desvio","",MODE_VIEW);
		$xt->assign("desvio_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_pesquisa
$control_id_pesquisa=array();
$control_id_pesquisa["func"]="xt_buildeditcontrol";
$control_id_pesquisa["params"] = array();
$control_id_pesquisa["params"]["field"]="id_pesquisa";
$control_id_pesquisa["params"]["value"]=@$data["id_pesquisa"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_id_pesquisa["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_pesquisa["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_pesquisa["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_pesquisa["params"]["mode"]="inline_edit";
else
	$control_id_pesquisa["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_pesquisa", $detailKeys))	
	$xt->assign("id_pesquisa_editcontrol",$control_id_pesquisa);
else if(array_key_exists("id_pesquisa",$data))
{
				$value = ProcessLargeText(GetData($data,"id_pesquisa", ""),"field=id%5Fpesquisa","",MODE_VIEW);
		$xt->assign("id_pesquisa_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - desvio_ddr
$control_desvio_ddr=array();
$control_desvio_ddr["func"]="xt_buildeditcontrol";
$control_desvio_ddr["params"] = array();
$control_desvio_ddr["params"]["field"]="desvio_ddr";
$control_desvio_ddr["params"]["value"]=@$data["desvio_ddr"];
//	Begin Add validation
$arrValidate = array();	
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


$control_desvio_ddr["params"]["validate"]=$arrValidate;
//	End Add validation
$control_desvio_ddr["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_desvio_ddr["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_desvio_ddr["params"]["mode"]="inline_edit";
else
	$control_desvio_ddr["params"]["mode"]="edit";
if(!$detailKeys || !in_array("desvio_ddr", $detailKeys))	
	$xt->assign("desvio_ddr_editcontrol",$control_desvio_ddr);
else if(array_key_exists("desvio_ddr",$data))
{
				$value = ProcessLargeText(GetData($data,"desvio_ddr", ""),"field=desvio%5Fddr","",MODE_VIEW);
		$xt->assign("desvio_ddr_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_saida
$control_id_saida=array();
$control_id_saida["func"]="xt_buildeditcontrol";
$control_id_saida["params"] = array();
$control_id_saida["params"]["field"]="id_saida";
$control_id_saida["params"]["value"]=@$data["id_saida"];
//	Begin Add validation
$arrValidate = array();	

$control_id_saida["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_saida["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_saida["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_saida["params"]["mode"]="inline_edit";
else
	$control_id_saida["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_saida", $detailKeys))	
	$xt->assign("id_saida_editcontrol",$control_id_saida);
else if(array_key_exists("id_saida",$data))
{
				$value = ProcessLargeText(GetData($data,"id_saida", ""),"field=id%5Fsaida","",MODE_VIEW);
		$xt->assign("id_saida_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();


if($lockingObj && $enableCtrlsForEditing)
	$pageObject->AddJSCode("window.timeid".$id."=setInterval( function() {ConfirmLock('admin_users_edit.php','".jsreplace($strTableName)."','".$skeys."',".$id.",'".$inlineedit."');},".($lockingObj->ConfirmTime*1000).");");

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
			$strTableName = "admin_users";		
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
	$strTableName = "admin_users";		
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
