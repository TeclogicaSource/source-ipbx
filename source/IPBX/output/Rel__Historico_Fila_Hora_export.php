<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");


include("include/Rel__Historico_Fila_Hora_variables.php");

if(!@$_SESSION["UserID"])
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}
if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Export"))
{
	echo "<p>"."Voc� n�o tem permiss�o para acessar esta tabela"."<a href=\"login.php\">"."Voltar � p�gina de Login"."</a></p>";
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
			$numrows=gSQLRowCount($strWhereClause,1);
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
$pageObject->body["begin"] .="<form action=\"Rel__Historico_Fila_Hora_export.php\" method=POST id=frmexport name=frmexport>";
$pageObject->body["end"] .= "</form><script>".$pageObject->PrepareJS()."</script>";
$xt->assignbyref("body",$pageObject->body);

$xt->display("Rel__Historico_Fila_Hora_export.htm");


function ExportToExcel()
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=Rel__Historico_Fila_Hora.xls");

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
	header("Content-Disposition: attachment;Filename=Rel__Historico_Fila_Hora.doc");

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
	header("Content-Disposition: attachment;Filename=Rel__Historico_Fila_Hora.xml");
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
			$values["Fila"] = DisplayLookupWizard("Fila",$row["Fila"],$row,"",MODE_EXPORT);		
			$values["Ano"] = GetData($row,"Ano","");
			$values["Mes"] = GetData($row,"Mes","");
			$values["Hora"] = GetData($row,"Hora","");
			$values["Agent.Disp"] = GetData($row,"Agent.Disp","");
			$values["Agent.Disp.Maior"] = GetData($row,"Agent.Disp.Maior","");
			$values["Agent.Pausa.Maior"] = GetData($row,"Agent.Pausa.Maior","");
			$values["AgentesPausa"] = GetData($row,"AgentesPausa","");
			$values["Chamadas Atendidas"] = GetData($row,"Chamadas Atendidas","");
			$values["Chamadas Abandonadas"] = GetData($row,"Chamadas Abandonadas","");
		
		
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
	header("Content-Disposition: attachment;Filename=Rel__Historico_Fila_Hora.csv");
	
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
	$outstr.= "\"Fila\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Ano\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Mes\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Hora\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Agent.Disp\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Agent.Disp.Maior\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Agent.Pausa.Maior\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"AgentesPausa\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Chamadas Atendidas\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Chamadas Abandonadas\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		
		
		$values = array();
		$values["Fila"] = DisplayLookupWizard("Fila",$row["Fila"],$row,"",MODE_EXPORT);
			$format="";
			$values["Ano"] = htmlspecialchars(GetData($row,"Ano",$format));
			$format="";
			$values["Mes"] = htmlspecialchars(GetData($row,"Mes",$format));
			$format="Time";
			$values["Hora"] = htmlspecialchars(GetData($row,"Hora",$format));
			$format="HTML";
			$values["Agent.Disp"] = htmlspecialchars(GetData($row,"Agent.Disp",$format));
			$format="";
			$values["Agent.Disp.Maior"] = htmlspecialchars(GetData($row,"Agent.Disp.Maior",$format));
			$format="";
			$values["Agent.Pausa.Maior"] = htmlspecialchars(GetData($row,"Agent.Pausa.Maior",$format));
			$format="HTML";
			$values["AgentesPausa"] = htmlspecialchars(GetData($row,"AgentesPausa",$format));
			$format="HTML";
			$values["Chamadas Atendidas"] = htmlspecialchars(GetData($row,"Chamadas Atendidas",$format));
			$format="HTML";
			$values["Chamadas Abandonadas"] = htmlspecialchars(GetData($row,"Chamadas Abandonadas",$format));

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
			$outstr.='"'.htmlspecialchars($values["Fila"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Ano"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Mes"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Hora"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Agent.Disp"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Agent.Disp.Maior"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Agent.Pausa.Maior"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["AgentesPausa"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Chamadas Atendidas"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Chamadas Abandonadas"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fila").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ano").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Mes").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Hora").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("M�dia de Agentes Dispon�veis").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Maior qtd. de agentes Dispon�veis").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Maior qtd. de Agentes Pausados").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("M�dia de Agentes Pausa").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Total de chamadas atendidas").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Total de chamadas Abandonadas").'</td>';	
	}
	else
	{
		echo "<td>"."Fila"."</td>";
		echo "<td>"."Ano"."</td>";
		echo "<td>"."Mes"."</td>";
		echo "<td>"."Hora"."</td>";
		echo "<td>"."M�dia de Agentes Dispon�veis"."</td>";
		echo "<td>"."Maior qtd. de agentes Dispon�veis"."</td>";
		echo "<td>"."Maior qtd. de Agentes Pausados"."</td>";
		echo "<td>"."M�dia de Agentes Pausa"."</td>";
		echo "<td>"."Total de chamadas atendidas"."</td>";
		echo "<td>"."Total de chamadas Abandonadas"."</td>";
	}
	echo "</tr>";

	$totals=array();
// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
			
		$values = array();	

					$values["Fila"] = "";	
			if(strlen($row["Fila"]))
			{
				$values["Fila"] = DisplayLookupWizard("Fila", $row["Fila"], $row,"",MODE_EXPORT);
			}
					
							$format="";
			
			$values["Ano"] = GetData($row,"Ano",$format);
					
							$format="";
			
			$values["Mes"] = GetData($row,"Mes",$format);
					
							$format="Time";
			
			$values["Hora"] = GetData($row,"Hora",$format);
					
							$format="HTML";
			
			$values["Agent.Disp"] = GetData($row,"Agent.Disp",$format);
					
							$format="";
			
			$values["Agent.Disp.Maior"] = GetData($row,"Agent.Disp.Maior",$format);
					
							$format="";
			
			$values["Agent.Pausa.Maior"] = GetData($row,"Agent.Pausa.Maior",$format);
					
							$format="HTML";
			
			$values["AgentesPausa"] = GetData($row,"AgentesPausa",$format);
					
							$format="HTML";
			
			$values["Chamadas Atendidas"] = GetData($row,"Chamadas Atendidas",$format);
					
							$format="HTML";
			
			$values["Chamadas Abandonadas"] = GetData($row,"Chamadas Abandonadas",$format);

		
		$eventRes = true;
		if (function_exists('BeforeOut'))
		{			
			$eventRes = BeforeOut($row, $values);
		}
		if ($eventRes)
		{
			$iNumberOfRows++;
			echo "<tr>";

							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
				
								if($_REQUEST["type"]=="excel")
					echo PrepareForExcel($values["Fila"]);
				else
					echo htmlspecialchars($values["Fila"]);
					
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Ano"]);
					else
						echo htmlspecialchars($values["Ano"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Mes"]);
					else
						echo htmlspecialchars($values["Mes"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Time";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Hora"]);
					else
						echo htmlspecialchars($values["Hora"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="HTML";
									echo htmlspecialchars($values["Agent.Disp"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["Agent.Disp.Maior"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["Agent.Pausa.Maior"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="HTML";
									echo htmlspecialchars($values["AgentesPausa"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="HTML";
									echo htmlspecialchars($values["Chamadas Atendidas"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="HTML";
									echo htmlspecialchars($values["Chamadas Abandonadas"]);
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