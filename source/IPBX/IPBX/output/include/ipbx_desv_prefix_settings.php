<?php

//	field labels
$fieldLabelsipbx_desv_prefix = array();
$fieldLabelsipbx_desv_prefix["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_desv_prefix["Portuguese(Brazil)"]["id_desv_prefix"] = "Identificação";
$fieldLabelsipbx_desv_prefix["Portuguese(Brazil)"]["dsc_grp_pref"] = "Descrição de grupo de prefixo";


$tdataipbx_desv_prefix=array();
	$tdataipbx_desv_prefix[".NumberOfChars"]=80; 
	$tdataipbx_desv_prefix[".ShortName"]="ipbx_desv_prefix";
	$tdataipbx_desv_prefix[".OwnerID"]="";
	$tdataipbx_desv_prefix[".OriginalTable"]="ipbx_desv_prefix";
	$tdataipbx_desv_prefix[".NCSearch"]=true;
	

$tdataipbx_desv_prefix[".shortTableName"] = "ipbx_desv_prefix";
$tdataipbx_desv_prefix[".dataSourceTable"] = "ipbx_desv_prefix";
$tdataipbx_desv_prefix[".nSecOptions"] = 0;
$tdataipbx_desv_prefix[".nLoginMethod"] = 1;
$tdataipbx_desv_prefix[".recsPerRowList"] = 1;	
$tdataipbx_desv_prefix[".tableGroupBy"] = "0";
$tdataipbx_desv_prefix[".dbType"] = 0;
$tdataipbx_desv_prefix[".mainTableOwnerID"] = "";
$tdataipbx_desv_prefix[".moveNext"] = 1;

$tdataipbx_desv_prefix[".listAjax"] = true;

	$tdataipbx_desv_prefix[".audit"] = true;

	$tdataipbx_desv_prefix[".locking"] = false;
	
$tdataipbx_desv_prefix[".listIcons"] = true;
$tdataipbx_desv_prefix[".inlineEdit"] = true;



$tdataipbx_desv_prefix[".delete"] = true;

$tdataipbx_desv_prefix[".showSimpleSearchOptions"] = false;

$tdataipbx_desv_prefix[".showSearchPanel"] = true;


$tdataipbx_desv_prefix[".isUseAjaxSuggest"] = true;

$tdataipbx_desv_prefix[".rowHighlite"] = true;

$tdataipbx_desv_prefix[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_desv_prefix[".arrKeyFields"][] = "id_desv_prefix";

// use datepicker for search panel
$tdataipbx_desv_prefix[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_desv_prefix[".isUseTimeForSearch"] = false;




$tdataipbx_desv_prefix[".useDetailsPreview"] = true;	

$tdataipbx_desv_prefix[".isUseInlineAdd"] = true;

$tdataipbx_desv_prefix[".isUseInlineEdit"] = true;
$tdataipbx_desv_prefix[".isUseInlineJs"] = $tdataipbx_desv_prefix[".isUseInlineAdd"] || $tdataipbx_desv_prefix[".isUseInlineEdit"];

$tdataipbx_desv_prefix[".allSearchFields"] = array();



$tdataipbx_desv_prefix[".isDynamicPerm"] = true;

	

$tdataipbx_desv_prefix[".isDisplayLoading"] = true;

$tdataipbx_desv_prefix[".isResizeColumns"] = false;


$tdataipbx_desv_prefix[".createLoginPage"] = true;


 	
	$tdataipbx_desv_prefix[".subQueriesSupAccess"] = true;




$tdataipbx_desv_prefix[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_desv_prefix[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_desv_prefix[".orderindexes"] = array();

$tdataipbx_desv_prefix[".sqlHead"] = "SELECT id_desv_prefix,   dsc_grp_pref";

$tdataipbx_desv_prefix[".sqlFrom"] = "FROM ipbx_desv_prefix";

$tdataipbx_desv_prefix[".sqlWhereExpr"] = "";

$tdataipbx_desv_prefix[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_desv_prefix";
	$tdataipbx_desv_prefix[".Keys"]=$tableKeys;

	
//	id_desv_prefix
	$fdata = array();
	$fdata["strName"] = "id_desv_prefix";
	$fdata["ownerTable"] = "ipbx_desv_prefix";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_desv_prefix";
		$fdata["FullName"]= "id_desv_prefix";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_desv_prefix["id_desv_prefix"]=$fdata;
	
//	dsc_grp_pref
	$fdata = array();
	$fdata["strName"] = "dsc_grp_pref";
	$fdata["ownerTable"] = "ipbx_desv_prefix";
		$fdata["Label"]="Descrição de grupo de prefixo"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dsc_grp_pref";
		$fdata["FullName"]= "dsc_grp_pref";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_desv_prefix["dsc_grp_pref"]=$fdata;

	
$tables_data["ipbx_desv_prefix"]=&$tdataipbx_desv_prefix;
$field_labels["ipbx_desv_prefix"] = &$fieldLabelsipbx_desv_prefix;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_desv_prefix"] = array();
$dIndex = 1-1;
			$strOriginalDetailsTable="ipbx_desv_prefix_item";
	$detailsTablesData["ipbx_desv_prefix"][$dIndex] = array(
		  "dDataSourceTable"=>"ipbx_desv_prefix_item"
		, "dOriginalTable"=>$strOriginalDetailsTable
		, "dShortTable"=>"ipbx_desv_prefix_item"
		, "masterKeys"=>array()
		, "detailKeys"=>array()
		, "dispChildCount"=> "1"
		, "hideChild"=>"0"
		, "sqlHead"=>"SELECT id_desv_pref_item,   id_desv_prefix,   prefixo"	
		, "sqlFrom"=>"FROM ipbx_desv_prefix_item"	
		, "sqlWhere"=>""
		, "sqlTail"=>""
		, "groupBy"=>"0"
		, "previewOnList" => 1
		, "previewOnAdd" => 0
		, "previewOnEdit" => 0
		, "previewOnView" => 0
	);	
		$detailsTablesData["ipbx_desv_prefix"][$dIndex]["masterKeys"][]="id_desv_prefix";
		$detailsTablesData["ipbx_desv_prefix"][$dIndex]["detailKeys"][]="id_desv_prefix";


	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_desv_prefix"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto2310=array();
$proto2310["m_strHead"] = "SELECT";
$proto2310["m_strFieldList"] = "id_desv_prefix,   dsc_grp_pref";
$proto2310["m_strFrom"] = "FROM ipbx_desv_prefix";
$proto2310["m_strWhere"] = "";
$proto2310["m_strOrderBy"] = "";
$proto2310["m_strTail"] = "";
$proto2311=array();
$proto2311["m_sql"] = "";
$proto2311["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2311["m_column"]=$obj;
$proto2311["m_contained"] = array();
$proto2311["m_strCase"] = "";
$proto2311["m_havingmode"] = "0";
$proto2311["m_inBrackets"] = "0";
$proto2311["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2311);

$proto2310["m_where"] = $obj;
$proto2313=array();
$proto2313["m_sql"] = "";
$proto2313["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2313["m_column"]=$obj;
$proto2313["m_contained"] = array();
$proto2313["m_strCase"] = "";
$proto2313["m_havingmode"] = "0";
$proto2313["m_inBrackets"] = "0";
$proto2313["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2313);

$proto2310["m_having"] = $obj;
$proto2310["m_fieldlist"] = array();
						$proto2315=array();
			$obj = new SQLField(array(
	"m_strName" => "id_desv_prefix",
	"m_strTable" => "ipbx_desv_prefix"
));

$proto2315["m_expr"]=$obj;
$proto2315["m_alias"] = "";
$obj = new SQLFieldListItem($proto2315);

$proto2310["m_fieldlist"][]=$obj;
						$proto2317=array();
			$obj = new SQLField(array(
	"m_strName" => "dsc_grp_pref",
	"m_strTable" => "ipbx_desv_prefix"
));

$proto2317["m_expr"]=$obj;
$proto2317["m_alias"] = "";
$obj = new SQLFieldListItem($proto2317);

$proto2310["m_fieldlist"][]=$obj;
$proto2310["m_fromlist"] = array();
												$proto2319=array();
$proto2319["m_link"] = "SQLL_MAIN";
			$proto2320=array();
$proto2320["m_strName"] = "ipbx_desv_prefix";
$proto2320["m_columns"] = array();
$proto2320["m_columns"][] = "id_desv_prefix";
$proto2320["m_columns"][] = "dsc_grp_pref";
$obj = new SQLTable($proto2320);

$proto2319["m_table"] = $obj;
$proto2319["m_alias"] = "";
$proto2321=array();
$proto2321["m_sql"] = "";
$proto2321["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2321["m_column"]=$obj;
$proto2321["m_contained"] = array();
$proto2321["m_strCase"] = "";
$proto2321["m_havingmode"] = "0";
$proto2321["m_inBrackets"] = "0";
$proto2321["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto2321);

$proto2319["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto2319);

$proto2310["m_fromlist"][]=$obj;
$proto2310["m_groupby"] = array();
$proto2310["m_orderby"] = array();
$obj = new SQLQuery($proto2310);

$queryData_ipbx_desv_prefix = $obj;
$tdataipbx_desv_prefix[".sqlquery"] = $queryData_ipbx_desv_prefix;



?>
