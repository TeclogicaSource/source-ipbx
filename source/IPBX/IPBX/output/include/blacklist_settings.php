<?php

//	field labels
$fieldLabelsblacklist = array();
$fieldLabelsblacklist["Portuguese(Brazil)"]=array();
$fieldLabelsblacklist["Portuguese(Brazil)"]["id_bl_list"] = "Identificação";
$fieldLabelsblacklist["Portuguese(Brazil)"]["dsc_bl_list"] = "Descrição";
$fieldLabelsblacklist["Portuguese(Brazil)"]["num_bl_list"] = "Número para bloquear";


$tdatablacklist=array();
	$tdatablacklist[".NumberOfChars"]=80; 
	$tdatablacklist[".ShortName"]="blacklist";
	$tdatablacklist[".OwnerID"]="";
	$tdatablacklist[".OriginalTable"]="blacklist";
	$tdatablacklist[".NCSearch"]=true;
	

$tdatablacklist[".shortTableName"] = "blacklist";
$tdatablacklist[".dataSourceTable"] = "blacklist";
$tdatablacklist[".nSecOptions"] = 0;
$tdatablacklist[".nLoginMethod"] = 1;
$tdatablacklist[".recsPerRowList"] = 1;	
$tdatablacklist[".tableGroupBy"] = "0";
$tdatablacklist[".dbType"] = 0;
$tdatablacklist[".mainTableOwnerID"] = "";
$tdatablacklist[".moveNext"] = 1;

$tdatablacklist[".listAjax"] = false;

	$tdatablacklist[".audit"] = true;

	$tdatablacklist[".locking"] = false;
	
$tdatablacklist[".listIcons"] = true;
$tdatablacklist[".inlineEdit"] = true;



$tdatablacklist[".delete"] = true;

$tdatablacklist[".showSimpleSearchOptions"] = false;

$tdatablacklist[".showSearchPanel"] = true;


$tdatablacklist[".isUseAjaxSuggest"] = true;

$tdatablacklist[".rowHighlite"] = true;

