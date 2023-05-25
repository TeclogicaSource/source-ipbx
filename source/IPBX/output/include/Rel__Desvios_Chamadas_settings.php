<?php

//	field labels
$fieldLabelsRel__Desvios_Chamadas = array();
$fieldLabelsRel__Desvios_Chamadas["Portuguese(Brazil)"]=array();
$fieldLabelsRel__Desvios_Chamadas["Portuguese(Brazil)"]["calldate"] = "Período";
$fieldLabelsRel__Desvios_Chamadas["Portuguese(Brazil)"]["src"] = "Origem";
$fieldLabelsRel__Desvios_Chamadas["Portuguese(Brazil)"]["dst"] = "Destino";
$fieldLabelsRel__Desvios_Chamadas["Portuguese(Brazil)"]["duration"] = "Duração";
$fieldLabelsRel__Desvios_Chamadas["Portuguese(Brazil)"]["billsec"] = "Tempo conversa";
$fieldLabelsRel__Desvios_Chamadas["Portuguese(Brazil)"]["accountcode"] = "Centro de Custo";


$tdataRel__Desvios_Chamadas=array();
	$tdataRel__Desvios_Chamadas[".NumberOfChars"]=80; 
	$tdataRel__Desvios_Chamadas[".ShortName"]="Rel__Desvios_Chamadas";
	$tdataRel__Desvios_Chamadas[".OwnerID"]="";
	$tdataRel__Desvios_Chamadas[".OriginalTable"]="cdr";
	$tdataRel__Desvios_Chamadas[".NCSearch"]=true;
	

$tdataRel__Desvios_Chamadas[".shortTableName"] = "Rel__Desvios_Chamadas";
$tdataRel__Desvios_Chamadas[".dataSourceTable"] = "Rel. Desvios Chamadas";
$tdataRel__Desvios_Chamadas[".nSecOptions"] = 0;
$tdataRel__Desvios_Chamadas[".nLoginMethod"] = 1;
$tdataRel__Desvios_Chamadas[".recsPerRowList"] = 1;	
$tdataRel__Desvios_Chamadas[".tableGroupBy"] = "0";
$tdataRel__Desvios_Chamadas[".dbType"] = 0;
$tdataRel__Desvios_Chamadas[".mainTableOwnerID"] = "";
$tdataRel__Desvios_Chamadas[".moveNext"] = 1;

$tdataRel__Desvios_Chamadas[".listAjax"] = false;

	$tdataRel__Desvios_Chamadas[".audit"] = false;

	$tdataRel__Desvios_Chamadas[".locking"] = false;
	
$tdataRel__Desvios_Chamadas[".listIcons"] = true;

$tdataRel__Desvios_Chamadas[".exportTo"] = true;

$tdataRel__Desvios_Chamadas[".printFriendly"] = true;


$tdataRel__Desvios_Chamadas[".showSimpleSearchOptions"] = false;

$tdataRel__Desvios_Chamadas[".showSearchPanel"] = true;


$tdataRel__Desvios_Chamadas[".isUseAjaxSuggest"] = true;


$tdataRel__Desvios_Chamadas[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataRel__Desvios_Chamadas[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdataRel__Desvios_Chamadas[".isUseTimeForSearch"] = false;





$tdataRel__Desvios_Chamadas[".isUseInlineJs"] = $tdataRel__Desvios_Chamadas[".isUseInlineAdd"] || $tdataRel__Desvios_Chamadas[".isUseInlineEdit"];

$tdataRel__Desvios_Chamadas[".allSearchFields"] = array();

$tdataRel__Desvios_Chamadas[".globSearchFields"][] = "calldate";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("calldate", $tdataRel__Desvios_Chamadas[".allSearchFields"]))
{
	$tdataRel__Desvios_Chamadas[".allSearchFields"][] = "calldate";	
}
$tdataRel__Desvios_Chamadas[".globSearchFields"][] = "src";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("src", $tdataRel__Desvios_Chamadas[".allSearchFields"]))
{
	$tdataRel__Desvios_Chamadas[".allSearchFields"][] = "src";	
}
$tdataRel__Desvios_Chamadas[".globSearchFields"][] = "dst";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("dst", $tdataRel__Desvios_Chamadas[".allSearchFields"]))
{
	$tdataRel__Desvios_Chamadas[".allSearchFields"][] = "dst";	
}


$tdataRel__Desvios_Chamadas[".isDynamicPerm"] = true;

	

$tdataRel__Desvios_Chamadas[".isDisplayLoading"] = true;

$tdataRel__Desvios_Chamadas[".isResizeColumns"] = false;


$tdataRel__Desvios_Chamadas[".createLoginPage"] = true;


 	

$tdataRel__Desvios_Chamadas[".noRecordsFirstPage"] = true;




