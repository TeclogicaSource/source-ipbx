<?php

//	field labels
$fieldLabelsipbx_ura_rev_inbound = array();
$fieldLabelsipbx_ura_rev_inbound["Portuguese(Brazil)"]=array();
$fieldLabelsipbx_ura_rev_inbound["Portuguese(Brazil)"]["id_ura_rev_inbount"] = "Identificação";
$fieldLabelsipbx_ura_rev_inbound["Portuguese(Brazil)"]["Arquivo"] = "Arquivo";


$tdataipbx_ura_rev_inbound=array();
	$tdataipbx_ura_rev_inbound[".NumberOfChars"]=80; 
	$tdataipbx_ura_rev_inbound[".ShortName"]="ipbx_ura_rev_inbound";
	$tdataipbx_ura_rev_inbound[".OwnerID"]="";
	$tdataipbx_ura_rev_inbound[".OriginalTable"]="ipbx_ura_rev_inbound";
	$tdataipbx_ura_rev_inbound[".NCSearch"]=true;
	

$tdataipbx_ura_rev_inbound[".shortTableName"] = "ipbx_ura_rev_inbound";
$tdataipbx_ura_rev_inbound[".dataSourceTable"] = "ipbx_ura_rev_inbound";
$tdataipbx_ura_rev_inbound[".nSecOptions"] = 0;
$tdataipbx_ura_rev_inbound[".nLoginMethod"] = 1;
$tdataipbx_ura_rev_inbound[".recsPerRowList"] = 1;	
$tdataipbx_ura_rev_inbound[".tableGroupBy"] = "0";
$tdataipbx_ura_rev_inbound[".dbType"] = 0;
$tdataipbx_ura_rev_inbound[".mainTableOwnerID"] = "";
$tdataipbx_ura_rev_inbound[".moveNext"] = 1;

$tdataipbx_ura_rev_inbound[".listAjax"] = true;

	$tdataipbx_ura_rev_inbound[".audit"] = true;

	$tdataipbx_ura_rev_inbound[".locking"] = false;
	
$tdataipbx_ura_rev_inbound[".listIcons"] = true;
$tdataipbx_ura_rev_inbound[".inlineEdit"] = true;




$tdataipbx_ura_rev_inbound[".showSimpleSearchOptions"] = false;

$tdataipbx_ura_rev_inbound[".showSearchPanel"] = true;


$tdataipbx_ura_rev_inbound[".isUseAjaxSuggest"] = true;

$tdataipbx_ura_rev_inbound[".rowHighlite"] = true;

$tdataipbx_ura_rev_inbound[".delFile"] = true;

// button handlers file names

// start on load js handlers








// end on load js handlers



$tdataipbx_ura_rev_inbound[".arrKeyFields"][] = "id_ura_rev_inbount";

