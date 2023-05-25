<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("classes/searchclause.php");

add_nocache_headers();

include("include/ipbx_ramais_variables.php");

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


//	name - 
			$value="";
				$value = ProcessLargeText(GetData($data,"name", ""),"field=name".$keylink,"",MODE_PRINT);
			$record["name_value"]=$value;

//	secret - 
			$value="";
				$value = ProcessLargeText(GetData($data,"secret", ""),"field=secret".$keylink,"",MODE_PRINT);
			$record["secret_value"]=$value;

//	callerid - 
			$value="";
				$value = ProcessLargeText(GetData($data,"callerid", ""),"field=callerid".$keylink,"",MODE_PRINT);
			$record["callerid_value"]=$value;

//	mail - 
			$value="";
				$value = ProcessLargeText(GetData($data,"mail", ""),"field=mail".$keylink,"",MODE_PRINT);
			$record["mail_value"]=$value;

//	desvio_ddr - 
			$value="";
				$value=DisplayLookupWizard("desvio_ddr",$data["desvio_ddr"],$data,$keylink,MODE_PRINT);
			$record["desvio_ddr_value"]=$value;

//	desvio - 
			$value="";
				$value = ProcessLargeText(GetData($data,"desvio", ""),"field=desvio".$keylink,"",MODE_PRINT);
			$record["desvio_value"]=$value;

//	id_desvio - 
			$value="";
				$value=DisplayLookupWizard("id_desvio",$data["id_desvio"],$data,$keylink,MODE_PRINT);
			$record["id_desvio_value"]=$value;

//	accountcode - 
			$value="";
				$value=DisplayLookupWizard("accountcode",$data["accountcode"],$data,$keylink,MODE_PRINT);
			$record["accountcode_value"]=$value;

//	id_painel_op - 
			$value="";
				$value=DisplayLookupWizard("id_painel_op",$data["id_painel_op"],$data,$keylink,MODE_PRINT);
			$record["id_painel_op_value"]=$value;

//	flg_info_centrocusto - Checkbox
			$value="";
				$value = GetData($data,"flg_info_centrocusto", "Checkbox");
			$record["flg_info_centrocusto_value"]=$value;

//	flg_cadeado - Checkbox
			$value="";
				$value = GetData($data,"flg_cadeado", "Checkbox");
			$record["flg_cadeado_value"]=$value;

//	grava_chamada - Checkbox
			$value="";
				$value = GetData($data,"grava_chamada", "Checkbox");
			$record["grava_chamada_value"]=$value;

//	flg_show_mobile - Checkbox
			$value="";
				$value = GetData($data,"flg_show_mobile", "Checkbox");
			$record["flg_show_mobile_value"]=$value;

//	tp_ramal - 
			$value="";
				$value = ProcessLargeText(GetData($data,"tp_ramal", ""),"field=tp%5Framal".$keylink,"",MODE_PRINT);
			$record["tp_ramal_value"]=$value;

//	id_pesquisa - 
			$value="";
				$value=DisplayLookupWizard("id_pesquisa",$data["id_pesquisa"],$data,$keylink,MODE_PRINT);
			$record["id_pesquisa_value"]=$value;

//	call-limit - 
			$value="";
				$value = ProcessLargeText(GetData($data,"call-limit", ""),"field=call%2Dlimit".$keylink,"",MODE_PRINT);
			$record["call_limit_value"]=$value;

//	pickupgroup - 
			$value="";
				$value=DisplayLookupWizard("pickupgroup",$data["pickupgroup"],$data,$keylink,MODE_PRINT);
			$record["pickupgroup_value"]=$value;

//	context - 
			$value="";
				$value=DisplayLookupWizard("context",$data["context"],$data,$keylink,MODE_PRINT);
			$record["context_value"]=$value;

//	allow - 
			$value="";
				$value = ProcessLargeText(GetData($data,"allow", ""),"field=allow".$keylink,"",MODE_PRINT);
			$record["allow_value"]=$value;

//	tp_chamada - 
			$value="";
				$value = ProcessLargeText(GetData($data,"tp_chamada", ""),"field=tp%5Fchamada".$keylink,"",MODE_PRINT);
			$record["tp_chamada_value"]=$value;

