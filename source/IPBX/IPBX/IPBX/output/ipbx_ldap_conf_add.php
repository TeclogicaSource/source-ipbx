<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();

include("include/ipbx_ldap_conf_variables.php");
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
	$templatefile = "ipbx_ldap_conf_inline_add.htm";
else
	$templatefile = "ipbx_ldap_conf_add.htm";

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
			'mShortTableName':'ipbx_ldap_conf', 
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
//	processing tp_ldap - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_tp_ldap_".$id);
	$type=postvalue("type_tp_ldap_".$id);
	if (FieldSubmitted("tp_ldap_".$id))
	{
		$value=prepare_for_db("tp_ldap",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "tp_ldap"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["tp_ldap"]=$value;
	}
	}
//	processibng tp_ldap - end
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
//	processing dsc_conf - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_dsc_conf_".$id);
	$type=postvalue("type_dsc_conf_".$id);
	if (FieldSubmitted("dsc_conf_".$id))
	{
		$value=prepare_for_db("dsc_conf",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "dsc_conf"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["dsc_conf"]=$value;
	}
	}
//	processibng dsc_conf - end
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
//	processing ip_server - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
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
//	processing ou_usuarios - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_ou_usuarios_".$id);
	$type=postvalue("type_ou_usuarios_".$id);
	if (FieldSubmitted("ou_usuarios_".$id))
	{
		$value=prepare_for_db("ou_usuarios",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ou_usuarios"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ou_usuarios"]=$value;
	}
	}
//	processibng ou_usuarios - end
//	processing filtro - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_filtro_".$id);
	$type=postvalue("type_filtro_".$id);
	if (FieldSubmitted("filtro_".$id))
	{
		$value=prepare_for_db("filtro",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "filtro"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["filtro"]=$value;
	}
	}
//	processibng filtro - end
//	processing ad_usuario - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_ad_usuario_".$id);
	$type=postvalue("type_ad_usuario_".$id);
	if (FieldSubmitted("ad_usuario_".$id))
	{
		$value=prepare_for_db("ad_usuario",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ad_usuario"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ad_usuario"]=$value;
	}
	}
//	processibng ad_usuario - end
//	processing ad_senha - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_ad_senha_".$id);
	$type=postvalue("type_ad_senha_".$id);
	if (FieldSubmitted("ad_senha_".$id))
	{
		$value=prepare_for_db("ad_senha",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ad_senha"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ad_senha"]=$value;
	}
	}
//	processibng ad_senha - end
//	processing ad_dominio - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_ad_dominio_".$id);
	$type=postvalue("type_ad_dominio_".$id);
	if (FieldSubmitted("ad_dominio_".$id))
	{
		$value=prepare_for_db("ad_dominio",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "ad_dominio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["ad_dominio"]=$value;
	}
	}
//	processibng ad_dominio - end
//	processing flg_padrao - start
    
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd==ADD_INLINE;
	if($inlineAddOption)
	{
	$value = postvalue("value_flg_padrao_".$id);
	$type=postvalue("type_flg_padrao_".$id);
	if (FieldSubmitted("flg_padrao_".$id))
	{
		$value=prepare_for_db("flg_padrao",$value,$type);
	}
	else
		$value=false;
	if(!($value===false))
	{


		if(0 && "flg_padrao"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
		$avalues["flg_padrao"]=$value;
	}
	}
//	processibng flg_padrao - end



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
					$message .='&nbsp;<a href=\'ipbx_ldap_conf_edit.php?'.$keylink.'\'>'."Editar".'</a>&nbsp;';
				if(GetTableData($strTableName,".view",false) && $permis['search'])
					$message .='&nbsp;<a href=\'ipbx_ldap_conf_view.php?'.$keylink.'\'>'."Exibir".'</a>&nbsp;';
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
	header("Location: ipbx_ldap_conf_".$pageObject->getPageType().".php");
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
		$copykeys["id_ldap"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["id_ldap"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id_ldap"]="";
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
		$xt->assign("backbutton_attrs","onclick=\"window.location.href='ipbx_ldap_conf_list.php?a=return'\"");
		
		if ($pageObject->permis[$pageObject->tName]['search'])
		{
			$xt->assign("back_button",true);
		}		
		
		$xt->assign('addForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="ipbx_ldap_conf_add.php" '.$onsubmit.'>'.		
			'<input type=hidden name="a" value="added">'.
			($isShowDetailTables ? '<input type=hidden name="editType" value="addmaster">' : ''), 'end'=>'</form>'));
	}
	else
	{
		$destroyCtrls = "Runner.controls.ControlManager.unregister('".htmlspecialchars(jsreplace($strTableName))."');";
		$onsubmit="onsubmit=\"".htmlspecialchars($onsubmit.$destroyCtrls)."\"";
		
		$pageObject->body["begin"] .='<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="ipbx_ldap_conf_add.php" '.$onsubmit.' target="flyframe'.$id.'">'.
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

	$showKeys[] = htmlspecialchars($keys["id_ldap"]);

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id_ldap"]));

	

	
	
////////////////////////////////////////////
//	tp_ldap - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"tp_ldap", ""),"field=tp%5Fldap".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "tp_ldap";
				$showRawValues[] = substr($data["tp_ldap"],0,100);
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
//	dsc_conf - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"dsc_conf", ""),"field=dsc%5Fconf".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "dsc_conf";
				$showRawValues[] = substr($data["dsc_conf"],0,100);
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
//	ip_server - 
	$display = false;
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
//	ou_usuarios - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ou_usuarios", ""),"field=ou%5Fusuarios".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ou_usuarios";
				$showRawValues[] = substr($data["ou_usuarios"],0,100);
	}	
//	filtro - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"filtro", ""),"field=filtro".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "filtro";
				$showRawValues[] = substr($data["filtro"],0,100);
	}	
