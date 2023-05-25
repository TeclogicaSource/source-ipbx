<?php

//	field labels
$fieldLabelsipbx_grava_ramal = array();
$fieldLabelsipbx_grava_ramal["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_grava_ramal["Portuguese(Brazil)"]["name"] = "Ramal";
$fieldLabelsipbx_grava_ramal["Portuguese(Brazil)"]["ID"] = "Identificador";


$tdataipbx_grava_ramal=array();
	$tdataipbx_grava_ramal[".NumberOfChars"]=80; 
	$tdataipbx_grava_ramal[".ShortName"]="ipbx_grava_ramal";
	$tdataipbx_grava_ramal[".OwnerID"]="";
	$tdataipbx_grava_ramal[".OriginalTable"]="ipbx_grava_ramal";
	$tdataipbx_grava_ramal[".NCSearch"]=true;
	

$tdataipbx_grava_ramal[".shortTableName"] = "ipbx_grava_ramal";
$tdataipbx_grava_ramal[".dataSourceTable"] = "ipbx_grava_ramal";
$tdataipbx_grava_ramal[".nSecOptions"] = 0;
$tdataipbx_grava_ramal[".nLoginMethod"] = 1;
$tdataipbx_grava_ramal[".recsPerRowList"] = 1;	
$tdataipbx_grava_ramal[".tableGroupBy"] = "0";
$tdataipbx_grava_ramal[".dbType"] = 0;
$tdataipbx_grava_ramal[".mainTableOwnerID"] = "";
$tdataipbx_grava_ramal[".moveNext"] = 1;

$tdataipbx_grava_ramal[".listAjax"] = false;

	$tdataipbx_grava_ramal[".audit"] = true;

	$tdataipbx_grava_ramal[".locking"] = false;
	
$tdataipbx_grava_ramal[".listIcons"] = true;
$tdataipbx_grava_ramal[".edit"] = true;
$tdataipbx_grava_ramal[".inlineEdit"] = true;
$tdataipbx_grava_ramal[".view"] = true;

$tdataipbx_grava_ramal[".exportTo"] = true;

$tdataipbx_grava_ramal[".printFriendly"] = true;

$tdataipbx_grava_ramal[".delete"] = true;

$tdataipbx_grava_ramal[".showSimpleSearchOptions"] = false;

$tdataipbx_grava_ramal[".showSearchPanel"] = true;


$tdataipbx_grava_ramal[".isUseAjaxSuggest"] = true;

$tdataipbx_grava_ramal[".rowHighlite"] = true;

$tdataipbx_grava_ramal[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_grava_ramal[".arrKeyFields"][] = "ID";

// use datepicker for search panel
$tdataipbx_grava_ramal[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_grava_ramal[".isUseTimeForSearch"] = false;





$tdataipbx_grava_ramal[".isUseInlineAdd"] = true;

$tdataipbx_grava_ramal[".isUseInlineEdit"] = true;
$tdataipbx_grava_ramal[".isUseInlineJs"] = $tdataipbx_grava_ramal[".isUseInlineAdd"] || $tdataipbx_grava_ramal[".isUseInlineEdit"];

$tdataipbx_grava_ramal[".allSearchFields"] = array();



$tdataipbx_grava_ramal[".isDynamicPerm"] = true;

	

$tdataipbx_grava_ramal[".isDisplayLoading"] = true;

$tdataipbx_grava_ramal[".isResizeColumns"] = false;


$tdataipbx_grava_ramal[".createLoginPage"] = true;


 	




$tdataipbx_grava_ramal[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_grava_ramal[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_grava_ramal[".orderindexes"] = array();

$tdataipbx_grava_ramal[".sqlHead"] = "SELECT name,   ID";

$tdataipbx_grava_ramal[".sqlFrom"] = "FROM ipbx_grava_ramal";

$tdataipbx_grava_ramal[".sqlWhereExpr"] = "";

$tdataipbx_grava_ramal[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="ID";
	$tdataipbx_grava_ramal[".Keys"]=$tableKeys;

	
//	name
	$fdata = array();
	$fdata["strName"] = "name";
	$fdata["ownerTable"] = "ipbx_grava_ramal";
		$fdata["Label"]="Ramal"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "name";
		$fdata["FullName"]= "name";
						$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=80";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_grava_ramal["name"]=$fdata;
	
//	ID
	$fdata = array();
	$fdata["strName"] = "ID";
	$fdata["ownerTable"] = "ipbx_grava_ramal";
		$fdata["Label"]="Identificador"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ID";
		$fdata["FullName"]= "ID";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_grava_ramal["ID"]=$fdata;

	
$tables_data["ipbx_grava_ramal"]=&$tdataipbx_grava_ramal;
$field_labels["ipbx_grava_ramal"] = &$fieldLabelsipbx_grava_ramal;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_grava_ramal"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_grava_ramal"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto651=array();
$proto651["m_strHead"] = "SELECT";
$proto651["m_strFieldList"] = "name,   ID";
$proto651["m_strFrom"] = "FROM ipbx_grava_ramal";
$proto651["m_strWhere"] = "";
$proto651["m_strOrderBy"] = "";
$proto651["m_strTail"] = "";
$proto652=array();
$proto652["m_sql"] = "";
$proto652["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto652["m_column"]=$obj;
$proto652["m_contained"] = array();
$proto652["m_strCase"] = "";
$proto652["m_havingmode"] = "0";
$proto652["m_inBrackets"] = "0";
$proto652["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto652);

$proto651["m_where"] = $obj;
$proto654=array();
$proto654["m_sql"] = "";
$proto654["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto654["m_column"]=$obj;
$proto654["m_contained"] = array();
$proto654["m_strCase"] = "";
$proto654["m_havingmode"] = "0";
$proto654["m_inBrackets"] = "0";
$proto654["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto654);

$proto651["m_having"] = $obj;
$proto651["m_fieldlist"] = array();
						$proto656=array();
			$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "ipbx_grava_ramal"
));

$proto656["m_expr"]=$obj;
$proto656["m_alias"] = "";
$obj = new SQLFieldListItem($proto656);

$proto651["m_fieldlist"][]=$obj;
						$proto658=array();
			$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "ipbx_grava_ramal"
));

$proto658["m_expr"]=$obj;
$proto658["m_alias"] = "";
$obj = new SQLFieldListItem($proto658);

$proto651["m_fieldlist"][]=$obj;
$proto651["m_fromlist"] = array();
												$proto660=array();
$proto660["m_link"] = "SQLL_MAIN";
			$proto661=array();
$proto661["m_strName"] = "ipbx_grava_ramal";
$proto661["m_columns"] = array();
$proto661["m_columns"][] = "name";
$proto661["m_columns"][] = "ID";
$obj = new SQLTable($proto661);

$proto660["m_table"] = $obj;
$proto660["m_alias"] = "";
$proto662=array();
$proto662["m_sql"] = "";
$proto662["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto662["m_column"]=$obj;
$proto662["m_contained"] = array();
$proto662["m_strCase"] = "";
$proto662["m_havingmode"] = "0";
$proto662["m_inBrackets"] = "0";
$proto662["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto662);

$proto660["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto660);

$proto651["m_fromlist"][]=$obj;
$proto651["m_groupby"] = array();
$proto651["m_orderby"] = array();
$obj = new SQLQuery($proto651);

$queryData_ipbx_grava_ramal = $obj;
$tdataipbx_grava_ramal[".sqlquery"] = $queryData_ipbx_grava_ramal;



?>
