<?php

//	field labels
$fieldLabelsLig__Externas_Transferidas = array();
$fieldLabelsLig__Externas_Transferidas["Portuguese(Brazil)"]=array();
$fieldLabelsLig__Externas_Transferidas["Portuguese(Brazil)"]["Data_Hora_Ligacao"] = "Data/Hora Ligacao";
$fieldLabelsLig__Externas_Transferidas["Portuguese(Brazil)"]["Data"] = "Data";
$fieldLabelsLig__Externas_Transferidas["Portuguese(Brazil)"]["src"] = "Origem";
$fieldLabelsLig__Externas_Transferidas["Portuguese(Brazil)"]["dst"] = "Destino";
$fieldLabelsLig__Externas_Transferidas["Portuguese(Brazil)"]["Tempo"] = "Tempo";
$fieldLabelsLig__Externas_Transferidas["Portuguese(Brazil)"]["calldate"] = "Data e Hora";


$tdataLig__Externas_Transferidas=array();
	$tdataLig__Externas_Transferidas[".NumberOfChars"]=80; 
	$tdataLig__Externas_Transferidas[".ShortName"]="Lig__Externas_Transferidas";
	$tdataLig__Externas_Transferidas[".OwnerID"]="";
	$tdataLig__Externas_Transferidas[".OriginalTable"]="cdr";
	$tdataLig__Externas_Transferidas[".NCSearch"]=true;
	

$tdataLig__Externas_Transferidas[".shortTableName"] = "Lig__Externas_Transferidas";
$tdataLig__Externas_Transferidas[".dataSourceTable"] = "Rel. Lig. Externas Transferidas";
$tdataLig__Externas_Transferidas[".nSecOptions"] = 0;
$tdataLig__Externas_Transferidas[".nLoginMethod"] = 1;
$tdataLig__Externas_Transferidas[".recsPerRowList"] = 1;	
$tdataLig__Externas_Transferidas[".tableGroupBy"] = "0";
$tdataLig__Externas_Transferidas[".dbType"] = 0;
$tdataLig__Externas_Transferidas[".mainTableOwnerID"] = "";
$tdataLig__Externas_Transferidas[".moveNext"] = 1;

$tdataLig__Externas_Transferidas[".listAjax"] = true;

	$tdataLig__Externas_Transferidas[".audit"] = false;

	$tdataLig__Externas_Transferidas[".locking"] = false;
	
$tdataLig__Externas_Transferidas[".listIcons"] = true;

$tdataLig__Externas_Transferidas[".exportTo"] = true;

$tdataLig__Externas_Transferidas[".printFriendly"] = true;


$tdataLig__Externas_Transferidas[".showSimpleSearchOptions"] = false;

$tdataLig__Externas_Transferidas[".showSearchPanel"] = true;


$tdataLig__Externas_Transferidas[".isUseAjaxSuggest"] = true;


$tdataLig__Externas_Transferidas[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataLig__Externas_Transferidas[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataLig__Externas_Transferidas[".isUseTimeForSearch"] = false;





$tdataLig__Externas_Transferidas[".isUseInlineJs"] = $tdataLig__Externas_Transferidas[".isUseInlineAdd"] || $tdataLig__Externas_Transferidas[".isUseInlineEdit"];

$tdataLig__Externas_Transferidas[".allSearchFields"] = array();

$tdataLig__Externas_Transferidas[".globSearchFields"][] = "Data";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("Data", $tdataLig__Externas_Transferidas[".allSearchFields"]))
{
	$tdataLig__Externas_Transferidas[".allSearchFields"][] = "Data";	
}
$tdataLig__Externas_Transferidas[".globSearchFields"][] = "src";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("src", $tdataLig__Externas_Transferidas[".allSearchFields"]))
{
	$tdataLig__Externas_Transferidas[".allSearchFields"][] = "src";	
}
$tdataLig__Externas_Transferidas[".globSearchFields"][] = "dst";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dst", $tdataLig__Externas_Transferidas[".allSearchFields"]))
{
	$tdataLig__Externas_Transferidas[".allSearchFields"][] = "dst";	
}


$tdataLig__Externas_Transferidas[".isDynamicPerm"] = true;

	

$tdataLig__Externas_Transferidas[".isDisplayLoading"] = true;

$tdataLig__Externas_Transferidas[".isResizeColumns"] = false;


$tdataLig__Externas_Transferidas[".createLoginPage"] = true;


 	

