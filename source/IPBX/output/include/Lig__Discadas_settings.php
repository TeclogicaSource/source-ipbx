<?php

//	field labels
$fieldLabelsLig__Discadas = array();
$fieldLabelsLig__Discadas["Portuguese(Brazil)"]=array();
$fieldLabelsLig__Discadas["Portuguese(Brazil)"]["Periodo"] = "Período";
$fieldLabelsLig__Discadas["Portuguese(Brazil)"]["Hora"] = "Hora";
$fieldLabelsLig__Discadas["Portuguese(Brazil)"]["src"] = "Origem";
$fieldLabelsLig__Discadas["Portuguese(Brazil)"]["dst"] = "Destino";
$fieldLabelsLig__Discadas["Portuguese(Brazil)"]["Tempo"] = "Duração";
$fieldLabelsLig__Discadas["Portuguese(Brazil)"]["disposition"] = "Status";
$fieldLabelsLig__Discadas["Portuguese(Brazil)"]["calldate"] = "Data Hora";
$fieldLabelsLig__Discadas["Portuguese(Brazil)"]["Audio"] = "Audio";


$tdataLig__Discadas=array();
	$tdataLig__Discadas[".NumberOfChars"]=80; 
	$tdataLig__Discadas[".ShortName"]="Lig__Discadas";
	$tdataLig__Discadas[".OwnerID"]="";
	$tdataLig__Discadas[".OriginalTable"]="cdr";
	$tdataLig__Discadas[".NCSearch"]=true;
	

$tdataLig__Discadas[".shortTableName"] = "Lig__Discadas";
$tdataLig__Discadas[".dataSourceTable"] = "Rel. Lig. Discadas";
$tdataLig__Discadas[".nSecOptions"] = 0;
$tdataLig__Discadas[".nLoginMethod"] = 1;
$tdataLig__Discadas[".recsPerRowList"] = 1;	
$tdataLig__Discadas[".tableGroupBy"] = "0";
$tdataLig__Discadas[".dbType"] = 0;
$tdataLig__Discadas[".mainTableOwnerID"] = "";
$tdataLig__Discadas[".moveNext"] = 1;

$tdataLig__Discadas[".listAjax"] = true;

	$tdataLig__Discadas[".audit"] = false;

	$tdataLig__Discadas[".locking"] = false;
	
$tdataLig__Discadas[".listIcons"] = true;

$tdataLig__Discadas[".exportTo"] = true;

$tdataLig__Discadas[".printFriendly"] = true;


$tdataLig__Discadas[".showSimpleSearchOptions"] = false;

$tdataLig__Discadas[".showSearchPanel"] = true;


$tdataLig__Discadas[".isUseAjaxSuggest"] = true;


