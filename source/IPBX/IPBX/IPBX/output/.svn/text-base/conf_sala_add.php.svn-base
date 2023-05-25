<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/conf_sala_variables.php");
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
	$templatefile = "conf_sala_inline_add.htm";
else
	$templatefile = "conf_sala_add.htm";

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

$params["calendar"] = true;
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
	$mKeys["conf_sala_convidado"] = GetMasterKeysByDetailTable("conf_sala_convidado", $strTableName);
	$dpParams['strTableNames'][] = "conf_sala_convidado";
	$dpParams['ids'][] = ++$ids;
	if($inlineadd==ADD_SIMPLE)
	{
		$pageObject->AddJSCode("window.dpObj = new dpInlineOnAddEdit({
			'mTableName':'".jsreplace($strTableName)."',
			'mShortTableName':'conf_sala', 
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
//	processing dsc_sala - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dsc_sala_".$id);
	$type=postvalue("type_dsc_sala_".$id);
	if (FieldSubmitted("dsc_sala_".$id))
	{
		$value=prepare_for_db("dsc_sala",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dsc_sala"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dsc_sala"]=$value;
	}
	}
//	processibng dsc_sala - end
//	processing nm_sala - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_nm_sala_".$id);
	$type=postvalue("type_nm_sala_".$id);
	if (FieldSubmitted("nm_sala_".$id))
	{
		$value=prepare_for_db("nm_sala",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "nm_sala"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["nm_sala"]=$value;
	}
	}
//	processibng nm_sala - end
//	processing dt_conferencia - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dt_conferencia_".$id);
	$type=postvalue("type_dt_conferencia_".$id);
	if (FieldSubmitted("dt_conferencia_".$id))
	{
		$value=prepare_for_db("dt_conferencia",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dt_conferencia"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dt_conferencia"]=$value;
	}
	}
//	processibng dt_conferencia - end
//	processing hr_inicio - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_hr_inicio_".$id);
	$type=postvalue("type_hr_inicio_".$id);
	if (FieldSubmitted("hr_inicio_".$id))
	{
		$value=prepare_for_db("hr_inicio",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "hr_inicio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["hr_inicio"]=$value;
	}
	}
//	processibng hr_inicio - end
//	processing dt_expiracao - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dt_expiracao_".$id);
	$type=postvalue("type_dt_expiracao_".$id);
	if (FieldSubmitted("dt_expiracao_".$id))
	{
		$value=prepare_for_db("dt_expiracao",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dt_expiracao"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dt_expiracao"]=$value;
	}
	}
//	processibng dt_expiracao - end
//	processing hr_fim - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_hr_fim_".$id);
	$type=postvalue("type_hr_fim_".$id);
	if (FieldSubmitted("hr_fim_".$id))
	{
		$value=prepare_for_db("hr_fim",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "hr_fim"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["hr_fim"]=$value;
	}
	}
//	processibng hr_fim - end
//	processing flg_rec - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_rec_".$id);
	$type=postvalue("type_flg_rec_".$id);
	if (FieldSubmitted("flg_rec_".$id))
	{
		$value=prepare_for_db("flg_rec",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_rec"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_rec"]=$value;
	}
	}
//	processibng flg_rec - end
//	processing flg_pass - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_pass_".$id);
	$type=postvalue("type_flg_pass_".$id);
	if (FieldSubmitted("flg_pass_".$id))
	{
		$value=prepare_for_db("flg_pass",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_pass"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_pass"]=$value;
	}
	}
