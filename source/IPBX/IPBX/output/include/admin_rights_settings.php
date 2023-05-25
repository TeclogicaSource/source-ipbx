<?php

//	field labels
$fieldLabelsadmin_rights = array();
$fieldLabelsadmin_rights["Portuguese(Brazil)"]=array();
$fieldLabelsadmin_rights["Portuguese(Brazil)"]["TableName"] = "Table Name";
$fieldLabelsadmin_rights["Portuguese(Brazil)"]["GroupID"] = "Group ID";
$fieldLabelsadmin_rights["Portuguese(Brazil)"]["AccessMask"] = "Access Mask";


$tdataadmin_rights=array();
	$tdataadmin_rights[".NumberOfChars"]=80; 
	$tdataadmin_rights[".ShortName"]="admin_rights";
	$tdataadmin_rights[".OwnerID"]="";
	$tdataadmin_rights[".OriginalTable"]="ipbx_ugrights";
	$tdataadmin_rights[".NCSearch"]=true;
	

$tdataadmin_rights[".shortTableName"] = "admin_rights";
$tdataadmin_rights[".dataSourceTable"] = "admin_rights";
$tdataadmin_rights[".nSecOptions"] = 0;
$tdataadmin_rights[".nLoginMethod"] = 1;
$tdataadmin_rights[".recsPerRowList"] = 1;	
$tdataadmin_rights[".tableGroupBy"] = "0";
$tdataadmin_rights[".dbType"] = 0;
$tdataadmin_rights[".mainTableOwnerID"] = "";
$tdataadmin_rights[".moveNext"] = 1;

$tdataadmin_rights[".listAjax"] = true;

	$tdataadmin_rights[".audit"] = true;

	$tdataadmin_rights[".locking"] = false;
	
$tdataadmin_rights[".listIcons"] = true;




$tdataadmin_rights[".showSimpleSearchOptions"] = false;

$tdataadmin_rights[".showSearchPanel"] = true;


$tdataadmin_rights[".isUseAjaxSuggest"] = true;

$tdataadmin_rights[".rowHighlite"] = true;

