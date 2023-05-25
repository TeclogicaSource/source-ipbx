<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/ipbx_interf_gsm_variables.php");
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
	$templatefile = "ipbx_interf_gsm_inline_add.htm";
else
	$templatefile = "ipbx_interf_gsm_add.htm";

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
	$mKeys["ipbx_canais"] = GetMasterKeysByDetailTable("ipbx_canais", $strTableName);
	$dpParams['strTableNames'][] = "ipbx_canais";
	$dpParams['ids'][] = ++$ids;
	if($inlineadd==ADD_SIMPLE)
	{
		$pageObject->AddJSCode("window.dpObj = new dpInlineOnAddEdit({
			'mTableName':'".jsreplace($strTableName)."',
			'mShortTableName':'ipbx_interf_gsm', 
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
//	processing piloto - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_piloto_".$id);
	$type=postvalue("type_piloto_".$id);
	if (FieldSubmitted("piloto_".$id))
	{
		$value=prepare_for_db("piloto",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "piloto"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["piloto"]=$value;
	}
	}
//	processibng piloto - end
//	processing id_chamada - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_chamada_".$id);
	$type=postvalue("type_id_chamada_".$id);
	if (FieldSubmitted("id_chamada_".$id))
	{
		$value=prepare_for_db("id_chamada",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_chamada"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_chamada"]=$value;
	}
	}
//	processibng id_chamada - end
//	processing cd_operadora - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_cd_operadora_".$id);
	$type=postvalue("type_cd_operadora_".$id);
	if (FieldSubmitted("cd_operadora_".$id))
	{
		$value=prepare_for_db("cd_operadora",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "cd_operadora"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["cd_operadora"]=$value;
	}
	}
//	processibng cd_operadora - end
//	processing id_central - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_central_".$id);
	$type=postvalue("type_id_central_".$id);
	if (FieldSubmitted("id_central_".$id))
	{
		$value=prepare_for_db("id_central",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_central"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_central"]=$value;
	}
	}
//	processibng id_central - end
//	processing dsc_interf - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dsc_interf_".$id);
	$type=postvalue("type_dsc_interf_".$id);
	if (FieldSubmitted("dsc_interf_".$id))
	{
		$value=prepare_for_db("dsc_interf",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dsc_interf"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dsc_interf"]=$value;
	}
	}
//	processibng dsc_interf - end
//	processing id_contrato - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_contrato_".$id);
	$type=postvalue("type_id_contrato_".$id);
	if (FieldSubmitted("id_contrato_".$id))
	{
		$value=prepare_for_db("id_contrato",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_contrato"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_contrato"]=$value;
	}
	}
//	processibng id_contrato - end
//	processing board - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_board_".$id);
	$type=postvalue("type_board_".$id);
	if (FieldSubmitted("board_".$id))
	{
		$value=prepare_for_db("board",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "board"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["board"]=$value;
	}
	}
//	processibng board - end
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
//	processing id_tp_interf - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_id_tp_interf_".$id);
	$type=postvalue("type_id_tp_interf_".$id);
	if (FieldSubmitted("id_tp_interf_".$id))
	{
		$value=prepare_for_db("id_tp_interf",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "id_tp_interf"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["id_tp_interf"]=$value;
	}
	}
//	processibng id_tp_interf - end


