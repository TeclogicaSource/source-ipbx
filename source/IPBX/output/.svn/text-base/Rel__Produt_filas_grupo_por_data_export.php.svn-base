<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");


include("include/Rel__Produt_filas_grupo_por_data_variables.php");

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

// Modify query: remove blob fields from fieldlist.
// Blob fields on an export page are shown using imager.php (for example).
// They don't need to be selected from DB in export.php itself.
$gQuery->ReplaceFieldsWithDummies(GetBinaryFieldsIndices());


//	Before Process event
if(function_exists("BeforeProcessExport"))
	BeforeProcessExport($conn);

$strWhereClause="";
$selected_recs=array();
$options = "1";
if (@$_REQUEST["a"]!="")
{
	$options = "";
	$sWhere = "1=0";	

//	process selection
	$selected_recs=array();
	if (@$_REQUEST["mdelete"])
	{
		foreach(@$_REQUEST["mdelete"] as $ind)
		{
			$keys=array();
			$selected_recs[]=$keys;
		}
	}
	elseif(@$_REQUEST["selection"])
	{
		foreach(@$_REQUEST["selection"] as $keyblock)
		{
			$arr=explode("&",refine($keyblock));
			if(count($arr)<0)
				continue;
			$keys=array();
			$selected_recs[]=$keys;
		}
	}

	foreach($selected_recs as $keys)
	{
		$sWhere = $sWhere . " or ";
		$sWhere.=KeyWhere($keys);
	}


	$strSQL = gSQLWhere($sWhere);
	$strWhereClause=$sWhere;
	
	$_SESSION[$strTableName."_SelectedSQL"] = $strSQL;
	$_SESSION[$strTableName."_SelectedWhere"] = $sWhere;
}

if ($_SESSION[$strTableName."_SelectedSQL"]!="" && @$_REQUEST["records"]=="") 
{
	$strSQL = $_SESSION[$strTableName."_SelectedSQL"];
	$strWhereClause=@$_SESSION[$strTableName."_SelectedWhere"];
}
else
{
	$strWhereClause=@$_SESSION[$strTableName."_where"];
	$strSQL=gSQLWhere($strWhereClause);
}

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

$mypage=1;
if(@$_REQUEST["type"])
{
//	order by
	$strOrderBy=$_SESSION[$strTableName."_order"];
	if(!$strOrderBy)
		$strOrderBy=$gstrOrderBy;
	$strSQL.=" ".trim($strOrderBy);

	$strSQLbak = $strSQL;
	if(function_exists("BeforeQueryExport"))
		BeforeQueryExport($strSQL,$strWhereClause,$strOrderBy);
//	Rebuild SQL if needed
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

//	 Pagination:

	$nPageSize=0;
	if(@$_REQUEST["records"]=="page" && $numrows)
	{
		$mypage=(integer)@$_SESSION[$strTableName."_pagenumber"];
		$nPageSize=(integer)@$_SESSION[$strTableName."_pagesize"];
		if($numrows<=($mypage-1)*$nPageSize)
			$mypage=ceil($numrows/$nPageSize);
		if(!$nPageSize)
			$nPageSize = GetTableData($strTableName,".pageSize",0);
		if(!$mypage)
			$mypage=1;

		$strSQL.=" limit ".(($mypage-1)*$nPageSize).",".$nPageSize;
	}
	$listarray=false;
	if(function_exists("ListQuery"))
		$listarray=ListQuery($searchObj,$_SESSION[$strTableName."_arrFieldForSort"],$_SESSION[$strTableName."_arrHowFieldSort"],$_SESSION[$strTableName."_mastertable"],$masterKeysReq,$selected_recs,$nPageSize,$mypage);
	if($listarray!==false)
		$rs = $listarray;
	else
	{
	$rs=db_query($strSQL,$conn);
	}

	if(!ini_get("safe_mode"))
		set_time_limit(300);
	
	if(@$_REQUEST["type"]=="excel")
	{
//	remove grouping
		$locale_info["LOCALE_SGROUPING"]="0";
		$locale_info["LOCALE_SMONGROUPING"]="0";
		ExportToExcel();
	}
	else if(@$_REQUEST["type"]=="word")
	{
		ExportToWord();
	}
	else if(@$_REQUEST["type"]=="xml")
	{
		ExportToXML();
	}
	else if(@$_REQUEST["type"]=="csv")
	{
		$locale_info["LOCALE_SGROUPING"]="0";
		$locale_info["LOCALE_SDECIMAL"]=".";
		$locale_info["LOCALE_SMONGROUPING"]="0";
		$locale_info["LOCALE_SMONDECIMALSEP"]=".";
		ExportToCSV();
	}
	else if(@$_REQUEST["type"]=="pdf")
	{
		ExportToPDF();
	}

	db_close($conn);
	return;
}

