<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("classes/searchclause.php");

add_nocache_headers();

include("include/admin_users_variables.php");

if(!@$_SESSION["UserID"])
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}
if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Export"))
{
	echo "<p>"."Você não tem permissão para acessar esta tabela"."<a href=\"login.php\">"."Voltar à página de Login"."</a></p>";
	return;
}

$all=postvalue("all");

$pageName = "print.php";

include('include/xtempl.php');
include('classes/runnerpage.php');
$xt = new Xtempl();

$id = postvalue("id") != "" ? postvalue("id") : 1;
//array of params for classes
$params = array("pageType" => PAGE_PRINT, "id" =>$id, "tName"=>$strTableName);
$pageObject = new RunnerPage($params);


// add onload event
$onLoadJsCode = GetTableData($pageObject->tName, ".jsOnloadPrint", '');
$pageObject->addOnLoadJsEvent($onLoadJsCode);

// add button events if exist
$buttonHandlers = GetTableData($pageObject->tName, ".buttonHandlers_".$pageObject->getPageType(), array());
$pageObject->addButtonHandlers($buttonHandlers);



// Modify query: remove blob fields from fieldlist.
// Blob fields on a print page are shown using imager.php (for example).
// They don't need to be selected from DB in print.php itself.
$gQuery->ReplaceFieldsWithDummies(GetBinaryFieldsIndices());

//	Before Process event
if(function_exists("BeforeProcessPrint"))
	BeforeProcessPrint($conn);

$strWhereClause="";
$selected_recs=array();
if (@$_REQUEST["a"]!="") 
{
	
	$sWhere = "1=0";	
	
//	process selection
	if (@$_REQUEST["mdelete"])
	{
		foreach(@$_REQUEST["mdelete"] as $ind)
		{
			$keys=array();
			$keys["id"]=refine($_REQUEST["mdelete1"][mdeleteIndex($ind)]);
			$selected_recs[]=$keys;
		}
	}
	elseif(@$_REQUEST["selection"])
	{
		foreach(@$_REQUEST["selection"] as $keyblock)
		{
			$arr=explode("&",refine($keyblock));
			if(count($arr)<1)
				continue;
			$keys=array();
			$keys["id"]=urldecode($arr[0]);
			$selected_recs[]=$keys;
		}
	}

	foreach($selected_recs as $keys)
	{
		$sWhere = $sWhere . " or ";
		$sWhere.=KeyWhere($keys);
	}
//	$strSQL = AddWhere($gstrSQL,$sWhere);
	$strSQL = gSQLWhere($sWhere);
	$strWhereClause=$sWhere;
}
else
{
	$strWhereClause=@$_SESSION[$strTableName."_where"];
	$strSQL = gSQLWhere($strWhereClause);
}
if(postvalue("pdf"))
	$strWhereClause = @$_SESSION[$strTableName."_pdfwhere"];

$_SESSION[$strTableName."_pdfwhere"] = $strWhereClause;


$strOrderBy=$_SESSION[$strTableName."_order"];
if(!$strOrderBy)
	$strOrderBy=$gstrOrderBy;
$strSQL.=" ".trim($strOrderBy);

$strSQLbak = $strSQL;
if(function_exists("BeforeQueryPrint"))
	BeforeQueryPrint($strSQL,$strWhereClause,$strOrderBy);

//	Rebuild SQL if needed

if(function_exists("ListGetRowCount") || function_exists("ListQuery"))
{
	if (isset($_SESSION[$strTableName.'_advsearch']))
	{
		$searchObj = unserialize($_SESSION[$strTableName.'_advsearch']);
			
	}
	else
	{
		$allSearchFields = GetTableData($strTableName, '.allSearchFields', array());
		$searchObj = new SearchClause($strTableName, $allSearchFields, $strTableName);
	}
}

if($strSQL!=$strSQLbak)
{
//	changed $strSQL - old style	
	$numrows=GetRowCount($strSQL);
}
else
{
	$strSQL = gSQLWhere($strWhereClause);
	$strSQL.=" ".trim($strOrderBy);
	
	$rowcount=false;
	if(function_exists("ListGetRowCount"))
	{
		$masterKeysReq=array();
		$detailKeysForCurrentTable = GetDetailKeysByMasterTable($_SESSION[$strTableName."_mastertable"], $strTableName);
		for($i = 0; $i < count($detailKeysForCurrentTable); $i ++)
			$masterKeysReq[]=$_SESSION[$strTableName."_masterkey".($i + 1)];
			$rowcount=ListGetRowCount($searchObj,$_SESSION[$strTableName."_mastertable"],$masterKeysReq,$selected_recs);
	}
	if($rowcount!==false)
		$numrows=$rowcount;
	else
		$numrows=gSQLRowCount($strWhereClause,0);
}

LogInfo($strSQL);

$mypage=(integer)$_SESSION[$strTableName."_pagenumber"];
if(!$mypage)
	$mypage=1;