$tdataadmin_rights[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers




// use datepicker for search panel
$tdataadmin_rights[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataadmin_rights[".isUseTimeForSearch"] = false;






$tdataadmin_rights[".isUseInlineJs"] = $tdataadmin_rights[".isUseInlineAdd"] || $tdataadmin_rights[".isUseInlineEdit"];

$tdataadmin_rights[".allSearchFields"] = array();



$tdataadmin_rights[".isDynamicPerm"] = true;

	

$tdataadmin_rights[".isDisplayLoading"] = true;

$tdataadmin_rights[".isResizeColumns"] = false;


$tdataadmin_rights[".createLoginPage"] = true;


 	




$tdataadmin_rights[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataadmin_rights[".strOrderBy"] = $gstrOrderBy;
	
$tdataadmin_rights[".orderindexes"] = array();

$tdataadmin_rights[".sqlHead"] = "SELECT TableName,   GroupID,   AccessMask";

$tdataadmin_rights[".sqlFrom"] = "FROM ipbx_ugrights";

$tdataadmin_rights[".sqlWhereExpr"] = "";

$tdataadmin_rights[".sqlTail"] = "";



	$tableKeys=array();
	$tdataadmin_rights[".Keys"]=$tableKeys;

	
//	TableName
	$fdata = array();
	$fdata["strName"] = "TableName";
	$fdata["ownerTable"] = "ipbx_ugrights";
		$fdata["Label"]="Table Name"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "TableName";
		$fdata["FullName"]= "TableName";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		
											$tdataadmin_rights["TableName"]=$fdata;
	
//	GroupID
	$fdata = array();
	$fdata["strName"] = "GroupID";
	$fdata["ownerTable"] = "ipbx_ugrights";
		$fdata["Label"]="Group ID"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "GroupID";
		$fdata["FullName"]= "GroupID";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
											$tdataadmin_rights["GroupID"]=$fdata;
	
//	AccessMask
	$fdata = array();
	$fdata["strName"] = "AccessMask";
	$fdata["ownerTable"] = "ipbx_ugrights";
		$fdata["Label"]="Access Mask"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "AccessMask";
		$fdata["FullName"]= "AccessMask";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=10";
		
											$tdataadmin_rights["AccessMask"]=$fdata;

	
$tables_data["admin_rights"]=&$tdataadmin_rights;
$field_labels["admin_rights"] = &$fieldLabelsadmin_rights;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["admin_rights"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["admin_rights"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto3195=array();
$proto3195["m_strHead"] = "SELECT";
$proto3195["m_strFieldList"] = "TableName,   GroupID,   AccessMask";
$proto3195["m_strFrom"] = "FROM ipbx_ugrights";
$proto3195["m_strWhere"] = "";
$proto3195["m_strOrderBy"] = "";
$proto3195["m_strTail"] = "";
$proto3196=array();
$proto3196["m_sql"] = "";
$proto3196["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3196["m_column"]=$obj;
$proto3196["m_contained"] = array();
$proto3196["m_strCase"] = "";
$proto3196["m_havingmode"] = "0";
$proto3196["m_inBrackets"] = "0";
$proto3196["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3196);

$proto3195["m_where"] = $obj;
$proto3198=array();
$proto3198["m_sql"] = "";
$proto3198["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3198["m_column"]=$obj;
$proto3198["m_contained"] = array();
$proto3198["m_strCase"] = "";
$proto3198["m_havingmode"] = "0";
$proto3198["m_inBrackets"] = "0";
$proto3198["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3198);

$proto3195["m_having"] = $obj;
$proto3195["m_fieldlist"] = array();
						$proto3200=array();
			$obj = new SQLField(array(
	"m_strName" => "TableName",
	"m_strTable" => "ipbx_ugrights"
));

$proto3200["m_expr"]=$obj;
$proto3200["m_alias"] = "";
$obj = new SQLFieldListItem($proto3200);

$proto3195["m_fieldlist"][]=$obj;
						$proto3202=array();
			$obj = new SQLField(array(
	"m_strName" => "GroupID",
	"m_strTable" => "ipbx_ugrights"
));

$proto3202["m_expr"]=$obj;
$proto3202["m_alias"] = "";
$obj = new SQLFieldListItem($proto3202);

$proto3195["m_fieldlist"][]=$obj;
						$proto3204=array();
			$obj = new SQLField(array(
	"m_strName" => "AccessMask",
	"m_strTable" => "ipbx_ugrights"
));

$proto3204["m_expr"]=$obj;
$proto3204["m_alias"] = "";
$obj = new SQLFieldListItem($proto3204);

$proto3195["m_fieldlist"][]=$obj;
$proto3195["m_fromlist"] = array();
												$proto3206=array();
$proto3206["m_link"] = "SQLL_MAIN";
			$proto3207=array();
$proto3207["m_strName"] = "ipbx_ugrights";
$proto3207["m_columns"] = array();
$proto3207["m_columns"][] = "TableName";
$proto3207["m_columns"][] = "GroupID";
$proto3207["m_columns"][] = "AccessMask";
$obj = new SQLTable($proto3207);

$proto3206["m_table"] = $obj;
$proto3206["m_alias"] = "";
$proto3208=array();
$proto3208["m_sql"] = "";
$proto3208["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3208["m_column"]=$obj;
$proto3208["m_contained"] = array();
$proto3208["m_strCase"] = "";
$proto3208["m_havingmode"] = "0";
$proto3208["m_inBrackets"] = "0";
$proto3208["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3208);

$proto3206["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto3206);

$proto3195["m_fromlist"][]=$obj;
$proto3195["m_groupby"] = array();
$proto3195["m_orderby"] = array();
$obj = new SQLQuery($proto3195);

$queryData_admin_rights = $obj;
$tdataadmin_rights[".sqlquery"] = $queryData_admin_rights;



?>
