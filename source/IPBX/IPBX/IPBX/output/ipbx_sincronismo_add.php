<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/ipbx_sincronismo_variables.php");
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
	$templatefile = "ipbx_sincronismo_inline_add.htm";
else
	$templatefile = "ipbx_sincronismo_add.htm";

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
			'mShortTableName':'ipbx_sincronismo', 
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
//	processing usuario - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_usuario_".$id);
	$type=postvalue("type_usuario_".$id);
	if (FieldSubmitted("usuario_".$id))
	{
		$value=prepare_for_db("usuario",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "usuario"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["usuario"]=$value;
	}
	}
//	processibng usuario - end
//	processing senha - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_senha_".$id);
	$type=postvalue("type_senha_".$id);
	if (FieldSubmitted("senha_".$id))
	{
		$value=prepare_for_db("senha",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "senha"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["senha"]=$value;
	}
	}
//	processibng senha - end
//	processing trafego - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_trafego_".$id);
	$type=postvalue("type_trafego_".$id);
	if (FieldSubmitted("trafego_".$id))
	{
		$value=prepare_for_db("trafego",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "trafego"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["trafego"]=$value;
	}
	}
//	processibng trafego - end
//	processing ip_server - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_ip_server_".$id);
	$type=postvalue("type_ip_server_".$id);
	if (FieldSubmitted("ip_server_".$id))
	{
		$value=prepare_for_db("ip_server",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ip_server"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ip_server"]=$value;
	}
	}
//	processibng ip_server - end
//	processing flg_ativo - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
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
//	processing flg_fax - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
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
//	processing flg_gravacoes - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_gravacoes_".$id);
	$type=postvalue("type_flg_gravacoes_".$id);
	if (FieldSubmitted("flg_gravacoes_".$id))
	{
		$value=prepare_for_db("flg_gravacoes",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_gravacoes"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_gravacoes"]=$value;
	}
	}
//	processibng flg_gravacoes - end
//	processing ult_sincronismo - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_ult_sincronismo_".$id);
	$type=postvalue("type_ult_sincronismo_".$id);
	if (FieldSubmitted("ult_sincronismo_".$id))
	{
		$value=prepare_for_db("ult_sincronismo",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ult_sincronismo"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ult_sincronismo"]=$value;
	}
	}