//	page size
$PageSize=(integer)$_SESSION[$strTableName."_pagesize"];
if(!$PageSize)
	$PageSize = GetTableData($strTableName,".pageSize",0);

$recno=1;
$records=0;	
$pageindex=1;

$maxpages=1;

if(!$all)
{	
	if($numrows)
	{
		$maxRecords = $numrows;
		$maxpages=ceil($maxRecords/$PageSize);
		if($mypage > $maxpages)
			$mypage = $maxpages;
		if($mypage<1) 
			$mypage=1;
		$maxrecs=$PageSize;
	}
	$listarray=false;
	if(function_exists("ListQuery"))
		$listarray=ListQuery($searchObj,$_SESSION[$strTableName."_arrFieldForSort"],$_SESSION[$strTableName."_arrHowFieldSort"],$_SESSION[$strTableName."_mastertable"],$masterKeysReq,$selected_recs,$PageSize,$mypage);
	if($listarray!==false)
		$rs = $listarray;
	else
	{	
			if($numrows)
		{
			$strSQL.=" limit ".(($mypage-1)*$PageSize).",".$PageSize;
		}
		$rs=db_query($strSQL,$conn);
	}
	
	
	//	hide colunm headers if needed
	$recordsonpage=$numrows-($mypage-1)*$PageSize;
	if($recordsonpage>$PageSize)
		$recordsonpage=$PageSize;
		
	$xt->assign("page_number",true);
	$xt->assign("maxpages",$maxpages);
	$xt->assign("pageno",$mypage);
}
else
{
	$listarray=false;
	if(function_exists("ListQuery"))
		$listarray=ListQuery($searchObj,$_SESSION[$strTableName."_arrFieldForSort"],$_SESSION[$strTableName."_arrHowFieldSort"],$_SESSION[$strTableName."_mastertable"],$masterKeysReq,$selected_recs,$PageSize,$mypage);
	if($listarray!==false)
		$rs = $listarray;
	else
		$rs=db_query($strSQL,$conn);
	$recordsonpage = $numrows;
	$maxpages=ceil($recordsonpage/30);
	$xt->assign("page_number",true);
	$xt->assign("maxpages",$maxpages);
	
}

$colsonpage=1;
if($colsonpage>$recordsonpage)
	$colsonpage=$recordsonpage;
if($colsonpage<1)
	$colsonpage=1;


//	fill $rowinfo array
	$pages = array();
	$rowinfo = array();
	$rowinfo["data"]=array();
	if(function_exists("ListFetchArray"))
		$data = ListFetchArray($rs);
	else
		$data = db_fetch_array($rs);	
	while($data)
	{
		if(function_exists("BeforeProcessRowPrint"))
		{
			if(!BeforeProcessRowPrint($data))
			{
				if(function_exists("ListFetchArray"))
					$data = ListFetchArray($rs);
				else
					$data = db_fetch_array($rs);
				continue;
			}
		}
		break;
	}
	while($data && ($all || $recno<=$PageSize))
	{
		$row=array();
		$row["grid_record"]=array();
		$row["grid_record"]["data"]=array();
		for($col=1;$data && ($all || $recno<=$PageSize) && $col<=1;$col++)
		{
			$record=array();
			$recno++;
			$records++;
			$keylink="";
			$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));


//	id - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id", ""),"field=id".$keylink,"",MODE_PRINT);
			$record["id_value"]=$value;

//	name - 
			$value="";
				$value = ProcessLargeText(GetData($data,"name", ""),"field=name".$keylink,"",MODE_PRINT);
			$record["name_value"]=$value;

//	host - 
			$value="";
				$value = ProcessLargeText(GetData($data,"host", ""),"field=host".$keylink,"",MODE_PRINT);
			$record["host_value"]=$value;

//	nat - 
			$value="";
				$value = ProcessLargeText(GetData($data,"nat", ""),"field=nat".$keylink,"",MODE_PRINT);
			$record["nat_value"]=$value;

//	type - 
			$value="";
				$value = ProcessLargeText(GetData($data,"type", ""),"field=type".$keylink,"",MODE_PRINT);
			$record["type_value"]=$value;

//	accountcode - 
			$value="";
				$value = ProcessLargeText(GetData($data,"accountcode", ""),"field=accountcode".$keylink,"",MODE_PRINT);
			$record["accountcode_value"]=$value;

//	amaflags - 
			$value="";
				$value = ProcessLargeText(GetData($data,"amaflags", ""),"field=amaflags".$keylink,"",MODE_PRINT);
			$record["amaflags_value"]=$value;

//	call-limit - 
			$value="";
				$value = ProcessLargeText(GetData($data,"call-limit", ""),"field=call%2Dlimit".$keylink,"",MODE_PRINT);
			$record["call_limit_value"]=$value;