//	insert masterkey value if exists and if not specified
	if(@$_SESSION[$sessionPrefix."_mastertable"]=="central")
	{
		if(!@$_SESSION[$sessionPrefix."_masterkey1"] && postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
		if($avalues["id_central"]=="")
			$avalues["id_central"]=prepare_for_db("id_central",$_SESSION[$sessionPrefix."_masterkey1"]);
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
					$message .='&nbsp;<a href=\'ipbx_interf_gsm_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'ipbx_interf_gsm_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: ipbx_interf_gsm_".$pageObject->getPageType().".php");
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
		$copykeys["id_interf"]=postvalue("copyid1");
		$copykeys["id_central"]=postvalue("copyid2");
	}
	else
	{
		$copykeys["id_interf"]=postvalue("editid1");
		$copykeys["id_central"]=postvalue("editid2");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id_interf"]="";
	$defvalues["id_central"]="";
//call CopyOnLoad event
	if(function_exists("CopyOnLoad"))
		CopyOnLoad($defvalues,$strWhere);
}
else
{
	$defvalues["id_tp_interf"]=3;
}
//	set default values for the foreign keys
if(@$_SESSION[$sessionPrefix."_mastertable"]=="central")
{
	if(!@$_SESSION[$sessionPrefix."_masterkey1"] && postvalue("masterkey1"))
			$_SESSION[$sessionPrefix."_masterkey1"] = postvalue("masterkey1");
	$defvalues["id_central"]=@$_SESSION[$sessionPrefix."_masterkey1"];	
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
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='ipbx_interf_gsm_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="ipbx_interf_gsm_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="ipbx_interf_gsm_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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
	$readonlyfields["id_tp_interf"] = htmlspecialchars(GetData($defvalues,"id_tp_interf", ""));
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
	$masterquery="mastertable=ipbx%5Finterf%5Fgsm";
	$masterquery.="&masterkey1=".rawurlencode($data["id_interf"]);
	$showDetailKeys["ipbx_canais"]=$masterquery;

	$showKeys[] = htmlspecialchars($keys["id_interf"]);
	$showKeys[] = htmlspecialchars($keys["id_central"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_interf"]));
	$keylink.="&key2=".htmlspecialchars(rawurlencode(@$data["id_central"]));

	

	
	
////////////////////////////////////////////
//	dsc_interf - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dsc_interf", ""),"field=dsc%5Finterf".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dsc_interf";
				$showRawValues[] = substr($data["dsc_interf"],0,100);
	}	
//	id_contrato - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("id_contrato",$data["id_contrato"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_contrato";
				$showRawValues[] = substr($data["id_contrato"],0,100);
	}	
//	id_central - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"id_central", ""),"field=id%5Fcentral".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_central";
				$showRawValues[] = substr($data["id_central"],0,100);
	}	
//	board - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"board", ""),"field=board".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "board";
				$showRawValues[] = substr($data["board"],0,100);
	}	
//	id_tp_interf - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"id_tp_interf", ""),"field=id%5Ftp%5Finterf".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_tp_interf";
				$showRawValues[] = substr($data["id_tp_interf"],0,100);
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
//	id_chamada - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"id_chamada", ""),"field=id%5Fchamada".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "id_chamada";
				$showRawValues[] = substr($data["id_chamada"],0,100);
	}	
//	piloto - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value=DisplayLookupWizard("piloto",$data["piloto"],$data,$keylink,MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "piloto";
				$showRawValues[] = substr($data["piloto"],0,100);
	}	
//	cd_operadora - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"cd_operadora", ""),"field=cd%5Foperadora".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "cd_operadora";
				$showRawValues[] = substr($data["cd_operadora"],0,100);
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
//	control - dsc_interf
$control_dsc_interf=array();
$control_dsc_interf["func"]="xt_buildeditcontrol";
$control_dsc_interf["params"] = array();
$control_dsc_interf["params"]["field"]="dsc_interf";
$control_dsc_interf["params"]["value"]=@$defvalues["dsc_interf"];