$tdataLig__Externas_Transferidas[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY calldate";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataLig__Externas_Transferidas[".strOrderBy"] = $gstrOrderBy;
	
$tdataLig__Externas_Transferidas[".orderindexes"] = array();
$tdataLig__Externas_Transferidas[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "calldate");

$tdataLig__Externas_Transferidas[".sqlHead"] = "select calldate AS `Data/Hora Ligacao`,  DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS `Data`,  src,  dst,  SEC_TO_TIME(billsec) AS Tempo,  calldate AS calldate";

$tdataLig__Externas_Transferidas[".sqlFrom"] = "FROM cdr";

$tdataLig__Externas_Transferidas[".sqlWhereExpr"] = "(channel like 'Local/%') AND (length(src) > 4) AND (lastapp <> 'VoiceMail')";

$tdataLig__Externas_Transferidas[".sqlTail"] = "";



	$tableKeys=array();
	$tdataLig__Externas_Transferidas[".Keys"]=$tableKeys;

	
//	Data/Hora Ligacao
	$fdata = array();
	$fdata["strName"] = "Data/Hora Ligacao";
	$fdata["ownerTable"] = "cdr";
				$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Data_Hora_Ligacao";
		$fdata["FullName"]= "calldate";
						$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
									$tdataLig__Externas_Transferidas["Data/Hora Ligacao"]=$fdata;
	
//	Data
	$fdata = array();
	$fdata["strName"] = "Data";
	$fdata["ownerTable"] = "";
				$fdata["FieldType"]= 7;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "Data";
		$fdata["FullName"]= "DATE(DATE_FORMAT(calldate ,'%Y-%m-%d'))";
						$fdata["Index"]= 2;
	 $fdata["DateEditType"]=13; 
			
									$tdataLig__Externas_Transferidas["Data"]=$fdata;
	
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
						$tdataLig__Externas_Transferidas["src"]=$fdata;
	
//	dst
	$fdata = array();
	$fdata["strName"] = "dst";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Destino"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dst";
		$fdata["FullName"]= "dst";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
				$fdata["FieldPermissions"]=true;
						$tdataLig__Externas_Transferidas["dst"]=$fdata;
	
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
		$fdata["FullName"]= "SEC_TO_TIME(billsec)";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
							$fdata["FormatTimeAttrs"] = array("useTimePicker" => 0,
										  "hours" => 24,
										  "minutes" => 1,
										  "showSeconds" => 0);
	$tdataLig__Externas_Transferidas["Tempo"]=$fdata;
	
//	calldate
	$fdata = array();
	$fdata["strName"] = "calldate";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Data e Hora"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "calldate";
		$fdata["FullName"]= "calldate";
						$fdata["Index"]= 6;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataLig__Externas_Transferidas["calldate"]=$fdata;

	
$tables_data["Rel. Lig. Externas Transferidas"]=&$tdataLig__Externas_Transferidas;
$field_labels["Rel__Lig__Externas_Transferidas"] = &$fieldLabelsLig__Externas_Transferidas;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Lig. Externas Transferidas"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Lig. Externas Transferidas"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto939=array();
$proto939["m_strHead"] = "select";
$proto939["m_strFieldList"] = "calldate AS `Data/Hora Ligacao`,  DATE(DATE_FORMAT(calldate ,'%Y-%m-%d')) AS `Data`,  src,  dst,  SEC_TO_TIME(billsec) AS Tempo,  calldate AS calldate";
$proto939["m_strFrom"] = "FROM cdr";
$proto939["m_strWhere"] = "(channel like 'Local/%') AND (length(src) > 4) AND (lastapp <> 'VoiceMail')";
$proto939["m_strOrderBy"] = "ORDER BY calldate";
$proto939["m_strTail"] = "";
$proto940=array();
$proto940["m_sql"] = "(channel like 'Local/%') AND (length(src) > 4) AND (lastapp <> 'VoiceMail')";
$proto940["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(channel like 'Local/%') AND (length(src) > 4) AND (lastapp <> 'VoiceMail')"
));

$proto940["m_column"]=$obj;
$proto940["m_contained"] = array();
						$proto942=array();
$proto942["m_sql"] = "channel like 'Local/%'";
$proto942["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "channel",
	"m_strTable" => "cdr"
));

$proto942["m_column"]=$obj;
$proto942["m_contained"] = array();
$proto942["m_strCase"] = "like 'Local/%'";
$proto942["m_havingmode"] = "0";
$proto942["m_inBrackets"] = "1";
$proto942["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto942);

			$proto940["m_contained"][]=$obj;
						$proto944=array();
$proto944["m_sql"] = "length(src) > 4";
$proto944["m_uniontype"] = "SQLL_UNKNOWN";
						$proto945=array();
$proto945["m_functiontype"] = "SQLF_CUSTOM";
$proto945["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "src"
));

$proto945["m_arguments"][]=$obj;
$proto945["m_strFunctionName"] = "length";
$obj = new SQLFunctionCall($proto945);

$proto944["m_column"]=$obj;
$proto944["m_contained"] = array();
$proto944["m_strCase"] = "> 4";
$proto944["m_havingmode"] = "0";
$proto944["m_inBrackets"] = "1";
$proto944["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto944);

			$proto940["m_contained"][]=$obj;
						$proto947=array();
$proto947["m_sql"] = "lastapp <> 'VoiceMail'";
$proto947["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "lastapp",
	"m_strTable" => "cdr"
));

