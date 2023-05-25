<?php

//	field labels
$fieldLabelsLiga__es_discadas = array();
$fieldLabelsLiga__es_discadas["Portuguese(Brazil)"]=array();
$fieldLabelsLiga__es_discadas["Portuguese(Brazil)"]["Hora"] = "Hora";
$fieldLabelsLiga__es_discadas["Portuguese(Brazil)"]["src"] = "Origem";
$fieldLabelsLiga__es_discadas["Portuguese(Brazil)"]["dst"] = "Destino";
$fieldLabelsLiga__es_discadas["Portuguese(Brazil)"]["Tempo"] = "Tempo";
$fieldLabelsLiga__es_discadas["Portuguese(Brazil)"]["disposition"] = "Resultado";
$fieldLabelsLiga__es_discadas["Portuguese(Brazil)"]["Total"] = "Total";
$fieldLabelsLiga__es_discadas["Portuguese(Brazil)"]["Per_odo"] = "Período";


$tdataLiga__es_discadas=array();
	$tdataLiga__es_discadas[".ShortName"]="Liga__es_discadas";
	$tdataLiga__es_discadas[".OwnerID"]="";
	$tdataLiga__es_discadas[".OriginalTable"]="cdr";
	$tdataLiga__es_discadas[".NCSearch"]=true;
	
	$tdataLiga__es_discadas[".ChartRefreshTime"] = 0;

$tdataLiga__es_discadas[".shortTableName"] = "Liga__es_discadas";
$tdataLiga__es_discadas[".dataSourceTable"] = "Graf. Lig. Discadas";
$tdataLiga__es_discadas[".nSecOptions"] = 0;
$tdataLiga__es_discadas[".nLoginMethod"] = 1;
$tdataLiga__es_discadas[".recsPerRowList"] = 1;	
$tdataLiga__es_discadas[".tableGroupBy"] = "1";
$tdataLiga__es_discadas[".dbType"] = 0;
$tdataLiga__es_discadas[".mainTableOwnerID"] = "";
$tdataLiga__es_discadas[".moveNext"] = 1;

$tdataLiga__es_discadas[".listAjax"] = true;

	$tdataLiga__es_discadas[".audit"] = false;

	$tdataLiga__es_discadas[".locking"] = false;
	
$tdataLiga__es_discadas[".listIcons"] = true;




$tdataLiga__es_discadas[".showSimpleSearchOptions"] = false;

$tdataLiga__es_discadas[".showSearchPanel"] = true;


$tdataLiga__es_discadas[".isUseAjaxSuggest"] = true;


