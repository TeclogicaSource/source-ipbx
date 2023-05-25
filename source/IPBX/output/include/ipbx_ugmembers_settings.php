<?php

//	field labels
$fieldLabelsipbx_ugmembers = array();
$fieldLabelsipbx_ugmembers["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_ugmembers["Portuguese(Brazil)"]["UserName"] = "Usuário";
$fieldLabelsipbx_ugmembers["Portuguese(Brazil)"]["GroupID"] = "Grupo de Acesso";


$tdataipbx_ugmembers=array();
	$tdataipbx_ugmembers[".NumberOfChars"]=80; 
	$tdataipbx_ugmembers[".ShortName"]="ipbx_ugmembers";
	$tdataipbx_ugmembers[".OwnerID"]="";
	$tdataipbx_ugmembers[".OriginalTable"]="ipbx_ugmembers";
	$tdataipbx_ugmembers[".NCSearch"]=true;
	

$tdataipbx_ugmembers[".shortTableName"] = "ipbx_ugmembers";
$tdataipbx_ugmembers[".dataSourceTable"] = "ipbx_ugmembers";
$tdataipbx_ugmembers[".nSecOptions"] = 0;
$tdataipbx_ugmembers[".nLoginMethod"] = 1;
$tdataipbx_ugmembers[".recsPerRowList"] = 1;	
$tdataipbx_ugmembers[".tableGroupBy"] = "0";
$tdataipbx_ugmembers[".dbType"] = 0;
$tdataipbx_ugmembers[".mainTableOwnerID"] = "";
$tdataipbx_ugmembers[".moveNext"] = 1;

$tdataipbx_ugmembers[".listAjax"] = false;

	$tdataipbx_ugmembers[".audit"] = true;

	$tdataipbx_ugmembers[".locking"] = false;
	
$tdataipbx_ugmembers[".listIcons"] = true;
$tdataipbx_ugmembers[".inlineEdit"] = true;



$tdataipbx_ugmembers[".delete"] = true;

$tdataipbx_ugmembers[".showSimpleSearchOptions"] = false;

$tdataipbx_ugmembers[".showSearchPanel"] = true;


$tdataipbx_ugmembers[".isUseAjaxSuggest"] = true;

$tdataipbx_ugmembers[".rowHighlite"] = true;

$tdataipbx_ugmembers[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_ugmembers[".arrKeyFields"][] = "UserName";

// use datepicker for search panel
$tdataipbx_ugmembers[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_ugmembers[".isUseTimeForSearch"] = false;





$tdataipbx_ugmembers[".isUseInlineAdd"] = true;

$tdataipbx_ugmembers[".isUseInlineEdit"] = true;
$tdataipbx_ugmembers[".isUseInlineJs"] = $tdataipbx_ugmembers[".isUseInlineAdd"] || $tdataipbx_ugmembers[".isUseInlineEdit"];

$tdataipbx_ugmembers[".allSearchFields"] = array();



$tdataipbx_ugmembers[".isDynamicPerm"] = true;

	

$tdataipbx_ugmembers[".isDisplayLoading"] = true;

$tdataipbx_ugmembers[".isResizeColumns"] = false;


$tdataipbx_ugmembers[".createLoginPage"] = true;


 	




$tdataipbx_ugmembers[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_ugmembers[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_ugmembers[".orderindexes"] = array();

$tdataipbx_ugmembers[".sqlHead"] = "SELECT UserName,  GroupID";

$tdataipbx_ugmembers[".sqlFrom"] = "FROM ipbx_ugmembers";

$tdataipbx_ugmembers[".sqlWhereExpr"] = "(GroupID > 0)";

$tdataipbx_ugmembers[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="UserName";
	$tdataipbx_ugmembers[".Keys"]=$tableKeys;

	
//	UserName
	$fdata = array();
	$fdata["strName"] = "UserName";
	$fdata["ownerTable"] = "ipbx_ugmembers";
		$fdata["Label"]="Usuário"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="name";
	$fdata["LinkFieldType"]=200;
	$fdata["DisplayField"]="callerid";
				$fdata["LookupTable"]="ipbx_ramais";
	$fdata["LookupOrderBy"]="callerid";
							$fdata["LookupWhere"] = "callerid <> ''";

				
										
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "UserName";
		$fdata["FullName"]= "UserName";
						$fdata["Index"]= 1;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ugmembers["UserName"]=$fdata;
	
//	GroupID
	$fdata = array();
	$fdata["strName"] = "GroupID";
	$fdata["ownerTable"] = "ipbx_ugmembers";
		$fdata["Label"]="Grupo de Acesso"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
	

		$fdata["LookupType"]=1;
	
				
					
	$fdata["LinkField"]="GroupID";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="Label";
				$fdata["LookupTable"]="ipbx_uggroups";
	$fdata["LookupOrderBy"]="Label";
						
				
										$fdata["SimpleAdd"]=true;
	
					
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "GroupID";
		$fdata["FullName"]= "GroupID";
						$fdata["Index"]= 2;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ugmembers["GroupID"]=$fdata;

	
$tables_data["ipbx_ugmembers"]=&$tdataipbx_ugmembers;
$field_labels["ipbx_ugmembers"] = &$fieldLabelsipbx_ugmembers;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_ugmembers"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_ugmembers"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1464=array();
$proto1464["m_strHead"] = "SELECT";
$proto1464["m_strFieldList"] = "UserName,  GroupID";
$proto1464["m_strFrom"] = "FROM ipbx_ugmembers";
$proto1464["m_strWhere"] = "(GroupID > 0)";
$proto1464["m_strOrderBy"] = "";
$proto1464["m_strTail"] = "";
$proto1465=array();
$proto1465["m_sql"] = "GroupID > 0";
$proto1465["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "GroupID",
	"m_strTable" => "ipbx_ugmembers"
));

$proto1465["m_column"]=$obj;
$proto1465["m_contained"] = array();
$proto1465["m_strCase"] = "> 0";
$proto1465["m_havingmode"] = "0";
$proto1465["m_inBrackets"] = "0";
$proto1465["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1465);

$proto1464["m_where"] = $obj;
$proto1467=array();
$proto1467["m_sql"] = "";
$proto1467["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1467["m_column"]=$obj;
$proto1467["m_contained"] = array();
$proto1467["m_strCase"] = "";
$proto1467["m_havingmode"] = "0";
$proto1467["m_inBrackets"] = "0";
$proto1467["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1467);

$proto1464["m_having"] = $obj;
$proto1464["m_fieldlist"] = array();
						$proto1469=array();
			$obj = new SQLField(array(
	"m_strName" => "UserName",
	"m_strTable" => "ipbx_ugmembers"
));

$proto1469["m_expr"]=$obj;
$proto1469["m_alias"] = "";
$obj = new SQLFieldListItem($proto1469);

$proto1464["m_fieldlist"][]=$obj;
						$proto1471=array();
			$obj = new SQLField(array(
	"m_strName" => "GroupID",
	"m_strTable" => "ipbx_ugmembers"
));

$proto1471["m_expr"]=$obj;
$proto1471["m_alias"] = "";
$obj = new SQLFieldListItem($proto1471);

$proto1464["m_fieldlist"][]=$obj;
$proto1464["m_fromlist"] = array();
												$proto1473=array();
$proto1473["m_link"] = "SQLL_MAIN";
			$proto1474=array();
$proto1474["m_strName"] = "ipbx_ugmembers";
$proto1474["m_columns"] = array();
$proto1474["m_columns"][] = "UserName";
$proto1474["m_columns"][] = "GroupID";
$obj = new SQLTable($proto1474);

$proto1473["m_table"] = $obj;
$proto1473["m_alias"] = "";
$proto1475=array();
$proto1475["m_sql"] = "";
$proto1475["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1475["m_column"]=$obj;
$proto1475["m_contained"] = array();
$proto1475["m_strCase"] = "";
$proto1475["m_havingmode"] = "0";
$proto1475["m_inBrackets"] = "0";
$proto1475["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1475);

$proto1473["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1473);

$proto1464["m_fromlist"][]=$obj;
$proto1464["m_groupby"] = array();
$proto1464["m_orderby"] = array();
$obj = new SQLQuery($proto1464);

$queryData_ipbx_ugmembers = $obj;
$tdataipbx_ugmembers[".sqlquery"] = $queryData_ipbx_ugmembers;



?>