//	callgroup - 
			$value="";
				$value = ProcessLargeText(GetData($data,"callgroup", ""),"field=callgroup".$keylink,"",MODE_PRINT);
			$record["callgroup_value"]=$value;

//	callerid - 
			$value="";
				$value = ProcessLargeText(GetData($data,"callerid", ""),"field=callerid".$keylink,"",MODE_PRINT);
			$record["callerid_value"]=$value;

//	cancallforward - 
			$value="";
				$value = ProcessLargeText(GetData($data,"cancallforward", ""),"field=cancallforward".$keylink,"",MODE_PRINT);
			$record["cancallforward_value"]=$value;

//	canreinvite - 
			$value="";
				$value = ProcessLargeText(GetData($data,"canreinvite", ""),"field=canreinvite".$keylink,"",MODE_PRINT);
			$record["canreinvite_value"]=$value;

//	context - 
			$value="";
				$value = ProcessLargeText(GetData($data,"context", ""),"field=context".$keylink,"",MODE_PRINT);
			$record["context_value"]=$value;

//	defaultip - 
			$value="";
				$value = ProcessLargeText(GetData($data,"defaultip", ""),"field=defaultip".$keylink,"",MODE_PRINT);
			$record["defaultip_value"]=$value;

//	dtmfmode - 
			$value="";
				$value = ProcessLargeText(GetData($data,"dtmfmode", ""),"field=dtmfmode".$keylink,"",MODE_PRINT);
			$record["dtmfmode_value"]=$value;

//	fromuser - 
			$value="";
				$value = ProcessLargeText(GetData($data,"fromuser", ""),"field=fromuser".$keylink,"",MODE_PRINT);
			$record["fromuser_value"]=$value;

//	fromdomain - 
			$value="";
				$value = ProcessLargeText(GetData($data,"fromdomain", ""),"field=fromdomain".$keylink,"",MODE_PRINT);
			$record["fromdomain_value"]=$value;

//	insecure - 
			$value="";
				$value = ProcessLargeText(GetData($data,"insecure", ""),"field=insecure".$keylink,"",MODE_PRINT);
			$record["insecure_value"]=$value;

//	language - 
			$value="";
				$value = ProcessLargeText(GetData($data,"language", ""),"field=language".$keylink,"",MODE_PRINT);
			$record["language_value"]=$value;

//	mailbox - 
			$value="";
				$value = ProcessLargeText(GetData($data,"mailbox", ""),"field=mailbox".$keylink,"",MODE_PRINT);
			$record["mailbox_value"]=$value;

//	md5secret - 
			$value="";
				$value = ProcessLargeText(GetData($data,"md5secret", ""),"field=md5secret".$keylink,"",MODE_PRINT);
			$record["md5secret_value"]=$value;

//	deny - 
			$value="";
				$value = ProcessLargeText(GetData($data,"deny", ""),"field=deny".$keylink,"",MODE_PRINT);
			$record["deny_value"]=$value;

//	permit - 
			$value="";
				$value = ProcessLargeText(GetData($data,"permit", ""),"field=permit".$keylink,"",MODE_PRINT);
			$record["permit_value"]=$value;

//	mask - 
			$value="";
				$value = ProcessLargeText(GetData($data,"mask", ""),"field=mask".$keylink,"",MODE_PRINT);
			$record["mask_value"]=$value;

//	musiconhold - 
			$value="";
				$value = ProcessLargeText(GetData($data,"musiconhold", ""),"field=musiconhold".$keylink,"",MODE_PRINT);
			$record["musiconhold_value"]=$value;

//	pickupgroup - 
			$value="";
				$value = ProcessLargeText(GetData($data,"pickupgroup", ""),"field=pickupgroup".$keylink,"",MODE_PRINT);
			$record["pickupgroup_value"]=$value;

//	qualify - 
			$value="";
				$value = ProcessLargeText(GetData($data,"qualify", ""),"field=qualify".$keylink,"",MODE_PRINT);
			$record["qualify_value"]=$value;

//	rtcachefriends - 
			$value="";
				$value = ProcessLargeText(GetData($data,"rtcachefriends", ""),"field=rtcachefriends".$keylink,"",MODE_PRINT);
			$record["rtcachefriends_value"]=$value;

//	regexten - 
			$value="";
				$value = ProcessLargeText(GetData($data,"regexten", ""),"field=regexten".$keylink,"",MODE_PRINT);
			$record["regexten_value"]=$value;

//	restrictcid - 
			$value="";
				$value = ProcessLargeText(GetData($data,"restrictcid", ""),"field=restrictcid".$keylink,"",MODE_PRINT);
			$record["restrictcid_value"]=$value;

//	rtptimeout - 
			$value="";
				$value = ProcessLargeText(GetData($data,"rtptimeout", ""),"field=rtptimeout".$keylink,"",MODE_PRINT);
			$record["rtptimeout_value"]=$value;