//	processibng flg_pass - end



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
					$message .='&nbsp;<a href=\'conf_sala_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'conf_sala_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: conf_sala_".$pageObject->getPageType().".php");
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
		$copykeys["id_conf"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["id_conf"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id_conf"]="";
//call CopyOnLoad event
	if(function_exists("CopyOnLoad"))
		CopyOnLoad($defvalues,$strWhere);
}
else
{
}

if($readavalues)
{
	$defvalues["nm_sala"]=@$avalues["nm_sala"];
	$defvalues["dsc_sala"]=@$avalues["dsc_sala"];
	$defvalues["dt_conferencia"]=@$avalues["dt_conferencia"];
	$defvalues["flg_pass"]=@$avalues["flg_pass"];
	$defvalues["flg_rec"]=@$avalues["flg_rec"];
	$defvalues["hr_inicio"]=@$avalues["hr_inicio"];
	$defvalues["hr_fim"]=@$avalues["hr_fim"];
	$defvalues["dt_expiracao"]=@$avalues["dt_expiracao"];
}
//for basic files
$includes="";
if ($inlineadd!==ADD_INLINE && $inlineadd!=ADD_ONTHEFLY)
	$pageObject->addJSCode("AddEventForControl('".jsreplace($strTableName)."', '', ".$id.");\r\n");

		
	
$onsubmit = $pageObject->onSubmitForEditingPage($formname,$inlineadd);
	

//////////////////////////////////////////////////////////////////	
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
	$xt->assign("nm_sala_fieldblock",true);
	$xt->assign("nm_sala_label",true);
	if(isEnableSection508())
		$xt->assign_section("nm_sala_label","<label for=\"".GetInputElementId("nm_sala", $id)."\">","</label>");
	$xt->assign("dsc_sala_fieldblock",true);
	$xt->assign("dsc_sala_label",true);
	if(isEnableSection508())
		$xt->assign_section("dsc_sala_label","<label for=\"".GetInputElementId("dsc_sala", $id)."\">","</label>");
	$xt->assign("dt_conferencia_fieldblock",true);
	$xt->assign("dt_conferencia_label",true);
	if(isEnableSection508())
		$xt->assign_section("dt_conferencia_label","<label for=\"".GetInputElementId("dt_conferencia", $id)."\">","</label>");
	$xt->assign("flg_pass_fieldblock",true);
	$xt->assign("flg_pass_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_pass_label","<label for=\"".GetInputElementId("flg_pass", $id)."\">","</label>");
	$xt->assign("flg_rec_fieldblock",true);
	$xt->assign("flg_rec_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_rec_label","<label for=\"".GetInputElementId("flg_rec", $id)."\">","</label>");
	$xt->assign("hr_inicio_fieldblock",true);
	$xt->assign("hr_inicio_label",true);
	if(isEnableSection508())
		$xt->assign_section("hr_inicio_label","<label for=\"".GetInputElementId("hr_inicio", $id)."\">","</label>");
	$xt->assign("hr_fim_fieldblock",true);
	$xt->assign("hr_fim_label",true);
	if(isEnableSection508())
		$xt->assign_section("hr_fim_label","<label for=\"".GetInputElementId("hr_fim", $id)."\">","</label>");
	$xt->assign("dt_expiracao_fieldblock",true);
	$xt->assign("dt_expiracao_label",true);
	if(isEnableSection508())
		$xt->assign_section("dt_expiracao_label","<label for=\"".GetInputElementId("dt_expiracao", $id)."\">","</label>");
	
	
	if($inlineadd!=ADD_ONTHEFLY)
	{
		if($onsubmit)
			$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit)."\"";
		
		$pageObject->body["begin"] .= $includes;
		if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='conf_sala_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="conf_sala_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="conf_sala_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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
	$masterquery="mastertable=conf%5Fsala";
	$masterquery.="&masterkey1=".rawurlencode($data["id_conf"]);
	$showDetailKeys["conf_sala_convidado"]=$masterquery;

	$showKeys[] = htmlspecialchars($keys["id_conf"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_conf"]));

	

	
	
////////////////////////////////////////////
//	id_conf - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"id_conf", ""),"field=id%5Fconf".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_conf";
				$showRawValues[] = substr($data["id_conf"],0,100);
	}	
//	nm_sala - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"nm_sala", ""),"field=nm%5Fsala".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "nm_sala";
				$showRawValues[] = substr($data["nm_sala"],0,100);
	}	
//	dsc_sala - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dsc_sala", ""),"field=dsc%5Fsala".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dsc_sala";
				$showRawValues[] = substr($data["dsc_sala"],0,100);
	}	
