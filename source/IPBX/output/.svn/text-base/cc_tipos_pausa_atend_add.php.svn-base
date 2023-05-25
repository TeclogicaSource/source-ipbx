<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/cc_tipos_pausa_atend_variables.php");
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
	$templatefile = "cc_tipos_pausa_atend_inline_add.htm";
else
	$templatefile = "cc_tipos_pausa_atend_add.htm";

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
	if($inlineadd==ADD_SIMPLE)
	{
		$pageObject->AddJSCode("window.dpObj = new dpInlineOnAddEdit({
			'mTableName':'".jsreplace($strTableName)."',
			'mShortTableName':'cc_tipos_pausa_atend', 
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
//	processing dt_acao_pausa - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_dt_acao_pausa_".$id);
	$type=postvalue("type_dt_acao_pausa_".$id);
	if (FieldSubmitted("dt_acao_pausa_".$id))
	{
		$value=prepare_for_db("dt_acao_pausa",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dt_acao_pausa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dt_acao_pausa"]=$value;
	}
	}
//	processibng dt_acao_pausa - end
//	processing hr_acao_pausa - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_hr_acao_pausa_".$id);
	$type=postvalue("type_hr_acao_pausa_".$id);
	if (FieldSubmitted("hr_acao_pausa_".$id))
	{
		$value=prepare_for_db("hr_acao_pausa",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "hr_acao_pausa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["hr_acao_pausa"]=$value;
	}
	}
//	processibng hr_acao_pausa - end
//	processing tp_pausa - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_tp_pausa_".$id);
	$type=postvalue("type_tp_pausa_".$id);
	if (FieldSubmitted("tp_pausa_".$id))
	{
		$value=prepare_for_db("tp_pausa",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "tp_pausa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["tp_pausa"]=$value;
	}
	}
//	processibng tp_pausa - end
//	processing Agente - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_Agente_".$id);
	$type=postvalue("type_Agente_".$id);
	if (FieldSubmitted("Agente_".$id))
	{
		$value=prepare_for_db("Agente",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "Agente"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["Agente"]=$value;
	}
	}
//	processibng Agente - end
//	processing name - start
    
	$inlineAddOption = true;
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
//	processing Fila - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_Fila_".$id);
	$type=postvalue("type_Fila_".$id);
	if (FieldSubmitted("Fila_".$id))
	{
		$value=prepare_for_db("Fila",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "Fila"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["Fila"]=$value;
	}
	}
//	processibng Fila - end
//	processing tipo_pausa - start
    
	$inlineAddOption = true;
	if($inlineAddOption)
	{
	$value = postvalue("value_tipo_pausa_".$id);
	$type=postvalue("type_tipo_pausa_".$id);
	if (FieldSubmitted("tipo_pausa_".$id))
	{
		$value=prepare_for_db("tipo_pausa",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "tipo_pausa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["tipo_pausa"]=$value;
	}
	}
//	processibng tipo_pausa - end



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
					$message .='&nbsp;<a href=\'cc_tipos_pausa_atend_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'cc_tipos_pausa_atend_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: cc_tipos_pausa_atend_".$pageObject->getPageType().".php");
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
		$copykeys["idt_pausa_atend"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["idt_pausa_atend"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["idt_pausa_atend"]="";
//call CopyOnLoad event
	if(function_exists("CopyOnLoad"))
		CopyOnLoad($defvalues,$strWhere);
}
else
{
}

if($readavalues)
{
	$defvalues["dt_acao_pausa"]=@$avalues["dt_acao_pausa"];
	$defvalues["hr_acao_pausa"]=@$avalues["hr_acao_pausa"];
	$defvalues["tp_pausa"]=@$avalues["tp_pausa"];
	$defvalues["Agente"]=@$avalues["Agente"];
	$defvalues["name"]=@$avalues["name"];
	$defvalues["Fila"]=@$avalues["Fila"];
	$defvalues["tipo_pausa"]=@$avalues["tipo_pausa"];
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
	
	
	if($inlineadd!=ADD_ONTHEFLY)
	{
		if($onsubmit)
			$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit)."\"";
		
		$pageObject->body["begin"] .= $includes;
		if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='cc_tipos_pausa_atend_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="cc_tipos_pausa_atend_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="cc_tipos_pausa_atend_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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

	$showKeys[] = htmlspecialchars($keys["idt_pausa_atend"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["idt_pausa_atend"]));

	

	
	
////////////////////////////////////////////
//	idt_pausa_atend - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"idt_pausa_atend", ""),"field=idt%5Fpausa%5Fatend".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "idt_pausa_atend";
				$showRawValues[] = substr($data["idt_pausa_atend"],0,100);
	}	
//	dt_acao_pausa - Short Date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dt_acao_pausa", "Short Date"),"field=dt%5Facao%5Fpausa".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dt_acao_pausa";
				$showRawValues[] = substr($data["dt_acao_pausa"],0,100);
	}	
//	hr_acao_pausa - Time
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"hr_acao_pausa", "Time"),"field=hr%5Facao%5Fpausa".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "hr_acao_pausa";
				$showRawValues[] = substr($data["hr_acao_pausa"],0,100);
	}	
//	tp_pausa - Time
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"tp_pausa", "Time"),"field=tp%5Fpausa".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_pausa";
				$showRawValues[] = substr($data["tp_pausa"],0,100);
	}	
//	Agente - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"Agente", ""),"field=Agente".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "Agente";
				$showRawValues[] = substr($data["Agente"],0,100);
	}	
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
//	Fila - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"Fila", ""),"field=Fila".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "Fila";
				$showRawValues[] = substr($data["Fila"],0,100);
	}	