$gstrOrderBy = "ORDER BY calldate";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataRel__Desvios_Chamadas[".strOrderBy"] = $gstrOrderBy;
	
$tdataRel__Desvios_Chamadas[".orderindexes"] = array();
$tdataRel__Desvios_Chamadas[".orderindexes"][] = array(1, (1 ? "ASC" : "DESC"), "calldate");

$tdataRel__Desvios_Chamadas[".sqlHead"] = "SELECT calldate,  src,  dst,  sec_to_time(billsec) as billsec,  sec_to_time(duration) as duration,  accountcode";

$tdataRel__Desvios_Chamadas[".sqlFrom"] = "FROM cdr";

$tdataRel__Desvios_Chamadas[".sqlWhereExpr"] = "(length(src) > 4) AND (length(dst) > 4)";

$tdataRel__Desvios_Chamadas[".sqlTail"] = "";



	$tableKeys=array();
	$tdataRel__Desvios_Chamadas[".Keys"]=$tableKeys;

	
//	calldate
	$fdata = array();
	$fdata["strName"] = "calldate";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Período"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "calldate";
		$fdata["FullName"]= "calldate";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Desvios_Chamadas["calldate"]=$fdata;
	
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
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel__Desvios_Chamadas["src"]=$fdata;
	
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
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		
				$fdata["FieldPermissions"]=true;
						$tdataRel__Desvios_Chamadas["dst"]=$fdata;
	
//	billsec
	$fdata = array();
	$fdata["strName"] = "billsec";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Tempo conversa"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "billsec";
		$fdata["FullName"]= "sec_to_time(billsec)";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Desvios_Chamadas["billsec"]=$fdata;
	
//	duration
	$fdata = array();
	$fdata["strName"] = "duration";
	$fdata["ownerTable"] = "";
		$fdata["Label"]="Duração"; 
			$fdata["FieldType"]= 134;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "duration";
		$fdata["FullName"]= "sec_to_time(duration)";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Desvios_Chamadas["duration"]=$fdata;
	
//	accountcode
	$fdata = array();
	$fdata["strName"] = "accountcode";
	$fdata["ownerTable"] = "cdr";
		$fdata["Label"]="Centro de Custo"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
						$fdata["LookupUnique"]=true;

	$fdata["LinkField"]="idt_custo";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="dsc_centro_cust";
				$fdata["LookupTable"]="centrocusto";
	$fdata["LookupOrderBy"]="";
						
				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "accountcode";
		$fdata["FullName"]= "accountcode";
						$fdata["Index"]= 6;
	
			
				$fdata["FieldPermissions"]=true;
						$tdataRel__Desvios_Chamadas["accountcode"]=$fdata;

	
$tables_data["Rel. Desvios Chamadas"]=&$tdataRel__Desvios_Chamadas;
$field_labels["Rel__Desvios_Chamadas"] = &$fieldLabelsRel__Desvios_Chamadas;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Rel. Desvios Chamadas"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["Rel. Desvios Chamadas"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto475=array();
$proto475["m_strHead"] = "SELECT";
$proto475["m_strFieldList"] = "calldate,  src,  dst,  sec_to_time(billsec) as billsec,  sec_to_time(duration) as duration,  accountcode";
$proto475["m_strFrom"] = "FROM cdr";
$proto475["m_strWhere"] = "(length(src) > 4) AND (length(dst) > 4)";
$proto475["m_strOrderBy"] = "ORDER BY calldate";
$proto475["m_strTail"] = "";
$proto476=array();
$proto476["m_sql"] = "(length(src) > 4) AND (length(dst) > 4)";
$proto476["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "(length(src) > 4) AND (length(dst) > 4)"
));

$proto476["m_column"]=$obj;
$proto476["m_contained"] = array();
						$proto478=array();
$proto478["m_sql"] = "length(src) > 4";
$proto478["m_uniontype"] = "SQLL_UNKNOWN";
						$proto479=array();
$proto479["m_functiontype"] = "SQLF_CUSTOM";
$proto479["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "src"
));

$proto479["m_arguments"][]=$obj;
$proto479["m_strFunctionName"] = "length";
$obj = new SQLFunctionCall($proto479);