//	rtpholdtimeout - 
			$value="";
				$value = ProcessLargeText(GetData($data,"rtpholdtimeout", ""),"field=rtpholdtimeout".$keylink,"",MODE_PRINT);
			$record["rtpholdtimeout_value"]=$value;

//	secret - 
			$value="";
				$value = ProcessLargeText(GetData($data,"secret", ""),"field=secret".$keylink,"",MODE_PRINT);
			$record["secret_value"]=$value;

//	setvar - 
			$value="";
				$value = ProcessLargeText(GetData($data,"setvar", ""),"field=setvar".$keylink,"",MODE_PRINT);
			$record["setvar_value"]=$value;

//	disallow - 
			$value="";
				$value = ProcessLargeText(GetData($data,"disallow", ""),"field=disallow".$keylink,"",MODE_PRINT);
			$record["disallow_value"]=$value;

//	allow - 
			$value="";
				$value = ProcessLargeText(GetData($data,"allow", ""),"field=allow".$keylink,"",MODE_PRINT);
			$record["allow_value"]=$value;

//	fullcontact - 
			$value="";
				$value = ProcessLargeText(GetData($data,"fullcontact", ""),"field=fullcontact".$keylink,"",MODE_PRINT);
			$record["fullcontact_value"]=$value;

//	ipaddr - 
			$value="";
				$value = ProcessLargeText(GetData($data,"ipaddr", ""),"field=ipaddr".$keylink,"",MODE_PRINT);
			$record["ipaddr_value"]=$value;

//	port - 
			$value="";
				$value = ProcessLargeText(GetData($data,"port", ""),"field=port".$keylink,"",MODE_PRINT);
			$record["port_value"]=$value;

//	regserver - 
			$value="";
				$value = ProcessLargeText(GetData($data,"regserver", ""),"field=regserver".$keylink,"",MODE_PRINT);
			$record["regserver_value"]=$value;

//	regseconds - 
			$value="";
				$value = ProcessLargeText(GetData($data,"regseconds", ""),"field=regseconds".$keylink,"",MODE_PRINT);
			$record["regseconds_value"]=$value;

//	lastms - 
			$value="";
				$value = ProcessLargeText(GetData($data,"lastms", ""),"field=lastms".$keylink,"",MODE_PRINT);
			$record["lastms_value"]=$value;

//	username - 
			$value="";
				$value = ProcessLargeText(GetData($data,"username", ""),"field=username".$keylink,"",MODE_PRINT);
			$record["username_value"]=$value;

//	defaultuser - 
			$value="";
				$value = ProcessLargeText(GetData($data,"defaultuser", ""),"field=defaultuser".$keylink,"",MODE_PRINT);
			$record["defaultuser_value"]=$value;

//	subscribecontext - 
			$value="";
				$value = ProcessLargeText(GetData($data,"subscribecontext", ""),"field=subscribecontext".$keylink,"",MODE_PRINT);
			$record["subscribecontext_value"]=$value;

//	useragent - 
			$value="";
				$value = ProcessLargeText(GetData($data,"useragent", ""),"field=useragent".$keylink,"",MODE_PRINT);
			$record["useragent_value"]=$value;

//	gateway - 
			$value="";
				$value = ProcessLargeText(GetData($data,"gateway", ""),"field=gateway".$keylink,"",MODE_PRINT);
			$record["gateway_value"]=$value;

//	id_horario - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id_horario", ""),"field=id%5Fhorario".$keylink,"",MODE_PRINT);
			$record["id_horario_value"]=$value;

//	mail - 
			$value="";
				$value = ProcessLargeText(GetData($data,"mail", ""),"field=mail".$keylink,"",MODE_PRINT);
			$record["mail_value"]=$value;

//	grava_chamada - 
			$value="";
				$value = ProcessLargeText(GetData($data,"grava_chamada", ""),"field=grava%5Fchamada".$keylink,"",MODE_PRINT);
			$record["grava_chamada_value"]=$value;

//	tp_ramal - 
			$value="";
				$value = ProcessLargeText(GetData($data,"tp_ramal", ""),"field=tp%5Framal".$keylink,"",MODE_PRINT);
			$record["tp_ramal_value"]=$value;

//	Transbordo - 
			$value="";
				$value = ProcessLargeText(GetData($data,"Transbordo", ""),"field=Transbordo".$keylink,"",MODE_PRINT);
			$record["Transbordo_value"]=$value;

//	id_interf - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id_interf", ""),"field=id%5Finterf".$keylink,"",MODE_PRINT);
			$record["id_interf_value"]=$value;

//	ident_interf - 
			$value="";
				$value = ProcessLargeText(GetData($data,"ident_interf", ""),"field=ident%5Finterf".$keylink,"",MODE_PRINT);
			$record["ident_interf_value"]=$value;

//	tp_chamada - 
			$value="";
				$value = ProcessLargeText(GetData($data,"tp_chamada", ""),"field=tp%5Fchamada".$keylink,"",MODE_PRINT);
			$record["tp_chamada_value"]=$value;