$tdataLiga__es_discadas[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataLiga__es_discadas[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataLiga__es_discadas[".isUseTimeForSearch"] = false;





$tdataLiga__es_discadas[".isUseInlineJs"] = $tdataLiga__es_discadas[".isUseInlineAdd"] || $tdataLiga__es_discadas[".isUseInlineEdit"];

$tdataLiga__es_discadas[".allSearchFields"] = array();

$tdataLiga__es_discadas[".globSearchFields"][] = "Período";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Período", $tdataLiga__es_discadas[".allSearchFields"]))
{
	$tdataLiga__es_discadas[".allSearchFields"][] = "Período";	
}
$tdataLiga__es_discadas[".globSearchFields"][] = "src";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("src", $tdataLiga__es_discadas[".allSearchFields"]))
{
	$tdataLiga__es_discadas[".allSearchFields"][] = "src";	
}
$tdataLiga__es_discadas[".globSearchFields"][] = "dst";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dst", $tdataLiga__es_discadas[".allSearchFields"]))
{
	$tdataLiga__es_discadas[".allSearchFields"][] = "dst";	
}


$tdataLiga__es_discadas[".isDynamicPerm"] = true;

	

$tdataLiga__es_discadas[".isDisplayLoading"] = true;

$tdataLiga__es_discadas[".isResizeColumns"] = false;


$tdataLiga__es_discadas[".createLoginPage"] = true;


 	



$gstrOrderBy = "order by 1,2";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataLiga__es_discadas[".strOrderBy"] = $gstrOrderBy;
	
$tdataLiga__es_discadas[".orderindexes"] = array();

$tdataLiga__es_discadas[".sqlHead"] = "select DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS `Período`,  DATE_FORMAT(calldate ,'%T') AS Hora,  src,  case length(dst)   when 13 then substr(dst,-10)   when 12 then substr(dst,-10)   when 11 then substr(dst,-10)   when 8 then dst else dst end AS dst,  SEC_TO_TIME(duration) AS Tempo,  case disposition   when 'NO ANSWER' then 'NÃO ATENDE'   when 'ANSWERED' then 'ATENDIDO'   when 'BUSY' then 'OCUPADO'   else disposition end AS disposition,  COUNT(*) AS Total";

$tdataLiga__es_discadas[".sqlFrom"] = "FROM cdr";

$tdataLiga__es_discadas[".sqlWhereExpr"] = "(lastapp <> 'VoiceMail') AND (length(dst) > 4) AND (channel not like 'Local/%')";

$tdataLiga__es_discadas[".sqlTail"] = "GROUP BY disposition";



	$tableKeys=array();
	$tdataLiga__es_discadas[".Keys"]=$tableKeys;

	
//	Período
	$fdata = array();
	$fdata["strName"] = "Período";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Per_odo";
		$fdata["FullName"]= "DATE(DATE_FORMAT(calldate ,'%Y-%m-%d'))";
						$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataLiga__es_discadas["Período"]=$fdata;
	
//	Hora
	$fdata = array();
	$fdata["strName"] = "Hora";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Hora";
		$fdata["FullName"]= "DATE_FORMAT(calldate ,'%T')";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
									$tdataLiga__es_discadas["Hora"]=$fdata;
	
//	src
	$fdata = array();
	$fdata["strName"] = "src";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Origem"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "src";
		$fdata["FullName"]= "src";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
				$fdata["FieldPermissions"]=true;
						$tdataLiga__es_discadas["src"]=$fdata;
	
//	dst
	$fdata = array();
	$fdata["strName"] = "dst";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Destino"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dst";
		$fdata["FullName"]= "case length(dst)   when 13 then substr(dst,-10)   when 12 then substr(dst,-10)   when 11 then substr(dst,-10)   when 8 then dst else dst end";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
				$fdata["FieldPermissions"]=true;
						$tdataLiga__es_discadas["dst"]=$fdata;
	
//	Tempo
	$fdata = array();
	$fdata["strName"] = "Tempo";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Tempo";
		$fdata["FullName"]= "SEC_TO_TIME(duration)";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
										$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataLiga__es_discadas["Tempo"]=$fdata;
	
//	disposition
	$fdata = array();
	$fdata["strName"] = "disposition";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Resultado"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "disposition";
		$fdata["FullName"]= "case disposition   when 'NO ANSWER' then 'NÃO ATENDE'   when 'ANSWERED' then 'ATENDIDO'   when 'BUSY' then 'OCUPADO'   else disposition end";
						$fdata["Index"]= 6;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=45";
		
									$tdataLiga__es_discadas["disposition"]=$fdata;
	
//	Total
	$fdata = array();
	$fdata["strName"] = "Total";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "Currency";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Total";
		$fdata["FullName"]= "COUNT(*)";
						$fdata["Index"]= 7;
	
			$fdata["EditParams"]="";
			
									$tdataLiga__es_discadas["Total"]=$fdata;

$tdataLiga__es_discadas[".chartXml"] = '<chart>
<attr value="tables">
	<attr value="0">Graf. Lig. Discadas</attr>
</attr>
<attr value="chart_type">
	<attr value="type">2d_doughnut</attr>
</attr>

<attr value="parameters">
<attr value="0">
<attr value="name">Total</attr>
<attr value="currencyFormat">0</attr>
<attr value="decimalFormat">0</attr>
<attr value="customFormat">0</attr>
<attr value="customFormatStr"></attr>
</attr>
<attr value="1">
<attr value="name">disposition</attr>
</attr>
</attr>


<attr value="appearance">
	<attr value="scolor11">FF0000</attr>
	<attr value="scolor12">FF0000</attr>

<attr value="nameTypeHeader">Text</attr>
<attr value="nameTypeFooter">Text</attr>

<attr value="head">LigaÃ§Ãµes Discadas</attr>

<attr value="foot">Legendas</attr>

<attr value="color51">49563A</attr>
<attr value="color52">49563A</attr>
<attr value="color61">49563A</attr>
<attr value="color62">49563A</attr>
<attr value="color71">C7CDC1</attr>
<attr value="color72">C7CDC1</attr>
<attr value="color81">ECF0E8</attr>
<attr value="color82">ECF0E8</attr>
<attr value="color91">68838B</attr>
<attr value="color92">68838B</attr>
<attr value="color101">48505A</attr>
<attr value="color102">48505A</attr>
<attr value="color111">45595F</attr>
<attr value="color112">45595F</attr>
<attr value="color121"></attr>
<attr value="color122"></attr>
<attr value="color131">000000</attr>
<attr value="color132">000000</attr>
<attr value="color141">000000</attr>
<attr value="color142">000000</attr>

<attr value="slegend">true</attr>
<attr value="sgrid">false</attr>
<attr value="sname">true</attr>
<attr value="sval">true</attr>
<attr value="sanim">true</attr>
<attr value="sstacked">false</attr>
<attr value="saxes">false</attr>
<attr value="slog">false</attr>
<attr value="aqua">0</attr>
<attr value="cview">0</attr>
<attr value="is3d">0</attr>
<attr value="isstacked">0</attr>
<attr value="linestyle">0</attr>
<attr value="autoupdate">0</attr>
<attr value="autoupmin">5</attr>
<attr value="cscroll">1</attr>
<attr value="maxbarscroll">10</attr>
</attr>

<attr value="fields">
	<attr value="0">
		<attr value="name">Período</attr>
		<attr value="label">Período</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="1">
		<attr value="name">Hora</attr>
		<attr value="label">Hora</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="2">
		<attr value="name">src</attr>
		<attr value="label">Origem</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="3">
		<attr value="name">dst</attr>
		<attr value="label">Destino</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="4">
		<attr value="name">Tempo</attr>
		<attr value="label">Tempo</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="5">
		<attr value="name">disposition</attr>
		<attr value="label">Resultado</attr>
		<attr value="search"></attr>
	</attr>
	<attr value="6">
		<attr value="name">Total</attr>
		<attr value="label">Total</attr>
		<attr value="search"></attr>
	</attr>
</attr>


<attr value="settings">
<attr value="name">Período</attr>
<attr value="short_table_name">Liga__es_discadas</attr>
</attr>

</chart>';
	
$tables_data["Graf. Lig. Discadas"]=&$tdataLiga__es_discadas;
$field_labels["Graf__Lig__Discadas"] = &$fieldLabelsLiga__es_discadas;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Graf. Lig. Discadas"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Graf. Lig. Discadas"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto251=array();
$proto251["m_strHead"] = "select";
$proto251["m_strFieldList"] = "DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS `Período`,  DATE_FORMAT(calldate ,'%T') AS Hora,  src,  case length(dst)   when 13 then substr(dst,-10)   when 12 then substr(dst,-10)   when 11 then substr(dst,-10)   when 8 then dst else dst end AS dst,  SEC_TO_TIME(duration) AS Tempo,  case disposition   when 'NO ANSWER' then 'NÃO ATENDE'   when 'ANSWERED' then 'ATENDIDO'   when 'BUSY' then 'OCUPADO'   else disposition end AS disposition,  COUNT(*) AS Total";
$proto251["m_strFrom"] = "FROM cdr";
$proto251["m_strWhere"] = "(lastapp <> 'VoiceMail') AND (length(dst) > 4) AND (channel not like 'Local/%')";
$proto251["m_strOrderBy"] = "order by 1,2";
$proto251["m_strTail"] = "GROUP BY disposition";
$proto252=array();
$proto252["m_sql"] = "(lastapp <> 'VoiceMail') AND (length(dst) > 4) AND (channel not like 'Local/%')";
$proto252["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(lastapp <> 'VoiceMail') AND (length(dst) > 4) AND (channel not like 'Local/%')"
));

