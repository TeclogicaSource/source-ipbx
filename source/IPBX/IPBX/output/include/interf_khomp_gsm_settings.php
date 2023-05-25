<?php

//	field labels
$fieldLabelsinterf_khomp_gsm = array();
$fieldLabelsinterf_khomp_gsm["Portuguese(Brazil)"]=array();
$fieldLabelsinterf_khomp_gsm["Portuguese(Brazil)"]["id_k_gsm"] = "Id K Gsm";
$fieldLabelsinterf_khomp_gsm["Portuguese(Brazil)"]["id_contrato"] = "Id Contrato";
$fieldLabelsinterf_khomp_gsm["Portuguese(Brazil)"]["board"] = "Board";
$fieldLabelsinterf_khomp_gsm["Portuguese(Brazil)"]["link"] = "Link";
$fieldLabelsinterf_khomp_gsm["Portuguese(Brazil)"]["id_central"] = "Id Central";


$tdatainterf_khomp_gsm=array();
	$tdatainterf_khomp_gsm[".NumberOfChars"]=80; 
	$tdatainterf_khomp_gsm[".ShortName"]="interf_khomp_gsm";
	$tdatainterf_khomp_gsm[".OwnerID"]="";
	$tdatainterf_khomp_gsm[".OriginalTable"]="interf_khomp_gsm";
	$tdatainterf_khomp_gsm[".NCSearch"]=true;
	

$tdatainterf_khomp_gsm[".shortTableName"] = "interf_khomp_gsm";
$tdatainterf_khomp_gsm[".dataSourceTable"] = "interf_khomp_gsm";
$tdatainterf_khomp_gsm[".nSecOptions"] = 0;
$tdatainterf_khomp_gsm[".nLoginMethod"] = 1;
$tdatainterf_khomp_gsm[".recsPerRowList"] = 1;	
$tdatainterf_khomp_gsm[".tableGroupBy"] = "0";
$tdatainterf_khomp_gsm[".dbType"] = 0;
$tdatainterf_khomp_gsm[".mainTableOwnerID"] = "";
$tdatainterf_khomp_gsm[".moveNext"] = 1;

$tdatainterf_khomp_gsm[".listAjax"] = false;

	$tdatainterf_khomp_gsm[".audit"] = false;

	$tdatainterf_khomp_gsm[".locking"] = false;
	
$tdatainterf_khomp_gsm[".listIcons"] = true;
$tdatainterf_khomp_gsm[".inlineEdit"] = true;



$tdatainterf_khomp_gsm[".delete"] = true;

$tdatainterf_khomp_gsm[".showSimpleSearchOptions"] = false;

$tdatainterf_khomp_gsm[".showSearchPanel"] = true;


$tdatainterf_khomp_gsm[".isUseAjaxSuggest"] = true;

$tdatainterf_khomp_gsm[".rowHighlite"] = true;