$tdataLig__Discadas[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataLig__Discadas[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataLig__Discadas[".isUseTimeForSearch"] = false;





$tdataLig__Discadas[".isUseInlineJs"] = $tdataLig__Discadas[".isUseInlineAdd"] || $tdataLig__Discadas[".isUseInlineEdit"];

$tdataLig__Discadas[".allSearchFields"] = array();

$tdataLig__Discadas[".globSearchFields"][] = "Periodo";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Periodo", $tdataLig__Discadas[".allSearchFields"]))
{
	$tdataLig__Discadas[".allSearchFields"][] = "Periodo";	
}
$tdataLig__Discadas[".globSearchFields"][] = "src";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("src", $tdataLig__Discadas[".allSearchFields"]))
{
	$tdataLig__Discadas[".allSearchFields"][] = "src";	
}
$tdataLig__Discadas[".globSearchFields"][] = "dst";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dst", $tdataLig__Discadas[".allSearchFields"]))
{
	$tdataLig__Discadas[".allSearchFields"][] = "dst";	
}


$tdataLig__Discadas[".isDynamicPerm"] = true;

	

$tdataLig__Discadas[".isDisplayLoading"] = true;

$tdataLig__Discadas[".isResizeColumns"] = false;


$tdataLig__Discadas[".createLoginPage"] = true;


 	

$tdataLig__Discadas[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY substr(src, -4), calldate";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataLig__Discadas[".strOrderBy"] = $gstrOrderBy;
	
$tdataLig__Discadas[".orderindexes"] = array();
$tdataLig__Discadas[".orderindexes"][] = array(3, (1 ? "ASC" : "DESC"), "substr(src, -4)");
$tdataLig__Discadas[".orderindexes"][] = array(7, (1 ? "ASC" : "DESC"), "cdr.calldate");

$tdataLig__Discadas[".sqlHead"] = "select DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS Periodo,  DATE_FORMAT(calldate ,'%T') AS Hora,  substr(src, -4) AS src,  case dst  when 'i' then 'SEM PRIVILÉGIO'   else dst end AS dst,  SEC_TO_TIME(duration) AS Tempo,  case disposition   when 'NO ANSWER' then 'NÃO ATENDE'   when 'ANSWERED' then 'ATENDIDO'   when 'BUSY' then 'OCUPADO'   else disposition end AS disposition,  calldate,  concat(\"<a href=./download.php?table=ipbx_gravacoes&field=nm_arq&key1=\", ipbx_gravacoes.id_grav, \"> DOWNLOAD </a>\") as Audio";

$tdataLig__Discadas[".sqlFrom"] = "FROM cdr LEFT OUTER JOIN ipbx_gravacoes ON cdr.uniqueid = ipbx_gravacoes.uniqueid";

$tdataLig__Discadas[".sqlWhereExpr"] = "(lastapp <> 'VoiceMail') AND (length(src) < 5 && length(src) > 3)";

$tdataLig__Discadas[".sqlTail"] = "";



	$tableKeys=array();
	$tdataLig__Discadas[".Keys"]=$tableKeys;

	
//	Periodo
	$fdata = array();
	$fdata["strName"] = "Periodo";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Período"; 
			$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Datetime";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Periodo";
		$fdata["FullName"]= "DATE(DATE_FORMAT(calldate ,'%Y-%m-%d'))";
						$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
									$tdataLig__Discadas["Periodo"]=$fdata;
	
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
			
									$tdataLig__Discadas["Hora"]=$fdata;
	
//	src
	$fdata = array();
	$fdata["strName"] = "src";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Origem"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "src";
		$fdata["FullName"]= "substr(src, -4)";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
				$fdata["FieldPermissions"]=true;
						$tdataLig__Discadas["src"]=$fdata;
	
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
		$fdata["FullName"]= "case dst  when 'i' then 'SEM PRIVILÉGIO'   else dst end";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
				$fdata["FieldPermissions"]=true;
						$tdataLig__Discadas["dst"]=$fdata;
	
//	Tempo
	$fdata = array();
	$fdata["strName"] = "Tempo";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Duração"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Time";
	$fdata["ViewFormat"]= "Time";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Tempo";
		$fdata["FullName"]= "SEC_TO_TIME(duration)";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataLig__Discadas["Tempo"]=$fdata;
	
//	disposition
	$fdata = array();
	$fdata["strName"] = "disposition";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Status"; 
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
		
				$fdata["FieldPermissions"]=true;
						$tdataLig__Discadas["disposition"]=$fdata;
	
//	calldate
	$fdata = array();
	$fdata["strName"] = "calldate";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Data Hora"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Datetime";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "calldate";
		$fdata["FullName"]= "calldate";
						$fdata["Index"]= 7;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataLig__Discadas["calldate"]=$fdata;
	
//	Audio
	$fdata = array();
	$fdata["strName"] = "Audio";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Audio";
		$fdata["FullName"]= "concat(\"<a href=./download.php?table=ipbx_gravacoes&field=nm_arq&key1=\", ipbx_gravacoes.id_grav, \"> DOWNLOAD </a>\")";
						$fdata["Index"]= 8;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataLig__Discadas["Audio"]=$fdata;

	
$tables_data["Rel. Lig. Discadas"]=&$tdataLig__Discadas;
$field_labels["Rel__Lig__Discadas"] = &$fieldLabelsLig__Discadas;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Lig. Discadas"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Lig. Discadas"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1234=array();
$proto1234["m_strHead"] = "select";
$proto1234["m_strFieldList"] = "DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS Periodo,  DATE_FORMAT(calldate ,'%T') AS Hora,  substr(src, -4) AS src,  case dst  when 'i' then 'SEM PRIVILÉGIO'   else dst end AS dst,  SEC_TO_TIME(duration) AS Tempo,  case disposition   when 'NO ANSWER' then 'NÃO ATENDE'   when 'ANSWERED' then 'ATENDIDO'   when 'BUSY' then 'OCUPADO'   else disposition end AS disposition,  calldate,  concat(\"<a href=./download.php?table=ipbx_gravacoes&field=nm_arq&key1=\", ipbx_gravacoes.id_grav, \"> DOWNLOAD </a>\") as Audio";
$proto1234["m_strFrom"] = "FROM cdr LEFT OUTER JOIN ipbx_gravacoes ON cdr.uniqueid = ipbx_gravacoes.uniqueid";
$proto1234["m_strWhere"] = "(lastapp <> 'VoiceMail') AND (length(src) < 5 && length(src) > 3)";
$proto1234["m_strOrderBy"] = "ORDER BY substr(src, -4), calldate";
$proto1234["m_strTail"] = "";
$proto1235=array();
$proto1235["m_sql"] = "(lastapp <> 'VoiceMail') AND (length(src) < 5 && length(src) > 3)";
$proto1235["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(lastapp <> 'VoiceMail') AND (length(src) < 5 && length(src) > 3)"
));

$proto1235["m_column"]=$obj;
$proto1235["m_contained"] = array();
						$proto1237=array();
$proto1237["m_sql"] = "lastapp <> 'VoiceMail'";
$proto1237["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "lastapp",
	"m_strTable" => "cdr"
));

