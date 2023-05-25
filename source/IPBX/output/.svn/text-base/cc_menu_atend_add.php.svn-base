<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/cc_menu_atend_variables.php");
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
	$templatefile = "cc_menu_atend_inline_add.htm";
else
	$templatefile = "cc_menu_atend_add.htm";

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
	$mKeys["cc_menu_atend_item"] = GetMasterKeysByDetailTable("cc_menu_atend_item", $strTableName);
	$dpParams['strTableNames'][] = "cc_menu_atend_item";
	$dpParams['ids'][] = ++$ids;
	if($inlineadd==ADD_SIMPLE)
	{
		$pageObject->AddJSCode("window.dpObj = new dpInlineOnAddEdit({
			'mTableName':'".jsreplace($strTableName)."',
			'mShortTableName':'cc_menu_atend', 
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
//	processing dsc_menu - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dsc_menu_".$id);
	$type=postvalue("type_dsc_menu_".$id);
	if (FieldSubmitted("dsc_menu_".$id))
	{
		$value=prepare_for_db("dsc_menu",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dsc_menu"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dsc_menu"]=$value;
	}
	}
//	processibng dsc_menu - end
//	processing nm_tentativas - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_nm_tentativas_".$id);
	$type=postvalue("type_nm_tentativas_".$id);
	if (FieldSubmitted("nm_tentativas_".$id))
	{
		$value=prepare_for_db("nm_tentativas",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "nm_tentativas"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["nm_tentativas"]=$value;
	}
	}
//	processibng nm_tentativas - end
//	processing ramal_acesso - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_ramal_acesso_".$id);
	$type=postvalue("type_ramal_acesso_".$id);
	if (FieldSubmitted("ramal_acesso_".$id))
	{
		$value=prepare_for_db("ramal_acesso",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ramal_acesso"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ramal_acesso"]=$value;
	}
	}
//	processibng ramal_acesso - end
//	processing destino - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_destino_".$id);
	$type=postvalue("type_destino_".$id);
	if (FieldSubmitted("destino_".$id))
	{
		$value=prepare_for_db("destino",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "destino"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["destino"]=$value;
	}
	}
//	processibng destino - end
//	processing flg_dig_ramal - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_dig_ramal_".$id);
	$type=postvalue("type_flg_dig_ramal_".$id);
	if (FieldSubmitted("flg_dig_ramal_".$id))
	{
		$value=prepare_for_db("flg_dig_ramal",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_dig_ramal"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_dig_ramal"]=$value;
	}
	}
//	processibng flg_dig_ramal - end
//	processing arq_audio - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_arq_audio_".$id);
	$type=postvalue("type_arq_audio_".$id);
	if (FieldSubmitted("arq_audio_".$id))
	{
	$fileNameForPrepareFunc = postvalue("filename_arq_audio_".$id);
			$value=prepare_upload("arq_audio","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id);
			
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "arq_audio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["arq_audio"]=$value;
	}
	}
//	processibng arq_audio - end
//	processing id_fluxo - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_fluxo_".$id);
	$type=postvalue("type_id_fluxo_".$id);
	if (FieldSubmitted("id_fluxo_".$id))
	{
		$value=prepare_for_db("id_fluxo",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_fluxo"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_fluxo"]=$value;
	}
	}