$proto478["m_column"]=$obj;
$proto478["m_contained"] = array();
$proto478["m_strCase"] = "> 4";
$proto478["m_havingmode"] = "0";
$proto478["m_inBrackets"] = "1";
$proto478["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto478);

			$proto476["m_contained"][]=$obj;
						$proto481=array();
$proto481["m_sql"] = "length(dst) > 4";
$proto481["m_uniontype"] = "SQLL_UNKNOWN";
						$proto482=array();
$proto482["m_functiontype"] = "SQLF_CUSTOM";
$proto482["m_arguments"] = array();
						$obj = new SQLNonParsed(array(
	"m_sql" => "dst"
));

$proto482["m_arguments"][]=$obj;
$proto482["m_strFunctionName"] = "length";
$obj = new SQLFunctionCall($proto482);

$proto481["m_column"]=$obj;
$proto481["m_contained"] = array();
$proto481["m_strCase"] = "> 4";
$proto481["m_havingmode"] = "0";
$proto481["m_inBrackets"] = "1";
$proto481["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto481);

			$proto476["m_contained"][]=$obj;
$proto476["m_strCase"] = "";
$proto476["m_havingmode"] = "0";
$proto476["m_inBrackets"] = "0";
$proto476["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto476);

$proto475["m_where"] = $obj;
$proto484=array();
$proto484["m_sql"] = "";
$proto484["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto484["m_column"]=$obj;
$proto484["m_contained"] = array();
$proto484["m_strCase"] = "";
$proto484["m_havingmode"] = "0";
$proto484["m_inBrackets"] = "0";
$proto484["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto484);

$proto475["m_having"] = $obj;
$proto475["m_fieldlist"] = array();
						$proto486=array();
			$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "cdr"
));

$proto486["m_expr"]=$obj;
$proto486["m_alias"] = "";
$obj = new SQLFieldListItem($proto486);

$proto475["m_fieldlist"][]=$obj;
						$proto488=array();
			$obj = new SQLField(array(
	"m_strName" => "src",
	"m_strTable" => "cdr"
));

$proto488["m_expr"]=$obj;
$proto488["m_alias"] = "";
$obj = new SQLFieldListItem($proto488);

$proto475["m_fieldlist"][]=$obj;
						$proto490=array();
			$obj = new SQLField(array(
	"m_strName" => "dst",
	"m_strTable" => "cdr"
));

$proto490["m_expr"]=$obj;
$proto490["m_alias"] = "";
$obj = new SQLFieldListItem($proto490);

$proto475["m_fieldlist"][]=$obj;
						$proto492=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "sec_to_time(billsec)"
));

$proto492["m_expr"]=$obj;
$proto492["m_alias"] = "billsec";
$obj = new SQLFieldListItem($proto492);

$proto475["m_fieldlist"][]=$obj;
						$proto494=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "sec_to_time(duration)"
));

$proto494["m_expr"]=$obj;
$proto494["m_alias"] = "duration";
$obj = new SQLFieldListItem($proto494);

$proto475["m_fieldlist"][]=$obj;
						$proto496=array();
			$obj = new SQLField(array(
	"m_strName" => "accountcode",
	"m_strTable" => "cdr"
));

$proto496["m_expr"]=$obj;
$proto496["m_alias"] = "";
$obj = new SQLFieldListItem($proto496);

$proto475["m_fieldlist"][]=$obj;
$proto475["m_fromlist"] = array();
												$proto498=array();
$proto498["m_link"] = "SQLL_MAIN";
			$proto499=array();
$proto499["m_strName"] = "cdr";
$proto499["m_columns"] = array();
$proto499["m_columns"][] = "calldate";
$proto499["m_columns"][] = "clid";
$proto499["m_columns"][] = "src";
$proto499["m_columns"][] = "dst";
$proto499["m_columns"][] = "dcontext";
$proto499["m_columns"][] = "channel";
$proto499["m_columns"][] = "dstchannel";
$proto499["m_columns"][] = "lastapp";
$proto499["m_columns"][] = "lastdata";
$proto499["m_columns"][] = "duration";
$proto499["m_columns"][] = "billsec";
$proto499["m_columns"][] = "disposition";
$proto499["m_columns"][] = "amaflags";
$proto499["m_columns"][] = "accountcode";
$proto499["m_columns"][] = "uniqueid";
$proto499["m_columns"][] = "userfield";
$obj = new SQLTable($proto499);

$proto498["m_table"] = $obj;
$proto498["m_alias"] = "";
$proto500=array();
$proto500["m_sql"] = "";
$proto500["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto500["m_column"]=$obj;
$proto500["m_contained"] = array();
$proto500["m_strCase"] = "";
$proto500["m_havingmode"] = "0";
$proto500["m_inBrackets"] = "0";
$proto500["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto500);

$proto498["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto498);

$proto475["m_fromlist"][]=$obj;
$proto475["m_groupby"] = array();
$proto475["m_orderby"] = array();
												$proto502=array();
						$obj = new SQLField(array(
	"m_strName" => "calldate",
	"m_strTable" => "cdr"
));

$proto502["m_column"]=$obj;
$proto502["m_bAsc"] = 1;
$proto502["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto502);

$proto475["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto475);

$queryData_Rel__Desvios_Chamadas = $obj;
$tdataRel__Desvios_Chamadas[".sqlquery"] = $queryData_Rel__Desvios_Chamadas;



?>