$proto1237["m_column"]=$obj;
$proto1237["m_contained"] = array();
$proto1237["m_strCase"] = "<> 'VoiceMail'";
$proto1237["m_havingmode"] = "0";
$proto1237["m_inBrackets"] = "1";
$proto1237["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1237);

			$proto1235["m_contained"][]=$obj;
						$proto1239=array();
$proto1239["m_sql"] = "length(src) < 5 && length(src) > 3";
$proto1239["m_uniontype"] = "SQLL_UNKNOWN";
						$proto1240=array();
$proto1240["m_functiontype"] = "SQLF_CUSTOM";
$proto1240["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "src"
));

$proto1240["m_arguments"][]=$obj;
$proto1240["m_strFunctionName"] = "length";
$obj = new SQLFunctionCall($proto1240);

$proto1239["m_column"]=$obj;
$proto1239["m_contained"] = array();
$proto1239["m_strCase"] = "< 5 && length(src) > 3";
$proto1239["m_havingmode"] = "0";
$proto1239["m_inBrackets"] = "1";
$proto1239["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1239);

			$proto1235["m_contained"][]=$obj;
$proto1235["m_strCase"] = "";
$proto1235["m_havingmode"] = "0";
$proto1235["m_inBrackets"] = "0";
$proto1235["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1235);

$proto1234["m_where"] = $obj;
$proto1242=array();
$proto1242["m_sql"] = "";
$proto1242["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1242["m_column"]=$obj;
$proto1242["m_contained"] = array();
$proto1242["m_strCase"] = "";
$proto1242["m_havingmode"] = "0";
$proto1242["m_inBrackets"] = "0";
$proto1242["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1242);

$proto1234["m_having"] = $obj;
$proto1234["m_fieldlist"] = array();
						$proto1244=array();
			$proto1245=array();
$proto1245["m_functiontype"] = "SQLF_CUSTOM";
$proto1245["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate ,'%Y-%m-%d')"
));

$proto1245["m_arguments"][]=$obj;
$proto1245["m_strFunctionName"] = "DATE";
$obj = new SQLFunctionCall($proto1245);

$proto1244["m_expr"]=$obj;
$proto1244["m_alias"] = "Periodo";
$obj = new SQLFieldListItem($proto1244);

$proto1234["m_fieldlist"][]=$obj;
						$proto1247=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate ,'%T')"
));

$proto1247["m_expr"]=$obj;
$proto1247["m_alias"] = "Hora";
$obj = new SQLFieldListItem($proto1247);

$proto1234["m_fieldlist"][]=$obj;
						$proto1249=array();
			$proto1250=array();
$proto1250["m_functiontype"] = "SQLF_CUSTOM";
$proto1250["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "src"
));

$proto1250["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "-4"
));

$proto1250["m_arguments"][]=$obj;
$proto1250["m_strFunctionName"] = "substr";
$obj = new SQLFunctionCall($proto1250);

$proto1249["m_expr"]=$obj;
$proto1249["m_alias"] = "src";
$obj = new SQLFieldListItem($proto1249);

$proto1234["m_fieldlist"][]=$obj;
						$proto1253=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "case dst  when 'i' then 'SEM PRIVILÉGIO'   else dst end"
));

$proto1253["m_expr"]=$obj;
$proto1253["m_alias"] = "dst";
$obj = new SQLFieldListItem($proto1253);

$proto1234["m_fieldlist"][]=$obj;
						$proto1255=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "SEC_TO_TIME(duration)"
));

$proto1255["m_expr"]=$obj;
$proto1255["m_alias"] = "Tempo";
$obj = new SQLFieldListItem($proto1255);

$proto1234["m_fieldlist"][]=$obj;
						$proto1257=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "case disposition   when 'NO ANSWER' then 'NÃO ATENDE'   when 'ANSWERED' then 'ATENDIDO'   when 'BUSY' then 'OCUPADO'   else disposition end"
));

$proto1257["m_expr"]=$obj;
$proto1257["m_alias"] = "disposition";
$obj = new SQLFieldListItem($proto1257);

$proto1234["m_fieldlist"][]=$obj;
						$proto1259=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "cdr"
));