//	processibng id_fluxo - end



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
					$message .='&nbsp;<a href=\'cc_menu_atend_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'cc_menu_atend_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: cc_menu_atend_".$pageObject->getPageType().".php");
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
		$copykeys["id_menu"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["id_menu"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id_menu"]="";
//call CopyOnLoad event
	if(function_exists("CopyOnLoad"))
		CopyOnLoad($defvalues,$strWhere);
}
else
{
}

if($readavalues)
{
	$defvalues["dsc_menu"]=@$avalues["dsc_menu"];
	$defvalues["ramal_acesso"]=@$avalues["ramal_acesso"];
	$defvalues["flg_dig_ramal"]=@$avalues["flg_dig_ramal"];
	$defvalues["nm_tentativas"]=@$avalues["nm_tentativas"];
	$defvalues["destino"]=@$avalues["destino"];
	$defvalues["id_fluxo"]=@$avalues["id_fluxo"];
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
	$xt->assign("dsc_menu_fieldblock",true);
	$xt->assign("dsc_menu_label",true);
	if(isEnableSection508())
		$xt->assign_section("dsc_menu_label","<label for=\"".GetInputElementId("dsc_menu", $id)."\">","</label>");
	$xt->assign("ramal_acesso_fieldblock",true);
	$xt->assign("ramal_acesso_label",true);
	if(isEnableSection508())
		$xt->assign_section("ramal_acesso_label","<label for=\"".GetInputElementId("ramal_acesso", $id)."\">","</label>");
	$xt->assign("arq_audio_fieldblock",true);
	$xt->assign("arq_audio_label",true);
	if(isEnableSection508())
		$xt->assign_section("arq_audio_label","<label for=\"".GetInputElementId("arq_audio", $id)."\">","</label>");
	$xt->assign("flg_dig_ramal_fieldblock",true);
	$xt->assign("flg_dig_ramal_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_dig_ramal_label","<label for=\"".GetInputElementId("flg_dig_ramal", $id)."\">","</label>");
	$xt->assign("nm_tentativas_fieldblock",true);
	$xt->assign("nm_tentativas_label",true);
	if(isEnableSection508())
		$xt->assign_section("nm_tentativas_label","<label for=\"".GetInputElementId("nm_tentativas", $id)."\">","</label>");
	$xt->assign("destino_fieldblock",true);
	$xt->assign("destino_label",true);
	if(isEnableSection508())
		$xt->assign_section("destino_label","<label for=\"".GetInputElementId("destino", $id)."\">","</label>");
	$xt->assign("id_fluxo_fieldblock",true);
	$xt->assign("id_fluxo_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_fluxo_label","<label for=\"".GetInputElementId("id_fluxo", $id)."\">","</label>");
	
	
	if($inlineadd!=ADD_ONTHEFLY)
	{
		if($onsubmit)
			$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit)."\"";
		
		$pageObject->body["begin"] .= $includes;
		if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='cc_menu_atend_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="cc_menu_atend_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="cc_menu_atend_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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
	$masterquery="mastertable=cc%5Fmenu%5Fatend";
	$masterquery.="&masterkey1=".rawurlencode($data["id_menu"]);
	$showDetailKeys["cc_menu_atend_item"]=$masterquery;

	$showKeys[] = htmlspecialchars($keys["id_menu"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_menu"]));

	

	
	
////////////////////////////////////////////
//	dsc_menu - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dsc_menu", ""),"field=dsc%5Fmenu".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dsc_menu";
				$showRawValues[] = substr($data["dsc_menu"],0,100);
	}	
//	ramal_acesso - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("ramal_acesso",$data["ramal_acesso"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ramal_acesso";
				$showRawValues[] = substr($data["ramal_acesso"],0,100);
	}	
//	arq_audio - Document Download
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"arq_audio", "Document Download");
		$showValues[] = $value;
		$showFields[] = "arq_audio";
				$showRawValues[] = substr($data["arq_audio"],0,100);
	}	
//	flg_dig_ramal - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"flg_dig_ramal", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "flg_dig_ramal";
				$showRawValues[] = substr($data["flg_dig_ramal"],0,100);
	}	
//	nm_tentativas - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"nm_tentativas", ""),"field=nm%5Ftentativas".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "nm_tentativas";
				$showRawValues[] = substr($data["nm_tentativas"],0,100);
	}	
//	destino - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"destino", ""),"field=destino".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "destino";
				$showRawValues[] = substr($data["destino"],0,100);
	}	