$proto947["m_column"]=$obj;
$proto947["m_contained"] = array();
$proto947["m_strCase"] = "<> 'VoiceMail'";
$proto947["m_havingmode"] = "0";
$proto947["m_inBrackets"] = "1";
$proto947["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto947);

			$proto940["m_contained"][]=$obj;
$proto940["m_strCase"] = "";
$proto940["m_havingmode"] = "0";
$proto940["m_inBrackets"] = "0";
$proto940["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto940);

$proto939["m_where"] = $obj;
$proto949=array();
$proto949["m_sql"] = "";
$proto949["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto949["m_column"]=$obj;
$proto949["m_contained"] = array();
$proto949["m_strCase"] = "";
$proto949["m_havingmode"] = "0";
$proto949["m_inBrackets"] = "0";
$proto949["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto949);

$proto939["m_having"] = $obj;
$proto939["m_fieldlist"] = array();
						$proto951=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "cdr"
));

$proto951["m_expr"]=$obj;
$proto951["m_alias"] = "Data/Hora Ligacao";
$obj = new SQLFieldListItem($proto951);

$proto939["m_fieldlist"][]=$obj;
						$proto953=array();
			$proto954=array();
$proto954["m_functiontype"] = "SQLF_CUSTOM";
$proto954["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "DATE_FORMAT(calldate ,'%Y-%m-%d')"
));

$proto954["m_arguments"][]=$obj;
$proto954["m_strFunctionName"] = "DATE";
$obj = new SQLFunctionCall($proto954);

$proto953["m_expr"]=$obj;
$proto953["m_alias"] = "Data";
$obj = new SQLFieldListItem($proto953);

$proto939["m_fieldlist"][]=$obj;
						$proto956=array();
			$obj = new SQLField(array(
	"m_strName" => "src",
	"m_strTable" => "cdr"
));

$proto956["m_expr"]=$obj;
$proto956["m_alias"] = "";
$obj = new SQLFieldListItem($proto956);

$proto939["m_fieldlist"][]=$obj;
						$proto958=array();
			$obj = new SQLField(array(
	"m_strName" => "dst",
	"m_strTable" => "cdr"
));

$proto958["m_expr"]=$obj;
$proto958["m_alias"] = "";
$obj = new SQLFieldListItem($proto958);

$proto939["m_fieldlist"][]=$obj;
						$proto960=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "SEC_TO_TIME(billsec)"
));

$proto960["m_expr"]=$obj;
$proto960["m_alias"] = "Tempo";
$obj = new SQLFieldListItem($proto960);

$proto939["m_fieldlist"][]=$obj;
						$proto962=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "cdr"
));

$proto962["m_expr"]=$obj;
$proto962["m_alias"] = "calldate";
$obj = new SQLFieldListItem($proto962);

$proto939["m_fieldlist"][]=$obj;
$proto939["m_fromlist"] = array();
												$proto964=array();
$proto964["m_link"] = "SQLL_MAIN";
			$proto965=array();
$proto965["m_strName"] = "cdr";
$proto965["m_columns"] = array();
$proto965["m_columns"][] = "calldate";
$proto965["m_columns"][] = "clid";
$proto965["m_columns"][] = "src";
$proto965["m_columns"][] = "dst";
$proto965["m_columns"][] = "dcontext";
$proto965["m_columns"][] = "channel";
$proto965["m_columns"][] = "dstchannel";
$proto965["m_columns"][] = "lastapp";
$proto965["m_columns"][] = "lastdata";
$proto965["m_columns"][] = "duration";
$proto965["m_columns"][] = "billsec";
$proto965["m_columns"][] = "disposition";
$proto965["m_columns"][] = "amaflags";
$proto965["m_columns"][] = "accountcode";
$proto965["m_columns"][] = "uniqueid";
$proto965["m_columns"][] = "userfield";
$obj = new SQLTable($proto965);

$proto964["m_table"] = $obj;
$proto964["m_alias"] = "";
$proto966=array();
$proto966["m_sql"] = "";
$proto966["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto966["m_column"]=$obj;
$proto966["m_contained"] = array();
$proto966["m_strCase"] = "";
$proto966["m_havingmode"] = "0";
$proto966["m_inBrackets"] = "0";
$proto966["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto966);

$proto964["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto964);

$proto939["m_fromlist"][]=$obj;
$proto939["m_groupby"] = array();
$proto939["m_orderby"] = array();
												$proto968=array();
						$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "cdr"
));

$proto968["m_column"]=$obj;
$proto968["m_bAsc"] = 1;
$proto968["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto968);

$proto939["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto939);

$queryData_Lig__Externas_Transferidas = $obj;
$tdataLig__Externas_Transferidas[".sqlquery"] = $queryData_Lig__Externas_Transferidas;



?>