//	Transbordo - 
			$value="";
				$value = ProcessLargeText(GetData($data,"Transbordo", ""),"field=Transbordo".$keylink,"",MODE_PRINT);
			$record["Transbordo_value"]=$value;

//	id_horario - 
			$value="";
				$value=DisplayLookupWizard("id_horario",$data["id_horario"],$data,$keylink,MODE_PRINT);
			$record["id_horario_value"]=$value;

//	id_saida - 
			$value="";
				$value = ProcessLargeText(GetData($data,"id_saida", ""),"field=id%5Fsaida".$keylink,"",MODE_PRINT);
			$record["id_saida_value"]=$value;

//	id_interf - 
			$value="";
				$value=DisplayLookupWizard("id_interf",$data["id_interf"],$data,$keylink,MODE_PRINT);
			$record["id_interf_value"]=$value;

//	ident_interf - 
			$value="";
				$value=DisplayLookupWizard("ident_interf",$data["ident_interf"],$data,$keylink,MODE_PRINT);
			$record["ident_interf_value"]=$value;

//	id_provis - 
			$value="";
				$value=DisplayLookupWizard("id_provis",$data["id_provis"],$data,$keylink,MODE_PRINT);
			$record["id_provis_value"]=$value;

//	mc_addr - 
			$value="";
				$value = ProcessLargeText(GetData($data,"mc_addr", ""),"field=mc%5Faddr".$keylink,"",MODE_PRINT);
			$record["mc_addr_value"]=$value;

//	id_lang - 
			$value="";
				$value=DisplayLookupWizard("id_lang",$data["id_lang"],$data,$keylink,MODE_PRINT);
			$record["id_lang_value"]=$value;
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