// use datepicker for search panel
$tdataipbx_ura_rev_inbound[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataipbx_ura_rev_inbound[".isUseTimeForSearch"] = false;






$tdataipbx_ura_rev_inbound[".isUseInlineEdit"] = true;
$tdataipbx_ura_rev_inbound[".isUseInlineJs"] = $tdataipbx_ura_rev_inbound[".isUseInlineAdd"] || $tdataipbx_ura_rev_inbound[".isUseInlineEdit"];

$tdataipbx_ura_rev_inbound[".allSearchFields"] = array();



$tdataipbx_ura_rev_inbound[".isDynamicPerm"] = true;

	

$tdataipbx_ura_rev_inbound[".isDisplayLoading"] = true;

$tdataipbx_ura_rev_inbound[".isResizeColumns"] = false;


$tdataipbx_ura_rev_inbound[".createLoginPage"] = true;


 	




$tdataipbx_ura_rev_inbound[".pageSize"] = 50;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdataipbx_ura_rev_inbound[".strOrderBy"] = $gstrOrderBy;
	
$tdataipbx_ura_rev_inbound[".orderindexes"] = array();

$tdataipbx_ura_rev_inbound[".sqlHead"] = "SELECT id_ura_rev_inbount,   Arquivo";

$tdataipbx_ura_rev_inbound[".sqlFrom"] = "FROM ipbx_ura_rev_inbound";

$tdataipbx_ura_rev_inbound[".sqlWhereExpr"] = "";

$tdataipbx_ura_rev_inbound[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="id_ura_rev_inbount";
	$tdataipbx_ura_rev_inbound[".Keys"]=$tableKeys;

	
//	id_ura_rev_inbount
	$fdata = array();
	$fdata["strName"] = "id_ura_rev_inbount";
	$fdata["ownerTable"] = "ipbx_ura_rev_inbound";
		$fdata["Label"]="Identificação"; 
			$fdata["FieldType"]= 3;
		$fdata["AutoInc"]=true;
			$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id_ura_rev_inbount";
		$fdata["FullName"]= "id_ura_rev_inbount";
		$fdata["IsRequired"]=true; 
					$fdata["Index"]= 1;
	
			$fdata["EditParams"]="";
			
											$tdataipbx_ura_rev_inbound["id_ura_rev_inbount"]=$fdata;
	
//	Arquivo
	$fdata = array();
	$fdata["strName"] = "Arquivo";
	$fdata["ownerTable"] = "ipbx_ura_rev_inbound";
				$fdata["LinkPrefix"]="/var/www/html/ipbx_ura_rev/"; 
	$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "Document Download";
	
	

		
			
	$fdata["GoodName"]= "Arquivo";
		$fdata["FullName"]= "Arquivo";
		$fdata["IsRequired"]=true; 
				$fdata["UploadFolder"]="/var/www/html/ipbx_ura_rev/"; 
		$fdata["Absolute"] = true;
	$fdata["Index"]= 2;
	
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdataipbx_ura_rev_inbound["Arquivo"]=$fdata;

	
$tables_data["ipbx_ura_rev_inbound"]=&$tdataipbx_ura_rev_inbound;
$field_labels["ipbx_ura_rev_inbound"] = &$fieldLabelsipbx_ura_rev_inbound;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["ipbx_ura_rev_inbound"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["ipbx_ura_rev_inbound"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1859=array();
$proto1859["m_strHead"] = "SELECT";
$proto1859["m_strFieldList"] = "id_ura_rev_inbount,   Arquivo";
$proto1859["m_strFrom"] = "FROM ipbx_ura_rev_inbound";
$proto1859["m_strWhere"] = "";
$proto1859["m_strOrderBy"] = "";
$proto1859["m_strTail"] = "";
$proto1860=array();
$proto1860["m_sql"] = "";
$proto1860["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1860["m_column"]=$obj;
$proto1860["m_contained"] = array();
$proto1860["m_strCase"] = "";
$proto1860["m_havingmode"] = "0";
$proto1860["m_inBrackets"] = "0";
$proto1860["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1860);

$proto1859["m_where"] = $obj;
$proto1862=array();
$proto1862["m_sql"] = "";
$proto1862["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1862["m_column"]=$obj;
$proto1862["m_contained"] = array();
$proto1862["m_strCase"] = "";
$proto1862["m_havingmode"] = "0";
$proto1862["m_inBrackets"] = "0";
$proto1862["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1862);

$proto1859["m_having"] = $obj;
$proto1859["m_fieldlist"] = array();
						$proto1864=array();
			$obj = new SQLField(array(
	"m_strName" => "id_ura_rev_inbount",
	"m_strTable" => "ipbx_ura_rev_inbound"
));

$proto1864["m_expr"]=$obj;
$proto1864["m_alias"] = "";
$obj = new SQLFieldListItem($proto1864);

$proto1859["m_fieldlist"][]=$obj;
						$proto1866=array();
			$obj = new SQLField(array(
	"m_strName" => "Arquivo",
	"m_strTable" => "ipbx_ura_rev_inbound"
));

$proto1866["m_expr"]=$obj;
$proto1866["m_alias"] = "";
$obj = new SQLFieldListItem($proto1866);

$proto1859["m_fieldlist"][]=$obj;
$proto1859["m_fromlist"] = array();
												$proto1868=array();
$proto1868["m_link"] = "SQLL_MAIN";
			$proto1869=array();
$proto1869["m_strName"] = "ipbx_ura_rev_inbound";
$proto1869["m_columns"] = array();
$proto1869["m_columns"][] = "id_ura_rev_inbount";
$proto1869["m_columns"][] = "Arquivo";
$obj = new SQLTable($proto1869);

$proto1868["m_table"] = $obj;
$proto1868["m_alias"] = "";
$proto1870=array();
$proto1870["m_sql"] = "";
$proto1870["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1870["m_column"]=$obj;
$proto1870["m_contained"] = array();
$proto1870["m_strCase"] = "";
$proto1870["m_havingmode"] = "0";
$proto1870["m_inBrackets"] = "0";
$proto1870["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1870);

$proto1868["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1868);

$proto1859["m_fromlist"][]=$obj;
$proto1859["m_groupby"] = array();
$proto1859["m_orderby"] = array();
$obj = new SQLQuery($proto1859);

$queryData_ipbx_ura_rev_inbound = $obj;
$tdataipbx_ura_rev_inbound[".sqlquery"] = $queryData_ipbx_ura_rev_inbound;



?>