header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

include('include/xtempl.php');
include('classes/runnerpage.php');
$xt = new Xtempl();

$id = postvalue("id") != "" ? postvalue("id") : 1;
//array of params for classes
$params = array("pageType" => PAGE_EXPORT, "id" =>$id, "tName"=>$strTableName);
$pageObject = new RunnerPage($params);

// add button events if exist
$buttonHandlers = GetTableData($pageObject->tName, ".buttonHandlers_".$pageObject->getPageType(), array());
$pageObject->addButtonHandlers($buttonHandlers);
	

// add onload event
$onLoadJsCode = GetTableData($pageObject->tName, ".jsOnloadExport", '');
$pageObject->addOnLoadJsEvent($onLoadJsCode);

if($options)
{
	$xt->assign("rangeheader_block",true);
	$xt->assign("range_block",true);
}

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
$pageObject->body["begin"] .="<form action=\"Rel__Produt_filas_grupo_por_data_export.php\" method=POST id=frmexport name=frmexport>";
$pageObject->body["end"] .= "</form><script>".$pageObject->PrepareJS()."</script>";
$xt->assignbyref("body",$pageObject->body);

$xt->display("Rel__Produt_filas_grupo_por_data_export.htm");


function ExportToExcel()
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=Rel__Produt_filas_grupo_por_data.xls");

	echo "<html>";
	echo "<html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">";
	
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$cCharset."\">";
	echo "<body>";
	echo "<table border=1>";

	WriteTableData();

	echo "</table>";
	echo "</body>";
	echo "</html>";
}

function ExportToWord()
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-word");
	header("Content-Disposition: attachment;Filename=Rel__Produt_filas_grupo_por_data.doc");

	echo "<html>";
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$cCharset."\">";
	echo "<body>";
	echo "<table border=1>";

	WriteTableData();

	echo "</table>";
	echo "</body>";
	echo "</html>";
}

function ExportToXML()
{
	global $nPageSize,$rs,$strTableName,$conn;
	header("Content-Type: text/xml");
	header("Content-Disposition: attachment;Filename=Rel__Produt_filas_grupo_por_data.xml");
	if(function_exists("ListFetchArray"))
		$row = ListFetchArray($rs);
	else
		$row = db_fetch_array($rs);	
	if(!$row)
		return;
		
	global $cCharset;
	
	echo "<?xml version=\"1.0\" encoding=\"".$cCharset."\" standalone=\"yes\"?>\r\n";
	echo "<table>\r\n";
	$i=0;
	
	
	while((!$nPageSize || $i<$nPageSize) && $row)
	{
		$values = array();
			$values["dt_entrada"] = GetData($row,"dt_entrada","");
			$values["nm_grupo"] = DisplayLookupWizard("nm_grupo",$row["nm_grupo"],$row,"",MODE_EXPORT);		
			$values["Receb."] = GetData($row,"Receb.","");
			$values["Atend."] = GetData($row,"Atend.","");
			$values["Aband."] = GetData($row,"Aband.","");
			$values["TME"] = GetData($row,"TME","");
			$values["TMA"] = GetData($row,"TMA","");
			$values["TMO"] = GetData($row,"TMO","");
			$values["Aband.Contr."] = GetData($row,"Aband.Contr.","");
			$values["Aband.Real."] = GetData($row,"Aband.Real.","");
			$values["NivelServicoEsperaContratado"] = GetData($row,"NivelServicoEsperaContratado","");
			$values["NivelServicoEsperaRealizado"] = GetData($row,"NivelServicoEsperaRealizado","");
			$values["NivelServicoEsperaQuantidade"] = GetData($row,"NivelServicoEsperaQuantidade","");
			$values["NivelServicoAtendimentoContratado"] = GetData($row,"NivelServicoAtendimentoContratado","");
			$values["NivelServicoAtendimentoRealizado"] = GetData($row,"NivelServicoAtendimentoRealizado","");
			$values["NivelServicoAtendimentoQuantidade"] = GetData($row,"NivelServicoAtendimentoQuantidade","");
			$values["NivelServicoOperacaoContratado"] = GetData($row,"NivelServicoOperacaoContratado","");
			$values["NivelServicoOperacaoRealizado"] = GetData($row,"NivelServicoOperacaoRealizado","");
			$values["NivelServicoOperacaoQuantidade"] = GetData($row,"NivelServicoOperacaoQuantidade","");
		
		
		$eventRes = true;
		if (function_exists('BeforeOut'))
		{			
			$eventRes = BeforeOut($row, $values);
		}
		if ($eventRes)
		{
			$i++;
			echo "<row>\r\n";
			foreach ($values as $fName => $val)
			{
				$field = htmlspecialchars(XMLNameEncode($fName));
				echo "<".$field.">";
				echo htmlspecialchars($values[$fName]);
				echo "</".$field.">\r\n";
			}
			echo "</row>\r\n";
		}
		
		
		if(function_exists("ListFetchArray"))
			$row = ListFetchArray($rs);
		else
			$row = db_fetch_array($rs);	
	}
	echo "</table>\r\n";
}

