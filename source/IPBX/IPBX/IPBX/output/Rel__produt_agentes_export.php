<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");


include("include/Rel__produt_agentes_variables.php");

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
$pageObject->body["begin"] .="<form action=\"Rel__produt_agentes_export.php\" method=POST id=frmexport name=frmexport>";
$pageObject->body["end"] .= "</form><script>".$pageObject->PrepareJS()."</script>";
$xt->assignbyref("body",$pageObject->body);

$xt->display("Rel__produt_agentes_export.htm");


function ExportToExcel()
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=Rel__produt_agentes.xls");

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
	header("Content-Disposition: attachment;Filename=Rel__produt_agentes.doc");

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
	header("Content-Disposition: attachment;Filename=Rel__produt_agentes.xml");
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
			$values["fila"] = DisplayLookupWizard("fila",$row["fila"],$row,"",MODE_EXPORT);		
			$values["agente"] = DisplayLookupWizard("agente",$row["agente"],$row,"",MODE_EXPORT);		
			$values["tot_logado"] = GetData($row,"tot_logado","");
			$values["qtd_atend"] = GetData($row,"qtd_atend","");
			$values["tot_atend"] = GetData($row,"tot_atend","");
			$values["med_atend"] = GetData($row,"med_atend","");
			$values["tot_pausa"] = GetData($row,"tot_pausa","");
			$values["qtd_nao_atend"] = GetData($row,"qtd_nao_atend","");
			$values["tot_recebida"] = GetData($row,"tot_recebida","");
			$values["cntrb_indiv"] = GetData($row,"cntrb_indiv","");
			$values["cntrb_tot"] = GetData($row,"cntrb_tot","");
		
		
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
	header("Content-Disposition: attachment;Filename=Rel__produt_agentes.csv");
	
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
	$outstr.= "\"fila\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"agente\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"tot_logado\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"qtd_atend\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"tot_atend\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"med_atend\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"tot_pausa\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"qtd_nao_atend\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"tot_recebida\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"cntrb_indiv\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"cntrb_tot\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		
		
		$values = array();
		$values["fila"] = DisplayLookupWizard("fila",$row["fila"],$row,"",MODE_EXPORT);
		$values["agente"] = DisplayLookupWizard("agente",$row["agente"],$row,"",MODE_EXPORT);
			$format="Time";
			$values["tot_logado"] = htmlspecialchars(GetData($row,"tot_logado",$format));
			$format="";
			$values["qtd_atend"] = htmlspecialchars(GetData($row,"qtd_atend",$format));
			$format="Time";
			$values["tot_atend"] = htmlspecialchars(GetData($row,"tot_atend",$format));
			$format="Time";
			$values["med_atend"] = htmlspecialchars(GetData($row,"med_atend",$format));
			$format="Time";
			$values["tot_pausa"] = htmlspecialchars(GetData($row,"tot_pausa",$format));
			$format="";
			$values["qtd_nao_atend"] = htmlspecialchars(GetData($row,"qtd_nao_atend",$format));
			$format="";
			$values["tot_recebida"] = htmlspecialchars(GetData($row,"tot_recebida",$format));
			$format="";
			$values["cntrb_indiv"] = htmlspecialchars(GetData($row,"cntrb_indiv",$format));
			$format="";
			$values["cntrb_tot"] = htmlspecialchars(GetData($row,"cntrb_tot",$format));

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
			$outstr.='"'.htmlspecialchars($values["fila"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["agente"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["tot_logado"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["qtd_atend"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["tot_atend"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["med_atend"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["tot_pausa"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["qtd_nao_atend"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["tot_recebida"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["cntrb_indiv"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["cntrb_tot"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Agente").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Total Logado").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Quant. Atendimento").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Total Atendimento").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("M�dia Atendimento").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Total em Pausa").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Qtd Nao Atend").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tot Recebida").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Cntrb Indiv").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Cntrb Tot").'</td>';	
	}
	else
	{
		echo "<td>"."Fila"."</td>";
		echo "<td>"."Agente"."</td>";
		echo "<td>"."Total Logado"."</td>";
		echo "<td>"."Quant. Atendimento"."</td>";
		echo "<td>"."Total Atendimento"."</td>";
		echo "<td>"."M�dia Atendimento"."</td>";
		echo "<td>"."Total em Pausa"."</td>";
		echo "<td>"."Qtd Nao Atend"."</td>";
		echo "<td>"."Tot Recebida"."</td>";
		echo "<td>"."Cntrb Indiv"."</td>";
		echo "<td>"."Cntrb Tot"."</td>";
	}
	echo "</tr>";

	$totals=array();
// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
			
		$values = array();	

					$values["fila"] = "";	
			if(strlen($row["fila"]))
			{
				$values["fila"] = DisplayLookupWizard("fila", $row["fila"], $row,"",MODE_EXPORT);
			}
					$values["agente"] = "";	
			if(strlen($row["agente"]))
			{
				$values["agente"] = DisplayLookupWizard("agente", $row["agente"], $row,"",MODE_EXPORT);
			}
					
							$format="Time";
			
			$values["tot_logado"] = GetData($row,"tot_logado",$format);
					
							$format="";
			
			$values["qtd_atend"] = GetData($row,"qtd_atend",$format);
					
							$format="Time";
			
			$values["tot_atend"] = GetData($row,"tot_atend",$format);
					
							$format="Time";
			
			$values["med_atend"] = GetData($row,"med_atend",$format);
					
							$format="Time";
			
			$values["tot_pausa"] = GetData($row,"tot_pausa",$format);
					
							$format="";
			
			$values["qtd_nao_atend"] = GetData($row,"qtd_nao_atend",$format);
					
							$format="";
			
			$values["tot_recebida"] = GetData($row,"tot_recebida",$format);
					
							$format="";
			
			$values["cntrb_indiv"] = GetData($row,"cntrb_indiv",$format);
					
							$format="";
			
			$values["cntrb_tot"] = GetData($row,"cntrb_tot",$format);

		
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
					echo PrepareForExcel($values["fila"]);
				else
					echo htmlspecialchars($values["fila"]);
					
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
				
								if($_REQUEST["type"]=="excel")
					echo PrepareForExcel($values["agente"]);
				else
					echo htmlspecialchars($values["agente"]);
					
			echo '</td>';
							echo '<td>';
						
			
									$format="Time";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["tot_logado"]);
					else
						echo htmlspecialchars($values["tot_logado"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["qtd_atend"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Time";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["tot_atend"]);
					else
						echo htmlspecialchars($values["tot_atend"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Time";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["med_atend"]);
					else
						echo htmlspecialchars($values["med_atend"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Time";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["tot_pausa"]);
					else
						echo htmlspecialchars($values["tot_pausa"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["qtd_nao_atend"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["tot_recebida"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["cntrb_indiv"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["cntrb_tot"]);
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