$tdatainterf_khomp_gsm[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatainterf_khomp_gsm[".arrKeyFields"][] = "id_k_gsm";

// use datepicker for search panel
$tdatainterf_khomp_gsm[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatainterf_khomp_gsm[".isUseTimeForSearch"] = false;





$tdatainterf_khomp_gsm[".isUseInlineAdd"] = true;

$tdatainterf_khomp_gsm[".isUseInlineEdit"] = true;
$tdatainterf_khomp_gsm[".isUseInlineJs"] = $tdatainterf_khomp_gsm[".isUseInlineAdd"] || $tdatainterf_khomp_gsm[".isUseInlineEdit"];

$tdatainterf_khomp_gsm[".allSearchFields"] = array();



$tdatainterf_khomp_gsm[".isDynamicPerm"] = true;

	

$tdatainterf_khomp_gsm[".isDisplayLoading"] = true;

$tdatainterf_khomp_gsm[".isResizeColumns"] = false;


$tdatainterf_khomp_gsm[".createLoginPage"] = true;


 	




$tdatainterf_khomp_gsm[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatainterf_khomp_gsm[".strOrderBy"] = $gstrOrderBy;
	
$tdatainterf_khomp_gsm[".orderindexes"] = array();

$tdatainterf_khomp_gsm[".sqlHead"] = "SELECT id_k_gsm,   id_contrato,   board,   link,   id_central";

$tdatainterf_khomp_gsm[".sqlFrom"] = "FROM interf_khomp_gsm";

$tdatainterf_khomp_gsm[".sqlWhereExpr"] = "";

$tdatainterf_khomp_gsm[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_k_gsm";
	$tdatainterf_khomp_gsm[".Keys"]=$tableKeys;

	
//	id_k_gsm
	$fdata = array();
	$fdata["strName"] = "id_k_gsm";
	$fdata["ownerTable"] = "interf_khomp_gsm";
		$fdata["Label"]="Id K Gsm"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_k_gsm";
		$fdata["FullName"]= "id_k_gsm";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatainterf_khomp_gsm["id_k_gsm"]=$fdata;
	
//	id_contrato
	$fdata = array();
	$fdata["strName"] = "id_contrato";
	$fdata["ownerTable"] = "interf_khomp_gsm";
		$fdata["Label"]="Id Contrato"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_contrato";
		$fdata["FullName"]= "id_contrato";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatainterf_khomp_gsm["id_contrato"]=$fdata;
	
//	board
	$fdata = array();
	$fdata["strName"] = "board";
	$fdata["ownerTable"] = "interf_khomp_gsm";
		$fdata["Label"]="Board"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "board";
		$fdata["FullName"]= "board";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatainterf_khomp_gsm["board"]=$fdata;
	
//	link
	$fdata = array();
	$fdata["strName"] = "link";
	$fdata["ownerTable"] = "interf_khomp_gsm";
		$fdata["Label"]="Link"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "link";
		$fdata["FullName"]= "link";
						$fdata["Index"]= 4;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatainterf_khomp_gsm["link"]=$fdata;
	
//	id_central
	$fdata = array();
	$fdata["strName"] = "id_central";
	$fdata["ownerTable"] = "interf_khomp_gsm";
		$fdata["Label"]="Id Central"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_central";
		$fdata["FullName"]= "id_central";
						$fdata["Index"]= 5;
	
			$fdata["EditParams"]="";
			
											$tdatainterf_khomp_gsm["id_central"]=$fdata;

	
$tables_data["interf_khomp_gsm"]=&$tdatainterf_khomp_gsm;
$field_labels["interf_khomp_gsm"] = &$fieldLabelsinterf_khomp_gsm;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["interf_khomp_gsm"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["interf_khomp_gsm"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="central";
	$masterTablesData["interf_khomp_gsm"][$mIndex] = array(
		  "mDataSourceTable"=>"central"
		, "mOriginalTable" => $strOriginalDetailsTable
		, "mShortTable" => "central"
		, "masterKeys" => array()
		, "detailKeys" => array()
		, "dispChildCount" => "1"
		, "hideChild" => "0"	
		, "dispInfo" => "1"								
		, "previewOnList" => 1
		, "previewOnAdd" => 1
		, "previewOnEdit" => 1
		, "previewOnView" => 0
	);	
		$masterTablesData["interf_khomp_gsm"][$mIndex]["masterKeys"][]="id_central";
		$masterTablesData["interf_khomp_gsm"][$mIndex]["detailKeys"][]="id_central";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto568=array();
$proto568["m_strHead"] = "SELECT";
$proto568["m_strFieldList"] = "id_k_gsm,   id_contrato,   board,   link,   id_central";
$proto568["m_strFrom"] = "FROM interf_khomp_gsm";
$proto568["m_strWhere"] = "";
$proto568["m_strOrderBy"] = "";
$proto568["m_strTail"] = "";
$proto569=array();
$proto569["m_sql"] = "";
$proto569["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto569["m_column"]=$obj;
$proto569["m_contained"] = array();
$proto569["m_strCase"] = "";
$proto569["m_havingmode"] = "0";
$proto569["m_inBrackets"] = "0";
$proto569["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto569);

$proto568["m_where"] = $obj;
$proto571=array();
$proto571["m_sql"] = "";
$proto571["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto571["m_column"]=$obj;
$proto571["m_contained"] = array();
$proto571["m_strCase"] = "";
$proto571["m_havingmode"] = "0";
$proto571["m_inBrackets"] = "0";
$proto571["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto571);

$proto568["m_having"] = $obj;
$proto568["m_fieldlist"] = array();
						$proto573=array();
			$obj = new SQLField(array(
	"m_strName" => "id_k_gsm",
	"m_strTable" => "interf_khomp_gsm"
));

$proto573["m_expr"]=$obj;
$proto573["m_alias"] = "";
$obj = new SQLFieldListItem($proto573);

$proto568["m_fieldlist"][]=$obj;
						$proto575=array();
			$obj = new SQLField(array(
	"m_strName" => "id_contrato",
	"m_strTable" => "interf_khomp_gsm"
));

$proto575["m_expr"]=$obj;
$proto575["m_alias"] = "";
$obj = new SQLFieldListItem($proto575);

$proto568["m_fieldlist"][]=$obj;
						$proto577=array();
			$obj = new SQLField(array(
	"m_strName" => "board",
	"m_strTable" => "interf_khomp_gsm"
));

$proto577["m_expr"]=$obj;
$proto577["m_alias"] = "";
$obj = new SQLFieldListItem($proto577);

$proto568["m_fieldlist"][]=$obj;
						$proto579=array();
			$obj = new SQLField(array(
	"m_strName" => "link",
	"m_strTable" => "interf_khomp_gsm"
));

$proto579["m_expr"]=$obj;
$proto579["m_alias"] = "";
$obj = new SQLFieldListItem($proto579);

$proto568["m_fieldlist"][]=$obj;
						$proto581=array();
			$obj = new SQLField(array(
	"m_strName" => "id_central",
	"m_strTable" => "interf_khomp_gsm"
));

$proto581["m_expr"]=$obj;
$proto581["m_alias"] = "";
$obj = new SQLFieldListItem($proto581);

$proto568["m_fieldlist"][]=$obj;
$proto568["m_fromlist"] = array();
												$proto583=array();
$proto583["m_link"] = "SQLL_MAIN";
			$proto584=array();
$proto584["m_strName"] = "interf_khomp_gsm";
$proto584["m_columns"] = array();
$proto584["m_columns"][] = "id_k_gsm";
$proto584["m_columns"][] = "id_contrato";
$proto584["m_columns"][] = "board";
$proto584["m_columns"][] = "link";
$proto584["m_columns"][] = "id_central";
$obj = new SQLTable($proto584);

$proto583["m_table"] = $obj;
$proto583["m_alias"] = "";
$proto585=array();
$proto585["m_sql"] = "";
$proto585["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto585["m_column"]=$obj;
$proto585["m_contained"] = array();
$proto585["m_strCase"] = "";
$proto585["m_havingmode"] = "0";
$proto585["m_inBrackets"] = "0";
$proto585["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto585);

$proto583["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto583);

$proto568["m_fromlist"][]=$obj;
$proto568["m_groupby"] = array();
$proto568["m_orderby"] = array();
$obj = new SQLQuery($proto568);

$queryData_interf_khomp_gsm = $obj;
$tdatainterf_khomp_gsm[".sqlquery"] = $queryData_interf_khomp_gsm;



?>