function ExportToCSV()
{
	global $rs,$nPageSize,$strTableName,$conn;
	header("Content-Type: application/csv");
	header("Content-Disposition: attachment;Filename=Rel__Produt_filas_grupo_por_data.csv");
	
	if(function_exists("ListFetchArray"))
		$row = ListFetchArray($rs);
	else
		$row = db_fetch_array($rs);	
	if(!$row)
		return;
	
		
		
	$totals=array();

	
// write header
	$outstr="";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"dt_entrada\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nm_grupo\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Receb.\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Atend.\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Aband.\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"TME\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"TMA\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"TMO\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Aband.Contr.\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Aband.Real.\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"NivelServicoEsperaContratado\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"NivelServicoEsperaRealizado\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"NivelServicoEsperaQuantidade\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"NivelServicoAtendimentoContratado\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"NivelServicoAtendimentoRealizado\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"NivelServicoAtendimentoQuantidade\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"NivelServicoOperacaoContratado\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"NivelServicoOperacaoRealizado\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"NivelServicoOperacaoQuantidade\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		
		
		$values = array();
			$format="Short Date";
			$values["dt_entrada"] = htmlspecialchars(GetData($row,"dt_entrada",$format));
		$values["nm_grupo"] = DisplayLookupWizard("nm_grupo",$row["nm_grupo"],$row,"",MODE_EXPORT);
			$format="HTML";
			$values["Receb."] = htmlspecialchars(GetData($row,"Receb.",$format));
			$format="HTML";
			$values["Atend."] = htmlspecialchars(GetData($row,"Atend.",$format));
			$format="HTML";
			$values["Aband."] = htmlspecialchars(GetData($row,"Aband.",$format));
			$format="Time";
			$values["TME"] = htmlspecialchars(GetData($row,"TME",$format));
			$format="Time";
			$values["TMA"] = htmlspecialchars(GetData($row,"TMA",$format));
			$format="Time";
			$values["TMO"] = htmlspecialchars(GetData($row,"TMO",$format));
			$format="";
			$values["Aband.Contr."] = htmlspecialchars(GetData($row,"Aband.Contr.",$format));
			$format="Number";
			$values["Aband.Real."] = htmlspecialchars($row["Aband.Real."]);
			$format="";
			$values["NivelServicoEsperaContratado"] = htmlspecialchars(GetData($row,"NivelServicoEsperaContratado",$format));
			$format="Number";
			$values["NivelServicoEsperaRealizado"] = htmlspecialchars($row["NivelServicoEsperaRealizado"]);
			$format="";
			$values["NivelServicoEsperaQuantidade"] = htmlspecialchars(GetData($row,"NivelServicoEsperaQuantidade",$format));
			$format="";
			$values["NivelServicoAtendimentoContratado"] = htmlspecialchars(GetData($row,"NivelServicoAtendimentoContratado",$format));
			$format="Number";
			$values["NivelServicoAtendimentoRealizado"] = htmlspecialchars($row["NivelServicoAtendimentoRealizado"]);
			$format="";
			$values["NivelServicoAtendimentoQuantidade"] = htmlspecialchars(GetData($row,"NivelServicoAtendimentoQuantidade",$format));
			$format="";
			$values["NivelServicoOperacaoContratado"] = htmlspecialchars(GetData($row,"NivelServicoOperacaoContratado",$format));
			$format="Number";
			$values["NivelServicoOperacaoRealizado"] = htmlspecialchars($row["NivelServicoOperacaoRealizado"]);
			$format="";
			$values["NivelServicoOperacaoQuantidade"] = htmlspecialchars(GetData($row,"NivelServicoOperacaoQuantidade",$format));

		$eventRes = true;
		if (function_exists('BeforeOut'))
		{			
			$eventRes = BeforeOut($row,$values);
		}
		if ($eventRes)
		{
			$outstr="";			
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["dt_entrada"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["nm_grupo"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Receb."]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Atend."]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Aband."]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["TME"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["TMA"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["TMO"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Aband.Contr."]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Aband.Real."]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["NivelServicoEsperaContratado"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["NivelServicoEsperaRealizado"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["NivelServicoEsperaQuantidade"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["NivelServicoAtendimentoContratado"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["NivelServicoAtendimentoRealizado"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["NivelServicoAtendimentoQuantidade"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["NivelServicoOperacaoContratado"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["NivelServicoOperacaoRealizado"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["NivelServicoOperacaoQuantidade"]).'"';
			echo $outstr;
		}
		
		$iNumberOfRows++;
		if(function_exists("ListFetchArray"))
			$row = ListFetchArray($rs);
		else
			$row = db_fetch_array($rs);	
			
		if(((!$nPageSize || $iNumberOfRows<$nPageSize) && $row) && $eventRes)
			echo "\r\n";
	}
}