//	tipo_pausa - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"tipo_pausa", ""),"field=tipo%5Fpausa".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tipo_pausa";
				$showRawValues[] = substr($data["tipo_pausa"],0,100);
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
//	control - dt_acao_pausa
$control_dt_acao_pausa=array();
$control_dt_acao_pausa["func"]="xt_buildeditcontrol";
$control_dt_acao_pausa["params"] = array();
$control_dt_acao_pausa["params"]["field"]="dt_acao_pausa";
$control_dt_acao_pausa["params"]["value"]=@$defvalues["dt_acao_pausa"];

//	Begin Add validation
$arrValidate = array();	
$control_dt_acao_pausa["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dt_acao_pausa["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dt_acao_pausa["params"]["mode"]="inline_add";
else
	$control_dt_acao_pausa["params"]["mode"]="add";

if(!$detailKeys || !in_array("dt_acao_pausa", $detailKeys))
	$xt->assignbyref("dt_acao_pausa_editcontrol",$control_dt_acao_pausa);
else if(array_key_exists("dt_acao_pausa", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dt_acao_pausa", "Short Date"),"field=dt%5Facao%5Fpausa","",MODE_VIEW);
		$xt->assign("dt_acao_pausa_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - hr_acao_pausa
$control_hr_acao_pausa=array();
$control_hr_acao_pausa["func"]="xt_buildeditcontrol";
$control_hr_acao_pausa["params"] = array();
$control_hr_acao_pausa["params"]["field"]="hr_acao_pausa";
$control_hr_acao_pausa["params"]["value"]=@$defvalues["hr_acao_pausa"];

//	Begin Add validation
$arrValidate = array();	
$control_hr_acao_pausa["params"]["validate"]=$arrValidate;
//	End Add validation

$control_hr_acao_pausa["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_hr_acao_pausa["params"]["mode"]="inline_add";
else
	$control_hr_acao_pausa["params"]["mode"]="add";

if(!$detailKeys || !in_array("hr_acao_pausa", $detailKeys))
	$xt->assignbyref("hr_acao_pausa_editcontrol",$control_hr_acao_pausa);
else if(array_key_exists("hr_acao_pausa", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"hr_acao_pausa", "Time"),"field=hr%5Facao%5Fpausa","",MODE_VIEW);
		$xt->assign("hr_acao_pausa_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - tp_pausa
$control_tp_pausa=array();
$control_tp_pausa["func"]="xt_buildeditcontrol";
$control_tp_pausa["params"] = array();
$control_tp_pausa["params"]["field"]="tp_pausa";
$control_tp_pausa["params"]["value"]=@$defvalues["tp_pausa"];

//	Begin Add validation
$arrValidate = array();	
$control_tp_pausa["params"]["validate"]=$arrValidate;
//	End Add validation

$control_tp_pausa["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_tp_pausa["params"]["mode"]="inline_add";
else
	$control_tp_pausa["params"]["mode"]="add";

if(!$detailKeys || !in_array("tp_pausa", $detailKeys))
	$xt->assignbyref("tp_pausa_editcontrol",$control_tp_pausa);
else if(array_key_exists("tp_pausa", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"tp_pausa", "Time"),"field=tp%5Fpausa","",MODE_VIEW);
		$xt->assign("tp_pausa_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - Agente
$control_Agente=array();
$control_Agente["func"]="xt_buildeditcontrol";
$control_Agente["params"] = array();
$control_Agente["params"]["field"]="Agente";
$control_Agente["params"]["value"]=@$defvalues["Agente"];

//	Begin Add validation
$arrValidate = array();	
$control_Agente["params"]["validate"]=$arrValidate;
//	End Add validation

$control_Agente["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_Agente["params"]["mode"]="inline_add";
else
	$control_Agente["params"]["mode"]="add";

if(!$detailKeys || !in_array("Agente", $detailKeys))
	$xt->assignbyref("Agente_editcontrol",$control_Agente);
else if(array_key_exists("Agente", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"Agente", ""),"field=Agente","",MODE_VIEW);
		$xt->assign("Agente_editcontrol",$value);
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
//	control - Fila
$control_Fila=array();
$control_Fila["func"]="xt_buildeditcontrol";
$control_Fila["params"] = array();
$control_Fila["params"]["field"]="Fila";
$control_Fila["params"]["value"]=@$defvalues["Fila"];

//	Begin Add validation
$arrValidate = array();	
$control_Fila["params"]["validate"]=$arrValidate;
//	End Add validation

$control_Fila["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_Fila["params"]["mode"]="inline_add";
else
	$control_Fila["params"]["mode"]="add";

if(!$detailKeys || !in_array("Fila", $detailKeys))
	$xt->assignbyref("Fila_editcontrol",$control_Fila);
else if(array_key_exists("Fila", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"Fila", ""),"field=Fila","",MODE_VIEW);
		$xt->assign("Fila_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - tipo_pausa
$control_tipo_pausa=array();
$control_tipo_pausa["func"]="xt_buildeditcontrol";
$control_tipo_pausa["params"] = array();
$control_tipo_pausa["params"]["field"]="tipo_pausa";
$control_tipo_pausa["params"]["value"]=@$defvalues["tipo_pausa"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_tipo_pausa["params"]["validate"]=$arrValidate;
//	End Add validation

$control_tipo_pausa["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_tipo_pausa["params"]["mode"]="inline_add";
else
	$control_tipo_pausa["params"]["mode"]="add";

if(!$detailKeys || !in_array("tipo_pausa", $detailKeys))
	$xt->assignbyref("tipo_pausa_editcontrol",$control_tipo_pausa);
else if(array_key_exists("tipo_pausa", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"tipo_pausa", ""),"field=tipo%5Fpausa","",MODE_VIEW);
		$xt->assign("tipo_pausa_editcontrol",$value);
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
	$strTableName = "cc_tipos_pausa_atend";
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