$xt->assign("name_fieldheadercolumn",true);
$xt->assign("name_fieldheader",true);
$xt->assign("name_fieldcolumn",true);
$xt->assign("name_fieldfootercolumn",true);
$xt->assign("secret_fieldheadercolumn",true);
$xt->assign("secret_fieldheader",true);
$xt->assign("secret_fieldcolumn",true);
$xt->assign("secret_fieldfootercolumn",true);
$xt->assign("callerid_fieldheadercolumn",true);
$xt->assign("callerid_fieldheader",true);
$xt->assign("callerid_fieldcolumn",true);
$xt->assign("callerid_fieldfootercolumn",true);
$xt->assign("mail_fieldheadercolumn",true);
$xt->assign("mail_fieldheader",true);
$xt->assign("mail_fieldcolumn",true);
$xt->assign("mail_fieldfootercolumn",true);
$xt->assign("desvio_ddr_fieldheadercolumn",true);
$xt->assign("desvio_ddr_fieldheader",true);
$xt->assign("desvio_ddr_fieldcolumn",true);
$xt->assign("desvio_ddr_fieldfootercolumn",true);
$xt->assign("desvio_fieldheadercolumn",true);
$xt->assign("desvio_fieldheader",true);
$xt->assign("desvio_fieldcolumn",true);
$xt->assign("desvio_fieldfootercolumn",true);
$xt->assign("id_desvio_fieldheadercolumn",true);
$xt->assign("id_desvio_fieldheader",true);
$xt->assign("id_desvio_fieldcolumn",true);
$xt->assign("id_desvio_fieldfootercolumn",true);
$xt->assign("accountcode_fieldheadercolumn",true);
$xt->assign("accountcode_fieldheader",true);
$xt->assign("accountcode_fieldcolumn",true);
$xt->assign("accountcode_fieldfootercolumn",true);
$xt->assign("id_painel_op_fieldheadercolumn",true);
$xt->assign("id_painel_op_fieldheader",true);
$xt->assign("id_painel_op_fieldcolumn",true);
$xt->assign("id_painel_op_fieldfootercolumn",true);
$xt->assign("flg_info_centrocusto_fieldheadercolumn",true);
$xt->assign("flg_info_centrocusto_fieldheader",true);
$xt->assign("flg_info_centrocusto_fieldcolumn",true);
$xt->assign("flg_info_centrocusto_fieldfootercolumn",true);
$xt->assign("flg_cadeado_fieldheadercolumn",true);
$xt->assign("flg_cadeado_fieldheader",true);
$xt->assign("flg_cadeado_fieldcolumn",true);
$xt->assign("flg_cadeado_fieldfootercolumn",true);
$xt->assign("grava_chamada_fieldheadercolumn",true);
$xt->assign("grava_chamada_fieldheader",true);
$xt->assign("grava_chamada_fieldcolumn",true);
$xt->assign("grava_chamada_fieldfootercolumn",true);
$xt->assign("flg_show_mobile_fieldheadercolumn",true);
$xt->assign("flg_show_mobile_fieldheader",true);
$xt->assign("flg_show_mobile_fieldcolumn",true);
$xt->assign("flg_show_mobile_fieldfootercolumn",true);
$xt->assign("tp_ramal_fieldheadercolumn",true);
$xt->assign("tp_ramal_fieldheader",true);
$xt->assign("tp_ramal_fieldcolumn",true);
$xt->assign("tp_ramal_fieldfootercolumn",true);
$xt->assign("id_pesquisa_fieldheadercolumn",true);
$xt->assign("id_pesquisa_fieldheader",true);
$xt->assign("id_pesquisa_fieldcolumn",true);
$xt->assign("id_pesquisa_fieldfootercolumn",true);
$xt->assign("call_limit_fieldheadercolumn",true);
$xt->assign("call_limit_fieldheader",true);
$xt->assign("call_limit_fieldcolumn",true);
$xt->assign("call_limit_fieldfootercolumn",true);
$xt->assign("pickupgroup_fieldheadercolumn",true);
$xt->assign("pickupgroup_fieldheader",true);
$xt->assign("pickupgroup_fieldcolumn",true);
$xt->assign("pickupgroup_fieldfootercolumn",true);
$xt->assign("context_fieldheadercolumn",true);
$xt->assign("context_fieldheader",true);
$xt->assign("context_fieldcolumn",true);
$xt->assign("context_fieldfootercolumn",true);
$xt->assign("allow_fieldheadercolumn",true);
$xt->assign("allow_fieldheader",true);
$xt->assign("allow_fieldcolumn",true);
$xt->assign("allow_fieldfootercolumn",true);
$xt->assign("tp_chamada_fieldheadercolumn",true);
$xt->assign("tp_chamada_fieldheader",true);
$xt->assign("tp_chamada_fieldcolumn",true);
$xt->assign("tp_chamada_fieldfootercolumn",true);
$xt->assign("Transbordo_fieldheadercolumn",true);
$xt->assign("Transbordo_fieldheader",true);
$xt->assign("Transbordo_fieldcolumn",true);
$xt->assign("Transbordo_fieldfootercolumn",true);
$xt->assign("id_horario_fieldheadercolumn",true);
$xt->assign("id_horario_fieldheader",true);
$xt->assign("id_horario_fieldcolumn",true);
$xt->assign("id_horario_fieldfootercolumn",true);
$xt->assign("id_saida_fieldheadercolumn",true);
$xt->assign("id_saida_fieldheader",true);
$xt->assign("id_saida_fieldcolumn",true);
$xt->assign("id_saida_fieldfootercolumn",true);
$xt->assign("id_interf_fieldheadercolumn",true);
$xt->assign("id_interf_fieldheader",true);
$xt->assign("id_interf_fieldcolumn",true);
$xt->assign("id_interf_fieldfootercolumn",true);
$xt->assign("ident_interf_fieldheadercolumn",true);
$xt->assign("ident_interf_fieldheader",true);
$xt->assign("ident_interf_fieldcolumn",true);
$xt->assign("ident_interf_fieldfootercolumn",true);
$xt->assign("id_provis_fieldheadercolumn",true);
$xt->assign("id_provis_fieldheader",true);
$xt->assign("id_provis_fieldcolumn",true);
$xt->assign("id_provis_fieldfootercolumn",true);
$xt->assign("mc_addr_fieldheadercolumn",true);
$xt->assign("mc_addr_fieldheader",true);
$xt->assign("mc_addr_fieldcolumn",true);
$xt->assign("mc_addr_fieldfootercolumn",true);
$xt->assign("id_lang_fieldheadercolumn",true);
$xt->assign("id_lang_fieldheader",true);
$xt->assign("id_lang_fieldcolumn",true);
$xt->assign("id_lang_fieldfootercolumn",true);

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


$templatefile = "ipbx_ramais_print.htm";
	
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