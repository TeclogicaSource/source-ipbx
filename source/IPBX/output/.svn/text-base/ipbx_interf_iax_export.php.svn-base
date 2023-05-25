<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");


include("include/ipbx_interf_iax_variables.php");

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
$pageObject->body["begin"] .="<form action=\"ipbx_interf_iax_export.php\" method=POST id=frmexport name=frmexport>";
$pageObject->body["end"] .= "</form><script>".$pageObject->PrepareJS()."</script>";
$xt->assignbyref("body",$pageObject->body);

$xt->display("ipbx_interf_iax_export.htm");


function ExportToExcel()
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=ipbx_interf_iax.xls");

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
	header("Content-Disposition: attachment;Filename=ipbx_interf_iax.doc");

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
	header("Content-Disposition: attachment;Filename=ipbx_interf_iax.xml");
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
			$values["id_interf"] = GetData($row,"id_interf","");
			$values["dsc_interf"] = GetData($row,"dsc_interf","");
			$values["id_contrato"] = GetData($row,"id_contrato","");
			$values["usuario"] = GetData($row,"usuario","");
			$values["senha"] = GetData($row,"senha","");
			$values["ip_host"] = GetData($row,"ip_host","");
			$values["id_central"] = GetData($row,"id_central","");
			$values["codec"] = GetData($row,"codec","");
			$values["id_tp_interf"] = GetData($row,"id_tp_interf","");
		
		
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
	header("Content-Disposition: attachment;Filename=ipbx_interf_iax.csv");
	
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
	$outstr.= "\"id_interf\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"dsc_interf\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"id_contrato\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"usuario\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"senha\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ip_host\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"id_central\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"codec\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"id_tp_interf\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		
		
		$values = array();
			$format="";
			$values["id_interf"] = htmlspecialchars(GetData($row,"id_interf",$format));
			$format="";
			$values["dsc_interf"] = htmlspecialchars(GetData($row,"dsc_interf",$format));
			$format="";
			$values["id_contrato"] = htmlspecialchars(GetData($row,"id_contrato",$format));
			$format="";
			$values["usuario"] = htmlspecialchars(GetData($row,"usuario",$format));
			$format="";
			$values["senha"] = htmlspecialchars(GetData($row,"senha",$format));
			$format="";
			$values["ip_host"] = htmlspecialchars(GetData($row,"ip_host",$format));
			$format="";
			$values["id_central"] = htmlspecialchars(GetData($row,"id_central",$format));
			$format="";
			$values["codec"] = htmlspecialchars(GetData($row,"codec",$format));
			$format="";
			$values["id_tp_interf"] = htmlspecialchars(GetData($row,"id_tp_interf",$format));

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
			$outstr.='"'.htmlspecialchars($values["id_interf"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["dsc_interf"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["id_contrato"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["usuario"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["senha"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ip_host"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["id_central"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["codec"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["id_tp_interf"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Identificação").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Descrição da Interface").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Id Contrato").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Usuario").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Senha").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ip Host").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Id Central").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Codec").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tipo Interface").'</td>';	
	}
	else
	{
		echo "<td>"."Identificação"."</td>";
		echo "<td>"."Descrição da Interface"."</td>";
		echo "<td>"."Id Contrato"."</td>";
		echo "<td>"."Usuario"."</td>";
		echo "<td>"."Senha"."</td>";
		echo "<td>"."Ip Host"."</td>";
		echo "<td>"."Id Central"."</td>";
		echo "<td>"."Codec"."</td>";
		echo "<td>"."Tipo Interface"."</td>";
	}
	echo "</tr>";

	$totals=array();
// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
			
		$values = array();	

					
							$format="";
			
			$values["id_interf"] = GetData($row,"id_interf",$format);
					
							$format="";
			
			$values["dsc_interf"] = GetData($row,"dsc_interf",$format);
					
							$format="";
			
			$values["id_contrato"] = GetData($row,"id_contrato",$format);
					
							$format="";
			
			$values["usuario"] = GetData($row,"usuario",$format);
					
							$format="";
			
			$values["senha"] = GetData($row,"senha",$format);
					
							$format="";
			
			$values["ip_host"] = GetData($row,"ip_host",$format);
					
							$format="";
			
			$values["id_central"] = GetData($row,"id_central",$format);
					
							$format="";
			
			$values["codec"] = GetData($row,"codec",$format);
					
							$format="";
			
			$values["id_tp_interf"] = GetData($row,"id_tp_interf",$format);

		
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
									echo htmlspecialchars($values["id_interf"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["dsc_interf"]);
					else
						echo htmlspecialchars($values["dsc_interf"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["id_contrato"]);
					else
						echo htmlspecialchars($values["id_contrato"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["usuario"]);
					else
						echo htmlspecialchars($values["usuario"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["senha"]);
					else
						echo htmlspecialchars($values["senha"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ip_host"]);
					else
						echo htmlspecialchars($values["ip_host"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["id_central"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["codec"]);
					else
						echo htmlspecialchars($values["codec"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["id_tp_interf"]);
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