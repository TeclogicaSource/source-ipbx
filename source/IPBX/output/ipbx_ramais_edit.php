<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/ipbx_ramais_variables.php");
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
$templatefile = "ipbx_ramais_edit.htm";

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

	$condition = !$inlineedit;

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
	$value = false;
	if($value!==false)
	{	





		
	if(0 && "name"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["name"]=$value;
		
		
	}


//	processibng name - end
	}
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

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
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_desvio_".$id);
	$type=postvalue("type_id_desvio_".$id);
	if(FieldSubmitted("id_desvio_".$id))
	{
		
		$value=prepare_for_db("id_desvio",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_desvio"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_desvio"]=$value;
		
		
	}


//	processibng id_desvio - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_info_centrocusto_".$id);
	$type=postvalue("type_flg_info_centrocusto_".$id);
	if(FieldSubmitted("flg_info_centrocusto_".$id))
	{
		
		$value=prepare_for_db("flg_info_centrocusto",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_info_centrocusto"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_info_centrocusto"]=$value;
		
		
	}


//	processibng flg_info_centrocusto - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_painel_op_".$id);
	$type=postvalue("type_id_painel_op_".$id);
	if(FieldSubmitted("id_painel_op_".$id))
	{
		
		$value=prepare_for_db("id_painel_op",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_painel_op"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_painel_op"]=$value;
		
		
	}


//	processibng id_painel_op - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_flg_show_mobile_".$id);
	$type=postvalue("type_flg_show_mobile_".$id);
	if(FieldSubmitted("flg_show_mobile_".$id))
	{
		
		$value=prepare_for_db("flg_show_mobile",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "flg_show_mobile"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["flg_show_mobile"]=$value;
		
		
	}


//	processibng flg_show_mobile - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_provis_".$id);
	$type=postvalue("type_id_provis_".$id);
	if(FieldSubmitted("id_provis_".$id))
	{
		
		$value=prepare_for_db("id_provis",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_provis"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_provis"]=$value;
		
		
	}


//	processibng id_provis - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_mc_addr_".$id);
	$type=postvalue("type_mc_addr_".$id);
	if(FieldSubmitted("mc_addr_".$id))
	{
		
		$value=prepare_for_db("mc_addr",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "mc_addr"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["mc_addr"]=$value;
		
		
	}


//	processibng mc_addr - end
	}
	$condition = !$inlineedit;

	if($condition)
	{
	$value = postvalue("value_id_lang_".$id);
	$type=postvalue("type_id_lang_".$id);
	if(FieldSubmitted("id_lang_".$id))
	{
		
		$value=prepare_for_db("id_lang",$value,$type);
	}
	else
	{
		$value=false;
	}
	if($value!==false)
	{	





		
	if(0 && "id_lang"=="secret" && $url_page=="admin_users_")
			$value=md5($value);
	$evalues["id_lang"]=$value;
		
		
	}


//	processibng id_lang - end
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
	header("Location: ipbx_ramais_".$pageObject->getPageType().".php?".$keyGetQ);
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
$query = $queryData_ipbx_ramais->Copy();



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
		header("Location: ipbx_ramais_list.php?a=return");
		exit();
	}
	else
		$data=array();
}

$readonlyfields=array();


	


  $readonlyfields["name"] = htmlspecialchars(GetData($data,"name", ""));

