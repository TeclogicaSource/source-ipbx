<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
include("include/dbcommon.php");
include("classes/searchclause.php");
session_cache_limiter("none");


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
$pageObject->body["begin"] .="<form action=\"admin_users_export.php\" method=POST id=frmexport name=frmexport>";
$pageObject->body["end"] .= "</form><script>".$pageObject->PrepareJS()."</script>";
$xt->assignbyref("body",$pageObject->body);

$xt->display("admin_users_export.htm");


function ExportToExcel()
{
	global $cCharset;
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=admin_users.xls");

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
	header("Content-Disposition: attachment;Filename=admin_users.doc");

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
	header("Content-Disposition: attachment;Filename=admin_users.xml");
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
			$values["id"] = GetData($row,"id","");
			$values["name"] = GetData($row,"name","");
			$values["host"] = GetData($row,"host","");
			$values["nat"] = GetData($row,"nat","");
			$values["type"] = GetData($row,"type","");
			$values["accountcode"] = GetData($row,"accountcode","");
			$values["amaflags"] = GetData($row,"amaflags","");
			$values["call-limit"] = GetData($row,"call-limit","");
			$values["callgroup"] = GetData($row,"callgroup","");
			$values["callerid"] = GetData($row,"callerid","");
			$values["cancallforward"] = GetData($row,"cancallforward","");
			$values["canreinvite"] = GetData($row,"canreinvite","");
			$values["context"] = GetData($row,"context","");
			$values["defaultip"] = GetData($row,"defaultip","");
			$values["dtmfmode"] = GetData($row,"dtmfmode","");
			$values["fromuser"] = GetData($row,"fromuser","");
			$values["fromdomain"] = GetData($row,"fromdomain","");
			$values["insecure"] = GetData($row,"insecure","");
			$values["language"] = GetData($row,"language","");
			$values["mailbox"] = GetData($row,"mailbox","");
			$values["md5secret"] = GetData($row,"md5secret","");
			$values["deny"] = GetData($row,"deny","");
			$values["permit"] = GetData($row,"permit","");
			$values["mask"] = GetData($row,"mask","");
			$values["musiconhold"] = GetData($row,"musiconhold","");
			$values["pickupgroup"] = GetData($row,"pickupgroup","");
			$values["qualify"] = GetData($row,"qualify","");
			$values["rtcachefriends"] = GetData($row,"rtcachefriends","");
			$values["regexten"] = GetData($row,"regexten","");
			$values["restrictcid"] = GetData($row,"restrictcid","");
			$values["rtptimeout"] = GetData($row,"rtptimeout","");
			$values["rtpholdtimeout"] = GetData($row,"rtpholdtimeout","");
			$values["secret"] = GetData($row,"secret","");
			$values["setvar"] = GetData($row,"setvar","");
			$values["disallow"] = GetData($row,"disallow","");
			$values["allow"] = GetData($row,"allow","");
			$values["fullcontact"] = GetData($row,"fullcontact","");
			$values["ipaddr"] = GetData($row,"ipaddr","");
			$values["port"] = GetData($row,"port","");
			$values["regserver"] = GetData($row,"regserver","");
			$values["regseconds"] = GetData($row,"regseconds","");
			$values["lastms"] = GetData($row,"lastms","");
			$values["username"] = GetData($row,"username","");
			$values["defaultuser"] = GetData($row,"defaultuser","");
			$values["subscribecontext"] = GetData($row,"subscribecontext","");
			$values["useragent"] = GetData($row,"useragent","");
			$values["gateway"] = GetData($row,"gateway","");
			$values["id_horario"] = GetData($row,"id_horario","");
			$values["mail"] = GetData($row,"mail","");
			$values["grava_chamada"] = GetData($row,"grava_chamada","");
			$values["tp_ramal"] = GetData($row,"tp_ramal","");
			$values["Transbordo"] = GetData($row,"Transbordo","");
			$values["id_interf"] = GetData($row,"id_interf","");
			$values["ident_interf"] = GetData($row,"ident_interf","");
			$values["tp_chamada"] = GetData($row,"tp_chamada","");
			$values["flg_cadeado"] = GetData($row,"flg_cadeado","");
			$values["desvio"] = GetData($row,"desvio","");
			$values["id_pesquisa"] = GetData($row,"id_pesquisa","");
			$values["desvio_ddr"] = GetData($row,"desvio_ddr","");
			$values["id_saida"] = GetData($row,"id_saida","");
		
		
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
	header("Content-Disposition: attachment;Filename=admin_users.csv");
	
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
	$outstr.= "\"id\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"name\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"host\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"nat\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"type\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"accountcode\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"amaflags\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"call-limit\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"callgroup\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"callerid\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"cancallforward\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"canreinvite\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"context\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"defaultip\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"dtmfmode\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"fromuser\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"fromdomain\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"insecure\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"language\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"mailbox\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"md5secret\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"deny\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"permit\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"mask\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"musiconhold\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"pickupgroup\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"qualify\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"rtcachefriends\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"regexten\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"restrictcid\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"rtptimeout\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"rtpholdtimeout\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"secret\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"setvar\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"disallow\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"allow\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"fullcontact\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ipaddr\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"port\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"regserver\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"regseconds\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"lastms\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"username\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"defaultuser\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"subscribecontext\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"useragent\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"gateway\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"id_horario\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"mail\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"grava_chamada\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"tp_ramal\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"Transbordo\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"id_interf\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"ident_interf\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"tp_chamada\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"flg_cadeado\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"desvio\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"id_pesquisa\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"desvio_ddr\"";
	if($outstr!="")
		$outstr.=",";
	$outstr.= "\"id_saida\"";
	echo $outstr;
	echo "\r\n";

// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
		
		
		$values = array();
			$format="";
			$values["id"] = htmlspecialchars(GetData($row,"id",$format));
			$format="";
			$values["name"] = htmlspecialchars(GetData($row,"name",$format));
			$format="";
			$values["host"] = htmlspecialchars(GetData($row,"host",$format));
			$format="";
			$values["nat"] = htmlspecialchars(GetData($row,"nat",$format));
			$format="";
			$values["type"] = htmlspecialchars(GetData($row,"type",$format));
			$format="";
			$values["accountcode"] = htmlspecialchars(GetData($row,"accountcode",$format));
			$format="";
			$values["amaflags"] = htmlspecialchars(GetData($row,"amaflags",$format));
			$format="";
			$values["call-limit"] = htmlspecialchars(GetData($row,"call-limit",$format));
			$format="";
			$values["callgroup"] = htmlspecialchars(GetData($row,"callgroup",$format));
			$format="";
			$values["callerid"] = htmlspecialchars(GetData($row,"callerid",$format));
			$format="";
			$values["cancallforward"] = htmlspecialchars(GetData($row,"cancallforward",$format));
			$format="";
			$values["canreinvite"] = htmlspecialchars(GetData($row,"canreinvite",$format));
			$format="";
			$values["context"] = htmlspecialchars(GetData($row,"context",$format));
			$format="";
			$values["defaultip"] = htmlspecialchars(GetData($row,"defaultip",$format));
			$format="";
			$values["dtmfmode"] = htmlspecialchars(GetData($row,"dtmfmode",$format));
			$format="";
			$values["fromuser"] = htmlspecialchars(GetData($row,"fromuser",$format));
			$format="";
			$values["fromdomain"] = htmlspecialchars(GetData($row,"fromdomain",$format));
			$format="";
			$values["insecure"] = htmlspecialchars(GetData($row,"insecure",$format));
			$format="";
			$values["language"] = htmlspecialchars(GetData($row,"language",$format));
			$format="";
			$values["mailbox"] = htmlspecialchars(GetData($row,"mailbox",$format));
			$format="";
			$values["md5secret"] = htmlspecialchars(GetData($row,"md5secret",$format));
			$format="";
			$values["deny"] = htmlspecialchars(GetData($row,"deny",$format));
			$format="";
			$values["permit"] = htmlspecialchars(GetData($row,"permit",$format));
			$format="";
			$values["mask"] = htmlspecialchars(GetData($row,"mask",$format));
			$format="";
			$values["musiconhold"] = htmlspecialchars(GetData($row,"musiconhold",$format));
			$format="";
			$values["pickupgroup"] = htmlspecialchars(GetData($row,"pickupgroup",$format));
			$format="";
			$values["qualify"] = htmlspecialchars(GetData($row,"qualify",$format));
			$format="";
			$values["rtcachefriends"] = htmlspecialchars(GetData($row,"rtcachefriends",$format));
			$format="";
			$values["regexten"] = htmlspecialchars(GetData($row,"regexten",$format));
			$format="";
			$values["restrictcid"] = htmlspecialchars(GetData($row,"restrictcid",$format));
			$format="";
			$values["rtptimeout"] = htmlspecialchars(GetData($row,"rtptimeout",$format));
			$format="";
			$values["rtpholdtimeout"] = htmlspecialchars(GetData($row,"rtpholdtimeout",$format));
			$format="";
			$values["secret"] = htmlspecialchars(GetData($row,"secret",$format));
			$format="";
			$values["setvar"] = htmlspecialchars(GetData($row,"setvar",$format));
			$format="";
			$values["disallow"] = htmlspecialchars(GetData($row,"disallow",$format));
			$format="";
			$values["allow"] = htmlspecialchars(GetData($row,"allow",$format));
			$format="";
			$values["fullcontact"] = htmlspecialchars(GetData($row,"fullcontact",$format));
			$format="";
			$values["ipaddr"] = htmlspecialchars(GetData($row,"ipaddr",$format));
			$format="";
			$values["port"] = htmlspecialchars(GetData($row,"port",$format));
			$format="";
			$values["regserver"] = htmlspecialchars(GetData($row,"regserver",$format));
			$format="";
			$values["regseconds"] = htmlspecialchars(GetData($row,"regseconds",$format));
			$format="";
			$values["lastms"] = htmlspecialchars(GetData($row,"lastms",$format));
			$format="";
			$values["username"] = htmlspecialchars(GetData($row,"username",$format));
			$format="";
			$values["defaultuser"] = htmlspecialchars(GetData($row,"defaultuser",$format));
			$format="";
			$values["subscribecontext"] = htmlspecialchars(GetData($row,"subscribecontext",$format));
			$format="";
			$values["useragent"] = htmlspecialchars(GetData($row,"useragent",$format));
			$format="";
			$values["gateway"] = htmlspecialchars(GetData($row,"gateway",$format));
			$format="";
			$values["id_horario"] = htmlspecialchars(GetData($row,"id_horario",$format));
			$format="";
			$values["mail"] = htmlspecialchars(GetData($row,"mail",$format));
			$format="";
			$values["grava_chamada"] = htmlspecialchars(GetData($row,"grava_chamada",$format));
			$format="";
			$values["tp_ramal"] = htmlspecialchars(GetData($row,"tp_ramal",$format));
			$format="";
			$values["Transbordo"] = htmlspecialchars(GetData($row,"Transbordo",$format));
			$format="";
			$values["id_interf"] = htmlspecialchars(GetData($row,"id_interf",$format));
			$format="";
			$values["ident_interf"] = htmlspecialchars(GetData($row,"ident_interf",$format));
			$format="";
			$values["tp_chamada"] = htmlspecialchars(GetData($row,"tp_chamada",$format));
			$format="";
			$values["flg_cadeado"] = htmlspecialchars(GetData($row,"flg_cadeado",$format));
			$format="";
			$values["desvio"] = htmlspecialchars(GetData($row,"desvio",$format));
			$format="";
			$values["id_pesquisa"] = htmlspecialchars(GetData($row,"id_pesquisa",$format));
			$format="";
			$values["desvio_ddr"] = htmlspecialchars(GetData($row,"desvio_ddr",$format));
			$format="";
			$values["id_saida"] = htmlspecialchars(GetData($row,"id_saida",$format));

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
			$outstr.='"'.htmlspecialchars($values["id"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["name"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["host"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["nat"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["type"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["accountcode"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["amaflags"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["call-limit"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["callgroup"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["callerid"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["cancallforward"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["canreinvite"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["context"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["defaultip"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["dtmfmode"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["fromuser"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["fromdomain"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["insecure"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["language"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["mailbox"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["md5secret"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["deny"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["permit"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["mask"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["musiconhold"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["pickupgroup"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["qualify"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["rtcachefriends"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["regexten"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["restrictcid"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["rtptimeout"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["rtpholdtimeout"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["secret"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["setvar"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["disallow"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["allow"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["fullcontact"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ipaddr"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["port"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["regserver"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["regseconds"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["lastms"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["username"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["defaultuser"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["subscribecontext"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["useragent"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["gateway"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["id_horario"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["mail"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["grava_chamada"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["tp_ramal"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["Transbordo"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["id_interf"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["ident_interf"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["tp_chamada"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["flg_cadeado"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["desvio"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["id_pesquisa"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["desvio_ddr"]).'"';
			if($outstr!="")
				$outstr.=",";
			$outstr.='"'.htmlspecialchars($values["id_saida"]).'"';
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
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Id").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Name").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Host").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Nat").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Type").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Accountcode").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Amaflags").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Call-limit").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Callgroup").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Callerid").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Cancallforward").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Canreinvite").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Context").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Defaultip").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Dtmfmode").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fromuser").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fromdomain").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Insecure").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Language").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Mailbox").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Md5secret").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Deny").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Permit").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Mask").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Musiconhold").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Pickupgroup").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Qualify").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Rtcachefriends").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Regexten").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Restrictcid").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Rtptimeout").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Rtpholdtimeout").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Secret").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Setvar").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Disallow").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Allow").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Fullcontact").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ipaddr").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Port").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Regserver").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Regseconds").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Lastms").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Username").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Defaultuser").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Subscribecontext").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Useragent").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Gateway").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Id Horario").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Mail").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Grava Chamada").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tp Ramal").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Transbordo").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Id Interf").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Ident Interf").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Tp Chamada").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Flg Cadeado").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Desvio").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Id Pesquisa").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Desvio Ddr").'</td>';	
		echo '<td style="width: 100" x:str>'.PrepareForExcel("Id Saida").'</td>';	
	}
	else
	{
		echo "<td>"."Id"."</td>";
		echo "<td>"."Name"."</td>";
		echo "<td>"."Host"."</td>";
		echo "<td>"."Nat"."</td>";
		echo "<td>"."Type"."</td>";
		echo "<td>"."Accountcode"."</td>";
		echo "<td>"."Amaflags"."</td>";
		echo "<td>"."Call-limit"."</td>";
		echo "<td>"."Callgroup"."</td>";
		echo "<td>"."Callerid"."</td>";
		echo "<td>"."Cancallforward"."</td>";
		echo "<td>"."Canreinvite"."</td>";
		echo "<td>"."Context"."</td>";
		echo "<td>"."Defaultip"."</td>";
		echo "<td>"."Dtmfmode"."</td>";
		echo "<td>"."Fromuser"."</td>";
		echo "<td>"."Fromdomain"."</td>";
		echo "<td>"."Insecure"."</td>";
		echo "<td>"."Language"."</td>";
		echo "<td>"."Mailbox"."</td>";
		echo "<td>"."Md5secret"."</td>";
		echo "<td>"."Deny"."</td>";
		echo "<td>"."Permit"."</td>";
		echo "<td>"."Mask"."</td>";
		echo "<td>"."Musiconhold"."</td>";
		echo "<td>"."Pickupgroup"."</td>";
		echo "<td>"."Qualify"."</td>";
		echo "<td>"."Rtcachefriends"."</td>";
		echo "<td>"."Regexten"."</td>";
		echo "<td>"."Restrictcid"."</td>";
		echo "<td>"."Rtptimeout"."</td>";
		echo "<td>"."Rtpholdtimeout"."</td>";
		echo "<td>"."Secret"."</td>";
		echo "<td>"."Setvar"."</td>";
		echo "<td>"."Disallow"."</td>";
		echo "<td>"."Allow"."</td>";
		echo "<td>"."Fullcontact"."</td>";
		echo "<td>"."Ipaddr"."</td>";
		echo "<td>"."Port"."</td>";
		echo "<td>"."Regserver"."</td>";
		echo "<td>"."Regseconds"."</td>";
		echo "<td>"."Lastms"."</td>";
		echo "<td>"."Username"."</td>";
		echo "<td>"."Defaultuser"."</td>";
		echo "<td>"."Subscribecontext"."</td>";
		echo "<td>"."Useragent"."</td>";
		echo "<td>"."Gateway"."</td>";
		echo "<td>"."Id Horario"."</td>";
		echo "<td>"."Mail"."</td>";
		echo "<td>"."Grava Chamada"."</td>";
		echo "<td>"."Tp Ramal"."</td>";
		echo "<td>"."Transbordo"."</td>";
		echo "<td>"."Id Interf"."</td>";
		echo "<td>"."Ident Interf"."</td>";
		echo "<td>"."Tp Chamada"."</td>";
		echo "<td>"."Flg Cadeado"."</td>";
		echo "<td>"."Desvio"."</td>";
		echo "<td>"."Id Pesquisa"."</td>";
		echo "<td>"."Desvio Ddr"."</td>";
		echo "<td>"."Id Saida"."</td>";
	}
	echo "</tr>";

	$totals=array();
// write data rows
	$iNumberOfRows = 0;
	while((!$nPageSize || $iNumberOfRows<$nPageSize) && $row)
	{
			
		$values = array();	

					
							$format="";
			
			$values["id"] = GetData($row,"id",$format);
					
							$format="";
			
			$values["name"] = GetData($row,"name",$format);
					
							$format="";
			
			$values["host"] = GetData($row,"host",$format);
					
							$format="";
			
			$values["nat"] = GetData($row,"nat",$format);
					
							$format="";
			
			$values["type"] = GetData($row,"type",$format);
					
							$format="";
			
			$values["accountcode"] = GetData($row,"accountcode",$format);
					
							$format="";
			
			$values["amaflags"] = GetData($row,"amaflags",$format);
					
							$format="";
			
			$values["call-limit"] = GetData($row,"call-limit",$format);
					
							$format="";
			
			$values["callgroup"] = GetData($row,"callgroup",$format);
					
							$format="";
			
			$values["callerid"] = GetData($row,"callerid",$format);
					
							$format="";
			
			$values["cancallforward"] = GetData($row,"cancallforward",$format);
					
							$format="";
			
			$values["canreinvite"] = GetData($row,"canreinvite",$format);
					
							$format="";
			
			$values["context"] = GetData($row,"context",$format);
					
							$format="";
			
			$values["defaultip"] = GetData($row,"defaultip",$format);
					
							$format="";
			
			$values["dtmfmode"] = GetData($row,"dtmfmode",$format);
					
							$format="";
			
			$values["fromuser"] = GetData($row,"fromuser",$format);
					
							$format="";
			
			$values["fromdomain"] = GetData($row,"fromdomain",$format);
					
							$format="";
			
			$values["insecure"] = GetData($row,"insecure",$format);
					
							$format="";
			
			$values["language"] = GetData($row,"language",$format);
					
							$format="";
			
			$values["mailbox"] = GetData($row,"mailbox",$format);
					
							$format="";
			
			$values["md5secret"] = GetData($row,"md5secret",$format);
					
							$format="";
			
			$values["deny"] = GetData($row,"deny",$format);
					
							$format="";
			
			$values["permit"] = GetData($row,"permit",$format);
					
							$format="";
			
			$values["mask"] = GetData($row,"mask",$format);
					
							$format="";
			
			$values["musiconhold"] = GetData($row,"musiconhold",$format);
					
							$format="";
			
			$values["pickupgroup"] = GetData($row,"pickupgroup",$format);
					
							$format="";
			
			$values["qualify"] = GetData($row,"qualify",$format);
					
							$format="";
			
			$values["rtcachefriends"] = GetData($row,"rtcachefriends",$format);
					
							$format="";
			
			$values["regexten"] = GetData($row,"regexten",$format);
					
							$format="";
			
			$values["restrictcid"] = GetData($row,"restrictcid",$format);
					
							$format="";
			
			$values["rtptimeout"] = GetData($row,"rtptimeout",$format);
					
							$format="";
			
			$values["rtpholdtimeout"] = GetData($row,"rtpholdtimeout",$format);
					
							$format="";
			
			$values["secret"] = GetData($row,"secret",$format);
					
							$format="";
			
			$values["setvar"] = GetData($row,"setvar",$format);
					
							$format="";
			
			$values["disallow"] = GetData($row,"disallow",$format);
					
							$format="";
			
			$values["allow"] = GetData($row,"allow",$format);
					
							$format="";
			
			$values["fullcontact"] = GetData($row,"fullcontact",$format);
					
							$format="";
			
			$values["ipaddr"] = GetData($row,"ipaddr",$format);
					
							$format="";
			
			$values["port"] = GetData($row,"port",$format);
					
							$format="";
			
			$values["regserver"] = GetData($row,"regserver",$format);
					
							$format="";
			
			$values["regseconds"] = GetData($row,"regseconds",$format);
					
							$format="";
			
			$values["lastms"] = GetData($row,"lastms",$format);
					
							$format="";
			
			$values["username"] = GetData($row,"username",$format);
					
							$format="";
			
			$values["defaultuser"] = GetData($row,"defaultuser",$format);
					
							$format="";
			
			$values["subscribecontext"] = GetData($row,"subscribecontext",$format);
					
							$format="";
			
			$values["useragent"] = GetData($row,"useragent",$format);
					
							$format="";
			
			$values["gateway"] = GetData($row,"gateway",$format);
					
							$format="";
			
			$values["id_horario"] = GetData($row,"id_horario",$format);
					
							$format="";
			
			$values["mail"] = GetData($row,"mail",$format);
					
							$format="";
			
			$values["grava_chamada"] = GetData($row,"grava_chamada",$format);
					
							$format="";
			
			$values["tp_ramal"] = GetData($row,"tp_ramal",$format);
					
							$format="";
			
			$values["Transbordo"] = GetData($row,"Transbordo",$format);
					
							$format="";
			
			$values["id_interf"] = GetData($row,"id_interf",$format);
					
							$format="";
			
			$values["ident_interf"] = GetData($row,"ident_interf",$format);
					
							$format="";
			
			$values["tp_chamada"] = GetData($row,"tp_chamada",$format);
					
							$format="";
			
			$values["flg_cadeado"] = GetData($row,"flg_cadeado",$format);
					
							$format="";
			
			$values["desvio"] = GetData($row,"desvio",$format);
					
							$format="";
			
			$values["id_pesquisa"] = GetData($row,"id_pesquisa",$format);
					
							$format="";
			
			$values["desvio_ddr"] = GetData($row,"desvio_ddr",$format);
					
							$format="";
			
			$values["id_saida"] = GetData($row,"id_saida",$format);

		
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
									echo htmlspecialchars($values["id"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["name"]);
					else
						echo htmlspecialchars($values["name"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["host"]);
					else
						echo htmlspecialchars($values["host"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["nat"]);
					else
						echo htmlspecialchars($values["nat"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["type"]);
					else
						echo htmlspecialchars($values["type"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["accountcode"]);
					else
						echo htmlspecialchars($values["accountcode"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["amaflags"]);
					else
						echo htmlspecialchars($values["amaflags"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["call-limit"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["callgroup"]);
					else
						echo htmlspecialchars($values["callgroup"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["callerid"]);
					else
						echo htmlspecialchars($values["callerid"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["cancallforward"]);
					else
						echo htmlspecialchars($values["cancallforward"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["canreinvite"]);
					else
						echo htmlspecialchars($values["canreinvite"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["context"]);
					else
						echo htmlspecialchars($values["context"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["defaultip"]);
					else
						echo htmlspecialchars($values["defaultip"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["dtmfmode"]);
					else
						echo htmlspecialchars($values["dtmfmode"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["fromuser"]);
					else
						echo htmlspecialchars($values["fromuser"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["fromdomain"]);
					else
						echo htmlspecialchars($values["fromdomain"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["insecure"]);
					else
						echo htmlspecialchars($values["insecure"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["language"]);
					else
						echo htmlspecialchars($values["language"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["mailbox"]);
					else
						echo htmlspecialchars($values["mailbox"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["md5secret"]);
					else
						echo htmlspecialchars($values["md5secret"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["deny"]);
					else
						echo htmlspecialchars($values["deny"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["permit"]);
					else
						echo htmlspecialchars($values["permit"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["mask"]);
					else
						echo htmlspecialchars($values["mask"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["musiconhold"]);
					else
						echo htmlspecialchars($values["musiconhold"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["pickupgroup"]);
					else
						echo htmlspecialchars($values["pickupgroup"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["qualify"]);
					else
						echo htmlspecialchars($values["qualify"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["rtcachefriends"]);
					else
						echo htmlspecialchars($values["rtcachefriends"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["regexten"]);
					else
						echo htmlspecialchars($values["regexten"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["restrictcid"]);
					else
						echo htmlspecialchars($values["restrictcid"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["rtptimeout"]);
					else
						echo htmlspecialchars($values["rtptimeout"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["rtpholdtimeout"]);
					else
						echo htmlspecialchars($values["rtpholdtimeout"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["secret"]);
					else
						echo htmlspecialchars($values["secret"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["setvar"]);
					else
						echo htmlspecialchars($values["setvar"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["disallow"]);
					else
						echo htmlspecialchars($values["disallow"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["allow"]);
					else
						echo htmlspecialchars($values["allow"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["fullcontact"]);
					else
						echo htmlspecialchars($values["fullcontact"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["ipaddr"]);
					else
						echo htmlspecialchars($values["ipaddr"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["port"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["regserver"]);
					else
						echo htmlspecialchars($values["regserver"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["regseconds"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["lastms"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["username"]);
					else
						echo htmlspecialchars($values["username"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["defaultuser"]);
					else
						echo htmlspecialchars($values["defaultuser"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["subscribecontext"]);
					else
						echo htmlspecialchars($values["subscribecontext"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["useragent"]);
					else
						echo htmlspecialchars($values["useragent"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["gateway"]);
					else
						echo htmlspecialchars($values["gateway"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["id_horario"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["mail"]);
					else
						echo htmlspecialchars($values["mail"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["grava_chamada"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["tp_ramal"]);
					else
						echo htmlspecialchars($values["tp_ramal"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["Transbordo"]);
					else
						echo htmlspecialchars($values["Transbordo"]);
			echo '</td>';
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
						echo PrepareForExcel($values["ident_interf"]);
					else
						echo htmlspecialchars($values["ident_interf"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["tp_chamada"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["flg_cadeado"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["desvio"]);
					else
						echo htmlspecialchars($values["desvio"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["id_pesquisa"]);
			echo '</td>';
							echo '<td>';
						
			
									$format="";
									echo htmlspecialchars($values["desvio_ddr"]);
			echo '</td>';
							if($_REQUEST["type"]=="excel")
					echo '<td x:str>';
				else
					echo '<td>';
						
			
									$format="";
									if($_REQUEST["type"]=="excel")
						echo PrepareForExcel($values["id_saida"]);
					else
						echo htmlspecialchars($values["id_saida"]);
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