//	dt_conferencia - Short Date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dt_conferencia", "Short Date"),"field=dt%5Fconferencia".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dt_conferencia";
				$showRawValues[] = substr($data["dt_conferencia"],0,100);
	}	
//	flg_pass - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"flg_pass", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "flg_pass";
				$showRawValues[] = substr($data["flg_pass"],0,100);
	}	
//	flg_rec - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"flg_rec", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "flg_rec";
				$showRawValues[] = substr($data["flg_rec"],0,100);
	}	
//	hr_inicio - Time
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"hr_inicio", "Time"),"field=hr%5Finicio".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "hr_inicio";
				$showRawValues[] = substr($data["hr_inicio"],0,100);
	}	
//	hr_fim - Time
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"hr_fim", "Time"),"field=hr%5Ffim".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "hr_fim";
				$showRawValues[] = substr($data["hr_fim"],0,100);
	}	
//	dt_expiracao - Short Date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dt_expiracao", "Short Date"),"field=dt%5Fexpiracao".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dt_expiracao";
				$showRawValues[] = substr($data["dt_expiracao"],0,100);
	}	
//	senha - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"senha", ""),"field=senha".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "senha";
				$showRawValues[] = substr($data["senha"],0,100);
	}	
//	Status - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"Status", ""),"field=Status".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "Status";
				$showRawValues[] = substr($data["Status"],0,100);
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
//	control - nm_sala
$control_nm_sala=array();
$control_nm_sala["func"]="xt_buildeditcontrol";
$control_nm_sala["params"] = array();
$control_nm_sala["params"]["field"]="nm_sala";
$control_nm_sala["params"]["value"]=@$defvalues["nm_sala"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_nm_sala["params"]["validate"]=$arrValidate;
//	End Add validation

$control_nm_sala["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_nm_sala["params"]["mode"]="inline_add";
else
	$control_nm_sala["params"]["mode"]="add";

if(!$detailKeys || !in_array("nm_sala", $detailKeys))
	$xt->assignbyref("nm_sala_editcontrol",$control_nm_sala);
else if(array_key_exists("nm_sala", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"nm_sala", ""),"field=nm%5Fsala","",MODE_VIEW);
		$xt->assign("nm_sala_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - dsc_sala
$control_dsc_sala=array();
$control_dsc_sala["func"]="xt_buildeditcontrol";
$control_dsc_sala["params"] = array();
$control_dsc_sala["params"]["field"]="dsc_sala";
$control_dsc_sala["params"]["value"]=@$defvalues["dsc_sala"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_dsc_sala["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dsc_sala["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dsc_sala["params"]["mode"]="inline_add";
else
	$control_dsc_sala["params"]["mode"]="add";

if(!$detailKeys || !in_array("dsc_sala", $detailKeys))
	$xt->assignbyref("dsc_sala_editcontrol",$control_dsc_sala);
else if(array_key_exists("dsc_sala", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dsc_sala", ""),"field=dsc%5Fsala","",MODE_VIEW);
		$xt->assign("dsc_sala_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - dt_conferencia
$control_dt_conferencia=array();
$control_dt_conferencia["func"]="xt_buildeditcontrol";
$control_dt_conferencia["params"] = array();
$control_dt_conferencia["params"]["field"]="dt_conferencia";
$control_dt_conferencia["params"]["value"]=@$defvalues["dt_conferencia"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_dt_conferencia["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dt_conferencia["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dt_conferencia["params"]["mode"]="inline_add";
else
	$control_dt_conferencia["params"]["mode"]="add";

if(!$detailKeys || !in_array("dt_conferencia", $detailKeys))
	$xt->assignbyref("dt_conferencia_editcontrol",$control_dt_conferencia);
else if(array_key_exists("dt_conferencia", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dt_conferencia", "Short Date"),"field=dt%5Fconferencia","",MODE_VIEW);
		$xt->assign("dt_conferencia_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_pass
$control_flg_pass=array();
$control_flg_pass["func"]="xt_buildeditcontrol";
$control_flg_pass["params"] = array();
$control_flg_pass["params"]["field"]="flg_pass";
$control_flg_pass["params"]["value"]=@$defvalues["flg_pass"];

//	Begin Add validation
$arrValidate = array();	
$control_flg_pass["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_pass["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_pass["params"]["mode"]="inline_add";
else
	$control_flg_pass["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_pass", $detailKeys))
	$xt->assignbyref("flg_pass_editcontrol",$control_flg_pass);
else if(array_key_exists("flg_pass", $defvalues))
{
				$value = GetData($defvalues,"flg_pass", "Checkbox");
		$xt->assign("flg_pass_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_rec
$control_flg_rec=array();
$control_flg_rec["func"]="xt_buildeditcontrol";
$control_flg_rec["params"] = array();
$control_flg_rec["params"]["field"]="flg_rec";
$control_flg_rec["params"]["value"]=@$defvalues["flg_rec"];

//	Begin Add validation
$arrValidate = array();	
$control_flg_rec["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_rec["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_rec["params"]["mode"]="inline_add";
else
	$control_flg_rec["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_rec", $detailKeys))
	$xt->assignbyref("flg_rec_editcontrol",$control_flg_rec);
else if(array_key_exists("flg_rec", $defvalues))
{
				$value = GetData($defvalues,"flg_rec", "Checkbox");
		$xt->assign("flg_rec_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - hr_inicio
$control_hr_inicio=array();
$control_hr_inicio["func"]="xt_buildeditcontrol";
$control_hr_inicio["params"] = array();
$control_hr_inicio["params"]["field"]="hr_inicio";
$control_hr_inicio["params"]["value"]=@$defvalues["hr_inicio"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_hr_inicio["params"]["validate"]=$arrValidate;
//	End Add validation

$control_hr_inicio["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_hr_inicio["params"]["mode"]="inline_add";
else
	$control_hr_inicio["params"]["mode"]="add";

if(!$detailKeys || !in_array("hr_inicio", $detailKeys))
	$xt->assignbyref("hr_inicio_editcontrol",$control_hr_inicio);
else if(array_key_exists("hr_inicio", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"hr_inicio", "Time"),"field=hr%5Finicio","",MODE_VIEW);
		$xt->assign("hr_inicio_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - hr_fim
$control_hr_fim=array();
$control_hr_fim["func"]="xt_buildeditcontrol";
$control_hr_fim["params"] = array();
$control_hr_fim["params"]["field"]="hr_fim";
$control_hr_fim["params"]["value"]=@$defvalues["hr_fim"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Time");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_hr_fim["params"]["validate"]=$arrValidate;
//	End Add validation

$control_hr_fim["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_hr_fim["params"]["mode"]="inline_add";
else
	$control_hr_fim["params"]["mode"]="add";

if(!$detailKeys || !in_array("hr_fim", $detailKeys))
	$xt->assignbyref("hr_fim_editcontrol",$control_hr_fim);
else if(array_key_exists("hr_fim", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"hr_fim", "Time"),"field=hr%5Ffim","",MODE_VIEW);
		$xt->assign("hr_fim_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - dt_expiracao
$control_dt_expiracao=array();
$control_dt_expiracao["func"]="xt_buildeditcontrol";
$control_dt_expiracao["params"] = array();
$control_dt_expiracao["params"]["field"]="dt_expiracao";
$control_dt_expiracao["params"]["value"]=@$defvalues["dt_expiracao"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_dt_expiracao["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dt_expiracao["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dt_expiracao["params"]["mode"]="inline_add";
else
	$control_dt_expiracao["params"]["mode"]="add";

if(!$detailKeys || !in_array("dt_expiracao", $detailKeys))
	$xt->assignbyref("dt_expiracao_editcontrol",$control_dt_expiracao);
else if(array_key_exists("dt_expiracao", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dt_expiracao", "Short Date"),"field=dt%5Fexpiracao","",MODE_VIEW);
		$xt->assign("dt_expiracao_editcontrol",$value);
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
	$strTableName = "conf_sala";
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