$tdatablacklist[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdatablacklist[".arrKeyFields"][] = "id_bl_list";

// use datepicker for search panel
$tdatablacklist[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatablacklist[".isUseTimeForSearch"] = false;





$tdatablacklist[".isUseInlineAdd"] = true;

$tdatablacklist[".isUseInlineEdit"] = true;
$tdatablacklist[".isUseInlineJs"] = $tdatablacklist[".isUseInlineAdd"] || $tdatablacklist[".isUseInlineEdit"];

$tdatablacklist[".allSearchFields"] = array();



$tdatablacklist[".isDynamicPerm"] = true;

	

$tdatablacklist[".isDisplayLoading"] = true;

$tdatablacklist[".isResizeColumns"] = false;


$tdatablacklist[".createLoginPage"] = true;


 	




$tdatablacklist[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatablacklist[".strOrderBy"] = $gstrOrderBy;
	
$tdatablacklist[".orderindexes"] = array();

$tdatablacklist[".sqlHead"] = "SELECT id_bl_list,   dsc_bl_list,   num_bl_list";

$tdatablacklist[".sqlFrom"] = "FROM blacklist";

$tdatablacklist[".sqlWhereExpr"] = "";

$tdatablacklist[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_bl_list";
	$tdatablacklist[".Keys"]=$tableKeys;

	
//	id_bl_list
	$fdata = array();
	$fdata["strName"] = "id_bl_list";
	$fdata["ownerTable"] = "blacklist";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_bl_list";
		$fdata["FullName"]= "id_bl_list";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdatablacklist["id_bl_list"]=$fdata;
	
//	dsc_bl_list
	$fdata = array();
	$fdata["strName"] = "dsc_bl_list";
	$fdata["ownerTable"] = "blacklist";
		$fdata["Label"]="Descrição"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_bl_list";
		$fdata["FullName"]= "dsc_bl_list";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=90";
			$fdata["EditParams"].= " size=50";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatablacklist["dsc_bl_list"]=$fdata;
	
//	num_bl_list
	$fdata = array();
	$fdata["strName"] = "num_bl_list";
	$fdata["ownerTable"] = "blacklist";
		$fdata["Label"]="Número para bloquear"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "num_bl_list";
		$fdata["FullName"]= "num_bl_list";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
			$fdata["EditParams"].= " size=30";
	 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatablacklist["num_bl_list"]=$fdata;

	
$tables_data["blacklist"]=&$tdatablacklist;
$field_labels["blacklist"] = &$fieldLabelsblacklist;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["blacklist"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["blacklist"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1352=array();
$proto1352["m_strHead"] = "SELECT";
$proto1352["m_strFieldList"] = "id_bl_list,   dsc_bl_list,   num_bl_list";
$proto1352["m_strFrom"] = "FROM blacklist";
$proto1352["m_strWhere"] = "";
$proto1352["m_strOrderBy"] = "";
$proto1352["m_strTail"] = "";
$proto1353=array();
$proto1353["m_sql"] = "";
$proto1353["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1353["m_column"]=$obj;
$proto1353["m_contained"] = array();
$proto1353["m_strCase"] = "";
$proto1353["m_havingmode"] = "0";
$proto1353["m_inBrackets"] = "0";
$proto1353["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1353);

$proto1352["m_where"] = $obj;
$proto1355=array();
$proto1355["m_sql"] = "";
$proto1355["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1355["m_column"]=$obj;
$proto1355["m_contained"] = array();
$proto1355["m_strCase"] = "";
$proto1355["m_havingmode"] = "0";
$proto1355["m_inBrackets"] = "0";
$proto1355["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1355);

$proto1352["m_having"] = $obj;
$proto1352["m_fieldlist"] = array();
						$proto1357=array();
			$obj = new SQLField(array(
	"m_strName" => "id_bl_list",
	"m_strTable" => "blacklist"
));

$proto1357["m_expr"]=$obj;
$proto1357["m_alias"] = "";
$obj = new SQLFieldListItem($proto1357);

$proto1352["m_fieldlist"][]=$obj;
						$proto1359=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_bl_list",
	"m_strTable" => "blacklist"
));

$proto1359["m_expr"]=$obj;
$proto1359["m_alias"] = "";
$obj = new SQLFieldListItem($proto1359);

$proto1352["m_fieldlist"][]=$obj;
						$proto1361=array();
			$obj = new SQLField(array(
	"m_strName" => "num_bl_list",
	"m_strTable" => "blacklist"
));

$proto1361["m_expr"]=$obj;
$proto1361["m_alias"] = "";
$obj = new SQLFieldListItem($proto1361);

$proto1352["m_fieldlist"][]=$obj;
$proto1352["m_fromlist"] = array();
												$proto1363=array();
$proto1363["m_link"] = "SQLL_MAIN";
			$proto1364=array();
$proto1364["m_strName"] = "blacklist";
$proto1364["m_columns"] = array();
$proto1364["m_columns"][] = "id_bl_list";
$proto1364["m_columns"][] = "dsc_bl_list";
$proto1364["m_columns"][] = "num_bl_list";
$obj = new SQLTable($proto1364);

$proto1363["m_table"] = $obj;
$proto1363["m_alias"] = "";
$proto1365=array();
$proto1365["m_sql"] = "";
$proto1365["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1365["m_column"]=$obj;
$proto1365["m_contained"] = array();
$proto1365["m_strCase"] = "";
$proto1365["m_havingmode"] = "0";
$proto1365["m_inBrackets"] = "0";
$proto1365["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1365);

$proto1363["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1363);

$proto1352["m_fromlist"][]=$obj;
$proto1352["m_groupby"] = array();
$proto1352["m_orderby"] = array();
$obj = new SQLQuery($proto1352);

$queryData_blacklist = $obj;
$tdatablacklist[".sqlquery"] = $queryData_blacklist;



?>
