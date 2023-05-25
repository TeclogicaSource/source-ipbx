<?php

//	field labels
$fieldLabelscodecs = array();
$fieldLabelscodecs["Portuguese(Brazil)"]=array();
$fieldLabelscodecs["Portuguese(Brazil)"]["idt_codec"] = "Codec";
$fieldLabelscodecs["Portuguese(Brazil)"]["codec"] = "Codec";
$fieldLabelscodecs["Portuguese(Brazil)"]["dsc_codec"] = "Dsc Codec";


$tdatacodecs=array();
	$tdatacodecs[".NumberOfChars"]=80; 
	$tdatacodecs[".ShortName"]="codecs";
	$tdatacodecs[".OwnerID"]="";
	$tdatacodecs[".OriginalTable"]="codecs";
	$tdatacodecs[".NCSearch"]=true;
	

$tdatacodecs[".shortTableName"] = "codecs";
$tdatacodecs[".dataSourceTable"] = "codecs";
$tdatacodecs[".nSecOptions"] = 0;
$tdatacodecs[".nLoginMethod"] = 1;
$tdatacodecs[".recsPerRowList"] = 1;	
$tdatacodecs[".tableGroupBy"] = "0";
$tdatacodecs[".dbType"] = 0;
$tdatacodecs[".mainTableOwnerID"] = "";
$tdatacodecs[".moveNext"] = 1;

$tdatacodecs[".listAjax"] = false;

	$tdatacodecs[".audit"] = true;

	$tdatacodecs[".locking"] = false;
	
$tdatacodecs[".listIcons"] = true;




$tdatacodecs[".showSimpleSearchOptions"] = false;

$tdatacodecs[".showSearchPanel"] = true;


$tdatacodecs[".isUseAjaxSuggest"] = true;

$tdatacodecs[".rowHighlite"] = true;


// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatacodecs[".arrKeyFields"][] = "idt_codec";

// use datepicker for search panel
$tdatacodecs[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatacodecs[".isUseTimeForSearch"] = false;






$tdatacodecs[".isUseInlineJs"] = $tdatacodecs[".isUseInlineAdd"] || $tdatacodecs[".isUseInlineEdit"];

$tdatacodecs[".allSearchFields"] = array();



$tdatacodecs[".isDynamicPerm"] = true;

	

$tdatacodecs[".isDisplayLoading"] = true;

$tdatacodecs[".isResizeColumns"] = false;


$tdatacodecs[".createLoginPage"] = true;


 	




$tdatacodecs[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatacodecs[".strOrderBy"] = $gstrOrderBy;
	
$tdatacodecs[".orderindexes"] = array();

$tdatacodecs[".sqlHead"] = "SELECT idt_codec,   codec,   dsc_codec";

$tdatacodecs[".sqlFrom"] = "FROM codecs";

$tdatacodecs[".sqlWhereExpr"] = "";

$tdatacodecs[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="idt_codec";
	$tdatacodecs[".Keys"]=$tableKeys;

	
//	idt_codec
	$fdata = array();
	$fdata["strName"] = "idt_codec";
	$fdata["ownerTable"] = "codecs";
		$fdata["Label"]="Codec"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "idt_codec";
		$fdata["FullName"]= "idt_codec";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatacodecs["idt_codec"]=$fdata;
	
//	codec
	$fdata = array();
	$fdata["strName"] = "codec";
	$fdata["ownerTable"] = "codecs";
		$fdata["Label"]="Codec"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "codec";
		$fdata["FullName"]= "codec";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
											$tdatacodecs["codec"]=$fdata;
	
//	dsc_codec
	$fdata = array();
	$fdata["strName"] = "dsc_codec";
	$fdata["ownerTable"] = "codecs";
		$fdata["Label"]="Dsc Codec"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_codec";
		$fdata["FullName"]= "dsc_codec";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
											$tdatacodecs["dsc_codec"]=$fdata;

	
$tables_data["codecs"]=&$tdatacodecs;
$field_labels["codecs"] = &$fieldLabelscodecs;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["codecs"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["codecs"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto823=array();
$proto823["m_strHead"] = "SELECT";
$proto823["m_strFieldList"] = "idt_codec,   codec,   dsc_codec";
$proto823["m_strFrom"] = "FROM codecs";
$proto823["m_strWhere"] = "";
$proto823["m_strOrderBy"] = "";
$proto823["m_strTail"] = "";
$proto824=array();
$proto824["m_sql"] = "";
$proto824["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto824["m_column"]=$obj;
$proto824["m_contained"] = array();
$proto824["m_strCase"] = "";
$proto824["m_havingmode"] = "0";
$proto824["m_inBrackets"] = "0";
$proto824["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto824);

$proto823["m_where"] = $obj;
$proto826=array();
$proto826["m_sql"] = "";
$proto826["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto826["m_column"]=$obj;
$proto826["m_contained"] = array();
$proto826["m_strCase"] = "";
$proto826["m_havingmode"] = "0";
$proto826["m_inBrackets"] = "0";
$proto826["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto826);

$proto823["m_having"] = $obj;
$proto823["m_fieldlist"] = array();
						$proto828=array();
			$obj = new SQLField(array(
	"m_strName" => "idt_codec",
	"m_strTable" => "codecs"
));

$proto828["m_expr"]=$obj;
$proto828["m_alias"] = "";
$obj = new SQLFieldListItem($proto828);

$proto823["m_fieldlist"][]=$obj;
						$proto830=array();
			$obj = new SQLField(array(
	"m_strName" => "codec",
	"m_strTable" => "codecs"
));

$proto830["m_expr"]=$obj;
$proto830["m_alias"] = "";
$obj = new SQLFieldListItem($proto830);

$proto823["m_fieldlist"][]=$obj;
						$proto832=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_codec",
	"m_strTable" => "codecs"
));

$proto832["m_expr"]=$obj;
$proto832["m_alias"] = "";
$obj = new SQLFieldListItem($proto832);

$proto823["m_fieldlist"][]=$obj;
$proto823["m_fromlist"] = array();
												$proto834=array();
$proto834["m_link"] = "SQLL_MAIN";
			$proto835=array();
$proto835["m_strName"] = "codecs";
$proto835["m_columns"] = array();
$proto835["m_columns"][] = "idt_codec";
$proto835["m_columns"][] = "codec";
$proto835["m_columns"][] = "dsc_codec";
$obj = new SQLTable($proto835);

$proto834["m_table"] = $obj;
$proto834["m_alias"] = "";
$proto836=array();
$proto836["m_sql"] = "";
$proto836["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto836["m_column"]=$obj;
$proto836["m_contained"] = array();
$proto836["m_strCase"] = "";
$proto836["m_havingmode"] = "0";
$proto836["m_inBrackets"] = "0";
$proto836["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto836);

$proto834["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto834);

$proto823["m_fromlist"][]=$obj;
$proto823["m_groupby"] = array();
$proto823["m_orderby"] = array();
$obj = new SQLQuery($proto823);

$queryData_codecs = $obj;
$tdatacodecs[".sqlquery"] = $queryData_codecs;



?>