$proto252["m_column"]=$obj;
$proto252["m_contained"] = array();
						$proto254=array();
$proto254["m_sql"] = "lastapp <> 'VoiceMail'";
$proto254["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "lastapp",
	"m_strTable" => "cdr"
));

$proto254["m_column"]=$obj;
$proto254["m_contained"] = array();
$proto254["m_strCase"] = "<> 'VoiceMail'";
$proto254["m_havingmode"] = "0";
$proto254["m_inBrackets"] = "1";
$proto254["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto254);

			$proto252["m_contained"][]=$obj;
						$proto256=array();
$proto256["m_sql"] = "length(dst) > 4";
$proto256["m_uniontype"] = "SQLL_UNKNOWN";
						$proto257=array();
$proto257["m_functiontype"] = "SQLF_CUSTOM";
$proto257["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "dst"
));

$proto257["m_arguments"][]=$obj;
$proto257["m_strFunctionName"] = "length";
$obj = new SQLFunctionCall($proto257);

$proto256["m_column"]=$obj;
$proto256["m_contained"] = array();
$proto256["m_strCase"] = "> 4";
$proto256["m_havingmode"] = "0";
$proto256["m_inBrackets"] = "1";
$proto256["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto256);

			$proto252["m_contained"][]=$obj;
						$proto259=array();
$proto259["m_sql"] = "channel not like 'Local/%'";
$proto259["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "channel",
	"m_strTable" => "cdr"
));

