<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");


include("include/ipbx_fila_pesquisa_ura_rev_resp_Report_variables.php");

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
			$keys["id_resp_pesq"]=refine($_REQUEST["mdelete1"][mdeleteIndex($ind)]);
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
			$keys["id_resp_pesq"]=urldecode($arr[0]);
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
$pageObject->body["begin"] .="<form action=\"ipbx_fila_pesquisa_ura_rev_resp_Report_export.php\" method=POST id=frmexport name=frmexport>";
$pageObject->body["end"] .= "</form><script>".$pageObject->PrepareJS()."</script>";
$xt->assignbyref("body",$pageObject->body);

$xt->display("ipbx_fila_pesquisa_ura_rev_resp_Report_export.htm");


function ExportToExcel()
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=ipbx_fila_pesquisa_ura_rev_resp_Report.xls");

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
	header("Content-Disposition: attachment;Filename=ipbx_fila_pesquisa_ura_rev_resp_Report.doc");

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
	header("Content-Disposition: attachment;Filename=ipbx_fila_pesquisa_ura_rev_resp_Report.xml");
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
			$values["id_resp_pesq"] = GetData($row,"id_resp_pesq","");
			$values["dt_criado"] = GetData($row,"dt_criado","");
			$values["dsc_pesquisa"] = GetData($row,"dsc_pesquisa","");
			$values["dsc_mensagem"] = GetData($row,"dsc_mensagem","");
			$values["nm_telefone"] = GetData($row,"nm_telefone","");
			$values["id_cliente"] = GetData($row,"id_cliente","");
			$values["resp_usuario"] = GetData($row,"resp_usuario","");
			$values["dt_resp"] = GetData($row,"dt_resp","");
			$values["id_pesquisa"] = GetData($row,"id_pesquisa","");
			$values["nr_ordem"] = GetData($row,"nr_ordem","");
			$values["txt_resp"] = GetData($row,"txt_resp","");
		
		
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
	header("Content-Disposition: attachment;Filename=ipbx_fila_pesquisa_ura_rev_resp_Report.csv");
	
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
	$outstr.= "\"id_resp_pesq\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"dt_criado\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"dsc_pesquisa\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"dsc_mensagem\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nm_telefone\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"id_cliente\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"resp_usuario\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"dt_resp\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"id_pesquisa\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nr_ordem\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"txt_resp\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		
		
		$values = array();
			$format="";
			$values["id_resp_pesq"] = htmlspecialchars(GetData($row,"id_resp_pesq",$format));
			$format="Datetime";
			$values["dt_criado"] = htmlspecialchars(GetData($row,"dt_criado",$format));
			$format="";
			$values["dsc_pesquisa"] = htmlspecialchars(GetData($row,"dsc_pesquisa",$format));
			$format="";
			$values["dsc_mensagem"] = htmlspecialchars(GetData($row,"dsc_mensagem",$format));
			$format="";
			$values["nm_telefone"] = htmlspecialchars(GetData($row,"nm_telefone",$format));
			$format="";
			$values["id_cliente"] = htmlspecialchars(GetData($row,"id_cliente",$format));
			$format="";
			$values["resp_usuario"] = htmlspecialchars(GetData($row,"resp_usuario",$format));
			$format="Short Date";
			$values["dt_resp"] = htmlspecialchars(GetData($row,"dt_resp",$format));
			$format="";
			$values["id_pesquisa"] = htmlspecialchars(GetData($row,"id_pesquisa",$format));
			$format="";
			$values["nr_ordem"] = htmlspecialchars(GetData($row,"nr_ordem",$format));
			$format="";
			$values["txt_resp"] = htmlspecialchars(GetData($row,"txt_resp",$format));

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
			$outstr.='"'.htmlspecialchars($values["id_resp_pesq"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["dt_criado"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["dsc_pesquisa"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["dsc_mensagem"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["nm_telefone"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["id_cliente"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["resp_usuario"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["dt_resp"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["id_pesquisa"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["nr_ordem"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["txt_resp"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Id Resp Pesq").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Data Ocorrencia").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nome Pesquisa").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pergunta").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Telefone").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ticket do Cliente").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Resposta Numérica").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Data da Resposta").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Id Pesquisa").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nr Ordem").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Texto da Resposta ").'</td>';	
	}
	else
	{
		echo "<td>"."Id Resp Pesq"."</td>";
		echo "<td>"."Data Ocorrencia"."</td>";
		echo "<td>"."Nome Pesquisa"."</td>";
		echo "<td>"."Pergunta"."</td>";
		echo "<td>"."Telefone"."</td>";
		echo "<td>"."Ticket do Cliente"."</td>";
		echo "<td>"."Resposta Numérica"."</td>";
		echo "<td>"."Data da Resposta"."</td>";
		echo "<td>"."Id Pesquisa"."</td>";
		echo "<td>"."Nr Ordem"."</td>";
		echo "<td>"."Texto da Resposta "."</td>";
	}
	echo "</tr>";

	$totals=array();
// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
			
		$values = array();	

					
							$format="";
			
			$values["id_resp_pesq"] = GetData($row,"id_resp_pesq",$format);
					
							$format="Datetime";
			
			$values["dt_criado"] = GetData($row,"dt_criado",$format);
					
							$format="";
			
			$values["dsc_pesquisa"] = GetData($row,"dsc_pesquisa",$format);
					
							$format="";
			
			$values["dsc_mensagem"] = GetData($row,"dsc_mensagem",$format);
					
							$format="";
			
			$values["nm_telefone"] = GetData($row,"nm_telefone",$format);
					
							$format="";
			
			$values["id_cliente"] = GetData($row,"id_cliente",$format);
					
							$format="";
			
			$values["resp_usuario"] = GetData($row,"resp_usuario",$format);
					
							$format="Short Date";
			
			$values["dt_resp"] = GetData($row,"dt_resp",$format);
					
							$format="";
			
			$values["id_pesquisa"] = GetData($row,"id_pesquisa",$format);
					
							$format="";
			
			$values["nr_ordem"] = GetData($row,"nr_ordem",$format);
					
							$format="";
			
			$values["txt_resp"] = GetData($row,"txt_resp",$format);

		
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
						
			
									$format="";
									echo htmlspecialchars($values["id_resp_pesq"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Datetime";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["dt_criado"]);
					else
						echo htmlspecialchars($values["dt_criado"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["dsc_pesquisa"]);
					else
						echo htmlspecialchars($values["dsc_pesquisa"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["dsc_mensagem"]);
					else
						echo htmlspecialchars($values["dsc_mensagem"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["nm_telefone"]);
					else
						echo htmlspecialchars($values["nm_telefone"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["id_cliente"]);
					else
						echo htmlspecialchars($values["id_cliente"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["resp_usuario"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Short Date";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["dt_resp"]);
					else
						echo htmlspecialchars($values["dt_resp"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["id_pesquisa"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["nr_ordem"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["txt_resp"]);
					else
						echo htmlspecialchars($values["txt_resp"]);
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