//	processibng ult_sincronismo - end



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
					$message .='&nbsp;<a href=\'ipbx_sincronismo_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'ipbx_sincronismo_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: ipbx_sincronismo_".$pageObject->getPageType().".php");
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
		$copykeys["id_sinc"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["id_sinc"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id_sinc"]="";
//call CopyOnLoad event
	if(function_exists("CopyOnLoad"))
		CopyOnLoad($defvalues,$strWhere);
}
else
{
}

if($readavalues)
{
	$defvalues["usuario"]=@$avalues["usuario"];
	$defvalues["senha"]=@$avalues["senha"];
	$defvalues["trafego"]=@$avalues["trafego"];
	$defvalues["ip_server"]=@$avalues["ip_server"];
	$defvalues["flg_ativo"]=@$avalues["flg_ativo"];
	$defvalues["flg_fax"]=@$avalues["flg_fax"];
	$defvalues["flg_gravacoes"]=@$avalues["flg_gravacoes"];
	$defvalues["ult_sincronismo"]=@$avalues["ult_sincronismo"];
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
	$xt->assign("usuario_fieldblock",true);
	$xt->assign("usuario_label",true);
	if(isEnableSection508())
		$xt->assign_section("usuario_label","<label for=\"".GetInputElementId("usuario", $id)."\">","</label>");
	$xt->assign("senha_fieldblock",true);
	$xt->assign("senha_label",true);
	if(isEnableSection508())
		$xt->assign_section("senha_label","<label for=\"".GetInputElementId("senha", $id)."\">","</label>");
	$xt->assign("trafego_fieldblock",true);
	$xt->assign("trafego_label",true);
	if(isEnableSection508())
		$xt->assign_section("trafego_label","<label for=\"".GetInputElementId("trafego", $id)."\">","</label>");
	$xt->assign("ip_server_fieldblock",true);
	$xt->assign("ip_server_label",true);
	if(isEnableSection508())
		$xt->assign_section("ip_server_label","<label for=\"".GetInputElementId("ip_server", $id)."\">","</label>");
	$xt->assign("flg_ativo_fieldblock",true);
	$xt->assign("flg_ativo_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_ativo_label","<label for=\"".GetInputElementId("flg_ativo", $id)."\">","</label>");
	$xt->assign("flg_fax_fieldblock",true);
	$xt->assign("flg_fax_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_fax_label","<label for=\"".GetInputElementId("flg_fax", $id)."\">","</label>");
	$xt->assign("flg_gravacoes_fieldblock",true);
	$xt->assign("flg_gravacoes_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_gravacoes_label","<label for=\"".GetInputElementId("flg_gravacoes", $id)."\">","</label>");
	$xt->assign("ult_sincronismo_fieldblock",true);
	$xt->assign("ult_sincronismo_label",true);
	if(isEnableSection508())
		$xt->assign_section("ult_sincronismo_label","<label for=\"".GetInputElementId("ult_sincronismo", $id)."\">","</label>");
	
	
	if($inlineadd!=ADD_ONTHEFLY)
	{
		if($onsubmit)
			$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit)."\"";
		
		$pageObject->body["begin"] .= $includes;
		if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='ipbx_sincronismo_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="ipbx_sincronismo_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="ipbx_sincronismo_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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
	$readonlyfields["ult_sincronismo"] = htmlspecialchars(GetData($defvalues,"ult_sincronismo", "Datetime"));
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

	$showKeys[] = htmlspecialchars($keys["id_sinc"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_sinc"]));

	

	
	
////////////////////////////////////////////
//	usuario - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"usuario", ""),"field=usuario".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "usuario";
				$showRawValues[] = substr($data["usuario"],0,100);
	}	
//	senha - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"senha", ""),"field=senha".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "senha";
				$showRawValues[] = substr($data["senha"],0,100);
	}	
//	trafego - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"trafego", ""),"field=trafego".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "trafego";
				$showRawValues[] = substr($data["trafego"],0,100);
	}	
//	ip_server - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ip_server", ""),"field=ip%5Fserver".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ip_server";
				$showRawValues[] = substr($data["ip_server"],0,100);
	}	
//	flg_ativo - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
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
//	flg_gravacoes - Checkbox
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"flg_gravacoes", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "flg_gravacoes";
				$showRawValues[] = substr($data["flg_gravacoes"],0,100);
	}	
