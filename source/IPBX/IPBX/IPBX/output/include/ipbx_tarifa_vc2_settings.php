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










$proto1763=array();
$proto1763["m_strHead"] = "SELECT";
$proto1763["m_strFieldList"] = "id,   prefixo";
$proto1763["m_strFrom"] = "FROM ipbx_tarifa_vc2";
$proto1763["m_strWhere"] = "";
$proto1763["m_strOrderBy"] = "";
$proto1763["m_strTail"] = "";
$proto1764=array();
$proto1764["m_sql"] = "";
$proto1764["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1764["m_column"]=$obj;
$proto1764["m_contained"] = array();
$proto1764["m_strCase"] = "";
$proto1764["m_havingmode"] = "0";
$proto1764["m_inBrackets"] = "0";
$proto1764["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1764);

$proto1763["m_where"] = $obj;
$proto1766=array();
$proto1766["m_sql"] = "";
$proto1766["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1766["m_column"]=$obj;
$proto1766["m_contained"] = array();
$proto1766["m_strCase"] = "";
$proto1766["m_havingmode"] = "0";
$proto1766["m_inBrackets"] = "0";
$proto1766["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1766);

$proto1763["m_having"] = $obj;
$proto1763["m_fieldlist"] = array();
						$proto1768=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "ipbx_tarifa_vc2"
));

$proto1768["m_expr"]=$obj;
$proto1768["m_alias"] = "";
$obj = new SQLFieldListItem($proto1768);

$proto1763["m_fieldlist"][]=$obj;
						$proto1770=array();
			$obj = new SQLField(array(
	"m_strName" => "prefixo",
	"m_strTable" => "ipbx_tarifa_vc2"
));

$proto1770["m_expr"]=$obj;
$proto1770["m_alias"] = "";
$obj = new SQLFieldListItem($proto1770);

$proto1763["m_fieldlist"][]=$obj;
$proto1763["m_fromlist"] = array();
												$proto1772=array();
$proto1772["m_link"] = "SQLL_MAIN";
			$proto1773=array();
$proto1773["m_strName"] = "ipbx_tarifa_vc2";
$proto1773["m_columns"] = array();
$proto1773["m_columns"][] = "id";
$proto1773["m_columns"][] = "prefixo";
$obj = new SQLTable($proto1773);

$proto1772["m_table"] = $obj;
$proto1772["m_alias"] = "";
$proto1774=array();
$proto1774["m_sql"] = "";
$proto1774["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1774["m_column"]=$obj;
$proto1774["m_contained"] = array();
$proto1774["m_strCase"] = "";
$proto1774["m_havingmode"] = "0";
$proto1774["m_inBrackets"] = "0";
$proto1774["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1774);

$proto1772["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1772);

$proto1763["m_fromlist"][]=$obj;
$proto1763["m_groupby"] = array();
$proto1763["m_orderby"] = array();
$obj = new SQLQuery($proto1763);

$queryData_ipbx_tarifa_vc2 = $obj;
$tdataipbx_tarifa_vc2[".sqlquery"] = $queryData_ipbx_tarifa_vc2;



?>
