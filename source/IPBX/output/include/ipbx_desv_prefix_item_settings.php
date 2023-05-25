<?php

//	field labels
$fieldLabelsipbx_desv_prefix_item = array();
$fieldLabelsipbx_desv_prefix_item["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_desv_prefix_item["Portuguese(Brazil)"]["id_desv_pref_item"] = "Identificação";
$fieldLabelsipbx_desv_prefix_item["Portuguese(Brazil)"]["prefixo"] = "Prefixo";
$fieldLabelsipbx_desv_prefix_item["Portuguese(Brazil)"]["id_desv_prefix"] = "Grupo de prefixo";


$tdataipbx_desv_prefix_item=array();
	$tdataipbx_desv_prefix_item[".NumberOfChars"]=80; 
	$tdataipbx_desv_prefix_item[".ShortName"]="ipbx_desv_prefix_item";
	$tdataipbx_desv_prefix_item[".OwnerID"]="";
	$tdataipbx_desv_prefix_item[".OriginalTable"]="ipbx_desv_prefix_item";
	$tdataipbx_desv_prefix_item[".NCSearch"]=true;
	

$tdataipbx_desv_prefix_item[".shortTableName"] = "ipbx_desv_prefix_item";
$tdataipbx_desv_prefix_item[".dataSourceTable"] = "ipbx_desv_prefix_item";
$tdataipbx_desv_prefix_item[".nSecOptions"] = 0;
$tdataipbx_desv_prefix_item[".nLoginMethod"] = 1;
$tdataipbx_desv_prefix_item[".recsPerRowList"] = 1;	
$tdataipbx_desv_prefix_item[".tableGroupBy"] = "0";
$tdataipbx_desv_prefix_item[".dbType"] = 0;
$tdataipbx_desv_prefix_item[".mainTableOwnerID"] = "";
$tdataipbx_desv_prefix_item[".moveNext"] = 1;

$tdataipbx_desv_prefix_item[".listAjax"] = true;

	$tdataipbx_desv_prefix_item[".audit"] = true;

	$tdataipbx_desv_prefix_item[".locking"] = false;
	
$tdataipbx_desv_prefix_item[".listIcons"] = true;
$tdataipbx_desv_prefix_item[".inlineEdit"] = true;



$tdataipbx_desv_prefix_item[".delete"] = true;

$tdataipbx_desv_prefix_item[".showSimpleSearchOptions"] = false;

$tdataipbx_desv_prefix_item[".showSearchPanel"] = true;


$tdataipbx_desv_prefix_item[".isUseAjaxSuggest"] = true;

$tdataipbx_desv_prefix_item[".rowHighlite"] = true;

$tdataipbx_desv_prefix_item[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_desv_prefix_item[".arrKeyFields"][] = "id_desv_pref_item";

// use datepicker for search panel
$tdataipbx_desv_prefix_item[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_desv_prefix_item[".isUseTimeForSearch"] = false;





$tdataipbx_desv_prefix_item[".isUseInlineAdd"] = true;

$tdataipbx_desv_prefix_item[".isUseInlineEdit"] = true;
$tdataipbx_desv_prefix_item[".isUseInlineJs"] = $tdataipbx_desv_prefix_item[".isUseInlineAdd"] || $tdataipbx_desv_prefix_item[".isUseInlineEdit"];

$tdataipbx_desv_prefix_item[".allSearchFields"] = array();



$tdataipbx_desv_prefix_item[".isDynamicPerm"] = true;

	

$tdataipbx_desv_prefix_item[".isDisplayLoading"] = true;

$tdataipbx_desv_prefix_item[".isResizeColumns"] = false;


$tdataipbx_desv_prefix_item[".createLoginPage"] = true;


 	




$tdataipbx_desv_prefix_item[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_desv_prefix_item[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_desv_prefix_item[".orderindexes"] = array();

$tdataipbx_desv_prefix_item[".sqlHead"] = "SELECT id_desv_pref_item,   id_desv_prefix,   prefixo";

$tdataipbx_desv_prefix_item[".sqlFrom"] = "FROM ipbx_desv_prefix_item";

$tdataipbx_desv_prefix_item[".sqlWhereExpr"] = "";

$tdataipbx_desv_prefix_item[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_desv_pref_item";
	$tdataipbx_desv_prefix_item[".Keys"]=$tableKeys;

	
//	id_desv_pref_item
	$fdata = array();
	$fdata["strName"] = "id_desv_pref_item";
	$fdata["ownerTable"] = "ipbx_desv_prefix_item";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_desv_pref_item";
		$fdata["FullName"]= "id_desv_pref_item";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_desv_prefix_item["id_desv_pref_item"]=$fdata;
	
//	id_desv_prefix
	$fdata = array();
	$fdata["strName"] = "id_desv_prefix";
	$fdata["ownerTable"] = "ipbx_desv_prefix_item";
		$fdata["Label"]="Grupo de prefixo"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_desv_prefix";
		$fdata["FullName"]= "id_desv_prefix";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_desv_prefix_item["id_desv_prefix"]=$fdata;
	
//	prefixo
	$fdata = array();
	$fdata["strName"] = "prefixo";
	$fdata["ownerTable"] = "ipbx_desv_prefix_item";
		$fdata["Label"]="Prefixo"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "prefixo";
		$fdata["FullName"]= "prefixo";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_desv_prefix_item["prefixo"]=$fdata;

	
$tables_data["ipbx_desv_prefix_item"]=&$tdataipbx_desv_prefix_item;
$field_labels["ipbx_desv_prefix_item"] = &$fieldLabelsipbx_desv_prefix_item;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_desv_prefix_item"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_desv_prefix_item"] = array();

$mIndex = 1-1;
			$strOriginalDetailsTable="ipbx_desv_prefix";
	$masterTablesData["ipbx_desv_prefix_item"][$mIndex] = array(
		  "mDataSourceTable"=>"ipbx_desv_prefix"
		, "mOriginalTable" => $strOriginalDetailsTable
		, "mShortTable" => "ipbx_desv_prefix"
		, "masterKeys" => array()
		, "detailKeys" => array()
		, "dispChildCount" => "1"
		, "hideChild" => "0"	
		, "dispInfo" => "1"								
		, "previewOnList" => 1
		, "previewOnAdd" => 0
		, "previewOnEdit" => 0
		, "previewOnView" => 0
	);	
		$masterTablesData["ipbx_desv_prefix_item"][$mIndex]["masterKeys"][]="id_desv_prefix";
		$masterTablesData["ipbx_desv_prefix_item"][$mIndex]["detailKeys"][]="id_desv_prefix";

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2550=array();
$proto2550["m_strHead"] = "SELECT";
$proto2550["m_strFieldList"] = "id_desv_pref_item,   id_desv_prefix,   prefixo";
$proto2550["m_strFrom"] = "FROM ipbx_desv_prefix_item";
$proto2550["m_strWhere"] = "";
$proto2550["m_strOrderBy"] = "";
$proto2550["m_strTail"] = "";
$proto2551=array();
$proto2551["m_sql"] = "";
$proto2551["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2551["m_column"]=$obj;
$proto2551["m_contained"] = array();
$proto2551["m_strCase"] = "";
$proto2551["m_havingmode"] = "0";
$proto2551["m_inBrackets"] = "0";
$proto2551["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2551);

$proto2550["m_where"] = $obj;
$proto2553=array();
$proto2553["m_sql"] = "";
$proto2553["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2553["m_column"]=$obj;
$proto2553["m_contained"] = array();
$proto2553["m_strCase"] = "";
$proto2553["m_havingmode"] = "0";
$proto2553["m_inBrackets"] = "0";
$proto2553["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2553);

$proto2550["m_having"] = $obj;
$proto2550["m_fieldlist"] = array();
						$proto2555=array();
			$obj = new SQLField(array(
	"m_strName" => "id_desv_pref_item",
	"m_strTable" => "ipbx_desv_prefix_item"
));

$proto2555["m_expr"]=$obj;
$proto2555["m_alias"] = "";
$obj = new SQLFieldListItem($proto2555);

$proto2550["m_fieldlist"][]=$obj;
						$proto2557=array();
			$obj = new SQLField(array(
	"m_strName" => "id_desv_prefix",
	"m_strTable" => "ipbx_desv_prefix_item"
));

$proto2557["m_expr"]=$obj;
$proto2557["m_alias"] = "";
$obj = new SQLFieldListItem($proto2557);

$proto2550["m_fieldlist"][]=$obj;
						$proto2559=array();
			$obj = new SQLField(array(
	"m_strName" => "prefixo",
	"m_strTable" => "ipbx_desv_prefix_item"
));

$proto2559["m_expr"]=$obj;
$proto2559["m_alias"] = "";
$obj = new SQLFieldListItem($proto2559);

$proto2550["m_fieldlist"][]=$obj;
$proto2550["m_fromlist"] = array();
												$proto2561=array();
$proto2561["m_link"] = "SQLL_MAIN";
			$proto2562=array();
$proto2562["m_strName"] = "ipbx_desv_prefix_item";
$proto2562["m_columns"] = array();
$proto2562["m_columns"][] = "id_desv_pref_item";
$proto2562["m_columns"][] = "id_desv_prefix";
$proto2562["m_columns"][] = "prefixo";
$obj = new SQLTable($proto2562);

$proto2561["m_table"] = $obj;
$proto2561["m_alias"] = "";
$proto2563=array();
$proto2563["m_sql"] = "";
$proto2563["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2563["m_column"]=$obj;
$proto2563["m_contained"] = array();
$proto2563["m_strCase"] = "";
$proto2563["m_havingmode"] = "0";
$proto2563["m_inBrackets"] = "0";
$proto2563["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2563);

$proto2561["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2561);

$proto2550["m_fromlist"][]=$obj;
$proto2550["m_groupby"] = array();
$proto2550["m_orderby"] = array();
$obj = new SQLQuery($proto2550);

$queryData_ipbx_desv_prefix_item = $obj;
$tdataipbx_desv_prefix_item[".sqlquery"] = $queryData_ipbx_desv_prefix_item;



?>