//	flg_cadeado - 
			$value="";
				$value = ProcessLargeText(GetData($data,"flg_cadeado", ""),"field=flg%5Fcadeado".$keylink,"",MODE_PRINT);
			$record["flg_cadeado_value"]=$value;

//	desvio - 
			$value="";
				$value = ProcessLargeText(GetData($data,"desvio", ""),"field=desvio".$keylink,"",MODE_PRINT);
			$record["desvio_value"]=$value;

//	id_pesquisa - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id_pesquisa", ""),"field=id%5Fpesquisa".$keylink,"",MODE_PRINT);
			$record["id_pesquisa_value"]=$value;

//	desvio_ddr - 
			$value="";
				$value = ProcessLargeText(GetData($data,"desvio_ddr", ""),"field=desvio%5Fddr".$keylink,"",MODE_PRINT);
			$record["desvio_ddr_value"]=$value;

//	id_saida - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id_saida", ""),"field=id%5Fsaida".$keylink,"",MODE_PRINT);
			$record["id_saida_value"]=$value;
			if($col<$colsonpage)
				$record["endrecord_block"]=true;
			$record["grid_recordheader"]=true;
			$record["grid_vrecord"]=true;
			
			if(function_exists("BeforeMoveNextPrint"))
				BeforeMoveNextPrint($data,$row,$record);
				
			$row["grid_record"]["data"][]=$record;
			
			if(function_exists("ListFetchArray"))
				$data = ListFetchArray($rs);
			else
				$data = db_fetch_array($rs);
				
			while($data)
			{
				if(function_exists("BeforeProcessRowPrint"))
				{
					if(!BeforeProcessRowPrint($data))
					{
						if(function_exists("ListFetchArray"))
							$data = ListFetchArray($rs);
						else
							$data = db_fetch_array($rs);
						continue;
					}
				}
				break;
			}
		}
		if($col<=$colsonpage)
		{
			$row["grid_record"]["data"][count($row["grid_record"]["data"])-1]["endrecord_block"]=false;
		}
		$row["grid_rowspace"]=true;
		$row["grid_recordspace"] = array("data"=>array());
		for($i=0;$i<$colsonpage*2-1;$i++)
			$row["grid_recordspace"]["data"][]=true;
		
		$rowinfo["data"][]=$row;
		
		if($all && $records>=30)
		{
			$page=array("grid_row" =>$rowinfo);
			$page["pageno"]=$pageindex;
			$pageindex++;
			$pages[] = $page;
			$records=0;
			$rowinfo=array();
		}
		
	}
	if(count($rowinfo))
	{
		$page=array("grid_row" =>$rowinfo);
		if($all)
			$page["pageno"]=$pageindex;
		$pages[] = $page;
	}
	
	for($i=0;$i<count($pages);$i++)
	{
	 	if($i<count($pages)-1)
			$pages[$i]["begin"]="<div name=page class=printpage>";
		else
		    $pages[$i]["begin"]="<div name=page>";
			
		$pages[$i]["end"]="</div>";
	}

	$page=array();
	$page["data"]=&$pages;
	$xt->assignbyref("page",$page);


	

$strSQL=$_SESSION[$strTableName."_sql"];

$isPdfView = false;
if (count($buttonHandlers) || $isPdfView || $onLoadJsCode)
{
	$pageObject->body["begin"] .="<script type=\"text/javascript\" src=\"include/jquery.js\"></script>\r\n";
	$pageObject->body["begin"].="<script language=\"JavaScript\" src=\"include/jsfunctions.js\"></script>\r\n";

	if ($pageObject->debugJSMode === true)
	{
		$pageObject->body["begin"].="<script language=\"JavaScript\" src=\"include/runnerJS/Runner.js\"></script>\r\n";
		$pageObject->body["begin"].="<script language=\"JavaScript\" src=\"include/runnerJS/Util.js\"></script>\r\n";
	}
	else
	{
		$pageObject->body["begin"].="<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";
	}	
}


if (count($buttonHandlers) || $isPdfView || $onLoadJsCode)
	$pageObject->body["end"] .= "<script>".$pageObject->PrepareJS()."</script>";

$xt->assignbyref("body",$pageObject->body);
$xt->assign("grid_block",true);

