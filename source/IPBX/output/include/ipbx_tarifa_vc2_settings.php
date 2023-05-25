<?php

//	field labels
$fieldLabelsipbx_tarifa_vc2 = array();
$fieldLabelsipbx_tarifa_vc2["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_tarifa_vc2["Portuguese(Brazil)"]["id"] = "Identificação";
$fieldLabelsipbx_tarifa_vc2["Portuguese(Brazil)"]["prefixo"] = "Prefixo";


$tdataipbx_tarifa_vc2=array();
	$tdataipbx_tarifa_vc2[".NumberOfChars"]=80; 
	$tdataipbx_tarifa_vc2[".ShortName"]="ipbx_tarifa_vc2";
	$tdataipbx_tarifa_vc2[".OwnerID"]="";
	$tdataipbx_tarifa_vc2[".OriginalTable"]="ipbx_tarifa_vc2";
	$tdataipbx_tarifa_vc2[".NCSearch"]=true;
	

$tdataipbx_tarifa_vc2[".shortTableName"] = "ipbx_tarifa_vc2";
$tdataipbx_tarifa_vc2[".dataSourceTable"] = "ipbx_tarifa_vc2";
$tdataipbx_tarifa_vc2[".nSecOptions"] = 0;
$tdataipbx_tarifa_vc2[".nLoginMethod"] = 1;
$tdataipbx_tarifa_vc2[".recsPerRowList"] = 1;	
$tdataipbx_tarifa_vc2[".tableGroupBy"] = "0";
$tdataipbx_tarifa_vc2[".dbType"] = 0;
$tdataipbx_tarifa_vc2[".mainTableOwnerID"] = "";
$tdataipbx_tarifa_vc2[".moveNext"] = 1;

$tdataipbx_tarifa_vc2[".listAjax"] = true;

	$tdataipbx_tarifa_vc2[".audit"] = true;

	$tdataipbx_tarifa_vc2[".locking"] = false;
	
$tdataipbx_tarifa_vc2[".listIcons"] = true;
$tdataipbx_tarifa_vc2[".inlineEdit"] = true;



$tdataipbx_tarifa_vc2[".delete"] = true;

$tdataipbx_tarifa_vc2[".showSimpleSearchOptions"] = false;

$tdataipbx_tarifa_vc2[".showSearchPanel"] = true;


$tdataipbx_tarifa_vc2[".isUseAjaxSuggest"] = true;

$tdataipbx_tarifa_vc2[".rowHighlite"] = true;

$tdataipbx_tarifa_vc2[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_tarifa_vc2[".arrKeyFields"][] = "id";

// use datepicker for search panel
$tdataipbx_tarifa_vc2[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_tarifa_vc2[".isUseTimeForSearch"] = false;





$tdataipbx_tarifa_vc2[".isUseInlineAdd"] = true;

$tdataipbx_tarifa_vc2[".isUseInlineEdit"] = true;
$tdataipbx_tarifa_vc2[".isUseInlineJs"] = $tdataipbx_tarifa_vc2[".isUseInlineAdd"] || $tdataipbx_tarifa_vc2[".isUseInlineEdit"];

$tdataipbx_tarifa_vc2[".allSearchFields"] = array();



$tdataipbx_tarifa_vc2[".isDynamicPerm"] = true;

	

$tdataipbx_tarifa_vc2[".isDisplayLoading"] = true;

$tdataipbx_tarifa_vc2[".isResizeColumns"] = false;


$tdataipbx_tarifa_vc2[".createLoginPage"] = true;


 	




$tdataipbx_tarifa_vc2[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_tarifa_vc2[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_tarifa_vc2[".orderindexes"] = array();

$tdataipbx_tarifa_vc2[".sqlHead"] = "SELECT id,   prefixo";

$tdataipbx_tarifa_vc2[".sqlFrom"] = "FROM ipbx_tarifa_vc2";

$tdataipbx_tarifa_vc2[".sqlWhereExpr"] = "";

$tdataipbx_tarifa_vc2[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id";
	$tdataipbx_tarifa_vc2[".Keys"]=$tableKeys;

	
//	id
	$fdata = array();
	$fdata["strName"] = "id";
	$fdata["ownerTable"] = "ipbx_tarifa_vc2";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id";
		$fdata["FullName"]= "id";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_tarifa_vc2["id"]=$fdata;
	
//	prefixo
	$fdata = array();
	$fdata["strName"] = "prefixo";
	$fdata["ownerTable"] = "ipbx_tarifa_vc2";
		$fdata["Label"]="Prefixo"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "prefixo";
		$fdata["FullName"]= "prefixo";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=3";
			$fdata["EditParams"].= " size=3";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_tarifa_vc2["prefixo"]=$fdata;

	
$tables_data["ipbx_tarifa_vc2"]=&$tdataipbx_tarifa_vc2;
$field_labels["ipbx_tarifa_vc2"] = &$fieldLabelsipbx_tarifa_vc2;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_tarifa_vc2"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_tarifa_vc2"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2018=array();
$proto2018["m_strHead"] = "SELECT";
$proto2018["m_strFieldList"] = "id,   prefixo";
$proto2018["m_strFrom"] = "FROM ipbx_tarifa_vc2";
$proto2018["m_strWhere"] = "";
$proto2018["m_strOrderBy"] = "";
$proto2018["m_strTail"] = "";
$proto2019=array();
$proto2019["m_sql"] = "";
$proto2019["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2019["m_column"]=$obj;
$proto2019["m_contained"] = array();
$proto2019["m_strCase"] = "";
$proto2019["m_havingmode"] = "0";
$proto2019["m_inBrackets"] = "0";
$proto2019["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2019);

$proto2018["m_where"] = $obj;
$proto2021=array();
$proto2021["m_sql"] = "";
$proto2021["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2021["m_column"]=$obj;
$proto2021["m_contained"] = array();
$proto2021["m_strCase"] = "";
$proto2021["m_havingmode"] = "0";
$proto2021["m_inBrackets"] = "0";
$proto2021["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2021);

$proto2018["m_having"] = $obj;
$proto2018["m_fieldlist"] = array();
						$proto2023=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "ipbx_tarifa_vc2"
));

$proto2023["m_expr"]=$obj;
$proto2023["m_alias"] = "";
$obj = new SQLFieldListItem($proto2023);

$proto2018["m_fieldlist"][]=$obj;
						$proto2025=array();
			$obj = new SQLField(array(
	"m_strName" => "prefixo",
	"m_strTable" => "ipbx_tarifa_vc2"
));

$proto2025["m_expr"]=$obj;
$proto2025["m_alias"] = "";
$obj = new SQLFieldListItem($proto2025);

$proto2018["m_fieldlist"][]=$obj;
$proto2018["m_fromlist"] = array();
												$proto2027=array();
$proto2027["m_link"] = "SQLL_MAIN";
			$proto2028=array();
$proto2028["m_strName"] = "ipbx_tarifa_vc2";
$proto2028["m_columns"] = array();
$proto2028["m_columns"][] = "id";
$proto2028["m_columns"][] = "prefixo";
$obj = new SQLTable($proto2028);

$proto2027["m_table"] = $obj;
$proto2027["m_alias"] = "";
$proto2029=array();
$proto2029["m_sql"] = "";
$proto2029["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2029["m_column"]=$obj;
$proto2029["m_contained"] = array();
$proto2029["m_strCase"] = "";
$proto2029["m_havingmode"] = "0";
$proto2029["m_inBrackets"] = "0";
$proto2029["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2029);

$proto2027["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2027);

$proto2018["m_fromlist"][]=$obj;
$proto2018["m_groupby"] = array();
$proto2018["m_orderby"] = array();
$obj = new SQLQuery($proto2018);

$queryData_ipbx_tarifa_vc2 = $obj;
$tdataipbx_tarifa_vc2[".sqlquery"] = $queryData_ipbx_tarifa_vc2;



?>
