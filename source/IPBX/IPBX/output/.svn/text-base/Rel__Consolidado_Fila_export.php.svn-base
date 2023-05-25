<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");


include("include/Rel__Consolidado_Fila_variables.php");

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
$pageObject->body["begin"] .="<form action=\"Rel__Consolidado_Fila_export.php\" method=POST id=frmexport name=frmexport>";
$pageObject->body["end"] .= "</form><script>".$pageObject->PrepareJS()."</script>";
$xt->assignbyref("body",$pageObject->body);

$xt->display("Rel__Consolidado_Fila_export.htm");


function ExportToExcel()
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=Rel__Consolidado_Fila.xls");

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
	header("Content-Disposition: attachment;Filename=Rel__Consolidado_Fila.doc");

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
	header("Content-Disposition: attachment;Filename=Rel__Consolidado_Fila.xml");
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
			$values["Fila"] = GetData($row,"Fila","");
			$values["dt_periodo"] = GetData($row,"dt_periodo","");
			$values["hr_periodo"] = GetData($row,"hr_periodo","");
			$values["ag_logados_menor"] = GetData($row,"ag_logados_menor","");
			$values["ag_logados_maior"] = GetData($row,"ag_logados_maior","");
			$values["ag_logados_media"] = GetData($row,"ag_logados_media","");
			$values["ag_pausados_menor"] = GetData($row,"ag_pausados_menor","");
			$values["ag_pausados_maior"] = GetData($row,"ag_pausados_maior","");
			$values["ag_pausados_media"] = GetData($row,"ag_pausados_media","");
			$values["ag_atendendo_menor"] = GetData($row,"ag_atendendo_menor","");
			$values["ag_atendendo_maior"] = GetData($row,"ag_atendendo_maior","");
			$values["ag_atendendo_media"] = GetData($row,"ag_atendendo_media","");
			$values["ag_discando_menor"] = GetData($row,"ag_discando_menor","");
			$values["ag_discando_maior"] = GetData($row,"ag_discando_maior","");
			$values["ag_discando_media"] = GetData($row,"ag_discando_media","");
			$values["soma_atendimento"] = GetData($row,"soma_atendimento","");
			$values["soma_espera"] = GetData($row,"soma_espera","");
			$values["qtd_atendimento"] = GetData($row,"qtd_atendimento","");
			$values["qtd_abandono"] = GetData($row,"qtd_abandono","");
			$values["qtd_sla_espera"] = GetData($row,"qtd_sla_espera","");
			$values["qtd_sla_atendimento"] = GetData($row,"qtd_sla_atendimento","");
			$values["qtd_sla_operacao"] = GetData($row,"qtd_sla_operacao","");
		
		
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
	header("Content-Disposition: attachment;Filename=Rel__Consolidado_Fila.csv");
	
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
	$outstr.= "\"dt_periodo\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"hr_periodo\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ag_logados_menor\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ag_logados_maior\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ag_logados_media\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ag_pausados_menor\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ag_pausados_maior\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ag_pausados_media\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ag_atendendo_menor\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ag_atendendo_maior\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ag_atendendo_media\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ag_discando_menor\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ag_discando_maior\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ag_discando_media\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"soma_atendimento\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"soma_espera\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"qtd_atendimento\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"qtd_abandono\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"qtd_sla_espera\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"qtd_sla_atendimento\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"qtd_sla_operacao\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		
		
		$values = array();
			$format="";
			$values["Fila"] = htmlspecialchars(GetData($row,"Fila",$format));
			$format="Short Date";
			$values["dt_periodo"] = htmlspecialchars(GetData($row,"dt_periodo",$format));
			$format="Time";
			$values["hr_periodo"] = htmlspecialchars(GetData($row,"hr_periodo",$format));
			$format="";
			$values["ag_logados_menor"] = htmlspecialchars(GetData($row,"ag_logados_menor",$format));
			$format="";
			$values["ag_logados_maior"] = htmlspecialchars(GetData($row,"ag_logados_maior",$format));
			$format="Number";
			$values["ag_logados_media"] = htmlspecialchars($row["ag_logados_media"]);
			$format="";
			$values["ag_pausados_menor"] = htmlspecialchars(GetData($row,"ag_pausados_menor",$format));
			$format="";
			$values["ag_pausados_maior"] = htmlspecialchars(GetData($row,"ag_pausados_maior",$format));
			$format="Number";
			$values["ag_pausados_media"] = htmlspecialchars($row["ag_pausados_media"]);
			$format="";
			$values["ag_atendendo_menor"] = htmlspecialchars(GetData($row,"ag_atendendo_menor",$format));
			$format="";
			$values["ag_atendendo_maior"] = htmlspecialchars(GetData($row,"ag_atendendo_maior",$format));
			$format="Number";
			$values["ag_atendendo_media"] = htmlspecialchars($row["ag_atendendo_media"]);
			$format="";
			$values["ag_discando_menor"] = htmlspecialchars(GetData($row,"ag_discando_menor",$format));
			$format="";
			$values["ag_discando_maior"] = htmlspecialchars(GetData($row,"ag_discando_maior",$format));
			$format="Number";
			$values["ag_discando_media"] = htmlspecialchars($row["ag_discando_media"]);
			$format="";
			$values["soma_atendimento"] = htmlspecialchars(GetData($row,"soma_atendimento",$format));
			$format="";
			$values["soma_espera"] = htmlspecialchars(GetData($row,"soma_espera",$format));
			$format="";
			$values["qtd_atendimento"] = htmlspecialchars(GetData($row,"qtd_atendimento",$format));
			$format="";
			$values["qtd_abandono"] = htmlspecialchars(GetData($row,"qtd_abandono",$format));
			$format="";
			$values["qtd_sla_espera"] = htmlspecialchars(GetData($row,"qtd_sla_espera",$format));
			$format="";
			$values["qtd_sla_atendimento"] = htmlspecialchars(GetData($row,"qtd_sla_atendimento",$format));
			$format="";
			$values["qtd_sla_operacao"] = htmlspecialchars(GetData($row,"qtd_sla_operacao",$format));

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
			$outstr.='"'.htmlspecialchars($values["dt_periodo"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["hr_periodo"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ag_logados_menor"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ag_logados_maior"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ag_logados_media"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ag_pausados_menor"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ag_pausados_maior"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ag_pausados_media"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ag_atendendo_menor"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ag_atendendo_maior"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ag_atendendo_media"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ag_discando_menor"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ag_discando_maior"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ag_discando_media"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["soma_atendimento"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["soma_espera"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["qtd_atendimento"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["qtd_abandono"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["qtd_sla_espera"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["qtd_sla_atendimento"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["qtd_sla_operacao"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Dt Periodo").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Hr Periodo").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ag Logados Menor").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ag Logados Maior").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ag Logados Media").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ag Pausados Menor").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ag Pausados Maior").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ag Pausados Media").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ag Atendendo Menor").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ag Atendendo Maior").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ag Atendendo Media").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ag Discando Menor").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ag Discando Maior").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ag Discando Media").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Soma Atendimento").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Soma Espera").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Qtd Atendimento").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Qtd Abandono").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Qtd Sla Espera").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Qtd Sla Atendimento").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Qtd Sla Operacao").'</td>';	
	}
	else
	{
		echo "<td>"."Fila"."</td>";
		echo "<td>"."Dt Periodo"."</td>";
		echo "<td>"."Hr Periodo"."</td>";
		echo "<td>"."Ag Logados Menor"."</td>";
		echo "<td>"."Ag Logados Maior"."</td>";
		echo "<td>"."Ag Logados Media"."</td>";
		echo "<td>"."Ag Pausados Menor"."</td>";
		echo "<td>"."Ag Pausados Maior"."</td>";
		echo "<td>"."Ag Pausados Media"."</td>";
		echo "<td>"."Ag Atendendo Menor"."</td>";
		echo "<td>"."Ag Atendendo Maior"."</td>";
		echo "<td>"."Ag Atendendo Media"."</td>";
		echo "<td>"."Ag Discando Menor"."</td>";
		echo "<td>"."Ag Discando Maior"."</td>";
		echo "<td>"."Ag Discando Media"."</td>";
		echo "<td>"."Soma Atendimento"."</td>";
		echo "<td>"."Soma Espera"."</td>";
		echo "<td>"."Qtd Atendimento"."</td>";
		echo "<td>"."Qtd Abandono"."</td>";
		echo "<td>"."Qtd Sla Espera"."</td>";
		echo "<td>"."Qtd Sla Atendimento"."</td>";
		echo "<td>"."Qtd Sla Operacao"."</td>";
	}
	echo "</tr>";

	$totals=array();
// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
			
		$values = array();	

					
							$format="";
			
			$values["Fila"] = GetData($row,"Fila",$format);
					
							$format="Short Date";
			
			$values["dt_periodo"] = GetData($row,"dt_periodo",$format);
					
							$format="Time";
			
			$values["hr_periodo"] = GetData($row,"hr_periodo",$format);
					
							$format="";
			
			$values["ag_logados_menor"] = GetData($row,"ag_logados_menor",$format);
					
							$format="";
			
			$values["ag_logados_maior"] = GetData($row,"ag_logados_maior",$format);
					
							$format="Number";
			
			$values["ag_logados_media"] = GetData($row,"ag_logados_media",$format);
					
							$format="";
			
			$values["ag_pausados_menor"] = GetData($row,"ag_pausados_menor",$format);
					
							$format="";
			
			$values["ag_pausados_maior"] = GetData($row,"ag_pausados_maior",$format);
					
							$format="Number";
			
			$values["ag_pausados_media"] = GetData($row,"ag_pausados_media",$format);
					
							$format="";
			
			$values["ag_atendendo_menor"] = GetData($row,"ag_atendendo_menor",$format);
					
							$format="";
			
			$values["ag_atendendo_maior"] = GetData($row,"ag_atendendo_maior",$format);
					
							$format="Number";
			
			$values["ag_atendendo_media"] = GetData($row,"ag_atendendo_media",$format);
					
							$format="";
			
			$values["ag_discando_menor"] = GetData($row,"ag_discando_menor",$format);
					
							$format="";
			
			$values["ag_discando_maior"] = GetData($row,"ag_discando_maior",$format);
					
							$format="Number";
			
			$values["ag_discando_media"] = GetData($row,"ag_discando_media",$format);
					
							$format="";
			
			$values["soma_atendimento"] = GetData($row,"soma_atendimento",$format);
					
							$format="";
			
			$values["soma_espera"] = GetData($row,"soma_espera",$format);
					
							$format="";
			
			$values["qtd_atendimento"] = GetData($row,"qtd_atendimento",$format);
					
							$format="";
			
			$values["qtd_abandono"] = GetData($row,"qtd_abandono",$format);
					
							$format="";
			
			$values["qtd_sla_espera"] = GetData($row,"qtd_sla_espera",$format);
					
							$format="";
			
			$values["qtd_sla_atendimento"] = GetData($row,"qtd_sla_atendimento",$format);
					
							$format="";
			
			$values["qtd_sla_operacao"] = GetData($row,"qtd_sla_operacao",$format);

		
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
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Fila"]);
					else
						echo htmlspecialchars($values["Fila"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Short Date";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["dt_periodo"]);
					else
						echo htmlspecialchars($values["dt_periodo"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Time";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["hr_periodo"]);
					else
						echo htmlspecialchars($values["hr_periodo"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["ag_logados_menor"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["ag_logados_maior"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Number";
									echo htmlspecialchars($values["ag_logados_media"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["ag_pausados_menor"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["ag_pausados_maior"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Number";
									echo htmlspecialchars($values["ag_pausados_media"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["ag_atendendo_menor"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["ag_atendendo_maior"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Number";
									echo htmlspecialchars($values["ag_atendendo_media"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["ag_discando_menor"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["ag_discando_maior"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="Number";
									echo htmlspecialchars($values["ag_discando_media"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["soma_atendimento"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["soma_espera"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["qtd_atendimento"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["qtd_abandono"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["qtd_sla_espera"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["qtd_sla_atendimento"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["qtd_sla_operacao"]);
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