$proto1259["m_expr"]=$obj;
$proto1259["m_alias"] = "";
$obj = new SQLFieldListItem($proto1259);

$proto1234["m_fieldlist"][]=$obj;
						$proto1261=array();
			$proto1262=array();
$proto1262["m_functiontype"] = "SQLF_CUSTOM";
$proto1262["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "\"<a href=./download.php?table=ipbx_gravacoes&field=nm_arq&key1=\""
));

$proto1262["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ipbx_gravacoes.id_grav"
));

$proto1262["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "\"> DOWNLOAD </a>\""
));

$proto1262["m_arguments"][]=$obj;
$proto1262["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto1262);

$proto1261["m_expr"]=$obj;
$proto1261["m_alias"] = "Audio";
$obj = new SQLFieldListItem($proto1261);

$proto1234["m_fieldlist"][]=$obj;
$proto1234["m_fromlist"] = array();
												$proto1266=array();
$proto1266["m_link"] = "SQLL_MAIN";
			$proto1267=array();
$proto1267["m_strName"] = "cdr";
$proto1267["m_columns"] = array();
$proto1267["m_columns"][] = "calldate";
$proto1267["m_columns"][] = "clid";
$proto1267["m_columns"][] = "src";
$proto1267["m_columns"][] = "dst";
$proto1267["m_columns"][] = "dcontext";
$proto1267["m_columns"][] = "channel";
$proto1267["m_columns"][] = "dstchannel";
$proto1267["m_columns"][] = "lastapp";
$proto1267["m_columns"][] = "lastdata";
$proto1267["m_columns"][] = "duration";
$proto1267["m_columns"][] = "billsec";
$proto1267["m_columns"][] = "disposition";
$proto1267["m_columns"][] = "amaflags";
$proto1267["m_columns"][] = "accountcode";
$proto1267["m_columns"][] = "uniqueid";
$proto1267["m_columns"][] = "userfield";
$obj = new SQLTable($proto1267);

$proto1266["m_table"] = $obj;
$proto1266["m_alias"] = "";
$proto1268=array();
$proto1268["m_sql"] = "";
$proto1268["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1268["m_column"]=$obj;
$proto1268["m_contained"] = array();
$proto1268["m_strCase"] = "";
$proto1268["m_havingmode"] = "0";
$proto1268["m_inBrackets"] = "0";
$proto1268["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1268);

$proto1266["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1266);

$proto1234["m_fromlist"][]=$obj;
												$proto1270=array();
$proto1270["m_link"] = "SQLL_LEFTJOIN";
			$proto1271=array();
$proto1271["m_strName"] = "ipbx_gravacoes";
$proto1271["m_columns"] = array();
$proto1271["m_columns"][] = "id_grav";
$proto1271["m_columns"][] = "tp_gravacao";
$proto1271["m_columns"][] = "dt_gravacao";
$proto1271["m_columns"][] = "nm_arq";
$proto1271["m_columns"][] = "num_destino";
$proto1271["m_columns"][] = "num_final";
$proto1271["m_columns"][] = "uniqueid";
$obj = new SQLTable($proto1271);

$proto1270["m_table"] = $obj;
$proto1270["m_alias"] = "";
$proto1272=array();
$proto1272["m_sql"] = "cdr.uniqueid = ipbx_gravacoes.uniqueid";
$proto1272["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "uniqueid",
	"m_strTable" => "cdr"
));

$proto1272["m_column"]=$obj;
$proto1272["m_contained"] = array();
$proto1272["m_strCase"] = "= ipbx_gravacoes.uniqueid";
$proto1272["m_havingmode"] = "0";
$proto1272["m_inBrackets"] = "0";
$proto1272["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1272);

$proto1270["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1270);

$proto1234["m_fromlist"][]=$obj;
$proto1234["m_groupby"] = array();
$proto1234["m_orderby"] = array();
												$proto1274=array();
						$proto1275=array();
$proto1275["m_functiontype"] = "SQLF_CUSTOM";
$proto1275["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "src"
));

$proto1275["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "-4"
));

$proto1275["m_arguments"][]=$obj;
$proto1275["m_strFunctionName"] = "substr";
$obj = new SQLFunctionCall($proto1275);

$proto1274["m_column"]=$obj;
$proto1274["m_bAsc"] = 1;
$proto1274["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1274);

$proto1234["m_orderby"][]=$obj;					
												$proto1278=array();
						$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "cdr"
));

$proto1278["m_column"]=$obj;
$proto1278["m_bAsc"] = 1;
$proto1278["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1278);

$proto1234["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1234);

$queryData_Lig__Discadas = $obj;
$tdataLig__Discadas[".sqlquery"] = $queryData_Lig__Discadas;



?>