$proto259["m_column"]=$obj;
$proto259["m_contained"] = array();
$proto259["m_strCase"] = "not like 'Local/%'";
$proto259["m_havingmode"] = "0";
$proto259["m_inBrackets"] = "1";
$proto259["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto259);

			$proto252["m_contained"][]=$obj;
$proto252["m_strCase"] = "";
$proto252["m_havingmode"] = "0";
$proto252["m_inBrackets"] = "0";
$proto252["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto252);

$proto251["m_where"] = $obj;
$proto261=array();
$proto261["m_sql"] = "";
$proto261["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto261["m_column"]=$obj;
$proto261["m_contained"] = array();
$proto261["m_strCase"] = "";
$proto261["m_havingmode"] = "0";
$proto261["m_inBrackets"] = "0";
$proto261["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto261);

$proto251["m_having"] = $obj;
$proto251["m_fieldlist"] = array();
						$proto263=array();
			$proto264=array();
$proto264["m_functiontype"] = "SQLF_CUSTOM";
$proto264["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate ,'%Y-%m-%d')"
));

$proto264["m_arguments"][]=$obj;
$proto264["m_strFunctionName"] = "DATE";
$obj = new SQLFunctionCall($proto264);

$proto263["m_expr"]=$obj;
$proto263["m_alias"] = "Período";
$obj = new SQLFieldListItem($proto263);

$proto251["m_fieldlist"][]=$obj;
						$proto266=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate ,'%T')"
));

$proto266["m_expr"]=$obj;
$proto266["m_alias"] = "Hora";
$obj = new SQLFieldListItem($proto266);

$proto251["m_fieldlist"][]=$obj;
						$proto268=array();
			$obj = new SQLField(array(
	"m_strName" => "src",
	"m_strTable" => "cdr"
));

$proto268["m_expr"]=$obj;
$proto268["m_alias"] = "";
$obj = new SQLFieldListItem($proto268);

$proto251["m_fieldlist"][]=$obj;
						$proto270=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "case length(dst)   when 13 then substr(dst,-10)   when 12 then substr(dst,-10)   when 11 then substr(dst,-10)   when 8 then dst else dst end"
));

