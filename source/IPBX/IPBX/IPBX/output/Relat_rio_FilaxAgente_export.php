<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");


include("include/Relat_rio_FilaxAgente_variables.php");

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
$pageObject->body["begin"] .="<form action=\"Relat_rio_FilaxAgente_export.php\" method=POST id=frmexport name=frmexport>";
$pageObject->body["end"] .= "</form><script>".$pageObject->PrepareJS()."</script>";
$xt->assignbyref("body",$pageObject->body);

$xt->display("Relat_rio_FilaxAgente_export.htm");


function ExportToExcel()
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=Relat_rio_FilaxAgente.xls");

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
	header("Content-Disposition: attachment;Filename=Relat_rio_FilaxAgente.doc");

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
	header("Content-Disposition: attachment;Filename=Relat_rio_FilaxAgente.xml");
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
			$values["Data de Entrada"] = GetData($row,"Data de Entrada","");
			$values["Hora de Entrada"] = GetData($row,"Hora de Entrada","");
			$values["Telefone"] = GetData($row,"Telefone","");
			$values["Hora Atendimento"] = GetData($row,"Hora Atendimento","");
			$values["Evento"] = GetData($row,"Evento","");
			$values["Fila"] = GetData($row,"Fila","");
			$values["Agente"] = GetData($row,"Agente","");
			$values["Tempo de Espera"] = GetData($row,"Tempo de Espera","");
			$values["Tempo de Atendimento"] = GetData($row,"Tempo de Atendimento","");
			$values["Hora de Abandono"] = GetData($row,"Hora de Abandono","");
			$values["Telefone Transferido"] = GetData($row,"Telefone Transferido","");
			$values["Chave �nica"] = GetData($row,"Chave �nica","");
		
		
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
	header("Content-Disposition: attachment;Filename=Relat_rio_FilaxAgente.csv");
	
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
	$outstr.= "\"Data de Entrada\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Hora de Entrada\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Telefone\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Hora Atendimento\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Evento\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Fila\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Agente\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Tempo de Espera\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Tempo de Atendimento\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Hora de Abandono\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Telefone Transferido\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Chave �nica\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		
		
		$values = array();
			$format="Short Date";
			$values["Data de Entrada"] = htmlspecialchars(GetData($row,"Data de Entrada",$format));
			$format="Time";
			$values["Hora de Entrada"] = htmlspecialchars(GetData($row,"Hora de Entrada",$format));
			$format="";
			$values["Telefone"] = htmlspecialchars(GetData($row,"Telefone",$format));
			$format="Time";
			$values["Hora Atendimento"] = htmlspecialchars(GetData($row,"Hora Atendimento",$format));
			$format="";
			$values["Evento"] = htmlspecialchars(GetData($row,"Evento",$format));
			$format="";
			$values["Fila"] = htmlspecialchars(GetData($row,"Fila",$format));
			$format="";
			$values["Agente"] = htmlspecialchars(GetData($row,"Agente",$format));
			$format="";
			$values["Tempo de Espera"] = htmlspecialchars(GetData($row,"Tempo de Espera",$format));
			$format="";
			$values["Tempo de Atendimento"] = htmlspecialchars(GetData($row,"Tempo de Atendimento",$format));
			$format="";
			$values["Hora de Abandono"] = htmlspecialchars(GetData($row,"Hora de Abandono",$format));
			$format="";
			$values["Telefone Transferido"] = htmlspecialchars(GetData($row,"Telefone Transferido",$format));
			$format="";
			$values["Chave �nica"] = htmlspecialchars(GetData($row,"Chave �nica",$format));

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
			$outstr.='"'.htmlspecialchars($values["Data de Entrada"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Hora de Entrada"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Telefone"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Hora Atendimento"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Evento"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Fila"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Agente"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Tempo de Espera"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Tempo de Atendimento"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Hora de Abandono"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Telefone Transferido"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Chave �nica"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Data de Entrada").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Hora de Entrada").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Telefone").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Hora Atendimento").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Evento").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fila").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Agente").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tempo de Espera").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tempo de Atendimento").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Hora de Abandono").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Telefone Transferido").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Chave Única").'</td>';	
	}
	else
	{
		echo "<td>"."Data de Entrada"."</td>";
		echo "<td>"."Hora de Entrada"."</td>";
		echo "<td>"."Telefone"."</td>";
		echo "<td>"."Hora Atendimento"."</td>";
		echo "<td>"."Evento"."</td>";
		echo "<td>"."Fila"."</td>";
		echo "<td>"."Agente"."</td>";
		echo "<td>"."Tempo de Espera"."</td>";
		echo "<td>"."Tempo de Atendimento"."</td>";
		echo "<td>"."Hora de Abandono"."</td>";
		echo "<td>"."Telefone Transferido"."</td>";
		echo "<td>"."Chave Única"."</td>";
	}
	echo "</tr>";

	$totals=array();
// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
			
		$values = array();	

					
							$format="Short Date";
			
			$values["Data de Entrada"] = GetData($row,"Data de Entrada",$format);
					
							$format="Time";
			
			$values["Hora de Entrada"] = GetData($row,"Hora de Entrada",$format);
					
							$format="";
			
			$values["Telefone"] = GetData($row,"Telefone",$format);
					
							$format="Time";
			
			$values["Hora Atendimento"] = GetData($row,"Hora Atendimento",$format);
					
							$format="";
			
			$values["Evento"] = GetData($row,"Evento",$format);
					
							$format="";
			
			$values["Fila"] = GetData($row,"Fila",$format);
					
							$format="";
			
			$values["Agente"] = GetData($row,"Agente",$format);
					
							$format="";
			
			$values["Tempo de Espera"] = GetData($row,"Tempo de Espera",$format);
					
							$format="";
			
			$values["Tempo de Atendimento"] = GetData($row,"Tempo de Atendimento",$format);
					
							$format="";
			
			$values["Hora de Abandono"] = GetData($row,"Hora de Abandono",$format);
					
							$format="";
			
			$values["Telefone Transferido"] = GetData($row,"Telefone Transferido",$format);
					
							$format="";
			
			$values["Chave �nica"] = GetData($row,"Chave �nica",$format);

		
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
						echo PrepareForExcel($values["Data de Entrada"]);
					else
						echo htmlspecialchars($values["Data de Entrada"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Time";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Hora de Entrada"]);
					else
						echo htmlspecialchars($values["Hora de Entrada"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Telefone"]);
					else
						echo htmlspecialchars($values["Telefone"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Time";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Hora Atendimento"]);
					else
						echo htmlspecialchars($values["Hora Atendimento"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Evento"]);
					else
						echo htmlspecialchars($values["Evento"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
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
						echo PrepareForExcel($values["Agente"]);
					else
						echo htmlspecialchars($values["Agente"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["Tempo de Espera"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["Tempo de Atendimento"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["Hora de Abandono"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Telefone Transferido"]);
					else
						echo htmlspecialchars($values["Telefone Transferido"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Chave �nica"]);
					else
						echo htmlspecialchars($values["Chave �nica"]);
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