//	ult_sincronismo - Datetime
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ult_sincronismo", "Datetime"),"field=ult%5Fsincronismo".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ult_sincronismo";
				$showRawValues[] = substr($data["ult_sincronismo"],0,100);
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
//	control - usuario
$control_usuario=array();
$control_usuario["func"]="xt_buildeditcontrol";
$control_usuario["params"] = array();
$control_usuario["params"]["field"]="usuario";
$control_usuario["params"]["value"]=@$defvalues["usuario"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_usuario["params"]["validate"]=$arrValidate;
//	End Add validation

$control_usuario["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_usuario["params"]["mode"]="inline_add";
else
	$control_usuario["params"]["mode"]="add";

if(!$detailKeys || !in_array("usuario", $detailKeys))
	$xt->assignbyref("usuario_editcontrol",$control_usuario);
else if(array_key_exists("usuario", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"usuario", ""),"field=usuario","",MODE_VIEW);
		$xt->assign("usuario_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - senha
$control_senha=array();
$control_senha["func"]="xt_buildeditcontrol";
$control_senha["params"] = array();
$control_senha["params"]["field"]="senha";
$control_senha["params"]["value"]=@$defvalues["senha"];

//	Begin Add validation
$arrValidate = array();	
$validatetype=getJsValidatorName("Password");
	$arrValidate['basicValidate'][] = $validatetype;
$arrValidate['basicValidate'][] = "IsRequired";
$control_senha["params"]["validate"]=$arrValidate;
//	End Add validation

$control_senha["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_senha["params"]["mode"]="inline_add";
else
	$control_senha["params"]["mode"]="add";

if(!$detailKeys || !in_array("senha", $detailKeys))
	$xt->assignbyref("senha_editcontrol",$control_senha);
else if(array_key_exists("senha", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"senha", ""),"field=senha","",MODE_VIEW);
		$xt->assign("senha_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - trafego
$control_trafego=array();
$control_trafego["func"]="xt_buildeditcontrol";
$control_trafego["params"] = array();
$control_trafego["params"]["field"]="trafego";
$control_trafego["params"]["value"]=@$defvalues["trafego"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_trafego["params"]["validate"]=$arrValidate;
//	End Add validation

$control_trafego["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_trafego["params"]["mode"]="inline_add";
else
	$control_trafego["params"]["mode"]="add";

if(!$detailKeys || !in_array("trafego", $detailKeys))
	$xt->assignbyref("trafego_editcontrol",$control_trafego);
else if(array_key_exists("trafego", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"trafego", ""),"field=trafego","",MODE_VIEW);
		$xt->assign("trafego_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ip_server
$control_ip_server=array();
$control_ip_server["func"]="xt_buildeditcontrol";
$control_ip_server["params"] = array();
$control_ip_server["params"]["field"]="ip_server";
$control_ip_server["params"]["value"]=@$defvalues["ip_server"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_ip_server["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ip_server["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ip_server["params"]["mode"]="inline_add";
else
	$control_ip_server["params"]["mode"]="add";

if(!$detailKeys || !in_array("ip_server", $detailKeys))
	$xt->assignbyref("ip_server_editcontrol",$control_ip_server);
else if(array_key_exists("ip_server", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ip_server", ""),"field=ip%5Fserver","",MODE_VIEW);
		$xt->assign("ip_server_editcontrol",$value);
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
//	control - flg_gravacoes
$control_flg_gravacoes=array();
$control_flg_gravacoes["func"]="xt_buildeditcontrol";
$control_flg_gravacoes["params"] = array();
$control_flg_gravacoes["params"]["field"]="flg_gravacoes";
$control_flg_gravacoes["params"]["value"]=@$defvalues["flg_gravacoes"];

//	Begin Add validation
$arrValidate = array();	
$control_flg_gravacoes["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_gravacoes["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_gravacoes["params"]["mode"]="inline_add";
else
	$control_flg_gravacoes["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_gravacoes", $detailKeys))
	$xt->assignbyref("flg_gravacoes_editcontrol",$control_flg_gravacoes);
else if(array_key_exists("flg_gravacoes", $defvalues))
{
				$value = GetData($defvalues,"flg_gravacoes", "Checkbox");
		$xt->assign("flg_gravacoes_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ult_sincronismo
$control_ult_sincronismo=array();
$control_ult_sincronismo["func"]="xt_buildeditcontrol";
$control_ult_sincronismo["params"] = array();
$control_ult_sincronismo["params"]["field"]="ult_sincronismo";
$control_ult_sincronismo["params"]["value"]=@$defvalues["ult_sincronismo"];

//	Begin Add validation
$arrValidate = array();	
$control_ult_sincronismo["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ult_sincronismo["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ult_sincronismo["params"]["mode"]="inline_add";
else
	$control_ult_sincronismo["params"]["mode"]="add";

if(!$detailKeys || !in_array("ult_sincronismo", $detailKeys))
	$xt->assignbyref("ult_sincronismo_editcontrol",$control_ult_sincronismo);
else if(array_key_exists("ult_sincronismo", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ult_sincronismo", "Datetime"),"field=ult%5Fsincronismo","",MODE_VIEW);
		$xt->assign("ult_sincronismo_editcontrol",$value);
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
	$strTableName = "ipbx_sincronismo";
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