//	Begin Add validation
$arrValidate = array();	
$control_dsc_interf["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dsc_interf["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dsc_interf["params"]["mode"]="inline_add";
else
	$control_dsc_interf["params"]["mode"]="add";

if(!$detailKeys || !in_array("dsc_interf", $detailKeys))
	$xt->assignbyref("dsc_interf_editcontrol",$control_dsc_interf);
else if(array_key_exists("dsc_interf", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dsc_interf", ""),"field=dsc%5Finterf","",MODE_VIEW);
		$xt->assign("dsc_interf_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - id_contrato
$control_id_contrato=array();
$control_id_contrato["func"]="xt_buildeditcontrol";
$control_id_contrato["params"] = array();
$control_id_contrato["params"]["field"]="id_contrato";
$control_id_contrato["params"]["value"]=@$defvalues["id_contrato"];

//	Begin Add validation
$arrValidate = array();	
$control_id_contrato["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_contrato["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_contrato["params"]["mode"]="inline_add";
else
	$control_id_contrato["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_contrato", $detailKeys))
	$xt->assignbyref("id_contrato_editcontrol",$control_id_contrato);
else if(array_key_exists("id_contrato", $defvalues))
{
				$value=DisplayLookupWizard("id_contrato",$defvalues["id_contrato"],$defvalues,"",MODE_VIEW);
		$xt->assign("id_contrato_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - id_central
$control_id_central=array();
$control_id_central["func"]="xt_buildeditcontrol";
$control_id_central["params"] = array();
$control_id_central["params"]["field"]="id_central";
$control_id_central["params"]["value"]=@$defvalues["id_central"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_id_central["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_central["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_central["params"]["mode"]="inline_add";
else
	$control_id_central["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_central", $detailKeys))
	$xt->assignbyref("id_central_editcontrol",$control_id_central);
else if(array_key_exists("id_central", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"id_central", ""),"field=id%5Fcentral","",MODE_VIEW);
		$xt->assign("id_central_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - board
$control_board=array();
$control_board["func"]="xt_buildeditcontrol";
$control_board["params"] = array();
$control_board["params"]["field"]="board";
$control_board["params"]["value"]=@$defvalues["board"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_board["params"]["validate"]=$arrValidate;
//	End Add validation

$control_board["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_board["params"]["mode"]="inline_add";
else
	$control_board["params"]["mode"]="add";

if(!$detailKeys || !in_array("board", $detailKeys))
	$xt->assignbyref("board_editcontrol",$control_board);
else if(array_key_exists("board", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"board", ""),"field=board","",MODE_VIEW);
		$xt->assign("board_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - id_tp_interf
$control_id_tp_interf=array();
$control_id_tp_interf["func"]="xt_buildeditcontrol";
$control_id_tp_interf["params"] = array();
$control_id_tp_interf["params"]["field"]="id_tp_interf";
$control_id_tp_interf["params"]["value"]=@$defvalues["id_tp_interf"];

//	Begin Add validation
$arrValidate = array();	
$control_id_tp_interf["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_tp_interf["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_tp_interf["params"]["mode"]="inline_add";
else
	$control_id_tp_interf["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_tp_interf", $detailKeys))
	$xt->assignbyref("id_tp_interf_editcontrol",$control_id_tp_interf);
else if(array_key_exists("id_tp_interf", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"id_tp_interf", ""),"field=id%5Ftp%5Finterf","",MODE_VIEW);
		$xt->assign("id_tp_interf_editcontrol",$value);
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
$arrValidate['basicValidate'][] = "IsRequired";
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
//	control - id_chamada
$control_id_chamada=array();
$control_id_chamada["func"]="xt_buildeditcontrol";
$control_id_chamada["params"] = array();
$control_id_chamada["params"]["field"]="id_chamada";
$control_id_chamada["params"]["value"]=@$defvalues["id_chamada"];

//	Begin Add validation
$arrValidate = array();	
$control_id_chamada["params"]["validate"]=$arrValidate;
//	End Add validation

$control_id_chamada["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_id_chamada["params"]["mode"]="inline_add";
else
	$control_id_chamada["params"]["mode"]="add";

if(!$detailKeys || !in_array("id_chamada", $detailKeys))
	$xt->assignbyref("id_chamada_editcontrol",$control_id_chamada);
else if(array_key_exists("id_chamada", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"id_chamada", ""),"field=id%5Fchamada","",MODE_VIEW);
		$xt->assign("id_chamada_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - piloto
$control_piloto=array();
$control_piloto["func"]="xt_buildeditcontrol";
$control_piloto["params"] = array();
$control_piloto["params"]["field"]="piloto";
$control_piloto["params"]["value"]=@$defvalues["piloto"];

//	Begin Add validation
$arrValidate = array();	
$control_piloto["params"]["validate"]=$arrValidate;
//	End Add validation

$control_piloto["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_piloto["params"]["mode"]="inline_add";
else
	$control_piloto["params"]["mode"]="add";

if(!$detailKeys || !in_array("piloto", $detailKeys))
	$xt->assignbyref("piloto_editcontrol",$control_piloto);
else if(array_key_exists("piloto", $defvalues))
{
				$value=DisplayLookupWizard("piloto",$defvalues["piloto"],$defvalues,"",MODE_VIEW);
		$xt->assign("piloto_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - cd_operadora
$control_cd_operadora=array();
$control_cd_operadora["func"]="xt_buildeditcontrol";
$control_cd_operadora["params"] = array();
$control_cd_operadora["params"]["field"]="cd_operadora";
$control_cd_operadora["params"]["value"]=@$defvalues["cd_operadora"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Number");
	$arrValidate['basicValidate'][] = $validatetype;
$control_cd_operadora["params"]["validate"]=$arrValidate;
//	End Add validation

$control_cd_operadora["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_cd_operadora["params"]["mode"]="inline_add";
else
	$control_cd_operadora["params"]["mode"]="add";

if(!$detailKeys || !in_array("cd_operadora", $detailKeys))
	$xt->assignbyref("cd_operadora_editcontrol",$control_cd_operadora);
else if(array_key_exists("cd_operadora", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"cd_operadora", ""),"field=cd%5Foperadora","",MODE_VIEW);
		$xt->assign("cd_operadora_editcontrol",$value);
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
	$strTableName = "ipbx_interf_gsm";
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
