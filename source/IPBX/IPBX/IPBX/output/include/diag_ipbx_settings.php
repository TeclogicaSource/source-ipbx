<?php

//	field labels
$fieldLabelsdiag_ipbx = array();
$fieldLabelsdiag_ipbx["Portuguese(Brazil)"]=array();
$fieldLabelsdiag_ipbx["Portuguese(Brazil)"]["dt_timeout"] = " Data do Timeout";
$fieldLabelsdiag_ipbx["Portuguese(Brazil)"]["ip_address"] = " Endereço IP";
$fieldLabelsdiag_ipbx["Portuguese(Brazil)"]["timeout"] = " Timeout";


$tdatadiag_ipbx=array();
	$tdatadiag_ipbx[".NumberOfChars"]=80; 
	$tdatadiag_ipbx[".ShortName"]="diag_ipbx";
	$tdatadiag_ipbx[".OwnerID"]="";
	$tdatadiag_ipbx[".OriginalTable"]="timeout";
	$tdatadiag_ipbx[".NCSearch"]=true;
	

$tdatadiag_ipbx[".shortTableName"] = "diag_ipbx";
$tdatadiag_ipbx[".dataSourceTable"] = "diag_ipbx";
$tdatadiag_ipbx[".nSecOptions"] = 0;
$tdatadiag_ipbx[".nLoginMethod"] = 1;
$tdatadiag_ipbx[".recsPerRowList"] = 1;	
$tdatadiag_ipbx[".tableGroupBy"] = "0";
$tdatadiag_ipbx[".dbType"] = 0;
$tdatadiag_ipbx[".mainTableOwnerID"] = "";
$tdatadiag_ipbx[".moveNext"] = 1;

$tdatadiag_ipbx[".listAjax"] = true;

	$tdatadiag_ipbx[".audit"] = true;

	$tdatadiag_ipbx[".locking"] = false;
	
$tdatadiag_ipbx[".listIcons"] = true;




$tdatadiag_ipbx[".showSimpleSearchOptions"] = false;

$tdatadiag_ipbx[".showSearchPanel"] = true;


$tdatadiag_ipbx[".isUseAjaxSuggest"] = true;

$tdatadiag_ipbx[".rowHighlite"] = true;

$tdatadiag_ipbx[".delFile"] = true;

// button handlers file names
$tdatadiag_ipbx[".buttonHandlers_list"][] = "buttonevent_New_Button1";
$tdatadiag_ipbx[".buttonHandlers_list"][] = "buttonevent_New_Button3";
$tdatadiag_ipbx[".buttonHandlers_list"][] = "buttonevent_New_Button4";
$tdatadiag_ipbx[".buttonHandlers_list"][] = "buttonevent_New_Button7";

// start on load js handlers








// end on load js handlers



$tdatadiag_ipbx[".arrKeyFields"][] = "dt_timeout";