//	ad_usuario - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ad_usuario", ""),"field=ad%5Fusuario".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ad_usuario";
				$showRawValues[] = substr($data["ad_usuario"],0,100);
	}	
//	ad_senha - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ad_senha", ""),"field=ad%5Fsenha".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ad_senha";
				$showRawValues[] = substr($data["ad_senha"],0,100);
	}	
//	ad_dominio - 
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = ProcessLargeText(GetData($data,"ad_dominio", ""),"field=ad%5Fdominio".$keylink,"",MODE_LIST);
		$showValues[] = $value;
		$showFields[] = "ad_dominio";
				$showRawValues[] = substr($data["ad_dominio"],0,100);
	}	
//	flg_padrao - Checkbox
	$display = false;
	if($inlineadd==ADD_INLINE)
		$display = true;
	if($display)
	{	
		$value="";
				$value = GetData($data,"flg_padrao", "Checkbox");
		$showValues[] = $value;
		$showFields[] = "flg_padrao";
				$showRawValues[] = substr($data["flg_padrao"],0,100);
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
//	control - tp_ldap
$control_tp_ldap=array();
$control_tp_ldap["func"]="xt_buildeditcontrol";
$control_tp_ldap["params"] = array();
$control_tp_ldap["params"]["field"]="tp_ldap";
$control_tp_ldap["params"]["value"]=@$defvalues["tp_ldap"];

//	Begin Add validation
$arrValidate = array();	
$arrValidate['basicValidate'][] = "IsRequired";
$control_tp_ldap["params"]["validate"]=$arrValidate;
//	End Add validation

$control_tp_ldap["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_tp_ldap["params"]["mode"]="inline_add";
else
	$control_tp_ldap["params"]["mode"]="add";

if(!$detailKeys || !in_array("tp_ldap", $detailKeys))
	$xt->assignbyref("tp_ldap_editcontrol",$control_tp_ldap);
else if(array_key_exists("tp_ldap", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"tp_ldap", ""),"field=tp%5Fldap","",MODE_VIEW);
		$xt->assign("tp_ldap_editcontrol",$value);
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
//	control - dsc_conf
$control_dsc_conf=array();
$control_dsc_conf["func"]="xt_buildeditcontrol";
$control_dsc_conf["params"] = array();
$control_dsc_conf["params"]["field"]="dsc_conf";
$control_dsc_conf["params"]["value"]=@$defvalues["dsc_conf"];

//	Begin Add validation
$arrValidate = array();	
$control_dsc_conf["params"]["validate"]=$arrValidate;
//	End Add validation

$control_dsc_conf["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_dsc_conf["params"]["mode"]="inline_add";
else
	$control_dsc_conf["params"]["mode"]="add";

if(!$detailKeys || !in_array("dsc_conf", $detailKeys))
	$xt->assignbyref("dsc_conf_editcontrol",$control_dsc_conf);
else if(array_key_exists("dsc_conf", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"dsc_conf", ""),"field=dsc%5Fconf","",MODE_VIEW);
		$xt->assign("dsc_conf_editcontrol",$value);
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
//	control - ip_server
$control_ip_server=array();
$control_ip_server["func"]="xt_buildeditcontrol";
$control_ip_server["params"] = array();
$control_ip_server["params"]["field"]="ip_server";
$control_ip_server["params"]["value"]=@$defvalues["ip_server"];

//	Begin Add validation
$arrValidate = array();	
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
//	control - ou_usuarios
$control_ou_usuarios=array();
$control_ou_usuarios["func"]="xt_buildeditcontrol";
$control_ou_usuarios["params"] = array();
$control_ou_usuarios["params"]["field"]="ou_usuarios";
$control_ou_usuarios["params"]["value"]=@$defvalues["ou_usuarios"];

//	Begin Add validation
$arrValidate = array();	
$control_ou_usuarios["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ou_usuarios["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ou_usuarios["params"]["mode"]="inline_add";
else
	$control_ou_usuarios["params"]["mode"]="add";

if(!$detailKeys || !in_array("ou_usuarios", $detailKeys))
	$xt->assignbyref("ou_usuarios_editcontrol",$control_ou_usuarios);
else if(array_key_exists("ou_usuarios", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ou_usuarios", ""),"field=ou%5Fusuarios","",MODE_VIEW);
		$xt->assign("ou_usuarios_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - filtro
$control_filtro=array();
$control_filtro["func"]="xt_buildeditcontrol";
$control_filtro["params"] = array();
$control_filtro["params"]["field"]="filtro";
$control_filtro["params"]["value"]=@$defvalues["filtro"];

//	Begin Add validation
$arrValidate = array();	
$control_filtro["params"]["validate"]=$arrValidate;
//	End Add validation

$control_filtro["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_filtro["params"]["mode"]="inline_add";
else
	$control_filtro["params"]["mode"]="add";

if(!$detailKeys || !in_array("filtro", $detailKeys))
	$xt->assignbyref("filtro_editcontrol",$control_filtro);
else if(array_key_exists("filtro", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"filtro", ""),"field=filtro","",MODE_VIEW);
		$xt->assign("filtro_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ad_usuario
$control_ad_usuario=array();
$control_ad_usuario["func"]="xt_buildeditcontrol";
$control_ad_usuario["params"] = array();
$control_ad_usuario["params"]["field"]="ad_usuario";
$control_ad_usuario["params"]["value"]=@$defvalues["ad_usuario"];

//	Begin Add validation
$arrValidate = array();	
$control_ad_usuario["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ad_usuario["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ad_usuario["params"]["mode"]="inline_add";
else
	$control_ad_usuario["params"]["mode"]="add";

if(!$detailKeys || !in_array("ad_usuario", $detailKeys))
	$xt->assignbyref("ad_usuario_editcontrol",$control_ad_usuario);
else if(array_key_exists("ad_usuario", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ad_usuario", ""),"field=ad%5Fusuario","",MODE_VIEW);
		$xt->assign("ad_usuario_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ad_senha
$control_ad_senha=array();
$control_ad_senha["func"]="xt_buildeditcontrol";
$control_ad_senha["params"] = array();
$control_ad_senha["params"]["field"]="ad_senha";
$control_ad_senha["params"]["value"]=@$defvalues["ad_senha"];

//	Begin Add validation
$arrValidate = array();	
$control_ad_senha["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ad_senha["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ad_senha["params"]["mode"]="inline_add";
else
	$control_ad_senha["params"]["mode"]="add";

if(!$detailKeys || !in_array("ad_senha", $detailKeys))
	$xt->assignbyref("ad_senha_editcontrol",$control_ad_senha);
else if(array_key_exists("ad_senha", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ad_senha", ""),"field=ad%5Fsenha","",MODE_VIEW);
		$xt->assign("ad_senha_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - ad_dominio
$control_ad_dominio=array();
$control_ad_dominio["func"]="xt_buildeditcontrol";
$control_ad_dominio["params"] = array();
$control_ad_dominio["params"]["field"]="ad_dominio";
$control_ad_dominio["params"]["value"]=@$defvalues["ad_dominio"];

//	Begin Add validation
$arrValidate = array();	
$control_ad_dominio["params"]["validate"]=$arrValidate;
//	End Add validation

$control_ad_dominio["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_ad_dominio["params"]["mode"]="inline_add";
else
	$control_ad_dominio["params"]["mode"]="add";

if(!$detailKeys || !in_array("ad_dominio", $detailKeys))
	$xt->assignbyref("ad_dominio_editcontrol",$control_ad_dominio);
else if(array_key_exists("ad_dominio", $defvalues))
{
				$value = ProcessLargeText(GetData($defvalues,"ad_dominio", ""),"field=ad%5Fdominio","",MODE_VIEW);
		$xt->assign("ad_dominio_editcontrol",$value);
}
// add prevent submit on enter js if only one text record
//	control - flg_padrao
$control_flg_padrao=array();
$control_flg_padrao["func"]="xt_buildeditcontrol";
$control_flg_padrao["params"] = array();
$control_flg_padrao["params"]["field"]="flg_padrao";
$control_flg_padrao["params"]["value"]=@$defvalues["flg_padrao"];

//	Begin Add validation
$arrValidate = array();	
$control_flg_padrao["params"]["validate"]=$arrValidate;
//	End Add validation

$control_flg_padrao["params"]["id"]=$id;
if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY)
	$control_flg_padrao["params"]["mode"]="inline_add";
else
	$control_flg_padrao["params"]["mode"]="add";

if(!$detailKeys || !in_array("flg_padrao", $detailKeys))
	$xt->assignbyref("flg_padrao_editcontrol",$control_flg_padrao);
else if(array_key_exists("flg_padrao", $defvalues))
{
				$value = GetData($defvalues,"flg_padrao", "Checkbox");
		$xt->assign("flg_padrao_editcontrol",$value);
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
	$strTableName = "ipbx_ldap_conf";
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