$xt->assign("id_fieldheadercolumn",true);
$xt->assign("id_fieldheader",true);
$xt->assign("id_fieldcolumn",true);
$xt->assign("id_fieldfootercolumn",true);
$xt->assign("name_fieldheadercolumn",true);
$xt->assign("name_fieldheader",true);
$xt->assign("name_fieldcolumn",true);
$xt->assign("name_fieldfootercolumn",true);
$xt->assign("host_fieldheadercolumn",true);
$xt->assign("host_fieldheader",true);
$xt->assign("host_fieldcolumn",true);
$xt->assign("host_fieldfootercolumn",true);
$xt->assign("nat_fieldheadercolumn",true);
$xt->assign("nat_fieldheader",true);
$xt->assign("nat_fieldcolumn",true);
$xt->assign("nat_fieldfootercolumn",true);
$xt->assign("type_fieldheadercolumn",true);
$xt->assign("type_fieldheader",true);
$xt->assign("type_fieldcolumn",true);
$xt->assign("type_fieldfootercolumn",true);
$xt->assign("accountcode_fieldheadercolumn",true);
$xt->assign("accountcode_fieldheader",true);
$xt->assign("accountcode_fieldcolumn",true);
$xt->assign("accountcode_fieldfootercolumn",true);
$xt->assign("amaflags_fieldheadercolumn",true);
$xt->assign("amaflags_fieldheader",true);
$xt->assign("amaflags_fieldcolumn",true);
$xt->assign("amaflags_fieldfootercolumn",true);
$xt->assign("call_limit_fieldheadercolumn",true);
$xt->assign("call_limit_fieldheader",true);
$xt->assign("call_limit_fieldcolumn",true);
$xt->assign("call_limit_fieldfootercolumn",true);
$xt->assign("callgroup_fieldheadercolumn",true);
$xt->assign("callgroup_fieldheader",true);
$xt->assign("callgroup_fieldcolumn",true);
$xt->assign("callgroup_fieldfootercolumn",true);
$xt->assign("callerid_fieldheadercolumn",true);
$xt->assign("callerid_fieldheader",true);
$xt->assign("callerid_fieldcolumn",true);
$xt->assign("callerid_fieldfootercolumn",true);
$xt->assign("cancallforward_fieldheadercolumn",true);
$xt->assign("cancallforward_fieldheader",true);
$xt->assign("cancallforward_fieldcolumn",true);
$xt->assign("cancallforward_fieldfootercolumn",true);
$xt->assign("canreinvite_fieldheadercolumn",true);
$xt->assign("canreinvite_fieldheader",true);
$xt->assign("canreinvite_fieldcolumn",true);
$xt->assign("canreinvite_fieldfootercolumn",true);
$xt->assign("context_fieldheadercolumn",true);
$xt->assign("context_fieldheader",true);
$xt->assign("context_fieldcolumn",true);
$xt->assign("context_fieldfootercolumn",true);
$xt->assign("defaultip_fieldheadercolumn",true);
$xt->assign("defaultip_fieldheader",true);
$xt->assign("defaultip_fieldcolumn",true);
$xt->assign("defaultip_fieldfootercolumn",true);
$xt->assign("dtmfmode_fieldheadercolumn",true);
$xt->assign("dtmfmode_fieldheader",true);
$xt->assign("dtmfmode_fieldcolumn",true);
$xt->assign("dtmfmode_fieldfootercolumn",true);
$xt->assign("fromuser_fieldheadercolumn",true);
$xt->assign("fromuser_fieldheader",true);
$xt->assign("fromuser_fieldcolumn",true);
$xt->assign("fromuser_fieldfootercolumn",true);
$xt->assign("fromdomain_fieldheadercolumn",true);
$xt->assign("fromdomain_fieldheader",true);
$xt->assign("fromdomain_fieldcolumn",true);
$xt->assign("fromdomain_fieldfootercolumn",true);
$xt->assign("insecure_fieldheadercolumn",true);
$xt->assign("insecure_fieldheader",true);
$xt->assign("insecure_fieldcolumn",true);
$xt->assign("insecure_fieldfootercolumn",true);
$xt->assign("language_fieldheadercolumn",true);
$xt->assign("language_fieldheader",true);
$xt->assign("language_fieldcolumn",true);
$xt->assign("language_fieldfootercolumn",true);
$xt->assign("mailbox_fieldheadercolumn",true);
$xt->assign("mailbox_fieldheader",true);
$xt->assign("mailbox_fieldcolumn",true);
$xt->assign("mailbox_fieldfootercolumn",true);
$xt->assign("md5secret_fieldheadercolumn",true);
$xt->assign("md5secret_fieldheader",true);
$xt->assign("md5secret_fieldcolumn",true);
$xt->assign("md5secret_fieldfootercolumn",true);
$xt->assign("deny_fieldheadercolumn",true);
$xt->assign("deny_fieldheader",true);
$xt->assign("deny_fieldcolumn",true);
$xt->assign("deny_fieldfootercolumn",true);
$xt->assign("permit_fieldheadercolumn",true);
$xt->assign("permit_fieldheader",true);
$xt->assign("permit_fieldcolumn",true);
$xt->assign("permit_fieldfootercolumn",true);
$xt->assign("mask_fieldheadercolumn",true);
$xt->assign("mask_fieldheader",true);
$xt->assign("mask_fieldcolumn",true);
$xt->assign("mask_fieldfootercolumn",true);
$xt->assign("musiconhold_fieldheadercolumn",true);
$xt->assign("musiconhold_fieldheader",true);
$xt->assign("musiconhold_fieldcolumn",true);
$xt->assign("musiconhold_fieldfootercolumn",true);
$xt->assign("pickupgroup_fieldheadercolumn",true);
$xt->assign("pickupgroup_fieldheader",true);
$xt->assign("pickupgroup_fieldcolumn",true);
$xt->assign("pickupgroup_fieldfootercolumn",true);
$xt->assign("qualify_fieldheadercolumn",true);
$xt->assign("qualify_fieldheader",true);
$xt->assign("qualify_fieldcolumn",true);
$xt->assign("qualify_fieldfootercolumn",true);
$xt->assign("rtcachefriends_fieldheadercolumn",true);
$xt->assign("rtcachefriends_fieldheader",true);
$xt->assign("rtcachefriends_fieldcolumn",true);
$xt->assign("rtcachefriends_fieldfootercolumn",true);
$xt->assign("regexten_fieldheadercolumn",true);
$xt->assign("regexten_fieldheader",true);
$xt->assign("regexten_fieldcolumn",true);
$xt->assign("regexten_fieldfootercolumn",true);
$xt->assign("restrictcid_fieldheadercolumn",true);
$xt->assign("restrictcid_fieldheader",true);
$xt->assign("restrictcid_fieldcolumn",true);
$xt->assign("restrictcid_fieldfootercolumn",true);
$xt->assign("rtptimeout_fieldheadercolumn",true);
$xt->assign("rtptimeout_fieldheader",true);
$xt->assign("rtptimeout_fieldcolumn",true);
$xt->assign("rtptimeout_fieldfootercolumn",true);
$xt->assign("rtpholdtimeout_fieldheadercolumn",true);
$xt->assign("rtpholdtimeout_fieldheader",true);
$xt->assign("rtpholdtimeout_fieldcolumn",true);
$xt->assign("rtpholdtimeout_fieldfootercolumn",true);
$xt->assign("secret_fieldheadercolumn",true);
$xt->assign("secret_fieldheader",true);
$xt->assign("secret_fieldcolumn",true);
$xt->assign("secret_fieldfootercolumn",true);
$xt->assign("setvar_fieldheadercolumn",true);
$xt->assign("setvar_fieldheader",true);
$xt->assign("setvar_fieldcolumn",true);
$xt->assign("setvar_fieldfootercolumn",true);
$xt->assign("disallow_fieldheadercolumn",true);
$xt->assign("disallow_fieldheader",true);
$xt->assign("disallow_fieldcolumn",true);
$xt->assign("disallow_fieldfootercolumn",true);
$xt->assign("allow_fieldheadercolumn",true);
$xt->assign("allow_fieldheader",true);
$xt->assign("allow_fieldcolumn",true);
$xt->assign("allow_fieldfootercolumn",true);
$xt->assign("fullcontact_fieldheadercolumn",true);
$xt->assign("fullcontact_fieldheader",true);
$xt->assign("fullcontact_fieldcolumn",true);
$xt->assign("fullcontact_fieldfootercolumn",true);
$xt->assign("ipaddr_fieldheadercolumn",true);
$xt->assign("ipaddr_fieldheader",true);
$xt->assign("ipaddr_fieldcolumn",true);
$xt->assign("ipaddr_fieldfootercolumn",true);
$xt->assign("port_fieldheadercolumn",true);
$xt->assign("port_fieldheader",true);
$xt->assign("port_fieldcolumn",true);
$xt->assign("port_fieldfootercolumn",true);
$xt->assign("regserver_fieldheadercolumn",true);
$xt->assign("regserver_fieldheader",true);
$xt->assign("regserver_fieldcolumn",true);
$xt->assign("regserver_fieldfootercolumn",true);
$xt->assign("regseconds_fieldheadercolumn",true);
$xt->assign("regseconds_fieldheader",true);
$xt->assign("regseconds_fieldcolumn",true);
$xt->assign("regseconds_fieldfootercolumn",true);
$xt->assign("lastms_fieldheadercolumn",true);
$xt->assign("lastms_fieldheader",true);
$xt->assign("lastms_fieldcolumn",true);
$xt->assign("lastms_fieldfootercolumn",true);
$xt->assign("username_fieldheadercolumn",true);
$xt->assign("username_fieldheader",true);
$xt->assign("username_fieldcolumn",true);
$xt->assign("username_fieldfootercolumn",true);
$xt->assign("defaultuser_fieldheadercolumn",true);
$xt->assign("defaultuser_fieldheader",true);
$xt->assign("defaultuser_fieldcolumn",true);
$xt->assign("defaultuser_fieldfootercolumn",true);
$xt->assign("subscribecontext_fieldheadercolumn",true);
$xt->assign("subscribecontext_fieldheader",true);
$xt->assign("subscribecontext_fieldcolumn",true);
$xt->assign("subscribecontext_fieldfootercolumn",true);
$xt->assign("useragent_fieldheadercolumn",true);
$xt->assign("useragent_fieldheader",true);
$xt->assign("useragent_fieldcolumn",true);
$xt->assign("useragent_fieldfootercolumn",true);
$xt->assign("gateway_fieldheadercolumn",true);
$xt->assign("gateway_fieldheader",true);
$xt->assign("gateway_fieldcolumn",true);
$xt->assign("gateway_fieldfootercolumn",true);
$xt->assign("id_horario_fieldheadercolumn",true);
$xt->assign("id_horario_fieldheader",true);
$xt->assign("id_horario_fieldcolumn",true);
$xt->assign("id_horario_fieldfootercolumn",true);
$xt->assign("mail_fieldheadercolumn",true);
$xt->assign("mail_fieldheader",true);
$xt->assign("mail_fieldcolumn",true);
$xt->assign("mail_fieldfootercolumn",true);
$xt->assign("grava_chamada_fieldheadercolumn",true);
$xt->assign("grava_chamada_fieldheader",true);
$xt->assign("grava_chamada_fieldcolumn",true);
$xt->assign("grava_chamada_fieldfootercolumn",true);
$xt->assign("tp_ramal_fieldheadercolumn",true);
$xt->assign("tp_ramal_fieldheader",true);
$xt->assign("tp_ramal_fieldcolumn",true);
$xt->assign("tp_ramal_fieldfootercolumn",true);
$xt->assign("Transbordo_fieldheadercolumn",true);
$xt->assign("Transbordo_fieldheader",true);
$xt->assign("Transbordo_fieldcolumn",true);
$xt->assign("Transbordo_fieldfootercolumn",true);
$xt->assign("id_interf_fieldheadercolumn",true);
$xt->assign("id_interf_fieldheader",true);
$xt->assign("id_interf_fieldcolumn",true);
$xt->assign("id_interf_fieldfootercolumn",true);
$xt->assign("ident_interf_fieldheadercolumn",true);
$xt->assign("ident_interf_fieldheader",true);
$xt->assign("ident_interf_fieldcolumn",true);
$xt->assign("ident_interf_fieldfootercolumn",true);
$xt->assign("tp_chamada_fieldheadercolumn",true);
$xt->assign("tp_chamada_fieldheader",true);
$xt->assign("tp_chamada_fieldcolumn",true);
$xt->assign("tp_chamada_fieldfootercolumn",true);
$xt->assign("flg_cadeado_fieldheadercolumn",true);
$xt->assign("flg_cadeado_fieldheader",true);
$xt->assign("flg_cadeado_fieldcolumn",true);
$xt->assign("flg_cadeado_fieldfootercolumn",true);
$xt->assign("desvio_fieldheadercolumn",true);
$xt->assign("desvio_fieldheader",true);
$xt->assign("desvio_fieldcolumn",true);
$xt->assign("desvio_fieldfootercolumn",true);
$xt->assign("id_pesquisa_fieldheadercolumn",true);
$xt->assign("id_pesquisa_fieldheader",true);
$xt->assign("id_pesquisa_fieldcolumn",true);
$xt->assign("id_pesquisa_fieldfootercolumn",true);
$xt->assign("desvio_ddr_fieldheadercolumn",true);
$xt->assign("desvio_ddr_fieldheader",true);
$xt->assign("desvio_ddr_fieldcolumn",true);
$xt->assign("desvio_ddr_fieldfootercolumn",true);
$xt->assign("id_saida_fieldheadercolumn",true);
$xt->assign("id_saida_fieldheader",true);
$xt->assign("id_saida_fieldcolumn",true);
$xt->assign("id_saida_fieldfootercolumn",true);

	$record_header=array("data"=>array());
	for($i=0;$i<$colsonpage;$i++)
	{
		$rheader=array();
		if($i<$colsonpage-1)
		{
			$rheader["endrecordheader_block"]=true;
		}
		$record_header["data"][]=$rheader;
	}
	$xt->assignbyref("record_header",$record_header);
	$xt->assign("grid_header",true);
	$xt->assign("grid_footer",true);


$templatefile = "admin_users_print.htm";
	
if(function_exists("BeforeShowPrint"))
	BeforeShowPrint($xt,$templatefile);

if(!postvalue("pdf"))
	$xt->display($templatefile);
else
{
	$xt->load_template($templatefile);
	$page = $xt->fetch_loaded();
	$pagewidth=postvalue("width")*1.05;
	$pageheight=postvalue("height")*1.05;
	$landscape=false;
	if(postvalue("all"))
	{
		if($pagewidth>$pageheight)
		{
			$landscape=true;
			if($pagewidth/$pageheight<297/210)
				$pagewidth = 297/210*$pageheight;
		}
		else
		{
			if($pagewidth/$pageheight<210/297)
				$pagewidth = 210/297*$pageheight;
		}
	}
}

?>