if($readevalues)
{
	$data["accountcode"]=$evalues["accountcode"];
	$data["call-limit"]=$evalues["call-limit"];
	$data["callerid"]=$evalues["callerid"];
	$data["context"]=$evalues["context"];
	$data["secret"]=$evalues["secret"];
	$data["allow"]=$evalues["allow"];
	$data["id_horario"]=$evalues["id_horario"];
	$data["mail"]=$evalues["mail"];
	$data["grava_chamada"]=$evalues["grava_chamada"];
	$data["Transbordo"]=$evalues["Transbordo"];
	$data["id_interf"]=$evalues["id_interf"];
	$data["ident_interf"]=$evalues["ident_interf"];
	$data["tp_ramal"]=$evalues["tp_ramal"];
	$data["tp_chamada"]=$evalues["tp_chamada"];
	$data["pickupgroup"]=$evalues["pickupgroup"];
	$data["flg_cadeado"]=$evalues["flg_cadeado"];
	$data["desvio"]=$evalues["desvio"];
	$data["id_pesquisa"]=$evalues["id_pesquisa"];
	$data["desvio_ddr"]=$evalues["desvio_ddr"];
	$data["id_saida"]=$evalues["id_saida"];
	$data["id_desvio"]=$evalues["id_desvio"];
	$data["flg_info_centrocusto"]=$evalues["flg_info_centrocusto"];
	$data["id_painel_op"]=$evalues["id_painel_op"];
	$data["flg_show_mobile"]=$evalues["flg_show_mobile"];
	$data["id_provis"]=$evalues["id_provis"];
	$data["mc_addr"]=$evalues["mc_addr"];
	$data["id_lang"]=$evalues["id_lang"];
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

$pageObject->AddJSFile("include/ui");
$pageObject->AddJSFile("include/ui.core","include/ui");
$pageObject->AddJSFile("include/ui.resizable","include/ui.core");
$pageObject->AddJSFile("include/onthefly");
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
	$xt->assign("secret_fieldblock",true);
	$xt->assign("secret_label",true);
	if(isEnableSection508())
		$xt->assign_section("secret_label","<label for=\"".GetInputElementId("secret", $id)."\">","</label>");
	$xt->assign("allow_fieldblock",true);
	$xt->assign("allow_label",true);
	if(isEnableSection508())
		$xt->assign_section("allow_label","<label for=\"".GetInputElementId("allow", $id)."\">","</label>");
	$xt->assign("id_horario_fieldblock",true);
	$xt->assign("id_horario_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_horario_label","<label for=\"".GetInputElementId("id_horario", $id)."\">","</label>");
	$xt->assign("mail_fieldblock",true);
	$xt->assign("mail_label",true);
	if(isEnableSection508())
		$xt->assign_section("mail_label","<label for=\"".GetInputElementId("mail", $id)."\">","</label>");
	$xt->assign("grava_chamada_fieldblock",true);
	$xt->assign("grava_chamada_label",true);
	if(isEnableSection508())
		$xt->assign_section("grava_chamada_label","<label for=\"".GetInputElementId("grava_chamada", $id)."\">","</label>");
	$xt->assign("Transbordo_fieldblock",true);
	$xt->assign("Transbordo_label",true);
	if(isEnableSection508())
		$xt->assign_section("Transbordo_label","<label for=\"".GetInputElementId("Transbordo", $id)."\">","</label>");
	$xt->assign("id_interf_fieldblock",true);
	$xt->assign("id_interf_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_interf_label","<label for=\"".GetInputElementId("id_interf", $id)."\">","</label>");
	$xt->assign("ident_interf_fieldblock",true);
	$xt->assign("ident_interf_label",true);
	if(isEnableSection508())
		$xt->assign_section("ident_interf_label","<label for=\"".GetInputElementId("ident_interf", $id)."\">","</label>");
	$xt->assign("tp_ramal_fieldblock",true);
	$xt->assign("tp_ramal_label",true);
	if(isEnableSection508())
		$xt->assign_section("tp_ramal_label","<label for=\"".GetInputElementId("tp_ramal", $id)."\">","</label>");
	$xt->assign("tp_chamada_fieldblock",true);
	$xt->assign("tp_chamada_label",true);
	if(isEnableSection508())
		$xt->assign_section("tp_chamada_label","<label for=\"".GetInputElementId("tp_chamada", $id)."\">","</label>");
	$xt->assign("pickupgroup_fieldblock",true);
	$xt->assign("pickupgroup_label",true);
	if(isEnableSection508())
		$xt->assign_section("pickupgroup_label","<label for=\"".GetInputElementId("pickupgroup", $id)."\">","</label>");
	$xt->assign("flg_cadeado_fieldblock",true);
	$xt->assign("flg_cadeado_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_cadeado_label","<label for=\"".GetInputElementId("flg_cadeado", $id)."\">","</label>");
	$xt->assign("desvio_fieldblock",true);
	$xt->assign("desvio_label",true);
	if(isEnableSection508())
		$xt->assign_section("desvio_label","<label for=\"".GetInputElementId("desvio", $id)."\">","</label>");
	$xt->assign("id_pesquisa_fieldblock",true);
	$xt->assign("id_pesquisa_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_pesquisa_label","<label for=\"".GetInputElementId("id_pesquisa", $id)."\">","</label>");
	$xt->assign("desvio_ddr_fieldblock",true);
	$xt->assign("desvio_ddr_label",true);
	if(isEnableSection508())
		$xt->assign_section("desvio_ddr_label","<label for=\"".GetInputElementId("desvio_ddr", $id)."\">","</label>");
	$xt->assign("id_saida_fieldblock",true);
	$xt->assign("id_saida_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_saida_label","<label for=\"".GetInputElementId("id_saida", $id)."\">","</label>");
	$xt->assign("id_desvio_fieldblock",true);
	$xt->assign("id_desvio_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_desvio_label","<label for=\"".GetInputElementId("id_desvio", $id)."\">","</label>");
	$xt->assign("flg_info_centrocusto_fieldblock",true);
	$xt->assign("flg_info_centrocusto_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_info_centrocusto_label","<label for=\"".GetInputElementId("flg_info_centrocusto", $id)."\">","</label>");
	$xt->assign("id_painel_op_fieldblock",true);
	$xt->assign("id_painel_op_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_painel_op_label","<label for=\"".GetInputElementId("id_painel_op", $id)."\">","</label>");
	$xt->assign("flg_show_mobile_fieldblock",true);
	$xt->assign("flg_show_mobile_label",true);
	if(isEnableSection508())
		$xt->assign_section("flg_show_mobile_label","<label for=\"".GetInputElementId("flg_show_mobile", $id)."\">","</label>");
	$xt->assign("id_provis_fieldblock",true);
	$xt->assign("id_provis_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_provis_label","<label for=\"".GetInputElementId("id_provis", $id)."\">","</label>");
	$xt->assign("mc_addr_fieldblock",true);
	$xt->assign("mc_addr_label",true);
	if(isEnableSection508())
		$xt->assign_section("mc_addr_label","<label for=\"".GetInputElementId("mc_addr", $id)."\">","</label>");
	$xt->assign("id_lang_fieldblock",true);
	$xt->assign("id_lang_label",true);
	if(isEnableSection508())
		$xt->assign_section("id_lang_label","<label for=\"".GetInputElementId("id_lang", $id)."\">","</label>");
	
	if(strlen($onsubmit))
		$onsubmit="onSubmit=\"".htmlspecialchars($onsubmit)."\"";
	$pageObject->body["begin"] .= $includes;
	
	if($isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
	
	
	$hiddenKeys = '';
	$hiddenKeys .= "<input type=\"hidden\" name=\"editid1\" value=\"".htmlspecialchars($keys["id"])."\">";
	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id", "")));
	
	$xt->assign('editForm', array('begin'=>'<form name="'.$formname.'" id="'.$formname.'" encType="multipart/form-data" method="post" action="ipbx_ramais_edit.php" '.$onsubmit.'>'.
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
	$unblRec="UnlockRecord('ipbx_ramais_edit.php','".$skeys."','',function(){window.location.href='ipbx_ramais_edit.php?";
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
	$xt->assign("backbutton_attrs","onclick=\"UnlockRecord('ipbx_ramais_edit.php','".$skeys."','',function(){window.location.href='ipbx_ramais_list.php?a=return'});return false;\"");
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
$condition=!$inlineedit;
if($condition)
{
	$output = loadSelectContent("ident_interf",$data["id_interf"],true,$data["ident_interf"]);
	$txt = ""; 
	foreach( $output as $value ) 
	{
		$txt .= jsreplace($value)."\\n";
	}
		$pageObject->AddJSCode("var Cntrl = Runner.controls.ControlManager.getAt('".jsreplace($strTableName)."', ".$id.", 'ident_interf');	
				Cntrl.preload('".$txt."','".jsreplace(@$data["ident_interf"])."');");
}
//old way to disabled button prev next
	if(!$inlineedit) 
		$pageObject->AddJSCode($bodyonload."\r\n SetToFirstControl('".$formname."');\r\n");
	
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
//	control - accountcode
$control_accountcode=array();
$control_accountcode["func"]="xt_buildeditcontrol";
$control_accountcode["params"] = array();
$control_accountcode["params"]["field"]="accountcode";
$control_accountcode["params"]["value"]=@$data["accountcode"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

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
				$value=DisplayLookupWizard("accountcode",$data["accountcode"],$data,"",MODE_VIEW);
		$xt->assign("accountcode_editcontrol",$value);
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

$arrValidate['basicValidate'][] = "IsRequired";

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
//	control - context
$control_context=array();
$control_context["func"]="xt_buildeditcontrol";
$control_context["params"] = array();
$control_context["params"]["field"]="context";
$control_context["params"]["value"]=@$data["context"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

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
				$value=DisplayLookupWizard("context",$data["context"],$data,"",MODE_VIEW);
		$xt->assign("context_editcontrol",$value);
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

$arrValidate['basicValidate'][] = "IsRequired";

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
//	control - id_horario
$control_id_horario=array();
$control_id_horario["func"]="xt_buildeditcontrol";
$control_id_horario["params"] = array();
$control_id_horario["params"]["field"]="id_horario";
$control_id_horario["params"]["value"]=@$data["id_horario"];
//	Begin Add validation
$arrValidate = array();	


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
				$value=DisplayLookupWizard("id_horario",$data["id_horario"],$data,"",MODE_VIEW);
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
$validatetype = getJsValidatorName("Email");
$arrValidate['basicValidate'][] = $validatetype;


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
				$value = GetData($data,"grava_chamada", "Checkbox");
		$xt->assign("grava_chamada_editcontrol",$value);
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
				$value=DisplayLookupWizard("id_interf",$data["id_interf"],$data,"",MODE_VIEW);
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
				$value=DisplayLookupWizard("ident_interf",$data["ident_interf"],$data,"",MODE_VIEW);
		$xt->assign("ident_interf_editcontrol",$value);
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

$arrValidate['basicValidate'][] = "IsRequired";

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
//	control - tp_chamada
$control_tp_chamada=array();
$control_tp_chamada["func"]="xt_buildeditcontrol";
$control_tp_chamada["params"] = array();
$control_tp_chamada["params"]["field"]="tp_chamada";
$control_tp_chamada["params"]["value"]=@$data["tp_chamada"];
//	Begin Add validation
$arrValidate = array();	


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
//	control - pickupgroup
$control_pickupgroup=array();
$control_pickupgroup["func"]="xt_buildeditcontrol";
$control_pickupgroup["params"] = array();
$control_pickupgroup["params"]["field"]="pickupgroup";
$control_pickupgroup["params"]["value"]=@$data["pickupgroup"];
//	Begin Add validation
$arrValidate = array();	

$arrValidate['basicValidate'][] = "IsRequired";

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
				$value=DisplayLookupWizard("pickupgroup",$data["pickupgroup"],$data,"",MODE_VIEW);
		$xt->assign("pickupgroup_editcontrol",$value);
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
				$value = GetData($data,"flg_cadeado", "Checkbox");
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
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


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
				$value=DisplayLookupWizard("id_pesquisa",$data["id_pesquisa"],$data,"",MODE_VIEW);
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
				$value=DisplayLookupWizard("desvio_ddr",$data["desvio_ddr"],$data,"",MODE_VIEW);
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
$validatetype = getJsValidatorName("Number");
$arrValidate['basicValidate'][] = $validatetype;


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
//	control - id_desvio
$control_id_desvio=array();
$control_id_desvio["func"]="xt_buildeditcontrol";
$control_id_desvio["params"] = array();
$control_id_desvio["params"]["field"]="id_desvio";
$control_id_desvio["params"]["value"]=@$data["id_desvio"];
//	Begin Add validation
$arrValidate = array();	


$control_id_desvio["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_desvio["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_desvio["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_desvio["params"]["mode"]="inline_edit";
else
	$control_id_desvio["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_desvio", $detailKeys))	
	$xt->assign("id_desvio_editcontrol",$control_id_desvio);
else if(array_key_exists("id_desvio",$data))
{
				$value=DisplayLookupWizard("id_desvio",$data["id_desvio"],$data,"",MODE_VIEW);
		$xt->assign("id_desvio_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_info_centrocusto
$control_flg_info_centrocusto=array();
$control_flg_info_centrocusto["func"]="xt_buildeditcontrol";
$control_flg_info_centrocusto["params"] = array();
$control_flg_info_centrocusto["params"]["field"]="flg_info_centrocusto";
$control_flg_info_centrocusto["params"]["value"]=@$data["flg_info_centrocusto"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_info_centrocusto["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_info_centrocusto["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_info_centrocusto["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_info_centrocusto["params"]["mode"]="inline_edit";
else
	$control_flg_info_centrocusto["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_info_centrocusto", $detailKeys))	
	$xt->assign("flg_info_centrocusto_editcontrol",$control_flg_info_centrocusto);
else if(array_key_exists("flg_info_centrocusto",$data))
{
				$value = GetData($data,"flg_info_centrocusto", "Checkbox");
		$xt->assign("flg_info_centrocusto_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_painel_op
$control_id_painel_op=array();
$control_id_painel_op["func"]="xt_buildeditcontrol";
$control_id_painel_op["params"] = array();
$control_id_painel_op["params"]["field"]="id_painel_op";
$control_id_painel_op["params"]["value"]=@$data["id_painel_op"];
//	Begin Add validation
$arrValidate = array();	


$control_id_painel_op["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_painel_op["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_painel_op["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_painel_op["params"]["mode"]="inline_edit";
else
	$control_id_painel_op["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_painel_op", $detailKeys))	
	$xt->assign("id_painel_op_editcontrol",$control_id_painel_op);
else if(array_key_exists("id_painel_op",$data))
{
				$value=DisplayLookupWizard("id_painel_op",$data["id_painel_op"],$data,"",MODE_VIEW);
		$xt->assign("id_painel_op_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - flg_show_mobile
$control_flg_show_mobile=array();
$control_flg_show_mobile["func"]="xt_buildeditcontrol";
$control_flg_show_mobile["params"] = array();
$control_flg_show_mobile["params"]["field"]="flg_show_mobile";
$control_flg_show_mobile["params"]["value"]=@$data["flg_show_mobile"];
//	Begin Add validation
$arrValidate = array();	


$control_flg_show_mobile["params"]["validate"]=$arrValidate;
//	End Add validation
$control_flg_show_mobile["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_flg_show_mobile["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_flg_show_mobile["params"]["mode"]="inline_edit";
else
	$control_flg_show_mobile["params"]["mode"]="edit";
if(!$detailKeys || !in_array("flg_show_mobile", $detailKeys))	
	$xt->assign("flg_show_mobile_editcontrol",$control_flg_show_mobile);
else if(array_key_exists("flg_show_mobile",$data))
{
				$value = GetData($data,"flg_show_mobile", "Checkbox");
		$xt->assign("flg_show_mobile_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_provis
$control_id_provis=array();
$control_id_provis["func"]="xt_buildeditcontrol";
$control_id_provis["params"] = array();
$control_id_provis["params"]["field"]="id_provis";
$control_id_provis["params"]["value"]=@$data["id_provis"];
//	Begin Add validation
$arrValidate = array();	


$control_id_provis["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_provis["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_provis["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_provis["params"]["mode"]="inline_edit";
else
	$control_id_provis["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_provis", $detailKeys))	
	$xt->assign("id_provis_editcontrol",$control_id_provis);
else if(array_key_exists("id_provis",$data))
{
				$value=DisplayLookupWizard("id_provis",$data["id_provis"],$data,"",MODE_VIEW);
		$xt->assign("id_provis_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - mc_addr
$control_mc_addr=array();
$control_mc_addr["func"]="xt_buildeditcontrol";
$control_mc_addr["params"] = array();
$control_mc_addr["params"]["field"]="mc_addr";
$control_mc_addr["params"]["value"]=@$data["mc_addr"];
//	Begin Add validation
$arrValidate = array();	

$control_mc_addr["params"]["validate"]=$arrValidate;
//	End Add validation
$control_mc_addr["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_mc_addr["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_mc_addr["params"]["mode"]="inline_edit";
else
	$control_mc_addr["params"]["mode"]="edit";
if(!$detailKeys || !in_array("mc_addr", $detailKeys))	
	$xt->assign("mc_addr_editcontrol",$control_mc_addr);
else if(array_key_exists("mc_addr",$data))
{
				$value = ProcessLargeText(GetData($data,"mc_addr", ""),"field=mc%5Faddr","",MODE_VIEW);
		$xt->assign("mc_addr_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
//	control - id_lang
$control_id_lang=array();
$control_id_lang["func"]="xt_buildeditcontrol";
$control_id_lang["params"] = array();
$control_id_lang["params"]["field"]="id_lang";
$control_id_lang["params"]["value"]=@$data["id_lang"];
//	Begin Add validation
$arrValidate = array();	


$control_id_lang["params"]["validate"]=$arrValidate;
//	End Add validation
$control_id_lang["params"]["id"]=$id;
$additionalCtrlParams = array();
$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
$control_id_lang["params"]["additionalCtrlParams"]=$additionalCtrlParams;
if($inlineedit)
	$control_id_lang["params"]["mode"]="inline_edit";
else
	$control_id_lang["params"]["mode"]="edit";
if(!$detailKeys || !in_array("id_lang", $detailKeys))	
	$xt->assign("id_lang_editcontrol",$control_id_lang);
else if(array_key_exists("id_lang",$data))
{
				$value=DisplayLookupWizard("id_lang",$data["id_lang"],$data,"",MODE_VIEW);
		$xt->assign("id_lang_editcontrol",$value);
}


// add prevent submit on enter js if only one text record
$pageObject->addCommonJs();


if($lockingObj && $enableCtrlsForEditing)
	$pageObject->AddJSCode("window.timeid".$id."=setInterval( function() {ConfirmLock('ipbx_ramais_edit.php','".jsreplace($strTableName)."','".$skeys."',".$id.",'".$inlineedit."');},".($lockingObj->ConfirmTime*1000).");");

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
			$strTableName = "ipbx_ramais";		
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
	$strTableName = "ipbx_ramais";		
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

$pageObject->xt->assign("legend", true);




/////////////////////////////////////////////////////////////
//display the page
/////////////////////////////////////////////////////////////
if(function_exists("BeforeShowEdit"))
	BeforeShowEdit($xt,$templatefile);

$xt->display($templatefile);

?>
