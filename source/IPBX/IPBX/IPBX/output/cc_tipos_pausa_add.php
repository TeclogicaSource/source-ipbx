<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/cc_tipos_pausa_variables.php");
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
	$templatefile = "cc_tipos_pausa_inline_add.htm";
else
	$templatefile = "cc_tipos_pausa_add.htm";

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
			'mShortTableName':'cc_tipos_pausa', 
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
//	processing dsc_pausa - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dsc_pausa_".$id);
	$type=postvalue("type_dsc_pausa_".$id);
	if (FieldSubmitted("dsc_pausa_".$id))
	{
		$value=prepare_for_db("dsc_pausa",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dsc_pausa"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dsc_pausa"]=$value;
	}
	}
//	processibng dsc_pausa - end
//	processing flg_ativo - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_ativo_".$id);
	$type=postvalue("type_flg_ativo_".$id);
	if (FieldSubmitted("flg_ativo_".$id))
	{
		$value=prepare_for_db("flg_ativo",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_ativo"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_ativo"]=$value;
	}
	}
//	processibng flg_ativo - end
//	processing abreviado - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_abreviado_".$id);
	$type=postvalue("type_abreviado_".$id);
	if (FieldSubmitted("abreviado_".$id))
	{
		$value=prepare_for_db("abreviado",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "abreviado"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["abreviado"]=$value;
	}
	}
//	processibng abreviado - end



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
					$message .='&nbsp;<a href=\'cc_tipos_pausa_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'cc_tipos_pausa_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: cc_tipos_pausa_".$pageObject->getPageType().".php");
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
		$copykeys["idt_pausa"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["idt_pausa"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["idt_pausa"]="";
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
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='cc_tipos_pausa_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="cc_tipos_pausa_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="cc_tipos_pausa_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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

	$showKeys[] = htmlspecialchars($keys["idt_pausa"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["idt_pausa"]));

	

	
	
////////////////////////////////////////////
//	dsc_pausa - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dsc_pausa", ""),"field=dsc%5Fpausa".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dsc_pausa";
				$showRawValues[] = substr($data["dsc_pausa"],0,100);
	}	
//	flg_ativo - Checkbox
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"flg_ativo", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "flg_ativo";
				$showRawValues[] = substr($data["flg_ativo"],0,100);
	}	
//	abreviado - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"abreviado", ""),"field=abreviado".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "abreviado";
				$showRawValues[] = substr($data["abreviado"],0,100);
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
//	control - dsc_pausa
$control_dsc_pausa=array();
$control_dsc_pausa["func"]="xt_buildeditcontrol";
$control_dsc_pausa["params"] = array();
$control_dsc_pausa["params"]["field"]="dsc_pausa";
$control_dsc_pausa["params"]["value"]=@$defvalues["dsc_pausa"];

//	Begin Add validation
$arrValidate = array();	
$control_dsc_pausa["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dsc_pausa["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dsc_pausa["params"]["mode"]="inline_add";
else
	$control_dsc_pausa["params"]["mode"]="add";

if(!$detailKeys || !in_array("dsc_pausa", $detailKeys))
	$xt->assignbyref("dsc_pausa_editcontrol",$control_dsc_pausa);
else if(array_key_exists("dsc_pausa", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dsc_pausa", ""),"field=dsc%5Fpausa","",MODE_VIEW);
		$xt->assign("dsc_pausa_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_ativo
$control_flg_ativo=array();
$control_flg_ativo["func"]="xt_buildeditcontrol";
$control_flg_ativo["params"] = array();
$control_flg_ativo["params"]["field"]="flg_ativo";
$control_flg_ativo["params"]["value"]=@$defvalues["flg_ativo"];

//	Begin Add validation
$arrValidate = array();	
$control_flg_ativo["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_ativo["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_ativo["params"]["mode"]="inline_add";
else
	$control_flg_ativo["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_ativo", $detailKeys))
	$xt->assignbyref("flg_ativo_editcontrol",$control_flg_ativo);
else if(array_key_exists("flg_ativo", $defvalues))
{
				$value = GetData($defvalues,"flg_ativo", "Checkbox");
		$xt->assign("flg_ativo_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - abreviado
$control_abreviado=array();
$control_abreviado["func"]="xt_buildeditcontrol";
$control_abreviado["params"] = array();
$control_abreviado["params"]["field"]="abreviado";
$control_abreviado["params"]["value"]=@$defvalues["abreviado"];

//	Begin Add validation
$arrValidate = array();	
$control_abreviado["params"]["validate"]=$arrValidate;
//	End Add validation

$control_abreviado["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_abreviado["params"]["mode"]="inline_add";
else
	$control_abreviado["params"]["mode"]="add";

if(!$detailKeys || !in_array("abreviado", $detailKeys))
	$xt->assignbyref("abreviado_editcontrol",$control_abreviado);
else if(array_key_exists("abreviado", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"abreviado", ""),"field=abreviado","",MODE_VIEW);
		$xt->assign("abreviado_editcontrol",$value);
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
	$strTableName = "cc_tipos_pausa";
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