//	id_fluxo - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("id_fluxo",$data["id_fluxo"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_fluxo";
				$showRawValues[] = substr($data["id_fluxo"],0,100);
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
//	control - dsc_menu
$control_dsc_menu=array();
$control_dsc_menu["func"]="xt_buildeditcontrol";
$control_dsc_menu["params"] = array();
$control_dsc_menu["params"]["field"]="dsc_menu";
$control_dsc_menu["params"]["value"]=@$defvalues["dsc_menu"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_dsc_menu["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dsc_menu["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dsc_menu["params"]["mode"]="inline_add";
else
	$control_dsc_menu["params"]["mode"]="add";

if(!$detailKeys || !in_array("dsc_menu", $detailKeys))
	$xt->assignbyref("dsc_menu_editcontrol",$control_dsc_menu);
else if(array_key_exists("dsc_menu", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dsc_menu", ""),"field=dsc%5Fmenu","",MODE_VIEW);
		$xt->assign("dsc_menu_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ramal_acesso
$control_ramal_acesso=array();
$control_ramal_acesso["func"]="xt_buildeditcontrol";
$control_ramal_acesso["params"] = array();
$control_ramal_acesso["params"]["field"]="ramal_acesso";
$control_ramal_acesso["params"]["value"]=@$defvalues["ramal_acesso"];

//	Begin Add validation
$arrValidate = array();	
$control_ramal_acesso["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ramal_acesso["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ramal_acesso["params"]["mode"]="inline_add";
else
	$control_ramal_acesso["params"]["mode"]="add";

if(!$detailKeys || !in_array("ramal_acesso", $detailKeys))
	$xt->assignbyref("ramal_acesso_editcontrol",$control_ramal_acesso);
else if(array_key_exists("ramal_acesso", $defvalues))
{
				$value=DisplayLookupWizard("ramal_acesso",$defvalues["ramal_acesso"],$defvalues,"",MODE_VIEW);
		$xt->assign("ramal_acesso_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - arq_audio
$control_arq_audio=array();
$control_arq_audio["func"]="xt_buildeditcontrol";
$control_arq_audio["params"] = array();
$control_arq_audio["params"]["field"]="arq_audio";
$control_arq_audio["params"]["value"]=@$defvalues["arq_audio"];

//	Begin Add validation
$arrValidate = array();	
$control_arq_audio["params"]["validate"]=$arrValidate;
//	End Add validation

$control_arq_audio["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_arq_audio["params"]["mode"]="inline_add";
else
	$control_arq_audio["params"]["mode"]="add";

if(!$detailKeys || !in_array("arq_audio", $detailKeys))
	$xt->assignbyref("arq_audio_editcontrol",$control_arq_audio);
else if(array_key_exists("arq_audio", $defvalues))
{
				$value = GetData($defvalues,"arq_audio", "Document Download");
		$xt->assign("arq_audio_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_dig_ramal
$control_flg_dig_ramal=array();
$control_flg_dig_ramal["func"]="xt_buildeditcontrol";
$control_flg_dig_ramal["params"] = array();
$control_flg_dig_ramal["params"]["field"]="flg_dig_ramal";
$control_flg_dig_ramal["params"]["value"]=@$defvalues["flg_dig_ramal"];

//	Begin Add validation
$arrValidate = array();	
$control_flg_dig_ramal["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_dig_ramal["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_dig_ramal["params"]["mode"]="inline_add";
else
	$control_flg_dig_ramal["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_dig_ramal", $detailKeys))
	$xt->assignbyref("flg_dig_ramal_editcontrol",$control_flg_dig_ramal);
else if(array_key_exists("flg_dig_ramal", $defvalues))
{
				$value = GetData($defvalues,"flg_dig_ramal", "Checkbox");
		$xt->assign("flg_dig_ramal_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - nm_tentativas
$control_nm_tentativas=array();
$control_nm_tentativas["func"]="xt_buildeditcontrol";
$control_nm_tentativas["params"] = array();
$control_nm_tentativas["params"]["field"]="nm_tentativas";
$control_nm_tentativas["params"]["value"]=@$defvalues["nm_tentativas"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_nm_tentativas["params"]["validate"]=$arrValidate;
//	End Add validation

$control_nm_tentativas["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_nm_tentativas["params"]["mode"]="inline_add";
else
	$control_nm_tentativas["params"]["mode"]="add";

if(!$detailKeys || !in_array("nm_tentativas", $detailKeys))
	$xt->assignbyref("nm_tentativas_editcontrol",$control_nm_tentativas);
else if(array_key_exists("nm_tentativas", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"nm_tentativas", ""),"field=nm%5Ftentativas","",MODE_VIEW);
		$xt->assign("nm_tentativas_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - destino
$control_destino=array();
$control_destino["func"]="xt_buildeditcontrol";
$control_destino["params"] = array();
$control_destino["params"]["field"]="destino";
$control_destino["params"]["value"]=@$defvalues["destino"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_destino["params"]["validate"]=$arrValidate;
//	End Add validation

$control_destino["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_destino["params"]["mode"]="inline_add";
else
	$control_destino["params"]["mode"]="add";

if(!$detailKeys || !in_array("destino", $detailKeys))
	$xt->assignbyref("destino_editcontrol",$control_destino);
else if(array_key_exists("destino", $defvalues))
{
				$value=DisplayLookupWizard("destino",$defvalues["destino"],$defvalues,"",MODE_VIEW);
		$xt->assign("destino_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - id_fluxo
$control_id_fluxo=array();
$control_id_fluxo["func"]="xt_buildeditcontrol";
$control_id_fluxo["params"] = array();
$control_id_fluxo["params"]["field"]="id_fluxo";
$control_id_fluxo["params"]["value"]=@$defvalues["id_fluxo"];

//	Begin Add validation
$arrValidate = array();	
$control_id_fluxo["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_fluxo["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_fluxo["params"]["mode"]="inline_add";
else
	$control_id_fluxo["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_fluxo", $detailKeys))
	$xt->assignbyref("id_fluxo_editcontrol",$control_id_fluxo);
else if(array_key_exists("id_fluxo", $defvalues))
{
				$value=DisplayLookupWizard("id_fluxo",$defvalues["id_fluxo"],$defvalues,"",MODE_VIEW);
		$xt->assign("id_fluxo_editcontrol",$value);
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
	$strTableName = "cc_menu_atend";
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