function WriteTableData()
{
	global $rs,$nPageSize,$strTableName,$conn;
	
	if(function_exists("ListFetchArray"))
		$row = ListFetchArray($rs);
	else
		$row = db_fetch_array($rs);	
	if(!$row)
		return;
// write header
	echo "<tr>";
	if($_REQUEST["type"]=="excel")
	{
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Data").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Grupo").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Recebidas").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Atendendidas").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Abandonadas").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("TME").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("TMA").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("TMO").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Abd.Cont.").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Abd.Real(%)").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Esp.Cont.").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nív.Serv.Esp.(%)").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Esp.Quant.").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Atd.Cont.").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nív.Serv.Atend.(%)").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Atd.Quant.").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Oper.Cont.").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nív.Serv.Oper.(%)").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Oper.Quant").'</td>';	
	}
	else
	{
		echo "<td>"."Data"."</td>";
		echo "<td>"."Grupo"."</td>";
		echo "<td>"."Recebidas"."</td>";
		echo "<td>"."Atendendidas"."</td>";
		echo "<td>"."Abandonadas"."</td>";
		echo "<td>"."TME"."</td>";
		echo "<td>"."TMA"."</td>";
		echo "<td>"."TMO"."</td>";
		echo "<td>"."Abd.Cont."."</td>";
		echo "<td>"."Abd.Real(%)"."</td>";
		echo "<td>"."Esp.Cont."."</td>";
		echo "<td>"."Nív.Serv.Esp.(%)"."</td>";
		echo "<td>"."Esp.Quant."."</td>";
		echo "<td>"."Atd.Cont."."</td>";
		echo "<td>"."Nív.Serv.Atend.(%)"."</td>";
		echo "<td>"."Atd.Quant."."</td>";
		echo "<td>"."Oper.Cont."."</td>";
		echo "<td>"."Nív.Serv.Oper.(%)"."</td>";
		echo "<td>"."Oper.Quant"."</td>";
	}
	echo "</tr>";

	$totals=array();
// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
			
		$values = array();	

					
							$format="Short Date";
			
			$values["dt_entrada"] = GetData($row,"dt_entrada",$format);
					$values["nm_grupo"] = "";	
			if(strlen($row["nm_grupo"]))
			{
				$values["nm_grupo"] = DisplayLookupWizard("nm_grupo", $row["nm_grupo"], $row,"",MODE_EXPORT);
			}
					
							$format="HTML";
			
			$values["Receb."] = GetData($row,"Receb.",$format);
					
							$format="HTML";
			
			$values["Atend."] = GetData($row,"Atend.",$format);
					
							$format="HTML";
			
			$values["Aband."] = GetData($row,"Aband.",$format);
					
							$format="Time";
			
			$values["TME"] = GetData($row,"TME",$format);
					
							$format="Time";
			
			$values["TMA"] = GetData($row,"TMA",$format);
					
							$format="Time";
			
			$values["TMO"] = GetData($row,"TMO",$format);
					
							$format="";
			
			$values["Aband.Contr."] = GetData($row,"Aband.Contr.",$format);
					
							$format="Number";
			
			$values["Aband.Real."] = GetData($row,"Aband.Real.",$format);
					
							$format="";
			
			$values["NivelServicoEsperaContratado"] = GetData($row,"NivelServicoEsperaContratado",$format);
					
							$format="Number";
			
			$values["NivelServicoEsperaRealizado"] = GetData($row,"NivelServicoEsperaRealizado",$format);
					
							$format="";
			
			$values["NivelServicoEsperaQuantidade"] = GetData($row,"NivelServicoEsperaQuantidade",$format);
					
							$format="";
			
			$values["NivelServicoAtendimentoContratado"] = GetData($row,"NivelServicoAtendimentoContratado",$format);
					
							$format="Number";
			
			$values["NivelServicoAtendimentoRealizado"] = GetData($row,"NivelServicoAtendimentoRealizado",$format);
					
							$format="";
			
			$values["NivelServicoAtendimentoQuantidade"] = GetData($row,"NivelServicoAtendimentoQuantidade",$format);
					
							$format="";
			
			$values["NivelServicoOperacaoContratado"] = GetData($row,"NivelServicoOperacaoContratado",$format);
					
							$format="Number";
			
			$values["NivelServicoOperacaoRealizado"] = GetData($row,"NivelServicoOperacaoRealizado",$format);
					
							$format="";
			
			$values["NivelServicoOperacaoQuantidade"] = GetData($row,"NivelServicoOperacaoQuantidade",$format);

		
		$eventRes = true;
		if (function_exists('BeforeOut'))
		{			
			$eventRes = BeforeOut($row, $values);
		}
		if ($eventRes)
		{
			$iNumberOfRows++;
			echo "<tr>";

							echo '<td>';
						
			
									$format="Short Date";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["dt_entrada"]);
					else
						echo htmlspecialchars($values["dt_entrada"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
				
								if($_REQUEST["type"]=="excel")
					echo PrepareForExcel($values["nm_grupo"]);
				else
					echo htmlspecialchars($values["nm_grupo"]);
					
			echo '</td>';
							echo '<td>';
						
			
									$format="HTML";
									echo htmlspecialchars($values["Receb."]);
			echo '</td>';
							echo '<td>';
						
			
									$format="HTML";
									echo htmlspecialchars($values["Atend."]);
			echo '</td>';
							echo '<td>';
						
			
									$format="HTML";
									echo htmlspecialchars($values["Aband."]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Time";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["TME"]);
					else
						echo htmlspecialchars($values["TME"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Time";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["TMA"]);
					else
						echo htmlspecialchars($values["TMA"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Time";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["TMO"]);
					else
						echo htmlspecialchars($values["TMO"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["Aband.Contr."]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Number";
									echo htmlspecialchars($values["Aband.Real."]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["NivelServicoEsperaContratado"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Number";
									echo htmlspecialchars($values["NivelServicoEsperaRealizado"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["NivelServicoEsperaQuantidade"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["NivelServicoAtendimentoContratado"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Number";
									echo htmlspecialchars($values["NivelServicoAtendimentoRealizado"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["NivelServicoAtendimentoQuantidade"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["NivelServicoOperacaoContratado"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Number";
									echo htmlspecialchars($values["NivelServicoOperacaoRealizado"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["NivelServicoOperacaoQuantidade"]);
			echo '</td>';
			echo "</tr>";
		}		
		
		
		if(function_exists("ListFetchArray"))
			$row = ListFetchArray($rs);
		else
			$row = db_fetch_array($rs);	
	}
	
}

function XMLNameEncode($strValue)
{	
	$search=array(" ","#","'","/","\\","(",")",",","[");
	$ret=str_replace($search,"",$strValue);
	$search=array("]","+","\"","-","_","|","}","{","=");
	$ret=str_replace($search,"",$ret);
	return $ret;
}

function PrepareForExcel($str)
{
	$ret = htmlspecialchars($str);
	if (substr($ret,0,1)== "=") 
		$ret = "&#61;".substr($ret,1);
	return $ret;

}





?>