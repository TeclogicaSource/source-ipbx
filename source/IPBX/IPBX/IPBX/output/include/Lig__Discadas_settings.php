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










$proto1040=array();
$proto1040["m_strHead"] = "select";
$proto1040["m_strFieldList"] = "DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS Periodo,  DATE_FORMAT(calldate ,'%T') AS Hora,  substr(src, -4) AS src,  case dst  when 'i' then 'SEM PRIVILÉGIO'   else dst end AS dst,  SEC_TO_TIME(duration) AS Tempo,  case disposition   when 'NO ANSWER' then 'NÃO ATENDE'   when 'ANSWERED' then 'ATENDIDO'   when 'BUSY' then 'OCUPADO'   else disposition end AS disposition,  calldate,  concat(\"<a href=./download.php?table=ipbx_gravacoes&field=nm_arq&key1=\", ipbx_gravacoes.id_grav, \"> DOWNLOAD </a>\") as Audio";
$proto1040["m_strFrom"] = "FROM cdr LEFT OUTER JOIN ipbx_gravacoes ON cdr.uniqueid = ipbx_gravacoes.uniqueid";
$proto1040["m_strWhere"] = "(lastapp <> 'VoiceMail') AND (length(src) < 5 && length(src) > 3)";
$proto1040["m_strOrderBy"] = "ORDER BY substr(src, -4), calldate";
$proto1040["m_strTail"] = "";
$proto1041=array();
$proto1041["m_sql"] = "(lastapp <> 'VoiceMail') AND (length(src) < 5 && length(src) > 3)";
$proto1041["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(lastapp <> 'VoiceMail') AND (length(src) < 5 && length(src) > 3)"
));

$proto1041["m_column"]=$obj;
$proto1041["m_contained"] = array();
						$proto1043=array();
$proto1043["m_sql"] = "lastapp <> 'VoiceMail'";
$proto1043["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "lastapp",
	"m_strTable" => "cdr"
));

$proto1043["m_column"]=$obj;
$proto1043["m_contained"] = array();
$proto1043["m_strCase"] = "<> 'VoiceMail'";
$proto1043["m_havingmode"] = "0";
$proto1043["m_inBrackets"] = "1";
$proto1043["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1043);

			$proto1041["m_contained"][]=$obj;
						$proto1045=array();
$proto1045["m_sql"] = "length(src) < 5 && length(src) > 3";
$proto1045["m_uniontype"] = "SQLL_UNKNOWN";
						$proto1046=array();
$proto1046["m_functiontype"] = "SQLF_CUSTOM";
$proto1046["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "src"
));

$proto1046["m_arguments"][]=$obj;
$proto1046["m_strFunctionName"] = "length";
$obj = new SQLFunctionCall($proto1046);

$proto1045["m_column"]=$obj;
$proto1045["m_contained"] = array();
$proto1045["m_strCase"] = "< 5 && length(src) > 3";
$proto1045["m_havingmode"] = "0";
$proto1045["m_inBrackets"] = "1";
$proto1045["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1045);

			$proto1041["m_contained"][]=$obj;
$proto1041["m_strCase"] = "";
$proto1041["m_havingmode"] = "0";
$proto1041["m_inBrackets"] = "0";
$proto1041["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1041);

$proto1040["m_where"] = $obj;
$proto1048=array();
$proto1048["m_sql"] = "";
$proto1048["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1048["m_column"]=$obj;
$proto1048["m_contained"] = array();
$proto1048["m_strCase"] = "";
$proto1048["m_havingmode"] = "0";
$proto1048["m_inBrackets"] = "0";
$proto1048["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1048);

$proto1040["m_having"] = $obj;
$proto1040["m_fieldlist"] = array();
						$proto1050=array();
			$proto1051=array();
$proto1051["m_functiontype"] = "SQLF_CUSTOM";
$proto1051["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate ,'%Y-%m-%d')"
));

$proto1051["m_arguments"][]=$obj;
$proto1051["m_strFunctionName"] = "DATE";
$obj = new SQLFunctionCall($proto1051);

$proto1050["m_expr"]=$obj;
$proto1050["m_alias"] = "Periodo";
$obj = new SQLFieldListItem($proto1050);

$proto1040["m_fieldlist"][]=$obj;
						$proto1053=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate ,'%T')"
));

$proto1053["m_expr"]=$obj;
$proto1053["m_alias"] = "Hora";
$obj = new SQLFieldListItem($proto1053);

$proto1040["m_fieldlist"][]=$obj;
						$proto1055=array();
			$proto1056=array();
$proto1056["m_functiontype"] = "SQLF_CUSTOM";
$proto1056["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "src"
));

$proto1056["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "-4"
));

$proto1056["m_arguments"][]=$obj;
$proto1056["m_strFunctionName"] = "substr";
$obj = new SQLFunctionCall($proto1056);

$proto1055["m_expr"]=$obj;
$proto1055["m_alias"] = "src";
$obj = new SQLFieldListItem($proto1055);

$proto1040["m_fieldlist"][]=$obj;
						$proto1059=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "case dst  when 'i' then 'SEM PRIVILÉGIO'   else dst end"
));

$proto1059["m_expr"]=$obj;
$proto1059["m_alias"] = "dst";
$obj = new SQLFieldListItem($proto1059);

$proto1040["m_fieldlist"][]=$obj;
						$proto1061=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "SEC_TO_TIME(duration)"
));