$proto270["m_expr"]=$obj;
$proto270["m_alias"] = "dst";
$obj = new SQLFieldListItem($proto270);

$proto251["m_fieldlist"][]=$obj;
						$proto272=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "SEC_TO_TIME(duration)"
));

$proto272["m_expr"]=$obj;
$proto272["m_alias"] = "Tempo";
$obj = new SQLFieldListItem($proto272);

$proto251["m_fieldlist"][]=$obj;
						$proto274=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "case disposition   when 'NO ANSWER' then 'NÃO ATENDE'   when 'ANSWERED' then 'ATENDIDO'   when 'BUSY' then 'OCUPADO'   else disposition end"
));

$proto274["m_expr"]=$obj;
$proto274["m_alias"] = "disposition";
$obj = new SQLFieldListItem($proto274);

$proto251["m_fieldlist"][]=$obj;
						$proto276=array();
			$proto277=array();
$proto277["m_functiontype"] = "SQLF_COUNT";
$proto277["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "*"
));

$proto277["m_arguments"][]=$obj;
$proto277["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto277);

$proto276["m_expr"]=$obj;
$proto276["m_alias"] = "Total";
$obj = new SQLFieldListItem($proto276);

$proto251["m_fieldlist"][]=$obj;
$proto251["m_fromlist"] = array();
												$proto279=array();
$proto279["m_link"] = "SQLL_MAIN";
			$proto280=array();
$proto280["m_strName"] = "cdr";
$proto280["m_columns"] = array();
$proto280["m_columns"][] = "calldate";
$proto280["m_columns"][] = "clid";
$proto280["m_columns"][] = "src";
$proto280["m_columns"][] = "dst";
$proto280["m_columns"][] = "dcontext";
$proto280["m_columns"][] = "channel";
$proto280["m_columns"][] = "dstchannel";
$proto280["m_columns"][] = "lastapp";
$proto280["m_columns"][] = "lastdata";
$proto280["m_columns"][] = "duration";
$proto280["m_columns"][] = "billsec";
$proto280["m_columns"][] = "disposition";
$proto280["m_columns"][] = "amaflags";
$proto280["m_columns"][] = "accountcode";
$proto280["m_columns"][] = "uniqueid";
$proto280["m_columns"][] = "userfield";
$obj = new SQLTable($proto280);

$proto279["m_table"] = $obj;
$proto279["m_alias"] = "";
$proto281=array();
$proto281["m_sql"] = "";
$proto281["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto281["m_column"]=$obj;
$proto281["m_contained"] = array();
$proto281["m_strCase"] = "";
$proto281["m_havingmode"] = "0";
$proto281["m_inBrackets"] = "0";
$proto281["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto281);

$proto279["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto279);

$proto251["m_fromlist"][]=$obj;
$proto251["m_groupby"] = array();
												$proto283=array();
						$obj = new SQLField(array(
	"m_strName" => "disposition",
	"m_strTable" => "cdr"
));

$proto283["m_column"]=$obj;
$obj = new SQLGroupByItem($proto283);

$proto251["m_groupby"][]=$obj;
$proto251["m_orderby"] = array();
												$proto285=array();
	$obj = new SQLNonParsed(array(
	"m_sql" => "1"
));

$proto285["m_column"]=$obj;
$proto285["m_bAsc"] = 1;
$proto285["m_nColumn"] = 1;
$obj = new SQLOrderByItem($proto285);

$proto251["m_orderby"][]=$obj;					
												$proto287=array();
	$obj = new SQLNonParsed(array(
	"m_sql" => "2"
));

$proto287["m_column"]=$obj;
$proto287["m_bAsc"] = 1;
$proto287["m_nColumn"] = 2;
$obj = new SQLOrderByItem($proto287);

$proto251["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto251);

$queryData_Liga__es_discadas = $obj;
$tdataLiga__es_discadas[".sqlquery"] = $queryData_Liga__es_discadas;



?>