// use datepicker for search panel
$tdatadiag_ipbx[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdatadiag_ipbx[".isUseTimeForSearch"] = false;






$tdatadiag_ipbx[".isUseInlineJs"] = $tdatadiag_ipbx[".isUseInlineAdd"] || $tdatadiag_ipbx[".isUseInlineEdit"];

$tdatadiag_ipbx[".allSearchFields"] = array();



$tdatadiag_ipbx[".isDynamicPerm"] = true;

	

$tdatadiag_ipbx[".isDisplayLoading"] = true;

$tdatadiag_ipbx[".isResizeColumns"] = false;


$tdatadiag_ipbx[".createLoginPage"] = true;


 	




$tdatadiag_ipbx[".pageSize"] = 50;

$gstrOrderBy = "ORDER BY dt_timeout DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatadiag_ipbx[".strOrderBy"] = $gstrOrderBy;
	
$tdatadiag_ipbx[".orderindexes"] = array();
$tdatadiag_ipbx[".orderindexes"][] = array(1, (0 ? "ASC" : "DESC"), "dt_timeout");

$tdatadiag_ipbx[".sqlHead"] = "SELECT dt_timeout,  ip_address,  timeout";

$tdatadiag_ipbx[".sqlFrom"] = "FROM timeout";

$tdatadiag_ipbx[".sqlWhereExpr"] = "";

$tdatadiag_ipbx[".sqlTail"] = "";



	$tableKeys=array();
	$tableKeys[]="dt_timeout";
	$tdatadiag_ipbx[".Keys"]=$tableKeys;

	
//	dt_timeout
	$fdata = array();
	$fdata["strName"] = "dt_timeout";
	$fdata["ownerTable"] = "timeout";
		$fdata["Label"]=" Data do Timeout"; 
			$fdata["FieldType"]= 135;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Datetime";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "dt_timeout";
		$fdata["FullName"]= "dt_timeout";
						$fdata["Index"]= 1;
	 $fdata["DateEditType"]=13; 
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadiag_ipbx["dt_timeout"]=$fdata;
	
//	ip_address
	$fdata = array();
	$fdata["strName"] = "ip_address";
	$fdata["ownerTable"] = "timeout";
		$fdata["Label"]=" Endereço IP"; 
			$fdata["FieldType"]= 200;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "ip_address";
		$fdata["FullName"]= "ip_address";
						$fdata["Index"]= 2;
	
			$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=50";
		 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadiag_ipbx["ip_address"]=$fdata;
	
//	timeout
	$fdata = array();
	$fdata["strName"] = "timeout";
	$fdata["ownerTable"] = "timeout";
		$fdata["Label"]=" Timeout"; 
			$fdata["FieldType"]= 3;
				$fdata["UseiBox"] = false;
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
	

		
			$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "timeout";
		$fdata["FullName"]= "timeout";
						$fdata["Index"]= 3;
	
			$fdata["EditParams"]="";
			 $fdata["bListPage"]=true; 
				$fdata["FieldPermissions"]=true;
							$fdata["ListPage"]=true;
			$tdatadiag_ipbx["timeout"]=$fdata;

	
$tables_data["diag_ipbx"]=&$tdatadiag_ipbx;
$field_labels["diag_ipbx"] = &$fieldLabelsdiag_ipbx;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["diag_ipbx"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["diag_ipbx"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto1731=array();
$proto1731["m_strHead"] = "SELECT";
$proto1731["m_strFieldList"] = "dt_timeout,  ip_address,  timeout";
$proto1731["m_strFrom"] = "FROM timeout";
$proto1731["m_strWhere"] = "";
$proto1731["m_strOrderBy"] = "ORDER BY dt_timeout DESC";
$proto1731["m_strTail"] = "";
$proto1732=array();
$proto1732["m_sql"] = "";
$proto1732["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1732["m_column"]=$obj;
$proto1732["m_contained"] = array();
$proto1732["m_strCase"] = "";
$proto1732["m_havingmode"] = "0";
$proto1732["m_inBrackets"] = "0";
$proto1732["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1732);

$proto1731["m_where"] = $obj;
$proto1734=array();
$proto1734["m_sql"] = "";
$proto1734["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1734["m_column"]=$obj;
$proto1734["m_contained"] = array();
$proto1734["m_strCase"] = "";
$proto1734["m_havingmode"] = "0";
$proto1734["m_inBrackets"] = "0";
$proto1734["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1734);

$proto1731["m_having"] = $obj;
$proto1731["m_fieldlist"] = array();
						$proto1736=array();
			$obj = new SQLField(array(
	"m_strName" => "dt_timeout",
	"m_strTable" => "timeout"
));

$proto1736["m_expr"]=$obj;
$proto1736["m_alias"] = "";
$obj = new SQLFieldListItem($proto1736);

$proto1731["m_fieldlist"][]=$obj;
						$proto1738=array();
			$obj = new SQLField(array(
	"m_strName" => "ip_address",
	"m_strTable" => "timeout"
));

$proto1738["m_expr"]=$obj;
$proto1738["m_alias"] = "";
$obj = new SQLFieldListItem($proto1738);

$proto1731["m_fieldlist"][]=$obj;
						$proto1740=array();
			$obj = new SQLField(array(
	"m_strName" => "timeout",
	"m_strTable" => "timeout"
));

$proto1740["m_expr"]=$obj;
$proto1740["m_alias"] = "";
$obj = new SQLFieldListItem($proto1740);

$proto1731["m_fieldlist"][]=$obj;
$proto1731["m_fromlist"] = array();
												$proto1742=array();
$proto1742["m_link"] = "SQLL_MAIN";
			$proto1743=array();
$proto1743["m_strName"] = "timeout";
$proto1743["m_columns"] = array();
$proto1743["m_columns"][] = "dt_timeout";
$proto1743["m_columns"][] = "ip_address";
$proto1743["m_columns"][] = "timeout";
$obj = new SQLTable($proto1743);

$proto1742["m_table"] = $obj;
$proto1742["m_alias"] = "";
$proto1744=array();
$proto1744["m_sql"] = "";
$proto1744["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1744["m_column"]=$obj;
$proto1744["m_contained"] = array();
$proto1744["m_strCase"] = "";
$proto1744["m_havingmode"] = "0";
$proto1744["m_inBrackets"] = "0";
$proto1744["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1744);

$proto1742["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto1742);

$proto1731["m_fromlist"][]=$obj;
$proto1731["m_groupby"] = array();
$proto1731["m_orderby"] = array();
												$proto1746=array();
						$obj = new SQLField(array(
	"m_strName" => "dt_timeout",
	"m_strTable" => "timeout"
));

$proto1746["m_column"]=$obj;
$proto1746["m_bAsc"] = 0;
$proto1746["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto1746);

$proto1731["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto1731);

$queryData_diag_ipbx = $obj;
$tdatadiag_ipbx[".sqlquery"] = $queryData_diag_ipbx;



?>