$proto1061["m_expr"]=$obj;
$proto1061["m_alias"] = "Tempo";
$obj = new SQLFieldListItem($proto1061);

$proto1040["m_fieldlist"][]=$obj;
						$proto1063=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "case disposition   when 'NO ANSWER' then 'NÃO ATENDE'   when 'ANSWERED' then 'ATENDIDO'   when 'BUSY' then 'OCUPADO'   else disposition end"
));

$proto1063["m_expr"]=$obj;
$proto1063["m_alias"] = "disposition";
$obj = new SQLFieldListItem($proto1063);

$proto1040["m_fieldlist"][]=$obj;
						$proto1065=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "cdr"
));

$proto1065["m_expr"]=$obj;
$proto1065["m_alias"] = "";
$obj = new SQLFieldListItem($proto1065);

$proto1040["m_fieldlist"][]=$obj;
						$proto1067=array();
			$proto1068=array();
$proto1068["m_functiontype"] = "SQLF_CUSTOM";
$proto1068["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "\"<a href=./download.php?table=ipbx_gravacoes&field=nm_arq&key1=\""
));

$proto1068["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "ipbx_gravacoes.id_grav"
));

$proto1068["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "\"> DOWNLOAD </a>\""
));

$proto1068["m_arguments"][]=$obj;
$proto1068["m_strFunctionName"] = "concat";
$obj = new SQLFunctionCall($proto1068);

$proto1067["m_expr"]=$obj;
$proto1067["m_alias"] = "Audio";
$obj = new SQLFieldListItem($proto1067);

$proto1040["m_fieldlist"][]=$obj;
$proto1040["m_fromlist"] = array();
												$proto1072=array();
$proto1072["m_link"] = "SQLL_MAIN";
			$proto1073=array();
$proto1073["m_strName"] = "cdr";
$proto1073["m_columns"] = array();
$proto1073["m_columns"][] = "calldate";
$proto1073["m_columns"][] = "clid";
$proto1073["m_columns"][] = "src";
$proto1073["m_columns"][] = "dst";
$proto1073["m_columns"][] = "dcontext";
$proto1073["m_columns"][] = "channel";
$proto1073["m_columns"][] = "dstchannel";
$proto1073["m_columns"][] = "lastapp";
$proto1073["m_columns"][] = "lastdata";
$proto1073["m_columns"][] = "duration";
$proto1073["m_columns"][] = "billsec";
$proto1073["m_columns"][] = "disposition";
$proto1073["m_columns"][] = "amaflags";
$proto1073["m_columns"][] = "accountcode";
$proto1073["m_columns"][] = "uniqueid";
$proto1073["m_columns"][] = "userfield";
$obj = new SQLTable($proto1073);

$proto1072["m_table"] = $obj;
$proto1072["m_alias"] = "";
$proto1074=array();
$proto1074["m_sql"] = "";
$proto1074["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1074["m_column"]=$obj;
$proto1074["m_contained"] = array();
$proto1074["m_strCase"] = "";
$proto1074["m_havingmode"] = "0";
$proto1074["m_inBrackets"] = "0";
$proto1074["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1074);

$proto1072["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1072);

$proto1040["m_fromlist"][]=$obj;
												$proto1076=array();
$proto1076["m_link"] = "SQLL_LEFTJOIN";
			$proto1077=array();
$proto1077["m_strName"] = "ipbx_gravacoes";
$proto1077["m_columns"] = array();
$proto1077["m_columns"][] = "id_grav";
$proto1077["m_columns"][] = "tp_gravacao";
$proto1077["m_columns"][] = "dt_gravacao";
$proto1077["m_columns"][] = "nm_arq";
$proto1077["m_columns"][] = "num_destino";
$proto1077["m_columns"][] = "num_final";
$proto1077["m_columns"][] = "uniqueid";
$obj = new SQLTable($proto1077);

$proto1076["m_table"] = $obj;
$proto1076["m_alias"] = "";
$proto1078=array();
$proto1078["m_sql"] = "cdr.uniqueid = ipbx_gravacoes.uniqueid";
$proto1078["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "uniqueid",
	"m_strTable" => "cdr"
));

$proto1078["m_column"]=$obj;
$proto1078["m_contained"] = array();
$proto1078["m_strCase"] = "= ipbx_gravacoes.uniqueid";
$proto1078["m_havingmode"] = "0";
$proto1078["m_inBrackets"] = "0";
$proto1078["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1078);

$proto1076["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1076);

$proto1040["m_fromlist"][]=$obj;
$proto1040["m_groupby"] = array();
$proto1040["m_orderby"] = array();
												$proto1080=array();
						$proto1081=array();
$proto1081["m_functiontype"] = "SQLF_CUSTOM";
$proto1081["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "src"
));

$proto1081["m_arguments"][]=$obj;
						$obj = new SQLNonParsed(array(
	"m_sql" => "-4"
));

$proto1081["m_arguments"][]=$obj;
$proto1081["m_strFunctionName"] = "substr";
$obj = new SQLFunctionCall($proto1081);

$proto1080["m_column"]=$obj;
$proto1080["m_bAsc"] = 1;
$proto1080["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1080);

$proto1040["m_orderby"][]=$obj;					
												$proto1084=array();
						$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "cdr"
));

$proto1084["m_column"]=$obj;
$proto1084["m_bAsc"] = 1;
$proto1084["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1084);

$proto1040["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1040);

$queryData_Lig__Discadas = $obj;
$tdataLig__Discadas[".sqlquery"] = $queryData_Lig__Discadas;



?>
